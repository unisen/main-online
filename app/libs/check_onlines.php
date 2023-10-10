<?php

if($_SERVER['HTTP_HOST'] == 'localhost' or strpos($_SERVER['HTTP_HOST'],"192.168") !== false) {
    // Change this to your connection info.
    $host="localhost";
    $username="root";
    $password="";
    $db_name="escala_db";
  }
  else {
    // Connection servidor.
    $host="localhost";
    $username="chefre17_unisen2107";
    $password="LgBkCfTv7DEP";
    $db_name="chefre17_dbunisen";
  }


// Abaixo estabelece a conexão com o banco.
$con = new mysqli($host, $username, $password, $db_name);
if ($con->connect_error) {
die("Mysql não Conectou: " . $con->connect_error);
}

else {
    echo "Conectou: <hr>";
}


$time=time();
// Abaixo, estabelece quanto tempo o contador irá permanecer contando o usuário (neste caso 10 minutos).
$time_check=$time-50;


// Nome da tabela criada no MySql.
$tbl_name = "useronline";

$sql5="DELETE FROM $tbl_name WHERE time<$time_check";

echo "SQL: $sql5";


$result5=mysqli_query($con, $sql5);

mysqli_close($con);