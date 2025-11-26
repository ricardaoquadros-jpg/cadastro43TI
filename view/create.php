<?php
declare(strict_types=1);

require_once("../model/conexao.class.php");
require_once("../model/Contatos.class.php");
require_once("../controller/ContatosDAO.class.php");

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=utf-8");

try {
    $nome = $_POST['nome'] ?? $_GET['nome'] ?? null;
    $telefone = $_POST['telefone'] ?? $_GET['telefone'] ?? null;
    $email = $_POST['email'] ?? $_GET['email'] ?? null;

    if (!$nome || !$telefone || !$email) {
        throw new Exception("Campos obrigatórios não informados");
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        throw new Exception("Email inválido");
    }

    // Sanitização básica
    $nome = htmlspecialchars(strip_tags((string) $nome));
    $telefone = htmlspecialchars(strip_tags((string) $telefone));
    $email = filter_var($email, FILTER_SANITIZE_EMAIL);

    // Instanciação otimizada com Constructor Promotion
    $contato = new Contatos(null, $nome, $telefone, $email);
    $dao = new ContatosDAO();

    $dao->inserir($contato);

    echo json_encode(["status" => "OK"], JSON_THROW_ON_ERROR);

} catch (Exception $e) {
    echo json_encode(["erro" => $e->getMessage()], JSON_THROW_ON_ERROR);
}