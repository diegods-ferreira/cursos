<button
  class="col-3 btn btn-sm btn-secondary"
  data-toggle="modal"
  data-target="#editStudentModal"
  onclick="<?= "fillUpEditStudentModalFields($student->id, '$student->name', '$student->cpf', '$student->birth_date', '$student->phone', '$student->cell_phone')" ?>"
>
  <i class="fas fa-edit"></i>
</button>

<button
  class="col-3 btn btn-sm btn-danger mx-1"
  data-toggle="modal"
  data-target="#deleteStudentModal"
  onclick="<?= "fillUpDeleteStudentModalFields($student->id)" ?>"
>
  <i class="fas fa-trash"></i>
</button>

<button
  class="col-3 btn btn-sm btn-info"
  data-toggle="modal"
  data-target="#detailStudentModal"
  onclick="<?= "fillUpDetailStudentModalFields($student->id, '$student->name', '$student->cpf', '$student->birth_date_formatted', '$student->phone', '$student->cell_phone', '$student->created_at', '$student->updated_at', '$student->user_name')" ?>"
>
  <i class="fas fa-info"></i>
</button>

<script>
  function fillUpEditStudentModalFields(id, name, cpf, birth_date, phone, cell_phone) {
    document.getElementById('student-id').value = id;
    document.getElementById('edit-name').value = name;
    document.getElementById('edit-cpf').value = cpf;
    document.getElementById('edit-birth_date').value = birth_date;
    document.getElementById('edit-phone').value = phone;
    document.getElementById('edit-cell_phone').value = cell_phone;
  }

  function fillUpDetailStudentModalFields(id, name, cpf, birth_date, phone, cell_phone, created_at, updated_at, user_name) {
    const options = {
      year: 'numeric', month: 'numeric', day: 'numeric',
      hour: 'numeric', minute: 'numeric', second: 'numeric',
      hour12: false
    };

    document.getElementById('detail-id').innerHTML = id;
    document.getElementById('detail-name').innerHTML = name;
    document.getElementById('detail-cpf').innerHTML = cpf;
    document.getElementById('detail-birth-date').innerHTML = birth_date;
    document.getElementById('detail-phone').innerHTML = phone;
    document.getElementById('detail-cell-phone').innerHTML = cell_phone;
    document.getElementById('detail-created-at').innerHTML = Intl.DateTimeFormat('pt-BR', options).format(new Date(created_at));
    document.getElementById('detail-updated-at').innerHTML = Intl.DateTimeFormat('pt-BR', options).format(new Date(updated_at));
    document.getElementById('detail-user-name').innerHTML = user_name;
    document.getElementById('detail-courses').innerHTML = `
      <a class="btn btn-outline-info btn-block" href="../../pages/Students?${report ? `report=${report}` : ''}page=student-courses&student_id=${id}">Ver Matrículas</a>
    `;
  }

  function fillUpDeleteStudentModalFields(id) {
    document.getElementById('delete-student-id').value = id;
  }
</script>