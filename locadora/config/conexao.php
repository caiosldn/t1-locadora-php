<?php
$servername = "localhost";
$username = "root"; // Seu usuário do MySQL
$password = "";     // Sua senha do MySQL
$dbname = "locadora";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // Configura PDO para lançar exceções em caso de erro [cite: 85]
} catch(PDOException $e) {
    echo "Conexão falhou: " . $e->getMessage(); // [cite: 90]
    die();
}
?>