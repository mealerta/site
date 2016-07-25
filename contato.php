  1 <?php
  2 if (isset($_POST['name']) and isset($_POST['email']) and isset($_POST['message']))  {
  3 
  4   require_once('../PHPMailer/class.phpmailer.php');
  5 
  6   $mailer = new PHPMailer();
  7   $mail->IsSMTP();
  8   $mail->SMTPAuth   = true;
  9   $mail->SMTPSecure = "tls";
 10   $mail->Host       = "email-smtp.us-east-1.amazonaws.com";
 11   $mail->Username   = "KIAIESZISNA2KRWH2FQ";
 12   $mail->Password   = "AuLlxKoddZHk59QZUXjcXepM9DzsnoDkmDN // aDZSe3j";
 13 
 14   $mail->SetFrom('mealerta@mealerta.com', 'mealerta.com'; //from (verified email address)
 15   $mail->Subject = "Contato Site"; //subject
 16 
 17   //message
 18   $body = "Nome: ".$_POST['name']"\n";
 19   $body .= "E-mail: ".$_POST['email']"\n";
 20   $body .= "Mensagem: ".$_POST['message']"\n";
 21   $body = eregi_replace("[]",'',$body);
 22   $mail->MsgHTML($body);
 23   //
 24 
 25   //recipient
 26   $mail->AddAddress("mealerta@mealerta.com", "mealerta.com");
 27 
 28   //Success
 29   if ($mail->Send()) {
 30     echo "Obrigado pelo seu contato. Entraremos em contato com você em breve.";
 31     //die; 
 32     sleep(3);
 33     $redirect = "http://www.mealerta.com";
 34     header("location:$redirect");
 35   }
 36 
 37   //Error
 38   if(!$mail->Send()) {
 39     echo "E-mail não enviado.\nErro: " . $mail->ErrorInfo;
 40   }
 41 } else {
 42   echo "Desculpe, há um problema com os dados informados.";
 43 }
 44 ?>

