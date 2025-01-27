<?php 
  $conn = mysqli_connect("localhost","root","","vit_jobs") or die("Not Connect");
  session_start();
  if(!$_SESSION['uname']){ header("Location:login.php"); }
  $job_title = $_GET['title'];
  $uname = $_SESSION['uname'];
  $query = "SELECT * FROM `users` WHERE `uname`='$uname'";
  $run = mysqli_query($conn,$query);
  $data = mysqli_fetch_assoc($run);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Submit CV</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
  <?php include_once("./components/header.php"); ?>

  <div class="my-2">
    <form action="query.php" method="post" enctype="multipart/form-data" class="m-auto border border-5 border-info p-3 w-50">
      <h1 class="text-center fw-bold text-decoration-underline">Send Resume</h1>
      <input type="text" name="join_id" value="<?php echo $data['id']; ?>" class="form-control mb-2 border border-dark">
      <input type="text" name="name" id="" class="form-control mb-2 border border-dark" placeholder="Enter Your Full Name:">
      <input type="text" name="email" id="" class="form-control mb-2 border border-dark" placeholder="Enter Your Email:">
      <input type="text" name="mobile" id="" class="form-control mb-2 border border-dark" placeholder="Enter Your Mobile:">
      <input type="text" name="apply_for" value="<?php echo $job_title; ?>" id="" class="form-control mb-2 border border-dark" readonly>
      <label class="fw-bold">Upload Resume:</label>
      <input type="file" name="resume" id="" class="form-control mb-2 border border-dark">
      <div class="text-center">
        <button type="submit" name="resume_submit" class="btn btn-success mt-3">Submit Application</button>
      </div>
    </form>
  </div>
  
  <?php include_once("./components/footer.php"); ?>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>