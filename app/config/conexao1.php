<?php
     $servidor = "localhost:10040";
     $bancoDeDados = "rotadb";
     $usuario = "root";
     $senha = "root";


    $conexao = mysqli_connect($servidor, $usuario, $senha, $bancoDeDados);
    mysqli_set_charset($conexao,"utf8");
    
?>
