<button
  class="col-3 btn btn-sm btn-danger mx-1"
  data-toggle="modal"
  data-target="#deleteStudentCourseModal"
  onclick="<?= "fillUpDeleteStudentCourseModalFields($course->id)" ?>"
>
  <i class="fas fa-minus"></i>
</button>

<script>
  function fillUpDeleteStudentCourseModalFields(id) {
    document.getElementById('delete-student-course-id').value = id;
  }
</script>