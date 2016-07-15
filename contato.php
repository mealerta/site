<?php 
if (isset($_POST['name']) and isset($_POST['email']) and isset($_POST['message']))  {
  $name = $_POST['name'];
  $email = $_POST['email'];
  $message = $_POST['message'];
  
  $email_to = "contato@mealerta.com";
  $email_subject = "Contato Site";

    function died($error) {
        // your error code can go here
        $html .= "Nós pedimos desculpas, mas há erro(s) no seu envio. ";
        $html .= "Veja os erros abaixo.<br /><br />";
        $html .= $error."<br /><br />";
        $html .= "Por favor, volte e ajuste os erros..<br /><br />";
         echo $html;
        die();
    }

    $email_message = "Mais detalhes abaixo.\n\n";

    function clean_string($string) {
      $bad = array("content-type","bcc:","to:","cc:","href");
      return str_replace($bad,"",$string);
    }

    $email_message .= "Nome: ".clean_string($name)."\n";
    $email_message .= "E-mail: ".clean_string($email)."\n";
    $email_message .= "Mensagem: ".clean_string($message)."\n";

    // create email headers
    $headers = 'From: '.$email."\r\n".
    'Reply-To: '.$email."\r\n" .
    'X-Mailer: PHP/' . phpversion();
    @mail($email_to, $email_subject, $email_message, $headers);  

    echo  "Obrigado pelo seu contato. Entraremos em contato com você em breve.";
}   else {
  echo "Desculpe, há um problema com os dados informados.";
}
?>