<?php
// Initialize the session
session_start();

//Define a variavel global do url do aplicativo
define('URL_APLICATIVO', '/unisen-main/');
define('PATH_USERIMAGES', '../../view/painel_usuarios/uploads/');

$_SESSION['url_aplicativo'] = URL_APLICATIVO;
$_SESSION['path_userimages'] = PATH_USERIMAGES;


if (isset($_SESSION["url_aplicativo"])) {
  $unisen_url = $_SESSION["url_aplicativo"];
}

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



$path = $_SERVER['DOCUMENT_ROOT'];
$path .= $unisen_url . 'app/config/database/conexao.php';
//echo $path;
include_once($path);

// Define variables and initialize with empty values
$username = $password = "";
$msg_resposta = $username_err = $password_err = $login_err = "";

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
    $username = trim($_POST["username"]);
  }

  // Check if password is empty
  if (empty(trim($_POST["password"]))) {
    $password_err = "Please enter your password.";
  } else {
    $password = trim($_POST["password"]);
  }

  // Prepare our SQL, preparing the SQL statement will prevent SQL injection.
  if ($stmt = $con->prepare("SELECT ID, senha FROM tbl_cadastrantes WHERE CPF = ?")) {
    // Bind parameters (s = string, i = int, b = blob, etc), in our case the username is a string so we use "s"
    $stmt->bind_param('s', $_POST['username']);
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

        $_SESSION['loggedin_cad'] = TRUE;
        $_SESSION['username'] = $_POST['username'];
        $_SESSION['id'] = $id;

        $sql_cadastrante_logado = "SELECT * FROM tbl_cadastrantes WHERE ID = $id";
        $dados_do_cadastrante = mysqli_query($con, $sql_cadastrante_logado);

        $cadastrante = mysqli_fetch_array($dados_do_cadastrante, MYSQLI_ASSOC);

        //echo $cadastrante['confirmacao'];       
        //echo 'Welcome ' . $_SESSION['name'] . '!';          
        if ($cadastrante['STATUS'] != "processando") {
          // Redirect user to continue register
          if ($cadastrante['STATUS'] != "novo") {
            $redirect_cadastro = "location: cadastro.php?confirmacao=" . $cadastrante['confirmacao'];
            header($redirect_cadastro);
          } else {
            $msg_resposta = "Cadastro não confirmado.<br>Verifique sua caixa de email.";
          }
        } else {
          $msg_resposta = "Cadastrante em verificação.<br>Em breve entraremos em contato.";
        }
      } else {
        // Incorrect password
        $msg_resposta = "Login ou senha errada, tente novamente!";
      }
    } else {
      // Username não existe
      $msg_resposta = "Cadastro de usuário inexistente!";
    }


    $stmt->close();
  }
  /* 
  // Validate credentials
  if (empty($username_err) && empty($password_err)) {
    // Prepare a select statement
    $sql = "SELECT * FROM login WHERE email='$username' AND senha='$password';";

    $login_query = mysqli_query($conexao, $sql);

    if ($login_query->num_rows == 0) {
      $login_err = "ERRO!: Senha e/ou usuário incorretos";
    } else {
      // Password is correct, so start a new session
      session_start();

      // Store data in session variables
      $_SESSION["loggedin"] = true;
      $_SESSION["id"] = $id;
      $_SESSION["username"] = $username;

      // Redirect user to welcome page
      header("location: ../inicio/");
    }
  }

  // Close connection
  mysqli_close($conexao); */
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
  <!-- CSS -->
  <link rel="stylesheet" href="../includes/template/assets/css/app.css">

  <link rel="stylesheet" href="css/styles.css">

  <style>
    .loader {
      position: fixed;
      left: 0;
      top: 0;
      width: 100%;
      height: 100%;
      background-color: #ffffff;
      z-index: 9998;
      text-align: center;
    }

    .plane-container {
      position: absolute;
      top: 50%;
      left: 50%;
    }
  </style>
  <!-- Js -->
  <!--
    --- Head Part - Use Jquery anywhere at page.
    --- http://writing.colin-gourlay.com/safely-using-ready-before-including-jquery/
    -->
  <script>
    (function(w, d, u) {
      w.readyQ = [];
      w.bindReadyQ = [];

      function p(x, y) {
        if (x == "ready") {
          w.bindReadyQ.push(y);
        } else {
          w.readyQ.push(x);
        }
      };
      var a = {
        ready: p,
        bind: p
      };
      w.$ = w.jQuery = function(f) {
        if (f === d || f === u) {
          return a
        } else {
          p(f)
        }
      }
    })(window, document);
  </script>
</head>

<body>
  <div id="loader" class="loader">
    <div class="plane-container">
      <div class="preloader-wrapper big active">
        <div class="spinner-layer spinner-blue">
          <div class="circle-clipper left">
            <div class="circle"></div>
          </div>
          <div class="gap-patch">
            <div class="circle"></div>
          </div>
          <div class="circle-clipper right">
            <div class="circle"></div>
          </div>
        </div>

        <div class="spinner-layer spinner-red">
          <div class="circle-clipper left">
            <div class="circle"></div>
          </div>
          <div class="gap-patch">
            <div class="circle"></div>
          </div>
          <div class="circle-clipper right">
            <div class="circle"></div>
          </div>
        </div>

        <div class="spinner-layer spinner-yellow">
          <div class="circle-clipper left">
            <div class="circle"></div>
          </div>
          <div class="gap-patch">
            <div class="circle"></div>
          </div>
          <div class="circle-clipper right">
            <div class="circle"></div>
          </div>
        </div>

        <div class="spinner-layer spinner-green">
          <div class="circle-clipper left">
            <div class="circle"></div>
          </div>
          <div class="gap-patch">
            <div class="circle"></div>
          </div>
          <div class="circle-clipper right">
            <div class="circle"></div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <?php
  if (isset($_GET['erro'])) {
    $login_err = 'Usuário já está Logado';
  }

  if (!empty($login_err)) {
    echo '<div class="alert alert-danger">' . $login_err . '</div>';
  }

  ?>


  <div class="container-scroller">
    <div class="container-fluid">
      <?php
      if ($msg_resposta != "") {
        echo "<div class='toast' data-title='Erro' data-message='$msg_resposta' data-type='error'></div>";
      }
      ?>
      <div class="row">
        <div class="content-wrapper full-page-wrapper d-flex align-items-center auth-pages">
          <div class="card col-lg-4 mx-auto">
            <div class="card-body px-5 py-5">
              <h3 class="card-title text-left mb-3">Login do Associado</h3>
              <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                <div class="form-group">
                  <input type="text" name="username" id="cpf" placeholder="CPF do Associado" class="cpf form-control p_input <?php echo (!empty($username_err)) ? 'is-invalid' : ''; ?>">
                  <span class="invalid-feedback"><?php echo $username_err; ?></span>

                </div>
                <div class="form-group">
                  <input type="text" name="password" placeholder="Senha" class="form-control p_input <?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>">
                  <span class="invalid-feedback"><?php echo $password_err; ?></span>
                </div>
                <div class="form-group" style="text-align: right;">

                  <a href="forgot-password.php" class="forgot-pass">Recuperar Senha</a>
                </div>
                <div class="text-center">
                  <button type="submit" class="btn btn-primary btn-block enter-btn">Entrar</button>
                </div>
                <p class="Or-login-with my-3">Faça aqui seu cadastro:</p>
                <div class="text-center">
                  <a href="../register/" class="btn green lighten-2 text-white btn-block">Cadastro de Associado</a>
                  <a href="../login/" class="btn btn-danger btn-block"> Voltar</a>
                 
                </div>
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

  <!--/#app -->
  <script src="../includes/template/assets/js/app.js"></script>

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

  <!--
--- Footer Part - Use Jquery anywhere at page.
--- http://writing.colin-gourlay.com/safely-using-ready-before-including-jquery/
-->
  <script>
    (function($, d) {
      $.each(readyQ, function(i, f) {
        $(f)
      });
      $.each(bindReadyQ, function(i, f) {
        $(d).bind("ready", f)
      })
    })(jQuery, document)
  </script>


</body>

</html>