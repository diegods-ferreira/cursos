<form action="../../routes/students.routes.php?action=update" method="POST">
  <div class="modal fade" id="editStudentModal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="editStudentModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="editStudentModalLabel">Editar aluno</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="form-group">
            <label for="edit-name">Nome</label>
            <input type="text" class="form-control" name="name" id="edit-name" aria-describedby="edit-nameHelp">
            <small id="edit-nameHelp" class="form-text text-muted">Ex: Engenharia da Computação</small>
          </div>

          <div class="form-row">
            <div class="form-group col-7">
              <label for="edit-cpf">CPF</label>
              <input type="text" class="form-control" name="cpf" id="edit-cpf" aria-describedby="edit-cpfHelp">
              <small id="edit-cpfHelp" class="form-text text-muted">Sem pontuação</small>
            </div>

            <div class="form-group col-5">
              <label for="edit-birth_date">Data de Nascimento</label>
              <input type="date" class="form-control" name="birth_date" id="edit-birth_date">
            </div>
          </div>
          
          <div class="form-row">
            <div class="form-group col">
              <label for="edit-phone">Telefone</label>
              <input type="text" class="form-control" name="phone" id="edit-phone" aria-describedby="edit-phoneHelp">
              <small id="edit-phoneHelp" class="form-text text-muted">Sem pontuação</small>
            </div>

            <div class="form-group col">
              <label for="edit-cell_phone">Celular</label>
              <input type="text" class="form-control" name="cell_phone" id="edit-cell_phone" aria-describedby="edit-cellphoneHelp">
              <small id="edit-cellphoneHelp" class="form-text text-muted">Sem pontuação</small>
            </div>
          </div>

          <input hidden name="id" id="student-id">
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