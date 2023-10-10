<?php session_start(); ?>
<!DOCTYPE html>
<html lang="pt-br">
<?php


if (isset($_SESSION["url_aplicativo"])) {
    $unisen_url = $_SESSION["url_aplicativo"];
}

$path =  $_SERVER['DOCUMENT_ROOT'];
$path .= $unisen_url . 'app/config/functions/autenticaUsuario.php';
include_once($path);

?>
<?php

$path =  $_SERVER['DOCUMENT_ROOT'];
$path .= $unisen_url . 'app/includes/UI/header.php';
include_once($path);

?>

<link rel="stylesheet" href="css/unisen_styles.css">

<link rel="stylesheet" href="css/steeper-panel.css">

<body class="light">
    <!-- Pre loader -->
    <div id="loader" class="loader">
        <div class="plane-container">
            <div class="preloader-wrapper big active">
                            <div class="spinner-layer spinner-blue">
                                <div class="circle-clipper left">
                                    <div class="circle"></div>
                                </div><div class="gap-patch">
                                <div class="circle"></div>
                            </div><div class="circle-clipper right">
                                <div class="circle"></div>
                            </div>
                            </div>

                            <div class="spinner-layer spinner-red">
                                <div class="circle-clipper left">
                                    <div class="circle"></div>
                                </div><div class="gap-patch">
                                <div class="circle"></div>
                            </div><div class="circle-clipper right">
                                <div class="circle"></div>
                            </div>
                            </div>

                            <div class="spinner-layer spinner-yellow">
                                <div class="circle-clipper left">
                                    <div class="circle"></div>
                                </div><div class="gap-patch">
                                <div class="circle"></div>
                            </div><div class="circle-clipper right">
                                <div class="circle"></div>
                            </div>
                            </div>

                            <div class="spinner-layer spinner-green">
                                <div class="circle-clipper left">
                                    <div class="circle"></div>
                                </div><div class="gap-patch">
                                <div class="circle"></div>
                            </div><div class="circle-clipper right">
                                <div class="circle"></div>
                            </div>
                            </div>
                        </div>
        </div>
    </div>
    <div id="app">

        <script>
            /*
                         *  Add sidebar classes (sidebar-mini sidebar-collapse sidebar-expanded-on-hover) in body tag
                         *  you can remove this script tag and add classes directly to body
                         *  this is only for demo
                         .fab-top {
                                top: 505px;
                            }
                            .fab-right-bottom {
                                right: 18px;
                                bottom: -16px;
                                z-index: 1;
                            }
                         */
            //document.body.className += ' sidebar-mini' + ' sidebar-collapse' + ' sidebar-expanded-on-hover' + ' sidebar-top-offset';
        </script>
        <?php
        $path =  $_SERVER['DOCUMENT_ROOT'];
        $path .= $unisen_url . 'app/includes/UI/sidebar.php';
        include_once($path);
        ?>
        <div class="has-sidebar-left">
            <div class="pos-f-t">
                <div class="collapse" id="navbarToggleExternalContent">
                    <div class="bg-dark pt-2 pb-2 pl-4 pr-2">
                        <div class="search-bar">
                            <input class="transparent s-24 text-white b-0 font-weight-lighter w-128 height-50" type="text" placeholder="start typing...">
                        </div>
                        <a href="#" data-toggle="collapse" data-target="#navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation" class="paper-nav-toggle paper-nav-white active "><i></i></a>
                    </div>
                </div>
            </div>
            <!-- NavBar Sticky -->
            <?php
            $path =  $_SERVER['DOCUMENT_ROOT'];
            $path .= $unisen_url . 'app/includes/UI/sidebar-left.php';
            include_once($path);
            ?>

            <!-- Main Content -->
            <div class="page has-sidebar-left height-full">

                <header class="my-3">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col">
                                <h1 class="s-24">
                                    <i class="icon-pages"></i>
                                    Blank <span class="s-14">Get Started</span>
                                </h1>
                            </div>
                        </div>
                    </div>
                </header>
                <div class="container-fluid my-3">
                    <p>You are the boss make something great.</p>
                    <button class="btn btn-primary" onclick="executaToast()">VER TOAST</button>
                    <button class="btn btn-sucess" onclick="executaToast2()">VER TOAST 2</button>

                    <div class="toast align-items-center text-white bg-primary border-0" role="alert" aria-live="assertive" aria-atomic="true" id="testetoast">
                        <div class="d-flex">
                            <div class="toast-body">
                                Hello, world! This is a toast message.
                            </div>
                            <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"> </button>
                        </div>
                    </div>

                    <div class="toast toast-action ml-auto" id="semEmail" role="alert" aria-live="assertive" aria-atomic="true" data-delay="2000">
                        <div class="toast-header">
                            <strong class="mr-auto"><i class="fa fa-grav"></i>Ops</strong>
                            <small style="color: red;"><i class="fas fa-exclamation-triangle"></i></small>
                            <button type="button" class="ml-2 mb-1 close" data-dismiss="toast">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="toast-body">
                            <div>Cliente cadastrado sem nenhum Email!</div>
                        </div>
                    </div>

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
                                                    <input type="text" name="nome" id="nome" class="form-control r-0 light s-12" placeholder="Nome Completo (igual identidade médica)" onblur="optChangeIdEscala()" oninput="optChangeIdEscala(), apagaErro(this)" required>
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



                                        <div class="form-row row clearfix">
                                            <button class="btn btn-primary l-s-1 s-12 text-uppercase" type="submit" id="adicionar_associado" name="adicionar_associado">
                                                Cadastrar
                                            </button>

                                            <button class="btn btn-success l-s-1 s-12 text-uppercase" id="auto_preencher" name="auto_preencher" onclick="autoPreencherDados()" style="margin-left:10px;">
                                                AutoPreencher
                                            </button>



                                            <span class="badge badge-success" id="alerta-ok" style="padding: 10px !important;margin-left:10px; display:none; font-weight:bold;"></span>

                                            <span class="badge badge-danger" id="alerta-erro" style="padding: 10px !important;margin-left:10px; display:none; font-weight:bold;"></span>


                                        </div>
                                        <button class="btn btn-primary nextBtn pull-right" type="button">Próximo</button>
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
                                                        <input type="text" name="crm" id="crm" placeholder="CRM" oninput="optChangeIdEscala(this)" onblur="verificaCRM()" onfocus="apagaErro()" class="form-control r-0 light s-12" required>
                                                    </div>

                                                    <div class="form-group col-sm-2 m-0">
                                                        <label for="crm_uf" class="my-1 mr-2">UF CRM</label>
                                                        <select type="text" name="crm_uf" id="crm_uf" placeholder="UF do CRM" onchange="optChangeIdEscala() , apagaErro(this)" onfocus="apagaErro()" class="custom-select my-1 mr-sm-2 form-control r-0 light s-12" required>
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
                                                        <select type="text" name="id-escala" onchange="apagaErro(this)" id="id-escala" class="custom-select my-1 mr-sm-2 form-control r-0 light s-12" required>
                                                            <option value="" disabled="" selected="">Escolha uma opção</option>
                                                            <option value="escala1">Escala 1</option>
                                                            <option value="escala2">Escala 2</option>
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

                                        <button class="btn btn-primary nextBtn pull-right" type="button">Próximo</button>
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
                                        <button class="btn btn-success pull-right" type="submit">Finish!</button>
                                    </div>
                                </div>
                    </form>

                </div>

            </div>
            <!-- Right Sidebar -->

            <?php
            $path =  $_SERVER['DOCUMENT_ROOT'];
            $path .= $unisen_url . 'app/includes/UI/sidebar-right.php';
            include_once($path);
            ?>
            <!-- Add the sidebar's background. This div must be placed
         immediately after the control sidebar -->
            <div class="control-sidebar-bg shadow white fixed"></div>
        </div>
        <!--/#app -->
        <script src="../../includes/template/assets/js/app.js"></script>

        <script src="js/steeper-panel.js" async defer></script>

        <script>
            function executaToast() {
                $("#semEmail").toast('show');
            }

            function executaToast2() {
                $("#testetoast").toast('show');
            }
        </script>


        <!--
--- Footer Part - Use Jquery anywhere at page.
--- http://writing.colin-gourlay.com/safely-using-ready-before-including-jquery/
-->
        <script>
            (function($, d) {
                $.each(readyQ, function(i, f) {
                    $(f)
                });
                $.each(bindReadyQ, function(i, f) {
                    $(d).bind("ready", f)
                })
            })(jQuery, document)
        </script>
</body>

</html>