<?php

// variaves de acesso ao banco
$servidor = "localhost";
$usuario = "root";
$senha = ""; // retirei a senha para nao envia-la no projeto
$banco = "cadastro_produtos";

// cria conexao com o banco de dados
$conexao = new mysqli($servidor, $usuario, $senha, $banco);

if ($conexao->connect_error) {
    die("Erro na conexão: " . $conexao->connect_error);
}
?>