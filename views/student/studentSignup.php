<?php
    include 'config.php';
    $studentEmail = $_POST['studentEmail'];
    $studentPassword =$_POST['studentPassword'];
    $studentFirstname = $_POST['studentFirstname'];
    $studentLastname = $_POST['studentLastname'];
    $studentGender = $_POST['studentGender'];
    $studentAddress = $_POST['studentAddress'];
    $studentPhone = $_POST['studentPhone'];

    $stmt = $conn->prepare("INSERT INTO employer(
        `studentID`, 
        `email`, 
        `Password`, 
        `studentFirstName`, 
        `studentLastName`, 
        `Address`, 
        `contactNo`, 
        `dateofBirth`, 
        `Gender`, 
        `Bio`
        )
    values
        (DEFAULT,?,?,?,?,?,?,'2022-02-02',?,'')");
    $stmt->bind_param("sssssss",  $studentEmail, $studentPassword, $studentFirstname, $studentLastname, $studentAddress, $studentPhone, $studentGender);
    $stmt->execute();
    
    echo "<script type='text/javascript'>alert('Sign Up Success!') </script>";
    $stmt->close();
    $conn->close();


?>