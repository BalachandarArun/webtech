<?php
    $cid = $_POST['cid'];

    if ($cid) {
        $conn = new mysqli("localhost", "root", "", "realhomie");
        if ($conn->connect_error) {
            die("connection failed");
        }
        else {
            echo "<h1>Connected successfully!</h1>";
        }
        $result = $conn->query("DELETE FROM HOMESELLER WHERE customerId = $cid");

        if ($result) {
            echo "<script>alert('Record successfully deleted!...')</script>";
        }
        else {
            echo "<script>alert('Record not successfully deleted!...')</script>";
        }
        
    }
    else {
        echo "<script>alert('Enter proper value')</script>";
    }
?>
