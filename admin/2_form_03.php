<?php
session_start();

include('compcode/include/config.php');
//include('compcode/check_login.php');
include('compcode/include/connect_db.php');
include('compcode/include/function.php');

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
            	<h3 class="panel-title pull-left"><a href="<?php print $livesite;?>admin/2_allform.php"><i class="fa fa-arrow-left fa-fw"></i> กรอกแบบฟอร์มขออนุมัติลา (ต่างประเทศ)</a></h3>
                <div class="pull-right"><button class="btn btn-link btn-lg" type="submit"><i class="fa fa-check"></i> Save</button></div>
            </div><!--heading-->
        	<div class="panel-body">
       	<div class="table-responsive">
    <table border="0" cellpadding="0" cellspacing="0" class="table table-striped">
    	<tbody>
        	<tr>
            	<th colspan="2">ผู้เสนอขออนุมัติ</th>
            </tr>
        	<tr>
            	<td colspan="2">
                	<div class="row">
                    	<div class="col-sm-6">
                            <div class="form-group form-group-sm">
                                <label class="control-label">ชื่อ-นามสกุล:</label>
                                <select data-toggle="select" name="per_id" class="form-control select select-inverse select-sm" required>
                                    <option value="">&nbsp;</option>
                                    <?php
                                    $sql_02=mysql_query("select * from phper2.personel
                                                    inner join phper2.tb_orgnew on (personel.per_dept=tb_orgnew.dp_id)
                                                    where personel.per_flag='1'
                                                    order by convert(personel.per_fnamet using tis620) asc,
                                                    convert(personel.per_lnamet using tis620) asc");
                                    while($ob_02=mysql_fetch_assoc($sql_02)){
                                        print '<option value="'.$ob_02['per_id'].'">&raquo; '.$ob_02['per_pname'].$ob_02['per_fnamet'].' '.$ob_02['per_lnamet'].'</option>';
                                    }
                                    ?>
                                </select> 
                            </div>
                          </div>
                          <div class="col-sm-6">
                            <div class="form-group">
                            	<label class="control-label">ประเภท:</label>
                                <select name="per_type" class="form-control select select-sm select-inverse" data-toggle="select" required>
                                	<option value="">&nbsp;</option>
                                	<?php
									$sql=mysql_query("select * from phper2.personel_type where pert_status='1' order by pert_id asc");
									while($ob=mysql_fetch_assoc($sql)){
										echo '<option value="'.$ob['pert_id'].'">'.$ob['pert_name'].'</option>';
									}
									?>
                                </select>
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
                            	<label class="control-label">ตำแหน่ง:</label>
                                <input type="text" class="form-control" name="job_id" id="job_id" required>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group form-group-sm">
                            	<label class="control-label">เลขประจำตำแหน่ง:</label>
                                <input type="text" class="form-control" name="per_erpid" required>
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
                                <select data-toggle="select" name="dp_id" class="form-control select select-inverse select-sm" required>
                                    <option value="">&raquo; เลือกรายการ</option>
                                    <?php
                                    $sql=mysql_query("select * from phper2.department_type
                                            inner join phper2.tb_orgnew on (department_type.typ_id=tb_orgnew.typ_id)
                                            where department_type.typ_id='PH00001'
                                            or department_type.typ_id='PH00002'
                                            order by department_type.typ_id asc,
                                            tb_orgnew.dp_id asc");
                                    while($ob=mysql_fetch_assoc($sql)){
                                        print '<option value="'.$ob['dp_id'].'">'.$ob['typ_name'].' &raquo; '.$ob['dp_name'].'</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                       <div class="col-sm-6">
                            <div class="form-group form-group-sm">
                            	<label class="control-label">บรรจุเมื่อวันที่:</label>
                                <input type="text" class="form-control input-sm" name="per_adddate" id="per_adddate" required>
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
                            	<label class="control-label">ระยะเวลาการจ้างตั้งแต่วันที่:</label>
                                <input type="text" class="form-control input-sm" name="per_hiredate1" id="per_hiredate1" required>
                            </div>
                        </div>
                        <div class="col-sm-6">
                        	<div class="form-group form-group-sm">
                            	<label class="control-label">ถึงวันที่:</label>
                                <input type="text" class="form-control input-sm" name="per_hiredate2" id="per_hiredate2" required>
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
							   /*if($ob['ld_id']=='8'){
									print '<div class="col-sm-4">
											<label class="checkbox"><input type="checkbox" name="ld_id[]" value="'.$ob['ld_id'].'" data-toggle="checkbox"> '.$ob['ld_name'].' <input type="text" class="form-control input-sm" placeholder="อื่นๆ ระบุ" name="ld_other"></label>
										</div>';
							   }else{
									print '<div class="col-sm-4">
											<label class="checkbox"><input type="checkbox" name="ld_id[]" value="'.$ob['ld_id'].'" data-toggle="checkbox"> '.$ob['ld_name'].'</label>
										</div>';
							   }*/
							   print '<div class="col-sm-4">
											<label class="checkbox"><input type="checkbox" name="ld_id[]" value="'.$ob['ld_id'].'" data-toggle="checkbox"> '.$ob['ld_name'].'</label>
										</div>';
                            }
							echo '<div class="col-sm-4"><input type="text" class="form-control input-sm" placeholder="อื่นๆ ระบุ" name="dev_docother"></div>';
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
	  
	  var jobId = new Bloodhound({
	  datumTokenizer: function(d) { return Bloodhound.tokenizers.whitespace(d.label); },
	  queryTokenizer: Bloodhound.tokenizers.whitespace,
	  limit: 20,
	  prefetch: '../personel/job-json.php'
	});

	jobId.initialize();
	
	 $('#job_id').typeahead(null,{
		 name: 'jobId',
		  displayKey: 'label',
		  source: jobId.ttAdapter()
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
		
		//serach select
		$('select[name="per_id"]').select2({dropdownCssClass: 'show-select-search'});
		$('select[name="dp_id"]').select2({dropdownCssClass: 'show-select-search'});
		$('select[name="per_type"]').select2({dropdownCssClass: 'show-select-search'});
		//serach select

});
</script>