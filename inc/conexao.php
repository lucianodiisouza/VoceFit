<?php
	define('SERVIDOR','mysql.000webhost.com');
	define('USUARIO','id10173111_usuarioroot');
	define('SENHA','aggjlr@123');
	define('DB','id10173111_vocefit');
	define('CHARSET','utf8');

	$conecta = mysqli_connect(SERVIDOR, USUARIO, SENHA, DB) or die(mysqli_connect_error());

	mysqli_set_charset($conecta, CHARSET) or die(mysqli_error($conecta));

?>