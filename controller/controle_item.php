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

            if(($titulo || $categoria || $descricao) != null){
                $resultado_dao = $itemDAO->cadastrar_item($titulo, $categoria, $descricao);
            }else{
                $resultado_dao = "Valor nulo";
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
}
