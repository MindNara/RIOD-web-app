<?php 

    $condb = mysqli_connect("localhost", "root", "", "tbwm") or die("Error : ". mysqli_error($condb));
    // ตั้งเป็น utf8
    mysqli_query($condb, "SET NAMES 'utf8' ");
    // ตั้ง time zone
    date_default_timezone_set('Asia/Bangkok');

?>