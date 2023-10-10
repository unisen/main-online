<?php

session_start();

if(!isset($_SESSION['loggedin'])){
    // Usuário não autenticado
    session_destroy();
    $url =  "{$_SERVER['REQUEST_URI']}";
    if($url != '/login/'){
        header('Location: /login/');
    }      
}else{
    $url =  "{$_SERVER['REQUEST_URI']}";
    if($url == '/login/'){
        header('Location: /inicio/');
    }
    
    
}

?>