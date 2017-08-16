<?php
$dalTableBPMN_ARTIFACT = array();
$dalTableBPMN_ARTIFACT["ART_UID"] = array("type"=>200,"varname"=>"ART_UID");
$dalTableBPMN_ARTIFACT["PRJ_UID"] = array("type"=>200,"varname"=>"PRJ_UID");
$dalTableBPMN_ARTIFACT["PRO_UID"] = array("type"=>200,"varname"=>"PRO_UID");
$dalTableBPMN_ARTIFACT["ART_TYPE"] = array("type"=>200,"varname"=>"ART_TYPE");
$dalTableBPMN_ARTIFACT["ART_NAME"] = array("type"=>201,"varname"=>"ART_NAME");
$dalTableBPMN_ARTIFACT["ART_CATEGORY_REF"] = array("type"=>200,"varname"=>"ART_CATEGORY_REF");
	$dalTableBPMN_ARTIFACT["ART_UID"]["key"]=true;

$dal_info["Tables__BPMN_ARTIFACT"] = &$dalTableBPMN_ARTIFACT;
?>