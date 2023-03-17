        
    <?php

        $servername = "localhost";
        $username = "root";
        $password = "";
        $database = "jobpost_db";

        //create sql connection
        $conn = mysqli_connect($servername, $username, $password, $database);
        
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
            }

    ?>