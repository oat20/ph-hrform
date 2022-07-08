<?php
session_start();
include('../admin/compcode/include/config.php');
include('../admin/compcode/check_login.php');
require_once '../lib/mysqli.php';
include('../admin/compcode/include/connect_db.php');
include('../admin/compcode/include/function.php');
?>
<!DOCTYPE HTML>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title><?php echo $titlebar['title'];?></title>
<?php include('../lib/css-inc.php');?>
</head>

<body>
<div class="container">
	<div class="space1"></div>
    
    <div class="row">
    	<div class="col-sm-10 col-sm-offset-1">
    
    <div class="panel panel-danger">
    	<div class="panel-heading">
        	<h3 class="panel-title"><a href="../profile/_showmyproject.php"><i class="fa fa-arrow-left fa-fw"></i> ยกเลิกแบบฟอร์มอนุมัติพัฒนาบุคลากร</a></h3>
        </div>
        <div class="panel-body">
        	<?php
			$sql1=mysqli_query($condb, "select * from $db_eform.develop
				where dev_id='$_GET[dev_id]'");
			$rs1=mysqli_fetch_assoc($sql1);
        	echo '<blockquote>
              <p>Form No. '.$rs1['dev_id'].'<br><strong>เรื่อง/โครงการ</strong> '.$rs1['dev_onus'].' ระหว่างวันที่ '.dateformat_03($rs1['dev_stdate']).' ถึง '.dateformat_03($rs1['dev_enddate']).'</p>
            </blockquote>';
			?>
        	<form class="form-horizontal" method="post" action="<?php echo $_SERVER['PHP_SELF'];?>" id="formDefault">
            	 <div class="form-group">
                            <label class="control-label col-sm-2">ยกเลิกแบบฟอร์ม:</label>
                            <div class="col-sm-10">
                            <select name="dev_cancel" class="form-control select select-danger select-sm" data-toggle="select" required>
                                <?php
                                foreach($cf_cancel_msg as $k=>$v){
                                    if($rs1['dev_cancel']==$k){
                                        echo '<option value="'.$k.'" selected>'.$v['name'].'</option>';
                                    }else{
                                        echo '<option value="'.$k.'">'.$v['name'].'</option>';
                                    }
                                }
                                ?>
                            </select>
                            </div>
                </div><!--form-group-->
                
                <div class="form-group">
                                        	<?php
							$qCancel=mysqli_query($condb, "select * from $db_eform.develop_cancel where dev_id='$rs1[dev_id]'");
							$rCancel=mysqli_fetch_assoc($qCancel);
							?>
                        	<label class="control-label col-sm-2">เหตุผลยกเลิก:</label>
                            <div class="col-sm-10">
                            <textarea name="cc_comment" rows="6" class="form-control" required><?php echo $rCancel['cc_comment'];?></textarea>
                            </div>
				</div>
                <div class="form-group">
                	<div class="col-sm-10 col-sm-offset-2">
                    	<input type="hidden" name="action" value="save"/>
                        <input type="hidden" name="dev_id" value="<?php echo $rs1['dev_id'];?>"/>
                    	<button type="submit" class="btn btn-danger btn-wide"><i class="fa fa-check"></i> ตกลง</button>
                    </div>
                </div>
            </form>
            <?php
			if(isset($_POST['action']) and $_POST['action']=='save'){
				
				mysqli_query($condb, "update $db_eform.develop set
					dev_approve='cancel',
					dev_cancel='$_POST[dev_cancel]',
					dev_modify='$date_create',
					dev_createby='$_SESSION[ses_per_id]'
					where dev_id='$_POST[dev_id]'");
				//insert tb develop_cancel
				mysqli_query($condb, "delete from $db_eform.develop_cancel where dev_id='$_POST[dev_id]'");
				$cc_id=random_ID('4', '0');
				mysqli_query("insert into $db_eform.develop_cancel (cc_id,
					dev_id,
					cc_comment,
					cc_ipstamp) 
					values ('$cc_id',
					'$_POST[dev_id]',
					'$_POST[cc_comment]',
					'$remoteip')");
					
				header('location: formdetail.php?getDevid='.$rs1['dev_id']);
			
			}
			?>
        </div>
    </div><!--panel-->
    	
        </div>
    </div>
    
</div><!--container-->

<?php include('../lib/js-inc.php');?>
<script>
$('#formDefault').bootstrapValidator({
		});
</script>
</body>
</html>