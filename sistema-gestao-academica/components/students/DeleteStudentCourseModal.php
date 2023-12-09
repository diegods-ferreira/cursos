<form action="../../routes/student-courses.routes.php?action=delete" method="POST">
  <div class="modal fade" id="deleteStudentCourseModal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="deleteStudentCourseModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title text-danger" id="deleteStudentCourseModalLabel">Remover matrícula?</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <p>Tem certeza que remover essa matrícula?</p>

          <input hidden name="id" id="delete-student-course-id">
          <input hidden name="actual-student-id" value="<?= $_GET['student_id'] ?>">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
          <button type="submit" class="btn btn-danger">Excluir</button>
        </div>
      </div>
    </div>
  </div>
</form>