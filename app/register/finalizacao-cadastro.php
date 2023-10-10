<?php //session_start();
if (!isset($_SESSION['loggedin_cad']) && $_SESSION['loggedin_cad'] !== false) {
    session_destroy();
    header('location: login.php');
    exit;
}
?>

<?php /* session_start();
if (!isset($_SESSION['loggedin_cad']) && $_SESSION['loggedin_cad'] !== false) {
    header('location: ../login/');
    exit;
} */
?>

<form role="form" id="dados_bancarios_associado" name="dados_bancarios_associado" method="POST" enctype="multipart/form-data" class="form-horizontal">
    <input type="hidden" name="id_associado" id="id_associado" value="<?php echo $dados_associado['ID']; ?>">
    <input type="hidden" name="cpf_associado" id="cpf_associado" value="<?php echo $dados_associado['CPF']; ?>">

    <div class="form-row">
        <div class="col-md-12">
            <div class="form-row">
                <div class="form-group col-lg-6 m-0">
                    <label for="conta_corrente" class="col-form-label s-12">Conta Corrente</label>
                    <input type="text" name="conta_corrente" id="conta_corrente" class="form-control r-0 light s-12" value="<?php if (isset($dados_bancarios_associado)) echo $dados_bancarios_associado['conta_corrente'] ?>" required>
                </div>
                <div class="form-group col-lg-6 m-0">
                    <label for="agencia_banco" class="col-form-label s-12">Agência</label>
                    <input type="text" name="agencia_banco" id="agencia_banco" class="form-control r-0 light s-12" value="<?php if (isset($dados_bancarios_associado)) echo $dados_bancarios_associado['agencia'] ?>" required>
                </div>

                <div class="form-group col-lg-6 m-0">
                    <label for="nome_banco" class="col-form-label s-12">Banco</label>
                    <input type="text" name="nome_banco" id="nome_banco" class="form-control r-0 light s-12" value="<?php if (isset($dados_bancarios_associado)) echo $dados_bancarios_associado['banco'] ?>" onblur="nomeBancoUpper()" required>
                </div>
                <div class="form-group col-lg-6 m-0">
                    <label for="tipo_chave" class="col-form-label s-12">Tipo de Chave</label>
                    <select type="text" name="tipo_chave" id="tipo_chave" class="custom-select form-control r-0 light s-12" onchange="pixSelect(this)">
                        <option value="" disabled="" <?php if (isset($dados_bancarios_associado) && $dados_bancarios_associado['tipo_chave'] == '') echo "selected"; ?>>Selecione</option>
                        <option value="CPF" <?php if (isset($dados_bancarios_associado) && $dados_bancarios_associado['tipo_chave'] == 'CPF') echo "selected"; ?>>CPF</option>
                        <option value="CNPJ" <?php if (isset($dados_bancarios_associado) && $dados_bancarios_associado['tipo_chave'] == 'CNPJ') echo "selected"; ?>>CNPJ</option>
                        <option value="EMAIL" <?php if (isset($dados_bancarios_associado) && $dados_bancarios_associado['tipo_chave'] == 'EMAIL') echo "selected"; ?>>Email</option>
                        <option value="CELULAR" <?php if (isset($dados_bancarios_associado) && $dados_bancarios_associado['tipo_chave'] == 'CELULAR') echo "selected"; ?>>Celular</option>
                        <option value="CHAVE_ALEATORIA" <?php if (isset($dados_bancarios_associado) && $dados_bancarios_associado['tipo_chave'] == 'CHAVE_ALEATORIA') echo "selected"; ?>>Chave Aleatória</option>
                    </select>
                </div>

                <div class="form-group col-lg-12 m-0">
                    <label for="chave_pix" class="col-form-label s-12">Chave Pix</label>
                    <input type="text" name="chave_pix" id="chave_pix" class="form-control r-0 light s-12" value="<?php if (isset($dados_bancarios_associado)) echo $dados_bancarios_associado['chave_pix'] ?>">
                </div>

            </div>
        </div>
    </div>
</form>


<?php



if ($ArquivosPendentes != "sim") {
    echo "<hr><p>Tudo Ok</p>";
} else {
    // Retira o Alistamento Militar se for mulher
    if ($dados_associado['SEXO'] == 'feminino') {
        $newArray = array_diff($documentos_faltantes, array("COMPROVANTE DE ALISTAMENTO MILITAR"));
        $docs_faltantes = implode(", ", $newArray);
    } else {
        $docs_faltantes = implode(", ", $documentos_faltantes);
    }
    if ($dados_associado['SEXO'] == 'feminino' and in_array("COMPROVANTE DE ALISTAMENTO MILITAR", $documentos_faltantes) and count($documentos_faltantes) == 1) {
        echo "<hr><p>Tudo Ok</p>";
    } else {
        echo "<hr><p>Faltam Arquivos: <span style='color:red;'>$docs_faltantes</span></p>";
    }
}


?>
<script>
    function nomeBancoUpper() {
        $('#nome_banco').val($('#nome_banco').val().toUpperCase());
    }

    function pixSelect(pixSelectText) {
        if (pixSelectText) {
            if (pixSelectText.getAttribute('id') == 'tipo_chave') {
                document.getElementById('chave_pix').value = '';
                if (pixSelectText.options[pixSelectText.selectedIndex].value == 'CPF') document.getElementById('chave_pix').setAttribute('maxlength', '14');

                if (pixSelectText.options[pixSelectText.selectedIndex].value == 'CNPJ') document.getElementById('chave_pix').setAttribute('maxlength', '14');


                if (pixSelectText.options[pixSelectText.selectedIndex].value == 'CELULAR') document.getElementById('chave_pix').setAttribute('maxlength', '15');
                if (pixSelectText.options[pixSelectText.selectedIndex].value == 'EMAIL') document.getElementById('chave_pix').setAttribute('maxlength', '300');
                if (pixSelectText.options[pixSelectText.selectedIndex].value == 'CHAVE_ALEATORIA') document.getElementById('chave_pix').setAttribute('maxlength', '500');
            }
        }
    }
</script>