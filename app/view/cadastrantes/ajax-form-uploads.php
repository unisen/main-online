<?php session_start();
//include "config.php";
//CLASSE CLIENTE - PDO CRUD MYSQL
require_once '../../DAO/config/database.php';
require_once '../../DAO/controllers/CadastranteDAO.php';
require_once '../../libs/farquivos.php';
/**
 * @param array|object $data
 * @return array
 */
function object_to_array($data)
{
    $result = [];
    foreach ($data as $key => $value) {
        $result[$key] = (is_array($value) || is_object($value)) ? object_to_array($value) : $value;
    }
    return $result;
}



$userid = 0;
if (isset($_POST['userid'])) {
    /* $userid = $_POST['userid'];
    $params = "WHERE id = $userid"; // . $id_usuario;
    $CadastranteDAO = new CadastranteDAO();
    $Cadastrante = $CadastranteDAO->selectNewCadastrante($params);
    $dados = json_encode($Cadastrante);

    $perfil = $Cadastrante[0];

    //echo "<pre>" . print_r($perfil) . "</pre>"; 
    $result = object_to_array($Cadastrante); */
    if (isset($_SESSION['perfil'])) $perfil = $_SESSION['perfil'];

    //echo $perfil->nome_completo;


    $diretorio = "cadastrantes";
    $pasta_cadastrante = $perfil->crm;
    $nome_cadastrante = $perfil->nome_completo;

    $path = "../../register/$diretorio/" . $pasta_cadastrante . "/";

    $myfolder_files = "../../register/$diretorio/" . $pasta_cadastrante;

    $_SESSION['upload_location'] = $path;

    $_SESSION['pasta_cadastrante'] = $pasta_cadastrante . "/";
    $_SESSION['nome_cadastrante'] = $nome_cadastrante;



    
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
    require_once '../../config/database/conexao.php';

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
    //print_r($result[0]);

    //echo '<input type="hidden" name="campo_selecionado" id="campo_selecionado" value="">';
    //echo "<select name='dados_do_cadastrantes' id='dados_do_cadastrantes' onchange='mostra_dados_campo(this)' class='custom-select my-1 mr-sm-2 form-control r-0 light s-12'><option value='' disabled='' selected=''>Selecione</option>";
    /* foreach ($result[0] as $key => $value) {
        //echo "$key: $value<br>";
        echo "<option value='$value'>$key</option>";
    } */
    //echo '</select><div id="display_campo_verificando"></div>';

?>

    <?php
    if (isset($_SESSION['$documentos_faltantes'])) {
        $documentos_upload = $_SESSION['$documentos_faltantes'];
        //print_r($documentos_upload);
    }

    ?>
    <form class="form-signin" action="" method="POST" enctype="multipart/form-data" name="uploadDocs" id="uploadDocs">

        <div id="upload-form">
            <fieldset>
                <?php
                if (in_array("FOTO", $documentos_upload)) {
                    $box_foto = '';
                } else {
                    $box_foto = 'style="background-color:#faffef;"';
                }
                ?>
                <div class="upload-box">
                    FOTO<span> *</span>
                    <div class="upload" id="foto-div" <?php if ($box_foto != '') echo $box_foto; ?>>
                        <label class="label-upload" for="foto"><i class="fi fi-sr-upload"></i></label>
                    </div>
                </div>
                <!-- <form id="form-foto" method="post" enctype="multipart/form-data"> -->
                <input type="hidden" name="docs_ids[]" value="1">
                <input type="file" accept=".pdf" hidden="" name="documentos[]" id="foto" onchange="arqSelect(this,'foto-arq',2)" multiple>
                <input type="text" name="foto_index" id="foto_index" hidden="">
                <!-- </form> -->
                <div id="foto-arq1" class="anexo" style="padding: 2px 7px; margin: 2px 1px 0px 0px; ; background-color: #E5F1CE; color: #181A13 ; font-size: 0.8rem; font-weight: bold">
                    <i class="fi fi-sr-folder" style="float:left;"></i><span style="color: #3C4434; font-size: 8px; padding: 0 0 0 10px"></span><i class="fi fi-sr-trash" onclick="arqSelect(document.getElementById('foto'),'foto-arq',2,1)" style="float:right; cursor:pointer"></i>
                </div>
                <div id="foto-arq2" class="anexo" style="padding: 2px 7px; margin: 2px 1px 0px 0px; ; background-color: #E5F1CE; color: #181A13 ; font-size: 0.8rem; font-weight: bold">
                    <i class="fi fi-sr-folder" style="float:left"></i><span style="color: #3C4434; font-size: 8px; padding: 0 0 0 10px"></span><i class="fi fi-sr-trash" onclick="arqSelect(document.getElementById('foto'),'foto-arq',2,2)" style="float:right; cursor:pointer"></i>
                </div>
                <div id="foto-arq-erro" style="margin: 0; padding: 0; color: red ; font-size: 9px; font-weight: bold">
                </div>
                <input type="hidden" name="total_files[]" id="foto-arq-count" value="">

                <?php
                if (in_array("CURRICULUM VITAE", $documentos_upload)) {
                    $box_upload = '';
                } else {
                    $box_upload = 'style="background-color:#faffef;"';
                }
                ?>
                <div class="upload-box">
                    CURRICULUM VITAE<span> *</span>
                    <div class="upload" id="curriculum-div" <?php if ($box_upload != '') echo $box_upload; ?>>
                        <label class="label-upload" for="curriculum"><i class="fi fi-sr-upload"></i></label>
                    </div>
                </div>
                <!-- <form id="form-curriculum" method="post" enctype="multipart/form-data"> -->
                <input type="hidden" name="docs_ids[]" value="2">
                <input type="file" accept=".pdf" hidden="" name="documentos[]" id="curriculum" onchange="arqSelect(this,'curriculum-arq',2)" multiple>
                <input type="text" name="curriculum_index" id="curriculum_index" hidden="">
                <!-- </form> -->
                <div id="curriculum-arq1" class="anexo" style="padding: 2px 7px; margin: 2px 1px 0px 0px; ; background-color: #E5F1CE; color: #181A13 ; font-size: 0.8rem; font-weight: bold">
                    <i class="fi fi-sr-folder" style="float:left;"></i><span style="color: #3C4434; font-size: 8px; padding: 0 0 0 10px"></span><i class="fi fi-sr-trash" onclick="arqSelect(document.getElementById('curriculum'),'curriculum-arq',2,1)" style="float:right; cursor:pointer"></i>
                </div>
                <div id="curriculum-arq2" class="anexo" style="padding: 2px 7px; margin: 2px 1px 0px 0px; ; background-color: #E5F1CE; color: #181A13 ; font-size: 0.8rem; font-weight: bold">
                    <i class="fi fi-sr-folder" style="float:left"></i><span style="color: #3C4434; font-size: 8px; padding: 0 0 0 10px"></span><i class="fi fi-sr-trash" onclick="arqSelect(document.getElementById('curriculum'),'curriculum-arq',2,2)" style="float:right; cursor:pointer"></i>
                </div>
                <div id="curriculum-arq-erro" style="margin: 0; padding: 0; color: red ; font-size: 9px; font-weight: bold">
                </div>
                <input type="hidden" name="total_files[]" id="curriculum-arq-count" value="">

                <?php
                if (in_array("CARTEIRA CRM", $documentos_upload)) {
                    $box_upload = '';
                } else {
                    $box_upload = 'style="background-color:#faffef;"';
                }
                ?>
                <div class="upload-box">
                    IDENTIDADE MÉDICA OU CARTEIRA PROFISSIONAL MÉDICA <span> *</span>
                    <div class="upload" id="carteiracrm-div" <?php if ($box_upload != '') echo $box_upload; ?>>
                        <label class="label-upload" for="carteiracrm"><i class="fi fi-sr-upload"></i></label>
                    </div>
                </div>
                <!-- <form id="form-carteiracrm" method="post" enctype="multipart/form-data"> -->
                <input type="hidden" name="docs_ids[]" value="3">
                <input type="file" accept=".pdf" hidden="" name="documentos[]" id="carteiracrm" onchange="arqSelect(this,'carteiracrm-arq',2)" multiple>
                <input type="text" name="carteiracrm_index" id="carteiracrm_index" hidden="">
                <!-- </form> -->
                <div id="carteiracrm-arq1" class="anexo" style="padding: 2px 7px; margin: 2px 1px 0px 0px; ; background-color: #E5F1CE; color: #181A13 ; font-size: 0.8rem; font-weight: bold">
                    <i class="fi fi-sr-folder" style="float:left;"></i><span style="color: #3C4434; font-size: 8px; padding: 0 0 0 10px"></span><i class="fi fi-sr-trash" onclick="arqSelect(document.getElementById('carteiracrm'),'carteiracrm-arq',2,1)" style="float:right; cursor:pointer"></i>
                </div>
                <div id="carteiracrm-arq2" class="anexo" style="padding: 2px 7px; margin: 2px 1px 0px 0px; ; background-color: #E5F1CE; color: #181A13 ; font-size: 0.8rem; font-weight: bold">
                    <i class="fi fi-sr-folder" style="float:left"></i><span style="color: #3C4434; font-size: 8px; padding: 0 0 0 10px"></span><i class="fi fi-sr-trash" onclick="arqSelect(document.getElementById('carteiracrm'),'carteiracrm-arq',2,2)" style="float:right; cursor:pointer"></i>
                </div>
                <div id="carteiracrm-arq-erro" style="margin: 0; padding: 0; color: red ; font-size: 9px; font-weight: bold">
                </div>
                <input type="hidden" name="total_files[]" id="carteiracrm-arq-count" value="">

                <?php
                if (in_array("RG", $documentos_upload)) {
                    $box_upload = '';
                } else {
                    $box_upload = 'style="background-color:#faffef;"';
                }
                ?>
                <div class="upload-box">
                    REGISTRO GERAL (RG) <span> *</span>
                    <div class="upload" id="rgupload-div" <?php if ($box_upload != '') echo $box_upload; ?>>
                        <label class="label-upload" for="rgupload"><i class="fi fi-sr-upload"></i></label>
                    </div>
                </div>
                <!-- <form id="form-rgupload" method="post" enctype="multipart/form-data"> -->
                <input type="hidden" name="docs_ids[]" value="4">
                <input type="file" accept=".pdf" hidden="" name="documentos[]" id="rgupload" onchange="arqSelect(this,'rgupload-arq',2)" multiple>
                <input type="text" name="rgupload_index" id="rgupload_index" hidden="">
                <!-- </form> -->
                <div id="rgupload-arq1" class="anexo" style="padding: 2px 7px; margin: 2px 1px 0px 0px; ; background-color: #E5F1CE; color: #181A13 ; font-size: 0.8rem; font-weight: bold">
                    <i class="fi fi-sr-folder" style="float:left;"></i><span style="color: #3C4434; font-size: 8px; padding: 0 0 0 10px"></span><i class="fi fi-sr-trash" onclick="arqSelect(document.getElementById('rgupload'),'rgupload-arq',2,1)" style="float:right; cursor:pointer"></i>
                </div>
                <div id="rgupload-arq2" class="anexo" style="padding: 2px 7px; margin: 2px 1px 0px 0px; ; background-color: #E5F1CE; color: #181A13 ; font-size: 0.8rem; font-weight: bold">
                    <i class="fi fi-sr-folder" style="float:left"></i><span style="color: #3C4434; font-size: 8px; padding: 0 0 0 10px"></span><i class="fi fi-sr-trash" onclick="arqSelect(document.getElementById('rgupload'),'rgupload-arq',2,2)" style="float:right; cursor:pointer"></i>
                </div>
                <div id="rgupload-arq-erro" style="margin: 0; padding: 0; color: red ; font-size: 9px; font-weight: bold">
                </div>
                <input type="hidden" name="total_files[]" id="rgupload-arq-count" value="">

                <?php
                if (in_array("CPF", $documentos_upload)) {
                    $box_upload = '';
                } else {
                    $box_upload = 'style="background-color:#faffef;"';
                }
                ?>
                <div class="upload-box">
                    CPF <span> *</span>
                    <div class="upload" id="cpfupload-div" <?php if ($box_upload != '') echo $box_upload; ?>>
                        <label class="label-upload" for="cpfupload"><i class="fi fi-sr-upload"></i></label>
                    </div>
                </div>
                <!-- <form id="form-cpfupload" method="post" enctype="multipart/form-data"> -->
                <input type="hidden" name="docs_ids[]" value="5">
                <input type="file" accept=".pdf" hidden="" name="documentos[]" id="cpfupload" onchange="arqSelect(this,'cpfupload-arq',2)" multiple>
                <input type="text" name="cpfupload_index" id="cpfupload_index" hidden="">
                <!-- </form> -->
                <div id="cpfupload-arq1" class="anexo" style="padding: 2px 7px; margin: 2px 1px 0px 0px; ; background-color: #E5F1CE; color: #181A13 ; font-size: 0.8rem; font-weight: bold">
                    <i class="fi fi-sr-folder" style="float:left;"></i><span style="color: #3C4434; font-size: 8px; padding: 0 0 0 10px"></span><i class="fi fi-sr-trash" onclick="arqSelect(document.getElementById('cpfupload'),'cpfupload-arq',2,1)" style="float:right; cursor:pointer"></i>
                </div>
                <div id="cpfupload-arq2" class="anexo" style="padding: 2px 7px; margin: 2px 1px 0px 0px; ; background-color: #E5F1CE; color: #181A13 ; font-size: 0.8rem; font-weight: bold">
                    <i class="fi fi-sr-folder" style="float:left"></i><span style="color: #3C4434; font-size: 8px; padding: 0 0 0 10px"></span><i class="fi fi-sr-trash" onclick="arqSelect(document.getElementById('cpfupload'),'cpfupload-arq',2,2)" style="float:right; cursor:pointer"></i>
                </div>
                <div id="cpfupload-arq-erro" style="margin: 0; padding: 0; color: red ; font-size: 9px; font-weight: bold">
                </div>
                <input type="hidden" name="total_files[]" id="cpfupload-arq-count" value="">

                <?php
                if (in_array("TITULO DE ELEITOR", $documentos_upload)) {
                    $box_upload = '';
                } else {
                    $box_upload = 'style="background-color:#faffef;"';
                }
                ?>
                <div class="upload-box">
                    TITULO DE ELEITOR <span> *</span>
                    <div class="upload" id="tituloupload-div" <?php if ($box_upload != '') echo $box_upload; ?>>
                        <label class="label-upload" for="tituloupload"><i class="fi fi-sr-upload"></i></label>
                    </div>
                </div>
                <!-- <form id="form-tituloupload" method="post" enctype="multipart/form-data"> -->
                <input type="hidden" name="docs_ids[]" value="6">
                <input type="file" accept=".pdf" hidden="" name="documentos[]" id="tituloupload" onchange="arqSelect(this,'tituloupload-arq',2)" multiple>
                <input type="text" name="tituloupload_index" id="tituloupload_index" hidden="">
                <!-- </form> -->
                <div id="tituloupload-arq1" class="anexo" style="padding: 2px 7px; margin: 2px 1px 0px 0px; ; background-color: #E5F1CE; color: #181A13 ; font-size: 0.8rem; font-weight: bold">
                    <i class="fi fi-sr-folder" style="float:left;"></i><span style="color: #3C4434; font-size: 8px; padding: 0 0 0 10px"></span><i class="fi fi-sr-trash" onclick="arqSelect(document.getElementById('tituloupload'),'tituloupload-arq',2,1)" style="float:right; cursor:pointer"></i>
                </div>
                <div id="tituloupload-arq2" class="anexo" style="padding: 2px 7px; margin: 2px 1px 0px 0px; ; background-color: #E5F1CE; color: #181A13 ; font-size: 0.8rem; font-weight: bold">
                    <i class="fi fi-sr-folder" style="float:left"></i><span style="color: #3C4434; font-size: 8px; padding: 0 0 0 10px"></span><i class="fi fi-sr-trash" onclick="arqSelect(document.getElementById('tituloupload'),'tituloupload-arq',2,2)" style="float:right; cursor:pointer"></i>
                </div>
                <div id="tituloupload-arq-erro" style="margin: 0; padding: 0; color: red ; font-size: 9px; font-weight: bold">
                </div>
                <input type="hidden" name="total_files[]" id="tituloupload-arq-count" value="">

                <?php
                if ($perfil->sexo != 'masculino') {
                    $box_disable = 'style="background-color:#faffef;"';
                } else {
                    $box_disable = '';
                }
                ?>
                <?php
                if (in_array("COMPROVANTE DE ALISTAMENTO MILITAR", $documentos_upload)) {
                    $box_upload = '';
                } else {
                    $box_upload = 'style="background-color:#faffef;"';
                }
                ?>

                <div class="upload-box" id="reservista-box">
                    CARTEIRA DE RESERVISTA OU PROVA DE ALISTAMENTO MILITAR <span> *</span>
                    <div class="upload" id="reservista-div" <?php if ($box_disable != '') echo $box_disable; ?><?php if ($box_upload != '') echo $box_upload; ?>>
                        <label class="label-upload" for="reservista"><i class="fi fi-sr-upload"></i></label>
                    </div>
                </div>
                <!-- <form id="form-reservista" method="post" enctype="multipart/form-data"> -->
                <input type="hidden" name="docs_ids[]" value="7">
                <input type="file" accept=".pdf" hidden="" name="documentos[]" id="reservista" onchange="arqSelect(this,'reservista-arq',2)" multiple>
                <input type="text" name="reservista_index" id="reservista_index" hidden="">
                <!--  </form> -->
                <div id="reservista-arq1" class="anexo" style="padding: 2px 7px; margin: 2px 1px 0px 0px; ; background-color: #E5F1CE; color: #181A13 ; font-size: 0.8rem; font-weight: bold">
                    <i class="fi fi-sr-folder" style="float:left;"></i><span style="color: #3C4434; font-size: 8px; padding: 0 0 0 10px"></span><i class="fi fi-sr-trash" onclick="arqSelect(document.getElementById('reservista'),'reservista-arq',2,1)" style="float:right; cursor:pointer"></i>
                </div>
                <div id="reservista-arq2" class="anexo" style="padding: 2px 7px; margin: 2px 1px 0px 0px; ; background-color: #E5F1CE; color: #181A13 ; font-size: 0.8rem; font-weight: bold">
                    <i class="fi fi-sr-folder" style="float:left"></i><span style="color: #3C4434; font-size: 8px; padding: 0 0 0 10px"></span><i class="fi fi-sr-trash" onclick="arqSelect(document.getElementById('reservista'),'reservista-arq',2,2)" style="float:right; cursor:pointer"></i>
                </div>
                <div id="reservista-arq-erro" style="margin: 0; padding: 0; color: red ; font-size: 9px; font-weight: bold">
                </div>
                <input type="hidden" name="total_files[]" id="reservista-arq-count" value="">


                <?php
                if (in_array("PIS", $documentos_upload)) {
                    $box_upload = '';
                } else {
                    $box_upload = 'style="background-color:#faffef;"';
                }
                ?>
                <div class="upload-box">
                    COMPROVANTE DE INSCRIÇÃO PIS/PASEP <span> *</span>
                    <div class="upload" id="pisupload-div" <?php if ($box_upload != '') echo $box_upload; ?>>
                        <label class="label-upload" for="pisupload"><i class="fi fi-sr-upload"></i></label>
                    </div>
                </div>
                <!-- <form id="form-pisupload" method="post" enctype="multipart/form-data"> -->
                <input type="hidden" name="docs_ids[]" value="8">
                <input type="file" accept=".pdf" hidden="" name="documentos[]" id="pisupload" onchange="arqSelect(this,'pisupload-arq',1)" multiple>
                <input type="text" name="pisupload_index" id="pisupload_index" hidden="">
                <!-- </form> -->
                <div id="pisupload-arq1" class="anexo" style="padding: 2px 7px; margin: 2px 1px 0px 0px; ; background-color: #E5F1CE; color: #181A13 ; font-size: 0.8rem; font-weight: bold">
                    <i class="fi fi-sr-folder" style="float:left;"></i><span style="color: #3C4434; font-size: 8px; padding: 0 0 0 10px"></span><i class="fi fi-sr-trash" onclick="arqSelect(document.getElementById('pisupload'),'pisupload-arq',1,1)" style="float:right; cursor:pointer"></i>
                </div>
                <div id="pisupload-arq-erro" style="margin: 0; padding: 0; color: red ; font-size: 9px; font-weight: bold">
                </div>
                <input type="hidden" name="total_files[]" id="pisupload-arq-count" value="">

                <?php
                if (in_array("COMPROVANTE DE ENDERECO", $documentos_upload)) {
                    $box_upload = '';
                } else {
                    $box_upload = 'style="background-color:#faffef;"';
                }
                ?>
                <div class="upload-box">
                    COMPROVANTE DE ENDEREÇO OU DECLARAÇÃO DE RESIDÊNCIA <span> *</span>
                    <div class="upload" id="enderecoupload-div" <?php if ($box_upload != '') echo $box_upload; ?>>
                        <label class="label-upload" for="enderecoupload"><i class="fi fi-sr-upload"></i></label>
                    </div>
                </div>
                <!-- <form id="form-enderecoupload" method="post" enctype="multipart/form-data"> -->
                <input type="hidden" name="docs_ids[]" value="9">
                <input type="file" accept=".pdf" hidden="" name="documentos[]" id="enderecoupload" onchange="arqSelect(this,'enderecoupload-arq',2)" multiple>
                <input type="text" name="enderecoupload_index" id="enderecoupload_index" hidden="">
                <!-- </form> -->
                <div id="enderecoupload-arq1" class="anexo" style="padding: 2px 7px; margin: 2px 1px 0px 0px; ; background-color: #E5F1CE; color: #181A13 ; font-size: 0.8rem; font-weight: bold">
                    <i class="fi fi-sr-folder" style="float:left;"></i><span style="color: #3C4434; font-size: 8px; padding: 0 0 0 10px"></span><i class="fi fi-sr-trash" onclick="arqSelect(document.getElementById('enderecoupload'),'enderecoupload-arq',2,1)" style="float:right; cursor:pointer"></i>
                </div>
                <div id="enderecoupload-arq2" class="anexo" style="padding: 2px 7px; margin: 2px 1px 0px 0px; ; background-color: #E5F1CE; color: #181A13 ; font-size: 0.8rem; font-weight: bold">
                    <i class="fi fi-sr-folder" style="float:left"></i><span style="color: #3C4434; font-size: 8px; padding: 0 0 0 10px"></span><i class="fi fi-sr-trash" onclick="arqSelect(document.getElementById('enderecoupload'),'enderecoupload-arq',2,2)" style="float:right; cursor:pointer"></i>
                </div>
                <div id="enderecoupload-arq-erro" style="margin: 0; padding: 0; color: red ; font-size: 9px; font-weight: bold">
                </div>
                <input type="hidden" name="total_files[]" id="enderecoupload-arq-count" value="">

                <?php
                if (in_array("DIPLOMA", $documentos_upload)) {
                    $box_upload = '';
                } else {
                    $box_upload = 'style="background-color:#faffef;"';
                }
                ?>
                <div class="upload-box">
                    DIPLOMA OU CERTIFICADO DE CONCLUSÃO DE MEDICINA <span> *</span>
                    <div class="upload" id="diploma-div" <?php if ($box_upload != '') echo $box_upload; ?>>
                        <label class="label-upload" for="diploma"><i class="fi fi-sr-upload"></i></label>
                    </div>
                </div>
                <!-- <form id="form-diploma" method="post" enctype="multipart/form-data"> -->
                <input type="hidden" name="docs_ids[]" value="10">
                <input type="file" accept=".pdf" hidden="" name="documentos[]" id="diploma" onchange="arqSelect(this,'diploma-arq',2)" multiple>
                <input type="text" name="diploma_index" id="diploma_index" hidden="">
                <!-- </form> -->
                <div id="diploma-arq1" class="anexo" style="padding: 2px 7px; margin: 2px 1px 0px 0px; ; background-color: #E5F1CE; color: #181A13 ; font-size: 0.8rem; font-weight: bold">
                    <i class="fi fi-sr-folder" style="float:left;"></i><span style="color: #3C4434; font-size: 8px; padding: 0 0 0 10px"></span><i class="fi fi-sr-trash" onclick="arqSelect(document.getElementById('diploma'),'diploma-arq',2,1)" style="float:right; cursor:pointer"></i>
                </div>
                <div id="diploma-arq2" class="anexo" style="padding: 2px 7px; margin: 2px 1px 0px 0px; ; background-color: #E5F1CE; color: #181A13 ; font-size: 0.8rem; font-weight: bold">
                    <i class="fi fi-sr-folder" style="float:left"></i><span style="color: #3C4434; font-size: 8px; padding: 0 0 0 10px"></span><i class="fi fi-sr-trash" onclick="arqSelect(document.getElementById('diploma'),'diploma-arq',2,2)" style="float:right; cursor:pointer"></i>
                </div>
                <div id="diploma-arq-erro" style="margin: 0; padding: 0; color: red ; font-size: 9px; font-weight: bold">
                </div>
                <input type="hidden" name="total_files[]" id="diploma-arq-count" value="">

                <?php
                if (in_array("CERTIDAO NEGATIVA DE DEBITO CRM", $documentos_upload)) {
                    $box_upload = '';
                } else {
                    $box_upload = 'style="background-color:#faffef;"';
                }
                ?>
                <div class="upload-box">
                    CERTIDÃO NEGATIVA DE DÉBITOS DO CONSELHO DE CLASSE (CRM) <span> *</span>
                    <div class="upload" id="cndcrm-div" <?php if ($box_upload != '') echo $box_upload; ?>>
                        <label class="label-upload" for="cndcrm"><i class="fi fi-sr-upload"></i></label>
                    </div>
                </div>
                <!-- <form id="form-cndcrm" method="post" enctype="multipart/form-data"> -->
                <input type="hidden" name="docs_ids[]" value="11">
                <input type="file" accept=".pdf" hidden="" name="documentos[]" id="cndcrm" onchange="arqSelect(this,'cndcrm-arq',2)" multiple>
                <input type="text" name="cndcrm_index" id="cndcrm_index" hidden="">
                <!-- </form> -->
                <div id="cndcrm-arq1" class="anexo" style="padding: 2px 7px; margin: 2px 1px 0px 0px; ; background-color: #E5F1CE; color: #181A13 ; font-size: 0.8rem; font-weight: bold">
                    <i class="fi fi-sr-folder" style="float:left;"></i><span style="color: #3C4434; font-size: 8px; padding: 0 0 0 10px"></span><i class="fi fi-sr-trash" onclick="arqSelect(document.getElementById('cndcrm'),'cndcrm-arq',2,1)" style="float:right; cursor:pointer"></i>
                </div>
                <div id="cndcrm-arq2" class="anexo" style="padding: 2px 7px; margin: 2px 1px 0px 0px; ; background-color: #E5F1CE; color: #181A13 ; font-size: 0.8rem; font-weight: bold">
                    <i class="fi fi-sr-folder" style="float:left"></i><span style="color: #3C4434; font-size: 8px; padding: 0 0 0 10px"></span><i class="fi fi-sr-trash" onclick="arqSelect(document.getElementById('cndcrm'),'cndcrm-arq',2,2)" style="float:right; cursor:pointer"></i>
                </div>
                <div id="cndcrm-arq-erro" style="margin: 0; padding: 0; color: red ; font-size: 9px; font-weight: bold">
                </div>
                <input type="hidden" name="total_files[]" id="cndcrm-arq-count" value="">

                <?php
                if (in_array("CARTAO DE VACINA", $documentos_upload)) {
                    $box_upload = '';
                } else {
                    $box_upload = 'style="background-color:#faffef;"';
                }
                ?>
                <div class="upload-box">
                    CARTÃO DE VACINAÇÃO ATUALIZADO <span> *</span>
                    <div class="upload" id="cartaovacina-div" <?php if ($box_upload != '') echo $box_upload; ?>>
                        <label class="label-upload" for="cartaovacina"><i class="fi fi-sr-upload"></i></label>
                    </div>
                </div>
                <!-- <form id="form-cartaovacina" method="post" enctype="multipart/form-data"> -->
                <input type="hidden" name="docs_ids[]" value="12">
                <input type="file" accept=".pdf" hidden="" name="documentos[]" id="cartaovacina" onchange="arqSelect(this,'cartaovacina-arq',5)" multiple>
                <input type="text" name="cartaovacina_index" hidden="" id="cartaovacina_index">
                <!-- </form> -->
                <div id="cartaovacina-arq1" class="anexo" style="padding: 2px 7px; margin: 2px 1px 0px 0px; ; background-color: #E5F1CE; color: #181A13 ; font-size: 0.8rem; font-weight: bold">
                    <i class="fi fi-sr-folder" style="float:left;"></i><span style="color: #3C4434; font-size: 8px; padding: 0 0 0 10px"></span><i class="fi fi-sr-trash" onclick="arqSelect(document.getElementById('cartaovacina'),'cartaovacina-arq',5,1)" style="float:right; cursor:pointer"></i>
                </div>
                <div id="cartaovacina-arq2" class="anexo" style="padding: 2px 7px; margin: 2px 1px 0px 0px; ; background-color: #E5F1CE; color: #181A13 ; font-size: 0.8rem; font-weight: bold">
                    <i class="fi fi-sr-folder" style="float:left"></i><span style="color: #3C4434; font-size: 8px; padding: 0 0 0 10px"></span><i class="fi fi-sr-trash" onclick="arqSelect(document.getElementById('cartaovacina'),'cartaovacina-arq',5,2)" style="float:right; cursor:pointer"></i>
                </div>
                <div id="cartaovacina-arq3" class="anexo" style="padding: 2px 7px; margin: 2px 1px 0px 0px; ; background-color: #E5F1CE; color: #181A13 ; font-size: 0.8rem; font-weight: bold">
                    <i class="fi fi-sr-folder" style="float:left"></i><span style="color: #3C4434; font-size: 8px; padding: 0 0 0 10px"></span><i class="fi fi-sr-trash" onclick="arqSelect(document.getElementById('cartaovacina'),'cartaovacina-arq',5,3)" style="float:right; cursor:pointer"></i>
                </div>
                <div id="cartaovacina-arq4" class="anexo" style="padding: 2px 7px; margin: 2px 1px 0px 0px; ; background-color: #E5F1CE; color: #181A13 ; font-size: 0.8rem; font-weight: bold">
                    <i class="fi fi-sr-folder" style="float:left"></i><span style="color: #3C4434; font-size: 8px; padding: 0 0 0 10px"></span><i class="fi fi-sr-trash" onclick="arqSelect(document.getElementById('cartaovacina'),'cartaovacina-arq',5,4)" style="float:right; cursor:pointer"></i>
                </div>
                <div id="cartaovacina-arq5" class="anexo" style="padding: 2px 7px; margin: 2px 1px 0px 0px; ; background-color: #E5F1CE; color: #181A13 ; font-size: 0.8rem; font-weight: bold">
                    <i class="fi fi-sr-folder" style="float:left"></i><span style="color: #3C4434; font-size: 8px; padding: 0 0 0 10px"></span><i class="fi fi-sr-trash" onclick="arqSelect(document.getElementById('cartaovacina'),'cartaovacina-arq',5,5)" style="float:right; cursor:pointer"></i>
                </div>
                <div id="cartaovacina-arq-erro" style="margin: 0; padding: 0; color: red ; font-size: 9px; font-weight: bold">
                </div>
                <input type="hidden" name="total_files[]" id="cartaovacina-arq-count" value="">

                <?php
                if (in_array("ANTECEDENTES ETICOS CRM", $documentos_upload)) {
                    $box_upload = '';
                } else {
                    $box_upload = 'style="background-color:#faffef;"';
                }
                ?>
                <div class="upload-box">
                    CERTIDÃO DE ANTECEDENTES ÉTICOS <span> *</span>
                    <div class="upload" id="eticos-div" <?php if ($box_upload != '') echo $box_upload; ?>>
                        <label class="label-upload" for="eticos"><i class="fi fi-sr-upload"></i></label>
                    </div>
                </div>
                <!-- <form id="form-eticos" method="post" enctype="multipart/form-data"> -->
                <input type="hidden" name="docs_ids[]" value="13">
                <input type="file" accept=".pdf" hidden="" name="documentos[]" id="eticos" onchange="arqSelect(this,'eticos-arq',2)" multiple>
                <input type="text" name="eticos_index" id="eticos_index" hidden="">
                <!-- </form> -->
                <div id="eticos-arq1" class="anexo" style="padding: 2px 7px; margin: 2px 1px 0px 0px; ; background-color: #E5F1CE; color: #181A13 ; font-size: 0.8rem; font-weight: bold">
                    <i class="fi fi-sr-folder" style="float:left;"></i><span style="color: #3C4434; font-size: 8px; padding: 0 0 0 10px"></span><i class="fi fi-sr-trash" onclick="arqSelect(document.getElementById('eticos'),'eticos-arq',2,1)" style="float:right; cursor:pointer"></i>
                </div>
                <div id="eticos-arq2" class="anexo" style="padding: 2px 7px; margin: 2px 1px 0px 0px; ; background-color: #E5F1CE; color: #181A13 ; font-size: 0.8rem; font-weight: bold">
                    <i class="fi fi-sr-folder" style="float:left"></i><span style="color: #3C4434; font-size: 8px; padding: 0 0 0 10px"></span><i class="fi fi-sr-trash" onclick="arqSelect(document.getElementById('eticos'),'eticos-arq',2,2)" style="float:right; cursor:pointer"></i>
                </div>
                <div id="eticos-arq-erro" style="margin: 0; padding: 0; color: red ; font-size: 9px; font-weight: bold">
                </div>
                <input type="hidden" name="total_files[]" id="eticos-arq-count" value="">

                <?php
                if (in_array("CERTIDAO NEGATIVA CRIMINAL FEDERAL", $documentos_upload)) {
                    $box_upload = '';
                } else {
                    $box_upload = 'style="background-color:#faffef;"';
                }
                ?>
                <div class="upload-box">
                    CERTIDÃO NEGATIVA CRIMINAL FEDERAL <span> *</span>
                    <div class="upload" id="cncf-div" <?php if ($box_upload != '') echo $box_upload; ?>>
                        <label class="label-upload" for="cncf"><i class="fi fi-sr-upload"></i></label>
                    </div>
                </div>
                <!-- <form id="form-cncf" method="post" enctype="multipart/form-data"> -->
                <input type="hidden" name="docs_ids[]" value="14">
                <input type="file" accept=".pdf" hidden="" name="documentos[]" id="cncf" onchange="arqSelect(this,'cncf-arq',1)" multiple>
                <input type="text" name="cncf_index" id="cncf_index" hidden="">
                <!-- </form> -->
                <div id="cncf-arq1" class="anexo" style="padding: 2px 7px; margin: 2px 1px 0px 0px; ; background-color: #E5F1CE; color: #181A13 ; font-size: 0.8rem; font-weight: bold">
                    <i class="fi fi-sr-folder" style="float:left;"></i><span style="color: #3C4434; font-size: 8px; padding: 0 0 0 10px"></span><i class="fi fi-sr-trash" onclick="arqSelect(document.getElementById('cncf'),'cncf-arq',1,1)" style="float:right; cursor:pointer"></i>
                </div>
                <div id="cncf-arq-erro" style="margin: 0; padding: 0; color: red ; font-size: 9px; font-weight: bold">
                </div>
                <input type="hidden" name="total_files[]" id="cncf-arq-count" value="">

                <?php
                if (in_array("CERTIDAO NEGATIVA CRIMINAL ESTADUAL", $documentos_upload)) {
                    $box_upload = '';
                } else {
                    $box_upload = 'style="background-color:#faffef;"';
                }
                ?>
                <div class="upload-box">
                    CERTIDÃO NEGATIVA CRIMINAL ESTADUAL <span> *</span>
                    <div class="upload" id="cnce-div" <?php if ($box_upload != '') echo $box_upload; ?>>
                        <label class="label-upload" for="cnce"><i class="fi fi-sr-upload"></i></label>
                    </div>
                </div>
                <!-- <form id="form-cnce" method="post" enctype="multipart/form-data"> -->
                <input type="hidden" name="docs_ids[]" value="15">
                <input type="file" accept=".pdf" hidden="" name="documentos[]" id="cnce" onchange="arqSelect(this,'cnce-arq',1)" multiple>
                <input type="text" name="cnce_index" id="cnce_index" hidden="">
                <!-- </form> -->
                <div id="cnce-arq1" class="anexo" style="padding: 2px 7px; margin: 2px 1px 0px 0px; ; background-color: #E5F1CE; color: #181A13 ; font-size: 0.8rem; font-weight: bold">
                    <i class="fi fi-sr-folder" style="float:left;"></i><span style="color: #3C4434; font-size: 8px; padding: 0 0 0 10px"></span><i class="fi fi-sr-trash" onclick="arqSelect(document.getElementById('cnce'),'cnce-arq',1,1)" style="float:right; cursor:pointer"></i>
                </div>
                <div id="cnce-arq-erro" style="margin: 0; padding: 0; color: red ; font-size: 9px; font-weight: bold">
                </div>
                <input type="hidden" name="total_files[]" id="cnce-arq-count" value="">

                <?php
                if (in_array("CERTIDAO NEGATIVA DE DEBITO FEDERAL", $documentos_upload)) {
                    $box_upload = '';
                } else {
                    $box_upload = 'style="background-color:#faffef;"';
                }
                ?>
                <div class="upload-box">
                    CERTIDÃO NEGATIVA DE DÉBITO FEDERAL <span> *</span>
                    <div class="upload" id="cndf-div" <?php if ($box_upload != '') echo $box_upload; ?>>
                        <label class="label-upload" for="cndf"><i class="fi fi-sr-upload"></i></label>
                    </div>
                </div>
                <!-- <form id="form-cndf" method="post" enctype="multipart/form-data"> -->
                <input type="hidden" name="docs_ids[]" value="16">
                <input type="file" accept=".pdf" hidden="" name="documentos[]" id="cndf" onchange="arqSelect(this,'cndf-arq',1)" multiple>
                <input type="text" name="cndf_index" id="cndf_index" hidden="">
                <!-- </form> -->
                <div id="cndf-arq1" class="anexo" style="padding: 2px 7px; margin: 2px 1px 0px 0px; ; background-color: #E5F1CE; color: #181A13 ; font-size: 0.8rem; font-weight: bold">
                    <i class="fi fi-sr-folder" style="float:left;"></i><span style="color: #3C4434; font-size: 8px; padding: 0 0 0 10px"></span><i class="fi fi-sr-trash" onclick="arqSelect(document.getElementById('cndf'),'cndf-arq',1,1)" style="float:right; cursor:pointer"></i>
                </div>
                <div id="cndf-arq-erro" style="margin: 0; padding: 0; color: red ; font-size: 9px; font-weight: bold">
                </div>
                <input type="hidden" name="total_files[]" id="cndf-arq-count" value="">

                <?php
                if (in_array("CERTIDAO NEGATIVA DE DEBITO ESTADUAL", $documentos_upload)) {
                    $box_upload = '';
                } else {
                    $box_upload = 'style="background-color:#faffef;"';
                }
                ?>
                <div class="upload-box">
                    CERTIDÃO NEGATIVA DE DÉBITO ESTADUAL <span> *</span>
                    <div class="upload" id="cnde-div" <?php if ($box_upload != '') echo $box_upload; ?>>
                        <label class="label-upload" for="cnde"><i class="fi fi-sr-upload"></i></label>
                    </div>
                </div>
                <!-- <form id="form-cnde" method="post" enctype="multipart/form-data"> -->
                <input type="hidden" name="docs_ids[]" value="17">
                <input type="file" accept=".pdf" hidden="" name="documentos[]" id="cnde" onchange="arqSelect(this,'cnde-arq',1)" multiple>
                <input type="text" name="cnde_index" id="cnde_index" hidden="">
                <!-- </form> -->
                <div id="cnde-arq1" class="anexo" style="padding: 2px 7px; margin: 2px 1px 0px 0px; ; background-color: #E5F1CE; color: #181A13 ; font-size: 0.8rem; font-weight: bold">
                    <i class="fi fi-sr-folder" style="float:left;"></i><span style="color: #3C4434; font-size: 8px; padding: 0 0 0 10px"></span><i class="fi fi-sr-trash" onclick="arqSelect(document.getElementById('cnde'),'cnde-arq',1,1)" style="float:right; cursor:pointer"></i>
                </div>
                <div id="cnde-arq-erro" style="margin: 0; padding: 0; color: red ; font-size: 9px; font-weight: bold">
                </div>
                <input type="hidden" name="total_files[]" id="cnde-arq-count" value="">

                <?php
                if (in_array("CERTIDAO NEGATIVA DE DEBITO MUNICIPAL", $documentos_upload)) {
                    $box_upload = '';
                } else {
                    $box_upload = 'style="background-color:#faffef;"';
                }
                ?>
                <div class="upload-box">
                    CERTIDÃO NEGATIVA DE DÉBITO MUNICIPAL <span> *</span>
                    <div class="upload" id="cndm-div" <?php if ($box_upload != '') echo $box_upload; ?>>
                        <label class="label-upload" for="cndm"><i class="fi fi-sr-upload"></i></label>
                    </div>
                </div>
                <!-- <form id="form-cndm" method="post" enctype="multipart/form-data"> -->
                <input type="hidden" name="docs_ids[]" value="18">
                <input type="file" accept=".pdf" hidden="" name="documentos[]" id="cndm" onchange="arqSelect(this,'cndm-arq',5)" multiple>
                <input type="text" name="cndm_index" id="cndm_index" hidden="">
                <!-- </form> -->
                <div id="cndm-arq1" class="anexo" style="padding: 2px 7px; margin: 2px 1px 0px 0px; ; background-color: #E5F1CE; color: #181A13 ; font-size: 0.8rem; font-weight: bold">
                    <i class="fi fi-sr-folder" style="float:left;"></i><span style="color: #3C4434; font-size: 8px; padding: 0 0 0 10px"></span><i class="fi fi-sr-trash" onclick="arqSelect(document.getElementById('cndm'),'cndm-arq',5,1)" style="float:right; cursor:pointer"></i>
                </div>
                <div id="cndm-arq2" class="anexo" style="padding: 2px 7px; margin: 2px 1px 0px 0px; ; background-color: #E5F1CE; color: #181A13 ; font-size: 0.8rem; font-weight: bold">
                    <i class="fi fi-sr-folder" style="float:left"></i><span style="color: #3C4434; font-size: 8px; padding: 0 0 0 10px"></span><i class="fi fi-sr-trash" onclick="arqSelect(document.getElementById('cndm'),'cndm-arq',5,2)" style="float:right; cursor:pointer"></i>
                </div>
                <div id="cndm-arq3" class="anexo" style="padding: 2px 7px; margin: 2px 1px 0px 0px; ; background-color: #E5F1CE; color: #181A13 ; font-size: 0.8rem; font-weight: bold">
                    <i class="fi fi-sr-folder" style="float:left"></i><span style="color: #3C4434; font-size: 8px; padding: 0 0 0 10px"></span><i class="fi fi-sr-trash" onclick="arqSelect(document.getElementById('cndm'),'cndm-arq',5,3)" style="float:right; cursor:pointer"></i>
                </div>
                <div id="cndm-arq4" class="anexo" style="padding: 2px 7px; margin: 2px 1px 0px 0px; ; background-color: #E5F1CE; color: #181A13 ; font-size: 0.8rem; font-weight: bold">
                    <i class="fi fi-sr-folder" style="float:left"></i><span style="color: #3C4434; font-size: 8px; padding: 0 0 0 10px"></span><i class="fi fi-sr-trash" onclick="arqSelect(document.getElementById('cndm'),'cndm-arq',5,4)" style="float:right; cursor:pointer"></i>
                </div>
                <div id="cndm-arq5" class="anexo" style="padding: 2px 7px; margin: 2px 1px 0px 0px; ; background-color: #E5F1CE; color: #181A13 ; font-size: 0.8rem; font-weight: bold">
                    <i class="fi fi-sr-folder" style="float:left"></i><span style="color: #3C4434; font-size: 8px; padding: 0 0 0 10px"></span><i class="fi fi-sr-trash" onclick="arqSelect(document.getElementById('cndm'),'cndm-arq',5,5)" style="float:right; cursor:pointer"></i>
                </div>
                <div id="cndm-arq-erro" style="margin: 0; padding: 0; color: red ; font-size: 9px; font-weight: bold">
                </div>
                <input type="hidden" name="total_files[]" id="cndm-arq-count" value="">

                <?php
                if (in_array("CERTIDAO NEGATIVA DE DEBITO TRABALHISTA", $documentos_upload)) {
                    $box_upload = '';
                } else {
                    $box_upload = 'style="background-color:#faffef;"';
                }
                ?>
                <div class="upload-box">
                    CERTIDÃO NEGATIVA DE DÉBITO TRABALHISTA <span> *</span>
                    <div class="upload" id="cndt-div" <?php if ($box_upload != '') echo $box_upload; ?>>
                        <label class="label-upload" for="cndt"><i class="fi fi-sr-upload"></i></label>
                    </div>
                </div>
                <!-- <form id="form-cndt" method="post" enctype="multipart/form-data"> -->
                <input type="hidden" name="docs_ids[]" value="19">
                <input type="file" accept=".pdf" hidden="" name="documentos[]" id="cndt" onchange="arqSelect(this,'cndt-arq',1)" multiple>
                <input type="text" name="cndt_index" id="cndt_index" hidden="">
                <!-- </form> -->
                <div id="cndt-arq1" class="anexo" style="padding: 2px 7px; margin: 2px 1px 0px 0px; ; background-color: #E5F1CE; color: #181A13 ; font-size: 0.8rem; font-weight: bold">
                    <i class="fi fi-sr-folder" style="float:left;"></i><span style="color: #3C4434; font-size: 8px; padding: 0 0 0 10px"></span><i class="fi fi-sr-trash" onclick="arqSelect(document.getElementById('cndt'),'cndt-arq',1,1)" style="float:right; cursor:pointer"></i>
                </div>
                <div id="cndt-arq-erro" style="margin: 0; padding: 0; color: red ; font-size: 9px; font-weight: bold">
                </div>
                <input type="hidden" name="total_files[]" id="cndt-arq-count" value="">

                <?php
                if (in_array("CERTIFICADOS DE ESPECIALIDADES", $documentos_upload)) {
                    $box_upload = '';
                } else {
                    $box_upload = 'style="background-color:#faffef;"';
                }
                ?>
                <div class="upload-box">
                    CERTIFICADOS DE CURSOS DE CAPACITAÇÃO (CERTIFICADO DE ESPECIALIDADE/ACLS/ATLS/PALS/PHTLS) <span></span>
                    <div class="upload" id="cursos-div" <?php if ($box_upload != '') echo $box_upload; ?>>
                        <label class="label-upload" for="cursos"><i class="fi fi-sr-upload"></i></label>
                    </div>
                </div>
                <!-- <form id="form-cursos" method="post" enctype="multipart/form-data"> -->
                <input type="hidden" name="docs_ids[]" value="20">
                <input type="file" accept=".pdf" hidden="" name="documentos[]" id="cursos" onchange="arqSelect(this,'cursos-arq',10)" multiple>
                <input type="text" name="cursos_index" id="cursos_index" hidden="">
                <!-- </form> -->
                <div id="cursos-arq1" class="anexo" style="padding: 2px 7px; margin: 2px 1px 0px 0px; ; background-color: #E5F1CE; color: #181A13 ; font-size: 0.8rem; font-weight: bold">
                    <i class="fi fi-sr-folder" style="float:left;"></i><span style="color: #3C4434; font-size: 8px; padding: 0 0 0 10px"></span><i class="fi fi-sr-trash" onclick="arqSelect(document.getElementById('cursos'),'cursos-arq',10,1)" style="float:right; cursor:pointer"></i>
                </div>
                <div id="cursos-arq2" class="anexo" style="padding: 2px 7px; margin: 2px 1px 0px 0px; ; background-color: #E5F1CE; color: #181A13 ; font-size: 0.8rem; font-weight: bold">
                    <i class="fi fi-sr-folder" style="float:left"></i><span style="color: #3C4434; font-size: 8px; padding: 0 0 0 10px"></span><i class="fi fi-sr-trash" onclick="arqSelect(document.getElementById('cursos'),'cursos-arq',10,2)" style="float:right; cursor:pointer"></i>
                </div>
                <div id="cursos-arq3" class="anexo" style="padding: 2px 7px; margin: 2px 1px 0px 0px; ; background-color: #E5F1CE; color: #181A13 ; font-size: 0.8rem; font-weight: bold">
                    <i class="fi fi-sr-folder" style="float:left"></i><span style="color: #3C4434; font-size: 8px; padding: 0 0 0 10px"></span><i class="fi fi-sr-trash" onclick="arqSelect(document.getElementById('cursos'),'cursos-arq',10,3)" style="float:right; cursor:pointer"></i>
                </div>
                <div id="cursos-arq4" class="anexo" style="padding: 2px 7px; margin: 2px 1px 0px 0px; ; background-color: #E5F1CE; color: #181A13 ; font-size: 0.8rem; font-weight: bold">
                    <i class="fi fi-sr-folder" style="float:left"></i><span style="color: #3C4434; font-size: 8px; padding: 0 0 0 10px"></span><i class="fi fi-sr-trash" onclick="arqSelect(document.getElementById('cursos'),'cursos-arq',10,4)" style="float:right; cursor:pointer"></i>
                </div>
                <div id="cursos-arq5" class="anexo" style="padding: 2px 7px; margin: 2px 1px 0px 0px; ; background-color: #E5F1CE; color: #181A13 ; font-size: 0.8rem; font-weight: bold">
                    <i class="fi fi-sr-folder" style="float:left"></i><span style="color: #3C4434; font-size: 8px; padding: 0 0 0 10px"></span><i class="fi fi-sr-trash" onclick="arqSelect(document.getElementById('cursos'),'cursos-arq',10,5)" style="float:right; cursor:pointer"></i>
                </div>
                <div id="cursos-arq6" class="anexo" style="padding: 2px 7px; margin: 2px 1px 0px 0px; ; background-color: #E5F1CE; color: #181A13 ; font-size: 0.8rem; font-weight: bold">
                    <i class="fi fi-sr-folder" style="float:left;"></i><span style="color: #3C4434; font-size: 8px; padding: 0 0 0 10px"></span><i class="fi fi-sr-trash" onclick="arqSelect(document.getElementById('cursos'),'cursos-arq',10,6)" style="float:right; cursor:pointer"></i>
                </div>
                <div id="cursos-arq7" class="anexo" style="padding: 2px 7px; margin: 2px 1px 0px 0px; ; background-color: #E5F1CE; color: #181A13 ; font-size: 0.8rem; font-weight: bold">
                    <i class="fi fi-sr-folder" style="float:left"></i><span style="color: #3C4434; font-size: 8px; padding: 0 0 0 10px"></span><i class="fi fi-sr-trash" onclick="arqSelect(document.getElementById('cursos'),'cursos-arq',10,7)" style="float:right; cursor:pointer"></i>
                </div>
                <div id="cursos-arq8" class="anexo" style="padding: 2px 7px; margin: 2px 1px 0px 0px; ; background-color: #E5F1CE; color: #181A13 ; font-size: 0.8rem; font-weight: bold">
                    <i class="fi fi-sr-folder" style="float:left"></i><span style="color: #3C4434; font-size: 8px; padding: 0 0 0 10px"></span><i class="fi fi-sr-trash" onclick="arqSelect(document.getElementById('cursos'),'cursos-arq',10,8)" style="float:right; cursor:pointer"></i>
                </div>
                <div id="cursos-arq9" class="anexo" style="padding: 2px 7px; margin: 2px 1px 0px 0px; ; background-color: #E5F1CE; color: #181A13 ; font-size: 0.8rem; font-weight: bold">
                    <i class="fi fi-sr-folder" style="float:left"></i><span style="color: #3C4434; font-size: 8px; padding: 0 0 0 10px"></span><i class="fi fi-sr-trash" onclick="arqSelect(document.getElementById('cursos'),'cursos-arq',10,9)" style="float:right; cursor:pointer"></i>
                </div>
                <div id="cursos-arq10" class="anexo" style="padding: 2px 7px; margin: 2px 1px 0px 0px; ; background-color: #E5F1CE; color: #181A13 ; font-size: 0.8rem; font-weight: bold">
                    <i class="fi fi-sr-folder" style="float:left"></i><span style="color: #3C4434; font-size: 8px; padding: 0 0 0 10px"></span><i class="fi fi-sr-trash" onclick="arqSelect(document.getElementById('cursos'),'cursos-arq',10,10)" style="float:right; cursor:pointer"></i>
                </div>
                <div id="cursos-arq-erro" style="margin: 0; padding: 0; color: red ; font-size: 9px; font-weight: bold">
                </div>
                <input type="hidden" name="total_files[]" id="cursos-arq-count" value="">

                <?php
                if (in_array("CARTA DE EXPERIENCIA", $documentos_upload)) {
                    $box_upload = '';
                } else {
                    $box_upload = 'style="background-color:#faffef;"';
                }
                ?>
                <div class="upload-box">
                    CARTA DE EXPERIÊNCIA (06 meses de comprovação, exigido para as unidades da HAPVIDA) <span></span>
                    <div class="upload" id="experiencia-div" <?php if ($box_upload != '') echo $box_upload; ?>>
                        <label class="label-upload" for="experiencia"><i class="fi fi-sr-upload"></i></label>
                    </div>
                </div>
                <!-- <form id="form-experiencia" method="post" enctype="multipart/form-data"> -->
                <input type="hidden" name="docs_ids[]" value="21">
                <input type="file" accept=".pdf" hidden="" name="documentos[]" id="experiencia" onchange="arqSelect(this,'experiencia-arq',5)" multiple>
                <input type="text" name="experiencia_index" id="experiencia_index" hidden="">
                <!-- </form> -->
                <div id="experiencia-arq1" class="anexo" style="padding: 2px 7px; margin: 2px 1px 0px 0px; ; background-color: #E5F1CE; color: #181A13 ; font-size: 0.8rem; font-weight: bold">
                    <i class="fi fi-sr-folder" style="float:left;"></i><span style="color: #3C4434; font-size: 8px; padding: 0 0 0 10px"></span><i class="fi fi-sr-trash" onclick="arqSelect(document.getElementById('experiencia'),'experiencia-arq',5,1)" style="float:right; cursor:pointer"></i>
                </div>
                <div id="experiencia-arq2" class="anexo" style="padding: 2px 7px; margin: 2px 1px 0px 0px; ; background-color: #E5F1CE; color: #181A13 ; font-size: 0.8rem; font-weight: bold">
                    <i class="fi fi-sr-folder" style="float:left"></i><span style="color: #3C4434; font-size: 8px; padding: 0 0 0 10px"></span><i class="fi fi-sr-trash" onclick="arqSelect(document.getElementById('experiencia'),'experiencia-arq',5,2)" style="float:right; cursor:pointer"></i>
                </div>
                <div id="experiencia-arq3" class="anexo" style="padding: 2px 7px; margin: 2px 1px 0px 0px; ; background-color: #E5F1CE; color: #181A13 ; font-size: 0.8rem; font-weight: bold">
                    <i class="fi fi-sr-folder" style="float:left"></i><span style="color: #3C4434; font-size: 8px; padding: 0 0 0 10px"></span><i class="fi fi-sr-trash" onclick="arqSelect(document.getElementById('experiencia'),'experiencia-arq',5,3)" style="float:right; cursor:pointer"></i>
                </div>
                <div id="experiencia-arq4" class="anexo" style="padding: 2px 7px; margin: 2px 1px 0px 0px; ; background-color: #E5F1CE; color: #181A13 ; font-size: 0.8rem; font-weight: bold">
                    <i class="fi fi-sr-folder" style="float:left"></i><span style="color: #3C4434; font-size: 8px; padding: 0 0 0 10px"></span><i class="fi fi-sr-trash" onclick="arqSelect(document.getElementById('experiencia'),'experiencia-arq',5,4)" style="float:right; cursor:pointer"></i>
                </div>
                <div id="experiencia-arq5" class="anexo" style="padding: 2px 7px; margin: 2px 1px 0px 0px; ; background-color: #E5F1CE; color: #181A13 ; font-size: 0.8rem; font-weight: bold">
                    <i class="fi fi-sr-folder" style="float:left"></i><span style="color: #3C4434; font-size: 8px; padding: 0 0 0 10px"></span><i class="fi fi-sr-trash" onclick="arqSelect(document.getElementById('experiencia'),'experiencia-arq',5,5)" style="float:right; cursor:pointer"></i>
                </div>
                <div id="experiencia-arq-erro" style="margin: 0; padding: 0; color: red ; font-size: 9px; font-weight: bold">
                </div>
                <input type="hidden" name="total_files[]" id="experiencia-arq-count" value="">

                <hr>
                <div class="">
                    <div class="btn-register">
                        <section class="sec-loading" id="loading-upload">
                            <div class="one">
                            </div>
                        </section>

                        <button class="btn btn-large btn-success" type="button" id="btnSubmitDocs" onclick="uploadDocumentos('<?php echo $perfil->id; ?>')">Enviar Arquivos</button>

                    </div>
                </div>
            </fieldset>
        </div>
    </form>


    <!-- Preview -->
    <!-- <div id='preview'></div> -->
    <!-- <span id="output"></span> -->

<?php

}

//exit;
