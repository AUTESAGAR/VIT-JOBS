<?php 
    session_start();
    $conn = mysqli_connect("localhost","root","","vit_jobs") or die("Not Connect");
    if(!isset($_SESSION['admin_uname'])){
        header("Location:index.php");
    }
    $query = "SELECT * FROM `enquiry`";
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
                    Users Enquiries
                </th>                
            </tr>           
            <tr class="border border-info">                
                <th>Name</th>
                <th>Email</th>
                <th>Mobile</th>
                <th>Subject</th>
                <th>Message</th>
                <th colspan="2">Reply</th>
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
              $query = "SELECT * FROM `enquiry` LIMIT $start, $p_p_p";
              $result = mysqli_query($conn,$query);
              if (mysqli_num_rows($result) > 0){
              while ($data = mysqli_fetch_assoc($result)){
            ?>
            <tr class="border border-info">
                <td><?php echo $data['name']; ?></td>
                <td><?php echo $data['email']; ?></td>
                <td><?php echo $data['mobile']; ?></td>
                <td><?php echo $data['subject']; ?></td>
                <td><?php echo $data['message']; ?></td>                
                <td>
                <a class="text-danger fs-3" data-bs-toggle="modal" data-bs-target="#exampleModal" class="nav-link active text-light fs-4 fw-bold" aria-current="page">
                    <i class="fa-solid fa-envelope"></i>
                </a>
                <!-- Enquiry Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">             
                    <div class="modal-body">
                    <form action="query.php" method="post">
                        <h1 class="text-center fs-1 fw-bold bg-info">
                            Reply
                        </h1>
                        <input type="text" value="<?php echo $data['email']; ?>" name="email" class="form-control border border-dark my-2" placeholder="Enter Your Subject">
                        <input type="text" value="<?php echo $data['subject']; ?>" name="subject" class="form-control border border-dark my-2" placeholder="Enter Your Subject">
                        <div class="form-floating">
                        <textarea class="form-control" name="message" placeholder="Leave a message here" id="floatingTextarea"></textarea>
                        <label for="floatingTextarea">Write Message Here..</label>
                        </div>
                        <div class="text-center my-2">
                            <input type="submit" class="btn btn-warning" value="Send" name="reply">
                        </div>
                    </form>
                    </div>              
                    </div>
                </div>
                </div>  
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