<?php
  session_start();

  if (isset($_SESSION['user:id'])) {
    header('Location: ./pages/Home');
  }
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Siga - Login</title>

  <!-- Bootstrap 4.5 CSS -->
  <link
    rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
    integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2"
    crossorigin="anonymous"
  />

  <!-- Fontawesome CSS -->
  <link
    rel="stylesheet"
    href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
    integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p"
    crossorigin="anonymous"
  />

  <style>
    body {
      background: linear-gradient(86.18deg, #192A56 5.75%, #273C75 98.91%);
    }

    .main-container {
      height: 100vh;
      display: flex;
      align-items: center;
    }
  </style>
</head>
<body>
  <div class="main-container">
    <div class="container">
      <?php if (isset($_GET['error'])) { ?>
        <div class="row">
          <div class="col"></div>
          <div class="col-4">
            <div class="alert alert-danger alert-dismissible fade show mb-5" role="alert">
              <?= $_GET['error'] === 'not-logged-in' ? 'Você não está logado. Faça login para continuar.' : '' ?>
              <?= $_GET['error'] === 'user-not-found' ? 'E-mail e/ou senha incorreto(s). Verifique as credenciais.' : '' ?>

              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
          </div>
          <div class="col"></div>
        </div>
      <?php } ?>

      <?php if (isset($_GET['success'])) { ?>
        <div class="row">
          <div class="col"></div>
          <div class="col-4">
            <div class="alert alert-success alert-dismissible fade show mb-5" role="alert">
              <?= $_GET['success'] === 'user-created' ? 'Sua conta foi criada com sucesso! Você já pode fazer login no sistema.' : '' ?>

              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
          </div>
          <div class="col"></div>
        </div>
      <?php } ?>
      
      <div class="row">
        <div class="col"></div>
        <div class="col-4">
          <div class="card">
            <div class="card-header">
              <h1 class="mb-0 text-center">SIGA</h1>
            </div>

            <div class="card-body">
              <p class="lead text-muted text-center">Faça o login</p>

              <form action="../routes/auth.routes.php?action=sign-in" method="POST">
                <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1">
                      <i class="fas fa-envelope"></i>
                    </span>
                  </div>
                  <input type="email" name="email" class="form-control" placeholder="E-mail" autocomplete="off">
                </div>

                <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1">
                      <i class="fas fa-lock"></i>
                    </span>
                  </div>
                  <input type="password" name="password" class="form-control" placeholder="Senha">
                </div>

                <div class="row">
                  <div class="col-6">
                    <a class="btn btn-outline-secondary btn-block" href="./pages/SignUp">Cadastrar</a>
                  </div>

                  <div class="col-6">
                    <button type="submit" class="btn btn-primary btn-block">Entrar</button>
                  </div>
                </div>
              </form>
            </div>

            <div class="card-footer">
              <p class="mb-0 text-muted text-center">
                <small>Sistema criado para a aula de Programação Web da Fatec Taubaté</small>
              </p>
            </div>
          </div>
        </div>
        <div class="col"></div>
      </div>
    </div>
  </div>

  <!-- jQuery and JS bundle w/ Popper.js -->
  <script
    src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
    integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
    crossorigin="anonymous"
  ></script>
  <script
    src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx"
    crossorigin="anonymous"
  ></script>
</body>
</html>