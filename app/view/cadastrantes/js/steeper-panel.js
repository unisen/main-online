$(document).ready(function() {

    var navListItems = $('div.setup-panel div a'),
        allWells = $('.setup-content'),
        allNextBtn = $('.nextBtn');
    allBackBtn = $('.backBtn');


    allWells.hide();

    navListItems.click(function(e) {
        e.preventDefault();
        var $target = $($(this).attr('href')),
            $item = $(this);

        if (!$item.hasClass('disabled')) {
            navListItems.removeClass('btn-success').addClass('btn-default');
            $item.addClass('btn-success');
            allWells.hide();
            $target.show();
            $target.find('input:eq(0)').focus();
        }
    });

    allNextBtn.click(function() {
        var curStep = $(this).closest(".setup-content"),
            curStepBtn = curStep.attr("id"),
            nextStepWizard = $('div.setup-panel div a[href="#' + curStepBtn + '"]').parent().next().children("a"),
            curInputs = curStep.find("input[type='text'],input[type='url']"),
            isValid = true;

        $(".form-group").removeClass("has-error");
        for (var i = 0; i < curInputs.length; i++) {
            if (!curInputs[i].validity.valid) {
                isValid = false;
                $(curInputs[i]).closest(".form-group").addClass("has-error");
            }
        }

        if (isValid) nextStepWizard.removeAttr('disabled').trigger('click');
    });

    allBackBtn.click(function() {
        var curStep = $(this).closest(".setup-content"),
            curStepBtn = curStep.attr("id"),
            nextStepWizard = $('div.setup-panel div a[href="#' + curStepBtn + '"]').parent().last().children("a"),
            curInputs = curStep.find("input[type='text'],input[type='url']"),
            isValid = true;

        $(".form-group").removeClass("has-error");
        for (var i = 0; i < curInputs.length; i++) {
            if (!curInputs[i].validity.valid) {
                isValid = false;
                $(curInputs[i]).closest(".form-group").addClass("has-error");
            }
        }

        if (isValid) nextStepWizard.removeAttr('disabled').trigger('click');
    });

    $('div.setup-panel div a.btn-success').trigger('click');
});

/* 
function autoPreencherDados() {
    $("#nome").val("Diego Fernandes Neves Oliveira");
    $("#estadocivil").val("casado");
    $("#sexo").val("masculino");

    $("#dn").val("1982-01-08");
    $("#cpf").val("942.495.801-30");
    //$("#file").val("teste");

    $("#rg").val("430.427.4");
    $("#oexp").val("SSP");
    $("#rg_uf").val("GO");

    $("#dexp").val("2023-06-20");
    $("#nome_pai").val("Dario Fernandes de Oliveira");
    $("#nome_mae").val("Eneusa Maria da Silva Neves");

    $("#nacionalidade").val("brasileira");
    $("#naturalidade").val("Ipatinga");
    $("#nat_uf").val("GO");

    $("#titulo").val("6465456");
    $("#pis").val("4535355");
    $("#telefone").val("(62) 99265-8254");

    $("#endereco").val("Rua 36, 115, Setor Marista");
    $("#endereco_nome").val("SIM");
    $("#email").val("dfno82@gmail.com");

    $("#crm").val("696969");
    $("#crm_uf").val("GO");
    $("#id-escala").val("escala1");

    $("#senha").val("123456");
    $("#senha-confirma").val("123456");

} */