<?php
if (!isset($_SESSION['confirmacao']) && !isset($_SESSION["url_aplicativo"])) {
    header('location: login.php');
    exit;
} ?>
<!DOCTYPE html>
<!-- saved from url=(0043)https://unisen.com.br/cadastro/obrigado.php -->
<html lang="pt-BR"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AVISO - Cadastro de Usuário | &gt;</title>
    <link rel="icon" href="../../favicon.ico" type="image/x-icon">
    <link rel="shortcut icon" href="../../favicon.ico" />
    <meta http-equiv="refresh" content="5; URL='login.php'"/>
    
    <style>
       @import url('https://cdn-uicons.flaticon.com/uicons-bold-rounded/css/uicons-bold-rounded.css');
        * {
            box-sizing: border-box;
        }
       
        body , html {
            display: flex;
            flex-flow: row wrap;
            justify-content: center;
            align-items: center;
            font-family: arial,helvetica,sans-serif;
            background-color: #3E4532;
            margin: 0;
            width: 100%;
            height: 100%;
        }
        p {
            margin: auto;
            text-align: center;
            font-weight: bold;
            width: 100%;
        }
        .ok {
            display: block;
            width: 100%;
            text-align: center;
            background-color: #181A13;
            padding: 20px;
            width: 90px;
            border-radius: 50%;
            margin: auto;
        }
        i {
        display:block;
        font-size: 30px;
        color: #D1E7A7;
        margin: 3px 0 0 5px;
        }
        .form {
            display: flex;
            flex-flow: row wrap;
            justify-content: center;
            align-items: center;
            margin: 0px auto;
            width: 100%;
            max-width: 500px;
            max-height:600px;
            height: 95%;
            padding: 0px 3px;
            background: white;
            border-radius: 3px;
        }
        button {
            display: block;
            background-color: white; 
            text-align: center;
            color: black;
            margin: 20px auto 0 auto;
            width: 70%;
            border-radius: 5px;
            cursor: pointer;
            box-shadow: 0px 0px 5px grey;
            padding: 3%;
            border: none;
            text-decoration: none;
            font-size: 0.8rem;
        }
        button:hover {
            background-color: darkgreen;        
            color: white;
        }
        small.sbottom {
            font-size: 0.7rem;
            color: darkgrey;
            padding: 0px 40px ;
        }
           </style>
    </head>
    <body>   
               <div class="form">
            
                <div class="ok">
                    <i class="fi fi-br-check"></i>
                </div>
           
            <p>Solicitação de Cadastro registrado com sucesso</p>
            <p><small>Confirme a solicitação de cadastro através do email informado.</small></p>
            <br>
            <br>
            <br>
            <p><small class="sbottom">Verifique também sua caixa de SPAM (lixo eletrônico). <!--<br>Se não encontrado, <a >clique aqui</a>--></small></p>
        </div>
                
</body></html>