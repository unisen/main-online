<?php
require_once '../../config/database/conexao-unisen.php';

function converteDinheiro($num)
{
  $str = (string)$num;
  //echo $str;

  $ntotal = number_format($str, 2);
  $stotal = (string)$ntotal;
  $arrTotal = explode(".", $stotal);
  $esquerdo = $arrTotal[0];
  $esquerdo = str_replace(",", ".", $esquerdo);
  $direito = $arrTotal[1];
  $final = $esquerdo . ',' . $direito;
  echo trim($final);
}


// SELECT JA FORMATAND OS CAMPOS DE DATA
//$sql = "SELECT `ID`,`Mês`,`Tipo`,`NF/CPF`,`Cliente/Fornecedor`,`Centro de Custo`,`Plano de Contas`,`Banco`,STR_TO_DATE(`Vencimento`, '%d/%m/%Y') as fvencimento,STR_TO_DATE(`Data Pgto`, '%d/%m/%Y') as fdatapgto,`Valor Titulo`,`Valor Pago`,`Detalhe` FROM `cash`";

//$sql = "SELECT `ID`,`Mês`,`Tipo`,`NF/CPF`,`Cliente/Fornecedor`,`Centro de Custo`,`Plano de Contas`,`Banco`,`Vencimento`,`Data Pgto`,`Valor Titulo`,`Valor Pago`,`Detalhe` FROM `cash2`";

//$financeiro_cash = mysqli_query($con_unisen, $sql);
//$fluxo_de_caixa = mysqli_fetch_array($financeiro_cash, MYSQLI_ASSOC);

?>
<div class="row">
    <div class="table-responsive" id="container-cash">
        <form>
            <table id="tbl_financeiro_cash" class="table table-bordered hover compact nowrap" style="width:100%">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Mês</th>
                        <th>Tipo</th>
                        <th>NF/CPF</th>
                        <th>Cliente/Fornecedor</th>
                        <th>Centro de Custo</th>
                        <th>Plano de Contas</th>
                        <th>Banco</th>
                        <th>Vencimento</th>
                        <th>Data Pgto</th>
                        <th>Valor Titulo</th>
                        <th>Valor Pago</th>
                        <th>Detalhe</th>
                    </tr>
                </thead>
            </table>
        </form>
    </div>
</div>
<!-- <div>
    <button class="btn btn-outline-success" onclick="extrair('888999GO')">
        Extrair
    </button>
</div> -->
