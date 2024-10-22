<?php
include 'config.php';
 
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = $_POST['nome'];
    $descricao = $_POST['descricao'];
    $preco = $_POST['preco'];
    $estoque = $_POST['estoque'];
    $codigo = $_POST['codigo']; // Adicionado ponto e vírgula

    // Ajuste os tipos no bind_param conforme o tipo de cada coluna
    $sql = "INSERT INTO estoque (nome, descricao, preco, estoque, codigo) VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssdis", $nome, $descricao, $preco, $estoque, $codigo); // Adicionado tipo 's' para código

    if ($stmt->execute()) {
        echo "Estoque cadastrado com sucesso!";
    } else {
        echo "Erro ao cadastrar estoque: " . $stmt->error;
    }

    $stmt->close();
}
$conn->close();
?>
