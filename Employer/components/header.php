<nav class="navbar navbar-expand-lg navbar-light bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="index.php">
      <img src="static/logo/job.jpg" alt="logo" height="50px">
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
      <div class="navbar-nav">
        <a class="nav-link active text-light fs-4 fw-bold" aria-current="page" href="home.php">Home</a>
      </div>      
    </div>
    <?php if($_SESSION['employer_user']) { ?>
      <div class="dropdown px-3">
        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
          <?php echo $_SESSION['employer_user']; ?>
        </button>
        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">          
          <a class="nav-link active" aria-current="page" href="query.php?employer_user=<?php echo $_SESSION['employer_user']; ?>">Logout</a>
        </ul>
      </div>     
      <?php } else { ?>
        <a class="nav-link active text-light fs-4 fw-bold" aria-current="page" href="index.php">Login</a>
      <?php } ?>
  </div>
</nav>