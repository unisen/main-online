<?php session_start();
//include "config.php";
//CLASSE CLIENTE - PDO CRUD MYSQL

require_once '../../config/database/conexao.php';

$userid = 0;
if (isset($_POST['userid'])) {
    $userid = $_POST['userid'];

    //Pega os dados bancarios
    $query_dados_bancarios = mysqli_query($con, "SELECT * FROM `tbl_dados_bancarios` WHERE `id_user` ='$userid' LIMIT 1");
    if ($query_dados_bancarios->num_rows == 1) {
        $_SESSION['existe_banco'] = '1';
        $dados_bancarios_associado = mysqli_fetch_array($query_dados_bancarios, MYSQLI_ASSOC);
    } else {
        $_SESSION['existe_banco'] = '0';
    }

?>
    <div class="card no-b no-r">
        <div class="card-body">
            <input type="hidden" name="id_associado" id="id_associado" value="<?php echo $userid; ?>">

            <div class="form-row">
                <div class="col-md-12">
                    <div class="form-row ">
                        <div class="form-group col-lg-6 m-0">
                            <label class="col-form-label s-12">Conta Corrente</label>
                            <input type="text" name="conta_corrente" class="form-control r-0 light s-12" value="<?php if (isset($dados_bancarios_associado)) echo $dados_bancarios_associado['conta_corrente'] ?>" required>
                        </div>
                        <div class="form-group col-lg-6 m-0">
                            <label class="col-form-label s-12">Agência</label>
                            <input type="text" name="agencia_banco" class="form-control r-0 light s-12" value="<?php if (isset($dados_bancarios_associado)) echo $dados_bancarios_associado['agencia'] ?>" required>
                        </div>

                        <div class="form-group col-lg-6 m-0">
                            <label class="col-form-label s-12">Banco</label>
                            <input type="text" name="nome_banco" class="form-control r-0 light s-12" value="<?php if (isset($dados_bancarios_associado)) echo $dados_bancarios_associado['banco'] ?>" onblur="$(this).val($(this).val().toUpperCase());" required>
                        </div>
                        <div class="form-group col-lg-6 m-0">
                            <label class="col-form-label s-12">Tipo de Chave</label>
                            <select type="text" name="tipo_chave" class="custom-select form-control r-0 light s-12" required>
                                <option value="" disabled="" <?php if (isset($dados_bancarios_associado) && $dados_bancarios_associado['tipo_chave'] == '') echo "selected"; ?>>Selecione</option>
                                <option value="CPF/CNPJ" <?php if (isset($dados_bancarios_associado) && $dados_bancarios_associado['tipo_chave'] == 'CPF/CNPJ') echo "selected"; ?>>CPF/CNPJ</option>
                                <option value="EMAIL" <?php if (isset($dados_bancarios_associado) && $dados_bancarios_associado['tipo_chave'] == 'EMAIL') echo "selected"; ?>>EMAIL</option>
                                <option value="CELULAR" <?php if (isset($dados_bancarios_associado) && $dados_bancarios_associado['tipo_chave'] == 'CELULAR') echo "selected"; ?>>CELULAR</option>
                            </select>
                        </div>

                        <div class="form-group col-lg-12 m-0">
                            <label class="col-form-label s-12">Chave Pix</label>
                            <input type="text" name="chave_pix" class="form-control r-0 light s-12" value="<?php if (isset($dados_bancarios_associado)) echo $dados_bancarios_associado['chave_pix'] ?>" required>
                        </div>
                    </div>



                </div>
            </div>
        </div>

       

        <!-- </form> -->




    <?php }



exit;
