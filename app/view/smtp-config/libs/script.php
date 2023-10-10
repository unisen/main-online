<?php 
	// First of all we have to check if the form is submitted via the POST
	// method.

	
	$smtp_json = json_decode(file_get_contents("configs-smtp.json"));
	

	$smtp_configs = $smtp_json[0];
		//print_r($smtp_configs);
		
		/* echo "SMTPDebug: $smtp_configs->smtpdebug</p>";
		echo "CharSet: $smtp_configs->charset</p>";
		echo "Username: $smtp_configs->email_login</p>";
		echo "Password: $smtp_configs->password_login</p>";
		echo "Host: $smtp_configs->smtp_host</p>";
		echo "Senha: $smtp_configs->smtp_port</p>";
		echo "Email From: $smtp_configs->email_from</p>";
		echo "Email Name: $smtp_configs->email_name_from</p>";
		echo "Subject: $smtp_configs->subject</p>";
		echo "Body: $smtp_configs->body_file</p>"; */

	
	if(isset($_POST['salvar'])){
		// If the form is submitted we are gonna create a new associative array
		// to hold the values we will store.
		//print_r($_POST);

		if (!isset($_POST['server_mode'])) {
			$server_mode = "";
		}
		else {
			$server_mode = $_POST['server_mode'];
		}
		$new_message = array(
			"server_mode" => $server_mode,
			"smtpdebug" => $_POST['smtpdebug'],
			"charset" => $_POST['charset'],
			"email_login" => $_POST['email_login'],
			"password_login" => $_POST['password_login'],
			"smtp_host" => $_POST['smtp_host'],
			"smtp_port" => $_POST['smtp_port'],
			"email_from" => $_POST['email_from'],
			"email_name_from" => $_POST['email_name_from'],
			"subject" => $_POST['subject'],
			"body_file" => $_POST['body_file'],
			"headers_from" => $_POST['headers_from'],
			"headers_cc" => $_POST['headers_cc']
		);
		
		// Before storing the $new_message[] array, we have to check if this is 
		// the first record.
		// We are doing this by checking the filesize.
		if(filesize("configs-smtp.json") == 0){
			// if this is the first record, we creating an array to hold out message.
			$first_record = array($new_message);
			// The only purpose of this step is to create an array inside the json 
			// file to hold our messages. You will see in sec.
			
			/* I'll assign the record to a generic variable for later use. */
			$data_to_save = $first_record; 
		}else{
			
			$old_records = array($new_message);
			/* and i'll assign the record to our generic variable. */
			$data_to_save = $old_records;
		}

		// Now our last step is to store the data to the file (messages.json).
		if(!file_put_contents("configs-smtp.json", json_encode($data_to_save, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE), LOCK_EX)){
			// if something went wrong, we are showing an error message.
			$error = "Erro ao salvar configurações!";
		}else{
			// and if everything went ok, we show a success message.
			$success =  "Configurações SMTP salvas com sucesso!";
			$smtp_json = json_decode(file_get_contents("configs-smtp.json"));
			$smtp_configs = $smtp_json[0];
		}
	}
