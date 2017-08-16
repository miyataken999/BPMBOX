<?php
$dalTableBPMN_LANESET = array();
$dalTableBPMN_LANESET["LNS_UID"] = array("type"=>200,"varname"=>"LNS_UID");
$dalTableBPMN_LANESET["PRJ_UID"] = array("type"=>200,"varname"=>"PRJ_UID");
$dalTableBPMN_LANESET["PRO_UID"] = array("type"=>200,"varname"=>"PRO_UID");
$dalTableBPMN_LANESET["LNS_NAME"] = array("type"=>200,"varname"=>"LNS_NAME");
$dalTableBPMN_LANESET["LNS_PARENT_LANE"] = array("type"=>200,"varname"=>"LNS_PARENT_LANE");
$dalTableBPMN_LANESET["LNS_IS_HORIZONTAL"] = array("type"=>16,"varname"=>"LNS_IS_HORIZONTAL");
$dalTableBPMN_LANESET["LNS_STATE"] = array("type"=>201,"varname"=>"LNS_STATE");
	$dalTableBPMN_LANESET["LNS_UID"]["key"]=true;

$dal_info["Tables__BPMN_LANESET"] = &$dalTableBPMN_LANESET;
?>