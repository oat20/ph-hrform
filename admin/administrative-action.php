<?php
session_start();

include("./compcode/include/config.php");
require_once '../lib/mysqli.php';
include('./compcode/include/connect_db.php');
include('./compcode/include/function.php');

if($_SERVER['REQUEST_METHOD'] === 'POST'){

    $sql = mysqli_query($condb, "select per_id from $db_eform.personel_muerp where per_email like '$_POST[mumail]'");
    $row = mysqli_fetch_assoc($sql);

    if(empty($_POST['de_id']) and $_POST['action'] == 'insert'){
        mysqli_query($condb, "insert into $db_eform.per_deanposition (do_title, do_active) 
            values ('$_POST[do_title]', '$_POST[do_active]')");
        
            $do_id = mysqli_insert_id($condb);
        mysqli_query($condb, "insert into $db_eform.per_dean (per_id, do_id, de_datestamp)
            values ('$row[per_id]', '$do_id', CURRENT_TIMESTAMP())");
    }else if($_POST['de_id'] != '' and $_POST['action'] == 'insert'){
        mysqli_query($condb, "update $db_eform.per_deanposition 
        set do_title = '$_POST[do_title]', 
        do_active = '$_POST[do_active]' 
        where do_id = '$_POST[do_id]'");

        $sql = "UPDATE $db_eform.per_dean 
            SET do_id = '$_POST[do_id]',
            per_id = '$row[per_id]',
            de_datestamp = CURRENT_TIMESTAMP()
            WHERE de_id = '$_POST[de_id]'";
        $result = mysqli_query($condb, $sql);
    }else if($_POST['id'] != '' and $_POST['action'] == 'delete'){
        mysqli_query($condb, "delete from $db_eform.per_dean where de_id = '".$_POST['id']."'");
    }

    mysqli_query($condb, "update $db_eform.personel_muerp 
        set per_isdean = '0', 
        per_modify = CURRENT_TIMESTAMP()");
    mysqli_query($condb, "update $db_eform.per_dean as t1, 
        $db_eform.personel_muerp as t2 
        set t2.per_isdean = '1',
        t2.per_modify = CURRENT_TIMESTAMP()
        where t1.per_id = t2.per_id");

    mysqli_close($condb);

    header("location: ./administrative.php");
}else{
    exit();
}
?>