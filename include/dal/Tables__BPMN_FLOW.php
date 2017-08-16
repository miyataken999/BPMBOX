<?php
$dalTableBPMN_FLOW = array();
$dalTableBPMN_FLOW["FLO_UID"] = array("type"=>200,"varname"=>"FLO_UID");
$dalTableBPMN_FLOW["PRJ_UID"] = array("type"=>200,"varname"=>"PRJ_UID");
$dalTableBPMN_FLOW["DIA_UID"] = array("type"=>200,"varname"=>"DIA_UID");
$dalTableBPMN_FLOW["FLO_TYPE"] = array("type"=>200,"varname"=>"FLO_TYPE");
$dalTableBPMN_FLOW["FLO_NAME"] = array("type"=>200,"varname"=>"FLO_NAME");
$dalTableBPMN_FLOW["FLO_ELEMENT_ORIGIN"] = array("type"=>200,"varname"=>"FLO_ELEMENT_ORIGIN");
$dalTableBPMN_FLOW["FLO_ELEMENT_ORIGIN_TYPE"] = array("type"=>200,"varname"=>"FLO_ELEMENT_ORIGIN_TYPE");
$dalTableBPMN_FLOW["FLO_ELEMENT_ORIGIN_PORT"] = array("type"=>3,"varname"=>"FLO_ELEMENT_ORIGIN_PORT");
$dalTableBPMN_FLOW["FLO_ELEMENT_DEST"] = array("type"=>200,"varname"=>"FLO_ELEMENT_DEST");
$dalTableBPMN_FLOW["FLO_ELEMENT_DEST_TYPE"] = array("type"=>200,"varname"=>"FLO_ELEMENT_DEST_TYPE");
$dalTableBPMN_FLOW["FLO_ELEMENT_DEST_PORT"] = array("type"=>3,"varname"=>"FLO_ELEMENT_DEST_PORT");
$dalTableBPMN_FLOW["FLO_IS_INMEDIATE"] = array("type"=>16,"varname"=>"FLO_IS_INMEDIATE");
$dalTableBPMN_FLOW["FLO_CONDITION"] = array("type"=>200,"varname"=>"FLO_CONDITION");
$dalTableBPMN_FLOW["FLO_X1"] = array("type"=>3,"varname"=>"FLO_X1");
$dalTableBPMN_FLOW["FLO_Y1"] = array("type"=>3,"varname"=>"FLO_Y1");
$dalTableBPMN_FLOW["FLO_X2"] = array("type"=>3,"varname"=>"FLO_X2");
$dalTableBPMN_FLOW["FLO_Y2"] = array("type"=>3,"varname"=>"FLO_Y2");
$dalTableBPMN_FLOW["FLO_STATE"] = array("type"=>201,"varname"=>"FLO_STATE");
$dalTableBPMN_FLOW["FLO_POSITION"] = array("type"=>3,"varname"=>"FLO_POSITION");
	$dalTableBPMN_FLOW["FLO_UID"]["key"]=true;

$dal_info["Tables__BPMN_FLOW"] = &$dalTableBPMN_FLOW;
?>