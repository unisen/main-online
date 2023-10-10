<?php session_start();


if (isset($_SESSION["url_aplicativo"])) {
    $unisen_url = $_SESSION["url_aplicativo"];
}


function legal_input($value)
{
    $value = trim($value);
    $value = stripslashes($value);
    $value = htmlspecialchars($value);
    return $value;
}


//echo $confirmacao;

if (isset($_POST)) {
    //print_r($_POST);

    $id_user = $_POST['id_cadastrante_field'];
    $campo_edit = $_POST['tipo_campo'];
    $novo_valor = $_POST[$campo_edit];

    //$novo_valor = $_POST['campo_selecionado'];   
     

    switch ($campo_edit) {
        case 'id':
            $campo_edit = 'ID';
            break;
        
         case 'nome_completo':
            $campo_edit = 'NOME COMPLETO';
            break;
        case 'contrato':
            $campo_edit = 'CONTRATO';
            break;
        case 'inscricao':
            $campo_edit = 'INSCRIÇÃO';
            break;

        case 'sexo':
            $campo_edit = 'SEXO';
            break;
        case 'estado_civil':
            $campo_edit = 'ESTADO CIVIL';
            break;
        case 'filiacao':
            $campo_edit = 'FILIAÇÃO';
            break;

        case 'crm':
            $campo_edit = 'CRM';
            break;
        case 'telefone':
            $campo_edit = 'TELEFONE';
            break;
        case 'email':
            $campo_edit = 'E-MAIL';
            break;

        case 'data_nascimento':
            $campo_edit = 'DATA DE NASCIMENTO';
            break;
        case 'rg':
            $campo_edit = 'RG';
            break;
        case 'naturalidade':
            $campo_edit = 'NATURALIDADE';
            break;

        case 'nacionalidade':
            $campo_edit = 'NACIONALIDADE';
            break;
        case 'cpf':
            $campo_edit = 'CPF';
            break;
        case 'titulo_eleitor':
            $campo_edit = 'TITULO DE ELEITOR';
            break;

        case 'pis':
            $campo_edit = 'PIS';
            break;
        case 'endereco':
            $campo_edit = 'ENDEREÇO';
            break;
        case 'endereco_no_nome':
            $campo_edit = 'ENDEREÇO NO NOME';
            break;

        case 'dados_bancarios':
            $campo_edit = 'DADOS BANCARIOS';
            break;
        case 'funcao':
            $campo_edit = 'FUNÇÃO';
            break;                
        case 'especialidade':
            $campo_edit = 'ESPECIALIDADE';
            break;

        case 'id_planilha':
            $campo_edit = 'ID PLANILHA';
            break;
        case 'empresa':
            $campo_edit = 'EMPRESA';
            break;
        case 'status':
            $campo_edit = 'STATUS';
            break;
            
        case 'arquivo':
            $campo_edit = 'ARQUIVO';
            break;
        case 'user_image':
            $campo_edit = 'USER_IMAGE';
            break;           
            
    }
    
    require_once '../../config/database/conexao.php'; 

    $sql = "UPDATE `tbl_cadastrantes` SET `$campo_edit` = '$novo_valor' WHERE ID = $id_user";
 

    //echo $sql;
    $resposta = mysqli_query($con, $sql);

    $response = array();

    if ($resposta) {
  
        array_push($response, 'sucesso');
        array_push($response,$sql);

    } else {
        
        array_push($response, 'erro');
        array_push($response,$sql);
        
    }

    echo json_encode($response);
}
