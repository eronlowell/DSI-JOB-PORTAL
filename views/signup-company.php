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

  <div class="container">
    <div class="row">
      <div class="col-8 mx-auto mt-5">
        <div id="LogInCon" class="container-sm mt-5 py-5 p-5 bg-light login-form">
          <form action= signup-company_connect.php method= "post">
            <h2>Sign Up</h2>
            <br>
            <div class="form-group">
              <label for="company_name">Company Name</label>
              <input type="text" class="form-control" placeholder="Enter Company Name" name="company_name" required>
            </div>
            <br>
            <div class="form-group">
                <label for="company_address">Address</label>
                <input type="text" class="form-control" placeholder="Enter Address" name="company_address" required>
            </div>
            <br>
            <div>
				<label for="company_logo">Company Logo</label>
				<input type="file" class="form-control" id="company_logo" name="company_logo" accept="image/*" required>
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
              <label for="company_email">Company Email</label>
              <input type="email" class="form-control" id="company_email" name="company_email" aria-describedby="emailHelp" placeholder="Enter Company Email" required>
            </div>
            <br>

            <button type="post" class="btn btn-primary">Sign Up</button>
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