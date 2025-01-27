<?php 
    session_start();
    $conn = mysqli_connect("localhost","root","","vit_jobs") or die("Not Connect");
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
    <title>Home</title>    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css" integrity="sha512-5Hs3dF2AEPkpNAR7UiOHba+lRSJNeM2ECkwxUIxC1Q/FLycGTbNapWXB4tP889k5T5Ju8fs4b1P5z/iB4nMfSQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
        @import url('./static/style.css');
    </style>
</head>
<body>
    <?php include_once("./components/header.php"); ?>
    <main class="m-auto my-2">    
        <?php               
            if(isset($_GET['page'])) { 
                $c_p = $_GET['page'];
            }
            else{ 
                $c_p = 1; 
            }
            $p_p_p = 3;
            $start = ($c_p - 1) * $p_p_p;
            $post_query = "SELECT * FROM `post` LIMIT $start, $p_p_p";
            $result = mysqli_query($conn,$post_query);
            if (mysqli_num_rows($result) > 0){
            while ($post_data = mysqli_fetch_assoc($result)){
        ?>
        <div class="row border border-3 border-secondary m-auto">
            <div class="my-2 col-3">
                <a href="singlePage.php" class="text-dark text-decoration-none">
                    <img src="<?php echo $post_data['banner']; ?>" alt="banner" height="150px">
                </a>
            </div>            
            <div class="col-5">
                <div class="fs-3 my-2"><b>Job Title : </b> <?php echo $post_data['title']; ?></div>
                <div class="fs-5 my-2"><b>Job Description : </b> <?php $dt = substr($post_data['description'],0,60); echo $dt; ?></div>
                <div class="fs-5 my-2"><b>Job Location : </b><?php echo $post_data['location']; ?></div>
            </div>
            <div class="col-3">
                <a href="apply_now.php?title=<?php echo $post_data['title']; ?>" class="btn btn-success my-2 mx-2">Apply Now</a>
                <a href="login.php" class="btn btn-warning my-2 mx-2">Enquiry Now</a>
            </div>
        </div>
        <?php } } else {  ?> 
            <div class="border border-info">
                <?php echo "No results found."; ?>
            </div>    
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
    </main>    
    <?php include_once("./components/footer.php"); ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>