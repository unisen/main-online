<!-- Modal DELETE CLIENTE -->
<div class="modal fade show" id="deleteCliente" tabindex="-1" role="dialog" aria-labelledby="ModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="ModalCenterTitle">Deletar Cliente</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="deleteCliente_" name="deleteCliente_" action="" method="POST" class="form-horizontal">
                <div class="modal-body">
                    
                   <input type="hidden" name="id_delete_cliente" id="id_delete_cliente" value=""> 
                   <input type="hidden" name="nome_delete_cliente" id="nome_delete_cliente" value=""> 
                       <label> Deseja realmente excluir este Cliente? </label>
                       <p id="nomeClienteDelete"></p>                       
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-danger">Excluir</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
$(document).ready(function(){
  $("#btnExcluir").click(function(){
    $("#deleteCliente").modal("show");
  });
  $("#deleteCliente").on('show.bs.modal', function(){
    var nomeCliente = $("#nome_delete_cliente").val();
    $("#nomeClienteDelete").text(nomeCliente);
    
  });
});
</script>
