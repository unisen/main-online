<!-- Modal DELETE CLIENTE -->
<div class="modal fade show" id="deleteCadastranteArquivado" tabindex="-1" role="dialog" aria-labelledby="ModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="ModalCenterTitle">Deletar Cadastrante Arquivado</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="deleteCadastranteArquivado_" name="deleteCadastranteArquivado_" action="" method="POST" class="form-horizontal">
                <div class="modal-body">

                    <input type="hidden" name="id_delete_cadastranteArq" id="id_delete_cadastranteArq" value="">
                    <input type="hidden" name="nome_delete_cadastranteArq" id="nome_delete_cadastranteArq" value="">
                    <label> Deseja realmente excluir este Cadastrante? </label>
                    <p id="nomeCadastranteDeleteArq"></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="deletar_cadastranteArq btn btn-danger">Excluir</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $(".btnExcluir_arquivado").click(function() {

            var userid = $(this).data('id');
            $("#id_delete_cadastranteArq").val(userid);

            var usernome = '#nomeCadastranteArq_' + userid;
            var nomeDelCadastrante = $(usernome).val();

            $("#nome_delete_cadastranteArq").val(nomeDelCadastrante);
            $("#deleteCadastranteArquivado").modal("show");

        });


        $("#deleteCadastranteArquivado").on('show.bs.modal', function() {
            var nomeCliente = $("#nome_delete_cadastranteArq").val();
            $("#nomeCadastranteDeleteArq").text(nomeCliente);

        });
    });
</script>

<script>
    $(document).ready(function() {

        $("#deleteCadastranteArquivado").on('hide.bs.modal', function() {
            location.reload();
        });

    });
</script>

<script>
    $(document).ready(function() {

        $('.deletar_cadastranteArq').click(function() {

            //var userid = $(this).data('id');
            var userid = $("#id_delete_cadastranteArq").val();
            //alert(userid);
            // AJAX Documentos Cadastrante request
            $.ajax({
                url: 'ajax-deletar-cadastrante-arquivado.php',
                type: 'post',
                data: {
                    userid: userid
                },
                success: function(response) {
                    response = JSON.parse(response);

                    //alert(response[0]);

                    // Add response for delete cadastrante
                    if (response[0] == 'sucesso') {
                        Swal.fire({
                            title: '',
                            text: "Cadastrante Excluido!",
                            icon: 'success',
                            confirmButtonColor: '#3085d6',
                            cancelButtonColor: '#d33',
                            confirmButtonText: 'OK'
                        }).then((result) => {
                            if (result.isConfirmed) {

                                //var url = "?id=" + userid + "&cad=" + response[1];
                                //location.replace(url);
                                //window.location.href = url;                            
                                //location.reload();
                            }
                        })
                            console.log(response[1]);
                        //var url = " ?id=" + userid + "&cad=" + response[1];
                        //location.replace(url);
                        //$('#delete_selecionados').modal('toggle');
                    } else {
                        Swal.fire({
                            title: '',
                            text: "Erro ao excluir cadastrante: " + response,
                            icon: 'Erro',
                            confirmButtonColor: '#3085d6',
                            cancelButtonColor: '#d33',
                            confirmButtonText: 'OK'
                        })
                    }
                }
            });
        });
    });
</script>