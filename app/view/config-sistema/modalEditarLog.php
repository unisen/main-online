<div class="modal fade" id="modalEditarLog" tabindex="-1" role="dialog" aria-labelledby="modalEditarLog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content b-0">
            <div class="modal-header r-0 bg-primary">
                <h6 class="modal-title text-white" id="exampleModalLabel">Editar Log</h6>
                <a href="#" data-dismiss="modal" aria-label="Close" class="paper-nav-toggle paper-nav-white active"><i></i></a>
            </div>
            <div class="modal-body no-p no-b">

                <form id="editar_log" name="editar_log" method="POST" class="form-horizontal needs-validation" autocomplete="true">
                    <div class="card no-b  no-r">
                        <div class="card-body">

                            <div class="form-row">
                                <div class="col-md-8">
                                    <div class="form-group m-0">
                                        <label for="usuario_edit" class="col-form-label s-12">Usuário</label>
                                        <input type="text" name="usuario_edit" id="usuario_edit" class="form-control r-0 light s-12" required>
                                        <div class="invalid-feedback">Nome de Usuário</div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-6 m-0">
                                            <label for="username_edit" class="col-form-label s-12">Username</label>
                                            <input type="text" name="username_edit" id="username_edit" class="form-control r-0 light s-12" required>
                                            <div class="invalid-feedback">Insira username.</div>

                                        </div>
                                        <div class="form-group col-6 m-0">
                                            <label for="acao_edit" class="col-form-label s-12">Ação</label>
                                            <input type="text" name="acao_edit" id="acao_edit" class="form-control r-0 light s-12" required>
                                            <div class="invalid-feedback">Insira Ação.</div>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-6 m-0">
                                            <label for="origem_edit" class="col-form-label s-12">Origem</label>
                                            <input type="text" name="origem_edit" id="origem_edit" class="form-control r-0 light s-12" required>
                                            <div class="invalid-feedback">Insira Origem.</div>
                                        </div>
                                        <div class="form-group col-6 m-0">
                                            <label for="tabela_edit" class="col-form-label s-12">Tabela</label>
                                            <input type="text" name="tabela_edit" id="tabela_edit" class="form-control r-0 light s-12" required>
                                            <div class="invalid-feedback">Insira Ação.</div>
                                        </div>
                                    </div>

                                </div>
                               
                            </div>
                            <div class="form-row row clearfix">
                                <div class="form-group col-sm-4 m-0">
                                    <label for="editar_rg" class="col-form-label s-12">RG</label>
                                    <input type="text" name="editar_rg" id="editar_rg" placeholder="Digite seu RG" maxlength="20" oninput="ChangeRg(this), apagaErro(this)" onfocus="apagaErro()" class="cpf form-control r-0 light s-12" required>
                                </div>
                                <div class="form-group col-sm-3 m-0">
                                    <label for="editar_oepx" class="col-form-label s-12">Órgão Expedidor</label>
                                    <input type="text" name="editar_oexp" id="editar_oexp" placeholder="Digite o nome do órgão" oninput="apagaErro(this)" class="cpf form-control r-0 light s-12" required>
                                </div>

                                <div class="form-group col-sm-2 m-0">
                                    <label for="editar_rg_uf" class="my-1 mr-2">UF</label>
                                    <select type="text" name="editar_rg_uf" id="editar_rg_uf" placeholder="UF do RG" onchange="apagaErro(this)" onfocus="apagaErro()" class="custom-select my-1 mr-sm-2 form-control r-0 light s-12" required>
                                        <option value="" disabled="" selected="">Selecione</option>
                                        <option value="AC">AC</option>
                                        <option value="AL">AL</option>
                                        <option value="AP">AP</option>
                                        <option value="AM">AN</option>
                                        <option value="BA">BA</option>
                                        <option value="CE">CE</option>
                                        <option value="DF">DF</option>
                                        <option value="ES">ES</option>
                                        <option value="GO">GO</option>
                                        <option value="MA">MA</option>
                                        <option value="MT">MT</option>
                                        <option value="MS">MS</option>
                                        <option value="MG">MG</option>
                                        <option value="PR">PR</option>
                                        <option value="PB">PB</option>
                                        <option value="PA">PA</option>
                                        <option value="PE">PE</option>
                                        <option value="PI">PI</option>
                                        <option value="RJ">RJ</option>
                                        <option value="RN">RN</option>
                                        <option value="RS">RS</option>
                                        <option value="RO">RO</option>
                                        <option value="RR">RR</option>
                                        <option value="SC">SC</option>
                                        <option value="SE">SE</option>
                                        <option value="SP">SP</option>
                                        <option value="TO">TO</option>
                                    </select>
                                </div>

                                <div class="form-group col-sm-3 m-0">
                                    <label for="dexp" class="col-form-label s-12">Data de Expedição</label>
                                    <input type="date" data-time-picker="false" data-format-date='d/m/Y' name="editar_dexp" id="editar_dexp" onchange="apagaErro(this)" class="colordate form-control r-0 light s-12 datePicker" required>
                                </div>

                            </div>

                            <hr>
                            <div class="form-row row clearfix">
                                <button class="btn btn-primary l-s-1 s-12 text-uppercase" type="submit" id="editar_log" name="adicionar_log">
                                    Cadastrar
                                </button>

                                <button class="btn btn-success l-s-1 s-12 text-uppercase" id="auto_preencher" name="auto_preencher" onclick="autoPreencherDados()" style="margin-left:10px;">
                                    AutoPreencher
                                </button>



                                <span class="badge badge-success" id="alerta-ok" style="padding: 10px !important;margin-left:10px; display:none; font-weight:bold;"></span>

                                <span class="badge badge-danger" id="alerta-erro" style="padding: 10px !important;margin-left:10px; display:none; font-weight:bold;"></span>

                                <!-- <button class="btn btn-success l-s-1 s-12 text-white" id="alerta-ok" style="margin-left:10px; display:none;">
                                                <span id="msg-alerta-ok"></span> Verificado!
                                            </button> -->


                                <!-- Toasts de Verificação -->
                                <!--  <div class="toast align-items-center text-white bg-success l-s-1 s-12 toast-action border-0" style="margin-left:20px;" role="alert" aria-live="assertive" aria-atomic="true" id="toast-crm" data-delay="4000">
                                                <div class="d-flex">
                                                    <div class="toast-body">
                                                        OK
                                                    </div>
                                                    <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close">x</button>
                                                </div>
                                            </div> -->

                                <!--  <p id="alerta-ok" style="display:none;">
                                                <strong><span id="msg-alerta-ok"></span></strong> Verificado!
                                            </p> -->
                            </div>

                        </div>
                    </div>
                </form>
            </div>
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