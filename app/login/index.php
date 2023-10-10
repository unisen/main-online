<?php session_start();

//Define a variavel global do url do aplicativo
define('URL_APLICATIVO', '/unisen-main/');
define('PATH_USERIMAGES', '../../view/painel_usuarios/uploads/');

$_SESSION['url_aplicativo'] = URL_APLICATIVO;
$_SESSION['path_userimages'] = PATH_USERIMAGES;

function nome_curto_empresa($str)
{
  $str2 = explode(" - ", $str);
  $str = trim($str2[0]);
  return $str;
}

$empresa_json = json_decode(file_get_contents("../view/dados-empresa/configs-dados-empresa.json"));
$empresa_configs = $empresa_json[0];
$nome_empresa_title =  nome_curto_empresa($empresa_configs->nome_empresa);



// Check if the user is already logged in, if yes then redirect him to welcome page
/* if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
  header("location: ../login/");
  exit;
} */

if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
  $path = '';
} else {
  header("location: ../../app/view/inicio/");
  exit;
}


$path = $_SERVER['DOCUMENT_ROOT'];
$path .= URL_APLICATIVO . 'app/config/database/conexao.php';
//echo $path;
include_once($path);

// Define variables and initialize with empty values
$username = $password = "";
$username_err = $password_err = $login_err = "";

function nome_reduzido($nome_completo)
{
  $arrNomeCompleto = explode(" ", strtolower($nome_completo));

  $ultimo_nome = count($arrNomeCompleto);
  $nome_reduzido = "";
  $nome_reduzido .= ucfirst($arrNomeCompleto[0]) . " ";
  $nome_reduzido .= ucfirst($arrNomeCompleto[$ultimo_nome - 1]);

  return $nome_reduzido;
}

// Processing form data when form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {

  // Check if username is empty
  if (empty(trim($_POST["username"]))) {
    $username_err = "Please enter username.";
  } else {
    $username = trim(str_replace("-", "", str_replace(".", "", $_POST['username'])));
  }

  // Check if password is empty
  if (empty(trim($_POST["password"]))) {
    $password_err = "Please enter your password.";
  } else {
    $password = trim($_POST["password"]);
  }

  // Prepare our SQL, preparing the SQL statement will prevent SQL injection.
  if ($stmt = $con->prepare('SELECT id, password FROM tbl_users WHERE username = ?')) {
    // Bind parameters (s = string, i = int, b = blob, etc), in our case the username is a string so we use "s"
    $stmt->bind_param('s', $username);
    $stmt->execute();
    // Store the result so we can check if the account exists in the database.
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
      $stmt->bind_result($id, $password);
      $stmt->fetch();
      // Account exists, now we verify the password.
      // Note: remember to use password_hash in your registration file to store the hashed passwords.

      // $2y$10$SfhYIDtn.iOuCW7zfoFLuuZHX6lja4lF4XA4JqNmpiH/.P3zB8JCa
      if (password_verify($_POST['password'], $password)) {
        // Verification success! User has logged-in!
        // Create sessions, so we know the user is logged in, they basically act like cookies but remember the data on the server.
        session_regenerate_id();
        $_SESSION['loggedin'] = TRUE;
        $_SESSION['username'] = $username;
        $_SESSION['id'] = $id;

        $sql_usuario_logado = "SELECT * FROM tbl_users WHERE id = $id";
        $dados_do_usuario = mysqli_query($con, $sql_usuario_logado);
        $_SESSION['userlogin'] = mysqli_fetch_array($dados_do_usuario, MYSQLI_ASSOC);


        while ($row = mysqli_fetch_array($dados_do_usuario, MYSQLI_ASSOC)) :
          $nome_usuario_login = $row['nome'];
          $tipopessoa_login = $row['tipopessoa'];
        endwhile;


        $_SESSION['name'] = nome_reduzido($_SESSION['userlogin']['nome']);
        $_SESSION['tipopessoa_login'] = $tipopessoa_login;

        //echo 'Welcome ' . $_SESSION['name'] . '!';

        // Redirect user to welcome page
        header("location: ../view/inicio/");
      } else {
        // Incorrect password
        //echo 'Incorrect username and/or password!';
        $login_err = 'Username ou senha incorreta.';
      }
    } else {
      $login_err = "Usuário ou senha incorreta.";
      //echo "<div class='toast' data-title='Erro' data-message='$login_err' data-type='error'></div>";
      //echo "Usuário não existe.";
    }


    $stmt->close();
  }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title><?php echo $empresa_configs->nome_empresa; ?></title>
  <link rel="stylesheet" href="../includes/dist/node_modules/font-awesome/css/font-awesome.min.css" />
  <link rel="stylesheet" href="../includes/dist/node_modules/perfect-scrollbar/dist/css/perfect-scrollbar.min.css" />
  <link rel="stylesheet" href="../includes/dist/css/style.css" />

  <link rel="shortcut icon" href="../../favicon.ico" />

  <script src="js/validarcpfcliente.js"></script>
  <link rel="stylesheet" href="css/styles.css">

</head>

<body>

  <?php

  if (isset($_GET['erro'])) {
    $login_err = 'Usuário já está Logado';
    if (isset($_GET['msg'])) {
      $login_err = $_GET['msg'];
    }
  }

  if (!empty($login_err)) {
    echo '<div class="alert alert-danger">' . $login_err . '</div>';
    echo '<meta http-equiv="refresh" content="1; URL=\'logout.php\'" />';
  }

  ?>


  <div class="container-scroller">
    <div class="container-fluid">
      <div class="row">
        <div class="content-wrapper full-page-wrapper d-flex align-items-center auth-pages">
          <div class="card col-lg-4 mx-auto">
            <div class="card-body px-5 py-5">
              <h3 class="card-title text-left mb-3">Login</h3>
              <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                <div class="form-group">
                  <input type="text" name="username" id="cpf" placeholder="CPF do Usuário" class="cpf form-control p_input <?php echo (!empty($username_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $username; ?>" autocomplete="on" />
                  <span class="invalid-feedback"><?php echo $username_err; ?></span>

                </div>
                <div class="form-group">
                  <input type="text" name="password" placeholder="Password" class="form-control p_input <?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>">
                  <span class="invalid-feedback"><?php echo $password_err; ?></span>

                </div>
                <!-- <div class="form-group d-flex align-items-center justify-content-between">
                  <div class="form-check"><label><input type="checkbox" class="form-check-input">Lembrar</label></div>
                  <a href="#" class="forgot-pass">Recuperar Senha</a>
                </div> -->
                <div class="text-center">
                  <button type="submit" class="btn btn-primary btn-block enter-btn">Entrar</button>
                </div>
                <p class="Or-login-with my-3">Ou</p>
                <!-- <a href="#" class="facebook-login btn btn-facebook btn-block">Sign in with Facebook</a>
                <a href="#" class="google-login btn btn-google btn-block">Sign in with Google+</a> -->
                <a href="../register/login.php" class="btn btn-create-account btn-block">Login de Associado</a>
              </form>
              <div role="alert" class="alert alert-danger" id="alerta-erro"><strong>Oh snap!</strong> </div>
              <div role="alert" class="alert alert-success" id="alerta-ok"><strong>Well done!</strong> </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>


  <script src="../includes/dist/node_modules/jquery/dist/jquery.min.js"></script>
  <script src="../includes/dist/node_modules/popper.js/dist/umd/popper.min.js"></script>
  <script src="../includes/dist/node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
  <script src="../includes/dist/node_modules/perfect-scrollbar/dist/js/perfect-scrollbar.jquery.min.js"></script>
  <script src="../includes/dist/js/misc.js"></script>

  <script src="js/jquery.mask.js"></script>
  <script src="js/jquery.mask.min.js"></script>



  <script>
    function alertCPFInvalido(mensagem) {
      var cpfcliente = $("#cpf").val();

      if (cpfcliente != "") {


        if (mensagem == false) {
          mensagem = cpfcliente;

          var alertaErro = $("#alerta-erro");
          alertaErro.html("CPF Inválido!");
          alertaErro.css("display", "block");

          $("#cpf").val("");
          $("#cpf").focus();

          setTimeout(function() {
            alertaErro.css("display", "none");
          }, 2000);

        } else {
          //$("#toast-crm").toast('show');
          var alertaOk = $("#alerta-ok");

          alertaOk.html("CPF Válido!");

          alertaOk.css("display", "block");

          setTimeout(function() {
            alertaOk.css("display", "none");
          }, 2000);

          return true;
        }
      }
    }


    $(document).ready(function() {
      $('.cpf').mask('000.000.000-00');

      $("#cpf").focusout(function() {
        $(this).css("background-color", "#ffffff");
        var cpf = $("#cpf").val();
        alertCPFInvalido(TestaCPF(cpf));
        /*  setTimeout(function() {
             verificaCPF();
         }, 2200); */
      });
    });
  </script>

</body>

</html>