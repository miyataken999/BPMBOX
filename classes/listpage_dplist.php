<?php

class ListPage_DPList extends ListPage_DPInline
{	
	/**
	 * Constructor, set initial params
	 * @param array $params
	 */
	function __construct(&$params)
	{
		parent::__construct( $params );
	
		$this->formBricks["footer"] = array( "pagination_block" );	
	}
	
	/**
	 * Show the page.
	 * It's supposed to be displayed in response on an ajax-like request
	 */
	public function showPage()
	{				
		$this->BeforeShowList();
		
		if( $this->mobileTemplateMode() )
			$bricksExcept = array("grid_mobile", "pagination", "details_found");
		else 
			$bricksExcept = array("grid", "pagination", "message", "reorder_records" /*,"recordcontrols_new", "recordcontrol"*/);
		
		$this->xt->hideAllBricksExcept( $bricksExcept );
		$this->xt->prepare_template($this->templatefile);
		$this->showPageAjax();
	}

	/**
	 * @return String
	 */
	protected function getHeaderControlsBlocks()
	{
		$controlsBlocks = "";
		$buttons = "";
		$bs_button_class = "btn btn-sm";
		
		if( $this->inlineAddAvailable() && $this->xt->getVar("inlineadd_link") )
		{
			$inlineaddlink_attrs = $this->xt->getVar("inlineaddlink_attrs");
			
			if( $this->addAvailable() )
				$caption = "インライン追加";
			else	
				$caption = "追加";
				
			if( $this->getLayoutVersion() != BOOTSTRAP_LAYOUT ) 
			{
				$controlsBlocks = '<span class="rnr-dbebrick ">'
					.'<div class="style1 rnr-bl rnr-b-recordcontrols_new">'
						.'<a class="rnr-button" href="#" '.$inlineaddlink_attrs.'>'.$caption.'</a> '
					.'</div>'
				.'</span>';		
			}
			else
			{
				$buttons.= '<a class="'. $bs_button_class.'" href="#" '.$inlineaddlink_attrs.'>'.$caption.'</a> ';		
			}
		}
		
		if( $this->addAvailable() && $this->xt->getVar("add_link") )
		{
			$addlink_attrs = $this->xt->getVar("addlink_attrs");
			
			if( $this->inlineAddAvailable() )
				$caption = "追加";
			else	
				$caption = "追加";
				
			if( $this->getLayoutVersion() != BOOTSTRAP_LAYOUT ) 
			{
				$controlsBlocks = '<span class="rnr-dbebrick ">'
					.'<div class="style1 rnr-bl rnr-b-recordcontrols_new">'
						.'<a class="rnr-button" href="#" '.$addlink_attrs.'>'.$caption.'</a> '
					.'</div>'
				.'</span>';		
			}
			else
			{
				$buttons.= '<a class="'. $bs_button_class.'" href="#" '.$addlink_attrs.'>'.$caption.'</a> ';		
			}			
		}

		if( $this->inlineEditAvailable() && $this->xt->getVar("editselected_link") )
		{
			$editselectedlink_attrs = $this->xt->getVar("editselectedlink_attrs");
			$editselectedlink_span = $this->xt->getVar("editselectedlink_span");
			
			// "bs-invisible-button" class need for init hidden in bootstrap
			if( $this->getLayoutVersion() != BOOTSTRAP_LAYOUT) 
				$buttons.= '<a class="rnr-button" href="#" '.$editselectedlink_attrs.' '.$editselectedlink_span.'>'."編集".'</a> ';
			else
				$buttons.= '<a class="' . $bs_button_class . ' " disabled href="#" '.$editselectedlink_attrs.' '.$editselectedlink_span.'>'."編集".'</a> ';
		};	

		if( $this->updateSelectedAvailable() && $this->xt->getVar("updateselected_link") && $this->getLayoutVersion() == BOOTSTRAP_LAYOUT )
		{
			$updateselectedlink_attrs = $this->xt->getVar("updateselectedlink_attrs");         
			$buttons.= '<a class="' . $bs_button_class . '" disabled href="#" '.$updateselectedlink_attrs.'>'."Update selected".'</a> ';		  		
		}
		
		if( $this->xt->getVar("saveall_link") )
		{
			$savealllink_attrs = $this->xt->getVar("savealllink_attrs");	
			$savealllink_span = $this->xt->getVar("savealllink_span");	
	
			if( $this->getLayoutVersion() != BOOTSTRAP_LAYOUT) 
				$buttons.= '<a class="rnr-button" href="#" '.$savealllink_attrs.' '.$savealllink_span.'>'."全て保存".'</a> ';					  
			else
				$buttons.= '<a class="' . $bs_button_class . '" href="#" '.$savealllink_attrs.' '.$savealllink_span.'>'."全て保存".'</a> ';					  
		}
		
		if( $this->xt->getVar("cancelall_link") )
		{
			$cancelalllink_attrs = $this->xt->getVar("cancelalllink_attrs");	
			$cancelalllink_span = $this->xt->getVar("cancelalllink_span");

			if( $this->getLayoutVersion() != BOOTSTRAP_LAYOUT) 
				$buttons.= '<a class="rnr-button" href="#" '.$cancelalllink_attrs.' '.$cancelalllink_span.'>'."キャンセル".'</a> ';					  
			else
				$buttons.= '<a class="' . $bs_button_class . '" href="#" '.$cancelalllink_attrs.' '.$cancelalllink_span.'>'."キャンセル".'</a> ';					  
		}
		
		if( $this->deleteAvailable() && $this->xt->getVar("deleteselected_link") )
		{
			$deleteselectedlink_attrs = $this->xt->getVar("deleteselectedlink_attrs");	
			$deleteselectedlink_span = $this->xt->getVar("deleteselectedlink_span");            

			// "bs-invisible-button" class need for init hidden in bootstrap
			if( $this->getLayoutVersion() != BOOTSTRAP_LAYOUT) 
				$buttons.= '<a class="rnr-button " href="#" '.$deleteselectedlink_attrs.' '.$deleteselectedlink_span.'>'."削除".'</a> ';		  
			else
				$buttons.= '<a class="' . $bs_button_class . '" disabled href="#" '.$deleteselectedlink_attrs.' '.$deleteselectedlink_span.'>'."削除".'</a> ';		  
		}		
		if( $buttons ) 
		{
			if( $this->getLayoutVersion() != BOOTSTRAP_LAYOUT) 
			{
				$controlsBlocks.= '<span class="rnr-dbebrick ">'
					.'<div class="style1 rnr-bl rnr-b-recordcontrol ">'
					.$buttons
					.'</div>'
				.'</span>';				
			} else {
				$controlsBlocks.= '<span class="rnr-dbebrick ">'
					.$buttons
				.'</span>';				
			}
		}
		
		return $controlsBlocks.'<div class="rnr-dbefiller"></div>';
	}
	
	/**
	 *
	 */
	function showPageAjax() 
	{
		$returnJSON = array();
		$proceedLink = $this->getProceedLink();
		if( !$this->numRowsFromSQL && !$this->inlineAddAvailable() && !$this->recordsDeleted && $proceedLink == '') 
		{
			$returnJSON['success'] = false;
			echo printJSON($returnJSON);
			return;
		}
		
		$this->addControlsJSAndCSS();
		$this->fillSetCntrlMaps();
		
		$returnJSON['controlsMap'] = $this->controlsHTMLMap;
		$returnJSON['viewControlsMap'] = $this->viewControlsHTMLMap;
		$returnJSON['settings'] = $this->jsSettings;
		$this->xt->assign("header",false);
		$this->xt->assign("footer",false);				
		
		$returnJSON['headerCont'] = $proceedLink . $this->getHeaderControlsBlocks();

		if( $this->formBricks["footer"] )
			$returnJSON["footerCont"] = $this->fetchBlocksList( $this->formBricks["footer"], true );
			
		$this->assignFormFooterAndHeaderBricks(false);
		
		$this->xt->prepareContainers();
		
		$returnJSON["html"] = $this->xt->fetch_loaded("body");
		
		$returnJSON['idStartFrom'] = $this->flyId;
		$returnJSON['success'] = true;
		
		$returnJSON["additionalJS"] = $this->grabAllJsFiles();
		$returnJSON["CSSFiles"] = $this->grabAllCSSFiles();

		echo printJSON($returnJSON);
	}

	protected function assignSessionPrefix() 
	{
		$this->sessionPrefix = $this->tName."_preview";	
	}
	
	function showNoRecordsMessage()
	{
		//	show nothing
	}
}
?>