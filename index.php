<?php

//conecta com o arquivo de conexao
include 'conexao.php';

$resultado = $conexao->query("SELECT * FROM produtos");

// form principal para adicionar, editar ou excluir registros de produtos do banco
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mauro 1166101</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<!-- Formulario de cadastro de produtos -->
<h1>Cadastro de Produtos Uniube</h1>

<h2>Adicionar Novo Produto</h2>
<form method="POST" action="criar.php">
    <input type="text" name="nome" placeholder="Nome" required>
    <textarea name="descricao" placeholder="Descrição" required></textarea>
    <input type="number" step="0.01" name="preco" placeholder="Preço" required>
    <button type="submit">Cadastrar</button>
</form>

<div class="linha"></div>

<!-- bloco para exibicao dos produtos ja cadastrados -->
<h2>Produtos Cadastrados</h2>

<?php while($produto = $resultado->fetch_assoc()): ?>
    <div class="produto">
        <strong class="nome_prod"><?php echo $produto['nome']; ?></strong><br><br>
        <strong>Descrição:</strong><br>
        <?php echo $produto['descricao']; ?><br><br>
        <strong>Preço:</strong> R$ <?php echo $produto['preco']; ?><br><br>
        <a href="edit.php?id=<?php echo $produto['id']; ?>" class="editar" >Editar</a> | 
        <a href="delete.php?id=<?php echo $produto['id']; ?>" onclick="return confirm('Deseja mesmo excluir o registro?');" class="excluir" >Excluir</a>
    </div>
<?php endwhile; ?>

</body>
</html>