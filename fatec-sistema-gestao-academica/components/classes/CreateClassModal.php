<form action="../../routes/classes.routes.php?action=create" method="POST">
  <div class="modal fade" id="createClassModal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="createClassModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="createClassModalLabel">Criar turma</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="form-group">
            <label for="description">Descrição</label>
            <textarea class="form-control" id="description" name="description" aria-describedby="descriptionHelp" rows="5" maxlength="255"></textarea>
            <small id="descriptionHelp" class="form-text text-muted">Limite de 255 caracteres</small>
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