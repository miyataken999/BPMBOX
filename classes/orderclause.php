<?php
class OrderField
{
	/**
	 * Index of field in query
	 * @var {int}
	 */
	public $fieldIndex = null;
	
	/**
	 * @var {string}
	 */
	public $orderDirection = '';
	/**
	 * Indicator. True if this field selected for sorting by user
	 * @var {bool}
	 */
	public $userDefined = true;
	
	
	function __construct( $fieldIndex, $orderDirection = 'ASC', $userDefined = true )
	{
		$this->fieldIndex = $fieldIndex;
		$this->orderDirection = $orderDirection == "a" || $orderDirection == "ASC" ? "ASC" : "DESC";
		$this->userDefined = $userDefined;
	}
}

/**
 * OrderClause clause
 */
class OrderClause
{
	/**
	 * Array of fields engaged in sorting
	 * @var {array}
	 */
	public $fieldsList = array();
	
	protected $moveNext = true;	
	protected $sessionPrefix;
	protected $orderIndexes;
	protected $gstrOrderBy;
	protected $pSet;
	
	protected $sortByCtrlIdx = 0;
	
	protected $storedPageOrderByClause;
	protected $requestOrderParams;
	
	protected $sortByCtrlSettings = null;
	
	protected $reoderByHeaderClickingEnabled;
	
	protected $hostPageType;
	
	/**
	 * @constructor 
	 * @param Object pageObject
	 * @param Number sortByCtrlIdx (optional)
	 * @param Boolean moveNext (optional)
	 */
	function __construct( $pageObject, $sortByCtrlIdx = 0, $moveNext = true )
	{
		$this->moveNext = $moveNext;
		
		$this->sessionPrefix = $pageObject->sessionPrefix;
		$this->orderIndexes = $pageObject->gOrderIndexes;
		$this->gstrOrderBy = $pageObject->gstrOrderBy;
		$this->hostPageType = $pageObject->pageType;
		$this->pSet = $pageObject->pSet;
		
		$this->reoderByHeaderClickingEnabled = $pageObject->getLayoutVersion() != BOOTSTRAP_LAYOUT || $this->pSet->hasReorderingByHeader();
		
		$this->sortByCtrlIdx = $sortByCtrlIdx;
		
		if( @$_SESSION[ $this->sessionPrefix."_orderFieldsList" ] ) // previously stored $this->fieldsList
			$this->fieldsList = unserialize( $_SESSION[ $this->sessionPrefix."_orderFieldsList" ] );

		$this->requestOrderParams = @$_SESSION[ $this->sessionPrefix."_orderby" ];	
		$this->storedPageOrderByClause = $_SESSION[ $this->sessionPrefix."_order" ];	
	}
	
	/**
	 * @param Number fieldIndex
	 * @return Number
	 */
	protected function hasFieldInList( $fieldIndex )
	{
		for($i = 0; $i < count( $this->fieldsList ); $i++)
		{
			if( $this->fieldsList[ $i ]->fieldIndex == $fieldIndex )
				return $i;
		}
		
		return -1;
	}
	
	/**
	 * Add field to fieldsList or update field's order data
	 * @param Number fieldIndex
	 * @param String orderDirection
	 * @param Boolean userDefined
	 */
	protected function addField( $fieldIndex, $orderDirection, $userDefined = true )
	{
		$direction = $orderDirection == "a" ? "ASC" : "DESC";
		$fieldPosition = $this->hasFieldInList( $fieldIndex );
		
		if( $fieldPosition < 0 )
			$this->fieldsList[] = new OrderField( $fieldIndex, $direction, $userDefined );
		else
		{
			if( $userDefined )
			{
				$this->fieldsList[ $fieldPosition ]->orderDirection = $direction;
				$this->fieldsList[ $fieldPosition ]->userDefined = $userDefined;
			}
		}
	}
	
	/**
	 * @return Array
	 */	
	protected function removeNonUserDefinedFields()
	{
		$newFieldsArray = array();
		
		for($i = 0; $i < count( $this->fieldsList ); $i++)
		{
			if( $this->fieldsList[ $i ]->userDefined )
				$newFieldsArray[] = $this->fieldsList[ $i ];
		}
		
		$this->fieldsList = $newFieldsArray;
	}
	
	/**
	 * Build sorting order params
	 * @return String
	 */
	public function buildOrderParams() 
	{	
		$this->adjustFiledList();
		
		if( $this->pSet->hasSortByDropdown() )
		{
			if( $this->sortByCtrlIdx )
				return $this->getOrderClauseBySortByCtrlIdx( $this->sortByCtrlIdx - 1 );
			
			if( !count( $this->orderIndexes ) && ( !$this->reoderByHeaderClickingEnabled || !$this->sortedByColumnHeaders() ) )
				return $this->getOrderClauseBySortByCtrlIdx( 0 );
		}	
			
		return $this->getOrderByClauseString();
	}

	/**
	 * @param Number
	 * @return String
	 */
	public function getOrderClauseBySortByCtrlIdx( $idx )
	{	
		$orderClause = "";
		
		$sortSettings = $this->getSortByControlSettings();
		if( !$sortSettings[ $idx ] )
			return $this->gstrOrderBy;
		
		$indices = array();
		foreach( $sortSettings[ $idx ]["fields"] as $fData)
		{
			$fIdx = $this->pSet->getFieldIndex( $fData["field"] );
			$indices[] = $fIdx;
			$orderClause.= ($orderClause != "" ? ", " : " ORDER BY ").$fIdx." ".($fData["desc"] ? "DESC" : "ASC");				
		}
		
		if( $orderClause && $this->moveNext )
		{
			// Add key fields to the order clause
			$keys = $this->getKeyFieldsForSortOrder();
			
			for($i = 0; $i < count( $keys ); $i++)
			{
				if( !in_array( $keys[ $i ] , $indices ) )
					$orderClause.= ($orderClause != "" ? ", " : "").$keys[ $i ]." ASC";
			}			
		}		
		
		return $orderClause;	
	}	
	
	/**
	 * sorting line for a request
	 * @return String
	 */
	protected function getOrderByClauseString()
	{
		if( $_SESSION[ $this->sessionPrefix."_noNextPrev" ] == 1 )
			return $this->gstrOrderBy;
		
		$orderByClauseParts = array();
		
		for($i = 0; $i < count( $this->fieldsList ); $i ++)
		{
			if( !$this->pSet->GetFieldByIndex( $this->fieldsList[ $i ]->fieldIndex ) )
				continue;
			
			$orderByClauseParts[] = $this->fieldsList[ $i ]->fieldIndex." ".$this->fieldsList[ $i ]->orderDirection;
		}
		
		$orderByClausePart = implode( ", ", $orderByClauseParts );
		return $orderByClausePart ? " ORDER BY ".$orderByClausePart : $orderByClausePart;
	}
	
	/**
	 * Get an array of order params for URL	
	 * @return Array
	 */
	public function getOrderByParams()
	{
		$urlList = array();
		foreach ( $this->fieldsList as $field )
		{
			$fieldName = $this->pSet->GetFieldByIndex( $field->fieldIndex );
			if ( !$field->userDefined || !$fieldName )
				continue;

			$urlList[] = ( $field->orderDirection == "ASC" ? "a":"d") . $fieldName;
		}
		
		return $urlList;
	}
	
	/**
	 * Adjust fieldsList and corresponding properties
	 */
	public function adjustFiledList()
	{
		//if( !strlen( $this->storedPageOrderByClause ) )
		if( !count( $this->fieldsList ) )
			$this->buildFieldsArrayForSortOrder();
		
		if( $this->requestOrderParams || $this->sortByCtrlIdx )
			$this->extractFieldsArrayForSortingFromSession();
				
		$_SESSION[ $this->sessionPrefix."_orderFieldsList" ] = serialize( $this->fieldsList );	
	}
	
	/**
	 * getKeyFieldsForSortOrder
	 * Return arrray of keyfields indexes for sort order
	 * return {array}
	 */
	protected function getKeyFieldsForSortOrder()
	{
		if( @$_SESSION[ $this->sessionPrefix."_key" ] )
		{
			$keys = $_SESSION[ $this->sessionPrefix."_key" ];
		}
		else
		{
			$keys = array();
			$tKeys = $this->pSet->getTableKeys();
			for($i = 0; $i < count($tKeys); $i ++) 
			{
				if( $this->pSet->getFieldIndex( $tKeys[ $i ] ) )
					$keys[] = $this->pSet->getFieldIndex( $tKeys[ $i ] );
			}
			
			$_SESSION[ $this->sessionPrefix."_key" ] = $keys;
		}
		
		return $keys;
	}
	
	/**
	 * @param {array} fields for sorting defined by user 
	 */
	protected function buildFieldsArrayForSortOrder()
	{
		$this->fieldsList = array();
		
		if( count( $this->orderIndexes ) ) 
		{
			for($i = 0; $i < count( $this->orderIndexes ); $i ++)
			{
				$this->fieldsList[] = new OrderField( $this->orderIndexes[ $i ][0], $this->orderIndexes[ $i ][1], false );
			}
		}
		elseif( $this->gstrOrderBy != '' )
		{
			$_SESSION[ $this->sessionPrefix."_noNextPrev" ] = 1;
		}
		
		$this->addKeyFieldsToSortOrder();			
	}
	
	/**
	 * extractFieldsArrayForSortingFromSession
	 */
	protected function extractFieldsArrayForSortingFromSession()
	{
		if ( @$_REQUEST["orderby"] || !@$_REQUEST["a"] && !@$_REQUEST["q"] && !@$_REQUEST["qs"] && !@$_REQUEST["goto"] && !@$_REQUEST["pagesize"] && !@$_REQUEST["f"] )
		{
			if( @$_REQUEST["ctrl"] ) 
			{
				$this->removeNonUserDefinedFields();
			} 
			else
			{
				$this->fieldsList = array();
				$_SESSION[ $this->sessionPrefix."_noNextPrev" ] = 0;
			}
			
			if( !isset( $_SESSION[ $this->sessionPrefix."_orderby" ] ) )
				return;
			
			$inputOrders = explode(";", $_SESSION[ $this->sessionPrefix."_orderby" ]);
			
			foreach ( $inputOrders as $inOrder )
			{
				$order_field = $this->pSet->getFieldByGoodFieldName( GoodFieldName( substr($inOrder, 1) ) );
				$order_dir = substr($inOrder, 0, 1);
				$order_ind = $this->pSet->getFieldIndex( $order_field );
				if ( !$order_ind ) 
					continue;
				
				$this->addField( $order_ind, $order_dir );
				$this->addKeyFieldsToSortOrder();
			}
			
			unset( $_SESSION[ $this->sessionPrefix."_orderby" ] );
		}
	}
	
	/**
	 * addKeyFieldsToSortOrder
	 * Add table keyfields to the array which contains fields for sort
	 */
	protected function addKeyFieldsToSortOrder()
	{
		$keys = $this->getKeyFieldsForSortOrder();
		
		if( count($keys) && $this->moveNext ) 
		{
			for($i = 0; $i < count($keys); $i++)
			{ 
				$this->addField( $keys[ $i ], "a", false );
			}
		}
	}
	
	/**
	 * A wrapper for fieldsList prop
	 * @return Array
	 */
	public function getOrderFieldsDataForAttrs()
	{
		$sortByFieldsData = null;
		$sortByCtrlIdx = $this->getSortByIdxAdjusted();
		if( $sortByCtrlIdx != -1 )
		{
			$sortSettings = $this->getSortByControlSettings();
			$sortByFieldsData = $sortSettings[ $sortByCtrlIdx ]["fields"];
		}			
			
		$orderData = array();
		$orderDataStrings = array();
		$indices = array();
		foreach( $this->fieldsList as $fData )
		{
			$orderDataStrings[] = $fData->fieldIndex." ".$fData->orderDirection;
			$orderData[] = array( "fieldIndex" => $fData->fieldIndex, "orderDirection" => $fData->orderDirection, "setIcon" => $fData->userDefined );
		}
		
		if( !is_array( $sortByFieldsData ) )
		{		
			// default order by
			for( $i = 0; $i < count( $this->orderIndexes ); $i++ )
			{
				$pos = array_search( $this->orderIndexes[ $i ][0]." ".$this->orderIndexes[ $i ][1], $orderDataStrings );
				if( $pos !== FALSE )
					$orderData[ $pos ]["setIcon"] = true;
			}
			
			return $orderData;
		}
		
		foreach( $sortByFieldsData as $sFData )
		{
			$fieldIndex = $this->pSet->getFieldIndex( $sFData["field"] );
			$orderDirection = ( $sFData["desc"] ? "DESC" : "ASC" );
			
			$pos = array_search( $fieldIndex." ".$orderDirection , $orderDataStrings );
			if( $pos === FALSE )
				$orderData[] = array( "fieldIndex" => $fieldIndex, "orderDirection" => $orderDirection, "setIcon" => true );
			else
				$orderData[ $pos ][ "setIcon" ] = true;	
		}		
		
		return $orderData;
	}
	
	/**
	 * @return Array
	 */
	public function getOrderFieldsData()
	{
		$arrFieldForSort = array();
		$arrHowFieldSort = array();
		for($i = 0; $i < count($this->fieldsList); $i++)
		{
			$arrFieldForSort[] = $this->fieldsList[ $i ]->fieldIndex; 
			$arrHowFieldSort[] = $this->fieldsList[ $i ]->orderDirection; 
		}
		
		return array( 
			"fieldsForSort" => $arrFieldForSort,
			"howToSortData" => $arrHowFieldSort
		);
	}
	
	/**
	 * @return Array
	 */
	public function getSortByControlSettings()
	{
		if( $this->sortByCtrlSettings )
			return $this->sortByCtrlSettings;
			
		$sortSettings = $this->pSet->getSortControlSettingsJSONString();
		$sortSettings = my_json_decode( $sortSettings );
		if( !$sortSettings || !count( $sortSettings ) )
		{
			$sortSettings = array();
			
			foreach( $this->pSet->getListFields() as $fName ) 
			{
				if( IsBinaryType( $this->pSet->getFieldType( $fName ) ) )
					continue;
					
				$sortSettings[] = array( "label" => "", "fields" => array( array( "field" => $fName, "desc" => false, "labelOnly" => true ) ) );
			}
		}	
		
		$this->sortByCtrlSettings = $sortSettings;
		
		return $sortSettings;
	}

	/**
	 * @return Array
	 */
	public function getOrderClauseFieldsData()
	{
		$orderData = array();
		
		if( $this->sortByCtrlIdx )
		{			
			$sortSettings = $this->getSortByControlSettings();
			$sortByFieldsData = $sortSettings[ $this->sortByCtrlIdx - 1 ]["fields"];
			foreach( $sortByFieldsData as $fData)
			{
				$orderData[] = array( "fieldIndex" => $this->pSet->getFieldIndex( $fData["field"] ), "orderDirection" => ($fData["desc"] ? "DESC" : "ASC" ) );				
			}
			
			return $orderData;
		}
		
		if( $this->sortedByColumnHeaders() )
		{	
			foreach( $this->fieldsList as $fData )
			{
				$orderData[] = array( "fieldIndex" => $fData->fieldIndex, "orderDirection" => $fData->orderDirection );
			}
			
			return $orderData;
		}

		$sortByFieldsData = null;
		$sortByCtrlIdx = $this->getSortByIdxAdjusted();
		if( $sortByCtrlIdx != -1 )
		{
			$sortSettings = $this->getSortByControlSettings();
			$sortByFieldsData = $sortSettings[ $sortByCtrlIdx ]["fields"];
		}

		$indices = array();
		foreach( $sortByFieldsData as $sFData )
		{
			$fieldIndex = $this->pSet->getFieldIndex( $sFData["field"] );
			$orderDirection = ( $sFData["desc"] ? "DESC" : "ASC" );
		
			$indices[] = $fieldIndex;
			$orderData[] = array( "fieldIndex" => $fieldIndex, "orderDirection" => $orderDirection );	
		}

		if( count( $orderData ) && $this->moveNext )
		{
			// Add key fields to the order clause
			$keys = $this->getKeyFieldsForSortOrder();
			
			for($i = 0; $i < count( $keys ); $i++)
			{
				if( !in_array( $keys[ $i ] , $indices ) )
					$orderData[] =  array( "fieldIndex" => $keys[ $i ], "orderDirection" => "ASC" );
			}					
		}

		return $orderData;		
	}
	
	/**
	 * @return Boolean
	 */
	public function sortedByColumnHeaders()
	{
		for($i = 0; $i < count($this->fieldsList); $i++)
		{
			if( $this->fieldsList[ $i ]->userDefined )
				return true; 
		}
			
		return false;
	}
	
	/**
	 * @param Number idx
	 * @param String order
	 * @return String
	 */
	protected function orderFieldDataString( $idx, $order )
	{			
		return $idx." ".$order;
	}
	
	/**
	 * @return Number
	 */
	public function getSortByIdxAdjusted()
	{
		if( $this->hostPageType == PAGE_LIST && !$this->pSet->hasSortByDropdown() )
			return -1;
		
		if( $this->sortByCtrlIdx )
			return ( $this->sortByCtrlIdx - 1 );
		
	
		$orderMarkParts = array();	
		
		if( !$this->sortedByColumnHeaders() )
		{		
			// default
			if( !count( $this->orderIndexes ) )
				return 0;

			for($i = 0; $i < count( $this->orderIndexes ); $i ++)
			{
				$orderMarkParts[] = $this->orderFieldDataString( $this->orderIndexes[ $i ][0], $this->orderIndexes[ $i ][1] );
			}
		} 
		else
		{
			for($i = 0; $i < count( $this->fieldsList ); $i++)
			{
				$fieldName = $this->pSet->GetFieldByIndex( $this->fieldsList[ $i ]->fieldIndex );
				if( !$this->fieldsList[ $i ]->userDefined || !$fieldName )
					continue;

				$orderMarkParts[] = $this->orderFieldDataString( $this->fieldsList[ $i ]->fieldIndex, $this->fieldsList[ $i ]->orderDirection );
			}
		}
		
		$orderMark = implode(";", $orderMarkParts);	
		
		$sortSettings = $this->getSortByControlSettings();
		foreach( $sortSettings as $idx => $sData )
		{	
			$markParts = array();
			foreach( $sData["fields"] as $fData )
			{
				$markParts[] = $this->orderFieldDataString( $this->pSet->getFieldIndex( $fData["field"] ), $fData["desc"] ? "DESC" : "ASC" );
			}			
			
			if( implode(";", $markParts) == $orderMark )
				return $idx;
		}
		
		return -1; //empty opt
	}
}
?>