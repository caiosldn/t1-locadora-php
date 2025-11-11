<?php
require_once 'auth_check.php';
require_once 'config/conexao.php';

if (isset($_GET['id']) && !empty($_GET['id'])) {
    $id = $_GET['id'];
    
    try {
        $sql = "DELETE FROM filmes WHERE id = ?";
        $stmt = $conn->prepare($sql); 
        $stmt->execute([$id]); 
        
        header("Location: filmes_list.php");
        exit;

    } catch (PDOException $e) {
        die("Erro ao excluir filme: " . $e->getMessage());
    }
} else {
    header("Location: filmes_list.php");
    exit;
}
?>