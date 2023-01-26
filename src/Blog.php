<?php

declare(strict_types=1);

class Blog
{
    /**
     * @var PDO
     */
    private $conexao;


    public function __construct()
    {
        try {
            $this->conexao = new PDO('mysql:host=127.0.0.1;dbname=exercicio','root','114433');
        } catch (Exception $e){
            echo $e->getMessage();
            die();
        }
    }

    public function listagem(): array
    {
        $sql = 'select * from textos';


        $textos = [];


        foreach ($this->conexao->query($sql) as $key => $value) {
            array_push($textos, $value);
        }
        return $textos;

    }

    public function inclusao(string $descricao):int
    {

        $sql = 'insert into textos(descricao) values(?)';

        $prepare = $this->conexao->prepare($sql);

        $prepare->bindParam(1, $descricao);

        $prepare->execute();

        return $prepare->rowCount();

    }

    public function edicao(string $descricao, int $id):int
    {

        $sql = 'update textos set descricao = ? where id = ?';

        $prepare = $this->conexao->prepare($sql);

        $prepare->bindParam(1, $descricao);
        $prepare->bindParam(2, $id);

        $prepare->execute();


        return $prepare->rowCount();

    }

    public function exclusao(int $id): int
    {

        $sql = 'delete from textos  where id = ?';


        $prepare = $this->conexao->prepare($sql);


        $prepare->bindParam(1, $id);


        $prepare->execute();


        return $prepare->rowCount();


    }

}