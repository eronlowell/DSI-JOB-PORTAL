<?php
session_start();

    include 'utility/connection.php';
    include 'utility/functions.php';

    if($_SERVER['REQUEST_METHOD'] == "POST")
    {
        //Something was posted
        $businessEmail = $_POST['businessEmail'];
        $pass = $_POST['pass'];

        if(!empty($businessEmail) && !empty($pass) && !is_numeric($businessEmail))
        {
            //read from database
            $query = "select * from employer where businessEmail = '$businessEmail' limit 1";
            $result = mysqli_query($conn, $query);
            
            if($result){
              if($result && mysqli_num_rows($result) > 0)
              {
                  $user_data = mysqli_fetch_assoc($result);

                  if($user_data['pass'] === $pass)
                  {
                    $_SESSION['id'] = $user_data['id'];
                    header("Location: student/index.html");
                    die;
                  }else
                  {
                    echo "<div class='alert alert-danger d-flex align-items-center' role='alert'>
                    <svg class='bi flex-shrink-0 me-2' width='24' height='24' role='img' aria-label='Danger:'><use xlink:href='#exclamation-triangle-fill'/></svg>
                    <div>
                      Invalid password
                    </div>
                    </div>";
                  }
              }
            }

        }else
        {
          echo "<div class='alert alert-danger d-flex align-items-center' role='alert'>
          <svg class='bi flex-shrink-0 me-2' width='24' height='24' role='img' aria-label='Danger:'><use xlink:href='#exclamation-triangle-fill'/></svg>
          <div>
            Invalid Username
          </div>
          </div>";
        }

    }


?>
