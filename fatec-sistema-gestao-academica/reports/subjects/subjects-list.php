<?php
  function stringfySummary($summary) {
    $carriageReturnParsed = implode('#carriage_return#', explode("\r", $summary));
    return implode('#new_line#', explode("\n", $carriageReturnParsed));
  }
?>

<p class="lead text-primary">Lista de Disciplinas</p>

<table class="table table-hover mt-3 border">
  <thead>
    <tr class="d-flex">
      <th scope="col" class="col-1 d-flex align-items-end justify-content-center"><span class="text-muted">#</span></th>
      <th scope="col" class="col-3 d-flex align-items-end"><span class="text-muted">Nome</span></th>
      <th scope="col" class="col-2 d-flex align-items-end justify-content-center"><span class="text-muted">Carga Horária</span></th>
      <th scope="col" class="col-5 d-flex align-items-end"><span class="text-muted">Curso</span></th>
      <th scope="col" class="col-1 d-flex align-items-end justify-content-center"><span class="text-muted">Ações</span></th>
    </tr>
  </thead>
  <tbody>
    <?php
      require_once '../../services/subjects/ListSubjectsService.php';

      $subjectsList = ListSubjectsService::execute();

      foreach ($subjectsList as $index => $subject) {
    ?>
      <tr class="d-flex">
        <th scope="row" class="col-1 d-flex align-items-center justify-content-center"><?= $subject->id ?></th>
        <td class="col-3 d-flex align-items-center"><?= $subject->name ?></td>
        <td class="col-2 d-flex align-items-center justify-content-center"><?= $subject->workload ?> horas</td>
        <td class="col-5 d-flex align-items-center"><?= $subject->course_name ?></td>
        <td class="col-1">
          <div class="row d-flex align-items-center justify-content-center">
            <?php require '../../components/subjects/SubjectsCrudButtons.php' ?>
          </div>
        </td>
      </tr>
    <?php } ?>
  </tbody>
</table>