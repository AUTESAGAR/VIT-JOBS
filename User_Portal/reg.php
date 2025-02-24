<?php 
    session_start();
    error_reporting(0);
    if($_SESSION['email']){
        header("Location:home.php");
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=\, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css" integrity="sha512-5Hs3dF2AEPkpNAR7UiOHba+lRSJNeM2ECkwxUIxC1Q/FLycGTbNapWXB4tP889k5T5Ju8fs4b1P5z/iB4nMfSQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
        @import url('./static/style.css');
    </style>
</head>

<body>
    <?php include_once("./components/header.php"); ?>
    <div class="row m-auto">
        <div class="col-2 text-center border p-2 m-auto">
            <img src="./static/logo/job.jpg" alt="" height="100px">
            <br><br><br><br><br><br>
            <img src="./static/logo/job.jpg" alt="" height="100px">
        </div>        
        <div class="col-5 m-auto border border-5 my-2 p-4 bg-secondary w-50">
            <form action="query.php" method="post" enctype="multipart/form-data">
                <h1 class="text-center fs-2 fw-bold bg-warning">
                    User Registration Form
                </h1>
                <input type="text" name="name" class="form-control border border-dark my-2" placeholder="Enter Your Name">
                <input type="text" name="uname" class="form-control border border-dark my-2" placeholder="Enter Your Uname">
                <input type="text" name="pwd" class="form-control border border-dark my-2" placeholder="Enter Your Password">
                <input type="text" name="email" class="form-control border border-dark my-2" placeholder="Enter Your Email">
                <input type="text" name="mobile" class="form-control border border-dark my-2" placeholder="Enter Your Mobile">
                <input type="file" name="profile" class="form-control border border-dark my-2">
                <div class="text-center my-2">
                    <input type="submit" class="btn btn-success" value="Create Account" name="reg">
                </div>
            </form>
        </div>
        <div class="col-2 text-center border p-2 m-auto">
            <img src="./static\logo\job.jpg" alt="" height="100px">
            <br><br><br><br><br><br>
            <img src="./static\logo\job.jpg" alt="" height="100px">
        </div>
    </div>

    <?php include_once("./components/footer.php"); ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>