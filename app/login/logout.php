<?php
// Initialize the session
session_start();
 
// Delete register useronline 
// Começando com a abertura da comunicação entre o php e o banco de dados.
// O texto em verde você deve alterar para as informações do seu usuário do Mysql.

/* $host="localhost";
$username="chefre17_unisen2107";
$password="LgBkCfTv7DEP";
$db_name="chefre17_dbunisen";
$tbl_name = "useronline"; */

if($_SERVER['HTTP_HOST'] == 'localhost' or strpos($_SERVER['HTTP_HOST'],"192.168") !== false) {
    // Change this to your connection info.
    $host="localhost";
    $username="root";
    $password="";
    $db_name="escala_db";
    $tbl_name = "useronline";

  }
  else {
    // Connection servidor.
    $host="localhost";
    $username="chefre17_unisen2107";
    $password="LgBkCfTv7DEP";
    $db_name="chefre17_dbunisen";
    $tbl_name = "useronline";
  }





// Abaixo estabelece a conexão com o banco.
$con = new mysqli($host, $username, $password, $db_name);
if ($con->connect_error) {
die("Mysql não Conectou: " . $con->connect_error);
}

$desloga_user = $_SESSION['useronline'];
$sql5="DELETE FROM $tbl_name WHERE session='$desloga_user'";
$result5=mysqli_query($con, $sql5);
// Php Inicia a Sessão no MySql. Você deve retirar esta linha se o seu servidor já estiver iniciando a sessão automaticamente.
//session_start();
mysqli_close($con);

// Unset all of the session variables
$_SESSION = array();
 
// Destroy the session.
session_destroy();


 
// Redirect to login page
header("location: ../login/");
exit;
?>