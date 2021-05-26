<?php
include_once 'includes/dbh.inc.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Faculty Leave Portal</title>
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
          <li><a href="index.php" class="active"><i class="bx bx-user"></i> <span>Faculty Portal</span></a></li>
          
          <?php
            if($fac_pos_ak == 2){
              echo "<li><a href='hod.php'><i class='bx bx-user'></i> <span>HOD portal</span></a></li> ";
            }
          ?>

          <?php
            if($fac_pos_ak == 1){
              echo "<li><a href='dean.php'><i class='bx bx-user'></i> <span>Dean Portal</span></a></li> ";
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
    
    <section id="contact" class="contact">  
      <div class="container">

        <div class="section-title">
          <h2>Profile</h2>
        </div>

        <div class="row">

          <div class="col-lg-12  d-flex align-items-stretch">
            <div class="info">
                <form>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                          <label for="First Name">First Name</label>
                          <h3> <?php echo "Dr. ".$fac_login['first_name']?> </h3>
                        </div>
                        <div class="form-group col-md-6">
                          <label for="Last Name">Last Name</label>
                          <h3> <?php echo $fac_login['last_name']?> </h3>
                        </div>
                      </div>
                    <div class="form-row">
                      <div class="form-group col-md-6">
                        <label for="inputEmail4">Email</label>
                        <h3> <?php echo $fac_login['email']?> </h3>
                      </div>
                      <div class="form-group col-md-6">
                        <label for="faculty_id">Faculty ID</label>
                        <h3> <?php echo $fac_login['faculty_id']?> </h3>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="inputAddress">Department</label>
                      <h3> <?php echo $fac_login['department']?> </h3>
                    </div>
                    <?php
                      echo "<div class='form-group'>
                        <label for='inputAddress'>Status</label>";
                        if($fac_login['status'] == 1){
                          echo "<h3> Active </h3>";
                        }
                        else{
                          echo "<h3> In-active </h3>";
                        }
                        
                      echo "</div>";
                    ?>
                    
                    <div class="form-row">
                      <div class="form-group col-md-6">
                        <label for="inputState">Position</label>
                        <h3>
                        <?php
                          if($fac_login['position'] == '1'){
                              echo "Dean";
                          }
                          elseif($fac_login['position'] == '2'){
                            echo "Head of Deapartment";
                          }
                          elseif($fac_login['position'] == '3'){
                            echo "Faculty";
                          }
                          else{
                            echo "Director";
                          }
                        ?>
                        </h3>
                      </div>
                      <div class="form-group col-md-2">
                        <label for="inputState">Gender</label>
                        <h3> <?php echo $fac_login['gender']?> </h3>
                      </div>
                    </div>

                  </form>

            </div>

          </div>

        

        </div>

      </div>
    </section><!-- End Contact Section -->
  </main><!-- End #main -->



  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a> 



</body>

</html>




