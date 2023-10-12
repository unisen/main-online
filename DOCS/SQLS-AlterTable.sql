
-- SQL Query que altera o nome de uma coluna na tabela
ALTER TABLE `tbl_socios` CHANGE `NOME COMPLETO` `nome_completo` VARCHAR(300) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL;

ALTER TABLE table_name
    CHANGE COLUMN original_name new_name column_definition
    [FIRST | AFTER column_name];

ALTER TABLE vehicles 
CHANGE COLUMN note vehicleCondition VARCHAR(100) NOT NULL;

-- Pega toda a configuração do campo na tabela
SELECT * 
FROM information_schema.COLUMNS 
WHERE 
TABLE_SCHEMA = 'escala_db' 
AND TABLE_NAME = 'tbl_socios' 
AND COLUMN_NAME = 'NOME COMPLETO'

---------------------------------------------------------------------
-- Faz uma coisa semelhante, mas volta menos dados
-- Retorna: Field           Type          Null  Key  Default  Extra
--          NOME COMPLETO   varchar(300)  NO         NULL
---------------------------------------------------------------------
SHOW COLUMNS FROM tbl_socios LIKE 'NOME COMPLETO'

CREATE VIEW vm_nomefield AS
SELECT * 
FROM information_schema.COLUMNS 
WHERE 
TABLE_SCHEMA = 'escala_db' 
AND TABLE_NAME = 'tbl_socios' 
AND COLUMN_NAME = 'NOME COMPLETO'


$result = mysqli_query("SHOW COLUMNS FROM `table` LIKE 'fieldname'");
$exists = (mysqli_num_rows($result))?TRUE:FALSE;


ALTER TABLE `ca_4_4_14`  CHANGE `active` `is_active` ENUM('Y','N') CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT 'Y' NOT NULL;


-- duplicating a table from another table (with indexing and structure)cannot be done with a single query you will need need 2 queries.

-- 1) To create Duplicate table.

CREATE TABLE Table2 LIKE Table1;

-- This will create an exact copy of the table.

-- 2) Fill in the Duplicate table with values from original table.

INSERT INTO Table2 SELECT * from Table1;

-- will fill Table2 with all the records fom Table1

--
--     COMO CLONAR UMA TABELA
--
-- CRIA UMA TABela igual a outra, sem os dados
CREATE TABLE tbl_socios2 LIKE tbl_socios;

-- INSERE OS DADOS DA TABELA ORIGINAL NA DUPLICADA
INSERT INTO tbl_socios2 SELECT * from tbl_socios;


-- SCRIPT PHP TO GET TABLE FIELDS PARAMETERS



<?php
$mysqli = new mysqli("localhost","root","","escala_db");

if ($mysqli -> connect_errno) {
  echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
  exit();
}

$sql = "SELECT `ID`,`REGISTRO`,`CONTRATO`,`INSCRIÇÃO`,`SEXO`,`ESTADO CIVIL`,`NOME COMPLETO`,`FILIAÇÃO`,`CRM`,`TELEFONE`,`E-MAIL`,`DATA DE NASCIMENTO`,`RG`,`NATURALIDADE`,`NACIONALIDADE`,`CPF`,`TITULO DE ELEITOR`,`PIS`,`ENDEREÇO`,`ENDEREÇO NO NOME`,`DADOS BANCARIOS`,`FUNÇÃO`,`ESPECIALIDADE`,`ID PLANILHA`,`EMPRESA`,`STATUS`,`USER_IMAGE` FROM tbl_socios ORDER BY ID DESC";

if ($result = $mysqli -> query($sql)) {
  // Get field information for all fields
  while ($fieldinfo = $result -> fetch_field()) {
    
    printf("Name: %s\n", $fieldinfo -> name);
    printf("Table: %s\n", $fieldinfo -> table);
    printf("Max. Len: %d\n", $fieldinfo -> max_length);
    echo "<hr>";
  }
  $result -> free_result();
}

$mysqli -> close();
?>
teste