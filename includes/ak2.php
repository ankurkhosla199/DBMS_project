<?php
include_once 'includes/dbh.inc.php';
include_once 'includes/ak.sql';
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Database test</title>
  </head>
  <body>

    <?php
        $a1 = 'rpr006';
        $sqll = "select * from faculty where faculty.faculty_id = '$a1';";
        $result = mysqli_query($conn, $sqll);
        $resultCheck = mysqli_num_rows($result);

        if($resultCheck > 0){
            while($row = mysqli_fetch_assoc($result)){
                echo $row['first_name']." ".$row['last_name'];
                echo "<br>";
                
            }
        }

    ?>

  </body>
</html>
