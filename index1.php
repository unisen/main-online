<?php
//$file_location = $_SERVER['DOCUMENT_ROOT'].'/unisen/wp-load.php';

//include $file_location;

//echo $file_location;

/* //verifica se está logado
session_start();

if ( is_user_logged_in() ) {
    //echo 'logado';
    header('Location: /inicio/'); // Redireciona para o Login
    exit;

}
else {
    //echo 'deslogado';
    session_destroy();
    header( "Location: login.php" );
    exit;
}  */


// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    session_destroy();
    header("Location: app/login/");
    exit;
} 
else {
    echo $_SESSION["loggedin"];
    header("Location: app/view/inicio/");
    exit;

}


/* session_start();

if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    // Usuário não autenticado
    session_destroy();
    $url =  "{$_SERVER['REQUEST_URI']}";
    if($url != '/login'){
        header('Location: /star-admin/login/');
    }      
}else{
    $url =  "{$_SERVER['REQUEST_URI']}";
    if($url == '/login.php'){
        header('Location: /inicio/');
    }
    
    
} */

?>