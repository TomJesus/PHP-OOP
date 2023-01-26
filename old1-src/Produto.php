<?php

declare(strict_types=1); //faz a verificação de tipos(int, strins,float e etc)

class Produto
{
    /**
     * @var PDO
     */
    private $conexao;


    public function __construct()
    {
        try {
            $this->conexao = new PDO('mysql:host=127.0.0.1;dbname=exemplo','root','114433');
        } catch (Exception $e){
            echo $e->getMessage();
            die();
        }
    }

    public function list(): array
    {
        $sql = 'select * from produtos';// instrução para selecionar todos os itens da tabela produtos

        $produtos = []; //cria um arry vazio de produtos

        foreach ($this->conexao->query($sql) as $key => $value) {  // raliza abusca dos produtos
           array_push($produtos, $value);
        }
        return $produtos;
    }
    public function insert(string  $descricao): int
        // o parâmetro descrição passa a responsibilidade para quem chamar a função iserir o conteúdo de descricao.
    {
        $sql = 'insert into produtos(descricao) values(?)'; // instrução sql para realizar o comando desejado.

        $prepare = $this->conexao->prepare($sql);//prepara a variavel pdo para receber o comando escrito na variavel sql.

        $prepare->bindParam(1, $descricao);// realiza a atribuição atravez do metodo bindParam.
// O bindParam realiza essa inserção com uma camada a mais de segurança
// o numero 1 refere-se ao primeiro elemento passado na instrução sql(descricao)

        $prepare->execute(); // executa a ação de inserir o item.

     return $prepare->rowCount(); // retorna se alguma linha foi afetada. Retorna 0 se deu algo errado e 1 se deu certo.
    }
    public function update(string $descricao, int $id): int
    {
        $sql = 'update produtos set descricao = ? where id = ?'; // instrução sql para realizar o comando desejado.

        $prepare = $this->conexao->prepare($sql);//prepara a variavel pdo para receber o comando escrito na variavel sql.

        $prepare->bindParam(1, $descricao);
        $prepare->bindParam(2, $id);// realiza a alteração atravez do metodo bindParam.
// O bindParam realiza essa alteração com uma camada a mais de segurança
// o numero 1 refere-se ao primeiro elemento passado na instrução sql(id) e o numero 2 refere-se ao segundo elemento.

        $prepare->execute(); // executa a ação de atualizar o item.

     return $prepare->rowCount();  // retorna se alguma linha foi afetada. Retorna 0 se deu algo errado e 1 se deu certo.
    }
    public function delete(int $id):int
    {
        $sql = 'delete from produtos  where id = ?';  // instrução sql para realizar o comando desejado.

        $prepare = $this->conexao->prepare($sql);  //prepara a variavel pdo para receber o comando escrito na variavel sql.

        $prepare->bindParam(1, $id); // realiza a alteração atravez do metodo bindParam.
// O bindParam realiza essa alteração com uma camada a mais de segurança
// o numero 1 refere-se ao primeiro elemento passado na instrução sql(id)

        $prepare->execute();    // executa a ação de deletar o item.

        return $prepare->rowCount();   // retorna se alguma linha foi afetada. Retorna 0 se deu algo errado e 1 se deu certo.
    }
}