<?php
date_default_timezone_set('Asia/Calcutta');
ini_set("display_errors", 1);
error_reporting(E_ALL);

include_once("../lib/Utility.php");
include_once("../lib/Ajax.php");
include_once("../lib/sendEmail.php");
include_once("../lib/class.globalfunction.php");


$aj         = new AjaxHandler();
$emailFunc  = new clsSendEmail();
$gblFunc = new GlobalFunction();

$aj->requireParamValues(array("action"));

if ($aj->params->action == "ContactUs") {
    $Subject    = $aj->params->Subject;
    $Name       = $aj->params->Name;
    $Mobile     = $aj->params->Mobile;
    $Email      = $aj->params->Email;
    $Message    = $aj->params->Message;
    
    $SavedAt = date('Y-m-d H:i:s');
     
                    
    $sendTo = array();
    $subject = 'StudioBasic: Contact Us';
    $attachments = array();
    $cc = array();
    $bcc = array();
    
    $html = '<table width="60%" cellpadding="3" cellspacing="3">
                    <tr>
                        <td width="20%">
                            <b>Subject: </b>
                        </td>
                        <td width="40%">
                            <u>' . $Subject .'</u>
                        </td>
                    </tr>
                    <tr>
                        <td width="20%">
                            <b>Name: </b>
                        </td>
                        <td width="40%">
                            <u>' . $Name .'</u>
                        </td>
                    </tr>
                    <tr>
                        <td width="20%">
                            <b>Mobile: </b>
                        </td>
                        <td width="40%">
                            <u>'.$Mobile . '</u>
                        </td>
                    </tr>
                    <tr>
                        <td width="20%">
                            <b>Email : </b>
                        </td>
                        <td width="40%">
                            <u>' . $Email . '</u>
                        </td>
                    </tr>
                    <tr>
                        <td width="20%">
                            <b>Message: </b>
                        </td>
                        <td width="40%">
                            <u>' . $Message . '</u>
                        </td>
                    </tr>
                </table>
                <br/>
                <br/>
                Thanks and Regards<br/><br/>              
                Studio Basic<br/>';
    
    array_push($sendTo, 'peeyushs16@gmail.com');
    
//    $Msg = $emailFunc->funcSendEmail($sendTo, $subject, $html, $attachments, $cc, $bcc, $gblModuleID = 0, $BUID = 1, $fromMail, $fromName);
    $Msg = 'Ok';
    $aj->addResponseData("Message", $Msg);
    $aj->out($Msg);
}

if ($aj->params->action == "ProjectListURL") {
    $TypeID         = $aj->params->TypeID;
    $LocationID     = $aj->params->LocationID;  
    
    $TypeID = $gblFunc->encrypt($TypeID);
    $LocationID = $gblFunc->encrypt($LocationID);
    
    $Msg = 'Ok';
    $aj->addResponseData("Message", $Msg);
    $aj->addResponseData("TypeID", $TypeID);
    $aj->addResponseData("LocationID", $LocationID);
    $aj->out($Msg);
}

$aj->errorOut("Invalid Option");
?>
