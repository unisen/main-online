<link rel="stylesheet" href="css/style-uploads.css">

<div id="upload-form" method="post" enctype="multipart/form-data">
    <fieldset>
        <legend>Anexar Documentos</legend>
        <div class="no-error" id="no-error">
        </div>
        <div class="upload-box">
            FOTO<span> *</span>
            <div class="upload" id="foto-div">
                <label class="label-upload" for="foto"><i class="fi fi-sr-upload"></i></label>
            </div>
        </div>
        
            <input type="file" multiple="" accept=".pdf" hidden="" name="foto[]" id="foto" onblur="optChangeIdEscala()" onchange="arqSelect(this,'foto-arq',2)">
            <input type="text" name="foto_index" id="foto_index" hidden="">
      
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

       

        <!-- <button class="btn btn-warning l-s-1 s-12 text-uppercase" type="submit" id="enviar_documentos" name="enviar_documentos" onclick="validarDocumentos()">Enviar
                </button> -->
        </form>
    </fieldset>
</div>

<script>
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
                            virgula = ";"
                        };
                        document.getElementById(file_select.getAttribute('id') + '_index').value += virgula + i;
                    }
                }
            }
        }
    }


    function validarDocumentos(form) {

        erro_count_upload = 0;

        if (erro_count_upload == 0) {
            erro_count_upload = 0;
            var respostaUpload = validarUploadsForm(form);
            console.log(respostaUpload);
        } else {
            document.getElementById('enviar-loading').classList.remove('loading');
        }
    }

    function validarUploadsForm(form) {
        //console.log(form);

        document.getElementById('enviar-loading').classList.add('loading');
        count_ajax = 0;

        var session = document.getElementById('nome').value;

        if (session == '') {
            window.location.replace('sessionfailure.php?type=cadastro')
        } else {

            //return ('ok');
            $(form).on('submit', function(e) {
                e.preventDefault();
                $.ajax({
                    type: 'POST',
                    url: 'submit.php?nome=foto',
                    data: new FormData(this),
                    dataType: 'json',
                    contentType: false,
                    cache: false,
                    processData: false,
                    beforeSend: function() {
                        $('.submitBtn').attr("disabled", "disabled");
                        $(form).css("opacity", ".5");
                    },
                    success: function(response) {
                        $('.statusMsg').html('');
                        if (response.status == 1) {
                            $(form)[0].reset();
                            $('.statusMsg').html('<p class="alert alert-success">' + response.message + '</p>');
                        } else {
                            $('.statusMsg').html('<p class="alert alert-danger">' + response.message + '</p>');
                        }
                        $(form).css("opacity", "");
                        $(".submitBtn").removeAttr("disabled");
                    }
                });
            });

            //foto
            /* xhr1 = new XMLHttpRequest();
            formData1 = new FormData(document.getElementById('form-foto'));
            xhr1.open('POST', 'submit.php?nome=foto');
            xhr1.send(formData1);
            xhr1.onreadystatechange = function() {
                    if ((xhr1.readyState == 4) && (xhr1.status == 200)) count_ajax++;
                    //ajaxCheck(count_ajax);
                }
                //curriculum
            xhr2 = new XMLHttpRequest();
            formData2 = new FormData(document.getElementById('form-curriculum'));
            xhr2.open('POST', 'submit.php?nome=curriculum');
            xhr2.send(formData2);
            xhr2.onreadystatechange = function() {
                if ((xhr2.readyState == 4) && (xhr2.status == 200)) count_ajax++;
                //ajaxCheck(count_ajax);
            } */
        }
    }
</script>