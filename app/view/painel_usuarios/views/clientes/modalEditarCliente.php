<?php
//SELECT DOS DADOS DO CLIENTE NO PEDIDO
$sql_user = "SELECT tbl_users.* FROM tbl_users, tbl_pedidos_venda
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

endwhile; 
?>
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
<script src="https://code.jquery.com/jquery-3.4.1.min.js"
    integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>

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

<div id="overlay_forms" class="overlays" onclick="closeNav()">
</div>
<div id="mySidenav" class="sidenav">

    <div class="ui-dialog-titlebar"><span class="ui_titulo">Editar Dados do Cliente</span><button
            title='Fechar Editar Cliente' type='button' class='btn closebtn' id="x_editar_cliente" onclick="closeNav()">
            <i class='fas fa-times'></i> Fechar</button>
    </div>

    <form action="" id="update_cliente" name="update_cliente" method="POST" class="form-horizontal editar_cliente">
        <div class="modal-body">

            <div class="row">
                <input type="hidden" name="id_cliente_edit" id="id_cliente_edit" value="<? echo $user_id; ?>">
                <?php 
                switch ($user_situacao) {
                    case "Ativo":
                        $op1='checked';
                        break;
                    case "Inativo":
                        $op2='checked';
                        break;
                    case "Sem Movimento":
                        $op3='checked'; 
                        break;
                    default:
                        echo $user_situacao;        

                }               
                
                ?>
                <div class="col-md-12 situacao-label">
                    <label>Situação -
                        <? echo $user_situacao; ?>
                    </label><br>
                    <div class="group-item-form">
                        <label class="radio-inline" id="sit1">
                            <input type="radio" name="optradio_cliente" id="sit1" value="Ativo" <? echo $op1; ?>>
                            &nbsp;Ativo
                        </label>
                        <label class="radio-inline" id="sit2">
                            <input type="radio" name="optradio_cliente" id="sit2" value="Inativo" <? echo $op2; ?>>
                            &nbsp;Inativo
                        </label>
                        <label class="radio-inline" id="sit3">
                            <input type="radio" name="optradio_cliente" id="sit3" value="Sem Movimento" <? echo $op3;
                                ?>> &nbsp;Sem Movimento
                        </label>
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="form-group">
                        <label for="inputName">Nome</label>
                        <input type="text" name="nome_cliente" id="nome_cliente" class="form-control"
                            value="<? echo $user_name; ?>">
                    </div>
                </div>

                <div class="col-md-8">
                    <div class="form-group">
                        <label for="inputName">Fantasia</label>
                        <input type="text" name="fantasia_cliente" id="fantasia_cliente" class="form-control"
                            value="<? echo $user_fantasia; ?>">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="inputName">Registro</label>
                        <?php 
                         $date = new DateTime($user_registro);
                         $user_registro = $date->format('Y-m-d');
                        ?>
                        <input type="date" name="registro_cliente" id="registro_cliente" class="form-control"
                            value="<? echo $user_registro; ?>">
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="inputName">Email</label>
                        <input type="hidden" name="email_cliente2" id="email_cliente2" class="form-control"
                            value="<? echo $user_email; ?>">
                        <input type="email" name="email_cliente" id="email_cliente" class="form-control email_cliente"
                            value="<? echo $user_email; ?>">
                            <div id='resposta2'></div>
                            <script language="javascript">
                                var email = $("#email_cliente");
                                email.blur(function() {                                          
                                   
                                        //alert (emailBusca);
                                        $.ajax({
                                            url: 'verificar/verificaEmail2.php',
                                            type: 'POST',
                                            data: {
                                                "email": email.val()
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
                        <input type="text" name="telefone_cliente" id="telefone_cliente" class="all_phones form-control"
                            value="<? echo $user_tel; ?>">
                    </div>
                </div>
                <?php
                    if (strlen($user_cnpj) == 14){
                        $mostra1 = "display:none";
                        $cpfcnpjpessoa = '<option value="1">Jurídica</option>';  
                    }
                    else {
                        $mostra2 = "display:none";
                        $cpfcnpjpessoa = '<option value="2">Física</option>';
                    }                
                ?>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="inputName">Tipo Pessoa</label>
                        <select name="tipo_pessoa_edit_cliente" id="tipo_pessoa_edit_cliente"
                            class="tipo_pessoa_edit form-control">
                            <option value=""></option>
                            <? echo $cpfcnpjpessoa; ?>                   
                        </select>
                    </div>
                </div>
               
                <div class="col-md-5">
                    <div class="form-group">
                        <label for="inputName" id="cnpjpessoa2" style="<? echo $mostra1; ?>">CNPJ</label>
                        <label for="inputName" id="cpfpessoa2" style="<? echo $mostra2; ?>">CPF</label>

                        <input type="text" name="cnpj_cliente" id="cnpj_cliente" class="cnpj form-control"
                            value="<? if (strlen($user_cnpj) == 18) { echo $user_cnpj; } ?>"
                            style="<? echo $mostra1; ?>">
                        <input type="text" name="cpf_cliente" id="cpf_cliente" class="cpf form-control"
                            value="<? if (strlen($user_cnpj) == 14) { echo $user_cnpj; } ?>"
                            style="<? echo $mostra2; ?>">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="inputName">ID/RG</label>
                        <input type="text" name="idrg_cliente" id="idrg_cliente" class="form-control"
                            value="<? echo $user_idrg; ?>">
                    </div>
                </div>

                <div class="col-md-5">
                    <div class="form-group">
                        <label for="cep_cliente" class="label-item-form">CEP</label>
                        <input type="text" id="cep_cliente" name="cep_cliente" class="cep form-control" size="10"
                            maxlength="9" value="<? echo $user_cep; ?>">
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
                            <option value="<? echo $user_estado; ?>">
                                <? echo $user_estado; ?>
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
                        <input type="text" name="cidade_cliente" id="cidade_cliente" class="form-control"
                            value="<? echo $user_cidade; ?>">

                    </div>
                </div>

                <div class="col-md-8">
                    <div class="form-group">
                        <label for="inputName">Endereço</label>
                        <input type="text" name="endereco_cliente" id="endereco_cliente" class="form-control"
                            value="<? echo $user_endereco; ?>">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="inputName">Bairro</label>
                        <input type="text" name="bairro_cliente" id="bairro_cliente" class="form-control"
                            value="<? echo $user_bairro; ?>">
                    </div>
                </div>

                <div class="col-md-2">
                    <div class="form-group">
                        <label for="inputName">N°</label>
                        <input type="text" name="numero_cliente" id="numero_cliente" class="form-control"
                            value="<? echo $user_numero; ?>">
                    </div>
                </div>
                <div class="col-md-10">
                    <div class="form-group">
                        <label for="inputName">Complemento</label>
                        <input type="text" name="complemento_cliente" id="complemento_cliente" class="form-control"
                            value="<? echo $user_complemento; ?>">
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="form-group">
                        <label for="inputName">Celular</label>
                        <input type="text" name="celular_cliente" id="celular_cliente" class="all_phones form-control"
                            value="<? echo $user_celular; ?>">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="inputName">Website</label>
                        <input type="text" name="website_cliente" id="website_cliente" class="form-control"
                            value="<? echo $user_website; ?>">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="inputName">Fax</label>
                        <input type="text" name="fax_cliente" id="fax_cliente" class="all_phones form-control"
                            value="<? echo $user_fax; ?>">
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <label for="inputName">Email/Nfe</label>
                        <input type="email" name="emailnfe_cliente" id="emailnfe_cliente" class="form-control"
                            value="<? echo $user_emailnfe; ?>">
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="form-group">
                        <label for="inputName">Contatos</label>
                        <input type="text" name="contatos_cliente" id="contatos_cliente" class="form-control"
                            value="<? echo $user_contatos; ?>">
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="form-group">
                        <label for="inputName">Obs</label>
                        <textarea name="obs_cliente" id="obs_cliente"
                            class="form-control"><? echo $user_obs; ?></textarea>
                    </div>
                </div>

            </div>
        </div>
        <div class="modal-footer">
            <button type="button" onclick="closeNav()" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
            <button type="submit" class="btn btn-success">Salvar</button>
        </div>
    </form>
</div>

<script>
$('.tipo_pessoa_edit').change(function() {
    var opx = $(this).find(':selected').val();
    if (opx == '1') {
        $('#cnpj_cliente').show();
        $('#cnpjpessoa2').show("slow", function(){ });
        $('#cnpj_cliente').val("");
        $('#cpf_cliente').hide();
        $('#cpfpessoa2').hide("slow", function(){ });
    }
    if (opx == '2') {
        $('#cnpj_cliente').hide();
        $('#cnpjpessoa2').hide("slow", function(){ });
        $('#cpf_cliente').val("");
        $('#cpf_cliente').show();
        $('#cpfpessoa2').show("slow", function(){ });

    }
});
</script>

<script>
    $(document).ready(function() {
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
    $("#cpf_cliente").focusin(function() {
        $(this).css("background-color", "#fff08f");
    });
    $("#cnpj_cliente").focusin(function() {
        $(this).css("background-color", "#fff08f");
    });

    $("#cpf_cliente").focusout(function() {
        $(this).css("background-color", "#ffffff");
        var cpf = $("#cpf_cliente").val();
        mandaVer3(TestaCPF(cpf));
    });


    $("#cnpj_cliente").focusout(function() {
        $(this).css("background-color", "#ffffff");
        var cnpj = $("#cnpj_cliente").val();
        mandaVer4(validarCNPJ(cnpj));
    });

});
</script>