<div class="modal fade" id="detailClassModal" tabindex="-1" aria-labelledby="detailClassModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="detailClassModalLabel">Detalhes da Turma</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row mb-3">
          <div class="col">
            <p class="text-muted mb-1">Nº da Turma</p>
            <p id="detail-id">Id da turma</p>
          </div>
        </div>

        <div class="row mb-3">
          <div class="col">
            <p class="text-muted mb-1">Descrição</p>
            <p id="detail-description">Descrição da Turma</p>
          </div>
        </div>

        <div class="row mb-3">
          <div class="col">
            <p id="detail-subjects">Disciplinas da Turma</p>
          </div>
        </div>

        <div class="row mb-3">
          <div class="col">
            <p class="text-muted mb-1">Usuário de criação</p>
            <p id="detail-user-name">Usuário de criação</p>
          </div>
        </div>

        <div class="row">
          <div class="col-6">
            <p class="text-muted mb-1">Criado em</p>
            <p id="detail-created-at">Criado em</p>
          </div>

          <div class="col-6">
            <p class="text-muted mb-1">Última atualização</p>
            <p id="detail-updated-at">Data da Atualização</p>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
      </div>
    </div>
  </div>
</div>