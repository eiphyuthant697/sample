<?php
if( $_REQUEST["name"] ) {

   $name = $_REQUEST['name'];
   echo "Welcome ". $name;
}

global $wpdb;
$calendars = $wpdb->get_results( 'SELECT * FROM '.$wpdb->prefix . 'cte');
echo '<div class="tracking_codes">';
foreach($calendars as $item)
echo '<option value="'.$item->job.'"   datacountry="'.$item->name.'"   datadatestart="'.$item->lastname.'"   dataenddate="'.$item->email.'">'.$item->job.'</option>';
echo '</div>';

?>