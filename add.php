<?php
    include "connect.php";

    if (isset($_POST['submit'])) {
        $first_name = $_POST['first_name'];
        $last_name = $_POST['last_name'];
        $job_title = $_POST['job_title'];
        $business_phone = $_POST['business_phone'];
        $fax_number = $_POST['fax_number'];
        $address = $_POST['address'];
        $city = $_POST['city'];
        $state_province = $_POST['state_province'];
        $zip_postal_code = $_POST['zip_postal_code'];
        $country_region = $_POST['country_region'];

        $sql = "INSERT INTO customers (first_name, last_name, job_title, business_phone, fax_number, address, city, state_province, zip_postal_code, country_region) VALUES ('$first_name', '$last_name', '$job_title', '$business_phone', '$fax_number', '$address', '$city', '$state_province', '$zip_postal_code', '$country_region')";
        $result = mysqli_query($conn, $sql) or die("Connection Failed.".$conn->connect_error);

        if ($result) {
            header("Location: index2.php");
        }
        else {
            echo "Not successful.";
        }
    }
$conn->close();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="color-scheme" content="light dark">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.red.min.css">
    <title>Add Records</title>
    <style>
        .form-grid {
            display: grid;
            grid-template-columns: auto 1fr;
            gap: 0.3rem 1rem;
            max-width: 500px;
            margin: auto;
        }
        label {
            margin: 0;
            align-self: center;
        }
        input[type="text"] {
            width: 100%;
        }
        .submit-button {
            grid-column: 1 / span 2;
            text-align: center;
            margin-top: 1rem;
        }
    </style>
</head>
<body>
    <main class="container">
        <form class="form-grid" action="" method="POST">
            <label>First Name:</label><input type="text" name="first_name">
            <label>Last Name:</label><input type="text" name="last_name">
            <label>Job Title:</label><input type="text" name="job_title">
            <label>Business Phone:</label><input type="text" name="business_phone">
            <label>Fax Number:</label><input type="text" name="fax_number">
            <label>Address:</label><input type="text" name="address">
            <label>City:</label><input type="text" name="city">
            <label>State Province:</label><input type="text" name="state_province">
            <label>Zip Postal Code:</label><input type="text" name="zip_postal_code">
            <label>Country:</label><input type="text" name="country_region">
            <div class="submit-button">
                <button type="submit" name="submit">Submit</button>
            </div>
        </form>
    </main>
</body>
</html>
