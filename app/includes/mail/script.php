<?php session_start();
/* if (!isset($_POST)) {
    header("location: ../../login/");
    exit;
}

if(isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: ../../login/");
    exit;
}  */

if (isset($_SESSION["url_aplicativo"])) {
    $unisen_url = $_SESSION["url_aplicativo"];
}

// Import PHPMailer classes into the global namespace 
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// Include library files 
require 'PHPMailer/Exception.php';
require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';

$json = json_decode(file_get_contents("../../view/smtp-config/configs-smtp.json"));
$smtp_configs = $json[0];

$modo = "";

if ($smtp_configs->server_mode == 'on') $modo = 'local';


//Variáveis
if (isset($_POST)) {

    $id = $_POST['id'];
    $nome = $_POST['nome'];
    $tomador = $_POST['tomador'];
    $email = $_POST['email'];

    $crm = $_POST['crm'];    
   
   
    $crm_uf = substr($crm, -2);
    $crm_num = str_replace($crm_uf, "", $crm);
    
    $cpf = $_POST['cpf'];

    $crm_cadastro = $crm;

    $confirmacao = uniqid().$crm;

    $link_confirm = $unisen_url . "app/register/confirmacao.php?tomador_nome=$nome&confirmacao=$confirmacao";

    $protocolo = (isset($_SERVER['HTTPS']) && ($_SERVER['HTTPS']=="on") ? "https" : "http");
    $url = '://'.$_SERVER['HTTP_HOST'].$link_confirm;

    $link_atualizar = $protocolo.$url; 
    
    $link = "<br><a class='confirmar' href='$link_atualizar '>CONFIRMAR CADASTRO</a>";

    $corpo_mensagem = "
    <head>
    <meta charset='UTF-8' />
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>Confirmação - Cadastro de Usuário</title>
    <style>
        * {
            box-sizing: border-box;
        }
    
        body, html {
            display: flex;
            flex-flow: row wrap;
            justify-content: center;
            align-items: center;
            font-family: arial,helvetica,sans-serif;
            background-color: black;
            width: 100%;
            height: 100%;
        }
        .form {
            display: flex;
            flex-flow: row wrap;
            justify-content: center;
            align-items: center;
            margin: auto;
            width: 100%;
            max-width: 350px;
            padding: 15px 3px;
            background: white;
            border-radius: 15px;
        }
        fieldset {
            border: 0px solid green;
            background-color: none;
            width: 100%;
            height: 100%;
            margin-top: 0;
        }
        .input {
            display: flex;
            width: 100%;
            height: 22px;
            font-size: 0.9rem;
            margin: 1px;
            padding: 5px;
            text-decoration: none;
            border-bottom: 1px solid black;
            color: black;
        }
        
        .input:focus {
            outline: none;
        }
        .placa {
            font-size: 12px;
            color: white;
            padding: 5px 0px ;
        }
        legend {
            border: 1px solid green;
            padding: 10px;
            text-align: center;
            font-weight: normal;
            font-size: 1rem;
            background-color: #083b0f;
            border-radius: 5px;
            width: 100%;
            color: white;
        }
        
        div.crm-container label {
            margin:0 0 3px 0;
            padding:0;
        }    
        div.crm-container {
            margin: 0 0 0 0;
        }
        div.crm {
            display: inline-block;
            width: 60%;
            height: 100%;
            padding:0;
        }
        div.uf {
            display: inline-block;
            width: 37%;
            height: 100%;
            margin: 0;
            padding:0;
            float: right;
        }
        
        .label {
            display: flex;
            color: black;
            background-color: none;
            margin: 20px 0px 3px 0px ;
            padding:0px;
            width: 100%;
            font-size: 0.9rem;    
            font-weight: bold;
        }
        .confirmar {
            display: flex;
            background-color: white; 
            justify-content: center;
            text-align: center;
            color: black;
            margin: 30px auto 5px auto;
            width: 60%;
            border-radius: 5px;
            cursor: pointer;
            border: 0.3px solid grey;
            box-shadow: 0px 0px 5px grey;
            padding: 3%;
            text-decoration: none;
            font-size: 0.8rem;
        }
        .confirmar:hover {
            background-color: darkgreen;        
            color: white;
        }

        </style>
    </head>
    <body>   
        <div class='form'>
            <fieldset>
                <legend><div>CADASTRO DE USUÁRIO<br><br>Confirmação</div></legend>
                <div class='label'>NOME COMPLETO</div>
                <div class='input'>".$nome."</div>
                <div class='label'>E-MAIL</div>
                <a class='input'>".$email."</a>
                <div class='crm-container'>
                    <div class='crm'>
                        <div class='label'>CRM</div>
                        <div class='input'>".$crm_num."</div>
                    </div>
                    <div class='uf'>
                        <div class='label'>UF</div>
                        <div class='input'>".$crm_uf."</div>
                    </div>
                </div>
                $link                
            </fieldset>
        </div>
    </body>";

    
    if (isset($smtp_configs->subject)) $subject = $smtp_configs->subject;

    $mensagem = "Envio Online<br>$nome<br>$email";

    if ($modo == 'local') $mensagem = "Envio Local <br>$nome<br>$email";

    $data_envio = date('d/m/Y');
    $hora_envio = date('H:i:s');
    $submission_date = date('d/m/Y H:i');

    require_once '../../config/database/conexao.php';
    
    $sql_update_confirmacao = "UPDATE `tbl_cadastrantes` SET `confirmacao`='$confirmacao', `STATUS`='novo' WHERE ID = $id";
    
    $resp_update = mysqli_query ($con,$sql_update_confirmacao);

    /* if ($resp_insert) {
        echo $resp_insert;
    } */

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
                $mail->Subject = "UNISEN - SOLICITAÇÃO DE INCLUSÃO DE ASSOCIADO PARTICIPANTE"; //$subject . " - " . strtoupper($nome) . $link;
                //$link = "<a class='confirmar' href='https://www.unisen.com.br/sen/confirmacao.php?u=$tomador&tomador_nome=$tomador_nome&confirmacao=$confirmacao'>CONFIRMAR CADASTRO</a>";
            } else {
                $mail->Subject = "UNISEN - SOLICITAÇÃO DE INCLUSÃO DE ASSOCIADO PARTICIPANTE"; //$subject . " - " . strtoupper($nome);
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

        $subject = "UNISEN - SOLICITAÇÃO DE INCLUSÃO DE ASSOCIADO PARTICIPANTE"; //$subject . " - " . strtoupper($nome);
        $message = $corpo_mensagem; //$mensagem //. $link;

        $to = $email;

        // É necessário indicar que o formato do e-mail é html
        $headers  = 'MIME-Version: 1.0' . "\r\n";
        $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

        // More headers
        $headers .= 'From: <'. $smtp_configs->headers_from . '>' . "\r\n";
        $headers .= 'Cc: ' . $smtp_configs->headers_cc . "\r\n";

        if (mail($to, $subject, $message, $headers)) {
            echo "sucesso";
        } else {
            echo "erro";
        }
    }
}
