<p class="lead text-primary">Lista de Alunos</p>

<table class="table table-hover mt-3 border">
  <thead>
    <tr class="d-flex">
      <th scope="col" class="col-1 d-flex align-items-end justify-content-center"><span class="text-muted">#</span></th>
      <th scope="col" class="col-3 d-flex align-items-end"><span class="text-muted">Nome</span></th>
      <th scope="col" class="col-2 d-flex align-items-end justify-content-center"><span class="text-muted">CPF</span></th>
      <th scope="col" class="col-2 d-flex align-items-end justify-content-center"><span class="text-muted">Data de Nascimento</span></th>
      <th scope="col" class="col-3 d-flex align-items-end justify-content-center"><span class="text-muted">Matrículas</span></th>
      <th scope="col" class="col-1 d-flex align-items-end justify-content-center"><span class="text-muted">Ações</span></th>
    </tr>
  </thead>
  <tbody>
    <?php
      require_once '../../services/students/ListStudentsService.php';

      $studentsList = ListStudentsService::execute();

      foreach ($studentsList as $index => $student) {
    ?>
      <tr class="d-flex">
        <th scope="row" class="col-1 d-flex align-items-center justify-content-center"><?= $student->id ?></th>
        <td class="col-3 d-flex align-items-center"><?= $student->name ?></td>
        <td class="col-2 d-flex align-items-center justify-content-center"><?= $student->cpf ?></td>
        <td class="col-2 d-flex align-items-center justify-content-center"><?= $student->birth_date_formatted ?></td>
        <td class="col-3 d-flex align-items-center justify-content-center">
          <?php $report = isset($_GET['report']) ? 'report=' . $_GET['report'] . '&' : '' ?>
          <a class="text-info" href="../../pages/Students?<?= $report ?>page=student-courses&student_id=<?= $student->id ?>">Ver Matrículas</a>
        </td>
        <td class="col-1">
          <div class="row d-flex align-items-center justify-content-center">
            <?php require '../../components/students/StudentsCrudButtons.php' ?>
          </div>
        </td>
      </tr>
    <?php } ?>
  </tbody>
</table>