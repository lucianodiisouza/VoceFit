<?php
	define('SERVIDOR','localhost');
	define('USUARIO','root');
	define('SENHA','');
	define('DB','vocefit');
	define('CHARSET','utf8');

	$conecta = mysqli_connect(SERVIDOR, USUARIO, SENHA, DB) or die(mysqli_connect_error());

	mysqli_set_charset($conecta, CHARSET) or die(mysqli_error($conecta));
?>