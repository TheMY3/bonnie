<?php
//Замените настройки на нужные.
$mail_to = 'molchan@web.kai.ua'; //вам потребуется указать здесь Ваш настоящий почтовый ящик, куда должно будет прийти письмо.
$type = 'plain'; //Можно поменять на html; plain означяет: будет присылаться чистый текст.
$charset = 'windows-1251';

include('smtp-func.php');
if ($_REQUEST['message'])
{
   $message = $_REQUEST['message'];
   $subject = $_REQUEST['subject'];
   $mail_from = $_REQUEST['mail_from'];
   $replyto = $_REQUEST['replyto'];
   $headers = "To: \"Administrator\" <$mail_to>\r\n".
              "From: \"$replyto\" <$mail_from>\r\n".
              "Reply-To: $replyto\r\n".
              "Content-Type: text/$type; charset=\"$charset\"\r\n";
   $sended = smtpmail($mail_to, $subject, $message, $headers);

   if (!$sended) echo 'Писмо не удалось отправить. Пожалуйста свяжитесь с администратором сайта по адресу: '.$mail_to;
   else echo 'Письмо было успешно отправлено. В ближайшее Вы получите ответ на него.';
}
else {
  echo 'error';
}
?>