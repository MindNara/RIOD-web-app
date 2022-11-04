<?php 

    $condb = mysqli_connect("localhost", "root", "", "tbwm") or die("Error : ". mysqli_error($condb));
    // set utf8
    mysqli_query($condb, "SET NAMES 'utf8' ");
    // set time zone
    date_default_timezone_set('Asia/Bangkok');

?>