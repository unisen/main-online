<script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>

<script>
function mandaVer(mensagem) {
    var cpfcliente = $("#cpf_novo_cliente").val();

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
                $("#cpf_novo_cliente").val("");
                $(".tipo_pessoa_cliente").focus();
            }
        })

    } else {
        return true;
    }
}


function mandaVer2(mensagem) {
    var cnpjcliente = $("#cnpj_novo_cliente").val();

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
                $("#cnpj_novo_cliente").val("");
                $(".tipo_pessoa_cliente").focus();
            }
        })
    } else {
        return true;
    }
}
</script>


<!-- Adicionando Javascript -->
<script>
$(document).ready(function() {

    function limpa_formulário_cep() {
        // Limpa valores do formulário de cep.
        $("#endereco_novo_cliente").val("");
        $("#bairro_novo_cliente").val("");
        $("#cidade_novo_cliente").val("");
        $("#uf_novo_cliente").val("");

    }

    //Quando o campo cep perde o foco.
    $("#cep_novo_cliente").blur(function() {

        //Nova variável "cep" somente com dígitos.
        var cep = $(this).val().replace(/\D/g, '');

        //Verifica se campo cep possui valor informado.
        if (cep != "") {

            //Expressão regular para validar o CEP.
            var validacep = /^[0-9]{8}$/;

            //Valida o formato do CEP.
            if (validacep.test(cep)) {

                //Preenche os campos com "..." enquanto consulta webservice.
                $("#endereco_novo_cliente").val("...");
                $("#bairro_novo_cliente").val("...");
                $("#cidade_novo_cliente").val("...");
                $("#uf_novo_cliente").val("...");


                //Consulta o webservice viacep.com.br/
                $.getJSON("https://viacep.com.br/ws/" + cep + "/json/?callback=?", function(dados) {

                    if (!("erro" in dados)) {
                        //Atualiza os campos com os valores da consulta.
                        $("#endereco_novo_cliente").val(dados.logradouro);
                        $("#bairro_novo_cliente").val(dados.bairro);
                        $("#cidade_novo_cliente").val(dados.localidade);
                        $("#uf_novo_cliente").val(dados.uf);
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
                                $("#cep_novo_cliente").val("");
                                $("#cep_novo_cliente").focus();
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
                                $("#cep_novo_cliente").val("");
                                $("#cep_novo_cliente").focus();
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

<div id="overlay_forms2" class="overlays" onclick="closeNav2()"></div>

<div id="myNovoCliente" class="sidenav">

    <div class="ui-dialog-titlebar"><span class="ui_titulo">Adicionar Novo Cliente</span><button title='Fechar Janela'
            type='button' class='btn closebtn' id="x_editar_novo_cliente" onclick="closeNav2()">
            <i class='fas fa-times'></i><span class='btn-resp'> Fechar</span></button>
    </div>

    <form action="" id="adicionar_novo_cliente" name="adicionar_novo_cliente" method="POST"
        class="form-horizontal editar_novo_cliente" autocomplete="off">
        <div class="modal-body">

            <div class="row">
                <input type="hidden" name="id_novo_cliente_edit" id="id_novo_cliente_edit" value="">

                <div class="col-md-12 situacao-label">
                    <label>Situação</label><br>
                    <div class="group-item-form">
                        <label class="radio-inline" id="op1">
                            <input type="radio" name="optradio_novo_cliente" id="op1" value="Ativo" checked> &nbsp;Ativo
                        </label>
                        <label class="radio-inline" id="op2">
                            <input type="radio" name="optradio_novo_cliente" id="op2" value="Inativo"> &nbsp;Inativo
                        </label>
                        <label class="radio-inline" id="op3">
                            <input type="radio" name="optradio_novo_cliente" id="op3" value="Sem Movimento"> &nbsp;Sem Movimento
                        </label>
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="form-group">
                        <label for="inputName">Nome</label>
                        <input type="text" name="nome_novo_cliente" id="nome_novo_cliente" class="form-control"
                            value="">
                    </div>
                </div>

                <div class="col-md-8">
                    <div class="form-group">
                        <label for="inputName">Fantasia</label>
                        <input type="text" name="fantasia_novo_cliente" id="fantasia_novo_cliente" class="form-control"
                            value="">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="inputName">Registro</label>
                        <?php 
                         $date = new DateTime($user_registro);
                         $user_registro = $date->format('Y-m-d');
                        ?>
                        <input type="date" name="registro_novo_cliente" id="registro_novo_cliente" class="form-control"
                            value="">
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="inputName">Email</label>
                        <input type="email" name="email_novo_cliente2" id="email_novo_cliente2" class="form-control">
                            <div id='resposta'></div>                            
                            <script language="javascript">                        

                                var email = $("#email_novo_cliente2");
                                email.blur(function() {
                                    $.ajax({
                                        url: 'verificar/verificaEmail.php',
                                        type: 'POST',
                                        data: {
                                            "email": email.val()
                                        },
                                        success: function(data) {
                                            console.log(data);
                                            data = $.parseJSON(data);
                                            
                                            $("#resposta").text(data.email);                                                
                                            
                                        }
                                    });
                                });
                             
                            </script>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="inputName">Telefone</label>
                        <input type="text" name="telefone_novo_cliente" id="telefone_novo_cliente" class="all_phones form-control"
                            value="">
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="form-group">
                        <label for="inputName">Tipo Pessoa</label>
                        <select name="tipo_pessoa_newcliente" id="tipo_pessoa_newcliente"
                            class="tipo_pessoa_cliente form-control">
                            <option value="1">Jurídica</option>
                            <option value="2">Física</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="form-group">
                        <label for="inputName" id="cnpjpessoa">CNPJ</label>
                        <label for="inputName" id="cpfpessoa" style="display:none;">CPF</label>

                        <input type="text" name="cnpj_novo_cliente" id="cnpj_novo_cliente" class="cnpj form-control"
                            value="">
                        <input type="text" name="cpf_novo_cliente" id="cpf_novo_cliente" class="cpf form-control"
                            value="" style="display:none;">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="inputName">ID/RG</label>
                        <input type="text" name="idrg_novo_cliente" id="idrg_novo_cliente" class="form-control"
                            value="">
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="form-group">
                        <label for="cep_novo_cliente" class="label-item-form">CEP</label>
                        <input type="text" id="cep_novo_cliente" name="cep_novo_cliente" class="cep form-control" size="10"
                            maxlength="9" value="">
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
                        <!-- <input type="text" name="uf_novo_cliente" id="uf_novo_cliente" class="form-control"> -->
                        <select name="uf_novo_cliente" id="uf_novo_cliente" class="form-control">
                            <option value="">UF ... </option>
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
                        <input type="text" name="cidade_novo_cliente" id="cidade_novo_cliente" class="form-control"
                            value="">

                    </div>
                </div>

                <div class="col-md-8">
                    <div class="form-group">
                        <label for="inputName">Endereço</label>
                        <input type="text" name="endereco_novo_cliente" id="endereco_novo_cliente" class="form-control"
                            value="">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="inputName">Bairro</label>
                        <input type="text" name="bairro_novo_cliente" id="bairro_novo_cliente" class="form-control"
                            value="">
                    </div>
                </div>

                <div class="col-md-2">
                    <div class="form-group">
                        <label for="inputName">N°</label>
                        <input type="text" name="numero_novo_cliente" id="numero_novo_cliente" class="form-control"
                            value="">
                    </div>
                </div>
                <div class="col-md-10">
                    <div class="form-group">
                        <label for="inputName">Complemento</label>
                        <input type="text" name="complemento_novo_cliente" id="complemento_novo_cliente"
                            class="form-control" value="">
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="form-group">
                        <label for="inputName">Celular</label>
                        <input type="text" name="celular_novo_cliente" id="celular_novo_cliente" class="all_phones form-control"
                            value="">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="inputName">Website</label>
                        <input type="text" name="website_novo_cliente" id="website_novo_cliente" class="form-control"
                            value="">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="inputName">Fax</label>
                        <input type="text" name="fax_novo_cliente" id="fax_novo_cliente" class="all_phones form-control" value="">
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <label for="inputName">Email/Nfe</label>
                        <input type="email" name="emailnfe_novo_cliente" id="emailnfe_novo_cliente" class="form-control"
                            value="">
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="form-group">
                        <label for="inputName">Contatos</label>
                        <input type="text" name="contatos_novo_cliente" id="contatos_novo_cliente" class="form-control"
                            value="">
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="form-group">
                        <label for="inputName">Obs</label>
                        <textarea name="obs_novo_cliente" id="obs_novo_cliente" class="form-control"></textarea>
                    </div>
                </div>

            </div>
        </div>
        <div class="modal-footer">
            <button type="button" onclick="closeNav2()" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
            <button type="submit" class="btn btn-success">Salvar</button>
        </div>
    </form>
</div>

<script>
$('.tipo_pessoa_cliente').change(function() {
    var opx = $(this).find(':selected').val();
    if (opx == '1') {
        $('#cnpj_novo_cliente').show();
        $('#cnpjpessoa').show();
        $('#cnpj_novo_cliente').val("");
        $('#cpf_novo_cliente').hide();
        $('#cpfpessoa').hide();
    }
    if (opx == '2') {
        $('#cnpj_novo_cliente').hide();
        $('#cnpjpessoa').hide();
        $('#cpf_novo_cliente').val("");
        $('#cpf_novo_cliente').show();
        $('#cpfpessoa').show();

    }
});
</script>

<script>
$(document).ready(function() {
    $("#cpf_novo_cliente").focusin(function() {
        $(this).css("background-color", "#fff08f");
    });
    $("#cnpj_novo_cliente").focusin(function() {
        $(this).css("background-color", "#fff08f");
    });

    $("#cpf_novo_cliente").focusout(function() {
        $(this).css("background-color", "#ffffff");
        var cpf = $("#cpf_novo_cliente").val();
        mandaVer(TestaCPF(cpf));
    });


    $("#cnpj_novo_cliente").focusout(function() {
        $(this).css("background-color", "#ffffff");
        var cnpj = $("#cnpj_novo_cliente").val();
        mandaVer2(validarCNPJ(cnpj));
    });

});
</script>

<script>
// FUNCOES QUE ABREM E FECHAM OFF-CANVAS EDITAR CLIENTE    
function openNav2() {
    if (screen.availWidth <= 768) {
        document.getElementById("myNovoCliente").style.width = "100%";
        document.getElementById("myNovoCliente").style.border = "0";

    } else if (screen.availWidth < 1200) {
        var sidebar = document.getElementById("menu-lateral-app").offsetWidth;
        document.getElementById("myNovoCliente").style.width = screen.availWidth-sidebar + "px";       
        document.getElementById("fechaform_cliente").style.display = "block";
    } else {
        document.getElementById("myNovoCliente").style.width = "50%";
        document.getElementById("fechaform_cliente").style.display = "block";
        
        document.getElementById("overlay_forms2").style.width = "100%";
        //document.getElementById("overlay_forms").style.padding = "23%";
        document.getElementById("overlay_forms2").style.display = "block";
        document.getElementById("overlay_forms2").style.opacity = "0.85";
    }
    document.getElementById("main").style.marginRight = "0px";
    document.getElementById("abreform_novocliente").style.display = "none";
    document.body.style.backgroundColor = "rgba(0,0,0,0.4)";
}

function closeNav2() {
    document.getElementById("myNovoCliente").style.width = "0";
    document.getElementById("main").style.marginRight = "0";
    document.body.style.backgroundColor = "white";
    document.getElementById("abreform_novocliente").style.display = "block";
    document.getElementById("fechaform_cliente").style.display = "none";
    if (screen.availWidth > 1200) {
            document.getElementById("overlay_forms2").style.display = "none";
        }
}

/* var modal = document.getElementById('main');
modal.addEventListener('click', function(e) {
  if (e.target == this) closeNav();
}); */
</script>