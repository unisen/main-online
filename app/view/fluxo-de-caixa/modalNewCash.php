<div class="modal fade" id="modalNewCash" tabindex="-1" role="dialog" aria-labelledby="modalNewCash">
    <div class="modal-dialog modal-lg modal-fullscreen" role="document">
        <div class="modal-content b-0">
            <div class="modal-header r-0 bg-primary">
                <h6 class="modal-title text-white" id="exampleModalLabel">Adicionar</h6>
                <a href="#" data-dismiss="modal" aria-label="Close"
                    class="paper-nav-toggle paper-nav-white active"><i></i></a>
            </div>
            <form name="add_financeiro" id="add_financeiro" action="" method="POST"
                class="form-horizontal add_financeiro" enctype="multipart/form-data">

                <div class="modal-body no-p no-b">
                    <div class="card no-b no-r">
                        <div class="card-body">
                            <div class="form-row row clearfix">
                                <input type="hidden" name="add_id" id="add_id" value="">

                                <div class="form-group col-sm-4 m-0">
                                    <label for="add_mes" class="col-form-label s-12">Mês</label>
                                    <input type="text" name="add_mes" id="add_mes"
                                         class="form-control r-0 light s-12"
                                        value="" required>
                                </div>

                                <div class="form-group col-sm-4 m-0">
                                    <label for="add_tipo" class="col-form-label s-12">Tipo</label>
                                    <input type="text" name="add_tipo" id="add_tipo"
                                         class="form-control r-0 light s-12"
                                        value="" required>
                                </div>

                                <div class="form-group col-sm-4 m-0">
                                    <label for="add_nfcpf" class="col-form-label s-12">NF / CPF</label>
                                    <input type="text" name="add_nfcpf" id="add_nfcpf"
                                         class="form-control r-0 light s-12"
                                        value="" required>
                                </div>

                                <div class="form-group col-sm-4 m-0">
                                    <label for="add_cliente" class="col-form-label s-12">Cliente / Fornecedor</label>
                                    <input type="text" name="add_cliente" id="add_cliente"
                                         class="form-control r-0 light s-12"
                                        value="" required>
                                </div>

                                <div class="form-group col-sm-4 m-0">
                                    <label for="add_ccusto" class="col-form-label s-12">Centro de Custo</label>
                                    <input type="text" name="add_ccusto" id="add_ccusto"
                                         class="form-control r-0 light s-12"
                                        value="" required>
                                </div>

                                <div class="form-group col-sm-4 m-0">
                                    <label for="add_pcontas" class="col-form-label s-12">Plano de Contas</label>
                                    <input type="text" name="add_pcontas" id="add_pcontas"
                                         class="form-control r-0 light s-12"
                                        value="" required>
                                </div>

                                <div class="form-group col-sm-4 m-0">
                                    <label for="add_banco" class="col-form-label s-12">Banco</label>
                                    <input type="text" name="add_banco" id="add_banco"
                                         class="form-control r-0 light s-12"
                                        value="" required>
                                </div>

                                <div class="form-group col-sm-4 m-0">
                                    <label for="add_vencimento" class="col-form-label s-12">Vencimento</label>
                                    <input type="text" name="add_vencimento" id="add_vencimento"
                                         class="form-control r-0 light s-12"
                                        value="" required>
                                </div>

                                <div class="form-group col-sm-4 m-0">
                                    <label for="add_datapgto" class="col-form-label s-12">Data PGTO</label>
                                    <input type="text" name="add_datapgto" id="add_datapgto"
                                         class="form-control r-0 light s-12"
                                        value="" required>
                                </div>

                                <div class="form-group col-sm-4 m-0">
                                    <label for="add_valortit" class="col-form-label s-12">Valor do Título</label>
                                    <input type="text" name="add_valortit" id="add_valortit"
                                         class="money form-control r-0 light s-12"
                                        value="" required>
                                </div>

                                <div class="form-group col-sm-4 m-0">
                                    <label for="add_valorpgto" class="col-form-label s-12">Valor Pago</label>
                                    <input type="text" name="add_valorpgto" id="add_valorpgto"
                                         class="money form-control r-0 light s-12"
                                        value="" required>
                                </div>

                                <div class="form-group col-sm-4 m-0">
                                    <label for="add_detalhe" class="col-form-label s-12">Detalhe</label>
                                    <input type="text" name="add_detalhe" id="editar_detalhe"
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
                <a href="#" class="btn btn-primary ml-3" type="button" onclick="adiciona_item_cash()">Inserir</a>
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

    $("#modalNewCash").on('hide.bs.modal', function() {

        location.reload();
    });

});
</script>

