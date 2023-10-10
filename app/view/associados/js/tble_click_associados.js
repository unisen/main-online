var table = document.getElementById('tbl_socios');
for (var i = 1; i < table.rows.length; i++) {
    table.rows[i].onclick = function() {
        const newLocal = this.cells[0].innerText;
        //rIndex = this.rowIndex;
        //document.getElementById("id_delete_cliente").value = newLocal;
        //document.getElementById("id_cliente_edit").value = newLocal;
        //var tipoUsuario = this.cells[4].innerHTML;



        document.getElementById("editar_crm").value = this.cells[2].innerHTML;

    }
};


$(document).ready(function() {

    $('.dados_associado').click(function() {

        var userid = $(this).data('id');

        //alert(userid);

        // AJAX request
        $.ajax({
            url: 'ajax-editar.php',
            type: 'post',
            data: { userid: userid },
            success: function(response) {
                // Add response in Modal body
                $('.modal-body').html(response);

                // Display Modal
                $('#modalEditarAssociado').modal('show');
            }
        });
    });
});