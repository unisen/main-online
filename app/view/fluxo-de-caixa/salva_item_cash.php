<?php session_start();

function moneyField($str)
{
  $str = str_replace("R$ ","",$str);
  $str = str_replace(".","",$str);
  $str = str_replace(",",".",$str);  
  return trim($str);
}

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
        $dtVenc = explode("/", $vencimento);
        $vencimento = $dtVenc[2] . '-' . $dtVenc[1] . '-' . $dtVenc[0];

        $datapgto = $_POST['editar_datapgto'];        
        $dtPgto = explode("/", $datapgto);
        $datapgto = $dtPgto[2] . '-' . $dtPgto[1] . '-' . $dtPgto[0];

        $valortit = moneyField($_POST['editar_valortit']);       

        $valorpgto = moneyField($_POST['editar_valorpgto']);
        $detalhe = $_POST['editar_detalhe'];        
           
        require_once '../../config/database/conexao-unisen.php';   

        $sql = "UPDATE `fluxo_de_caixa` SET `mes`='$mes',`tipo`='$tipo',`nf_cpf`='$nfcpf',`cliente_fornecedor`='$cliente',`ccusto`='$ccusto',`pcontas`='$pcontas',`banco`='$banco',`vencimento`='$vencimento',`data_pgto`='$datapgto',`valor_titulo`='$valortit',`valor_pago`='$valorpgto',`detalhe`='$detalhe' WHERE `id` = '$id'";

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