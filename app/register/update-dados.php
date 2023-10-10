<?php session_start();
if (!isset($_SESSION['loggedin_cad']) && $_SESSION['loggedin_cad'] !== false) {
    session_destroy();
    header('location: login.php');
    exit;
}


    $confirmacao = $_SESSION['confirmacao'];
    

    //echo $confirmacao;

    if (isset($_POST)) {
        //print_r($_POST);

        $arquivos = $_SESSION['diretorio'] . $_POST['crm_completo'];
        
        $sexo = $_POST['sexo'];
        $estado_civil = $_POST['estadocivil'];
        $sexo = $_POST['sexo'];
        $dn = $_POST['dn'];

        $dnArr = explode("-", $dn);
        $data_nascimento = $dnArr[2] . '/' . $dnArr[1] . '/' . $dnArr[0];

        $rg = $_POST['rg_cadastro'];

        //$nat_cadastro = $_POST['nat_cadastro'];
        $nat_cadastro = $_POST['naturalidade'] . '-' . $_POST['nat_uf'];

        $nome_pai = $_POST['nome_pai'];
        $nome_mae = $_POST['nome_mae'];
        $filiacao = $_POST['nome_pai'] . ' e ' . $_POST['nome_mae'];

        $nacionalidade = $_POST['nacionalidade'];
        $titulo = $_POST['titulo'];
        $pis = $_POST['pis'];
        $telefone = $_POST['telefone'];

        $endereco = $_POST['endereco'];
        $logradouro_end = $_POST['logradouro_end'];
        $num_end = $_POST['num_end'];
        $complemento_end = $_POST['complemento_end'];

        $cep_cliente = $_POST['cep_cliente'];
        $bairro_end = $_POST['bairro_end'];
        $cidade_end = $_POST['cidade_end'];
        $uf_end = $_POST['uf_end'];

        $endereco_nome = $_POST['endereco_nome'];
        $id_escala = $_POST['id-escala'];
        
        $status_cadastrando = 'cadastrando';

        require_once '../config/database/conexao.php';

        $sql = "UPDATE `tbl_cadastrantes` SET `SEXO`='$sexo',`ESTADO CIVIL`='$estado_civil', `DATA DE NASCIMENTO`='$data_nascimento', `RG`='$rg', `NATURALIDADE`='$nat_cadastro', `nome_pai`='$nome_pai', `nome_mae`='$nome_mae', `FILIAÇÃO`='$filiacao', `NACIONALIDADE`='$nacionalidade', `TITULO DE ELEITOR`='$titulo' , `PIS`='$pis', `TELEFONE`='$telefone', `ENDEREÇO`='$endereco',`logradouro`='$logradouro_end',`numero`='$num_end',`complemento`='$complemento_end',`bairro`='$bairro_end',`cep`='$cep_cliente',`cidade`='$cidade_end',`estado`='$uf_end', `ENDEREÇO NO NOME`='$endereco_nome', `ID PLANILHA`='$id_escala', `STATUS` = '$status_cadastrando', `ARQUIVO` = '$arquivos' WHERE confirmacao='$confirmacao'";

        //echo $sql;
        $resposta = mysqli_query ($con, $sql);

        if($resposta) {
            echo "sucesso";
        }
        else {
            echo "erro";
            //print_r($_POST);
        }
        
    }

    //require_once '../config/database/conexao.php';

    //$conexao = mysqli_connect($dbHost,$dbUsername,$dbPassword,$dbname);

    
    /* Array ( [pasta_cadastrante] => 46327CE [confirmacao] => 64ae5a9adf1ba46327CE [estadocivil] => solteiro [sexo] => feminino [dn] => 1991-03-24 [rg] => 444444 [org_exp] => SSPGO [dexp] => 2000-08-17 [rg_cadastro] => 444444-SSPGO DE: 17/08/2000 [nome_pai] => DARIO FERNANDES NEVES OLIVEIRA [nome_mae] => ENEUSA MARIA DA SILVA NEVES [filiacao] => DARIO FERNANDES NEVES OLIVEIRA e ENEUSA MARIA DA SILVA NEVES [nacionalidade] => brasileira [naturalidade] => IPATINGA [nat_uf] => GO [nat_cadastro] => IPATINGA-GO [titulo] => 99999 [pis] => 999999 [telefone] => (62) 99999-9999 [cep_cliente] => 74.823-330 [uf_end] => GO [cidade_end] => Goiânia [logradouro_end] => Rua T 62 [bairro_end] => Setor Bela Vista [num_end] => 112 [complemento_end] => QD. 09 [endereco_nome] => SIM [id-escala] => MARIA JOAO (46327CE) [endereco] => RUA T 62, N. 112, QD. 09, SETOR BELA VISTA. GOIÂNIA/GO - CEP: 74.823-330 ) */


    /* Array ( [pasta_cadastrante] => 46327CE [confirmacao] => 64ae5a9adf1ba46327CE [estadocivil] => [sexo] => [dn] => [rg] => [org_exp] => [dexp] => [rg_cadastro] => [nome_pai] => [nome_mae] => [filiacao] => [nacionalidade] => [naturalidade] => [nat_cadastro] => [titulo] => [pis] => [telefone] => [cep_cliente] => [uf_end] => [cidade_end] => [logradouro_end] => [bairro_end] => [num_end] => [complemento_end] => [endereco_nome] => [endereco] => ) */


    /* UPDATE `tbl_cadastrantes` SET `SEXO`='[value-4]',`ESTADO CIVIL`='[value-5]',`NOME COMPLETO`='[value-6]',`FILIAÇÃO`='[value-7]',`nome_pai`='[value-8]',`nome_mae`='[value-9]',`CRM`='[value-10]',`TELEFONE`='[value-11]',`E-MAIL`='[value-12]',`DATA DE NASCIMENTO`='[value-13]',`RG`='[value-14]',`NATURALIDADE`='[value-15]',`NACIONALIDADE`='[value-16]',`CPF`='[value-17]',`TITULO DE ELEITOR`='[value-18]',`PIS`='[value-19]',`ENDEREÇO`='[value-20]',`logradouro`='[value-21]',`numero`='[value-22]',`complemento`='[value-23]',`bairro`='[value-24]',`cep`='[value-25]',`cidade`='[value-26]',`estado`='[value-27]',`ENDEREÇO NO NOME`='[value-28]',`DADOS BANCARIOS`='[value-29]',`FUNÇÃO`='[value-30]',`ESPECIALIDADE`='[value-31]',`senha`='[value-32]',`ID PLANILHA`='[value-33]',`EMPRESA`='[value-34]',`STATUS`='[value-35]',`confirmacao`='[value-36]',`submission_date`='[value-37]',`ARQUIVO`='[value-38]',`USER_IMAGE`='[value-39]' WHERE */
   
       //mysqli_query ($con,"UPDATE tbl_cadastrantes SET STATUS='confirmado' WHERE confirmacao='$confirmacao';");
       
       //header("location: cadastro.php?confirmacao=$confirmacao");
    
?>
