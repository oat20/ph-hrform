<?php
session_start();

include('../admin/compcode/include/config.php');
include('../admin/compcode/check_login.php');
require_once '../lib/mysqli.php';
include('../admin/compcode/include/connect_db.php');
include('../admin/compcode/include/function.php');
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>แบบขออนุมัติปฎิบัติงานบริการวิชาการ</title>
        <?php include('../lib/css-inc.php');?>
    </head>
    <body>
        <?php include('../inc/navbar02-inc.php');?>
<div class="container-fluid">

	<?php
	$qDevelop=mysqli_query($condb, "select * from $db_eform.develop where dev_trackid='$_GET[getTrackid]'");
	$rDevelop=mysqli_fetch_assoc($qDevelop);
	$dev_bookfrom=explode('+',$rDevelop['dev_bookfrom']);
	?>
    <form action="editform1-action.php" method="post" id="formDefault">
    	<div class="panel panel-default">
        	<div class="panel-heading clearfix">
            	<h3 class="panel-title pull-left"><a href="<?php echo $livesite;?>academicservice/_showmyacademicservice.php"><i class="fa fa-arrow-left fa-fw"></i> แก้ไขแบบฟอร์มอนุมัติปฏิบัติงานบริการวิชาการ</a></h3>
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
                            $sql=mysqli_query($condb, "select * from $db_eform.department_type
                                    inner join $db_eform.tb_orgnew on (department_type.typ_id=tb_orgnew.typ_id)
                                    where department_type.typ_id='PH00001'
                                    or department_type.typ_id='PH00002'
                                    order by department_type.typ_id asc,
                                    tb_orgnew.dp_id asc");
                            while($ob=mysqli_fetch_assoc($sql)){
								if($rDevelop['dp_id'] == $ob['dp_id']){
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
                    	<input type="text" class="form-control input-sm" name="dev_bookfrom_01" required value="<?php echo $dev_bookfrom['0'];?>">
                    </div>
                </td>
            </tr>
            <tr>
            	<td>ที่:</td>
                <td>
                	<div class="form-group">
                    	<input type="text" class="form-control input-sm" name="dev_bookfrom_02" required value="<?php echo $dev_bookfrom['1'];?>">
                    </div>
                </td>
            </tr>
            <tr>
            	<td>ลงวันที่:</td>
                <td>
                	<div class="form-group">
                    	<input type="text" class="form-control input-sm" name="dev_bookfrom_03" id="dev_bookfrom_03" required value="<?php echo $dev_bookfrom['2'];?>">
                    </div>
                </td>
            </tr>
            <tr>
            	<td>เรื่อง:</td>
                <td>
                	<div class="form-group">
                    	<input type="text" class="form-control input-sm" name="dev_bookfrom_04" required value="<?php echo $dev_bookfrom['3'];?>">
                    </div>
                </td>
            </tr>
            <tr>
              <td class="formcolhd">หลักสูตร/โครงการ:</td>
              <td class="tdpadding"><div class="form-group"><input name="dev_onus" type="text" class="form-control inputform input-sm" id="title_news" value="<?php echo $rDevelop['dev_onus'];?>" size="60" required/></div></td>
        </tr>
    	<tr>
                    <td class="formcolhd">ระหว่างวันที่:</td>
                    <td class="tdpadding">
                        <div class="row">
                        	<div class="col-sm-6">
                                <div class="form-group"><label class="control-label">เริ่ม:</label><input type="text" name="dev_stdate" id="startdate" size="10" class="form-control input-sm" required value="<?php echo $rDevelop['dev_stdate'];?>"></div> 
                            </div>
                            <div class="col-sm-6">
                            	<div class="form-group"><label class="control-label">สิ้นสุด:</label><input type="text" name="dev_enddate" id="enddate" size="10" class="form-control input-sm" required value="<?php echo $rDevelop['dev_enddate'];?>"></div>
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
                            <?php echo select_time('dev_timebegin', $rDevelop['dev_timebegin'], 'inverse', 'sm');?>
                        </div>
                        <div class="col-sm-6">
                            <?php echo select_time('dev_timeend', $rDevelop['dev_timeend'], 'inverse', 'sm');?>
                        </div>
                    </div><!--row-->
                </div>
            </td>
        </tr>
        <tr >
              <td class="formcolhd">ลักษณะงาน:</td>
              <td background="../admin/compcode/compcode/picture/back_1.jpg" class="tdpadding">
                <div class="form-group">
                	<select name="dvt_id" class="form-control select select-inverse select-sm" data-toggle="select" required>
                    <?php
					$typ=mysqli_query($condb, "select * from $db_eform.develop_type
						where dvt_status='1'
						and dm_id='2'
						order by dvt_id asc");
                        while($ob=mysqli_fetch_array($typ)){
							if($rDevelop['dev_type']==$ob['dvt_id']){
                            	print '<option value="'.$ob['dvt_id'].'" selected>&raquo; '.$ob['dvt_name'].'</option>';
							}else{
								print '<option value="'.$ob['dvt_id'].'">&raquo; '.$ob['dvt_name'].'</option>';
							}
                        }
					?>
                    	</select>
                    </div>
                    <div class="form-group">
                    	<div id="devTypeother">
                        	<?php if($rDevelop['dev_type']==23){$disabled='';}else{$disabled='disabled';}?>
                    		<input type="text" class="form-control input-sm" value="<?php echo $rDevelop['dev_typeother'];?>" <?php echo $disabled;?> name="dev_typeother"/>
                        </div>
                    </div>         
                    </td>
            </tr>
            <tr>
            	<td>สถานที่จัด:</td>
                <td>
                	<div class="form-group">
                    	<textarea class="form-control" rows="2" name="dev_place" required><?php echo $rDevelop['dev_place'];?></textarea>
                    </div>
                </td>
            </tr>
            <tr>
              <td class="formcolhd">หน่วยงานผู้จัด:</td>
              <td  align="left" class="tdpadding">
              	<div class="form-group"><input type="text" class="form-control input-sm" name="dev_org" required value="<?php echo $rDevelop['dev_org'];?>" id="dev_org"></div>
                </td>
            </tr>
            <tr>
            	<td colspan="2">
                	<div class="form-group">
                        <label class="control-label">ประเภทสถานที่:</label>
                       <select name="lt_id" class="form-control select select-inverse select-sm" data-toggle="select" required>
                                <?php
                                $sec=mysqli_query($condb, "select * from $db_eform.develop_location_type
                                            where lt_use = 'yes'
                                            order by lt_order asc");
                                while($ob=mysqli_fetch_array($sec)){
									if($rDevelop['lt_id']==$ob['lt_id']){
                                    	print "<option value=".$ob['lt_id']." selected>- ".$ob['lt_title']." -</option>";
									}else{
										print "<option value=".$ob['lt_id'].">- ".$ob['lt_title']." -</option>";
									}
                                }
                                ?>                 
                            </select>
                      </div><!--form-group-->
                </td>
            </tr>
            	<td>ระดับกิจกรรม:</td>
                <td>
                    <div class="form-group"><select name="le_id" class="form-control select select-primary select-sm" data-toggle="select" required>
                        <?php
                        $sec=mysqli_query($condb, "select * from $db_eform.develop_level
									where le_use = 'yes'
									order by le_id asc");
                        while($ob=mysqli_fetch_array($sec)){
							if($rDevelop['le_id'] == $ob['le_id']){
                            	print "<option value=".$ob['le_id']." selected>- ".$ob['le_title']." -</option>";
							}else{
								print "<option value=".$ob['le_id'].">- ".$ob['le_title']." -</option>";
							}
                        }
                        ?>                 
                    </select></div>
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
                        $sec=mysqli_query($condb, "select * from $db_eform.sub_strategic
									where ss_use = 'yes'
									order by id asc");
                        while($ob=mysqli_fetch_array($sec)){
							if($rDevelop['ss_id'] == $ob['id']){
                            	print "<option value=".$ob['id']." selected>- ".$ob['nameth']." -</option>";
							}else{
								print "<option value=".$ob['id'].">- ".$ob['nameth']." -</option>";
							}
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
                        $sec=mysqli_query($condb, "select * from $db_eform.strategic_faculty
									where sf_use = 'yes'
									order by sf_id asc");
                        while($ob=mysqli_fetch_array($sec)){
							if($rDevelop['sf_id'] == $ob['sf_id']){
                            	print "<option value=".$ob['sf_id']." selected>- ".$ob['sf_name']." -</option>";
							}else{
								print "<option value=".$ob['sf_id'].">- ".$ob['sf_name']." -</option>";
							}
                        }
                        ?>                 
                    </select></div>
                </td>
            </tr>
      	</tbody>
      </table>
      			</div><!--table-responsive-->
    		</div><!--col-->
            
            <div class="col-sm-6">
            	
                <!--ค่าใช้จ่าย-->
                <div class="panel panel-warning">
                	<div class="panel-heading">
                    	<h3 class="panel-title">รายละเอียดการขออนุมัติค่าใช้จ่าย</h3>
                    </div>
                    <div class="panel-body">
                    	<div class="form-group">
							<?php
                            foreach($cf_devnopay as $k=>$v){
                                if($k==$rDevelop['dev_nopay']){
                                    echo '<label class="radio-inline"><input type="radio" name="dev_nopay" value="'.$k.'" data-toggle="radio" checked> '.$v.'</label>';
                                }else{
                                    echo '<label class="radio-inline"><input type="radio" name="dev_nopay" value="'.$k.'" data-toggle="radio"> '.$v.'</label>';
                                }
                            }
                            ?>
                        </div>
                        
                        <div id="newDevnopay">
                        	<?php if($rDevelop['dev_nopay']=='0'){$disbled='';}else{$disbled='disabled';}?>
                        	<div class="form-group">
                                <label class="control-label"><strong>จากแหล่งเงิน:</strong></label>
                                <?php
                                $qBudget=mysqli_query($condb, "select * from $db_eform.develop_form_budget where dev_id='$rDevelop[dev_id]'");
								while($rBudget=mysqli_fetch_assoc($qBudget)){
									$bt_id[]=$rBudget['bt_id'];
									$bt_dev_pay01[$rBudget['bt_id']]=$rBudget['dev_pay01'];
									$bt_dev_pay02[$rBudget['bt_id']]=$rBudget['dev_pay02'];
									$bt_dev_pay03[$rBudget['bt_id']]=$rBudget['dev_pay03'];
								}
								?>
                                <table class="table">
                                    <tbody>
                                        <?php
                                        $sql=mysqli_query($condb, "select * from $db_eform.develop_payfrom as t1 
											inner join $db_eform.budtype as t2 on(t1.pf_id=t2.pf_id)
                                                where t1.pf_use='yes'
                                                order by t1.pf_id asc,
												t2.bt_id asc");
                                        while($ob=mysqli_fetch_assoc($sql)){
                                            if(@in_array($ob['bt_id'], $bt_id)){
												print '<tr>
															<td><label class="checkbox primary"><input name="bt_id[]" type="checkbox" value="'.$ob['bt_id'].'" data-toggle="checkbox" checked '.$disbled.'> '.$ob['bt_name'].'</label></td>
															<td>
																<input name="bt_dev_pay01'.$ob['bt_id'].'" type="number" class="form-control input-sm" placeholder="จำนวนเงิน" value="'.$bt_dev_pay01[$ob['bt_id']].'" '.$disbled.'>
																<input name="bt_dev_pay02'.$ob['bt_id'].'" type="hidden" value="'.$bt_dev_pay02[$ob['bt_id']].'">
																<input name="bt_dev_pay03'.$ob['bt_id'].'" type="hidden" value="'.$bt_dev_pay03[$ob['bt_id']].'">
															</td>
														</tr>';
											}else{
												print '<tr>
														<td><label class="checkbox primary"><input name="bt_id[]" type="checkbox" value="'.$ob['bt_id'].'" data-toggle="checkbox" '.$disbled.'> '.$ob['bt_name'].'</label></td>
														<td><input name="bt_dev_pay01'.$ob['bt_id'].'" type="number" class="form-control input-sm" placeholder="จำนวนเงิน" '.$disbled.'></td>
													</tr>';
											}
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div><!--form-group-->
                            <div class="form-group">
                                <label class="control-label"><strong>โดยแบ่งเป็นค่าใช้จ่าย:</strong></label>
                                <?php
									$qCost=mysqli_query($condb, "select * from $db_eform.develop_form_cost where dev_id='$rDevelop[dev_id]'");
									while($rCost=mysqli_fetch_assoc($qCost)){
										$ct_id[]=$rCost['ct_id'];
										$ct_dev_pay01[$rCost['ct_id']]=$rCost['dev_pay01'];
										$ct_dev_pay02[$rCost['ct_id']]=$rCost['dev_pay02'];
										$ct_dev_pay03[$rCost['ct_id']]=$rCost['dev_pay03'];
									}
									?>
                                <table class="table">
                                    <tbody>
                                <?php
                                $sql=mysqli_query($condb, "select * from $db_eform.develop_cost_type
                                        where ct_use='yes'
                                        and ct_id<>'0'
                                        order by ct_id asc");
                                while($ob=mysqli_fetch_assoc($sql)){
                                    if(@in_array($ob['ct_id'],$ct_id)){
										print '<tr>
													<td><label class="checkbox primary"><input name="ct_id[]" type="checkbox" value="'.$ob['ct_id'].'" data-toggle="checkbox" checked '.$disbled.'> '.$ob['ct_title'].'</label></td>
													<td>
														<input name="ct_dev_pay01'.$ob['ct_id'].'" type="number" class="form-control input-sm" placeholder="จำนวนเงิน" value="'.$ct_dev_pay01[$ob['ct_id']].'" '.$disbled.'>
														<input name="ct_dev_pay02'.$ob['ct_id'].'" type="hidden" value="'.$ct_dev_pay02[$ob['ct_id']].'">
														<input name="ct_dev_pay03'.$ob['ct_id'].'" type="hidden" value="'.$ct_dev_pay03[$ob['ct_id']].'">
													</td>
												</tr>';
									}else{
										print '<tr>
													<td><label class="checkbox primary"><input name="ct_id[]" type="checkbox" value="'.$ob['ct_id'].'" data-toggle="checkbox" '.$disbled.'> '.$ob['ct_title'].'</label></td>
													<td><input name="ct_dev_pay01'.$ob['ct_id'].'" type="number" class="form-control input-sm" placeholder="จำนวนเงิน" '.$disbled.'></td>
												</tr>';
									}
                                }
                                ?>
                                    </tbody>
                                </table>
                            </div><!--form-group-->
                        </div>
                    </div><!--body-->
                </div><!--panel-->
                <!--ค่าใช้จ่าย-->          	
            
            	<div class="panel panel-primary">
            		<div class="panel-heading">บุคลากรผู้เข้าร่วม</div>
                	<div class="panel-body">
                    	<div id="personelJoin" class="form-group">
							<?php
							$peridJoin=array();
							$qPerjoin=mysqli_query($condb, "select * from $db_eform.develop_course_personel where dev_id='$rDevelop[dev_id]'");
							while($rPerjoin=mysqli_fetch_assoc($qPerjoin)){
								$peridJoin[]=$rPerjoin['per_id'];
							}
							
                                echo '<ul>';
                                
                                $sql=mysqli_query($condb, "select * from $db_eform.department_type as t1
                                    inner join $db_eform.tb_orgnew as t2 on(t1.typ_id=t2.typ_id)
                                    order by convert(t1.typ_name using tis620) asc,
                                    convert(t2.dp_name using tis620) asc");
                                while($ob=mysqli_fetch_assoc($sql)){
									
									if($_SESSION['ses_per_dept']==$ob['dp_id']){ $collapsed='';}else{$collapsed='collapsed';}//open or close
                                        echo '<li class="'.$collapsed.'"><label class="checkbox"><input type="checkbox"> <strong>'.$ob['dp_name'].'</strong></label>
                                            <ul>';						
                                            $sql02=mysqli_query($condb, "SELECT * FROM $db_eform.personel_muerp as t1
                                                inner join $db_eform.job as t2 on(t1.job_id=t2.job_id)
                                                inner join $db_eform.personel_status as t3 on(t1.per_status=t3.ps_id)
                                                where t3.ps_flag='1'
                                                and t1.per_dept='$ob[dp_id]'
                                                order by convert(t1.per_fnamet using tis620) asc,
                                                convert(t1.per_lnamet using tis620) asc");
                                            while($ob02=mysqli_fetch_assoc($sql02)){
												//if($ob02['per_id'] == $_SESSION['ses_per_id']){
												if(@in_array($ob02['per_id'],$peridJoin)){
													echo '<li><label class="checkbox"><input type="checkbox" value="'.$ob02['per_id'].'" name="per_id[]" checked required> '.$ob02['per_pname'].$ob02['per_fnamet'].' '.$ob02['per_lnamet'].' ('.$ob02['job_name'].')</label></li>';
												}else{
													echo '<li><label class="checkbox"><input type="checkbox" value="'.$ob02['per_id'].'" name="per_id[]" required> '.$ob02['per_pname'].$ob02['per_fnamet'].' '.$ob02['per_lnamet'].' ('.$ob02['job_name'].')</label></li>';

												}
                                            }
                                            echo '</ul>
                                        </li>';
                                }
                                echo '</ul>';
                            ?>
                        </div>
                	</div><!--body-->
                </div><!--panel-->
                
            </div><!--col-->
    	</div><!--row-->
        		                
        	</div><!--body-->
            <div class="panel-footer">
            	<input name="dev_id" type="hidden" value="<?php print $rDevelop['dev_id'];?>" />
                <input type="hidden" name="action" value="save">
            	<input class="btn button btn-block" type="submit" value="บันทึกแบบฟอร์ม">
            </div><!--footer-->
        </div><!--panel-->
    </form>

</div><!--container-->

<?php include('../lib/js-inc.php');?>
<script>
$(document).ready(function(e) {
	
	$('#personelJoin').tree({
            /* specify here your options */
			 onCheck: {
					node: 'expand',
					//children: {node:'expand'},
				},
				onUncheck: {
					node: 'collapse'
				}
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
	var devOrg = new Bloodhound({
	  datumTokenizer: function(d) { return Bloodhound.tokenizers.whitespace(d.label); },
	  queryTokenizer: Bloodhound.tokenizers.whitespace,
	  limit: 20,
	  prefetch: '../json/dev_org.php'
	});
	devOrg.initialize();
	 $('#dev_country').typeahead(null,{
		 name: 'devOrg',
		  displayKey: 'label',
		  source: devOrg.ttAdapter()
      });
		//autocomplete
	
     $('#formDefault').bootstrapValidator({
		 fields: {
			  'per_id[]': {
				  validators: {
                    /*notEmpty: {
                       //message: 'โปรดระบุผู้เข้าร่วม'
                    },*/
					choice: {
                        min: 1,
						message: 'โปรดเลือกอย่างน้อย 1 รายการ'
                    }
                }
			  },
			 'bt_id[]':{
				   enabled: false,
			  },
			  'ct_id[]':{
				   enabled: false,
			  },
			  'dvt_id[]':{
				  validators:{
					  choice:{
						  min:1
					  }
				  }
			  },
			  dev_typeother:{
				   enabled: false,
				  validators:{
					  notEmpty:{
					  },
					  stringLength: {
                        max: 100,
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
		$('select').select2({dropdownCssClass: 'show-select-search'});
		//search select
		
		// Enable street/city/country validators if user want to degree
    $('select[name="dvt_id"]').on('change', function() {
        var bootstrapValidator = $('#formDefault').data('bootstrapValidator'),
            shipDegree     = ($(this).val() == '23');

        shipDegree ? $('#devTypeother').find('.form-control').removeAttr('disabled')
                       : $('#devTypeother').find('.form-control').attr('disabled', 'disabled');

        bootstrapValidator.enableFieldValidators('dev_typeother', shipDegree);
    });
	
	//enable / disable อนุมัติค่าใช้จ่าย
	$('input[name="dev_nopay"]').on('change', function() {
        var bootstrapValidator = $('#formDefault').data('bootstrapValidator'),
            shipDevnopay     = ($(this).val() == '0');

        shipDevnopay ? $('#newDevnopay').find('.form-control').removeAttr('disabled')
                       : $('#newDevnopay').find('.form-control').attr('disabled', 'disabled');
					   
		shipDevnopay ? $('#newDevnopay').find('input[name="bt_id[]"]').removeAttr('disabled')
                       : $('#newDevnopay').find('input[name="bt_id[]"]').attr('disabled', 'disabled');
					   
		shipDevnopay ? $('#newDevnopay').find('input[name="ct_id[]"]').removeAttr('disabled')
                       : $('#newDevnopay').find('input[name="ct_id[]"]').attr('disabled', 'disabled');

        bootstrapValidator.enableFieldValidators('bt_id[]', shipDevnopay)
			.enableFieldValidators('ct_id[]', shipDevnopay);
    });
	//enable / disable อนุมัติค่าใช้จ่าย
		
});
</script>
</body>
</html>