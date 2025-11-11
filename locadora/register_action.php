<?php
require_once 'config/conexao.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") { 
    
    if (empty($_POST['nome']) || empty($_POST['email']) || empty($_POST['senha'])) {
        die("Erro: Todos os campos são obrigatórios.");
    }

    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    $senha_hash = password_hash($senha, PASSWORD_BCRYPT);

    try {
        $sql = "INSERT INTO usuarios (nome, email, senha) VALUES (?, ?, ?)"; 
        $stmt = $conn->prepare($sql); 
        $stmt->execute([$nome, $email, $senha_hash]); 

        header("Location: index.php?success=1");
        exit;
    } catch (PDOException $e) {
        die("Erro ao registrar: " . $e->getMessage());
    }
}
?>