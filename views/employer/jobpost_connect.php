<?php
    $company_logo = $_POST['company_logo'];
    $job_title = $_POST['job_title'];
    $job_summary = $_POST['job_summary'];
    $key_responsibility = $_POST['key_responsibility'];
    $job_reqs = $_POST['job_reqs'];
    $skills = $_POST['skills'];
    $job_category = $_POST['job_category'];
    $job_type = $_POST['job_type'];
    $salary = $_POST['salary'];
   
    

    //database

    $conn = new mysqli('localhost', 'root', '', 'jobpost_db');
    if($conn->connect_error){
        die('Connection Failed : '.$conn->connect_error);
    }else{
        $stmt = $conn->prepare("INSERT INTO jobpost(company_logo, job_title, job_summary, key_responsibility, job_reqs, skills, job_category, job_type, salary)values(?,?,?,?,?,?,?,?,?)");
        $stmt->bind_param("ssssssssi", $company_logo, $job_title, $job_summary, $key_responsibility, $job_reqs, $skills, $job_category, $job_type, $salary);
        $stmt->execute();

        echo "<script type='text/javascript'>alert('Posted Job Successfully!') </script>";
        $stmt->close();
        $conn->close();
    }

?>