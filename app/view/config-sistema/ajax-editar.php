<?php

//CLASSE LOGSDAO - PDO CRUD MYSQL - PATH SISTEMA
require_once '../../DAO/config/database.php';
require_once '../../DAO/controllers/LogsDAO.php';

$idlog = 0;
if (isset($_POST['idlog'])) {
    $idlog = $_POST['idlog'];
    $params = "WHERE id_log = $idlog"; // . $id_usuario;
    $LogsDAO = new LogsDAO();
    $LogDAO = $LogsDAO->selectLog($params);

    /* $dados = json_encode($LogDAO);    
    print_r($dados); */

    $log = $LogDAO[0];
    //print_r($log); 
?>

    <!-- MODAL EDIT ASSOCIADO - FORM -->
    <form id="editar_log" name="editar_log" method="POST" class="form-horizontal needs-validation" autocomplete="true">
        <div class="card no-b  no-r">
            <div class="card-body">

                <div class="form-row">
                    <div class="form-group col-6 m-0">
                        <label for="usuario_edit" class="col-form-label s-12">Usuário</label>
                        <input type="text" name="usuario_edit" id="usuario_edit" value="<?php if (isset($log->usuario)) echo $log->usuario; ?>" class="form-control r-0 light s-12" required>
                        <div class="invalid-feedback">Nome de Usuário</div>
                    </div>
                    <div class="form-group col-6 m-0">
                        <label for="username_edit" class="col-form-label s-12">Username</label>
                        <input type="text" name="username_edit" id="username_edit" value="<?php if (isset($log->username)) echo $log->username; ?>" class="form-control r-0 light s-12" required>
                        <div class="invalid-feedback">Insira username.</div>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-12 m-0">
                        <label for="acao_edit" class="col-form-label s-12">Ação</label>
                        <input type="text" name="acao_edit" id="acao_edit" value="<?php if (isset($log->acao)) echo $log->acao; ?>" class="form-control r-0 light s-12" required>
                        <div class="invalid-feedback">Insira Ação.</div>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-6 m-0">
                        <label for="origem_edit" class="col-form-label s-12">Origem</label>
                        <input type="text" name="origem_edit" id="origem_edit" value="<?php if (isset($log->origem)) echo $log->origem; ?>" class="form-control r-0 light s-12" required>
                        <div class="invalid-feedback">Insira Origem.</div>
                    </div>
                    <div class="form-group col-6 m-0">
                        <label for="tabela_edit" class="col-form-label s-12">Tabela</label>
                        <input type="text" name="tabela_edit" id="tabela_edit" value="<?php if (isset($log->tabela)) echo $log->tabela; ?>" class="form-control r-0 light s-12" required>
                        <div class="invalid-feedback">Insira Tabela.</div>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-6 m-0">
                        <label for="ipuser_edit" class="col-form-label s-12">IP do Usuário</label>
                        <input type="text" name="ipuser_edit" id="ipuser_edit" value="<?php if (isset($log->ip_usuario)) echo $log->ip_usuario; ?>" class="form-control r-0 light s-12" required>
                        <div class="invalid-feedback">IP inválido.</div>
                    </div>
                    <div class="form-group col-6 m-0">
                        <label for="data_registro_edit" class="col-form-label s-12">Data de Registro</label>
                        <input type="text" name="data_registro_edit" id="data_registro_edit" value="<?php if (isset($log->dt_criacao)) echo $log->dt_criacao; ?>" class="form-control r-0 light s-12" required>
                        <div class="invalid-feedback">Data de Registro Inválida.</div>
                    </div>
                </div>

                <hr>

                <div class="form-row">
                    <button class="btn btn-primary l-s-1 s-12 text-uppercase" type="submit" id="atualizar_log" name="atualizar_log">
                        Atualizar
                    </button>
                </div>

            </div>
     
        </div>
    </form>

<?php }



/* $sql = "select * from employee where id=".$userid;
$result = mysqli_query($con,$sql);

$response = "<table border='0' width='100%'>";
while( $row = mysqli_fetch_array($result) ){
    $id = $row['id'];
    $emp_name = $row['emp_name'];
    $salary = $row['salary'];
    $gender = $row['gender'];
    $city = $row['city'];
    $email = $row['email'];
    
    $response .= "<tr>";
    $response .= "<td>Name : </td><td>".$emp_name."</td>";
    $response .= "</tr>";

    $response .= "<tr>";
    $response .= "<td>Salary : </td><td>".$salary."</td>";
    $response .= "</tr>";

    $response .= "<tr>";
    $response .= "<td>Gender : </td><td>".$gender."</td>";
    $response .= "</tr>";

    $response .= "<tr>";
    $response .= "<td>City : </td><td>".$city."</td>";
    $response .= "</tr>";
    
    $response .= "<tr>";
    $response .= "<td>Email : </td><td>".$email."</td>";
    $response .= "</tr>";

}
$response .= "</table>";
 */

//echo $response;
exit;
