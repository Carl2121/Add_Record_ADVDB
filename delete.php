<?php 
include 'connect.php';

if (isset($_GET['del'])) {
    $del = $_GET['del'];

    $sql = "DELETE FROM customers WHERE id = $del";
    $result = mysqli_query($conn, $sql) or die("Connection Failed.".$conn->connect_error);

    if($result) {
        header("Location: index2.php?msg=Record_Deleted_Successfully.");
            echo "Record Deleted Successfully.";
    }

    else {
        echo "Not successful.".mysqli_error($conn);
    }
    $conn->close();
}