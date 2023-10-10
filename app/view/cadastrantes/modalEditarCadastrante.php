<div class="modal fade" id="modalEditarCadastrante" tabindex="-1" role="dialog" aria-labelledby="modalEditarCadastrante">
    <div class="modal-dialog modal-lg modal-fullscreen" role="document">
        <div class="modal-content b-0">
            <div class="modal-header r-0 bg-primary">
                <h6 class="modal-title text-white" id="exampleModalLabel">Editar Cadastrante</h6>
                <a href="#" data-dismiss="modal" aria-label="Close" class="paper-nav-toggle paper-nav-white active"><i></i></a>
            </div>
            <form name="editar_cadastrante" id="editar_cadastrante" action="" method="POST" class="form-horizontal editar_cadastrante" enctype="multipart/form-data">

                <div class="modal-body no-p no-b">
                </div>

            </form>
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
    /* function modal_editar_senha()
    {   
        var editar_senha = $('#editar_senha');
        editar_senha.prop('disabled', false);
        var editar_senha_confirma = $('#editar_senha_confirma')
        editar_senha_confirma.prop('disabled', false);

        $('#editar_senha').focus();        
    } */

    $(document).ready(function() {

        $("#modalEditarCadastrante").on('hide.bs.modal', function() {

            location.reload();
        });

    });

   


    /* function uploadDocumentos() {


        //$("#loading-upload").css("display", "block !important");
        //alert("EU");
        document.getElementById('btnSubmitDocs').classList.add('loading-uploads');

        //stop jquery ajax form submit with form data example, we will post it manually.
        event.preventDefault();

        // Get form
        var form = $('#uploadDocs')[0];

        // Create an FormData object 
        var data = new FormData(form);

        // If you want to add an extra field for the FormData
        //data.append("CustomField", "This is some extra data, testing");

        // disabled the submit button
        $("#btnSubmitDocs").prop("disabled", true);

        $.ajax({
            type: "POST",
            enctype: 'multipart/form-data',
            url: "uploads.php",
            data: data,
            processData: false,
            contentType: false,
            cache: false,
            timeout: 800000,
            success: function(data) {
                //$("#output").text(data);
                console.log("SUCCESS : ", data);
                $("#btnSubmitDocs").prop("disabled", false);

                if (data) {
                    Swal.fire({
                        title: '',
                        text: "Upload de Arquivos Realizado!",
                        icon: 'success',
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'OK'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            // MOSTRA O URL COM PARAMETROS
                            document.getElementById('btnSubmitDocs').classList.remove('loading-uploads');
                            console.log(data);
                            //sessionStorage.setItem("page_step", "3");
                            //location.href = "cadastro.php";
                            //location.href = "cadastro.php" + window.location.search + "&page=3";


                            //alert(window.location.search);
                            //console.log(result.val());
                            //location.reload();
                            //$('#enviar_mensagem').modal('toggle');
                            //$('#enviar_mensagem').find('input').val('');
                        }
                    });
                }

            },
            error: function(e) {
                //$("#output").text(e.responseText);
                console.log("ERROR : ", e);
                $("#btnSubmitDocs").prop("disabled", false);

                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: e,

                });

            }
        });

    } */
</script>