<?php
// Connect to database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "jobpost_db";
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

// Retrieve form values
$id = $_POST['id'];
$company_logo = $_POST['company_logo'];
$job_title = $_POST['job_title'];
$skills = $_POST['skills'];
$job_type = $_POST['job_type'];
$salary = $_POST['salary'];
$positions = $_POST['positions'];

// Update record in database
$sql = "UPDATE jobpost SET company_logo='$company_logo', job_title='$job_title', skills='$skills', job_type='$job_type', salary='$salary', positions='$positions' WHERE id='$id'";
if (mysqli_query($conn, $sql)) {
  echo "Record updated successfully";
} else {
  echo "Error updating record: " . mysqli_error($conn);
}

// Close database connection
mysqli_close($conn);
?>
