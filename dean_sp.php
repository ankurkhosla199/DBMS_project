<?php
include_once 'includes/dbh.inc.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Dean Portal</title>
  <meta content="" name="description">
  <meta content="" name="keywords"> 

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <link href="assets/css/style.css" rel="stylesheet">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>

<body>

  <!-- ======= Mobile nav toggle button ======= -->
  <i class="bi bi-list mobile-nav-toggle d-xl-none"></i>

  <!-- ======= Header ======= -->
  <header id="header">

    <?php
        $sql = "select faculty_id from current_users;";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
        $fac_id = $row['faculty_id'];
        $sql2 = "select * from faculty where faculty.faculty_id = '$fac_id';";
        $result2 = mysqli_query($conn, $sql2);
        $fac_login = mysqli_fetch_assoc($result2);
        $fac_pos_ak = $fac_login['position'];
        $hod_dept = $fac_login['department']; 
        
        $sql_akk = "select * from faculty_sp;";
        $result_akk = mysqli_query($conn, $sql_akk);
        $fac_login_akk = mysqli_fetch_assoc($result_akk);
        $ankur1999 = $fac_login_akk['faculty_id'];
    ?>

    <div class="d-flex flex-column">

      <div class="profile">
        <img src="assets/img/profile_img.jpg" alt="" class="img-fluid rounded-circle">
        <h1 class="text-light"><a href="profile.php"><?php echo $fac_login['first_name']." ".$fac_login['last_name'] ?></a></h1>
        
      </div>

      <nav id="navbar" class="nav-menu navbar">
        <ul>
          <li><a href="index.php" class=""><i class="bx bx-user"></i> <span>Faculty Portal</span></a></li>
          
          <?php
            if($fac_pos_ak == 2){
              echo "<li ><a href='hod.php'><i class='bx bx-user'></i> <span class='active'>HOD portal</span></a></li> ";
            }
          ?>

          <?php
            if($fac_pos_ak == 1){
              echo "<li ><a href='dean.php' class='active'><i class='bx bx-user'></i> <span>Dean Portal</span></a></li> ";
            }
          ?>
         
         <?php
            if($fac_pos_ak == 0){
              echo "<li><a href='director.php'><i class='bx bx-user'></i> <span>Director Portal</span></a></li> ";
            }
          ?>

          <li><a href="projects.php" class=""><i class="bx bx-user"></i> <span>Projects Portal</span></a></li>

          <?php
            if($fac_id == $ankur1999){
              echo "<li><a href='dean_sp.php'><i class='bx bx-user'></i> <span>Approve Projects</span></a></li> ";
            }
        ?>
	  <li><a href="editProfile.php" class=""><i class="bx bx-user"></i> <span>Edit Profile</span></a></li>
          <li><a href="login.php" class=""><i class="bx bx-user"></i> <span>Sign Out</span></a></li>
        </ul>
      </nav><!-- .nav-menu -->
    </div>
  </header><!-- End Header -->



  <main id="main">


    <!-- ======= Contact Section ======= -->
    
    <br>

    <section id="contact" class="contact">  
      <div class="container">

        <div class="section-title">
          <h2>Approve Project (as Dean)</h2>
        </div>

        <?php
          $check_this_shit5 = 0;
          //$fac_id_login use krni h and match with main pi
          $sql1234 = "select * from project;";
          $result1234 = mysqli_query($conn, $sql1234);
          while($row1234 = mysqli_fetch_assoc($result1234)){
              $var = $row1234['project_id'];
              if($var == 0){
                continue;
              }
              $sql4321 = "select * from project_data where project_id=$var;";
              $result4321 = mysqli_query($conn, $sql4321);
              $row4321 = mysqli_fetch_assoc($result4321);
              if($row4321['directed_to'] == 0 && $row4321['status'] == 0){
                $check_this_shit5 = 1;
                echo "
                <div class='row'>
                <div class='col-lg-12 d-flex align-items-stretch'>
                  <div class = 'info'>
                <form>
                    <div class='row'>
                      <div class='form-group col-md-6'>
                        <label for='name'> <h3>Project Title</h3></label>
                          <h5>";
                          echo $row1234['project_name'];
                          echo "  </h5>
                      </div>  
                      <div class='form-group col-md-6'>
                        <label for='name'> <h3>Project ID</h3></label>
                          <h5>";
                          echo $row1234['project_id'];
                          echo "  </h5>
                      </div>  
                    </div>
                    <div class='row'>
                      <div class='form-group col-md-4'>
                        <label for='name'><h3>Main PI</h3></label>
                        <h5>";
                        echo $row1234['main_pi'];
                        echo "</h5>
      
                      </div>  
                      <div class='form-group col-md-4'>
                        <label for='name'><h3>Co PI 1 </h3></label>
                        <h5>";
                        echo $row1234['co1'];
                        echo "</h5>
                      </div>  
                      <div class='form-group col-md-4'>
                        <label for='name'><h3>Co PI 2 </h3></label>
                        <h5>";
                        echo $row1234['co2'];
                        echo "</h5>
                      </div> 
                   </div>
                   <div class='row'>
                   <div class='form-group col-md-4'>
                        <label for='name'><h3>Co PI 3 </h3></label>
                        <h5>";
                        echo $row1234['co3'];
                        echo "</h5>
                      </div> 
                      <div class='form-group col-md-4'>
                        <label for='name'><h3>Co PI 4 </h3></label>
                        <h5>";
                        echo $row1234['co4'];
                        echo "</h5>
                      </div> 
                      <div class='form-group col-md-4'>
                        <label for='name'><h3>Co PI 5 </h3></label>
                        <h5>";
                        echo $row1234['co5'];
                        echo "</h5>
                      </div> 
                   </div>
                   <div class='row'>
                      <div class='form-group col-md-6'>
                        <label for='name'><h3>Total Budget</h3></label>
                          <h5>";
                          $sql_abc = "select * from budget where project_id=$var;";
                          $result_abc = mysqli_query($conn, $sql_abc);
                          $row_abc = mysqli_fetch_assoc($result_abc);
                          $total_budget = $row_abc['manpower'] + $row_abc['equipment'] + $row_abc['travel'];
                          echo $total_budget;
                          echo "</h5>
                      </div>  
                    </div>
                  </form>
                </div>
                </div>
              </div>
                ";
              }
            
            
          }
        ?>

        <?php
          if($check_this_shit5 == 1){
            echo "
              <form method='post' role='form' class='php-email-form'>
                <div class='row'>
                  <div class='form-group col-md-6'>
                    <input type='number' name='proj_id1' class='form-control' id='name' placeholder='Project ID'>
                  </div>
                </div>
                
                <div class='text-center'>
                <button type='submit' name='accept'>Accept</button>
                <button type='submit' name='reject'>Reject</button>
                </div>
              </form>
              ";
              if(isset($_POST['accept'])){
                $proj_id1 = $_POST['proj_id1'];
                $sql_under = "call approve_dean($proj_id1, 1);";
                $result_under = mysqli_query($conn, $sql_under);
              }
              else if(isset($_POST['reject'])){
                $proj_id1 = $_POST['proj_id1'];
                $sql_under = "call approve_dean($proj_id1, 2);";
                $result_under = mysqli_query($conn, $sql_under);
              }
          }
          else{
            echo "No projects pending for approval";
          }
        ?>

        
      </div>
    </div>

  </main><!-- End #main -->




  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a> 



  <!-- Template Main JS File -->
  <script src="assets/js/hod.js"></script>
 <script> 
 function show_prompt() { 
  var my_string = prompt("Please enter your name","enter your first name only");
 </script>
</body>

</html>




