<?php  
    session_start();
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
    require '../sen/phpmailer/src/Exception.php';
    require '../sen/phpmailer/src/PHPMailer.php';
    require '../sen/phpmailer/src/SMTP.php';
    $modo = "producao";
    $tomador = $_GET['u'];
    $tomador_nome = $_GET['tomador_nome'];
    $unidade = $_GET['unidade'];
    if ($modo == "local") {
        $dbHost = 'Localhost';
        $dbUsername = 'root';
        $dbPassword= '';
        $dbname = 'sc_samu';
    }else{
        $dbHost = 'Localhost';
        $dbUsername = 'unisen19_unisen';
        $dbPassword= '28071064RpC';
        $dbname = 'unisen19_unisen';
    };
    $dir_cadastrais = 'cadastrantes';
    $conexao = mysqli_connect($dbHost,$dbUsername,$dbPassword,$dbname);
    $conexao2 = mysqli_connect($dbHost,$dbUsername,$dbPassword,'unisen19_usuarios');
    
    $login_query = mysqli_query ($conexao2, "SELECT * FROM login WHERE token='".$_SESSION['token']."';");
    $login = mysqli_fetch_assoc($login_query);
    if (($login_query->num_rows == 0) || empty($_SESSION['token'])) {
        if ($tomador) {
            header("location: ../sen/login.php?u=$tomador");
        }else{
                header("location: ../sen/login.php?page=../cadastro/atualizadocs.php");
        }
    }else{
        if ($login['uf'] != 'GO') {
            $login_crm = $login['crm'].$login['uf'];
        }else{
            $login_crm = $login['crm'];
        } 
        $login_query = mysqli_query ($conexao, "SELECT * FROM socios WHERE CRM='".$login_crm."';");
        if ($login_query->num_rows == 0) {
            header("location: ../sen/login.php?u=sc");
        }else{
        $selecao = mysqli_fetch_assoc($login_query);
                $_SESSION['nome'] = str_replace("'","`",$selecao['NOME COMPLETO']);
                $_SESSION['estadocivil'] = $selecao['ESTADO CIVIL'];
                $_SESSION['sexo'] = $selecao['SEXO'];
                $selecao_dn = explode('/',$selecao['DATA DE NASCIMENTO']);
                $_SESSION['dn'] = $selecao_dn[2]."-".$selecao_dn[1]."-".$selecao_dn[0];
                $_SESSION['cpf'] = $selecao['CPF'];
                $selecao_rg = explode('/',$selecao['RG']);
                $_SESSION['rg'] = trim($selecao_rg[0]);
                $selecao_oexp = explode('-',$selecao_rg[1]);
                $_SESSION['oexp'] = trim($selecao_oexp[0]);
                $_SESSION['rg_uf'] = trim($selecao_oexp[1]);
                $_SESSION['dexp'] = $selecao_rg[4]."-".$selecao_rg[3]."-".substr($selecao_rg[2],-2);
                $selecao_nome_pais = explode(' e ',str_replace("'","`",$selecao['FILIAÇÃO']));
                $_SESSION['nome_mae'] = $selecao_nome_pais[1];
                $_SESSION['nome_pai'] = trim($selecao_nome_pais[0]);
                $_SESSION['nacionalidade'] = $selecao['NACIONALIDADE'];
                $selecao_nat = explode('-',$selecao['NATURALIDADE']);
                $_SESSION['naturalidade'] = $selecao_nat[0];
                $_SESSION['nat_uf'] = $selecao_nat[1];
                $_SESSION['titulo'] = $selecao['TITULO DE ELEITOR'];
                $_SESSION['pis'] = $selecao['PIS'];
                $_SESSION['telefone'] = $selecao['TELEFONE'];
                $_SESSION['email'] = $selecao['E-MAIL'];
                $_SESSION['endereco'] = $selecao['ENDEREÇO'];
                $_SESSION['endereco_nome'] = $selecao['ENDEREÇO NO NOME'];
                if (is_numeric(substr($selecao['CRM'],-2))) {
                    $selecao_crm = $selecao['CRM'];
                    $crm_uf = 'GO';
                }else{
                    $selecao_crm = substr($selecao['CRM'],0,-2);
                    $crm_uf = substr($selecao['CRM'],-2);
                }
                $_SESSION['crm'] = $selecao_crm;
                $_SESSION['crm_uf'] = $crm_uf;
                $_SESSION['id-escala'] = $selecao['ID PLANILHA'];
                $selecao_pix = explode('-',$selecao['DADOS BANCARIOS']);
                $_SESSION['pix'] = substr($selecao['DADOS BANCARIOS'],strlen($selecao_pix[0])+1,strlen($selecao['DADOS BANCARIOS']));
                $_SESSION['chave'] = $selecao_pix[0]; 
                
        }
    }    
        
        
    //echo "<script>alert('".str_word_count(str_replace('.','',str_replace('@','',clearPost($_POST['email']))))."')</script>";    
    function converteMes ($mes) {
                if ($mes == '01') return 'janeiro';
                if ($mes == '02') return 'fevereiro';
                if ($mes == '03') return 'março';
                if ($mes == '04') return 'abril';
                if ($mes == '05') return 'maio';
                if ($mes == '06') return 'junho';
                if ($mes == '07') return 'julho';
                if ($mes == '08') return 'agosto';
                if ($mes == '09') return 'setembro';
                if ($mes == '10') return 'outubro';
                if ($mes == '11') return 'novembro';
                if ($mes == '12') return 'dezembro';
    };
    function clearPost ($clearPost) {
        $clearPost = trim($clearPost);
        $clearPost = stripslashes($clearPost);
        $clearPost = htmlspecialchars($clearPost);
        return $clearPost;
    };
        if (isset($_POST['submitEnd'])) { 
        if (($_SESSION['nome'] != '') && isset($_SESSION['nome'])) {
            $erro_count_upload = 0;
            $submission_date = date('d/m/Y H:i');
            $tipochave = $_POST['tipochave'];
            $chavepix = $_POST['chavepix'];
            if ($_SESSION['dn']) {
                $data = new datetime($_SESSION['dn']);
                $_SESSION['dn'] = $data->format('d/m/Y');
            }
            if (DateTime::createFromFormat('Y-m-d', $_SESSION['dexp']) !== false) {
                $data = new datetime($_SESSION['dexp']);
                $_SESSION['dexp'] = $data->format('d/m/Y');
            }
            if ($erro_count_upload == 0) {
                $confirmacao = uniqid().$_SESSION['crm'].$_SESSION['crm_uf'];
                $arq = '';
                $diretorio = '../scp/socios/'.$_SESSION['crm'].$_SESSION['crm_uf']."/documentos/";
                foreach(glob("$diretorio*.pdf") as $arquivo) {
                    $arq .= $arquivo.";";
                }
                $arq = substr($arq,0,-1);
                mysqli_query ($conexao,"INSERT INTO atualiza VALUES (DEFAULT,'','','".$_SESSION['sexo']."','".$_SESSION['estadocivil']."','".$_SESSION['nome']."','".$_SESSION['nome_pai']." e ".$_SESSION['nome_mae']."','".$_SESSION['crm'].$_SESSION['crm_uf']."','".$_SESSION['telefone']."','".$_SESSION['email']."','".$_SESSION['dn']."','".$_SESSION['rg']." / ".$_SESSION['oexp']."-".$_SESSION['rg_uf']." / DE: ".$_SESSION['dexp']."','".$_SESSION['naturalidade']."-".$_SESSION['nat_uf']."','".$_SESSION['nacionalidade']."','".$_SESSION['cpf']."','".$_SESSION['titulo']."','".$_SESSION['pis']."','".$_SESSION['endereco']."','".$_SESSION['endereco_nome']."','".$tipochave."-".$chavepix."','','','".sha1($_SESSION['senha'])."','".$_SESSION['id-escala']."','RPC E ASSOCIADOS S/S LTDA','confirmado','$confirmacao','$submission_date','$arq');");    
                /*
                $mail = new PHPMailer(true);
                $mail->SMTPDebug = 0; // debugging: 1 = errors and messages, 2 = messages only
                $mail->CharSet = 'UTF-8';
                $mail->IsSMTP(); // enable SMTP
                $mail->Host = "smtp.titan.email";//"br474.hostgator.com.br";
                $mail->SMTPAuth = true; // authentication enabled
                $mail->Username = "escalamedica@unisen.com.br";
                $mail->Password = "28071064RpC";//"UQU@=OfNdC8E";
                $mail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for Gmail
                $mail->Port = 465; // or 587  465
                $mail->setFrom('escalamedica@unisen.com.br', 'CADASTRO NOVO USUÁRIO');
                $email = $_SESSION['email'];
                $nome = $_SESSION['nome'];
                $mail->addAddress($email,$nome);
                $mail->isHTML(true);
                $mail->Subject = "UNISEN - SOLICITAÇÃO DE INCLUSÃO DE ASSOCIADO PARTICIPANTE";
                $link = "<a class='confirmar' href='https://www.unisen.com.br/cadastro/confirmacao.php?confirmacao=$confirmacao'>CONFIRMAR SOLICITAÇÃO</a>";
                $mail->Body = "
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
                                            <div class='input'>".$_SESSION['nome']."</div>
                                            <div class='label'>E-MAIL</div>
                                            <a class='input'>".$_SESSION['email']."</a>
                                            <div class='crm-container'>
                                                <div class='crm'>
                                                    <div class='label'>CRM</div>
                                                    <div class='input'>".$_SESSION['crm']."</div>
                                                </div>
                                                <div class='uf'>
                                                    <div class='label'>UF</div>
                                                    <div class='input'>".$_SESSION['crm_uf']."</div>
                                                </div>
                                            </div>
                                            <div class='label'>ID ESCALA</div>
                                            <div class='input'>".$_SESSION['id-escala']."</div>
                                            <div class='label'>SENHA</div>
                                            <div class='input'>".$_SESSION['senha']."</div>
                                            $link                
                                        </fieldset>
                                    </div>
                                </body>";
                $mail->send();
                */
                //session_destroy();
                header("location: obrigado_atualiza.php");
            };
        }else{
            header('location: sessionfailure.php?type=atualiza');
        }    
    }
    
    if (isset($_POST['submit'])) {
        $erro_count = 0;
        $erro_sobrenome = '';
        $submission_date = date('d/m/Y H:i');
        $nome = mb_strtoupper(clearPost($_POST['nome']), 'UTF-8');
        $estadocivil = $_POST['estadocivil'];
        $sexo = $_POST['sexo'];
        $dn = $_POST['dn'];
        $cpf = $_POST['cpf'];
        $crm = clearPost($_POST['crm']);
        $crm_uf = $_POST['crm_uf'];
        $idEscala = clearPost($_POST['id-escala']);
        $rg = $_POST['rg'];
        $oexp = $_POST['oexp'];
        $rg_uf = $_POST['rg_uf'];
        $dexp = $_POST['dexp'];
        $nome_pai = mb_strtoupper(clearPost($_POST['nome_pai']), 'UTF-8');
        $registro_pai = $_POST['registro_pai'];
        $nome_mae = mb_strtoupper(clearPost($_POST['nome_mae']), 'UTF-8');
        $nac = $_POST['nacionalidade'];
        $nat = mb_strtoupper($_POST['naturalidade'], 'UTF-8');
        $nat_uf = $_POST['nat_uf'];
        $titulo = $_POST['titulo'];
        $pis = $_POST['pis'];
        $telefone = $_POST['telefone'];
        $endereco = $_POST['endereco'];
        $endereco_nome = $_POST['endereco_nome'];
        $email = clearPost(strtolower($_POST['email']));
        $senha = sha1($_POST['senha']);
        $senha_confirma = $_POST['senha-confirma'];
        
        if (empty(str_replace(' ','',$nome))) {
            $erro_count++ ;
            $erro_nome = true;
            
        }else{
            if (str_word_count($nome) == 1) {
                $erro_count++ ;
                $erro_sobrenome = 'Coloque nome e sobrenome.';
                $erro_nome = true;
            };
            if (!preg_match("/^[a-zA-ZÀ-ú ]*$/",$nome)) {
                $erro_count++;
                $erro_sobrenome = 'Somente letras e espaços em branco são permitidos neste campo.';
                $erro_nome = true;
            };
        };
        if ($registro_pai == true) { 
            unset($nome_pai); 
        }else{
            if (empty(str_replace(' ','',$nome_pai))) {
                    $erro_count++ ;
                    $erro_nome_pai = true;
            }else{
                if (str_word_count($nome_pai) == 1) {
                    $erro_count++ ;
                    $erro_sobrenome_pai = 'Coloque nome e sobrenome.';
                    $erro_nome_pai = true;
                };
                if (!preg_match("/^[a-zA-ZÀ-ú ]*$/",$nome_pai)) {
                    $erro_count++;
                    $erro_sobrenome_pai = 'Somente letras e espaços em branco são permitidos neste campo.';
                    $erro_nome_pai = true;
                };
            };
        }
       
        if (empty(str_replace(' ','',$nome_mae))) {
                $erro_count++ ;
                $erro_nome_mae = true;
        }else{
            if (str_word_count($nome_mae) == 1) {
                $erro_count++ ;
                $erro_sobrenome_mae = 'Coloque nome e sobrenome.';
                $erro_nome_mae = true;
            };
           if (!preg_match("/^[a-zA-ZÀ-ú ]*$/",$nome_mae)) {
                $erro_count++;
                $erro_sobrenome_mae = 'Somente letras e espaços em branco são permitidos neste campo.';
                $erro_nome_mae = true;
            };
        };
        
        if (empty($estadocivil)) {
            $erro_count++ ; 
            $erro_estadocivil = true;
        };
        
        if (empty($sexo)) {
            $erro_count++ ; 
            $erro_sexo = true;
        };
        if (empty($dn)) {
            $erro_count++ ; 
            $erro_dn = true;
        };
        if (strlen($cpf) < 14) {
                $erro_cpf_count = 'O número do CPF deve ter 11 dígitos'; 
                $erro_count++ ; 
        };
        if (empty($rg)) {
                $erro_rg = true; 
                $erro_count++ ; 
        };
        if (empty($oexp)) {
                $erro_oexp = true; 
                $erro_count++ ; 
        };
        if (empty($rg_uf)) {
                $erro_rg_uf = true; 
                $erro_count++ ; 
        };
        if (empty($dexp)) {
                $erro_dexp = true; 
                $erro_count++ ; 
        };
        if (empty($nac)) {
                $erro_nac = true; 
                $erro_count++ ; 
        };
        if (empty($nat)) {
                $erro_nat = true; 
                $erro_count++ ; 
        };
        if (empty($nat_uf)) {
                $erro_nat_uf = true; 
                $erro_count++ ; 
        };
        if (empty($titulo)) {
                $erro_titulo = true; 
                $erro_count++ ; 
        };
        if (empty($pis)) {
                $erro_pis = true; 
                $erro_count++ ; 
        };
        if (empty($telefone)) {
                $erro_telefone = true; 
                $erro_count++ ; 
        };
        if (empty($endereco)) {
                $erro_endereco = true; 
                $erro_count++ ; 
        };
        if (empty($endereco_nome)) {
                $erro_endereco_nome = true; 
                $erro_count++ ; 
        };
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $erro_count++ ;
            $erro_email = true;
        };
        if (empty($crm) || ($crm == 0)) {
            $erro_count++; 
            $erro_crm = true;
        };
        if (empty(str_replace(' ','',$crm_uf))) {
            $erro_count++ ; 
            $erro_crm_uf = true;
        };
        
         if (empty($senha)) {
            $erro_count++ ; 
            $erro_senha = true;
        };
        
        if (empty(str_replace(' ','',$idEscala))) {
            $erro_count++ ; 
            $erro_idEscala = true;
        };
        if ((empty($senha_confirma)) || ($senha != sha1($senha_confirma))) {
            $erro_count++ ; 
            $erro_senhaConfirma = true;
        };
        if (strlen($_POST['senha']) < 6) {
            $erro_senha_count = 'A senha deve ter 6 digitos';
            $erro_count++ ; 
        };

        if (($cadastro_query->num_rows > 0) || ($unisen_query->num_rows > 0))  {
            $erro_geral = "ERRO!: Já existe solicitação de cadastro em nossa base de dados para este usuário.";
            if ($unisen_query->num_rows > 0) $erro_geral = "ERRO!: Este usuário já está na nossa rede de sócios-participantes.";
            $user_found = true;
            $erro_email = true;
            $erro_crm = true;
            $erro_nome = true;
            $erro_crm_uf = true;
            $erro_estadocivil = true;
            $erro_cpf = true;
            $erro_sexo = true;
            $erro_dn = true;
            $erro_rg = true;
            $erro_oexp = true;
            $erro_rg_uf = true;
            $erro_dexp = true;
            $erro_nac = true;
            $erro_nat = true;
            $erro_nat_uf = true;
            $erro_titulo = true;
            $erro_pis = true;
            $erro_telefone = true;
            $erro_endereco = true;
            $erro_endereco_nome = true;
            unset($erro_senha);
            unset($erro_senha_count);
            unset($erro_senhaConfirma);
        };
        if ($erro_count > 0) {
            $erro_nome_value = $_POST['nome'];  
            $erro_nome_mae_value = $_POST['nome_mae'];
            $erro_nome_pai_value = $_POST['nome_pai'];
            $erro_email_value = $_POST['email'];
            $erro_crm_value = $_POST['crm'];
            $erro_crm_uf_value = $_POST['crm_uf'];
            $erro_idEscala_value = $_POST['id-escala'];
            $erro_estadocivil_value = $estadocivil;
            $erro_sexo_value = $sexo;
            $erro_cpf_value = $cpf;
            $erro_dn_value = $dn;
            $erro_rg_value = $rg;
            $erro_oexp_value = $oexp;
            $erro_rg_uf_value = $rg_uf;
            $erro_dexp_value = $dexp;
            $erro_nac_value = $nac;
            $erro_nat_value = $nat;
            $erro_nat_uf_value = $nat_uf;
            $erro_titulo_value = $titulo;
            $erro_pis_value = $pis;
            $erro_telefone_value = $telefone;
            $erro_endereco_value = $endereco;
            $erro_endereco_nome_value = $endereco_nome;
        };
        if ($erro_count == 1) { 
            $erro_geral = 'Erro! O campo marcado em vermelho deve ser preechido corretamente.' ;
        };
        if ($erro_count > 1) { 
            $erro_geral = 'Erro! Os campos marcados em vermelho devem ser preechidos corretamente.' ;
        };
        if ($erro_count == 0) {
            $ok_count = 'cadastro';
            $confirmacao = uniqid();
            //$cadastro_query = mysqli_query ($conexao,"INSERT INTO $tomador VALUES (DEFAULT,'$nome','$email','$crm','$crm_uf','$idEscala','$senha','','','$confirmacao','novo','$submission_date');");
           
        };    
    };
    
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UNISEN | CADASTRO DE ASSOCIAÇÃO</title>
    <link rel="icon" type="image/png" href="../sen/img/color1-white_icon_dark_background.png">
    <style>
        @import url('https://cdn-uicons.flaticon.com/uicons-solid-rounded/css/uicons-solid-rounded.css');
        * {
            box-sizing: border-box;
            padding: 0px;
            margin: 0px;
        }
       
        body , html {
            display: flex;
            flex-flow: row wrap;
            justify-content: center;
            align-items: center;
            font-family: arial,helvetica,sans-serif;
            background-color: #3E4532;
            width: 100%;
            border: none;
        }
        header {
            width: 100%;
            height: 5%;
            background-color: #D1E7A7;
           
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
            background-color: #181A13;
            width: 100%;
            height: 5%;
        }
        .logo {
            margin: 20px auto;
            width: 100%;
            text-align: center;
        }
        p {
            margin: 10px 20px;
        }
        ul {
            margin: 20px 60px;
        }
        #intro {
            <?php if (($erro_count > 0) || ($erro_count_upload > 0))  {
                echo "display: none;";    
            }else{
                if (($ok_count == 'cadastro') || ($ok_count == 'upload')) { 
                    echo "display: none;"; 
                }else{
                    echo "display: block;"; 
                }
            }
            ?>
            margin: 20px auto;
            width: 100%;
            max-width: 750px;
            padding: 40px 40px;
            background: #6c8158;
            border-radius: 2px;
            line-height: 1.5;
            color: white;
            border-radius: 3px;
        }
        #hr_intro {
            display: flex;
            margin: 40px auto;
            border: .5px solid #D1E7A7;
        }    
  
        #formulario {
            <?php if ($erro_count > 0) {
                echo "display: flex;";    
            }else{
                if ($ok_count == 'cadastro') { 
                    echo "display: none;"; 
                }else{
                    echo "display: none;"; 
                }
            }
            ?>
            flex-flow: row wrap;
            justify-content: center;
            align-items: center;
            margin: 20px auto;
            width: 100%;
            max-width: 750px;
            padding: 40px 40px;
            background: white;
            border-radius: 3px;
        }
        #upload-form {
            <?php if ($erro_count > 0) {
                echo "display: none;";    
            }else{
                if (($ok_count == 'cadastro') || ($erro_count_upload > 0)) { 
                    echo "display: block;"; 
                }else{
                    echo "display: none;"; 
                }
            }
            ?>
            flex-flow: row wrap;
            justify-content: center;
            align-items: center;
            margin: 20px auto;
            width: 100%;
            max-width: 750px;
            padding: 40px 40px;
            background: white;
            border-radius: 3px;
        }
        fieldset {
            border: 0px solid green;
            background-color: none;
            width: 100%;
            height: 100%;
            margin-top: 0;
        }
        input {
            width: 100%;
            height: 22px;
            font-size: 0.9rem;
            margin: 1px;
            padding: 5px;
            border: 1px solid black;
            border-radius: 0;
            color: black;
        }
        #check {
            display: inline;
            width: 12px;
            height: 12px;
            font-size: 0.9rem;
            margin-top: 10px;
            padding: 12px 5px;
            border: none;
            color: black;
        }
        #check_label {
            display: inline;
            color: black;
            background-color: none;
            font-size: 0.9rem;    
            font-weight: normal;
            margin-top: 10px;
            padding: 10px 5px;
            width: auto;
            font-size: 0.9rem
        }
        #data_nascimento {
            min-width: calc(100% - 16px);
            height: 22px;
            font-size: 0.7rem;
            margin: 1px;
            padding: 5px;
            border: 1px solid black;
            border-radius: 0;
            text-align: left;
        }
        #dexp {
            min-width: calc(100% - 16px);
            height: 22px;
            font-size: 0.7rem;
            margin: 1px;
            padding: 5px;
            border: 1px solid black;
            border-radius: 0;
            text-align: left;
        }
        .colordate {
            background-color: white;
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
            font-weight: normal;
            font-size: 1rem;
            background-color: #181A13;
            border-radius: 5px;
            width: 100%;
            color: white;
        }
        hr {
            display: flex;
            margin: 40px auto;
            border: .5px solid #ABBA90;
        }    
        div.crm-container label {
            margin:0 0 3px 0;
            padding:0;
        }    
        div.crm-container {
            margin: 20px 0 0 0;
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
        select {
            height: 22px;
            width: 100%;
            outline: none;
            color: black;
            background-color: white;
            border-radius: 0;
            border: 1px solid black;
        }
        label {
            display: flex;
            color: black;
            background-color: none;
            margin: 20px 0px 3px 0px ;
            padding: 0px;
            width: 100%;
            font-size: 0.9rem;    
            font-weight: bold;
        }
        
        .label-upload {
            display: block;
            margin: 0px;
            padding: 15px 0px;
            width: 100%;
            height: 100%;
            color: darkgreen;
            border: none;
            cursor: pointer;
            
        }
      
        .forward {
            float: left;
            display: flex;
            background-color: #D1E7A7;
            justify-content: center;
            text-align: center;
            color: #181A13;
            margin: auto;
            font-size: 12px;
            font-weight: bold;
            width: 30%;
            border-radius: 5px;
            cursor: pointer;
            border: none;
            padding: 10px;
            text-decoration: none;
        }
        .nextx {
            float: right;
            display: flex;
            background-color: #181A13;
            justify-content: center;
            text-align: center;
            color: white;
            margin: auto;
            font-size: 12px;
            font-weight: bold;
            width: 30%;
            border-radius: 5px;
            cursor: pointer;
            border: none;
            padding: 10px;
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
        }
        #esqueceu:hover {
            text-decoration: underline;        
        }
        #submit:hover {
            background-image: linear-gradient(to right, darkgreen, darkgreen);        
        }
        #cadastre:hover, .nextx:hover {
            background-color: #3E4532;        
            color: white;
        }
        .forward:hover {
            background-color: #ABBA90;        
            color: #3E4532;
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
        .erro-campo {
            border: 2px solid darkred;
            background-color: rgba(250, 0 , 0, 0.5);
            color: darkred;
        }
        
        .erro-campo::placeholder {
            color: darkred;
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
       .next {
            float: right;
            display: flex;
            background-color: #181A13;
            justify-content: center;
            text-align: center;
            color: white;
            margin: 0px auto;
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
        .upload {
           width: 100%;
           background-color: #D1E7A7;
           text-align:center;
           margin: 5px 0px 0px 0px;
           padding: 0px;
           border: 1px dashed darkgreen;
           font-size: 18px;
       }
       .upload-box {
            width: 100%;
            background-color: transparent;
            border: none;
            color: black;
            margin: 30px 0px 0px 0px;
            padding:0px;
            font-size: 0.9rem;    
            font-weight: bold;
       }
       .anexo {
           display: none;
       }
       .loading {
           cursor: wait;
       }
       </style>
</head>
<body>    
    <header>
        <h1 id='topo'>UNISEN</h1>
    </header>
    <nav>
        <h1>ATUALIZAÇÃO DE DOCUMENTOS</h1>
    </nav>
     <div class="logo">
      <img class="formLogoImg" src="../sen/img/color1-white_logo_dark_background.png" height="140" width="240">
    </div>
     <form id='intro' method='post'>
        <p>Olá! 
        <br><br>Dr<?php if ($selecao['SEXO'] == 'feminino') echo "a"; echo " ".$selecao['NOME COMPLETO']?>,</p>
            <br><br>
            <p>Você está no SISTEMA DE ATUALIZAÇÃO DE DOCUMENTOS.</p>
            <br><br>
            <p>Algumas Instituções onde temos contratos solicitam renovação de algumas certidões da equipe médica.</p>
            <p>Criamos esse canal para atualização diretamente através do site.</p>
            <p>Abaixo deixamos a lista dos links necessários para atualização das certidões</p>
            <p>Ao preencher os campos de envios de documentos, vocês notarão que alguns possuem asteriscos, que indica que são obrigatórios o envio.</p> 
            <p>Os demais, apesar de não serem obrigatórios, facilitaria muito pra nossa equipe que todos fossem enviados.</p> 
            <br>
            <p>Os arquivos devem ser enviados em formato .pdf</p>
            <br><br>
            <p>Sucesso e paz a todos!</p>
            <br><br><br>
            
            <p><strong>LINKS ÚTEIS:</strong></p>
            <br>
            <p><a target="_blank" style="font-size: 14px; color: #D1E7A7; text-decoration: underline;" href="https://cndt-certidao.tst.jus.br/inicio.faces" rel="nofollow">CERTIDÃO NEGATIVA DE DEBITOS TRABALHISTAS</a></p>
            <p><a target="_blank" style="font-size: 14px; color: #D1E7A7; text-decoration: underline;" href="https://solucoes.receita.fazenda.gov.br/Servicos/certidaointernet/PF/Emitir" rel="nofollow">CERTIDÃO NEGATIVA DE DÉBITO FEDERAL</a></p>
            <p><a target="_blank" style="font-size: 14px; color: #D1E7A7; text-decoration: underline;" href="https://www.sefaz.go.gov.br/Certidao/Emissao/default.asp" rel="nofollow">CERTIDÃO NEGATIVA DE DÉBITO ESTADUAL</a></p>
            <p><a target="_blank" style="font-size: 14px; color: #D1E7A7; text-decoration: underline;" href="https://www.goiania.go.gov.br/sistemas/sccer/asp/sccer00300f0.asp" rel="nofollow">CERTIDÃO NEGATIVA DE DÉBITO MUNICIPAL (GOIÂNIA)</a></p>
            <p><a target="_blank" style="font-size: 14px; color: #D1E7A7; text-decoration: underline;" href="https://projudi.tjgo.jus.br/CertidaoNegativaPositivaPublica?PaginaAtual=1&amp;TipoArea=2&amp;InteressePessoal=S" rel="nofollow">CERTIDÃO NEGATIVA CRIMINAL ESTADUAL</a></p>
            <p><a target="_blank" style="font-size: 14px; color: #D1E7A7; text-decoration: underline;" href="https://sistemas.trf1.jus.br/certidao/#/solicitacao" rel="nofollow">CERTIDÃO NEGATIVA CRIMINAL FEDERAL</a></p>
            <p><a target="_blank" style="font-size: 14px; color: #D1E7A7; text-decoration: underline;" href="https://www.stm.jus.br/servicos-stm/certidao-negativa/emitir-certidao-negativa" rel="nofollow">COMPROVANTE DE REGULARIDADE NO SERVIÇO MILITAR</a></p>
            <p><a target="_blank" style="font-size: 14px; color: #D1E7A7; text-decoration: underline;" href="https://www.tse.jus.br/eleitor/certidoes/certidao-de-quitacao-eleitoral" rel="nofollow">COMPROVANTE DE REGULARIDADE ELEITORAL</a></p>
            <p><a target="_blank" style="font-size: 14px; color: #D1E7A7; text-decoration: underline;" href="https://portalservicos.cfm.org.br/portal/login/pessoa-fisica" rel="nofollow">ANTECEDENTES ÉTICOS (CRM)</a></p>
            <p><a target="_blank" style="font-size: 14px; color: #D1E7A7; text-decoration: underline;" href="https://cremego.org.br/servicos-para-medicos/certidao/" rel="nofollow">CERTIDÃO NEGATIVA DE DÉBITO DO CONSELHO DE CLASSE (CRM)</a></p>
            <p><a target="_blank" style="font-size: 14px; color: #D1E7A7; text-decoration: underline;" href="https://meu.inss.gov.br/#/login" rel="nofollow">MEU INSS (PIS)</a></p>
            <p><a target="_blank" style="font-size: 14px; color: #D1E7A7; text-decoration: underline;" href="https://www.ilovepdf.com/pt/jpg_para_pdf" rel="nofollow">CONVERTER ARQUIVO DE IMAGEM (JPG) em PDF</a></p>
    <hr id='hr_intro'>
    <a id="next1" class='next' onclick="next('intro')">PRÓXIMO</a>
    </form>
    <form id='formulario' method='post'>
        <fieldset>
            <legend>FORMULÁRIO DE CADASTRO</legend>
                <?php if (isset($erro_geral)) { ?>
                <div class="erro-geral" id="erro-geral">
                <?php echo $erro_geral; ?>
                </div>
                <?php } else { ?>
                <div class="no-error" id="no-error">
                </div>
                <?php unset($erro_geral); };?>
                
                <label for="nome">NOME COMPLETO<span> *</span></label>
                <input type="text" name="nome" id="nome" placeholder='Nome Completo (igual identidade médica)' onblur='optChangeIdEscala()' oninput='optChangeIdEscala(), apagaErro(this)'<?php if ($erro_count > 0) { echo "value='$erro_nome_value'"; }else{ if (isset($_SESSION['nome'])) echo "value='".$_SESSION['nome']."'";  }; if ($erro_nome) echo "class='erro-campo'";?>>
                <?php if (isset($erro_nome)) { ?>
                <div id='erro_nome_sobrenome' style='margin: 0 1px; ; padding:0 ; color: darkred ; font-size: 0.7rem; font-weight: bold'>
                <?php echo $erro_sobrenome; ?>
                </div>
                <?php }; ?>
                <label for="id-estadocivil">ESTADO CIVIL<span> *</span></label>
                <select type="text" name="estadocivil" onchange='apagaErro(this)' id="id-estadocivil" <?php if ($erro_estadocivil) echo "class='erro-campo'" ;?>>
                    <option value="" <?php if ((!$erro_estadocivil) && (!isset($_SESSION['estadocivil']))) echo "selected" ;?>>Selecione</option>
                    <?php 
                        if ($erro_estadocivil_value == 'solteiro') {
                            echo "<option value='$erro_estadocivil_value' selected>$erro_estadocivil_value</option>";
                        }else{
                            if ($_SESSION['estadocivil'] == 'solteiro') {  
                                echo "<option value='solteiro' selected>Solteiro(a)</option>";
                            }else{
                                echo "<option value='solteiro'>Solteiro(a)</option>";
                            }    
                        }
                        if ($erro_estadocivil_value == 'casado') {
                            echo "<option value='$erro_estadocivil_value' selected>$erro_estadocivil_value</option>";
                        }else{
                            if ($_SESSION['estadocivil'] == 'casado') {  
                                echo "<option value='casado' selected>Casado(a)</option>";
                            }else{
                                echo "<option value='casado'>Casado(a)</option>";
                            }    
                        }
                        if ($erro_estadocivil_value == 'divorciado') {
                            echo "<option value='$erro_estadocivil_value' selected>$erro_estadocivil_value</option>";
                        }else{
                            if ($_SESSION['estadocivil'] == 'divorciado') {  
                                echo "<option value='divorciado' selected>Divorciado(a)</option>";
                            }else{
                                echo "<option value='divorciado'>Divorciado(a)</option>";
                            }  
                        }
                        if ($erro_estadocivil_value == 'viuvo') {
                            echo "<option value='$erro_estadocivil_value' selected>$erro_estadocivil_value</option>";
                        }else{
                            if ($_SESSION['estadocivil'] == 'viuvo') {  
                                echo "<option value='viuvo' selected>Viuvo(a)</option>";
                            }else{
                                echo "<option value='viuvo'>Viuvo(a)</option>";
                            }  
                        }
                    ?>
                </select>
                <label for="sexo">SEXO<span> *</span></label>
                <select type="text" name="sexo" onchange='apagaErro(this)' id="sexo" <?php if ($erro_sexo) echo "class='erro-campo'" ;?>>
                    <option value="" <?php if ((!$erro_sexo) && (!isset($_SESSION['sexo']))) echo "selected" ;?>>Selecione</option>
                    <?php 
                        if ($erro_sexo_value == 'masculino') {
                            echo "<option value='$erro_sexo_value' selected>$erro_sexo_value</option>";
                        }else{
                            if ($_SESSION['sexo'] == 'masculino') {  
                                echo "<option value='masculino' selected>Masculino</option>";
                            }else{
                                echo "<option value='masculino'>Masculino</option>";
                            }  
                        }
                        if ($erro_sexo_value == 'feminino') {
                            echo "<option value='$erro_sexo_value' selected>$erro_sexo_value</option>";
                        }else{
                            if ($_SESSION['sexo'] == 'feminino') {  
                                echo "<option value='feminino' selected>Feminino</option>";
                            }else{
                                echo "<option value='feminino'>Feminino</option>";
                            }  
                        }
                    ?>
                </select>
                <label for="data_nascimento">DATA DE NASCIMENTO<span> *</span></label>
                <input type="date" name="dn" id="data_nascimento" onchange='apagaErro(this)' <?php if ($erro_count > 0) { echo "value='$erro_dn_value'"; }else{ if (isset($_SESSION['dn'])) echo "value='".$_SESSION['dn']."'";  } ; if ($erro_dn) { echo "class='erro-campo'"; }else{ echo "class='colordate'"; }?>>
                <label for="cpf">CPF<span> *</span></label> 
                <input type="text" name="cpf" id="cpf" placeholder='Digite seu CPF' maxlength='14' <?php if ($erro_count > 0) { echo "value='$erro_cpf_value'"; }else{ if (isset($_SESSION['cpf'])) echo "value='".$_SESSION['cpf']."'";  }; ?> oninput='cpfRegEx(this) , apagaErro(this)' onfocus='apagaErro()' class='cpf <?php if ($erro_cpf_count) echo "erro-campo";?>'>
                <?php if (isset($erro_cpf_count)) { ?>
                <div id='erro_cpf_count' style='margin: 0 1px; ; padding:0 ; color: darkred ; font-size: 0.7rem; font-weight: bold'>
                <?php echo $erro_cpf_count; ?>
                </div>
                <?php } ?>
                <hr>
                <label for="rg">RG<span> *</span></label>
                <input type="text" name="rg" id="rg" placeholder='Digite seu RG' maxlength='20' oninput='ChangeRg(this), apagaErro(this)'  <?php if ($erro_count > 0) { echo "value='$erro_rg_value'"; }else{ if (isset($_SESSION['rg'])) echo "value='".$_SESSION['rg']."'";  } ?> onfocus='apagaErro()' <?php if ($erro_rg) echo "class='erro-campo'";?>>
                <div class='rg-container'>
                    <div class='crm'>
                        <label for="oepx">ÓRGÃO EXPEDIDOR<span> *</span></label>
                        <input type="text" name="oexp" id="oexp" placeholder='Digite o nome do órgão' oninput='apagaErro(this)' <?php if ($erro_count > 0) { echo "value='$erro_oexp_value'"; }else{ if (isset($_SESSION['oexp'])) echo "value='".$_SESSION['oexp']."'";  }; if ($erro_oexp) echo "class='erro-campo'" ;?>>
                    </div>
                    <div class='uf'>
                        <label for="rg_uf">UF<span> *</span></label>
                        <select type="text" name="rg_uf" id="rg_uf" placeholder='UF do RG' onchange='apagaErro(this)' onfocus='apagaErro()' <?php if ($erro_rg_uf) echo "class='erro-campo'" ;?>>
                            <option value="" disabled <?php if ((!$erro_rg_uf_value) && (!isset($_SESSION['rg_uf']))) echo "selected" ;?>>Selecione</option>
                            <option value="AC" <?php if ($erro_rg_uf_value == 'AC') { echo "selected"; }else{ if ($_SESSION['rg_uf'] == 'AC') echo "selected"; } ?>>AC</option>
                            <option value="AL" <?php if ($erro_rg_uf_value == 'AL') { echo "selected"; }else{ if ($_SESSION['rg_uf'] == 'AL') echo "selected"; } ?>>AL</option>
                            <option value="AP" <?php if ($erro_rg_uf_value == 'AP') { echo "selected"; }else{ if ($_SESSION['rg_uf'] == 'AP') echo "selected"; } ?>>AP</option>
                            <option value="AM" <?php if ($erro_rg_uf_value == 'AM') { echo "selected"; }else{ if ($_SESSION['rg_uf'] == 'AN') echo "selected"; } ?>>AN</option>
                            <option value="BA" <?php if ($erro_rg_uf_value == 'BA') { echo "selected"; }else{ if ($_SESSION['rg_uf'] == 'BA') echo "selected"; } ?>>BA</option>
                            <option value="CE" <?php if ($erro_rg_uf_value == 'CE') { echo "selected"; }else{ if ($_SESSION['rg_uf'] == 'CE') echo "selected"; } ?>>CE</option>
                            <option value="DF" <?php if ($erro_rg_uf_value == 'DF') { echo "selected"; }else{ if ($_SESSION['rg_uf'] == 'DF') echo "selected"; } ?>>DF</option>
                            <option value="ES" <?php if ($erro_rg_uf_value == 'ES') { echo "selected"; }else{ if ($_SESSION['rg_uf'] == 'ES') echo "selected"; } ?>>ES</option>
                            <option value="GO" <?php if ($erro_rg_uf_value == 'GO') { echo "selected"; }else{ if ($_SESSION['rg_uf'] == 'GO') echo "selected"; } ?>>GO</option>
                            <option value="MA" <?php if ($erro_rg_uf_value == 'MA') { echo "selected"; }else{ if ($_SESSION['rg_uf'] == 'MA') echo "selected"; } ?>>MA</option>
                            <option value="MT" <?php if ($erro_rg_uf_value == 'MT') { echo "selected"; }else{ if ($_SESSION['rg_uf'] == 'MT') echo "selected"; } ?>>MT</option>
                            <option value="MS" <?php if ($erro_rg_uf_value == 'MS') { echo "selected"; }else{ if ($_SESSION['rg_uf'] == 'MS') echo "selected"; } ?>>MS</option>
                            <option value="MG" <?php if ($erro_rg_uf_value == 'MG') { echo "selected"; }else{ if ($_SESSION['rg_uf'] == 'MG') echo "selected"; } ?>>MG</option>
                            <option value="PR" <?php if ($erro_rg_uf_value == 'PR') { echo "selected"; }else{ if ($_SESSION['rg_uf'] == 'PR') echo "selected"; } ?>>PR</option>
                            <option value="PB" <?php if ($erro_rg_uf_value == 'PB') { echo "selected"; }else{ if ($_SESSION['rg_uf'] == 'PB') echo "selected"; } ?>>PB</option>
                            <option value="PA" <?php if ($erro_rg_uf_value == 'PA') { echo "selected"; }else{ if ($_SESSION['rg_uf'] == 'PA') echo "selected"; } ?>>PA</option>
                            <option value="PE" <?php if ($erro_rg_uf_value == 'PE') { echo "selected"; }else{ if ($_SESSION['rg_uf'] == 'PE') echo "selected"; } ?>>PE</option>
                            <option value="PI" <?php if ($erro_rg_uf_value == 'PI') { echo "selected"; }else{ if ($_SESSION['rg_uf'] == 'PI') echo "selected"; } ?>>PI</option>
                            <option value="RJ" <?php if ($erro_rg_uf_value == 'RJ') { echo "selected"; }else{ if ($_SESSION['rg_uf'] == 'RJ') echo "selected"; } ?>>RJ</option>
                            <option value="RN" <?php if ($erro_rg_uf_value == 'RN') { echo "selected"; }else{ if ($_SESSION['rg_uf'] == 'RN') echo "selected"; } ?>>RN</option>
                            <option value="RS" <?php if ($erro_rg_uf_value == 'RS') { echo "selected"; }else{ if ($_SESSION['rg_uf'] == 'RS') echo "selected"; } ?>>RS</option>
                            <option value="RO" <?php if ($erro_rg_uf_value == 'RO') { echo "selected"; }else{ if ($_SESSION['rg_uf'] == 'RO') echo "selected"; } ?>>RO</option>
                            <option value="RR" <?php if ($erro_rg_uf_value == 'RR') { echo "selected"; }else{ if ($_SESSION['rg_uf'] == 'RR') echo "selected"; } ?>>RR</option>
                            <option value="SC" <?php if ($erro_rg_uf_value == 'SC') { echo "selected"; }else{ if ($_SESSION['rg_uf'] == 'SC') echo "selected"; } ?>>SC</option>
                            <option value="SE" <?php if ($erro_rg_uf_value == 'SE') { echo "selected"; }else{ if ($_SESSION['rg_uf'] == 'SE') echo "selected"; } ?>>SE</option>
                            <option value="SP" <?php if ($erro_rg_uf_value == 'SP') { echo "selected"; }else{ if ($_SESSION['rg_uf'] == 'SP') echo "selected"; } ?>>SP</option>
                            <option value="TO" <?php if ($erro_rg_uf_value == 'TO') { echo "selected"; }else{ if ($_SESSION['rg_uf'] == 'TO') echo "selected"; } ?>>TO</option>
                        </select>
                    </div>
                </div>
                <label for="dexp">DATA DE EXPEDIÇÃO<span> *</span></label>
                <input type="date" name="dexp" id="dexp" onchange='apagaErro(this)' <?php if ($erro_count > 0) { echo "value='$erro_dexp_value'"; }else{ if (isset($_SESSION['dexp'])) echo "value='".$_SESSION['dexp']."'";  } ; if ($erro_dexp) { echo "class='erro-campo'"; }else{ echo "class='colordate'"; }?>>
                <hr>
                <label for="nome_pai">NOME DO PAI<span> *</span></label>
                <input type="text" name="nome_pai" id="nome_pai" placeholder='Nome Completo' onblur='optChangeIdEscala()' oninput='optChangeIdEscala(), apagaErro(this)' <?php if (($registro_pai == true) || ($_SESSION['registro_pai'] == true)) echo "style='background-color: lightgray; color: gray;' disabled ";?> <?php if ($erro_count > 0) { echo "value='$erro_nome_pai_value'"; }else{ if (isset($_SESSION['nome_pai'])) echo "value='".$_SESSION['nome_pai']."'";  }; if (($erro_nome_pai) && empty($registro_pai)) echo "class='erro-campo'";?>>
                <?php if (isset($erro_nome_pai) || ($_SESSION['registro_pai'] == true) || ($registro_pai == true)) { ?>
                <div id='erro_nome_sobrenome_pai' style='margin: 0 1px; ; padding:0 ; color: darkred ; font-size: 0.7rem; font-weight: bold'>
                <?php echo "<span style='display: block'>$erro_sobrenome_pai</span>"; ?>
                <input type="checkbox" id="check" name='registro_pai' onclick='regPai(this)' <?php if (($registro_pai == true) || ($_SESSION['registro_pai'] == true)) echo "value = 'true' checked ";?>><label id='check_label' for="registro_pai">sem registro paterno</label>
                </div>
                <?php }; ?>
                <label for="nome_pai">NOME DA MÃE<span> *</span></label>
                <input type="text" name="nome_mae" id="nome_mae" placeholder='Nome Completo' onblur='optChangeIdEscala()' oninput='optChangeIdEscala(), apagaErro(this)'<?php if ($erro_count > 0) { echo "value='$erro_nome_mae_value'"; }else{ if (isset($_SESSION['nome_mae'])) echo "value='".$_SESSION['nome_mae']."'"; }; if ($erro_nome_mae) echo "class='erro-campo'";?>>
                <?php if (isset($erro_nome_pai)) { ?>
                <div id='erro_nome_sobrenome_mae' style='margin: 0 1px; ; padding:0 ; color: darkred ; font-size: 0.7rem; font-weight: bold'>
                <?php echo $erro_sobrenome_mae; ?>
                </div>
                <?php }; ?>
                <label for="id-sexo">NACIONALIDADE<span> *</span></label>
                <select type="text" name="nacionalidade" onchange='apagaErro(this)' id="id-sexo" <?php if ($erro_nac) echo "class='erro-campo'" ;?>>
                    <option value="" <?php if ((!$erro_nac) && (!isset($_SESSION['nacionalidade']))) echo "selected" ;?>>Selecione</option>
                    <?php  
                        if ($erro_nac_value == 'brasileira') {
                            echo "<option value='$erro_nac_value' selected>$erro_nac_value</option>";
                        }else{
                            if ($_SESSION['nacionalidade'] == 'brasileira') {
                                echo "<option value='brasileira' selected>brasileira</option>";    
                            }else{
                                echo "<option value='brasileira'>brasileira</option>";
                            };
                        }
                        if ($erro_nac_value == 'outra') {
                            echo "<option value='$erro_nac_value' selected>$erro_nac_value</option>";
                        }else{
                            if ($_SESSION['nacionalidade'] == 'outra') {
                                echo "<option value='outra' selected>outra</option>";    
                            }else{
                                echo "<option value='outra'>outra</option>";
                            };
                        }
                    ?>
                </select>
               <div class='rg-container'>
                    <div class='crm'>
                        <label for="naturalidade">NATURALIDADE<span> *</span></label>
                        <input type="text" name="naturalidade" id="naturalidade" placeholder='Cidade em que nasceu' oninput='apagaErro(this)' <?php if ($erro_count > 0) { echo "value='$erro_nat_value'"; }else{ if (isset($_SESSION['naturalidade'])) echo "value='".$_SESSION['naturalidade']."'"; }; if ($erro_nat) echo "class='erro-campo'" ;?>>
                    </div>
                    <div class='uf'>
                        <label for="nat_uf">UF<span> *</span></label>
                        <select type="text" name="nat_uf" id="nat_uf" onchange='apagaErro(this)' onfocus='apagaErro()' <?php if ($erro_nat_uf) echo "class='erro-campo'" ;?>>
                                  <option value="" disabled <?php if ((!$erro_nat_uf_value) && (!isset($_SESSION['nat_uf']))) echo "selected" ;?>>Selecione</option>
                            <option value="AC" <?php if ($erro_nat_uf_value == 'AC') { echo "selected"; }else{ if ($_SESSION['nat_uf'] == 'AC') echo "selected"; } ?>>AC</option>
                            <option value="AL" <?php if ($erro_nat_uf_value == 'AL') { echo "selected"; }else{ if ($_SESSION['nat_uf'] == 'AL') echo "selected"; } ?>>AL</option>
                            <option value="AP" <?php if ($erro_nat_uf_value == 'AP') { echo "selected"; }else{ if ($_SESSION['nat_uf'] == 'AP') echo "selected"; } ?>>AP</option>
                            <option value="AM" <?php if ($erro_nat_uf_value == 'AM') { echo "selected"; }else{ if ($_SESSION['nat_uf'] == 'AN') echo "selected"; } ?>>AN</option>
                            <option value="BA" <?php if ($erro_nat_uf_value == 'BA') { echo "selected"; }else{ if ($_SESSION['nat_uf'] == 'BA') echo "selected"; } ?>>BA</option>
                            <option value="CE" <?php if ($erro_nat_uf_value == 'CE') { echo "selected"; }else{ if ($_SESSION['nat_uf'] == 'CE') echo "selected"; } ?>>CE</option>
                            <option value="DF" <?php if ($erro_nat_uf_value == 'DF') { echo "selected"; }else{ if ($_SESSION['nat_uf'] == 'DF') echo "selected"; } ?>>DF</option>
                            <option value="ES" <?php if ($erro_nat_uf_value == 'ES') { echo "selected"; }else{ if ($_SESSION['nat_uf'] == 'ES') echo "selected"; } ?>>ES</option>
                            <option value="GO" <?php if ($erro_nat_uf_value == 'GO') { echo "selected"; }else{ if ($_SESSION['nat_uf'] == 'GO') echo "selected"; } ?>>GO</option>
                            <option value="MA" <?php if ($erro_nat_uf_value == 'MA') { echo "selected"; }else{ if ($_SESSION['nat_uf'] == 'MA') echo "selected"; } ?>>MA</option>
                            <option value="MT" <?php if ($erro_nat_uf_value == 'MT') { echo "selected"; }else{ if ($_SESSION['nat_uf'] == 'MT') echo "selected"; } ?>>MT</option>
                            <option value="MS" <?php if ($erro_nat_uf_value == 'MS') { echo "selected"; }else{ if ($_SESSION['nat_uf'] == 'MS') echo "selected"; } ?>>MS</option>
                            <option value="MG" <?php if ($erro_nat_uf_value == 'MG') { echo "selected"; }else{ if ($_SESSION['nat_uf'] == 'MG') echo "selected"; } ?>>MG</option>
                            <option value="PR" <?php if ($erro_nat_uf_value == 'PR') { echo "selected"; }else{ if ($_SESSION['nat_uf'] == 'PR') echo "selected"; } ?>>PR</option>
                            <option value="PB" <?php if ($erro_nat_uf_value == 'PB') { echo "selected"; }else{ if ($_SESSION['nat_uf'] == 'PB') echo "selected"; } ?>>PB</option>
                            <option value="PA" <?php if ($erro_nat_uf_value == 'PA') { echo "selected"; }else{ if ($_SESSION['nat_uf'] == 'PA') echo "selected"; } ?>>PA</option>
                            <option value="PE" <?php if ($erro_nat_uf_value == 'PE') { echo "selected"; }else{ if ($_SESSION['nat_uf'] == 'PE') echo "selected"; } ?>>PE</option>
                            <option value="PI" <?php if ($erro_nat_uf_value == 'PI') { echo "selected"; }else{ if ($_SESSION['nat_uf'] == 'PI') echo "selected"; } ?>>PI</option>
                            <option value="RJ" <?php if ($erro_nat_uf_value == 'RJ') { echo "selected"; }else{ if ($_SESSION['nat_uf'] == 'RJ') echo "selected"; } ?>>RJ</option>
                            <option value="RN" <?php if ($erro_nat_uf_value == 'RN') { echo "selected"; }else{ if ($_SESSION['nat_uf'] == 'RN') echo "selected"; } ?>>RN</option>
                            <option value="RS" <?php if ($erro_nat_uf_value == 'RS') { echo "selected"; }else{ if ($_SESSION['nat_uf'] == 'RS') echo "selected"; } ?>>RS</option>
                            <option value="RO" <?php if ($erro_nat_uf_value == 'RO') { echo "selected"; }else{ if ($_SESSION['nat_uf'] == 'RO') echo "selected"; } ?>>RO</option>
                            <option value="RR" <?php if ($erro_nat_uf_value == 'RR') { echo "selected"; }else{ if ($_SESSION['nat_uf'] == 'RR') echo "selected"; } ?>>RR</option>
                            <option value="SC" <?php if ($erro_nat_uf_value == 'SC') { echo "selected"; }else{ if ($_SESSION['nat_uf'] == 'SC') echo "selected"; } ?>>SC</option>
                            <option value="SE" <?php if ($erro_nat_uf_value == 'SE') { echo "selected"; }else{ if ($_SESSION['nat_uf'] == 'SE') echo "selected"; } ?>>SE</option>
                            <option value="SP" <?php if ($erro_nat_uf_value == 'SP') { echo "selected"; }else{ if ($_SESSION['nat_uf'] == 'SP') echo "selected"; } ?>>SP</option>
                            <option value="TO" <?php if ($erro_nat_uf_value == 'TO') { echo "selected"; }else{ if ($_SESSION['nat_uf'] == 'TO') echo "selected"; } ?>>TO</option>
                        </select>
                    </div>
                </div>
                <label for="titulo">TITULO DE ELEITOR<span> *</span></label>
                <input type="text" name="titulo" id="titulo" onblur='optChangeIdEscala()' oninput='optChangeIdEscala(), apagaErro(this)'<?php if ($erro_count > 0) { echo "value='$erro_titulo_value'"; }else{ if (isset($_SESSION['titulo'])) echo "value='".$_SESSION['titulo']."'"; }; if ($erro_titulo) echo "class='erro-campo'";?>>
                <label for="pis">PIS / PASEP<span> *</span></label>
                <input type="text" name="pis" id="pis" onblur='optChangeIdEscala()' oninput='optChangeIdEscala(), apagaErro(this)'<?php if ($erro_count > 0) { echo "value='$erro_pis_value'"; }else{ if (isset($_SESSION['pis'])) echo "value='".$_SESSION['pis']."'"; }; if ($erro_pis) echo "class='erro-campo'";?>>
                <label for="telefone">CELULAR<span> *</span></label>
                <input type="text" name="telefone" id="telefone" onblur='optChangeIdEscala()' maxlength='15' oninput='optChangeIdEscala(), apagaErro(this), celRegEx(this)'<?php if ($erro_count > 0) { echo "value='$erro_telefone_value'"; }else{ if (isset($_SESSION['telefone'])) echo "value='".$_SESSION['telefone']."'"; }; if ($erro_telefone) echo "class='erro-campo'";?>>
                <label for="endereco">ENDEREÇO<span> *</span></label>
                <input type="text" name="endereco" id="endereco" onblur='optChangeIdEscala()' oninput='optChangeIdEscala(), apagaErro(this)'<?php if ($erro_count > 0) { echo "value='$erro_endereco_value'"; }else{ if (isset($_SESSION['endereco'])) echo "value='".$_SESSION['endereco']."'"; }; if ($erro_endereco) echo "class='erro-campo'";?>>
                <label for="endereco_nome">ENDEREÇO NO NOME<span> *</span></label>
                <select type="text" name="endereco_nome" onchange='apagaErro(this)' id="endereco_nome" <?php if ($erro_endereco_nome) echo "class='erro-campo'" ;?>>
                    <option value="" <?php if ((!$erro_endereco_nome) && (!isset($_SESSION['endereco_nome']))) echo "selected";?>>Selecione</option>
                    <?php 
                        if ($erro_endereco_nome_value == 'SIM') {
                            echo "<option value='$erro_endereco_nome_value' selected>$erro_endereco_nome_value</option>";
                        }else{
                            if ($_SESSION['endereco_nome'] == "SIM") {
                                echo "<option value='SIM' selected>SIM</option>";    
                            }else{
                                echo "<option value='SIM'>SIM</option>";       
                            }
                        }
                        if ($erro_endereco_nome_value == 'NÃO') {
                            echo "<option value='$erro_endereco_nome_value' selected>$erro_endereco_nome_value</option>";
                        }else{
                            if ($_SESSION['endereco_nome'] == "NÃO") {
                                echo "<option value='NÃO' selected>NÃO</option>";  
                            }else{
                                echo "<option value='NÃO'>NÃO</option>";      
                            }
                        }
                    ?>
                </select>
                <label for="login">E-MAIL<span> *</span></label>
                <input type="text" name="email" id="email" placeholder='E-mail' oninput='apagaErro(this)' onfocus='apagaErro()' <?php if ($erro_count > 0) { echo "value='$erro_email_value'"; }else{ if (isset($_SESSION['email'])) echo "value='".$_SESSION['email']."'"; }; if ($erro_email) echo "class='erro-campo'"; ?>>
                <div class='crm-container'>
                    <div class='crm'>
                        <label for="crm">CRM<span> *</span></label>
                        <input type="text" name="crm" id="crm" placeholder='CRM' oninput='optChangeIdEscala(this) , apagaErro(this)' onfocus='apagaErro()' <?php if ($erro_count > 0) { echo "value='$erro_crm_value'"; }else{ if (isset($_SESSION['crm'])) echo "value='".$_SESSION['crm']."'"; }; if ($erro_crm) echo "class='erro-campo'" ;?>>
                    </div>
                    <div class='uf'>
                        <label for="crm_uf">UF<span> *</span></label>
                        <select type="text" name="crm_uf" id="crm_uf" placeholder='UF do CRM' onchange='optChangeIdEscala() , apagaErro(this)' onfocus='apagaErro()' <?php if ($erro_uf) echo "class='erro-campo'" ;?>>
                            <option value="" disabled <?php if ((!$erro_crm_uf_value) && (!isset($_SESSION['crm_uf']))) echo "selected" ;?>>Selecione</option>
                            <option value="AC" <?php if ($erro_crm_uf_value == 'AC') { echo "selected"; }else{ if ($_SESSION['crm_uf'] == 'AC') echo "selected"; } ?>>AC</option>
                            <option value="AL" <?php if ($erro_crm_uf_value == 'AL') { echo "selected"; }else{ if ($_SESSION['crm_uf'] == 'AL') echo "selected"; } ?>>AL</option>
                            <option value="AP" <?php if ($erro_crm_uf_value == 'AP') { echo "selected"; }else{ if ($_SESSION['crm_uf'] == 'AP') echo "selected"; } ?>>AP</option>
                            <option value="AM" <?php if ($erro_crm_uf_value == 'AM') { echo "selected"; }else{ if ($_SESSION['crm_uf'] == 'AN') echo "selected"; } ?>>AN</option>
                            <option value="BA" <?php if ($erro_crm_uf_value == 'BA') { echo "selected"; }else{ if ($_SESSION['crm_uf'] == 'BA') echo "selected"; } ?>>BA</option>
                            <option value="CE" <?php if ($erro_crm_uf_value == 'CE') { echo "selected"; }else{ if ($_SESSION['crm_uf'] == 'CE') echo "selected"; } ?>>CE</option>
                            <option value="DF" <?php if ($erro_crm_uf_value == 'DF') { echo "selected"; }else{ if ($_SESSION['crm_uf'] == 'DF') echo "selected"; } ?>>DF</option>
                            <option value="ES" <?php if ($erro_crm_uf_value == 'ES') { echo "selected"; }else{ if ($_SESSION['crm_uf'] == 'ES') echo "selected"; } ?>>ES</option>
                            <option value="GO" <?php if ($erro_crm_uf_value == 'GO') { echo "selected"; }else{ if ($_SESSION['crm_uf'] == 'GO') echo "selected"; } ?>>GO</option>
                            <option value="MA" <?php if ($erro_crm_uf_value == 'MA') { echo "selected"; }else{ if ($_SESSION['crm_uf'] == 'MA') echo "selected"; } ?>>MA</option>
                            <option value="MT" <?php if ($erro_crm_uf_value == 'MT') { echo "selected"; }else{ if ($_SESSION['crm_uf'] == 'MT') echo "selected"; } ?>>MT</option>
                            <option value="MS" <?php if ($erro_crm_uf_value == 'MS') { echo "selected"; }else{ if ($_SESSION['crm_uf'] == 'MS') echo "selected"; } ?>>MS</option>
                            <option value="MG" <?php if ($erro_crm_uf_value == 'MG') { echo "selected"; }else{ if ($_SESSION['crm_uf'] == 'MG') echo "selected"; } ?>>MG</option>
                            <option value="PR" <?php if ($erro_crm_uf_value == 'PR') { echo "selected"; }else{ if ($_SESSION['crm_uf'] == 'PR') echo "selected"; } ?>>PR</option>
                            <option value="PB" <?php if ($erro_crm_uf_value == 'PB') { echo "selected"; }else{ if ($_SESSION['crm_uf'] == 'PB') echo "selected"; } ?>>PB</option>
                            <option value="PA" <?php if ($erro_crm_uf_value == 'PA') { echo "selected"; }else{ if ($_SESSION['crm_uf'] == 'PA') echo "selected"; } ?>>PA</option>
                            <option value="PE" <?php if ($erro_crm_uf_value == 'PE') { echo "selected"; }else{ if ($_SESSION['crm_uf'] == 'PE') echo "selected"; } ?>>PE</option>
                            <option value="PI" <?php if ($erro_crm_uf_value == 'PI') { echo "selected"; }else{ if ($_SESSION['crm_uf'] == 'PI') echo "selected"; } ?>>PI</option>
                            <option value="RJ" <?php if ($erro_crm_uf_value == 'RJ') { echo "selected"; }else{ if ($_SESSION['crm_uf'] == 'RJ') echo "selected"; } ?>>RJ</option>
                            <option value="RN" <?php if ($erro_crm_uf_value == 'RN') { echo "selected"; }else{ if ($_SESSION['crm_uf'] == 'RN') echo "selected"; } ?>>RN</option>
                            <option value="RS" <?php if ($erro_crm_uf_value == 'RS') { echo "selected"; }else{ if ($_SESSION['crm_uf'] == 'RS') echo "selected"; } ?>>RS</option>
                            <option value="RO" <?php if ($erro_crm_uf_value == 'RO') { echo "selected"; }else{ if ($_SESSION['crm_uf'] == 'RO') echo "selected"; } ?>>RO</option>
                            <option value="RR" <?php if ($erro_crm_uf_value == 'RR') { echo "selected"; }else{ if ($_SESSION['crm_uf'] == 'RR') echo "selected"; } ?>>RR</option>
                            <option value="SC" <?php if ($erro_crm_uf_value == 'SC') { echo "selected"; }else{ if ($_SESSION['crm_uf'] == 'SC') echo "selected"; } ?>>SC</option>
                            <option value="SE" <?php if ($erro_crm_uf_value == 'SE') { echo "selected"; }else{ if ($_SESSION['crm_uf'] == 'SE') echo "selected"; } ?>>SE</option>
                            <option value="SP" <?php if ($erro_crm_uf_value == 'SP') { echo "selected"; }else{ if ($_SESSION['crm_uf'] == 'SP') echo "selected"; } ?>>SP</option>
                            <option value="TO" <?php if ($erro_crm_uf_value == 'TO') { echo "selected"; }else{ if ($_SESSION['crm_uf'] == 'TO') echo "selected"; } ?>>TO</option>
                        </select>
                    </div>
                </div>
                <label for="id-escala">ID ESCALA<span> *</span></label>
                <select type="text" name="id-escala" onchange='apagaErro(this)' id="id-escala" <?php if ($erro_idEscala) echo "class='erro-campo'" ;?>>
                    <option value="" disabled <?php if ((!$erro_idEscala_value) && (!isset($_SESSION['id-escala']))) echo "selected"; ?>>Escolha uma opção</option>
                    <?php if ($erro_idEscala_value) { echo "<option value='$erro_idEscala_value' selected>$erro_idEscala_value</option>"; }else{ if (isset($_SESSION['id-escala'])) echo "<option value='".$_SESSION['id-escala']."' selected>".$_SESSION['id-escala']."</option>"; } ?>
                </select>
                <label for="nome">SENHA<span> *</span></label>
                <input type="password" name="senha" id="senha" placeholder='Senha de 6 digitos' maxlength='6' onfocus='apagaErro()' oninput='apagaErro(this)' <?php if ($erro_senha) { echo "class='erro-campo'" ; }else{ if (isset($_SESSION['senha'])) echo "value='".$_SESSION['senha']."'"; }; ;?>>
                <?php if (isset($erro_senha_count)) { ?>
                <div id='erro_senha_count' style='margin: 0 1px; ; padding:0 ; color: darkred ; font-size: 0.7rem; font-weight: bold'>
                <?php echo $erro_senha_count; ?>
                </div>
                <?php }; ?>
                <label for="login">CONFIRMAR SENHA<span> *</span></label>
                <input type="password" name="senha-confirma" id="senha-confirma" placeholder='Repita a senha' maxlength='6' oninput='apagaErro(this)' onfocus='apagaErro()' <?php if ($erro_senhaConfirma) { echo "class='erro-campo'" ;}else{ if (isset($_SESSION['senha'])) echo "value='".$_SESSION['senha']."'"; }; ;?>>
                <hr>
                <a id="forward1" class='forward' onclick="forward('formulario')">VOLTAR</a>
                <button id="next2" name='submit' class='next'>PRÓXIMO</a>
        </fieldset>
    </form> 

    <div id="upload-form" method='post' enctype='multipart/form-data'>
        <fieldset>
            <legend>ANEXAR DOCUMENTOS</legend>
                <?php if (isset($erro_geral)) { ?>
                <div class="erro-geral" id="erro-geral">
                <?php echo $erro_geral; ?>
                </div>
                <?php } else { ?>
                <div class="no-error" id="no-error">
                </div>
                <?php unset($erro_geral); };?>
                <div class='upload-box'>
                FOTO<span> </span>
                <div class='upload' id='foto-div' <?php if ($erro_foto) echo "style='background-color: rgba(250, 0 , 0, 0.5);'";?>>
                    <label class='label-upload' for="foto"><i class="fi fi-sr-upload"></i></label>
                </div>
                </div>
                <form id='form-foto' method='post' enctype='multipart/form-data'>
                <input type="file" multiple accept='.pdf' hidden name="foto[]" id="foto" onblur='optChangeIdEscala()' onchange="arqSelect(this,'foto-arq',2), apagaErro(this)"<?php if ($erro_count_upload > 0) echo "value='$erro_foto_value'"; if ($erro_foto) echo "class='erro-campo'";?>>
                <input type="text" name="foto_index" id="foto_index" hidden <?php if ($erro_count_upload > 0) echo "value='$erro_foto_index_value'";?>>
                </form>
                <div id='foto-arq1' class='anexo' style='padding: 2px 7px; margin: 2px 1px 0px 0px; ; background-color: #E5F1CE; color: #181A13 ; font-size: 0.8rem; font-weight: bold'>
                <i class="fi fi-sr-folder" style='float:left;'></i><span style='color: #3C4434; font-size: 8px; padding: 0 0 0 10px'></span><i class="fi fi-sr-trash" onclick="arqSelect(document.getElementById('foto'),'foto-arq',2,1)" style='float:right; cursor:pointer'></i>
                </div>
                <div id='foto-arq2' class='anexo' style='padding: 2px 7px; margin: 2px 1px 0px 0px; ; background-color: #E5F1CE; color: #181A13 ; font-size: 0.8rem; font-weight: bold'>
                <i class="fi fi-sr-folder" style='float:left'></i><span style='color: #3C4434; font-size: 8px; padding: 0 0 0 10px'></span><i class="fi fi-sr-trash" onclick="arqSelect(document.getElementById('foto'),'foto-arq',2,2)" style='float:right; cursor:pointer'></i>
                </div>
                <div id='foto-arq-erro' style='margin: 0; padding: 0; color: red ; font-size: 9px; font-weight: bold'>
                </div>
                <div class='upload-box'>
                    CURRICULUM VITAE<span> </span>
                <div class='upload' id='curriculum-div'>
                    <label class='label-upload' for="curriculum"><i class="fi fi-sr-upload"></i></label>
                </div>
                </div>
                <form id='form-curriculum' method='post' enctype='multipart/form-data'>
                <input type="file" multiple accept='.pdf' hidden name="curriculum[]" id="curriculum" onchange="arqSelect(this,'curriculum-arq',2), apagaErro(this)"<?php if ($erro_count_upload > 0) echo "value='$erro_curriculum_value'"; if ($erro_curriculum) echo "class='erro-campo'";?>>
                <input type="text" name="curriculum_index" id="curriculum_index" hidden <?php if ($erro_count_upload > 0) echo "value='$erro_curriculum_index_value'";?>>
                </form>
                <div id='curriculum-arq1' class='anexo' style='padding: 2px 7px; margin: 2px 1px 0px 0px; ; background-color: #E5F1CE; color: #181A13 ; font-size: 0.8rem; font-weight: bold'>
                <i class="fi fi-sr-folder" style='float:left;'></i><span style='color: #3C4434; font-size: 8px; padding: 0 0 0 10px'></span><i class="fi fi-sr-trash" onclick="arqSelect(document.getElementById('curriculum'),'curriculum-arq',2,1)" style='float:right; cursor:pointer'></i>
                </div>
                <div id='curriculum-arq2' class='anexo' style='padding: 2px 7px; margin: 2px 1px 0px 0px; ; background-color: #E5F1CE; color: #181A13 ; font-size: 0.8rem; font-weight: bold'>
                <i class="fi fi-sr-folder" style='float:left'></i><span style='color: #3C4434; font-size: 8px; padding: 0 0 0 10px'></span><i class="fi fi-sr-trash" onclick="arqSelect(document.getElementById('curriculum'),'curriculum-arq',2,2)" style='float:right; cursor:pointer'></i>
                </div>
                <div id='curriculum-arq-erro' style='margin: 0; padding: 0; color: red ; font-size: 9px; font-weight: bold'>
                </div>
                <div class='upload-box'>
                    IDENTIDADE MÉDICA OU CARTEIRA PROFISSIONAL MÉDICA <span> </span>
                <div class='upload' id='carteiracrm-div'>
                    <label class='label-upload' for="carteiracrm"><i class="fi fi-sr-upload"></i></label>
                </div>
                </div>
                <form id='form-carteiracrm' method='post' enctype='multipart/form-data'>
                <input type="file" multiple accept='.pdf' hidden name="carteiracrm[]" id="carteiracrm" onchange="arqSelect(this,'carteiracrm-arq',2), apagaErro(this)"<?php if ($erro_count_upload > 0) echo "value='$erro_carteiracrm_value'"; if ($erro_carteiracrm) echo "class='erro-campo'";?>>
                <input type="text" name="carteiracrm_index" id="carteiracrm_index" hidden <?php if ($erro_count_upload > 0) echo "value='$erro_carteiracrm_index_value'";?>>
                </form>
                <div id='carteiracrm-arq1' class='anexo' style='padding: 2px 7px; margin: 2px 1px 0px 0px; ; background-color: #E5F1CE; color: #181A13 ; font-size: 0.8rem; font-weight: bold'>
                <i class="fi fi-sr-folder" style='float:left;'></i><span style='color: #3C4434; font-size: 8px; padding: 0 0 0 10px'></span><i class="fi fi-sr-trash" onclick="arqSelect(document.getElementById('carteiracrm'),'carteiracrm-arq',2,1)" style='float:right; cursor:pointer'></i>
                </div>
                <div id='carteiracrm-arq2' class='anexo' style='padding: 2px 7px; margin: 2px 1px 0px 0px; ; background-color: #E5F1CE; color: #181A13 ; font-size: 0.8rem; font-weight: bold'>
                <i class="fi fi-sr-folder" style='float:left'></i><span style='color: #3C4434; font-size: 8px; padding: 0 0 0 10px'></span><i class="fi fi-sr-trash" onclick="arqSelect(document.getElementById('carteiracrm'),'carteiracrm-arq',2,2)" style='float:right; cursor:pointer'></i>
                </div>
                <div id='carteiracrm-arq-erro' style='margin: 0; padding: 0; color: red ; font-size: 9px; font-weight: bold'>
                </div>
                <div class='upload-box'>
                    REGISTRO GERAL (RG) <span> </span>
                <div class='upload' id='rgupload-div'>
                    <label class='label-upload' for="rgupload"><i class="fi fi-sr-upload"></i></label>
                </div>
                </div>
                <form id='form-rgupload' method='post' enctype='multipart/form-data'>
                <input type="file" multiple accept='.pdf' hidden name="rgupload[]" id="rgupload" onchange="arqSelect(this,'rgupload-arq',2), apagaErro(this)"<?php if ($erro_count_upload > 0) echo "value='$erro_rgupload_value'"; if ($erro_rgupload) echo "class='erro-campo'";?>>
                <input type="text" name="rgupload_index" id="rgupload_index" hidden <?php if ($erro_count_upload > 0) echo "value='$erro_rgupload_index_value'";?>>
                </form>
                <div id='rgupload-arq1' class='anexo' style='padding: 2px 7px; margin: 2px 1px 0px 0px; ; background-color: #E5F1CE; color: #181A13 ; font-size: 0.8rem; font-weight: bold'>
                <i class="fi fi-sr-folder" style='float:left;'></i><span style='color: #3C4434; font-size: 8px; padding: 0 0 0 10px'></span><i class="fi fi-sr-trash" onclick="arqSelect(document.getElementById('rgupload'),'rgupload-arq',2,1)" style='float:right; cursor:pointer'></i>
                </div>
                <div id='rgupload-arq2' class='anexo' style='padding: 2px 7px; margin: 2px 1px 0px 0px; ; background-color: #E5F1CE; color: #181A13 ; font-size: 0.8rem; font-weight: bold'>
                <i class="fi fi-sr-folder" style='float:left'></i><span style='color: #3C4434; font-size: 8px; padding: 0 0 0 10px'></span><i class="fi fi-sr-trash" onclick="arqSelect(document.getElementById('rgupload'),'rgupload-arq',2,2)" style='float:right; cursor:pointer'></i>
                </div>
                <div id='rgupload-arq-erro' style='margin: 0; padding: 0; color: red ; font-size: 9px; font-weight: bold'>
                </div>
                <div class='upload-box'>
                     CPF <span> </span>
                <div class='upload' id='cpfupload-div'>
                    <label class='label-upload' for="cpfupload"><i class="fi fi-sr-upload"></i></label>
                </div>
                </div>
                <form id='form-cpfupload' method='post' enctype='multipart/form-data'>
                <input type="file" multiple accept='.pdf' hidden name="cpfupload[]" id="cpfupload" onchange="arqSelect(this,'cpfupload-arq',2), apagaErro(this)"<?php if ($erro_count_upload > 0) echo "value='$erro_cpfupload_value'"; if ($erro_cpfupload) echo "class='erro-campo'";?>>
                <input type="text" name="cpfupload_index" id="cpfupload_index" hidden <?php if ($erro_count_upload > 0) echo "value='$erro_cpfupload_index_value'";?>>
                </form>
                <div id='cpfupload-arq1' class='anexo' style='padding: 2px 7px; margin: 2px 1px 0px 0px; ; background-color: #E5F1CE; color: #181A13 ; font-size: 0.8rem; font-weight: bold'>
                <i class="fi fi-sr-folder" style='float:left;'></i><span style='color: #3C4434; font-size: 8px; padding: 0 0 0 10px'></span><i class="fi fi-sr-trash" onclick="arqSelect(document.getElementById('cpfupload'),'cpfupload-arq',2,1)" style='float:right; cursor:pointer'></i>
                </div>
                <div id='cpfupload-arq2' class='anexo' style='padding: 2px 7px; margin: 2px 1px 0px 0px; ; background-color: #E5F1CE; color: #181A13 ; font-size: 0.8rem; font-weight: bold'>
                <i class="fi fi-sr-folder" style='float:left'></i><span style='color: #3C4434; font-size: 8px; padding: 0 0 0 10px'></span><i class="fi fi-sr-trash" onclick="arqSelect(document.getElementById('cpfupload'),'cpfupload-arq',2,2)" style='float:right; cursor:pointer'></i>
                </div>
                <div id='cpfupload-arq-erro' style='margin: 0; padding: 0; color: red ; font-size: 9px; font-weight: bold'>
                </div>
                <div class='upload-box'>
                     TITULO DE ELEITOR <span> </span>
                <div class='upload' id='tituloupload-div'>
                    <label class='label-upload' for="tituloupload"><i class="fi fi-sr-upload"></i></label>
                </div>
                </div>
                <form id='form-tituloupload' method='post' enctype='multipart/form-data'>
                <input type="file" multiple accept='.pdf' hidden name="tituloupload[]" id="tituloupload" onchange="arqSelect(this,'tituloupload-arq',2), apagaErro(this)"<?php if ($erro_count_upload > 0) echo "value='$erro_tituloupload_value'"; if ($erro_tituloupload) echo "class='erro-campo'";?>>
                <input type="text" name="tituloupload_index" id="tituloupload_index" hidden <?php if ($erro_count_upload > 0) echo "value='$erro_tituloupload_index_value'";?>>
                </form>
                <div id='tituloupload-arq1' class='anexo' style='padding: 2px 7px; margin: 2px 1px 0px 0px; ; background-color: #E5F1CE; color: #181A13 ; font-size: 0.8rem; font-weight: bold'>
                <i class="fi fi-sr-folder" style='float:left;'></i><span style='color: #3C4434; font-size: 8px; padding: 0 0 0 10px'></span><i class="fi fi-sr-trash" onclick="arqSelect(document.getElementById('tituloupload'),'tituloupload-arq',2,1)" style='float:right; cursor:pointer'></i>
                </div>
                <div id='tituloupload-arq2' class='anexo' style='padding: 2px 7px; margin: 2px 1px 0px 0px; ; background-color: #E5F1CE; color: #181A13 ; font-size: 0.8rem; font-weight: bold'>
                <i class="fi fi-sr-folder" style='float:left'></i><span style='color: #3C4434; font-size: 8px; padding: 0 0 0 10px'></span><i class="fi fi-sr-trash" onclick="arqSelect(document.getElementById('tituloupload'),'tituloupload-arq',2,2)" style='float:right; cursor:pointer'></i>
                </div>
                <div id='tituloupload-arq-erro' style='margin: 0; padding: 0; color: red ; font-size: 9px; font-weight: bold'>
                </div>
                <?php if ($sexo == 'masculino') { ?>
                <div class='upload-box' id='reservista-box'>
                     CARTEIRA DE RESERVISTA OU PROVA DE ALISTAMENTO MILITAR <span> </span>
                <div class='upload' id='reservista-div'>
                    <label class='label-upload' for="reservista"><i class="fi fi-sr-upload"></i></label>
                </div>
                </div>
                <form id='form-reservista' method='post' enctype='multipart/form-data'>
                <input type="file" multiple accept='.pdf' hidden name="reservista[]" id="reservista" onchange="arqSelect(this,'reservista-arq',2), apagaErro(this)"<?php if ($erro_count_upload > 0) echo "value='$erro_reservista_value'"; if ($erro_reservista) echo "class='erro-campo'";?>>
                <input type="text" name="reservista_index" id="reservista_index" hidden <?php if ($erro_count_upload > 0) echo "value='$erro_reservista_index_value'";?>>
                </form>
                <div id='reservista-arq1' class='anexo' style='padding: 2px 7px; margin: 2px 1px 0px 0px; ; background-color: #E5F1CE; color: #181A13 ; font-size: 0.8rem; font-weight: bold'>
                <i class="fi fi-sr-folder" style='float:left;'></i><span style='color: #3C4434; font-size: 8px; padding: 0 0 0 10px'></span><i class="fi fi-sr-trash" onclick="arqSelect(document.getElementById('reservista'),'reservista-arq',2,1)" style='float:right; cursor:pointer'></i>
                </div>
                <div id='reservista-arq2' class='anexo' style='padding: 2px 7px; margin: 2px 1px 0px 0px; ; background-color: #E5F1CE; color: #181A13 ; font-size: 0.8rem; font-weight: bold'>
                <i class="fi fi-sr-folder" style='float:left'></i><span style='color: #3C4434; font-size: 8px; padding: 0 0 0 10px'></span><i class="fi fi-sr-trash" onclick="arqSelect(document.getElementById('reservista'),'reservista-arq',2,2)" style='float:right; cursor:pointer'></i>
                </div>
                <div id='reservista-arq-erro' style='margin: 0; padding: 0; color: red ; font-size: 9px; font-weight: bold'>
                </div>
                <?php } ?>
                <div class='upload-box'>
                     COMPROVANTE DE INSCRIÇÃO PIS/PASEP <span> </span>
                <div class='upload' id='pisupload-div'>
                    <label class='label-upload' for="pisupload"><i class="fi fi-sr-upload"></i></label>
                </div>
                </div>
                <form id='form-pisupload' method='post' enctype='multipart/form-data'>
                <input type="file" multiple accept='.pdf' hidden name="pisupload[]" id="pisupload" onchange="arqSelect(this,'pisupload-arq',1), apagaErro(this)"<?php if ($erro_count_upload > 0) echo "value='$erro_pisupload_value'"; if ($erro_pisupload) echo "class='erro-campo'";?>>
                <input type="text" name="pisupload_index" id="pisupload_index" hidden <?php if ($erro_count_upload > 0) echo "value='$erro_pisupload_index_value'";?>>
                </form>
                <div id='pisupload-arq1' class='anexo' style='padding: 2px 7px; margin: 2px 1px 0px 0px; ; background-color: #E5F1CE; color: #181A13 ; font-size: 0.8rem; font-weight: bold'>
                <i class="fi fi-sr-folder" style='float:left;'></i><span style='color: #3C4434; font-size: 8px; padding: 0 0 0 10px'></span><i class="fi fi-sr-trash" onclick="arqSelect(document.getElementById('pisupload'),'pisupload-arq',1,1)" style='float:right; cursor:pointer'></i>
                </div>
                <div id='pisupload-arq-erro' style='margin: 0; padding: 0; color: red ; font-size: 9px; font-weight: bold'>
                </div>
                <div class='upload-box'>
                     COMPROVANTE DE ENDEREÇO OU DECLARAÇÃO DE RESIDÊNCIA <span> *</span>
                <div class='upload' id='enderecoupload-div'>
                    <label class='label-upload' for="enderecoupload"><i class="fi fi-sr-upload"></i></label>
                </div>
                </div>
                <form id='form-enderecoupload' method='post' enctype='multipart/form-data'>
                <input type="file" multiple accept='.pdf' hidden name="enderecoupload[]" id="enderecoupload" onchange="arqSelect(this,'enderecoupload-arq',2), apagaErro(this)"<?php if ($erro_count_upload > 0) echo "value='$erro_enderecoupload_value'"; if ($erro_enderecoupload) echo "class='erro-campo'";?>>
                <input type="text" name="enderecoupload_index" id="enderecoupload_index" hidden <?php if ($erro_count_upload > 0) echo "value='$erro_enderecoupload_index_value'";?>>
                </form>
                <div id='enderecoupload-arq1' class='anexo' style='padding: 2px 7px; margin: 2px 1px 0px 0px; ; background-color: #E5F1CE; color: #181A13 ; font-size: 0.8rem; font-weight: bold'>
                <i class="fi fi-sr-folder" style='float:left;'></i><span style='color: #3C4434; font-size: 8px; padding: 0 0 0 10px'></span><i class="fi fi-sr-trash" onclick="arqSelect(document.getElementById('enderecoupload'),'enderecoupload-arq',2,1)" style='float:right; cursor:pointer'></i>
                </div>
                <div id='enderecoupload-arq2' class='anexo' style='padding: 2px 7px; margin: 2px 1px 0px 0px; ; background-color: #E5F1CE; color: #181A13 ; font-size: 0.8rem; font-weight: bold'>
                <i class="fi fi-sr-folder" style='float:left'></i><span style='color: #3C4434; font-size: 8px; padding: 0 0 0 10px'></span><i class="fi fi-sr-trash" onclick="arqSelect(document.getElementById('enderecoupload'),'enderecoupload-arq',2,2)" style='float:right; cursor:pointer'></i>
                </div>
                <div id='enderecoupload-arq-erro' style='margin: 0; padding: 0; color: red ; font-size: 9px; font-weight: bold'>
                </div>
                <div class='upload-box'>
                     DIPLOMA OU CERTIFICADO DE CONCLUSÃO DE MEDICINA <span> </span>
                <div class='upload' id='diploma-div'>
                    <label class='label-upload' for="diploma"><i class="fi fi-sr-upload"></i></label>
                </div>
                </div>
                <form id='form-diploma' method='post' enctype='multipart/form-data'>
                <input type="file" multiple accept='.pdf' hidden name="diploma[]" id="diploma" onchange="arqSelect(this,'diploma-arq',2), apagaErro(this)"<?php if ($erro_count_upload > 0) echo "value='$erro_diploma_value'"; if ($erro_diploma) echo "class='erro-campo'";?>>
                <input type="text" name="diploma_index" id="diploma_index" hidden <?php if ($erro_count_upload > 0) echo "value='$erro_diploma_index_value'";?>>
                </form>
                <div id='diploma-arq1' class='anexo' style='padding: 2px 7px; margin: 2px 1px 0px 0px; ; background-color: #E5F1CE; color: #181A13 ; font-size: 0.8rem; font-weight: bold'>
                <i class="fi fi-sr-folder" style='float:left;'></i><span style='color: #3C4434; font-size: 8px; padding: 0 0 0 10px'></span><i class="fi fi-sr-trash" onclick="arqSelect(document.getElementById('diploma'),'diploma-arq',2,1)" style='float:right; cursor:pointer'></i>
                </div>
                <div id='diploma-arq2' class='anexo' style='padding: 2px 7px; margin: 2px 1px 0px 0px; ; background-color: #E5F1CE; color: #181A13 ; font-size: 0.8rem; font-weight: bold'>
                <i class="fi fi-sr-folder" style='float:left'></i><span style='color: #3C4434; font-size: 8px; padding: 0 0 0 10px'></span><i class="fi fi-sr-trash" onclick="arqSelect(document.getElementById('diploma'),'diploma-arq',2,2)" style='float:right; cursor:pointer'></i>
                </div>
                <div id='diploma-arq-erro' style='margin: 0; padding: 0; color: red ; font-size: 9px; font-weight: bold'>
                </div>
                <div class='upload-box'>
                     CERTIDÃO NEGATIVA DE DÉBITOS DO CONSELHO DE CLASSE (CRM) <span> </span>
                <div class='upload' id='cndcrm-div'>
                    <label class='label-upload' for="cndcrm"><i class="fi fi-sr-upload"></i></label>
                </div>
                </div>
                <form id='form-cndcrm' method='post' enctype='multipart/form-data'>
                <input type="file" multiple accept='.pdf' hidden name="cndcrm[]" id="cndcrm" onchange="arqSelect(this,'cndcrm-arq',2), apagaErro(this)"<?php if ($erro_count_upload > 0) echo "value='$erro_cndcrm_value'"; if ($erro_cndcrm) echo "class='erro-campo'";?>>
                <input type="text" name="cndcrm_index" id="cndcrm_index" hidden <?php if ($erro_count_upload > 0) echo "value='$erro_cndcrm_index_value'";?>>
                </form>
                <div id='cndcrm-arq1' class='anexo' style='padding: 2px 7px; margin: 2px 1px 0px 0px; ; background-color: #E5F1CE; color: #181A13 ; font-size: 0.8rem; font-weight: bold'>
                <i class="fi fi-sr-folder" style='float:left;'></i><span style='color: #3C4434; font-size: 8px; padding: 0 0 0 10px'></span><i class="fi fi-sr-trash" onclick="arqSelect(document.getElementById('cndcrm'),'cndcrm-arq',2,1)" style='float:right; cursor:pointer'></i>
                </div>
                <div id='cndcrm-arq2' class='anexo' style='padding: 2px 7px; margin: 2px 1px 0px 0px; ; background-color: #E5F1CE; color: #181A13 ; font-size: 0.8rem; font-weight: bold'>
                <i class="fi fi-sr-folder" style='float:left'></i><span style='color: #3C4434; font-size: 8px; padding: 0 0 0 10px'></span><i class="fi fi-sr-trash" onclick="arqSelect(document.getElementById('cndcrm'),'cndcrm-arq',2,2)" style='float:right; cursor:pointer'></i>
                </div>
                <div id='cndcrm-arq-erro' style='margin: 0; padding: 0; color: red ; font-size: 9px; font-weight: bold'>
                </div>
                <div class='upload-box'>
                     CARTÃO DE VACINAÇÃO ATUALIZADO <span> </span>
                <div class='upload' id='cartaovacina-div'>
                    <label class='label-upload' for="cartaovacina"><i class="fi fi-sr-upload"></i></label>
                </div>
                </div>
                <form id='form-cartaovacina' method='post' enctype='multipart/form-data'>
                <input type="file" multiple accept='.pdf' hidden name="cartaovacina[]" id="cartaovacina" onchange="arqSelect(this,'cartaovacina-arq',5), apagaErro(this)"<?php if ($erro_count_upload > 0) echo "value='$erro_cartaovacina_value'"; if ($erro_cartaovacina) echo "class='erro-campo'";?>>
                <input type="text" name="cartaovacina_index" hidden id="cartaovacina_index" <?php if ($erro_count_upload > 0) echo "value='$erro_cartaovacina_index_value'";?>>
                </form>
                <div id='cartaovacina-arq1' class='anexo' style='padding: 2px 7px; margin: 2px 1px 0px 0px; ; background-color: #E5F1CE; color: #181A13 ; font-size: 0.8rem; font-weight: bold'>
                <i class="fi fi-sr-folder" style='float:left;'></i><span style='color: #3C4434; font-size: 8px; padding: 0 0 0 10px'></span><i class="fi fi-sr-trash" onclick="arqSelect(document.getElementById('cartaovacina'),'cartaovacina-arq',5,1)" style='float:right; cursor:pointer'></i>
                </div>
                <div id='cartaovacina-arq2' class='anexo' style='padding: 2px 7px; margin: 2px 1px 0px 0px; ; background-color: #E5F1CE; color: #181A13 ; font-size: 0.8rem; font-weight: bold'>
                <i class="fi fi-sr-folder" style='float:left'></i><span style='color: #3C4434; font-size: 8px; padding: 0 0 0 10px'></span><i class="fi fi-sr-trash" onclick="arqSelect(document.getElementById('cartaovacina'),'cartaovacina-arq',5,2)" style='float:right; cursor:pointer'></i>
                </div>
                <div id='cartaovacina-arq3' class='anexo' style='padding: 2px 7px; margin: 2px 1px 0px 0px; ; background-color: #E5F1CE; color: #181A13 ; font-size: 0.8rem; font-weight: bold'>
                <i class="fi fi-sr-folder" style='float:left'></i><span style='color: #3C4434; font-size: 8px; padding: 0 0 0 10px'></span><i class="fi fi-sr-trash" onclick="arqSelect(document.getElementById('cartaovacina'),'cartaovacina-arq',5,3)" style='float:right; cursor:pointer'></i>
                </div>
                <div id='cartaovacina-arq4' class='anexo' style='padding: 2px 7px; margin: 2px 1px 0px 0px; ; background-color: #E5F1CE; color: #181A13 ; font-size: 0.8rem; font-weight: bold'>
                <i class="fi fi-sr-folder" style='float:left'></i><span style='color: #3C4434; font-size: 8px; padding: 0 0 0 10px'></span><i class="fi fi-sr-trash" onclick="arqSelect(document.getElementById('cartaovacina'),'cartaovacina-arq',5,4)" style='float:right; cursor:pointer'></i>
                </div>
                <div id='cartaovacina-arq5' class='anexo' style='padding: 2px 7px; margin: 2px 1px 0px 0px; ; background-color: #E5F1CE; color: #181A13 ; font-size: 0.8rem; font-weight: bold'>
                <i class="fi fi-sr-folder" style='float:left'></i><span style='color: #3C4434; font-size: 8px; padding: 0 0 0 10px'></span><i class="fi fi-sr-trash" onclick="arqSelect(document.getElementById('cartaovacina'),'cartaovacina-arq',5,5)" style='float:right; cursor:pointer'></i>
                </div>
                <div id='cartaovacina-arq-erro' style='margin: 0; padding: 0; color: red ; font-size: 9px; font-weight: bold'>
                </div>
                <div class='upload-box'>
                     CERTIDÃO DE ANTECEDENTES ÉTICOS <span> *</span>
                <div class='upload' id='eticos-div'>
                    <label class='label-upload' for="eticos"><i class="fi fi-sr-upload"></i></label>
                </div>
                </div>
                <form id='form-eticos' method='post' enctype='multipart/form-data'>
                <input type="file" multiple accept='.pdf' hidden name="eticos[]" id="eticos" onchange="arqSelect(this,'eticos-arq',2), apagaErro(this)"<?php if ($erro_count_upload > 0) echo "value='$erro_eticos_value'"; if ($erro_eticos) echo "class='erro-campo'";?>>
                <input type="text" name="eticos_index" id="eticos_index" hidden <?php if ($erro_count_upload > 0) echo "value='$erro_eticos_index_value'";?>>
                </form>
                <div id='eticos-arq1' class='anexo' style='padding: 2px 7px; margin: 2px 1px 0px 0px; ; background-color: #E5F1CE; color: #181A13 ; font-size: 0.8rem; font-weight: bold'>
                <i class="fi fi-sr-folder" style='float:left;'></i><span style='color: #3C4434; font-size: 8px; padding: 0 0 0 10px'></span><i class="fi fi-sr-trash" onclick="arqSelect(document.getElementById('eticos'),'eticos-arq',2,1)" style='float:right; cursor:pointer'></i>
                </div>
                <div id='eticos-arq2' class='anexo' style='padding: 2px 7px; margin: 2px 1px 0px 0px; ; background-color: #E5F1CE; color: #181A13 ; font-size: 0.8rem; font-weight: bold'>
                <i class="fi fi-sr-folder" style='float:left'></i><span style='color: #3C4434; font-size: 8px; padding: 0 0 0 10px'></span><i class="fi fi-sr-trash" onclick="arqSelect(document.getElementById('eticos'),'eticos-arq',2,2)" style='float:right; cursor:pointer'></i>
                </div>
                <div id='eticos-arq-erro' style='margin: 0; padding: 0; color: red ; font-size: 9px; font-weight: bold'>
                </div>
                <div class='upload-box'>
                     CERTIDÃO NEGATIVA CRIMINAL FEDERAL <span> </span>
                <div class='upload' id='cncf-div'>
                    <label class='label-upload' for="cncf"><i class="fi fi-sr-upload"></i></label>
                </div>
                </div>
                <form id='form-cncf' method='post' enctype='multipart/form-data'>
                <input type="file" multiple accept='.pdf' hidden name="cncf[]" id="cncf" onchange="arqSelect(this,'cncf-arq',1), apagaErro(this)"<?php if ($erro_count_upload > 0) echo "value='$erro_cncf_value'"; if ($erro_cncf) echo "class='erro-campo'";?>>
                <input type="text" name="cncf_index" id="cncf_index" hidden <?php if ($erro_count_upload > 0) echo "value='$erro_cncf_index_value'";?>>
                </form>
                <div id='cncf-arq1' class='anexo' style='padding: 2px 7px; margin: 2px 1px 0px 0px; ; background-color: #E5F1CE; color: #181A13 ; font-size: 0.8rem; font-weight: bold'>
                <i class="fi fi-sr-folder" style='float:left;'></i><span style='color: #3C4434; font-size: 8px; padding: 0 0 0 10px'></span><i class="fi fi-sr-trash" onclick="arqSelect(document.getElementById('cncf'),'cncf-arq',1,1)" style='float:right; cursor:pointer'></i>
                </div>
                <div id='cncf-arq-erro' style='margin: 0; padding: 0; color: red ; font-size: 9px; font-weight: bold'>
                </div>
                <div class='upload-box'>
                     CERTIDÃO NEGATIVA CRIMINAL ESTADUAL <span> </span>
                <div class='upload' id='cnce-div'>
                    <label class='label-upload' for="cnce"><i class="fi fi-sr-upload"></i></label>
                </div>
                </div>
                <form id='form-cnce' method='post' enctype='multipart/form-data'>
                <input type="file" multiple accept='.pdf' hidden name="cnce[]" id="cnce" onchange="arqSelect(this,'cnce-arq',1), apagaErro(this)"<?php if ($erro_count_upload > 0) echo "value='$erro_cnce_value'"; if ($erro_cnce) echo "class='erro-campo'";?>>
                <input type="text" name="cnce_index" id="cnce_index" hidden <?php if ($erro_count_upload > 0) echo "value='$erro_cnce_index_value'";?>>
                </form>
                <div id='cnce-arq1' class='anexo' style='padding: 2px 7px; margin: 2px 1px 0px 0px; ; background-color: #E5F1CE; color: #181A13 ; font-size: 0.8rem; font-weight: bold'>
                <i class="fi fi-sr-folder" style='float:left;'></i><span style='color: #3C4434; font-size: 8px; padding: 0 0 0 10px'></span><i class="fi fi-sr-trash" onclick="arqSelect(document.getElementById('cnce'),'cnce-arq',1,1)" style='float:right; cursor:pointer'></i>
                </div>
                <div id='cnce-arq-erro' style='margin: 0; padding: 0; color: red ; font-size: 9px; font-weight: bold'>
                </div>
                <div class='upload-box'>
                     CERTIDÃO NEGATIVA DE DÉBITO FEDERAL <span> </span>
                <div class='upload' id='cndf-div'>
                    <label class='label-upload' for="cndf"><i class="fi fi-sr-upload"></i></label>
                </div>
                </div>
                <form id='form-cndf' method='post' enctype='multipart/form-data'>
                <input type="file" multiple accept='.pdf' hidden name="cndf[]" id="cndf" onchange="arqSelect(this,'cndf-arq',1), apagaErro(this)"<?php if ($erro_count_upload > 0) echo "value='$erro_cndf_value'"; if ($erro_cndf) echo "class='erro-campo'";?>>
                <input type="text" name="cndf_index" id="cndf_index" hidden <?php if ($erro_count_upload > 0) echo "value='$erro_cndf_index_value'";?>>
                </form>
                <div id='cndf-arq1' class='anexo' style='padding: 2px 7px; margin: 2px 1px 0px 0px; ; background-color: #E5F1CE; color: #181A13 ; font-size: 0.8rem; font-weight: bold'>
                <i class="fi fi-sr-folder" style='float:left;'></i><span style='color: #3C4434; font-size: 8px; padding: 0 0 0 10px'></span><i class="fi fi-sr-trash" onclick="arqSelect(document.getElementById('cndf'),'cndf-arq',1,1)" style='float:right; cursor:pointer'></i>
                </div>
                <div id='cndf-arq-erro' style='margin: 0; padding: 0; color: red ; font-size: 9px; font-weight: bold'>
                </div>
                <div class='upload-box'>
                     CERTIDÃO NEGATIVA DE DÉBITO ESTADUAL <span> </span>
                <div class='upload' id='cnde-div'>
                    <label class='label-upload' for="cnde"><i class="fi fi-sr-upload"></i></label>
                </div>
                </div>
                <form id='form-cnde' method='post' enctype='multipart/form-data'>
                <input type="file" multiple accept='.pdf' hidden name="cnde[]" id="cnde" onchange="arqSelect(this,'cnde-arq',1), apagaErro(this)"<?php if ($erro_count_upload > 0) echo "value='$erro_cnde_value'"; if ($erro_cnde) echo "class='erro-campo'";?>>
                <input type="text" name="cnde_index" id="cnde_index" hidden <?php if ($erro_count_upload > 0) echo "value='$erro_cnde_index_value'";?>>
                </form>
                <div id='cnde-arq1' class='anexo' style='padding: 2px 7px; margin: 2px 1px 0px 0px; ; background-color: #E5F1CE; color: #181A13 ; font-size: 0.8rem; font-weight: bold'>
                <i class="fi fi-sr-folder" style='float:left;'></i><span style='color: #3C4434; font-size: 8px; padding: 0 0 0 10px'></span><i class="fi fi-sr-trash" onclick="arqSelect(document.getElementById('cnde'),'cnde-arq',1,1)" style='float:right; cursor:pointer'></i>
                </div>
                <div id='cnde-arq-erro' style='margin: 0; padding: 0; color: red ; font-size: 9px; font-weight: bold'>
                </div>
                <div class='upload-box'>
                     CERTIDÃO NEGATIVA DE DÉBITO MUNICIPAL <span> </span>
                <div class='upload' id='cndm-div'>
                    <label class='label-upload' for="cndm"><i class="fi fi-sr-upload"></i></label>
                </div>
                </div>
                <form id='form-cndm' method='post' enctype='multipart/form-data'>
                <input type="file" multiple accept='.pdf' hidden name="cndm[]" id="cndm" onchange="arqSelect(this,'cndm-arq',5), apagaErro(this)"<?php if ($erro_count_upload > 0) echo "value='$erro_cndm_value'"; if ($erro_cndm) echo "class='erro-campo'";?>>
                <input type="text" name="cndm_index" id="cndm_index" hidden <?php if ($erro_count_upload > 0) echo "value='$erro_cndm_index_value'";?>>
                </form>
                <div id='cndm-arq1' class='anexo' style='padding: 2px 7px; margin: 2px 1px 0px 0px; ; background-color: #E5F1CE; color: #181A13 ; font-size: 0.8rem; font-weight: bold'>
                <i class="fi fi-sr-folder" style='float:left;'></i><span style='color: #3C4434; font-size: 8px; padding: 0 0 0 10px'></span><i class="fi fi-sr-trash" onclick="arqSelect(document.getElementById('cndm'),'cndm-arq',5,1)" style='float:right; cursor:pointer'></i>
                </div>
                <div id='cndm-arq2' class='anexo' style='padding: 2px 7px; margin: 2px 1px 0px 0px; ; background-color: #E5F1CE; color: #181A13 ; font-size: 0.8rem; font-weight: bold'>
                <i class="fi fi-sr-folder" style='float:left'></i><span style='color: #3C4434; font-size: 8px; padding: 0 0 0 10px'></span><i class="fi fi-sr-trash" onclick="arqSelect(document.getElementById('cndm'),'cndm-arq',5,2)" style='float:right; cursor:pointer'></i>
                </div>
                <div id='cndm-arq3' class='anexo' style='padding: 2px 7px; margin: 2px 1px 0px 0px; ; background-color: #E5F1CE; color: #181A13 ; font-size: 0.8rem; font-weight: bold'>
                <i class="fi fi-sr-folder" style='float:left'></i><span style='color: #3C4434; font-size: 8px; padding: 0 0 0 10px'></span><i class="fi fi-sr-trash" onclick="arqSelect(document.getElementById('cndm'),'cndm-arq',5,3)" style='float:right; cursor:pointer'></i>
                </div>
                <div id='cndm-arq4' class='anexo' style='padding: 2px 7px; margin: 2px 1px 0px 0px; ; background-color: #E5F1CE; color: #181A13 ; font-size: 0.8rem; font-weight: bold'>
                <i class="fi fi-sr-folder" style='float:left'></i><span style='color: #3C4434; font-size: 8px; padding: 0 0 0 10px'></span><i class="fi fi-sr-trash" onclick="arqSelect(document.getElementById('cndm'),'cndm-arq',5,4)" style='float:right; cursor:pointer'></i>
                </div>
                <div id='cndm-arq5' class='anexo' style='padding: 2px 7px; margin: 2px 1px 0px 0px; ; background-color: #E5F1CE; color: #181A13 ; font-size: 0.8rem; font-weight: bold'>
                <i class="fi fi-sr-folder" style='float:left'></i><span style='color: #3C4434; font-size: 8px; padding: 0 0 0 10px'></span><i class="fi fi-sr-trash" onclick="arqSelect(document.getElementById('cndm'),'cndm-arq',5,5)" style='float:right; cursor:pointer'></i>
                </div>
                <div id='cndm-arq-erro' style='margin: 0; padding: 0; color: red ; font-size: 9px; font-weight: bold'>
                </div>
                <div class='upload-box'>
                     CERTIDÃO NEGATIVA DE DÉBITO TRABALHISTA <span> </span>
                <div class='upload' id='cndt-div'>
                    <label class='label-upload' for="cndt"><i class="fi fi-sr-upload"></i></label>
                </div>
                </div>
                <form id='form-cndt' method='post' enctype='multipart/form-data'>
                <input type="file" multiple accept='.pdf' hidden name="cndt[]" id="cndt" onchange="arqSelect(this,'cndt-arq',1), apagaErro(this)"<?php if ($erro_count_upload > 0) echo "value='$erro_cndt_value'"; if ($erro_cndt) echo "class='erro-campo'";?>>
                <input type="text" name="cndt_index" id="cndt_index" hidden <?php if ($erro_count_upload > 0) echo "value='$erro_cndt_index_value'";?>>
                </form>
                <div id='cndt-arq1' class='anexo' style='padding: 2px 7px; margin: 2px 1px 0px 0px; ; background-color: #E5F1CE; color: #181A13 ; font-size: 0.8rem; font-weight: bold'>
                <i class="fi fi-sr-folder" style='float:left;'></i><span style='color: #3C4434; font-size: 8px; padding: 0 0 0 10px'></span><i class="fi fi-sr-trash" onclick="arqSelect(document.getElementById('cndt'),'cndt-arq',1,1)" style='float:right; cursor:pointer'></i>
                </div>
                <div id='cndt-arq-erro' style='margin: 0; padding: 0; color: red ; font-size: 9px; font-weight: bold'>
                </div>
                <div class='upload-box'>
                     CERTIFICADOS DE CURSOS DE CAPACITAÇÃO (ACLS/ATLS/PALS/PHTLS) <span></span>
                <div class='upload' id='cursos-div'>
                    <label class='label-upload' for="cursos"><i class="fi fi-sr-upload"></i></label>
                </div>
                </div>
                <form id='form-cursos' method='post' enctype='multipart/form-data'>
                <input type="file" multiple accept='.pdf' hidden name="cursos[]" id="cursos" onchange="arqSelect(this,'cursos-arq',10), apagaErro(this)"<?php if ($erro_count_upload > 0) echo "value='$erro_cursos_value'"; if ($erro_cursos) echo "class='erro-campo'";?>>
                <input type="text" name="cursos_index" id="cursos_index" hidden <?php if ($erro_count_upload > 0) echo "value='$erro_cursos_index_value'";?>>
                </form>
                <div id='cursos-arq1' class='anexo' style='padding: 2px 7px; margin: 2px 1px 0px 0px; ; background-color: #E5F1CE; color: #181A13 ; font-size: 0.8rem; font-weight: bold'>
                <i class="fi fi-sr-folder" style='float:left;'></i><span style='color: #3C4434; font-size: 8px; padding: 0 0 0 10px'></span><i class="fi fi-sr-trash" onclick="arqSelect(document.getElementById('cursos'),'cursos-arq',10,1)" style='float:right; cursor:pointer'></i>
                </div>
                <div id='cursos-arq2' class='anexo' style='padding: 2px 7px; margin: 2px 1px 0px 0px; ; background-color: #E5F1CE; color: #181A13 ; font-size: 0.8rem; font-weight: bold'>
                <i class="fi fi-sr-folder" style='float:left'></i><span style='color: #3C4434; font-size: 8px; padding: 0 0 0 10px'></span><i class="fi fi-sr-trash" onclick="arqSelect(document.getElementById('cursos'),'cursos-arq',10,2)" style='float:right; cursor:pointer'></i>
                </div>
                <div id='cursos-arq3' class='anexo' style='padding: 2px 7px; margin: 2px 1px 0px 0px; ; background-color: #E5F1CE; color: #181A13 ; font-size: 0.8rem; font-weight: bold'>
                <i class="fi fi-sr-folder" style='float:left'></i><span style='color: #3C4434; font-size: 8px; padding: 0 0 0 10px'></span><i class="fi fi-sr-trash" onclick="arqSelect(document.getElementById('cursos'),'cursos-arq',10,3)" style='float:right; cursor:pointer'></i>
                </div>
                <div id='cursos-arq4' class='anexo' style='padding: 2px 7px; margin: 2px 1px 0px 0px; ; background-color: #E5F1CE; color: #181A13 ; font-size: 0.8rem; font-weight: bold'>
                <i class="fi fi-sr-folder" style='float:left'></i><span style='color: #3C4434; font-size: 8px; padding: 0 0 0 10px'></span><i class="fi fi-sr-trash" onclick="arqSelect(document.getElementById('cursos'),'cursos-arq',10,4)" style='float:right; cursor:pointer'></i>
                </div>
                <div id='cursos-arq5' class='anexo' style='padding: 2px 7px; margin: 2px 1px 0px 0px; ; background-color: #E5F1CE; color: #181A13 ; font-size: 0.8rem; font-weight: bold'>
                <i class="fi fi-sr-folder" style='float:left'></i><span style='color: #3C4434; font-size: 8px; padding: 0 0 0 10px'></span><i class="fi fi-sr-trash" onclick="arqSelect(document.getElementById('cursos'),'cursos-arq',10,5)" style='float:right; cursor:pointer'></i>
                </div>
                <div id='cursos-arq6' class='anexo' style='padding: 2px 7px; margin: 2px 1px 0px 0px; ; background-color: #E5F1CE; color: #181A13 ; font-size: 0.8rem; font-weight: bold'>
                <i class="fi fi-sr-folder" style='float:left;'></i><span style='color: #3C4434; font-size: 8px; padding: 0 0 0 10px'></span><i class="fi fi-sr-trash" onclick="arqSelect(document.getElementById('cursos'),'cursos-arq',10,6)" style='float:right; cursor:pointer'></i>
                </div>
                <div id='cursos-arq7' class='anexo' style='padding: 2px 7px; margin: 2px 1px 0px 0px; ; background-color: #E5F1CE; color: #181A13 ; font-size: 0.8rem; font-weight: bold'>
                <i class="fi fi-sr-folder" style='float:left'></i><span style='color: #3C4434; font-size: 8px; padding: 0 0 0 10px'></span><i class="fi fi-sr-trash" onclick="arqSelect(document.getElementById('cursos'),'cursos-arq',10,7)" style='float:right; cursor:pointer'></i>
                </div>
                <div id='cursos-arq8' class='anexo' style='padding: 2px 7px; margin: 2px 1px 0px 0px; ; background-color: #E5F1CE; color: #181A13 ; font-size: 0.8rem; font-weight: bold'>
                <i class="fi fi-sr-folder" style='float:left'></i><span style='color: #3C4434; font-size: 8px; padding: 0 0 0 10px'></span><i class="fi fi-sr-trash" onclick="arqSelect(document.getElementById('cursos'),'cursos-arq',10,8)" style='float:right; cursor:pointer'></i>
                </div>
                <div id='cursos-arq9' class='anexo' style='padding: 2px 7px; margin: 2px 1px 0px 0px; ; background-color: #E5F1CE; color: #181A13 ; font-size: 0.8rem; font-weight: bold'>
                <i class="fi fi-sr-folder" style='float:left'></i><span style='color: #3C4434; font-size: 8px; padding: 0 0 0 10px'></span><i class="fi fi-sr-trash" onclick="arqSelect(document.getElementById('cursos'),'cursos-arq',10,9)" style='float:right; cursor:pointer'></i>
                </div>
                <div id='cursos-arq10' class='anexo' style='padding: 2px 7px; margin: 2px 1px 0px 0px; ; background-color: #E5F1CE; color: #181A13 ; font-size: 0.8rem; font-weight: bold'>
                <i class="fi fi-sr-folder" style='float:left'></i><span style='color: #3C4434; font-size: 8px; padding: 0 0 0 10px'></span><i class="fi fi-sr-trash" onclick="arqSelect(document.getElementById('cursos'),'cursos-arq',10,10)" style='float:right; cursor:pointer'></i>
                </div>
                <div id='cndm-arq-erro' style='margin: 0; padding: 0; color: red ; font-size: 9px; font-weight: bold'>
                </div>
                <div class='upload-box'>
                     CARTA DE EXPERIÊNCIA (06 meses de comprovação, exigido para as unidades da HAPVIDA) <span></span>
                <div class='upload' id='experiencia-div'>
                    <label class='label-upload' for="experiencia"><i class="fi fi-sr-upload"></i></label>
                </div>
                </div>
                <form id='form-experiencia' method='post' enctype='multipart/form-data'>
                <input type="file" multiple accept='.pdf' hidden name="experiencia[]" id="experiencia" onchange="arqSelect(this,'experiencia-arq',5), apagaErro(this)"<?php if ($erro_count_upload > 0) echo "value='$erro_experiencia_value'"; if ($erro_experiencia) echo "class='erro-campo'";?>>
                <input type="text" name="experiencia_index" id="experiencia_index" hidden <?php if ($erro_count_upload > 0) echo "value='$erro_experiencia_index_value'";?>>
                </form>
                <div id='experiencia-arq1' class='anexo' style='padding: 2px 7px; margin: 2px 1px 0px 0px; ; background-color: #E5F1CE; color: #181A13 ; font-size: 0.8rem; font-weight: bold'>
                <i class="fi fi-sr-folder" style='float:left;'></i><span style='color: #3C4434; font-size: 8px; padding: 0 0 0 10px'></span><i class="fi fi-sr-trash" onclick="arqSelect(document.getElementById('experiencia'),'experiencia-arq',5,1)" style='float:right; cursor:pointer'></i>
                </div>
                <div id='experiencia-arq2' class='anexo' style='padding: 2px 7px; margin: 2px 1px 0px 0px; ; background-color: #E5F1CE; color: #181A13 ; font-size: 0.8rem; font-weight: bold'>
                <i class="fi fi-sr-folder" style='float:left'></i><span style='color: #3C4434; font-size: 8px; padding: 0 0 0 10px'></span><i class="fi fi-sr-trash" onclick="arqSelect(document.getElementById('experiencia'),'experiencia-arq',5,2)" style='float:right; cursor:pointer'></i>
                </div>
                <div id='experiencia-arq3' class='anexo' style='padding: 2px 7px; margin: 2px 1px 0px 0px; ; background-color: #E5F1CE; color: #181A13 ; font-size: 0.8rem; font-weight: bold'>
                <i class="fi fi-sr-folder" style='float:left'></i><span style='color: #3C4434; font-size: 8px; padding: 0 0 0 10px'></span><i class="fi fi-sr-trash" onclick="arqSelect(document.getElementById('experiencia'),'experiencia-arq',5,3)" style='float:right; cursor:pointer'></i>
                </div>
                <div id='experiencia-arq4' class='anexo' style='padding: 2px 7px; margin: 2px 1px 0px 0px; ; background-color: #E5F1CE; color: #181A13 ; font-size: 0.8rem; font-weight: bold'>
                <i class="fi fi-sr-folder" style='float:left'></i><span style='color: #3C4434; font-size: 8px; padding: 0 0 0 10px'></span><i class="fi fi-sr-trash" onclick="arqSelect(document.getElementById('experiencia'),'experiencia-arq',5,4)" style='float:right; cursor:pointer'></i>
                </div>
                <div id='experiencia-arq5' class='anexo' style='padding: 2px 7px; margin: 2px 1px 0px 0px; ; background-color: #E5F1CE; color: #181A13 ; font-size: 0.8rem; font-weight: bold'>
                <i class="fi fi-sr-folder" style='float:left'></i><span style='color: #3C4434; font-size: 8px; padding: 0 0 0 10px'></span><i class="fi fi-sr-trash" onclick="arqSelect(document.getElementById('experiencia'),'experiencia-arq',5,5)" style='float:right; cursor:pointer'></i>
                </div>
                <div id='experiencia-arq-erro' style='margin: 0; padding: 0; color: red ; font-size: 9px; font-weight: bold'>
                </div>
                 <div class='upload-box'>
                     DECLARAÇÃO SOBRE ACÚMULO DE CARGOS <span> *</span><a target="_blank" style="font-size: 10px; margin: 0px 0px 0px 20px; color: #181A13; text-decoration: underline;" href="../scp/documentos/RPC E ASSOCIADOS SS LTDA - DECLARACAO ACUMULO DE CARGO.docx" rel="nofollow">baixe o modelo</a>
                <div class='upload' id='acumulocargos-div'>
                    <label class='label-upload' for="acumulocargos"><i class="fi fi-sr-upload"></i></label>
                </div>
                <form id='form-acumulocargos' method='post' enctype='multipart/form-data'>
                <input type="file" multiple accept='.pdf' hidden name="acumulocargos[]" id="acumulocargos" onchange="arqSelect(this,'acumulocargos-arq',1), apagaErro(this)"<?php if ($erro_count_upload > 0) echo "value='$erro_acumulocargos_value'"; if ($erro_acumulocargos) echo "class='erro-campo'";?>>
                <input type="text" name="acumulocargos_index" id="acumulocargos_index" hidden <?php if ($erro_count_upload > 0) echo "value='$erro_acumulocargos_index_value'";?>>
                </form>
                <div id='acumulocargos-arq1' class='anexo' style='padding: 2px 7px; margin: 2px 1px 0px 0px; ; background-color: #E5F1CE; color: #181A13 ; font-size: 0.8rem; font-weight: bold'>
                <i class="fi fi-sr-folder" style='float:left;'></i><span style='color: #3C4434; font-size: 8px; padding: 0 0 0 10px'></span><i class="fi fi-sr-trash" onclick="arqSelect(document.getElementById('acumulocargos'),'acumulocargos-arq',1,1)" style='float:right; cursor:pointer'></i>
                </div>
                <div id='acumulocargos-arq-erro' style='margin: 0; padding: 0; color: red ; font-size: 9px; font-weight: bold'>
                </div>
                
                <hr>
                <form id='form-final' method='post'>
                <div class='upload-box' style='margin: -10px 0px 0px 0px; padding:0'>
                     PIX <span> </span>
                 <div class='rg-container'>
                    <div class='crm'>
                        <label class='label-upload' for="chavepix" style='margin: 15px 0px 5px 5px; padding:0 0 0 5px'>Chave<span> *</span></label>
                        <input type="text" style='margin: 0px 0px 0px 5px;' name="chavepix" id="chavepix" placeholder='Digite sua chave do pix aqui' maxlength='14' oninput='cpfRegEx(this), celRegEx(this), apagaErro(this)' <?php if ($erro_count_upload > 0) echo "value='$erro_chavepix_value'"; if ($erro_chavepix) echo "class='erro-campo'" ;?>>
                    </div>
                    <div class='uf'>
                        <label class='label-upload' for="tipochave" style='margin: 15px 0px 5px 0px; padding: 0 0 0 5px'>Tipo<span> *</span></label>
                        <select type="text" name="tipochave" id="tipochave" onchange='apagaErro(this), pixSelect (this)' onfocus='apagaErro()' <?php if ($erro_rg_uf) echo "class='erro-campo'" ;?>>
                            <option value="CPF" <?php if ($erro_tipochave_value == 'CPF') echo "selected" ;?> selected>CPF</option>
                            <option value="Celular" <?php if ($erro_tipochave_value == 'Celular') echo "selected" ;?>>Celular</option>   
                            <option value="E-mail" <?php if ($erro_tipochave_value == 'E-mail') echo "selected" ;?>>E-mail</option>
                            <option value="Chave aleatória" <?php if ($erro_tipochave_value == 'Chave aleatória') echo "selected" ;?>>Chave aleatória</option>
                            
                        </select>
                    </div>
                </div>
                </div>
                <hr style='margin: 30px 0px 30px 0px'>
                <a id="forward2" class='forward' onclick="forward('upload-form')">VOLTAR</a>
                <a id="enviar" name='submitEndA' class='next' onclick="Validar ()">ENVIAR</a>
                <input type='text' id="nform" name='nform' <?php echo "value='$nome;$estadocivil;$sexo;$dn;$cpf;$rg;$oexp;$rg_uf;$dexp;$nome_mae;$nome_pai;$registro_pai;$nac;$nat;$nat_uf;$titulo;$pis;$telefone;$email;$endereco_nome;$crm;$crm_uf;$idEscala;$senha_confirma'"?> class='next' style='display:none'>
                <input type='submit' id="submitEnd" name='submitEnd' value='Enviar' class='next' style='display:none'>
                </form>
        </fieldset>
    </div>
        <script>
            //setTimeout(apagaErro,7000);
            <?php
             
                    echo "nome = '".$nome."';";
                    echo "estadocivil = '".$estadocivil."';";
                    echo "sexo = '".$sexo."';";
                    echo "dn = '".$dn."';";
                    echo "cpf = '".$cpf."';";
                    echo "rg = '".$rg."';";
                    echo "oexp = '".$oexp."';";
                    echo "rg_uf = '".$rg_uf."';";
                    echo "dexp = '".$dexp."';";
                    echo "nome_mae = '".$nome_mae."';";
                    echo "nome_pai = '".$nome_pai."';";
                    echo "registro_pai = '".$registro_pai."';";
                    echo "nac = '".$nac."';";
                    echo "nat = '".$nat."';";
                    echo "nat_uf = '".$nat_uf."';";
                    echo "titulo = '".$titulo."';";
                    echo "pis = '".$pis."';";
                    echo "telefone = '".$telefone."';";    
                    echo "email = '".$email."';";
                    echo "endereco = '".$endereco."';";
                    echo "endereco_nome = '".$endereco_nome."';";
                    echo "crm = '".$crm."';";
                    echo "crm_uf = '".$crm_uf."';";
                    echo "id_escala = '".$idEscala."';";
                    echo "senha = '".$senha_confirma."';";
            
            ?>
            function validaForm (form) {
                    if (form == 'page1') {
                        countvalid = 0;
                        
                        if (nome + estadocivil + sexo + dn + cpf + rg + oexp + rg_uf + dexp + nome_mae + nome_pai + nac + titulo + pis + telefone + email + endereco + endereco_nome + crm + crm_uf + id_escala + senha == '') countvalid++
                        
                        if (nome != document.getElementById('nome').value) countvalid++
                        if (estadocivil != document.getElementById('id-estadocivil').value) countvalid++
                        if (sexo != document.getElementById('sexo').value) countvalid++
                        if (dn != document.getElementById('data_nascimento').value) countvalid++
                        if (cpf != document.getElementById('cpf').value) countvalid++
                        if (rg != document.getElementById('rg').value) countvalid++
                        if (oexp != document.getElementById('oexp').value) countvalid++
                        if (rg_uf != document.getElementById('rg_uf').value) countvalid++
                        if (dexp != document.getElementById('dexp').value) countvalid++
                        if (nome_mae != document.getElementById('nome_mae').value) countvalid++
                        if (nome_pai != document.getElementById('nome_pai').value) countvalid++
                        //if (registro_pai != document.getElementById('check').value) countvalid++
                        if (nac != document.getElementById('id-nacionalidade').options[document.getElementById('id-nacionalidade').selectedIndex].value) countvalid++
                        if (nat != document.getElementById('naturalidade').value) countvalid++
                        if (nat_uf != document.getElementById('nat_uf').value) countvalid++
                        if (titulo != document.getElementById('titulo').value) countvalid++
                        if (pis != document.getElementById('pis').value) countvalid++
                        if (telefone != document.getElementById('telefone').value) countvalid++
                        if (email != document.getElementById('email').value) countvalid++
                        if (endereco != document.getElementById('endereco').value) countvalid++
                        if (endereco_nome != document.getElementById('endereco_nome').value) countvalid++
                        if (crm != document.getElementById('crm').value) countvalid++
                        if (crm_uf != document.getElementById('crm_uf').value) countvalid++
                        if (id_escala != document.getElementById('id-escala').options[document.getElementById('id-escala').selectedIndex].value) countvalid++
                        if (senha != document.getElementById('senha-confirma').value) countvalid++
                        if (senha != document.getElementById('senha').value) countvalid++
                        
                        if (countvalid > 0) { alert(countvalid); document.getElementById('submit').click(); }else{
                            next ('formulario');
                            };
                        return
                    }
                    
                    
                    document.getElementById('enviar').classList.add('loading');
                    count_ajax = 0;
                    var session = '<?php echo $_SESSION['nome'];?>'
                    if (session == '') {
                        window.location.replace('sessionfailure.php?type=atualiza')
                    }else{
                        //foto
                        xhr1 = new XMLHttpRequest();
                        formData1 = new FormData(document.getElementById('form-foto'));
                        xhr1.open('POST','upload.php?nome=foto&atualizadocs=on');
                        xhr1.send(formData1);
                        xhr1.onreadystatechange=function() {
                            if ((xhr1.readyState == 4) && (xhr1.status == 200)) count_ajax++;
                            ajaxCheck(count_ajax);
                        }
                        //curriculum
                        xhr2 = new XMLHttpRequest();
                        formData2 = new FormData(document.getElementById('form-curriculum'));
                        xhr2.open('POST','upload.php?nome=curriculum&atualizadocs=on');
                        xhr2.send(formData2);
                        xhr2.onreadystatechange=function() {
                            if ((xhr2.readyState == 4) && (xhr2.status == 200)) count_ajax++;
                            ajaxCheck(count_ajax);
                        }
                        //carteiracrm
                        xhr3 = new XMLHttpRequest();
                        formData3 = new FormData(document.getElementById('form-carteiracrm'));
                        xhr3.open('POST','upload.php?nome=carteiracrm&atualizadocs=on');
                        xhr3.send(formData3);
                        xhr3.onreadystatechange=function() {
                            if ((xhr3.readyState == 4) && (xhr3.status == 200)) count_ajax++;
                            ajaxCheck(count_ajax);
                        }
                        //rgupload
                        xhr4 = new XMLHttpRequest();
                        formData4 = new FormData(document.getElementById('form-rgupload'));
                        xhr4.open('POST','upload.php?nome=rgupload&atualizadocs=on');
                        xhr4.send(formData4);
                        xhr4.onreadystatechange=function() {
                            if ((xhr4.readyState == 4) && (xhr4.status == 200)) count_ajax++;
                            ajaxCheck(count_ajax);
                        }
                        //cpfupload
                        xhr5 = new XMLHttpRequest();
                        formData5 = new FormData(document.getElementById('form-cpfupload'));
                        xhr5.open('POST','upload.php?nome=cpfupload&atualizadocs=on');
                        xhr5.send(formData5);
                        xhr5.onreadystatechange=function() {
                            if ((xhr5.readyState == 4) && (xhr5.status == 200)) count_ajax++;
                            ajaxCheck(count_ajax);
                        }
                        //tituloupload
                        xhr6 = new XMLHttpRequest();
                        formData6 = new FormData(document.getElementById('form-tituloupload'));
                        xhr6.open('POST','upload.php?nome=tituloupload&atualizadocs=on');
                        xhr6.send(formData6);
                        xhr6.onreadystatechange=function() {
                            if ((xhr6.readyState == 4) && (xhr6.status == 200)) count_ajax++;
                            ajaxCheck(count_ajax);
                        }
                        //reservista
                        if (sexo == 'masculino') {
                            xhr7 = new XMLHttpRequest();
                            formData7 = new FormData(document.getElementById('form-reservista'));
                            xhr7.open('POST','upload.php?nome=reservista&atualizadocs=on');
                            xhr7.send(formData7);
                            xhr7.onreadystatechange=function() {
                                if ((xhr7.readyState == 4) && (xhr7.status == 200)) count_ajax++;
                                ajaxCheck(count_ajax);
                            }
                        }
                        //pisupload
                        xhr8 = new XMLHttpRequest();
                        formData8 = new FormData(document.getElementById('form-pisupload'));
                        xhr8.open('POST','upload.php?nome=pisupload&atualizadocs=on');
                        xhr8.send(formData8);
                        xhr8.onreadystatechange=function() {
                            if ((xhr8.readyState == 4) && (xhr8.status == 200)) count_ajax++;
                            ajaxCheck(count_ajax);
                        }
                        //enderecoupload
                        xhr9 = new XMLHttpRequest();
                        formData9 = new FormData(document.getElementById('form-enderecoupload'));
                        xhr9.open('POST','upload.php?nome=enderecoupload&atualizadocs=on');
                        xhr9.send(formData9);
                        xhr9.onreadystatechange=function() {
                            if ((xhr9.readyState == 4) && (xhr9.status == 200)) count_ajax++;
                            ajaxCheck(count_ajax);
                        }
                        //diploma
                        xhr10 = new XMLHttpRequest();
                        formData10 = new FormData(document.getElementById('form-diploma'));
                        xhr10.open('POST','upload.php?nome=diploma&atualizadocs=on');
                        xhr10.send(formData10);
                        xhr10.onreadystatechange=function() {
                            if ((xhr10.readyState == 4) && (xhr10.status == 200)) count_ajax++;
                            ajaxCheck(count_ajax);
                        }
                        //cndcrm
                        xhr11 = new XMLHttpRequest();
                        formData11 = new FormData(document.getElementById('form-cndcrm'));
                        xhr11.open('POST','upload.php?nome=cndcrm&atualizadocs=on');
                        xhr11.send(formData11);
                        xhr11.onreadystatechange=function() {
                            if ((xhr11.readyState == 4) && (xhr11.status == 200)) count_ajax++;
                            ajaxCheck(count_ajax);
                        }
                        //cartaovacina
                        xhr12 = new XMLHttpRequest();
                        formData12 = new FormData(document.getElementById('form-cartaovacina'));
                        xhr12.open('POST','upload.php?nome=cartaovacina&atualizadocs=on');
                        xhr12.send(formData12);
                        xhr12.onreadystatechange=function() {
                            if ((xhr12.readyState == 4) && (xhr12.status == 200)) count_ajax++;
                            ajaxCheck(count_ajax);
                        }
                        //eticos
                        xhr13 = new XMLHttpRequest();
                        formData13 = new FormData(document.getElementById('form-eticos'));
                        xhr13.open('POST','upload.php?nome=eticos&atualizadocs=on');
                        xhr13.send(formData13);
                        xhr13.onreadystatechange=function() {
                            if ((xhr13.readyState == 4) && (xhr13.status == 200)) count_ajax++;
                            ajaxCheck(count_ajax);
                        }
                        //cncf
                        xhr14 = new XMLHttpRequest();
                        formData14 = new FormData(document.getElementById('form-cncf'));
                        xhr14.open('POST','upload.php?nome=cncf&atualizadocs=on');
                        xhr14.send(formData14);
                        xhr14.onreadystatechange=function() {
                            if ((xhr14.readyState == 4) && (xhr14.status == 200)) count_ajax++;
                            ajaxCheck(count_ajax);
                        }
                        //cnce
                        xhr15 = new XMLHttpRequest();
                        formData15 = new FormData(document.getElementById('form-cnce'));
                        xhr15.open('POST','upload.php?nome=cnce&atualizadocs=on');
                        xhr15.send(formData15);
                        xhr15.onreadystatechange=function() {
                            if ((xhr15.readyState == 4) && (xhr15.status == 200)) count_ajax++;
                            ajaxCheck(count_ajax);
                        }
                        //cndf
                        xhr16 = new XMLHttpRequest();
                        formData16 = new FormData(document.getElementById('form-cndf'));
                        xhr16.open('POST','upload.php?nome=cndf&atualizadocs=on');
                        xhr16.send(formData16);
                        xhr16.onreadystatechange=function() {
                            if ((xhr16.readyState == 4) && (xhr16.status == 200)) count_ajax++;
                            ajaxCheck(count_ajax);
                        }
                        //cnde
                        xhr17 = new XMLHttpRequest();
                        formData17 = new FormData(document.getElementById('form-cnde'));
                        xhr17.open('POST','upload.php?nome=cnde&atualizadocs=on');
                        xhr17.send(formData17);
                        xhr17.onreadystatechange=function() {
                            if ((xhr17.readyState == 4) && (xhr17.status == 200)) count_ajax++;
                            ajaxCheck(count_ajax);
                        }
                        //cndm
                        xhr18 = new XMLHttpRequest();
                        formData18 = new FormData(document.getElementById('form-cndm'));
                        xhr18.open('POST','upload.php?nome=cndm&atualizadocs=on');
                        xhr18.send(formData18);
                        xhr18.onreadystatechange=function() {
                            if ((xhr18.readyState == 4) && (xhr18.status == 200)) count_ajax++;
                            ajaxCheck(count_ajax);
                        }
                        //cndt
                        xhr19 = new XMLHttpRequest();
                        formData19 = new FormData(document.getElementById('form-cndt'));
                        xhr19.open('POST','upload.php?nome=cndt&atualizadocs=on');
                        xhr19.send(formData19);
                        xhr19.onreadystatechange=function() {
                            if ((xhr19.readyState == 4) && (xhr19.status == 200)) count_ajax++;
                            ajaxCheck(count_ajax);
                        }
                        //cursos
                        xhr20 = new XMLHttpRequest();
                        formData20 = new FormData(document.getElementById('form-cursos'));
                        xhr20.open('POST','upload.php?nome=cursos&atualizadocs=on');
                        xhr20.send(formData20);
                        xhr20.onreadystatechange=function() {
                            if ((xhr20.readyState == 4) && (xhr20.status == 200)) count_ajax++;
                            ajaxCheck(count_ajax);
                        }
                        //experiencia
                        xhr21 = new XMLHttpRequest();
                        formData21 = new FormData(document.getElementById('form-experiencia'));
                        xhr21.open('POST','upload.php?nome=experiencia&atualizadocs=on');
                        xhr21.send(formData21);
                        xhr21.onreadystatechange=function() {
                            if ((xhr21.readyState == 4) && (xhr21.status == 200)) count_ajax++;
                            ajaxCheck(count_ajax);
                        }
                        //acumulocargos
                        xhr22 = new XMLHttpRequest();
                        formData22 = new FormData(document.getElementById('form-acumulocargos'));
                        xhr22.open('POST','upload.php?nome=acumulocargos&atualizadocs=on');
                        xhr22.send(formData22);
                        xhr22.onreadystatechange=function() {
                            if ((xhr22.readyState == 4) && (xhr22.status == 200)) count_ajax++;
                            ajaxCheck(count_ajax);
                        }
                    }    
            }
            function ajaxCheck (nAjax) {
             
                if (sexo == 'masculino') { 
                    Ajaxnum = 22; 
                }else{
                    Ajaxnum = 21;
                } 
                if (nAjax == Ajaxnum) {
                    document.getElementById('submitEnd').click() ;         
                    document.getElementById('enviar').classList.remove('loading');
                } 
            }    
            function Validar () {
                    var erro_count_upload = 0;
                    /*
                    var foto_index = document.getElementById('foto_index').value.replace(/;/g,'')
                    if (foto_index == '') { 
                        document.getElementById('foto-div').style.backgroundColor ='rgba(250, 0 , 0, 0.5)';
                        erro_count_upload++;
                    }
                    var curriculum_index = document.getElementById('curriculum_index').value.replace(/;/g,'')
                    
                    if (curriculum_index == '') { 
                        document.getElementById('curriculum-div').style.backgroundColor ='rgba(250, 0 , 0, 0.5)';
                        erro_count_upload++;
                    }
                    //alert(curriculum_index);
                    var carteiracrm_index = document.getElementById('carteiracrm_index').value.replace(/;/g,'')
                    if (carteiracrm_index == '') { 
                        document.getElementById('carteiracrm-div').style.backgroundColor ='rgba(250, 0 , 0, 0.5)';
                        erro_count_upload++;
                    }
                    
                    var rgupload_index = document.getElementById('rgupload_index').value.replace(/;/g,'')
                    if (rgupload_index == '') { 
                        document.getElementById('rgupload-div').style.backgroundColor ='rgba(250, 0 , 0, 0.5)';
                        erro_count_upload++;
                    }
                    
                    var cpfupload_index = document.getElementById('cpfupload_index').value.replace(/;/g,'')
                    if (cpfupload_index == '') { 
                        document.getElementById('cpfupload-div').style.backgroundColor ='rgba(250, 0 , 0, 0.5)';
                        erro_count_upload++;
                    }
                    
                    var tituloupload_index = document.getElementById('tituloupload_index').value.replace(/;/g,'')
                    if (tituloupload_index == '') { 
                        document.getElementById('tituloupload-div').style.backgroundColor ='rgba(250, 0 , 0, 0.5)';
                        erro_count_upload++;
                    }
                    if (sexo == 'masculino') { 
                        var reservista_index = document.getElementById('reservista_index').value.replace(/;/g,'')
                        if (reservista_index == '') { 
                            document.getElementById('reservista-div').style.backgroundColor ='rgba(250, 0 , 0, 0.5)';
                            erro_count_upload++;
                        }
                    }
                    var pisupload_index = document.getElementById('pisupload_index').value.replace(/;/g,'')
                    if (pisupload_index == '') { 
                        document.getElementById('pisupload-div').style.backgroundColor ='rgba(250, 0 , 0, 0.5)';
                        erro_count_upload++;
                    }
                    */
                    var enderecoupload_index = document.getElementById('enderecoupload_index').value.replace(/;/g,'')
                    if (enderecoupload_index == '') { 
                        document.getElementById('enderecoupload-div').style.backgroundColor ='rgba(250, 0 , 0, 0.5)';
                        erro_count_upload++;
                    }
                    /*
                    var diploma_index = document.getElementById('diploma_index').value.replace(/;/g,'')
                    if (diploma_index == '') { 
                        document.getElementById('diploma-div').style.backgroundColor ='rgba(250, 0 , 0, 0.5)';
                        erro_count_upload++;
                    }
                    
                    var cndcrm_index = document.getElementById('cndcrm_index').value.replace(/;/g,'')
                    if (cndcrm_index == '') { 
                        document.getElementById('cndcrm-div').style.backgroundColor ='rgba(250, 0 , 0, 0.5)';
                        erro_count_upload++;
                    }
                    var cartaovacina_index = document.getElementById('cartaovacina_index').value.replace(/;/g,'')
                    if (cartaovacina_index == '') { 
                        document.getElementById('cartaovacina-div').style.backgroundColor ='rgba(250, 0 , 0, 0.5)';
                        erro_count_upload++;
                    }
                    */
                    var eticos_index = document.getElementById('eticos_index').value.replace(/;/g,'')
                    if (eticos_index == '') { 
                        document.getElementById('eticos-div').style.backgroundColor ='rgba(250, 0 , 0, 0.5)';
                        erro_count_upload++;
                    }
                    /*
                    var cncf_index = document.getElementById('cncf_index').value.replace(/;/g,'')
                    if (cncf_index == '') { 
                        document.getElementById('cncf-div').style.backgroundColor ='rgba(250, 0 , 0, 0.5)';
                        erro_count_upload++;
                    }
                    
                    var cnce_index = document.getElementById('cnce_index').value.replace(/;/g,'')
                    if (cnce_index == '') { 
                        document.getElementById('cnce-div').style.backgroundColor ='rgba(250, 0 , 0, 0.5)';
                        erro_count_upload++;
                    }
                    
                    var cndf_index = document.getElementById('cndf_index').value.replace(/;/g,'')
                    if (cndf_index == '') { 
                        document.getElementById('cndf-div').style.backgroundColor ='rgba(250, 0 , 0, 0.5)';
                        erro_count_upload++;
                    }
                    
                    var cnde_index = document.getElementById('cnde_index').value.replace(/;/g,'')
                    if (cnde_index == '') { 
                        document.getElementById('cnde-div').style.backgroundColor ='rgba(250, 0 , 0, 0.5)';
                        erro_count_upload++;
                    }
                    
                    var cndm_index = document.getElementById('cndm_index').value.replace(/;/g,'')
                    if (cndm_index == '') { 
                        document.getElementById('cndm-div').style.backgroundColor ='rgba(250, 0 , 0, 0.5)';
                        erro_count_upload++;
                    }
                   
                    var cndt_index = document.getElementById('cndt_index').value.replace(/;/g,'')
                    if (cndt_index == '') { 
                        document.getElementById('cndt-div').style.backgroundColor ='rgba(250, 0 , 0, 0.5)';
                        erro_count_upload++;
                    }
                    
                    var cursos_index = document.getElementById('cursos_index').value.replace(/;/g,'')
                    if (cursos_index == '') { 
                        document.getElementById('cursos-div').style.backgroundColor ='rgba(250, 0 , 0, 0.5)';
                        erro_count_upload++;
                    }
                    var experiencia_index = document.getElementById('experiencia_index').value.replace(/;/g,'')
                    if (experiencia_index == '') { 
                        document.getElementById('experiencia-div').style.backgroundColor ='rgba(250, 0 , 0, 0.5)';
                        //erro_count_upload++;
                    }
                    var chavepix = document.getElementById('chavepix').value
                    if (chavepix == '') { 
                        document.getElementById('chavepix').style.backgroundColor ='rgba(250, 0 , 0, 0.5)';
                        erro_count_upload++;
                    }
                    if (tipochave == '') { 
                        document.getElementById('chavepix').style.backgroundColor ='rgba(250, 0 , 0, 0.5)';
                        erro_count_upload++;
                    }
                    */
                    
                    var acumulocargos_index = document.getElementById('acumulocargos_index').value.replace(/;/g,'')
                    if (acumulocargos_index == '') { 
                        document.getElementById('acumulocargos-div').style.backgroundColor ='rgba(250, 0 , 0, 0.5)';
                        erro_count_upload++;
                    }
                    
                    if (erro_count_upload == 0) { 
                        validaForm ();
                    }else{
                        document.getElementById('enviar').classList.remove('loading');
                    }
            }
            function arqSelect(file_select, div_id_file,maxfiles,dellfiles) {
                if (dellfiles) {
                    for (i=0 ; i < file_select.files.length; i++) {
                        if (i == (dellfiles-1)) {
                            document.getElementById(div_id_file + (i + 1)).children[1].innerHTML = "";
                            document.getElementById(div_id_file + (i + 1)).style.display = 'none';
                            var novaListaFiles = document.getElementById(file_select.getAttribute('id')+'_index').value;
                            document.getElementById(file_select.getAttribute('id')+'_index').value = novaListaFiles.replace((dellfiles-1),'');    
                        } 
                    }
                }else{
                    if (file_select.files.length > 0) {
                        if (file_select.files.length > maxfiles) {
                            document.getElementById(div_id_file + "-erro").innerHTML = 'Número máximo de arquivos nesse campo: '+maxfiles;
                        }else{
                            document.getElementById(file_select.getAttribute('id')+'-div').style.backgroundColor = '#D1E7A7';
                            document.getElementById(file_select.getAttribute('id')+'_index').value = '';
                            for (i=0 ; i < file_select.files.length; i++) {
                                document.getElementById(div_id_file + (i + 1)).children[1].innerHTML = file_select.files[i].name;
                                document.getElementById(div_id_file + (i + 1)).style.display = 'block';
                                if (i == 0) { var virgula = ""; }else{  virgula = ";" };
                                document.getElementById(file_select.getAttribute('id')+'_index').value += virgula + i;
                            }
                        }    
                    }
                }
            }
            
            function next (btn_target) {
                if (btn_target == "intro") {
                    document.getElementById('intro').style.display = "none";
                    document.getElementById('upload-form').style.display = "block";
                }
                if (btn_target == "formulario") {
                    document.getElementById('formulario').style.display = "none";
                    document.getElementById('upload-form').style.display = "block";
                }
                window.scrollTo(0,0);
            }
            function forward (btn_target) {
                if (btn_target == "formulario") {
                    document.getElementById('intro').style.display = "block";
                    document.getElementById('formulario').style.display = "none";
                    document.getElementById('formulario').style.display = "none";
                }
                if (btn_target == "upload-form") {
                    document.getElementById('intro').style.display = "block";
                    document.getElementById('upload-form').style.display = "none";
                }
                window.scrollTo(0,0);
            }
        
            function regPai (check) {
                if (check.checked) { 
                    check.value = 'true';
                    document.getElementById('nome_pai').setAttribute('disabled','');
                    document.getElementById('nome_pai').style.backgroundColor = 'lightgray';
                    document.getElementById('nome_pai').style.color = 'gray';
                    document.getElementById('nome_pai').removeAttribute('class');
                }else{
                    check.value = 'false';
                    document.getElementById('nome_pai').removeAttribute('disabled');
                    document.getElementById('nome_pai').style.backgroundColor = 'white';
                    document.getElementById('nome_pai').style.color = 'black';
                    document.getElementById('nome_pai').removeAttribute('class');
                }    
            }
            function apagaErro (clearErro) {      
                if (clearErro) {
                    clearErro.removeAttribute('class');
                    if ((clearErro.getAttribute('id') == 'senha') && (document.getElementById('erro_senha_count'))) { 
                        document.getElementById('erro_senha_count').remove();
                    }
                    if ((clearErro.getAttribute('id') == 'nome') && (document.getElementById('erro_nome_sobrenome'))) { 
                        document.getElementById('erro_nome_sobrenome').remove();
                    }
                }
                var elemento = document.getElementById('erro-geral');
                if (elemento) {
                    elemento.style.display = 'none';                 
                }
            }
            const sNome = ['DA','DE','DO','FILHO','JUNIOR','JÚNIOR'];
            
            function ChangeRg (limparChar) {      
                if (limparChar) {
                    limparChar.value = limparChar.value.replace(/[^0-9]+/g, "");
                }
            }
            function optChangeIdEscala (limparChar) {      
                if (limparChar) {
                    limparChar.value = limparChar.value.replace(/[^0-9]+/g, "");
                }
                var crm = document.getElementById('crm');
                var opt = document.getElementById('nome').value.toUpperCase().split(" ");
                var selectId = document.getElementById('id-escala');
                var uf = document.getElementById('crm_uf');
                while (selectId.options.length > 1) {
                    selectId.remove(1);
                }
                if ((opt.length > 1) && (crm.value.replace(/\s/g,'') != '') && (uf.options[uf.selectedIndex].value != null) && (uf.options[uf.selectedIndex].value != '')) {
                    for (i = 1; i < opt.length; i++) {
                        var noOpt = false;
                        sNome.forEach(function (item) {
                            if (item == opt[i]) {
                                //alert((item == opt[i]))
                                noOpt = true;
                            }
                        });
                        //alert(noOpt)
                        if (noOpt != true) {
                            if (uf.options[uf.selectedIndex].value != 'GO') {
                                var ufValue = uf.options[uf.selectedIndex].value
                            }else ufValue = '';
                            var newOpt = document.createElement("option");
                            newOpt.value = opt[0] + ' ' + opt[i] + ' ' + '(' + document.getElementById('crm').value + ufValue + ')';
                            newOpt.text = opt[0] + ' ' + opt[i] + ' ' + '(' + document.getElementById('crm').value + ufValue + ')';
                            selectId.add(newOpt);       
                        }
                    }    
                }    
                if ((opt.length == 1) && (opt[0] != '') && (crm.value.replace(/\s/g,'') != '') && (uf.options[uf.selectedIndex].value != null) && (uf.options[uf.selectedIndex].value != '')) {
                    var noOpt = false;
                        if (uf.options[uf.selectedIndex].value != 'GO') {
                            var ufValue = uf.options[uf.selectedIndex].value
                        }else ufValue = '';
                        var newOpt = document.createElement("option");
                        newOpt.value = opt[0] + ' ' + '(' + document.getElementById('crm').value + ufValue + ')';
                        newOpt.text = opt[0] + ' ' + '(' + document.getElementById('crm').value + ufValue + ')';
                        selectId.add(newOpt);       
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
            cpfx = ''
            function cpfRegEx (cpf) {
                if (document.getElementById('tipochave').options[document.getElementById('tipochave').selectedIndex].value == 'CPF') {
                    var limpaCpf = cpf.value.replace(/[^0-9]+/g, "").split("");
                    var newCpf = '';
                    for (i = 0; i < limpaCpf.length; i++) {
                        if ((i + 1 == 3) || (i + 1 == 6)) {
                            newCpf += limpaCpf[i] + "."
                        }else if (i + 1 == 9) {
                            newCpf += limpaCpf[i] + "-"
                        }else{
                            newCpf += limpaCpf[i]
                        }
                    }
                    if ((cpf.value + "." != cpfx) && (cpf.value + "-" != cpfx)) cpf.value = newCpf;
                    cpfx = cpf.value;
                }
            }
            celx = ''
            function celRegEx (cel) {
                if ((document.getElementById('tipochave').options[document.getElementById('tipochave').selectedIndex].value == 'Celular') || (cel.getAttribute('id') == 'telefone')) {
                    var limpaCel = cel.value.replace(/[^0-9]+/g,"").split("");
                    var newCel = '';
                    for (i = 0; i < limpaCel.length; i++) {
                        if (i + 1 == 1) {
                            newCel += "(";
                        }
                        if (i + 1 == 2) {
                            newCel += limpaCel[i] + ") "
                        }else if (i + 1 == 7) {
                            newCel += limpaCel[i] + "-"
                        }else{
                            newCel += limpaCel[i]
                        }
                    }
                    if ((cel.value + "(" != celx) && (cel.value + ")" != celx) && (cel.value + " " != celx) && (cel.value + "-" != celx)) cel.value = newCel;
                    celx = cel.value;
                    
                }
            }
            function pixSelect (pixSelectText) {      
                if (pixSelectText) {
                    if (pixSelectText.getAttribute('id') == 'tipochave') { 
                        document.getElementById('chavepix').value = '';
                        if (pixSelectText.options[pixSelectText.selectedIndex].value == 'CPF') document.getElementById('chavepix').setAttribute('maxlength','14');
                        if (pixSelectText.options[pixSelectText.selectedIndex].value == 'Celular') document.getElementById('chavepix').setAttribute('maxlength','15');
                        if (pixSelectText.options[pixSelectText.selectedIndex].value == 'E-mail') document.getElementById('chavepix').setAttribute('maxlength','300');
                        if (pixSelectText.options[pixSelectText.selectedIndex].value == 'Chave aleatória') document.getElementById('chavepix').setAttribute('maxlength','500');
                    }
                }    
            }
        </script>
</body>
</html>