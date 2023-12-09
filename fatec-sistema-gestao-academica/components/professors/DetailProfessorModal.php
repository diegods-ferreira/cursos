<div class="modal fade" id="detailProfessorModal" tabindex="-1" aria-labelledby="detailProfessorModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="detailProfessorModalLabel">Detalhes do Professor</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row mb-3">
          <div class="col-2">
            <p class="text-muted mb-1">#</p>
            <p id="detail-id">Id do Professor</p>
          </div>

          <div class="col-10">
            <p class="text-muted mb-1">Nome</p>
            <p id="detail-name">Nome do Professor</p>
          </div>
        </div>

        <div class="row mb-3">
          <div class="col">
            <p class="text-muted mb-1">Título</p>
            <p id="detail-title">Título do Professor</p>
          </div>
        </div>

        <div class="row mb-3">
          <div class="col">
            <p class="text-muted mb-1">Disciplinas</p>
            <ul class="list-group w-100" id="detail-subjects"></ul>
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
            <p id="detail-created-at">Nome do Curso</p>
          </div>

          <div class="col-6">
            <p class="text-muted mb-1">Última atualização</p>
            <p id="detail-updated-at">Data do Atualização</p>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
      </div>
    </div>
  </div>
</div>