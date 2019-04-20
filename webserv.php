<?php
	/* prepara o documento para comunicação com o JSON, as duas linhas a seguir são obrigatórias 
	  para que o PHP saiba que irá se comunicar com o JSON, elas sempre devem estar no ínicio da página */
	header("Cache-Control: no-cache, no-store, must-revalidate"); // limpa o cache
	header("Access-Control-Allow-Origin: *");
	header("Content-Type: application/json; charset=utf-8"); 
	
	clearstatcache(); // limpa o cache
    // Dados do servidor de banco de dados, neste exemplo uso o servidor da escola
	$servidor = 'localhost';
	$usuario  = 'root';
	$senha    = '';
	$banco    = 'dblogin';

	if ($_GET){
		$e = $_GET['e'];
		$p = $_GET['p'];
	} else {
		echo '[{"erro":"Sem parametros na url"}]';
		exit(); //para a aplicação PHP
	}

	try {
		$conecta = new PDO("mysql:host=$servidor;dbname=$banco", $usuario , $senha);
		$conecta->exec("set names utf8"); //permite caracteres latinos.
		$consulta = $conecta->prepare("SELECT * FROM usuarios 
									   WHERE usuario_email = '$e' 
									   AND  usuario_senha = '$p'");
		$consulta->execute(array());  
		$resultadoDaConsulta = $consulta->fetchAll();
		
		
		if (count($resultadoDaConsulta) === 0)
		{
			echo '[{"erro":"Usuário não encontrado!"}]';
		}
		
		if ( count($resultadoDaConsulta) ) {
		foreach($resultadoDaConsulta as $registro) {
			
            $usuario= array('usuario'=>array(
            									'usuarioId'=>	$registro['usuario_id'],
            						  			'usuarioNome' 	=>	$registro['usuario_nome'],
            						  			'usuarioEmail'	=>	$registro['usuario_email'],
            						  			'usuarioSenha'	=>	$registro['usuario_senha']
            									)      									
        					);
		}

		$StringJson =json_encode($usuario);
		echo json_encode($usuario);
		
  } 
} catch(PDOException $e) {
    echo 'ERROR: ' . $e->getMessage(); // opcional, apenas para teste
}
?>