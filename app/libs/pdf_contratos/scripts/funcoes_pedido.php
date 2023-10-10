<?php

function corpo_do_contrato($dados) {

  $output = "<b>$dados->nome_completo</b>, $dados->nacionalidade, médico(a), $dados->estado_civil, nascido(a) em $dados->data_nascimento, filho(a) de $dados->filiacao, registrada no Conselho Regional de Medicina do Estado de Goiás pela cédula de identidade médica número $dados->crm, carteira de identidade $dados->rg, inscrita no CPF $dados->cpf, residente e domiciliada em $dados->endereco, doravante denominada <b>SÓCIO PARTICIPANTE</b>.";
  
  return $output;

}

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

function valorMoeda($num)
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
  return trim($final);
}

function dados_da_empresa($json_path)
{
  $empresa_json = json_decode(file_get_contents($json_path));
  $empresa_configs = $empresa_json[0];
  return $empresa_configs;
  //$path_logo_img =  $unisen_url . $empresa_configs->logo_path;

}



function nome_curto_empresa($str)
{
  $str2 = explode(" - ", $str);
  $str = trim($str2[0]);
  return $str;
}

/* function dados_da_empresa ($con){
  
    $sql = "SELECT
    nome_empresa,
    documentacao_empresa,
    endereco_empresa
    FROM tbl_config_fatura
    WHERE id = 1";

    $dados = array();

    $result = mysqli_query($con,$sql); 
    while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) : 
    $dados['nome'] = $row['nome_empresa'];
    $dados['doc'] = $row['documentacao_empresa'];
    $dados['endereco'] = $row['endereco_empresa'];                           
    endwhile;
    
    return $dados;
  }  */

function rodape_da_fatura($con)
{

  $sql = "SELECT
    email_empresa,
    telefone_empresa,
    website_empresa
    FROM tbl_config_fatura
    WHERE id = 1";

  $dados = array();

  $result = mysqli_query($con, $sql);
  while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) :
    $dados['email'] = $row['email_empresa'];
    $dados['telefone'] = $row['telefone_empresa'];
    $dados['website'] = $row['website_empresa'];
  endwhile;

  return $dados;
}


function dados_do_pedido($con, $pedido)
{

  $sql = "SELECT 
    F.numero_pedido as NF,
    V.nome as Vendedor,
    F.data_registro as data_venda,
    F.data_entrega  as data_entrega,
    sum(P.preco * I.quantidade) as Subtotal,
    sum(I.desconto) as TotalDescPorItem,
    F.faturamento as SubtotalMenosDescPorItem,
    F.frete,
    F.desconto,
    F.taxas_adicionais,    
    sum(I.quantidade) as SomaDasQuantidades,    
    F.valor_total as ValorPedido,
    F.tipo_pagamento,
    F.observacoes    
    FROM tbl_pedidos_venda as F
    INNER JOIN tbl_itens_pedido as I
    ON F.numero_pedido = I.id_pedido
    INNER JOIN vendedores as V
    ON F.id_vendedor = V.id
    INNER JOIN tbl_produtos as P
    ON I.id_produto = P.id
    WHERE I.id_pedido = '$pedido'";

  $dados = array();

  $result = mysqli_query($con, $sql);
  while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) :
    $dados['pedido'] = $row['NF'];
    $dados['vendedor'] = $row['Vendedor'];
    $dados['subtotal'] = $row['Subtotal'];
    $date = new DateTime($row['data_venda']);
    $dados['data_venda'] = $date->format('d/m/Y');
    $date = new DateTime($row['data_entrega']);
    $dados['data_entrega'] = $date->format('Y-m-d');


    $dados['somadescitem'] = $row['TotalDescPorItem'];
    $dados['subtotalmenosdescitens'] = $row['SubtotalMenosDescPorItem'];
    $dados['frete'] = $row['frete'];

    $dados['desconto'] = $row['desconto'];
    $dados['taxas_adicionais'] = $row['taxas_adicionais'];
    $dados['somaqtdes'] = $row['SomaDasQuantidades'];

    $dados['valorpedido'] = $row['ValorPedido'];
    $dados['tipo_pagamento'] = $row['tipo_pagamento'];
    $dados['observacoes'] = $row['observacoes'];
  endwhile;

  return $dados;
}


function parcelas_pagamento($tp, $dtaEntrega, $valor)
{
  $date = new DateTime($dtaEntrega);
  $Entrega = $date->format('d/m/Y');

  if ($tp == "À Vista") {
    echo "<b>PAGAMENTO:</b> À Vista";
    echo " - <b>Data da Entrega:</b> " . $Entrega . "<br>";
  } else {
    echo "<b>PAGAMENTO:</b> Parcelado";
    echo " - <b>Data da Entrega:</b> " . $Entrega;

    $arrParcelas = explode(',', $tp);
    $qtde_parcelas = count($arrParcelas);
    $tr_parcelas = '';

    $valor_parcela = $valor / $qtde_parcelas;

    for ($i = 0; $i < $qtde_parcelas; $i++) {
      $calc_dias = '+' . $arrParcelas[$i] . ' days';
      $data_da_parcela = date('d/m/Y', strtotime($calc_dias, strtotime($dtaEntrega)));

      $tr_parcelas .= '<tr><td style="width: 6%; padding:2px;"><span class="badge badge-secondary" style="padding: 5px 8px 5px 8px; background-color: #b4b7ba; color: #fff;">' . ($i + 1) . ' </span></td><td style="width: 6%;">' . $arrParcelas[$i] . '</td><td style="width: 16%">' . $data_da_parcela . '</td><td>R$ ' . valorMoeda($valor_parcela) . '</td></tr>';
    }

    $table_parcelas = '<div class="parcelamento" style="border: 1px dotted rgb(189, 189, 189); padding-left: 6px;"><b>Parcelas: </b><table id="pag_grparcelas" class="itens-list" style="display: table; width: 100%; position: relative; margin-left: 5%;"><tbody><tr id="pag_parcelas_header"><th></th><th id="str_frame_pagamento_dias">Dias</th><th id="str_frame_pagamento_data">Data</th><th id="str_frame_pagamento_valor">Valor</th></tr>' . $tr_parcelas . '</tbody></table></div>';

    echo $table_parcelas;
  }
}
