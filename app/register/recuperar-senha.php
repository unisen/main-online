<?php session_start();

// Import PHPMailer classes into the global namespace 
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// Include library files 
require 'PHPMailer/Exception.php';
require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';

if (isset($_SESSION["url_aplicativo"])) {
    $unisen_url = $_SESSION["url_aplicativo"];
}

// convert illegal input value to ligal value formate
function legal_input($value) {
    $value = trim($value);
    $value = stripslashes($value);
    $value = htmlspecialchars($value);
    return $value;
}

$json = json_decode(file_get_contents("../view/smtp-config/configs-smtp.json"));
$smtp_configs = $json[0];

$modo = "";

if ($smtp_configs->server_mode == 'on') $modo = 'local';

//echo $modo;

if (!isset($_POST)) header("Location: login.php");
//Variáveis
if (isset($_POST)) {

    /* $data_envio = date('d/m/Y');
    $hora_envio = date('H:i:s');
    $submission_date = date('d/m/Y H:i'); */
   
    require_once '../config/database/conexao.php';
    if(!isset($_POST['cpf'])) header("Location: login.php");

    $cpf = $_POST['cpf'];

    $sql_cadastrante_logado = "SELECT * FROM tbl_cadastrantes WHERE CPF = '$cpf'";
    $dados_do_cadastrante = mysqli_query($con,$sql_cadastrante_logado);

    // Verifica se existe o email  
    if(mysqli_num_rows($dados_do_cadastrante)>0) {
        $cadastrante = mysqli_fetch_array($dados_do_cadastrante, MYSQLI_ASSOC);

        //echo "sucesso";
        //print_r($cadastrante);
        if ($cadastrante['STATUS'] == 'novo') {
            echo "Associado sem confirmação de email no Cadastro!";
            die();
        }
    }
    else {
        echo "Não existe este associado cadastrado!";
        die();
    }

    
    //die();     
    
    $nome = $cadastrante['NOME COMPLETO'];
    $tomador = $nome;
    
    if ($cadastrante['CRM'] != '') {
        $crm_completo = $cadastrante['CRM'];
        $crm_uf = substr($crm_completo, -2);
        $crm = str_replace($crm_uf, "", $crm_completo);
    }   

    //$senha = password_hash(legal_input($_POST['senha']), PASSWORD_BCRYPT); //sha1($_POST['senha']);
    //$senha_confirma = $_POST['senha-confirma'];

    

    $confirmacao = $cadastrante['confirmacao'];
    
    $email = $cadastrante['E-MAIL'];

    $link_confirm = $unisen_url . "app/register/atualiza-senha.php?confirmacao=$confirmacao";

    $protocolo = (isset($_SERVER['HTTPS']) && ($_SERVER['HTTPS']=="on") ? "https" : "http");
    $url = '://'.$_SERVER['HTTP_HOST'].$link_confirm;

    $link_atualizar = $protocolo.$url; 

    $link = "<br><a class='confirmar' href='$link_atualizar'>DEFINIR UMA NOVA SENHA</a>";

    $corpo_mensagem = "
    <head>
    <meta charset='UTF-8' />
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>Recuperação de Senha do Associado</title>
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
                <legend><div>RECUPERAÇÃO DE SENHA<br><br>Confirmação</div></legend>
                <div class='label'>NOME COMPLETO</div>
                <div class='input'>".$nome."</div>
                <div class='label'>E-MAIL</div>
                <a class='input'>".$email."</a>
                <div class='crm-container'>
                    <div class='crm'>
                        <div class='label'>CRM</div>
                        <div class='input'>".$crm."</div>
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
                $mail->Subject = "UNISEN - SOLICITAÇÃO DE RECUPERAÇÃO DE SENHA"; //$subject . " - " . strtoupper($nome) . $link;
                //$link = "<a class='confirmar' href='https://www.unisen.com.br/sen/confirmacao.php?u=$tomador&tomador_nome=$tomador_nome&confirmacao=$confirmacao'>CONFIRMAR CADASTRO</a>";
            } else {
                $mail->Subject = "UNISEN - SOLICITAÇÃO DE RECUPERAÇÃO DE SENHA"; //$subject . " - " . strtoupper($nome);
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

        $subject = "UNISEN - SOLICITAÇÃO DE RECUPERAÇÃO DE SENHA"; //$subject . " - " . strtoupper($nome);
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
else {
    header("Location: login.php");
}
