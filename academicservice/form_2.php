<?php
session_start();

include('../admin/compcode/include/config.php');
include('../admin/compcode/check_login.php');
include('../admin/compcode/include/connect_db.php');
include('../admin/compcode/include/function.php');

include('../lib/css-inc.php');

include('../inc/navbar02-inc.php');
?>
<div class="container-fluid">

    <form action="../admin/2_createform2_action.php" method="post" id="formDefault" enctype="multipart/form-data">
    	<div class="panel panel-default">
        	<div class="panel-heading clearfix">
            	<h3 class="panel-title pull-left"><a href="<?php print $livesite;?>admin/2_allform.php"><i class="fa fa-arrow-left fa-fw"></i> กรอกแบบฟอร์ม<?php print $_GET['dm_title'];?></a></h3>
                <div class="pull-right"><button class="btn btn-link btn-lg" type="submit"><i class="fa fa-check"></i> Save</button></div>
            </div><!--heading-->
        	<div class="panel-body">
            	
    	<div class="row">
        	<div class="col-sm-6">
            	<div class="form-group form-group-sm">
                	<label class="control-label">ส่วนงาน:</label>
                    <select data-toggle="select" name="dp_id" class="form-control select select-inverse select-sm">
                    	<option value="">&raquo; เลือกรายการ</option>
                        <?php
						$sql=mysql_query("select * from $db_eform.department_type
								inner join $db_eform.tb_orgnew on (department_type.typ_id=tb_orgnew.typ_id)
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
                <!--<div class="row">
                	<div class="col-sm-6">
                    	<div class="form-group form-group-sm">
                        	<label class="control-label">ที่:</label>
                            <input type="text" name="dev_order" class="form-control">
                        </div>
                    </div>
                    <div class="col-sm-6">
                    	<div class="form-group form-group-sm">
                        	<label class="control-label">ลงวันที่:</label>
                            <input type="text" name="dev_ordate" id="dev_ordate" class="form-control">
                        </div>
                    </div>
                </div>--><!--row-->
        <legend>รายละเอียดหลักสูตรฝึกอบรม / โครงการ</legend>
       	<div class="table-responsive">
    <table border="0" cellpadding="0" cellspacing="0" class="table table-striped">
    	<tbody>
        	<tr>
            	<th colspan="2">หนังสือเชิญ / จดหมายเชิญ</th>
            </tr>
        	<tr>
            	<td>ตามหนังสือ:</td>
                <td>
                	<div class="form-group">
                    	<input type="text" class="form-control input-sm" name="dev_bookfrom_01" required>
                    </div>
                </td>
            </tr>
            <tr>
            	<td>ที่:</td>
                <td>
                	<div class="form-group">
                    	<input type="text" class="form-control input-sm" name="dev_bookfrom_02" required>
                    </div>
                </td>
            </tr>
            <tr>
            	<td>ลงวันที่:</td>
                <td>
                	<div class="form-group">
                    	<input type="text" class="form-control input-sm" name="dev_bookfrom_03" id="dev_bookfrom_03" required>
                    </div>
                </td>
            </tr>
            <tr>
            	<td>เรื่อง:</td>
                <td>
                	<div class="form-group">
                    	<input type="text" class="form-control input-sm" name="dev_bookfrom_04" required>
                    </div>
                </td>
            </tr>
            <tr>
              <td class="formcolhd">หลักสูตร/โครงการ:</td>
              <td class="tdpadding"><div class="form-group"><input name="dev_onus" type="text" class="form-control inputform input-sm" id="title_news" value="" size="60" required/></div></td>
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
        	<td>ตั้งแต่เวลา:</td>
            <td>
            	<div class="form-group">
                    <div class="row">
                        <div class="col-sm-6">
                            <?php echo select_time('dev_timebegin', date('H:00'), 'inverse', 'sm');?>
                        </div>
                        <div class="col-sm-6">
                            <?php echo select_time('dev_timeend', date('H:00'), 'inverse', 'sm');?>
                        </div>
                    </div><!--row-->
                </div>
            </td>
        </tr>
        <tr>
            	<td>จำนวนชั่วโมงที่ใช้จริง:</td>
                <td><div class="form-group"><input type="number" class="form-control input-sm" name="dev_training_hour" required></div></td>
            </tr>       
        <tr >
              <td class="formcolhd">ลักษณะงาน:</td>
              <td background="../admin/compcode/compcode/picture/back_1.jpg" class="tdpadding">
                <div class="form-group"><select name="typ_id" class="form-control select select-primary select-sm" data-toggle="select">
                        <option value="">&raquo; เลือกรายการ</option>
                        <?php
                        $typ=mysql_query("select * from $db_eform.develop_main_type
									inner join $db_eform.develop_type on (develop_main_type.dm_id = develop_type.dm_id)
									where develop_type.dvt_status = '1'
									and develop_main_type.dm_id = '$_GET[dm_id]'
									order by develop_main_type.dm_id asc,
									develop_type.dvt_id asc");
                        while($ob=mysql_fetch_array($typ)){
                            print "<option value=".$ob[dvt_id].">- ".$ob['dm_title'].' &raquo; '.$ob['dvt_name']." -</option>";
                        }
                        ?>                 
                    </select>
                    <?php
					/*$typ=mysql_query("select * from phper2.develop_main_type
									inner join phper2.develop_type on (develop_main_type.dm_id = develop_type.dm_id)
									where develop_type.dvt_status = '1'
									and develop_main_type.dm_id = '$_GET[dm_id]'
									and develop_type.dvt_id <> '0'
									order by develop_main_type.dm_id asc,
									develop_type.dvt_id asc");
                        while($ob=mysql_fetch_array($typ)){
                            print '<label class="checkbox"><input type="checkbox" data-toggle="checkbox" name="dvt_id[]" value="'.$ob[dvt_id].'" required>'.$ob['dm_title'].' &raquo; '.$ob['dvt_name'].'</label>';
                        }*/
					?>
                    </div>         
                    </td>
            </tr>
            <tr >
              <td class="formcolhd">เกี่ยวข้องกับกิจกรรม:</td>
              <td class="tdpadding">
                <div class="form-group"><select name="act_id" class="form-control select select-primary select-sm" data-toggle="select" required>
                        <option value="">&raquo; เลือกรายการ</option>
                        <?php
                        $sec=mysql_query("select * from $db_eform.activity
									where act_use = 'yes'
									order by act_id asc");
                        while($ob=mysql_fetch_array($sec)){
                            print "<option value=".$ob[act_id].">- ".$ob[activity]." -</option>";
                        }
                        ?>                 
                    </select></div>                           </td>
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
            	<td>ประเภทสถานที่:</td>
                <td>
                    <div class="form-group"><select name="lt_id" class="form-control select select-primary select-sm" data-toggle="select" required>
                        <?php
                        $sec=mysql_query("select * from $db_eform.develop_location_type
									where lt_use = 'yes'
									order by lt_order asc");
                        while($ob=mysql_fetch_array($sec)){
                            print "<option value=".$ob[lt_id].">- ".$ob['lt_title']." -</option>";
                        }
                        ?>                 
                    </select></div>
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
                <td>
                    <div class="form-group">
                    	<select name="dev_country" class="form-control select select-primary select-sm" data-toggle="select">
                        	<?php
							$qCountry=mysql_query("select * from $db_eform.country order by ct_name asc");
							while($rCountry=mysql_fetch_assoc($qCountry)){
								if($rCountry['ct_id'] == '223'){
									echo '<option value="'.$rCountry['ct_id'].'" selected>'.$rCountry['ct_name'].'</option>';
								}else{
									echo '<option value="'.$rCountry['ct_id'].'">'.$rCountry['ct_name'].'</option>';
								}
							}
							?>
                        </select>
                    </div>
                </td>
            </tr>
            
             <tr>
            	<td>ระดับกิจกรรม:</td>
                <td>
                    <div class="form-group"><select name="le_id" class="form-control select select-primary select-sm" data-toggle="select" required>
                        <?php
                        $sec=mysql_query("select * from $db_eform.develop_level
									where le_use = 'yes'
									order by le_id asc");
                        while($ob=mysql_fetch_array($sec)){
                            print "<option value=".$ob[le_id].">- ".$ob['le_title']." -</option>";
                        }
                        ?>                 
                    </select></div>
                </td>
            </tr>
            <tr>
            	<th colspan="2">รายละเอียดการขออนุมัติค่าใช้จ่าย</th>
            </tr>
            <tr>
            	<td>แหล่งทุน:</td>
                <td>
                	<div class="form-group">
                    	<div class="row">
                        	<div class="col-sm-6">
                                <select name="dev_payfrom" class="form-control select select-primary select-sm" data-toggle="select" required>
                                    <?php
                                    $sql = mysql_query("select * from $db_eform.develop_payfrom
                                                where pf_use = 'yes'
                                                order by pf_id asc");
                                    while($ob = mysql_fetch_assoc($sql)){
                                        print '<option value="'.$ob['pf_id'].'">&raquo; '.$ob['pf_title'].'</option>';
                                    }
                                    ?>
                                </select>
                        	</div>
                            <div class="col-sm-6">
                                <input class="form-control input-sm" placeholder="ระบุชื่อทุน (ถ้ามี)" type="text" name="dev_fundname">
                        	</div>
                        </div>
                    </div>
                </td>
            </tr>
        	<tr>
            	<td>	ประเภทเงิน:</td>
                <td>
                	<div class="form-group">
                    	<table class="table">
                        	<tbody>
								<?php
                                $sql=mysql_query("select * from $db_eform.budtype
                                        where bt_flag='1'
                                        order by bt_id asc");
                                while($ob=mysql_fetch_assoc($sql)){
                                    //print '<label class="checkbox"><input name="bt_id[]" type="checkbox" value="'.$ob['bt_id'].'" data-toggle="checkbox"> '.$ob['bt_name'].'</label>';
									print '<tr>
												<td><label class="checkbox"><input name="bt_id[]" type="checkbox" value="'.$ob['bt_id'].'" data-toggle="checkbox" required> '.$ob['bt_name'].'</label></td>
												<td><input name="bt_dev_pay01'.$ob['bt_id'].'" type="number" class="form-control input-sm" placeholder="จำนวนเงิน"></td>
											</tr>';
                                }
                                ?>
                        	</tbody>
                        </table>
                    </div>
                </td>
            </tr>
            <tr>
            	<td>	ประเภทค่าใช้จ่าย:</td>
                <td>
                    <div class="form-group">
                        <table class="table">
                        	<tbody>
                    	<?php
						$sql=mysql_query("select * from $db_eform.develop_cost_type
								where ct_use='yes'
								and ct_id<>'0'
								order by ct_id asc");
						while($ob=mysql_fetch_assoc($sql)){
							//print '<label class="checkbox"><input name="ct_id[]" type="checkbox" value="'.$ob['ct_id'].'" data-toggle="checkbox"> '.$ob['ct_title'].'</label>';
							if($ob['ct_id'] != '5'){
								print '<tr>
											<td><label class="checkbox"><input name="ct_id[]" type="checkbox" value="'.$ob['ct_id'].'" data-toggle="checkbox"> '.$ob['ct_title'].'</label></td>
											<td><input name="ct_dev_pay01'.$ob['ct_id'].'" type="number" class="form-control input-sm" placeholder="จำนวนเงิน"></td>
										</tr>';
							}else{
								print '<tr>
											<td><label class="checkbox"><input name="ct_id[]" type="checkbox" value="'.$ob['ct_id'].'" data-toggle="checkbox"> '.$ob['ct_title'].'</label></td>
											<td><input name="ct_dev_pay01'.$ob['ct_id'].'" type="number" class="form-control input-sm" value="0"></td>
										</tr>';
							}
						}
						?>
                        	</tbody>
                        </table>
                    </div>
                </td>
            </tr>
            <tr>
            	<th colspan="2">ยุทธศาสตร์ที่เกี่ยวข้อง</th>
            </tr>
            <tr>
            	<td>ยุทธศาสตร์มหาวิทยาลัยฯ:</td>
                <td>
                    <div class="form-group"><select name="ss_id" class="form-control select select-primary select-sm" data-toggle="select" required>
                    	<option value="">&raquo; เลือกรายการ</option>
                        <?php
                        $sec=mysql_query("select * from $db_eform.sub_strategic
									where ss_use = 'yes'
									order by id asc");
                        while($ob=mysql_fetch_array($sec)){
                            print "<option value=".$ob[id].">- ".$ob['nameth']." -</option>";
                        }
                        ?>                 
                    </select></div>
                </td>
            </tr>
            <tr>
            	<td>ยุทธศาสตร์คณะฯ:</td>
                <td>
                    <div class="form-group"><select name="sf_id" class="form-control select select-primary select-sm" data-toggle="select" required>
                    	<option value="">&raquo; เลือกรายการ</option>
                        <?php
                        $sec=mysql_query("select * from $db_eform.strategic_faculty
									where sf_use = 'yes'
									order by sf_id asc");
                        while($ob=mysql_fetch_array($sec)){
                            print "<option value=".$ob[sf_id].">- ".$ob['sf_name']." -</option>";
                        }
                        ?>                 
                    </select></div>
                </td>
            </tr>
            <tr>
            	<td>หมายเหตุ:</td>
                <td>
                	<div class="form-group">
                    	<textarea class="form-control" rows="2" name="dev_remark"></textarea>
                    </div>
                </td>
            </tr>
            <!--<tr>
            	<td>จึงเรียนมาเพื่อ:</td>
                <td>
                    <div class="form-group">
                    	<div class="row">
							<?php
                           /* foreach($cf_devformstatus as $key => $value){
								if($key == 'approve'){
                                	print '<div class="col-sm-2"><label class="radio primary"><input type="radio" data-toggle="radio" name="dev_formstatus" value="'.$k.'" required checked>'.$value['label'].'</label></div>';
								}else{
									print '<div class="col-sm-2"><label class="radio primary"><input type="radio" data-toggle="radio" name="dev_formstatus" value="'.$k.'" required>'.$value['label'].'</label></div>';
								}
                            }*/
                            ?>
                            <div class="col-sm-6"><input class="form-control input-sm" placeholder="อื่นๆ ระบุ" type="text" name="dev_formstatus_comment"></div>
                        </div>
                    </div>
                </td>
            </tr>
            <tr>-->
            	<td>ผู้ขออนุมัติ:</td>
                <td><?php //print $_SESSION['ses_createname'];?>
                	<div class="form-group">
                        <select data-toggle="select" name="dev_perid" class="form-control select select-inverse select-sm">
                            <option value="">&raquo; เลือกรายการ</option>
                            <?php
							$sql_02=mysql_query("select * from $db_eform.personel_muerp
											inner join $db_eform.tb_orgnew on (personel_muerp.per_dept=tb_orgnew.dp_id)
											inner join $db_eform.personel_status as t3 on (personel_muerp.per_status = t3.ps_id)
											where t3.ps_flag = '1'
											order by convert(personel_muerp.per_fnamet using tis620) asc,
											convert(personel_muerp.per_lnamet using tis620) asc");
							while($ob_02=mysql_fetch_assoc($sql_02)){
								print '<option value="'.$ob_02['per_id'].'">&raquo; '.$ob_02['per_pname'].$ob_02['per_fnamet'].' '.$ob_02['per_lnamet'].' ('.$ob_02['job_id'].')</option>';
							}
							?>
                        </select>
                    </div>
                </td>
            </tr>
            <!--<tr>
                <td></td>
                <td class="tdpadding">
                <input name="number" type="hidden" value="1" />
                <input class="button" type="submit" name="submit" value="ดำเนินการถัดไป"></td>
            </tr>-->
      	</tbody>
      </table>
      			</div><!--table-responsive-->
    		</div><!--col-->
            
            <div class="col-sm-6">
            	<legend>บุคลากรผู้เข้าร่วม (Optional)</legend>
                <div class="form-group">
                        	<label class="control-label"><i class="glyphicon glyphicon-upload"></i> Upload Excel Template:</label>
                        	<input id="personelExcel" type="file" class="file file-loading" name="personelExcel" data-allowed-file-extensions='["xls", "xlsx", "csv"]' data-show-upload="false">
                            <span class="help-block"><a href="upload/template_excel.xlsx" target="_blank"><i class="glyphicon glyphicon-download-alt"></i> Download Excel Template</a></span>
                        </div>
                <!--<div class="form-group">
                	<?php
						/*$sql = mysql_query("select * from phper2.personel
								inner join phper2.tb_orgnew on (personel.per_dept = tb_orgnew.dp_id)
								order by convert (personel.per_fnamet using tis620) asc,
								convert (personel.per_lnamet using tis620) asc");
					while($ob = mysql_fetch_assoc($sql)){
						print '<label class="checkbox primary">
							<input type="checkbox" data-toggle="checkbox" value="'.$ob['per_id'].'" name="per_id[]" required> '.$ob['per_pname'].$ob['per_fnamet'].' '.$ob['per_lnamet'].' ('.$ob['job_id'].')
						</label>';
					}*/
					?>
                    <?php
					/*$sql=mysql_query("select * from $db_eform.tb_orgnew
							where typ_id='PH00001'
							or typ_id='PH00002'
							order by dp_id asc");
					while($ob=mysql_fetch_assoc($sql)){
						print '<div class="panel-group" id="accordion">
						  <div class="panel panel-info">
							<div class="panel-heading" id="heading'.$ob['dp_id'].'">
							  <h4 class="panel-title">
								<a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse'.$ob['dp_id'].'" >'.$ob['dp_name'].'</a>
							  </h4>
							</div>';
							//if($ob['dp_id']=='1'){
								print '<div id="collapse'.$ob['dp_id'].'" class="panel-collapse collapse in">';
							//}else{
								//print '<div id="collapse'.$ob['dp_id'].'" class="panel-collapse collapse">';
							//}
							  print '<div class="panel-body regBlack_14">';
									$sql2 = mysql_query("select * from $db_eform.personel_muerp as t1
										inner join $db_eform.personel_status as t2 on (t1.per_status = t2.ps_id)
										inner join $db_eform.job as t3 on (t1.job_id = t3.job_id)
											where t1.per_dept='$ob[dp_id]'
											and t2.ps_flag='1'
											order by t1.per_adddate asc");
									while($ob2 = mysql_fetch_assoc($sql2)){
										print '<label class="checkbox primary">
											<input type="checkbox" data-toggle="checkbox" value="'.$ob2['per_id'].'" name="per_id[]" required> '.$ob2['per_pname'].$ob2['per_fnamet'].' '.$ob2['per_lnamet'].' ('.$ob2['job_name'].')
										</label>';
									}
							  print '</div>
							</div>
						  </div>
                    </div>';
					}*/
					?>
                </div>--><!--form-group-->
                <!--<div class="form-group">
                	<label class="control-label"><strong>จึงเรียนมาเพื่อ:</strong></label>
                    <?php
					/*foreach($cf_devformstatus as $key => $value){
						print '<label class="radio primary"><input type="radio" data-toggle="radio" name="dev_formstatus" value="'.$k.'" required>'.$value['label'].'</label>';
					}*/
					?>
                </div>
                <hr>
                <div class="form-group">
                	<label class="control-label"><strong>บันทึกข้อมูลโดย:</strong></label>
                    <p class="form-control-static regBlack_14"><?php //print $_SESSION['ses_createname'];?></p>
                </div>-->
            </div><!--col-->
    	</div><!--row-->
        	</div><!--body-->
            <div class="panel-footer">
            	<input name="dev_maintype" type="hidden" value="<?php print $_GET['dm_id'];?>" />
                <input type="hidden" name="action" value="save">
            	<input class="btn button btn-block" type="submit" value="บันทึกแบบฟอร์ม">
            </div><!--footer-->
        </div><!--panel-->
    </form>

</div><!--container-->

<?php include('../lib/js-inc.php');?>
<script>
$(document).ready(function(e) {
	
	$('#dev_ordate').datepicker({
		format: 'yyyy-mm-dd', 
		language: 'th', 
		autoclose: true
	});
	$('#dev_bookfrom_03').datepicker({
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
		 message: 'This value is not valid',
		feedbackIcons: {
			valid: 'glyphicon glyphicon-ok',
			invalid: 'glyphicon glyphicon-remove',
			validating: 'glyphicon glyphicon-refresh'
		},
		  fields: {
			   dp_id:{
				  validators: {
                    notEmpty: {
                       //message: 'โปรดระบุผู้เข้าร่วม'
                    }
                }
			  },
			  'per_id[]':{
				  validators: {
                    notEmpty: {
                       message: 'โปรดระบุผู้เข้าร่วม'
                    }
                }
			  },
			  dev_perid:{
				  validators: {
                    notEmpty: {
                       //message: 'โปรดระบุผู้เข้าร่วม'
                    }
                }
			  },
			  dev_formstatus_comment:{
				  validators:{
					   stringLength: {
                        max: 200,
                    },
				  }
			  },
		  }
	}).on('error.form.bv', function(e) {
        console.log('error');

        // Active the panel element containing the first invalid element
        var $form         = $(e.target),
            validator     = $form.data('bootstrapValidator'),
            $invalidField = validator.getInvalidFields().eq(0),
            $collapse     = $invalidField.parents('.collapse');

        $collapse.collapse('show');
	});
	
	$('#dev_bookfrom_03').datepicker()
        .on('change show', function(e) {
            // Validate the date when user change it
            $('#formDefault').data('bootstrapValidator').revalidateField('dev_bookfrom_03');
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
		$('#enddate').datepicker()
        .on('change show', function(e) {
            // Validate the date when user change it
            $('#formDefault').data('bootstrapValidator').revalidateField('dev_enddate');
            // You also can call it as following:
            //$('#formFilter').bootstrapValidator('revalidateField', 'startDate');
        });
		
		//search select
		$('select[name="dp_id"]').select2({dropdownCssClass: 'show-select-search'});
		$('select[name="ss_id"]').select2({dropdownCssClass: 'show-select-search'});
		$('select[name="sf_id"]').select2({dropdownCssClass: 'show-select-search'});
		$('select[name="dev_perid"]').select2({dropdownCssClass: 'show-select-search'});
		$('select[name="dev_country"]').select2({dropdownCssClass: 'show-select-search'});
		$('select[name="typ_id"]').select2({dropdownCssClass: 'show-select-search'});
		//search select
		
});
</script>