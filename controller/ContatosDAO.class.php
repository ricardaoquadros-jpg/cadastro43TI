<?php
declare(strict_types=1);

require_once("../model/conexao.class.php");
require_once("../model/Contatos.class.php");

class ContatosDAO
{

    // LISTAR TUDO
    public function listar(): array
    {
        try {
            // Selecionar colunas específicas é uma boa prática, mas * é aceitável aqui se precisarmos de tudo
            $sql = "SELECT id, nome, telefone, email FROM contatos ORDER BY id DESC";
            $p_sql = Conexao::getInstance()->prepare($sql);
            $p_sql->execute();
            return $p_sql->fetchAll();

        } catch (Exception $e) {
            return ["erro" => $e->getMessage()];
        }
    }

    // BUSCA POR NOME
    public function buscaNome(string $nome): array
    {
        try {
            $sql = "SELECT id, nome, telefone, email FROM contatos WHERE nome LIKE :nome ORDER BY id DESC";
            $p_sql = Conexao::getInstance()->prepare($sql);
            $p_sql->bindValue(":nome", "%{$nome}%");
            $p_sql->execute();

            return $p_sql->fetchAll();

        } catch (Exception $e) {
            return ["erro" => $e->getMessage()];
        }
    }

    // BUSCAR POR ID
    public function buscarPorId(int $id): array|false
    {
        try {
            $sql = "SELECT id, nome, telefone, email FROM contatos WHERE id = :id";
            $p_sql = Conexao::getInstance()->prepare($sql);
            $p_sql->bindValue(":id", $id, PDO::PARAM_INT);
            $p_sql->execute();

            return $p_sql->fetch();

        } catch (Exception $e) {
            // Retornar array com erro para consistência ou lançar exceção
            return ["erro" => $e->getMessage()];
        }
    }

    // INSERIR
    public function inserir(Contatos $contatos): array
    {
        try {
            $sql = "INSERT INTO contatos (nome, telefone, email)
                    VALUES (:nome, :telefone, :email)";

            $p_sql = Conexao::getInstance()->prepare($sql);

            $p_sql->bindValue(":nome", $contatos->getNome());
            $p_sql->bindValue(":telefone", $contatos->getTelefone());
            $p_sql->bindValue(":email", $contatos->getEmail());

            $p_sql->execute();
            return ["status" => "OK"];

        } catch (Exception $e) {
            return ["erro" => $e->getMessage()];
        }
    }

    // ALTERAR
    public function alterar(Contatos $contatos): array
    {
        try {
            $sql = "UPDATE contatos SET 
                        nome = :nome, 
                        telefone = :telefone,
                        email = :email 
                    WHERE id = :id";

            $p_sql = Conexao::getInstance()->prepare($sql);

            $p_sql->bindValue(":nome", $contatos->getNome());
            $p_sql->bindValue(":telefone", $contatos->getTelefone());
            $p_sql->bindValue(":email", $contatos->getEmail());
            $p_sql->bindValue(":id", $contatos->getId(), PDO::PARAM_INT);

            $p_sql->execute();
            return ["status" => "OK"];

        } catch (Exception $e) {
            return ["erro" => $e->getMessage()];
        }
    }

    // DELETAR
    public function remover(int $id): array
    {
        try {
            $sql = "DELETE FROM contatos WHERE id = :id";
            $p_sql = Conexao::getInstance()->prepare($sql);
            $p_sql->bindValue(":id", $id, PDO::PARAM_INT);
            $p_sql->execute();

            return ["status" => "OK"];

        } catch (Exception $e) {
            return ["erro" => $e->getMessage()];
        }
    }
}