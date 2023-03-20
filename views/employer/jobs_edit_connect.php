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
$job_status = $_POST['job_status'];
$company_logo = $_POST['company_logo'];
$job_title = $_POST['job_title'];
$job_summary = $_POST['job_summary'];
$key_responsibility = $_POST['key_responsibility'];
$job_reqs = $_POST['job_reqs'];
$skills = $_POST['skills'];
$job_category = $_POST['job_category'];
$job_type = $_POST['job_type'];
$salary = $_POST['salary'];


// Update record in database
$sql = "UPDATE jobpost SET `job_status`='$job_status',`company_logo`='$company_logo',`job_title`='$job_title',`job_summary`='$job_summary',`key_responsibility`='$key_responsibility',`job_reqs`='$job_reqs',`skills`='$skills',`job_category`='$job_category',`job_type`='$job_type',`salary`='$salary' WHERE id='$id'";
if (mysqli_query($conn, $sql)) {
  echo "<script type='text/javascript'>alert('Job Information Updated Successfully!') </script>";
  echo "<script> </script>";

  
} else {
  echo "Error updating record: " . mysqli_error($conn);
}

// Close database connection
mysqli_close($conn);
?>
