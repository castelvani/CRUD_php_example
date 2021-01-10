<?php

require_once('conexao.php');
class itemDAO
{
    public function __construct()
    {
        require_once('../model/item.php');
    }
    public function consultar_item()
    {
        $con = new Conexao();

        $conexao = $con->getConnection();
        $stmt = $conexao->prepare('select * from item');

        $itens = array();
        $stmt->execute();

        $resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach ($resultado as $valores) {
            $item = new item();
            $item->setId($valores['id']);
            $item->setTitulo($valores['titulo']);
            $item->setDescricao($valores['descricao']);
            array_push($itens, $item);
        }
        return $itens;
    }

    public function cadastrar_item($titulo, $categoria, $descricao)
    {
        $con = new Conexao();

        $conexao = $con->getConnection();
        $stmt = $conexao->prepare('insert into item (titulo, descricao, id_categoria) values (?,?,?)');
        $stmt->bindParam(1, $titulo);
        $stmt->bindParam(2, $descricao);
        $stmt->bindParam(3, $categoria);
        if ($stmt->execute()) {
            return "Item inserido com sucesso!";
        } else {
            return "Erro ao inserir item!";
        }
    }

    public function remover_item($id_item)
    {
        $con = new Conexao();

        $conexao = $con->getConnection();
        $stmt = $conexao->prepare('delete from item where id = ?');
        $stmt->bindParam(1, $id_item);
        if ($stmt->execute()) {
            return "Item deletado com sucesso!";
        } else {
            return "Erro ao deletar item!";
        }
    }
}
