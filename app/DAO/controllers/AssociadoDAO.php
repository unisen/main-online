<?php

class AssociadoDAO extends database
{

  public function __construct()
  {
  }

  public function insertAssociado($data)
  { 
    $sql = "INSERT INTO `tbl_socios` (`REGISTRO`, `CONTRATO`, `INSCRIÇÃO`, `SEXO`, `ESTADO CIVIL`, `NOME COMPLETO`, `FILIAÇÃO`, `CRM`, `TELEFONE`, `E-MAIL`, `DATA DE NASCIMENTO`, `RG`, `NATURALIDADE`, `NACIONALIDADE`, `CPF`, `TITULO DE ELEITOR`, `PIS`, `ENDEREÇO`, `ENDEREÇO NO NOME`, `DADOS BANCARIOS`, `FUNÇÃO`, `ESPECIALIDADE`, `ID PLANILHA`, `EMPRESA`, `STATUS`, USER_IMAGE) VALUES ( now(), ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    //$sql = "INSERT INTO `tablivro` (`id`, `titulo`, `autor`, `editora`, `anoedicao`, `localizacao`) VALUES (?, ?, ?, ?, ?, ?)";
    return parent::insertDB($sql, $data);
  }

  public function deleteAssociado($data)
  {
    $sql = "DELETE FROM tbl_socios WHERE ID = :ID";
    parent::deleteDB($sql, $data);
  }

  public function updateAssociado($data)
  {
    $sql = 'UPDATE tbl_socios SET registro = :registro, username = :username,password = :password, tipopessoa = :tipopessoa, nome = :nome, fantasia = :fantasia, endereco = :endereco, numero = :numero, complemento = :complemento, bairro = :bairro, cep = :cep, cidade = :cidade, estado = :estado, contatos = :contatos, telefone = :telefone, fax = :fax, celular	 = :celular	, email	 = :email, website = :website, cnpjcpf = :cnpjcpf, idrg = :idrg, situacao = :situacao, obs = :obs, emailnfe = :emailnfe, vendedor = :vendedor, user_image = :user_image WHERE id = :id';

    parent::updateDB($sql, $data);
  }

  public function selectAssociado($params = null)
  {
    $data = array();
    /*  $sql = "SELECT * FROM `tablivro` WHERE `id` = ? AND `titulo` = ? AND `anoedicao` = ?"; */
    $sql = "SELECT * FROM tbl_socios $params";

    $result = parent::selectDB($sql, $data);

    return $result;
  }


  public function selectNewAssociado($params = null)
  {
    $data = array();
    /*  $sql = "SELECT * FROM `tablivro` WHERE `id` = ? AND `titulo` = ? AND `anoedicao` = ?"; */
    $sql = "SELECT `ID` AS id, `REGISTRO` AS registro, `CONTRATO` AS contrato, `INSCRIÇÃO` AS inscricao, `SEXO` AS sexo, `ESTADO CIVIL` AS estado_civil, `NOME COMPLETO` AS nome_completo, `FILIAÇÃO` AS filiacao, `CRM` AS crm, `TELEFONE` AS telefone, `E-MAIL` AS email, `DATA DE NASCIMENTO` AS data_nascimento, `RG` AS rg, `NATURALIDADE` AS naturalidade, `NACIONALIDADE` AS nacionalidade, `CPF` AS cpf, `TITULO DE ELEITOR` AS titulo_eleitor, `PIS` AS pis, `ENDEREÇO` AS endereco, `ENDEREÇO NO NOME` AS endereco_no_nome, `DADOS BANCARIOS` AS dados_bancarios, `FUNÇÃO` AS funcao, `ESPECIALIDADE` AS especialidade, `ID PLANILHA` AS id_planilha, `EMPRESA` AS empresa, `STATUS` AS status, `USER_IMAGE` AS user_image FROM tbl_socios $params";

    //$sql = "SELECT * FROM tbl_socios $params";

    $result = parent::selectDB($sql, $data);

    return $result;
  }
}

/***
 * SELECT `ID`, `REGISTRO`, `CONTRATO`, `INSCRIÇÃO`, `SEXO`, `ESTADO CIVIL`, `NOME COMPLETO`, `FILIAÇÃO`, `CRM`, `TELEFONE`, `E-MAIL`, `DATA DE NASCIMENTO`, `RG`, `NATURALIDADE`, `NACIONALIDADE`, `CPF`, `TITULO DE ELEITOR`, `PIS`, `ENDEREÇO`, `ENDEREÇO NO NOME`, `DADOS BANCARIOS`, `FUNÇÃO`, `ESPECIALIDADE`, `ID PLANILHA`, `EMPRESA`, `STATUS`, `USER_IMAGE` FROM `tbl_socios` WHERE 
 */
