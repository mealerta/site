<?php

if (isset($_POST['name']) and isset($_POST['email']) and isset($_POST['message']))  {

    require_once('../PHPMailer/PHPMailerAutoload.php');

    $mail = new PHPMailer();
    $mail->isSMTP();
    $mail->SMTPAuth   = true;
    $mail->SMTPSecure = "tls";
    $mail->Host       = "email-smtp.us-east-1.amazonaws.com";
    $mail->Username   = "AKIAIESZISNA2KRWH2FQ";
    $mail->Password   = "AuLlxKoddZHk59QZUXjcXepM9DzsnoDkmDN // aDZSe3j";
    //$mail->SMTPDebug = 3;
    $mail->Port = 587;
    //Ask for HTML-friendly debug output
    //$mail->Debugoutput = 'html';
    $mail->CharSet = 'UTF-8';

    $mail->setFrom('mealerta@mealerta.com', 'mealerta.com');
    $mail->Subject = "Contato Site"; //subject

    //message
    $body = "Nome: ".$_POST['name']."<br>";
    $body .= "E-mail: ".$_POST['email']."<br>";
    $body .= "Mensagem: ".$_POST['message'];
    //$body = eregi_replace("[]",'',$body);
    $mail->msgHTML($body);
    //

    //recipient
    $mail->addAddress("mealerta@mealerta.com", "mealerta.com");

    //Success
    if ($mail->send()) {
    echo "Obrigado pelo seu contato. Entraremos em contato com você em breve.";
    //die; 
    $redirect = "http://www.mealerta.com";
    header("location:$redirect");
    } else {
        echo "E-mail não enviado.\nErro: " . $mail->ErrorInfo;    
    }
} else {
    echo "Desculpe, há um problema com os dados informados.";
}
?>
