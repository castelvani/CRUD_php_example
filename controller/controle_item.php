<?php
require_once('../dao/itemDAO.php');
$opcao = $texto = isset($_POST['opcao']) ? $_POST['opcao'] : null;

switch ($opcao) {
    case 'consultar':
        try {
            $itemDAO = new itemDAO();

            $resultado_dao = $itemDAO->consultar_item();
            //JsonSerializable é usado na modelo item para que seja possivel pegar os valores
            echo json_encode($resultado_dao);
        } catch (Exception $erro) {
            echo $erro;
        }
        break;
    case 'cadastrar':
        try {
            $titulo = $texto = isset($_POST['titulo']) ? $_POST['titulo'] : null;
            $categoria = $texto = isset($_POST['categoria']) ? $_POST['categoria'] : null;
            $descricao = $texto = isset($_POST['descricao']) ? $_POST['descricao'] : null;
            
            $itemDAO = new itemDAO();

            if (($titulo && $categoria && $descricao) != null) {
                $itemDAO->cadastrar_item($titulo, $categoria, $descricao);
                $resultado_dao = "Cadastrado com sucesso!";
            } else {
                $resultado_dao = "Campos obrigatórios estão vazios!";
            }

            echo ($resultado_dao);
        } catch (Exception $erro) {
            echo $erro;
        }
        break;
    case 'remover':
        try {
            $id_item = $texto = isset($_POST['id_item']) ? $_POST['id_item'] : null;

            $itemDAO = new itemDAO();

            $resultado_dao = $itemDAO->remover_item($id_item);

            echo ($resultado_dao);
        } catch (Exception $erro) {
            echo $erro;
        }
        break;
    case 'consultar_por_id':
        try {
            $id_item = $texto = isset($_POST['id_item']) ? $_POST['id_item'] : null;

            $itemDAO = new itemDAO();
            if ($id_item != null) {
                $resultado_dao = $itemDAO->consultar_item_por_id($id_item);
            } else {
                $resultado_dao = "Erro ao consultar";
            }

            echo json_encode($resultado_dao);
        } catch (Exception $erro) {
            echo $erro;
        }
        break;
    case 'alterar':
        try {
            $titulo = $texto = isset($_POST['titulo']) ? $_POST['titulo'] : null;
            $descricao = $texto = isset($_POST['descricao']) ? $_POST['descricao'] : null;
            $id_categoria = $texto = isset($_POST['id_categoria']) ? $_POST['id_categoria'] : null;
            $id_item = $texto = isset($_POST['id_item']) ? $_POST['id_item'] : null;
            
            $itemDAO = new itemDAO();
            if ($id_categoria != null) {
                $itemDAO->alterar_item($titulo, $id_categoria, $descricao, $id_item);
                $resultado_dao = "Item alterado com sucesso!";
            } else {
                $resultado_dao = "Erro ao alterar";
            }

            echo ($resultado_dao);
        } catch (Exception $erro) {
            echo $erro;
        }
        break;
}
