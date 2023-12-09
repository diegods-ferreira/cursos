<div class="col-2">
  <h3 class="mb-3">Relatórios</h3>
  <div class="nav flex-column nav-pills">
    <a class="nav-link" id="courses-list-link" href="../pages/Courses">
      Lista de Cursos
    </a>

    <a class="nav-link" id="courses-by-students-number-link" href="../pages/Courses?report=courses-by-students-number">
      Cursos com mais alunos
    </a>
  </div>
</div>

<script>
  const urlParams = new URLSearchParams(window.location.search);
  const report = urlParams.get('report');
  
  if (!report) {
    document.getElementById('courses-list-link').classList.add('active');
  } else {
    document.getElementById(report + '-link').classList.add('active');
  }
</script>