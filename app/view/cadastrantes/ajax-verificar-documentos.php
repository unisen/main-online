<?php session_start();

//include "config.php";
//CLASSE CLIENTE - PDO CRUD MYSQL
require_once '../../DAO/config/database.php';
require_once '../../DAO/controllers/CadastranteDAO.php';

//Include libs private functions
require_once './libs/farquivos.php';

if (isset($_SESSION['path_documentos_registro'])) {
    $path_registro = $_SESSION['path_documentos_registro'];
}


$userid = 0;
if (isset($_POST['userid'])) {
    $userid = $_POST['userid'];
    $_SESSION['useridCadastrante'] = $userid;
    
    $params = "WHERE id = $userid"; // . $id_usuario;
    $CadastranteDAO = new CadastranteDAO();
    $Cadastrante = $CadastranteDAO->selectNewCadastrante($params);
    $dados = json_encode($Cadastrante);

    $perfil = $Cadastrante[0];
    //print_r($perfil);    
    $path_docs = "../../register/" . $perfil->arquivo;

    //pega pasta do documento
    $pasta_cadastrante = explode("/", $perfil->arquivo);
    $path_registro .= $pasta_cadastrante[1] . '/';

    $documentos = conta_arquivos($path_docs);

    echo "Lista de Arquivos: ";
    if ($documentos != 0) echo "($documentos[0] / $documentos[1])";
    else echo "(0/0)";



    echo "<br><br>" . monta_select_arquivos2($path_docs);
?>

    <!-- MODAL Documentos Cadastrante - FORM -->
    <input type="hidden" name="pdf_selecionado" id="pdf_selecionado" value="">
    <div class="pdf_display" style="height:600px !important">
        <!-- ../../register/cadastrantes/945479GO/JURANDIR ALVES TEIXEIRA - ANTECEDENTES ETICOS CRM [1].pdf -->
        <!-- <iframe src="teste2.php" id="docFrame" title="Documentos PDF" width= "100%" height= "auto" style="height:100%"> -->

        <iframe src="teste3.php" id="docFrame" title="Documentos PDF" style="width:100%; height:100%;" frameborder="0"></iframe>
        <?php
        /* // The location of the PDF file
                // on the server
                $filename = "../../app/register/cadastrantes/945479GO/JURANDIR ALVES TEIXEIRA - ANTECEDENTES ETICOS CRM [1].pdf";
                
                // Header content type
                header("Content-type: application/pdf");
                
                header("Content-Length: " . filesize($filename));
                
                // Send the file to the browser.
                readfile($filename); */

        ?>


    </div>


    <script>
        function mostra_documentoPDF(valor) {
            var pdf = document.getElementById("pdf_selecionado");

            pdf.value = valor.value;
            //alert(valor.value);
            //pdf.value = 'dsakjhh';
            var caminho = "<?php echo $path_registro; ?>";

            //alert(caminho + pdf.value);    

            document.getElementById("docFrame").src = caminho + pdf.value;

            //alert(document.getElementById("docFrame").src);

            var pdfSelect = caminho + valor.value;

            $.ajax({
                url: 'ajax-display-pdf.php',
                type: 'post',
                data: {
                    pdfSelect: pdfSelect
                },
                success: function(response) {
                    // Add response in Modal body
                    $('.pdf_display').html(response);

                    // Display Modal

                    /* $('#modalPainelDocumentos').modal({
                        remote: url,
                        refresh: true
                    }); */
                }
            });
            //pdf = valor.value;
            //alert(valor.value);
        }
    </script>

<?php }



/* $sql = "select * from employee where id=".$userid;
$result = mysqli_query($con,$sql);

$response = "<table border='0' width='100%'>";
while( $row = mysqli_fetch_array($result) ){
    $id = $row['id'];
    $emp_name = $row['emp_name'];
    $salary = $row['salary'];
    $gender = $row['gender'];
    $city = $row['city'];
    $email = $row['email'];
    
    $response .= "<tr>";
    $response .= "<td>Name : </td><td>".$emp_name."</td>";
    $response .= "</tr>";

    $response .= "<tr>";
    $response .= "<td>Salary : </td><td>".$salary."</td>";
    $response .= "</tr>";

    $response .= "<tr>";
    $response .= "<td>Gender : </td><td>".$gender."</td>";
    $response .= "</tr>";

    $response .= "<tr>";
    $response .= "<td>City : </td><td>".$city."</td>";
    $response .= "</tr>";
    
    $response .= "<tr>";
    $response .= "<td>Email : </td><td>".$email."</td>";
    $response .= "</tr>";

}
$response .= "</table>";
 */

//echo $response;
exit;
