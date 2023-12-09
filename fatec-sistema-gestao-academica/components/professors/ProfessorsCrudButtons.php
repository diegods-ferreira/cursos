<button
  class="col-3 btn btn-sm btn-secondary"
  data-toggle="modal"
  data-target="#editProfessorModal"
  onclick="<?= "fillUpEditProfessorModalFields($professor->id, '$professor->name', '$professor->title', [$professor->subjects_id_list])" ?>"
>
  <i class="fas fa-edit"></i>
</button>

<button
  class="col-3 btn btn-sm btn-danger mx-1"
  data-toggle="modal"
  data-target="#deleteProfessorModal"
  onclick="<?= "fillUpDeleteProfessorModalFields($professor->id)" ?>"
>
  <i class="fas fa-trash"></i>
</button>

<button
  class="col-3 btn btn-sm btn-info"
  data-toggle="modal"
  data-target="#detailProfessorModal"
  onclick="<?= "fillUpDetailProfessorModalFields($professor->id, '$professor->name', '$professor->title', [$professor->subjects_serialized], '$professor->created_at', '$professor->updated_at', '$professor->user_name')" ?>"
>
  <i class="fas fa-info"></i>
</button>

<script>
  function fillUpEditProfessorModalFields(id, name, title, subjectsIds) {
    document.getElementById('professor-id').value = id;
    document.getElementById('edit-name').value = name;
    document.getElementById('edit-title').value = title;

    console.log(subjectsIds);

    subjectsIds.forEach(function(subjectId, index) {
      document.querySelector('#edit-subjects option[value="' + subjectId + '"]').selected = true;
    });
  }

  function fillUpDetailProfessorModalFields(id, name, title, serializedSubjects, created_at, updated_at, user_name) {
    const options = {
      year: 'numeric', month: 'numeric', day: 'numeric',
      hour: 'numeric', minute: 'numeric', second: 'numeric',
      hour12: false
    };

    document.getElementById('detail-id').innerHTML = id;
    document.getElementById('detail-name').innerHTML = name;
    document.getElementById('detail-title').innerHTML = title;
    document.getElementById('detail-created-at').innerHTML = Intl.DateTimeFormat('pt-BR', options).format(new Date(created_at));
    document.getElementById('detail-updated-at').innerHTML = Intl.DateTimeFormat('pt-BR', options).format(new Date(updated_at));
    document.getElementById('detail-user-name').innerHTML = user_name;

    if (serializedSubjects.length > 0) {
      document.getElementById('detail-subjects').innerHTML = '';
      
      serializedSubjects.forEach(function(serializedSubject, index) {
        const subject = serializedSubject.split('|');

        const subjectNameEl = document.createElement('span');
        subjectNameEl.className = 'd-block mb-0';
        subjectNameEl.innerHTML = subject[0];

        const courseNameEl = document.createElement('span');
        courseNameEl.className = 'd-block mt-0 text-muted';
        courseNameEl.innerHTML = '<small>' + subject[1] + '</small>';

        const listItemEl = document.createElement('li');
        listItemEl.className = 'list-group-item';
        listItemEl.appendChild(subjectNameEl);
        listItemEl.appendChild(courseNameEl);

        document.getElementById('detail-subjects').appendChild(listItemEl);
      });
    } else {
      document.getElementById('detail-subjects').innerHTML = '<span class="text-danger">Nenhuma disciplina vinculada</span>';
    }
  }

  function fillUpDeleteProfessorModalFields(id) {
    document.getElementById('delete-professor-id').value = id;
  }
</script>