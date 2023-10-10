$(document).ready(function(e) {
    // Submit form data via Ajax
    $("#fupForm").on('submit', function(e) {
        e.preventDefault();
        $.ajax({
            type: 'POST',
            url: 'submit.php',
            data: new FormData(this),
            dataType: 'json',
            contentType: false,
            cache: false,
            processData: false,
            beforeSend: function() {
                $('.submitBtn').attr("disabled", "disabled");
                $('#fupForm').css("opacity", ".5");
            },
            success: function(response) {
                $('.statusMsg').html('');
                if (response.status == 1) {
                    $('#fupForm')[0].reset();
                    $('.statusMsg').html('<p class="alert alert-success">' + response.message + '</p>');
                } else {
                    $('.statusMsg').html('<p class="alert alert-danger">' + response.message + '</p>');
                }
                $('#fupForm').css("opacity", "");
                $(".submitBtn").removeAttr("disabled");
            }
        });
    });
});

// File type validation
$("#fileToUpload").change(function() {
    var file = this.files[0];
    var fileType = file.type;
    var match = ['application/pdf', 'application/msword', 'application/vnd.ms-office', 'image/jpeg', 'image/png', 'image/jpg'];
    if (!((fileType == match[0]) || (fileType == match[1]) || (fileType == match[2]) || (fileType == match[3]) || (fileType == match[4]) || (fileType == match[5]))) {
        alert('Sorry, only PDF, DOC, JPG, JPEG, & PNG files are allowed to upload.');
        $("#fileToUpload").val('');
        return false;
    }
});

function nomePastaCadastrante() {

    var crm = document.getElementById('crm_cadastrante');
    var nome = document.getElementById('nome_cadastrante');
    var nome_cadastrante = nome.value.toUpperCase();
    var crm_uf = document.getElementById('crm_uf_cadastrante');
    var nome_pasta = document.getElementById('pasta_cadastrante');

    var nome_completo_cadastrante = document.getElementById('nome_completo_cadastrante');

    if ((nome.value != '') && (crm.value != '')) {
        var ufValue = crm_uf.options[crm_uf.selectedIndex].value;
        var criar_pastas_documentos = document.getElementById('criar_pastas_documentos');
        criar_pastas_documentos.style.display = 'block';
        nome_pasta.value = crm.value + ufValue;
        nome_completo_cadastrante.value = nome_cadastrante;
    } else {
        if (nome.value == '') {
            alert('Campo Nome não preenchido');
            nome.focus();
            return;
        }
        if (crm.value == '') {
            alert('Campo CRM não preenchido');
            crm.focus();
            return;
        }
    }

}



function validarDocumentos() {

    erro_count_upload = 0;

    if (erro_count_upload == 0) {
        erro_count_upload = 0;
        //validarUploadsForm();
    } else {
        document.getElementById('enviar-loading').classList.remove('loading');
    }
}

function validarUploadsForm() {
    document.getElementById('enviar-loading').classList.add('loading');
    count_ajax = 0;
    //var session = '<?php echo $_SESSION['nome'];?>'
    var session = document.getElementById('nome_cadastrante').value;

    if (session == '') {
        window.location.replace('sessionfailure.php?type=cadastro')
    } else {

        //foto
        xhr1 = new XMLHttpRequest();
        formData1 = new FormData(document.getElementById('form-foto'));
        xhr1.open('POST', 'upload.php?nome=foto');
        xhr1.send(formData1);
        xhr1.onreadystatechange = function() {
                if ((xhr1.readyState == 4) && (xhr1.status == 200)) count_ajax++;
                ajaxCheck(count_ajax);
            }
            //curriculum
        xhr2 = new XMLHttpRequest();
        formData2 = new FormData(document.getElementById('form-curriculum'));
        xhr2.open('POST', 'upload.php?nome=curriculum');
        xhr2.send(formData2);
        xhr2.onreadystatechange = function() {
            if ((xhr2.readyState == 4) && (xhr2.status == 200)) count_ajax++;
            ajaxCheck(count_ajax);
        }
    }
}

function arqSelect(file_select, div_id_file, maxfiles, dellfiles) {
    if (dellfiles) {
        for (i = 0; i < file_select.files.length; i++) {
            if (i == (dellfiles - 1)) {
                document.getElementById(div_id_file + (i + 1)).children[1].innerHTML = "";
                document.getElementById(div_id_file + (i + 1)).style.display = 'none';
                var novaListaFiles = document.getElementById(file_select.getAttribute('id') + '_index').value;
                document.getElementById(file_select.getAttribute('id') + '_index').value = novaListaFiles.replace((dellfiles - 1), '');
            }
        }
    } else {
        if (file_select.files.length > 0) {
            if (file_select.files.length > maxfiles) {
                document.getElementById(div_id_file + "-erro").innerHTML = 'Número máximo de arquivos nesse campo: ' + maxfiles;
            } else {
                document.getElementById(file_select.getAttribute('id') + '-div').style.backgroundColor = '#D1E7A7';
                document.getElementById(file_select.getAttribute('id') + '_index').value = '';
                for (i = 0; i < file_select.files.length; i++) {
                    document.getElementById(div_id_file + (i + 1)).children[1].innerHTML = file_select.files[i].name;
                    document.getElementById(div_id_file + (i + 1)).style.display = 'block';
                    if (i == 0) { var virgula = ""; } else { virgula = ";" };
                    document.getElementById(file_select.getAttribute('id') + '_index').value += virgula + i;
                }
            }
        }
    }
}


/* function validaForm () {
    document.getElementById('enviar').classList.add('loading');
    count_ajax = 0;
    var session = '<?php echo $_SESSION['nome'];?>'
    if (session == '') {
        window.location.replace('sessionfailure.php?type=cadastro')
    }else{
    
        //foto
        xhr1 = new XMLHttpRequest();
        formData1 = new FormData(document.getElementById('form-foto'));
        xhr1.open('POST','upload.php?nome=foto');
        xhr1.send(formData1);
        xhr1.onreadystatechange=function() {
            if ((xhr1.readyState == 4) && (xhr1.status == 200)) count_ajax++;
            ajaxCheck(count_ajax);
        }
        //curriculum
        xhr2 = new XMLHttpRequest();
        formData2 = new FormData(document.getElementById('form-curriculum'));
        xhr2.open('POST','upload.php?nome=curriculum');
        xhr2.send(formData2);
        xhr2.onreadystatechange=function() {
            if ((xhr2.readyState == 4) && (xhr2.status == 200)) count_ajax++;
            ajaxCheck(count_ajax);
        }
        //carteiracrm
        xhr3 = new XMLHttpRequest();
        formData3 = new FormData(document.getElementById('form-carteiracrm'));
        xhr3.open('POST','upload.php?nome=carteiracrm');
        xhr3.send(formData3);
        xhr3.onreadystatechange=function() {
            if ((xhr3.readyState == 4) && (xhr3.status == 200)) count_ajax++;
            ajaxCheck(count_ajax);
        }
        //rgupload
        xhr4 = new XMLHttpRequest();
        formData4 = new FormData(document.getElementById('form-rgupload'));
        xhr4.open('POST','upload.php?nome=rgupload');
        xhr4.send(formData4);
        xhr4.onreadystatechange=function() {
            if ((xhr4.readyState == 4) && (xhr4.status == 200)) count_ajax++;
            ajaxCheck(count_ajax);
        }
        //cpfupload
        xhr5 = new XMLHttpRequest();
        formData5 = new FormData(document.getElementById('form-cpfupload'));
        xhr5.open('POST','upload.php?nome=cpfupload');
        xhr5.send(formData5);
        xhr5.onreadystatechange=function() {
            if ((xhr5.readyState == 4) && (xhr5.status == 200)) count_ajax++;
            ajaxCheck(count_ajax);
        }
        //tituloupload
        xhr6 = new XMLHttpRequest();
        formData6 = new FormData(document.getElementById('form-tituloupload'));
        xhr6.open('POST','upload.php?nome=tituloupload');
        xhr6.send(formData6);
        xhr6.onreadystatechange=function() {
            if ((xhr6.readyState == 4) && (xhr6.status == 200)) count_ajax++;
            ajaxCheck(count_ajax);
        }
        //reservista
        if (sexo == 'masculino') {
            xhr7 = new XMLHttpRequest();
            formData7 = new FormData(document.getElementById('form-reservista'));
            xhr7.open('POST','upload.php?nome=reservista');
            xhr7.send(formData7);
            xhr7.onreadystatechange=function() {
                if ((xhr7.readyState == 4) && (xhr7.status == 200)) count_ajax++;
                ajaxCheck(count_ajax);
            }
        }
        //pisupload
        xhr8 = new XMLHttpRequest();
        formData8 = new FormData(document.getElementById('form-pisupload'));
        xhr8.open('POST','upload.php?nome=pisupload');
        xhr8.send(formData8);
        xhr8.onreadystatechange=function() {
            if ((xhr8.readyState == 4) && (xhr8.status == 200)) count_ajax++;
            ajaxCheck(count_ajax);
        }
        //enderecoupload
        xhr9 = new XMLHttpRequest();
        formData9 = new FormData(document.getElementById('form-enderecoupload'));
        xhr9.open('POST','upload.php?nome=enderecoupload');
        xhr9.send(formData9);
        xhr9.onreadystatechange=function() {
            if ((xhr9.readyState == 4) && (xhr9.status == 200)) count_ajax++;
            ajaxCheck(count_ajax);
        }
        //diploma
        xhr10 = new XMLHttpRequest();
        formData10 = new FormData(document.getElementById('form-diploma'));
        xhr10.open('POST','upload.php?nome=diploma');
        xhr10.send(formData10);
        xhr10.onreadystatechange=function() {
            if ((xhr10.readyState == 4) && (xhr10.status == 200)) count_ajax++;
            ajaxCheck(count_ajax);
        }
        //cndcrm
        xhr11 = new XMLHttpRequest();
        formData11 = new FormData(document.getElementById('form-cndcrm'));
        xhr11.open('POST','upload.php?nome=cndcrm');
        xhr11.send(formData11);
        xhr11.onreadystatechange=function() {
            if ((xhr11.readyState == 4) && (xhr11.status == 200)) count_ajax++;
            ajaxCheck(count_ajax);
        }
        //cartaovacina
        xhr12 = new XMLHttpRequest();
        formData12 = new FormData(document.getElementById('form-cartaovacina'));
        xhr12.open('POST','upload.php?nome=cartaovacina');
        xhr12.send(formData12);
        xhr12.onreadystatechange=function() {
            if ((xhr12.readyState == 4) && (xhr12.status == 200)) count_ajax++;
            ajaxCheck(count_ajax);
        }
        //eticos
        xhr13 = new XMLHttpRequest();
        formData13 = new FormData(document.getElementById('form-eticos'));
        xhr13.open('POST','upload.php?nome=eticos');
        xhr13.send(formData13);
        xhr13.onreadystatechange=function() {
            if ((xhr13.readyState == 4) && (xhr13.status == 200)) count_ajax++;
            ajaxCheck(count_ajax);
        }
        //cncf
        xhr14 = new XMLHttpRequest();
        formData14 = new FormData(document.getElementById('form-cncf'));
        xhr14.open('POST','upload.php?nome=cncf');
        xhr14.send(formData14);
        xhr14.onreadystatechange=function() {
            if ((xhr14.readyState == 4) && (xhr14.status == 200)) count_ajax++;
            ajaxCheck(count_ajax);
        }
        //cnce
        xhr15 = new XMLHttpRequest();
        formData15 = new FormData(document.getElementById('form-cnce'));
        xhr15.open('POST','upload.php?nome=cnce');
        xhr15.send(formData15);
        xhr15.onreadystatechange=function() {
            if ((xhr15.readyState == 4) && (xhr15.status == 200)) count_ajax++;
            ajaxCheck(count_ajax);
        }
        //cndf
        xhr16 = new XMLHttpRequest();
        formData16 = new FormData(document.getElementById('form-cndf'));
        xhr16.open('POST','upload.php?nome=cndf');
        xhr16.send(formData16);
        xhr16.onreadystatechange=function() {
            if ((xhr16.readyState == 4) && (xhr16.status == 200)) count_ajax++;
            ajaxCheck(count_ajax);
        }
        //cnde
        xhr17 = new XMLHttpRequest();
        formData17 = new FormData(document.getElementById('form-cnde'));
        xhr17.open('POST','upload.php?nome=cnde');
        xhr17.send(formData17);
        xhr17.onreadystatechange=function() {
            if ((xhr17.readyState == 4) && (xhr17.status == 200)) count_ajax++;
            ajaxCheck(count_ajax);
        }
        //cndm
        xhr18 = new XMLHttpRequest();
        formData18 = new FormData(document.getElementById('form-cndm'));
        xhr18.open('POST','upload.php?nome=cndm');
        xhr18.send(formData18);
        xhr18.onreadystatechange=function() {
            if ((xhr18.readyState == 4) && (xhr18.status == 200)) count_ajax++;
            ajaxCheck(count_ajax);
        }
        //cndt
        xhr19 = new XMLHttpRequest();
        formData19 = new FormData(document.getElementById('form-cndt'));
        xhr19.open('POST','upload.php?nome=cndt');
        xhr19.send(formData19);
        xhr19.onreadystatechange=function() {
            if ((xhr19.readyState == 4) && (xhr19.status == 200)) count_ajax++;
            ajaxCheck(count_ajax);
        }
        //cursos
        xhr20 = new XMLHttpRequest();
        formData20 = new FormData(document.getElementById('form-cursos'));
        xhr20.open('POST','upload.php?nome=cursos');
        xhr20.send(formData20);
        xhr20.onreadystatechange=function() {
            if ((xhr20.readyState == 4) && (xhr20.status == 200)) count_ajax++;
            ajaxCheck(count_ajax);
        }
        //experiencia
        xhr21 = new XMLHttpRequest();
        formData21 = new FormData(document.getElementById('form-experiencia'));
        xhr21.open('POST','upload.php?nome=experiencia');
        xhr21.send(formData21);
        xhr21.onreadystatechange=function() {
            if ((xhr21.readyState == 4) && (xhr21.status == 200)) count_ajax++;
            ajaxCheck(count_ajax);
        }
    }    
}
 */