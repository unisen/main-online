<div class="row my-3">

    <div class="col-md-12">
        <div class="dt-buttons">
            <button type="button" class="btn btn-outline-danger btn-sm" class="btn btn-danger" data-toggle="modal" data-target="#modalDeleteLogs" id="delete_selecionados" onclick="delete_selecionados()">Deletar Selecionados</button>
        </div>
        <hr>
        <div class="card r-0 shadow">
            <div class="table-wrap">

                <div class="table-responsive" id="container-logs">

                    <form>
                        <table class="table table-striped table-hover r-0" id="tbl_logs">
                            <thead>
                                <tr class="no-b">

                                    <th style="width: 10px">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" id="checkedAll" class="custom-control-input"><label class="custom-control-label" for="checkedAll"></label>
                                        </div>
                                    </th>

                                    <th>ID Log</th>
                                    <th>Usuário</th>
                                    <th>Ação</th>
                                    <th>Origem</th>
                                    <th>Tabela</th>
                                    <th>User IP</th>
                                    <th>Data Registro</th>
                                    <th></th>
                                    <th></th>
                                </tr>
                            </thead>

                            <tbody>

                                <?php foreach ($Logs as $row) : ?>

                                    <tr role="row" class="even dlog" data-id="<?php echo $row->id_log; ?>">
                                        <td>
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input checkSingle" onclick="selecionaItem(this)" <?php if(isset($row->id_log)) echo 'id="' . $row->id_log . '"'; ?> required><label class="custom-control-label" <?php if(isset($row->id_log)) echo 'for="' . $row->id_log . '"'; ?>></label>
                                            </div>
                                        </td>
                                        <td class="dlogitem"><?php echo $row->id_log; ?></td>
                                        <?php $avatar_letter = strtolower(substr(tirarAcentos($row->acao), 0, 1)); ?>
                                        <td class="dlogitem">
                                            <div class="avatar avatar-md mr-3 mt-1 float-left">
                                                <span class="avatar-letter <?php echo "avatar-letter-$avatar_letter"; ?>  avatar-md circle"></span>
                                            </div>
                                            <div>
                                                <div class="item_nomesocio">
                                                    <strong><?php echo $row->usuario; ?></strong>
                                                </div>
                                                <small><?php echo $row->username; ?></small>
                                            </div>
                                        </td>
                                        <td class="dlogitem"><?php echo $row->acao; ?></td>
                                        <td class="dlogitem"><?php echo $row->origem; ?></td>
                                        <td class="dlogitem"><?php echo $row->tabela; ?></td>
                                        <td class="dlogitem"><?php echo $row->ip_usuario; ?></td>
                                        <td class="dlogitem"><?php echo $row->dt_criacao; ?></td>
                                        <td>
                                            <a href="panel-page-profile.html"><i class="icon-eye mr-3"></i></a>
                                            <a href="#modalEditarlog" data-toggle="modal" class="dados_log" data-id="<?php echo $row->id_log; ?>">
                                                <i class="icon-pencil"></i></a>
                                        </td>
                                    </tr>

                                <?php endforeach; ?>

                            </tbody>
                        </table>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- INICIA O DATATABLE ASSOCIADO -->
<script>
    function delete_selecionados() {
        //var Selecionados = $('');
        var checks = document.querySelectorAll(".custom-control-input");
        let inputs = "";
        for (let i = 0; i < checks.length; i++) {
            if (checks[i].checked) {
                if (checks[i].id != "checkedAll") {
                    inputs += checks[i].id + ' ';
                }    
            }
            
        }
        console.log(inputs);
        inputs = inputs.trim();        
        const myArrayInputs = inputs.split(" ");
        
        var idlog = myArrayInputs.toString();

        //document.getElementById("ids_delete_logs").value = idlog;

        console.log(idlog);

          // AJAX request
          $.ajax({
            url: 'ajax-deletes.php',
            type: 'post',
            data: { idlog: idlog },
            success: function(response) {
                // Add response in Modal body
                if ($.trim(response) == 'sucesso') {
                    Swal.fire({
                        title: '',
                        text: "Logs Removidos com sucesso!",
                        icon: 'success',
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'OK'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            location.reload();

                        }
                    })
                }
                
                $('.modal-body').html(response);

                // Display Modal
                $('#modalDeleteLogs').modal('toggle');
            }
        });
    
       //alert(checks);
    }

    function selecionaItem (item) {
        //console.log(item.id);
        //alert(item.id);
    }

    var selected = Array();
    var dataSet = [];
    var rowItem = "";
    $(document).ready(function () {
       /*  var table = $("#tbl_logs").DataTable({
            "data": dataSet,
            "filter":false,
            "language": {
                "search": "",
                "searchPlaceholder": " Search"
            },
            "select": {
                "style": 'multi'
            },
            "ordering": true,
            "lengthChange": false,
            "autoWidth": true,
            "columns": [
               { "title": "Name"},
            ],
            "responsive": true,
            "processing":true,
        }).columns.adjust()
        .responsive.recalc();
        new $.fn.dataTable.FixedHeader(table);
 */
        var table = $('#tbl_logs').DataTable({
            "responsive": true,
            "autoWidth": true,
            "order": [
                [1, 'desc']
            ],
            columnDefs: [{
                    width: "5%",
                    responsivePriority: 1,
                    targets: [2, 3]
                },
                {
                    width: '20%',
                    responsivePriority: 2,
                    targets: 2
                }
            ]
        });

      

/*     $(document).ready(function() {

        var table = $('#tbl_logs').DataTable({
            "responsive": true,
            "autoWidth": true,
            "order": [
                [1, 'desc']
            ],
            columnDefs: [{
                    width: "5%",
                    responsivePriority: 1,
                    targets: [2, 3]
                },
                {
                    width: '20%',
                    responsivePriority: 2,
                    targets: 2
                }
            ]
        }); */

        //ajusta as colunas
        $('#container-logs').css('display', 'block');
        table.columns.adjust().draw();

        $('#tbl_logs tbody').on('click', 'tr td.dlogitem', function() {

            var data = table.row(this).data();

            //var url = "editar_pedido.php?numero=" + data[1];
            //window.location.replace(url);
        });

        $(".even, .odd").on("click", function() {
            var id = $(this).data("data-id");
            // alert(id); 
        });
    });
</script>
