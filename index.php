<?php

require 'src/Produto.php';

$produto = new Produto();

switch ($_GET['operacao']) {

    case 'listar':
        echo '<h3>Produtos: </h3>';
        foreach($produto->listar() as $value)
        {
            echo 'ID: ' . $value['id'] . '<br> Descrição: ' . $value['descricao'] . '<hr>';
        };
        break;
    
    case 'atualizar':
        $res = $produto->atualizar($_GET['descricao'], $_GET['id']);
        echo "$res linha(s) atualizada(s).";
        break;

    case 'apagar':
        $res = $produto->apagar($_GET['id']);
        echo "$res linha(s) apagada(s).";
        break;

    case 'inserir':
        $res = $produto->inserir($_GET['descricao']);
        echo "$res linha(s) inserida(s).";
        break;
    
    default:
        echo "Insira uma operação!";
        break;
}