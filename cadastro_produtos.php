<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Produtos</title>
    <link rel="stylesheet" href="estilos2.css"> <!-- Se você tiver um CSS estilizado -->
</head>
<body>



<div class="container">
    <h1>Cadastrar Produto</h1>
    <form method="POST" action="">
        <label for="nome">Nome:</label>
        <input type="text" id="nome" name="nome" required>

        <label for="descricao">Descrição:</label>
        <input type="text" id="descricao" name="descricao" required>

        <label for="preco">Preço:</label>
        <input type="number" id="preco" name="preco" step="0.01" required>

        <label for="estoque">Estoque:</label>
        <input type="number" id="estoque" name="estoque" required>

        <label for="codigo">Código:</label>
        <input type="text" id="codigo" name="codigo" required>

        <button type="submit" class="button">Cadastrar</button>
    </form>

    <br>
    <a href="lista_produtos.php">Ver Lista de Produtos</a>

    <?php
    include 'config.php';

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $nome = $_POST['nome'];
        $descricao = $_POST['descricao'];
        $preco = $_POST['preco'];
        $estoque = $_POST['estoque'];
        $codigo = $_POST['codigo'];

        // Inserção no banco de dados
        $sql = "INSERT INTO estoque (nome, descricao, preco, estoque, codigo) VALUES (?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssdis", $nome, $descricao, $preco, $estoque, $codigo);

        if ($stmt->execute()) {
            echo "<p>Estoque cadastrado com sucesso!</p>";
        } else {
            echo "<p>Erro ao cadastrar estoque: " . $stmt->error . "</p>";
        }

        $stmt->close();
    }

    $conn->close();
    ?>
</div>

</body>
</html>

