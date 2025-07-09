
<?php 
session_start();
require "include/database_connect.php";
error_reporting(0);

if (!isset($_SESSION["user_id"])) {
    header("location: home.php");
    die();
}

$user_id = $_SESSION['user_id'];

$sql_1 = "SELECT * FROM users WHERE id = $user_id";

$result_1 = mysqli_query($conn, $sql_1);
if (!$result_1) {
    echo "Something went wrong!";
    return;
}
$user = mysqli_fetch_assoc($result_1);

if (!$user) {
    echo "Something went wrong!";
    return;
}

// update profile while insertin form data into users table

if($_POST['update']){
    $full_name = $_POST['full_name'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $password = sha1($password);
    $college_name = $_POST['college_name'];
    $gender = $_POST['gender'];

    $sql = "UPDATE users SET email='$email', password='$password',
    full_name='$full_name', phone='$phone', gender='$gender', college_name='$college_name' WHERE id='$user_id'";

    $result = mysqli_query($conn, $sql);
    
    if ($result) {
        echo "<script>alert('Profile updated successfully')</script>";
        ?>
        <meta http-equiv="refresh" content="0; url=http://127.0.0.1/project/dashboard.php" />
        <?php
    }else{
        echo "Failed to update profile";
    }
}

mysqli_close($conn);
?>


<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
       
    <title>Edit Profile! | PGLife</title>
  </head>
  <body class="bg-light">
    <div class="">
        <div class="container">
            <h1 class="text-center pt-5 text-warning">Edit Profile!</h1>
            
            <!-- form -->
            <form class="form" role="form" action="#" method="post" id="edit-profile">
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Full name</label>
                    <input type="text" class="form-control" id="fullname" Required name="full_name" value="<?=$user['full_name'];?>">
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Phone Numner</label>
                    <input type="text" class="form-control" id="phone" maxlength="10" minlength="10" require name="phone"value="<?=$user['phone'];?>">
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Email address</label>
                    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" Required name="email" value="<?=$user['email'];?>">
                    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Password</label>
                    <input type="password" class="form-control" id="exampleInputPassword1" minlength="8" Required  name="password" value="<?=$user['password'];?>">
                </div>

                <div class="mb-3">
                    <label for="college" class="form-label">College Name</label>
                    <input type="text" class="form-control" Required name="college_name" value="<?=$user['college_name'];?>">
                </div>

                <div class="form-group">
                    <select name="college_name" class="form-select" aria-label="Default select example">
                        <option value="">Select</option>
                        <option value="dav"
                            <?php 
                                if($user['college_name'] =='dav')
                                echo "selected";
                            ?>
                        >
                        DAV college</option>
                        <option value="learnvern"
                            <?php 
                                if($user['college_name']=='learnvern')
                                echo "selected";
                            ?>
                        >
                        LearnVern foundation</option>
                    </select>
                </div>

                <div class="form-group">
                    <select name="gender" class="form-select" aria-label="Default select example">
                        <option value="">Select</option>
                        <option value="male"
                            <?php 
                                if($user['gender'] =='male')
                                echo "selected";
                            ?>
                        >
                        male</option>
                        <option value="female"
                            <?php 
                                if($user['gender']=='female')
                                echo "selected";
                            ?>
                        >
                        female</option>
                    </select>
                </div><br>
                <button type="submit" class="btn btn-primary" name="update" value="update" >Update</button>
            </form>
        </div>
        </div>
         
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
       <script type="text/javascript" src="js/common.js"></script>
  </body>
</html>