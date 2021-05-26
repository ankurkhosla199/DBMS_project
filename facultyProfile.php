<?php
include_once 'includes/dbh.inc.php';

require 'vendor/autoload.php';

$client = new MongoDB\Client;

$dbms_project = $client->dbms_project;
$faculty = $dbms_project->faculty;
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Faculty Profile Section</title>
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

        $document = $faculty->findOne(
          ["_id" => "$fac_id"]
      );
    ?>

    <div class="d-flex flex-column">

      <div class="profile">
        <img src="assets/img/profile_img.jpg" alt="" class="img-fluid rounded-circle">
        <h1 class="text-light"><a href="profile.php"><?php echo $fac_login['first_name']." ".$fac_login['last_name'] ?></a></h1>
        
      </div>

      <nav id="navbar" class="nav-menu navbar">
        <ul>
         
          <li><a href="login.php" class=""><i class="bx bx-user"></i> <span>Sign In</span></a></li>

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
                      <div class="form-group col-md-4">
                        <label for="Faculty ID">Faculty Id</label>
                        <h3> <?php echo $fac_id ?> </h3>
                      </div>
                        <div class="form-group col-md-4">
                          <label for="First Name">First Name</label>
                          <h3> <?php echo "Dr. ".$fac_login['first_name']?> </h3>
                        </div>
                        <div class="form-group col-md-4">
                          <label for="Last Name">Last Name</label>
                          <h3> <?php echo $fac_login['last_name']?> </h3>
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="Bio">Bio</label>
                        <h3> <?php echo $document['bio']; ?> </h3>
                      </div>
                      <div class="form-group">
                        <label for="Educational Background">Educational Background</label>
                        <h3> <?php foreach($document['education'] as $doc){ if($doc!="") {echo $doc.nl2br("\n");} } ?> </h3>
                      </div>
                      <div class="form-group">
                        <label for="Research Interest">Research Interest</label>
                        <h3> <?php echo $document['res_int']; ?> </h3>
                      </div>
                      <div class="form-group">
                        <label for="Projects">Projects</label>
                        <h3> <?php foreach($document['project'] as $doc){ if($doc!="") {echo $doc.nl2br("\n");} } ?> </h3>
                      </div>
                      <div class="form-group">
                        <label for="Publications">Publications</label>
                        <h3> <?php foreach($document['publication'] as $doc){  if($doc!="") {echo $doc.nl2br("\n");} } ?> </h3>
                      </div>
                      <div class="form-group">
                        <label for="Coures Taught">Courses Taught</label>
                        <h3> <?php foreach($document['courses'] as $doc){  if($doc!="") {echo $doc.nl2br("\n");} } ?> </h3>
                      </div>  
                      <div class="form-row">
                        <div class="form-group col-md-3">
                          <div class="form-group">
                            <label for="Age">Age</label>
                            <h3> 35 </h3>
                          </div>
                        </div>
                        <div class="form-group col-md-6">
                          <label for="Department">Department</label>
                          <h3> <?php echo $fac_login['department']?> </h3>
                        </div>
                        <div class="form-group col-md-3">
                          <label for="Gender">Gender</label>
                          <h3> <?php echo $fac_login['gender']?> </h3>
                        </div>
                        <div class="form-group col-md-3">
                          <label for="Gender">Contact</label>
                          <h3> <?php echo $fac_login['email']?> </h3>
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
