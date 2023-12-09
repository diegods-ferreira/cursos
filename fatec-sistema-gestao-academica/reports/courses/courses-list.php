<p class="lead text-primary">Lista de Cursos</p>

<table class="table table-hover mt-3 border">
  <thead>
    <tr class="d-flex">
      <th scope="col" class="col-1 d-flex align-items-end justify-content-center"><span class="text-muted">#</span></th>
      <th scope="col" class="col-3 d-flex align-items-end"><span class="text-muted">Nome</span></th>
      <th scope="col" class="col-6 d-flex align-items-end"><span class="text-muted">Descrição</span></th>
      <th scope="col" class="col-1 d-flex align-items-end justify-content-center"><span class="text-muted">Período</span></th>
      <th scope="col" class="col-1 d-flex align-items-end justify-content-center"><span class="text-muted">Ações</span></th>
    </tr>
  </thead>
  <tbody>
    <?php
      require_once '../../services/courses/ListCoursesService.php';

      $coursesList = ListCoursesService::execute();

      foreach ($coursesList as $index => $course) {
    ?>
      <tr class="d-flex">
        <th scope="row" class="col-1 d-flex align-items-center justify-content-center"><?= $course->id ?></th>
        <td class="col-3 d-flex align-items-center"><?= $course->name ?></td>
        <td class="col-6 d-flex align-items-center"><?= $course->description ?></td>
        <td class="col-1 d-flex align-items-center justify-content-center"><?= $course->period == 1 ? 'Manhã' : ($course->period == 2 ? 'Tarde' : 'Noite') ?></td>
        <td class="col-1">
          <div class="row d-flex align-items-center justify-content-center">
            <?php require '../../components/courses/CoursesCrudButtons.php' ?>
          </div>
        </td>
      </tr>
    <?php } ?>
  </tbody>
</table>