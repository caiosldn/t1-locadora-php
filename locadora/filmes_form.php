<?php
require_once 'auth_check.php';
require_once 'config/conexao.php';

$filme = ['id' => '', 'titulo' => '', 'genero' => '', 'ano' => '', 'copias_disponiveis' => '1'];
$titulo_pagina = "Adicionar Filme";

if (isset($_GET['id']) && !empty($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM filmes WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$id]);
    $filme = $stmt->fetch(PDO::FETCH_ASSOC);
    
    if ($filme) {
        $titulo_pagina = "Editar Filme";
    }
}

require_once 'header.php';
?>

<h3><?php echo $titulo_pagina; ?></h3>

<form action="filme_action.php" method="POST" class="card p-3">
    <input type="hidden" name="id" value="<?php echo $filme['id']; ?>">
    
    <div class="mb-3">
        <label for="titulo" class="form-label">Título</label>
        <input type="text" class="form-control" id="titulo" name="titulo" 
               value="<?php echo htmlspecialchars($filme['titulo']); ?>" required> </div>
    <div class="mb-3">
        <label for="genero" class="form-label">Gênero</label>
        <input type="text" class="form-control" id="genero" name="genero" 
               value="<?php echo htmlspecialchars($filme['genero']); ?>"> </div>
    <div class="row">
        <div class="col-md-6 mb-3">
            <label for="ano" class="form-label">Ano de Lançamento</label>
            <input type="number" class="form-control" id="ano" name="ano" 
                   value="<?php echo htmlspecialchars($filme['ano']); ?>"> </div>
        <div class="col-md-6 mb-3">
            <label for="copias" class="form-label">Cópias Disponíveis</label>
            <input type="number" class="form-control" id="copias" name="copias" 
                   value="<?php echo htmlspecialchars($filme['copias_disponiveis']); ?>" min="0" required>
        </div>
    </div>
    
    <button type="submit" class="btn btn-primary">Salvar</button>
</form>

<?php
require_once 'footer.php';
?>