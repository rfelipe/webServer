<?php

	header("Cache-Control: no-cache, no-store, must-revalidate"); 
	header("Access-Control-Allow-Origin: *");
	header("Content-Type: application/json; charset=utf-8"); 
	
	clearstatcache(); // limpa o cache
	$servidor = 'localhost';
	$usuario  = 'root';
	$senha    = '';
	$banco    = 'dblogin';

	if ($_GET){
		$filmeId = $_GET['filmeId'];
		$usuario_id = $_GET['usuarioId'];
		$status  = $_GET['status'];
	} else {
		echo '[{"erro":"Sem parametros na url"}]';
		exit(); 
	}

	try {
		$conecta = new PDO("mysql:host=$servidor;dbname=$banco", $usuario , $senha);
			$conecta->exec("set names utf8"); 
	  		$conecta->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
   
  			$stmt = $conecta->prepare('UPDATE filme SET filme_status=?, usuario_id=? WHERE filme_id=? AND usuario_id=?');
  			$stmt->execute(array($status,0,$filmeId,$usuario_id));
		
		if (count($resultadoDaConsulta) === 0)
		{
			
  		} 
  		echo "salvou";
} catch(PDOException $e) {
    echo 'ERROR: ' . $e->getMessage();
}
?>