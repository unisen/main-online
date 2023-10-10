<?php 
	// First of all we have to check if the form is submitted via the POST
	// method.

	$empresa_json = json_decode(file_get_contents("configs-dados-empresa.json"));
	$empresa_configs = $empresa_json[0];
			
	if(isset($_POST['submit'])){
		// If the form is submitted we are gonna create a new associative array
		// to hold the values we will store.
		
		

		$new_message = array(
			"logo_path" => $_POST['logo_path'],
			"logo_file" => $_POST['logo'],
			"nome_empresa" => $_POST['nome_empresa'],
			"cnpj" => $_POST['cnpj'],
			"inscricao_estadual" => $_POST['inscricao_estadual'],
			"endereco" => $_POST['endereco'],
			"cidade" => $_POST['cidade'],
			"estado" => $_POST['estado'],
			"cep" => $_POST['cep'],
			"email_empresa" => $_POST['email_empresa'],
			"email_empresa_associados" => $_POST['email_empresa_associados'],
			"telefone_empresa" => $_POST['telefone_empresa'],
			"celular_empresa" => $_POST['celular_empresa'],
			"website_empresa" => $_POST['website_empresa']
		);
		
		// Before storing the $new_message[] array, we have to check if this is 
		// the first record.
		// We are doing this by checking the filesize.
		if(filesize("configs-dados-empresa.json") == 0){
			// if this is the first record, we creating an array to hold out message.
			$first_record = array($new_message);
			// The only purpose of this step is to create an array inside the json 
			// file to hold our messages. You will see in sec.
			
			/* I'll assign the record to a generic variable for later use. */
			$data_to_save = $first_record; 
		}else{

			$empresa_json = json_decode(file_get_contents("configs-dados-empresa.json"));
	

			$empresa_configs = $empresa_json[0];
			
			$old_records = array($new_message);
			/* and i'll assign the record to our generic variable. */
			$data_to_save = $old_records;
		}

		// Now our last step is to store the data to the file (messages.json).
		if(!file_put_contents("configs-dados-empresa.json", json_encode($data_to_save, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE), LOCK_EX)){
			// if something went wrong, we are showing an error message.
			$error = "Erro ao salvar configurações!";
		}else{
			// and if everything went ok, we show a success message.
			$success =  "Configurações da Empresa salvas com sucesso!";
			$empresa_json = json_decode(file_get_contents("configs-dados-empresa.json"));
			$empresa_configs = $empresa_json[0];
		}
	}
