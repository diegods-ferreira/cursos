<button
  class="col-3 btn btn-sm btn-secondary"
  data-toggle="modal"
  data-target="#editCourseModal"
  onclick="<?= "fillUpEditCourseModalFields($course->id, '$course->name', '$course->description', $course->period)" ?>"
>
  <i class="fas fa-edit"></i>
</button>

<button
  class="col-3 btn btn-sm btn-danger mx-1"
  data-toggle="modal"
  data-target="#deleteCourseModal"
  onclick="<?= "fillUpDeleteCourseModalFields($course->id)" ?>"
>
  <i class="fas fa-trash"></i>
</button>

<button
  class="col-3 btn btn-sm btn-info"
  data-toggle="modal"
  data-target="#detailCourseModal"
  onclick="<?= "fillUpDetailCourseModalFields($course->id, '$course->name', '$course->description', $course->period, '$course->created_at', '$course->updated_at', '$course->user_name')" ?>"
>
  <i class="fas fa-info"></i>
</button>

<script>
  function fillUpEditCourseModalFields(id, name, description, period) {
    document.getElementById('course-id').value = id;
    document.getElementById('edit-name').value = name;
    document.getElementById('edit-description').value = description;
    document.getElementById('edit-period' + period.toString()).checked = true;
  }

  function fillUpDetailCourseModalFields(id, name, description, period, created_at, updated_at, user_name) {
    const options = {
      year: 'numeric', month: 'numeric', day: 'numeric',
      hour: 'numeric', minute: 'numeric', second: 'numeric',
      hour12: false
    };

    document.getElementById('detail-id').innerHTML = id;
    document.getElementById('detail-name').innerHTML = name;
    document.getElementById('detail-description').innerHTML = description;
    document.getElementById('detail-period').innerHTML = period == 1 ? 'Manhã' : (period == 2 ? 'Tarde' : 'Noite');
    document.getElementById('detail-created-at').innerHTML = Intl.DateTimeFormat('pt-BR', options).format(new Date(created_at));
    document.getElementById('detail-updated-at').innerHTML = Intl.DateTimeFormat('pt-BR', options).format(new Date(updated_at));
    document.getElementById('detail-user-name').innerHTML = user_name;
  }

  function fillUpDeleteCourseModalFields(id) {
    document.getElementById('delete-course-id').value = id;
  }
</script>