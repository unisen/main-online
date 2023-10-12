<?php session_start();
if (!isset($_SESSION['loggedin_cad']) && $_SESSION['loggedin_cad'] !== false) {
    session_destroy();
    header('location: login.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<?php

// $_SESSION['url_aplicativo'] = URL_APLICATIVO;
// $_SESSION['path_userimages'] = PATH_USERIMAGES;

if (isset($_SESSION["url_aplicativo"])) {
    $unisen_url = $_SESSION["url_aplicativo"];
}


if (isset($_POST['confirmacao'])) {
    $confirmacao = $_POST['confirmacao'];
}
/* if (isset($_POST['page'])) {
    $stepper = $_POST['page'];
} else {
    $stepper = '0';
} */

if (isset($_GET['page'])) {
    $stepper = $_GET['page'];
} else {
    $stepper = '0';
}

if (isset($_GET['confirmacao'])) {
    $confirmacao = $_GET['confirmacao'];
    $_SESSION['confirmacao'] = $confirmacao;
    header("Location: cadastro.php");
} else {
    $confirmacao = $_SESSION['confirmacao'];
}


$_SESSION['diretorio'] = 'cadastrantes/';

require_once '../config/database/conexao.php';
require_once '../libs/farquivos.php';



//$conexao = mysqli_connect($dbHost,$dbUsername,$dbPassword,$dbname);
$confirma_query = mysqli_query($con, "SELECT * FROM tbl_cadastrantes WHERE confirmacao='$confirmacao'");
if ($confirma_query->num_rows == 1) {
    $dados_associado = mysqli_fetch_array($confirma_query, MYSQLI_ASSOC);
    $_SESSION['nome_cadastrante'] = $dados_associado['NOME COMPLETO'];
    $_SESSION['dados_cadastrante'] = $dados_associado;

    $id_cadastrante = $dados_associado['ID'];

    //Pega os dados bancarios
    $query_dados_bancarios = mysqli_query($con, "SELECT * FROM `tbl_dados_bancarios` WHERE `id_user` ='$id_cadastrante' LIMIT 1");
    if ($query_dados_bancarios->num_rows == 1) {
        $_SESSION['existe_banco'] = '1';
        $dados_bancarios_associado = mysqli_fetch_array($query_dados_bancarios, MYSQLI_ASSOC);
    }

    //mysqli_query ($con,"UPDATE cadastro SET STATUS='confirmado' WHERE confirmacao='$confirmacao';");
} else {
    $confirmacao = 'invalida';
}


function nome_curto_empresa($str)
{
    $str2 = explode(" - ", $str);
    $str = trim($str2[0]);
    return $str;
}

$empresa_json = json_decode(file_get_contents("../view/dados-empresa/configs-dados-empresa.json"));
$empresa_configs = $empresa_json[0];
$path_logo_img =  $unisen_url . $empresa_configs->logo_path;

$nome_empresa_title =  nome_curto_empresa($empresa_configs->nome_empresa);

//require_once './contador/useronline.php';

/* $path =  $_SERVER['DOCUMENT_ROOT'];
$path .= $unisen_url . 'app/config/functions/autenticaUsuario.php';
include_once($path); */
?>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico" type="image/x-icon">
    <link rel="shortcut icon" href="../../favicon.ico" />
    <title><?php if (isset($empresa_configs->nome_empresa)) echo nome_curto_empresa($empresa_configs->nome_empresa); ?></title>
    <!-- CSS -->
    <link rel="stylesheet" href="../includes/template/assets/css/app.css">

    <link rel="stylesheet" href="css/styles.css">

    <link rel="stylesheet" href="css/steeper-panel.css">

    <style>
        .loader {
            position: fixed;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: #F5F8FA;
            z-index: 9998;
            text-align: center;
        }

        .plane-container {
            position: absolute;
            top: 50%;
            left: 50%;
        }
    </style>
    <!-- Js -->
    <!--
    --- Head Part - Use Jquery anywhere at page.
    --- http://writing.colin-gourlay.com/safely-using-ready-before-including-jquery/
    -->
    <script>
        (function(w, d, u) {
            w.readyQ = [];
            w.bindReadyQ = [];

            function p(x, y) {
                if (x == "ready") {
                    w.bindReadyQ.push(y);
                } else {
                    w.readyQ.push(x);
                }
            };
            var a = {
                ready: p,
                bind: p
            };
            w.$ = w.jQuery = function(f) {
                if (f === d || f === u) {
                    return a
                } else {
                    p(f)
                }
            }
        })(window, document);
    </script>

    <!--  <script src="js/validarcpfcliente.js"></script> -->
</head>
<!-- , preenche_cep() -->

<body class="light" onload="selecionaStepper(<?php echo $stepper; ?>)">
    <!-- Pre loader -->
    <div id="loader" class="loader">
        <div class="plane-container">
            <div class="preloader-wrapper big active">
                
                <div class='box-load'>
                    <div class='pre'></div>
                </div>
</div>
        </div>
    </div>
    <div id="app">
        <div class="container-fluid">
            <div class="card card-block shadow d-flex">
                <div class="">
                    <div class="row form-mobile">
                        <!--  <div class="col-lg-2"> -->
                        <?php

                        /* Lateral Esquerda     */
                        //print_r($dados_associado);

                        $diretorio = "cadastrantes";
                        $pasta_cadastrante = $dados_associado['CRM'];

                        $path = "./$diretorio/" . $pasta_cadastrante . "/";

                        $myfolder_files = "$diretorio/" . $pasta_cadastrante;

                        $_SESSION['pasta_cadastrante'] = $pasta_cadastrante . "/";

                        $listagem_documentos = listar_documentos($myfolder_files);

                        //print_r($listagem_documentos);
                        $listaDocOriginal = array();
                        foreach ($listagem_documentos as $itemDoc) {
                            $docSplit = explode(" - ", $itemDoc);
                            $nomeDoc = $docSplit[1];
                            $nomeDocOrign = explode(" [", $nomeDoc);
                            //echo $nomeDocOrign[0] . "<br>";
                            array_push($listaDocOriginal, $nomeDocOrign[0]);
                        }

                        //echo "<hr>";
                        require_once '../config/database/conexao.php';

                        $sql_tipos_docs = "SELECT * FROM tipos_documentos";
                        $tipos_documentos = mysqli_query($con, $sql_tipos_docs);
                        $contaDocs = 0;
                        $ArquivosPendentes = "nao";
                        $documentos_faltantes = array();


                        //  echo $tipos_documentos->;

                        while ($row = mysqli_fetch_array($tipos_documentos, MYSQLI_ASSOC)) :
                            $id_doc = $row['id'];
                            $nome_doc = $row['documento'];


                            foreach ($listaDocOriginal as $docOrign) {
                                if ($docOrign == $nome_doc) {
                                    $contaDocs++;
                                }
                            }
                            if ($contaDocs == 0) {
                                $ArquivosPendentes = "sim";
                                array_push($documentos_faltantes, $nome_doc);
                            }
                            $contaDocs = 0;
                        endwhile;
                        $con->close();


                        $_SESSION['$documentos_faltantes'] = $documentos_faltantes;


                        if (is_dir($path)) {
                            echo "<div class='toast' data-title='Pasta já existe' data-message='Pasta Cadastrante N° $pasta_cadastrante' data-type='error'></div>";
                            //echo json_encode('erro');
                        } else {
                            mkdir($path, 0777, true);
                            echo "<div class='toast' data-title='Pasta Criada' data-message='Pasta Cadastrante N° $pasta_cadastrante' data-type='success'></div>";
                            //echo json_encode('sucesso');
                        }
                        ?>
                        <!-- </div> -->
                        <div class="col-lg-12">
                            <!-- <div class="toast" data-title="Hi, there!" data-message="Hope you like paper panel." data-type="success">
                            </div> -->

                            <!-- FORM NOVO ASSOCIADO -->

                            <div class="stepwizard">
                                <div class="stepwizard-row setup-panel">
                                    <div class="stepwizard-step col-xs-3">
                                        <a href="#step-1" type="button" class="btn btn-circle btn-default btn-success" id="tela-cadastro1">1</a>
                                        <p><small>Cadastro de Dados</small></p>
                                    </div>
                                    <div class="stepwizard-step col-xs-3">
                                        <a href="#step-2" type="button" class="btn btn-default btn-circle" disabled="disabled" id="tela-cadastro2">2</a>
                                        <p><small>Cadastro do Associado</small></p>
                                    </div>
                                    <div class="stepwizard-step col-xs-3">
                                        <a href="#step-3" type="button" class="btn btn-default btn-circle" disabled="disabled" id="tela-cadastro3">3</a>
                                        <p><small>Upload de Documentos</small></p>
                                    </div>
                                    <div class="stepwizard-step col-xs-3">
                                        <a href="#step-4" type="button" class="btn btn-default btn-circle" disabled="disabled" id="tela-cadastro4">4</a>
                                        <p><small>Finalização</small></p>
                                    </div>
                                </div>
                            </div>

                            <form role="form" id="novo_associado" name="novo_associado" method="POST" enctype="multipart/form-data" class="form-horizontal needs-validation was-validated" novalidate>
                                <div class="panel panel-primary setup-content" id="step-1">
                                    <div class="panel-heading">
                                        <h3 class="panel-title">Cadastrar Dados do Associado</h3>
                                    </div>
                                    <div class="panel-body">
                                        <!-- <form id="novo_associado" name="novo_associado" method="POST" class="form-horizontal needs-validation" autocomplete="true"> -->
                                        <div class="card no-b no-r">
                                            <div class="card-body">
                                                <input type="hidden" name="pasta_cadastrante" id="pasta_cadastrante" value="<?php echo $dados_associado['CRM']; ?>">
                                                <div class="form-row">
                                                    <div class="col-md-12">
                                                        <div class="form-row">
                                                            <div class="form-group col-lg-6 m-0">
                                                                <label for="nome" class="col-form-label s-12">Nome Completo</label>
                                                                <input type="text" name="nome" id="nome" class="form-control r-0 light s-12" value="<?php echo $dados_associado['NOME COMPLETO']; ?>">

                                                                <input type="hidden" name="confirmacao" id="confirmacao" value="<?php echo $confirmacao; ?>">
                                                            </div>
                                                            <div class="form-group col-lg-6 m-0">
                                                                <label for="email" class="col-form-label s-12"><i class="icon-mail_outline mr-2"></i>Email</label>
                                                                <input type="email" name="email" id="email" autocomplete="off" value="<?php echo $dados_associado['E-MAIL']; ?>" class="form-control r-0 light s-12">
                                                            </div>
                                                        </div>

                                                        <div class="form-row">
                                                            <div class="form-group col-6 m-0">
                                                                <label for="crm_completo" class="col-form-label s-12">CRM</label>
                                                                <input type="text" name="crm_completo" id="crm_completo" placeholder="CRM" class="form-control r-0 light s-12" value="<?php echo $dados_associado['CRM']; ?>">

                                                            </div>
                                                            <div class="form-group col-6 m-0">
                                                                <label for="cpf" class="col-form-label s-12"><i class="icon-fingerprint"></i> CPF</label>
                                                                <input type="text" name="cpf" id="cpf" maxlength="14" class="cpf form-control r-0 light s-12" value="<?php echo $dados_associado['CPF']; ?>" disabled>
                                                            </div>
                                                        </div>

                                                        <div class="form-row">
                                                            <div class="form-group col-6 m-0">
                                                                <label class="my-1 mr-2" for="estadocivil">Estado Civil</label>
                                                                <select type="text" name="estadocivil" id="estadocivil" class="custom-select my-1 mr-sm-2 form-control r-0 light s-12" required>
                                                                    <?php
                                                                    if ($dados_associado['ESTADO CIVIL'] != '') {
                                                                        switch ($dados_associado['ESTADO CIVIL']) {
                                                                            case "solteiro":
                                                                                $selected_solteiro = "selected";
                                                                                break;
                                                                            case "casado":
                                                                                $selected_casado = "selected";
                                                                                break;
                                                                            case "divorciado":
                                                                                $selected_divorciado = "selected";
                                                                                break;
                                                                            case "viuvo":
                                                                                $selected_viuvo = "selected";
                                                                            default:
                                                                                echo "Your favorite color is neither red, blue, nor green!";
                                                                        }
                                                                    } else {
                                                                        $selected_estado_civil = 'selected';
                                                                    }
                                                                    ?>
                                                                    <option value="" <?php if (isset($selected_estado_civil)) echo $selected_estado_civil; ?>>Selecione</option>
                                                                    <option value="solteiro" <?php if (isset($selected_solteiro)) echo $selected_solteiro; ?>>Solteiro(a)</option>
                                                                    <option value="casado" <?php if (isset($selected_casado)) echo $selected_casado; ?>>Casado(a)</option>
                                                                    <option value="divorciado" <?php if (isset($selected_divorciado)) echo $selected_divorciado; ?>>Divorciado(a)</option>
                                                                    <option value="viuvo" <?php if (isset($selected_viuvo)) echo $selected_viuvo; ?>>Viuvo(a)</option>
                                                                </select>
                                                                <!-- <div class="invalid-feedback">Please provide a valid city.</div> -->
                                                            </div>
                                                            <div class="form-group col-6 m-0">
                                                                <label class="my-1 mr-2" for="sexo">Sexo</label>
                                                                <select class="custom-select my-1 mr-sm-2 form-control r-0 light s-12" type="text" name="sexo" id="sexo" required="">
                                                                    <?php
                                                                    if ($dados_associado['SEXO'] != '') {
                                                                        switch ($dados_associado['SEXO']) {
                                                                            case "masculino":
                                                                                $selected_masculino = "selected";
                                                                                break;
                                                                            case "feminino":
                                                                                $selected_feminino = "selected";
                                                                                break;
                                                                            default:
                                                                                echo "Your favorite color is neither red, blue, nor green!";
                                                                        }
                                                                    } else {
                                                                        $selected_sexo = 'selected';
                                                                    }
                                                                    ?>
                                                                    <option value="" <?php if (isset($selected_viuvo)) echo $selected_viuvo; ?>>Selecione</option>
                                                                    <option value="masculino" <?php if (isset($selected_masculino)) echo $selected_masculino; ?>>Masculino</option>
                                                                    <option value="feminino" <?php if (isset($selected_feminino)) echo $selected_feminino; ?>>Feminino</option>
                                                                </select>
                                                            </div>

                                                        </div>

                                                    </div>
                                                    <!-- <div class="col-md-3 offset-md-1">
                                                        <input hidden="" id="file" name="file">
                                                        <div class="dropzone dropzone-file-area pt-4 pb-4 dz-clickable" id="fileUpload">
                                                            <div class="dz-default dz-message">
                                                                <span>Drop A passport size image of user</span>
                                                                <div>You can also click to open file browser</div>
                                                            </div>
                                                        </div>
                                                    </div> -->
                                                </div>
                                                <div class="form-row row clearfix">
                                                    <div class="form-group col-sm-3 m-0">
                                                        <label for="data_nascimento" class="col-form-label s-12"><i class="icon-calendar mr-2"></i>Data de Nascimento</label>
                                                        <?php
                                                        if ($dados_associado['DATA DE NASCIMENTO'] != "") {
                                                            $data_nasc = $dados_associado['DATA DE NASCIMENTO'];
                                                            $dn_date = explode("/", $data_nasc);
                                                            $data_nasc = $dn_date[2] . '-' . $dn_date[1] . '-' . $dn_date[0];
                                                        } else {
                                                            $data_nasc = "";
                                                        }
                                                        ?>
                                                        <input type="date" data-time-picker="false" data-format-date="d/m/Y" name="dn" id="data_nascimento" class="colordate form-control r-0 light s-12 datePicker" required="" value="<?php echo $data_nasc; ?>">
                                                    </div>
                                                    <div class="form-group col-sm-3 m-0">
                                                        <label for="rg" class="col-form-label s-12">RG</label>
                                                        <?php
                                                        if ($dados_associado['RG'] != "") {
                                                            $rg_completo = $dados_associado['RG'];
                                                            $rg_array = explode("-", $rg_completo);
                                                            $rg_numero = $rg_array[0];
                                                            $rg_orgao_uf = $rg_array[1];
                                                            $rg_array2 = explode(" ", $rg_orgao_uf);
                                                            $rg_oexp = $rg_array2[0];
                                                            $rg_dexp = $rg_array2[2];
                                                            $rg_array3 = explode("/", $rg_dexp);
                                                            $rg_dexp = $rg_array3[2] . '-' . $rg_array3[1] . '-' . $rg_array3[0];
                                                        } else {
                                                            $rg_numero = "";
                                                        }
                                                        ?>
                                                        <input type="number" name="rg" id="rg" placeholder="Digite seu RG" class="form-control r-0 light s-12" value="<?php if (isset($rg_numero)) echo $rg_numero; ?>" required>
                                                    </div>
                                                    <div class="form-group col-sm-3 m-0">
                                                        <label for="org_exp" class="col-form-label s-12">Órgão Expedidor</label>
                                                        <input type="text" name="org_exp" id="org_exp" placeholder="Exemplo: SSPGO" class="form-control r-0 light s-12" required="" onblur="validaOrgExp()" value="<?php if (isset($rg_oexp)) echo $rg_oexp; ?>">
                                                        <!-- <div class="invalid-feedback">Digite o nome do órgão</div> -->
                                                    </div>
                                                    <div class="form-group col-sm-3 m-0">
                                                        <label for="dexp" class="col-form-label s-12">Data de Expedição</label>
                                                        <input type="date" data-time-picker="false" data-format-date="d/m/Y" name="dexp" id="dexp" class="colordate form-control r-0 light s-12 datePicker" required="" value="<?php if (isset($rg_dexp)) echo $rg_dexp; ?>" onblur="rgCadastro()">

                                                        <input type="hidden" name="rg_cadastro" id="rg_cadastro" value="<?php echo $dados_associado['RG']; ?>">
                                                    </div>
                                                </div>

                                                <div class="form-row row clearfix">
                                                    <div class="form-group col-sm-6 m-0">
                                                        <label for="nome_pai" class="col-form-label s-12">Nome do Pai</label>
                                                        <input type="text" name="nome_pai" id="nome_pai" placeholder="Nome Completo do Pai" class="cpf form-control r-0 light s-12" value="<?php echo $dados_associado['nome_pai']; ?>" onblur="nomePaiUpper()">
                                                    </div>
                                                    <div class="form-group col-sm-6 m-0">
                                                        <label for="nome_mae" class="col-form-label s-12">Nome da Mãe</label>
                                                        <input type="text" name="nome_mae" id="nome_mae" placeholder="Nome Completo da Mãe" class="cpf form-control r-0 light s-12" value="<?php echo $dados_associado['nome_mae']; ?>" onblur="criaFiliacao()" required>

                                                        <input type="hidden" name="filiacao" id="filiacao" value="">
                                                    </div>
                                                </div>

                                                <hr>
                                                <div>
                                                    <div class="btn-register">
                                                        <button class="btn btn-danger pull-right" type="button" onclick="window.location.replace('../login/logout.php')"><i class="icon-sign-out"> </i>Sair</button>
                                                        <button class="btn btn-primary nextBtn pull-right" type="button" onclick="<?php if ($dados_associado['ID PLANILHA'] == '') {
                                                                                                                                        echo "selectIdEscala(),";
                                                                                                                                    } ?>selecionaCampo('nacionalidade')">Próximo <i class="icon-keyboard_arrow_right">

                                                            </i></button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="panel panel-primary setup-content" id="step-2" style="display: none;">
                                    <div class="panel-heading">
                                        <h3 class="panel-title">Cadastro de Associado</h3>
                                    </div>
                                    <div class="panel-body">
                                        <div class="card no-b no-r">
                                            <div class="card-body">

                                                <div class="form-row row clearfix">
                                                    <div class="form-group col-sm-4 m-0">
                                                        <label for="nacionalidade" class="col-form-label s-12">Nacionalidade</label>
                                                        <select type="text" name="nacionalidade" id="nacionalidade" class="mr-sm-2 form-control r-0 light s-12" required="">
                                                            <?php
                                                            if ($dados_associado['NACIONALIDADE'] != '') {
                                                                switch ($dados_associado['NACIONALIDADE']) {
                                                                    case "brasileira":
                                                                        $selected_brasileira = "selected";
                                                                        break;
                                                                    case "outra":
                                                                        $selected_outra = "selected";
                                                                        break;
                                                                    default:
                                                                        echo "Your favorite color is neither red, blue, nor green!";
                                                                }
                                                            } else {
                                                                $selected_nacionalidade = 'selected';
                                                            }
                                                            ?>
                                                            <option value="" <?php if (isset($selected_nacionalidade)) echo $selected_nacionalidade; ?>>Selecione</option>
                                                            <option value="brasileira" <?php if (isset($selected_brasileira)) echo $selected_brasileira; ?>>brasileira</option>
                                                            <option value="outra" <?php if (isset($selected_outra)) echo $selected_outra; ?>>outra</option>
                                                        </select>
                                                    </div>

                                                    <div class="form-group col-sm-4 m-0">
                                                        <?php
                                                        if ($dados_associado['NATURALIDADE'] != '') {
                                                            $naturalidade = explode("-", $dados_associado['NATURALIDADE']);
                                                            $natu_cidade =  $naturalidade[0];
                                                            $natu_uf = $naturalidade[1];
                                                        } else {
                                                            $natu_uf = "";
                                                        }

                                                        ?>
                                                        <label for="naturalidade" class="col-form-label s-12">Naturalidade</label>
                                                        <input type="text" name="naturalidade" id="naturalidade" placeholder="Cidade em que nasceu" onblur="natUpper()" class="form-control r-0 light s-12" value="<?php if (isset($natu_cidade)) echo $natu_cidade; ?>" required>
                                                    </div>
                                                    <div class="form-group col-sm-4 m-0">
                                                        <label for="nat_uf" class="my-1 mr-2">UF</label>
                                                        <select type="text" name="nat_uf" id="nat_uf" onchange="criaNaturalidade()" class="mr-sm-2 form-control r-0 light s-12" required>
                                                            <option value="" disabled="" <?php if (isset($natu_uf) && $natu_uf == '') echo "selected"; ?>>Selecione</option>
                                                            <option value="AC" <?php if (isset($natu_uf) && $natu_uf == 'AC') echo "selected"; ?>>AC</option>
                                                            <option value="AL" <?php if (isset($natu_uf) && $natu_uf == 'AL') echo "selected"; ?>>AL</option>
                                                            <option value="AP" <?php if (isset($natu_uf) && $natu_uf == 'AP') echo "selected"; ?>>AP</option>
                                                            <option value="AM" <?php if (isset($natu_uf) && $natu_uf == 'AM') echo "selected"; ?>>AN</option>
                                                            <option value="BA" <?php if (isset($natu_uf) && $natu_uf == 'BA') echo "selected"; ?>>BA</option>
                                                            <option value="CE" <?php if (isset($natu_uf) && $natu_uf == 'CE') echo "selected"; ?>>CE</option>
                                                            <option value="DF" <?php if (isset($natu_uf) && $natu_uf == 'DF') echo "selected"; ?>>DF</option>
                                                            <option value="ES" <?php if (isset($natu_uf) && $natu_uf == 'ES') echo "selected"; ?>>ES</option>
                                                            <option value="GO" <?php if (isset($natu_uf) && $natu_uf == 'GO') echo "selected"; ?>>GO</option>
                                                            <option value="MA" <?php if (isset($natu_uf) && $natu_uf == 'MA') echo "selected"; ?>>MA</option>
                                                            <option value="MT" <?php if (isset($natu_uf) && $natu_uf == 'MT') echo "selected"; ?>>MT</option>
                                                            <option value="MS" <?php if (isset($natu_uf) && $natu_uf == 'MS') echo "selected"; ?>>MS</option>
                                                            <option value="MG" <?php if (isset($natu_uf) && $natu_uf == 'MG') echo "selected"; ?>>MG</option>
                                                            <option value="PR" <?php if (isset($natu_uf) && $natu_uf == 'PR') echo "selected"; ?>>PR</option>
                                                            <option value="PB" <?php if (isset($natu_uf) && $natu_uf == 'PB') echo "selected"; ?>>PB</option>
                                                            <option value="PA" <?php if (isset($natu_uf) && $natu_uf == 'PA') echo "selected"; ?>>PA</option>
                                                            <option value="PE" <?php if (isset($natu_uf) && $natu_uf == 'PE') echo "selected"; ?>>PE</option>
                                                            <option value="PI" <?php if (isset($natu_uf) && $natu_uf == 'PI') echo "selected"; ?>>PI</option>
                                                            <option value="RJ" <?php if (isset($natu_uf) && $natu_uf == 'RJ') echo "selected"; ?>>RJ</option>
                                                            <option value="RN" <?php if (isset($natu_uf) && $natu_uf == 'RN') echo "selected"; ?>>RN</option>
                                                            <option value="RS" <?php if (isset($natu_uf) && $natu_uf == 'RS') echo "selected"; ?>>RS</option>
                                                            <option value="RO" <?php if (isset($natu_uf) && $natu_uf == 'RO') echo "selected"; ?>>RO</option>
                                                            <option value="RR" <?php if (isset($natu_uf) && $natu_uf == 'RR') echo "selected"; ?>>RR</option>
                                                            <option value="SC" <?php if (isset($natu_uf) && $natu_uf == 'SC') echo "selected"; ?>>SC</option>
                                                            <option value="SE" <?php if (isset($natu_uf) && $natu_uf == 'SE') echo "selected"; ?>>SE</option>
                                                            <option value="SP" <?php if (isset($natu_uf) && $natu_uf == 'SP') echo "selected"; ?>>SP</option>
                                                            <option value="TO" <?php if (isset($natu_uf) && $natu_uf == 'TO') echo "selected"; ?>>TO</option>
                                                        </select>

                                                        <input type="hidden" name="nat_cadastro" id="nat_cadastro" value="">
                                                    </div>
                                                </div>


                                                <div class="form-row row clearfix">
                                                    <div class="form-group col-sm-4 m-0">
                                                        <label for="titulo" class="col-form-label s-12">Titulo de Eleitor</label>
                                                        <input type="text" name="titulo" id="titulo" onblur="" class="form-control r-0 light s-12" value="<?php if (isset($dados_associado['TITULO DE ELEITOR'])) echo $dados_associado['TITULO DE ELEITOR']; ?>" required>
                                                    </div>

                                                    <div class="form-group col-sm-4 m-0">
                                                        <label for="pis" class="col-form-label s-12">PIS / PASEP</label>
                                                        <input type="text" name="pis" id="pis" onblur="" class="form-control r-0 light s-12" value="<?php if (isset($dados_associado['PIS'])) echo $dados_associado['PIS']; ?>" required>
                                                    </div>
                                                    <div class="form-group col-sm-4 m-0">
                                                        <label for="telefone" class="col-form-label s-12">Celular</label>
                                                        <input type="text" name="telefone" id="telefone" class="all_phones form-control r-0 light s-12" value="<?php if (isset($dados_associado['TELEFONE'])) echo $dados_associado['TELEFONE']; ?>" required>
                                                    </div>
                                                </div>

                                                <div class="form-row row clearfix">
                                                    <div class="form-group col-sm-4 m-0">
                                                        <label for="cep_cliente" class="label-item-form">CEP</label>
                                                        <input type="text" id="cep_cliente" name="cep_cliente" class="cep form-control r-0 light s-12" size="10" maxlength="10" value="<?php if (isset($dados_associado['cep'])) echo $dados_associado['cep']; ?>" required>
                                                        <!-- <div class="input_icones">
                                                            <a id="buscaCep" class="formIcon" title="Buscar CEP">
                                                                <i class="icon-search2 mr-2" style="font-size:20px; color:#37A661;"></i>
                                                            </a>
                                                        </div> -->
                                                    </div>
                                                    <div class="form-group col-sm-4 m-0">
                                                        <label for="uf_end" class="label-item-form">UF</label>
                                                        <select name="uf_end" id="uf_end" class="mr-sm-2 form-control r-0 light s-12" required>
                                                            <option value="" <?php if ($dados_associado['estado'] == '') echo "selected"; ?>>UF</option>
                                                            <option value="AC" <?php if ($dados_associado['estado'] == 'AC') echo "selected"; ?>>AC - Acre</option>
                                                            <option value="AL" <?php if ($dados_associado['estado'] == 'AL') echo "selected"; ?>>AL - Alagoas</option>
                                                            <option value="AM" <?php if ($dados_associado['estado'] == 'AM') echo "selected"; ?>>AM - Amazonas</option>
                                                            <option value="AP" <?php if ($dados_associado['estado'] == 'AP') echo "selected"; ?>>AP - Amapá</option>
                                                            <option value="BA" <?php if ($dados_associado['estado'] == 'BA') echo "selected"; ?>>BA - Bahia</option>
                                                            <option value="CE" <?php if ($dados_associado['estado'] == 'CE') echo "selected"; ?>>CE - Ceará</option>
                                                            <option value="DF" <?php if ($dados_associado['estado'] == 'DF') echo "selected"; ?>>DF - Distrito Federal</option>
                                                            <option value="ES" <?php if ($dados_associado['estado'] == 'ES') echo "selected"; ?>>ES - Espírito Santo</option>
                                                            <option value="GO" <?php if ($dados_associado['estado'] == 'GO') echo "selected"; ?>>GO - Goiás</option>
                                                            <option value="MA" <?php if ($dados_associado['estado'] == 'MA') echo "selected"; ?>>MA - Maranhão</option>
                                                            <option value="MG" <?php if ($dados_associado['estado'] == 'MG') echo "selected"; ?>>MG - Minas Gerais</option>
                                                            <option value="MS" <?php if ($dados_associado['estado'] == 'MS') echo "selected"; ?>>MS - Mato Grosso do Sul</option>
                                                            <option value="MT" <?php if ($dados_associado['estado'] == 'MT') echo "selected"; ?>>MT - Mato Grosso</option>
                                                            <option value="PA" <?php if ($dados_associado['estado'] == 'PA') echo "selected"; ?>>PA - Pará</option>
                                                            <option value="PB" <?php if ($dados_associado['estado'] == 'PB') echo "selected"; ?>>PB - Paraíba</option>
                                                            <option value="PE" <?php if ($dados_associado['estado'] == 'PE') echo "selected"; ?>>PE - Pernambuco</option>
                                                            <option value="PI" <?php if ($dados_associado['estado'] == 'PI') echo "selected"; ?>>PI - Piauí</option>
                                                            <option value="PR" <?php if ($dados_associado['estado'] == 'PR') echo "selected"; ?>>PR - Paraná</option>
                                                            <option value="RJ" <?php if ($dados_associado['estado'] == 'RJ') echo "selected"; ?>>RJ - Rio de Janeiro</option>
                                                            <option value="RN" <?php if ($dados_associado['estado'] == 'RN') echo "selected"; ?>>RN - Rio Grande do Norte</option>
                                                            <option value="RO" <?php if ($dados_associado['estado'] == 'RO') echo "selected"; ?>>RO - Rondônia</option>
                                                            <option value="RR" <?php if ($dados_associado['estado'] == 'RR') echo "selected"; ?>>RR - Roraima</option>
                                                            <option value="RS" <?php if ($dados_associado['estado'] == 'RS') echo "selected"; ?>>RS - Rio Grande do Sul</option>
                                                            <option value="SC" <?php if ($dados_associado['estado'] == 'SC') echo "selected"; ?>>SC - Santa Catarina</option>
                                                            <option value="SE" <?php if ($dados_associado['estado'] == 'SE') echo "selected"; ?>>SE - Sergipe</option>
                                                            <option value="SP" <?php if ($dados_associado['estado'] == 'SP') echo "selected"; ?>>SP - São Paulo</option>
                                                            <option value="TO" <?php if ($dados_associado['estado'] == 'TO') echo "selected"; ?>>TO - Tocantins</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group col-sm-4 m-0">
                                                        <label for="cidade_end" class="label-item-form">Cidade</label>
                                                        <input type="text" name="cidade_end" id="cidade_end" class="form-control r-0 light s-12" value="<?php if (isset($dados_associado['cidade'])) echo $dados_associado['cidade']; ?>" required>
                                                    </div>
                                                </div>

                                                <div class="form-row row clearfix">
                                                    <div class="form-group col-sm-8 m-0">
                                                        <label for="logradouro_end" class="label-item-form">Logradouro</label>
                                                        <input type="text" name="logradouro_end" id="logradouro_end" class="form-control r-0 light s-12" value="<?php if (isset($dados_associado['logradouro'])) echo $dados_associado['logradouro']; ?>" required>
                                                    </div>
                                                    <div class="form-group col-sm-4 m-0">
                                                        <label for="bairro_end" class="label-item-form">Bairro</label>
                                                        <input type="text" name="bairro_end" id="bairro_end" class="form-control r-0 light s-12" value="<?php if (isset($dados_associado['bairro'])) echo $dados_associado['bairro']; ?>" required>
                                                    </div>
                                                </div>

                                                <div class="form-row row clearfix">
                                                    <div class="form-group col-sm-2 m-0">
                                                        <label for="num_end" class="col-form-label s-12">Número</label>
                                                        <input type="text" name="num_end" id="num_end" class="form-control r-0 light s-12" value="<?php if (isset($dados_associado['numero'])) echo $dados_associado['numero']; ?>">
                                                    </div>
                                                    <div class="form-group col-sm-4 m-0">
                                                        <label for="complemento_end" class="col-form-label s-12">Complemento</label>
                                                        <input type="text" name="complemento_end" id="complemento_end" class="form-control r-0 light s-12" value="<?php if (isset($dados_associado['complemento'])) echo $dados_associado['complemento']; ?>" onchange="criaEndCadastro()">
                                                    </div>
                                                    <div class="form-group col-sm-3 m-0">
                                                        <label for="endereco_nome" class="col-form-label s-12">Endereço no Nome</label>
                                                        <select type="text" name="endereco_nome" id="endereco_nome" onchange="" class="mr-sm-2 form-control r-0 light s-12" required>
                                                            <option value="" <?php if ($dados_associado['ENDEREÇO NO NOME'] == '') echo "selected"; ?>>Selecione</option>
                                                            <option value="SIM" <?php if ($dados_associado['ENDEREÇO NO NOME'] == 'SIM') echo "selected"; ?>>SIM</option>
                                                            <option value="NÃO" <?php if ($dados_associado['ENDEREÇO NO NOME'] == 'NÃO') echo "selected"; ?>>NÃO</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group col-sm-3 m-0">
                                                        <?php
                                                        if ($dados_associado['CRM'] != '') {
                                                            $crm_completo = $dados_associado['CRM'];
                                                            $crm_uf = substr($crm_completo, -2);
                                                            $crm_num = str_replace($crm_uf, "", $crm_completo);
                                                        }
                                                        ?>
                                                        <input type="hidden" id="crm" name="crm" value="<?php if (isset($crm_num)) echo $crm_num; ?>">
                                                        <input type="hidden" id="crm_uf" name="crm_uf" value="<?php if (isset($crm_uf)) echo $crm_uf; ?>">
                                                        <label for="id-escala" class="col-form-label s-12">ID Escala</label>

                                                        <?php if ($dados_associado['ID PLANILHA'] == '') { ?>
                                                            <select type="text" name="id-escala" onclick="" onchange="" id="id-escala" class="mr-sm-2 form-control r-0 light s-12" required>
                                                                <option value="" disabled="" selected="">Escolha uma opção</option>
                                                            </select>
                                                        <?php } else { ?>
                                                            <input type="text" name="id-escala" id="id-escala" value="<?php echo $dados_associado['ID PLANILHA']; ?>" class="form-control r-0 light s-12">
                                                        <?php } ?>

                                                        <input type="hidden" name="endereco" id="endereco" class="form-control r-0 light s-12" value="<?php echo $dados_associado['ENDEREÇO']; ?>" required>
                                                    </div>
                                                </div>

                                                <hr>
                                                <div>
                                                    <div class="btn-register">
                                                        <button class="btn btn-warning pull-right" type="button" onclick="document.getElementById('tela-cadastro1').click()"><i class="icon-keyboard_arrow_left"> </i>Voltar</button>
                                                        <button class="btn btn-success pull-right" type="button" id="pre-cadastro">Atualizar</button>
                                                        <button class="btn btn-primary nextBtn pull-right btn-proximo2" id="btn-proximo2" disabled type="button">Próximo <i class="icon-keyboard_arrow_right"> </i></button>
                                                    </div>
                                                    <!-- <button class="btn btn-warning backBtn pull-left" type="button">Voltar</button> -->

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>

                            <div class="panel panel-primary setup-content" id="step-3" style="display: none;">
                                <div class="panel-heading">
                                    <h3 class="panel-title"></h3>
                                </div>
                                <div class="panel-body">
                                    <div class="card no-b no-r">
                                        <div class="card-body">

                                            <!-- UPLOAD DE DOCUMENTOS -->
                                            <!-- TELA DE UPLOAD DE ARQUIVOS -->
                                            <?php
                                            $path = dirname(__FILE__);
                                            $path .= '/upload-documentos2.php';
                                            include_once($path);
                                            ?>

                                            <!-- <div class="form-row row clearfix">
                                                <div class="form-group col-md-6 m-0">
                                                    <button class="btn btn-primary nextBtn pull-right" type="button" id="">Próximo</button>
                                                </div>
                                            </div> -->
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="panel panel-primary setup-content" id="step-4" style="display: none;">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Finalização</h3>
                                </div>
                                <div class="panel-body">

                                    <div class="card no-b no-r">
                                        <div class="card-body container-finalizacao">

                                            <!-- FINALIZACAO DO CADASTRO DE NOVO ASSOCIADO -->
                                            <!-- TELA DE VERIFICACAO -->

                                            <?php
                                            /* if (isset($_GET['confirmacao']) && isset($_GET['status'])) {
                                                if ($_GET['status'] == 'processando') {
                                                    $_SESSION['statuscadastro'] = "processando";
                                                }
                                            } else {
                                                $_SESSION['statuscadastro'] = "cadastrando";
                                            } */

                                            $path = dirname(__FILE__);
                                            $path .= '/finalizacao-cadastro.php';
                                            include_once($path);
                                            ?>
                                            <hr>
                                            <div>

                                                <div class="btn-register btn-register-finalizar">
                                                    <button class="btn btn-warning pull-right" type="button" onclick="document.getElementById('tela-cadastro3').click()"><i class="icon-keyboard_arrow_left"> </i>Voltar</button>
                                                    <button class="btn btn-success pull-right" type="button" id="btnFinalizarCadastro">Finalizar Cadastro</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>



                                    <!-- <div class="form-group">
                                        <label class="control-label">Company Name</label>
                                        <input maxlength="200" type="text" required="required" class="form-control" placeholder="Enter Company Name">
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">Company Address</label>
                                        <input maxlength="200" type="text" required="required" class="form-control" placeholder="Enter Company Address">
                                    </div>
                                    <button class="btn btn-success pull-right" type="submit" id="adicionar_associado" name="adicionar_associado">Cadastrar!</button> -->
                                </div>
                            </div>


                        </div>
                        <!-- <div class="col-lg-3"> -->
                        <!--      Lateral Direita      -->
                        <!-- </div> -->
                    </div>
                </div>

            </div>
        </div>
    </div>

    <!--/#app -->
    <script src="../includes/template/assets/js/app.js"></script>
    <script src="js/steeper-panel.js"></script>

    <!--Swit Alert -->
    <script src="../../includes/plugins/sweetalert2@9.js"></script>

    <script src="js/jquery.mask.js"></script>
    <script src="js/jquery.mask.min.js"></script>

    <script src="js/submitBtn.js"></script>


    <!--     <script>
        
    $(document).ready(function() {

        $('#submitFiles').click(function() {

            var form_data = new FormData();

            // Read selected files
            //var totalfiles = document.getElementsByName('documentos[]').files.length;
            //console.log(totalfiles);

            /* for (var index = 0; index < totalfiles; index++) {
                form_data.append("documentos[]", document.getElementById('files').files[index]);
            } */


            var inputs = document.getElementsByName('documentos[]');
            var totalInputs = inputs.length;

            //console.log(totalInputs);

            //console.log(inputs[0].files);

            for (var index = 0; index < totalInputs; index++) {
                form_data.append("documentos[]", inputs[index].files);
            }

            console.log(form_data.entries);

            /* console.log(totalInputs);
            for (var i = 0; i < inputs.length; ++i) {
                console.log(i);
            } */
            // AJAX request
            $.ajax({
                url: 'uploads2.php',
                type: 'post',
                data: form_data,
                dataType: 'json',
                contentType: false,
                processData: false,
                success: function(response) {

                    for (var index = 0; index < response.length; index++) {
                        var src = response[index];

                        // Add img element in <div id='preview'>
                        $('#preview').append('<img src="' + src + '" width="200px;" height="200px">');
                    }

                }
            });

        });

    });
</script>
 -->

    <script>
        function selecionaCampo(campoId) {
            setTimeout(function() {
                //console.log("Código sendo executado após 3 segundos!")
                document.getElementById(campoId).focus();
            }, 300)
        }



        $(document).ready(function() {
            $("#pre-cadastro").click(function(e) {
                //var formulario = new FormData(this);
                //console.log(formulario);
                e.preventDefault();
                $.ajax({
                    method: "POST",
                    url: "update-dados.php",
                    data: $("form").serialize(),
                    dataType: "text",
                    success: function(strMessage) {
                        $("#message").text(strMessage);
                        if ($.trim(strMessage) == 'sucesso') {
                            Swal.fire({
                                title: '',
                                text: "Cadastro Atualizado com sucesso!",
                                icon: 'success',
                                confirmButtonColor: '#3085d6',
                                cancelButtonColor: '#d33',
                                confirmButtonText: 'OK'
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    //location.reload();
                                    //$('.btn-proximo2').css("display", "initial");
                                    //const queryString = window.location.search;
                                    //const urlParams = new URLSearchParams(queryString);                                    
                                    //const product = urlParams.get('product')
                                    //console.log(queryString);

                                    sessionStorage.setItem("page_step", "2");
                                    location.href = "cadastro.php" + window.location.search;

                                    //param = window.location.search + "&page=2";
                                    /* $("#btn-proximo2").removeAttr("disabled");
                                    $("#btn-proximo2").removeClass("btn-proximo2"); */
                                    //$('#enviar_mensagem').find('input').val('');
                                }
                            })
                        } else {
                            Swal.fire({
                                icon: 'error',
                                title: 'Oops...',
                                text: strMessage,

                            });

                        }
                    }
                });

            });
        });
    </script>

    <script>
        // Função que atualiza a página e seleciona a Pagina do Step no Cadastro

        function selecionaStepper(pagina) {
            let step = sessionStorage.getItem("page_step");

            //alert(step);

            if (step == '2') {
                document.getElementById('tela-cadastro2').click();
                $("#btn-proximo2").removeAttr("disabled");
                $("#btn-proximo2").removeClass("btn-proximo2");
                setTimeout(function() {
                //conserta o click no mobile
                document.getElementById('tela-cadastro2').click();
            }, 500);
                sessionStorage.clear();
            }
            if (step == '3') {
                var tela_tres = $("#tela-cadastro3");
                tela_tres.removeAttr("disabled");
                tela_tres.click();
                sessionStorage.clear();
                
                setTimeout(function() {
                //conserta o click no mobile
                document.getElementById('tela-cadastro3').click();
            }, 500);
                
            }

            

        }
    </script>

    <script>
        $(document).ready(function() {
            $("#btnFinalizarCadastro").click(function(e) {

                //var formulario = new FormData(this);
                //console.log(formulario);
                e.preventDefault();
                $.ajax({
                    method: "POST",
                    url: "finalizar-update-dados.php",
                    data: $("#dados_bancarios_associado").serialize(),
                    dataType: "text",
                    success: function(strMessage) {
                        $("#message").text(strMessage);
                        if ($.trim(strMessage) == 'sucesso') {
                            Swal.fire({
                                title: '',
                                text: "Cadastro Finalizado com sucesso!",
                                icon: 'success',
                                confirmButtonColor: '#3085d6',
                                cancelButtonColor: '#d33',
                                confirmButtonText: 'OK'
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    //alert('ok');
                                    location.href = "confirmacao-cadastro.php";
                                    //$('.btn-proximo2').css("display", "initial");
                                    //$("#btn-proximo2").removeAttr("disabled");
                                    //$("#btn-proximo2").removeClass("btn-proximo2");
                                    //$('#enviar_mensagem').find('input').val('');
                                }
                            })
                        } else {
                            Swal.fire({
                                icon: 'error',
                                title: 'Oops...',
                                text: strMessage,

                            });

                        }
                    }
                });

            });
        });
    </script>

    <script>
        // FORMATACAO MASCARA DOS CAMPOS EM FORMULARIOS
        $(document).ready(function() {
            //$('.cpf').mask('000.000.000-00');
            //$('.cnpj').mask('00.000.000/0000-00');
            //$('.time').mask('00:00:00');
            //$('.date_time').mask('99/99/9999 00:00:00');
            $('.cep').mask('99.999-999');
            //$('.phone').mask('+99 (99) 9999-9999');
            //$('.phone_with_ddd').mask('(99) 9999-9999');
            $('.all_phones').mask('(99) 09999-9999');
            //$('.phone_us').mask('(999) 999-9999');
            //$('.mixed').mask('AAA 000-S0S'); 
            /* $('.comissao-perc').mask('000.00'); */

            $('#cep_cliente').keypress(function() {
                txtBoxFormat(this.form, this.name, '99.999-999', this)
            });
        });
    </script>

    <script>
        // Zera os campos
        function iniciarCadastro() {
            setTimeout(function() {
                $("#estadocivil").focus();
                //$("#cep_cliente").focus();
            }, 500);
        }

        // Valida o Orgão Expedidor para apenas letras e maiúsculas
        function validaOrgExp() {

            if ($("#org_exp").val() != "") {

                let regExp = /[^a-z]/g;
                let str = $("#org_exp").val();
                let letters = str.toLowerCase().replace(regExp, '');
                $("#org_exp").val(letters);
                $('#org_exp').val($('#org_exp').val().toUpperCase());
            }

        }

        // Monta variável Cadastro
        function rgCadastro() {
            var rg_num = $("#rg").val();
            var org_exp = $("#org_exp").val();
            var dexp = $("#dexp").val();
            const dateArr = dexp.split("-");
            dateFix = dateArr[2] + '/' + dateArr[1] + '/' + dateArr[0];
            var rg_cadastro = rg_num + '-' + org_exp + ' DE: ' + dateFix;
            $("#rg_cadastro").val(rg_cadastro);
        }

        function nomePaiUpper() {
            $('#nome_pai').val($('#nome_pai').val().toUpperCase());
        }

        function criaFiliacao() {
            $('#nome_mae').val($('#nome_mae').val().toUpperCase());

            var nomePai = $("#nome_pai").val();
            var nomeMae = $("#nome_mae").val();
            if (nomePai != "") {
                var filiacao = nomePai + " e " + nomeMae;
            } else {
                var filiacao = nomeMae;
            }
            $("#filiacao").val(filiacao);
        }

        function natUpper() {
            $('#naturalidade').val($('#naturalidade').val().toUpperCase());
        }

        function criaNaturalidade() {
            var nat_city = $("#naturalidade").val();
            var nat_uf = $("#nat_uf").val();
            var nat_cadastro = nat_city + "-" + nat_uf;
            $("#nat_cadastro").val(nat_cadastro);
        }

        function criaEndCadastro() {
            var rua = $("#logradouro_end").val();
            var num_end = $("#num_end").val();
            var complemento = $("#complemento_end").val();
            var bairro = $("#bairro_end").val();
            var cidade = $("#cidade_end").val();
            var uf_end = $("#uf_end").val();
            var cep_end = $("#cep_cliente").val();

            var endereco = rua + ", N. " + num_end + ", " + complemento + ", " + bairro + ". " + cidade + "/" + uf_end + " - CEP: " + cep_end;
            $("#endereco").val(endereco);

            $('#endereco').val($('#endereco').val().toUpperCase());
        }


        function selectIdEscala() {
            /* if (limparChar) {
                limparChar.value = limparChar.value.replace(/[^0-9]+/g, "");
            } */

            //var nomeAssociado = document.getElementById('nome').value.toUpperCase().split(" ");

            var crm = document.getElementById('crm');
            var opt = document.getElementById('nome').value.toUpperCase().split(" ");
            var selectId = document.getElementById('id-escala');
            var uf = document.getElementById('crm_uf');

            while (selectId.options.length > 1) {
                selectId.remove(1);
            }
            for (i = 1; i < opt.length; i++) {

                var option = document.createElement("option");
                var opt1 = opt[0] + ' ' + opt[i] + ' (' + crm.value + ')';


                option.text = opt1;
                option.value = opt1;
                selectId.add(option);
            }

            if ((opt.length > 1) && (crm.value.replace(/\s/g, '') != '') && (uf.options[uf.selectedIndex].value != null) && (uf.options[uf.selectedIndex].value != '')) {

                for (i = 1; i < opt.length; i++) {
                    var noOpt = false;
                    sNome.forEach(function(item) {
                        if (item == opt[i]) {
                            //alert((item == opt[i]))
                            noOpt = true;
                        }
                    });
                    //alert(noOpt);
                    if (noOpt != true) {
                        if (uf.options[uf.selectedIndex].value != 'GO') {
                            var ufValue = uf.options[uf.selectedIndex].value
                        } else ufValue = '';
                        var newOpt = document.createElement("option");
                        newOpt.value = opt[0] + ' ' + opt[i] + ' ' + '(' + document.getElementById('crm').value + ufValue + ')';
                        newOpt.text = opt[0] + ' ' + opt[i] + ' ' + '(' + document.getElementById('crm').value + ufValue + ')';
                        selectId.add(newOpt);
                    }
                }
            }
            if ((opt.length == 1) && (opt[0] != '') && (crm.value.replace(/\s/g, '') != '') && (uf.options[uf.selectedIndex].value != null) && (uf.options[uf.selectedIndex].value != '')) {
                var noOpt = false;
                if (uf.options[uf.selectedIndex].value != 'GO') {
                    var ufValue = uf.options[uf.selectedIndex].value
                } else ufValue = '';
                var newOpt = document.createElement("option");
                newOpt.value = opt[0] + ' ' + '(' + document.getElementById('crm').value + ufValue + ')';
                newOpt.text = opt[0] + ' ' + '(' + document.getElementById('crm').value + ufValue + ')';
                selectId.add(newOpt);
            }
        }

        function arqSelect(file_select, div_id_file, maxfiles, dellfiles) {
            if (dellfiles) {
                for (i = 0; i < file_select.files.length; i++) {
                    if (i == (dellfiles - 1)) {
                        document.getElementById(div_id_file + (i + 1)).children[1].innerHTML = "";
                        document.getElementById(div_id_file + (i + 1)).style.display = 'none';
                        var novaListaFiles = document.getElementById(file_select.getAttribute('id') + '_index').value;
                        document.getElementById(file_select.getAttribute('id') + '_index').value = novaListaFiles.replace((dellfiles - 1), '');
                    }
                }
            } else {
                if (file_select.files.length > 0) {

                    document.getElementById(div_id_file + "-count").value = file_select.files.length;

                    if (file_select.files.length > maxfiles) {
                        document.getElementById(div_id_file + "-erro").innerHTML = 'Número máximo de arquivos nesse campo: ' + maxfiles;
                    } else {
                        document.getElementById(file_select.getAttribute('id') + '-div').style.backgroundColor = '#D1E7A7';
                        document.getElementById(file_select.getAttribute('id') + '_index').value = '';
                        for (i = 0; i < file_select.files.length; i++) {
                            document.getElementById(div_id_file + (i + 1)).children[1].innerHTML = file_select.files[i].name;
                            document.getElementById(div_id_file + (i + 1)).style.display = 'block';
                            if (i == 0) {
                                var virgula = "";
                            } else {
                                virgula = ";";
                            };
                            document.getElementById(file_select.getAttribute('id') + '_index').value += virgula + i;
                        }
                    }
                }
            }
        }
    </script>


    <!-- Adicionando Javascript -->
    <script>
        $(document).ready(function() {

            function limpa_formulário_cep() {
                // Limpa valores do formulário de cep.
                $("#logradouro_end").val("");
                $("#bairro_end").val("");
                $("#cidade_end").val("");
                $("#uf_end").val("");

            }

            //Quando o campo cep perde o foco.
            $("#cep_cliente").blur(function() {

                //Nova variável "cep" somente com dígitos.
                var cep = $(this).val().replace(/\D/g, '');

                //Verifica se campo cep possui valor informado.
                if (cep != "") {

                    //Expressão regular para validar o CEP.
                    var validacep = /^[0-9]{8}$/;

                    //Valida o formato do CEP.
                    if (validacep.test(cep)) {

                        //Preenche os campos com "..." enquanto consulta webservice.
                        $("#logradouro_end").val("...");
                        $("#bairro_end").val("...");
                        $("#cidade_end").val("...");
                        $("#uf_end").val("...");


                        //Consulta o webservice viacep.com.br/
                        $.getJSON("https://viacep.com.br/ws/" + cep + "/json/?callback=?", function(dados) {

                            if (!("erro" in dados)) {
                                //Atualiza os campos com os valores da consulta.
                                $("#logradouro_end").val(dados.logradouro);
                                $("#bairro_end").val(dados.bairro);
                                $("#cidade_end").val(dados.localidade);
                                $("#uf_end").val(dados.uf);
                            } //end if.
                            else {
                                //CEP pesquisado não foi encontrado.
                                limpa_formulário_cep();
                                //alert("CEP não encontrado.");
                                Swal.fire({
                                    title: "CEP não encontrado",
                                    text: "Tente Novamente",
                                    icon: "error",
                                    confirmButtonColor: '#3085d6',
                                    cancelButtonColor: '#d33',
                                    confirmButtonText: 'OK'
                                }).then((result) => {
                                    if (result.isConfirmed) {
                                        $("#cep_cliente").val("");
                                        $("#cep_cliente").focus();
                                    }
                                })
                            }
                        });
                    } //end if.
                    else {
                        //cep é inválido.
                        limpa_formulário_cep();
                        //alert("Formato de CEP inválido.");
                        Swal.fire({
                            title: "Formato de CEP inválido.",
                            text: "Tente Novamente",
                            icon: "error",
                            confirmButtonColor: '#3085d6',
                            cancelButtonColor: '#d33',
                            confirmButtonText: 'OK'
                        }).then((result) => {
                            if (result.isConfirmed) {
                                $("#cep_cliente").val("");
                                $("#cep_cliente").focus();
                            }
                        })
                    }
                } //end if.
                else {
                    //cep sem valor, limpa formulário.
                    limpa_formulário_cep();
                }
            });
        });
    </script>


    <!--
--- Footer Part - Use Jquery anywhere at page.
--- http://writing.colin-gourlay.com/safely-using-ready-before-including-jquery/
-->
    <script>
        (function($, d) {
            $.each(readyQ, function(i, f) {
                $(f)
            });
            $.each(bindReadyQ, function(i, f) {
                $(d).bind("ready", f)
            })
        })(jQuery, document)
    </script>
</body>

</html>