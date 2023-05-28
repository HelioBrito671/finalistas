<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css">
  <title>Tela de Login</title>
  <style>
    body {
      display: flex;
      align-items: center;
      justify-content: center;
      height: 100vh;
    }
  </style>
</head>
<body>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-6">
        <h2 class="text-center">Tela de Login</h2>
        <form action="testLogin.php" method="POST">
          <div class="mb-3">
            <label for="email" class="form-label">Nome</label>
            <input type="text" name="nome" class="form-control" id="email" placeholder="Digite seu nome">
          </div>
          <div class="mb-3">
            <label for="password" class="form-label">Senha</label>
            <input type="password" name="password" class="form-control" id="password" placeholder="Digite sua senha">
          </div>
          <div class="text-center">
            <!-- <button type="submit" class="btn btn-primary">Entrar</button> -->
            <input type="submit" name="submit" value="Enviar" class="btn btn-primary">
          </div>
        </form>
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
