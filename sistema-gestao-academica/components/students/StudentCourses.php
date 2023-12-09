<div class="col">
  <div class="row mb-3">
    <div class="col">
      <a class="text-info" href="../../pages/Students?<?= isset($_GET['report']) ? 'report=' . $_GET['report'] : '' ?>">
        <i class="fas fa-arrow-left"></i>
        <span class="ml-2">Voltar</span>
      </a>
    </div>
  </div>

  <?php if (isset($_GET['error'])) { ?>
    <div class="row mb-3">
      <div class="col">
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
          <?= $_GET['error'] === 'empty-fields' ? 'Verifique se todos os campos estão preenchidos!' : '' ?>
          <?= $_GET['error'] === 'course-not-added' ? 'Ocorreu um erro ao tentar adicionar a matrícula. Tente novamente mais tarde.' : '' ?>
          <?= $_GET['error'] === 'course-not-removed' ? 'Ocorreu um erro ao tentar remover a matrícula. Tente novamente mais tarde.' : '' ?>
          <?= $_GET['error'] === 'course-status-not-altered' ? 'Ocorreu um erro ao tentar remover alterar a situação da matrícula. Tente novamente mais tarde.' : '' ?>
          <?= $_GET['error'] === 'student-has-active-course' ? 'Não é possível fazer uma nova matrícula para o aluno quando este já possui uma matrícula ativa.' : '' ?>

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
          <?= $_GET['success'] === 'course-added' ? 'Disciplina adicionada com sucesso!' : '' ?>
          <?= $_GET['success'] === 'course-removed' ? 'Disciplina removida com sucesso!' : '' ?>
          <?= $_GET['success'] === 'course-status-altered' ? 'Situação da matrícula alterada com sucesso!' : '' ?>

          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
      </div>
    </div>
  <?php } ?>

  <div class="row">
    <?php
      require_once '../../services/students/ShowStudentService.php';

      $student = ShowStudentService::execute($_GET['student_id']);
    ?>
    <div class="col">
      <div class="bg-white border rounded d-flex flex-column justify-content-center p-3">
        <p class="text-muted mb-0">Aluno</p>
        <h1 class="mb-0"><?= $student->name ?></h1>
      </div>
    </div>
  </div>

  <div class="row mt-3">
    <div class="col">
      <div class="bg-white border rounded p-3">
        <div class="d-flex justify-content-between align-items-end">
          <p class="text-muted mb-0">Matrículas</p>

          <button class="btn btn-success" data-toggle="modal" data-target="#addStudentCourseModal">
            <i class="fas fa-plus"></i>
            <span>Adicionar</span>
          </button>
        </div>

        <table class="table table-hover mt-3 border">
          <thead>
            <tr class="d-flex">
              <th scope="col" class="col-2 d-flex align-items-end justify-content-center"><span class="text-muted">Matrícula</span></th>
              <th scope="col" class="col-4 d-flex align-items-end"><span class="text-muted">Curso</span></th>
              <th scope="col" class="col-3 d-flex align-items-end justify-content-center"><span class="text-muted">Turma</span></th>
              <th scope="col" class="col-2 d-flex align-items-end justify-content-center"><span class="text-muted">Situação</span></th>
              <th scope="col" class="col-1 d-flex align-items-end justify-content-center"><span class="text-muted">Remover</span></th>
            </tr>
          </thead>
          <tbody>
            <?php
              require_once '../../services/students/ListStudentCoursesService.php';

              $coursesList = ListStudentCoursesService::execute($_GET['student_id']);

              foreach ($coursesList as $index => $course) {
            ?>
              <tr class="d-flex">
                <td class="col-2 d-flex align-items-center justify-content-center"><?= $course->id ?></td>
                <td class="col-4 d-flex align-items-center"><?= $course->course_name ?></td>
                <td class="col-3 d-flex align-items-center justify-content-center"><?= $course->class_id ?></td>
                <td class="col-2 d-flex flex-column align-items-center justify-content-center">
                  <?php if ($course->status == 0) { ?>
                    <span class="text-danger">Encerrada</span>
                  <?php } else { ?>
                    <span class="text-primary">Ativa</span>
                  <?php }?>
                  <form action="../../routes/student-courses.routes.php?action=update" method="POST">
                    <input hidden name="student_course_id" value="<?= $course->id ?>">
                    <input hidden name="status" value="<?= $course->status == 0 ? '1' : '0' ?>">
                    <input hidden name="actual-student-id" value="<?= $course->student_id ?>">
                    <button class="btn badge badge-info">Alterar</button>
                  </form>
                </td>
                <td class="col-1">
                  <div class="row d-flex align-items-center justify-content-center">
                    <?php require '../../components/students/StudentCoursesCrudButtons.php' ?>
                  </div>
                </td>
              </tr>
            <?php } ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>

  <!-- Add Class Subject Modal -->
  <?php require_once '../../components/students/AddStudentCourseModal.php' ?>

  <!-- Delete Class Subject Confirmation Modal -->
  <?php require_once '../../components/students/DeleteStudentCourseModal.php' ?>
</div>