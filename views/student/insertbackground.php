<?php 
//ADD Educational Bakcground
if (isset($_POST['addEducationalBackground'])){
    $input_eduSchool = $_POST['eduSchool'];
    $input_eduDegree = $_POST['eduDegree'];
    $input_eduYear = $_POST['eduYear'];
  
    $addEdu = "INSERT INTO eduBackground (Degree, schoolName, eduYear, studentID) 
                VALUES (:input_eduDegree, :input_eduSchool, :input_eduYear, :studentId)";
    $addeduquery = $conn->prepare($addEdu);
    $addeduquery -> bind_param(':input_eduDegree', $input_eduDegree);
    $addeduquery -> bind_param(':input_eduSchoo', $input_eduSchool);
    $addeduquery -> bind_param(':input_eduYear', $input_eduYear);
    $addeduquery -> bind_param(':studentId', $studentId);
  
    $addeduquery ->execute();
    $addeduquery ->close();
  }
  
  //ADD JOB EXPERIENCE
  $input_jobTitle = $_POST['jobTitle'];
  $input_companyName = $_POST['companyName'];
  $input_jobYear = $_POST['jobYear'];
  
  //ADD CV FILE
  $cv_name = $_FILES['studentCV']['name'];
  $cv_type = $_FILES['studentCV']['type'];
  $cv_size = $_FILES['studentCV']['size'];
  $cv_data = file_get_contents($_FILES['studentCV']['tmp_name']);
  
  $cvDestination = 'uploads/' . $cv_name;
  move_uploaded_file($cv_data, $cvDestination);
  
  
  
  

  $addJob = "INSERT INTO jobExp (jobTitle, companyName, jobYear, studentID) 
                  VALUES ('$input_jobTitle', '$input_companyName', '$input_jobYear ','$studentId')";
  $addjobresult = $conn->query($addjob);
  
  
  
  
  $addCV = $conn->prepare("INSERT INTO studentCV (name, type, size, data) VALUES (?, ?, ?, ?)");
  $addCV->bind_param("ssib", $name, $type, $size, $data);
  $addCV->execute();
  $addCV->close();



?>