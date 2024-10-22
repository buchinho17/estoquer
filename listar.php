<?php
include 'config.php';

$sql = "SELECT * FROM estoque";
$result = $conn->query($sql);

?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Produtos</title>
    <link rel="stylesheet" href="estilos.css"> <!-- Se quiser usar o CSS do Hello Kitty -->
</head>
<body>

<div class="container">
    <h2>Lista de Produtos</h2>

    <?php
    if ($result->num_rows > 0) {
        echo "<ul>";
        while ($row = $result->fetch_assoc()) {
            echo "<li>" . htmlspecialchars($row['nome']) . " - R$ " . number_format($row['preco'], 2, ',', '.') . "</li>";
        }
        echo "</ul>";
    } else {
        echo "<p>Nenhum produto cadastrado.</p>";
    }

    $conn->close();
    ?>
</div>

</body>
</html>
