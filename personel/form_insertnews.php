<?php
session_start();

include('../admin/compcode/include/config.php');
include('../admin/compcode/check_login.php');
require_once '../lib/mysqli.php';
include('../admin/compcode/include/connect_db.php');
include('../admin/compcode/include/function.php');
?>
<!doctype html>
<html lang="en">
    <head>
<meta charset="utf-8">
<?php include('../lib/css-inc.php');?>
    </head>
<body>
 <?php include('../inc/navbar02-inc.php');?>
 
<div class="container">

	<div class="row">
    	<div class="col-sm-12">

	<FORM name="form" action="load_insertpersonel.php?action=save" enctype="multipart/form-data"  method="post"  id="defaultForm">
	<div class="panel panel-default">
    	<div class="panel-heading">
        	<h3 class="panel-title"><a href="show_allpersonel.php"><i class="fa fa-arrow-left fa-fw"></i> เพิ่มรายชื่อบุคลากร</a></h3>
        </div>
    	<!--<div class="panel-body">--> 
	<div class="table-responesive"> 
<table class="table table-striped table-bordered" width="100%">
	<tbody>
    	<?php
		/*if($_SESSION['ses_du_status'] == '1' or $_SESSION['ses_du_status'] == '2'){
			print '<tr>
				<th>Personel ID (MU-ERP):</th>
				<td><div class="form-group"><input type="text" name="per_erpid" class="form-control"></div></td>
			</tr>';
		}*/
		?>
        <tr>
          <th class="td1" background="../admin/compcode/picture/bar07.jpg">คำนำหน้าชื่อภาษาไทย</th>
          <td class="td2"><div class="form-group"><input name="per_pname" type="text" id="per_pname" value="<?php echo $times; ?>" size="10" class="form-control" required></div>
          </td>
        </tr>
        <tr>
          <th class="td1" background="../admin/compcode/picture/bar07.jpg">ชื่อภาษาไทย</th>
          <td class="td2"><div class="form-group"><input name="per_fnamet" type="text" class="form-control inputform" id="title_news" size="50" maxlength="100" required></div></td>
        </tr>
        
        <tr>
          <th valign="top" class="td1" background="../admin/compcode/picture/bar07.jpg">นามสกุลภาษาไทย</th>
          <td valign="top" background="../admin/compcode/picture/bar07.jpg">
            <div class="form-group"><input name="per_lnamet" type="text" class="form-control inputform" id="title_news2" size="50" maxlength="100" required></div>
          </td>
          </tr>
        <tr>
          <th class="td1" background="../admin/compcode/picture/bar07.jpg">คำนำหน้าชื่อภาษาอังกฤษ</th>
          <td  align="left">
          <div class="form-group"><input name="per_pname2" type="text" class="form-control inputform" id="per_pname2" size="10" maxlength="20"></div></td>
        </tr>
        <tr>
          <th class="td1" background="../admin/compcode/picture/bar07.jpg" >ชื่อภาษาอังกฤษ</th>
          <td  align="left" class="td2" ><div class="form-group"><input name="per_fnamee" type="text" value="" size="50" id="per_fnamee" class="form-control"></div></td>
        </tr>
        <tr >
          <th class="td1" background="../admin/compcode/picture/bar07.jpg" >นามสกุลภาษาอังกฤษ</th>
          <td class="td2">
          	<div class="form-group"><input name="per_lnamee" type="text" size="50" id="per_lnamee" class="form-control"></div>
          </td>
        </tr>
        <tr >
          <th class="td1" background="../admin/compcode/picture/bar07.jpg" >ส่วนงาน</th>
          <td class="td2">
          	<div class="form-group">
          	<select name="per_dept" class="form-control select select-inverse" data-toggle="select" required>
            	<option value="">&raquo;</option>
          	<?php
			if($_SESSION['ses_du_status'] == '1' or $_SESSION['ses_du_status'] == '2'){
				$sql="select * from $db_eform.tb_orgnew
				inner join $db_eform.department_type on (tb_orgnew.typ_id = department_type.typ_id)
				where department_type.typ_id = 'PH00001'
				or department_type.typ_id = 'PH00002'
				order by convert (department_type.typ_name using tis620) asc,
				convert (tb_orgnew.dp_name using tis620) asc";
			}else if($_SESSION['ses_du_status'] == '3'){
				$sql="select * from $db_eform.tb_orgnew
				inner join $db_eform.department_type on (tb_orgnew.typ_id = department_type.typ_id)
				where tb_orgnew.dp_id = '$_SESSION[ses_per_dept]'";
			}
			$rs=mysqli_query($condb, $sql);
			while($ob=mysqli_fetch_assoc($rs)){
				print "<option value='".$ob["dp_id"]."'>".$ob['dp_id']." - ".$ob["dp_name"]."</option>";
			}
			?>
            </select>
            </div>
          </td>
        </tr>
						<tr  >    <th class="td1" background="../admin/compcode/picture/bar07.jpg">ตำแหน่งงาน</th>
						<td class="td2">
                          <div class="form-group">
                            <select data-toggle="select" class="form-control select select-primary mrs" name="job_id" required>
                                <?php
                                $sql=mysqli_query($condb, "select * from $db_eform.job where job_status=1 order by convert(job_id using tis620) asc");
                                while($rs=mysqli_fetch_assoc($sql)){
                                    echo '<option value="'.$rs['job_id'].'">'.$rs['job_id'].' - '.$rs['job_name'].'</option>';
                                }
                                ?>
                             </select>
                          </div>
                          </td>
                          </tr>
                          <tr>
                            <th>ตำแหน่งวิชาการ</th>
                            <td>
                                <div class="form-group">
                                    <input type="text" name="ja_name" class="form-control">
                                </div>
                            </td>
                          </tr>
    <tr>
    	<td><strong>ตำแหน่งด้านบริหารงาน (ถ้ามี):</strong></td>
        <td>
        	<div class="form-group">
                <select data-toggle="select" class="form-control select select-primary" name="jobs_id" required>
                	<?php
					$sql=mysqli_query($condb, "SELECT * 
						FROM  $db_eform.job_special
						where jobs_status = '1'
						ORDER BY CONVERT( jobs_id
						USING tis620 ) ASC");
					while($rs=mysqli_fetch_assoc($sql)){
						echo '<option value="'.$rs['jobs_id'].'">'.$rs['jobs_id'].' - '.$rs['jobs_name'].'</option>';
					}
					?>
                 </select>
            </div>
        </td>
    </tr>
    <tr>
          <th class="td1">ประเภท</th>
          <td><div class="form-group">
              	<select name="per_type" class="form-control select select-inverse select-sm" data-toggle="select" required>
                	<!--<option value="">&raquo;</option>-->
                	<?php
					$sql = mysqli_query($condb, "select * from $db_eform.personel_type where pert_status = '1' order by convert (pert_id using tis620) asc");
					while($rs = mysqli_fetch_assoc($sql))
					{
						print "<option value='".$rs['pert_id']."'>".$rs['pert_id']." - ".$rs['pert_name']."</option>";
					}
					?>
                </select>
                </div></td>
        </tr>
        <tr>
              <th class="td1">กลุ่ม</th>
              <td>
              	<div class="form-group">
              	<select name="per_group" class="form-control select select-inverse select-sm" data-toggle="select" required>
                	<?php
					$sql = mysqli_query($condb, "select * from $db_eform.personel_group where gr_use = 'yes' order by convert (gr_id using tis620) asc");
					while($rs = mysqli_fetch_assoc($sql))
					{
						print "<option value='".$rs['gr_id']."'>".$rs['gr_id']." - ".$rs['gr_title']."</option>";
					}
					?>
                </select>
                </div>
              </td>
    </tr>
        <tr>
          <th class="td1">เพศ</th>
          <td>
          	<div class="form-group">
                	<div class="row">
                    	<?php
						$sql = mysqli_query($condb, "select * from $db_eform.personel_sex where sex_use = 'yes' order by sex_id asc");
						while($rs = mysqli_fetch_assoc($sql)){
							echo '<div class="col-sm-3">
										<label class="radio">
											<input type="radio" data-toggle="radio" name="per_sex" id="optionsRadios1" value="'.$rs['sex_id'].'" required>
											'.$rs['sex_title'].'
										  </label>
								</div><!--col-->';
						}
						?>
                    </div><!--row-->
                </div>
          </td>
        </tr>   
        <tr>
        	<td colspan="2">
            	<div class="row">
                	<div class="col-sm-6">
                            <div class="form-group">
                            	<label class="control-label"><strong>วันเกิด:</strong></label>
                                <input type="text" class="form-control input-sm" name="per_bhd" id="per_bhd">
                            </div>
                        </div><!--col-->
                        
                    	<div class="col-sm-6">
                            <div class="form-group">
                            	<label class="control-label"><strong>วันที่บรรจุ:</strong></label>
                                <input type="text" class="form-control input-sm" name="per_adddate" id="per_adddate">
                            </div>
                        </div><!--col-->                        
                    </div><!--row-->
            </td>
        </tr>
        <tr>
          <th class="td1">สถานภาพ:</th>
          <td><div class="form-group">
              	<select name="per_status" class="form-control select select-inverse" data-toggle="select" required>
                	<?php
					$sql = mysqli_query($condb, "select * from $db_eform.personel_status where ps_use = 'yes' order by convert(ps_id using tis620) asc");
					while($rs = mysqli_fetch_assoc($sql))
					{
						print "<option value='".$rs['ps_id']."'>".$rs['ps_id']." - ".$rs['ps_title']."</option>";
					}
					?>
                </select>
                </div></td>
        </tr>
             <tr>
               <th class="td1">MU-Mail</th>
               <td class="td2"><div class="form-group"><input name="mumail" type="email" class="form-control inputform" id="title_news8" size="50" maxlength="100" required></div></td>
             </tr>
             <tr>
               <th colspan="2" class="th1"><span class="boldwhite_14">ข้อมูลการศึกษาสูงสุด</span></th>
             </tr>
             <tr>
               <th class="td1">ระดับการศึกษา</th>
               <td class="td2">
                   <div class="form-group">
                        <select name="dg_id" class="form-control select select-primary" data-toggle="select">
                        	<?php
							$sql=mysqli_query($condb, "select * from $db_eform.degree
								where dg_status='1'
								order by convert(dg_id using tis620) asc");
							while($ob=mysqli_fetch_assoc($sql)){
								echo '<option value="'.$ob['dg_id'].'">'.$ob['dg_id'].' - '.$ob['dg_name'].'</option>';
							}
							?>
                        </select>
                   </div>
               </td>
             </tr>
             <tr>
               <th class="td1">วุฒิการศึกษา</th>
               <td class="td2"><div class="form-group"><input name="ed_edu" type="text" class="form-control inputform" id="ed_edu"></div></td>
             </tr>
             <tr>
               <th class="td1">สถาบัน</th>
               <td class="td2"><div class="form-group"><input name="ed_institute" type="text" class="form-control inputform" id="ed_institute"></div></td>
             </tr>
             <tr>
             	<td>ณ ประเทศ:</td>
                <td>
                	<div class="form-group">
                        <select name="ed_country" class="form-control select select-primary" data-toggle="select">
                        	<?php
							$sql=mysqli_query($condb, "select * from $db_eform.country
								order by convert(ct_id using tis620) asc");
							while($ob=mysqli_fetch_assoc($sql)){
								echo '<option value="'.$ob['ct_id'].'">'.$ob['ct_id'].' - '.$ob['ct_name'].'</option>';
							}
							?>
                        </select>
                    </div>
                </td>
             </tr>
             <tr>
                <th>Member Route</th>
                <td>
                    <div class="form-group">
                        <label class="radio">
                            <input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" data-toggle="radio">
                            Option one is this and that&mdash;be sure to include why it's great
                        </label>
                        <label class="radio">
                            <input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" data-toggle="radio">
                            Option one is this and that&mdash;be sure to include why it's great
                        </label>
                        <label class="radio">
                            <input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" data-toggle="radio">
                            Option one is this and that&mdash;be sure to include why it's great
                        </label>
                </td>
             </tr>
             <tr>
                <th>Member Status</th>
                <td>
                    <div class="form-group">
                        <label class="radio">
                            <input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" data-toggle="radio">
                            Option one is this and that&mdash;be sure to include why it's great
                        </label>
                        <label class="radio">
                            <input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" data-toggle="radio">
                            Option one is this and that&mdash;be sure to include why it's great
                        </label>
                        <label class="radio">
                            <input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" data-toggle="radio">
                            Option one is this and that&mdash;be sure to include why it's great
                        </label>
                </td>
             </tr>
          </tbody>
  </table>
    </div><!--table-->
		<!--</div>--><!--body-->
        <div class="panel-footer">
        	<input type="hidden" name="action" value="save">
        	<button type="submit" class="btn btn-inverse btn-block">บันทึก</button>
        </div>
	</div><!--panel-->
    </form>

		</div><!--col-->
	</div><!--row-->

</div><!--container-->

<?php include('../lib/js-inc.php');?>
<script>
$(document).ready(function(e) {
	
	//datepicker
	$('#per_bhd').datepicker({
		format: 'yyyy-mm-dd', 
		language: 'th', 
		autoclose: true
	});
	$('#per_adddate').datepicker({
		format: 'yyyy-mm-dd', 
		language: 'th', 
		autoclose: true
	});
	/*$('#per_adddate2').datepicker({
		format: 'yyyy-mm-dd', 
		language: 'th', 
		autoclose: true
	});*/
	/*$('#per_hiredate1').datepicker({
		format: 'yyyy-mm-dd', 
		language: 'th', 
		autoclose: true
	});
	$('#per_hiredate2').datepicker({
		format: 'yyyy-mm-dd', 
		language: 'th', 
		autoclose: true
	});*/
	
	//autocomplete
	var tnames = new Bloodhound({
	  datumTokenizer: function(d) { return Bloodhound.tokenizers.whitespace(d.label); },
	  queryTokenizer: Bloodhound.tokenizers.whitespace,
	  limit: 20,
	  prefetch: '../json/nametitle-json.php'
	});
	tnames.initialize();
	 $('#per_pname').typeahead(null,{
		 name: 'tnames',
		  displayKey: 'label',
		  source: tnames.ttAdapter()
      });
	  
	  var tname2s = new Bloodhound({
	  datumTokenizer: function(d) { return Bloodhound.tokenizers.whitespace(d.label); },
	  queryTokenizer: Bloodhound.tokenizers.whitespace,
	  limit: 20,
	  prefetch: '../json/nametitle_en.php'
	});
	tname2s.initialize();
	 $('#per_pname2').typeahead(null,{
		 name: 'tname2s',
		  displayKey: 'label',
		  source: tname2s.ttAdapter()
      });
	    
	  var edus = new Bloodhound({
	  datumTokenizer: function(d) { return Bloodhound.tokenizers.whitespace(d.label); },
	  queryTokenizer: Bloodhound.tokenizers.whitespace,
	  limit:10,
	  prefetch: '../json/edu-json.php'
	});
	edus.initialize();
	 $('#ed_edu').typeahead(null,{
		 name: 'edus',
		  displayKey: 'label',
		  source: edus.ttAdapter()
      });
	  
	  var institutes = new Bloodhound({
	  datumTokenizer: function(d) { return Bloodhound.tokenizers.whitespace(d.label); },
	  queryTokenizer: Bloodhound.tokenizers.whitespace,
	  limit:10,
	  prefetch: '../json/institute-json.php'
	});
	institutes.initialize();
	 $('#ed_institute').typeahead(null,{
		 name: 'institutes',
		  displayKey: 'label',
		  source: institutes.ttAdapter()
      });
    
	//formvalidator
	$('#defaultForm').bootstrapValidator({
		message: 'This value is not valid',
        /*feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },*/
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
			ja_id: {
                validators: {
                    notEmpty: {
                        //message: 'The first name is required and cannot be empty'
                    }
                }
            },
			per_sex: {
                validators: {
                    notEmpty: {
                        //message: 'The first name is required and cannot be empty'
                    }
                }
            },
			per_type: {
                validators: {
                    notEmpty: {
                        //message: 'The first name is required and cannot be empty'
                    }
                }
            },
			per_status: {
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
			per_bhd:{
				validators: {
                    notEmpty: {
                        //message: 'The first name is required and cannot be empty'
                    }
                }
			},
			per_adddate:{
				validators: {
                    notEmpty: {
                        //message: 'The first name is required and cannot be empty'
                    }
                }
			},
			per_hiredate1:{
				validators: {
                    notEmpty: {
                        //message: 'The first name is required and cannot be empty'
                    }
                }
			},
			per_hiredate2:{
				validators: {
                    notEmpty: {
                        //message: 'The first name is required and cannot be empty'
                    }
                }
			},
			dg_id:{
				validators: {
                    notEmpty: {
                        //message: 'The first name is required and cannot be empty'
                    }
                }
			},
			ed_edu:{
				validators: {
                    notEmpty: {
                        //message: 'The first name is required and cannot be empty'
                    }
                }
			},
			ed_major:{
				validators: {
                    notEmpty: {
                        //message: 'The first name is required and cannot be empty'
                    }
                }
			},
			ed_institute:{
				validators: {
                    notEmpty: {
                        //message: 'The first name is required and cannot be empty'
                    }
                }
			},
			ed_country:{
				validators: {
                    notEmpty: {
                        //message: 'The first name is required and cannot be empty'
                    }
                }
			},
		 }
	});
	$('#per_bhd').datepicker()
        .on('change show', function(e) {
            // Validate the date when user change it
            $('#defaultForm').data('bootstrapValidator').revalidateField('per_bhd');
            // You also can call it as following:
            //$('#formFilter').bootstrapValidator('revalidateField', 'startDate');
        });
	$('#per_adddate').datepicker()
        .on('change show', function(e) {
            // Validate the date when user change it
            $('#defaultForm').data('bootstrapValidator').revalidateField('per_adddate');
            // You also can call it as following:
            //$('#formFilter').bootstrapValidator('revalidateField', 'startDate');
        });
		/*$('#per_hiredate1').datepicker()
        .on('change show', function(e) {
            // Validate the date when user change it
            $('#defaultForm').data('bootstrapValidator').revalidateField('per_hiredate1');
            // You also can call it as following:
            //$('#formFilter').bootstrapValidator('revalidateField', 'startDate');
        });
		$('#per_hiredate2').datepicker()
        .on('change show', function(e) {
            // Validate the date when user change it
            $('#defaultForm').data('bootstrapValidator').revalidateField('per_hiredate2');
            // You also can call it as following:
            //$('#formFilter').bootstrapValidator('revalidateField', 'startDate');
        });*/
		
		$('select[name="jobs_id"]').select2({dropdownCssClass: 'show-select-search'});
		$('select[name="per_type"]').select2({dropdownCssClass: 'show-select-search'});
		$('select[name="per_group"]').select2({dropdownCssClass: 'show-select-search'});
		$('select[name="ed_country"]').select2({dropdownCssClass: 'show-select-search'});
		$('select[name="per_dept"]').select2({dropdownCssClass: 'show-select-search'});
		$('select[name="dg_id"]').select2({dropdownCssClass: 'show-select-search'});
		$('select[name="job_id"]').select2({dropdownCssClass: 'show-select-search'});
		$('select[name="per_status"]').select2({dropdownCssClass: 'show-select-search'});

});
</script>
</body>
</html>
