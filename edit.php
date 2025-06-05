<?php

//conecta com o arquivo de conexao
include 'conexao.php';

//faz a busca do registro no banco de dados por meio do id
if(isset($_GET['id'])){
    $id = $_GET['id'];
    $resultado = $conexao->query("SELECT * FROM produtos WHERE id=$id");
    $produto = $resultado->fetch_assoc();
}

//atualiza as informacoes com base no id do produto
if(isset($_POST['nome'])){
    $id = $_POST['id'];
    $nome = $_POST['nome'];
    $descricao = $_POST['descricao'];
    $preco = $_POST['preco'];

    $sql = "UPDATE produtos SET nome='$nome', descricao='$descricao', preco='$preco' WHERE id=$id";
    if($conexao->query($sql)){
        header('Location: index.php');
    } else {
        echo "Erro ao editar: " . $conexao->error;
    }
}
?>

<!-- Formulario de edicao -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mauro 1166101</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<!-- Formulario de editar produtos cadastrados, segue o mesmo padrao de estilo do formulario de cadastro -->
<h2>Editar Produto</h2>
<form method="POST">
    <input type="hidden" name="id" value="<?php echo $produto['id']; ?>">
    <input type="text" name="nome" value="<?php echo $produto['nome']; ?>" required>
    <textarea name="descricao" required><?php echo $produto['descricao']; ?></textarea>
    <input type="number" step="0.01" name="preco" value="<?php echo $produto['preco']; ?>" required>
    <button type="submit">Salvar alteração</button>
</form>

</body>
</html>