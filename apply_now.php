<?php 
    $conn = mysqli_connect("localhost","root","","vit_jobs") or die("Not Connect");
    session_start();
    if(!$_SESSION['email']){
        header("Location:login.php");
    }
    $job_title = $_GET['title'];
    $email = $_SESSION['email'];
    $query = "SELECT * FROM `users` WHERE `email`='$email'";
    $run = mysqli_query($conn,$query);
    $data = mysqli_fetch_assoc($run);    
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Job Application Form</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
  <?php include_once("./components/header.php"); ?>
  <div class="container my-2">
    <form action="query.php" method="post" enctype="multipart/form-data" class="m-auto border border-5 border-info p-3">      
      <h1 class="text-center fw-bold text-decoration-underline">Application Form</h1>
      <input type="text" id="join_id" name="join_id" value="<?php echo $data['id']; ?>" class="form-control border border-dark w-50 m-auto my-2">
      <input type="text" name="full_name" id="" class="form-control mb-2 border border-dark" placeholder="Enter Your Full Name:">
      <input type="text" name="email" id="" class="form-control mb-2 border border-dark" placeholder="Enter Your Email Address:">
      <input type="text" name="mobile" id="" class="form-control mb-2 border border-dark" placeholder="Enter Your Phone Number:">
      <input type="text" name="apply_for" value="<?php echo $job_title; ?>" id="" class="form-control mb-2 border border-dark" readonly>
      <label for="Upload Resume:" class="fw-bold">Upload Resume:</label>
      <input type="file" name="resume" id="" class="form-control mb-2 border border-dark">

      <label for="Upload Resume:" class="fw-bold">Gender:</label>    
      <select name="gender" class="form-control mb-2 border border-dark">
        <option value="0">Select Gender</option>
        <option value="Male">Male</option>
        <option value="Female">Female</option>
        <option value="Other">Other</option>
      </select>
      <div class="row m-auto py-2">
        <div class="col-6 text-center">
          <label for="doj" class="fw-bold">Date Of Joining</label>
          <input type="date" id="date_of_joining" name="date_of_joining" class="form-control border border-dark w-50 m-auto my-2">
        </div>        
        <div class="col-6 text-center">
          <label for="doj" class="fw-bold">Date Of Leaving:</label>
          <input type="date" id="date_of_leaving" name="date_of_leaving" class="form-control border border-dark w-50 m-auto my-2">
        </div>
      </div>
      <div class="text-center">
        <label for="" class="fw-bold">Total Number Of Years:</label>
        <input type="text" name="experience_year" id="experience_year" class="form-control border border-dark w-50 m-auto" readonly>
      </div>
      <label for="" class="fw-bold">Additional Information:</label>      
      <div class="form-floating">
        <textarea name="add_info" class="form-control mb-2 border border-dark" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px"></textarea>
        <label for="floatingTextarea2">Add any additional information</label>
      </div>
      <div class="text-center">
        <button type="submit" name="submit_application" class="btn btn-success mt-3">Submit Application</button>
      </div>
    </form>
  </div>
  <?php include_once("./components/footer.php"); ?>
  <script>
    let doj = document.getElementById("date_of_joining");
    let dol = document.getElementById("date_of_leaving");    
    let experienceYears=document.getElementById("experience_year");
    doj.addEventListener("change", calculateExperience);
    dol.addEventListener("change", calculateExperience);
    function calculateExperience() {
        let dojValue = new Date(doj.value);
        let dolValue = new Date(dol.value);        
        if (dojValue && dolValue && dolValue > dojValue) {            
            let diffInMs = dolValue - dojValue;
            let diffInDays = diffInMs / (1000 * 60 * 60 * 24);            
            let years = Math.floor(diffInDays / 365.25);
            let months = Math.floor((diffInDays % 365.25) / 30);
            let days = Math.floor((diffInDays % 365.25) % 30);
            experienceYears.value = `${years} Years, ${months} Months, ${days} Days`;
        } else {
            experienceYears.value = "";            
        }
    }
  </script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>