<?php
    $dbconnect = mysqli_connect("localhost", "root", "", "chictutorial");
    if (mysqli_connect_errno()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
        exit();
    }

?>