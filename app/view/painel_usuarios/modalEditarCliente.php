<?php
//SELECT DOS DADOS DO CLIENTE NO PEDIDO
/* $sql_user = "SELECT tbl_users.* FROM tbl_users, tbl_pedidos_venda
WHERE tbl_users.id = tbl_pedidos_venda.id_cliente
AND tbl_pedidos_venda.numero_pedido = '$numero'";

$rUser = mysqli_query($conexao,$sql_user); 
while($row = mysqli_fetch_array($rUser, MYSQLI_ASSOC)) : 
$user_id = $row['id'];
$user_name = $row['nome'];
$user_fantasia = $row['fantasia'];
$user_email = $row['email'];
$user_tel = $row['telefone'];
$user_cnpj = $row['cnpjcpf'];
$user_idrg = $row['idrg'];
$user_registro = $row['registro'];


$user_endereco = $row['endereco'];
$user_numero = $row['numero'];
$user_complemento = $row['complemento'];
$user_bairro = $row['bairro'];
$user_cep = $row['cep'];
$user_cidade = $row['cidade'];
$user_estado = $row['estado'];
$user_contatos = $row['contatos'];
$user_fax = $row['fax'];
$user_celular = $row['celular'];
$user_website = $row['website'];

$user_situacao = $row['situacao'];
$user_obs = $row['obs'];
$user_emailnfe = $row['emailnfe'];
$user_vendedor = $row['vendedor'];

endwhile;  */

//session_start();

/* $user_nickname = $_SESSION["user_nickname"];
$user_password = $_SESSION["user_password"]; */
?>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css" />


<!-- Adicionando JQuery -->
<script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>


<script src="js/validarcpfcliente.js"></script>

<script src="js/validacnpjcliente.js"></script>



<script>
    function mandaVer3(mensagem) {
        var cpfcliente = $("#cpf_cliente").val();

        if (mensagem == false) {
            mensagem = cpfcliente;
            Swal.fire({
                title: "CPF Inválido",
                text: mensagem,
                icon: "error",
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'OK'
            }).then((result) => {
                if (result.isConfirmed) {
                    $("#cpf_cliente").val("");
                    $(".tipo_pessoa_edit").focus();
                }
            })

        } else {
            return true;
        }
    }


    function mandaVer4(mensagem) {
        var cnpjcliente = $("#cnpj_cliente").val();

        if (mensagem == false) {
            mensagem = cnpjcliente;
            Swal.fire({
                title: "CNPJ Inválido",
                text: mensagem,
                icon: "error",
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'OK'
            }).then((result) => {
                if (result.isConfirmed) {
                    $("#cnpj_cliente").val("");
                    $(".tipo_pessoa_edit").focus();
                }
            })
        } else {
            return true;
        }
    }
</script>

<!-- Adicionando JQuery -->
<script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>


<!-- Adicionando Javascript -->
<script>
    $(document).ready(function() {

        function limpa_formulário_cep() {
            // Limpa valores do formulário de cep.
            $("#endereco_cliente").val("");
            $("#bairro_cliente").val("");
            $("#cidade_cliente").val("");
            $("#uf_cliente").val("");

        }

        //Quando o campo cep perde o foco.
        $("#cep_cliente").blur(function() {

            //Nova variável "cep" somente com dígitos.
            var cep = $(this).val().replace(/\D/g, '');

            //Verifica se campo cep possui valor informado.
            if (cep != "") {

                //Expressão regular para validar o CEP.
                var validacep = /^[0-9]{8}$/;

                //Valida o formato do CEP.
                if (validacep.test(cep)) {

                    //Preenche os campos com "..." enquanto consulta webservice.
                    $("#endereco_cliente").val("...");
                    $("#bairro_cliente").val("...");
                    $("#cidade_cliente").val("...");
                    $("#uf_cliente").val("...");


                    //Consulta o webservice viacep.com.br/
                    $.getJSON("https://viacep.com.br/ws/" + cep + "/json/?callback=?", function(dados) {

                        if (!("erro" in dados)) {
                            //Atualiza os campos com os valores da consulta.
                            $("#endereco_cliente").val(dados.logradouro);
                            $("#bairro_cliente").val(dados.bairro);
                            $("#cidade_cliente").val(dados.localidade);
                            $("#uf_cliente").val(dados.uf);
                        } //end if.
                        else {
                            //CEP pesquisado não foi encontrado.
                            limpa_formulário_cep();
                            //alert("CEP não encontrado.");
                            Swal.fire({
                                title: "CEP não encontrado",
                                text: "Tente Novamente",
                                icon: "error",
                                confirmButtonColor: '#3085d6',
                                cancelButtonColor: '#d33',
                                confirmButtonText: 'OK'
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    $("#cep_cliente").val("");
                                    $("#cep_cliente").focus();
                                }
                            })
                        }
                    });
                } //end if.
                else {
                    //cep é inválido.
                    limpa_formulário_cep();
                    //alert("Formato de CEP inválido.");
                    Swal.fire({
                        title: "Formato de CEP inválido.",
                        text: "Tente Novamente",
                        icon: "error",
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'OK'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            $("#cep_cliente").val("");
                            $("#cep_cliente").focus();
                        }
                    })
                }
            } //end if.
            else {
                //cep sem valor, limpa formulário.
                limpa_formulário_cep();
            }
        });
    });
</script>
<!-- MODAL EDITAR CLIENTE -->
<div id="overlay_forms" class="overlays" onclick="closeNav()">
</div>
<div id="mySidenav" class="sidenav">

    <div class="ui-dialog-titlebar"><span class="ui_titulo">Editar Dados do Cliente</span><button title='Fechar Editar Cliente' type='button' class='btn closebtn' id="x_editar_cliente" onclick="closeNav()">
            <i class='fas fa-times'></i><span class="btn-resp"> Fechar</span></button>
    </div>

    <form action="" id="update_cliente" name="update_cliente" method="POST" class="form-horizontal editar_cliente" enctype="multipart/form-data">
        <div class="modal-body">

            <div class="row">
                <input type="hidden" name="id_cliente_edit" id="id_cliente_edit" value="">

                <input type="hidden" name="old_password_usuario" id="old_password_usuario" value="">

                <div class="col-md-6 situacao-label">
                    <label>Situação</label><br>
                    <div class="group-item-form">
                        <label class="radio-inline">
                            <input type="radio" name="optradio_cliente" id="sit1" value="Ativo">
                            &nbsp;Ativo
                        </label>
                        <label class="radio-inline">
                            <input type="radio" name="optradio_cliente" id="sit2" value="Inativo">
                            &nbsp;Inativo
                        </label>
                        <label class="radio-inline">
                            <input type="radio" name="optradio_cliente" id="sit3" value="Sem Movimento"> &nbsp;Sem
                            Movimento
                        </label>
                    </div>
                </div>

                <div class="col-md-3 situacao-label">
                    <div class="form-group">
                        <label>Username</label>
                        <input type="text" name="username_usuario" id="username_usuario" class="form-control" value="">
                    </div>
                </div>
                <!-- <div class="col-md-3 situacao-label">
                    <label for="inputName">Password</label>
                    <div class="input-group md-2">

                        <input class="form-control" type="password" id="username_password" name="username_password" placeholder="Password" value="" aria-label="Username" aria-describedby="basic-addon1">
                        <span class="input-group-text" id="basic-addon1"><i class="fa fa-eye-slash" id="togglePassword"></i></span>
                    </div>
                </div> -->

                <div class="col-md-3 situacao-label">
                    <div class="form-group">
                        <label for="inputName">Tipo Pessoa</label>
                        <select name="tipo_usuario_cliente" id="tipo_usuario_cliente" class="form-control">
                            <option value="Admin">Admin</option>
                            <option value="Gerente">Gerente</option>
                            <option value="Associado">Associado</option>
                            <option value="Convidado">Convidado</option>
                        </select>
                    </div>
                </div>
                <!--   <div class="col-md-3 situacao-label">
                    <div class="form-group">
                        <label for="vendedor_cliente">Vendedor</label>
                        <?php

                        /*    if ($_SESSION['funcao'] == 'Gerente') {                   

                                echo '<input name="vendedor_cliente" id="vendedor_cliente" class="form-control" list="vendedorName"><datalist id="vendedorName" name="vendedorName">';                           
                         
                                include "../../config/database/conexao2.php"; //Conexão com wordpress
                                $sql_vendedores = "SELECT wp_users.display_name as nome
                                FROM wp_users INNER JOIN wp_usermeta 
                                ON wp_users.ID = wp_usermeta.user_id 
                                WHERE wp_usermeta.meta_key = 'wp_capabilities' 
                                AND (wp_usermeta.meta_value LIKE '%shop_manager%' 
                                OR wp_usermeta.meta_value LIKE '%vendedor%') 
                                ORDER BY wp_users.user_nicename";
                                 $result = mysqli_query($conexao,$sql_vendedores); 
                                 
                                 echo '<option value="">';
                                 while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) :
                                    echo '<option value="'.$row['nome'].'">';
                                 endwhile;
                                 echo '</datalist>';
                            }
                            else {

                                echo '<input type="text" readonly="readonly" name="vendedor_cliente" id="vendedor_cliente" value="" class="form-control">';

                            } */
                        //
                        ?>

                    </div>
                </div> -->

                <div class="col-md-12">
                    <div class="form-group">
                        <label for="inputName">Nome</label>
                        <input type="text" name="nome_cliente" id="nome_cliente" class="form-control" value="">
                    </div>
                </div>

                <div class="col-md-8">
                    <div class="form-group">
                        <label for="inputName">Fantasia</label>
                        <input type="text" name="fantasia_cliente" id="fantasia_cliente" class="form-control" value="<?php echo $user_fantasia; ?>">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="inputName">Registro</label>
                        <?php
                        /*  $date = new DateTime($user_registro);
                         $user_registro = $date->format('Y-m-d'); */
                        ?>
                        <input type="date" name="registro_cliente" id="registro_cliente" class="form-control" value="">
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="inputName">Email</label>

                        <input type="email" name="email_cliente" id="email_cliente" class="form-control" value="" required>
                        <div id='resposta2'></div>
                        <script language="javascript">
                            var email2 = $("#email_cliente");
                            email2.blur(function() {

                                //alert (email.val());
                                $.ajax({
                                    url: 'verificar/verificaEmail2.php',
                                    type: 'POST',
                                    data: {
                                        "email": email2.val()
                                    },
                                    success: function(data) {
                                        console.log(data);
                                        data = $.parseJSON(data);
                                        $("#resposta2").text(data.email);
                                    }
                                });

                            });
                        </script>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="inputName">Telefone</label>
                        <input type="text" name="telefone_cliente" id="telefone_cliente" class="all_phones form-control" value="<?php echo $user_tel; ?>">
                    </div>
                </div>
                <?php
                if (isset($user_cnpj) &&  strlen($user_cnpj) == 14) {
                    $mostra1 = "display:none";
                    $cpfcnpjpessoa = '<option value="1">Jurídica</option>';
                } else {
                    $mostra2 = "display:none";
                    $cpfcnpjpessoa = '<option value="2">Física</option>';
                }
                ?>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="inputName">Tipo Pessoa</label>
                        <select name="tipo_pessoa_edit_cliente" id="tipo_pessoa_edit_cliente" class="tipo_pessoa_edit form-control">
                            <option value="1">Jurídica</option>
                            <option value="2">Física</option>
                        </select>
                    </div>
                </div>

                <div class="col-md-5">
                    <div class="form-group">
                        <label for="inputName" id="cnpjpessoa2" style="<?php echo $mostra1; ?>">CNPJ</label>
                        <label for="inputName" id="cpfpessoa2" style="<?php echo $mostra2; ?>">CPF</label>

                        <input type="text" name="cnpj_cliente" id="cnpj_cliente" class="cnpj form-control" value="<?php if (strlen($user_cnpj) == 18) {
                                                                                                                        echo $user_cnpj;
                                                                                                                    } ?>" style="<?php echo $mostra1; ?>">
                        <input type="text" name="cpf_cliente" id="cpf_cliente" class="cpf form-control" value="<?php if (strlen($user_cnpj) == 14) {
                                                                                                                    echo $user_cnpj;
                                                                                                                } ?>" style="<?php echo $mostra2; ?>">

                        <div id='resposta3'></div>
                        <script language="javascript">
                            var doc = $("#cpf_cliente");
                            doc.blur(function() {

                                //alert (email.val());
                                $.ajax({
                                    url: 'verificar/verificaDocumento.php',
                                    type: 'POST',
                                    data: {
                                        "documento": doc.val()
                                    },
                                    success: function(data) {
                                        console.log(data);
                                        data = $.parseJSON(data);
                                        $("#resposta3").text(data.documento);
                                        var resp = $("#resposta3").text();
                                        if (resp != 'Ok') {
                                            $("#cpf_cliente").val("");
                                            $("#cpf_cliente").focus();
                                        }
                                    }
                                });

                            });
                        </script>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="inputName">ID/RG</label>
                        <input type="text" name="idrg_cliente" id="idrg_cliente" class="form-control" value="<?php echo $user_idrg; ?>">
                    </div>
                </div>

                <div class="col-md-5">
                    <div class="form-group">
                        <label for="cep_cliente" class="label-item-form">CEP</label>
                        <input type="text" id="cep_cliente" name="cep_cliente" class="cep form-control" size="10" maxlength="9" value="<?php echo $user_cep; ?>">
                        <div class="input_icones">
                            <a id="buscaCep" class="formIcon" title="Buscar CEP">
                                <i class="fas fa-search" style="font-size:20px; color:#37A661;"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="inputName">UF</label>
                        <!-- <input type="text" name="uf_cliente" id="uf_cliente" class="form-control"> -->
                        <select name="uf_cliente" id="uf_cliente" class="form-control">
                            <option value="<?php echo $user_estado; ?>">
                                <?php echo $user_estado; ?>
                            </option>
                            <option value="AC">AC - Acre</option>
                            <option value="AL">AL - Alagoas</option>
                            <option value="AM">AM - Amazonas</option>
                            <option value="AP">AP - Amapá</option>
                            <option value="BA">BA - Bahia</option>
                            <option value="CE">CE - Ceará</option>
                            <option value="DF">DF - Distrito Federal</option>
                            <option value="ES">ES - Espírito Santo</option>
                            <option value="GO">GO - Goiás</option>
                            <option value="MA">MA - Maranhão</option>
                            <option value="MG">MG - Minas Gerais</option>
                            <option value="MS">MS - Mato Grosso do Sul</option>
                            <option value="MT">MT - Mato Grosso</option>
                            <option value="PA">PA - Pará</option>
                            <option value="PB">PB - Paraíba</option>
                            <option value="PE">PE - Pernambuco</option>
                            <option value="PI">PI - Piauí</option>
                            <option value="PR">PR - Paraná</option>
                            <option value="RJ">RJ - Rio de Janeiro</option>
                            <option value="RN">RN - Rio Grande do Norte</option>
                            <option value="RO">RO - Rondônia</option>
                            <option value="RR">RR - Roraima</option>
                            <option value="RS">RS - Rio Grande do Sul</option>
                            <option value="SC">SC - Santa Catarina</option>
                            <option value="SE">SE - Sergipe</option>
                            <option value="SP">SP - São Paulo</option>
                            <option value="TO">TO - Tocantins</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="inputName">Cidade</label>
                        <input type="text" name="cidade_cliente" id="cidade_cliente" class="form-control" value="<?php echo $user_cidade; ?>">

                    </div>
                </div>

                <div class="col-md-8">
                    <div class="form-group">
                        <label for="inputName">Endereço</label>
                        <input type="text" name="endereco_cliente" id="endereco_cliente" class="form-control" value="<?php echo $user_endereco; ?>">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="inputName">Bairro</label>
                        <input type="text" name="bairro_cliente" id="bairro_cliente" class="form-control" value="<?php echo $user_bairro; ?>">
                    </div>
                </div>

                <div class="col-md-2">
                    <div class="form-group">
                        <label for="inputName">N°</label>
                        <input type="text" name="numero_cliente" id="numero_cliente" class="form-control" value="<?php echo $user_numero; ?>">
                    </div>
                </div>
                <div class="col-md-10">
                    <div class="form-group">
                        <label for="inputName">Complemento</label>
                        <input type="text" name="complemento_cliente" id="complemento_cliente" class="form-control" value="<?php echo $user_complemento; ?>">
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="form-group">
                        <label for="inputName">Celular</label>
                        <input type="text" name="celular_cliente" id="celular_cliente" class="all_phones form-control" value="<?php echo $user_celular; ?>">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="inputName">Website</label>
                        <input type="text" name="website_cliente" id="website_cliente" class="form-control" value="<?php if (isset($user_website)) echo $user_website; ?>">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="inputName">Fax</label>
                        <input type="text" name="fax_cliente" id="fax_cliente" class="all_phones form-control" value="<?php echo $user_fax; ?>">
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <label for="inputName">Email/Nfe</label>
                        <input type="email" name="emailnfe_cliente" id="emailnfe_cliente" class="form-control" value="<?php if (isset($user_emailnfe)) echo $user_emailnfe; ?>">
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="form-group">
                        <label for="inputName">Contatos</label>
                        <input type="text" name="contatos_cliente" id="contatos_cliente" class="form-control" value="<?php if (isset($user_contatos)) echo $user_contatos; ?>">
                    </div>
                </div>

                <div class="col-md-7">
                    <div class="form-group">
                        <label for="inputName">Obs</label>
                        <textarea name="obs_cliente" id="obs_cliente" class="form-control"><?php if (isset($user_obs)) echo $user_obs; ?></textarea>
                    </div>
                </div>

                <div class="col-md-5">
                    <div class="form-group">
                        <label>Foto do Usuário</label>
                        <a href="#modalFileUpload" data-toggle="modal" data-target="#modalFileUpload" class="nav-link"><i class="icon icon-plus-circle"></i>UPLOAD</a>

                        <!--  <input type="file" class="form-control" name="imageToUpload" id="imageToUpload" required /> -->

                        <input type="hidden" id="user_image" name="user_image" value="<?php if (isset($user_image)) echo $user_image; ?>">

                        <?php
                        /*  if (isset($_SESSION["response"])) {
                                $response_upload = $_SESSION['response'];
                                echo "<script>alert('" . $response_upload['message']. "')</script>";
                            } */
                        ?>
                        <!-- Status message -->

                    </div>
                </div>

            </div>
        </div>
        <div class="modal-footer">
            <button type="button" onclick="closeNav()" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
            <button type="submit" class="btn btn-success" name="salvar">Salvar</button>
            <button type="button" class="btn btn-info" data-toggle="modal" data-target="#modalChangePassword">Alterar Senha</button>

        </div>
    </form>
</div>


<!-- Modal FILE user_image UPLOAD -->
<!--Message Modal-->
<div class="modal fade" id="modalFileUpload" tabindex="-1" role="dialog" aria-labelledby="modalFileUpload">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content b-0">
            <div class="modal-header r-0 bg-primary">
                <h6 class="modal-title text-white" id="exampleModalLabel">Upload Foto do Usuário</h6>
                <a href="#" data-dismiss="modal" aria-label="Close" class="paper-nav-toggle paper-nav-white active"><i></i></a>
            </div>
            <div class="modal-body no-p no-b">
                <form id="fupForm" enctype="multipart/form-data">
                    <div class="card no-b  no-r">
                        <div class="card-body">
                            <div class="form-row row clearfix">
                                <div class="form-group col-sm-6 m-0">
                                    Selecione a imagem para upload:
                                    <input type="file" class="form-control" name="fileToUpload" id="fileToUpload" accept="image/*" capture="camera" required />

                                </div>

                                <div class="form-group col-sm-6 m-0">
                                    <input class="submitBtn btn btn-primary" type="submit" value="ENVIAR" name="submit" />
                                    <!-- Status message -->
                                    <p class="statusMsg"></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <div class="form-row row clearfix">

                </div>

            </div>
        </div>
    </div>
</div>

<!-- Modal Change Password -->
<!--Message Modal-->
<div class="modal fade" id="modalChangePassword" tabindex="-1" role="dialog" aria-labelledby="modalChangePassword">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content b-0">
            <div class="modal-header r-0 bg-primary">
                <h6 class="modal-title text-white" id="exampleModalLabel">Alterar Senha:</h6>
                <a href="#" data-dismiss="modal" aria-label="Close" class="paper-nav-toggle paper-nav-white active"><i></i></a>
            </div>
            <div class="modal-body no-p no-b">
                <!-- <form id="passUpForm" role="form" name="passUpForm" method="POST" class="form-vertical" autocomplete="false">
                    <div class="card no-b  no-r">
                        <div class="card-body">
                            <div class="form-row row clearfix">
                                <div class="form-group col-sm-6 m-0">
                                    <label for="inputName">Password</label>
                                    <div class="input-group md-2">
                                        <input class="form-control" type="password" id="username_password" name="username_password" placeholder="Password" value="" aria-label="Username" aria-describedby="basic-addon1">
                                        <span class="input-group-text" id="basic-addon1"><i class="fa fa-eye-slash" id="togglePassword"></i></span>
                                    </div>
                                    <input class="submitBtnPass btn btn-primary" type="submit" value="Alterar" name="submitPass" />
                                    Status message
                                    <p class="statusMsg"></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </form> -->


                <form id="passUpForm" role="form" name="passUpForm" method="POST" class="form-vertical" autocomplete="false">
                    <input type="hidden" name="id_cliente_changepass" id="id_cliente_changepass" value="">
                    <input type="hidden" name="nome_cliente_password" id="nome_cliente_password" value="">
                    <div class="card no-b  no-r">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="inputName">Digite a senha:</label>
                                <div class="input-group md-2">
                                    <input class="form-control username_password" type="password" id="senha" name="senha" placeholder="Senha de 6 digitos" maxlength="6" value="" aria-label="Username" aria-describedby="basic-addon1">
                                    <span class="input-group-text" id="basic-addon1"><i class="fa fa-eye-slash" id="togglePassword"></i></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                            <label for="inputName">Repita a senha:</label>
                                <div class="input-group md-2">
                                    <input class="form-control username_password" type="password" name="senha-confirma" id="senha-confirma" placeholder="Repita a senha" maxlength="6" onblur="confirmaSenha()" aria-label="Username" aria-describedby="basic-addon1">
                                
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-12">
                            <input type="submit" id="atualizar-senha" class="btn btn-primary btn-lg btn-block" value="Atualizar Senha">
                            <br>
                            <div role="alert" class="alert alert-danger" id="alerta-erro"><strong>Oh snap!</strong> </div>
                            <div role="alert" class="alert alert-success" id="alerta-ok"><strong>Well done!</strong> </div>
                        </div>
                    </div>

                </form>
            </div>
            <div class="modal-footer">
                <div class="form-row row clearfix">

                </div>

            </div>
        </div>
    </div>
</div>

<script>
        function confirmaSenha() {
            var senha = $("#senha").val();
            var confirma = $("#senha-confirma").val();
            if (senha != confirma) {

                var alertaErro = $("#alerta-erro");
                alertaErro.html("As senhas não coincidem. Tente novamente.");
                alertaErro.css("display", "block");
                $("#senha").val("");
                $("#senha").focus();
                $("#senha-confirma").val("");

                setTimeout(function() {
                    alertaErro.css("display", "none");
                }, 4000);

            }
        }
    </script>

<!-- MENSAGEM DE AVISO SEM CNPF OU CPF CADASTRADO! -->
<!-- <div class="toast" id="semDocumento" style="z-index: 9999 !important; position: absolute; top: 30px; left: 20%"
    data-delay="4000">
    <div class="toast-header">
        <strong class="mr-auto"><i class="fa fa-grav"></i>Sem Configuração</strong>
        <small style="color: red;">Problema!</small>
        <button type="button" class="ml-2 mb-1 close" data-dismiss="toast">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="toast-body">
        <div>Cliente cadastrado sem o documento de CNPJ ou CPF!</div>
    </div>
</div>
 -->

<!-- MENSAGEM DE AVISO SEM EMAIL CADASTRADO! -->
<!-- <div class="toast" id="semEmail" style="z-index: 9999 !important; position: absolute; top: 60px; left: 20%"
    data-delay="4000">
    <div class="toast-header">
        <strong class="mr-auto"><i class="fa fa-grav"></i>Sem Configuração</strong>
        <small style="color: red;">Problema!</small>
        <button type="button" class="ml-2 mb-1 close" data-dismiss="toast">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="toast-body">
        <div>Cliente cadastrado sem nenhum Email!</div>
    </div>
</div> -->


<!-- 
<div class="position-absolute w-50 d-flex flex-column p-4"> -->
<!-- MENSAGEM DE AVISO SEM CNPF OU CPF CADASTRADO! -->
<!--   <div class="toast ml-auto" id="semDocumento" style="z-index: 1500 !important" data-delay="4000" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="toast-header">
            <strong class="mr-auto"><i class="fa fa-grav"></i>Ops</strong>
            <small style="color: red;"><i class="fas fa-exclamation-triangle"></i></small>
            <button type="button" class="ml-2 mb-1 close" data-dismiss="toast">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="toast-body">
            <div>Cliente cadastrado sem CNPJ ou CPF!</div>
        </div>
    </div> -->
<!-- MENSAGEM DE AVISO SEM EMAIL CADASTRADO! -->
<!--   <div class="toast ml-auto" id="semEmail" style="z-index: 9999 !important;" role="alert" aria-live="assertive" aria-atomic="true" data-delay="4000">
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
</div>

 -->
<script src="js/upload_ajax.js" async defer></script>

<script>
    const togglePassword = document.querySelector("#togglePassword");
    const password = document.querySelector("#senha");
    const password2 = document.querySelector("#senha-confirma");

    togglePassword.addEventListener("click", function() {

        // toggle the type attribute
        const type = password.getAttribute("type") === "password" ? "text" : "password";
        password.setAttribute("type", type);

        const type2 = password2.getAttribute("type") === "password" ? "text" : "password";
        password2.setAttribute("type", type2);

        // toggle the eye icon
        this.classList.toggle('fa-eye');
    });
</script>


<script>
    $('.tipo_pessoa_edit').change(function() {
        var opx = $(this).find(':selected').val();
        if (opx == '1') {
            $('#cnpj_cliente').show();
            $('#cnpjpessoa2').show("slow", function() {});
            $('#cnpj_cliente').val("");
            $('#cpf_cliente').hide();
            $('#cpfpessoa2').hide("slow", function() {});
        }
        if (opx == '2') {
            $('#cnpj_cliente').hide();
            $('#cnpjpessoa2').hide("slow", function() {});
            $('#cpf_cliente').val("");
            $('#cpf_cliente').show();
            $('#cpfpessoa2').show("slow", function() {});

        }
    });
</script>

<script>
    $(document).ready(function() {

        $('input[type="file"]').change(function(e) {
            var userImage = e.target.files[0].name;
            $("#user_image").val(userImage);
        });


        var cpf = $('#cpf_cliente').val();
        var cnpj = $('#cnpj_cliente').val();
        if (cpf.length == 14) {

            $('.tipo_pessoa_edit option:selected').val("2");
            $('.tipo_pessoa_edit option:selected').text("Física");
            /*  $('.tipo_pessoa_edit option').val("1");
             $('.tipo_pessoa_edit option').text("Jurídica"); */

            /*   $('.tipo_pessoa_edit option').val("1");
              $('.tipo_pessoa_edit option').text("Jurídica"); */
            /*   $('.tipo_pessoa_edit').val("2");
              $('.tipo_pessoa_edit').text("Jurídica"); */

        }
        if (cnpj.length == 18) {
            $('.tipo_pessoa_edit option:selected').val("1");
            $('.tipo_pessoa_edit option:selected').text("Jurídica");

            /*         $('.tipo_pessoa_edit option').val("2");
                    $('.tipo_pessoa_edit option').text("Jurídica"); */

        }
        //alert('cpf: '+cpf.length+' cnpj: '+cnpj.length);



    });
</script>


<script>
    $(document).ready(function() {

        /*   $("#vendedor_cliente").focusin(function() {
              $(this).select();
          }); */


        /* $(".username_password").click(function() {
            var userPassword = $(this).val();
            $("#old_password_usuario").val(userPassword);
            $(this).val('');
        }); */

        /*
        $(".username_password").focusout(function() {
            var userPasswordNew = $(this).val();
            var userPasswordOld = $("#old_password_usuario").val();
            if (userPasswordNew == '') {

                $(".username_password").val(userPasswordOld);
            }
        }); */


        $("#cpf_cliente").focusin(function() {
            $(this).css("background-color", "#fff08f");
        });

        $("#cnpj_cliente").focusin(function() {
            $(this).css("background-color", "#fff08f");
        });

        $("#cpf_cliente").focusout(function() {
            $(this).css("background-color", "#ffffff");
            var cpf = $("#cpf_cliente").val();
            if (cpf != '') {
                mandaVer3(TestaCPF(cpf));
            }


        });


        $("#cnpj_cliente").focusout(function() {
            $(this).css("background-color", "#ffffff");
            var cnpj = $("#cnpj_cliente").val();
            if (cnpj != '') {
                mandaVer4(validarCNPJ(cnpj));
            }


        });

    });
</script>