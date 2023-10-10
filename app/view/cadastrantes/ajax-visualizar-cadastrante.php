<?php
//include "config.php";
//CLASSE CLIENTE - PDO CRUD MYSQL
require_once '../../DAO/config/database.php';
require_once '../../DAO/controllers/CadastranteDAO.php';

/**
 * @param array|object $data
 * @return array
 */
function object_to_array($data)
{
    $result = [];
    foreach ($data as $key => $value)
    {
        $result[$key] = (is_array($value) || is_object($value)) ? object_to_array($value) : $value;
    }
    return $result;
}



$userid = 0;
if (isset($_POST['userid'])) {
    $userid = $_POST['userid'];
    $params = "WHERE id = $userid"; // . $id_usuario;
    $CadastranteDAO = new CadastranteDAO();
    $Cadastrante = $CadastranteDAO->selectNewCadastrante($params);
    $dados = json_encode($Cadastrante);

    $perfil = $Cadastrante[0];

    //echo "<pre>" . print_r($perfil) . "</pre>"; 
    $result = object_to_array($Cadastrante);
    //print_r($result[0]);

    foreach ($result[0] as $key => $value) {
        echo "$key: $value<br>";
    } 
 }
exit;
