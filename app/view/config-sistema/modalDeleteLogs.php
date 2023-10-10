<!-- Modal DELETE CLIENTE -->
<div class="modal fade show" id="modalDeleteLogs" tabindex="-1" role="dialog" aria-labelledby="ModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="ModalCenterTitle">Deletar Cliente</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="modalDeleteLogs_" name="modalDeleteLogs_" action="" method="POST" class="form-horizontal">
                <div class="modal-body">
                    
                   <input type="hidden" name="ids_delete_logs" id="ids_delete_logs" value=""> 
                   
                       <label> Resposta</label>
                       <p id="idsLogsDelete"></p>                       
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success" data-dismiss="modal">OK</button>
                   
                </div>
            </form>
        </div>
    </div>
</div>

<script>
$(document).ready(function(){

  $("#modalDeleteLogs").on('show.bs.modal', function(){
    //var idsDelete = $("#ids_delete_logs").val();
    var idsDelete = "Logs Deletados com Sucesso!";
    $("#idsLogsDelete").text(idsDelete);
    
  });
});
</script>
