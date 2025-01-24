<?php
    session_start();
    if(isset($_SESSION['employer_user'])){
        header("Location:home.php");
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=\, initial-scale=1.0">
    <title>Employer Portal</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css" integrity="sha512-5Hs3dF2AEPkpNAR7UiOHba+lRSJNeM2ECkwxUIxC1Q/FLycGTbNapWXB4tP889k5T5Ju8fs4b1P5z/iB4nMfSQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
        @import url('./static/style.css');
    </style>
</head>
<body>
    <?php include_once("./components/header.php"); ?>

    <form action="query.php" method="post" class="m-auto border border-info border-5 my-2 py-2 w-50 px-5 py-5">
        <h1 class="text-center fs-2 fw-bold bg-info">Employer Login</h1>
        <input type="text" name="uname" id="" class="form-control border border-dark my-3" placeholder="Enter Your Username">
        <input type="text" name="pwd" id="" class="form-control border border-dark my-3" placeholder="Enter Your Password">
        <div class="fs-5 fw-bold row text-center">
            <div class="col-6">
                <a href="reg.php">Create Account</a>
            </div>
            <div class="col-6">
                <a href="forgot.php">Forgot Password?</a>
            </div>
        </div>

        <div class="text-center my-3">
            <button type="submit" class="btn btn-success" name="employer_login">Login</button>
        </div>
    </form>

    <?php include_once("./components/footer.php"); ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>