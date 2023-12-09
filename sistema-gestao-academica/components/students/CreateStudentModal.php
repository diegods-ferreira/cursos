<form action="../../routes/students.routes.php?action=create" method="POST">
  <div class="modal fade" id="createStudentModal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="createStudentModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="createStudentModalLabel">Criar aluno</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="form-group">
            <label for="name">Nome</label>
            <input type="text" class="form-control" name="name" id="name" aria-describedby="nameHelp">
            <small id="nameHelp" class="form-text text-muted">Ex: Fulano de Tal</small>
          </div>

          <div class="form-row">
            <div class="form-group col-7">
              <label for="cpf">CPF</label>
              <input type="text" class="form-control" name="cpf" id="cpf" aria-describedby="cpfHelp">
              <small id="cpfHelp" class="form-text text-muted">Sem pontuação</small>
            </div>

            <div class="form-group col-5">
              <label for="birth_date">Data de Nascimento</label>
              <input type="date" class="form-control" name="birth_date" id="birth_date">
            </div>
          </div>
          
          <div class="form-row">
            <div class="form-group col">
              <label for="phone">Telefone</label>
              <input type="text" class="form-control" name="phone" id="phone" aria-describedby="phoneHelp">
              <small id="phoneHelp" class="form-text text-muted">Sem pontuação</small>
            </div>

            <div class="form-group col">
              <label for="cell_phone">Celular</label>
              <input type="text" class="form-control" name="cell_phone" id="cell_phone" aria-describedby="cellphoneHelp">
              <small id="cellphoneHelp" class="form-text text-muted">Sem pontuação</small>
            </div>
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