<div class="modal fade" id="modalEditarDadosBancarios" tabindex="-1" role="dialog" aria-labelledby="modalEditarDadosBancarios">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content b-0">
            <div class="modal-header r-0 bg-primary">
                <h6 class="modal-title text-white" id="exampleModalLabel">Dados Bancários</h6>
                <a href="#" data-dismiss="modal" aria-label="Close" class="paper-nav-toggle paper-nav-white active"><i></i></a>
            </div>

            <form role="form" id="dados_bancarios_associado" name="dados_bancarios_associado" method="POST" enctype="multipart/form-data" class="form-horizontal">
                <input type="hidden" name="cpf_user_cadastrante" id="cpf_user_cadastrante" value="">
                <div class="modal-body no-p no-b">



                </div>

                <div class="modal-footer">
                    <div class="form-row row clearfix">
                        <button class="btn btn-success pull-left" type="button" onclick="atualizar_dados_bancarios()">Salvar</button>

                    </div>
            </form>
        </div>
    </div>
</div>
</div>

<script>
    $(document).ready(function() {

        $("#modalEditarDadosBancarios").on('hide.bs.modal', function() {
            location.reload();
        });

    });
</script>