<?php

//conecta com o arquivo de conexao
include 'conexao.php';

$resultado = $conexao->query("SELECT * FROM produtos");

// form principal para adicionar, editar ou excluir registros de produtos do banco
?>

<link rel="stylesheet" href="style.css">

<h1>Cadastro de Produtos Uniube</h1>

<h2>Adicionar Novo Produto</h2>
<form method="POST" action="criar.php">
    <input type="text" name="nome" placeholder="Nome" required>
    <textarea name="descricao" placeholder="Descrição" required></textarea>
    <input type="number" step="0.01" name="preco" placeholder="Preço" required>
    <button type="submit">Cadastrar</button>
</form>

<h2>Produtos Cadastrados</h2>

<?php while($produto = $resultado->fetch_assoc()): ?>
    <div class="produto">
        <strong><?php echo $produto['nome']; ?></strong><br>
        <?php echo $produto['descricao']; ?><br>
        Preço: R$ <?php echo $produto['preco']; ?><br>
        <a href="edit.php?id=<?php echo $produto['id']; ?>">Editar</a> | 
        <a href="delete.php?id=<?php echo $produto['id']; ?>" onclick="return confirm('Deseja mesmo exluir o registro?');">Excluir</a>
    </div>
<?php endwhile; ?>