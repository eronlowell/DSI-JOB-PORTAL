<!DOCTYPE html>
<html lang="en">

<?php 

include 'student-login.php';

?>


<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/styles.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
    <title>JOB PORTAL</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #800;">
        <div class="container-fluid">
            <a class="navbar-brand logo" href="index.html">
                <img src="../icon-3.png" alt="" width="60" height="40" class="d-inline-block align-text-top">
                Job Portal
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo01"
                aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
                <ul class="navbar-nav mx-auto">

                    <li class="nav-item">
                        <a class="nav-link ms-5" href="find-job.php">Find A Job</a>
                    </li>
                    <li class="nav-item mx-5">
                        <a class="nav-link " href="company-profile.html">Company Profiles</a>
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
            <div class="col text-center mt-5">
                <p class="fs-1">
                    Edit Profile
                </p>
            </div>
        </div>

        <div class="row">
            <div class="col text-center">
                <p class="fs-5">
                    Remember, only put your LEGITIMATE INFORMATION here.
                </p>
            </div>
        </div>

        <div class="row">
            <div class="col mt-5">
                <p class="fs-3">
                    Personal Information:
                </p>
            </div>
        </div>

        <form>
            <div class="row mb-3">
                <label for="" class="mb-2">Name:</label>
                <div class="col-auto ">
                <input class="form-control" type="text" placeholder="><?php echo $newStudent->studentName ?>" aria-label="Disabled input example" disabled>
                </div>
            </div>

            <div class="row">
            <div class="row">
            <div class="col text-center mt-5">
                <p class="fs-1">
                    Edit Profile
                </p>
            </div>
        </div>


                <div class="col-6">
                    <label for="" class="mb-2">Email Address:</label><br>
                    <input class="form-control mb-3" type="text" placeholder="Email Address">
                    <label for="" class="mb-2">Contact Number:</label><br>
                    <input class="form-control mb-3" type="text" placeholder="Contact Number">
                    <label for="" class="mb-2">Birthdate:</label><br>
                    <select class="form-control-sm mb-3" name="day" id="day"></select>
                    <select class="form-control-sm mb-3" name="month" id="month"></select>
                    <select class="form-control-sm mb-3" name="year" id="year" class="mb-3"></select><br>
                    <label for="" class="mb-2">Sex:</label><br>
                    <div class="form-check">
                        <input type="radio" class="form-check-input" id="radio1" name="optradio" value="option1"
                            checked>Male
                        <label class="form-check-label" for="radio1"></label>
                    </div>
                    <div class="form-check">
                        <input type="radio" class="form-check-input" id="radio2" name="optradio" value="option2">Female
                        <label class="form-check-label" for="radio2"></label>
                    </div>
                    <div class="form-check">
                        <input type="radio" class="form-check-input" id="radio3" name="optradio" value="option3">Prefer
                        not to say
                        <label class="form-check-label" for="radio3"></label>
                    </div>

                    <label for="" class="mb-2 mt-3">Address:</label><br>
                    <input class="form-control mb-3" type="text" placeholder="Address">


                    <label for="exampleFormControlTextarea1" class="form-label">Bio:</label>
                    <textarea class="form-control mb-3" id="exampleFormControlTextarea1" rows="3"></textarea>


                </div>
                <div class=" col-6">

                <input type="file" name="fileToUpload" id="fileToUpload">
                       
                <?php
                $target_dir = "uploads/";
                $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
                $uploadOk = 1;
                $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

                // Check if image file is a actual image or fake image
                if(isset($_POST["submit"])) {
                $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
                if($check !== false) {
                    echo "File is an image - " . $check["mime"] . ".";
                    $uploadOk = 1;
                } else {
                    echo "File is not an image.";
                    $uploadOk = 0;
                }
                }

                // Check if file already exists
                if (file_exists($target_file)) {
                echo "Sorry, file already exists.";
                $uploadOk = 0;
                }

                // Check file size
                if ($_FILES["fileToUpload"]["size"] > 500000) {
                echo "Sorry, your file is too large.";
                $uploadOk = 0;
                }

                // Allow certain file formats
                if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
                && $imageFileType != "gif" ) {
                echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
                $uploadOk = 0;
                }

                // Check if $uploadOk is set to 0 by an error
                if ($uploadOk == 0) {
                echo "Sorry, your file was not uploaded.";
                // if everything is ok, try to upload file
                } else {
                if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                    echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
                } else {
                    echo "Sorry, there was an error uploading your file.";
                }
                }
                ?>



                </div>
            </div>

            <div class="row">
                <div class="col-6 d-flex flex-row-reverse">
                    <button class="btn btn-danger ms-auto">
                        Discard
                    </button>
                </div>
                <div class="col-6">
                    <button class="btn btn-primary d-flex flex-row">
                        Save
                    </button>
                </div>
            </div>
        </form>

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
    <script src="../scripts/datepicker.js"></script>
</body>

</html>