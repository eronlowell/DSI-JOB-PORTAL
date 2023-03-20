<?php
 $conn = new mysqli('localhost', 'root', '', 'jobpost_db');
 if($conn->connect_error){
     die('Connection Failed : '.$conn->connect_error);
 }
 ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/styles.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://kit.fontawesome.com/d96e1e0d74.css" crossorigin="anonymous">
  <title>Post a Job | Employer</title>


</head>


<body style="background-image: url('assets/postjob.jpg');">

  <include src= "company-header.html"> </include>

  <div id="PostJobCon" class="container-sm mt-5 py-5 p-5 bg-light login-form">
    <form method= "post" action= "jobs_edit_connect.php">
        <?php
            
            $id = $_GET['id'];
            $sql = mysqli_query($conn, "SELECT * FROM jobpost WHERE id = '$id'");
            while($row=mysqli_fetch_array($sql)){

        ?>

      <div class="form-group">
        <input type="hidden" name="id" value="<?php echo $id; ?>">
      </div>

      <div class="form-group">
        <label for="job_status">Job Status</label> <br> 
        <select id="job_status" name="job_status" value= "<?php echo $row['job_status']; ?>">
            <option value="active"> Active  </option>
            <option value="inactive"> Inactive  </option>        
        </select>
      </div> <br>
      
      <div class="form-group">
        <label for="company_logo">Company Logo</label> <br>
        <input type="file" class="file-upload-input" onchange="readURL(this)" accept="Image/*" name="company_logo" value = "<?php echo $row['company_logo']; ?>">
      </div>
      <br>

      <div class="form-group">
        <label for="job_title">Job Title</label>
        <input type="text" class="form-control" name= "job_title" id="job_title" placeholder="Enter Job Title"
        value = "<?php echo $row['job_title']; ?>">
      </div>
      <br>

      <div>
        <label for="job_summary">Job Summary</label>
        <textarea id="job_summary" class="form-control" name="job_summary" value= "<?php echo $row['job_summary']; ?>" rows="8" cols="50"></textarea>
      </div> <br>

      <div>
        <label for="key_responsibility">Key Responsibilities</label>
        <textarea id="key_responsibility" class="form-control" name="key_responsibility" value= "<?php echo $row['key_responsibility']; ?>" rows="8" cols="50"></textarea>
      </div> <br>

      <div>
        <label for="job_reqs">Job Requirements</label>
        <textarea id="job_reqs" class="form-control" name="job_reqs" value= "<?php echo $row['job_reqs']; ?>"  rows="8" cols="50"></textarea>
      </div> <br>

      <div class="form-group">
        <label for="skills">Skills</label>
        <input type="text" name= "skills" class="form-control" placeholder="Enter Skills"
        value = "<?php echo $row['skills']; ?>">
      </div>
      <br>

      <div class="form-group">
        <label for="job_category">Job Category</label> <br> <br>
        <select id="job_category" name="job_category">
            <option value="none"> Choose Job Category  </option>
            <option value="business"> Business and Financial Services  </option>
            <option value="construction"> Construction  </option>
            <option value="education"> Education  </option>
            <option value="restaurant"> Food & Beverage/Catering/Restaurant </option>
            <option value="health"> Health, Pharmaceuticals, and Biotech </option>
            <option value="hospitality"> Hospitality </option>
            <option value="it"> Information Technology </option>
            <option value="law"> Law Firm </option>
            <option value="estate"> Real Estate </option>
            <option value="transpo"> Transportation/Logistics  </option>
            <option value="distribution"> Wholesale/Retail and Distribution  </option>
        </select>
      </div>
      <br>

      <div class="form-group">
        <label for="job_type">Job Type</label> <br> <br>
        <select id="job_type" name="job_type">
            <option value="Full-Time"> Full-Time </option>
            <option value="Part-Time"> Part-Time </option>
        </select>
      </div>
      <br>

      <div class="form-group">
        <label for="exampleInputEmail1salary">Salary</label>
        <input type="tel" name= "salary" class="form-control" 
        value = "<?php echo $row['salary']; ?>">
      </div>
      <br>

      <?php } ?>

      <br>
      <button type="post" name ="update" class="btn btn-primary">Update</button>
    </form>
  </div>

  <br> <br>
  <include src= "company-footer.html"> </include>
</body>

</html>