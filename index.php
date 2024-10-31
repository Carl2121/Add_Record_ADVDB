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
        echo "<h1>WDBA Hands on Activity-2: HEREDERO</h1>";
        echo "<br>";  
        
        // Table 1
        echo "<h2>Table 1 - All records from customers who are living in one specific city. (New York)</h2>";

        $sql = 'SELECT
                  id as "ID",
                  CONCAT(first_name, " ", last_name) as "Full Name",
                  job_title as "Job Title",
                  business_phone as "Business Phone",
                  address as "Address",
                  city as "City",
                  state_province as "State Province",
                  country_region as "Country"
                FROM customers 
                WHERE city = "New York";';

        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
          echo "<table border='1' cellspacing='0' cellpadding='0'> 
                  <tr>
                    <th>ID</th>
                    <th>FULL NAME</th>
                    <th>JOB TITLE</th>
                    <th>BUSINESS PHONE</th>
                    <th>ADDRESS</th>
                    <th>CITY</th>
                    <th>STATE PROVINCE</th>
                    <th>COUNTRY</th>
                  </tr>";

          while ($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>{$row['ID']}</td>
                    <td>{$row['Full Name']}</td>
                    <td>{$row['Job Title']}</td>
                    <td>{$row['Business Phone']}</td>
                    <td>{$row['Address']}</td>
                    <td>{$row['City']}</td>
                    <td>{$row['State Province']}</td>
                    <td>{$row['Country']}</td>
                  </tr>";
          }
          echo "</table>";
        } else {
          echo "0 results";
        }

        echo "<br>";

        // Table 2
        echo "<h2>Table 2 - All records from order_details with the status of invoiced.</h2>";

        $sql_2 = 'SELECT 
                    order_details.id as "ID", 
                    order_details.order_id as "Order ID", 
                    order_details.product_id as "Product ID", 
                    order_details.quantity as "Quantity", 
                    order_details.unit_price as "Unit Price", 
                    order_details.discount as "Discount", 
                    order_details.status_id as "Status ID", 
                    order_details.purchase_order_id as "Purchase Order ID", 
                    order_details.inventory_id as "Inventory ID", 
                    order_details_status.status_name as "Status Name"
                  FROM order_details
                  INNER JOIN order_details_status
                  ON order_details.status_id = order_details_status.id
                  WHERE status_name = "Invoiced";';

        $result2 = $conn->query($sql_2);

        if ($result2->num_rows > 0) {
          echo "<table border='1' cellspacing='0' cellpadding='0'> 
                  <tr>
                    <th>ID</th>
                    <th>ORDER ID</th>
                    <th>PRODUCT ID</th>
                    <th>QUANTITY</th>
                    <th>UNIT PRICE</th>
                    <th>DISCOUNT</th>
                    <th>STATUS ID</th>
                    <th>PURCHASE ORDER ID</th>
                    <th>INVENTORY ID</th>
                    <th>STATUS NAME</th>
                  </tr>";

          while ($row2 = $result2->fetch_assoc()) {
            echo "<tr>
                    <td>{$row2['ID']}</td>
                    <td>{$row2['Order ID']}</td>
                    <td>{$row2['Product ID']}</td>
                    <td>{$row2['Quantity']}</td>
                    <td>{$row2['Unit Price']}</td>
                    <td>{$row2['Discount']}</td>
                    <td>{$row2['Status ID']}</td>
                    <td>{$row2['Purchase Order ID']}</td>
                    <td>{$row2['Inventory ID']}</td>
                    <td>{$row2['Status Name']}</td>
                  </tr>";
          }
          echo "</table>";
        } else {
          echo "0 results";
        }

        echo "<br>";

        // Table 3
        echo "<h2>Table 3 - Two to three columns and records each from suppliers, purchase_orders, and purchase_order_details.</h2>";

        $sql_3 = 'SELECT 
                    suppliers.company as "Supplier Company",
                    suppliers.business_phone as "Business Phone",
                    suppliers.city as "City",
                    purchase_orders.creation_date as "Order Creation Date",
                    purchase_orders.status_id as "Order Status ID",
                    purchase_orders.payment_amount as "Payment Amount",
                    purchase_order_details.product_id as "Product ID",
                    purchase_order_details.quantity as "Quantity",
                    purchase_order_details.unit_cost as "Unit Cost"
                  FROM purchase_order_details
                  INNER JOIN purchase_orders 
                    ON purchase_order_details.purchase_order_id = purchase_orders.id
                  INNER JOIN suppliers 
                    ON purchase_orders.supplier_id = suppliers.id;';

        $result3 = $conn->query($sql_3);

        if ($result3->num_rows > 0) {
          echo "<table border='1' cellspacing='0' cellpadding='0'> 
                  <tr>
                    <th>SUPPLIER COMPANY</th>
                    <th>BUSINESS PHONE</th>
                    <th>CITY</th>
                    <th>ORDER CREATION DATE</th>
                    <th>ORDER STATUS ID</th>
                    <th>PAYMENT AMOUNT</th>
                    <th>PRODUCT ID</th>
                    <th>QUANTITY</th>
                    <th>UNIT COST</th>
                  </tr>";

          while ($row3 = $result3->fetch_assoc()) {
            echo "<tr>
                    <td>{$row3['Supplier Company']}</td>
                    <td>{$row3['Business Phone']}</td>
                    <td>{$row3['City']}</td>
                    <td>{$row3['Order Creation Date']}</td>
                    <td>{$row3['Order Status ID']}</td>
                    <td>{$row3['Payment Amount']}</td>
                    <td>{$row3['Product ID']}</td>
                    <td>{$row3['Quantity']}</td>
                    <td>{$row3['Unit Cost']}</td>
                  </tr>";
          }
          echo "</table>";
        } else {
          echo "0 results";
        }
      ?>
    </main>
  </body>
</html>
