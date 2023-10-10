<?php session_start();


    if (isset($_POST)) {        

        $id = $_POST['editar_id'];
        $mes = $_POST['editar_mes'];
        $tipo = $_POST['editar_tipo'];
        $nfcpf = $_POST['editar_nfcpf'];
        $cliente = $_POST['editar_cliente'];
        
        $ccusto = $_POST['editar_ccusto'];
        $pcontas = $_POST['editar_pcontas'];
        $banco = $_POST['editar_banco'];

        $vencimento = $_POST['editar_vencimento'];
        $datapgto = $_POST['editar_datapgto'];
        $valortit = $_POST['editar_valortit'];

        $valorpgto = $_POST['editar_valorpgto'];
        $detalhe = $_POST['editar_detalhe'];
        
           
        require_once '../../config/database/conexao-unisen.php';   

        $sql = "UPDATE `cash` SET `Mês`='$mes',`Tipo`='$tipo',`NF/CPF`='$nfcpf',`Cliente/Fornecedor`='$cliente',`Centro de Custo`='$ccusto',`Plano de Contas`='$pcontas',`Banco`='$banco',`Vencimento`='$vencimento',`Data Pgto`='$datapgto',`Valor Titulo`='$valortit',`Valor Pago`='$valorpgto',`Detalhe`='$detalhe' WHERE `ID` = '$id'";

        //echo $sql;
        $resposta = mysqli_query ($con_unisen, $sql);       

        if($resposta) {
            echo "sucesso";
        }
        else {
            echo "erro";
            //print_r($_POST);
        }
        
    }

?>
