<!-- Modal desarquivar CLIENTE -->
<div class="modal fade show" id="modalDesarquivarCadastrante" tabindex="-1" role="dialog" aria-labelledby="ModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="ModalCenterTitle">Desarquivar Cadastrante</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="modalDesarquivarCadastrante_" name="modalDesarquivarCadastrante_" action="" method="POST" class="form-horizontal">
                <div class="modal-body">
                    <input type="hidden" name="crm_desarquivar_cadastrante" id="crm_desarquivar_cadastrante" value="">
                    <input type="hidden" name="id_desarquivar_cadastranteArq" id="id_desarquivar_cadastranteArq" value="">
                    <input type="hidden" name="nome_desarquivar_cadastranteArq" id="nome_desarquivar_cadastranteArq" value="">
                    <label><b>Deseja desarquivar</b> este Cadastrante? </label>
                    <p id="nomeCadastrantedesarquivarArq"></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="desarquivar_cadastranteArq btn btn-danger">Ativar</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $(".desarquivar_cadastrante").click(function() {

            var userid = $(this).data('id');
            $("#id_desarquivar_cadastranteArq").val(userid);

            var usernome = '#nomeCadastranteArq_' + userid;
            var nomeDelCadastrante = $(usernome).val();
            $("#nome_desarquivar_cadastranteArq").val(nomeDelCadastrante);

            var userfolder = '#pastaCadastranteArq_' + userid;
            var pastaCadastrante = $(userfolder).val();
            $("#crm_desarquivar_cadastrante").val(pastaCadastrante);


            $("#modalDesarquivarCadastrante").modal("show");

        });


        $("#modalDesarquivarCadastrante").on('show.bs.modal', function() {
            var nomeCliente = $("#nome_desarquivar_cadastranteArq").val();
            var pastaCliente = $("#crm_desarquivar_cadastrante").val();
            $("#nomeCadastrantedesarquivarArq").text(nomeCliente + ' - ' + pastaCliente);

        });
    });
</script>

<script>
    $(document).ready(function() {

        $("#modalDesarquivarCadastrante").on('hide.bs.modal', function() {
            location.reload();
        });

    });
</script>

<script>
    $(document).ready(function() {

        $('.desarquivar_cadastranteArq').click(function() {

            //var userid = $(this).data('id');
            var userid = $("#id_desarquivar_cadastranteArq").val();
            var usercrm = $("#crm_desarquivar_cadastrante").val();

            sessionStorage.setItem("pasta_cadastrante", usercrm);

            //alert(userid);
            // AJAX Documentos Cadastrante request
            $.ajax({
                url: 'ajax-desarquivar-cadastrante.php',
                type: 'post',
                data: {
                    userid: userid,
                    usercrm: usercrm
                },
                success: function(response) {
                    response = JSON.parse(response);

                    console.log(response[1]);

                   

                    // Add response for desarquivar cadastrante
                    if (response[0] == 'sucesso') {
                        //location.href = "index.php?zip=" + folderzip;

                         Swal.fire({
                             title: 'Retorno de Cadastro',
                             text: "Cadastrante Desarquivado!",
                             icon: 'success',
                             confirmButtonColor: '#3085d6',
                             cancelButtonColor: '#d33',
                             confirmButtonText: 'OK'
                         }).then((result) => {
                             if (result.isConfirmed) {

                                 //var url = "?zip=" + response[1];
                                 location.href = "index.php?zip=" + folderzip;

                                
                                 //location.replace(url);
                                 //window.location.href = url;                            
                                 //location.reload();
                             }
                         });
                        //var url = "?zip=" + response[1];
                        location.href = "index.php?zip=" + folderzip;
                        //location.href = 'index.php' + url;
                        //$('#desarquivar_selecionados').modal('toggle');
                    } else {
                        Swal.fire({
                            title: '',
                            text: "Erro ao Desarquivar cadastrante: " + response,
                            icon: 'Erro',
                            confirmButtonColor: '#3085d6',
                            cancelButtonColor: '#d33',
                            confirmButtonText: 'OK'
                        });
                    }
                }
            });
        });
    });
</script>