<div class="modal fade" id="modalUploadDocumentos" tabindex="-1" role="dialog" aria-labelledby="modalUploadDocumentos">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content b-0">
            <div class="modal-header r-0 bg-primary">
                <h6 class="modal-title text-white" id="exampleModalLabel">Enviar Documentos</h6>
                <a href="#" data-dismiss="modal" aria-label="Close" class="paper-nav-toggle paper-nav-white active"><i></i></a>
            </div>

            <!-- <form role="form" id="dados_bancarios_associado" name="dados_bancarios_associado" method="POST" enctype="multipart/form-data" class="form-horizontal">
                <input type="hidden" name="cpf_user_cadastrante" id="cpf_user_cadastrante" value=""> -->
            <div class="modal-body no-p no-b">

                xxxxx

            </div>

            <div class="modal-footer">
                <!-- <div class="form-row row clearfix">
                    <button class="btn btn-success pull-left" type="button" onclick="atualizar_dados_bancarios()">Salvar</button>

                </div> -->
                <!-- </form> -->
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {

        $("#modalUploadDocumentos").on('hide.bs.modal', function() {
            //location.reload();

            //form_uploads_documentos('<?php //echo $_SESSION['perfil']->id; ?>');
        });

    });


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