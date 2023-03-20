<?php
session_start();

    include 'utility/connection.php';
    include 'utility/functions.php';

    if($_SERVER['REQUEST_METHOD'] == "POST")
    {
        //Something was posted
        $businessEmail = $_POST['businessEmail'];
        $pass = $_POST['pass'];

        if(!empty($businessEmail) && !empty($pass) && !is_numeric($businessEmail))
        {
            //read from database
            $query = "select * from employer where businessEmail = '$businessEmail' limit 1";
            $result = mysqli_query($conn, $query);
            
            if($result){
              if($result && mysqli_num_rows($result) > 0)
              {
                  $user_data = mysqli_fetch_assoc($result);

                  if($user_data['pass'] === $pass)
                  {
                    $_SESSION['id'] = $user_data['id'];
                    header("Location: student/index.html");
                    die;
                  }else
                  {
                    echo "<div class='alert alert-danger d-flex align-items-center' role='alert'>
                    <svg class='bi flex-shrink-0 me-2' width='24' height='24' role='img' aria-label='Danger:'><use xlink:href='#exclamation-triangle-fill'/></svg>
                    <div>
                      Invalid password
                    </div>
                    </div>";
                  }
              }
            }

        }else
        {
          echo "<div class='alert alert-danger d-flex align-items-center' role='alert'>
          <svg class='bi flex-shrink-0 me-2' width='24' height='24' role='img' aria-label='Danger:'><use xlink:href='#exclamation-triangle-fill'/></svg>
          <div>
            Invalid Username
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
  <link rel="stylesheet" type="text/css" href="styles/loginPage.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
  <title>Employer Login</title>


</head>
<!-- replace the image url below based on your img resource pathing -->
<body style="background-image: url('img/bg1.jpg');">

 
  <div class="container">
    <div class="row">
      <div class="col-6 mx-auto mt-5">
        <div id="LogInCon" class="container-sm mt-5 py-5 p-5 bg-light login-form">

          <form action="company-login.php" method="POST">
            <div class="form-group">
              <label for="businessEmail">Email</label>
              <input type="email" class="form-control" name="businessEmail" id="businessEmail"
                placeholder="Enter Business Email" required>
            </div>
            <br>
            <div class="form-group">
              <label for="password">Password</label>
              <input type="password" class="form-control" id="pass" name="pass" placeholder="Password" required>
            </div>
            <div class="form-check">
              <input type="checkbox" class="form-check-input" id="exampleCheck1">
              <label class="form-check-label" for="exampleCheck1">Remember Me</label>
            </div>
            <br>
            <button type="submit" class="btn btn-primary">Login</button>
          </form>
          <br>
          <a href="company-signup.php">
            <button type="submit" class="btn btn-primary">Sign Up</button>
          </a>
          </form>
        </div>
      </div>
    </div>
  </div>
</body>

</html>