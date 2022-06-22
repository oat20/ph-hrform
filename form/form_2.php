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
            	<h3 class="panel-title pull-left"><a href="<?php print $livesite;?>admin/2_allform.php"><i class="fa fa-arrow-left fa-fw"></i> กรอกแบบฟอร์มขออนุมัติปฏิบัติงานพัฒนาบุคลากร</a></h3>
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
        <tr >
              <td class="formcolhd">ลักษณะงาน:</td>
              <td background="../admin/compcode/compcode/picture/back_1.jpg" class="tdpadding">
                <div class="form-group"><select name="typ_id" class="form-control select select-primary select-sm" data-toggle="select" required>
                        <option value="">&raquo; เลือกรายการ</option>
                        <?php
                        $typ=mysql_query("select * from $db_eform.develop_main_type
									inner join $db_eform.develop_type on (develop_main_type.dm_id = develop_type.dm_id)
									where develop_type.dvt_status = '1'
									and develop_main_type.dm_id = '1'
									order by develop_main_type.dm_id asc,
									develop_type.dvt_id asc");
                        while($ob=mysql_fetch_array($typ)){
                            print "<option value=".$ob[dvt_id].">- ".$ob['dm_title'].' &raquo; '.$ob['dvt_name']." -</option>";
                        }
                        ?>                 
                    </select>
                    </div>
                    <div class="form-group">
                    	<div id="devTypeother">
                            <input type="text" name="dev_typeother" class="form-control input-sm" disabled placeholder="อื่นๆ ระบุ">
                        </div>
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
              <td class="formcolhd">หน่วยงานผู้จัด:</td>
              <td  align="left" class="tdpadding">
              	<div class="form-group"><input type="text" class="form-control input-sm" name="dev_org" required></div>
                </td>
            </tr>
            <tr>
            	<td colspan="2">
                	<div class="form-group">
                        <label class="control-label">ประเภทสถานที่:</label>
                       <select name="lt_id" class="form-control select select-inverse select-sm" data-toggle="select" required>
                                <?php
                                $sec=mysql_query("select * from $db_eform.develop_location_type
                                            where lt_use = 'yes'
                                            order by lt_order asc");
                                while($ob=mysql_fetch_array($sec)){
                                    print "<option value=".$ob[lt_id].">&raquo; ".$ob['lt_title']."</option>";
                                }
                                ?>                 
                            </select>
                      </div><!--form-group-->
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
            	<td colspan="2">
                	<div class="form-group">
                    	<label class="control-label">สถานะ:</label>
                        <select name="dev_approve" class="form-control select select-danger" data-toggle="select">
                        	<?php
							foreach($cf_approve as $k=>$v){
								echo '<option value="'.$k.'">&raquo; '.$v['name'].'</option>';
							}
							?>
                        </select>
                    </div>
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
                                if($k=='1'){
                                    echo '<label class="radio-inline"><input type="radio" name="dev_nopay" value="'.$k.'" data-toggle="radio" checked> '.$v.'</label>';
                                }else{
                                    echo '<label class="radio-inline"><input type="radio" name="dev_nopay" value="'.$k.'" data-toggle="radio"> '.$v.'</label>';
                                }
                            }
                            ?>
                        </div>
                        
                        <div id="newDevnopay">
                        	<div class="form-group">
                                <label class="control-label"><strong>จากแหล่งเงิน:</strong></label>
                                <table class="table">
                                    <tbody>
                                        <?php
                                        $sql=mysql_query("select * from $db_eform.develop_payfrom as t1 
											inner join $db_eform.budtype as t2 on(t1.pf_id=t2.pf_id)
                                                where t1.pf_use='yes'
                                                order by t1.pf_id asc,
												t2.bt_id asc");
                                        while($ob=mysql_fetch_assoc($sql)){
                                            print '<tr>
                                                        <td><label class="checkbox primary"><input name="bt_id[]" type="checkbox" value="'.$ob['bt_id'].'" data-toggle="checkbox" disabled> '.$ob['pf_title'].' &raquo; <strong>'.$ob['bt_name'].'</strong></label></td>
                                                        <td><input name="bt_dev_pay01'.$ob['bt_id'].'" type="number" class="form-control input-sm" placeholder="จำนวนเงิน" disabled></td>
                                                    </tr>';
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div><!--form-group-->
                            <div class="form-group">
                                <label class="control-label"><strong>โดยแบ่งเป็นค่าใช้จ่าย:</strong></label>
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
                                                    <td><label class="checkbox primary"><input name="ct_id[]" type="checkbox" value="'.$ob['ct_id'].'" data-toggle="checkbox" disabled> '.$ob['ct_title'].'</label></td>
                                                    <td><input name="ct_dev_pay01'.$ob['ct_id'].'" type="number" class="form-control input-sm" placeholder="จำนวนเงิน" disabled></td>
                                                </tr>';
                                    }else{
                                        print '<tr>
                                                    <td><label class="checkbox primary"><input name="ct_id[]" type="checkbox" value="'.$ob['ct_id'].'" data-toggle="checkbox" disabled> '.$ob['ct_title'].'</label></td>
                                                    <td></td>
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
                                echo '<ul>';
                                
                                $sql=mysql_query("select * from $db_eform.department_type as t1
                                    inner join $db_eform.tb_orgnew as t2 on(t1.typ_id=t2.typ_id)
                                    order by convert(t1.typ_name using tis620) asc,
                                    convert(t2.dp_name using tis620) asc");
                                while($ob=mysql_fetch_assoc($sql)){
									
									if($_SESSION['ses_per_dept']==$ob['dp_id']){ $collapsed='';}else{$collapsed='collapsed';}//open or close
                                        echo '<li class="'.$collapsed.'"><label class="checkbox"><input type="checkbox"> <strong>'.$ob['dp_name'].'</strong></label>
                                            <ul>';						
                                            $sql02=mysql_query("SELECT * FROM $db_eform.personel_muerp as t1
                                                inner join $db_eform.job as t2 on(t1.job_id=t2.job_id)
                                                inner join $db_eform.personel_status as t3 on(t1.per_status=t3.ps_id)
                                                where t3.ps_flag='1'
                                                and t1.per_dept='$ob[dp_id]'
                                                order by convert(t1.per_fnamet using tis620) asc,
                                                convert(t1.per_lnamet using tis620) asc");
                                            while($ob02=mysql_fetch_assoc($sql02)){
													echo '<li><label class="checkbox"><input type="checkbox" value="'.$ob02['per_id'].'" name="per_id[]" required> '.$ob02['per_pname'].$ob02['per_fnamet'].' '.$ob02['per_lnamet'].' ('.$ob02['job_name'].')</label></li>';

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
            	<input name="dev_maintype" type="hidden" value="<?php print $_GET['dm_id'];?>" />
                <input type="hidden" name="action" value="save">
            	<input class="btn btn-primary btn-block" type="submit" value="บันทึกแบบฟอร์ม">
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
			 'bt_id[]':{
				   enabled: false,
			  },
			  'ct_id[]':{
				   enabled: false,
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
		$('select').select2({dropdownCssClass: 'show-select-search'});
		//search select
		
		// Enable street/city/country validators if user want to degree
    $('select[name="typ_id"]').on('change', function() {
        var bootstrapValidator = $('#formDefault').data('bootstrapValidator'),
            shipDegree     = ($(this).val() == '22');

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