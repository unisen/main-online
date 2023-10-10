/*
 * Editor client script for DB table tbl_pedidos_venda
 * Created by http://editor.datatables.net/generator
 */

(function($) {

    $(document).ready(function() {
        var pedidosEditor = new $.fn.dataTable.Editor({
            ajax: 'php/table.tbl_pedidos_venda.php',
            table: '#tbl_pedidos_venda',
            fields: [{
                    "label": "numero_pedido:",
                    "name": "numero_pedido"
                },
                {
                    "label": "data_registro:",
                    "name": "data_registro",
                    "type": "datetime",
                    "format": "DD\/MM\/YY HH:mm"
                },
                {
                    "label": "vendedor:",
                    "name": "id_vendedor",
                    "type": "select"
                },
                {
                    "label": "id_cliente:",
                    "name": "id_cliente",
                    "type": "select"
                },
                {
                    "label": "desconto:",
                    "name": "desconto",
                    "value": 0
                },
                {
                    "label": "observacoes:",
                    "name": "observacoes",
                    "type": "textarea"
                },
                {
                    "label": "situacao:",
                    "name": "situacao",
                    "type": "select",
                    "options": [
                        "Em aberto",
                        "Atendido",
                        "Cancelado",
                        "Em Andamento",
                        "Venda Agenciada",
                        "Editando",
                        "Concluida"
                    ]
                },
                {
                    "label": "subtotal:",
                    "name": "subtotal",
                    "value": 0
                },
                {
                    "label": "frete:",
                    "name": "frete",
                    "value": 0
                },
                {
                    "label": "valor_total:",
                    "name": "valor_total",
                    "value": 0
                }
            ],
            i18n: {
                create: {
                    button: "Novo",
                    title: "Criar Pedido de Venda",
                    submit: "Criar"
                },
                edit: {
                    button: "Editar",
                    title: "Editar Pedido",
                    submit: "Atualizar"
                },
                remove: {
                    button: "Deletar",
                    title: "Deletar Pedido",
                    submit: "Delete",
                    confirm: {
                        _: "Deseja remover %d Registro?",
                        1: "Tem certeza de que deseja excluir este registro?"
                    }
                }
            }
        });
        window.editor = pedidosEditor;

        // Activate an inline edit on click of a table cell
        // Activate an inline edit on click of a table cell
        $('#tbl_pedidos_venda').on('click', 'tbody td:not(:first-child)', function(e) {
            if ($(this).hasClass('control') || $(this).hasClass('select-checkbox')) {
                return;
            }
            pedidosEditor.inline(this);
        });


        // Inline editing in responsive cell
        $('#tbl_pedidos_venda').on('click', 'tbody ul.dtr-details li', function(e) {
            // Edit the value, but this selector allows clicking on label as well
            pedidosEditor.inline($('span.dtr-data', this));
        });


        var pedidosTable = $('#tbl_pedidos_venda').DataTable({
            dom: 'Bfrtip',
            responsive: true,
            ajax: 'php/table.tbl_pedidos_venda.php',
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
                    "data": "numero_pedido"
                },
                {
                    "data": "data_registro"
                },
                {
                    "data": "id_vendedor"
                },
                {
                    "data": "id_cliente"
                },
                {
                    "data": "desconto"
                },
                {
                    "data": "observacoes"
                },
                {
                    "data": "situacao"
                },
                {
                    "data": "soma_itens"
                },
                {
                    "data": "subtotal"
                },
                {
                    "data": "frete"
                },
                {
                    "data": "valor_total"
                }
            ],
            order: [2, 'desc'],
            select: {
                style: 'single'
            },
            buttons: [
                { extend: 'create', editor: pedidosEditor },
                { extend: 'edit', editor: pedidosEditor },
                { extend: 'remove', editor: pedidosEditor }
            ]
        });
    });

}(jQuery));