<?php

require_once('conexao.php');
class categoriaDAO
{
    public function __construct()
    {
        require_once("../model/categoria.php");
    }

    public function consultar_categoria()
    {
        $con = new Conexao();

        $conexao = $con->getConnection();
        $stmt = $conexao->prepare('select * from categoria');

        $categorias = array();
        $stmt->execute();

        $resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach ($resultado as $valores) {
            $categoria = new categoria();
            $categoria->setId($valores['id']);
            $categoria->setNome($valores['nome']);
            array_push($categorias, $categoria);
        }
        return $categorias;
    }

    public function cadastrar_categoria($nome_categoria)
    {
        $con = new Conexao();

        $conexao = $con->getConnection();
        $stmt = $conexao->prepare('insert into categoria (nome) values (?)');
        $stmt->bindParam(1,$nome_categoria);
        if($stmt->execute()){
            return "Categoria inserida com sucesso!";
        }else{
            return "Erro ao inserir categoria!";
        }
    }

    public function remover_categoria($id_categoria)
    {
        $con = new Conexao();

        $conexao = $con->getConnection();
        $stmt = $conexao->prepare('delete from categoria where id = ?');
        $stmt->bindParam(1, $id_categoria);
        if ($stmt->execute()) {
            return "Categoria deletada com sucesso!";
        } else {
            return "Erro ao deletar categoria!";
        }
    }

}