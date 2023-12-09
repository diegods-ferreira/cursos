<form action="../../routes/classes.routes.php?action=delete" method="POST">
  <div class="modal fade" id="deleteClassModal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="deleteClassModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title text-danger" id="deleteClassModalLabel">Excluir turma?</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <p>Tem certeza que deseja excluir essa turma? Podem haver alunos e disciplinas vinculados a ela.</p>
          <input hidden name="id" id="delete-class-id">
          <input hidden name="actual_report" value="<?= isset($_GET['report']) ? $_GET['report'] : '' ?>">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
          <button type="submit" class="btn btn-danger">Excluir</button>
        </div>
      </div>
    </div>
  </div>
</form>