<?php
// o connec faz a conecção da base de dados com o codigo sendo executado, mostrando as informações na web
// PS: A base de dados precisa está criada
//PS: O meu banco de dados MYsql precisou estar conectado com a minha IDE

declare(strict_types=1);//faz a verificação de tipos(int, strins,float e etc)

$pdo = null;  //criação da variavel pdo recebendo nullo.

try {
    $pdo = new PDO('mysql:host=127.0.0.1;dbname=exemplo','root','114433');
// pdo é estanciado como uma novo objeto do tipo PDO
// é passado o endereço da base de dados que será usada
// o try executa a ação.
//
} catch (Exception $e){    // se tiver algum erro, o metodo catch captura esse erro e exibe uma mensagem.
    echo $e->getMessage();
    die();
}
return $pdo; // retorna tudo que está dentro de pdo.
