<?php
class ViewMapField extends ViewControl
{
	public function showDBValue(&$data, $keylink)
	{
		if( !$this->pageObject)
		{
			return runner_htmlspecialchars($data[$this->field]);
 		}
		elseif($this->pageObject->pageType == PAGE_EXPORT || ($this->pageObject->pageType == PAGE_RPRINT && $this->container->forExport == "excel") ) 
		{
			return runner_htmlspecialchars($data[$this->field]);
 		}
		if($this->pageObject->pageType != PAGE_LIST)
		{
			$mapData = $this->pageObject->addGoogleMapData($this->field, $data);
		}
	
		if($this->pageObject->pageType != PAGE_PRINT && $this->pageObject->pageType != PAGE_MASTER_INFO_PRINT && $this->pageObject->pageType != PAGE_RPRINT && $this->pageObject->pageType != PAGE_REPORT && !($this->pageObject->mode == VIEW_SIMPLE && $this->pageObject->pdfMode))
		{	
			return '<div id="littleMap_'.GoodFieldName($this->field).'_'.$this->pageObject->recId.
				'" style="width:'.
				(!isset($this->pageObject->googleMapCfg['fieldsAsMap']) ? "300" : $this->pageObject->googleMapCfg['fieldsAsMap'][$this->field]['width']).'px; '.
				'height: '.(!isset($this->pageObject->googleMapCfg['fieldsAsMap']) ? "225" : $this->pageObject->googleMapCfg['fieldsAsMap'][$this->field]['height']).'px; '.
				'" class="littleMap"></div>';
		}

		if( $mapData['markers'][0]['lat'] == "" && $mapData['markers'][0]['lng'] == "" )
		{
			switch( getMapProvider() ){
				case GOOGLE_MAPS:
					$location = $mapData['markers'][0]['address'];
					break;
				case OPEN_STREET_MAPS:
					$locationByAddress = getLatLngByAddr($mapData['markers'][0]['address']);
					$location = $locationByAddress["lat"].','.$locationByAddress["lng"];
					break;
				case BING_MAPS:
					$locationByAddress = getLatLngByAddr($mapData['markers'][0]['address']);
					$location = $locationByAddress["lat"].','.$locationByAddress["lng"];
					break;
			}
		}
		else
		{
			$location = $mapData['markers'][0]['lat'].','.$mapData['markers'][0]['lng'];
		}
		
		$icon = $mapData['markers'][0]['mapIcon'];
		$src = $this->getStaticMapURL( $location, $mapData['zoom'], $icon );
			
		return '<img border="0" alt="" src="'.$src.'">';
	}
	
	function getStaticMapURL($location, $zoom, $icon)
	{
		$markerLocation = $location;
		switch( getMapProvider() )
		{
			case GOOGLE_MAPS:
				$src = 'http://maps.googleapis.com/maps/api/staticmap';
				$src2 = '&sensor=false&key='.$this->pageObject->googleMapCfg["APIcode"];
				global $showCustomMarkerOnPrint;
				if( $icon && $showCustomMarkerOnPrint ){
					$here = 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']; 
					$pos = strrpos($here, '/');
					$here = substr($here,0,$pos)."/images/menuicons/".$icon;
					$markerLocation = "icon:".$here."|".$location;
				}
				break;
			case OPEN_STREET_MAPS:
				$src = 'http://staticmap.openstreetmap.de/staticmap.php';
				$src2 = ',ol-marker';
				break;
			case BING_MAPS:
				if( !GetGlobalData("apiGoogleMapsCode","") )
					return;
			
				return 'http://dev.virtualearth.net/REST/v1/Imagery/Map/Road/'.$location.'/'.$zoom.'?
				mapSize='.(!isset($this->pageObject->googleMapCfg['fieldsAsMap']) ? "300" : $this->pageObject->googleMapCfg['fieldsAsMap'][$this->field]['width']).','.
				(!isset($this->pageObject->googleMapCfg['fieldsAsMap']) ? "225" : $this->pageObject->googleMapCfg['fieldsAsMap'][$this->field]['height']).'
				&pp='.$location.';63;&key='.GetGlobalData("apiGoogleMapsCode","");
				break;
		}
		$src.='?center='.$location.'&zoom='.$zoom.'&size='.
			(!isset($this->pageObject->googleMapCfg['fieldsAsMap']) ? "300" : $this->pageObject->googleMapCfg['fieldsAsMap'][$this->field]['width']).'x'.
			(!isset($this->pageObject->googleMapCfg['fieldsAsMap']) ? "225" : $this->pageObject->googleMapCfg['fieldsAsMap'][$this->field]['height']).'&maptype=mobile&markers='.$markerLocation.$src2;
		return $src;
	}
} 
?>