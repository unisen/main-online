<?php

require_once '../../config/database.php';
require_once '../../controllers/ProdutoDAO.php';

$ProdutoDAO = new ProdutoDAO();


//INSERT DADOS
//categoria, descricao, unidade, preco, situacao, preco_custo, tipo_produto, condicao, frete, unidade_medida
 $dados = array(
  'TABUA 3', //DESCRICAO
  'tabuas',
  'M2',
  '20.00',
  'Ativo',
  '20.00',
  'Terceiro',
  'Boa',
  'Sim',
  'Centímetro'
);
$ProdutoDAO->insertProduto($dados); 

//UPDATE PRODUTOS
 /* $parameters = array(
    'id' => 422,
    'categoria' => 'teste',
    'descricao' => '',
    'unidade' => '',
    'preco' => '0',
    'situacao' => '',
    'preco_custo' => '0',
    'tipo_produto' => '',
    'condicao' => '',
    'frete' => '',
    'unidade_medida' => ''
  );

  $ProdutoDAO->updateProduto($parameters); */


// DELETE PRODUTO
/* $parameters = array(
  'id' => 422,
);  
$ProdutoDAO->deleteProduto($parameters); */


//SELECIONA OS DADOS
$itens = $ProdutoDAO->selectProduto();

foreach($itens as $row) :
  echo '<hr>';
  echo $row->id.'<br>';
  echo $row->data_registro.'<br>';
  echo $row->categoria.'<br>';
  echo $row->descricao.'<br>';
  echo $row->unidade.'<br>';
  echo $row->preco.'<br>';
  
endforeach;




