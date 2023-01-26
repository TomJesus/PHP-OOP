<?php

require 'Produto.php';

$produto = new Produto();

switch ($_GET['operacao']) {

    case 'list':
        echo '<h3>produtos: </h3>';// exibe uma cabeçalho por nome produtos.

        foreach ($produto->list() as $value) { // raliza abusca dos produtos
            echo 'Id: ' . $value['id'] . '<br> Descricao: ' . $value['descricao'] . '<hr>'; // exibe os produtos encontrados
        }

            break;

        case 'insert':

            $status = $produto->insert('Produto teste Aelton teixeira');

            if (!$status){

                echo 'falha na execução ';
                return false;

            }
            echo 'Produto enserido com sucesso!';

        break;

        case 'update':

            $status = $produto->update('Produto alterado Aelton teixeira',4);

            if (!$status){

                echo 'falha na execução ';
                return false;

            }
            echo 'Registro enserido com sucesso!';

        break;

        case 'delete':
            $status = $produto->delete(1);

            if (!$status){

                echo 'falha na execução ';
                return false;

            }
            echo 'Registro removido com sucesso!';

        break;


}