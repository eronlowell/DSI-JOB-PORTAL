<?php
session_start();

    include 'utility/connection.php';
    include 'utility/functions.php';

    if($_SERVER['REQUEST_METHOD'] == "POST")
    {
        //Something was posted

        $company_name = $_POST['company_name'];
        $contact_person = $_POST['contact_person'];
        $position = $_POST['position'];
        $business_nature = $_POST['business_nature'];
        $tel_no = $_POST['tel_no'];
        $cel_no = $_POST['cel_no'];
        $company_email = $_POST['company_email'];
        $company_address = $_POST['company_address'];
        $company_city = $_POST['company_city'];
        $pass = $_POST['pass'];

        if($_FILES["company_logo"]["error"] == 4){
          echo
          "<script> alert('Image Does Not Exist'); </script>"
          ;
        }
        else{
          $fileName = $_FILES["company_logo"]["name"];
          $fileSize = $_FILES["company_logo"]["size"];
          $tmpName = $_FILES["company_logo"]["tmp_name"];
      
          $validImageExtension = ['jpg', 'jpeg', 'png'];
          $imageExtension = explode('.', $fileName);
          $imageExtension = strtolower(end($imageExtension));
          if ( !in_array($imageExtension, $validImageExtension) ){
            echo
            "
            <script>
              alert('Invalid Image Extension');
            </script>
            ";
          }
          else if($fileSize > 1000000){
            echo
            "
            <script>
              alert('Image Size Is Too Large');
            </script>
            ";
          }
          else{
            $newImageName = uniqid();
            $newImageName .= '.' . $imageExtension;
      
            move_uploaded_file($tmpName, 'logo/' . $newImageName);
          }
        }
        

        // if(!empty($company_email) && !empty($pass) && !is_numeric($company_email))
        {
            
            //save to database
            $query = "INSERT into company_db (company_logo, company_name,contact_person,position,business_nature,tel_no,cel_no,company_email,company_address,company_city,pass) 
            values ('$company_logo','$company_name','$contact_person','$position','$business_nature','$tel_no','$cel_no','$company_email','$company_address','$company_city','$pass')";

            mysqli_query($conn, $query);

            echo '<script> alert("Sign Up Successful!")</script>';
            header("Location: company-login.php");
            // echo '<div class="alert alert-success d-flex align-items-center" role="alert">
            //     <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
            //     <div>
            //         Sign up successful!
            //     </div>
            //     </div>';
            
            
        }
        // else
        {
            echo "<div class='alert alert-danger d-flex align-items-center' role='alert'>
                <svg class='bi flex-shrink-0 me-2' width='24' height='24' role='img' aria-label='Danger:'><use xlink:href='#exclamation-triangle-fill'/></svg>
                <div>
                    Please enter valid information
                </div>
                </div>";
    }

    }


?>
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
  <title>JOB PORTAL</title>
</head>

<style>
  .container{
    margin-bottom: 100px;
  }
</style>

<body style="background-image: url('assets/bg1.jpg');">
<!-- nav bar -->
  <nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #800;">
    <div class="container-fluid">
      <a class="navbar-brand logo" href="#">Job Portal</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo01"
        aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse login-nav" id="navbarTogglerDemo01">
        <ul class="navbar-nav mx-auto">
          <li class="nav-item active">
            <a class="nav-link " href="#">Home </a>
          </li>
          <li class="nav-item">
            <a class="nav-link " href="#">Find A Job</a>
          </li>
          <li class="nav-item">
            <a class="nav-link " href="#">Company Profiles</a>
          </li>
          <li class="nav-item">
            <a class="nav-link " href="#">Career Guides</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
<!-- form -->
  <div class="container">
    <div class="row">
      <div class="col-8 mx-auto mt-5">
        <div id="LogInCon" class="container-sm mt-5 py-5 p-5 bg-light login-form">
          <form method="post" enctype="multipart/form-data">
            <h2>Sign Up</h2>
            <br>
            <div class="form-group">
              <label for="company_name">Company Name</label>
              <input type="text" class="form-control" placeholder="Enter Company Name" name="company_name" required>
            </div>
            <br>
            <div class="form-group">
              <label for="contact_person">Contact Person</label>
              <input type="text" class="form-control" placeholder="Enter Contact Person" name="contact_person" required>
            </div>
            <br>
            <div class="form-group">
              <label for="position">Position</label>
              <input type="text" class="form-control" placeholder="Enter Company Position" name="position" required>
            </div>
            <br>
            <div class="form-group">
              <label for="business_nature">Business Nature</label>
              <input type="text" class="form-control" placeholder="Enter Nature of Business" name="business_nature" required>
            </div>
            <br>
            <div class="form-group">
              <label for="tel_no">Telephone Number</label>
              <input type="text" class="form-control" placeholder="Enter Telephone Number" name="tel_no" required>
            </div>
            <br>
            <div class="form-group">
              <label for="cel_no">Cellphone Number</label>
              <input type="text" class="form-control" placeholder="Enter Cellphone Number" name="cel_no" required>
            </div>
            <br>
            <div class="form-group">
              <label for="company_email">Company Email</label>
              <input type="email" class="form-control" id="company_email" name="company_email" aria-describedby="emailHelp" placeholder="Enter Company Email" required>
            </div>
            <br>
            <div class="form-group">
              <label for="company_address">Company Address</label>
              <input type="text" class="form-control" id="company_address" name="company_address" placeholder="Enter Company Address" required>
            </div>
            <br>
            <div class="form-group">
                <label for="company_city">City</label>
                <input type="text" class="form-control" placeholder="Enter City" name="company_city" required>
            </div>
            <br>
            <div>
				<label for="company_logo">Company Logo</label>
                <!-- inalis ko muna yung required kase wala pa siyang pag lalagyan -->
				<input type="file" class="form-control" id="company_logo" name="company_logo" accept="image/*" >
			</div>
            <br>
            <div>
				<label for="company_size">Company Size</label>
				<select id="company_size"  class="form-control" name="company_size" required>
					<option value="">Please select company size</option>
					<option value="small">Small Company: 10 to 99 employees</option>
					<option value="medium">Medium-sized Company: 100 to 499 employees</option>
					<option value="large">Large Company: 500 employees or more</option>
				</select>
			</div>
            <br>
            <div>
              <label for="company_overview">Company Overview</label>
              <textarea id="company_overview" class="form-control" name="company_overview" placeholder="Write Company Overview" required rows="8" cols="50"></textarea>
            </div>
            <br>
            <div class="form-group">
              <label for="pass">Password</label>
              <input type="password" class="form-control" id="pass" name="pass" placeholder="Password" required>
            </div>
            <br>

          

            <button type="submit" class="btn btn-primary">Sign Up</button>
          </form>
        </div>
      </div>
    </div>
  </div>

  <div class="container-fluid mt-5 footer border-on">
    <div class="row">
      <div class="col-2 my-auto mr-5">
        <img src="../company-3-logo.png" alt="img" height="20%" width="100%">
      </div>
      <div class="col-4 ml-5 footer-margin">
        <ul class="list-unstyled">
          <li class="">
            <p class="footer-toc">Table of Contents</p>
          </li>
          <li class="">
            <a class=" " href="#">Home </a>
          </li>
          <li class="">
            <a class=" " href="#">Find A Job</a>
          </li>
          <li class="">
            <a class="" href="#">About Us</a>
          </li>
          <li class="">
            <a class=" " href="#">Contact</a>
          </li>
        </ul>
      </div>
      <div class="col-4 footer-two">
        <ul class="list-unstyled">
          <li class="">
            <p class="footer-toc "> </p>
          </li>
          <li class="">
            <a class=" " href="#">Career Guides</a>
          </li>
          <li class="">
            <a class=" " href="#">Blog 1</a>
          </li>
          <li class="">
            <a class="" href="#">Blog 2</a>
          </li>
          <li class="">
            <a class=" " href="#">Blog 3</a>
          </li>
        </ul>
      </div>
      <div class="col mt-auto ml-auto footer-cpw">
        <p>Job Portal Solutions © 2023 Grp 2 & 3</p>
        <p>All rights reserved</p>
      </div>
    </div>

  </div>
</body>

</html>