<div class="col-2">
  <h3 class="mb-3">Relatórios</h3>
  <div class="nav flex-column nav-pills">
    <a class="nav-link" id="students-list-link" href="../pages/Students">
      Lista de Alunos
    </a>
  </div>
</div>

<script>
  const urlParams = new URLSearchParams(window.location.search);
  const report = urlParams.get('report');
  
  if (!report) {
    document.getElementById('students-list-link').classList.add('active');
  } else {
    document.getElementById(report + '-link').classList.add('active');
  }
</script>