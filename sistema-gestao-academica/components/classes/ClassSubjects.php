<div class="col">
  <div class="row mb-3">
    <div class="col">
      <a class="text-info" href="../../pages/Classes?<?= isset($_GET['report']) ? 'report=' . $_GET['report'] : '' ?>">
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
          <?= $_GET['error'] === 'subject-not-added' ? 'Ocorreu um erro ao tentar adicionar a disciplina. Tente novamente mais tarde.' : '' ?>
          <?= $_GET['error'] === 'subject-not-removed' ? 'Ocorreu um erro ao tentar remover a disciplina. Tente novamente mais tarde.' : '' ?>

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
          <?= $_GET['success'] === 'subject-added' ? 'Disciplina adicionada com sucesso!' : '' ?>
          <?= $_GET['success'] === 'subject-removed' ? 'Disciplina removida com sucesso!' : '' ?>

          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
      </div>
    </div>
  <?php } ?>

  <div class="row">
    <?php
      require_once '../../services/classes/ShowClassService.php';

      $class = ShowClassService::execute($_GET['class_id']);
    ?>
    <div class="col-2">
      <div class="bg-white border rounded d-flex flex-column align-items-center justify-content-center p-3">
        <p class="text-muted mb-0">Turma</p>
        <h1 class="display-4 mb-0"><?= $class->id ?></h1>
      </div>
    </div>

    <div class="col-10">
      <div class="bg-white border rounded d-flex flex-column justify-content-center p-3 h-100">
        <p class="text-muted mb-0">Descrição</p>
        <p class="lead mb-0"><?= $class->description ?></p>
      </div>
    </div>
  </div>

  <div class="row mt-3">
    <div class="col">
      <div class="bg-white border rounded p-3">
        <div class="d-flex justify-content-between align-items-end">
          <p class="text-muted mb-0">Disciplinas</p>

          <button class="btn btn-success" data-toggle="modal" data-target="#addClassSubjectModal">
            <i class="fas fa-plus"></i>
            <span>Adicionar</span>
          </button>
        </div>

        <table class="table table-hover mt-3 border">
          <thead>
            <tr class="d-flex">
              <th scope="col" class="col-5 d-flex align-items-end"><span class="text-muted">Curso</span></th>
              <th scope="col" class="col-3 d-flex align-items-end"><span class="text-muted">Disciplina</span></th>
              <th scope="col" class="col-3 d-flex align-items-end"><span class="text-muted">Professor</span></th>
              <th scope="col" class="col-1 d-flex align-items-end justify-content-center"><span class="text-muted">Remover</span></th>
            </tr>
          </thead>
          <tbody>
            <?php
              require_once '../../services/classes/ListClassSubjectsService.php';

              $subjectsList = ListClassSubjectsService::execute($_GET['class_id']);

              foreach ($subjectsList as $index => $subject) {
            ?>
              <tr class="d-flex">
                <td class="col-5 d-flex align-items-center"><?= $subject->course_name ?></td>
                <td class="col-3 d-flex align-items-center"><?= $subject->subject_name ?></td>
                <td class="col-3 d-flex align-items-center"><?= $subject->professor_name ?></td>
                <td class="col-1">
                  <div class="row d-flex align-items-center justify-content-center">
                    <?php require '../../components/classes/ClassSubjectsCrudButtons.php' ?>
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
  <?php require_once '../../components/classes/AddClassSubjectModal.php' ?>

  <!-- Delete Class Subject Confirmation Modal -->
  <?php require_once '../../components/classes/DeleteClassSubjectModal.php' ?>
</div>