<?php

class LogsDAO extends database {

  public function __construct(){}

  public function insertLog($data)
  {    
    $sql = "INSERT INTO tbl_logs (acao,origem,tabela,usuario,username,ip_usuario) VALUES (?,?,?,?,?,?)";
    return parent::insertDB($sql, $data);
  }

  public function deleteLog($data)
  {
    $sql = "DELETE FROM tbl_logs WHERE id_log = :id_log";
    return parent::deleteDB($sql, $data);
  }

  public function deleteSelecionadosLog($params)
  {
    //DELETE FROM `tbl_logs` WHERE `id_log` IN (178,176,175);
    $sql = "DELETE FROM tbl_logs $params";
    return parent::deleteDB($sql, $params);
  }


  public function updateLog($data)
  {
    $sql = 'UPDATE tbl_logs SET acao = :acao, origem = :origem, tabela = :tabela, usuario = :usuario, username = :username, ip_usuario = :ip_usuario WHERE id_log = :id_log';
    return parent::updateDB($sql, $data);
  }

  public function selectLog($params=null)
  {
      $data = array();
       /*  $sql = "SELECT * FROM `tablivro` WHERE `id` = ? AND `titulo` = ? AND `anoedicao` = ?"; */
       $sql = "SELECT * FROM tbl_logs $params";        
       $result = parent::selectDB($sql, $data);
       return $result;
  }

}