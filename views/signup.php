<!DOCTYPE html>
<html lang="en">
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
      <link rel="stylesheet" href="/css/styles.css">
      <link rel="stylesheet" href="/css/bootstrap-grid.min.css">
      <link rel="preconnect" href="https://fonts.googleapis.com">
      <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
      <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
      <title>Signup</title>
    </head>
<body style="background-image: url('assets/bg1.jpg');">
    <div class="container">
            <div class="row mt-4">
                <div class="col-lg-6 bg-white m-auto rounded-4 wrapper">
                    <h2 class="text-center pt-3">Signup Now</h2>
                    <p class="text-center pt-3 text-muted lead">Start Recruiting from the employer's choice graduates</p>
                    <form action="signup.php" method="post">
                        <div class="input-group mb-3">
                            <label class="input-group-text">Fullname</label>
                            <input type="text" class="form-control text-left" name="fullname">
                        </div>
                        <div class="input-group mb-3">
                            <label class="input-group-text">Company Name</label>
                            <input type="text" class="form-control text-left" name="CompanyName">
                        </div>
                        <div class="input-group mb-3">
                            <label class="input-group-text text-left">Business Email</label>
                            <input type="text" class="form-control text-left" name="BusinessEmail">
                        </div>
                        <div class="input-group mb-3">
                            <label class="input-group-text">Company Website</label>
                            <input type="text" class="form-control text-left" name="CompanyWebsite">
                        </div>
                        <div class="input-group mb-3">
                            <label class="input-group-text">Password</label>
                            <input type="text" class="form-control text-left" name="Password">
                        </div>
                        <div class="d-grid mb-4">
                            <input type="submit" class="btn btn-primary" value="Sign Up" />
                        </div>
                    </form>
                </div>
            </div>
    </div>
    <?php 
    //bug: nilalagay nya kahit error ang input pati paghandle ng sensitive data like password
        $fullName =  $_POST["fullname"];
        $companyName = $_POST["CompanyName"];
        $businessEmail = $_POST["BusinessEmail"];
        $companyWebsite = $_POST["CompanyWebsite"];
        $password = $_POST["Password"];
        
        $servername = "localhost";
        $username = "root";
        $password = "";
        $database = "jobpost_db";

        //create sql connection
        $conn = new mysqli($servername, $username, $password, $database);

        //check connection
        if($conn->connect_error){
            die("Connection failed: ". $conn->connect_error);
        }

        $stmt = $conn->prepare("INSERT INTO employer (email, password, employerName, companyName) VALUES(?, ?, ?, ?)");
        $stmt->bind_param("ssss", $businessEmail, $password, $fullName, $companyName,);

        $stmt->execute();
        $stmt->close();
    ?>
</body>
</html>