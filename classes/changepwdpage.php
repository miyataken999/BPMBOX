<?php
class ChangePasswordPage extends RunnerPage
{
	protected $pwdStrong = false;
	
	public $token = "";
	
	public $action;	

	protected $passwordField;
	protected $usernameField;
	
	protected $auditObj = null;	
	
	protected $changePwdFields;
	
	protected $changedSuccess = false;
	
	/**
	 *
	 */
	function __construct(&$params = "")
	{
		parent::__construct($params);
		
		if( !$this->action && !$this->checkToken() )
		{
			Security::saveRedirectURL();
			HeaderRedirect("login"); 
			return;			
		}
		
		$this->pSet = new ProjectSettings("USERS", $this->pageType);
		$this->pSetEdit = $this->pSet;

		$this->passwordField = GetPasswordField();
		$this->usernameField = GetUserNameField();	
		
		$this->auditObj = GetAuditObject();
		
		if( $this->token )
		{
			$this->changePwdFields = array("newpass", "confirm");
			// to send it back with a form (user may delete session before submit)
			$this->setProxyValue("token", $this->token);
		}
		else
			$this->changePwdFields = array("oldpass", "newpass", "confirm");
		
		// fill global password settings
		$this->pwdStrong = GetGlobalData("pwdStrong", false);
		
		if( $this->pwdStrong )
		{
			$this->settingsMap["globalSettings"]["pwdStrong"] = true;	
			$this->settingsMap["globalSettings"]["pwdLen"] = GetGlobalData("pwdLen", 0);
			$this->settingsMap["globalSettings"]["pwdUnique"] = GetGlobalData("pwdUnique", 0);
			$this->settingsMap["globalSettings"]["pwdDigits"] = GetGlobalData("pwdDigits", 0);
			$this->settingsMap["globalSettings"]["pwdUpperLower"] = GetGlobalData("pwdUpperLower", false);
		}
		
		$this->formBricks["header"] = "changeheader";
		$this->formBricks["footer"] = "changebuttons";
		$this->assignFormFooterAndHeaderBricks( true );		
	}
	
	/**
	 * Set the connection property
	 */
	protected function setTableConnection()
	{
		global $cman;
		$this->connection = $cman->getForLogin();		
	}
	
	/**
	 *
	 */
	protected function assignCipherer()
	{
		$this->cipherer = RunnerCipherer::getForLogin();
	}

	/**
	 *
	 */
	protected function setReferer()
	{
		$referer = @$_SERVER["HTTP_REFERER"] != "" 
				&& strpos($_SERVER["HTTP_REFERER"], GetTableLink("changepwd")) != strlen($_SERVER["HTTP_REFERER"]) - strlen(GetTableLink("changepwd"))
				? $_SERVER["HTTP_REFERER"] : ""; 

		if( !isset($_SESSION["changepwd_referer"]) )
			$_SESSION["changepwd_referer"] = $referer != "" ? $referer : GetTableLink("menu");
		else if( $referer != "" )
			$_SESSION["changepwd_referer"] = $referer;	
	}
	
	/**
	 * @return String
	 */
	protected function getSQLWhere()
	{
		global $cUserNameFieldType;
		
		if( $this->token )
			return "where".$this->connection->addFieldWrappers( "" )."=". $this->connection->prepareString( $this->token );
				
		$value = $this->getSqlPreparedLoginTableValue( @$_SESSION["UserID"], $this->usernameField, $cUserNameFieldType );
		$sWhere = " where ".$this->getFieldSQLDecrypt( $this->usernameField )."=".$value;	

		return $sWhere;
	}
	
	/**
	 * @param String
	 * @return String
	 */
	protected function getSelectSQL( $where )
	{
		global $cLoginTable;
		
		$strSQL = "select ".$this->getFieldSQLDecrypt( $this->passwordField );

		return $strSQL." as ".$this->connection->addFieldWrappers( $this->passwordField )
				." from ".$this->connection->addTableWrappers( $cLoginTable ) . $where;
	}
	
	/**
	 * @param String newpass
	 * @param String where
	 * @return String
	 */
	protected function getUpdateSQL( $newpass, $where )
	{
		global $cLoginTable, $cPasswordFieldType;
		
		
		$passvalue = $this->cipherer->AddDBQuotes( $this->passwordField, $newpass );
		
		$setPart = " set ".$this->connection->addFieldWrappers( $this->passwordField )."=".$passvalue;
		if( $this->token )
		{
			$setPart.= ", ".$this->connection->addFieldWrappers( "" )."=". $this->connection->prepareString( "" ).", "
				.$this->connection->addFieldWrappers( "" )."=". $this->connection->addDateQuotes( NULL );
				
		}
		
		return "update ".$this->connection->addTableWrappers( $cLoginTable ). $setPart . $where;	
	}
	
	/**
	 * @return Array
	 */
	protected function getControlValues()
	{
		$filename_values = array();
		$blobfields = array();
		$values = array();		
		foreach( $this->changePwdFields as $fName )
		{
			$fControl = $this->getControl( $fName, $this->id );
			$fControl->readWebValue( $values, $blobfields, NULL, NULL, $filename_values );
		}
		
		return $values;
	}
	
	/**
	 * @param String oldPass
	 * @param Array row
	 * @param Boolean bcrypted
	 * @return Boolean
	 */
	protected function checkOldPasswordValue( $oldPass, $row, $bcrypted )
	{
		if( !$row )
			return false;
		
		if( $this->token )
			return true;
		
		if( $bcrypted )
			return passwordVerify( $oldPass, $row[ $this->passwordField ] );

		return $oldPass == $row[ $this->passwordField ];		
	}
	
	/**
	 * @return Boolean
	 */
	protected function changePassword()
	{
		global $globalEvents, $cLoginTable;
		
		$values = $this->getControlValues();			
		$oldPass = $values["oldpass"];
		
		$bcrypted = false;		
		
		$sqlWhere = $this->getSQLWhere();
		$qResult = $this->connection->query( $this->getSelectSQL( $sqlWhere ) );	
		$row = $this->cipherer->DecryptFetchedArray( $qResult->fetchAssoc() ); 
		
		if( !$this->checkOldPasswordValue( $oldPass, $row, $bcrypted ) )
		{
			$this->message = "不正なパスワード";
			return false;		
		}
		
		$oldPass = $row[ $this->passwordField ];
			
		if( $this->pwdStrong && !checkpassword( $values["newpass"] ) )
		{	
			$this->message = $this->getPwdStrongFailedMessage();
			$this->jsSettings["tableSettings"][ $cLoginTable ]["msg_passwordError"] = $this->message;
			return false;
		}

		$retval = true;
		if( $globalEvents->exists("BeforeChangePassword") )
			$retval = $globalEvents->BeforeChangePassword( $oldPass, $values["newpass"], $this );
		
		if( $retval )
		{				
			$strSQL = $this->getUpdateSQL( $values["newpass"], $sqlWhere );		
			$this->connection->exec( $strSQL );

			if( $this->auditObj )
				$this->auditObj->LogChPassword();
				
			if( $globalEvents->exists("AfterChangePassword") )
				$globalEvents->AfterChangePassword( $oldPass, $values["newpass"], $this );
		}
		
		return $retval;		
	}

	/**
	 * @return String
	 */	
	protected function getPwdStrongFailedMessage()
	{
		$msg = "";
		$pwdLen = GetGlobalData("pwdLen", 0);
		if($pwdLen)
		{
			$fmt = "パスワードは最低 %% 文字必要です。";
			$fmt = str_replace("%%", "".$pwdLen, $fmt);
			$msg.= "<br>".$fmt;
		}
		$pwdUnique = GetGlobalData("pwdUnique", 0);
		if($pwdUnique)
		{
			$fmt = "パスワードには最低 %% 個のユニークな文字が必要です。";
			$fmt = str_replace("%%", "".$pwdUnique, $fmt);
			$msg.= "<br>".$fmt;
		}
		$pwdDigits = GetGlobalData("pwdDigits", 0);
		if($pwdDigits)
		{
			$fmt = "パスワードには %% 桁の長さか記号を含める必要があります。";
			$fmt = str_replace("%%", "".$pwdDigits, $fmt);
			$msg.= "<br>".$fmt;
		}
		if(GetGlobalData("pwdUpperLower", false))
		{
			$fmt = "パスワードには大文字と小文字を含める必要があります。";
			$msg.= "<br>".$fmt;
		}
		
		if($msg)
			$msg = substr($msg, 4);
			
		return $msg;
	}
	
	/**
	 *
	 */
	public function process()
	{
		global $globalEvents;

		$this->setReferer();

		//	Before Process event
		if( $globalEvents->exists("BeforeProcessChangePwd") )
			$globalEvents->BeforeProcessChangePwd( $this );

		if( $this->action == "Change" )	
			$this->changedSuccess = $this->changePassword();
			
		if( !$this->changedSuccess )
			$this->prepareEditControls();
		
		$this->addCommonJs();
		$this->fillSetCntrlMaps();
		$this->addButtonHandlers();
		$this->doCommonAssignments();
		
		$this->showPage();
	}
	
	/**
	 *
	 */
	protected function prepareEditControls()
	{
		foreach($this->changePwdFields as $fName)
		{
			$parameters = array();
			$parameters["id"] = $this->id;
			$parameters["mode"] = "add";
			$parameters["field"] = $fName;
			$parameters["format"] = "Password";
			$parameters["pageObj"] = $this;
			$parameters["suggest"] = true;
			$parameters["validate"] = array('basicValidate' => array('IsRequired')); 
			
			$parameters["extraParams"] = array();
			$parameters["extraParams"]["getConrirmFieldCtrl"] = true;
							
			$controls = array('controls' => array());	
			$controls["controls"]['id'] = $this->id;
			$controls["controls"]['mode'] = "add";
			$controls["controls"]['ctrlInd'] = 0;
			$controls["controls"]['fieldName'] = $fName;
			$controls["controls"]['suggest'] = $parameters["suggest"];
			
			$this->xt->assign_function( $fName."_editcontrol", "xt_buildeditcontrol", $parameters );
			$this->xt->assign($fName."_label", true);
			
			if ( $this->getLayoutVersion() == BOOTSTRAP_LAYOUT )
			{
				$this->xt->assign("labelfor_" . goodFieldName($fName), "value_".$fName."_".$this->id);
			}		
			
			if( $this->is508 )
				$this->xt->assign_section($fName."_label", "<label for=\"value_".$fName."_".$this->id."\">", "</label>");
			
			$this->xt->assign($fName."_block", true);
					
			$this->fillControlsMap($controls);
		}	
	}
	
	/**
	 *
	 */
	protected function assignBody()
	{
		$this->body["begin"] .= GetBaseScriptsForPage(false);
		$this->body["end"] = XTempl::create_method_assignment( "assignBodyEnd", $this );

		$this->xt->assignbyref("body", $this->body);
	}	
	
	/**
	 *
	 */
	protected function doCommonAssignments()
	{
		$this->xt->assign("id", $this->id);	
		$this->xt->assign("submit_attrs", "id=\"saveButton".$this->id."\"");
		$this->xt->assign("backlink_attrs", "href=\"". runner_htmlspecialchars( $_SESSION["changepwd_referer"] )."\"");

		if( $this->message )
		{
			if( $this->getLayoutVersion() == BOOTSTRAP_LAYOUT )
			{
				$this->xt->assign("message_class", "alert-danger" );
				$this->xt->assign("message", $this->message);
			}
			else
			{
				$this->xt->assign("message", "<div class='message rnr-error'>".$this->message."</div>");
			}
			
			$this->xt->assign("message_block", true);
		}
		
		$this->assignBody();
	}
	
	/**
	 *
	 */
	protected function showPage()
	{
		global $globalEvents;

		if( $this->changedSuccess )
		{
			$this->updatePageLayoutAndCSS("", "success");	
			$this->templatefile = GetTemplateName("", "changepwd_success");
		}
	
		if( $globalEvents->exists("BeforeShowChangePwd") )
			$globalEvents->BeforeShowChangePwd( $this->xt, $this->templatefile, $this );

		$this->display( $this->templatefile );		
	}
	
	/**
	 * @return String
	 */
	public static function readActionFromRequest()
	{				
		if( @$_POST["btnSubmit"] )
			return @$_POST["btnSubmit"];
			
		return "";
	}
	
	/**
	 * @return Boolean
	 */
	protected function checkToken()
	{
		if( !$this->token )
			return true;
			
		$sqlSelect = "select ".$this->connection->addFieldWrappers( "" )." from".$this->connection->addTableWrappers("USERS")
			." where".$this->connection->addFieldWrappers( "" )."=". $this->connection->prepareString( $this->token );
			
		$data = $this->cipherer->DecryptFetchedArray( $this->connection->query( $sqlSelect )->fetchAssoc() );
		if( $data )
			return secondsPassedFrom( $data[""] ) < 86400;
		
		return false;
	}
}
?>