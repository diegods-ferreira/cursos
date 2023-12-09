<div class="col-2">
  <h3 class="mb-3">Relatórios</h3>
  <div class="nav flex-column nav-pills">
    <a class="nav-link" id="classes-list-link" href="../pages/Classes">
      Lista de Turmas
    </a>
  </div>
</div>

<script>
  const urlParams = new URLSearchParams(window.location.search);
  const report = urlParams.get('report');
  
  if (!report) {
    document.getElementById('classes-list-link').classList.add('active');
  } else {
    document.getElementById(report + '-link').classList.add('active');
  }
</script>