<?php

#Verifica se tem um email para pesquisa
if(isset($_POST['documento'])){ 
  
        #Recebe o Email Postado
        $docPostado = $_POST['documento'];
    
        #Conecta banco de dados 
        $con = mysqli_connect("localhost:10040", "root", "root", "rotadb");
        $sql = mysqli_query($con, "SELECT * FROM tbl_users WHERE cnpjcpf = '{$docPostado}'") or print mysql_error();

        #Se o retorno for maior do que zero, diz que já existe um.
        
        

        if(mysqli_num_rows($sql)>0) {
           
            echo json_encode(array('documento' => 'Já existe um cadastro com este número.'));
        }
            else 
            echo json_encode(array('documento' => 'Ok')); 
}
?>