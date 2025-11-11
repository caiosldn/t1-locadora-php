<?php
require_once 'config/conexao.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    if (empty($_POST['email']) || empty($_POST['nova_senha'])) {
        die("Erro: Requisição inválida.");
    }

    $email = $_POST['email'];
    $nova_senha = $_POST['nova_senha'];

    $senha_hash = password_hash($nova_senha, PASSWORD_BCRYPT);

    try {
        $sql = "UPDATE usuarios SET senha = ? WHERE email = ?";
        $stmt = $conn->prepare($sql);
        
        if ($stmt->execute([$senha_hash, $email])) {
            header("Location: index.php?success=reset"); 
            exit;
        } else {
            die("Erro ao atualizar a senha.");
        }

    } catch (PDOException $e) {
        die("Erro no banco de dados: " . $e->getMessage());
    }
}
?>