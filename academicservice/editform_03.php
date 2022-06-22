<?php
session_start();

include('../admin/compcode/include/config.php');
//include('../admin/compcode/check_login.php');
include('../admin/compcode/include/connect_db.php');
include('../admin/compcode/include/function.php');

include('../lib/css-inc.php');

include('../inc/navbar02-inc.php');
?>
<div class="container">

	<!--<ol class="breadcrumb">
  		<li><a href="#"><i class="fa fa-arrow-left fa-fw"></i> กรอกแบบฟอร์ม</a></li>
	</ol>-->
    <form action="" method="post" id="formDefault">
    	<div class="panel panel-default">
        	<div class="panel-heading clearfix">
            	<h3 class="panel-title pull-left"><a href="<?php print $livesite;?>profile/profile.php"><i class="fa fa-arrow-left fa-fw"></i> กรอกแบบฟอร์มขออนุมัติลา (ต่างประเทศ)</a></h3>
                <div class="pull-right"><button class="btn btn-link btn-lg" type="submit"><i class="fa fa-check"></i> Save</button></div>
            </div><!--heading-->
        	<div class="panel-body">
            	<?php
				$sql=mysql_query("SELECT personel.per_pname, 
						personel.per_fnamet, 
						personel.per_lnamet, 
						personel_type.pert_name, 
						personel.job_id, 
						tb_orgnew.dp_name, 
						DATE_FORMAT( personel.per_adddate,  '%d/%m/%Y' ) AS per_adddate, 
						DATE_FORMAT( personel.per_hiredate1,  '%d/%m/%Y' ) AS per_hiredate1, 
						DATE_FORMAT( personel.per_hiredate2,  '%d/%m/%Y' ) AS per_hiredate2,
						personel.per_erpid,
						personel.per_id,
						personel.per_telin
						FROM phper2.personel
						INNER JOIN phper2.tb_orgnew ON ( personel.per_dept = tb_orgnew.dp_id ) 
						LEFT JOIN phper2.personel_type ON ( personel.per_type = personel_type.pert_id )
						where personel.per_id='$_SESSION[ses_per_id]'");
				$ob=mysql_fetch_assoc($sql);
				?>
       	<div class="table-responsive">
    <table border="0" cellpadding="0" cellspacing="0" class="table table-striped">
    	<tbody>
        	<tr>
            	<th colspan="2">ผู้เสนอขออนุมัติ</th>
            </tr>
            <!--<tr>
            	<td>ส่วนงาน:</td>
                <td>
                    <div class="form-group">
                        <select data-toggle="select" name="dp_id" class="form-control select select-inverse select-sm">
                            <?php
                           /* $sql02=mysql_query("select * from phper2.department_type
                                    inner join phper2.tb_orgnew on (department_type.typ_id=tb_orgnew.typ_id)
                                    where department_type.typ_id='PH00001'
                                    or department_type.typ_id='PH00002'
                                    order by department_type.typ_id asc,
                                    tb_orgnew.dp_id asc");
                            while($ob02=mysql_fetch_assoc($sql02)){
                                if($_SESSION['ses_per_dept'] == $ob02['dp_id']){
                                	print '<option value="'.$ob02['dp_id'].'" selected>'.$ob02['typ_name'].' &raquo; '.$ob02['dp_name'].'</option>';
								}else{
									print '<option value="'.$ob02['dp_id'].'">'.$ob02['typ_name'].' &raquo; '.$ob02['dp_name'].'</option>';
								}
                            }*/
                            ?>
                        </select>
                    </div>
                </td>
            </tr>-->
        	<tr>
            	<td colspan="2">
                	<div class="row">
                    	<div class="col-sm-6">
                            <div class="form-group">
                                <label class="control-label">ชื่อ-นามสกุล:</label>
                                <p class="form-control-static"><?php echo $ob['per_pname'].$ob['per_fnamet'].' '.$ob['per_lnamet'];?></p>
                                <input type="hidden" value="<?php echo $ob['per_id'];?>" name="per_id">                            
                            </div>
                          </div>
                          <div class="col-sm-6">
                            <div class="form-group">
                            	<label class="control-label">ประเภท:</label>
                                <p class="form-control-static"><?php echo $ob['pert_pname'];?></p>
                            </div>
                        </div>
                        </div>
                </td>
            </tr>
            <tr>
            	<td colspan="2">
                	<div class="row">
                    	<div class="col-sm-6">
                        	<div class="form-group">
                            	<label class="control-label">ตำแหน่ง:</label>
                                <p class="form-control-static"><?php echo $ob['job_id'];?></p>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                            	<label class="control-label">เลขประจำตำแหน่ง:</label>
                                <p class="form-control-static"><?php echo $ob['per_erpid'];?></p>
                            </div>
                        </div>
                    </div>            	
                </td>
            </tr>
            <tr>
            	<td colspan="2">
                	<div class="row">
                    	<div class="col-sm-6">
                        	<div class="form-group">
                            	<label class="control-label">สังกัด:</label>
                                <p class="form-control-static"><?php echo $ob['dp_name'];?></p>
                            </div>
                        </div>
                       <div class="col-sm-6">
                            <div class="form-group">
                            	<label class="control-label">บรรจุเมื่อวันที่:</label>
                                <!--<input type="text" class="form-control input-sm" name="per_adddate" id="per_adddate">-->
                                <p class="form-control-static"><?php echo $ob['per_adddate'];?></p>
                            </div>
                        </div>
                    </div>            	
                </td>
            </tr>
            <tr>
            	<td colspan="2">
                	<div class="row">
                        <div class="col-sm-6">
                        	<div class="form-group">
                            	<label class="control-label">ระยะเวลาการจ้างตั้งแต่วันที่:</label>
                                <!--<input type="text" class="form-control input-sm" name="per_hiredate1" id="per_hiredate1">-->
                                <p class="form-control-static"><?php echo $ob['per_hiredate1'];?></p>
                            </div>
                        </div>
                        <div class="col-sm-6">
                        	<div class="form-group">
                            	<label class="control-label">ถึงวันที่:</label>
                                <!--<input type="text" class="form-control input-sm" name="per_hiredate2" id="per_hiredate2">-->
                                <p class="form-control-static"><?php echo $ob['per_hiredate2'];?></p>
                            </div>
                        </div>
                    </div>            	
                </td>
            </tr>
            <tr>
            	<td colspan="2">
                	<div class="row">
                    	<div class="col-sm-6">
                            <div class="form-group form-group-sm">
                            	<label class="control-label">โทร:</label>
                                <input type="text" name="dev_tel" class="form-control" value="<?php echo $ob['per_telin'];?>" required>
                            </div>
                        </div>
                        <div class="col-sm-6">
                        	<div class="form-group form-group-sm">
                            	<label class="control-label">โทรสาร:</label>
                                <input type="text" name="dev_fax" class="form-control">
                            </div>
                        </div>
                    </div>            	
                </td>
            </tr>
            <tr>
            	<td>ประเภทการลา:</td>
                <td>
                	<div class="row">
                    	<div class="col-sm-6">
                        	<div class="form-group">
                            	<select name="dev_type" class="form-control select select-primary select-sm" data-toggle="select">
                                	<option value="">&raquo; เลือกรายการ</option>
                            	<?php
								$sql=mysql_query("select * from phper2.develop_leave_type order by la_id asc");
								while($ob=mysql_fetch_assoc($sql)){
									print '<option value="'.$ob['la_id'].'">'.$ob['la_name'].'</option>';
								}
								?>
                                </select>
                            </div>
                        </div><!--col-->
                        <div class="col-sm-6">
                        	<div class="form-group">
								<?php
                                foreach($cf_local as $key=>$value){
                                    print '<label class="radio"><input type="radio" name="dev_local" value="'.$key.'" data-toggle="radio"> '.$value['name'].'</label>';
                                }
                                ?>
                            </div>
                        </div><!--col-->
                    </div><!--row-->
                </td>
            </tr>
            <tr>
              <th class="formcolhd" colspan="2">ข้อมูลการลา</th>
            </tr>
            <tr>
              <td class="formcolhd">หลักสูตร/โครงการ:</td>
              <td class="tdpadding"><div class="form-group"><input name="title_pic" type="text" class="form-control inputform input-sm" id="title_news" value="" size="60" required/></div></td>
        </tr>
    	<tr>
                    <td class="formcolhd">ระหว่างวันที่:</td>
                    <td class="tdpadding">
                        <div class="row">
                        	<div class="col-sm-6">
                                <div class="form-group form-group-sm"><label class="control-label">เริ่ม:</label><input type="text" name="dev_stdate" id="startdate" size="10" class="form-control" required></div> 
                            </div>
                            <div class="col-sm-6">
                            	<div class="form-group form-group-sm"><label class="control-label">สิ้นสุด:</label><input type="text" name="dev_enddate" id="enddate" size="10" class="form-control" required></div>
                            </div>
                        </div>
            </td>
        </tr>       
            <tr>
            	<td>สถานที่จัด:</td>
                <td>
                	<div class="form-group">
                    	<textarea class="form-control" rows="2" name="dev_place" required></textarea>
                    </div>
                </td>
            </tr>
            <tr>
              <td class="formcolhd">หน่วยงานผู้จัด:</td>
              <td  align="left" class="tdpadding">
              	<div class="form-group"><input type="text" class="form-control input-sm" name="dev_org" required></div>
                </td>
            </tr>
            <tr>
            	<td>ณ ประเทศ:</td>
                <td><div class="form-group"><input type="text" name="dev_country" id="dev_country" class="form-control input-sm"></div></td>
            </tr>
            <tr>
            	<td>ชื่อทุน:</td>
                <td><div class="form-group"><input type="text" name="dev_fundname" class="form-control input-sm"></div></td>
            </tr>
            <tr>
            	<td>ระดับการศึกษา:</td>
                <td>
                	<div class="form-group">
                    	<select name="dev_edu" class="form-control select select-inverse select-sm" data-toggle="select">
                        	<option value="">&raquo; เลือกรายการ</option>
                            <?php
							$sql=mysql_query("select * from phper2.degree
									where dg_status='1'
									order by dg_id asc");
							while($ob=mysql_fetch_assoc($sql)){
								echo '<option value="'.$ob['dg_id'].'">&raquo; '.$ob['dg_name'].'</option>';
							}
							?>
                        </select>
                        <span class="help-block">**เฉพาะกรณีขออนุมัติลาศึกษา</span>
                    </div>
                </td>
            </tr>
            <tr>
            	<td colspan="2"><strong>ได้แนบเอกสารประกอบการพิจารณา ดังนี้</strong></td>
            </tr>
            <tr>
            	<td colspan="2">
                	<div class="form-group">
                    	<div class="row">
							<?php
                           $sql=mysql_query("select * from phper2.develop_leave_doc order by ld_id asc");
						   while($ob=mysql_fetch_assoc($sql)){
							   if($ob['ld_id']=='8'){
									print '<div class="col-sm-4">
											<label class="checkbox"><input type="checkbox" name="ld_id[]" value="'.$ob['ld_id'].'" data-toggle="checkbox"> '.$ob['ld_name'].' <input type="text" class="form-control input-sm" placeholder="อื่นๆ ระบุ" name="ld_other"></label>
										</div>';
							   }else{
									print '<div class="col-sm-4">
											<label class="checkbox"><input type="checkbox" name="ld_id[]" value="'.$ob['ld_id'].'" data-toggle="checkbox"> '.$ob['ld_name'].'</label>
										</div>';
							   }
                            }
                            ?>
                        </div>
                    </div>
                </td>
            </tr>
      	</tbody>
      </table>
      			</div><!--table-responsive-->
        	</div><!--body-->
            <div class="panel-footer">
            	<!--<input name="dev_maintype" type="hidden" value="<?php //print $_GET['dm_id'];?>" />-->
            	<input class="btn button btn-block" type="submit" name="submit" value="บันทึกแบบฟอร์ม">
            </div><!--footer-->
        </div><!--panel-->
    </form>

</div><!--container-->

<?php include('../lib/js-inc.php');?>
<script>
$(document).ready(function(e) {
	
	$('#per_adddate').datepicker({
		format: 'yyyy-mm-dd', 
		language: 'th', 
		autoclose: true
	});
	$('#per_hiredate1').datepicker({
		format: 'yyyy-mm-dd', 
		language: 'th', 
		autoclose: true
	});
	$('#per_hiredate2').datepicker({
		format: 'yyyy-mm-dd', 
		language: 'th', 
		autoclose: true
	});
	$('#startdate').datepicker({
		format: 'yyyy-mm-dd', 
		language: 'th', 
		autoclose: true
	});
	$('#enddate').datepicker({
		format: 'yyyy-mm-dd', 
		language: 'th', 
		autoclose: true
	});
	
	//$('#reg_appoint_time').timepicker({'scrollDefault': 'now', 'step':'30', 'maxTime': '23:59', 'timeFormat': 'H:i'});
	
	//autocomplete
	var devCountry = new Bloodhound({
	  datumTokenizer: function(d) { return Bloodhound.tokenizers.whitespace(d.label); },
	  queryTokenizer: Bloodhound.tokenizers.whitespace,
	  limit: 20,
	  prefetch: 'countryname-json.php'
	});

	devCountry.initialize();
	
	 $('#dev_country').typeahead(null,{
		 name: 'devCountry',
		  displayKey: 'label',
		  source: devCountry.ttAdapter()
      });
		//autocomplete
	
     $('#formDefault').bootstrapValidator({
		 fields: {
			   dev_country:{
				  validators: {
                    notEmpty: {
                       //message: 'โปรดระบุผู้เข้าร่วม'
                    }
                }
			  },
			  dev_fundname:{
				  validators: {
                    notEmpty: {
                       //message: 'โปรดระบุผู้เข้าร่วม'
                    }
                }
			  },
			  'ld_id[]':{
				  validators:{
					  notEmpty:{
						},
					   choice: {
							min: 1,
							//message: 'โปรดเลือกอย่างน้อย 1 รายการ'
					   }
				  }
			  },
			  dev_type:{
				  validators:{
					  notEmpty:{
					  }
				  }
			  },
			  dev_local:{
				  validators:{
					  notEmpty:{
					  }
				  }
			  }
		 }
	});
	
	$('#per_adddate').datepicker()
        .on('change show', function(e) {
            // Validate the date when user change it
            $('#formDefault').data('bootstrapValidator').revalidateField('per_adddate');
            // You also can call it as following:
            //$('#formFilter').bootstrapValidator('revalidateField', 'startDate');
        });
		$('#per_hiredate1').datepicker()
        .on('change show', function(e) {
            // Validate the date when user change it
            $('#formDefault').data('bootstrapValidator').revalidateField('per_hiredate1');
            // You also can call it as following:
            //$('#formFilter').bootstrapValidator('revalidateField', 'startDate');
        });
		$('#per_hiredate2').datepicker()
        .on('change show', function(e) {
            // Validate the date when user change it
            $('#formDefault').data('bootstrapValidator').revalidateField('per_hiredate2');
            // You also can call it as following:
            //$('#formFilter').bootstrapValidator('revalidateField', 'startDate');
        });
	$('#startdate').datepicker()
        .on('change show', function(e) {
            // Validate the date when user change it
            $('#formDefault').data('bootstrapValidator').revalidateField('dev_stdate');
            // You also can call it as following:
            //$('#formFilter').bootstrapValidator('revalidateField', 'startDate');
        });
		$('#end').datepicker()
        .on('change show', function(e) {
            // Validate the date when user change it
            $('#formDefault').data('bootstrapValidator').revalidateField('dev_enddate');
            // You also can call it as following:
            //$('#formFilter').bootstrapValidator('revalidateField', 'startDate');
        });
		
		//search select
		//$('select[name="dp_id"]').select2({dropdownCssClass: 'show-select-search'});
		//search select

});
</script>