<?php
include_once 'includes/dbh.inc.php';

$sql123 = "delete from current_users;";
$sql1234 = "call checkyearend();";
$result = mysqli_query($conn, $sql123);
$result2 = mysqli_query($conn, $sql1234);

$sqlak = "call autodelete();";
$result2ak = mysqli_query($conn, $sqlak);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Login Page</title>

<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<script
  src="https://code.jquery.com/jquery-3.5.1.min.js"
  integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
  crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>

<link href="assets/css/login.css" rel="stylesheet">

</head>
<body>
    <div class="container login-container" style="padding-top: 0%;">
        <div class="row">
            <div class="col-md-4 login-form-1">
                <h3>Sign In</h3>
                <form method="POST">
                    <input type="text"  name="login_id" id="login" class=" second" name="login" placeholder="login">
                    <input type="password" name="pass_id"  class=" third" name="pass" placeholder="password">
                    <!-- <input type="submit" class=" fourth submit" value="Log In"> -->
                    <button class="btn">submit</button>
                  </form> 
            </div>
            <div class="col-md-4 login-form-2">
                <h3>Register</h3>
                
                <form method="POST">
                    <div class="form-group">
                        <input type="text" name="first_name" class="form-control" placeholder="First Name">
                    </div>
                    <div class="form-group">
                        <input type="text" name="last_name" class="form-control" placeholder="Last Name">
                    </div>
                    <div class="form-group">
                        <input type="text" name="faculty_id" class="form-control" placeholder="Faculty Id">
                    </div>
                    <div class="form-group">
                        <input type="text" name="email" class="form-control" placeholder="Email">
                    </div>
                    <div class="form-group">
                        <input type="password" name="password" class="form-control" placeholder="Password">
                    </div>
                    <div class="form-group">
                        <input type="text" name="department" class="form-control" placeholder="Department">
                    </div>
                    <div class="form-group">
                        <input type="text" name="dob" class="form-control" placeholder="YYYY-MM-DD">
                    </div>
                    <div class="form-group">
                        <input type="text" name="gender" class="form-control" placeholder="Male / Female">
                    </div>
                    <button class="btn">submit</button>
                </form>
            </div>
            <div class="col-md-4 login-form-1">
                <h3>Search Faculty</h3>
                <form method="POST">
                    <div class="form-group">
                        <input type="text" name="search_fac" class="form-control" placeholder="Faculty Id">
                    </div>
                    <button class="btn">submit</button>
                </form>
            </div>

                <?php
                if ($_SERVER['REQUEST_METHOD'] === 'POST') {

                    $first_name = $_POST['first_name'] ?? "";
                    $last_name = $_POST['last_name'] ?? "";
                    $faculty_id = $_POST['faculty_id'] ?? "";
                    $email = $_POST['email'] ?? "";
                    $password = $_POST['password'] ?? "";
                    $department = $_POST['department'] ?? "";
                    $dob = $_POST['dob'] ?? "";
                    $gender = $_POST['gender'] ?? "";
                    $login_id = $_POST['login_id'] ?? "";
                    $pass_id = $_POST['pass_id'] ?? "";
                    $search_fac = $_POST['search_fac'] ?? "";

                    if($first_name != ""){

                        $sql = "insert into faculty(faculty_id, first_name, last_name, email, department, DOB, gender, position, pending_leaves, status) 
                                values ('$faculty_id', '$first_name', '$last_name', '$email', '$department', '$dob', '$gender', 3, 10, 1);";

                        $sql1 = "insert into users(username, password) values ('$faculty_id', '$password');";

                        mysqli_query($conn, $sql);
                        mysqli_query($conn, $sql1);

                        echo "<script>
                            swal.fire({
                                position: 'top-end',
                                type: 'error',
                                title: 'Registration successful',
                                showConfirmButton: false,
                                timer: 1500
                            })
                        </script>";
                    }
                    
                    if($login_id != ""){

                        $sql2 = "select users.password from users where users.username = '$login_id';";
                        $sql3 = "insert into current_users(faculty_id) values ('$login_id');";
                        $result = mysqli_query($conn, $sql2);
                        $resultCheck = mysqli_num_rows($result);

                        if($resultCheck > 0){
                            while($row = mysqli_fetch_assoc($result)){
                                if($row['password'] == $pass_id){
                                    mysqli_query($conn, $sql3);
                                    header("location: http://localhost/phplessons/index.php");
                                }
                            }
                            echo "<script>
                            swal.fire({
                                position: 'top-end',
                                type: 'error',
                                title: 'Please enter valid login id and password',
                                showConfirmButton: false,
                                timer: 1500
                            })
                        </script>";
                        }
                        else{
                            echo "<script>
                            swal.fire({
                                position: 'top-end',
                                type: 'error',
                                title: 'Please enter valid login id and password',
                                showConfirmButton: false,
                                timer: 1500
                            })
                        </script>";
                        } 
                    }

                    if($search_fac != ""){
                        $sql35 = "insert into current_users(faculty_id) values ('$search_fac');";
                        $result = mysqli_query($conn, $sql35);
                        header("location: http://localhost/phplessons/facultyProfile.php");
                    }

                }
                ?>

        </div>
    </div>

<script src="assets/js/login.js"></script>

</body>
</html>
