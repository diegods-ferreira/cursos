<form action="../../routes/professors.routes.php?action=update" method="POST">
  <div class="modal fade" id="editProfessorModal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="editProfessorModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="editProfessorModalLabel">Criar professor</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="form-group">
            <label for="edit-name">Nome</label>
            <input type="text" class="form-control" name="name" id="edit-name">
          </div>

          <div class="form-group">
            <label for="edit-title">Título</label>
            <input type="text" class="form-control" name="title" id="edit-title">
          </div>

          <div class="form-group">
            <label for="edit-subjects">Disciplinas</label>
            <select multiple class="form-control" id="edit-subjects" name="subjects[]" size="20">
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

          <input hidden name="id" id="professor-id">
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