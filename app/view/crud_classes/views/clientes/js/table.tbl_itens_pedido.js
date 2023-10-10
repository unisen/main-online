/*
 * Editor client script for DB table tbl_itens_pedido
 * Created by http://editor.datatables.net/generator
 */

(function($) {

    $(document).ready(function() {
        var editor = new $.fn.dataTable.Editor({
            ajax: 'php/table.tbl_itens_pedido.php',
            table: '#tbl_itens_pedido',
            fields: [{
                    "label": "id_pedido:",
                    "name": "id_pedido"
                },
                {
                    "label": "id_produto:",
                    "name": "id_produto",
                    "type": "select"
                },
                {
                    "label": "Valor Unitário:",
                    "name": "valor_unit",
                },
                {
                    "label": "unidade:",
                    "name": "unidade"
                },
                {
                    "label": "quantidade:",
                    "name": "quantidade"
                },
                {
                    "label": "valor:",
                    "name": "valor"
                }
            ],
            i18n: {
                create: {
                    button: "Novo",
                    title: "Adicionar Produto",
                    submit: "Add"
                },
                edit: {
                    button: "Editar",
                    title: "Editar Item",
                    submit: "Atualizar"
                },
                remove: {
                    button: "Deletar",
                    title: "Deletar Item",
                    submit: "Delete",
                    confirm: {
                        _: "Deseja remover %d Registro?",
                        1: "Tem certeza de que deseja excluir este registro?"
                    }
                }
            }
        });

        // Activate an inline edit on click of a table cell
        // Activate an inline edit on click of a table cell
        $('#tbl_itens_pedido').on('click', 'tbody td:not(:first-child)', function(e) {
            if ($(this).hasClass('control') || $(this).hasClass('select-checkbox')) {
                return;
            }
            editor.inline(this);
        });


        // Inline editing in responsive cell
        $('#tbl_itens_pedido').on('click', 'tbody ul.dtr-details li', function(e) {
            // Edit the value, but this selector allows clicking on label as well
            editor.inline($('span.dtr-data', this));
        });


        var table = $('#tbl_itens_pedido').DataTable({
            dom: 'Bfrtip',
            responsive: true,
            ajax: 'php/table.tbl_itens_pedido.php',
            columns: [{ // Responsive control column
                    data: null,
                    defaultContent: '',
                    className: 'control',
                    orderable: false
                },
                { // Checkbox select column
                    data: null,
                    defaultContent: '',
                    className: 'select-checkbox',
                    orderable: false
                },
                {
                    "data": "id_pedido"
                },
                {
                    "data": "id_produto"
                },
                {
                    "data": "valor_unit",
                    render: $.fn.dataTable.render.number('.', ',', 3, 'R$ ')
                },
                {
                    "data": "unidade"
                },
                {
                    "data": "quantidade"
                },
                {
                    "data": "valor",
                    render: $.fn.dataTable.render.number('.', ',', 3, 'R$ ')

                }

            ],
            select: true,
            lengthChange: false,
            buttons: [
                { extend: 'create', editor: editor },
                { extend: 'edit', editor: editor },
                { extend: 'remove', editor: editor }
            ]
        });
    });

}(jQuery));