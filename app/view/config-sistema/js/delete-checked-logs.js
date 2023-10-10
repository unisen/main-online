// #modalDeleteLogs_ > div.modal-footer > button
/* $(document).ready(function() {

    $('#delete_selecionados').click(function() {

        var checks = document.querySelectorAll(".custom-control-input");
        let inputs = "";
        for (let i = 0; i < checks.length; i++) {
            if (checks[i].checked) {
                inputs += checks[i].id + ' ';
            }

        }
        console.log(inputs);


        var idlog = $(this).data('id');

        //alert(userid);

        // AJAX request
        $.ajax({
            url: 'ajax-editar.php',
            type: 'post',
            data: { idlog: idlog },
            success: function(response) {
                // Add response in Modal body
                $('.modal-body').html(response);

                // Display Modal
                $('#modalEditarLog').modal('show');
            }
        });
    });
}); */


// #modalDeleteLogs_ > div.modal-footer > button
$(document).ready(function() {

    $('#modalDeleteLogs_ > div.modal-footer > button').click(function() {
        location.reload();
    });
});

$(document).ready(function() {

    $("#delete_selecionados").submit(function(e) {
        e.preventDefault();

        //var Selecionados = $('');
        var checks = document.querySelectorAll(".custom-control-input");
        let inputs = "";
        for (let i = 0; i < checks.length; i++) {
            if (checks[i].checked) {
                inputs += checks[i].id + ' ';
            }

        }
        console.log(inputs);
        inputs = inputs.trim();
        const myArrayInputs = inputs.split(" ");

        var idlog = myArrayInputs.toString();

        //document.getElementById("ids_delete_logs").value = idlog;

        console.log(idlog);

        // AJAX request
        /*  $.ajax({
            url: 'ajax-deletes.php',
            type: 'post',
            data: { idlog: idlog },
            success: function(response) {
                // Add response in Modal body
                $('.modal-body').html(response);

                // Display Modal
                $('#modalDeleteLogs').modal('show');
            }
        }); */

        $.ajax({
            url: "../ajax-deletes.php",
            method: "post",
            data: $("form").serialize(),
            dataType: "text",
            success: function(strMessage) {
                $("#message").text(strMessage);
                if ($.trim(strMessage) == 'sucesso') {
                    Swal.fire({
                        title: '',
                        text: "Logs Removidos com sucesso!",
                        icon: 'success',
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'OK'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            location.reload();

                        }
                    })
                    $('#delete_selecionados').modal('toggle');
                } else {
                    Swal.fire({
                        title: '',
                        text: "Erro - Logs não Removidos!",
                        icon: 'Erro',
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'OK'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            location.reload();

                        }
                    });

                }
            }
        });

    });
});