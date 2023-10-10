<?php
	define('URL_APLICATIVO','/unisen-main/');

	if (!empty($_SERVER['HTTPS']) && ('on' == $_SERVER['HTTPS'])) {
		$uri = 'https://';
	} else {
		$uri = 'http://';
	}
	$uri .= $_SERVER['HTTP_HOST'];
	header('Location: '.$uri. URL_APLICATIVO . 'app/login/');
	exit;
?>

