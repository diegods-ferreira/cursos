<form action="../../routes/courses.routes.php?action=create" method="POST">
  <div class="modal fade" id="createCourseModal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="createCourseModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="createCourseModalLabel">Criar curso</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="form-group">
            <label for="name">Nome</label>
            <input type="text" class="form-control" name="name" id="name" aria-describedby="nameHelp">
            <small id="nameHelp" class="form-text text-muted">Ex: Engenharia da Computação</small>
          </div>

          <div class="form-group">
            <label for="description">Descrição</label>
            <textarea class="form-control" id="description" name="description" aria-describedby="descriptionHelp" rows="5" maxlength="255"></textarea>
            <small id="descriptionHelp" class="form-text text-muted">Limite de 255 caracteres</small>
          </div>

          <fieldset class="form-group">
            <div class="row">
              <legend class="col-form-label col-sm-2 pt-0">Período</legend>
              <div class="col-sm-10">
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="period" id="period1" value="1" checked>
                  <label class="form-check-label" for="period1">
                    Manhã
                  </label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="period" id="period2" value="2">
                  <label class="form-check-label" for="period2">
                    Tarde
                  </label>
                </div>
                <div class="form-check disabled">
                  <input class="form-check-input" type="radio" name="period" id="period3" value="3">
                  <label class="form-check-label" for="period3">
                    Noite
                  </label>
                </div>
              </div>
            </div>
          </fieldset>

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