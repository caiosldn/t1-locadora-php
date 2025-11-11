<!DOCTYPE html>
<html>
<head>
    <title>Recuperar Senha - Locadora</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6 col-lg-4">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h3 class="card-title text-center mb-4">Recuperar Senha</h3>
                    <p class="text-muted">Digite seu e-mail. Vamos simular o envio de um link de redefinição.</p>
                    
                    <form action="reset_form.php" method="GET">
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email" required>
                        </div>
                        <button type="submit" class="btn btn-primary w-100">Procurar</button>
                    </form>
                    <div class="text-center mt-3">
                        <a href="index.php">Voltar ao Login</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>