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
          <h2>Leave Application Portal</h2>
        </div>

        <div class="row">


          <div class="col-lg-7 d-flex align-items-stretch">
            <form method="post" role="form" class="php-email-form">
              <div class="row">
                <div class="form-group col-md-6">
                  <label for="name">Number of Leaves</label>
                  <input type="text" name="number_of_leaves" class="form-control" id="name" required placeholder="Number of Days">
                </div>
                <div class="form-group col-md-6">
                  <label for="name">Start date of leave</label>
                  <input type="text" class="form-control" name="start_date" id="Leave Type"8 placeholder="YYYY-MM-DD">
                </div>
              </div>
              
              <div class="form-group">
                <label for="name">Reason for leave  </label>
                <textarea class="form-control" name="comment" rows="10" required placeholder="Comment"></textarea>
              </div>
              <div class="my-3">
                <div class="loading">Loading</div>
                <div class="error-message"></div>
                <div class="sent-message">Your message has been sent. Thank you!</div>
              </div>
              <div class="text-center"><button name = "butt_ak" type="submit">SUBMIT</button></div>
            </form>
          </div>

          <?php

                if (isset($_POST['butt_ak'])) {

                    $number_of_leaves = $_POST['number_of_leaves'];
                    $start_date = $_POST['start_date'] ?? "";
                    $comment = $_POST['comment'] ?? "";
                    $sql1 = "select faculty_id from current_users;";
                    $result = mysqli_query($conn, $sql1);
                    $row = mysqli_fetch_assoc($result);
                    $fac_id = $row['faculty_id'];

                    $sql_ak = "select * from faculty where faculty.faculty_id = '$fac_id';";
                    $result_ak = mysqli_query($conn, $sql_ak);
                    $row_ak = mysqli_fetch_assoc($result_ak);
                    $pending_leaves_curr = $row_ak['pending_leaves'];
                    $status_curr_faculty = $row_ak['status'];

                    $sql_ak2 = "select count(*) from leaves_in_process where faculty_id = '$fac_id' and (status=0 or status=1);";
                    $result_ak2 = mysqli_query($conn, $sql_ak2);
                    $row_ak2 = mysqli_fetch_assoc($result_ak2);
                    $curr_status = $row_ak2['count(*)'];
                    
                    $check_this_shit3 = 0;
                    if($number_of_leaves != ""){
                      if($status_curr_faculty != 1){
                        echo "<script>
                            swal.fire({
                                position: 'top-end',
                                type: 'error',
                                title: 'Sorry, you are no longer a member of university',
                                showConfirmButton: false,
                                timer: 1500
                            })
                        </script>";
                      }
                      else if($curr_status > 0){

                        echo "<script>
                            swal.fire({
                                position: 'top-end',
                                type: 'error',
                                title: 'Leave already in process',
                                showConfirmButton: false,
                                timer: 1500
                            })
                        </script>";
                          
                      }
                    else{
                      if($number_of_leaves > $pending_leaves_curr){
                        $check_this_shit3 = 1;
                        $number_of_leaves = $pending_leaves_curr;
                      }
                      $sql = "call submitbutton ('$fac_id', '$start_date', $number_of_leaves, '$comment');";
                      mysqli_query($conn, $sql);
                      header("location: http://localhost/phplessons/index.php");
                    }
                  }

                   
                  
                }
                if($fac_login['pending_leaves'] == 0){
                  echo "<script>
                          swal.fire({
                              position: 'top-end',
                              type: 'error',
                              title: 'You cannot submit more leaves',
                              showConfirmButton: false,
                              timer: 1500
                          })
                      </script>";
                }
                ?>

          <div class="col-lg-5  d-flex align-items-stretch">
            <div class="info">
              <h1>
                Number of Leaves Left
              </h1>
              
              <h1 style="padding: 44px 100px 100px 126px; font-size: 150px;">
                <?php echo $fac_login['pending_leaves'] ?>  
              </h1>

            </div>

          </div>

        

        </div>

      </div>
    </section><!-- End Contact Section -->
    <section id="contact" class="contact">  
      <div class="container">
        <div class="section-title">
          <h2>Previous Leave Application Status</h2>
        </div>

        <div class="row"  >

        <?php

            $sql_ak3 = "select * from leave_data where faculty_id = '$fac_id';";
            $result_ak3 = mysqli_query($conn, $sql_ak3);
            $resultCheck_ak3 = mysqli_num_rows($result_ak3);

            if($resultCheck_ak3 > 0){

              echo "<table border='2' style='width:1100px'>
              <tr>
              <th>Leave ID</th>
              <th>Applied on</th>
              <th>Leave Starting date</th>
              <th>Number of Leaves</th>
              <th>Verdict Date</th>
              <th>Verdict</th>
              </tr>";

              while($row_ak3 = mysqli_fetch_assoc($result_ak3))
              {
                echo "<tr>";
                echo "<td>" . $row_ak3['leave_id'] . "</td>";
                echo "<td>" . $row_ak3['applied_on'] . "</td>";
                echo "<td>" . $row_ak3['leave_start_date'] . "</td>";
                echo "<td>" . $row_ak3['number_of_leaves'] . "</td>";
                echo "<td>" . $row_ak3['verdict_date'] . "</td>";
                if($row_ak3['status'] == 2){
                  echo "<td>" . "Accepted" . "</td>";
                }
                else if($row_ak3['status'] == 9){
                  echo "<td>" . "Auto-rejected" . "</td>";
                }
                else{
                  echo "<td>" . "Rejected" . "</td>";
                }
                echo "</tr>";
              }
              echo "</table>";
            }
            else{
              echo "No past leaves available";
            }
        ?>

          

        </div>

      </div>
    </section><!-- End Contact Section -->


    <section id="contact" class="contact">  
      <div class="container">
        <div class="section-title">
          <h2>Current Leaves Application Status</h2>
        </div>

        <div class="row"  >

        <?php
            $check_this_shit2 = 0;
            $leave_id_curr = -1;
            $directed_to_curr = -1;
            $sql_ak4 = "select * from leaves_in_process where faculty_id = '$fac_id' and (status=0 or status=1);";
            $result_ak4 = mysqli_query($conn, $sql_ak4);
            $resultCheck_ak4 = mysqli_num_rows($result_ak4);

            if($resultCheck_ak4 > 0){
              $check_this_shit2 = 1;
              echo " <div class='col-lg-12 d-flex align-items-stretch'>
              <div class='info'>
              <table class = 'table'>
              <tr>
              <th>Leave ID</th>
              <th>Applied on</th>
              <th>Leave Starting date</th>
              <th>Number of Leaves</th>
              <th>Currently Under</th>
              <th>Status</th>
              </tr>";

              while($row_ak4 = mysqli_fetch_assoc($result_ak4))
              {
                echo "<tr>";
                echo "<td>" . $row_ak4['leave_id'] . "</td>";
                $leave_id_curr = $row_ak4['leave_id'] ;
                echo "<td>" . $row_ak4['applied_on'] . "</td>";
                echo "<td>" . $row_ak4['leave_start_date'] . "</td>";
                echo "<td>" . $row_ak4['number_of_leaves'] . "</td>";
                if($row_ak4['directed_to'] == 3){
                  echo "<td>" . "Waiting for your reply" . "</td>";
                }
                else if($row_ak4['directed_to'] == 2){
                  echo "<td>" . "HoD Department" . "</td>";
                }
                else if($row_ak4['directed_to'] == 1){
                  echo "<td>" . "Dean" . "</td>";
                }
                else if($row_ak4['directed_to'] == 0){
                  echo "<td>" . "Director" . "</td>";
                }
                $directed_to_curr = $row_ak4['directed_to'];
                echo "<td>" . "Pending" . "</td>";
                echo "</tr>";
              }
              echo "</table>";
            }
            else{
              echo "No current leaves available";
            }
        ?>

        <br>
        <br>

        <?php
          if($check_this_shit2 > 0){
            echo "
              <form method='post' role='form' class='php-email-form'>
                <div class='row'>
                  <div class='form-group col-md-6'>
                    <label for='name'>Add a new comment to your application</label>
                    <input type='text' name='new_comment' class='form-control' id='name' required placeholder='Comment'>
                  </div>
                </div>
                
                <div class='text-center'><button type='submit'>SUBMIT</button></div>
              </form>
              ";
            

              $new_comment = $_POST['new_comment'] ?? "";
              //goyal se procedure lena h
              $sql12345 = "call addcomment($leave_id_curr, '$new_comment')";
              if($new_comment != "" && $leave_id_curr != -1 && $new_comment != " "){
                $result12345 = mysqli_query($conn, $sql12345);
              }
          }
            ?>
            </div>
      </div>
      </div>
    </section><!-- End Contact Section -->

    <section id="contact" class="contact">  
      <div class="container">
        <div class="section-title">
          <h2>Comments on your Application</h2>
        </div>

        <div class="row"  >
            <div class="info">
        <?php

            $sql_ak5 = "select * from leave_comment where leave_id = '$leave_id_curr';";
            $result_ak5 = mysqli_query($conn, $sql_ak5);
            $resultCheck_ak5 = mysqli_num_rows($result_ak5);

            if($resultCheck_ak5 > 0){

              echo "<div class='col-lg-12 d-flex align-items-stretch'>
              <div class = 'info'>
              <table class='table'>
              <tr>
              <th>Comment</th>
              <th>Comment by</th>
              <th>Date of Comment</th>
              </tr>";

              while($row_ak5 = mysqli_fetch_assoc($result_ak5))
              {
                if( $row_ak5['comment']==""){
                  continue;
                }
                echo "<tr>";
                echo "<td>" . $row_ak5['comment'] . "</td>";

                if($row_ak5['comment_by'] == 3){
                  echo "<td>" . "You" . "</td>";
                }
                else if($row_ak5['comment_by'] == 2){
                  echo "<td>" . "HoD Department" . "</td>";
                }
                else if($row_ak5['comment_by'] == 1){
                  echo "<td>" . "Dean" . "</td>";
                }
                else if($row_ak5['comment_by'] == 0){
                  echo "<td>" . "Director" . "</td>";
                }

                echo "<td>" . $row_ak5['date_of_comment'] . "</td>";
                
                echo "</tr>";
              }
              echo "</table>";
            }
            else{
              echo "No past comments available";
            }
            ?>

            <?php
            if($directed_to_curr == $fac_pos_ak){

              echo "<form method='post' role='form' class='php-email-form'>
              <div class='row'>
                <div class='form-group col-md-6'>
                  <label for='name'>Your application has been reverted back. Please insert your comment</label>
                  <input type='text' name='new_comment_revert' class='form-control' id='name' required placeholder='Comment'>
                </div>
              </div>
              
              <div class='text-center'><button type='submit'>SUBMIT</button></div>
            </form> ";
              
            
              if(isset($_POST['new_comment_revert'])){
                $new_comment_revert = $_POST['new_comment_revert'];
                $sql_final = "call nextbutton ($leave_id_curr, '$new_comment_revert', 1);";
                $bogus = mysqli_query($conn, $sql_final);
              }
            }
        ?>
 
      </div>
        </div>
        </div>
      </div>
    </section><!-- End Contact Section -->

  </main><!-- End #main -->



  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a> 



  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

  

</body>

</html>




