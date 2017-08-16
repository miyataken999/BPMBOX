<?php
$dalTableBPMN_LANE = array();
$dalTableBPMN_LANE["LAN_UID"] = array("type"=>200,"varname"=>"LAN_UID");
$dalTableBPMN_LANE["PRJ_UID"] = array("type"=>200,"varname"=>"PRJ_UID");
$dalTableBPMN_LANE["LNS_UID"] = array("type"=>200,"varname"=>"LNS_UID");
$dalTableBPMN_LANE["LAN_NAME"] = array("type"=>200,"varname"=>"LAN_NAME");
$dalTableBPMN_LANE["LAN_CHILD_LANESET"] = array("type"=>200,"varname"=>"LAN_CHILD_LANESET");
$dalTableBPMN_LANE["LAN_IS_HORIZONTAL"] = array("type"=>16,"varname"=>"LAN_IS_HORIZONTAL");
	$dalTableBPMN_LANE["LAN_UID"]["key"]=true;

$dal_info["Tables__BPMN_LANE"] = &$dalTableBPMN_LANE;
?>