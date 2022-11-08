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
    mysqli_query($condb,"update develop set
        dev_approve='',
        dev_approve_date=CURRENT_TIMESTAMP(),
        dev_approve_note='',
        dev_approve_name=''
        where dev_id=''
        and dev_otp=''
    ");

    mysqli_query($condb,"update develop set
        dev_otp='0'
        where dev_id=''
    ");
}

mysqli_close($condb);
?>