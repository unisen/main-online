<?php session_start();

if (isset($_SESSION['path_documentos_registro'])) {
    $path_registro = $_SESSION['path_documentos_registro'];
}



//include "config.php";
//CLASSE CLIENTE - PDO CRUD MYSQL
require_once '../../DAO/config/database.php';
require_once '../../DAO/controllers/CadastranteDAO.php';


//Include libs private functions
require_once './libs/farquivos.php';

$userid = 0;
if (isset($_POST['userid'])) {
    $userid = $_POST['userid'];
    $params = "WHERE id = $userid"; // . $id_usuario;
    $CadastranteDAO = new CadastranteDAO();
    $Cadastrante = $CadastranteDAO->selectNewCadastrante($params);
    $dados = json_encode($Cadastrante);

    $perfil = $Cadastrante[0];
    //print_r($perfil);    
    $path_docs = "../../register/" . $perfil->arquivo;

    $pasta_cadastrante = explode("/", $perfil->arquivo);


    $path_registro .= $pasta_cadastrante[1] . '/';

    $documentos = conta_arquivos($path_docs);

    //echo "<br><br>" . monta_select_arquivos($path_docs);

    $lista_de_arquivos = listar_documentos($path_docs);

    $cont_arquivos = 0;
?>
    <!-- MODAL Documentos Cadastrante - FORM -->
    <div class="card-header white">
        <?php
        echo "Lista de Arquivos: ";
        if ($documentos != 0) echo "($documentos[0] / $documentos[1])";
        else echo "(0/0)";
        ?>
    </div>
    <div class="card-body">
        <button type="button" class="btn btn-primary btn-lg green lighten-2 merge-docpdf" id="merge_pdfs" onclick="//selectPDFs()"><i class="icon-documents mr-2"></i>Unir Arquivos</button>

        <?php if ($_SERVER['HTTP_HOST'] == 'localhost' or strpos($_SERVER['HTTP_HOST'], "192.168") !== false) { ?>

            <!--     <a href="open_directory.php?pasta=<?php //echo $pasta_cadastrante[1]; 
                                                        ?>" type="button" class="btn btn-primary btn-lg" id="abrir_pasta_cadastrante"><i class="icon-document-bookmark mr-2"></i>Abrir Pasta Documentos</a> -->

            <a href="../../register/cadastrantes/?pasta=<?php echo $pasta_cadastrante[1]; ?>" type="button" class="btn btn-primary btn-lg" id="ver_pasta_cadastrante"><i class="icon-document-bookmark mr-2"></i>Ver Documentos</a>

        <?php } else { ?>
            <a href="../../register/cadastrantes/?pasta=<?php echo $pasta_cadastrante[1]; ?>" type="button" class="btn btn-primary btn-lg" id="ver_pasta_cadastrante"><i class="icon-document-bookmark mr-2"></i>Ver Documentos</a>
        <?php } ?>
    </div>

    <div id="pdf_files">
        <input type="hidden" id="documentos_selecionados" name="documentos_selecionados" value="0">

        <input type="hidden" name="crm_cadastrante_folder" id="crm_cadastrante_folder" value="<?php echo $pasta_cadastrante[1]; ?>">

        <table class="display" id="documentos_pdf" style="width: 100%;">
            <thead>
                <tr class="no-b">
                    <th>Select</th>
                    <th>Nome do Arquivo</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>

                <?php foreach ($lista_de_arquivos as $item) { ?>
                    <tr role="row" class="even dpdfdocumento" data-id="<?php echo $cont_arquivos; ?>">
                        <td>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="arquivos_select" id="arq_<?php echo $cont_arquivos; ?>" name="arq_<?php echo $cont_arquivos; ?>" value="<?php echo $item; ?>">
                            </div>
                        </td>
                        <td class="dpdfdocumentoitem">
                            <?php
                            $nome_arq_split = explode(" - ", $item);

                            echo $nome_arq_split[1];
                            ?>
                        </td>
                        <td>
                            <a href="#">
                                <i class="icon-edit"></i>
                            </a> &nbsp;
                            <a href="#">
                                <i class="icon-share-square-o text-success"></i>
                            </a> &nbsp;
                            <a href="#" class="btnDeleteArquivo" data-id="<?php echo $item; ?>">
                                <i class="icon-close2 text-danger-o text-danger"></i>
                            </a>
                        </td>
                    </tr>
                <?php $cont_arquivos++;
                } ?>

            </tbody>
        </table>
    </div>

    <script>
        $(document).ready(function() {
            $(".btnDeleteArquivo").click(function() {

                var nomearquivo = $(this).data('id');

                var pastacadastro = $("#crm_cadastrante_folder").val();

                //alert(pastaCadastro);

                $.ajax({
                    url: 'ajax-delete-documentos.php',
                    type: 'post',
                    data: {
                        pastacadastro: pastacadastro,
                        nomearquivo: nomearquivo
                    },
                    success: function(response) {
                        if ($.trim(response) == 'sucesso') {
                            Swal.fire({
                                title: '',
                                text: "Arquivo excluído com sucesso!",
                                icon: 'success',
                                confirmButtonColor: '#3085d6',
                                cancelButtonColor: '#d33',
                                confirmButtonText: 'OK'
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    location.reload();

                                }
                            })
                            //$('#delete_selecionados').modal('toggle');
                        } else {
                            Swal.fire({
                                title: '',
                                text: "Erro ao excluir arquivo." + response,
                                icon: 'error',
                                confirmButtonColor: '#3085d6',
                                cancelButtonColor: '#d33',
                                confirmButtonText: 'OK'
                            })
                        }

                    }
                });
            });


            $("#deleteCadastranteArquivado").on('show.bs.modal', function() {
                var nomeCliente = $("#nome_delete_cadastranteArq").val();
                $("#nomeCadastranteDeleteArq").text(nomeCliente);

            });
        });
    </script>

    <script>
        function selectPDFs(path_registro) {
            var arqSelected = $('.arquivos_select');
            var docSelect = new Array();

            for (let i = 0; i < arqSelected.length; i++) {
                if (arqSelected[i].checked == true) {
                    docSelect.push(path_registro + arqSelected[i].value);
                }
            }

            $('#documentos_selecionados').val(docSelect.toString());
            //alert($('#documentos_selecionados').val());            
        }


        $(document).ready(function() {
            $('.merge-docpdf').click(function() {

                selectPDFs('<?php echo $path_registro; ?>');
                var arrarquivos = $('#documentos_selecionados').val();

                $.ajax({
                    url: 'ajax-merge.php',
                    type: 'post',
                    data: {
                        arrarquivos: arrarquivos
                    },
                    success: function(response) {
                        if ($.trim(response) == 'sucesso') {
                            Swal.fire({
                                title: '',
                                text: "Arquivos mesclados com sucesso!",
                                icon: 'success',
                                confirmButtonColor: '#3085d6',
                                cancelButtonColor: '#d33',
                                confirmButtonText: 'OK'
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    location.reload();

                                }
                            })
                            //$('#delete_selecionados').modal('toggle');
                        } else {
                            Swal.fire({
                                title: '',
                                text: "Erro ao mesclar arquivos.\n" + response,
                                icon: 'Erro',
                                confirmButtonColor: '#3085d6',
                                cancelButtonColor: '#d33',
                                confirmButtonText: 'OK'
                            })
                        }
                    }
                });
            });
        });
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
