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
    $dev_approvebyboss=mysqli_real_escape_string($condb, $_POST['dev_approvebyboss']);
    $dev_approvebyboss_note=mysqli_real_escape_string($condb, $_POST['dev_approvebyboss_note']);
    $dev_approvebyboss_name=mysqli_real_escape_string($condb, $_POST['dev_approvebyboss_name']);

    $sql=mysqli_query($condb,"select dev_id from develop where dev_id='$dev_id' and dev_otp='$dev_otp'");
    if(mysqli_num_rows($sql) == 1){
        $result1=mysqli_query($condb,"update develop set
            dev_approvebyboss='$dev_approvebyboss',
            dev_approvebyboss_date=CURRENT_TIMESTAMP(),
            dev_approvebyboss_note='$dev_approvebyboss_note',
            dev_approvebyboss_name='$dev_approvebyboss_name'
            where dev_id='$dev_id'
            and dev_otp='$dev_otp'
        ");

        $result2=mysqli_query($condb,"update develop set
            dev_otp='0'
            where dev_id='$dev_otp'
        ");
    }else{
        echo 'Error รหัส OTP ไม่ถูกต้อง';
    }
}

mysqli_close($condb);
?>