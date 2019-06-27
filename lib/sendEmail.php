<?php
include_once("class.phpmailer.php");

class clsSendEmail {
    
    public function funcSendEmail($sendTo, $subject, $body, $attachments, $cc, $bcc) {
        include 'GlobalVariables.php';
        $Msg = '';
        
        $mail = new PHPMailer(true); // the true param means it will throw exceptions on errors, which we need to catch
        $mail->IsSMTP();            // telling the class to use SMTP
        
            try {
                $mail->SMTPSecure = "ssl";
                $mail->Host = $gblEmailServer;
                $mail->Port = $gblPort;
                $mail->Username = $gblEmailID;
                $mail->Password = $gblPassword;
                $mail->SMTPKeepAlive = true;
                $mail->Mailer = "smtp";
                $mail->SMTPAuth = true;
                $mail->SMTPDebug = 1;
                $mail->IsHTML(true);
                
                for($c=0;$c<count($sendTo);$c++){
                    $mail->AddReplyTo($sendTo[$c], $sendTo[$c]);
                    $mail->AddAddress($sendTo[$c], $sendTo[$c]);
                }
                
                for($i=0;$i<count($attachments);$i++){
                    $filePath = $attachments[$i];
                    if(file_exists($filePath)){
                        $mail->AddAttachment($filePath);
                    }
                }
                
                $mail->SetFrom($gblEmailID, 'Studio Basic');
                
                $mail->Subject = $subject;
                $mail->AltBody = '';
                $mail->MsgHTML($body);
                
                for($b=0;$b<count($cc);$b++){
                    $mail->AddCC($cc[$b]);
                }
                
                for($a=0;$a<count($bcc);$a++){
                    $mail->AddBCC($bcc[$a]);
                }
               
                $mail->Send();
                $Msg = 'Message Sent OK';
            } catch (phpmailerException $e) {
                $Msg = $e->errorMessage();
            } catch (Exception $e) {
                $Msg = $e->getMessage();
            }
            
        return $Msg;
    }
}
?>
