<form action="../../routes/classes.routes.php?action=update" method="POST">
  <div class="modal fade" id="editClassModal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="editClassModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="editClassModalLabel">Editar turma</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="form-group">
            <label for="edit-description">Descrição</label>
            <textarea class="form-control" id="edit-description" name="description" aria-describedby="edit-descriptionHelp" rows="5" maxlength="255"></textarea>
            <small id="edit-descriptionHelp" class="form-text text-muted">Limite de 255 caracteres</small>
          </div>

          <input hidden name="id" id="class-id">
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