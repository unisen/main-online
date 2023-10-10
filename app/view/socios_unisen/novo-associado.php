<?php
// Import PHPMailer classes into the global namespace 
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// Include library files 
require 'PHPMailer/Exception.php';
require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';

/* if (isset($_POST)) {

    print_r($_POST);
}  */

//echo "sucesso";


$json = json_decode(file_get_contents("../../view/smtp-config/configs-smtp.json"));
$smtp_configs = $json[0];

$modo = "";

if ($smtp_configs->server_mode == 'on') $modo = 'local';

//echo $modo;


//Variáveis
if (isset($_POST)) {

    $nome = $_POST['nome'];
    $email = $_POST['email'];


    
    if (isset($smtp_configs->subject)) $subject = $smtp_configs->subject;

    $mensagem = "Envio Online<br>$nome<br>$email";

    if ($modo == 'local') $mensagem = "Envio Local <br>$nome<br>$email";

    $data_envio = date('d/m/Y');
    $hora_envio = date('H:i:s');


    if ($modo != 'local') {
        try {

            $mail = new PHPMailer(true);
            $mail->SMTPDebug = $smtp_configs->smtpdebug; // debugging: 1 = errors and messages, 2 = messages only
            $mail->CharSet = $smtp_configs->charset;
            $mail->IsSMTP(); // enable SMTP
            $mail->Host = $smtp_configs->smtp_host; //"br474.hostgator.com.br";
            $mail->SMTPAuth = true; // authentication enabled
            $mail->Username = $smtp_configs->email_login;
            $mail->Password = $smtp_configs->password_login; //"UQU@=OfNdC8E";
            $mail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for Gmail
            $mail->Port = $smtp_configs->smtp_port; // or 587  465
            $mail->setFrom($smtp_configs->email_from, $smtp_configs->subject);
            $mail->addAddress($email, $nome);
            $mail->isHTML(true);
            if (isset($tomador)) {
                $mail->Subject = $subject . " - " . strtoupper($nome);
                //$link = "<a class='confirmar' href='https://www.unisen.com.br/sen/confirmacao.php?u=$tomador&tomador_nome=$tomador_nome&confirmacao=$confirmacao'>CONFIRMAR CADASTRO</a>";
            } else {
                $mail->Subject = $subject . " - " . strtoupper($nome);
                //$link = "<a class='confirmar' href='https://www.unisen.com.br/sen/confirmacao.php?confirmacao=$confirmacao'>CONFIRMAR CADASTRO</a>";
            }
            $mail->Body = $mensagem;
            $mail->send();
            echo "sucesso";
        } catch (Exception $e) {

            # Caso ocorra algum problema o script cairá aqui
            echo "O e-mail não pode ser enviado: {$mail->ErrorInfo}";
        }
    } else {

        $subject = $subject . " - " . strtoupper($nome);
        $message = $mensagem;

        $to = $email;

        // É necessário indicar que o formato do e-mail é html
        $headers  = 'MIME-Version: 1.0' . "\r\n";
        $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

        // More headers
        $headers .= 'From: <cadastros@unisen.com.br>' . "\r\n";
        $headers .= 'Cc: unisen.website@gmail.com' . "\r\n";

        if (mail($to, $subject, $message, $headers)) {
            echo "sucesso";
        } else {
            echo "erro";
        }
    }
} 
