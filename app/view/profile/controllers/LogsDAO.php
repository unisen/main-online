<?php

class LogsDAO extends database {

  public function __construct(){}

  public function insertLog($data)
  {    
    $sql = "INSERT INTO tbl_logs (acao,vendedor) VALUES (?,?)";
    return parent::insertDB($sql, $data);
  }

  public function deleteLog($data)
  {
    $sql = "DELETE FROM tbl_logs WHERE id_log = :id";
    return parent::deleteDB($sql, $data);
  }

  public function updateLog($data)
  {
    $sql = 'UPDATE tbl_logs SET acao = :acao, vendedor = :vendedor WHERE id_log = :id_log';
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