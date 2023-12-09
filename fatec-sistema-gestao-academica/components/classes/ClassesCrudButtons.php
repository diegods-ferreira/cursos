<button
  class="col-3 btn btn-sm btn-secondary"
  data-toggle="modal"
  data-target="#editClassModal"
  onclick="<?= "fillUpEditClassModalFields($class->id, '$class->description')" ?>"
>
  <i class="fas fa-edit"></i>
</button>

<button
  class="col-3 btn btn-sm btn-danger mx-1"
  data-toggle="modal"
  data-target="#deleteClassModal"
  onclick="<?= "fillUpDeleteClassModalFields($class->id)" ?>"
>
  <i class="fas fa-trash"></i>
</button>

<button
  class="col-3 btn btn-sm btn-info"
  data-toggle="modal"
  data-target="#detailClassModal"
  onclick="<?= "fillUpDetailClassModalFields($class->id, '$class->description', '$class->created_at', '$class->updated_at', '$class->user_name')" ?>"
>
  <i class="fas fa-info"></i>
</button>

<script>
  function fillUpEditClassModalFields(id, description) {
    document.getElementById('class-id').value = id;
    document.getElementById('edit-description').value = description;
  }

  function fillUpDetailClassModalFields(id, description, created_at, updated_at, user_name) {
    const report = urlParams.get('report');

    const options = {
      year: 'numeric', month: 'numeric', day: 'numeric',
      hour: 'numeric', minute: 'numeric', second: 'numeric',
      hour12: false
    };

    document.getElementById('detail-id').innerHTML = id;
    document.getElementById('detail-description').innerHTML = description;
    document.getElementById('detail-created-at').innerHTML = Intl.DateTimeFormat('pt-BR', options).format(new Date(created_at));
    document.getElementById('detail-updated-at').innerHTML = Intl.DateTimeFormat('pt-BR', options).format(new Date(updated_at));
    document.getElementById('detail-user-name').innerHTML = user_name;
    document.getElementById('detail-subjects').innerHTML = `
      <a class="btn btn-outline-info btn-block" href="../../pages/Classes?${report ? `report=${report}` : ''}page=class-subjects&class_id=${id}">Ver Disciplinas</a>
    `;
  }

  function fillUpDeleteClassModalFields(id) {
    document.getElementById('delete-class-id').value = id;
  }
</script>