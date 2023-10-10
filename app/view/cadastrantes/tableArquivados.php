<?php


//CLASSE CLIENTE - PDO CRUD MYSQL
require_once '../../config/database/conexao.php'; //'./config/database.php';


$sql_usuario_logado = "SELECT * FROM tbl_users WHERE id = $id";
$dados_do_usuario = mysqli_query($con, $sql_usuario_logado);
$_SESSION['userlogin'] = mysqli_fetch_array($dados_do_usuario, MYSQLI_ASSOC);

$sql_arquivados = "SELECT * FROM tbl_cadastro_arquivado ORDER BY ID DESC";
$CadastrantesArquivados = mysqli_query($con, $sql_arquivados);

//$Arquivados =  mysqli_fetch_array($CadastrantesArquivados, MYSQLI_ASSOC);
//print_r($Arquivados);

?>
<form>
    <table class="table compact nowrap table-hover r-0" id="tbl_cadastrantes_arquivados">
        <thead>
            <tr class="no-b">
                <th>ID</th>
                <th>Nome Completo</th>
                <th>CRM</th>
                <th class="item-telefone">Telefone</th>
                <!-- <th>Email</th> -->
                <th>CPF</th>
                <th>Status</th>
                <th>(Zip / Docs)</th>
                <th class="item-acoes-arquivados">Ações</th>

            </tr>
        </thead>

        <tbody>

            <?php while ($Arquivados =  mysqli_fetch_array($CadastrantesArquivados, MYSQLI_ASSOC)) : ?>


                <tr role="row" class="even dcadastrante-arq" data-id="<?php echo $Arquivados['ID']; ?>">

                    <?php $avatar_letter = strtolower(substr(tirarAcentos($Arquivados['NOME COMPLETO']), 0, 1)); ?>

                    <td class="dcadastrante-arqitem"><?php echo $Arquivados['ID']; ?></td>

                    <td class="dcadastrante-arqitem">
                        <div class="avatar avatar-md mr-3 mt-1 float-left">
                            <span class="avatar-letter <?php echo "avatar-letter-$avatar_letter"; ?> avatar-md circle"></span>
                        </div>
                        <div>
                            <div class="item_nomesocio">
                                <strong><?php echo nome_abreviado($Arquivados['NOME COMPLETO']); ?></strong>
                            </div>
                            <small><?php echo $Arquivados['E-MAIL']; ?></small>
                        </div>
                    </td>

                    <td class="dcadastrante-arqitem"><?php echo $Arquivados['CRM']; ?></td>

                    <td class="dcadastrante-arqitem item-telefone"><?php echo $Arquivados['TELEFONE']; ?></td>
                    <td class="dcadastrante-arqitem"><span class="r-3 badge badge-success "><?php echo $Arquivados['CPF']; ?></span></td>


                    <?php
                    switch ($Arquivados['STATUS']) {
                        case "novo":
                            echo '<td class="dcadastrante-arqitem"><span class="icon icon-circle s-12 mr-2 text-danger"></span> Novo</td>';
                            break;
                        case "confirmado":
                            echo '<td class="dcadastrante-arqitem"><span class="icon icon-circle s-12 mr-2 text-primary"></span> Confirmado</td>';
                            break;
                        case "cadastrando":
                            echo '<td class="dcadastrante-arqitem"><span class="icon icon-circle s-12 mr-2 text-warning"></span> Cadastrando</td>';
                            break;
                        case "processando":
                            echo '<td class="dcadastrante-arqitem"><span class="icon icon-circle s-12 mr-2 text-success"></span> Em Verificação</td>';
                            break;
                        case "arquivado":
                            echo '<td class="dcadastrante-arqitem"><span class="icon icon-circle s-12 mr-2 text-danger"></span> Arquivado</td>';
                            break;

                        default:
                            echo '<td class="dcadastrante-arqitem"><span class="icon icon-circle s-12 mr-2 text-success"></span> Ativo</td>';
                    }
                    $path_docs = "../../register/" . "cadastrantes/" . $Arquivados['CRM'];
                    ?>
                    <td>
                        <?php

                        /* $documentos = conta_arquivos($path_docs);
                        if ($documentos != 0) echo "($documentos[0] / $documentos[1])";
                        else echo "(0/0)"; */

                        echo $Arquivados['CRM'] . ".zip";


                        ?>

                    </td>
                    <td class="item-acoes-arquivados">
                        <input type="hidden" name="pastaCadastranteArq_<?php echo $Arquivados['ID']; ?>" id="pastaCadastranteArq_<?php echo $Arquivados['ID']; ?>" value="<?php echo $Arquivados['CRM']; ?>">
                        <input type="hidden" name="nomeCadastranteArq_<?php echo $Arquivados['ID']; ?>" id="nomeCadastranteArq_<?php echo $Arquivados['ID']; ?>" value="<?php echo $Arquivados['NOME COMPLETO']; ?>">
                        <a href="#" class="desarquivar_cadastrante" data-id="<?php echo $Arquivados['ID']; ?>"><i class="icon-document-table text-green"></i></a>
                        <a href="#" class="btnExcluir_arquivado" data-id="<?php echo $Arquivados['ID']; ?>" style="margin-left:10px;"><i class="icon-trash-can3 text-danger"></i></a>
                    </td>
                </tr>
            <?php endwhile; ?>

        </tbody>
        <tfoot>
            <tr>
                <th>ID</th>
                <th>Nome Completo</th>
                <th>CRM</th>
                <th class="item-telefone">Telefone</th>
                <!-- <th>Email</th> -->
                <th>CPF</th>
                <th>Status</th>
                <th>(Zip / Docs)</th>
                <th class="item-acoes-arquivados">Ações</th>
            </tr>
        </tfoot>
    </table>
</form>

<?php

// Free result set
$CadastrantesArquivados->free_result();
$con->close();

?>