<?php
     $servidor = "localhost";
     $bancoDeDados = "local";
     $usuario = "root";
     $senha = "root";


    $conexao = mysqli_connect($servidor, $usuario, $senha, $bancoDeDados);
    mysqli_set_charset($conexao,"utf8");
    
?>
