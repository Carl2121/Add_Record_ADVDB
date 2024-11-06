<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="color-scheme" content="light dark">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.red.min.css">
    <title>Northwind</title>
  </head>
  <body>
    <main class="container">
      <?php
        include "connect.php";
        echo "<h1>WDBA Hands on Activity-3: HEREDERO and ARNEJO</h1>";
        echo "<br>";  
        
        // Table 1
        echo "<h2>Table 1 - All records from the customers table </h2>";

        $sql = 'SELECT
                  id as "ID",
                  CONCAT(first_name, " ", last_name) as "Full Name",
                  job_title as "Job Title",
                  business_phone as "Business Phone",
                  fax_number as "Fax Number",
                  address as "Address",
                  city as "City",
                  state_province as "State Province",
                  zip_postal_code as "Zip Code",
                  country_region as "Country"
                FROM customers
                ORDER BY id DESC
                LIMIT 10;';

        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
          echo "<table border='1' cellspacing='0' cellpadding='0'> 
                  <tr>
                    <th>ID</th>
                    <th>FULL NAME</th>
                    <th>JOB TITLE</th>
                    <th>BUSINESS PHONE</th>
                    <th>FAX NUMBER</th>
                    <th>ADDRESS</th>
                    <th>CITY</th>
                    <th>STATE PROVINCE</th>
                    <th>ZIP CODE</th>
                    <th>COUNTRY</th>
                  </tr>";

          while ($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>{$row['ID']}</td>
                    <td>{$row['Full Name']}</td>
                    <td>{$row['Job Title']}</td>
                    <td>{$row['Business Phone']}</td>
                    <td>{$row['Fax Number']}</td>
                    <td>{$row['Address']}</td>
                    <td>{$row['City']}</td>
                    <td>{$row['State Province']}</td>
                    <td>{$row['Zip Code']}</td>
                    <td>{$row['Country']}</td>
                    <td><a href=edit.php?edit={$row['ID']}>EDIT</a> 
                    <a href=delete.php?del={$row['ID']}>DELETE</a></td>
                  </tr>";
          }
          echo "</table>";
        } else {
          echo "0 results";
        }


        echo "<br>";

          ?>
        <a href="add.php">ADD NEW RECORD</a>
    </main>
  </body>
</html>
