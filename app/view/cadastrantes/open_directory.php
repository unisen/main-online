<?php session_start();

//start explorer c:\xampp

// Esta versão funciona apenas com windows.

$path = "c:\\xampp\\htdocs\\unisen-main\\app\\register\\cadastrantes";
if (isset($_GET['pasta'])) {
    $path .= '\\' . $_GET['pasta'];
    //shell_exec("cd c:\\xampp\\htdocs\\unisen-main\\app\\register\\cadastrantes");
    $comando = "start explorer $path"; // . $folder_to_open;
    shell_exec($comando);

    if ($_SESSION['previous'] !== '') {
        header('Location: '. $_SESSION['previous']);
    }
}


?>