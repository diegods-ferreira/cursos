<div class="col-2">
  <h3 class="mb-3">Relatórios</h3>
  <div class="nav flex-column nav-pills">
    <a class="nav-link" id="subjects-list-link" href="../pages/Subjects">
      Lista de Disciplinas
    </a>

    <a class="nav-link" id="subjects-by-course-link" href="../pages/Subjects?report=subjects-by-course">
      Disciplinas por Curso
    </a>
  </div>
</div>

<script>
  const urlParams = new URLSearchParams(window.location.search);
  const report = urlParams.get('report');
  
  if (!report) {
    document.getElementById('subjects-list-link').classList.add('active');
  } else {
    document.getElementById(report + '-link').classList.add('active');
  }
</script>