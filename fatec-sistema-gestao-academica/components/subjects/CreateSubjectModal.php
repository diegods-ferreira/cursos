<form action="../../routes/subjects.routes.php?action=create" method="POST">
  <div class="modal fade" id="createSubjectModal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="createSubjectModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="createSubjectModalLabel">Criar disciplina</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="row">
            <div class="col-8">
              <div class="form-group">
                <label for="name">Nome</label>
                <input type="text" class="form-control" name="name" id="name" aria-describedby="nameHelp">
                <small id="nameHelp" class="form-text text-muted">Ex: Inglês Instrumental</small>
              </div>
            </div>

            <div class="col-4">
              <div class="form-group">
                <label for="workload">Carga horária</label>
                <input type="number" class="form-control" name="workload" id="workload">
              </div>
            </div>
          </div>
          
          <div class="form-group">
            <label for="course_id">Curso</label>
            <select class="form-control" id="course_id" name="course_id">
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
            <label for="summary">Ementa</label>
            <textarea class="form-control" id="summary" name="summary" rows="10"></textarea>
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