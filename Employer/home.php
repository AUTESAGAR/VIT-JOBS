<?php 
    session_start();
    $conn = mysqli_connect("localhost","root","","vit_jobs") or die("Not Connect");
    if(!isset($_SESSION['employer_user'])){
        header("Location:index.php");
    }          
    $q = "SELECT * FROM `employer` WHERE `uname`='$_SESSION[employer_user]'";
    $r = mysqli_query($conn,$q);
    $d = mysqli_fetch_assoc($r);    
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
    <h2 class="text-center bg-warning shadow py-2 fw-bold">
        Manage Employment 
    </h2>

    <?php
        if(isset($_GET['page'])) { 
          $c_p = $_GET['page'];
        }
        else{ 
          $c_p = 1; 
        }
        $p_p_p = 3;
        $start = ($c_p - 1) * $p_p_p;
        $query = "SELECT * FROM `cv`";
        $result = mysqli_query($conn,$query);
        if (mysqli_num_rows($result) > 0){
        while ($data = mysqli_fetch_assoc($result)) { 
    ?>  
        <hr>
        <div class="text-center ws-5 row">
            <span class="col-2"><?php echo $data['name']; ?></span>
            <span class="col-2"><?php echo $data['mobile']; ?></span>
            <span class="col-2"><?php echo $data['email']; ?></span>
            <span class="col-2"><a class="btn btn-success" href="<?php echo $data['cv']; ?>" download>Download CV</a></span>
            <span class="col-2"><?php echo $data['apply_for']; ?></span>
            
            <span class="col-2">
                <form action="query.php" method="post">
                    <input type="text" name="employer_name" id="" value="<?php echo $d['uname'] ?>">
                    <input type="text" name="employer_mobile" id="" value="<?php echo $d['mobile'] ?>">
                    <input type="text" name="employer_email" id="" value="<?php echo $d['email'] ?>">
                    <input type="text" name="employee_name" id="" value="<?php echo $data['name'] ?>">
                    <input type="text" name="employee_email" id="" value="<?php echo $data['email'] ?>">
                    <input type="submit" name="offer_latter" value="Send Interview Latter" class="btn btn-success" />
                </form>
            </span>
        </div>
        <hr>
        <?php } } else {  ?>
            <?php echo "No results found."; ?>
        <?php } ?>

        <div class="row">
            <div class="col-4"></div>
            <div class="col-4 m-auto mx-5 px-5">
                <nav aria-label="Page navigation example">
                    <ul class="pagination">
                        <li class="page-item"><a class="page-link" href="home.php?page=">Previous</a></li>
                        <li class="page-item"><a class="page-link" href="home.php?page=1">1</a></li>
                        <li class="page-item"><a class="page-link" href="home.php?page=2">2</a></li>
                        <li class="page-item"><a class="page-link" href="home.php?page=3">3</a></li>
                        <li class="page-item"><a class="page-link" href="home.php?page=">Next</a></li>
                    </ul>
                </nav>
            </div>
            <div class="col-4"></div>
        </div>

    <?php include_once("./components/footer.php"); ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>