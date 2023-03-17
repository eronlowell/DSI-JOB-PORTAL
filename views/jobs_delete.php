<?php
if (isset ($_GET['id'])){
    $id = $_GET["id"];
    $conn = new mysqli("localhost", "root", "", "jobpost_db");

    $sql = "DELETE FROM jobpost WHERE id=$id";
    $conn->query($sql);
}

header("location:jobs.php");
exit;
?>