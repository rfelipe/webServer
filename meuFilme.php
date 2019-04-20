<?php

	header("Cache-Control: no-cache, no-store, must-revalidate"); 
	header("Access-Control-Allow-Origin: *");
	header("Content-Type: application/json; charset=utf-8"); 
	
	clearstatcache(); // limpa o cache
	$servidor = 'localhost';
	$usuario  = 'root';
	$senha    = '';
	$banco    = 'dblogin';
	$busca;
	if ($_GET){
		$usuarioId= $_GET['usuarioId'];

	} else {
		echo '[{"erro":"Sem parametros na url"}]';
		exit(); 
		}

	try {
		$conecta = new PDO("mysql:host=$servidor;dbname=$banco", $usuario , $senha);
		$conecta->exec("set names utf8"); 
		$consulta = $conecta->prepare("SELECT * FROM filme WHERE usuario_id = '$usuarioId' ");

	
		$consulta->execute(array());  
		$resultadoDaConsulta = $consulta->fetchAll();
		
		
		if (count($resultadoDaConsulta) === 0)
		{
			echo '[{"erro":"Voce nao tem filmes alugados"}]';
		}
		
		if ( count($resultadoDaConsulta) ) {
		foreach($resultadoDaConsulta as $registro) {
			
            $filmes= array('filme'=>array(
            									'filmeId'=>	$registro['filme_id'],
            						  			'filmeTitulo' 	=>	$registro['filme_titulo'],
            						  			'filmeDiretor'	=>	$registro['filme_diretor'],
            						  			'filmeStatus'	=>	$registro['filme_status']
            									)      									
        					);
		}

		echo json_encode($filmes);
		
  } 
} catch(PDOException $e) {
    echo 'ERROR: ' . $e->getMessage(); // opcional, apenas para teste
}
?>