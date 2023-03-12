<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  

  <link rel="stylesheet" href="../css/styles.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://kit.fontawesome.com/d96e1e0d74.css" crossorigin="anonymous">
  <link rel="stylesheet" href=https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css>
  <link rel="stylesheet" href=https://cdn.datatables.net/1.13.2/css/dataTables.bootstrap5.min.css>



  <title>COMPANY JOBS</title>


</head>
<style>
    .jobs_table{
        padding-left: 5%;
        padding-right: 5%;
        padding-top: 5%;
        padding-bottom: 5%;
    }

    h1{
        font-size: 25px;
    }

    .footer{
        background-color: #eab676;
    }
</style>

<body style="background-color: rgb(226, 219, 219);">

  <nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #eab676;">
    <div class="container-fluid">
      <a class="navbar-brand logo" href="#">Job Portal</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo01"
        aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse login-nav" id="navbarTogglerDemo01">
        <ul class="navbar-nav mx-auto">
          <li class="nav-item active">
            <a class="nav-link " href="index.html">Home </a>
          </li>
          <li class="nav-item">
            <a class="nav-link " href="#">Profile</a>
          </li>
          <li class="nav-item">
            <a class="nav-link " href="jobs.php">Jobs</a>
          </li>
          <li class="nav-item">
            <a class="nav-link " href="#">Candidates</a>
          </li>
          <li class="nav-item">
            <a class="nav-link " href="jobpost.php"> + Post a Job</a>
          </li>
          
          <li class="nav-item">
            <a class="icon-block " href="#"><i class="fa-regular fa-messages"> </i></a>
          </li>

          <li class="nav-item">
            <a class="icon-block " href="#"></a>
          </li>

        </ul>
      </div>
    </div>
  </nav>

  <div class="jobs_table">
    <h1> Jobs </h1> <br>
    <form action="pdf.php" method="post">  
      <input type="submit" name="generate_pdf" class="btn btn-success" value="Generate PDF" />  
    </form>  
    <br>
  <table id="example" class="table table-striped" style="width:100%">
    <thead>
        <tr>
            <th> Company Logo </th>          
            <th>Job Title</th>
            <th> Skills </th>
            <th>Job Type</th>
            <th> Salary</th>
            <th> Positions </th>
        </tr>
    </thead>
    <tbody>
    <?php
                $conn = new mysqli('localhost','root','','jobpost_db');
                $sql = "SELECT * FROM jobpost";
                $result = $conn -> query($sql);

                if ($result ->num_rows > 0){
                    while($row = $result -> fetch_assoc()){
                        echo "<tr><td>" . $row["company_logo"] . "</td><td>" .
                        $row["job_title"] . "</td><td>" .
                        $row["skills"] . "</td><td>" .
                        $row["job_type"] . "</td><td>" . 
                        $row["salary"] . "</td><td>" . 
                        $row["positions"]; 
                    }
                }
                else{
                    echo "There is no data";
                }
                $conn->close();
                ?> 
    </tbody>
       

    </tfoot>
</table>
</div>
</body>


<script src= "https://code.jquery.com/jquery-3.5.1.js"></script>
<script src= "https://cdn.datatables.net/1.13.2/js/jquery.dataTables.min.js"> </script>
<script src= "https://cdn.datatables.net/1.13.2/js/dataTables.bootstrap5.min.js"></script>

<script>
    $(document).ready(function () {
        $('#example').DataTable();
    });
</script>


<div class="footer_container">
    <div class="footer" style="border: 1px solid white">
      <br>
        <div class="col mt-auto ml-auto footer-cpw">
          <p> <center>Job Portal Solutions © 2023 Grp 2 & 3</p>
          <p>All rights reserved</p></center>
        </div>
      </div>
    </div>
  </body>