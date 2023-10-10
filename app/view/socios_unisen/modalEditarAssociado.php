<div class="modal fade" id="modalEditarAssociado" tabindex="-1" role="dialog" aria-labelledby="modalEditarAssociado">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content b-0">
                        <div class="modal-header r-0 bg-primary">
                            <h6 class="modal-title text-white" id="exampleModalLabel">Editar Associado</h6>
                            <a href="#" data-dismiss="modal" aria-label="Close" class="paper-nav-toggle paper-nav-white active"><i></i></a>
                        </div>
                        <div class="modal-body no-p no-b">

                            <form id="editar_associado" name="editar_associado" method="POST" class="form-horizontal needs-validation" autocomplete="true">
                                <div class="card no-b  no-r">
                                    <div class="card-body">

                                        <div class="form-row">
                                            <div class="col-md-8">
                                                <div class="form-group m-0">
                                                    <label for="editar_nome" class="col-form-label s-12">Nome Completo</label>
                                                    <input type="text" name="editar_nome" id="editar_nome" class="form-control r-0 light s-12" placeholder="Nome Completo (igual identidade médica)" required>
                                                    <div class="invalid-feedback">Insira um nome completo.</div>
                                                </div>
                                                <div class="form-row">
                                                    <div class="form-group col-6 m-0">
                                                        <label class="my-1 mr-2" for="editar_id-estadocivil">Estado Civil</label>
                                                        <select type="text" name="editar_estadocivil" id="editar_id-estadocivil" class="custom-select my-1 mr-sm-2 form-control r-0 light s-12" required>
                                                            <option value="" selected="">Selecione</option>
                                                            <option value="solteiro">Solteiro(a)</option>
                                                            <option value="casado">Casado(a)</option>
                                                            <option value="divorciado">Divorciado(a)</option>
                                                            <option value="viuvo">Viuvo(a)</option>
                                                        </select>

                                                    </div>
                                                    <div class="form-group col-6 m-0">
                                                        <label class="my-1 mr-2" for="editar_sexo">Sexo</label>
                                                        <select class="custom-select my-1 mr-sm-2 form-control r-0 light s-12" type="text" name="editar_sexo" onchange="apagaErro(this)" id="editar_sexo" required>
                                                            <option value="" selected="">Selecione</option>
                                                            <option value="masculino">Masculino</option>
                                                            <option value="feminino">Feminino</option>
                                                        </select>
                                                    </div>

                                                </div>
                                                <div class="form-row">
                                                    <div class="form-group col-6 m-0">
                                                        <label for="editar_data_nascimento" class="col-form-label s-12"><i class="icon-calendar mr-2"></i>Data de Nascimento</label>
                                                        <input type="date" data-time-picker="false" data-format-date='d/m/Y' name="editar_dn" id="editar_data_nascimento" onchange="apagaErro(this)" class="colordate form-control r-0 light s-12 datePicker" required>
                                                    </div>
                                                    <div class="form-group col-6 m-0">
                                                        <label for="editar_cpf" class="col-form-label s-12"><i class="icon-fingerprint"></i> CPF</label>
                                                        <input type="text" name="editar_cpf" id="editar_cpf" placeholder="Digite seu CPF" maxlength="14" oninput="cpfRegEx(this)" class="cpf form-control r-0 light s-12" required>
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="col-md-3 offset-md-1">
                                                <input hidden id="editar_file" name="editar_file" />
                                                <div class="dropzone dropzone-file-area pt-4 pb-4" id="fileUpload">
                                                    <div class="dz-default dz-message">
                                                        <span>Drop A passport size image of user</span>
                                                        <div>You can also click to open file browser</div>
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

                                        <div class="form-row row clearfix">
                                            <div class="form-group col-sm-6 m-0">
                                                <label for="editar_nome_pai" class="col-form-label s-12">Nome do Pai</label>
                                                <input type="text" name="editar_nome_pai" id="editar_nome_pai" placeholder="Nome Completo" onblur="optChangeIdEscala()" oninput="optChangeIdEscala(), apagaErro(this)" class="cpf form-control r-0 light s-12" required>
                                            </div>
                                            <div class="form-group col-sm-6 m-0">
                                                <label for="editar_nome_mae" class="col-form-label s-12">Nome da Mãe</label>
                                                <input type="text" name="editar_nome_mae" id="editar_nome_mae" placeholder="Nome Completo" onblur="optChangeIdEscala()" oninput="optChangeIdEscala(), apagaErro(this)" class="cpf form-control r-0 light s-12" required>
                                            </div>
                                        </div>

                                        <div class="form-row row clearfix">
                                            <div class="form-group col-sm-4 m-0">
                                                <label for="editar_nacionalidade" class="my-1 mr-2">Nacionalidade</label>
                                                <select type="text" name="editar_nacionalidade" onchange="apagaErro(this)" id="editar_nacionalidade" class="custom-select my-1 mr-sm-2 form-control r-0 light s-12" required>
                                                    <option value="" selected="">Selecione</option>
                                                    <option value="brasileira">brasileira</option>
                                                    <option value="outra">outra</option>
                                                </select>
                                            </div>

                                            <div class="form-group col-sm-4 m-0">
                                                <label for="editar_naturalidade" class="col-form-label s-12">Naturalidade</label>
                                                <input type="text" name="editar_naturalidade" id="editar_naturalidade" placeholder="Cidade em que nasceu" oninput="apagaErro(this)" class="form-control r-0 light s-12" required>
                                            </div>
                                            <div class="form-group col-sm-4 m-0">
                                                <label for="editar_nat_uf" class="my-1 mr-2">UF</label>
                                                <select type="text" name="editar_nat_uf" id="editar_nat_uf" onchange="apagaErro(this)" onfocus="apagaErro()" class="custom-select my-1 mr-sm-2 form-control r-0 light s-12" required>
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
                                        </div>


                                        <div class="form-row row clearfix">
                                            <div class="form-group col-sm-4 m-0">
                                                <label for="editar_titulo" class="col-form-label s-12">Titulo de Eleitor</label>
                                                <input type="text" name="editar_titulo" id="editar_titulo" onblur="optChangeIdEscala()" oninput="optChangeIdEscala(), apagaErro(this)" class="form-control r-0 light s-12" required>
                                            </div>

                                            <div class="form-group col-sm-4 m-0">
                                                <label for="editar_pis" class="col-form-label s-12">PIS / PASEP</label>
                                                <input type="text" name="editar_pis" id="editar_pis" onblur="optChangeIdEscala()" oninput="optChangeIdEscala(), apagaErro(this)" class="form-control r-0 light s-12" required>
                                            </div>
                                            <div class="form-group col-sm-4 m-0">
                                                <label for="editar_telefone" class="col-form-label s-12">Celular</label>
                                                <input type="text" name="editar_telefone" id="editar_telefone" onblur="optChangeIdEscala()" maxlength="15" oninput="optChangeIdEscala(), apagaErro(this), celRegEx(this)" class="form-control r-0 light s-12" required>
                                            </div>
                                        </div>


                                        <div class="form-row row clearfix">
                                            <div class="form-group col-sm-6 m-0">
                                                <label for="editar_endereco" class="col-form-label s-12">Endereço</label>
                                                <input type="text" name="editar_endereco" id="editar_endereco" onblur="optChangeIdEscala()" oninput="optChangeIdEscala(), apagaErro(this)" class="form-control r-0 light s-12" required>
                                            </div>

                                            <div class="form-group col-sm-2 m-0">
                                                <label for="editar_endereco_nome" class="my-1 mr-2">Endereço no Nome</label>
                                                <select type="text" name="editar_endereco_nome" onchange="apagaErro(this)" id="editar_endereco_nome" class="custom-select my-1 mr-sm-2 form-control r-0 light s-12" required>
                                                    <option value="" selected="">Selecione</option>
                                                    <option value="SIM">SIM</option>
                                                    <option value="NÃO">NÃO</option>
                                                </select>
                                            </div>
                                            <div class="form-group col-sm-4 m-0">
                                                <label for="editar_email" class="col-form-label s-12">Email <span id="editar_resposta-email" class="badge badge-success r-3"></span></label>
                                                <input type="editar_email" name="editar_email" id="editar_email" onblur="verificaEmail()" placeholder="E-mail" class="form-control r-0 light s-12" value="" required>
                                            </div>
                                        </div>

                                        <div class="form-row row clearfix">
                                            <div class="form-group col-sm-6 m-0">
                                                <label for="editar_crm" class="col-form-label s-12">CRM <span id="editar_resposta-crm"> </span></label>
                                                <input type="text" name="editar_crm" id="editar_crm" placeholder="CRM" oninput="optChangeIdEscala(this)" onblur="verificaCRM()" onfocus="apagaErro()" class="form-control r-0 light s-12" required>
                                            </div>

                                            <div class="form-group col-sm-2 m-0">
                                                <label for="editar_crm_uf" class="my-1 mr-2">UF CRM</label>
                                                <select type="text" name="editar_crm_uf" id="editar_crm_uf" placeholder="UF do CRM" onchange="optChangeIdEscala() , apagaErro(this)" onfocus="apagaErro()" class="custom-select my-1 mr-sm-2 form-control r-0 light s-12" required>
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

                                            <div class="form-group col-sm-4 m-0">
                                                <label for="editar_id-escala" class="my-1 mr-2">ID Escala</label>
                                                <select type="text" name="editar_id-escala" onchange="apagaErro(this)" id="editar_id-escala" class="custom-select my-1 mr-sm-2 form-control r-0 light s-12" required>
                                                    <option value="" disabled="" selected="">Escolha uma opção</option>
                                                    <option value="escala1">Escala 1</option>
                                                    <option value="escala2">Escala 2</option>
                                                </select>
                                            </div>

                                        </div>

                                        <div class="form-row row clearfix">

                                            <div class="form-group col-sm-6 m-0">
                                                <label for="editar_senha" class="col-form-label s-12">Senha</label>
                                                <input type="password" name="editar_senha" id="editar_senha" placeholder="Senha de 6 digitos" maxlength="6" onfocus="apagaErro()" oninput="apagaErro(this)" class="form-control r-0 light s-12" required>
                                            </div>

                                            <div class="form-group col-sm-6 m-0">
                                                <label for="editar_login" class="col-form-label s-12">Confirma Senha</label>
                                                <input type="password" name="editar_senha-confirma" id="editar_senha-confirma" placeholder="Repita a senha" maxlength="6" oninput="apagaErro(this)" onfocus="apagaErro()" class="form-control r-0 light s-12" required>
                                            </div>

                                        </div>

                                        <hr>
                                        <div class="form-row row clearfix">
                                            <button class="btn btn-primary l-s-1 s-12 text-uppercase" type="submit" id="editar_associado" name="adicionar_associado">
                                                Cadastrar
                                            </button>

                                            <button class="btn btn-success l-s-1 s-12 text-uppercase" id="auto_preencher2" name="auto_preencher2" onclick="autoPreencherDados()" style="margin-left:10px;">
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
