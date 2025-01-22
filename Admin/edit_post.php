<?php 
    session_start();
    $conn = mysqli_connect("localhost","root","","vit_jobs") or die("Not Connect");
    if(!isset($_SESSION['uname'])){
        header("Location:index.php");
    }
    $id = $_GET['id'];
    $query = "SELECT * FROM `post` WHERE `id`='$id'";
    $run = mysqli_query($conn,$query);
    $data = mysqli_fetch_assoc($run);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=\, initial-scale=1.0">
    <title>Home</title>    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css" integrity="sha512-5Hs3dF2AEPkpNAR7UiOHba+lRSJNeM2ECkwxUIxC1Q/FLycGTbNapWXB4tP889k5T5Ju8fs4b1P5z/iB4nMfSQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
        @import url('./static/style.css');
    </style>
</head>
<body>
    <?php include_once("./components/header.php"); ?>
    <main class="mx-5 my-2 container">
        <form action="query.php" method="post" enctype="multipart/form-data" class="border border-5 border-info p-5 m-auto">
            <h1 class="text-center">Edit Job Post</h1>
            <input type="hidden" value="<?php echo $data['id'];  ?>" class="form-control mb-2" name="id">
            <input type="text" value="<?php echo $data['title'];  ?>" class="form-control mb-2" name="title" placeholder="Enter Job Title">
            <input type="text" value="<?php echo $data['description'];  ?>" class="form-control mb-2" name="description" placeholder="Enter Job Description">
            <input type="text" value="<?php echo $data['location'];  ?>" class="form-control mb-2" name="location" placeholder="Enter Job Location">
            <div class="text-center">
                <img src="<?php echo $data['banner'];  ?>" alt="banner" height="100px">
            </div>
            <input type="file" class="form-control mb-2" name="banner" >
            <div class="text-center">
                <input type="submit" value="Update" name="update" class="btn btn-success">
            </div>
        </form>
    </main>    
    <?php include_once("./components/footer.php"); ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>