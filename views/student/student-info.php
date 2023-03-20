<?php

class student
{
  public $studentId;
  public $studentFirstName;
  public $studentLastName;
  public $email;
  public $password;
  public $address;
  public $contactNo;
  public $dateOfBirth;
  public $gender;
  public $studentBio;
  public $education;
  public $jobExp;
  public $profilePicture;
  public $studentCV;


  public function __construct($studentId, $studentFirstName, $studentLastName, $email, $password, $address, $contactNo, $dateOfBirth, $gender, $studentBio, $profilePicture)
  {
    $this->studentId = $studentId;
    $this->studentFirstName = $studentFirstName;
    $this->studentLastName = $studentLastName;
    $this->email = $email;
    $this->password = $password;
    $this->address = $address;
    $this->contactNo = $contactNo;
    $this->dateOfBirth = $dateOfBirth;
    $this->gender = $gender;
    $this->studentBio = $studentBio;
    $this->profilePicture = $profilePicture;
    $this->education = array();
    $this->jobExp = array();
    $this->studentCV = array();
  }

  public function addBackground($degree, $schoolName, $schoolYear)
  {
    $background = array(
      'degree' => $degree,
      'institution' => $schoolName,
      'year' => $schoolYear
    );
    $this->education[] = $background;
  }

  public function addExp($jobTitle, $companyName, $jobYear)
  {
    $background = array(
      'jobTitle' => $jobTitle,
      'companyName' => $companyName,
      'jobYear' => $jobYear
    );
    $this->jobExp[] = $background;
  }

  public function addCV($cvName, $cvType, $cvSize, $cvData)
  {
    $background = array(
      'cvName' => $cvName,
      'cvType' => $cvType,
      'cvSize' => $cvSize,
      'cvData' => $cvData
    );
    $this->studentCV[] = $background;
  }

  public function getExp()
  {
    return $this->jobExp;
  }
  public function getBackgrounds()
  {
    return $this->education;
  }

  public function getCV()
  {
    return $this->studentCV;
  }
  //setters and getters baka tanggalin din to
  // public function getStudentName()
  // {
  //   return $this->studentName;
  // }
  // public function getStudentId()
  // {
  //   return $this->studentId;
  // }
  // public function getAge()
  // {
  //   return $this->studentAge;
  // }
  // public function getEmail()
  // {
  //   return $this->email;
  // }
  // public function getPassword()
  // {
  //   return $this->password;
  // }
  // public function getAddress()
  // {
  //   return $this->address;
  // }
  // public function getContactNo()
  // {
  //   return $this->contactNo;
  // }
  // public function getDateOfBirth()
  // {
  //   return $this->dateOfBirth;
  // }
  // public function getGender()
  // {
  //   return $this->gender;
  // }
  // public function getStudentBio()
  // {
  //   return $this->studentBio;
  // }
  // public function setStudentName($studentName)
  // {
  //   $this->studentName = $studentName;
  // }
  // public function setStudentId($studentId)
  // {
  //   $this->studentId = $studentId;
  // }
  // public function setAge($studentAge)
  // {
  //   $this->studentAge = $studentAge;
  // }
  // public function setEmail($email)
  // {
  //   $this->email = $email;
  // }
  // public function setPassword($password)
  // {
  //   $this->password = $password;
  // }
  // public function setAddress($address)
  // {
  //   $this->address = $address;
  // }
  // public function setContactNo($contactNo)
  // {
  //   $this->contactNo = $contactNo;
  // }
  // public function setDateOfBirth($dateOfBirth)
  // {
  //   $this->dateOfBirth = $dateOfBirth;
  // }

  // public function setGender($gender)
  // {
  //   $this->gender = $gender;
  // }
  // public function setStudentBio($studentBio)
  // {
  //   $this->studentBio = $studentBio;
  // }
};

// include 'login-student.php';
include '../config.php';
$studentId = "2161";

$query = "SELECT * FROM Student WHERE studentID = '$studentId'";
echo $studentId;
//sort by year
$eduQuery = "SELECT * FROM eduBackground WHERE studentID = '$studentId' ORDER BY eduYear DESC";

$jobQuery = "SELECT * FROM jobExp WHERE studentID = '$studentId' ORDER BY jobYear DESC";

$studentCVquery = "SELECT * FROM studentCV WHERE studentID = '$studentId'";

$result = $conn->query($query);
$row = $result->fetch_assoc();

$eduresult = $conn->query($eduQuery);
$edurow = $eduresult->fetch_all();

$jobresult = $conn->query($jobQuery);
$jobrow = $jobresult->fetch_assoc();

$studentCVresult = $conn->query($studentCVquery);
$studentCVrow = $studentCVresult->fetch_assoc();

//Student Info
$studentFirstName = $row["studentFirstName"];
$studentLastName = $row['studentLastName'];
$studentName = $studentFirstName . ' ' . $studentLastName;
$email = $row["email"];
$address = $row["Address"];
$contactNo = $row["contactNo"];
$password = $row["Password"];
$dateOfBirth = 121231;
$gender = $row["Gender"];
$studentBio = $row["Bio"];
$profilePicture = "";
//Job Experiences
$jobTitle = $jobrow["jobTitle"];
$jobCompany = $jobrow["companyName"];
$jobYear = $jobrow["jobYear"];


$newStudent = new student($studentId, $studentFirstName, $studentLastName, $email, $password, $address, $contactNo, $dateOfBirth, $gender, $studentBio, $profilePicture);


foreach ($eduresult as $edurow) {
  $eduSchool = $edurow["schoolName"];
  $eduYear = $edurow["eduYear"];
  $eduDegree = $edurow["Degree"];

  $newStudent->addBackground($eduDegree, $eduSchool, $eduYear);
}

foreach ($jobresult as $jobrow) {
  $jobTitle = $jobrow["jobTitle"];
  $jobCompany = $jobrow["companyName"];
  $jobYear = $jobrow["jobYear"];;

  $newStudent->addExp($jobTitle, $jobCompany, $jobYear);
}

foreach ($studentCVresult as $studentCVrow) {
  $cvName = $studentCVrow['cvName'];
  $cvType = $studentCVrow['cvType'];
  $cvSize = $studentCVrow['cvSize'];
  $cvData = $studentCVrow['cvData'];

  $newStudent->addCV($cvName, $cvType, $cvSize, $cvData);
}



if (!$result) {
  die("Invalid query: " . $conn->error);
};
$conn->close();
