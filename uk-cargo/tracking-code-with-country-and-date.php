<?php
$requestcountry = $_REQUEST['country'];
$requestdate = $_REQUEST['date'];
$lowercountry = strtolower($requestcountry);
$country = trim($lowercountry);
//echo $requestdate;

$servername = "localhost";
$username = "cp557932_uk_cust";
$password = "fSGyrMQ{B)a";
$dbname = "cp557932_uk_cargo";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
   // Check connection
   if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
   }

   $sql = "SELECT job FROM wp_cte where name='".$country."' and '". $requestdate ."' >= lastname and '". $requestdate ."' <= email";

   //echo $sql;
   $result = $conn->query($sql);

   if ($result->num_rows > 0) {
      while($row = $result->fetch_assoc()) {
         echo $row["job"];
      }
   } else {
      echo "No Code";
   }
$conn->close();
?>
