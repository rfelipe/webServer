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
		$nome  = $_GET['nome'];
 		$email = $_GET['email'];
		$pass  = $_GET['pass'];
	} else {
		echo '[{"erro":"Sem parametros na url"}]';
		exit(); 
	}

	try {
		$conecta = new PDO("mysql:host=$servidor;dbname=$banco", $usuario , $senha);
			$conecta->exec("set names utf8"); 
	  		$conecta->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
   
  			$stmt = $conecta->prepare('INSERT INTO  usuarios (usuario_nome, usuario_email, usuario_senha)
  									 VALUES(:nome,:email,:pass)');
  			$stmt->execute(array(':nome' => $nome,':email'=>$email,'pass'=>$pass ));
		
		
		if (count($resultadoDaConsulta) === 0)
		{
			
  		} 
  		echo "salvou";
} catch(PDOException $e) {
    echo 'ERROR: ' . $e->getMessage(); // opcional, apenas para teste
}
?>