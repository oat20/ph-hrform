<?php
session_start(); 

include('../admin/compcode/include/config.php');
include('../admin/compcode/check_login.php');
require_once '../lib/mysqli.php';
include('../admin/compcode/include/connect_db.php');
include('../admin/compcode/include/function.php');

$sql_b= "SELECT * FROM $db_eform.personel_muerp
			where per_id='$_SESSION[ses_per_id]'";
$exec_b= mysqli_query($condb, $sql_b);
$rs_b=mysqli_fetch_array($exec_b);
?>
<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
<?php
include('../lib/css-inc.php'); 
?>
<title>ข้อมูลส่วนบุคคล</title>
</head>
<body bgcolor="#5c7094" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">
<?php include('../inc/navbar02-inc.php');?>

<div class="container-fluid">

	<h4 class="hidden-xs hidden-sm" style="margin-top: 0px;">
        ข้อมูลส่วนบุคคล
    </h4>

	<div class="row">
        
    	<div class="col-lg-6">
        	
            <FORM method="post" action="load_changepw.php" id="formProfile">
			<div class="panel panel-default">
            	<div class="panel-heading clearfix">
                	<h3 class="panel-title pull-left"><a href="profile.php"><i class="fa fa-arrow-left fa-fw"></i> ข้อมูลส่วนตัว</a></h3>
                    <div class="pull-right"><button type="submit" class="btn btn-link btn-lg"><i class="fa fa-check"></i> Save</button></div>
                </div>
                <div class="panel-body">
                    <div class="form-group">
                        <label>คำนำหน้าชื่อ</label>
        	<input type="text" name="per_pname" class="form-control" value="<?php print $rs_b['per_pname'];?>" required id="per_pname">
        </div>
      <div class="form-group">
        <label>ชื่อ</label>
      <input name="per_fnamet" type="text" id="name" size="50" maxlength="50" value="<?php echo $rs_b["per_fnamet"]; ?>" class="form-control" required>
      </div>
        <div class="form-group">
            <label>นามสกุล</label>
            <input name="per_lnamet" type="text" id="name" size="50" maxlength="50" value="<?php echo $rs_b["per_lnamet"]; ?>" class="form-control" required>
        </div>
        	<div class="form-group">
                <label>Titlename</label>
              <input name="per_pname2" type="text" id="per_pname2" size="50" value="<?php echo $rs_b["per_pname2"]; ?>" class="form-control">
              </div>
      <div class="form-group">
        <label>Name</label>
      <input name="per_fnamee" type="text" id="name" size="50" maxlength="50" value="<?php echo $rs_b["per_fnamee"]; ?>" class="form-control" required>
      </div>
        <div class="form-group">
            <label>Surname</label>
            <input name="per_lnamee" type="text" id="name" size="50" maxlength="50" value="<?php echo $rs_b["per_lnamee"]; ?>" class="form-control" required>
        </div>
      	<div class="form-group">
            <label>ส่วนงาน</label>
      	<?php
		$rs_org=mysqli_query($condb, "select * from 
						$db_eform.tb_orgnew as t2 
                        left join $db_eform.department_type as t1 on (t1.typ_id = t2.typ_id)
                        where t2.dp_id = '$rs_b[per_dept]'
						order by convert (t1.typ_name using tis620) asc,
						convert (t2.dp_name using tis620) asc");
                $ob_org=mysqli_fetch_array($rs_org);        
		?>
        <input type="text" name="per_dept" class="form-control" value="<?php echo $ob_org['dp_name'];?>" required>
        </div>
      	<div class="form-group">
            <label>ตำแหน่งงาน</label>
            	<?php
				$sql_job = mysqli_query($condb, "select * from $db_eform.job
					where job_status = '1'
                    and job_id = '$rs_b[job_id]'
					order by convert (job_name using tis620) asc");
				$ob_job = mysqli_fetch_assoc($sql_job);
				?>
            <input type="text" name="job_id" class="form-control" value="<?php echo $ob_job['job_name'];?>" required>
        </div>
      	<div class="form-group">
            <label>ตำแหน่งวิชาการ</label>
            	<?php
				$sql_ja = mysqli_query($condb, "SELECT * FROM $db_eform.job_academic
								where ja_use = 'yes'
                                and ja_id = '$rs_b[ja_id]'
								order by ja_id asc");
				$ob_ja = mysqli_fetch_assoc($sql_ja);
				?>
            <input type="text" name="ja_id" value="<?php echo $ob_ja['ja_name'];?>" class="form-control">
        </div>
        	<div class="form-group">
                <label>เบอร์โทรฯ ตรง</label>
            	<input name="per_tel" type="text" class="form-control" value="<?php echo $rs_b['per_tel'];?>">
            </div>            
        	<div class="form-group">
                <label>เบอร์โทรฯ ภายใน</label>
            	<input name="per_telin" type="text" id="name" size="50" class="form-control" value="<?php print $rs_b['per_telin'];?>" required>
            </div>
        <div class="form-group">
            <label>MU Email</label>
            <input name="mumail" type="email" id="email" size="50" value="<?php echo $rs_b["per_email"]; ?>" class="form-control" required>
            <span class="help-block regRed_12">กรุณาใช้ Email ของมหาวิทยาลัย</span>
        </div>
                </div>
                <!--panel-body-->
                <div class="panel-footer">
                	<input type="hidden" name="per_id" value="<?php echo $rs_b["per_id"]; ?>">
                    <input type="hidden" name="ed_id" value="<?php echo $rs_b["ed_id"]; ?>">
                    <input type="hidden" name="action" value="update">
                  <button class="btn btn-primary btn-block button text-uppercase" type="submit" id="editprofile">Update</button>
                </div><!--footer-->
			</div><!--panel-->
            </FORM>

		</div><!--col-->
        
        <div class="col-lg-6">
            <div class="panel panel-primary">
            	<div class="panel-heading">
                    <h3 class="panel-title"><strong><i class="fa fa-plus fa-fw"></i> กรอกแบบฟอร์ม</strong></h3>
            	</div>
                <div class="list-group">
                    <a href="<?php echo $livesite;?>form/form_1.php" class="list-group-item"><i class="fa fa-angle-double-right fa-fw"></i> แบบบันทึกขออนุมัติปฏิบัติงานพัฒนาบุคลากร / บริการวิชาการ</a>
                    <!--
                    <a href="<?php //echo $livesite;?>academicservice/form_1.php" class="list-group-item"><i class="fa fa-angle-double-right fa-fw"></i> แบบบันทึกขออนุมัติปฏิบัติงานบริการวิชาการ</a>
                -->
                    <a href="<?php print $livesite;?>leave/" class="list-group-item"><i class="fa fa-angle-double-right fa-fw"></i> แบบบันทึกขออนุมัติลาเดินทางต่างประเทศ</a>
                	</div>
            </div><!--panel-->

        	<!--<div class="panel panel-warning">
            	<div class="panel-heading">
                	<h3 class="panel-title">เปลี่ยนรหัสผ่าน</h3>
                </div>
                <div class="panel-body">
                	<form method="post" action="load_changepw.php" id="formChangepass">
                    	<div class="form-group">
                        	<label class="control-label">Username:</label>
                            <p class="form-control-static"><?php //echo $rs_b['per_username'];?></p>
                        </div>
                    	<div class="form-group">
                        	<label class="control-label">รหัสผ่านใหม่:</label>
                            <input type="password" class="form-control" name="newPass">
                        </div>
                        <input type="hidden" name="action" value="changepass">
                        <button type="submit" class="btn btn-warning btn-wide"><i class="fa fa-check"></i> Save</button>
                    </form>
                </div>
            </div>-->
            <!--panel-->
        </div>
        <!--col-->
        
	</div><!--row-->

</div><!--container-->
<?php include('../lib/js-inc.php');?>
<script>
$(document).ready(function(e) {
	
	//autocomplete
	/*var jobid = new Bloodhound({
	  datumTokenizer: function(d) { return Bloodhound.tokenizers.whitespace(d.label); },
	  queryTokenizer: Bloodhound.tokenizers.whitespace,
	  limit: 20,
	  prefetch: '../personel/job-json.php'
	});

	jobid.initialize();
	
	 $('#job_id').typeahead(null,{
		 name: 'jobid',
		  displayKey: 'label',
		  source: jobid.ttAdapter()
      });*/
	  
	  var pname = new Bloodhound({
	  datumTokenizer: function(d) { return Bloodhound.tokenizers.whitespace(d.label); },
	  queryTokenizer: Bloodhound.tokenizers.whitespace,
	  limit: 20,
	  prefetch: '../json/nametitle-json.php'
	});
	pname.initialize();
	 $('#per_pname').typeahead(null,{
		 name: 'pname',
		  displayKey: 'label',
		  source: pname.ttAdapter()
      });
	  
	  var pname2 = new Bloodhound({
	  datumTokenizer: function(d) { return Bloodhound.tokenizers.whitespace(d.label); },
	  queryTokenizer: Bloodhound.tokenizers.whitespace,
	  limit: 20,
	  prefetch: '../json/nametitle_en.php'
	});
	pname2.initialize();
	 $('#per_pname2').typeahead(null,{
		 name: 'pname2',
		  displayKey: 'label',
		  source: pname2.ttAdapter()
      });
	  
	  var ededu = new Bloodhound({
	  datumTokenizer: function(d) { return Bloodhound.tokenizers.whitespace(d.label); },
	  queryTokenizer: Bloodhound.tokenizers.whitespace,
	  limit: 20,
	  prefetch: '../json/edu-json.php'
	});
	ededu.initialize();
	 $('#ed_edu').typeahead(null,{
		 name: 'ededu',
		  displayKey: 'label',
		  source: ededu.ttAdapter()
      });
	  
	  var institute = new Bloodhound({
	  datumTokenizer: function(d) { return Bloodhound.tokenizers.whitespace(d.label); },
	  queryTokenizer: Bloodhound.tokenizers.whitespace,
	  limit: 20,
	  prefetch: '../json/institute-json.php'
	});
	institute.initialize();
	 $('#ed_institute').typeahead(null,{
		 name: 'institute',
		  displayKey: 'label',
		  source: institute.ttAdapter()
      });
	  //autocomplete
    
	$('#formProfile').bootstrapValidator({
		message: 'This value is not valid',
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
		 fields: {
			 per_pname: {
                validators: {
                    notEmpty: {
                        //message: 'The first name is required and cannot be empty'
                    }
                }
            },
			per_fnamet: {
                validators: {
                    notEmpty: {
                        //message: 'The first name is required and cannot be empty'
                    }
                }
            },
			per_lnamet: {
                validators: {
                    notEmpty: {
                        //message: 'The first name is required and cannot be empty'
                    }
                }
            },
			per_dept: {
                validators: {
                    notEmpty: {
                        //message: 'The first name is required and cannot be empty'
                    }
                }
            },
			job_id: {
                validators: {
                    notEmpty: {
                        //message: 'The first name is required and cannot be empty'
                    }
                }
            },
			per_telin: {
                validators: {
                    notEmpty: {
                        //message: 'The first name is required and cannot be empty'
                    }
                }
            },
			mumail: {
                validators: {
                    notEmpty: {
                        //message: 'The email address is required and can\'t be empty'
                    },
                    emailAddress: {
                        //message: 'The input is not a valid email address'
                    },
                    remote: {
						type: 'POST',
                        url: '../lib/bootstrapvalidator/mu-emailformat.php',
                        //message: 'The email is not available'
                    }
                }
            },
			per_second_email: {
                validators: {
                    emailAddress: {
                        //message: 'The input is not a valid email address'
                    }
                }
            },
			per_group: {
                validators: {
                    notEmpty: {
                        //message: 'The first name is required and cannot be empty'
                    }
                }
            },
			ed_dgid:{
				validators:{
					notEmpty:{
					}
				}
			},
		 }
	});
	
	$('#formChangepass').bootstrapValidator({
		feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
		fields: {
			 newPass: {
                validators: {
                    notEmpty: {
                        //message: 'The first name is required and cannot be empty'
                    },
					stringLength: {
                        min: 4,
                        //max: 30,
                        //message: 'The username must be more than 6 and less than 30 characters long'
                    },
                }
            },
		}
	});
	
	$('select').select2({dropdownCssClass: 'show-select-search'});

});
</script>
</body>
</html>