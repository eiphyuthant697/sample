<?php
 $upload_dir = $_SERVER['DOCUMENT_ROOT'].'/pmt/wp-content/uploads/fancy_products_uploads/';

if($_FILES['file']['name'] != ''){
    $str = $_FILES['file']['name'];
    $name = str_replace(' ', '-', $str);
// $name = $_FILES['file']['name'];
    $location = $upload_dir.$name;
    $tmp_name =$_FILES['file']['tmp_name'];
    move_uploaded_file($tmp_name, $location);
    $real_img = 'htpp://localhost/printMyanmar/wp-content/uploads/fancy_products_uploads/'.$name;
    echo $name;
    
    //echo 'done';
}
else {
    echo '';
}