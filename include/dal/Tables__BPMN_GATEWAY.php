<?php
$dalTableBPMN_GATEWAY = array();
$dalTableBPMN_GATEWAY["GAT_UID"] = array("type"=>200,"varname"=>"GAT_UID");
$dalTableBPMN_GATEWAY["PRJ_UID"] = array("type"=>200,"varname"=>"PRJ_UID");
$dalTableBPMN_GATEWAY["PRO_UID"] = array("type"=>200,"varname"=>"PRO_UID");
$dalTableBPMN_GATEWAY["GAT_NAME"] = array("type"=>200,"varname"=>"GAT_NAME");
$dalTableBPMN_GATEWAY["GAT_TYPE"] = array("type"=>200,"varname"=>"GAT_TYPE");
$dalTableBPMN_GATEWAY["GAT_DIRECTION"] = array("type"=>200,"varname"=>"GAT_DIRECTION");
$dalTableBPMN_GATEWAY["GAT_INSTANTIATE"] = array("type"=>16,"varname"=>"GAT_INSTANTIATE");
$dalTableBPMN_GATEWAY["GAT_EVENT_GATEWAY_TYPE"] = array("type"=>200,"varname"=>"GAT_EVENT_GATEWAY_TYPE");
$dalTableBPMN_GATEWAY["GAT_ACTIVATION_COUNT"] = array("type"=>3,"varname"=>"GAT_ACTIVATION_COUNT");
$dalTableBPMN_GATEWAY["GAT_WAITING_FOR_START"] = array("type"=>16,"varname"=>"GAT_WAITING_FOR_START");
$dalTableBPMN_GATEWAY["GAT_DEFAULT_FLOW"] = array("type"=>200,"varname"=>"GAT_DEFAULT_FLOW");
	$dalTableBPMN_GATEWAY["GAT_UID"]["key"]=true;

$dal_info["Tables__BPMN_GATEWAY"] = &$dalTableBPMN_GATEWAY;
?>