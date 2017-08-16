<?php
$dalTableBPMN_PROCESS = array();
$dalTableBPMN_PROCESS["PRO_UID"] = array("type"=>200,"varname"=>"PRO_UID");
$dalTableBPMN_PROCESS["PRJ_UID"] = array("type"=>200,"varname"=>"PRJ_UID");
$dalTableBPMN_PROCESS["DIA_UID"] = array("type"=>200,"varname"=>"DIA_UID");
$dalTableBPMN_PROCESS["PRO_NAME"] = array("type"=>200,"varname"=>"PRO_NAME");
$dalTableBPMN_PROCESS["PRO_TYPE"] = array("type"=>200,"varname"=>"PRO_TYPE");
$dalTableBPMN_PROCESS["PRO_IS_EXECUTABLE"] = array("type"=>16,"varname"=>"PRO_IS_EXECUTABLE");
$dalTableBPMN_PROCESS["PRO_IS_CLOSED"] = array("type"=>16,"varname"=>"PRO_IS_CLOSED");
$dalTableBPMN_PROCESS["PRO_IS_SUBPROCESS"] = array("type"=>16,"varname"=>"PRO_IS_SUBPROCESS");
	$dalTableBPMN_PROCESS["PRO_UID"]["key"]=true;

$dal_info["Tables__BPMN_PROCESS"] = &$dalTableBPMN_PROCESS;
?>