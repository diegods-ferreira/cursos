<form action="../../routes/class-subjects.routes.php?action=delete" method="POST">
  <div class="modal fade" id="deleteClassSubjectModal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="deleteClassSubjectModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title text-danger" id="deleteClassSubjectModalLabel">Remover disciplina?</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <p>Tem certeza que remover essa disciplina?</p>

          <input hidden name="id" id="delete-class-subject-id">
          <input hidden name="actual-class-id" value="<?= $_GET['class_id'] ?>">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
          <button type="submit" class="btn btn-danger">Excluir</button>
        </div>
      </div>
    </div>
  </div>
</form>