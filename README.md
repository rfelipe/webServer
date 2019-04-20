# webServer 
este é um servidor de webservece utilizando PHP com conexao ao banco Mysql.

OBS.: rodei meu WebServer em servidor local
entao a parte inical do link "http://localhost:8080/locadora/" pode ficar diferente
dependendo das pasta e configuração usada no seu servidor.

#Logar usuario no sistemas
envia uma email e senha para verificação; 
http://localhost:8080/locadora/webserv.php?e="+email+"&p="+senha

#Criar usuario
envia um nome, email,senha
http://localhost:8080/locadora/userSalva.php?nome="+nome+"&email="+email+"&pass="+pass

#Lista filmes
retorna todos os filmes disponiveis
http://localhost:8080/locadora/listaFilme.php

#Busca filme pelo nome
envia um titulo de filme e retorna todos os filmes contendo o ttulo buscado
http://localhost:8080/locadora/listaFilme.php?e="+titulo

#Filmes que aluguei
envia uma ID de ususario e retorna todos os filmes locados por esse ususario
http://localhost:8080/locadora/meuFilme.php?usuarioId="+usuarioId

#Alugar filme
envia a id do filme id do usuario e o status de alugado
http://localhost:8080/locadora/alugaFilme.php?filmeId="+filmeId+"&usuarioId="+usuarioId+"&status=alugado

#Devolve filme
envia a id do filme id do usuario e o status de Disponivel
http://localhost:8080/locadora/devolveFilme.php?filmeId="+filmeId+"&usuarioId="+usuarioId+"&status=Disponivel
