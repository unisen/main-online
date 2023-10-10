<!DOCTYPE html>
<html>

<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
/* if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: ../../login/login2/login.php");
    exit;
} */
?>
 
<?php


$path = dirname(__FILE__);
$path .= '/../../config/functions/autenticaUsuario.php';
include_once($path); 

$path = dirname(__FILE__);
$path .= '/../../includes/UI/header.php';
include_once($path);
?>

<?php
      // Verifica se o vendedor já está homologado no sistema pelo administrador
      // dando acesso a ele permitido pela tipo de usuário e função
      if(isset($_SESSION['id_usuario'])) {

        $vendedor = $_SESSION['id_usuario'];
        
        $sql = "SELECT count(*) as vendedor_homologado FROM tbl_users WHERE id = '$vendedor'";
        
        $con = mysqli_connect('localhost:10040','root','root','rotadb');
      
        $result = mysqli_query($con,$sql); 
        while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) : 
        $resp = $row['vendedor_homologado'];                           
        endwhile;
    
        //echo gettype($resp);

        echo '<input type="hidden" name="homologacao" id="ckhomologacao" value="'.$resp.'">';
      }
?>


<body class="sidebar-mini sidebar-collapse" onload="verificahomologacao('<?php echo $resp; ?>')">

<!-- Site wrapper -->
<div class="wrapper">
  <!-- Navbar -->
  <?php
    $path = dirname(__FILE__);
    $path .= '/../../includes/UI/navbar.php';
    include_once($path);
   ?>
  <!-- /.navbar -->

  

    <!-- Sidebar -->
    <?php
    $path = dirname(__FILE__);
    $path .= '/../../includes/UI/sidebar.php';
    include_once($path);
   ?>
    <!-- /.sidebar -->
 

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
           
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#"></a></li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="row">
        <div class="col-md-12" style="text-align: center;">
        
          <img src="../../includes/dist/img/back.png" width="350" height="350">
        </div>
      </div>
      
      <!-- /.card -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <?php
    $path = dirname(__FILE__);
    $path .= '/../../includes/UI/footer.php';
    include_once($path);
   ?>
  

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<div class="position-absolute w-50 d-flex flex-column p-4">
    <!-- MENSAGEM DE AVISO SEM CNPF OU CPF CADASTRADO! -->
    <div class="toast ml-auto" id="naoHomologado" style="z-index: 1500 !important" data-delay="4000" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="toast-header">
            <strong class="mr-auto"><i class="fa fa-grav"></i>Ops</strong>
            <small style="color: red;"><i class="fas fa-exclamation-triangle"></i></small>
            <button type="button" class="ml-2 mb-1 close" data-dismiss="toast">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="toast-body">
            <div>VENDEDOR NÃO HOMOLOGADO<br>No Sistema!</div>
        </div>
    </div>

<!-- jQuery -->
<script src="../../includes/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../../includes/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../../includes/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../includes/dist/js/demo.js"></script>



<script>
 function verificahomologacao(id){
    if (id == '0'){
      keypress = confirm('Vendedor! Não homologado! No Sistema');
      if (keypress) {
        location.replace("https://rotaapp.local");
        }
      else {
        location.replace("https://rotaapp.local/login");
      }
      //document.write(keypress);
    }
  } 
</script>
</body>
</html>