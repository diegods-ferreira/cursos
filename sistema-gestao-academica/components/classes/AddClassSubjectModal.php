<form action="../../routes/class-subjects.routes.php?action=create" method="POST">
  <div class="modal fade" id="addClassSubjectModal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="addClassSubjectModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="addClassSubjectModalLabel">Adicionar disciplina</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="form-group">
            <label for="subjects">Disciplina</label>
            <select class="form-control" id="subjects" name="subject-id" size="15" onchange="loadSubjectProfessors()">
              <?php
                require_once '../../services/courses/ListCoursesService.php';
                require_once '../../services/subjects/ListSubjectsNotInClassService.php';

                $coursesList = ListCoursesService::execute();
                $subjectsList = ListSubjectsNotInClassService::execute($_GET['class_id']);

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

          <div class="form-group">
            <label for="subject-professors">Professor</label>
            <select class="form-control" id="subject-professors" name="professor-id" size="5"></select>
          </div>

          <input hidden name="actual-class-id" value="<?= $_GET['class_id'] ?>">
        </div>
        <div class="modal-footer">
          <button type="reset" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
          <button type="submit" class="btn btn-success">Salvar</button>
        </div>
      </div>
    </div>
  </div>
</form>

<script>
  function loadSubjectProfessors() {
    const subject_id = document.getElementById('subjects').value;
    const ajax = new XMLHttpRequest();

    ajax.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById('subject-professors').innerHTML = this.responseText;
      }
    };

    ajax.open('GET', `../../utils/loadSubjectProfessors.php?subject_id=${subject_id}`, true);

    ajax.send();
  }
</script>