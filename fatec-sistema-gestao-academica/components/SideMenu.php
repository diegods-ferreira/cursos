<div class="col-2 bg-dark d-flex flex-column justify-content-between py-3">
  <div class="flex-grow-1">
    <a class="btn btn-lg btn-dark btn-block mb-3 font-weight-bold" href="./Home">SIGA</a>

    <div class="nav flex-column nav-pills">
      <a class="nav-link text-light" id="home-link" href="../pages/Home">
        <i class="col-1 fas fa-home"></i>
        <span class="col">Início</span>
      </a>

      <a class="nav-link text-light" id="courses-link" href="../pages/Courses">
        <i class="col-1 fas fa-chalkboard"></i>
        <span class="col">Cursos</span>
      </a>

      <a class="nav-link text-light" id="subjects-link" href="../pages/Subjects">
        <i class="col-1 fas fa-book"></i>
        <span class="col">Disciplinas</span>
      </a>

      <a class="nav-link text-light" id="professors-link" href="../pages/Professors">
        <i class="col-1 fas fa-chalkboard-teacher"></i>
        <span class="col">Professores</span>
      </a>

      <a class="nav-link text-light" id="classes-link" href="../pages/Classes">
        <i class="col-1 fas fa-users"></i>
        <span class="col">Turmas</span>
      </a>

      <a class="nav-link text-light" id="students-link" href="../pages/Students">
        <i class="col-1 fas fa-user-friends"></i>
        <span class="col">Alunos</span>
      </a>
    </div>
  </div>

  <button class="btn btn-outline-light mb-3" disabled>
    <i class="fas fa-user"></i>
    <small class="ml-2"><?= $_SESSION['user:name'] ?></small>
  </button>

  <form action="../../routes/auth.routes.php?action=sign-out" method="post">
    <button class="btn btn-lg btn-danger btn-block" type="submit">
      <i class="fas fa-power-off mr-1"></i>
      <span>Sair</span>
    </button>
  </form>
</div>

<script>
  if (document.URL.includes('/pages/Home')) {
    document.getElementById('home-link').classList.add('active');
  }

  if (document.URL.includes('/pages/Courses')) {
    document.getElementById('courses-link').classList.add('active');
  }

  if (document.URL.includes('/pages/Professors')) {
    document.getElementById('professors-link').classList.add('active');
  }

  if (document.URL.includes('/pages/Subjects')) {
    document.getElementById('subjects-link').classList.add('active');
  }

  if (document.URL.includes('/pages/Classes')) {
    document.getElementById('classes-link').classList.add('active');
  }

  if (document.URL.includes('/pages/Students')) {
    document.getElementById('students-link').classList.add('active');
  }
</script>