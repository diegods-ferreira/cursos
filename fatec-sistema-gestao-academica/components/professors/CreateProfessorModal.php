<form action="../../routes/professors.routes.php?action=create" method="POST">
  <div class="modal fade" id="createProfessorModal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="createProfessorModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="createProfessorModalLabel">Criar professor</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="form-group">
            <label for="name">Nome</label>
            <input type="text" class="form-control" name="name" id="name">
          </div>

          <div class="form-group">
            <label for="title">Título</label>
            <input type="text" class="form-control" name="title" id="title">
          </div>

          <div class="form-group">
            <label for="subjects">Disciplinas</label>
            <select multiple class="form-control" id="subjects" name="subjects[]" size="20">
              <?php
                require_once '../../services/courses/ListCoursesService.php';
                require_once '../../services/subjects/ListSubjectsService.php';

                $coursesList = ListCoursesService::execute();
                $subjectsList = ListSubjectsService::execute();

                foreach ($coursesList as $index => $course) {
              ?>
                <optgroup class="mb-3 text-muted" label="<?= $course->name ?>">
                  <?php
                    foreach ($subjectsList as $index => $subject) {
                      if ($subject->course_id === $course->id) {
                  ?>
                    <option class="mt-2 text-dark" value="<?= $subject->id ?>"><?= $subject->name ?></option>
                  <?php
                        unset($subjectsList[$index]);
                      }
                    }
                  ?>
                </optgroup>
              <?php } ?>
            </select>
          </div>

          <input hidden name="user_id" value="<?= $_SESSION['user:id'] ?>">
          <input hidden name="actual_report" value="<?= isset($_GET['report']) ? $_GET['report'] : '' ?>">
        </div>
        <div class="modal-footer">
          <button type="reset" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
          <button type="submit" class="btn btn-success">Salvar</button>
        </div>
      </div>
    </div>
  </div>
</form>