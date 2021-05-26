<?php

include_once 'dbh.inc.php';

$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$faculty_id = $_POST['faculty_id'];
$email = $_POST['email'];
$password = $_POST['password'];
$department = $_POST['department'];
$dob = $_POST['dob'];
$gender = $_POST['gender'];

$sql = "insert into faculty(faculty_id, first_name, last_name, email, department, DOB, gender, position, pending_leaves, status) 
        values ('$faculty_id', '$first_name', '$last_name', '$email', '$department', '$dob', '$gender', 3, 10, 1);";

$sql1 = "insert into users(username, password) values ('$faculty_id', '$password');";

mysqli_query($conn, $sql);
mysqli_query($conn, $sql1);

header("location: ../login.php?signup=success");
?>