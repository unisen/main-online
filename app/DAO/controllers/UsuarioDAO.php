<?php

class UsuarioDAO extends database {

  public function __construct(){}

  public function insertUsuario($data)
  {
    $sql = "INSERT INTO tbl_users (registro, username, `password`, tipopessoa, nome, fantasia, endereco, numero, complemento, bairro, cep, cidade, estado, contatos, telefone, fax, celular, email, website, cnpjcpf, idrg, situacao, obs, emailnfe, vendedor) VALUES ( now(), ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    //$sql = "INSERT INTO `tablivro` (`id`, `titulo`, `autor`, `editora`, `anoedicao`, `localizacao`) VALUES (?, ?, ?, ?, ?, ?)";
    return parent::insertDB($sql, $data);

  }

  public function deleteUsuario($data)
  {
    $sql = "DELETE FROM tbl_users WHERE id = :id";
    parent::deleteDB($sql, $data);
  }

  public function updateUsuario($data)
  {
    $sql = 'UPDATE tbl_users SET registro = :registro, username = :username,password = :password, tipopessoa = :tipopessoa, nome = :nome, fantasia = :fantasia, endereco = :endereco, numero = :numero, complemento = :complemento, bairro = :bairro, cep = :cep, cidade = :cidade, estado = :estado, contatos = :contatos, telefone = :telefone, fax = :fax, celular	 = :celular	, email	 = :email, website = :website, cnpjcpf = :cnpjcpf, idrg = :idrg, situacao = :situacao, obs = :obs, emailnfe = :emailnfe, vendedor = :vendedor, user_image = :user_image WHERE id = :id';

    parent::updateDB($sql, $data);

  }

  public function selectUsuario($params=null)
  {
      $data = array();
       /*  $sql = "SELECT * FROM `tablivro` WHERE `id` = ? AND `titulo` = ? AND `anoedicao` = ?"; */
       $sql = "SELECT * FROM tbl_users $params";
        
       $result = parent::selectDB($sql, $data);

        return $result;

  }

}