<link rel="stylesheet" href="css/steeper-panel.css">

<div class="modal fade" id="modalNovoCadastrante" tabindex="-1" role="dialog" aria-labelledby="modalNovoCadastrante">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content b-0">
                        <div class="modal-header r-0 bg-primary">
                            <h6 class="modal-title text-white" id="exampleModalLabel">Adicionar Cadastrante</h6>
                            <a href="#" data-dismiss="modal" aria-label="Close" class="paper-nav-toggle paper-nav-white active"><i></i></a>
                        </div>
                        <div class="modal-body no-p no-b">

                        <!-- FORM NOVO ASSOCIADO -->

                        <form role="form" id="novo_associado" name="novo_associado" method="POST" enctype="multipart/form-data" class="form-horizontal needs-validation was-validated" novalidate>
                               
                                                <input type="hidden" name="pasta_cadastrante" id="pasta_cadastrante" value="<?php echo $dados_associado['CRM']; ?>">
                                                <div class="form-row">
                                                    <div class="col-md-12">
                                                        <div class="form-row">
                                                            <div class="form-group col-6 m-0">
                                                                <label for="nome" class="col-form-label s-12">Nome Completo</label>
                                                                <input type="text" name="nome" id="nome" class="form-control r-0 light s-12" value="<?php echo $dados_associado['NOME COMPLETO']; ?>" disabled>

                                                                <input type="hidden" name="confirmacao" id="confirmacao" value="<?php echo $confirmacao; ?>">
                                                            </div>
                                                            <div class="form-group col-6 m-0">
                                                                <label for="email" class="col-form-label s-12"><i class="icon-mail_outline mr-2"></i>Email</label>
                                                                <input type="email" name="email" id="email" value="<?php echo $dados_associado['E-MAIL']; ?>" class="form-control r-0 light s-12" disabled>
                                                            </div>
                                                        </div>

                                                        <div class="form-row">
                                                            <div class="form-group col-6 m-0">
                                                                <label for="crm_completo" class="col-form-label s-12">CRM</label>
                                                                <input type="text" name="crm_completo" id="crm_completo" placeholder="CRM" class="form-control r-0 light s-12" value="<?php echo $dados_associado['CRM']; ?>">

                                                            </div>
                                                            <div class="form-group col-6 m-0">
                                                                <label for="cpf" class="col-form-label s-12"><i class="icon-fingerprint"></i> CPF</label>
                                                                <input type="text" name="cpf" id="cpf" maxlength="14" class="cpf form-control r-0 light s-12" value="<?php echo $dados_associado['CPF']; ?>" disabled>
                                                            </div>
                                                        </div>

                                                        <div class="form-row">
                                                            <div class="form-group col-6 m-0">
                                                                <label class="my-1 mr-2" for="estadocivil">Estado Civil</label>
                                                                <select type="text" name="estadocivil" id="estadocivil" class="custom-select my-1 mr-sm-2 form-control r-0 light s-12" required>
                                                                    <?php
                                                                    if ($dados_associado['ESTADO CIVIL'] != '') {
                                                                        switch ($dados_associado['ESTADO CIVIL']) {
                                                                            case "solteiro":
                                                                                $selected_solteiro = "selected";
                                                                                break;
                                                                            case "casado":
                                                                                $selected_casado = "selected";
                                                                                break;
                                                                            case "divorciado":
                                                                                $selected_divorciado = "selected";
                                                                                break;
                                                                            case "viuvo":
                                                                                $selected_viuvo = "selected";
                                                                            default:
                                                                                echo "Your favorite color is neither red, blue, nor green!";
                                                                        }
                                                                    } else {
                                                                        $selected_estado_civil = 'selected';
                                                                    }
                                                                    ?>
                                                                    <option value="" <?php if (isset($selected_estado_civil)) echo $selected_estado_civil; ?>>Selecione</option>
                                                                    <option value="solteiro" <?php if (isset($selected_solteiro)) echo $selected_solteiro; ?>>Solteiro(a)</option>
                                                                    <option value="casado" <?php if (isset($selected_casado)) echo $selected_casado; ?>>Casado(a)</option>
                                                                    <option value="divorciado" <?php if (isset($selected_divorciado)) echo $selected_divorciado; ?>>Divorciado(a)</option>
                                                                    <option value="viuvo" <?php if (isset($selected_viuvo)) echo $selected_viuvo; ?>>Viuvo(a)</option>
                                                                </select>
                                                                <!-- <div class="invalid-feedback">Please provide a valid city.</div> -->
                                                            </div>
                                                            <div class="form-group col-6 m-0">
                                                                <label class="my-1 mr-2" for="sexo">Sexo</label>
                                                                <select class="custom-select my-1 mr-sm-2 form-control r-0 light s-12" type="text" name="sexo" id="sexo" required="">
                                                                    <?php
                                                                    if ($dados_associado['SEXO'] != '') {
                                                                        switch ($dados_associado['SEXO']) {
                                                                            case "masculino":
                                                                                $selected_masculino = "selected";
                                                                                break;
                                                                            case "feminino":
                                                                                $selected_feminino = "selected";
                                                                                break;
                                                                            default:
                                                                                echo "Your favorite color is neither red, blue, nor green!";
                                                                        }
                                                                    } else {
                                                                        $selected_sexo = 'selected';
                                                                    }
                                                                    ?>
                                                                    <option value="" <?php if (isset($selected_viuvo)) echo $selected_viuvo; ?>>Selecione</option>
                                                                    <option value="masculino" <?php if (isset($selected_masculino)) echo $selected_masculino; ?>>Masculino</option>
                                                                    <option value="feminino" <?php if (isset($selected_feminino)) echo $selected_feminino; ?>>Feminino</option>
                                                                </select>
                                                            </div>

                                                        </div>

                                                    </div>
                                                    <!-- <div class="col-md-3 offset-md-1">
                                                        <input hidden="" id="file" name="file">
                                                        <div class="dropzone dropzone-file-area pt-4 pb-4 dz-clickable" id="fileUpload">
                                                            <div class="dz-default dz-message">
                                                                <span>Drop A passport size image of user</span>
                                                                <div>You can also click to open file browser</div>
                                                            </div>
                                                        </div>
                                                    </div> -->
                                                </div>
                                                <div class="form-row row clearfix">
                                                    <div class="form-group col-sm-3 m-0">
                                                        <label for="data_nascimento" class="col-form-label s-12"><i class="icon-calendar mr-2"></i>Data de Nascimento</label>
                                                        <?php
                                                        if ($dados_associado['DATA DE NASCIMENTO'] != "") {
                                                            $data_nasc = $dados_associado['DATA DE NASCIMENTO'];
                                                            $dn_date = explode("/", $data_nasc);
                                                            $data_nasc = $dn_date[2] . '-' . $dn_date[1] . '-' . $dn_date[0];
                                                        } else {
                                                            $data_nasc = "";
                                                        }
                                                        ?>
                                                        <input type="date" data-time-picker="false" data-format-date="d/m/Y" name="dn" id="data_nascimento" class="colordate form-control r-0 light s-12 datePicker" required="" value="<?php echo $data_nasc; ?>">
                                                    </div>
                                                    <div class="form-group col-sm-3 m-0">
                                                        <label for="rg" class="col-form-label s-12">RG</label>
                                                        <?php
                                                        if ($dados_associado['RG'] != "") {
                                                            $rg_completo = $dados_associado['RG'];
                                                            $rg_array = explode("-", $rg_completo);
                                                            $rg_numero = $rg_array[0];
                                                            $rg_orgao_uf = $rg_array[1];
                                                            $rg_array2 = explode(" ", $rg_orgao_uf);
                                                            $rg_oexp = $rg_array2[0];
                                                            $rg_dexp = $rg_array2[2];
                                                            $rg_array3 = explode("/", $rg_dexp);
                                                            $rg_dexp = $rg_array3[2] . '-' . $rg_array3[1] . '-' . $rg_array3[0];
                                                        } else {
                                                            $rg_numero = "";
                                                        }
                                                        ?>
                                                        <input type="number" name="rg" id="rg" placeholder="Digite seu RG" class="form-control r-0 light s-12" value="<?php if (isset($rg_numero)) echo $rg_numero; ?>" required>
                                                    </div>
                                                    <div class="form-group col-sm-3 m-0">
                                                        <label for="org_exp" class="col-form-label s-12">Órgão Expedidor</label>
                                                        <input type="text" name="org_exp" id="org_exp" placeholder="Exemplo: SSPGO" class="form-control r-0 light s-12" required="" onblur="validaOrgExp()" value="<?php if (isset($rg_oexp)) echo $rg_oexp; ?>">
                                                        <!-- <div class="invalid-feedback">Digite o nome do órgão</div> -->
                                                    </div>
                                                    <div class="form-group col-sm-3 m-0">
                                                        <label for="dexp" class="col-form-label s-12">Data de Expedição</label>
                                                        <input type="date" data-time-picker="false" data-format-date="d/m/Y" name="dexp" id="dexp" class="colordate form-control r-0 light s-12 datePicker" required="" value="<?php if (isset($rg_dexp)) echo $rg_dexp; ?>" onblur="rgCadastro()">

                                                        <input type="hidden" name="rg_cadastro" id="rg_cadastro" value="<?php echo $dados_associado['RG']; ?>">
                                                    </div>
                                                </div>

                                                <div class="form-row row clearfix">
                                                    <div class="form-group col-sm-6 m-0">
                                                        <label for="nome_pai" class="col-form-label s-12">Nome do Pai</label>
                                                        <input type="text" name="nome_pai" id="nome_pai" placeholder="Nome Completo do Pai" class="cpf form-control r-0 light s-12" value="<?php echo $dados_associado['nome_pai']; ?>" onblur="nomePaiUpper()">
                                                    </div>
                                                    <div class="form-group col-sm-6 m-0">
                                                        <label for="nome_mae" class="col-form-label s-12">Nome da Mãe</label>
                                                        <input type="text" name="nome_mae" id="nome_mae" placeholder="Nome Completo da Mãe" class="cpf form-control r-0 light s-12" value="<?php echo $dados_associado['nome_mae']; ?>" onblur="criaFiliacao()" required>

                                                        <input type="hidden" name="filiacao" id="filiacao" value="">
                                                    </div>
                                                </div>

                                                <hr>
                                                <div class="form-row row clearfix">
                                                    <div class="form-group col-md-12 m-0">
                                                        <button class="btn btn-primary nextBtn pull-right" type="button" onclick="selectIdEscala()">Próximo</button>
                                                    </div>
                                                </div>
                                      

                                                <div class="form-row row clearfix">
                                                    <div class="form-group col-sm-4 m-0">
                                                        <label for="nacionalidade" class="col-form-label s-12">Nacionalidade</label>
                                                        <select type="text" name="nacionalidade" id="nacionalidade" class="mr-sm-2 form-control r-0 light s-12" required="">
                                                            <?php
                                                            if ($dados_associado['NACIONALIDADE'] != '') {
                                                                switch ($dados_associado['NACIONALIDADE']) {
                                                                    case "brasileira":
                                                                        $selected_brasileira = "selected";
                                                                        break;
                                                                    case "outra":
                                                                        $selected_outra = "selected";
                                                                        break;
                                                                    default:
                                                                        echo "Your favorite color is neither red, blue, nor green!";
                                                                }
                                                            } else {
                                                                $selected_nacionalidade = 'selected';
                                                            }
                                                            ?>
                                                            <option value="" <?php if (isset($selected_nacionalidade)) echo $selected_nacionalidade; ?>>Selecione</option>
                                                            <option value="brasileira" <?php if (isset($selected_brasileira)) echo $selected_brasileira; ?>>brasileira</option>
                                                            <option value="outra" <?php if (isset($selected_outra)) echo $selected_outra; ?>>outra</option>
                                                        </select>
                                                    </div>

                                                    <div class="form-group col-sm-4 m-0">
                                                        <?php
                                                        if ($dados_associado['NATURALIDADE'] != '') {
                                                            $naturalidade = explode("-", $dados_associado['NATURALIDADE']);
                                                            $natu_cidade =  $naturalidade[0];
                                                            $natu_uf = $naturalidade[1];
                                                        } else {
                                                            $natu_uf = "";
                                                        }

                                                        ?>
                                                        <label for="naturalidade" class="col-form-label s-12">Naturalidade</label>
                                                        <input type="text" name="naturalidade" id="naturalidade" placeholder="Cidade em que nasceu" onblur="natUpper()" class="form-control r-0 light s-12" value="<?php if (isset($natu_cidade)) echo $natu_cidade; ?>" required>
                                                    </div>
                                                    <div class="form-group col-sm-4 m-0">
                                                        <label for="nat_uf" class="my-1 mr-2">UF</label>
                                                        <select type="text" name="nat_uf" id="nat_uf" onchange="criaNaturalidade()" class="mr-sm-2 form-control r-0 light s-12" required>
                                                            <option value="" disabled="" <?php if (isset($natu_uf) && $natu_uf == '') echo "selected"; ?>>Selecione</option>
                                                            <option value="AC" <?php if (isset($natu_uf) && $natu_uf == 'AC') echo "selected"; ?>>AC</option>
                                                            <option value="AL" <?php if (isset($natu_uf) && $natu_uf == 'AL') echo "selected"; ?>>AL</option>
                                                            <option value="AP" <?php if (isset($natu_uf) && $natu_uf == 'AP') echo "selected"; ?>>AP</option>
                                                            <option value="AM" <?php if (isset($natu_uf) && $natu_uf == 'AM') echo "selected"; ?>>AN</option>
                                                            <option value="BA" <?php if (isset($natu_uf) && $natu_uf == 'BA') echo "selected"; ?>>BA</option>
                                                            <option value="CE" <?php if (isset($natu_uf) && $natu_uf == 'CE') echo "selected"; ?>>CE</option>
                                                            <option value="DF" <?php if (isset($natu_uf) && $natu_uf == 'DF') echo "selected"; ?>>DF</option>
                                                            <option value="ES" <?php if (isset($natu_uf) && $natu_uf == 'ES') echo "selected"; ?>>ES</option>
                                                            <option value="GO" <?php if (isset($natu_uf) && $natu_uf == 'GO') echo "selected"; ?>>GO</option>
                                                            <option value="MA" <?php if (isset($natu_uf) && $natu_uf == 'MA') echo "selected"; ?>>MA</option>
                                                            <option value="MT" <?php if (isset($natu_uf) && $natu_uf == 'MT') echo "selected"; ?>>MT</option>
                                                            <option value="MS" <?php if (isset($natu_uf) && $natu_uf == 'MS') echo "selected"; ?>>MS</option>
                                                            <option value="MG" <?php if (isset($natu_uf) && $natu_uf == 'MG') echo "selected"; ?>>MG</option>
                                                            <option value="PR" <?php if (isset($natu_uf) && $natu_uf == 'PR') echo "selected"; ?>>PR</option>
                                                            <option value="PB" <?php if (isset($natu_uf) && $natu_uf == 'PB') echo "selected"; ?>>PB</option>
                                                            <option value="PA" <?php if (isset($natu_uf) && $natu_uf == 'PA') echo "selected"; ?>>PA</option>
                                                            <option value="PE" <?php if (isset($natu_uf) && $natu_uf == 'PE') echo "selected"; ?>>PE</option>
                                                            <option value="PI" <?php if (isset($natu_uf) && $natu_uf == 'PI') echo "selected"; ?>>PI</option>
                                                            <option value="RJ" <?php if (isset($natu_uf) && $natu_uf == 'RJ') echo "selected"; ?>>RJ</option>
                                                            <option value="RN" <?php if (isset($natu_uf) && $natu_uf == 'RN') echo "selected"; ?>>RN</option>
                                                            <option value="RS" <?php if (isset($natu_uf) && $natu_uf == 'RS') echo "selected"; ?>>RS</option>
                                                            <option value="RO" <?php if (isset($natu_uf) && $natu_uf == 'RO') echo "selected"; ?>>RO</option>
                                                            <option value="RR" <?php if (isset($natu_uf) && $natu_uf == 'RR') echo "selected"; ?>>RR</option>
                                                            <option value="SC" <?php if (isset($natu_uf) && $natu_uf == 'SC') echo "selected"; ?>>SC</option>
                                                            <option value="SE" <?php if (isset($natu_uf) && $natu_uf == 'SE') echo "selected"; ?>>SE</option>
                                                            <option value="SP" <?php if (isset($natu_uf) && $natu_uf == 'SP') echo "selected"; ?>>SP</option>
                                                            <option value="TO" <?php if (isset($natu_uf) && $natu_uf == 'TO') echo "selected"; ?>>TO</option>
                                                        </select>

                                                        <input type="hidden" name="nat_cadastro" id="nat_cadastro" value="">
                                                    </div>
                                                </div>


                                                <div class="form-row row clearfix">
                                                    <div class="form-group col-sm-4 m-0">
                                                        <label for="titulo" class="col-form-label s-12">Titulo de Eleitor</label>
                                                        <input type="text" name="titulo" id="titulo" onblur="" class="form-control r-0 light s-12" value="<?php if (isset($dados_associado['TITULO DE ELEITOR'])) echo $dados_associado['TITULO DE ELEITOR']; ?>" required>
                                                    </div>

                                                    <div class="form-group col-sm-4 m-0">
                                                        <label for="pis" class="col-form-label s-12">PIS / PASEP</label>
                                                        <input type="text" name="pis" id="pis" onblur="" class="form-control r-0 light s-12" value="<?php if (isset($dados_associado['PIS'])) echo $dados_associado['PIS']; ?>" required>
                                                    </div>
                                                    <div class="form-group col-sm-4 m-0">
                                                        <label for="telefone" class="col-form-label s-12">Celular</label>
                                                        <input type="text" name="telefone" id="telefone" class="all_phones form-control r-0 light s-12" value="<?php if (isset($dados_associado['TELEFONE'])) echo $dados_associado['TELEFONE']; ?>" required>
                                                    </div>
                                                </div>

                                                <div class="form-row row clearfix">
                                                    <div class="form-group col-sm-4 m-0">
                                                        <label for="cep_cliente" class="label-item-form">CEP</label>
                                                        <input type="text" id="cep_cliente" name="cep_cliente" class="cep form-control r-0 light s-12" size="10" maxlength="10" value="<?php if (isset($dados_associado['cep'])) echo $dados_associado['cep']; ?>" required>
                                                        <!-- <div class="input_icones">
                                                            <a id="buscaCep" class="formIcon" title="Buscar CEP">
                                                                <i class="icon-search2 mr-2" style="font-size:20px; color:#37A661;"></i>
                                                            </a>
                                                        </div> -->
                                                    </div>
                                                    <div class="form-group col-sm-4 m-0">
                                                        <label for="uf_end" class="label-item-form">UF</label>
                                                        <select name="uf_end" id="uf_end" class="mr-sm-2 form-control r-0 light s-12" required>
                                                            <option value="" <?php if ($dados_associado['estado'] == '') echo "selected"; ?>>UF</option>
                                                            <option value="AC" <?php if ($dados_associado['estado'] == 'AC') echo "selected"; ?>>AC - Acre</option>
                                                            <option value="AL" <?php if ($dados_associado['estado'] == 'AL') echo "selected"; ?>>AL - Alagoas</option>
                                                            <option value="AM" <?php if ($dados_associado['estado'] == 'AM') echo "selected"; ?>>AM - Amazonas</option>
                                                            <option value="AP" <?php if ($dados_associado['estado'] == 'AP') echo "selected"; ?>>AP - Amapá</option>
                                                            <option value="BA" <?php if ($dados_associado['estado'] == 'BA') echo "selected"; ?>>BA - Bahia</option>
                                                            <option value="CE" <?php if ($dados_associado['estado'] == 'CE') echo "selected"; ?>>CE - Ceará</option>
                                                            <option value="DF" <?php if ($dados_associado['estado'] == 'DF') echo "selected"; ?>>DF - Distrito Federal</option>
                                                            <option value="ES" <?php if ($dados_associado['estado'] == 'ES') echo "selected"; ?>>ES - Espírito Santo</option>
                                                            <option value="GO" <?php if ($dados_associado['estado'] == 'GO') echo "selected"; ?>>GO - Goiás</option>
                                                            <option value="MA" <?php if ($dados_associado['estado'] == 'MA') echo "selected"; ?>>MA - Maranhão</option>
                                                            <option value="MG" <?php if ($dados_associado['estado'] == 'MG') echo "selected"; ?>>MG - Minas Gerais</option>
                                                            <option value="MS" <?php if ($dados_associado['estado'] == 'MS') echo "selected"; ?>>MS - Mato Grosso do Sul</option>
                                                            <option value="MT" <?php if ($dados_associado['estado'] == 'MT') echo "selected"; ?>>MT - Mato Grosso</option>
                                                            <option value="PA" <?php if ($dados_associado['estado'] == 'PA') echo "selected"; ?>>PA - Pará</option>
                                                            <option value="PB" <?php if ($dados_associado['estado'] == 'PB') echo "selected"; ?>>PB - Paraíba</option>
                                                            <option value="PE" <?php if ($dados_associado['estado'] == 'PE') echo "selected"; ?>>PE - Pernambuco</option>
                                                            <option value="PI" <?php if ($dados_associado['estado'] == 'PI') echo "selected"; ?>>PI - Piauí</option>
                                                            <option value="PR" <?php if ($dados_associado['estado'] == 'PR') echo "selected"; ?>>PR - Paraná</option>
                                                            <option value="RJ" <?php if ($dados_associado['estado'] == 'RJ') echo "selected"; ?>>RJ - Rio de Janeiro</option>
                                                            <option value="RN" <?php if ($dados_associado['estado'] == 'RN') echo "selected"; ?>>RN - Rio Grande do Norte</option>
                                                            <option value="RO" <?php if ($dados_associado['estado'] == 'RO') echo "selected"; ?>>RO - Rondônia</option>
                                                            <option value="RR" <?php if ($dados_associado['estado'] == 'RR') echo "selected"; ?>>RR - Roraima</option>
                                                            <option value="RS" <?php if ($dados_associado['estado'] == 'RS') echo "selected"; ?>>RS - Rio Grande do Sul</option>
                                                            <option value="SC" <?php if ($dados_associado['estado'] == 'SC') echo "selected"; ?>>SC - Santa Catarina</option>
                                                            <option value="SE" <?php if ($dados_associado['estado'] == 'SE') echo "selected"; ?>>SE - Sergipe</option>
                                                            <option value="SP" <?php if ($dados_associado['estado'] == 'SP') echo "selected"; ?>>SP - São Paulo</option>
                                                            <option value="TO" <?php if ($dados_associado['estado'] == 'TO') echo "selected"; ?>>TO - Tocantins</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group col-sm-4 m-0">
                                                        <label for="cidade_end" class="label-item-form">Cidade</label>
                                                        <input type="text" name="cidade_end" id="cidade_end" class="form-control r-0 light s-12" value="<?php if (isset($dados_associado['cidade'])) echo $dados_associado['cidade']; ?>" required>
                                                    </div>
                                                </div>

                                                <div class="form-row row clearfix">
                                                    <div class="form-group col-sm-8 m-0">
                                                        <label for="logradouro_end" class="label-item-form">Logradouro</label>
                                                        <input type="text" name="logradouro_end" id="logradouro_end" class="form-control r-0 light s-12" value="<?php if (isset($dados_associado['logradouro'])) echo $dados_associado['logradouro']; ?>" required>
                                                    </div>
                                                    <div class="form-group col-sm-4 m-0">
                                                        <label for="bairro_end" class="label-item-form">Bairro</label>
                                                        <input type="text" name="bairro_end" id="bairro_end" class="form-control r-0 light s-12" value="<?php if (isset($dados_associado['bairro'])) echo $dados_associado['bairro']; ?>" required>
                                                    </div>
                                                </div>

                                                <div class="form-row row clearfix">
                                                    <div class="form-group col-sm-2 m-0">
                                                        <label for="num_end" class="col-form-label s-12">Número</label>
                                                        <input type="text" name="num_end" id="num_end" class="form-control r-0 light s-12" value="<?php if (isset($dados_associado['numero'])) echo $dados_associado['numero']; ?>">
                                                    </div>
                                                    <div class="form-group col-sm-4 m-0">
                                                        <label for="complemento_end" class="col-form-label s-12">Complemento</label>
                                                        <input type="text" name="complemento_end" id="complemento_end" class="form-control r-0 light s-12" value="<?php if (isset($dados_associado['complemento'])) echo $dados_associado['complemento']; ?>" onchange="criaEndCadastro()">
                                                    </div>
                                                    <div class="form-group col-sm-3 m-0">
                                                        <label for="endereco_nome" class="col-form-label s-12">Endereço no Nome</label>
                                                        <select type="text" name="endereco_nome" id="endereco_nome" onchange="" class="mr-sm-2 form-control r-0 light s-12" required>
                                                            <option value="" <?php if ($dados_associado['ENDEREÇO NO NOME'] == '') echo "selected"; ?>>Selecione</option>
                                                            <option value="SIM" <?php if ($dados_associado['ENDEREÇO NO NOME'] == 'SIM') echo "selected"; ?>>SIM</option>
                                                            <option value="NÃO" <?php if ($dados_associado['ENDEREÇO NO NOME'] == 'NÃO') echo "selected"; ?>>NÃO</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group col-sm-3 m-0">
                                                        <?php
                                                        if ($dados_associado['CRM'] != '') {
                                                            $crm_completo = $dados_associado['CRM'];
                                                            $crm_uf = substr($crm_completo, -2);
                                                            $crm_num = str_replace($crm_uf, "", $crm_completo);
                                                        }
                                                        ?>
                                                        <input type="hidden" id="crm" name="crm" value="<?php if (isset($crm_num)) echo $crm_num; ?>">
                                                        <input type="hidden" id="crm_uf" name="crm_uf" value="<?php if (isset($crm_uf)) echo $crm_uf; ?>">
                                                        <label for="id-escala" class="col-form-label s-12">ID Escala</label>
                                                        <?php if ($dados_associado['ID PLANILHA'] == '') { ?>
                                                            <select type="text" name="id-escala" onclick="" onchange="" id="id-escala" class="mr-sm-2 form-control r-0 light s-12" required>
                                                                <option value="" disabled="" selected="">Escolha uma opção</option>
                                                            </select>
                                                        <?php } else { ?>
                                                            <input type="text" name="id-escala" id="id-escala" value="<?php echo $dados_associado['ID PLANILHA']; ?>" class="form-control r-0 light s-12">
                                                        <?php } ?>
                                                        <input type="hidden" name="endereco" id="endereco" class="form-control r-0 light s-12" value="<?php echo $dados_associado['ENDEREÇO']; ?>" required>
                                                    </div>
                                                </div>

                                                <hr>
                                                <div class="form-row row clearfix">
                                                    <div class="form-group col-md-6 m-0">
                                                        <button class="btn btn-success pull-right" type="button" id="pre-cadastro">Atualizar</button>
                                                    </div>
                                                    <div class="form-group col-md-6 m-0">
                                                        <button class="btn btn-primary nextBtn pull-right btn-proximo2" type="button">Próximo</button>
                                                    </div>
                                                    <!-- <button class="btn btn-warning backBtn pull-left" type="button">Voltar</button> -->

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

