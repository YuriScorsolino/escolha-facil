<?php
	session_start();
	if(!isset($_SESSION['id_usuarios']))
	{
		header("location: index.php");
		exit;
	}

?>


Seja beeem vindo!