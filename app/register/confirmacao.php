<?php session_start();
if (!isset($_GET['confirmacao']) && !isset($$_GET['tomador_nome'])) {
    header('location: ../login/');
    exit;
}
    //$modo = "producao";
    //$unidade = $_GET['nome'];
    
    $tomador_nome = $_GET['tomador_nome'];
    $confirmacao = $_GET['confirmacao'];

    require_once '../config/database/conexao.php';

    //$conexao = mysqli_connect($dbHost,$dbUsername,$dbPassword,$dbname);
    $confirma_query = mysqli_query ($con,"SELECT * FROM tbl_cadastrantes WHERE confirmacao='$confirmacao';");
    if ($confirma_query->num_rows == 1) {
       mysqli_query ($con,"UPDATE tbl_cadastrantes SET STATUS='confirmado' WHERE confirmacao='$confirmacao';");
       $confirmacao = 'valida';       
       //header("location: cadastro.php?confirmacao=$confirmacao");
    }else {
        $confirmacao = 'invalida';
    }
    
?>

<!DOCTYPE html>
 <html lang="pt-BR">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmação | Cadastro de Usuário | <?php echo $tomador_nome; ?></title>
    <meta http-equiv="refresh" content="5; URL='login.php'"/>
    <link rel="icon" href="../../favicon.ico" type="image/x-icon">
    <link rel="shortcut icon" href="../../favicon.ico" />
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
        .invalid {
            display: block;
            width: 100%;
            text-align: center;
            background-color: red;
            padding: 20px;
            width: 90px;
            border-radius: 50%;
            margin: auto;
        }
        i {
        display:block;
        font-size: 30px;
        color: #D1E7A7;
        margin: <?php if ($confirmacao != 'invalida') { echo '3px 0 0 5px'; }else{ echo '5px 0 0 0px'; } ?>;
        }
        .form {
            display: flex;
            flex-flow: row wrap;
            justify-content: center;
            align-items: center;
            margin: 30px auto;
            width: 100%;
            max-width: 500px;
            max-height:600px;
            height: 95%;
            padding: 15px 3px;
            background: white;
            border-radius: 15px;
        }
        a {
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
            text-decoration: none;
            font-size: 0.8rem;
        }
        a:hover {
            background-color: darkgreen;        
            color: white;
        }
        .subinfo {
            color: #181A13;
            padding: 0px 40px ;
        }

           </style>
    </head>
    <body>   
        <div class='form'>
           <?php if ($confirmacao != 'invalida') { ?>
            <div class='ok'>
                <i class="fi fi-br-check"></i> 
            </div>
            <p>Obrigado pela confirmação</p>
            <br>
            <p class='subinfo'><small>Seu cadastro foi recebido e está sendo organizado pelo RH da empresa. Em breve entraremos em contato para formalização de sua integração ao nosso grupo.</small></p>
            
            <?php }else{?>
            <div class='invalid'>
                    <i class="fi fi-br-cross"></i> 
            </div>
            <p>Código de confirmação inválido!</p>
            <?php };?>
        </div>
    </body>            
</html>