<?php

#Verifica se tem um email para pesquisa
if(isset($_POST['email'])){ 
  
        #Recebe o Email Postado
        $emailPostado = $_POST['email'];
    
        #Conecta banco de dados 
        $con = mysqli_connect("localhost:10040", "root", "root", "rotadb");
        $sql = mysqli_query($con, "SELECT * FROM tbl_users WHERE email = '{$emailPostado}' AND tipopessoa = 'Cliente'") or print mysql_error();

        #Se o retorno for maior do que zero, diz que já existe um.
        
        if(mysqli_num_rows($sql)>0)
            echo json_encode(array('email' => 'Email já cadastrado no sistema!'));
        else 
            echo json_encode(array('email' => 'Ok!' )); 
}
?>