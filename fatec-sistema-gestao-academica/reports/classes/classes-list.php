<p class="lead text-primary">Lista de Turmas</p>

<table class="table table-hover mt-3 border">
  <thead>
    <tr class="d-flex">
      <th scope="col" class="col-1 d-flex align-items-end justify-content-center"><span class="text-muted">#</span></th>
      <th scope="col" class="col-1 d-flex align-items-end justify-content-center"><span class="text-muted">Alunos</span></th>
      <th scope="col" class="col-7 d-flex align-items-end"><span class="text-muted">Descrição</span></th>
      <th scope="col" class="col-2 d-flex align-items-end justify-content-center"><span class="text-muted">Disciplinas</span></th>
      <th scope="col" class="col-1 d-flex align-items-end justify-content-center"><span class="text-muted">Ações</span></th>
    </tr>
  </thead>
  <tbody>
    <?php
      require_once '../../services/classes/ListClassesService.php';

      $classesList = ListClassesService::execute();

      foreach ($classesList as $index => $class) {
    ?>
      <tr class="d-flex">
        <th scope="row" class="col-1 d-flex align-items-center justify-content-center"><?= $class->id ?></th>
        <td class="col-1 d-flex align-items-center justify-content-center"><?= $class->students_number ?></td>
        <td class="col-7 d-flex align-items-center"><?= $class->description ?></td>
        <td class="col-2 d-flex align-items-center justify-content-center">
          <?php $report = isset($_GET['report']) ? 'report=' . $_GET['report'] . '&' : '' ?>
          <a class="text-info" href="../../pages/Classes?<?= $report ?>page=class-subjects&class_id=<?= $class->id ?>">Ver Disciplinas</a>
        </td>
        <td class="col-1">
          <div class="row d-flex align-items-center justify-content-center">
            <?php require '../../components/classes/ClassesCrudButtons.php' ?>
          </div>
        </td>
      </tr>
    <?php } ?>
  </tbody>
</table>