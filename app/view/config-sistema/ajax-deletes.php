<?php
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

//CLASSE LOGSDAO - PDO CRUD MYSQL - PATH SISTEMA
require_once '../../DAO/config/database.php';
require_once '../../DAO/controllers/LogsDAO.php';

require_once '../../config/database/conexao.php';

session_start();

$idlogs = 0;
if (isset($_POST['idlog'])) {
    $idlogs = $_POST['idlog'];

    $origem = 'Registros de Logs';
    $tabela = 'tbl_logs';
    $login_user = $_SESSION['name'];
    $username = $_SESSION['username'];
    $ip_usuario = $_SERVER['REMOTE_ADDR'];


    $query = "DELETE FROM tbl_logs WHERE `id_log` IN ($idlogs)"; // . $id_usuario;
    $resposta = mysqli_query($con, $query);

    if ($resposta == 1) {

        $LogsDAO = new LogsDAO();
        //Registra o Log
        $acao = "Deletes em Logs Ids: $idlogs";

        $logData = array();
        $logData[] = $acao;
        $logData[] = $origem;
        $logData[] = $tabela;
        $logData[] = $login_user;
        $logData[] = $username;
        $logData[] = $ip_usuario;
        $LogsDAO->insertLog($logData);
        echo "sucesso";
    } else {
        echo "erro";
        echo $resposta;
        //echo "<p>$params</p>";
    }
}


exit;
