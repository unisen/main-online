<?php



//$explorer = $_ENV["SYSTEMROOT"] . '\\explorer.exe';
$folder_to_open = "c:\xampp\htdocs\unisen-main\app\register\cadastrantes";
// Using "system" function would cause a false/positive
// by Bkav antivirus on virustotal.com. Using shell_exec
// instead solves the issue.

//start explorer c:\xampp
$path = "c:\\xampp\\htdocs\\unisen-main\\app\\register\\cadastrantes";
if (isset($_GET['pasta'])) {
    $path .= '\\' . $_GET['pasta'];
    //shell_exec("cd c:\\xampp\\htdocs\\unisen-main\\app\\register\\cadastrantes");
    $comando = "start explorer $path"; // . $folder_to_open;
    shell_exec($comando);
}



?>