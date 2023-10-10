<?php //session_start();

// Atualizar código em 10 Segundos. Não é necessário, porém se você quiser fazer basta descomentar a linha abaixo.
//echo "<meta http-equiv='refresh' content='10;'>";

// Começando com a abertura da comunicação entre o php e o banco de dados.
// O texto em verde você deve alterar para as informações do seu usuário do Mysql.

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
// Php Inicia a Sessão no MySql. Você deve retirar esta linha se o seu servidor já estiver iniciando a sessão automaticamente.
//session_start();

$session=session_id();
if (!isset($_SESSION['useronline'])) $_SESSION['useronline'] = $session;

$time=time();
// Abaixo, estabelece quanto tempo o contador irá permanecer contando o usuário (neste caso 10 minutos).
$time_check=$time-60;

$nome = $_SESSION['name'];
$usuario = $_SESSION['username'];


// Nome da tabela criada no MySql.
$tbl_name = "useronline";

$sql5="DELETE FROM $tbl_name WHERE time<$time_check";
$result5=mysqli_query($con, $sql5);


$sqlcheck_online = "SELECT * FROM $tbl_name WHERE username = '$usuario'";
$result_check = mysqli_query($con, $sqlcheck_online);
$count_check = mysqli_num_rows($result_check);


$sql = "SELECT * FROM $tbl_name WHERE session='$session'";
$result = mysqli_query($con, $sql);
$count = mysqli_num_rows($result);

$UserOnline = mysqli_fetch_array($result, MYSQLI_ASSOC);

if (isset($UserOnline)) $_SESSION['useronline'] = $UserOnline['session'];

// Array ( [username] => 94249580130 [nome] => Diego Oliveira [session] => uctiaqv6lungninrg1jqmsssk5 [time] => 1688710070 )
//print_r($UserOnline);
if ($count_check == "1" && $UserOnline['session'] != $session) {
    session_destroy();
    //print_r($result);
    header("location: ../../login/?erro=1");
    exit;
}

if ($count == "0"){
    
    $sql1 = "INSERT INTO $tbl_name(username, nome, session, time) VALUES ('$usuario', '$nome','$session', '$time')";
    $result1 = mysqli_query($con, $sql1);

} else {
   
    $sql2 = "UPDATE $tbl_name SET time='$time' WHERE session='$session'";
    $result2=mysqli_query($con, $sql2);
}

$sql3 = "SELECT * FROM $tbl_name";
$result3=mysqli_query($con, $sql3);
$count_user_online=mysqli_num_rows($result3);
$show_user = "<div style='width:100%;margin:0px auto;text-align:center;color:#280;font-size:160%;'>".$count_user_online." ONLINE</div>";

$sql4="DELETE FROM $tbl_name WHERE time<$time_check";
$result4=mysqli_query($con, $sql4);
mysqli_close($con);

$_SESSION['show_user'] = $count_user_online;

//$_SESSION['show_user'] = $_SESSION['name'];
//echo $show_user;
