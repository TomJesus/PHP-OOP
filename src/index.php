<?php
require 'Blog.php';

$textos = new Blog();

switch ($_GET['operacao']) {

    case 'list':
        echo '<h3>textos: </h3>';// exibe uma cabeçalho por nome texto.

        foreach ($textos->listagem() as $value) { // raliza abusca dos arquivos
            echo 'Id: ' . $value['id'] . '<br> Descricao: ' . $value['descricao'] . '<hr>'; // exibe os textos encontrados
        }

        break;

    case 'insert':

        $status = $textos->inclusao('Texto criado e dirigido por Aelton teixeira');

        if (!$status) {

            echo 'falha na execução ';
            return false;

        }
        echo 'Matéria enserida com sucesso!';

        break;

    case 'update':

        $status = $textos->edicao('Produto alterado Aelton teixeira', 4);

        if (!$status) {

            echo 'falha na execução ';
            return false;

        }
        echo 'Matéria alterada com sucesso!';

        break;

    case 'delete':
        $status = $textos->exclusao(1);

        if (!$status) {

            echo 'falha na execução ';
            return false;

        }
        echo 'Matéria excluida com sucesso!';

        break;
}


