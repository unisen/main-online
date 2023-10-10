<?php session_start();

//include "config.php";
//CLASSE CLIENTE - PDO CRUD MYSQL
require_once '../../DAO/config/database.php';
require_once '../../DAO/controllers/CadastranteDAO.php';

$userid = 0;
if (isset($_POST['userid'])) {
    $userid = $_POST['userid'];
    $params = "WHERE id = $userid"; // . $id_usuario;
    $CadastranteDAO = new CadastranteDAO();
    $Cadastrante = $CadastranteDAO->selectNewCadastrante($params);
    $dados = json_encode($Cadastrante);

    $perfil = $Cadastrante[0];

    $_SESSION['perfil'] = $perfil;


    //print_r($perfil);
?>

<!-- MODAL EDIT Cadastrante - FORM -->
<!-- <form id="editar_cadastrante_update" action="" method="POST" class="form-horizontal"> -->
<div class="card no-b no-r">
    <div class="card-body">
        <input type="hidden" name="pasta_cadastrante" id="pasta_cadastrante" value="<?php echo $perfil->arquivo; ?>">
        <input type="hidden" name="edit_id_cadastrante" id="edit_id_cadastrante" value="<?php echo $perfil->id; ?>">
        <div class="form-row">
            <div class="col-md-12">

                <div class="form-row">
                    <div class="form-group col-sm-2 m-0">
                        <label for="editar_contrato" class="col-form-label s-12">Contrato</label>
                        <input type="text" name="editar_contrato" id="editar_contrato"
                            class="form-control r-0 light s-12" placeholder="Nº do Contrato"
                            value="<?php echo $perfil->contrato; ?>">
                        <div class="invalid-feedback">Insira um número para o contrato</div>
                    </div>

                    <div class="form-group col-sm-2 m-0">
                        <label for="editar_inscricao" class="col-form-label s-12">Inscrição</label>
                        <input type="text" name="editar_inscricao" id="editar_inscricao"
                            class="form-control r-0 light s-12" value="<?php echo $perfil->inscricao; ?>">
                    </div>

                    <div class="form-group col-sm-5 m-0">
                        <label for="editar_empresa" class="col-form-label s-12">Empresa</label>
                        <input type="text" name="editar_empresa" id="editar_empresa" class="form-control r-0 light s-12"
                            value="<?php echo $perfil->empresa; ?>">
                    </div>

                    <div class="form-group col-sm-3 m-0">
                        <!-- <label for="editar_funcao" class="col-form-label s-12">Função</label>
                            <input type="text" name="editar_funcao" id="editar_funcao" class="form-control r-0 light s-12" value="<?php //echo $perfil->funcao; 
                                                                                                                                    ?>"> -->

                        <label class="my-1 mr-2" for="editar_funcao">Função</label>
                        <select type="text" name="editar_funcao" id="editar_funcao"
                            class="custom-select my-1 mr-sm-2 form-control r-0 light s-12">
                            <option value="">Selecione</option>
                            <option value="socio_verificado"
                                <?php if ($perfil->funcao == 'socio_verificado') echo 'selected'; ?>>Sócio Verificado
                            </option>
                            <option value="nao_aprovado"
                                <?php if ($perfil->funcao == 'nao_aprovado') echo 'selected'; ?>>Não Aprovado</option>
                            <option value="docs_pendentes"
                                <?php if ($perfil->funcao == 'docs_pendentes') echo 'selected'; ?>>Docs Pendentes
                            </option>
                            <option value="associado_admin"
                                <?php if ($perfil->funcao == 'associado_admin') echo 'selected'; ?>>Sócio Admin</option>
                            <option value="com_pendencia"
                                <?php if ($perfil->funcao == 'com_pendencia') echo 'selected'; ?>>Sócio com Pendências
                            </option>
                        </select>

                    </div>

                </div>

                <div class="form-row">
                    <div class="form-group col-sm-6 m-0">
                        <label for="editar_nome" class="col-form-label s-12">Nome Completo</label>
                        <input type="text" name="editar_nome" id="editar_nome" class="form-control r-0 light s-12"
                            placeholder="Nome Completo (igual identidade médica)"
                            value="<?php echo $perfil->nome_completo; ?>" required>
                        <div class="invalid-feedback">Insira um nome completo.</div>
                    </div>

                    <div class="form-group col-sm-6 m-0">
                        <label for="editar_email" class="col-form-label s-12">Email</label>
                        <input type="text" name="editar_email" id="editar_email" class="form-control r-0 light s-12"
                            value="<?php echo $perfil->email; ?>" required>
                    </div>

                </div>

                <div class="form-row">
                    <div class="form-group col-sm-6 m-0">
                        <label class="my-1 mr-2" for="editar_estadocivil">Estado Civil</label>
                        <select type="text" name="editar_estadocivil" id="editar_estadocivil"
                            class="custom-select my-1 mr-sm-2 form-control r-0 light s-12" required>
                            <option value="">Selecione</option>
                            <option value="solteiro"
                                <?php if ($perfil->estado_civil == 'solteira' or $perfil->estado_civil == 'solteiro') echo 'selected'; ?>>
                                Solteiro(a)</option>
                            <option value="casado"
                                <?php if ($perfil->estado_civil == 'casada' or $perfil->estado_civil == 'casado') echo 'selected'; ?>>
                                Casado(a)</option>
                            <option value="divorciado"
                                <?php if ($perfil->estado_civil == 'divorciado' or $perfil->estado_civil == 'divorciada') echo 'selected'; ?>>
                                Divorciado(a)</option>
                            <option value="viuvo"
                                <?php if ($perfil->estado_civil == 'viuvo' or $perfil->estado_civil == 'viuva') echo 'selected'; ?>>
                                Viuvo(a)</option>
                        </select>

                    </div>
                    <div class="form-group col-sm-6 m-0">
                        <label class="my-1 mr-2" for="editar_sexo">Sexo</label>
                        <select class="custom-select my-1 mr-sm-2 form-control r-0 light s-12" type="text"
                            name="editar_sexo" onchange=" " id="editar_sexo" required>
                            <option value="">Selecione</option>
                            <option value="masculino" <?php if ($perfil->sexo == 'masculino') echo 'selected'; ?>>
                                Masculino</option>
                            <option value="feminino" <?php if ($perfil->sexo == 'feminino') echo 'selected'; ?>>Feminino
                            </option>
                        </select>
                    </div>

                </div>
                <div class="form-row">
                    <?php
                        if ($perfil->data_nascimento != "") {
                            $data_nasc = $perfil->data_nascimento;
                            $dn_date = explode("/", $data_nasc);
                            $data_nasc = $dn_date[2] . '-' . $dn_date[1] . '-' . $dn_date[0];
                        } else {
                            $data_nasc = "";
                        }
                        ?>
                    <div class="form-group col-sm-6 m-0">
                        <label for="editar_data_nascimento" class="col-form-label s-12"><i
                                class="icon-calendar mr-2"></i>Data de Nascimento</label>
                        <input type="date" data-time-picker="false" data-format-date='d/m/Y'
                            name="editar_data_nascimento" id="editar_data_nascimento"
                            class="colordate form-control r-0 light s-12 datePicker" value="<?php echo $data_nasc; ?>"
                            required>
                    </div>
                    <div class="form-group col-sm-6 m-0">
                        <label for="editar_cpf" class="col-form-label s-12"><i class="icon-fingerprint"></i> CPF</label>
                        <input type="text" name="editar_cpf" id="editar_cpf" placeholder="Digite seu CPF" maxlength="14"
                            oninput="" class="cpf form-control r-0 light s-12" value="<?php echo $perfil->cpf; ?>"
                            required>
                    </div>
                </div>

            </div>

        </div>
        <div class="form-row row clearfix">
            <?php
                $rg_completo = $perfil->rg;
                $rg_array = explode("-", $rg_completo);
                $rg_numero = $rg_array[0];
                $rg_orgao_uf = $rg_array[1];
                $rg_array2 = explode(" ", $rg_orgao_uf);
                $rg_oexp = $rg_array2[0];
                $rg_dexp = $rg_array2[2];
                $rg_array3 = explode("/", $rg_dexp);
                $rg_dexp = $rg_array3[2] . '-' . $rg_array3[1] . '-' . $rg_array3[0];
                ?>
            <div class="form-group col-sm-4 m-0">
                <label for="editar_rg" class="col-form-label s-12">RG</label>
                <input type="text" name="editar_rg" id="editar_rg" placeholder="Digite seu RG" maxlength="20"
                    class="form-control r-0 light s-12" value="<?php if (isset($rg_numero)) echo $rg_numero; ?>"
                    onblur="rgCadastro()" required>
            </div>
            <div class="form-group col-sm-4 m-0">
                <label for="editar_oexp" class="col-form-label s-12">Órgão Expedidor</label>
                <input type="text" name="editar_oexp" id="editar_oexp" placeholder="Digite o nome do órgão"
                    class="cpf form-control r-0 light s-12" value="<?php if (isset($rg_oexp)) echo $rg_oexp; ?>"
                    onblur="validaOrgExp(), rgCadastro()" required>
            </div>
            <div class="form-group col-sm-4 m-0">
                <label for="editar_dexp" class="col-form-label s-12">Data de Expedição</label>
                <input type="date" data-time-picker="false" data-format-date="d/m/Y" name="editar_dexp" id="editar_dexp"
                    class="colordate form-control r-0 light s-12 datePicker" required=""
                    value="<?php if (isset($rg_dexp)) echo $rg_dexp; ?>" onblur="rgCadastro()">

                <input type="hidden" name="rg_cadastro" id="rg_cadastro" value="">
            </div>

        </div>
        <?php

            $filiacao = $perfil->filiacao;
            if ($filiacao != "") {

                $nomes_paimae = explode(" e ", $filiacao);
                if (count($nomes_paimae) > 0) {
                    $nome_pai = $nomes_paimae[0];
                    $nome_mae = $nomes_paimae[1];
                } else {
                    $nome_mae = $nomes_paimae[0];
                    $nome_pai = "";
                }
            } else {
                $nome_mae = $nome_pai = "";
            }

            ?>
        <div class="form-row row clearfix">
            <div class="form-group col-sm-4 m-0">
                <label for="editar_nome_pai" class="col-form-label s-12">Nome do Pai</label>
                <input type="text" name="editar_nome_pai" id="editar_nome_pai" placeholder="Nome Completo"
                    class="form-control r-0 light s-12" value="<?php echo $nome_pai; ?>" onblur="nomePaiUpper()">
            </div>
            <div class="form-group col-sm-4 m-0">
                <label for="editar_nome_mae" class="col-form-label s-12">Nome da Mãe</label>
                <input type="text" name="editar_nome_mae" id="editar_nome_mae" placeholder="Nome Completo"
                    class="cpf form-control r-0 light s-12" value="<?php echo $nome_mae; ?>" onblur="criaFiliacao()"
                    required>
                <input type="hidden" name="editar_filiacao" id="editar_filiacao" value="">
            </div>
            <div class="form-group col-sm-4 m-0">
                <label for="editar_status_new" class="col-form-label s-12">STATUS</label>
                <select type="text" name="editar_status_new" id="editar_status_new" class="form-control r-0 light s-12"
                    required>
                    <option value="" <?php if ($perfil->status == '') echo "selected"; ?>>Selecione</option>
                    <option value="novo" <?php if ($perfil->status == 'novo') echo "selected"; ?>>Novo</option>
                    <option value="confirmado" <?php if ($perfil->status == 'confirmado') echo "selected"; ?>>Email
                        Confirmado</option>
                    <option value="cadastrando" <?php if ($perfil->status == 'cadastrando') echo "selected"; ?>>
                        Cadastrando</option>
                    <option value="processando" <?php if ($perfil->status == 'processando') echo "selected"; ?>>Em
                        Verificação</option>

                </select>
            </div>
        </div>

        <div class="form-row row clearfix">
            <div class="form-group col-sm-4 m-0">
                <label for="editar_nacionalidade" class="my-1 mr-2">Nacionalidade</label>
                <select type="text" name="editar_nacionalidade" onchange=" " id="editar_nacionalidade"
                    class="custom-select my-1 mr-sm-2 form-control r-0 light s-12" required>
                    <?php
                        if ($perfil->nacionalidade != '') {
                            switch ($perfil->nacionalidade) {
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
                    <option value="" <?php if (isset($selected_nacionalidade)) echo $selected_nacionalidade; ?>>
                        Selecione</option>
                    <option value="brasileira" <?php if (isset($selected_brasileira)) echo $selected_brasileira; ?>>
                        brasileira</option>
                    <option value="outra" <?php if (isset($selected_outra)) echo $selected_outra; ?>>outra</option>
                </select>
            </div>

            <?php
                $natuArr = explode("-", $perfil->naturalidade);
                $natu_uf = $natuArr[1];
                ?>
            <div class="form-group col-sm-4 m-0">
                <label for="editar_naturalidade" class="col-form-label s-12">Naturalidade</label>
                <input type="text" name="editar_naturalidade" id="editar_naturalidade"
                    placeholder="Cidade em que nasceu" value="<?php if ($natuArr[0]) echo $natuArr[0]; ?>"
                    class="form-control r-0 light s-12" onblur="natUpper(), criaNaturalidade()" required>
            </div>
            <div class="form-group col-sm-4 m-0">
                <label for="editar_nat_uf" class="my-1 mr-2">UF</label>
                <select type="text" name="editar_nat_uf" id="editar_nat_uf" onchange="criaNaturalidade()" onfocus=""
                    class="custom-select my-1 mr-sm-2 form-control r-0 light s-12" required>
                    <option value="" disabled="" <?php if (isset($natu_uf) && $natu_uf == '') echo "selected"; ?>>
                        Selecione</option>
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
                <input type="hidden" name="editar_nat_cadastro" id="editar_nat_cadastro" value="">
            </div>
        </div>


        <div class="form-row row clearfix">
            <div class="form-group col-sm-4 m-0">
                <label for="editar_titulo" class="col-form-label s-12">Titulo de Eleitor</label>
                <input type="text" name="editar_titulo" id="editar_titulo" class="form-control r-0 light s-12"
                    value="<?php echo $perfil->titulo_eleitor; ?>" required>
            </div>

            <div class="form-group col-sm-4 m-0">
                <label for="editar_pis" class="col-form-label s-12">PIS / PASEP</label>
                <input type="text" name="editar_pis" id="editar_pis" class="form-control r-0 light s-12"
                    value="<?php echo $perfil->pis; ?>" required>
            </div>
            <div class="form-group col-sm-4 m-0">
                <label for="editar_telefone" class="col-form-label s-12">Celular</label>
                <input type="text" name="editar_telefone" id="editar_telefone" maxlength="15"
                    class="form-control r-0 light s-12" value="<?php echo $perfil->telefone; ?>" required>
            </div>
        </div>

        <div class="form-row row clearfix">
            <div class="form-group col-sm-4 m-0">
                <input type="hidden" name="editar_endereco" id="editar_endereco"
                    value="<?php echo $perfil->endereco; ?>">

                <label for="cep_cliente" class="label-item-form">CEP</label>
                <input type="text" id="cep_cliente" name="cep_cliente" class="cep form-control r-0 light s-12" size="10"
                    maxlength="10" value="<?php echo $perfil->cep; ?>" required>
            </div>
            <div class="form-group col-sm-4 m-0">
                <label for="uf_end" class="label-item-form">UF</label>
                <select name="uf_end" id="uf_end" class="mr-sm-2 form-control r-0 light s-12" required>
                    <option value="" <?php if ($perfil->estado == '') echo "selected"; ?>>UF</option>
                    <option value="AC" <?php if ($perfil->estado == 'AC') echo "selected"; ?>>AC - Acre</option>
                    <option value="AL" <?php if ($perfil->estado == 'AL') echo "selected"; ?>>AL - Alagoas</option>
                    <option value="AM" <?php if ($perfil->estado == 'AM') echo "selected"; ?>>AM - Amazonas</option>
                    <option value="AP" <?php if ($perfil->estado == 'AP') echo "selected"; ?>>AP - Amapá</option>
                    <option value="BA" <?php if ($perfil->estado == 'BA') echo "selected"; ?>>BA - Bahia</option>
                    <option value="CE" <?php if ($perfil->estado == 'CE') echo "selected"; ?>>CE - Ceará</option>
                    <option value="DF" <?php if ($perfil->estado == 'DF') echo "selected"; ?>>DF - Distrito Federal
                    </option>
                    <option value="ES" <?php if ($perfil->estado == 'ES') echo "selected"; ?>>ES - Espírito Santo
                    </option>
                    <option value="GO" <?php if ($perfil->estado == 'GO') echo "selected"; ?>>GO - Goiás</option>
                    <option value="MA" <?php if ($perfil->estado == 'MA') echo "selected"; ?>>MA - Maranhão</option>
                    <option value="MG" <?php if ($perfil->estado == 'MG') echo "selected"; ?>>MG - Minas Gerais</option>
                    <option value="MS" <?php if ($perfil->estado == 'MS') echo "selected"; ?>>MS - Mato Grosso do Sul
                    </option>
                    <option value="MT" <?php if ($perfil->estado == 'MT') echo "selected"; ?>>MT - Mato Grosso</option>
                    <option value="PA" <?php if ($perfil->estado == 'PA') echo "selected"; ?>>PA - Pará</option>
                    <option value="PB" <?php if ($perfil->estado == 'PB') echo "selected"; ?>>PB - Paraíba</option>
                    <option value="PE" <?php if ($perfil->estado == 'PE') echo "selected"; ?>>PE - Pernambuco</option>
                    <option value="PI" <?php if ($perfil->estado == 'PI') echo "selected"; ?>>PI - Piauí</option>
                    <option value="PR" <?php if ($perfil->estado == 'PR') echo "selected"; ?>>PR - Paraná</option>
                    <option value="RJ" <?php if ($perfil->estado == 'RJ') echo "selected"; ?>>RJ - Rio de Janeiro
                    </option>
                    <option value="RN" <?php if ($perfil->estado == 'RN') echo "selected"; ?>>RN - Rio Grande do Norte
                    </option>
                    <option value="RO" <?php if ($perfil->estado == 'RO') echo "selected"; ?>>RO - Rondônia</option>
                    <option value="RR" <?php if ($perfil->estado == 'RR') echo "selected"; ?>>RR - Roraima</option>
                    <option value="RS" <?php if ($perfil->estado == 'RS') echo "selected"; ?>>RS - Rio Grande do Sul
                    </option>
                    <option value="SC" <?php if ($perfil->estado == 'SC') echo "selected"; ?>>SC - Santa Catarina
                    </option>
                    <option value="SE" <?php if ($perfil->estado == 'SE') echo "selected"; ?>>SE - Sergipe</option>
                    <option value="SP" <?php if ($perfil->estado == 'SP') echo "selected"; ?>>SP - São Paulo</option>
                    <option value="TO" <?php if ($perfil->estado == 'TO') echo "selected"; ?>>TO - Tocantins</option>
                </select>
            </div>
            <div class="form-group col-sm-4 m-0">
                <label for="cidade_end" class="label-item-form">Cidade</label>
                <input type="text" name="cidade_end" id="cidade_end" class="form-control r-0 light s-12"
                    value="<?php echo $perfil->cidade; ?>" required>
            </div>
        </div>

        <div class="form-row row clearfix">
            <div class="form-group col-sm-4 m-0">
                <label for="logradouro_end" class="label-item-form">Logradouro</label>
                <input type="text" name="logradouro_end" id="logradouro_end" class="form-control r-0 light s-12"
                    value="<?php echo $perfil->logradouro; ?>" required>
            </div>
            <div class="form-group col-sm-3 m-0">
                <label for="bairro_end" class="label-item-form">Bairro</label>
                <input type="text" name="bairro_end" id="bairro_end" class="form-control r-0 light s-12"
                    value="<?php echo $perfil->bairro; ?>" required>
            </div>
            <div class="form-group col-sm-1 m-0">
                <label for="num_end" class="col-form-label s-12">Número</label>
                <input type="text" name="num_end" id="num_end" class="form-control r-0 light s-12"
                    value="<?php echo $perfil->numero; ?>">
            </div>
            <div class="form-group col-sm-4 m-0">
                <label for="complemento_end" class="col-form-label s-12">Complemento</label>
                <input type="text" name="complemento_end" id="complemento_end" class="form-control r-0 light s-12"
                    value="<?php echo $perfil->complemento; ?>" onchange="criaEndCadastro()">
            </div>
        </div>

        <div class="form-row row clearfix">
            <div class="form-group col-sm-2 m-0">
                <label for="endereco_nome" class="col-form-label s-12">Endereço no Nome</label>
                <select type="text" name="endereco_nome" id="endereco_nome" onchange=""
                    class="mr-sm-2 form-control r-0 light s-12" required>
                    <option value="" <?php if ($perfil->endereco_no_nome == '') echo "selected"; ?>>Selecione</option>
                    <option value="SIM" <?php if ($perfil->endereco_no_nome == 'SIM') echo "selected"; ?>>SIM</option>
                    <option value="NÃO" <?php if ($perfil->endereco_no_nome == 'NÃO') echo "selected"; ?>>NÃO</option>
                </select>
            </div>

            <?php
                if ($perfil->crm != '') {
                    $crm_completo = $perfil->crm;
                    $crm_uf = substr($crm_completo, -2);
                    $crm_num = str_replace($crm_uf, "", $crm_completo);
                }
                ?>

            <div class="form-group col-sm-2 m-0">
                <input type="hidden" name="crm_completo" value="<?php echo $crm_completo; ?>">
                <label for="editar_crm" class="col-form-label s-12">CRM <span id="editar_resposta-crm"> </span></label>
                <input type="text" name="editar_crm" id="editar_crm" placeholder="CRM"
                    class="form-control r-0 light s-12" value="<?php echo $crm_num; ?>">
            </div>

            <div class="form-group col-sm-3 m-0">
                <label for="editar_crm_uf" class="my-1 mr-2">UF CRM</label>
                <select type="text" name="editar_crm_uf" id="editar_crm_uf" placeholder="UF do CRM"
                    class="custom-select my-1 mr-sm-2 form-control r-0 light s-12" required>
                    <option value="" <?php if ($crm_uf == '') echo "selected"; ?>>UF</option>
                    <option value="AC" <?php if ($crm_uf == 'AC') echo "selected"; ?>>AC - Acre</option>
                    <option value="AL" <?php if ($crm_uf == 'AL') echo "selected"; ?>>AL - Alagoas</option>
                    <option value="AM" <?php if ($crm_uf == 'AM') echo "selected"; ?>>AM - Amazonas</option>
                    <option value="AP" <?php if ($crm_uf == 'AP') echo "selected"; ?>>AP - Amapá</option>
                    <option value="BA" <?php if ($crm_uf == 'BA') echo "selected"; ?>>BA - Bahia</option>
                    <option value="CE" <?php if ($crm_uf == 'CE') echo "selected"; ?>>CE - Ceará</option>
                    <option value="DF" <?php if ($crm_uf == 'DF') echo "selected"; ?>>DF - Distrito Federal</option>
                    <option value="ES" <?php if ($crm_uf == 'ES') echo "selected"; ?>>ES - Espírito Santo</option>
                    <option value="GO" <?php if ($crm_uf == 'GO') echo "selected"; ?>>GO - Goiás</option>
                    <option value="MA" <?php if ($crm_uf == 'MA') echo "selected"; ?>>MA - Maranhão</option>
                    <option value="MG" <?php if ($crm_uf == 'MG') echo "selected"; ?>>MG - Minas Gerais</option>
                    <option value="MS" <?php if ($crm_uf == 'MS') echo "selected"; ?>>MS - Mato Grosso do Sul</option>
                    <option value="MT" <?php if ($crm_uf == 'MT') echo "selected"; ?>>MT - Mato Grosso</option>
                    <option value="PA" <?php if ($crm_uf == 'PA') echo "selected"; ?>>PA - Pará</option>
                    <option value="PB" <?php if ($crm_uf == 'PB') echo "selected"; ?>>PB - Paraíba</option>
                    <option value="PE" <?php if ($crm_uf == 'PE') echo "selected"; ?>>PE - Pernambuco</option>
                    <option value="PI" <?php if ($crm_uf == 'PI') echo "selected"; ?>>PI - Piauí</option>
                    <option value="PR" <?php if ($crm_uf == 'PR') echo "selected"; ?>>PR - Paraná</option>
                    <option value="RJ" <?php if ($crm_uf == 'RJ') echo "selected"; ?>>RJ - Rio de Janeiro</option>
                    <option value="RN" <?php if ($crm_uf == 'RN') echo "selected"; ?>>RN - Rio Grande do Norte</option>
                    <option value="RO" <?php if ($crm_uf == 'RO') echo "selected"; ?>>RO - Rondônia</option>
                    <option value="RR" <?php if ($crm_uf == 'RR') echo "selected"; ?>>RR - Roraima</option>
                    <option value="RS" <?php if ($crm_uf == 'RS') echo "selected"; ?>>RS - Rio Grande do Sul</option>
                    <option value="SC" <?php if ($crm_uf == 'SC') echo "selected"; ?>>SC - Santa Catarina</option>
                    <option value="SE" <?php if ($crm_uf == 'SE') echo "selected"; ?>>SE - Sergipe</option>
                    <option value="SP" <?php if ($crm_uf == 'SP') echo "selected"; ?>>SP - São Paulo</option>
                    <option value="TO" <?php if ($crm_uf == 'TO') echo "selected"; ?>>TO - Tocantins</option>
                </select>
            </div>

            <div class="form-group col-sm-5 m-0">

                <input type="hidden" id="crm" name="crm" value="<?php if (isset($crm_num)) echo $crm_num; ?>">
                <input type="hidden" id="crm_uf" name="crm_uf" value="<?php if (isset($crm_uf)) echo $crm_uf; ?>">
                <label for="editar_id_escala" class="col-form-label s-12">ID Escala</label>

                <?php if ($perfil->id_planilha != '') { ?>
                <select type="text" name="editar_id_escala" id="editar_id_escala" class="form-control r-0 light s-12"
                    required>
                    <!-- <option value="" disabled="" selected="">Escolha uma opção</option>   -->
                    <?php
                            $nomes = $perfil->nome_completo;
                            $lnomes = explode(" ", $nomes);

                            for ($i = 1; $i < count($lnomes); $i++) {
                                $id_escala_edit = $lnomes[0] . ' ' . $lnomes[$i] . ' (' . $crm_num . ')';
                                //opt1 = opt[0] + ' ' + opt[i] + ' (' + crm.value + uf.value + ')';
                                if ($perfil->id_planilha == $id_escala_edit) {
                                    echo "<option value='$id_escala_edit' selected>$id_escala_edit</option>";
                                } else {
                                    echo "<option value='$id_escala_edit'>$id_escala_edit</option>";
                                }
                            }
                            ?>
                </select>
                <?php } else { ?>
                <input type="text" name="editar_id_escala" id="editar_id_escala"
                    value="<?php echo $perfil->id_planilha; ?>" class="form-control r-0 light s-12">
                <?php } ?>
            </div>


        </div>

        <!-- <div class="form-row row clearfix">
                    <div class="form-group col-sm-6 m-0">
                        <label for="editar_senha" class="col-form-label s-12">Senha</label>
                        <input type="password" name="editar_senha" id="editar_senha" placeholder="Senha de 6 digitos" maxlength="6" onfocus="" oninput="" class="form-control r-0 light s-12" disabled>
                    </div>
                    <div class="form-group col-sm-6 m-0">
                        <label for="editar_senha_confirma" class="col-form-label s-12">Confirma Senha</label>
                        <input type="password" name="editar_senha_confirma" id="editar_senha_confirma" placeholder="Repita a senha" maxlength="6" oninput="" onfocus="" class="form-control r-0 light s-12" disabled>
                    </div>

                </div> -->

        <hr>
        <div class="form-row row clearfix">

        <?php 
             $diretorio = "cadastrantes";
             // $perfil->crm - cadastrantes/99999GO
             $pasta_cadastrante = $perfil->crm;
                 
             $path = "../../register/$diretorio/" . $pasta_cadastrante . "/";                    
           
             $path_docs = "../../register/$diretorio/" . $pasta_cadastrante;


             $dir_contratos = "../../libs/pdf_contratos/reports/";

             $contrato_file = $dir_contratos . $perfil->id . '-' . $perfil->nome_completo . '.pdf';    
        ?>

            <button class="btn btn-primary pull-right atualizar_cadastrante" type="button" id="atualizar_cadastrante"
                onclick="atualiza_cadastro()">Salvar</button>&nbsp;
            <button class="btn btn-info upload_documentos" type="button" id="ver_documentos_cadastrante"
                name="ver_documentos_cadastrante" data-target="#modalUploadDocumentos" data-toggle="modal"
                onclick="form_uploads_documentos('<?php echo $perfil->id; ?>')">Ver Arquivos</button>&nbsp;
            <button class="btn btn-warning resend_confirmacao" type="button" id="reenviar_confirmacao"
                name="reenviar_confirmacao"
                onclick="sendEmail('<?php echo $perfil->id; ?>', '<?php echo $perfil->nome_completo; ?>','<?php echo $perfil->nome_completo; ?>','<?php echo $perfil->email; ?>','<?php echo $perfil->crm; ?>', '<?php echo $perfil->cpf; ?>','Confirmação Reenviada no Email!')"><i
                    class="icon icon-send-o indigo-text s-18"></i>Confirmação</button>&nbsp;
            <button class="btn btn-info criar_contrato_cadastrante" type="button" id="criar_contrato_cadastrante"
                name="criar_contrato_cadastrante"
                onclick="cria_contrato_cadastrante('<?php echo $perfil->id; ?>','<?php echo $contrato_file; ?>')">Gerar Contrato</button>

            <?php                    

                    if (file_exists($contrato_file)) {
                        echo "&nbsp;<button class='btn btn-info' type='button' onclick='downloadURI(\"$contrato_file\",\"$perfil->id-$perfil->nome_completo\");'>Ver Contrato</button>";
                        
                        //echo "&nbsp;<button class='btn btn-info' type='button' onclick='alert(\"Ok\")'>Ver Contrato</button>";
                    }

                    /* if (is_dir($path)) {

                        echo "<button class='btn btn-info' type='button'>Ver Contrato</button>";
                       
                        //echo "<div class='toast' data-title='Pasta já existe' data-message='Pasta Cadastrante N° $pasta_cadastrante' data-type='error'></div>";
                        //echo json_encode('erro');
                    } else {
                        mkdir($path, 0777, true);

                        echo "<button class='btn btn-info' type='button'>Ver Contrato</button>";
                        //echo "<div class='toast' data-title='Pasta Criada' data-message='Pasta Cadastrante N° $pasta_cadastrante' data-type='success'></div>";
                        //echo json_encode('sucesso');
                    } */
                ?>

            <!-- <button type="button" class="btn btn-info">
                        <a href="#modalEditarDadosBancarios" id="ver_dados_bancarios" data-target="#modalEditarDadosBancarios" data-toggle="modal" class="dados_bancarios_cadastrante" data-id=""><i class="icon-money text-black"></i></a>
                    </button> -->

            <span class="badge badge-success" id="alerta-ok"
                style="padding: 10px !important;margin-left:10px; display:none; font-weight:bold;"></span>

            <span class="badge badge-danger" id="alerta-erro"
                style="padding: 10px !important;margin-left:10px; display:none; font-weight:bold;"></span>

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

<script>
function downloadURI(uri, name) 
{
    var link = document.createElement("a");
    link.download = name;
    link.href = uri;
    link.click();
}

function cria_contrato_cadastrante(userid, contrato) {
    $.ajax({
        method: "POST",
        url: "../../libs/pdf_contratos/criar.php",
        data: {
            userid: userid
        },
        dataType: "text",
        success: function(strMessage) {
            $("#message").text(strMessage);
            strMessage = $.trim(strMessage);
            let resultado = strMessage.match("Contrato Criado");
            //alert(resultado);

            if ($.trim(resultado) == "Contrato Criado") {
                Swal.fire({
                    title: '',
                    text: 'Contrato Criado com Sucesso',
                    icon: 'success',
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'OK'
                }).then((result) => {
                    if (result.isConfirmed) {
                        downloadURI(contrato,'unisen-contrato');
                        //location.reload();
                        //$('#enviar_mensagem').modal('toggle');
                        //$('#enviar_mensagem').find('input').val('');

                    }

                })

            } else {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: strMessage,

                });

            }
        }
    });
}


function sendEmail(id, nome, tomador, email, crm, cpf, msgResposta) {

    // msgResposta = "Email enviado com sucesso!"

    $.ajax({
        method: "POST",
        url: "../../includes/mail/script.php",
        data: {
            id: id,
            nome: nome,
            tomador: tomador,
            email: email,
            crm: crm,
            cpf: cpf
        },
        dataType: "text",
        success: function(strMessage) {
            $("#message").text(strMessage);
            if ($.trim(strMessage) == 'sucesso') {
                Swal.fire({
                    title: '',
                    text: msgResposta,
                    icon: 'success',
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'OK'
                }).then((result) => {
                    if (result.isConfirmed) {
                        //location.reload();
                        //$('#enviar_mensagem').modal('toggle');
                        //$('#enviar_mensagem').find('input').val('');

                    }

                })

            } else {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: strMessage,

                });

            }
        }
    });
}
</script>

<?php //include_once "../../includes/mail/send-email.php"; 
    ?>
<!-- </form> -->


<?php }



exit;