<?php

$params = "ORDER BY ID DESC"; // . $id_usuario;

$CadastranteDAO = new CadastranteDAO();

$Cadastrantes = $CadastranteDAO->selectNewCadastrante($params);


$_SESSION['lista_cadastrantes'] = $Cadastrantes;


// $path = $path_registro . $pasta_cadastrante
//removeFiles($path);

//print_r($cadastrantes)
?>

<div class="table-responsive" id="container-cadastrantes">
    <form>
        <table class="table compact nowrap table-hover r-0" id="tbl_cadastrantes">
            <thead>
                <tr class="no-b">
                    <th>ID</th>
                    <th>Nome Completo</th>
                    <th>CRM</th>
                    <th class="item-telefone">Telefone</th>
                    <!-- <th>Email</th> -->
                    <th>CPF</th>
                    <th>Status</th>
                    <th>(Docs/Files)</th>
                    <th class="item-acoes">Ações</th>

                </tr>
            </thead>

            <tbody>

                <?php foreach ($Cadastrantes as $row) : ?>

                    <tr role="row" class="even dcadastrante" data-id="<?php echo $row->id; ?>">

                        <?php $avatar_letter = strtolower(substr(tirarAcentos($row->nome_completo), 0, 1)); ?>

                        <td class="dcadastranteitem"><?php echo $row->id; ?></td>

                        <td class="dcadastranteitem">
                            <div class="avatar avatar-md mr-3 mt-1 float-left">
                                <span class="avatar-letter <?php echo "avatar-letter-$avatar_letter"; ?> avatar-md circle"></span>
                            </div>
                            <div>
                                <div class="item_nomesocio">
                                    <strong><?php echo nome_abreviado($row->nome_completo); ?></strong>
                                </div>
                                <small><?php echo $row->email; ?></small>
                            </div>
                        </td>

                        <td class="dcadastranteitem"><?php echo $row->crm; ?></td>

                        <td class="dcadastranteitem item-telefone"><?php echo $row->telefone; ?></td>
                        <td class="dcadastranteitem"><span class="r-3 badge badge-success "><?php echo $row->cpf; ?></span></td>


                        <?php
                        switch ($row->status) {
                            case "novo":
                                echo '<td class="dcadastranteitem"><span class="icon icon-circle s-12 mr-2 text-danger"></span> Novo</td>';
                                break;
                            case "confirmado":
                                echo '<td class="dcadastranteitem"><span class="icon icon-circle s-12 mr-2 text-primary"></span> Confirmado</td>';
                                break;
                            case "cadastrando":
                                echo '<td class="dcadastranteitem"><span class="icon icon-circle s-12 mr-2 text-warning"></span> Cadastrando</td>';
                                break;
                            case "processando":
                                echo '<td class="dcadastranteitem"><span class="icon icon-circle s-12 mr-2 text-success"></span> Em Verificação</td>';
                                break;

                            default:
                                echo '<td class="dcadastranteitem"><span class="icon icon-circle s-12 mr-2 text-success"></span> Ativo</td>';
                        }
                        $path_docs = "../../register/" . "cadastrantes/" . $row->crm;
                        ?>
                        <td>
                            <?php

                            $documentos = conta_arquivos($path_docs);
                            if ($documentos != 0) echo "($documentos[0] / $documentos[1])";
                            else echo "(0/0)";

                            // Cria o diretorio de documentos do cadastrante senao houver
                            $diretorio = "cadastrantes";
                            // $perfil->crm - cadastrantes/99999GO
                            $pasta_cadastrante = $row->crm;                                
                            $path_arquivos_docs = "../../register/$diretorio/" . $pasta_cadastrante . "/";
                           if (!is_dir($path_arquivos_docs)) {
                            
                            mkdir($path_arquivos_docs, 0777, true);

                            }

                            ?>
                        </td>
                        <td class="item-acoes">
                            <a href="#modalViewCadastrante" data-target="#modalViewCadastrante" data-toggle="modal" class="visualizar_cadastrante" data-id="<?php echo $row->id; ?>"><i class="icon-eye text-green mr-3"></i></a>

                            <a href="#modalPainelDocumentos" data-target="#modalPainelDocumentos" data-toggle="modal" class="documentos_cadastrante" data-id="<?php echo $row->id; ?>"><i class="icon-paperclip text-black mr-3"></i></a>

                            <a href="#modalPainelDocumentos" data-target="#modalPainelDocumentos" data-toggle="modal" class="verificar_documentos_cadastrante" data-id="<?php echo $row->id; ?>"><i class="icon-note-checked text-gray mr-3"></i></a>

                            <a href="#modalEditarCadastrante" data-toggle="modal" class="dados_cadastrante" data-id="<?php echo $row->id; ?>">
                                <i class="icon-pencil text-yellow"></i></a>

                            <a href="#modalEditarDadosBancarios" data-toggle="modal" class="dados_bancarios_cadastrante" data-id="<?php echo $row->id; ?>">
                                <i class="icon-attach_money text-green" style="font-size: 16px;padding-left: 10px;"></i></a>

                            <a href="#" class="deletar_cadastrante btnExcluir" data-id="<?php echo $row->id; ?>" style="margin-left:10px;">
                                <input type="hidden" name="nomeCadastrante_<?php echo $row->id; ?>" id="nomeCadastrante_<?php echo $row->id; ?>" value="<?php echo $row->nome_completo; ?>">
                                <i class="icon-trash-can3 text-danger"></i>
                            </a>
                        </td>
                    </tr>
                <?php endforeach; ?>

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
                    <th>Files</th>
                    <th class="item-acoes"></th>
                </tr>
            </tfoot>
        </table>
    </form>
</div>


<!-- <div>
    <button class="btn btn-outline-success" onclick="extrair('888999GO')">
        Extrair
    </button>
</div> -->

<script>
    function extrair(pasta) {
        var url = '?zip=' + pasta;
        location.replace(url);
    }
</script>