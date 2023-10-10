var table = document.getElementById('tbl_clientes');
for (var i = 1; i < table.rows.length; i++) {
    table.rows[i].onclick = function() {
        const newLocal = this.cells[0].innerText;
        //rIndex = this.rowIndex;
        document.getElementById("id_delete_cliente").value = newLocal;
        document.getElementById("id_cliente_edit").value = newLocal;

        //document.getElementById("registro_cliente").value = '2021-04-01';
        var registro = this.cells[2].innerHTML;

        var res = registro.split("/");
        document.getElementById("registro_cliente").value = $.trim(res[2]) + '-' + res[1] + '-' + res[0];
        //alert(registro);

        document.getElementById("nome_cliente").value = this.cells[1].innerHTML;
        document.getElementById("nome_delete_cliente").value = this.cells[1].innerHTML;

        document.getElementById("fantasia_cliente").value = this.cells[3].innerHTML;
        document.getElementById("email_cliente").value = this.cells[4].innerHTML;

        var emailClient = this.cells[4].innerHTML;
        /* alert(emailClient.length); */
        if (emailClient.length == 1) {
            $("#semEmail").toast('show');
        }



        document.getElementById("telefone_cliente").value = this.cells[5].innerHTML;

        var docClient = this.cells[6].innerHTML;
        if (docClient.length == 15) {
            document.getElementById("tipo_pessoa_edit_cliente").options[0].text = 'Física';
            document.getElementById("tipo_pessoa_edit_cliente").options[0].value = '2';
            document.getElementById("tipo_pessoa_edit_cliente").options[1].text = 'Jurídica';
            document.getElementById("tipo_pessoa_edit_cliente").options[1].value = '1';
            document.getElementById("cpfpessoa2").style.display = "block";
            document.getElementById("cnpjpessoa2").style.display = "none";
            document.getElementById("cnpj_cliente").style.display = "none";
            document.getElementById("cpf_cliente").style.display = "block";

            document.getElementById("cpf_cliente").value = docClient;

        } else if (docClient.length == 19) {
            document.getElementById("tipo_pessoa_edit_cliente").options[0].text = 'Jurídica';
            document.getElementById("tipo_pessoa_edit_cliente").options[0].value = '1';
            document.getElementById("tipo_pessoa_edit_cliente").options[1].text = 'Física';
            document.getElementById("tipo_pessoa_edit_cliente").options[1].value = '2';
            document.getElementById("cpfpessoa2").style.display = "none";
            document.getElementById("cnpjpessoa2").style.display = "block";
            document.getElementById("cpf_cliente").style.display = "none";
            document.getElementById("cnpj_cliente").style.display = "block";


            document.getElementById("cnpj_cliente").value = docClient;
        } else {
            //alert('CNPJ OU CPF NÃO DEFINIDO!');
            $("#semDocumento").toast('show');
            //document.getElementById("cnpj_cliente").focus();
            document.getElementById("cnpj_cliente").required = true;
        }

        document.getElementById("cnpj_cliente").value = this.cells[6].innerHTML;
        document.getElementById("cpf_cliente").value = this.cells[6].innerHTML;
        document.getElementById("idrg_cliente").value = this.cells[7].innerHTML;
        document.getElementById("endereco_cliente").value = this.cells[9].innerHTML;

        document.getElementById("numero_cliente").value = this.cells[10].innerHTML;
        document.getElementById("bairro_cliente").value = this.cells[11].innerHTML;
        document.getElementById("complemento_cliente").value = this.cells[12].innerHTML;
        document.getElementById("cidade_cliente").value = this.cells[13].innerHTML;

        document.getElementById("uf_cliente").options[0].text = this.cells[14].innerHTML;
        document.getElementById("uf_cliente").options[0].value = this.cells[14].innerHTML;

        document.getElementById("cep_cliente").value = this.cells[15].innerHTML;
        // document.getElementById("situacao_cliente").value 
        //SITUACAO
        var situacao = $.trim(this.cells[16].innerHTML);
        switch (situacao) {
            case "Ativo":
                document.getElementById("sit1").checked = true;
                break;
            case "Inativo":
                document.getElementById("sit2").checked = true;
                break;
            case "Sem Movimento":
                document.getElementById("sit3").checked = true;
                break;
            default:
                //alert(situacao)
                document.getElementById("sit1").checked = true;
        }

        // VENDEDOR
        document.getElementById("vendedor_cliente").value = this.cells[23].innerHTML;
        // Se existe o component de lista do vendedor ele pega o valor
        var el = document.getElementById("vendedorName");
        if (el != null) {
            document.getElementById("vendedorName").options[0].value = this.cells[23].innerHTML;
        }

        document.getElementById("contatos_cliente").value = this.cells[17].innerHTML;
        document.getElementById("celular_cliente").value = this.cells[18].innerHTML;
        document.getElementById("fax_cliente").value = this.cells[19].innerHTML;
        document.getElementById("website_cliente").value = this.cells[20].innerHTML;
        document.getElementById("obs_cliente").value = this.cells[21].innerHTML;
        document.getElementById("emailnfe_cliente").value = this.cells[22].innerHTML;

    }
};