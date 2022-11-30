<?php
session_start();

set_time_limit(0);
//ini_set('extension','');

include("../admin/compcode/include/config.php");
require_once '../lib/mysqli.php'; 
include "../admin/compcode/include/connect_db.php";
require_once("../admin/compcode/include/function.php");
require_once '../lib/mailer/mail.php';

if($_SERVER['REQUEST_METHOD']=='POST'){
    $dev_id=mysqli_real_escape_string($condb, $_POST['dev_id']);
    $dev_otp=mysqli_real_escape_string($condb, $_POST['dev_otp']);
    $dev_approve=mysqli_real_escape_string($condb, $_POST['dev_approve']);
    $dev_approve_note=mysqli_real_escape_string($condb, $_POST['dev_approve_note']);
    $dev_approve_name=mysqli_real_escape_string($condb, $_POST['dev_approve_name']);

    $sql=mysqli_query($condb,"select dev_id from develop where dev_id='$dev_id' and dev_otp='$dev_otp'");
    if(mysqli_num_rows($sql) == 1){
        mysqli_query($condb,"update develop set
            dev_approve='$dev_approve',
            dev_approve_date=CURRENT_TIMESTAMP(),
            dev_approve_note='$dev_approve_note',
            dev_approve_name='$dev_approve_name'
            where dev_id='$dev_id'
            and dev_otp='$dev_otp'
        ");

        mysqli_query($condb,"update develop set
            dev_otp='0'
            where dev_id='$dev_id'
        ");
    }else{
        echo 'Error รหัส OTP ไม่ถูกต้อง';
    }
}

mysqli_close($condb);
?>