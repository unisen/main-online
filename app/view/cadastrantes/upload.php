<?php  
    session_start();
    $form_name = $_GET['nome'];
    $form_subname = $_GET['subnome'];
    $pasta = $_GET['pasta'];
    $nfile = $_GET['nfile'];
    $ifile = $_GET['i'];
    $file_index = explode(";",$_POST[$form_name."_index"]);
    $file = $_FILES[$form_name];
    $_SESSION[$form_name] = $file;
    $_SESSION[$form_name_index] = $_POST[$form_name."_index"];
    $modo = $_GET['atualizadocs'];
    if ($form_subname) $form_name = $form_subname;
    $i = 0;
    if (($_SESSION['nome'] != '') && isset($_SESSION['nome'])) {
    
        foreach ($file['name'] as $valor => $valor2) {
            if ($nfile) {
                if ($ifile."/".$valor == $valor."/".$valor) {
                    $i++;
                    $tipo = $file['type'][$valor];
                    $tipo = explode("/",$tipo);
                    if (!$nfile) { $n = $i; }else{ $n = $nfile ; }  
                    if (!is_dir("./$pasta/".$_SESSION['crm'].$_SESSION['crm_uf']."/")) mkdir("./$pasta/".$_SESSION['crm'].$_SESSION['crm_uf']."/",0777,true);
                    move_uploaded_file ($file['tmp_name'][$valor],"./$pasta/".$_SESSION['crm'].$_SESSION['crm_uf']."/".$_SESSION['nome']." - ".strtoupper($form_name)." [".$n."].".$tipo[1]);
                }
            }else{
                if ($file_index[$valor]."/".$valor == $valor."/".$valor) {
                    $i++;
                    $tipo = $file['type'][$valor];
                    $tipo = explode("/",$tipo);
                    if  ($modo) {
                        if (!is_dir("../scp/socios/".$_SESSION['crm'].$_SESSION['crm_uf']."/")) mkdir("../scp/socios/".$_SESSION['crm'].$_SESSION['crm_uf']."/",0777,true);
                         if (!is_dir("../scp/socios/".$_SESSION['crm'].$_SESSION['crm_uf']."/documentos/")) mkdir("../scp/socios/".$_SESSION['crm'].$_SESSION['crm_uf']."/documentos/",0777,true);
                    }else{
                        if (!is_dir("./cadastrantes/".$_SESSION['crm'].$_SESSION['crm_uf']."/")) mkdir("./cadastrantes/".$_SESSION['crm'].$_SESSION['crm_uf']."/",0777,true);
                    }
                    if ($form_name == 'foto') $nome = 'FOTO';
                    if ($form_name == 'curriculum') $nome = 'CURRICULUM VITAE';
                    if ($form_name == 'carteiracrm') $nome = 'CARTEIRA CRM';
                    if ($form_name == 'cartaovacina') $nome = 'CARTAO DE VACINA';
                    if ($form_name == 'rgupload') $nome = 'RG';
                    if ($form_name == 'cpfupload') $nome = 'CPF';
                    if ($form_name == 'tituloupload') $nome = 'TITULO DE ELEITOR';
                    if ($form_name == 'reservista') $nome = 'COMPROVANTE DE ALISTAMENTO MILITAR';
                    if ($form_name == 'pisupload') $nome = 'PIS';
                    if ($form_name == 'enderecoupload') $nome = 'COMPROVANTE DE ENDERECO';
                    if ($form_name == 'diploma') $nome = 'DIPLOMA';
                    if ($form_name == 'cndcrm') $nome = 'CERTIDAO NEGATIVA DE DEBITO CRM';
                    if ($form_name == 'eticos') $nome = 'ANTECEDENTES ETICOS CRM';
                    if ($form_name == 'cncf') $nome = 'CERTIDAO NEGATIVA CRIMINAL FEDERAL';
                    if ($form_name == 'cnce') $nome = 'CERTIDAO NEGATIVA CRIMINAL ESTADUAL';
                    if ($form_name == 'cndf') $nome = 'CERTIDAO NEGATIVA DE DEBITO FEDERAL';
                    if ($form_name == 'cnde') $nome = 'CERTIDAO NEGATIVA DE DEBITO ESTADUAL';
                    if ($form_name == 'cndt') $nome = 'CERTIDAO NEGATIVA DE DEBITO TRABALHISTA';
                    if ($form_name == 'cndm') $nome = 'CERTIDAO NEGATIVA DE DEBITO MUNICIPAL';
                    if ($form_name == 'cursos') $nome = 'CURSO DE CAPACITACAO';
                    if ($form_name == 'experiencia') $nome = 'CARTA DE EXPERIENCIA';
                    if ($form_name == 'acumulocargos') $nome = 'DECLARACAO ACUMULO CARGOS';
                    if  ($modo) {
                        move_uploaded_file ($file['tmp_name'][$valor],"../scp/socios/".$_SESSION['crm'].$_SESSION['crm_uf']."/documentos/".$_SESSION['nome']." - ".$nome." [".$i."] [".date("d.m.Y")."].".$tipo[1]);
                       
                    }else{
                        move_uploaded_file ($file['tmp_name'][$valor],"./cadastrantes/".$_SESSION['crm'].$_SESSION['crm_uf']."/".$_SESSION['nome']." - ".$nome." [".$i."].".$tipo[1]);
                    }
                }
            }
        }
    }else{
        if ($modo) {
            header('location: sessionfailure.php?type=atualiza');
        }else{
            header('location: sessionfailure.php?type=cadastro');
        }
    }    
?>  


