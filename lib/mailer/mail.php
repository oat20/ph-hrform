﻿<?PHP
require("class.phpmailer.php");  // ????????? class phpmailer ???????????? ??????????? path

function smtpmail( $email , $subject , $body )
{
    $mail = new PHPMailer();
    $mail->IsSMTP();         
      $mail->CharSet = "utf-8";  // ????????? ???????????? tis-620 ???? windows-874 ????????????????????
    $mail->Host     = "mumail.mahidol.ac.th"; //  mail server ?????
	$mail->Port       = 25;
    $mail->SMTPAuth = false;     //  ??????????????????? ??? SMTP
	#$mail->Username = "";
   // $mail->Password = "";  //  ???????? e-mail ??????????????????

    $mail->From     = "phwww@mahidol.ac.th";  //  account e-mail ???????????????????????
    $mail->FromName = "phwww@mahidol.ac.th"; //  ??????????????? ??????????????????????????
    $mail->AddAddress($email);            // Email ????????????????????(???????????)
    $mail->IsHTML(true);                  // ?? E-mail ??? ???????????????????? tag html ???????? ???? true
    $mail->Subject     =  $subject;        // ?????????????(???????????)
    $mail->Body     = $body;                   // ??????? ???????(???????????)
     $result = $mail->send();
	 $mail->ClearAddresses();       
     return $result;
}

function smtpmail2( $email , $subject , $body, $from='', $fromname='' )
{
    $mail = new PHPMailer();
    $mail->IsSMTP();         
      $mail->CharSet = "utf-8";  // ????????? ???????????? tis-620 ???? windows-874 ????????????????????                        
    $mail->Host     = "mumail.mahidol.ac.th"; //  mail server ?????
	//$mail->Host     = "mail.mahidol.ac.th";
	$mail->Port       = 25;                   // set the SMTP port
    $mail->SMTPAuth = false;     //  ??????????????????? ??? SMTP
    #$mail->Username = "account@yourdomain.com";   //  account e-mail ??????????????????
	#$mail->Username = "chakkapan.cha@mahidol.ac.th";
    #$mail->Password = "**********";  //  ???????? e-mail ??????????????????
	#$mail->Password = "4134179";

    $mail->From     = $from;  //  account e-mail ???????????????????????
    $mail->FromName = $fromname; //  ??????????????? ??????????????????????????
    $mail->AddAddress($email);            // Email ????????????????????(???????????)
    $mail->IsHTML(true);                  // ?? E-mail ??? ???????????????????? tag html ???????? ???? true
    $mail->Subject     =  $subject;        // ?????????????(???????????)
    $mail->Body     = $body;                   // ??????? ???????(???????????)
     $result = $mail->send();
	 $mail->ClearAddresses();       
     return $result;
}

function smtpmail_attach( $email , $subject , $body, $attach='')
{
    $mail = new PHPMailer();
    $mail->IsSMTP();         
      $mail->CharSet = "utf-8";  // ????????? ???????????? tis-620 ???? windows-874 ????????????????????                        
    $mail->Host     = "mumail.mahidol.ac.th"; //  mail server ?????
	//$mail->Host     = "mail.mahidol.ac.th";
	$mail->Port       = 25;                   // set the SMTP port
    $mail->SMTPAuth = false;     //  ??????????????????? ??? SMTP
    #$mail->Username = "account@yourdomain.com";   //  account e-mail ??????????????????
	#$mail->Username = "chakkapan.cha@mahidol.ac.th";
    #$mail->Password = "**********";  //  ???????? e-mail ??????????????????
	#$mail->Password = "4134179";

    $mail->From     = 'phwww@mahidol.ac.th';  //  account e-mail ???????????????????????
    $mail->FromName ='www.ph.mahidol.ac.th'; //  ??????????????? ??????????????????????????
    $mail->AddAddress($email);            // Email ????????????????????(???????????)
    $mail->IsHTML(true);                  // ?? E-mail ??? ???????????????????? tag html ???????? ???? true
    $mail->Subject     =  $subject;        // ?????????????(???????????)
    $mail->Body     = $body;                   // ??????? ???????(???????????)
	
	if($attach!=''){$mail->AddAttachment($attach);}      // attachment
     
	 $result = $mail->send();       
     return $result;
}

function smtpGmail( $email , $subject , $body )
{
    $mail = new PHPMailer();
    $mail->IsSMTP();         
      $mail->CharSet = "utf-8";  // ????????? ???????????? tis-620 ???? windows-874 ????????????????????
	  $mail->SMTPSecure='ssl';                        
	$mail->Host     = "smtp.gmail.com";
	$mail->Port       = 465;                   // set the SMTP port
    $mail->SMTPAuth = true;     //  ??????????????????? ??? SMTP
    $mail->Username = "phmahidol1@gmail.com";   //  account e-mail ??????????????????
    $mail->Password = "023547534";  //  ???????? e-mail ??????????????????

    $mail->From     = "phwww@mahidol.ac.th";  //  account e-mail ???????????????????????
    $mail->FromName = "www.ph.mahidol.ac.th"; //  ??????????????? ??????????????????????????
    $mail->AddAddress($email);            // Email ????????????????????(???????????)
    $mail->IsHTML(true);                  // ?? E-mail ??? ???????????????????? tag html ???????? ???? true
    $mail->Subject     =  $subject;        // ?????????????(???????????)
    $mail->Body     = $body;                   // ??????? ???????(???????????)
     $result = $mail->send();
	 $mail->ClearAddresses();       
     return $result;
}
?>