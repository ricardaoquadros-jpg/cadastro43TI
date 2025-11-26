<?php
require_once("../model/conexao.class.php");

$conexao = Conexao::getInstance();

echo $conexao ? "BD Conectado" : "Erro ao conectar BD";
