<?php 
    session_start();
    $conn = mysqli_connect("localhost","root","","vit_jobs") or die("Not Connect");
    if(!isset($_SESSION['admin_uname'])){
        header("Location:index.php");
    }
    $query = "SELECT * FROM `cv`";
    $run = mysqli_query($conn,$query);
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
    <main class="m-auto mx-5 my-2">
        <table class="border table table-hover" style="background:wheat">
            <tr>
                <th colspan="8" class="text-center fs-1 fw-bold bg-info">
                    Manage All Users Profile
                </th>                
            </tr>           
            <tr class="border border-info">
                <th>Job Banner</th>
                <th>Job Title</th>
                <th>Job Description</th>
                <th>Accept</th>
                <th colspan="2">Reject</th>
            </tr>

            <?php
              if(isset($_GET['page'])) { 
                $c_p = $_GET['page'];
              }
              else{ 
                $c_p = 1; 
              }
              $p_p_p = 3;
              $start = ($c_p - 1) * $p_p_p;
              $query = "SELECT * FROM `cv` LIMIT $start, $p_p_p";
              $result = mysqli_query($conn,$query);
              if (mysqli_num_rows($result) > 0){
              while ($data = mysqli_fetch_assoc($result)){
            ?>
            <tr class="border border-info">
                <td><?php echo $data['full_name']; ?></td>
                <td><a class="btn btn-success" href="<?php echo "../".$data['resume']; ?>" download>Download CV</a></td>
                <td><?php echo $data['apply_for']; ?></td>
                <td><a href="query.php?id=<?php echo $data['id']; ?>" class="fs-2 text-success"><i class="fa-solid fa-pen-to-square"></i></i></a></td>
                <td>
                    <form action="query.php" method="post">
                        <input type="hidden" name="delete" value="<?php echo $data['id']; ?>">
                        <button type="submit" class="fs-2 text-danger bg-wheat" style="border:2px solid wheat;background:wheat;">
                            <i class="fa-solid fa-trash"></i>
                        </button>
                    </form>
                </td>
            </tr>
            <?php } } else {  ?> 
                <tr class="border border-info">
                    <td colspan="6"><?php echo "No results found."; ?></td>
                </tr>    
            <?php } ?>                    
        </table>
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
    </main>    
    <?php include_once("./components/footer.php"); ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>