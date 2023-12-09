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
  <title>SIGA - Início</title>

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
    <?php require_once '../../components/SideMenu.php' ?>

    <div class="col-10" style="overflow: auto;">
      <div class="card-columns mt-5">

        <!-- Courses Abstract Card -->
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">
              <a href="../pages/Courses">
                <i class="fas fa-chalkboard"></i>
                <span class="ml-2">Cursos</span>
              </a>
            </h5>
            <?php
              require_once '../../services/courses/GetCoursesAbstractService.php';
              $coursesAbstract = GetCoursesAbstractService::execute();
              $lastFiveCourses = array_slice(explode(',', $coursesAbstract->courses_serialized), 0, 5);
            ?>
            <p class="card-text"><strong><?= $coursesAbstract->courses_number ?></strong> cursos cadastrados até o momento.</p>
            <div>
              <p class="card-text mb-0"><small class="text-muted">Últimos 5 cursos cadastrados</small></p>
              <ul class="list-group mb-3">
                <?php foreach ($lastFiveCourses as $index => $courseName) { ?>
                  <li class="list-group-item"><?= $courseName ?></li>
                <?php } ?>
              </ul>
            </div>
            <p class="card-text"><small class="text-muted">Última atualização em <?= $coursesAbstract->last_update ?></small></p>
          </div>
        </div>

        <!-- Subjects Abstract Card -->
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">
              <a href="../pages/Subjects">
                <i class="fas fa-book"></i>
                <span class="ml-2">Disciplinas</span>
              </a>
            </h5>
            <?php
              require_once '../../services/subjects/GetSubjectsAbstractService.php';
              $subjectsAbstract = GetSubjectsAbstractService::execute();
              $lastFiveSubjects = array_slice(explode(',', $subjectsAbstract->subjects_serialized), 0, 5);
            ?>
            <p class="card-text"><strong><?= $subjectsAbstract->subjects_number ?></strong> disciplinas cadastradas até o momento.</p>
            <div>
              <p class="card-text mb-0"><small class="text-muted">Últimas 5 disciplinas cadastradas</small></p>
              <ul class="list-group mb-3">
                <?php foreach ($lastFiveSubjects as $index => $subjectName) { ?>
                  <li class="list-group-item"><?= $subjectName ?></li>
                <?php } ?>
              </ul>
            </div>
            <p class="card-text"><small class="text-muted">Última atualização em <?= $subjectsAbstract->last_update ?></small></p>
          </div>
        </div>

        <!-- Professors Abstract Card -->
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">
              <a href="../pages/Professors">
                <i class="fas fa-chalkboard-teacher"></i>
                <span class="ml-2">Professores</span>
              </a>
            </h5>
            <?php
              require_once '../../services/professors/GetProfessorsAbstractService.php';
              $professorsAbstract = GetProfessorsAbstractService::execute();
              $lastFiveProfessors = array_slice(explode(',', $professorsAbstract->professors_serialized), 0, 5);
            ?>
            <p class="card-text"><strong><?= $professorsAbstract->professors_number ?></strong> professores cadastrados até o momento.</p>
            <div>
              <p class="card-text mb-0"><small class="text-muted">Últimos 5 professores cadastrados</small></p>
              <ul class="list-group mb-3">
                <?php foreach ($lastFiveProfessors as $index => $professorName) { ?>
                  <li class="list-group-item"><?= $professorName ?></li>
                <?php } ?>
              </ul>
            </div>
            <p class="card-text"><small class="text-muted">Última atualização em <?= $professorsAbstract->last_update ?></small></p>
          </div>
        </div>

        <!-- Classes Abstract Card -->
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">
              <a href="../pages/Classes">
                <i class="fas fa-users"></i>
                <span class="ml-2">Turmas</span>
              </a>
            </h5>
            <?php
              require_once '../../services/classes/GetClassesAbstractService.php';
              $classesAbstract = GetClassesAbstractService::execute();
              $lastFiveClasses = array_slice(explode(',', $classesAbstract->classes_serialized), 0, 5);
            ?>
            <p class="card-text"><strong><?= $classesAbstract->classes_number ?></strong> turmas cadastradas até o momento.</p>
            <div>
              <p class="card-text mb-0"><small class="text-muted">Últimos 5 professores cadastrados</small></p>
              <ul class="list-group mb-3">
                <?php
                  foreach ($lastFiveClasses as $index => $class) {
                    $classData = explode('|', $class);
                ?>
                  <li class="list-group-item d-flex px-1">
                    <span class="col">Turma nº <?= $classData[0] ?></span>
                    <span class="col text-right"><?= $classData[1] ?> disciplinas</span>
                  </li>
                <?php } ?>
              </ul>
            </div>
            <p class="card-text"><small class="text-muted">Última atualização em <?= $classesAbstract->last_update ?></small></p>
          </div>
        </div>

        <!-- Students Abstract Card -->
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">
              <a href="../pages/Students">
                <i class="fas fa-user-friends"></i>
                <span class="ml-2">Alunos</span>
              </a>
            </h5>
            <?php
              require_once '../../services/students/GetStudentsAbstractService.php';
              $studentsAbstract = GetStudentsAbstractService::execute();
              $lastFiveStudents = array_slice(explode(',', $studentsAbstract->students_serialized), 0, 5);
            ?>
            <p class="card-text"><strong><?= $studentsAbstract->students_number ?></strong> alunos cadastrados até o momento.</p>
            <div>
              <p class="card-text mb-0"><small class="text-muted">Últimos 5 alunos cadastrados</small></p>
              <ul class="list-group mb-3">
                <?php foreach ($lastFiveStudents as $index => $studentName) { ?>
                  <li class="list-group-item"><?= $studentName ?></li>
                <?php } ?>
              </ul>
            </div>
            <p class="card-text"><small class="text-muted">Última atualização em <?= $studentsAbstract->last_update ?></small></p>
          </div>
        </div>

      </div>
    </div>
  </div>
</body>
</html>