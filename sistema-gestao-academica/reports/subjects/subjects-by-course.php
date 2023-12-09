<?php
  function stringfySummary($summary) {
    $carriageReturnParsed = implode('#carriage_return#', explode("\r", $summary));
    return implode('#new_line#', explode("\n", $carriageReturnParsed));
  }
?>

<p class="lead text-primary">Disciplinas por Curso</p>

<form action="../utils/redirect.php" method="post">
  <div class="row">
    <div class="col-2 d-flex align-items-center justify-content-end">
      <p class="text-muted mb-0">Selecione um curso:</p>
    </div>

    <div class="col-8">
      <select class="form-control" id="course_id" name="course_id">
        <option value="0">-- / --</option>
        <?php
          require_once '../../services/courses/ListCoursesService.php';

          $coursesList = ListCoursesService::execute();

          foreach ($coursesList as $index => $course) {
        ?>
          <option value="<?= $course->id ?>"><?= $course->name ?></option>
        <?php } ?>
      </select>
    </div>

    <div class="col-2">
      <button class="btn btn-info btn-block" type="submit">
        <i class="fas fa-search mr-2"></i>
        <span>Presquisar</span>
      </button>
    </div>
  </div>

  <input hidden name="location" value="../pages/Subjects">
  <input hidden name="report" value="subjects-by-course">
</form>

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

      if (isset($_GET['course_id'])) {
        foreach ($subjectsList as $index => $subject) {
          if ($subject->course_id === $_GET['course_id']) {
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
    <?php }}} ?>
  </tbody>
</table>

<script>
  document.addEventListener("DOMContentLoaded", function(event) {
    const urlParams = new URLSearchParams(window.location.search);
    let course_id = urlParams.get('course_id');

    if (!course_id) {
      course_id = '0';
    }

    document.getElementById('course_id').value = course_id;
  });
</script>