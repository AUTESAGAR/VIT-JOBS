<?php 
    $conn = mysqli_connect("localhost","root","","vit_jobs") or die("Not Connect");
    session_start();
    if(!$_SESSION['uname']){
        header("Location:login.php");
    }
    $uname = $_SESSION['uname'];
    $query = "SELECT * FROM `users` WHERE `uname`='$uname'";
    $run = mysqli_query($conn,$query);
    $data = mysqli_fetch_assoc($run);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=\, initial-scale=1.0">
    <title>edit_profile</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css" integrity="sha512-5Hs3dF2AEPkpNAR7UiOHba+lRSJNeM2ECkwxUIxC1Q/FLycGTbNapWXB4tP889k5T5Ju8fs4b1P5z/iB4nMfSQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
        @import url('./static/style.css');
    </style>
</head>
<body>
    <?php include_once("./components/header.php"); ?>
    <div class="w-50 m-auto my-3">
        <form action="query.php" method="post" enctype="multipart/form-data" class="border border-5 p-3 border-dark">
            <h1 class="text-center fs-2 fw-bold bg-info">Change Profile</h1>
            <input type="hidden" name="id" value="<?php echo $data['id']; ?>" id="" class="form-control border border-dark my-2">
            <div class="text-center">
                <img src="<?php echo $data['photo']; ?>" alt="profile" height="150px">
            </div>
            <input type="file" name="photo" id="" class="form-control border border-dark my-2">
            <div class="text-center my-2">
                <input type="submit" class="btn btn-success" value="Change_Profile" name="change_profile">
            </div>
        </form>
    </div>
    <?php include_once("./components/footer.php"); ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>