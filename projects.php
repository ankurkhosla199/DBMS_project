<?php
include_once 'includes/dbh.inc.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Projects Portal</title>
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
  <script
  src="https://code.jquery.com/jquery-3.5.1.min.js"
  integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
  crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
</head>
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
          <li><a href="index.php" class=""><i class="bx bx-user"></i> <span>Faculty Portal</span></a></li>

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

          
          <li><a href="projects.php" class="active"><i class="bx bx-user"></i> <span>Projects Portal</span></a></li>
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
          <h2>Create New Project</h2>
        </div>

        <div class="row">


          <div class="col-lg-12 d-flex align-items-stretch">
            <form method="post" role="form" class="php-email-form">
              <div class="row">
                <div class="form-group col-md-12">
                  <label for="name">Project Title</label>
                  <input type="text" name="project_title" class="form-control" id="name" required placeholder="Title">
                </div>  
              </div>
              <div class="row">
                <div class="form-group col-md-2">
                  <label for="name">Main PI</label>
                  <input type="text" name="main_PI" class="form-control" id="name" required placeholder="Faculty ID">
                </div>  
                <div class="form-group col-md-2">
                  <label for="name">Co-PI </label>
                  <input type="text" name="co-pi1" class="form-control" id="name" placeholder="Faculty ID">
                </div>  
                <div class="form-group col-md-2">
                  <label for="name">Co-PI </label>
                  <input type="text" name="co-pi2" class="form-control" id="name" placeholder="Faculty ID">
                </div> 
                <div class="form-group col-md-2">
                  <label for="name">Co-PI </label>
                  <input type="text" name="co-pi3" class="form-control" id="name" placeholder="Faculty ID">
                </div>  
                <div class="form-group col-md-2">
                  <label for="name">Co-PI </label>
                  <input type="text" name="co-pi4" class="form-control" id="name" placeholder="Faculty ID">
                </div>  
                <div class="form-group col-md-2">
                  <label for="name">Co-PI </label>
                  <input type="text" name="co-pi5" class="form-control" id="name" placeholder="Faculty ID">
                </div>  
                
             </div>
              <span>Note: Please leave column blank if no co-pi is available </span>
              <br>
              <br>
              <div class="form-group">
                <label for="name">Project description</label>
                <textarea class="form-control" name="description" rows="5" required placeholder="Despription"></textarea>
              </div>
              <div class="my-3">
                <div class="loading">Loading</div>
                <div class="error-message"></div>
                <div class="sent-message">Your message has been sent. Thank you!</div>
              </div>
              <div class="text-center"><button name = "butt_ak" type="submit">SUBMIT</button></div>
            </form>
          </div>

           </div>

           <?php
           if(isset($_POST['butt_ak'])){
              $project_name = $_POST['project_title'];
              $project_description = $_POST['description'];
              $main_pi = $_POST['main_PI'];
              $co_pi1 = $_POST['co-pi1'] ?? "";
              $co_pi2 = $_POST['co-pi2'] ?? "";
              $co_pi3 = $_POST['co-pi3'] ?? "";
              $co_pi4 = $_POST['co-pi4'] ?? "";
              $co_pi5 = $_POST['co-pi5'] ?? "";
              $sql_query = "call createproject('$project_name','$project_description','$main_pi','$co_pi1','$co_pi2','$co_pi3','$co_pi4','$co_pi5');";
              $result_query = mysqli_query($conn, $sql_query);
              
              //header("location: http://localhost/phplessons/projects.php");
              echo "<script>
                            swal.fire({
                                position: 'top-end',
                                type: 'error',
                                title: 'Project registration successful',
                                showConfirmButton: false,
                                timer: 1500
                            })
                        </script>";
           }
           ?>

      </div>
    </section><!-- End Contact Section -->

    <section id="contact" class="contact">  
      <div class="container">
        <div class="section-title">
          <h2>Applied Projects</h2>
        </div>

        <?php

          $check_this_shit3 = 0;
          $sqlq = "select faculty_id from current_users;";
          $resultq = mysqli_query($conn, $sqlq);
          $ankur = mysqli_fetch_assoc($resultq);
          $fac_id_login = $ankur['faculty_id'];

          $sqlq2 = "select * from project where (main_pi = '$fac_id_login' or co1='$fac_id_login' or co2='$fac_id_login' or co3='$fac_id_login' or co4='$fac_id_login' or co5='$fac_id_login');";
          $resultq2 = mysqli_query($conn, $sqlq2);
          $resultCheckq2 = mysqli_num_rows($resultq2);
          if($resultCheckq2 > 0){

            echo "<div class='row'  >

            <div class='col-lg-12 d-flex align-items-stretch'>
            <div class='info'>
            <table class = 'table'>
            <tr>
            <th>Project ID</th>
            <th>Project Title</th>
            <th>Main PI</th>
            <th>Status</th>
            </tr>";

            //code_it
            while($row_ak1 = mysqli_fetch_assoc($resultq2)){
              $random_var = $row_ak1['project_id'];
              $sql_ak99 = "select * from project_data where project_id=$random_var;";
              $result_ak99 = mysqli_query($conn, $sql_ak99);
              $resultCheck_ak99 = mysqli_num_rows($result_ak99);
              
              if($resultCheck_ak99 > 0){
                $row_ak99 = mysqli_fetch_assoc($result_ak99);
                echo "<tr>
                <td>";
                echo $row_ak1['project_id'];
                echo "</td>
                <td>";
                echo $row_ak1['project_name'];
                echo "</td>
                <td>";
                echo $row_ak1['main_pi'];
                echo "</td>";
                if($row_ak99['status'] == 0){
                  echo "<td>Pending / In Process</td>";
                }
                else if($row_ak99['status'] == 1){
                  echo "<td>Approved</td>";
                }
                else if($row_ak99['status'] == 2){
                  echo "<td>Rejected</td>";
                }
                
                echo "</tr>";
              }
              else {
                $check_this_shit3 = 1;
                echo "<tr>
                <td>";
                echo $row_ak1['project_id'];
                echo "</td>
                <td>";
                echo $row_ak1['project_name'];
                echo "</td>
                <td>";
                echo $row_ak1['main_pi'];
                echo "</td>
                <td>Details Pending</td>
                </tr>";
              }
              
            }
            echo "</table>
                  </div>";

          }
          else{
            echo "No current projects under you";
          }
        ?>

              
          
      </div>
    </section><!-- End Contact Section -->

    <section id="contact" class="contact">  
      <div class="container">

        <div class="section-title">
          <h2>Project Details</h2>
        </div>

        <?php
          if($check_this_shit3 == 0){
            echo "No project details are pending.";
          }
          else{
            echo "
              <div class='row'>


              <div class='col-lg-12 d-flex align-items-stretch'>
                <form method='post' role='form' class='php-email-form'>
                  <div class='row'>
                    <div class='form-group col-md-6'>
                      <label for='name'>Project ID</label>
                      <input type='text' name='project_id' class='form-control' id='name' required placeholder='ID'>
                    </div>  
                  </div>
                  <div class='row'>
                    <div class='form-group col-md-4'>
                      <label for='name'>Manpower Budget</label>
                      <input type='number' name='manpower' class='form-control' id='name' required placeholder='in rupees'>
                    </div>  
                    <div class='form-group col-md-4'>
                      <label for='name'>Equipment Budget </label>
                      <input type='number' name='equipment' class='form-control' id='name' required placeholder='in rupees'>
                    </div>  
                    <div class='form-group col-md-4'>
                      <label for='name'>Travel Budget </label>
                      <input type='number' name='travel' class='form-control' id='name' required placeholder='in rupees'>
                    </div> 
                </div>
                <div class='row'>
                    <div class='form-group col-md-4'>
                      <label for='name'>Time required</label>
                      <input type='number' name='time' class='form-control' id='name' required placeholder='in months'>
                    </div>  
                    <div class='form-group col-md-4'>
                      <label for='name'>Number of SRF required </label>
                      <input type='number' name='srf' class='form-control' id='name'>
                    </div>  
                    <div class='form-group col-md-4'>
                      <label for='name'>Number of JRF required </label>
                      <input type='number' name='jrf' class='form-control' id='name'>
                    </div> 
                </div>
                  
                  <div class='my-3'>
                    <div class='loading'>Loading</div>
                    <div class='error-message'></div>
                    <div class='sent-message'>Your message has been sent. Thank you!</div>
                  </div>
                  <div class='text-center'><button name = 'butt_ak1' type='submit'>SUBMIT</button></div>
                </form>
              </div>
    
            </div>
            ";

            if(isset($_POST['butt_ak1'])){
              $proj_id = $_POST['project_id'];
              $manpower = $_POST['manpower'];
              $equipment = $_POST['equipment'];
              $travel = $_POST['travel'];
              $months = $_POST['time'];
              $srf = $_POST['srf'] ?? 0;
              $jrf = $_POST['jrf'] ?? 0;

              if((31000*$jrf*$months) + (40000*$srf*$months) > $manpower){
                echo "<script>
                            swal.fire({
                                position: 'top-end',
                                type: 'error',
                                title: 'Cost of SRF and JRF exceeds manpower budget',
                                showConfirmButton: false,
                                timer: 1500
                            })
                        </script>";
              }
              else{
                $sql123 = "call apply('$fac_id_login', $proj_id, $manpower, $equipment, $travel, $months, $srf, $jrf);";
                $result123 = mysqli_query($conn, $sql123);
                
              }
            }
          }
        ?>

      </div>
    </section><!-- End Contact Section -->


     
    <section id="contact" class="contact">  
      <div class="container">

        <div class="section-title">
          <h2>Approve Project (as main PI)</h2>
        </div>

        <?php
          $check_this_shit5 = 0;
          //$fac_id_login use krni h and match with main pi
          $sql1234 = "select * from project;";
          $result1234 = mysqli_query($conn, $sql1234);
          while($row1234 = mysqli_fetch_assoc($result1234)){
            if($row1234['main_pi'] == $fac_id_login && $row1234['project_id'] != 0){
              $var = $row1234['project_id'];
              $sql4321 = "select * from project_data where project_id=$var;";
              $result4321 = mysqli_query($conn, $sql4321);
              $row4321 = mysqli_fetch_assoc($result4321);
              if($row4321['directed_to'] == 1 && $row4321['status'] == 0){
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
                        <label for='name'><h3>Manpower Budget</h3></label>
                          <h5>";
                          $sql_abc = "select * from budget where project_id=$var;";
                          $result_abc = mysqli_query($conn, $sql_abc);
                          $row_abc = mysqli_fetch_assoc($result_abc);
                          //$total_budget = $row_abc['manpower'] + $row_abc['equipment'] + $row_abc['travel'];
                          echo $row_abc['manpower'];
                          echo "</h5>
                      </div>  
                      <div class='form-group col-md-6'>
                        <label for='name'><h3>Equipment Budget</h3></label>
                          <h5>";
                          //$total_budget = $row_abc['manpower'] + $row_abc['equipment'] + $row_abc['travel'];
                          echo $row_abc['equipment'];
                          echo "</h5>
                      </div>
                      <div class='form-group col-md-6'>
                        <label for='name'><h3>Travel Budget</h3></label>
                          <h5>";
                          //$total_budget = $row_abc['manpower'] + $row_abc['equipment'] + $row_abc['travel'];
                          echo $row_abc['travel'];
                          echo "</h5>
                      </div>
                    </div>

                    <div class='row'>
                    <div class='form-group col-md-6'>
                      <label for='name'><h3>Number of SRF</h3></label>
                        <h5>";
                        echo $row_abc['srf'];
                        echo "</h5>
                    </div>  
                    <div class='form-group col-md-6'>
                      <label for='name'><h3>Number of JRF</h3></label>
                        <h5>";
                        echo $row_abc['jrf'];
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
                <button type='submit' name='accept'>Accept and forward</button>
                <button type='submit' name='reject'>Reject</button>
                </div>
              </form>
              ";
              if(isset($_POST['accept'])){
                $proj_id1 = $_POST['proj_id1'];
                $sql_under = "call approve_pi($proj_id1, 1);";
                $result_under = mysqli_query($conn, $sql_under);
              }
              else if(isset($_POST['reject'])){
                $proj_id1 = $_POST['proj_id1'];
                $sql_under = "call approve_pi($proj_id1, 2);";
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

<br>
<br>

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a> 



  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

  

</body>

</html>




