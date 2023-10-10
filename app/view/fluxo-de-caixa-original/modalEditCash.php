<div class="modal fade" id="modalEditCash" tabindex="-1" role="dialog" aria-labelledby="modalEditCash">
    <div class="modal-dialog modal-lg modal-fullscreen" role="document">
        <div class="modal-content b-0">
            <div class="modal-header r-0 bg-primary">
                <h6 class="modal-title text-white" id="exampleModalLabel">Editar</h6>
                <a href="#" data-dismiss="modal" aria-label="Close"
                    class="paper-nav-toggle paper-nav-white active"><i></i></a>
            </div>
            <form name="editar_financeiro" id="editar_financeiro" action="" method="POST"
                class="form-horizontal editar_financeiro" enctype="multipart/form-data">

                <div class="modal-body no-p no-b">
                    <div class="card no-b no-r">
                        <div class="card-body">
                            <div class="form-row row clearfix">
                                <input type="hidden" name="editar_id" id="editar_id" value="">

                                <div class="form-group col-sm-4 m-0">
                                    <label for="editar_mes" class="col-form-label s-12">Mês</label>
                                    <input type="text" name="editar_mes" id="editar_mes"
                                         class="form-control r-0 light s-12"
                                        value="" required>
                                </div>

                                <div class="form-group col-sm-4 m-0">
                                    <label for="editar_tipo" class="col-form-label s-12">Tipo</label>
                                    <input type="text" name="editar_tipo" id="editar_tipo"
                                         class="form-control r-0 light s-12"
                                        value="" required>
                                </div>

                                <div class="form-group col-sm-4 m-0">
                                    <label for="editar_nfcpf" class="col-form-label s-12">NF / CPF</label>
                                    <input type="text" name="editar_nfcpf" id="editar_nfcpf"
                                         class="form-control r-0 light s-12"
                                        value="" required>
                                </div>

                                <div class="form-group col-sm-4 m-0">
                                    <label for="editar_cliente" class="col-form-label s-12">Cliente / Fornecedor</label>
                                    <input type="text" name="editar_cliente" id="editar_cliente"
                                         class="form-control r-0 light s-12"
                                        value="" required>
                                </div>

                                <div class="form-group col-sm-4 m-0">
                                    <label for="editar_ccusto" class="col-form-label s-12">Centro de Custo</label>
                                    <input type="text" name="editar_ccusto" id="editar_ccusto"
                                         class="form-control r-0 light s-12"
                                        value="" required>
                                </div>

                                <div class="form-group col-sm-4 m-0">
                                    <label for="editar_pcontas" class="col-form-label s-12">Plano de Contas</label>
                                    <input type="text" name="editar_pcontas" id="editar_pcontas"
                                         class="form-control r-0 light s-12"
                                        value="" required>
                                </div>

                                <div class="form-group col-sm-4 m-0">
                                    <label for="editar_banco" class="col-form-label s-12">Banco</label>
                                    <input type="text" name="editar_banco" id="editar_banco"
                                         class="form-control r-0 light s-12"
                                        value="" required>
                                </div>

                                <div class="form-group col-sm-4 m-0">
                                    <label for="editar_vencimento" class="col-form-label s-12">Vencimento</label>
                                    <input type="text" name="editar_vencimento" id="editar_vencimento"
                                         class="form-control r-0 light s-12"
                                        value="" required>
                                </div>

                                <div class="form-group col-sm-4 m-0">
                                    <label for="editar_datapgto" class="col-form-label s-12">Data PGTO</label>
                                    <input type="text" name="editar_datapgto" id="editar_datapgto"
                                         class="form-control r-0 light s-12"
                                        value="" required>
                                </div>

                                <div class="form-group col-sm-4 m-0">
                                    <label for="editar_valortit" class="col-form-label s-12">Valor do Título</label>
                                    <input type="text" name="editar_valortit" id="editar_valortit"
                                         class="money form-control r-0 light s-12"
                                        value="" required>
                                </div>

                                <div class="form-group col-sm-4 m-0">
                                    <label for="editar_valorpgto" class="col-form-label s-12">Valor Pago</label>
                                    <input type="text" name="editar_valorpgto" id="editar_valorpgto"
                                         class="money form-control r-0 light s-12"
                                        value="" required>
                                </div>

                                <div class="form-group col-sm-4 m-0">
                                    <label for="editar_detalhe" class="col-form-label s-12">Detalhe</label>
                                    <input type="text" name="editar_detalhe" id="editar_detalhe"
                                         class="form-control r-0 light s-12"
                                        value="" required>
                                </div>                              

                            </div>
                        </div>
                    </div>
                </div>

            </form>
            <div class="modal-footer">
                <div class="form-row row clearfix">
                <a href="#" class="btn btn-primary btn-sm ml-3 d-none d-sm-block" onclick="atualiza_item_cash()">Salvar</a>

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

    $("#modalEditCash").on('hide.bs.modal', function() {

        $('#tbl_financeiro_cash').DataTable().clear();
        //location.reload();
    });

});
</script>

