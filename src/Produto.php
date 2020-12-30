<?php

declare(strict_types=1);

class Produto 
{
    private $conexao;

    public function __construct()
    {
        try {
            $this->conexao = new PDO('mysql:host=localhost;dbname=ex-php-03', 'root', '');
        } catch (Exception $e) {
            echo $e->getMessage();
            die();
        }
    }

    public function listar() : array
    {
        $sql = 'select * from produtos';
        $produtos = [];

        foreach ($this->conexao->query($sql) as $key => $value)
        {
            array_push($produtos, $value);
        }

        return $produtos;
    }

    public function atualizar(string $descricao, int $id) : int
    {
        $sql = 'update produtos set descricao = ? where id = ?';

        $prepare = $this->conexao->prepare($sql);

        $prepare->bindParam(1, $descricao);
        $prepare->bindParam(2, $id);

        $prepare->execute();

        return $prepare->rowCount();
    }

    public function apagar(int $id) : int
    {
        $sql = 'delete from produtos where id = ?';

        $prepare = $this->conexao->prepare($sql);

        $prepare->bindParam(1, $id);
        $prepare->execute();

        return $prepare->rowCount();
    }

    public function inserir(string $descricao) : int
    {
        $sql = 'insert into produtos(descricao) values(?)';

        $prepare = $this->conexao->prepare($sql);

        $prepare->bindParam(1, $descricao);
        $prepare->execute();

        return $prepare->rowCount();
    }
}