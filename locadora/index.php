<!DOCTYPE html>
<html>
<head>
    <title>Login - Locadora</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body class="bg-light">
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6 col-lg-4">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h3 class="card-title text-center mb-4">Login</h3>
                    
                    <form action="login_action.php" method="POST">
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email" required>
                        </div>
                        <div class="mb-3">
                            <label for="senha" class="form-label">Senha</label>
                            <input type="password" class="form-control" id="senha" name="senha" required>
                        </div>
                        <button type="submit" class="btn btn-primary w-100">Entrar</button>
                    </form>
                    
                    <div class="text-center mt-3">
                        <a href="register.php">Não tem uma conta? Registre-se</a>
                    </div>
                    <div class="text-center mt-2">
                        <a href="forgot_password.php">Esqueci minha senha</a>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>