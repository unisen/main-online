<?php
$nome_cadastrante = "DIEGO FERNANDES NEVES OLIVEIRA";
$crm_cadastrante = "999999";

$diretorio_cadastrantes = "arquivos";
$_SESSION['diretorio'] = $diretorio_cadastrantes;

?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

<form role="form" id="novo_cadastrante_uploads" name="novo_cadastrante_uploads" method="POST" class="form-horizontal needs-validation" autocomplete="true">
    <div class="panel panel-primary setup-content" id="step-1">
        <div class="panel-heading">
            <h3 class="panel-title">Adicionar Cadastrante</h3>
        </div>
        <div class="panel-body">
            <div class="card no-b no-r">
                <div class="card-body">
                    <div class="form-row row clearfix">
                        <div class="form-group col-sm-5 m-0">
                            <label for="nome_cadastrante" class="col-form-label s-12">Nome Completo</label>
                            <input type="text" name="nome_cadastrante" id="nome_cadastrante" class="form-control r-0 light s-12" value="<?php echo $nome_cadastrante; ?>">
                            <div class="invalid-feedback">Insira um nome completo.</div>
                        </div>

                        <div class="form-group col-sm-2 m-0">
                            <label for="crm_cadastrante" class="col-form-label s-12">CRM <span id="resposta-crm-existe"> </span></label>
                            <input type="text" name="crm_cadastrante" id="crm_cadastrante" onblur="verificaCRM()" class="form-control r-0 light s-12" value="<?php echo $crm_cadastrante; ?>" required>
                        </div>

                        <div class="form-group col-sm-1 m-0">
                            <label for="crm_uf_cadastrante" class="my-1 mr-2">UF CRM</label>
                            <select type="text" name="crm_uf_cadastrante" id="crm_uf_cadastrante" placeholder="UF do CRM" onchange="nomePastaCadastrante()" class="form-control r-0 light s-12" required>
                                <option value="" disabled="" selected="">Selecione</option>
                                <option value="AC">AC</option>
                                <option value="AL">AL</option>
                                <option value="AP">AP</option>
                                <option value="AM">AN</option>
                                <option value="BA">BA</option>
                                <option value="CE">CE</option>
                                <option value="DF">DF</option>
                                <option value="ES">ES</option>
                                <option value="GO">GO</option>
                                <option value="MA">MA</option>
                                <option value="MT">MT</option>
                                <option value="MS">MS</option>
                                <option value="MG">MG</option>
                                <option value="PR">PR</option>
                                <option value="PB">PB</option>
                                <option value="PA">PA</option>
                                <option value="PE">PE</option>
                                <option value="PI">PI</option>
                                <option value="RJ">RJ</option>
                                <option value="RN">RN</option>
                                <option value="RS">RS</option>
                                <option value="RO">RO</option>
                                <option value="RR">RR</option>
                                <option value="SC">SC</option>
                                <option value="SE">SE</option>
                                <option value="SP">SP</option>
                                <option value="TO">TO</option>
                            </select>
                        </div>
                        <div class="form-group col-sm-4 m-0">
                            <label for="pasta_cadastrante" class="col-form-label s-12">NOME DA PASTA</label>
                            <input type="text" name="pasta_cadastrante" id="pasta_cadastrante" class="form-control r-0 light s-12" required>
                            <input type="hidden" name="nome_completo_cadastrante" id="nome_completo_cadastrante">
                        </div>
                        <!-- <div class="form-group col-sm-2 m-0">
                            <p class="statusMsg" id="alerta-erro"></p>
                            <p class="statusMsg" id="alerta-ok"></p>
                        </div> -->

                    </div>
                    <hr>

                </div>
            </div>
        </div>
    </div>
</form>
<div class="card-footer white">
    <div class="form-group col-sm-12 m-0">
        <button class="btn btn-primary l-s-1 s-12 text-uppercase" id="criar_pastas_documentos" name="criar_pastas_documentos" onclick="CriaPastaCadastrante()">CRIAR PASTA</button>
    </div>



</div>


<div id="upload-form" method="post" enctype="multipart/form-data">
    <fieldset>
        <legend>ANEXAR DOCUMENTOS</legend>
        <div class="no-error" id="no-error">
        </div>
        <div class="upload-box">
            FOTO<span> *</span>
            <div class="upload" id="foto-div">
                <label class="label-upload" for="foto"><i class="fi fi-sr-upload"></i></label>
            </div>
        </div>
        <form id="form-foto" method="post" enctype="multipart/form-data">
            <input type="file" multiple="" accept=".pdf" hidden="" name="foto[]" id="foto" onblur="optChangeIdEscala()" onchange="arqSelect(this,'foto-arq',2)">
            <input type="text" name="foto_index" id="foto_index" hidden="">
        </form>
        <div id="foto-arq1" class="anexo" style="padding: 2px 7px; margin: 2px 1px 0px 0px; background-color: #E5F1CE; color: #181A13 ; font-size: 0.8rem; font-weight: bold">
            <i class="fi fi-sr-folder" style="float:left;"></i><span style="color: #3C4434; font-size: 8px; padding: 0 0 0 10px"></span><i class="fi fi-sr-trash" onclick="arqSelect(document.getElementById('foto'),'foto-arq',2,1)" style="float:right; cursor:pointer"></i>
        </div>
        <div id="foto-arq2" class="anexo" style="padding: 2px 7px; margin: 2px 1px 0px 0px; ; background-color: #E5F1CE; color: #181A13; font-size: 0.8rem; font-weight: bold">
            <i class="fi fi-sr-folder" style="float:left"></i><span style="color: #3C4434; font-size: 8px; padding: 0 0 0 10px"></span><i class="fi fi-sr-trash" onclick="arqSelect(document.getElementById('foto'),'foto-arq',2,2)" style="float:right; cursor:pointer"></i>
        </div>
        <div id="foto-arq-erro" style="margin: 0; padding: 0; color: red ; font-size: 9px; font-weight: bold">
        </div>
        <div class="upload-box">
            CURRICULUM VITAE<span> *</span>
            <div class="upload" id="curriculum-div">
                <label class="label-upload" for="curriculum"><i class="fi fi-sr-upload"></i></label>
            </div>
        </div>
        <form id="form-curriculum" method="post" enctype="multipart/form-data">
            <input type="file" multiple="" accept=".pdf" hidden="" name="curriculum[]" id="curriculum" onchange="arqSelect(this,'curriculum-arq',2), apagaErro(this)">
            <input type="text" name="curriculum_index" id="curriculum_index" hidden="">
        </form>
        <div id="curriculum-arq1" class="anexo" style="padding: 2px 7px; margin: 2px 1px 0px 0px; ; background-color: #E5F1CE; color: #181A13 ; font-size: 0.8rem; font-weight: bold">
            <i class="fi fi-sr-folder" style="float:left;"></i><span style="color: #3C4434; font-size: 8px; padding: 0 0 0 10px"></span><i class="fi fi-sr-trash" onclick="arqSelect(document.getElementById('curriculum'),'curriculum-arq',2,1)" style="float:right; cursor:pointer"></i>
        </div>
        <div id="curriculum-arq2" class="anexo" style="padding: 2px 7px; margin: 2px 1px 0px 0px; ; background-color: #E5F1CE; color: #181A13 ; font-size: 0.8rem; font-weight: bold">
            <i class="fi fi-sr-folder" style="float:left"></i><span style="color: #3C4434; font-size: 8px; padding: 0 0 0 10px"></span><i class="fi fi-sr-trash" onclick="arqSelect(document.getElementById('curriculum'),'curriculum-arq',2,2)" style="float:right; cursor:pointer"></i>
        </div>
        <div id="curriculum-arq-erro" style="margin: 0; padding: 0; color: red ; font-size: 9px; font-weight: bold">
        </div>

        <!-- PARTE FORM UPLOADS 1 -->
        <hr>
        <!-- PARTE FORM UPLOADS 2 -->

        <a id="enviar-loading" name="submitEndA" class="next" onclick="validarDocumentos()">ENVIAR</a>
        <input type="submit" id="submitEnd" name="submitEnd" value="enviar" class="next" style="display:none">

        <!-- <button class="btn btn-warning l-s-1 s-12 text-uppercase" type="submit" id="enviar_documentos" name="enviar_documentos" onclick="validarDocumentos()">Enviar
                </button> -->
        </form>
    </fieldset>
</div>

<script>
    function CriaPastaCadastrante() {

        var pasta_cadastrante = $("#pasta_cadastrante");

        if (pasta_cadastrante.val() != "") {

            $.ajax({
                url: 'criarPasta.php',
                type: 'POST',
                data: {
                    "crmsocio": pasta_cadastrante.val()
                },
                success: function(data) {
                    console.log(data);
                    data = $.parseJSON(data);

                    mensagem = data;

                    console.log(mensagem);

                    if (mensagem == "erro") {

                        //var alertaErro = $("#alerta-erro");
                        //alertaErro.html("Diretório já existe");
                        //alertaErro.css("display", "block");

                        /* Swal.fire({
                             title: "Oops...",
                             text: "Diretório já existe!",
                             icon: "error",
                         });
                        */
                        var alertaErro = pasta_cadastrante.val() + " - " + " Pasta do Cadastrante já existe!";
                        $('#pasta_cadastrante').val(alertaErro);

                        //$("#crm_cadastrante").val("");
                        //$('#pasta_cadastrante').focus();

                        setTimeout(function() {
                            $('#pasta_cadastrante').val("");
                            $('#crm_cadastrante').focus();                            
                            //alertaErro.css("display", "none");
                        }, 2500);

                        //$("#resposta-crm").text(data.crm);
                    } else {

                        //$("#toast-crm").toast('show');
                        //var alertaOk = $("#alerta-ok");
                        //alertaOk.html("Diretório Criado!");
                        //alertaOk.css("display", "block");

                        /*  Swal.fire({
                             title: "",
                             icon: 'success',
                             confirmButtonColor: '#3085d6',
                             cancelButtonColor: '#d33',
                             confirmButtonText: 'OK',
                             text: 'Pasta Cadastrante Criada!'
                         }); */

                        var pasta = pasta_cadastrante.val();

                        var alertaOk = pasta + " - " + " Pasta Criada!";
                        $('#pasta_cadastrante').val(alertaOk);

                        setTimeout(function() {
                            $('#pasta_cadastrante').val(pasta);
                            $('#nome_cadastrante').focus();     
                            //alertaOk.css("display", "none");
                        }, 2500);

                       // $("#nome_cadastrante").focus();


                    }

                }
            });
        }
    }
</script>