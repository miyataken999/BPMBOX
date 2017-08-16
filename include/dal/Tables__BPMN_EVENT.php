<?php
$dalTableBPMN_EVENT = array();
$dalTableBPMN_EVENT["EVN_UID"] = array("type"=>200,"varname"=>"EVN_UID");
$dalTableBPMN_EVENT["PRJ_UID"] = array("type"=>200,"varname"=>"PRJ_UID");
$dalTableBPMN_EVENT["PRO_UID"] = array("type"=>200,"varname"=>"PRO_UID");
$dalTableBPMN_EVENT["EVN_NAME"] = array("type"=>200,"varname"=>"EVN_NAME");
$dalTableBPMN_EVENT["EVN_TYPE"] = array("type"=>200,"varname"=>"EVN_TYPE");
$dalTableBPMN_EVENT["EVN_MARKER"] = array("type"=>200,"varname"=>"EVN_MARKER");
$dalTableBPMN_EVENT["EVN_IS_INTERRUPTING"] = array("type"=>16,"varname"=>"EVN_IS_INTERRUPTING");
$dalTableBPMN_EVENT["EVN_ATTACHED_TO"] = array("type"=>200,"varname"=>"EVN_ATTACHED_TO");
$dalTableBPMN_EVENT["EVN_CANCEL_ACTIVITY"] = array("type"=>16,"varname"=>"EVN_CANCEL_ACTIVITY");
$dalTableBPMN_EVENT["EVN_ACTIVITY_REF"] = array("type"=>200,"varname"=>"EVN_ACTIVITY_REF");
$dalTableBPMN_EVENT["EVN_WAIT_FOR_COMPLETION"] = array("type"=>16,"varname"=>"EVN_WAIT_FOR_COMPLETION");
$dalTableBPMN_EVENT["EVN_ERROR_NAME"] = array("type"=>200,"varname"=>"EVN_ERROR_NAME");
$dalTableBPMN_EVENT["EVN_ERROR_CODE"] = array("type"=>200,"varname"=>"EVN_ERROR_CODE");
$dalTableBPMN_EVENT["EVN_ESCALATION_NAME"] = array("type"=>200,"varname"=>"EVN_ESCALATION_NAME");
$dalTableBPMN_EVENT["EVN_ESCALATION_CODE"] = array("type"=>200,"varname"=>"EVN_ESCALATION_CODE");
$dalTableBPMN_EVENT["EVN_CONDITION"] = array("type"=>200,"varname"=>"EVN_CONDITION");
$dalTableBPMN_EVENT["EVN_MESSAGE"] = array("type"=>201,"varname"=>"EVN_MESSAGE");
$dalTableBPMN_EVENT["EVN_OPERATION_NAME"] = array("type"=>200,"varname"=>"EVN_OPERATION_NAME");
$dalTableBPMN_EVENT["EVN_OPERATION_IMPLEMENTATION_REF"] = array("type"=>200,"varname"=>"EVN_OPERATION_IMPLEMENTATION_REF");
$dalTableBPMN_EVENT["EVN_TIME_DATE"] = array("type"=>200,"varname"=>"EVN_TIME_DATE");
$dalTableBPMN_EVENT["EVN_TIME_CYCLE"] = array("type"=>200,"varname"=>"EVN_TIME_CYCLE");
$dalTableBPMN_EVENT["EVN_TIME_DURATION"] = array("type"=>200,"varname"=>"EVN_TIME_DURATION");
$dalTableBPMN_EVENT["EVN_BEHAVIOR"] = array("type"=>200,"varname"=>"EVN_BEHAVIOR");
	$dalTableBPMN_EVENT["EVN_UID"]["key"]=true;

$dal_info["Tables__BPMN_EVENT"] = &$dalTableBPMN_EVENT;
?>