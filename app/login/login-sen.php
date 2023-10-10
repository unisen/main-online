<?php  
    session_start();
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
    require 'phpmailer/src/Exception.php';
    require 'phpmailer/src/PHPMailer.php';
    require 'phpmailer/src/SMTP.php';
    $modo = "producao";
    if ($modo == "local") {
    $dbHost = 'Localhost';
    $dbUsername = 'root';
    $dbPassword= '';
    $dbname = 'sc_samu';
    } else {
    $dbHost = 'localhost';
    //$dbUsername = 'unisen19_unisen';
    //$dbPassword= '28071064RpC';
    $dbUsername = 'root';
    $dbPassword= '';    
    $dbname = 'unisen19_usuarios';
    };

    //$erro_geral = '';
    $tomador = $_GET['u'];
    $tomador_nome = 'TOMADOR';

    $title = "<title>LOGIN | ESCALA MÉDICA | $tomador_nome</title>";
    if (isset($_GET['page'])) {
        $page = $_GET['page'];
        if ($page == "../cadastro/atualizadocs.php") { 
            $title = "<title>UNISEN | ATUALIZAR DOCUMENTOS</title>";
            $subtitle = "ATUALIZAR DOCUMENTOS";
        }
    }
    
    $conexao = mysqli_connect($dbHost,$dbUsername,$dbPassword,$dbname);
    $tomador_query = mysqli_query ($conexao,"SELECT * FROM ".$tomador."_unidades WHERE ID='1';");
    $tomador_dados = mysqli_fetch_assoc ($tomador_query);
    $tomador_nome = $tomador_dados['tomador_nome']; 
    //echo "<script>alert('$troca_query->num_rows')</script>";    
            if (isset($_POST['submit'])) {
                $submission_date = date('d/m/Y H:i');
                $login = strtolower($_POST['login']);
                $senha = sha1($_POST['senha']);
                //$login_query = mysqli_query ($conexao,"SELECT * FROM $tomador WHERE email='$login' AND senha='$senha';");
                $login_query = mysqli_query ($conexao,"SELECT * FROM login WHERE email='$login' AND senha='$senha';");
                if ($login_query->num_rows == 0) {
                    $erro_geral = "ERRO!: Senha e/ou usuário incorretos";
                } else {
                    $checar_confirmado = mysqli_fetch_assoc($login_query);     
                    if ($checar_confirmado['status'] != 'confirmado') {
                        $erro_geral = "Pendência: Confirme seu cadastro através do link enviado para o e-mail informado.";
                       
                    }else{
                        $token = sha1(uniqid().date('d/m/Y H:i:s'));
                        $_SESSION['token'] = $token;
                        $_SESSION['token_cont'] = 0;
                        //$token_query = mysqli_query ($conexao,"UPDATE $tomador SET token='$token' WHERE email='$login' AND senha='$senha';");
                        $token_query = mysqli_query ($conexao,"UPDATE login SET token='$token' WHERE email='$login' AND senha='$senha';");
                        if ($tomador) {
                            header("location: inicio.php?u=$tomador&tomador_nome=$tomador_nome");
                        }else{
                            if ($page) {
                                   header("location: $page");
                            }else{
                                header("location: iniciogeral.php");
                            }
                        }
                    };
                };    
            };      
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php echo $title; ?>
    <link rel="icon" type="image/png" href="img/color1-white_icon_dark_background.png">
    <style>
        * {
            box-sizing: border-box;
            padding: 0px;
            margin: 0px;
        }
       
        body , html {
            font-family: arial,helvetica,sans-serif;
            background-color: black;
            margin: 0;
            width: 100%;
            height: 100%;
        }
        header {
            width: 100%;
            height: 5%;
            background-color: white;
           
        }
        header h1 {
            color: #083b0f;
            font-size: 16px;
            padding: 10px 0px 3px 5px;
        }
        nav h1 {
            color: white;
            font-size: 14px;
            padding: 10px 0px 3px 5px;
            text-align: center;
        }
        nav {
            display: flex;
            flex-flow: row wrap;
            Justify-content: space-between;
            align-items: center;
            background-color: #083b0f;
            width: 100%;
            height: 5%;
        }
        main {
            display: flex;
            flex-flow: row wrap;
            justify-content: center;
            align-items: center;
            width: 100%;
            height: 85%;
        }
        form {
            display: flex;
            flex-flow: row wrap;
            justify-content: center;
            align-items: center;
            width: 100%;
            max-width: 300px;
            padding: 15px;
            background: white;
            border-radius: 15px;
            border: 1px solid white;
        }
        fieldset {
            border: 0px solid green;
            background-color: none;
            width: 100%;
            height: 100%;
            margin-top: 0;
        }
        input {
            display: flex;
            width: 100%;
            height: 22px;
            font-size: 0.9rem;
            margin: 1px;
            padding: 5px;
            border: 1px solid black;
        }
        option {
            font-size: 16px;
        }
        input:focus {
            outline-color: green;
        }
     
        span {
            color: red;
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
            font-weight: bold;
            font-size: 14px;
            line-height: 1.5;
            background-color: #083b0f;
            border-radius: 5px;
            width: 100%;
            color: white;
                            
        }
        hr {
            display: flex;
            margin: 45px auto 35px auto;
            border: .5px solid #083b0f;
        }    
    
        label {
            display: flex;
            color: black;
            background-color: none;
            margin: 40px 0px 2px 0px ;
            padding:0px;
            width: 100%;
            font-size: 0.9rem;    
            font-weight: bold;
        }

        #submit {
            display: flex;
            background-image: linear-gradient(to right, #083b0f, #012c1c); 
            justify-content: center;
            text-align: center;
            color: white;
            margin: 0px auto 20px auto;
            width: 60%;
            border-radius: 5px;
            cursor: pointer;
            border: none;
            box-shadow: 0px 0px 5px grey;
            padding: 3%;
            font-size: 0.8rem;
        }
        #cadastre {
            display: flex;
            background-color: white; 
            justify-content: center;
            text-align: center;
            color: black;
            margin: 0px auto 20px auto;
            width: 60%;
            border-radius: 5px;
            cursor: pointer;
            border: #083b0f;
            box-shadow: 0px 0px 5px grey;
            padding: 3%;
            text-decoration: none;
            font-size: 0.8rem;
        }
        #esqueceu:hover {
            text-decoration: underline;        
        }
        #submit:hover {
            background-image: linear-gradient(to right, darkgreen, darkgreen);        
        }
        #cadastre:hover {
            background-color: darkgreen;        
            color: white;
        }
        #esqueceu {
            display: block;
            text-align: center;
            font-size: 0.8rem;
            color: #083b0f;
            margin: auto;
            text-decoration: none;
            font-weight: 12px;
            width:60%;
        }
        div.erro-geral {
            display: flex;
            background-color: darkred;
            padding: 20px;
            border-radius: 5px;
            text-align: justify;
            margin: 15px auto;
            color: white;
            font-weight: normal;
            font-size: 13px;
        }
       .escala {
         margin: 15px auto;
       }
        .escala a {
        background-color: darkgreen;
        text-decoration: none;
        color: lime;
        padding: 10px;
        border-radius: 20px;
        margin-left: 10%;
        margin-top: 5px;
        font-size:14px;   
       }
       .escala a:hover {
       padding: 10px;
       background-color: lime;
       color:black;
       }
       </style>
</head>
<body>    
    <header>
        <h1><?php if ($tomador) { echo "ESCALAS MÉDICAS"; }else{ echo "UNISEN"; }?></h1>
    </header>
    <nav>
        <h1><?php if ($tomador) { echo $tomador_nome; }else{ 
            if ($page) { 
             echo $subtitle;
            }else{
                echo "ESCALAS MÉDICAS"; 
            }
        }
        ?></h1>
    </nav>
    <main>
        <form method='post'>
            <fieldset>
                <legend>SISTEMA <br>DE <br>IDENTIFICAÇÃO</legend>
                    <?php if (isset($erro_geral)) { ?>
                    <div class="erro-geral" id="erro-geral">
                    <?php echo $erro_geral; ?>
                    </div>
                    <?php } else { ?>
                    <!-- <div class="no-error" id="no-error"> -->
                    <?php //echo $erro_geral; ?>
                    <!-- </div> -->
                    <?php };?>
                    <label for="login">LOGIN<span> *</span></label>
                    <input type="text" name="login" id="login" placeholder='E-mail' required <?php if (isset($erro_geral)) echo "value='$login'"; ?>>
                    <label for="senha">SENHA<span> *</span></label>
                    <input type="password" name="senha" id="senha" placeholder='Senha' required>
                    <hr>                
                    <button type="submit" name="submit" id="submit">ENTRAR</button>
                    <?php
                        if ($tomador) {
                            echo "<a href='cadastro.php?u=$tomador&tomador_nome=$tomador_nome' id='cadastre'>CADASTRE-SE</a>";
                            echo "<a href='esquecida.php?u=$tomador&tomador_nome=$tomador_nome' name='esqueceu' id='esqueceu'>Esqueceu a senha?</a>";
                        }else{
                            echo "<a href='cadastro.php' id='cadastre'>CADASTRE-SE</a>";
                            echo "<a href='esquecida.php' name='esqueceu' id='esqueceu'>Esqueceu a senha?</a>";
                        }
                    ?>
            </fieldset>
        </form>
    </main>    
        <script>
            setTimeout(apagaErro,7000);
            function apagaErro () {      
                var elemento = document.getElementById('erro-geral');
                if (elemento) {
                    elemento.style.display = 'none';                 
                }
            }
         
            function abrir () {      
                var el_select = document.getElementById('horario');
                var opt = el_select.getElementsByTagName('option');
                for (i = 0; i < opt.length; i++) {
                        opt[i].setAttribute('style','display:flex');
                }
                var elemento = document.getElementById('horario');
            
                var elemento = document.getElementById('horario');
                elemento.style.height = '105px';
                var elemento = document.getElementById('selecione-horario');                 
                elemento.style.display = "flex";                   
            }
            function fechar () {      
                var el_select = document.getElementById('horario');
                var opt = el_select.getElementsByTagName('option');
                var x = 0;
                for (i = 0; i < opt.length; i++) {
                    if (opt[i].selected == true) {
                    x++;
                    } 
                    else {
                        opt[i].setAttribute('style','display:none');
                    }
                }
                if (x == 0) {
                    for (i = 0; i < opt.length; i++) {
                        opt[i].setAttribute('style', 'display:flex');
                    }    
                }
                var elemento = document.getElementById('horario');                 
                elemento.style.height = '23px';                                  
            }
        </script>
</body>
</html>