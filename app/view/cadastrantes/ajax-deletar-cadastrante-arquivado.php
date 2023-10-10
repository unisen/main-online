<?php session_start();

ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

require_once '../../config/database/conexao.php';
require_once '../../DAO/config/database.php';
require_once '../../DAO/controllers/LogsDAO.php';
require_once '../../DAO/controllers/CadastranteArquivoDAO.php';

//Include libs private functions
require_once './libs/farquivos.php';


if (isset($_SESSION['path_documentos_registro'])) {
    // "../../register/cadastrantes/"
    $path_registro = $_SESSION['path_documentos_registro'];
}


if (isset($_POST['userid'])) {

    $userid = $_POST['userid'];
    
    $CadastranteArquivoDAO = new CadastranteArquivoDAO();
    $params = "WHERE ID = $userid";

    $result = $CadastranteArquivoDAO->selectNewCadastrante($params);
    $Cadastrante = $result[0];
    //pega pasta do documento
    $arquivo = explode("/", $Cadastrante->arquivo);
    $pasta_cadastrante = $arquivo[1];

    //$parameters = "WHERE ID = $userid";
    $parameters = array(
        'id' => $userid,
      ); 

    $origem = "Painel Cadastrantes Arquivados - $userid";
    $tabela = 'tbl_cadastro_arquivado';

    $login_user = $_SESSION['name'];
    $username = $_SESSION['username'];
    $ip_usuario = $_SERVER['REMOTE_ADDR'];

    //$resposta = $CadastranteDAO->deleteCadastrante($parameters); 

    if ($CadastranteArquivoDAO->deleteCadastrante($parameters)) {

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
        //$path = $path_registro . $pasta_cadastrante;
        
        // "../../register/cadastrantes/888999GO" + "/"
        //$pathdir = $path . "/";

        // nome e origem do arquivo ZIP 
        //$zipcreated = $path_registro . $pasta_cadastrante . ".zip";        
        //zipDirectory($pathdir, $zipcreated);
        
        //$pathArquivos = $path_registro . "arquivados/" . $pasta_cadastrante . ".zip";
        //moveFiles($zipcreated, $pathArquivos); 
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
