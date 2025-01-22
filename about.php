<?php 
    $conn = mysqli_connect("localhost","root","","vit_jobs") or die("Not Connect");
    session_start();
    if(!$_SESSION['email']){
        header("Location:login.php");
    }
    $email = $_SESSION['email'];
    $query = "SELECT * FROM `users` WHERE `email`='$email'";
    $run = mysqli_query($conn,$query);
    $data = mysqli_fetch_assoc($run);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=\, initial-scale=1.0">
    <title>Ecom</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css" integrity="sha512-5Hs3dF2AEPkpNAR7UiOHba+lRSJNeM2ECkwxUIxC1Q/FLycGTbNapWXB4tP889k5T5Ju8fs4b1P5z/iB4nMfSQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
        @import url('./static/style.css');
    </style>
</head>
<body>
    <?php include_once("./components/header.php"); ?>
    <div id="about">
        <h1 class="text-center fs-1 fw-bold text-info mt-4">About Us</h1>
        <div class="bg-light py-2 shadow m-auto">
            <div class="text-center">
                <img src="./static/logo/skill.png" alt="Logo" height="200px" class="rounded border mx-5">
                <img src="./static/logo/logo.png" alt="Logo" height="200px" class="rounded border mx-5">
                <p class="text-start px-5 fs-5 text-secondary fw-bold">We, Vidyarthi Institute and Technology, situated at Aurangabad City, Aurangabad-Maharashtra, are a leading institute offering a wide range of computer courses for all. Our mission is quality training with an affordable fee structure. Our uniquely designed curriculum makes our students employable and future ready. We have a dedicated team of skilled teachers and counsellors who make sure that regular up-gradation of courses is provided to students along with career guidance. Our professional team works harmoniously in unison, pushing the frontiers in growth and quality in imparting education.</p>
            </div>
        </div>
    </div>
    <?php include_once("./components/footer.php"); ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>