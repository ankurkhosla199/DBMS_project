<?php
include_once 'includes/dbh.inc.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Director Portal</title>
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

  <section id="contact" class="contact" style='padding-bottom: 0px'>  
      <div class="container">

        <div class="section-title">
          <h2>Current Dean and HODs</h2>
        </div>

        <div class="row"  >

          <div class="col-lg-12 d-flex align-items-stretch">
            <div class="info" style="padding-bottom: 2%;">

              <table class="table">
                <thead>
                  <tr>
                    <th scope="col">Position</th>
                    <th scope="col">Current Faculty ID</th>
                    <th scope="col">Name</th>
                    <!-- <th scope="col">Action</th> -->
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>Dean FAA</td>
                    <td> <?php
                    $sqlq = "select faculty_id from faculty where position = 1";
                    $result = mysqli_query($conn, $sqlq);
                    $row = mysqli_fetch_assoc($result);
                    $fac_id = $row['faculty_id'];         
                    echo $fac_id;
                    ?>
                    </td>
                    <td><?php
                    $sqlq = "select first_name, last_name from faculty where position =1";
                    $result = mysqli_query($conn, $sqlq);
                    $row = mysqli_fetch_assoc($result);
                    $fn = $row['first_name']; 
                    $ln = $row['last_name'];        
                    echo "Dr. ".$fn." ".$ln;
                    ?> </td>
                  </tr>
                </tbody>
                <tbody>
                  <tr>
                    <td>Dean SP</td>
                    <td> <?php
                    $sqlq = "select faculty_id from faculty_sp";
                    $result = mysqli_query($conn, $sqlq);
                    $row = mysqli_fetch_assoc($result);
                    $fac_id = $row['faculty_id'];         
                    echo $fac_id;
                    ?>
                    </td>
                    <td><?php
                    $sqlq = "select first_name, last_name from faculty where faculty_id='$fac_id';";
                    $result = mysqli_query($conn, $sqlq);
                    $row = mysqli_fetch_assoc($result);
                    $fn = $row['first_name']; 
                    $ln = $row['last_name'];        
                    echo "Dr. ".$fn." ".$ln;
                    ?> </td>
                  </tr>
                </tbody>
                <tbody>
                  <tr>
                    <td>HOD CSE</td>
                    <td> <?php
                    $sqlq = "select faculty_id from faculty where position = 2 and department ='CSE'";
                    $result = mysqli_query($conn, $sqlq);
                    $row = mysqli_fetch_assoc($result);
                    $fac_id = $row['faculty_id'];         
                    echo $fac_id;
                    ?></td>
                    <td><?php
                    $sqlq = "select first_name, last_name from faculty where position = 2 and department ='CSE'";
                    $result = mysqli_query($conn, $sqlq);
                    $row = mysqli_fetch_assoc($result);
                    $fn = $row['first_name']; 
                    $ln = $row['last_name'];        
                    echo "Dr. ".$fn." ".$ln;
                    ?>  </td>
                  </tr>
                </tbody>
                <tbody>
                  <tr>
                    <td>HOD EE</td>
                    <td><?php
                    $sqlq = "select faculty_id from faculty where position = 2 and department ='EE'";
                    $result = mysqli_query($conn, $sqlq);
                    $row = mysqli_fetch_assoc($result);
                    $fac_id = $row['faculty_id'];         
                    echo $fac_id;
                    ?> </td>
                    <td><?php
                    $sqlq = "select first_name, last_name from faculty where position = 2 and department ='EE'";
                    $result = mysqli_query($conn, $sqlq);
                    $row = mysqli_fetch_assoc($result);
                    $fn = $row['first_name']; 
                    $ln = $row['last_name'];        
                    echo "Dr. ".$fn." ".$ln;
                    ?>  </td>
                  </tr>
                </tbody>
                <tbody>
                  <tr>
                    <td>HOD ME</td>
                    <td> <?php
                    $sqlq = "select faculty_id from faculty where position = 2 and department ='ME'";
                    $result = mysqli_query($conn, $sqlq);
                    $row = mysqli_fetch_assoc($result);
                    $fac_id = $row['faculty_id'];         
                    echo $fac_id;
                    ?></td>
                    <td><?php
                    $sqlq = "select first_name, last_name from faculty where position = 2 and department ='ME'";
                    $result = mysqli_query($conn, $sqlq);
                    $row = mysqli_fetch_assoc($result);
                    $fn = $row['first_name']; 
                    $ln = $row['last_name'];        
                    echo "Dr. ".$fn." ".$ln;
                    ?>  </td>
                  </tr>
                </tbody>
              </table>
            
            </div>
          </div>
        </div>

        </div>
      </section>

      <section id="contact" class="contact" style='padding-bottom: 0px'>  
      <div class="container">

        <div class="section-title">
          <h2>Appoint Dean and HOD</h2>
        </div>

        <div class="row"  >

          <div class="col-lg-12 d-flex align-items-stretch">
            <div class="info" style="padding-bottom: 2%;">
            <form method="POST">
              <div class="row">
                <div class="col">
                <label for="name">Position</label>
                <label class="mr-sm-2 sr-only" for="inlineFormCustomSelect">Preference</label>
                  <select class="custom-select mr-sm-2" name="identifier" id="inlineFormCustomSelect">
                    <option selected>Choose...</option>
                    <option value="1">Dean FAA</option>
                    <option value="2">HOD ME</option>
                    <option value="3">HOD EE</option>
                    <option value="4">HOD CSE</option>
                    <option value="5">Dean SP</option>
                  </select>
                </div>
                
                <div class="col">
                <label for="name">New position holder</label>
                  <input type="text" name="new_fac_id" class="form-control" placeholder="Faculty ID">
                </div> 
              </div>
              <div class="text-center" style='padding-top: 20px'><button name="butt_submit" type="submit">Submit</button></div>
            </form>

            <?php
              if(isset($_POST['butt_submit'])){
                $new_fac_id = $_POST['new_fac_id'];
                $identifier = $_POST['identifier'];
                if($identifier == "1"){
                    $sql_query = "call change_por('$new_fac_id', 1);";
                    $result_query = mysqli_query($conn, $sql_query);
                }
                else if($identifier == "2"){
                  $sql_query = "call change_por('$new_fac_id', 2);";
                  $result_query = mysqli_query($conn, $sql_query);
                }
                else if($identifier == "3"){
                  $sql_query = "call change_por('$new_fac_id', 3);";
                  $result_query = mysqli_query($conn, $sql_query);
                }
                else if($identifier == "4"){
                  $sql_query = "call change_por('$new_fac_id', 4);";
                  $result_query = mysqli_query($conn, $sql_query);
                }
                else if($identifier == "5"){
                  $sql_query = "delete from faculty_sp;";
                  $result_query = mysqli_query($conn, $sql_query);
                  $sql_query123 = "insert into faculty_sp values ('$new_fac_id');";
                  $result_query = mysqli_query($conn, $sql_query123);
                }

                
              }
            ?>

            </div>
          </div>
        </div>

        </div>
      </section>

    <!-- ======= Contact Section ======= -->
    
    <section id="contact" class="contact">  
      <div class="container">

 
    </section><!-- End Contact Section -->
    <section id="contact" class="contact">  
      <div class="container">

        <div class="section-title">
          <h2>Leave Application Requests</h2>
        </div>


          <?php
          $check_this_shit = 0;
            $application_no = 1;
            $sql1 = "select * from leaves_in_process where directed_to = 0;";
            $result1 = mysqli_query($conn, $sql1);
            $resultCheck1 = mysqli_num_rows($result1);

            if($resultCheck1 > 0){
              while($row1 = mysqli_fetch_assoc($result1)){
                $curr_status_ak = $row1['status'];
                if($curr_status_ak != 5 && $curr_status_ak != 2){
                $leave_id_ak = $row1['leave_id'];
                $faculty_id_ak = $row1['faculty_id'];
                $faculty_applied_on = $row1['applied_on'];
                $faculty_leave_start = $row1['leave_start_date'];
                $faculty_num_days = $row1['number_of_leaves'];

                $sql69 = "select * from leave_comment where leave_id = $leave_id_ak;";
                $result69 = mysqli_query($conn, $sql69);
                $resultCheck69 = mysqli_num_rows($result69);

                $sql22 = "select * from faculty where faculty_id = '$faculty_id_ak';";
                $result22 = mysqli_query($conn, $sql22);
                $row22 = mysqli_fetch_assoc($result22);

                $faculty_dept_ak = $row22['department'];
                $faculty_first_name = $row22['first_name'];
                $faculty_last_name = $row22['last_name'];

                
                  echo "Appication Number ".$application_no;
                  $check_this_shit = 1;
                  //UI ka code here

                  echo "
                    <div class='row' >

                    <div class='col-lg-12 d-flex align-items-stretch'>
                      <div class='info' style='padding-bottom: 2%;'>
                        <table class='table'>
                          <thead>
                            <tr>
                              <th scope='col'>Leave ID</th>
                              <th scope='col'>Faculty Name</th>
                              <th scope='col'>Applied on</th>
                              <th scope='col'>Leave Start Date</th>
                              <th scope='col'>Number of Days</th>
                              <!-- <th scope='col'>Action</th> -->
                            </tr>
                          </thead>
                          <tbody>
                            <tr>
                              <th scope='row'> $leave_id_ak </th>
                              <td> Dr $faculty_first_name $faculty_last_name </td>
                              <td>$faculty_applied_on</td>
                              <td>$faculty_leave_start</td>
                              <td>$faculty_num_days</td>
                             
                            </tr>
                          </tbody>
                        </table>";

                        if($resultCheck69 > 0){
                          echo "
                          <table class='table info'>
                            <thead>
                              <tr>
                                <th scope='col'>Comment</th>
                                <th scope='col'>Comment By</th>
                                <th scope='col'>Date of comment</th>
                                <!-- <th scope='col'>Action</th> -->
                              </tr>
                            </thead>
                            <tbody>";
                            while($row69 = mysqli_fetch_assoc($result69)){
                              $fac_comment69 = $row69['comment'];
                              $fac_comment_date69 = $row69['date_of_comment'];
                                echo "
                                  <tr>
                                    <td>$fac_comment69</td>";

                                    if($row69['comment_by'] == 3){
                                      echo "<td>Faculty</td>";
                                    }
                                    else if($row69['comment_by'] == 2){
                                      echo "<td>HoD Department</td>";
                                    }
                                    else if($row69['comment_by'] == 1){
                                      echo "<td>Dean</td>";
                                    }
                                    else{
                                      echo "<td>Director</td>";
                                    }

                                    echo "
                                    <td>$fac_comment_date69</td>
                                  </tr>";  
                            }
                            echo "
                                </tbody>
                              </table>";
                        }


                      echo "
                        <br>
                    <br>";

                      
                      echo"

                        </div>

                    </div>

                    </div>          
                  ";
                  
                  $application_no = $application_no + 1;
                
                }
              }
            }
          ?>

                  <?php
                    if($check_this_shit > 0){
                      echo "
                      <form method='post' role='form' class='php-email-form'>
                        <div class='row'>
                          <div class='form-group col-md-6'>
                          <label for='name'>Add Leave ID</label>
                            <input type='text' name='new_leave_id' class='form-control' id='name' required placeholder='Leave ID'>
                            <label for='name'>Comment</label>
                            <input type='text' name='new_comment_ak' class='form-control' id='name' required placeholder='Comment'>
                          </div>
                        </div>    
                        <div class='text'>
                          <button type='submit' name='submit_karo'>Accept</button> 
                          <button type='submit' name='reject_karo'>Reject</button> 
                          <button type='submit' name='vapis_karo'>Send back for review</button>
                        </div>
                      </form> ";

                      
                      if(isset($_POST['new_comment_ak'])){
                        $new_leave_id = $_POST['new_leave_id'];
                        $new_comment_ak = $_POST['new_comment_ak'];
                      }

                      if(isset($_POST['new_comment_ak'])){
                        if(isset($_POST['submit_karo'])){
                            $sql6969 = "call nextbutton($new_leave_id, '$new_comment_ak', 1);";
                            $result6969 = mysqli_query($conn, $sql6969);
                        }
                        else if(isset($_POST['reject_karo'])){
                          $sql6969 = "call nextbutton($new_leave_id, '$new_comment_ak', 0);";
                          $result6969 = mysqli_query($conn, $sql6969);
                        }
                        else{
                          $sql6969 = "call nextbutton($new_leave_id, '$new_comment_ak', 3);";
                          $result6969 = mysqli_query($conn, $sql6969);
                        }
                      }
                    }

                  ?>

        

      </div>
    </section><!-- End Contact Section -->

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




