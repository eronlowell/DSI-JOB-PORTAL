
<!DOCTYPE html>
<html lang="en">

<?php
$conn = new mysqli('localhost', 'root', '', 'jobpost_db');
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
$id = $_COOKIE['jobID'] as ; // The ID of the paragraph you want to retrieve
echo $id;
$sql = "SELECT * FROM jobpost WHERE id = $id";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $jobTitle = $row['job_title'];
    $jobType = $row['job_type'];
    $jobSkills = $row['job_type'];
    $salary =$row['salary'];
    $position =$row['positions'];
    $description =$row['salary'];

  }
?>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Job Description Job Portal</title>
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #800;">
    <div class="container-fluid">
      <a class="navbar-brand logo" href="index.html">
        <img src="../icon-3.png" alt="" width="60" height="40" class="d-inline-block align-text-top">
        Job Portal
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo01"
        aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
        <ul class="navbar-nav mx-auto">

          <li class="nav-item">
            <a class="nav-link ms-5" href="find-job.html">Find A Job</a>
          </li>
          <li class="nav-item mx-5">
            <a class="nav-link " href="#">Company Profiles</a>
          </li>
          <li class="nav-item">
            <a class="nav-link " href="#">Home</a>
          </li>
        </ul>
        <ul class="navbar-nav ms-auto">
          <li class="nav-item">
            <a class="nav-link " href="#">Sign Out</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <!-- Page content -->

  
  <div class="container-xl">
    <br>
    <h1>Job Description</h1>
    <hr>
    <div class="container-xl rounded  my-2 bg-light ">
      <div class=" container py-2">
        <p class="mt-3"><strong> Job Title: </strong><?php echo $jobTitle; ?> </p>
        <p class="mt-3"><strong> Position: </strong><?php echo $position; ?> </p>  
        <p class="mt-3"><strong> Job Salary: </strong><?php echo $salary; ?> </p>   
        <p class="mt-3"><strong> Skills: </strong><?php echo $jobSkills; ?> </p>    
        <p class="mt-3"><strong> Job Summary </strong></p>
        <p><?php echo $description; ?> </p>  
        
        <div class="container-fluid">
          <form action="process-form.php" method="post">
            <input type="submit" class="btn btn-primary" value="Apply">
            <button type="button" class="btn btn-danger" href="../company-profiles.html">About Company</button>
          </form>
        </div>
      </div>
      
    </div>
   


  </div>