<?php

if (isset($_POST['name']) and isset($_POST['email']) and isset($_POST['message']))  {

    require_once('../PHPMailer/class.phpmailer.php');

    $mailer = new PHPMailer();
    $mail->IsSMTP();
    $mail->SMTPAuth   = true;
    $mail->SMTPSecure = "tls";
    $mail->Host       = "email-smtp.us-east-1.amazonaws.com";
    $mail->Username   = "KIAIESZISNA2KRWH2FQ";
    $mail->Password   = "AuLlxKoddZHk59QZUXjcXepM9DzsnoDkmDN // aDZSe3j";

    $mail->SetFrom('mealerta@mealerta.com', 'mealerta.com');
    $mail->Subject = "Contato Site"; //subject

    //message
    $body = "Nome: ".$_POST['name']."\n";
    $body .= "E-mail: ".$_POST['email']."\n";
    $body .= "Mensagem: ".$_POST['message']."\n";
    $body = eregi_replace("[]",'',$body);
    $mail->MsgHTML($body);
    //

    //recipient
    $mail->AddAddress("mealerta@mealerta.com", "mealerta.com");

    //Success
    if ($mail->Send()) {
    echo "Obrigado pelo seu contato. Entraremos em contato com você em breve.";
    //die; 
    sleep(3);
    $redirect = "http://www.mealerta.com";
    header("location:$redirect");
    }

    //Error
    if(!$mail->Send()) {
    echo "E-mail não enviado.\nErro: " . $mail->ErrorInfo;
    }
} else {
    echo "Desculpe, há um problema com os dados informados.";
}
?>
