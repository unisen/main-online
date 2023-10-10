<?php

class ProdutoDAO extends database {

  public function __construct(){}

  public function insertProduto($data)
  {
    $sql = "INSERT INTO tbl_produtos (data_registro, categoria, descricao, unidade, preco, situacao, preco_custo, tipo_produto, condicao, frete, unidade_medida) VALUES ( now(), ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    //$sql = "INSERT INTO `tablivro` (`id`, `titulo`, `autor`, `editora`, `anoedicao`, `localizacao`) VALUES (?, ?, ?, ?, ?, ?)";
    parent::insertDB($sql, $data);

  }

  public function deleteProduto($data)
  {
    $sql = "DELETE FROM tbl_produtos WHERE id = :id";
    parent::deleteDB($sql, $data);
  }

  public function updateProduto($data)
  {
    $sql = 'UPDATE tbl_produtos SET categoria = :categoria, descricao = :descricao, unidade = :unidade, preco = :preco, situacao = :situacao, preco_custo = :preco_custo, tipo_produto = :tipo_produto, condicao = :condicao, frete = :frete, unidade_medida = :unidade_medida WHERE id = :id';

    parent::updateDB($sql, $data);

  }

  public function selectProduto()
  {
      $data = array();
       /*  $sql = "SELECT * FROM `tablivro` WHERE `id` = ? AND `titulo` = ? AND `anoedicao` = ?"; */
       $sql = "SELECT * FROM tbl_produtos";
        
       $result = parent::selectDB($sql, $data);

        return $result;

  }

}