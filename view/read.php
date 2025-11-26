<?php
declare(strict_types=1);

require_once("../model/conexao.class.php");
require_once("../controller/ContatosDAO.class.php");

header("Cache-Control: no-cache, no-store, must-revalidate");
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=utf-8");

try {
    $nome = $_GET['nome'] ?? "";

    $dao = new ContatosDAO();

    if ($nome === "") {
        $lista = $dao->listar();
    } else {
        $lista = $dao->buscaNome((string) $nome);
    }

    echo json_encode($lista, JSON_THROW_ON_ERROR | JSON_UNESCAPED_UNICODE);

} catch (Exception $e) {
    echo json_encode(["erro" => $e->getMessage()], JSON_THROW_ON_ERROR);
}
