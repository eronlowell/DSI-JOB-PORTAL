<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  <link rel="stylesheet" href="../css/styles.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
  <title>JOB PORTAL</title>
</head>

<?php
class student
{
  public $studentId;
  public $studentName;
  public $studentAge;
  public $email;
  public $password;
  public $address;
  public $contactNo;
  public $dateOfBirth;
  public $gender;
  public $studentBio;
  public $education;


  public function __construct($studentId, $studentName, $studentAge, $email, $password, $address, $contactNo, $dateOfBirth, $gender, $studentBio)
  {
    $this->studentId = $studentId;
    $this->studentName = $studentName;
    $this->studentAge = $studentAge;
    $this->email = $email;
    $this->password = $password;
    $this->address = $address;
    $this->contactNo = $contactNo;
    $this->dateOfBirth = $dateOfBirth;
    $this->gender = $gender;
    $this->studentBio = $studentBio;

    $this->education = array();
  }

  //setters and getters baka tanggalin din to
  public function getStudentName()
  {
    return $this->studentName;
  }
  public function getStudentId()
  {
    return $this->studentId;
  }
  public function getAge()
  {
    return $this->studentAge;
  }
  public function getEmail()
  {
    return $this->email;
  }
  public function getPassword()
  {
    return $this->password;
  }
  public function getAddress()
  {
    return $this->address;
  }
  public function getContactNo()
  {
    return $this->contactNo;
  }
  public function getDateOfBirth()
  {
    return $this->dateOfBirth;
  }

  public function getGender()
  {
    return $this->gender;
  }
  public function getStudentBio()
  {
    return $this->studentBio;
  }

  public function setStudentName($studentName)
  {
    $this->studentName = $studentName;
  }
  public function setStudentId($studentId)
  {
    $this->studentId = $studentId;
  }
  public function setAge($studentAge)
  {
    $this->studentAge = $studentAge;
  }
  public function setEmail($email)
  {
    $this->email = $email;
  }
  public function setPassword($password)
  {
    $this->password = $password;
  }
  public function setAddress($address)
  {
    $this->address = $address;
  }
  public function setContactNo($contactNo)
  {
    $this->contactNo = $contactNo;
  }
  public function setDateOfBirth($dateOfBirth)
  {
    $this->dateOfBirth = $dateOfBirth;
  }

  public function setGender($gender)
  {
    $this->gender = $gender;
  }
  public function setStudentBio($studentBio)
  {
    $this->studentBio = $studentBio;
  }
};

$servername = "localhost";
$username = "root";
$password = "";
$database = "jobpost_db";

//create sql connection
$conn = new mysqli($servername, $username, $password, $database);

//check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$query = "SELECT * FROM student 
      WHERE studentID = 1";

$eduQuery = "SELECT * FROM eduBackground WHERE studentID = 1";

$jobQuery = "SELECT * FROM jobExp WHERE studentID = 1";

$result = $conn->query($query);
$row = $result->fetch_assoc();

$eduresult = $conn->query($eduQuery);
$edurow = $eduresult->fetch_assoc();

$jobresult = $conn->query($jobQuery);
$jobrow = $jobresult->fetch_assoc();

//Student Info
$studentName = $row["studentName"];
$studentAge = $row["studentAge"];
$studentId = $row["studentID"];
$email = $row["email"];
$address = $row["Address"];
$contactNo = $row["contactNo"];
$password = $row["Password"];
$dateOfBirth = 121231;
$gender = $row["Gender"];
$studentBio = $row["Bio"];

//Educational Background
$eduSchool = $row["schoolName"];
$eduYear = $row["eduYear"];
$eduDegree = $row["Degree"];

//Job Experiences
$jobTitle = $row["jobTitle"];
$jobCompany = $row["companyName"];
$jobYear = $row["jobYear"];


$newStudent = new student($studentId, $studentName, $age, $email, $password, $address, $contactNo, $dateOfBirth, $gender, $studentBio,);

if (!$result) {
  die("Invalid query: " . $conn->error);
};
$conn->close();

?>


<body>
  <nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #800;">
    <div class="container-fluid">
      <a class="navbar-brand logo" href="index.html">
        <img src="../icon-3.png" alt="" width="60" height="40" class="d-inline-block align-text-top">
        Job Portal
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
        <ul class="navbar-nav mx-auto">

          <li class="nav-item">
            <a class="nav-link ms-5" href="find-job.html">Find A Job</a>
          </li>
          <li class="nav-item mx-5">
            <a class="nav-link " href="#">Company Profiles</a>
          </li>
          <li class="nav-item">
            <a class="nav-link " href="#">Career Guides</a>
          </li>
        </ul>
        <ul class="navbar-nav ms-auto">
          <li class="nav-item">
            <a class="nav-link " href="#">Sign Out</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>


  <div class="container">
    <div class="row">
      <div class="col-4 ">
        <div class="container-fluid mt-5 mr-5 pb-4 shadow rounded">
          <div class="row">
            <div class="col-12 mx-auto text-center mt-3" style="height: 150px;">
              <img src="../no-profile.png" alt="img" class="rounded-circle" height="100%">
            </div>
            <div class="col-12 mt-3">
              <p class="text-center fs-3"><?php echo $newStudent->studentName ?></p>
            </div>
            <div class="col-12 mt-0">
              <p class="text-center">Student</p>
            </div>
            <div class="col-6">
              <p>Bio</p>
            </div>
            <div class="col-6 d-flex flex-row-reverse">
              <a href="">Edit</a>
            </div>
            <div class="col-12 mt-0 d-flex justify-content-evenly">
              <!-- <p class="fs-6 "><?php echo $newStudent->studentBio ?></p> -->
            </div>
          </div>
          <div class="row">
            <div class="col-12">
              <!-- replace paragraph with list or add new list then put this for loop -->
              <p class="fs-5"></p>
            </div>
            <div class="col-3 m-2">
              <p> </p>
            </div>
          </div>
          <!--
              <div class="row">
                <div class="col-12 mx-auto text-center mt-3">
                  <a href="" class="btn btn-primary">Message</a>
                </div>
                <div class="col-12 mx-auto text-center mt-3">
                  <a href="" class="btn btn-primary">Follow</a>
                </div>
              </div>
              -->
        </div>
      </div>
      <div class="col mt-5 ms-4">
        <div class="container-fluid">
          <div class="row">
            <div class="col-12 pt-3 shadow rounded">
              <div class="container-fluid">
                <div class="row">
                  <div class="col">
                    <p class="fs-3">Basic Information</p>
                  </div>
                </div>
                <div class="row">
                  <div class="col-6">
                    <p>Age</p>
                    <p><?php echo $newStudent->studentAge ?></p>
                  </div>

                  <div class="col-6">
                    <p>Contact Number</p>
                    <p><?php echo $newStudent->contactNo ?></p>
                  </div>
                </div>
                <div class="row">
                  <div class="col-6">
                    <p>Location</p>
                    <p><?php echo $newStudent->address ?></p>
                  </div>
                  <div class="col-6">
                    <p>Email Address</p>
                    <p><?php echo $newStudent->email ?></p>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-12 shadow rounded mt-5 pt-3">
              <div class="container-fluid">
                <div class="row">
                  <div class="col">
                    <p class="fs-3">Education</p>
                  </div>
                </div>

                <div class="row">
                  <div class="col">
                    <p>Year</p>
                  </div>
                  <div class="col">
                    <p>School</p>
                  </div>
                  <div class="col">
                    <p>Degree</p>
                  </div>
                  <p></p>
                </div>


                <?php while ($eduQuery) { ?>
                  <div class="row">
                    <div class="col">
                      <p><?php echo $eduYear ?></p>
                    </div>
                    <div class="col">
                      <p><?php echo $eduSchool ?></p>
                    </div>
                    <div class="col">
                      <p><?php echo $eduDegree ?></p>
                    </div>
                    <p></p>
                  </div>
                <?php } ?>
                <div class="row">
                  <div class="col d-flex flex-row-reverse mb-3">
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#eduModal">
                      +
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="eduModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Enter Education</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <div class="modal-body">
                            <div class="file-upload-wrapper">
                              <form action="">
                                <label for="">School:</label>
                                <input type="text" class="form-control"><br>
                                <label for="">Degree:</label>
                                <input type="text" class="form-control"><br>
                                <label for="">Year:</label>
                                <input type="text" class="form-control">
                            </div>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary">Save changes</button>
                          </div>
                          </form>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-12 shadow rounded mt-5 pt-3">
              <div class="container-fluid">
                <div class="row">
                  <div class="col">
                    <p class="fs-3">Experience</p>
                  </div>
                </div>

                <div class="row">
                  <div class="col">
                    <p>Year</p>
                  </div>
                  <div class="col">
                    <p>Company Name</p>
                  </div>
                  <div class="col">
                    <p>Job</p>
                  </div>
                  <p></p>
                </div>

                <?php while ($jobQuery) { ?>
                  <div class="row">
                    <div class="col">
                      <p><?php echo $jobYear ?></p>
                    </div>
                    <div class="col">
                      <p><?php echo $jobCompany ?></p>
                    </div>
                    <div class="col">
                      <p><?php echo $jobTitle ?></p>
                    </div>
                    <p></p>
                  </div>
                <?php } ?>



                <div class="row">
                  <div class="col d-flex flex-row-reverse mb-3">
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#companyModal">
                      +
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="companyModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Enter Job Experiences</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <form method="post" action="student-profile.php">
                            <div class="modal-body">
                              <div class="file-upload-wrapper">

                                <label for="">Job Title:</label>
                                <input type="text" class="form-control" id="jobTitle" name="jobTitle"><br>
                                <label for="">Company Name:</label>
                                <input type="text" class="form-control" id="companyName" name="companyName"><br>
                                <label for="">Year:</label>
                                <input type="text" class="form-control" id="jobYear" name="jobYear">
                              </div>
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                              <button type="button" class="btn btn-primary">Save changes</button>
                            </div>
                          </form>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-12 shadow rounded mt-5 pt-3">
              <div class="container-fluid">
                <div class="row">
                  <div class="col">
                    <p class="fs-3">Curriculum Vitae</p>
                  </div>
                </div>

                <div class="row">
                  <div class="col">
                    <p></p>
                  </div>


                  <div class="col d-flex flex-row-reverse mb-3">
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#cvModal">
                      +
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="cvModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Upload File</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <div class="modal-body">
                            <div class="file-upload-wrapper">
                              <input type="file" id="input-file-now" class="file-upload" />
                            </div>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary">Save changes</button>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

                <!--
                      <div class="col d-flex flex-row-reverse">
                        <p>Download</p>
                      </div>
                      -->
              </div>
            </div>
          </div>
        </div>

      </div>
    </div>
  </div>
  </div>


  <div class="container-fluid mt-5 footer border">
    <div class="row">
      <div class="col-2 my-auto text-center">
        <img src="../views/assets/Job-Portal-icon.png" alt="img" height="20%" width="65%">
      </div>
      <div class="col-4 mt-2">
        <ul class="list-unstyled">
          <li class="">
            <p class="footer-toc">Table of Contents</p>
          </li>
          <li class="">
            <a class=" " href="#">Home </a>
          </li>
          <li class="">
            <a class=" " href="#">Find A Job</a>
          </li>
          <li class="">
            <a class="" href="#">About Us</a>
          </li>
          <li class="">
            <a class=" " href="#">Contact</a>
          </li>
        </ul>
      </div>
      <div class="col-4 footer-two">
        <ul class="list-unstyled">
          <li class="">
            <p class="footer-toc "> </p>
          </li>
          <li class="">
            <a class=" " href="#">Career Guides</a>
          </li>
          <li class="">
            <a class=" " href="#">Blog 1</a>
          </li>
          <li class="">
            <a class="" href="#">Blog 2</a>
          </li>
          <li class="">
            <a class=" " href="#">Blog 3</a>
          </li>
        </ul>
      </div>
      <div class="col mt-auto ms-auto footer-cpw">
        <p>Job Portal Solutions © 2023 Grp 2 & 3</p>
        <p>All rights reserved</p>
      </div>
    </div>

  </div>
</body>

</html>