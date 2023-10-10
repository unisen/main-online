<?php
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

require_once '../../config/database/conexao.php';


#Verifica se tem um email para pesquisa
if(isset($_POST['cpf'])){ 
  
        #Recebe o Email Postado
        $cpfPostado = $_POST['cpf'];
    
        #Conecta banco de dados 
        //$con = mysqli_connect("localhost", "root", "", "escala_db");
        
        $sql = mysqli_query($con, "SELECT * FROM tbl_socios WHERE `CPF` = '{$cpfPostado}'") or print mysqli_error();

        #Se o retorno for maior do que zero, diz que já existe um.
        
        if(mysqli_num_rows($sql)>0) {
            echo json_encode(array('cpf' => 'erro'));
        }
        else {
            $sql2 = mysqli_query($con, "SELECT * FROM tbl_cadastrantes WHERE `CPF` = '{$cpfPostado}'") or print mysqli_error();
            if(mysqli_num_rows($sql2)>0) {
                echo json_encode(array('cpf' => 'erro'));
            }
            else {
                echo json_encode(array('cpf' => 'ok' ));
            }            
        } 
}
