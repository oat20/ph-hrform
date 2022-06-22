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

    <div class="page-header-04"><a href=""><i class="fa fa-arrow-left fa-fw"></i> กรอกแบบฟอร์ม<?php print $_GET['dm_title'];?></a></div>
    
    <form action="add_project.php" method="post" id="formDefault">
    	<div class="panel panel-default">
        	<div class="panel-heading clearfix">
            	<div class="pull-left"><a href="<?php print $livesite;?>profile/profile.php"><i class="fa fa-arrow-left fa-fw"></i> กรอกแบบฟอร์ม<?php print $_GET['dm_title'];?></a></div>
                <div class="pull-right"><button class="btn btn-link btn-lg" type="submit"><i class="fa fa-check"></i> Save</button></div>
            </div><!--heading-->
        	<div class="panel-body">
    	<div class="row">
        	<div class="col-sm-6">
        <legend>รายละเอียดหลักสูตรฝึกอบรม / โครงการ</legend>
       	<div class="table-responsive">
    <table border="0" cellpadding="0" cellspacing="0" class="table table-striped">
    	<tbody>
        	<tr>
            	<td>ส่วนงาน:</td>
                <td>
                    <div class="form-group">
                        <select data-toggle="select" name="dp_id" class="form-control select select-inverse select-sm">
                            <?php
                            $sql=mysql_query("select * from phper2.department_type
                                    inner join phper2.tb_orgnew on (department_type.typ_id=tb_orgnew.typ_id)
                                    where department_type.typ_id='PH00001'
                                    or department_type.typ_id='PH00002'
                                    order by department_type.typ_id asc,
                                    tb_orgnew.dp_id asc");
                            while($ob=mysql_fetch_assoc($sql)){
								if($_SESSION['ses_per_dept'] == $ob['dp_id']){
                                	print '<option value="'.$ob['dp_id'].'" selected>'.$ob['typ_name'].' &raquo; '.$ob['dp_name'].'</option>';
								}else{
									print '<option value="'.$ob['dp_id'].'">'.$ob['typ_name'].' &raquo; '.$ob['dp_name'].'</option>';
								}
                            }
                            ?>
                        </select>
                    </div>
                </td>
            </tr>
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
                <div class="form-group"><!--<select name="typ_id" class="form-control select select-primary select-sm" data-toggle="select">
                        <option value="">&raquo; เลือกรายการ</option>
                        <?php
                        /*$typ=mysql_query("select * from phper2.develop_main_type
									inner join phper2.develop_type on (develop_main_type.dm_id = develop_type.dm_id)
									where develop_type.dvt_status = '1'
									and develop_main_type.dm_id = '$_GET[dm_id]'
									order by develop_main_type.dm_id asc,
									develop_type.dvt_id asc");
                        while($ob=mysql_fetch_array($typ)){
                            print "<option value=".$ob[dvt_id].">- ".$ob['dm_title'].' &raquo; '.$ob['dvt_name']." -</option>";
                        }*/
                        ?>                 
                    </select>-->
                    <?php
					echo '<div class="row">';
					$typ=mysql_query("select * from ph_hr_eform.develop_main_type
									inner join ph_hr_eform.develop_type on (develop_main_type.dm_id = develop_type.dm_id)
									where develop_type.dvt_status = '1'
									and develop_main_type.dm_id = '$_GET[dm_id]'
									and develop_type.dvt_id <> '0'
									order by develop_main_type.dm_id asc,
									develop_type.dvt_id asc");
                        while($ob=mysql_fetch_array($typ)){
                            print '<div class="col-sm-4 regBlack_10"><label class="radio"><input type="checkbox" data-toggle="radio" name="typ_id" value="'.$ob[dvt_id].'" required> '.$ob['dvt_name'].'</label></div>';
                        }
					echo '</div>';
					?>
                    </div>         
                    </td>
            </tr>
            <tr >
              <td class="formcolhd">เกี่ยวข้องกับกิจกรรม:</td>
              <td class="tdpadding">
                <div class="form-group">
                <!--<select name="sec_id" class="form-control select select-primary select-sm" data-toggle="select" required>
                        <option value="">&raquo; เลือกรายการ</option>
                        <?php
                       /* $sec=mysql_query("select * from tmps.activity
									where act_use = 'yes'
									order by act_id asc");
                        while($ob=mysql_fetch_array($sec)){
                            print "<option value=".$ob[act_id].">- ".$ob[activity]." -</option>";
                        }*/
                        ?>                 
                    </select>-->
                    	<div class="row">
                        	<?php
							$sec=mysql_query("select * from ph_hr_eform.activity
									where act_use = 'yes'
									order by act_id asc");
							while($ob=mysql_fetch_array($sec)){
								echo '<div class="col-sm-6 regBlack_10">';
									echo '<label class="radio"><input name="sec_id" type="radio" value="'.$ob['act_id'].'" data-toggle="radio"> '.$ob['activity'].'</label>';
								echo '</div>';
							}
							?>
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
            	<td>ประเภทสถานที่:</td>
                <td>
                    <div class="form-group"><!--<select name="lt_id" class="form-control select select-primary select-sm" data-toggle="select" required>
                        <?php
                        /*$sec=mysql_query("select * from phper2.develop_location_type
									where lt_use = 'yes'
									order by lt_order asc");
                        while($ob=mysql_fetch_array($sec)){
                            print "<option value=".$ob[lt_id].">- ".$ob['lt_title']." -</option>";
                        }*/
                        ?>                 
                    </select>-->
                    	<div class="row">
                        	<?php
							$sec=mysql_query("select * from ph_hr_eform.develop_location_type
										where lt_use = 'yes'
										order by lt_order asc");
							while($ob=mysql_fetch_array($sec)){
								print '<div class="col-sm-3 regBlack_10"><label class="radio"><input type="radio" name="lt_id" data-toggle="radio" value="'.$ob[lt_id].'"> '.$ob['lt_title'].'</label></div>';
							}
							?>
                        </div>
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
                <td>
                    <div class="form-group">
                    	<select name="dev_country" class="form-control select select-primary select-sm" data-toggle="select">
                        	<?php
							$qCountry=mysql_query("select * from phper2.country order by ct_name asc");
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
                    <div class="form-group"><!--<select name="le_id" class="form-control select select-primary select-sm" data-toggle="select" required>
                        <?php
                        /*$sec=mysql_query("select * from phper2.develop_level
									where le_use = 'yes'
									order by le_id asc");
                        while($ob=mysql_fetch_array($sec)){
                            print "<option value=".$ob[le_id].">- ".$ob['le_title']." -</option>";
                        }*/
                        ?>                 
                    </select>-->
                    	<div class="row">
                        	<?php
							$sec=mysql_query("select * from ph_hr_eform.develop_level
									where le_use = 'yes'
									order by le_id asc");
                        	while($ob=mysql_fetch_array($sec)){
								print '<div class="col-sm-3 regBlack_10"><label class="radio"><input type="radio" name="le_id" data-toggle="radio" value="'.$ob[le_id].'"> '.$ob['le_title'].'</label></div>';
							}
							?>
                        </div>
                    </div>
                </td>
            </tr>
            <tr>
            	<th colspan="2">รายละเอียดการขออนุมัติค่าใช้จ่าย</th>
            </tr>
            <tr>
            	<td>แหล่งทุน:</td>
                <td>
                	<div class="form-group">
                    	<!--<div class="row">
                        	<div class="col-sm-6">
                                <select name="dev_payfrom" class="form-control select select-primary select-sm" data-toggle="select" required>
                                    <?php
                                   /* $sql = mysql_query("select * from phper2.develop_payfrom
                                                where pf_use = 'yes'
                                                order by pf_id asc");
                                    while($ob = mysql_fetch_assoc($sql)){
                                        print '<option value="'.$ob['pf_id'].'">&raquo; '.$ob['pf_title'].'</option>';
                                    }*/
                                    ?>
                                </select>
                        	</div>
                            <div class="col-sm-6">
                                <input class="form-control input-sm" placeholder="ระบุชื่อทุน (ถ้ามี)" type="text" name="dev_fundname">
                        	</div>
                        </div>-->
                        <div class="row">
                        	<?php
							$sql = mysql_query("select * from ph_hr_eform.develop_payfrom
                                                where pf_use = 'yes'
                                                order by pf_id asc");
							while($ob = mysql_fetch_assoc($sql)){
								print '<div class="col-sm-3 regBlack_10"><label class="radio"><input type="radio" name="dev_payform" data-toggle="radio" value="'.$ob['pf_id'].'"> '.$ob['pf_title'].'</label></div>';
							}
							?>
                        </div>
                    </div>
                    <div class="form-group">
                    	<input class="form-control input-sm" placeholder="ระบุชื่อทุน (ถ้ามี)" type="text" name="dev_fundname">
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
                                $sql=mysql_query("select * from tmps.budtype
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
                        <span class="help-block text-danger">* งบประมาณสำหรับ 1 ท่าน</span>
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
						$sql=mysql_query("select * from phper2.develop_cost_type
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
											<td></td>
										</tr>';
							}
						}
						?>
                        	</tbody>
                        </table>
                        <span class="help-block text-danger">* ค่าใช้จ่ายสำหรับ 1 ท่าน</span>
                    </div>
                </td>
            </tr>
            <tr>
            	<th colspan="2">ยุทธศาสตร์ที่เกี่ยวข้อง</th>
            </tr>
            <tr>
            	<td>ยุทธศาสตร์มหาวิทยาลัยฯ:</td>
                <td>
                    <div class="form-group">
                    <!--<select name="ss_id" class="form-control select select-primary select-sm" data-toggle="select" required>
                    	<option value="">&raquo; เลือกรายการ</option>
                        <?php
                        /*$sec=mysql_query("select * from tmps.sub_strategic
									where ss_use = 'yes'
									order by id asc");
                        while($ob=mysql_fetch_array($sec)){
                            print "<option value=".$ob[id].">- ".$ob['nameth']." -</option>";
                        }*/
                        ?>                 
                    </select>-->
                    	<div class="row">
                        	<?php
							$sec=mysql_query("select * from ph_hr_eform.sub_strategic
									where ss_use = 'yes'
									order by id asc");
							while($ob=mysql_fetch_array($sec)){
								echo '<div class="col-sm-6 regBlack_10">';
									echo '<label class="radio"><input name="ss_id" type="radio" value="'.$ob['id'].'" data-toggle="radio"> '.$ob['nameth'].'</label>';
								echo '</div>';
							}
							?>
                        </div>
                    </div>
                </td>
            </tr>
            <tr>
            	<td>ยุทธศาสตร์คณะฯ:</td>
                <td>
                    <div class="form-group">
                    	<!--<select name="sf_id" class="form-control select select-primary select-sm" data-toggle="select" required>
                            <option value="">&raquo; เลือกรายการ</option>
                            <?php
                            /*$sec=mysql_query("select * from tmps.strategic_faculty
                                        where sf_use = 'yes'
                                        order by sf_id asc");
                            while($ob=mysql_fetch_array($sec)){
                                print "<option value=".$ob[sf_id].">- ".$ob['sf_name']." -</option>";
                            }*/
                            ?>                 
                    	</select>-->
                        <div class="row">
                        	<?php
							$sec=mysql_query("select * from ph_hr_eform.strategic_faculty
									where sf_use = 'yes'
									order by sf_id asc");
							while($ob=mysql_fetch_array($sec)){
								echo '<div class="col-sm-6 regBlack_10">';
									echo '<label class="radio"><input name="sf_id" type="radio" value="'.$ob['sf_id'].'" data-toggle="radio"> '.$ob['sf_name'].'</label>';
								echo '</div>';
							}
							?>
                        </div>
                    </div>
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
            	<legend>บุคลากรผู้เข้าร่วม</legend>
                <div class="form-group">
                	<?php					
						$sql = mysql_query("select * from phper2.personel
								inner join phper2.tb_orgnew on (personel.per_dept = tb_orgnew.dp_id)
								where personel.per_dept = '$_SESSION[ses_per_dept]'
								and personel.per_flag='1'
								order by convert (personel.per_fnamet using tis620) asc,
								convert (personel.per_lnamet using tis620) asc");
					while($ob = mysql_fetch_assoc($sql)){
						if($_SESSION['ses_per_id']==$ob['per_id']){
							print '<label class="checkbox primary">
								<input type="checkbox" data-toggle="checkbox" value="'.$ob['per_id'].'" name="per_id[]" checked> '.$ob['per_pname'].$ob['per_fnamet'].' '.$ob['per_lnamet'].' ('.$ob['job_id'].')
							</label>';
						}else{
							print '<label class="checkbox primary">
								<input type="checkbox" data-toggle="checkbox" value="'.$ob['per_id'].'" name="per_id[]"> '.$ob['per_pname'].$ob['per_fnamet'].' '.$ob['per_lnamet'].' ('.$ob['job_id'].')
							</label>';
						}
					}
					?>
                </div>
               <!-- <div class="form-group">
                	<label class="control-label"><strong>จึงเรียนมาเพื่อ:</strong></label>
                    <div class="row">
                    <?php
					/*foreach($cf_devformstatus as $key => $value){
						if($key == 'approve'){
							print '<div class="col-sm-2"><label class="radio primary"><input type="radio" data-toggle="radio" name="dev_formstatus" value="'.$key.'" required checked>'.$value['label'].'</label></div>';
						}else{
							print '<div class="col-sm-2"><label class="radio primary"><input type="radio" data-toggle="radio" name="dev_formstatus" value="'.$key.'" required>'.$value['label'].'</label></div>';
						}
					}
					echo '<div class="col-sm-4"><input class="form-control input-sm" placeholder="อื่นๆ ระบุ" type="text" name="dev_formstatus_comment"></div>';*/
					?>                  
                    </div>
                </div>-->
                <hr>
                <div class="form-group">
                	<label class="control-label"><strong>ผู้ขอนุมัติ:</strong></label>
                    <p class="form-control-static regBlack_14"><?php print $_SESSION['ses_createname'];?></p>
                    <!--<select name="dev_perid" class="form-control select select-inverse select-sm" data-toggle="select">
                    	<?php
						/*$sql_02=mysql_query("select * from phper2.personel
											inner join phper2.tb_orgnew on (personel.per_dept=tb_orgnew.dp_id)
											where personel.per_flag='1'
											and personel.per_dept='$_SESSION[ses_per_dept]'
											order by convert(personel.per_fnamet using tis620) asc,
											convert(personel.per_lnamet using tis620) asc");
						while($ob_02=mysql_fetch_assoc($sql_02)){
							if($ob_02['per_id'] == $_SESSION['ses_per_id']){
								print '<option value="'.$ob_02['per_id'].'" selected>&raquo; '.$ob_02['per_pname'].$ob_02['per_fnamet'].' '.$ob_02['per_lnamet'].' ('.$ob_02['job_id'].')</option>';
							}else{
								print '<option value="'.$ob_02['per_id'].'">&raquo; '.$ob_02['per_pname'].$ob_02['per_fnamet'].' '.$ob_02['per_lnamet'].' ('.$ob_02['job_id'].')</option>';
							}
						}*/
						?>
                    </select>-->
                </div>
            </div><!--col-->
    	</div><!--row-->
        	</div><!--body-->
            <div class="panel-footer">
            	<input name="dev_maintype" type="hidden" value="<?php print $_GET['dm_id'];?>" />
                <input name="action" type="hidden" value="save" />
            	<input class="btn button btn-block" type="submit" value="บันทึกแบบฟอร์ม">
            </div><!--footer-->
        </div><!--panel-->
    </form>

</div><!--container-->

<?php include('../lib/js-inc.php');?>
<script>
$(document).ready(function(e) {
	
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
		 fields: {
			   /*dev_country:{
				  validators: {
                    notEmpty: {
                       //message: 'โปรดระบุผู้เข้าร่วม'
                    }
                }
			  },*/
			  'per_id[]':{
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
			  dev_formstatus_comment:{
				  validators:{
					   stringLength: {
                        max: 200,
                    },
				  }
			  },
		 }
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