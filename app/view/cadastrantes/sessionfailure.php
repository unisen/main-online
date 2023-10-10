<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AVISO - Cadastro de Usuário | <?php echo $tomador_nome; ?>></title>
    <link rel="icon" type="image/png" href="../sen/img/color1-white_icon_dark_background.png">
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
        .next {
            float: right;
            display: flex;
            background-color: #181A13;
            justify-content: center;
            text-align: center;
            color: white;
            margin: 30px auto 0px auto;
            font-size: 12px;
            font-weight: bold;
            width: 30%;
            border-radius: 5px;
            cursor: pointer;
            border: none;
            padding: 10px;
            text-decoration: none;
        }
        .next:hover {
            color:#D1E7A7;
            background-color: #3E4532; 
        }
        small.sbottom {
            font-size: 0.7rem;
            color: darkgrey;
            padding: 0px 40px ;
        }
           </style>
    </head>
    <body>   
               <div class='form'>
            
                <div class='invalid'>
                    <i class="fi fi-br-cross"></i>
                </div>
           
            <p>Sua sessão expirou</p>
            <p><small>Tente novamente.</small></p>
            <br>
            <br>
            <br>
            
            <?php 
            if ($_GET['type'] == 'cadastro') echo "<a href='cadastro.php' class='next'>VOLTAR</a>";
            if ($_GET['type'] == 'atualiza') echo "<a href='atualizadocs.php' class='next'>VOLTAR</a>";
            ?>
            <p><small class='sbottom'>. <!--<br>Se não encontrado, <a <?php //echo "href='falhaconfirmacao.php'"; ?>>clique aqui</a>--></small></p>
        </div>
    </body>            
</html>