<?php
	require("sorsolasok.php");
	$server = new SoapServer("sorsolasok.wsdl");
	$server->setClass('Sorsolasok');
	$server->handle();
?>
