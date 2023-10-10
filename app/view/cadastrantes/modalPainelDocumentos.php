<div class="modal fade" id="modalPainelDocumentos" tabindex="-1" role="dialog" aria-labelledby="modalPainelDocumentos">
    <div class="modal-dialog modal-xl modal-fullscreen" role="document">
        <div class="modal-content b-0" style="height:auto"> <!-- onCloseModals() -->
            <div class="modal-header r-0 bg-primary" ontouchend="">
                <h6 class="modal-title text-white" id="exampleModalLabel2">Documentos do Cadastrante</h6>
                <a href="#" data-dismiss="modal" aria-label="Close" class="paper-nav-toggle paper-nav-white active"><i></i></a>
                <form id="changeCampoSelect" role="form" name="changeCampoSelect" method="POST" class="form-horizontal">
                    <input type="hidden" name="id_cadastrante_field" id="id_cadastrante_field" value="">
                    <div id="tela_dados_cadastro">
                        <?php
                        //print_r($_SESSION['lista_cadastrantes']);
                        ?>
                    </div>
                </form>
            </div>

            <div class="modal-body no-p no-b">

                xx
            </div>
            <div class="modal-footer">
                <div class="form-row row clearfix">
                    <!-- <button class="btn btn-primary l-s-1 s-12 text-uppercase" onclick="" type="submit" id="next2" name="submit">
                                    Cadastrar
                                </button> -->

                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {

        $("#modalPainelDocumentos").on('hide.bs.modal', function() {
            location.reload(true);
        });

    });
</script>

<script>
    function editaCampoSelecionado(campo) {
        var campoId = '#' + campo;
        var campoInput = $(campoId);
        //campoInput.focusin();
        campoInput.css("background-color", "white");
    }

    function mostra_dados_campo(valor) {
        var campoSelect = document.getElementById("campo_selecionado");
        campoSelect.value = valor.value;

        var inputSelect = valor.selectedOptions[0].text;
        
        var htmlInput = '<div class="form-row"><div class="col-md-11"><input type="hidden" name="tipo_campo" id="tipo_campo" value="'+ inputSelect +'"><input type="text" onclick="editaCampoSelecionado(' + "'" + inputSelect + "'" + ')" class="form-control change-campo" name="' + inputSelect + '" id="' + inputSelect + '" value="' + campoSelect.value + '"></div><div class="col-md-1"><input type="button" id="submitChangeField" onclick="atualizar_campo_selecionado()" class="btn btn-info btn-block" value="Alterar"></div></div>';

        $('#display_campo_verificando').html(htmlInput);

        if (inputSelect == 'id') {
            $('#submitChangeField').attr("disabled", true);
        }
        else {
            $('#submitChangeField').attr("disabled", false);
        }
    }
</script>


<script>
    function abre_tela_dados(userid) {
        var btnClose = $('.btn-close-display-dados');
        btnClose.css('display', 'block');

        var tela_dados = $('#tela_dados_cadastro');
        tela_dados.css("display", "block");
        tela_dados.html(userid);

        $.ajax({
            url: 'ajax-display-tela-dados.php',
            type: 'post',
            data: {
                userid: userid
            },
            success: function(response) {
                // Add response in Modal body
                $('#tela_dados_cadastro').html(response);

                // Display Modal

                /* $('#modalPainelDocumentos').modal({
                    remote: url,
                    refresh: true
                }); */
            }
        });
    }

    function fecha_tela_dados() {
        var btnClose = $('.btn-close-display-dados');
        btnClose.css('display', 'none');

        var tela_dados = $('#tela_dados_cadastro');
        tela_dados.css("display", "none");
    }
</script>