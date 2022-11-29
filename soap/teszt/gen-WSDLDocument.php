<?php
	//error_reporting(0);
	require 'sorsolasok.php';
	require 'WSDLDocument/WSDLDocument.php';
	$wsdl = new WSDLDocument('Sorsolasok', "http://localhost/web2/soap/teszt/szerver.php", "http://localhost/web2/soap/teszt/");
	$wsdl->formatOutput = true;
	$wsdlfile = $wsdl->saveXML();
	echo $wsdlfile;
	file_put_contents ("sorsolasok.wsdl" , $wsdlfile);
?>
