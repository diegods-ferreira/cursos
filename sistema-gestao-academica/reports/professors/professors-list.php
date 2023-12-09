<p class="lead text-primary">Lista de Professores</p>

<table class="table table-hover mt-3 border">
  <thead>
    <tr class="d-flex">
      <th scope="col" class="col-1 d-flex align-items-end justify-content-center"><span class="text-muted">#</span></th>
      <th scope="col" class="col-3 d-flex align-items-end"><span class="text-muted">Nome</span></th>
      <th scope="col" class="col-1 d-flex align-items-end"><span class="text-muted">Título</span></th>
      <th scope="col" class="col-6 d-flex align-items-end justify-content-center"><span class="text-muted">Disciplinas</span></th>
      <th scope="col" class="col-1 d-flex align-items-end justify-content-center"><span class="text-muted">Ações</span></th>
    </tr>
  </thead>
  <tbody>
    <?php
      require_once '../../services/professors/ListProfessorsService.php';
      require_once '../../services/professors/ListProfessorSubjectsService.php';

      $professorsList = ListProfessorsService::execute();

      foreach ($professorsList as $index => $professor) {
        $professorSubjectsList = ListProfessorSubjectsService::execute($professor->id);
    ?>
      <tr class="d-flex">
        <th scope="row" class="col-1 d-flex align-items-center justify-content-center"><?= $professor->id ?></th>
        <td class="col-3 d-flex align-items-center"><?= $professor->name ?></td>
        <td class="col-1 d-flex align-items-center"><?= $professor->title ?></td>
        <td class="col-6 d-flex align-items-center justify-content-center">
          <?php if (count($professorSubjectsList) > 0) { ?>
            <ul class="list-group w-100">
              <?php foreach ($professorSubjectsList as $index => $subject) { ?>
                <li class="list-group-item d-flex">
                  <span class="col-6"><?= $subject->subject_name ?></span>
                  <span class="col-6 text-muted"><small><?= $subject->course_name ?></small></span>
                </li>
              <?php } ?>
            </ul>
          <?php } else { ?>
            <p class="text-muted mb-0">Nenhuma disciplina vinculada.</p>
          <?php } ?>
        </td>
        <td class="col-1">
          <div class="row d-flex align-items-center justify-content-center">
            <?php require '../../components/professors/ProfessorsCrudButtons.php' ?>
          </div>
        </td>
      </tr>
    <?php } ?>
  </tbody>
</table>