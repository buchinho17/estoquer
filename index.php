<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Produtos</title>
    <link rel="stylesheet" href="estilos.css">
</head>
<body>
    <h1>Cadastro de Produtos</h1>
        <form action="cadastro.php" method="POST">
        <input type="number" name="codigo" placeholder="codigo" required>
        <input type="text" name="nome" placeholder="Nome do Produto" required>
        <textarea name="descricao" placeholder="Descrição"></textarea>
        <input type="number" name="preco" placeholder="Preço" required step="0.01">
        <input type="number" name="estoque" placeholder="estoque" required>
        <button type="submit">Cadastrar</button>
    </form>
    <hr>
    
    <?php include 'listar.php'; ?>

</body>
</html>
