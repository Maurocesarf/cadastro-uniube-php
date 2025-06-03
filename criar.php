<?php

//conecta com o arquivo de conexao
include 'conexao.php';

// resgata os valores preenchidos no form
if(isset($_POST['nome'])){
    $nome = $_POST['nome'];
    $descricao = $_POST['descricao'];
    $preco = $_POST['preco'];

    //adiciona os valores recuperados no form ao banco de dados
    $sql = "INSERT INTO produtos (nome, descricao, preco) VALUES ('$nome', '$descricao', '$preco')";
    if($conexao->query($sql)){
        header('Location: index.php');
    } else {
        echo "Erro ao cadastrar: " . $conexao->error;
    }
}
?>