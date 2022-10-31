<?php
session_start();

include("../admin/compcode/include/config.php");
require_once '../lib/mysqli.php'; 
include "../admin/compcode/include/connect_db.php";
require_once("../admin/compcode/include/function.php");

//upload attachment
		if(!empty($_FILES['file']['name'])){
			$dev_filename = $_POST['dev_id'].'-'.date('YmdHis').random_password(2).attachDocType($_FILES['file']['type']);

            $sql=mysqli_query($condb,"select dev_att_id from develop_attachment where dev_id='".$_POST['dev_id']."' and dev_filecategory like 'Report'");
            if(mysqli_num_rows($sql) > 0){
			mysqli_query($condb, "update develop_attachment set
				dev_filename='$dev_filename',
				dev_filetype='$_FILES[file][type]',
				dev_filesize='$_FILES[file][size]'
				where dev_id='$_POST[dev_id]'
				and dev_filecategory='Report'
			");
            }else{
                mysqli_query($condb, "insert into $db_eform.develop_attachment 
				values ('', '".$_POST['dev_id']."', '$dev_filename', '$_FILES[file][type]', '$_FILES[file][size]', 'Report')
			");
            }

			move_uploaded_file($_FILES['file']['temp_name'], "../phpm/attachment/".$dev_filename);
		}

        mysqli_close($condb);
?>