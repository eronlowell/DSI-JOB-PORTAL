<?php
    $company_name = $_POST['company_name'];
    $company_address = $_POST['company_address'];
    $company_logo = $_POST['company_logo'];
    $company_size = $_POST['company_size'];
    $company_overview = $_POST['company_overview'];
    $company_email = $_POST['company_email'];
    

    //database

    $conn = new mysqli('localhost', 'root', '', 'jobpost_db');
    if($conn->connect_error){
        die('Connection Failed : '.$conn->connect_error);
    }else{
        $stmt = $conn->prepare("INSERT INTO company(company_name, company_address, company_logo, company_size, company_overview, company_email)values(?,?,?,?,?,?)");
        $stmt->bind_param("ssssss", $company_name, $company_address, $company_logo, $company_size, $company_overview, $company_email);
        $stmt->execute();

        echo "<script type='text/javascript'>alert('Posted Job Successfully!') </script>";
        $stmt->close();
        $conn->close();
    }

?>