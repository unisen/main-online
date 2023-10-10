<link rel="stylesheet" href="css/steeper-panel.css">

<div class="modal fade" id="modalNovoAssociado" tabindex="-1" role="dialog" aria-labelledby="modalNovoAssociado">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content b-0">
                        <div class="modal-header r-0 bg-primary">
                            <h6 class="modal-title text-white" id="exampleModalLabel">Adicionar Associado</h6>
                            <a href="#" data-dismiss="modal" aria-label="Close" class="paper-nav-toggle paper-nav-white active"><i></i></a>
                        </div>
                        <div class="modal-body no-p no-b">

                        <!-- FORM NOVO ASSOCIADO -->

                        <div class="stepwizard">
                        <div class="stepwizard-row setup-panel">
                            <div class="stepwizard-step col-xs-3">
                                <a href="#step-1" type="button" class="btn btn-success btn-circle">1</a>
                                <p><small>Cadastro de Dados</small></p>
                            </div>
                            <div class="stepwizard-step col-xs-3">
                                <a href="#step-2" type="button" class="btn btn-default btn-circle" disabled="disabled">2</a>
                                <p><small>Cadastro do Associado</small></p>
                            </div>
                            <div class="stepwizard-step col-xs-3">
                                <a href="#step-3" type="button" class="btn btn-default btn-circle" disabled="disabled">3</a>
                                <p><small>Upload de Documentos</small></p>
                            </div>
                            <div class="stepwizard-step col-xs-3">
                                <a href="#step-4" type="button" class="btn btn-default btn-circle" disabled="disabled">4</a>
                                <p><small>Finalização</small></p>
                            </div>
                        </div>
                    </div>

                    <form role="form" id="novo_associado" name="novo_associado" method="POST" class="form-horizontal needs-validation" autocomplete="true">
                        <div class="panel panel-primary setup-content" id="step-1">
                            <div class="panel-heading">
                                <h3 class="panel-title">Cadastrar Dados do Associado</h3>
                            </div>
                            <div class="panel-body">
                                <!-- <form id="novo_associado" name="novo_associado" method="POST" class="form-horizontal needs-validation" autocomplete="true"> -->
                                <div class="card no-b no-r">
                                    <div class="card-body">

                                        <div class="form-row">
                                            <div class="col-md-8">
                                                <div class="form-group m-0">
                                                    <label for="nome" class="col-form-label s-12">Nome Completo</label>
                                                    <input type="text" name="nome" id="nome" class="form-control r-0 light s-12" placeholder="Nome Completo (igual identidade médica)" onblur="" oninput="" required>
                                                    <div class="invalid-feedback">Insira um nome completo.</div>
                                                </div>
                                                <div class="form-row">
                                                    <div class="form-group col-6 m-0">
                                                        <label class="my-1 mr-2" for="id-estadocivil">Estado Civil</label>
                                                        <select type="text" name="estadocivil" onchange="apagaErro(this)" id="id-estadocivil" class="custom-select my-1 mr-sm-2 form-control r-0 light s-12" required>
                                                            <option value="" selected="">Selecione</option>
                                                            <option value="solteiro">Solteiro(a)</option>
                                                            <option value="casado">Casado(a)</option>
                                                            <option value="divorciado">Divorciado(a)</option>
                                                            <option value="viuvo">Viuvo(a)</option>
                                                        </select>

                                                    </div>
                                                    <div class="form-group col-6 m-0">
                                                        <label class="my-1 mr-2" for="sexo">Sexo</label>
                                                        <select class="custom-select my-1 mr-sm-2 form-control r-0 light s-12" type="text" name="sexo" onchange="apagaErro(this)" id="sexo" required>
                                                            <option value="" selected="">Selecione</option>
                                                            <option value="masculino">Masculino</option>
                                                            <option value="feminino">Feminino</option>
                                                        </select>
                                                    </div>

                                                </div>
                                                <div class="form-row">
                                                    <div class="form-group col-6 m-0">
                                                        <label for="data_nascimento" class="col-form-label s-12"><i class="icon-calendar mr-2"></i>Data de Nascimento</label>
                                                        <input type="date" data-time-picker="false" data-format-date='d/m/Y' name="dn" id="data_nascimento" onchange="apagaErro(this)" class="colordate form-control r-0 light s-12 datePicker" required>
                                                    </div>
                                                    <div class="form-group col-6 m-0">
                                                        <label for="cpf" class="col-form-label s-12"><i class="icon-fingerprint"></i> CPF</label>
                                                        <input type="text" name="cpf" id="cpf" placeholder="Digite seu CPF" maxlength="14" oninput="cpfRegEx(this)" class="cpf form-control r-0 light s-12" required>
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="col-md-3 offset-md-1">
                                                <input hidden id="file" name="file" />
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
                                                <label for="rg" class="col-form-label s-12">RG</label>
                                                <input type="text" name="rg" id="rg" placeholder="Digite seu RG" maxlength="20" oninput="ChangeRg(this), apagaErro(this)" onfocus="apagaErro()" class="cpf form-control r-0 light s-12" required>
                                            </div>
                                            <div class="form-group col-sm-3 m-0">
                                                <label for="oepx" class="col-form-label s-12">Órgão Expedidor</label>
                                                <input type="text" name="oexp" id="oexp" placeholder="Digite o nome do órgão" oninput="apagaErro(this)" class="cpf form-control r-0 light s-12" required>
                                            </div>

                                            <div class="form-group col-sm-2 m-0">
                                                <label for="rg_uf" class="my-1 mr-2">UF</label>
                                                <select type="text" name="rg_uf" id="rg_uf" placeholder="UF do RG" onchange="apagaErro(this)" onfocus="apagaErro()" class="custom-select my-1 mr-sm-2 form-control r-0 light s-12" required>
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
                                                <input type="date" data-time-picker="false" data-format-date='d/m/Y' name="dexp" id="dexp" onchange="apagaErro(this)" class="colordate form-control r-0 light s-12 datePicker" required>
                                            </div>

                                        </div>

           
                                        <hr>

                                    </div>
                                </div>


                                <div class="form-row row clearfix">
                                    &nbsp;&nbsp;
                                    <button class="btn btn-success l-s-1 s-12 text-uppercase" id="auto_preencher" name="auto_preencher" onclick="autoPreencherDados()">
                                        AutoPreencher
                                    </button>
                                    <span class="badge badge-success" id="alerta-ok" style="padding: 10px !important;margin-left:10px; display:none; font-weight:bold;"></span>

                                    <span class="badge badge-danger" id="alerta-erro" style="padding: 10px !important;margin-left:10px; display:none; font-weight:bold;"></span>

                                    &nbsp;&nbsp;<button class="btn btn-primary nextBtn pull-right" type="button">Próximo</button>
                                </div>

                            </div>
                        </div>

                        <div class="panel panel-primary setup-content" id="step-2">
                            <div class="panel-heading">
                                <h3 class="panel-title">Cadastro de Associado</h3>
                            </div>
                            <div class="panel-body">
                                <div class="card no-b no-r">
                                    <div class="card-body">

                                        <div class="form-row row clearfix">
                                            <div class="form-group col-sm-6 m-0">
                                                <label for="nome_pai" class="col-form-label s-12">Nome do Pai</label>
                                                <input type="text" name="nome_pai" id="nome_pai" placeholder="Nome Completo" onblur="optChangeIdEscala()" oninput="optChangeIdEscala(), apagaErro(this)" class="cpf form-control r-0 light s-12" required>
                                            </div>
                                            <div class="form-group col-sm-6 m-0">
                                                <label for="nome_mae" class="col-form-label s-12">Nome da Mãe</label>
                                                <input type="text" name="nome_mae" id="nome_mae" placeholder="Nome Completo" onblur="optChangeIdEscala()" oninput="optChangeIdEscala(), apagaErro(this)" class="cpf form-control r-0 light s-12" required>
                                            </div>
                                        </div>

                                        <div class="form-row row clearfix">
                                            <div class="form-group col-sm-4 m-0">
                                                <label for="nacionalidade" class="my-1 mr-2">Nacionalidade</label>
                                                <select type="text" name="nacionalidade" onchange="apagaErro(this)" id="nacionalidade" class="custom-select my-1 mr-sm-2 form-control r-0 light s-12" required>
                                                    <option value="" selected="">Selecione</option>
                                                    <option value="brasileira">brasileira</option>
                                                    <option value="outra">outra</option>
                                                </select>
                                            </div>

                                            <div class="form-group col-sm-4 m-0">
                                                <label for="naturalidade" class="col-form-label s-12">Naturalidade</label>
                                                <input type="text" name="naturalidade" id="naturalidade" placeholder="Cidade em que nasceu" oninput="apagaErro(this)" class="form-control r-0 light s-12" required>
                                            </div>
                                            <div class="form-group col-sm-4 m-0">
                                                <label for="nat_uf" class="my-1 mr-2">UF</label>
                                                <select type="text" name="nat_uf" id="nat_uf" onchange="apagaErro(this)" onfocus="apagaErro()" class="custom-select my-1 mr-sm-2 form-control r-0 light s-12" required>
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
                                                <label for="titulo" class="col-form-label s-12">Titulo de Eleitor</label>
                                                <input type="text" name="titulo" id="titulo" onblur="optChangeIdEscala()" oninput="optChangeIdEscala(), apagaErro(this)" class="form-control r-0 light s-12" required>
                                            </div>

                                            <div class="form-group col-sm-4 m-0">
                                                <label for="pis" class="col-form-label s-12">PIS / PASEP</label>
                                                <input type="text" name="pis" id="pis" onblur="optChangeIdEscala()" oninput="optChangeIdEscala(), apagaErro(this)" class="form-control r-0 light s-12" required>
                                            </div>
                                            <div class="form-group col-sm-4 m-0">
                                                <label for="telefone" class="col-form-label s-12">Celular</label>
                                                <input type="text" name="telefone" id="telefone" onblur="optChangeIdEscala()" maxlength="15" oninput="optChangeIdEscala(), apagaErro(this), celRegEx(this)" class="form-control r-0 light s-12" required>
                                            </div>
                                        </div>


                                        <div class="form-row row clearfix">
                                            <div class="form-group col-sm-6 m-0">
                                                <label for="endereco" class="col-form-label s-12">Endereço</label>
                                                <input type="text" name="endereco" id="endereco" onblur="optChangeIdEscala()" oninput="optChangeIdEscala(), apagaErro(this)" class="form-control r-0 light s-12" required>
                                            </div>

                                            <div class="form-group col-sm-2 m-0">
                                                <label for="endereco_nome" class="my-1 mr-2">Endereço no Nome</label>
                                                <select type="text" name="endereco_nome" onchange="apagaErro(this)" id="endereco_nome" class="custom-select my-1 mr-sm-2 form-control r-0 light s-12" required>
                                                    <option value="" selected="">Selecione</option>
                                                    <option value="SIM">SIM</option>
                                                    <option value="NÃO">NÃO</option>
                                                </select>
                                            </div>
                                            <div class="form-group col-sm-4 m-0">
                                                <label for="email" class="col-form-label s-12">Email <span id="resposta-email" class="badge badge-success r-3"></span></label>
                                                <input type="email" name="email" id="email" onblur="verificaEmail()" placeholder="E-mail" class="form-control r-0 light s-12" value="" required>
                                            </div>
                                        </div>

                                        <div class="form-row row clearfix">
                                            <div class="form-group col-sm-6 m-0">
                                                <label for="crm" class="col-form-label s-12">CRM <span id="resposta-crm"> </span></label>
                                                <input type="text" name="crm" id="crm" placeholder="CRM" oninput="" onblur="verificaCRM()" onfocus="apagaErro()" class="form-control r-0 light s-12" required>
                                            </div>

                                            <div class="form-group col-sm-2 m-0">
                                                <label for="crm_uf" class="my-1 mr-2">UF CRM</label>
                                                <select type="text" name="crm_uf" id="crm_uf" placeholder="UF do CRM" onchange="selectIdEscala()" onfocus="apagaErro()" class="custom-select my-1 mr-sm-2 form-control r-0 light s-12" required>
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
                                                <label for="id-escala" class="my-1 mr-2">ID Escala</label>
                                                <select type="text" name="id-escala" onclick="" onchange="" id="id-escala" class="custom-select my-1 mr-sm-2 form-control r-0 light s-12" required>
                                                    <option value="" disabled="" selected="">Escolha uma opção</option>
                                                </select>
                                            </div>

                                        </div>

                                        <div class="form-row row clearfix">

                                            <div class="form-group col-sm-6 m-0">
                                                <label for="senha" class="col-form-label s-12">Senha</label>
                                                <input type="password" name="senha" id="senha" placeholder="Senha de 6 digitos" maxlength="6" onfocus="apagaErro()" oninput="apagaErro(this)" class="form-control r-0 light s-12" required>
                                            </div>

                                            <div class="form-group col-sm-6 m-0">
                                                <label for="login" class="col-form-label s-12">Confirma Senha</label>
                                                <input type="password" name="senha-confirma" id="senha-confirma" placeholder="Repita a senha" maxlength="6" oninput="apagaErro(this)" onfocus="apagaErro()" class="form-control r-0 light s-12" required>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <div class="form-row row clearfix">
                                &nbsp;&nbsp;
                                    <!-- <button class="btn btn-warning backBtn pull-left" type="button">Voltar</button> -->&nbsp;&nbsp;
                                <button class="btn btn-primary nextBtn pull-right" type="button">Próximo</button>
                            </div>
                            </div>
                        </div>

                        <div class="panel panel-primary setup-content" id="step-3">
                            <div class="panel-heading">
                                <h3 class="panel-title">Upload de Documentos</h3>
                            </div>
                            <div class="panel-body">

                                <div class="form-group">
                                    <label class="control-label">Company Name</label>
                                    <input maxlength="200" type="text" required="required" class="form-control" placeholder="Enter Company Name" />
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Company Address</label>
                                    <input maxlength="200" type="text" required="required" class="form-control" placeholder="Enter Company Address" />
                                </div>

                                <button class="btn btn-primary nextBtn pull-right" type="button">Next</button>
                            </div>
                        </div>

                        <div class="panel panel-primary setup-content" id="step-4">
                            <div class="panel-heading">
                                <h3 class="panel-title">Finalização</h3>
                            </div>
                            <div class="panel-body">
                                <div class="form-group">
                                    <label class="control-label">Company Name</label>
                                    <input maxlength="200" type="text" required="required" class="form-control" placeholder="Enter Company Name" />
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Company Address</label>
                                    <input maxlength="200" type="text" required="required" class="form-control" placeholder="Enter Company Address" />
                                </div>
                                <button class="btn btn-success pull-right" type="submit" id="adicionar_associado" name="adicionar_associado">Cadastrar!</button>
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

            <script src="js/steeper-panel.js"></script>
            <script src="js/functions.js"></script>

