<?php
session_start();

include('../admin/compcode/include/config.php');
include('config-inc.php');
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
<?php include('../inc/navbar02-inc.php');?>

<div class="container">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">
                <a href="./_showmyproject.php"><i class="fa fa-arrow-left fa-fw"></i> บันทึกเดินทางต่างประเทศ</a>
            </h3>
</div>
<div class="panel-body">

	<div class="row">
    	<div class="col-xs-12">
            <form method="post" id="formDefault" action="form-action.php">
            	<!--ข้อมูลผู้ขออนุมัติ-->
                <?php
				$qPersonel=mysqli_query($condb, "select * from $db_eform.personel_muerp where per_id='$_SESSION[ses_per_id]'");
				$rPersonel=mysqli_fetch_assoc($qPersonel);
				/*
                if($rPersonel['per_pname3']==''){ 
                    $per_name=$rPersonel['per_pname'].$rPersonel['per_fnamet'].'&nbsp;'.$rPersonel['per_lnamet']; 
                }else{ 
                    $per_name=$rPersonel['per_pname3'].$rPersonel['per_fnamet'].'&nbsp;'.$rPersonel['per_lnamet']; 
                }
                */
				?>
                <fieldset>
                    <legend>1. ผู้ขออนุมัติ</legend>
            	<div class="row">
                	<div class="col-sm-6">
                    	<div class="form-group form-group-sm">
                            <label class="control-label">ผู้เสนอขออนุมัติ</label>
                            <!--<input name="per_name" type="text" class="form-control" required value="<?php //echo $per_name;?>">-->
                            <select name="per_name" class="form-control select select-inverse select-sm" data-toggle="select" required>
                            	<option value="">&nbsp;</option>
                                <?php
								$qPersonel02=mysqli_query($condb, "select * from $db_eform.personel_muerp as t1
									inner join $db_eform.personel_status as t2 on (t1.per_status=t2.ps_id)
									where t1.per_trash='0'
									and t2.ps_use='yes'
									and t1.per_dept='$rPersonel[per_dept]'
									order by convert(t1.per_fnamet using tis620) asc,
									convert(t1.per_lnamet using tis620) asc");
								while($rPersonel02=mysqli_fetch_assoc($qPersonel02)){
									if($rPersonel02['per_pname3']==''){ $per_name=$rPersonel02['per_pname'].$rPersonel02['per_fnamet'].'&nbsp;'.$rPersonel02['per_lnamet']; }else{ $per_name=$rPersonel02['per_pname3'].$rPersonel02['per_fnamet'].'&nbsp;'.$rPersonel02['per_lnamet']; }
									
									if($_SESSION['ses_per_id']==$rPersonel02['per_id']){
										echo '<option value="'.$rPersonel02['per_id'].'" selected>'.$per_name.'</option>';
									}else{
										echo '<option value="'.$rPersonel02['per_id'].'">'.$per_name.'</option>';
									}
								}
								?>
                            </select>
                        </div>
                    </div><!--col-->
                    <div class="col-sm-6">
                    	<div class="form-group form-group-sm">
                            <label class="control-label">กลุ่ม</label>
                            <select class="form-control select select-inverse select-sm" data-toggle="select" name="per_type" required>
                            	<?php
								$sql=mysqli_query($condb, "select * from $db_eform.personel_type 
									where pert_status='1' 
									order by convert(pert_name using tis620) asc");
								while($ob=mysqli_fetch_assoc($sql)){
									if($rPersonel['per_type']==$ob['pert_id']){
										echo '<option value="'.$ob['pert_id'].'" selected>'.$ob['pert_name'].'</option>';
									}else{
										echo '<option value="'.$ob['pert_id'].'">'.$ob['pert_name'].'</option>';
									}
								}
								?>
                            </select>
                            <!--
                            <input type="text" class="form-control" name="per_type">
                            -->
                        </div>
                    </div><!--col-->
                </div><!--row-->
                
                <div class="row">
                	<div class="col-sm-6">
                    	<div class="form-group form-group-sm">
                            <label class="control-label">ตำแหน่ง</label>
                            <select class="form-control select select-inverse select-sm" data-toggle="select" name="per_job" required>
                            	<?php
								$sql=mysqli_query($condb, "select * from $db_eform.job where job_status='1' order by convert(job_name using tis620) asc");
								while($ob=mysqli_fetch_assoc($sql)){
									if($rPersonel['job_id']==$ob['job_id']){
										echo '<option value="'.$ob['job_id'].'" selected>'.$ob['job_name'].'</option>';
									}else{
										echo '<option value="'.$ob['job_id'].'">'.$ob['job_name'].'</option>';
									}
								}
								?>
                            </select>
                            <!--
                            <input type="text" name="per_job" class="form-control" required>
                            -->
                        </div>
                    </div><!--col-->
                    <div class="col-sm-6">
                    	<div class="form-group form-group-sm">
                            <label class="control-label">เลขประจำตำแหน่ง:</label>
                            <input name="per_number" type="text" class="form-control">
                        </div>
                    </div><!--col-->
                </div><!--row-->
                
                <div class="row">
                	<div class="col-sm-6">
                    	<div class="form-group form-group-sm">
                            <label class="control-label">ส่วนงาน</label>
                            <select class="form-control select select-inverse select-sm" data-toggle="select" name="per_dept" required>
                                <option value=""></option>
                            	<?php
								$sql=mysqli_query($condb, "select * from $db_eform.department_type as t1
									right join $db_eform.tb_orgnew as t2 on (t1.typ_id=t2.typ_id)
									order by convert(t1.typ_name using tis620) asc,
									convert(t2.dp_name using tis620) asc");
								while($ob=mysqli_fetch_assoc($sql)){
									/*if($rPersonel['per_dept']==$ob['dp_id']){
										echo '<option value="'.$ob['dp_id'].'" selected>'.$ob['dp_name'].'</option>';
									}else{
										echo '<option value="'.$ob['dp_id'].'">'.$ob['dp_name'].'</option>';
									}*/
                                    echo '<option value="'.$ob['dp_id'].'">'.$ob['dp_name'].'</option>';
								}
								?>
                            </select>
                        </div>
                    </div><!--col-->
                    <div class="col-sm-6">
                    	<div class="form-group form-group-sm">
                            <label class="control-label">บรรจุเมื่อวันที่:</label>
                            <input name="per_adddate" type="text" class="form-control" id="per_adddate" required value="<?php echo $rPersonel['per_adddate'];?>">
                        </div>
                    </div><!--col-->
                </div><!--row-->
                
                <div class="row">
                	<div class="col-sm-6">
                    	<div class="form-group form-group-sm">
                            <label class="control-label">ระยะเวลาการจ้างตั้งแต่วันที่:</label>
                            <input name="per_contract1" type="text" class="form-control" id="per_contract1">
                        </div>
                    </div><!--col-->
                    <div class="col-sm-6">
                    	<div class="form-group form-group-sm">
                            <label class="control-label">ถึงวันที่:</label>
                            <input name="per_contract2" type="text" class="form-control" id="per_contract2">
                        </div>
                    </div><!--col-->
                </div><!--row-->
                
                <div class="row">
                	<div class="col-sm-6">
                    	<div class="form-group form-group-sm">
                            <label class="control-label">โทร:</label>
                            <input name="per_tel" type="text" class="form-control" required value="<?php echo $rPersonel['per_telin'];?>">
                        </div>
                    </div><!--col-->
                    <div class="col-sm-6">
                    	<div class="form-group form-group-sm">
                            <label class="control-label">โทรสาร:</label>
                            <input name="per_fax" type="text" class="form-control">
                        </div>
                    </div><!--col-->
                </div><!--row-->
                </fieldset>
                <!--ข้อมูลผู้ขออนุมัติ-->
                
                <fieldset>
                <legend>2. ข้อมูลการลา</legend>
                <div class="form-group">
                    <label>ประเภทการลา</label>
                	<div class="row">
                	<?php
					$sql=mysqli_query($condb, "select * from $db_eform.develop_leave_type order by convert(la_name using tis620) asc");
					while($ob=mysqli_fetch_assoc($sql)){
						echo '<div class="col-sm-2"><label class="radio"><input type="radio" name="dev_type" value="'.$ob['la_id'].'" required data-toggle="radio"> '.$ob['la_name'].'</label></div>';
					}
					?>
                    </div>
                </div>
                <div class="form-group form-group-sm">
                    <label class="control-label">หัวข้อ/เรื่อง/หลักสูตร:</label>
                    <input name="dev_onus" type="text" class="form-control" required>
                </div>
                
                <div class="row">
                	<div class="col-sm-6">
                    	<div class="form-group form-group-sm">
                        	<label class="control-label">สถานที่/องค์กร:</label>
                            <input name="dev_place" type="text" class="form-control">
                        </div>
                    </div><!--col-->
                    <div class="col-sm-6">
                    	<div class="form-group form-group-sm">
                        	<label class="control-label">ประเทศ:</label>
                            <input type="text" name="dev_country" class="form-control" id="dev_country" required>
                            <!--<select name="dev_country" class="form-control select select-inverse select-sm" data-toggle="select" required>
                            	<?php
								/*$sql=mysql_query("select * from $db_eform.country order by convert(ct_name using tis620) asc");
								while($ob=mysql_fetch_assoc($sql)){
									if($ob['ct_id']=='223'){
										echo '<option value="'.$ob['ct_id'].'" selected>'.$ob['ct_name'].'</option>';
									}else{
										echo '<option value="'.$ob['ct_id'].'">'.$ob['ct_name'].'</option>';
									}
								}*/
								?>
                            </select>-->
                        </div>
                    </div><!--col-->
                </div><!--row-->
                
                <div class="row">
                	<div class="col-sm-6">
                    	<div class="form-group form-group-sm">
                        	<label class="control-label">ระยะเวลาที่ลา ตั้งแต่วันที่:</label>
                            <input name="dev_stdate" type="text" class="form-control" id="dev_stdate" required>
                        </div>
                    </div><!--col-->
                    <div class="col-sm-6">
                    	<div class="form-group form-group-sm">
                        	<label class="control-label">ถึงวันที่:</label>
                            <input name="dev_enddate" type="text" class="form-control" id="dev_enddate" required>
                        </div>
                    </div><!--col-->
                    <!--<div class="col-sm-4">
                    	<div class="form-group form-group-sm">
                        	<label class="control-label">มีกำหนด (วัน):</label>
                            <input name="dev_training_hour" type="number" class="form-control" required>
                        </div>
                    </div>--><!--col-->
                </div><!--row-->
                
                <div class="row">
                	<div class="col-sm-6">
                    	<div class="form-group form-group-sm">
                        	<label class="control-label">ชื่อทุน:</label>
                            <input name="dev_fundname" type="text" class="form-control">
                        </div>
                    </div><!--col-->
                    <div class="col-sm-6">
                    	<div id="newDegree">
                            <div class="form-group form-group-sm">
                                <label class="control-label">(เฉพาะกรณีขออนุมัติลาศึกษา)  ระดับการศึกษา:</label>
                                <select class="form-control select select-inverse select-sm" data-toggle="select" name="dev_edu" disabled>
                                	<option value="">&nbsp;</option>
                                    <?php
                                    $sql=mysqli_query($condb, "select * from $db_eform.degree where dg_status='1' order by convert(dg_name using tis620) asc");
                                    while($ob=mysqli_fetch_assoc($sql)){
                                        echo '<option value="'.$ob['dg_id'].'">'.$ob['dg_name'].'</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                    </div><!--col-->
                </div><!--row-->
                
                    	<div class="form-group form-group-sm">
                            <label class="control-label"><strong>ได้แนบเอกสารประกอบการพิจารณา ดังนี้:</strong></label>
                            <div class="row">
                            <?php
                            $sql=mysqli_query($condb, "select * from $db_eform.develop_leave_doc order by ld_id asc");
                            while($ob=mysqli_fetch_assoc($sql)){
                                echo '<div class="col-sm-3"><label class="checkbox">
                                            <input name="ld_id[]" type="checkbox" value="'.$ob['ld_id'].'" data-toggle="checkbox"> '.$ob['ld_name'].'
                                        </label></div>';
                            }
                            //echo '<input name="dev_docother" type="text" class="form-control input-sm" placeholder="ระบุ">';
                            ?>
                            	<!--<div class="col-sm-3"><label class="checkbox"><input name="dev_docother1" type="checkbox" value="other" data-toggle="checkbox"> อื่นๆ <input name="dev_docother" type="text" class="form-control input-sm" placeholder="ระบุ"></label></div>-->
                            </div><!--row-->
                            <input name="dev_docother" type="text" class="form-control input-sm" placeholder="อื่นๆ ระบุ">
                        </div><!--form-group-->
                        <!--<div class="form-group">
                            <input type="file" accept="image/jpeg, image/png, application/pdf">
                            <span class="help-block">อนุญาติเฉพาะไฟล์ jpg, png, pdf</span>
                        </div>-->

                        </fieldset>
                        
                        <fieldset>
                            <legend>3. ผู้ลงนามอมุมัติ (หัวหน้าส่วนงาน)</legend>
                        
                        	<div class="row">
                            	<div class="col-sm-6">
                                    <div class="form-group">
                                	<label class="control-label">ชื่อผู้ลงนามอนุมัติ:</label>
                                    <input type="text" name="dev_bossname" class="form-control" maxlength="100" id="dev_bossname" required>
                        </div>
                                </div><!--col-->
                                <div class="col-sm-6">
                                    <div class="form-group">
                                	<label class="control-label">ตำแหน่งผู้ลงนามอนุมัติ:</label>
                                    <input type="text" name="dev_bosspos" class="form-control" maxlength="100" id="cev_bosspos" required>
                                    </div>
                                </div><!--col-->
                            </div><!--row-->
                        
                        </fieldset>

                <input name="action" type="hidden" value="save">
                <button type="submit" class="btn btn-primary btn-block">บันทึกข้อมูล</button>                
            </form>
        
        </div><!--col-->
    </div><!--row-->
    </div>
    <!--panel-body-->
    </div>
    <!--panel-->
</div><!--container-->

<?php include('../lib/js-inc.php');?>
<script>
$(document).ready(function(e) {
	
	$('#per_adddate').datepicker({
		format: 'yyyy-mm-dd', 
		language: 'th', 
		autoclose: true
	});
	$('#per_contract1').datepicker({
		format: 'yyyy-mm-dd', 
		language: 'th', 
		autoclose: true
	});
	$('#per_contract2').datepicker({
		format: 'yyyy-mm-dd', 
		language: 'th', 
		autoclose: true
	});
	$('#dev_stdate').datepicker({
		format: 'yyyy-mm-dd', 
		language: 'th', 
		autoclose: true
	});
	$('#dev_enddate').datepicker({
		format: 'yyyy-mm-dd', 
		language: 'th', 
		autoclose: true
	});
	
	$('#formDefault').bootstrapValidator({
		 fields: {
			  'ld_id[]':{
				  validators: {
                    notEmpty: {
                       //message: 'โปรดระบุผู้เข้าร่วม'
                    },
					/*choice: {
                        min: 1,
						message: 'โปรดเลือกอย่างน้อย 1 รายการ'
                    }*/
                }
			  },
			   dev_edu:{
				   enabled: false,
				  validators:{
					  notEmpty:{
					  },
				  }
			  },
		 }
	});
	
	// Enable street/city/country validators if user want to degree
    $('input[name="dev_type"]').on('change', function() {
        var bootstrapValidator = $('#formDefault').data('bootstrapValidator'),
            shipDegree     = ($(this).val() == '4');

        shipDegree ? $('#newDegree').find('.form-control').removeAttr('disabled')
                       : $('#newDegree').find('.form-control').attr('disabled', 'disabled');

        bootstrapValidator.enableFieldValidators('dev_edu', shipDegree);
                          /*.enableFieldValidators('city', shipNewAddress)
                          .enableFieldValidators('country', shipNewAddress)
                          .enableFieldValidators('state', shipNewAddress && $('select[name="country"]').val() == 'US');*/
    });
	
	$('#per_adddate').datepicker()
        .on('change show', function(e) {
            // Validate the date when user change it
            $('#formDefault').data('bootstrapValidator').revalidateField('per_adddate');
            // You also can call it as following:
            //$('#formFilter').bootstrapValidator('revalidateField', 'startDate');
        });
	$('#per_contract1').datepicker()
        .on('change show', function(e) {
            // Validate the date when user change it
            $('#formDefault').data('bootstrapValidator').revalidateField('per_contract1');
            // You also can call it as following:
            //$('#formFilter').bootstrapValidator('revalidateField', 'startDate');
        });
		$('#per_contract2').datepicker()
        .on('change show', function(e) {
            // Validate the date when user change it
            $('#formDefault').data('bootstrapValidator').revalidateField('per_contract2');
            // You also can call it as following:
            //$('#formFilter').bootstrapValidator('revalidateField', 'startDate');
        });
		$('#dev_stdate').datepicker()
        .on('change show', function(e) {
            // Validate the date when user change it
            $('#formDefault').data('bootstrapValidator').revalidateField('dev_stdate');
            // You also can call it as following:
            //$('#formFilter').bootstrapValidator('revalidateField', 'startDate');
        });
		$('#dev_enddate').datepicker()
        .on('change show', function(e) {
            // Validate the date when user change it
            $('#formDefault').data('bootstrapValidator').revalidateField('dev_enddate');
            // You also can call it as following:
            //$('#formFilter').bootstrapValidator('revalidateField', 'startDate');
        });

		//$('select[name="dev_country"]').select2({dropdownCssClass: 'show-select-search'});
		$('select[name="per_name"]').select2({
            dropdownCssClass: 'show-select-search'
        });
        $('select[name="per_dept"]').select2({
            dropdownCssClass: 'show-select-search',
            placeholder: 'เลือกส่วนงาน'
        }).on('change', function(){
            const keyword = $(this).val();
            console.log(keyword);
            $.ajax({
                url: 'https://docs.ph.mahidol.ac.th/phonebook/xml/account_isboss.php?c='+keyword,
                method: 'GET',
                dataType: 'json'
            }).then(function(result, status){
                console.log(status);
                if(status === 'success'){
                    const inputBossname = result.data[0].text;
                    const inputJobs = result.data[0].jobs;
                    $('input[name="dev_bossname"]').val(inputBossname);
                    $('input[name="dev_bosspos"]').val(inputJobs);
                }
            });
        });

        $('#dev_bossname').on('change show', function(){
            //if($(this).val() === ''){
                //$('#formDefault').bootstrapValidator('enableFieldValidators', 'dev_bossname', false);
            //}else{
                $('#formDefault').bootstrapValidator('revalidateField', 'dev_bossname');
            //}
        });
        $('#dev_bosspos').on('change show', function(){
            //if($(this).val() === ''){
                //$('#formDefault').bootstrapValidator('enableFieldValidators', 'dev_bosspos', false);
            //}else{
                $('#formDefault').bootstrapValidator('revalidateField', 'dev_bosspos');
            //}
        });

});
</script>
<script>
	var countries = new Bloodhound({
  datumTokenizer: function(d) { return Bloodhound.tokenizers.whitespace(d.label); },
  queryTokenizer: Bloodhound.tokenizers.whitespace,
  limit: 10,
  prefetch: '../json/country-json.php'
});
countries.initialize();
 $('#dev_country').typeahead(null,{
	 name: 'countries',
	  displayKey: 'label',
	  source: countries.ttAdapter()
  });
</script>
</body>
</html>