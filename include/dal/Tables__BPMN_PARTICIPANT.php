<?php
$dalTableBPMN_PARTICIPANT = array();
$dalTableBPMN_PARTICIPANT["PAR_UID"] = array("type"=>200,"varname"=>"PAR_UID");
$dalTableBPMN_PARTICIPANT["PRJ_UID"] = array("type"=>200,"varname"=>"PRJ_UID");
$dalTableBPMN_PARTICIPANT["PRO_UID"] = array("type"=>200,"varname"=>"PRO_UID");
$dalTableBPMN_PARTICIPANT["LNS_UID"] = array("type"=>200,"varname"=>"LNS_UID");
$dalTableBPMN_PARTICIPANT["PAR_NAME"] = array("type"=>200,"varname"=>"PAR_NAME");
$dalTableBPMN_PARTICIPANT["PAR_MINIMUM"] = array("type"=>3,"varname"=>"PAR_MINIMUM");
$dalTableBPMN_PARTICIPANT["PAR_MAXIMUM"] = array("type"=>3,"varname"=>"PAR_MAXIMUM");
$dalTableBPMN_PARTICIPANT["PAR_NUM_PARTICIPANTS"] = array("type"=>3,"varname"=>"PAR_NUM_PARTICIPANTS");
$dalTableBPMN_PARTICIPANT["PAR_IS_HORIZONTAL"] = array("type"=>16,"varname"=>"PAR_IS_HORIZONTAL");
	$dalTableBPMN_PARTICIPANT["PAR_UID"]["key"]=true;

$dal_info["Tables__BPMN_PARTICIPANT"] = &$dalTableBPMN_PARTICIPANT;
?>