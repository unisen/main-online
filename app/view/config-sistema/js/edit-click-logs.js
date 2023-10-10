$(document).ready(function() {

    $('.dados_log').click(function() {

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
});