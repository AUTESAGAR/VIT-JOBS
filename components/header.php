<nav class="navbar navbar-expand-lg navbar-light bg-dark m-auto">
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
      <div class="navbar-nav">
        <a class="nav-link active text-light fs-4 fw-bold" aria-current="page" href="about.php">About</a>        
      </div>
    </div>
    <?php if($data['email']) { ?>
      <a href="change_profile.php">
        <img src="<?php echo $data['photo']; ?>" alt="photo" height="50px" class="rounded-circle px-3">
      </a>
      <div class="dropdown px-3">
        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
          <?php echo $data['name']; ?>
        </button>
        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
          <li><a class="dropdown-item" href="edit_profile.php">Edit Profile</a></li>
          <form action="query.php?logout=<?php echo $data['email'] ?>" method="post">
            <li><input type="submit" class="dropdown-item" value="Logout"></li>
          </form>
          <li><a class="dropdown-item" href="query.php?delete=<?php echo $data['email']; ?>">Delete Account</a></li>
        </ul>
      </div>     
      <?php } else { ?>
        <a class="nav-link active text-light fs-4 fw-bold" aria-current="page" href="reg.php">Registration</a>
        <a class="nav-link active text-light fs-4 fw-bold" aria-current="page" href="login.php">Login</a>      
      <?php } ?>
  </div>
</nav>