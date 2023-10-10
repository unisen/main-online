<?php session_start();

ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

require_once '../../config/database/conexao.php';
require_once '../../DAO/config/database.php';
require_once '../../DAO/controllers/LogsDAO.php';
require_once '../../DAO/controllers/CadastranteDAO.php';

//Include libs private functions
require_once './libs/farquivos.php';


if (isset($_SESSION['path_documentos_registro'])) {
    // "../../register/cadastrantes/"
    $path_registro = $_SESSION['path_documentos_registro'];
}


if (isset($_POST['userid'])) {

    $userid = $_POST['userid'];

    //Grava um backup do Cadastro na tbl_cadastro_arquivado
    $sql_backup = "INSERT INTO tbl_cadastro_arquivado SELECT * FROM tbl_cadastrantes WHERE tbl_cadastrantes.ID = $userid";
    if (!$result_backup = mysqli_query($con, $sql_backup)) {
        $result_backup = 0;
    }
    //Atualiza o status para Arquivado
    $sql_status = "UPDATE `tbl_cadastro_arquivado` SET `STATUS`='arquivado' WHERE ID = $userid";
    if (!$result_status = mysqli_query($con, $sql_status)) {
        $result_status = 0;
    }

    $con->close();

    $CadastranteDAO = new CadastranteDAO();
    $params = "WHERE ID = $userid";

    $result = $CadastranteDAO->selectNewCadastrante($params);
    $Cadastrante = $result[0];
    //pega pasta do documento
    $arquivo = explode("/", $Cadastrante->arquivo);
    $pasta_cadastrante = $arquivo[1];

    //$parameters = "WHERE ID = $userid";
    $parameters = array(
        'id' => $userid,
      ); 

    $origem = "Painel Cadastrantes - $result_backup";
    $tabela = 'tbl_cadastrantes';

    $login_user = $_SESSION['name'];
    $username = $_SESSION['username'];
    $ip_usuario = $_SERVER['REMOTE_ADDR'];

    //$resposta = $CadastranteDAO->deleteCadastrante($parameters); 

    if ($CadastranteDAO->deleteCadastrante($parameters)) {

        $LogsDAO = new LogsDAO();

        //Registra o Log
        $acao = "Deletou Id: $userid - Tabela: $tabela";

        $logData = array();
        $logData[] = $acao;
        $logData[] = $origem;
        $logData[] = $tabela;
        $logData[] = $login_user;
        $logData[] = $username;
        $logData[] = $ip_usuario;

        $LogsDAO->insertLog($logData);

        // Enter the name of directory
        //$pasta_cadastrante = "46327CE";

        // Enter the name to creating zipped directory
        // "../../register/cadastrantes/" + 888999GO 
        $path = $path_registro . $pasta_cadastrante;
        // "../../register/cadastrantes/888999GO" + "/"
        $pathdir = $path . "/";

        // nome e origem do arquivo ZIP 
        $zipcreated = $path_registro . $pasta_cadastrante . ".zip";        
        zipDirectory($pathdir, $zipcreated);
        
        $pathArquivos = $path_registro . "arquivados/" . $pasta_cadastrante . ".zip";
        moveFiles($zipcreated, $pathArquivos); 
        // $path = $path_registro . $pasta_cadastrante
        //removeFiles($path);
        
        $response = array();
        array_push($response, 'sucesso');
        array_push($response,$pasta_cadastrante);

        echo json_encode($response);
    }
        

    else {
        echo "Erro: " . json_encode($logData);
    }
}
