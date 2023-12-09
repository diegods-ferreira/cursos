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
  <title>SIGA - Alunos</title>

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

        <?php if (isset($_GET['page']) and $_GET['page'] === 'student-courses' and isset($_GET['student_id'])) { ?>
          <?php require_once '../../components/students/StudentCourses.php' ?>
        <?php } else { ?>
          <div class="col-10">
            <?php if (isset($_GET['error'])) { ?>
              <div class="row mb-3">
                <div class="col">
                  <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <?= $_GET['error'] === 'empty-fields' ? 'Verifique se todos os campos estão preenchidos!' : '' ?>
                    <?= $_GET['error'] === 'student-not-created' ? 'Ocorreu um erro ao tentar criar o aluno. Tente novamente mais tarde.' : '' ?>
                    <?= $_GET['error'] === 'student-not-updated' ? 'Ocorreu um erro ao tentar editar o aluno. Tente novamente mais tarde.' : '' ?>
                    <?= $_GET['error'] === 'student-not-deleted' ? 'Ocorreu um erro ao tentar excluir o aluno. Tente novamente mais tarde.' : '' ?>

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
                    <?= $_GET['success'] === 'student-created' ? 'Aluno criado com sucesso!' : '' ?>
                    <?= $_GET['success'] === 'student-updated' ? 'Aluno editado com sucesso!' : '' ?>
                    <?= $_GET['success'] === 'student-deleted' ? 'Aluno excluído com sucesso!' : '' ?>

                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                </div>
              </div>
            <?php } ?>

            <div class="d-flex align-items-center justify-content-between">
              <h3 class="mb-3">Alunos</h3>
              <button class="btn btn-success" data-toggle="modal" data-target="#createStudentModal">
                <i class="fas fa-plus"></i>
                <span>Adicionar</span>
              </button>
            </div>

            <!-- Rendering the report based on the REPORT GET PARAM -->
            <?php
              $report = isset($_GET['report']) ? $_GET['report'] : 'students-list';
              require_once "../../reports/students/$report.php";
            ?>
          </div>

          <!-- StudentsReportsList component import -->
          <?php require_once '../../components/students/StudentsReportsList.php' ?>
        <?php } ?>

      </div>
    </div>
  </div>


  <!-- Create Student Modal -->
  <?php require_once '../../components/students/CreateStudentModal.php' ?>

  <!-- Edit Student Modal -->
  <?php require_once '../../components/students/EditStudentModal.php' ?>

  <!-- Detail Student Modal -->
  <?php require_once '../../components/students/DetailStudentModal.php' ?>

  <!-- Delete Student Confirmation Modal -->
  <?php require_once '../../components/students/DeleteStudentModal.php' ?>

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