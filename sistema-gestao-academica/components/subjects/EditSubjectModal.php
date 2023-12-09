<form action="../../routes/subjects.routes.php?action=update" method="POST">
  <div class="modal fade" id="editSubjectModal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="editSubjectModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="editSubjectModalLabel">Editar disciplina</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="row">
            <div class="col-8">
              <div class="form-group">
                <label for="edit-name">Nome</label>
                <input type="text" class="form-control" name="name" id="edit-name" aria-describedby="edit-nameHelp">
                <small id="edit-nameHelp" class="form-text text-muted">Ex: Inglês Instrumental</small>
              </div>
            </div>

            <div class="col-4">
              <div class="form-group">
                <label for="edit-workload">Carga horária</label>
                <input type="number" class="form-control" name="workload" id="edit-workload">
              </div>
            </div>
          </div>
          
          <div class="form-group">
            <label for="edit-course_id">Curso</label>
            <select class="form-control" id="edit-course_id" name="course_id">
              <?php
                require_once '../../services/courses/ListCoursesService.php';

                $coursesList = ListCoursesService::execute();

                foreach ($coursesList as $index => $course) {
              ?>
                <option value="<?= $course->id ?>"><?= $course->name ?></option>
              <?php } ?>
            </select>
          </div>

          <div class="form-group">
            <label for="edit-summary">Ementa</label>
            <textarea class="form-control" id="edit-summary" name="summary" rows="10"></textarea>
          </div>

          <input hidden name="id" id="subject-id">
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