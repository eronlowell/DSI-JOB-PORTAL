<?php 
    //bug: nilalagay nya kahit error ang input pati paghandle ng sensitive data like password
        $fullName =  $_POST["fullName"];
        $companyName = $_POST["companyName"];
        $businessEmail = $_POST["businessEmail"];
        $companyWebsite = $_POST["companyWebsite"];
        $pass = $_POST["pass"];
        

        //$servername = "localhost";
        //$username = "root";
        //$password = "";
        //$database = "jobpost_db";

        //create sql connection
        $conn = new mysqli("localhost", "root", "", "jobpost_db");
        if($conn->connect_error){
            die('Connection Failed : '.$conn->connect_error);
        }else{
            $stmt = $conn->prepare("INSERT INTO employer(fullName, companyName, businessEmail, companyWebsite, pass)values(?,?,?,?,?)");
            $stmt->bind_param("sssss", $fullName, $companyName, $businessEmail, $companyWebsite, $pass);
            $stmt->execute();
    
            echo "<script type='text/javascript'>alert('Sign Up Success!') </script>";
            $stmt->close();
            $conn->close();
        }








        //check connection
        //if($conn->connect_error){
            //die("Connection failed: ". $conn->connect_error);
        //}

        //$stmt = $conn->prepare("INSERT INTO employer (fullName, companyName, businessEmail, companyWebsite, pass) VALUES(?, ?, ?, ?, ?)");
       // $stmt->bind_param("sssss", $fullName, $companyName, $businessEmail, $companyWebsite, $pass);
        //$stmt->execute();
        //$stmt->close();
    ?>