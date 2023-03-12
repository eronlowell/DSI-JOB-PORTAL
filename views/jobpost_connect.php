<?php
    $job_title = $_POST['job_title'];
    $skills = $_POST['skills'];
    $job_type = $_POST['job_type'];
    $salary = $_POST['salary'];
    $positions = $_POST['positions'];
    $company_logo = $_POST['company_logo'];

    //database

    $conn = new mysqli('localhost', 'root', '', 'jobpost_db');
    if($conn->connect_error){
        die('Connection Failed : '.$conn->connect_error);
    }else{
        $stmt = $conn->prepare("INSERT INTO jobpost(company_logo, job_title, skills, job_type, salary, positions)values(?,?,?,?,?,?)");
        $stmt->bind_param("ssssis", $company_logo, $job_title, $skills, $job_type, $salary, $positions);
        $stmt->execute();

        echo "<script type='text/javascript'>alert('Posted Job Successfully!') </script>";
        $stmt->close();
        $conn->close();
    }

?>