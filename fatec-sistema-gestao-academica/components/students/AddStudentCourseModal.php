<form action="../../routes/student-courses.routes.php?action=create" method="POST">
  <div class="modal fade" id="addStudentCourseModal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="addStudentCourseModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="addStudentCourseModalLabel">Matricular</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="form-group">
            <label for="courses">Curso</label>
            <select class="form-control" id="courses" name="course-id" size="15">
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
            <label for="classes">Turma</label>
            <select class="form-control" id="classes" name="class-id" size="5">
              <?php
                require_once '../../services/classes/ListClassesService.php';

                $classesList = ListClassesService::execute();

                foreach ($classesList as $index => $class) {
              ?>
                <option value="<?= $class->id ?>"><?= $class->id ?></option>
              <?php } ?>
            </select>
          </div>

          <input hidden name="user_id" value="<?= $_SESSION['user:id'] ?>">
          <input hidden name="actual-student-id" value="<?= $_GET['student_id'] ?>">
        </div>
        <div class="modal-footer">
          <button type="reset" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
          <button type="submit" class="btn btn-success">Salvar</button>
        </div>
      </div>
    </div>
  </div>
</form>