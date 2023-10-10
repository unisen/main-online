const sNome = ['DA', 'DE', 'DO', 'FILHO', 'JUNIOR', 'JÚNIOR'];


function optChangeIdEscala(limparChar) {
    if (limparChar) {
        limparChar.value = limparChar.value.replace(/[^0-9]+/g, "");
    }
    var crm = document.getElementById('crm');
    var opt = document.getElementById('nome').value.toUpperCase().split(" ");
    var selectId = document.getElementById('id-escala');
    var uf = document.getElementById('crm_uf');
    while (selectId.options.length > 1) {
        selectId.remove(1);
    }
    if ((opt.length > 1) && (crm.value.replace(/\s/g, '') != '') && (uf.options[uf.selectedIndex].value != null) && (uf.options[uf.selectedIndex].value != '')) {
        for (i = 1; i < opt.length; i++) {
            var noOpt = false;
            sNome.forEach(function(item) {
                if (item == opt[i]) {
                    //alert((item == opt[i]))
                    noOpt = true;
                }
            });
            //alert(noOpt)
            if (noOpt != true) {
                if (uf.options[uf.selectedIndex].value != 'GO') {
                    var ufValue = uf.options[uf.selectedIndex].value
                } else ufValue = '';
                var newOpt = document.createElement("option");
                newOpt.value = opt[0] + ' ' + opt[i] + ' ' + '(' + document.getElementById('crm').value + ufValue + ')';
                newOpt.text = opt[0] + ' ' + opt[i] + ' ' + '(' + document.getElementById('crm').value + ufValue + ')';
                selectId.add(newOpt);
            }
        }
    }
    if ((opt.length == 1) && (opt[0] != '') && (crm.value.replace(/\s/g, '') != '') && (uf.options[uf.selectedIndex].value != null) && (uf.options[uf.selectedIndex].value != '')) {
        var noOpt = false;
        if (uf.options[uf.selectedIndex].value != 'GO') {
            var ufValue = uf.options[uf.selectedIndex].value
        } else ufValue = '';
        var newOpt = document.createElement("option");
        newOpt.value = opt[0] + ' ' + '(' + document.getElementById('crm').value + ufValue + ')';
        newOpt.text = opt[0] + ' ' + '(' + document.getElementById('crm').value + ufValue + ')';
        selectId.add(newOpt);
    }
}

function selectIdEscala() {
    /* if (limparChar) {
        limparChar.value = limparChar.value.replace(/[^0-9]+/g, "");
    } */

    //var nomeAssociado = document.getElementById('nome').value.toUpperCase().split(" ");

    var crm = document.getElementById('crm');
    var opt = document.getElementById('nome').value.toUpperCase().split(" ");
    var selectId = document.getElementById('id-escala');
    var uf = document.getElementById('crm_uf');



    while (selectId.options.length > 1) {
        selectId.remove(1);
    }
    for (i = 1; i < opt.length; i++) {

        var option = document.createElement("option");
        var opt1 = opt[0] + ' ' + opt[i] + ' (' + crm.value + ')';


        option.text = opt1;
        option.value = opt1;
        selectId.add(option);
    }

    if ((opt.length > 1) && (crm.value.replace(/\s/g, '') != '') && (uf.options[uf.selectedIndex].value != null) && (uf.options[uf.selectedIndex].value != '')) {

        for (i = 1; i < opt.length; i++) {
            var noOpt = false;
            sNome.forEach(function(item) {
                if (item == opt[i]) {
                    //alert((item == opt[i]))
                    noOpt = true;
                }
            });
            //alert(noOpt);
            if (noOpt != true) {
                if (uf.options[uf.selectedIndex].value != 'GO') {
                    var ufValue = uf.options[uf.selectedIndex].value
                } else ufValue = '';
                var newOpt = document.createElement("option");
                newOpt.value = opt[0] + ' ' + opt[i] + ' ' + '(' + document.getElementById('crm').value + ufValue + ')';
                newOpt.text = opt[0] + ' ' + opt[i] + ' ' + '(' + document.getElementById('crm').value + ufValue + ')';
                selectId.add(newOpt);
            }
        }
    }
    if ((opt.length == 1) && (opt[0] != '') && (crm.value.replace(/\s/g, '') != '') && (uf.options[uf.selectedIndex].value != null) && (uf.options[uf.selectedIndex].value != '')) {
        var noOpt = false;
        if (uf.options[uf.selectedIndex].value != 'GO') {
            var ufValue = uf.options[uf.selectedIndex].value
        } else ufValue = '';
        var newOpt = document.createElement("option");
        newOpt.value = opt[0] + ' ' + '(' + document.getElementById('crm').value + ufValue + ')';
        newOpt.text = opt[0] + ' ' + '(' + document.getElementById('crm').value + ufValue + ')';
        selectId.add(newOpt);
    }
}


function selectIdEscalaEditar() {
    /* if (limparChar) {
        limparChar.value = limparChar.value.replace(/[^0-9]+/g, "");
    } */

    //var nomeAssociado = document.getElementById('nome').value.toUpperCase().split(" ");

    var crm = document.getElementById('editar_crm');
    var opt = document.getElementById('editar_nome').value.toUpperCase().split(" ");
    var selectId = document.getElementById('editar_id_escala');
    var uf = document.getElementById('crm_uf');



    while (selectId.options.length > 1) {
        selectId.remove(1);
    }
    for (i = 1; i < opt.length; i++) {

        var option = document.createElement("option");
        var opt1 = opt[0] + ' ' + opt[i] + ' (' + crm.value + uf.value + ')';


        option.text = opt1;
        option.value = opt1;
        selectId.add(option);
    }

}


function selectIdEscala2(nome_completo = '0') {
    /* if (limparChar) {
        limparChar.value = limparChar.value.replace(/[^0-9]+/g, "");
    } */

    //var nomeAssociado = document.getElementById('nome').value.toUpperCase().split(" ");

    var crm = document.getElementById('crm');
    if (nome_completo != '0') {
        var opt = nome_completo.toUpperCase().split(" ");;
    }
    else {
        var opt = document.getElementById('nome').value.toUpperCase().split(" ");
    }
   
    if (document.getElementById('id-escala') === null) {
        var selectId = document.getElementById('editar_id_escala');
    }
    var uf = document.getElementById('crm_uf');



    while (selectId.options.length > 1) {
        selectId.remove(1);
    }
    for (i = 1; i < opt.length; i++) {

        var option = document.createElement("option");
        var opt1 = opt[0] + ' ' + opt[i] + ' (' + crm.value + ')';


        option.text = opt1;
        option.value = opt1;
        selectId.add(option);
    }

    if ((opt.length > 1) && (crm.value.replace(/\s/g, '') != '') && (uf.options[uf.selectedIndex].value != null) && (uf.options[uf.selectedIndex].value != '')) {

        for (i = 1; i < opt.length; i++) {
            var noOpt = false;
            sNome.forEach(function(item) {
                if (item == opt[i]) {
                    //alert((item == opt[i]))
                    noOpt = true;
                }
            });
            //alert(noOpt);
            if (noOpt != true) {
                if (uf.options[uf.selectedIndex].value != 'GO') {
                    var ufValue = uf.options[uf.selectedIndex].value
                } else ufValue = '';
                var newOpt = document.createElement("option");
                newOpt.value = opt[0] + ' ' + opt[i] + ' ' + '(' + document.getElementById('crm').value + ufValue + ')';
                newOpt.text = opt[0] + ' ' + opt[i] + ' ' + '(' + document.getElementById('crm').value + ufValue + ')';
                selectId.add(newOpt);
            }
        }
    }
    if ((opt.length == 1) && (opt[0] != '') && (crm.value.replace(/\s/g, '') != '') && (uf.options[uf.selectedIndex].value != null) && (uf.options[uf.selectedIndex].value != '')) {
        var noOpt = false;
        if (uf.options[uf.selectedIndex].value != 'GO') {
            var ufValue = uf.options[uf.selectedIndex].value
        } else ufValue = '';
        var newOpt = document.createElement("option");
        newOpt.value = opt[0] + ' ' + '(' + document.getElementById('crm').value + ufValue + ')';
        newOpt.text = opt[0] + ' ' + '(' + document.getElementById('crm').value + ufValue + ')';
        selectId.add(newOpt);
    }
}




function onCloseModals(){
    location.reload();
}