$(document).ready(function() {

    $("#btnSubmit").click(function(event) {


        //$("#loading-upload").css("display", "block !important");
       
        document.getElementById('btnSubmit').classList.add('loading-uploads');

        //stop jquery ajax form submit with form data example, we will post it manually.
        event.preventDefault();

        // Get form
        var form = $('#myform')[0];

        // Create an FormData object 
        var data = new FormData(form);

        // If you want to add an extra field for the FormData
        data.append("CustomField", "This is some extra data, testing");

        // disabled the submit button
        $("#btnSubmit").prop("disabled", true);

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
                $("#btnSubmit").prop("disabled", false);

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
                            document.getElementById('btnSubmit').classList.remove('loading-uploads');
                            sessionStorage.setItem("page_step", "3");
                            location.href = "cadastro.php";
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
                $("#btnSubmit").prop("disabled", false);

                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: e,

                });

            }
        });

    });

});