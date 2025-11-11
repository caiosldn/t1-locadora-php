<?php
session_start();
require_once 'config/conexao.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") { /
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    try {
        $sql = "SELECT * FROM usuarios WHERE email = ?";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$email]);
        $usuario = $stmt->fetch();

        if ($usuario && password_verify($senha, $usuario['senha'])) {
            $_SESSION['user_id'] = $usuario['id'];
            $_SESSION['user_nome'] = $usuario['nome'];
            
            header("Location: dashboard.php");
            exit;
        } else {
            header("Location: index.php?error=1");
            exit;
        }
    } catch (PDOException $e) {
        die("Erro ao fazer login: " . $e->getMessage());
    }
}
?>