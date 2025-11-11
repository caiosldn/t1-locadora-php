<?php
require_once 'config/conexao.php';
$email = '';
$usuario_existe = false;

if (isset($_GET['email']) && !empty($_GET['email'])) {
    $email = $_GET['email'];
    
    // Verifica se o email existe no banco (Proteção com Prepared Statement)
    $sql = "SELECT id FROM usuarios WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$email]);
    
    if ($stmt->fetch()) {
        $usuario_existe = true;
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Redefinir Senha - Locadora</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6 col-lg-4">
            <div class="card shadow-sm">
                <div class="card-body">
                    
                    <?php if ($usuario_existe): ?>
                        <h3 class="card-title text-center mb-4">Redefinir Senha</h3>
                        <p class="text-center">Usuário encontrado: <strong><?= htmlspecialchars($email) ?></strong></p>
                        
                        <form action="reset_action.php" method="POST">
                            <input type="hidden" name="email" value="<?= htmlspecialchars($email) ?>">
                            
                            <div class="mb-3">
                                <label for="nova_senha" class="form-label">Nova Senha</label>
                                <input type="password" class="form-control" id="nova_senha" name="nova_senha" required>
                            </div>
                            <button type="submit" class="btn btn-primary w-100">Salvar Nova Senha</button>
                        </form>
                    
                    <?php else: ?>
                        <h3 class="card-title text-center mb-4 text-danger">Erro</h3>
                        <p class="text-center">E-mail não encontrado no sistema.</p>
                        <div class="text-center mt-3">
                            <a href="forgot_password.php" class="btn btn-secondary">Tentar Novamente</a>
                        </div>
                    <?php endif; ?>
                    
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>