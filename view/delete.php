<?php
declare(strict_types=1);

require_once("../model/conexao.class.php");
require_once("../model/Contatos.class.php");
require_once("../controller/ContatosDAO.class.php");

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=utf-8");

try {
    $id = $_GET['id'] ?? $_POST['id'] ?? null;

    if (!$id) {
        throw new Exception("ID não informado");
    }

    $dao = new ContatosDAO();
    $dao->remover((int) $id);

    echo json_encode(["status" => "OK"], JSON_THROW_ON_ERROR);

} catch (Exception $e) {
    echo json_encode(["erro" => $e->getMessage()], JSON_THROW_ON_ERROR);
}
