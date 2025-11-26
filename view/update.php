<?php
declare(strict_types=1);

require_once("../model/conexao.class.php");
require_once("../model/Contatos.class.php");
require_once("../controller/ContatosDAO.class.php");

header("Cache-Control: no-cache, no-store, must-revalidate");
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=utf-8");

try {
    $body = file_get_contents('php://input');
    $jsonBody = json_decode($body, true);

    // JSON (Android) OU POST normal (form HTML)
    $id = $jsonBody['id'] ?? $_POST['id'] ?? null;
    $nome = $jsonBody['nome'] ?? $_POST['nome'] ?? null;
    $telefone = $jsonBody['telefone'] ?? $_POST['telefone'] ?? null;
    $email = $jsonBody['email'] ?? $_POST['email'] ?? null;

    if ($id === null) {
        throw new Exception("ID não informado");
    }

    // Cast para tipos corretos
    $id = (int) $id;
    $nome = $nome ? (string) $nome : null;
    $telefone = $telefone ? (string) $telefone : null;
    $email = $email ? (string) $email : null;

    $contato = new Contatos($id, $nome, $telefone, $email);
    $dao = new ContatosDAO();

    $dao->alterar($contato);

    echo json_encode(["status" => "OK"], JSON_THROW_ON_ERROR);

} catch (Exception $e) {
    echo json_encode(["erro" => $e->getMessage()], JSON_THROW_ON_ERROR);
}
