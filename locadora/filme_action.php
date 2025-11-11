<?php
require_once 'auth_check.php';
require_once 'config/conexao.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $id = $_POST['id'];
    $titulo = $_POST['titulo'];
    $genero = $_POST['genero'];
    $ano = $_POST['ano'];
    $copias = $_POST['copias'];

    if (empty($titulo) || empty($copias)) {
        die("Erro: Título e Cópias são obrigatórios.");
    }

    try {
        if (empty($id)) {
            $sql = "INSERT INTO filmes (titulo, genero, ano, copias_disponiveis) VALUES (?, ?, ?, ?)";
            $stmt = $conn->prepare($sql);
            $stmt->execute([$titulo, $genero, $ano, $copias]); 
        } else {
            $sql = "UPDATE filmes SET titulo = ?, genero = ?, ano = ?, copias_disponiveis = ? WHERE id = ?";
            $stmt = $conn->prepare($sql); 
            $stmt->execute([$titulo, $genero, $ano, $copias, $id]); 
        }
        
        header("Location: filmes_list.php");
        exit;

    } catch (PDOException $e) {
        die("Erro ao salvar filme: " . $e->getMessage());
    }
} else {
    header("Location: filmes_list.php");
    exit;
}
?>