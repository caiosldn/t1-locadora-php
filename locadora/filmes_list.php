<?php
require_once 'auth_check.php';
require_once 'config/conexao.php';
require_once 'header.php';

echo '<div class="d-flex justify-content-between align-items-center mb-3">';
echo '<h2>Gerenciamento de Filmes</h2>';
echo '<a href="filmes_form.php" class="btn btn-success">Adicionar Novo Filme</a>';
echo '</div>';

try {
    $stmt = $conn->query("SELECT * FROM filmes ORDER BY titulo");
    
    echo '<table class="table table-striped table-hover">';
    echo '<thead class="table-dark"><tr><th>Título</th><th>Gênero</th><th>Ano</th><th>Cópias</th><th>Ações</th></tr></thead>';
    echo '<tbody>';

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) { 
        echo '<tr>';
        echo '<td>' . htmlspecialchars($row['titulo']) . '</td>';
        echo '<td>' . htmlspecialchars($row['genero']) . '</td>';
        echo '<td>' . htmlspecialchars($row['ano']) . '</td>';
        echo '<td>' . htmlspecialchars($row['copias_disponiveis']) . '</td>';
        echo '<td>';
        echo '<a href="filmes_form.php?id=' . $row['id'] . '" class="btn btn-sm btn-warning me-2">Editar</a>';
        echo '<a href="filme_delete.php?id=' . $row['id'] . '" class="btn btn-sm btn-danger" onclick="return confirm(\'Tem certeza?\')">Excluir</a>';
        echo '</td>';
        echo '</tr>';
    }

    echo '</tbody></table>';

} catch (PDOException $e) {
    echo "Erro ao listar filmes: " . $e->getMessage();
}

require_once 'footer.php';
?>