<?php
  session_start();

  if (!isset($_SESSION['user:id'])) {
    header('Location: ../?error=not-logged-in');
  }

  require_once '../../database/connection.php';
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>SIGA - Disciplinas</title>

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
    .main-container {
      height: 100vh;
    }
  </style>
</head>
<body class="bg-light">
  <div class="main-container d-flex">
    
    <!-- SideMenu component import -->
    <?php require_once '../../components/SideMenu.php' ?>

    <!-- Page main container -->
    <div class="col-10" style="overflow: auto;">
      <div class="row mt-5">
        <div class="col-10">
          <?php if (isset($_GET['error'])) { ?>
            <div class="row mb-3">
              <div class="col">
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                  <?= $_GET['error'] === 'empty-fields' ? 'Verifique se todos os campos estão preenchidos!' : '' ?>
                  <?= $_GET['error'] === 'subject-not-created' ? 'Ocorreu um erro ao tentar criar a disciplina. Tente novamente mais tarde.' : '' ?>
                  <?= $_GET['error'] === 'subject-not-updated' ? 'Ocorreu um erro ao tentar editar a disciplina. Tente novamente mais tarde.' : '' ?>
                  <?= $_GET['error'] === 'subject-not-deleted' ? 'Ocorreu um erro ao tentar excluir a disciplina. Tente novamente mais tarde.' : '' ?>
                  <?= $_GET['error'] === 'subject-has-professors' ? 'Essa disciplina possui professores vinculados. Não foi possível excluí-la.' : '' ?>
                  <?= $_GET['error'] === 'subject-has-classes' ? 'Essa disciplina possui turmas vinculadas. Não foi possível excluí-la.' : '' ?>

                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
              </div>
            </div>
          <?php } ?>

          <?php if (isset($_GET['success'])) { ?>
            <div class="row mb-3">
              <div class="col">
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                  <?= $_GET['success'] === 'subject-created' ? 'Disciplina criada com sucesso!' : '' ?>
                  <?= $_GET['success'] === 'subject-updated' ? 'Disciplina editada com sucesso!' : '' ?>
                  <?= $_GET['success'] === 'subject-deleted' ? 'Disciplina excluída com sucesso!' : '' ?>

                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
              </div>
            </div>
          <?php } ?>

          <div class="d-flex align-items-center justify-content-between">
            <h3 class="mb-3">Disciplinas</h3>
            <button class="btn btn-success" data-toggle="modal" data-target="#createSubjectModal">
              <i class="fas fa-plus"></i>
              <span>Adicionar</span>
            </button>
          </div>

          <!-- Rendering the report based on the REPORT GET PARAM -->
          <?php
            $report = isset($_GET['report']) ? $_GET['report'] : 'subjects-list';
            require_once "../../reports/subjects/$report.php";
          ?>
        </div>

        <!-- SubjectsReportsList component import -->
        <?php require_once '../../components/subjects/SubjectsReportsList.php' ?>
      </div>
    </div>
  </div>


  <!-- Create Subject Modal -->
  <?php require_once '../../components/subjects/CreateSubjectModal.php' ?>

  <!-- Edit Subject Modal -->
  <?php require_once '../../components/subjects/EditSubjectModal.php' ?>

  <!-- Detail Subject Modal -->
  <?php require_once '../../components/subjects/DetailSubjectModal.php' ?>

  <!-- Delete Subject Confirmation Modal -->
  <?php require_once '../../components/subjects/DeleteSubjectModal.php' ?>

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