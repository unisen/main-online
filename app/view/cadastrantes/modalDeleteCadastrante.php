<!-- Modal DELETE CLIENTE -->
<div class="modal fade show" id="deleteCadastrante" tabindex="-1" role="dialog" aria-labelledby="ModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="ModalCenterTitle">Deletar Cadastrante</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="deleteCadastrante_" name="deleteCadastrante_" action="" method="POST" class="form-horizontal">
                <div class="modal-body">
                    <p>Deseja realmente excluir este Cadastrante? </p>
                    <input type="hidden" name="id_delete_cadastrante" id="id_delete_cadastrante" value="">
                    <input type="hidden" name="nome_delete_cadastrante" id="nome_delete_cadastrante" value="">
                    <p id="nomeCadastranteDelete"></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="deletar_cadastrante btn btn-danger">Excluir</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $(".btnExcluir").click(function() {

            var userid = $(this).data('id');
            $("#id_delete_cadastrante").val(userid);

            var usernome = '#nomeCadastrante_' + userid;
            var nomeDelCadastrante = $(usernome).val();

            $("#nome_delete_cadastrante").val(nomeDelCadastrante);
            $("#deleteCadastrante").modal("show");

        });

        $("#btnExcluir-float").click(function() {

            var userid = $(this).data('id');
            $("#id_delete_cadastrante").val(userid);

            var usernome = '#nomeCadastrante_' + userid;
            var nomeDelCadastrante = $(usernome).val();

            $("#nome_delete_cadastrante").val(nomeDelCadastrante);
            $("#deleteCadastrante").modal("show");

        });

        $("#deleteCadastrante").on('show.bs.modal', function() {
            var nomeCliente = $("#nome_delete_cadastrante").val();
            $("#nomeCadastranteDelete").text(nomeCliente);

        });
    });
</script>

<script>
    $(document).ready(function() {

        $("#deleteCadastrante").on('hide.bs.modal', function() {
            location.reload();
        });

    });
</script>