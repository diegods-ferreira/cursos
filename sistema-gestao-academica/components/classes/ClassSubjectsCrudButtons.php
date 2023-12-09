<button
  class="col-3 btn btn-sm btn-danger mx-1"
  data-toggle="modal"
  data-target="#deleteClassSubjectModal"
  onclick="<?= "fillUpDeleteClassSubjectModalFields($subject->id)" ?>"
>
  <i class="fas fa-minus"></i>
</button>

<script>
  function fillUpDeleteClassSubjectModalFields(id) {
    document.getElementById('delete-class-subject-id').value = id;
  }
</script>