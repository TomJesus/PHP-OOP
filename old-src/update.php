<?php

declare(strict_types=1);//faz a verificação de tipos(int, strins,float e etc)

$pdo = require 'connect.php'; // requere uma conecção com connect.php
$sql = 'update produtos set descricao = ? where id = ?'; // instrução sql para realizar o comando desejado.

$prepare = $pdo->prepare($sql);//prepara a variavel pdo para receber o comando escrito na variavel sql.

$prepare->bindParam(1, $_GET['descricao']);
$prepare->bindParam(2, $_GET['id']);// realiza a alteração atravez do metodo get.
// O bindParam realiza essa alteração com uma camada a mais de segurança
// o numero 1 refere-se ao primeiro elemento passado na instrução sql(id) e o numero 2 refere-se ao segundo elemento.

$prepare->execute(); // executa a ação de atualizar o item.

echo $prepare->rowCount();  // retorna se alguma linha foi afetada. Retorna 0 se deu algo errado e 1 se deu certo.