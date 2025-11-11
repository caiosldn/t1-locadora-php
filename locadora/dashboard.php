<?php
require_once 'auth_check.php'; 
require_once 'header.php';     
?>

<div class="p-5 mb-4 bg-light rounded-3">
    <div class="container-fluid py-5">
        <h1 class="display-5 fw-bold">Bem-vindo(a), <?php echo htmlspecialchars($_SESSION['user_nome']); ?>!</h1> <p class="col-md-8 fs-4">Este é o seu painel de gerenciamento da locadora.</p>
        <a href="filmes_list.php" class="btn btn-primary btn-lg" role="button">Gerenciar Filmes</a>
    </div>
</div>

<?php
require_once 'footer.php'; 
?>