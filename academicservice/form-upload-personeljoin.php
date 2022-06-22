<?php
session_start();

include('../admin/compcode/include/config.php');
include('../admin/compcode/check_login.php');
include('../admin/compcode/include/connect_db.php');
include('../admin/compcode/include/function.php');
?>
<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<?php include('../lib/css-inc.php');?>
</head>

<body>
<?php include('../inc/navbar02-inc.php');?>

<div class="container">

	<div class="panel panel-primary">
        <div class="panel-heading"><i class="glyphicon glyphicon-upload"></i> Upload Excel File บุคลากรผู้เข้าร่วม (Optional)</div>
        <div class="panel-body">
            <div class="form-group">
                <!--<label class="control-label"><i class="glyphicon glyphicon-upload"></i> Upload Excel Template:</label>-->
                <input id="personel-excel" type="file" class="file file-loading" name="personelExcel" data-allowed-file-extensions='["xls", "xlsx"]' data-show-upload="true">
                <div id="msg-alert"></div>
                <span class="help-block"><a href="upload/template_excel.xlsx" target="_blank"><i class="glyphicon glyphicon-download-alt"></i> Download Excel Template</a></span>
            </div>
            <!--<div class="form-group">
                <?php					
                    /*$sql = mysql_query("select * from $db_eform.personel_muerp as t1
                            inner join $db_eform.job as t3 on (t1.job_id = t3.job_id)
                            inner join $db_eform.personel_status as t4 on (t1.per_status = t4.ps_id)
                            where t1.per_dept = '$_SESSION[ses_per_dept]'
                            and t4.ps_flag = '1'
                            order by t1.per_adddate asc");
                while($ob = mysql_fetch_assoc($sql)){
                    if($_SESSION['ses_per_id']==$ob['per_id']){
                        print '<label class="checkbox primary">
                            <input type="checkbox" data-toggle="checkbox" value="'.$ob['per_id'].'" name="per_id[]" checked> '.$ob['per_pname'].$ob['per_fnamet'].' '.$ob['per_lnamet'].' ('.$ob['job_name'].')
                        </label>';
                    }else{
                        print '<label class="checkbox primary">
                            <input type="checkbox" data-toggle="checkbox" value="'.$ob['per_id'].'" name="per_id[]"> '.$ob['per_pname'].$ob['per_fnamet'].' '.$ob['per_lnamet'].' ('.$ob['job_name'].')
                        </label>';
                    }
                }*/
                ?>
            </div>--><!--form-group-->
        </div><!--body-->
        <div class="table-responsive">
            <table class="table table-bordered table-striped font-14">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>ชื่อ - สกุล</th>
                        <th>ส่วนงาน</th>
                        <th>ลบ</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                </tbody>
            </table>
        </div><!--table-->
    </div><!--panel-->

</div><!--container-->

<?php include('../lib/js-inc.php');?>
<script>
$("#personel-excel").fileinput({
	language: 'th',
	maxFileSize: 1024*2,
	showPreview: false,
	elErrorContainer: "#msg-alert",
});
</script>
</body>
</html>