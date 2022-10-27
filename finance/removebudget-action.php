<?php
session_start();

include('../admin/compcode/include/config.php');
include('../admin/compcode/check_login.php');
require_once '../lib/mysqli.php';
include('../admin/compcode/include/connect_db.php');

mysqli_query($condb,"delete from $db_eform.department_budget where db_year='$_GET[db_year]'");

header('location: index.php');
?>