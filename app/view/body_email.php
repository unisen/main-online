<?php

$nome = "Diego Fernandes";
$email = "dfno82@gmail.com";
$crm = "696969";
$uf = "GO";
$idEscala = "999";
$senha_confirma = "senha confirma";
$link = "/index.php";


$email_body = "                            <head>
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
                                        <div class='input'>$nome</div>
                                        <div class='label'>E-MAIL</div>
                                        <a class='input'>$email</a>
                                        <div class='crm-container'>
                                            <div class='crm'>
                                                <div class='label'>CRM</div>
                                                <div class='input'>$crm</div>
                                            </div>
                                            <div class='uf'>
                                                <div class='label'>UF</div>
                                                <div class='input'>$uf</div>
                                            </div>
                                        </div>
                                        <div class='label'>ID ESCALA</div>
                                        <div class='input'>$idEscala</div>
                                        <div class='label'>SENHA</div>
                                        <div class='input'>$senha_confirma</div>
                                        $link                
                                    </fieldset>
                                </div>
                            </body>";


echo $email_body;