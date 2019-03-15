<?php
function Send_Mail($to,$subject,$body,$bcc)
{
require_once(ROOT.'/components/smtp/class.phpmailer.php');
$from       = "udmwork@gmail.com";
$mail       = new PHPMailer();
$mail->IsSMTP(true);            
$mail->IsHTML(true);
$mail->SMTPAuth   = true;                 
$mail->Host       = "ssl://smtp.gmail.com"; 
$mail->Port       =  465;                     
$mail->Username   = "udmwork@gmail.com";  
$mail->Password   = "qweqwe22";  
$mail->SetFrom($from, 'UDMWORK.RU');
$mail->AddReplyTo($from,'UDMWORK.RU');
$mail->CharSet = 'utf-8';
$mail->Subject    = $subject;
$mail->MsgHTML($body);
$address = $to;
$mail->AddAddress($address, $to);

if(is_array($bcc)){
foreach($bcc as $valuedata){
$mail->AddBCC($valuedata);
}
}else{
$mail->AddBCC($bcc);	
}

if($mail->Send())
{
return	$status_mail = "Подтвердите email адрес, перейдя по ссылке в письме на почте. <br>Письмо приходит в течении 20 минут<br>Если письма нет, то проверьте папку СПАМ.";
}
else
{
return	$status_mail = "Отправка письма на Ваш mail не удалась";
}  

}




?>
