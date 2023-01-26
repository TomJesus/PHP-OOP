<?php

declare(strict_types=1);//faz a verificação de tipos(int, strins,float e etc)

$pdo = require 'connect.php';  // requere uma conecção com connect.php
$sql = 'select * from produtos';// instrução para selecionar todos os itens da tabela produtos

echo '<h3>produtos: </h3>';// exibe uma cabeçalho por nome produtos.

foreach ($pdo->query($sql) as $key => $value){ // raliza abusca dos produtos
    echo 'Id: ' . $value['id'] . '<br> Descricao: ' . $value['descricao'] . '<hr>'; // exibe os produtos encontrados

}