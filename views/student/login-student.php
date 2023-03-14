<?php
    $email = $_POST['email'];
    $password = $_POST['password'];
    
    include 'config.php';
    if($conn->connect_error){
        die("Failed to connect : ".$conn->connect_error);

    }else{
        $stmt = $conn->prepare("SELECT * FROM student WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $stmt_result = $stmt->get_result();

        if($stmt_result->num_rows > 0){
            $data = $stmt_result->fetch_assoc();
            if($data['password'] === $password){
                $studentId = $data["studentID"];
                echo '<script> window.location.href="index.html" </script>';
            }else{
                echo "<script> alert('Invalid Email or Password');window.location='login-student.html' </script>";
            }
        }else{
            echo "<script> alert('Invalid Email or Password');window.location='login-student.html' </script>";
        }
    }
?>