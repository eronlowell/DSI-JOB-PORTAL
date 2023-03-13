<?php
    $businessEmail = $_POST['businessEmail'];
    $pass = $_POST['pass'];

    $con = new mysqli("localhost", "root", "", "jobpost_db");
    if($con->connect_error){
        die("Failed to connect : ".$con->connect_error);

    }else{
        $stmt = $con->prepare("SELECT * FROM employer WHERE businessEmail = ?");
        $stmt->bind_param("s", $businessEmail);
        $stmt->execute();
        $stmt_result = $stmt->get_result();

        if($stmt_result->num_rows > 0){
            $data = $stmt_result->fetch_assoc();

            if($data['pass'] === $pass){
                echo '<script> window.location.href="company-profile.html" </script>';
            }else{
                echo "<script> alert('Invalid Email or Password');window.location='login-employer.html' </script>";
            }
        }else{
            echo "<script> alert('Invalid Email or Password');window.location='login-employer.html' </script>";
        }
    }
?>