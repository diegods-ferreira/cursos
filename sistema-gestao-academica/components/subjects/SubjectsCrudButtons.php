<button
  class="col-3 btn btn-sm btn-secondary"
  data-toggle="modal"
  data-target="#editSubjectModal"
  onclick="<?= "fillUpEditSubjectModalFields($subject->id, '$subject->name', '$subject->workload', '" . stringfySummary($subject->summary) . "', $subject->course_id)" ?>"
>
  <i class="fas fa-edit"></i>
</button>

<button
  class="col-3 btn btn-sm btn-danger mx-1"
  data-toggle="modal"
  data-target="#deleteSubjectModal"
  onclick="<?= "fillUpDeleteSubjectModalFields($subject->id)" ?>"
>
  <i class="fas fa-trash"></i>
</button>

<button
  class="col-3 btn btn-sm btn-info"
  data-toggle="modal"
  data-target="#detailSubjectModal"
  onclick="<?= "fillUpDetailSubjectModalFields($subject->id, '$subject->name', '$subject->workload', '" . stringfySummary($subject->summary) . "', '$subject->course_name', '$subject->created_at', '$subject->updated_at', '$subject->user_name')" ?>"
>
  <i class="fas fa-info"></i>
</button>

<script>
  function fillUpEditSubjectModalFields(id, name, workload, summary, course_id, course_name) {
    let parsedSummary = summary;

    while (parsedSummary.includes('#carriage_return##new_line#')) {
      parsedSummary = parsedSummary.replace('#carriage_return##new_line#', '\r\n');
    }

    document.getElementById('subject-id').value = id;
    document.getElementById('edit-name').value = name;
    document.getElementById('edit-workload').value = workload;
    document.getElementById('edit-summary').innerHTML = parsedSummary;
    document.getElementById('edit-course_id').value = course_id;
  }

  function fillUpDetailSubjectModalFields(id, name, workload, summary, course_name, created_at, updated_at, user_name) {
    let parsedSummary = summary;

    while (parsedSummary.includes('#carriage_return##new_line#')) {
      parsedSummary = parsedSummary.replace('#carriage_return##new_line#', '</p><p>');
    }

    const options = {
      year: 'numeric', month: 'numeric', day: 'numeric',
      hour: 'numeric', minute: 'numeric', second: 'numeric',
      hour12: false
    };

    document.getElementById('detail-id').innerHTML = id;
    document.getElementById('detail-name').innerHTML = name;
    document.getElementById('detail-workload').innerHTML = workload + ' horas';
    document.getElementById('detail-summary').innerHTML = parsedSummary;
    document.getElementById('detail-course_name').innerHTML = course_name;
    document.getElementById('detail-created-at').innerHTML = Intl.DateTimeFormat('pt-BR', options).format(new Date(created_at));
    document.getElementById('detail-updated-at').innerHTML = Intl.DateTimeFormat('pt-BR', options).format(new Date(updated_at));
    document.getElementById('detail-user-name').innerHTML = user_name;
  }

  function fillUpDeleteSubjectModalFields(id) {
    document.getElementById('delete-subject-id').value = id;
  }
</script>