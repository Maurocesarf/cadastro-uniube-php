<?php

//conecta com o arquivo de conexao
include 'conexao.php';

//deleta o registro pelo id informado no forms
if(isset($_GET['id'])){
    $id = $_GET['id'];
    $sql = "DELETE FROM produtos WHERE id=$id";
    if($conexao->query($sql)){
        header('Location: index.php');
    } else {
        echo "Erro ao excluir: " . $conexao->error;
    }
}
?>