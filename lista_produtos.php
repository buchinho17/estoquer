<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Produtos</title>
    <link rel="stylesheet" href="estilos.css"> <!-- Se você tiver um CSS estilizado -->
</head>
<body>

<div class="container">
    <h2>Lista de Produtos Cadastrados</h2>

    <?php
    include 'config.php';

    $sql = "SELECT * FROM estoque";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<table>";
        echo "<thead>";
        echo "<tr>";
        echo "<th>Nome</th>";
        echo "<th>Descrição</th>";
        echo "<th>Preço</th>";
        echo "<th>Estoque</th>";
        echo "<th>Código</th>";
        echo "</tr>";
        echo "</thead>";
        echo "<tbody>";
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . htmlspecialchars($row['nome']) . "</td>";
            echo "<td>" . htmlspecialchars($row['descricao']) . "</td>";
            echo "<td>R$ " . number_format($row['preco'], 2, ',', '.') . "</td>";
            echo "<td>" . $row['estoque'] . "</td>";
            echo "<td>" . $row['codigo'] . "</td>";
            echo "</tr>";
        }
        echo "</tbody>";
        echo "</table>";
    } else {
        echo "<p>Nenhum produto cadastrado.</p>";
    }

    $conn->close();
    ?>

    <br>
    <a href="cadastro_produtos.php">Cadastrar Novo Produto</a>
</div>

</body>
</html>

