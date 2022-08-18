
<?php
$requestCode = $_REQUEST['trackingCode'];
$requestMail = $_REQUEST['mail'];

//echo $requestCode;

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

   $sql = "SELECT posted_data FROM wp_cpappbk_messages where notifyto='".$requestMail."'";

   //echo $sql;
   $result = $conn->query($sql);

   if ($result->num_rows > 0) {
      while($row = $result->fetch_assoc()) {
         $posted_data = unserialize($row["posted_data"]);    
         if($posted_data["fieldname7"] == $requestCode){ 
            $show_status = ''; 
            if($posted_data["app_status_1"] != ""){
                $show_status = '<span>'.$posted_data["app_status_1"].'</span>';  
            }
            else{
                $show_status = '<span>Approved</span>';
            }
            $deliveredProof = ''; 
            if($posted_data["payment_type"] != ""){
                $deliveredProof = '<div class="deliveredProof"><p id="shipment-information-header" class="header-title"><strong>Shipment Information</strong></p><img src="'.$posted_data["payment_type"].'"/></div>';  
            }
            else{
                $deliveredProof = '';
            }
            echo '<div class="tracking-status"><p>SHIPMENT STATUS : '.$show_status.'</p></div><div class="shipper-info"><div class="cl-6 detail-section"><p id="shipper-header" class="header-title"><strong>Shipper Information</strong></p><ul><li class="shipper-name">Name : <span>'.$posted_data["fieldname2"].'</span> </li><li class="shipper-phone">Phone : <span>'.$posted_data["fieldname3"].'</span> </li><li class="shipper-address">Address : <span>'.$posted_data["fieldname10"].'</span> </li><li class="shipper-email">Email : <span>'.$posted_data["email"].'</span> </li></ul></div><div class="cl-6 detail-section"><p id="receiver-header" class="header-title"><strong>Receiver Information</strong></p><ul><li class="receiver-name">Name : <span>'.$posted_data["fieldname13"].'</span> </li><li class="receiver-phone">Phone : <span>'.$posted_data["fieldname12"].'</span> </li><li class="receiver-address">Address : <span>'.$posted_data["fieldname11"].'</span> </li></ul></div></div><div class="shipment-info"><p id="shipment-information-header" class="header-title"><strong>Shipment Information</strong></p><div class="sp-info-wrap"><div class="sp-info"><ul><li class="shipment-origin">Origin : <span>'.$posted_data["fieldname5"].'</span> </li><li class="shipment-pkdf">Pick up or Drop Off : <span>'.$posted_data["fieldname9"].'</span> </li></ul></div><div class="sp-info"><ul><li class="shipment-destination">Destination : <span>'.$posted_data["fieldname6"].'</span></li><li class="shipment-status">Status : <span id="form-status">'.$show_status.'</span></li></ul></div><div class="sp-info"><ul><li class="shipment-package">Packages : <span>'.$posted_data["fieldname8"].'</span> </li></ul></div></div></div>'. $deliveredProof;
        }
                
         //echo $row["posted_data"];
         //echo 'blarerwarfawed\n\n';
      }
   } else {
      echo '<div class="alert-td">Please Go with the Link in the Mail We Gave!</div>';
   }
$conn->close();
?>



