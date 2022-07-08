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
        <meta charset="UTF-8">
        <?php include('../lib/css-inc.php');?>
        <title>แบบขออนุมัติปฎิบัติงานบริการวิชาการ</title>
    </head>
    <body>
        <?php include('../inc/navbar02-inc.php');?>
<div class="container-fluid">
    <h3 style="margin-top: 0px;">แบบขออนุมัติปฎิบัติงานบริการวิชาการ</h3>

    <div class="page-header-05">
    	<div class="text-title">
            <a href="<?php echo $livesite;?>academicservice/_showmyacademicservice.php"><i class="fa fa-arrow-left fa-fw"></i> กรอกแบบฟอร์มอนุมัติปฏิบัติงานบริการวิชาการ</a>
        </div>
    </div>
    
    <form action="add_project.php" method="post" id="formDefault">
    	<div class="row">
        	<div class="col-lg-6">
                
                <div class="form-group">
                    <label class="control-label">ส่วนงาน:</label>
                        <select data-toggle="select" name="dp_id" class="form-control select select-inverse select-sm">
                            <?php
                            $sql=mysql_query("select * from ph_hr_eform.department_type
                                    inner join ph_hr_eform.tb_orgnew on (department_type.typ_id=tb_orgnew.typ_id)
                                    where department_type.typ_id='PH00001'
                                    or department_type.typ_id='PH00002'
                                    order by department_type.typ_id asc,
                                    tb_orgnew.dp_id asc");
                            while($ob=mysql_fetch_assoc($sql)){
                                if($_SESSION['ses_per_dept'] == $ob['dp_id']){
                                    print '<option value="'.$ob['dp_id'].'" selected>&raquo; '.$ob['dp_name'].'</option>';
                                }else{
                                    print '<option value="'.$ob['dp_id'].'">&raquo; '.$ob['dp_name'].'</option>';
                                }
                            }
                            ?>
                        </select>
                </div><!--form-group-->
                
                <legend>หนังสือเชิญ / จดหมายเชิญ</legend>
                <div class="form-group">
                    <label class="control-label">ตามหนังสือ:</label>
                    <input type="text" class="form-control input-sm" name="dev_bookfrom_01" required>
                </div><!--form-group-->
                <div class="form-group">
                    <label class="control-label">ที่:</label>
                    <input type="text" class="form-control input-sm" name="dev_bookfrom_02" required>
                </div>
                <div class="form-group">
                    <label class="control-label">ลงวันที่:</label>
                    	<input type="text" class="form-control input-sm" name="dev_bookfrom_03" id="dev_bookfrom_03" required>
                </div>
                <div class="form-group">
                    <label class="control-label">เรื่อง:</label>
                            <input type="text" class="form-control input-sm" name="dev_bookfrom_04" required>
                </div>
                <hr>
                
                <div class="form-group">
                      <label class=" control-label formcolhd">หลักสูตร/โครงการ:</label>
                      <input name="title_pic" type="text" class="form-control inputform input-sm" id="title_news" value="" size="60" required/>
                </div><!--form-group-->
                <div class="form-group">
                    <label class="control-label formcolhd">ระหว่างวันที่:</label>
                            <div class="row">
                                <div class="col-sm-6">
                                    <input type="text" name="dev_stdate" id="startdate" size="10" class="form-control input-sm" required placeholder="เริ่ม">
                                </div>
                                <div class="col-sm-6">
                                    <input type="text" name="dev_enddate" id="enddate" size="10" class="form-control input-sm" required placeholder="ถึง">
                                </div>
                            </div>
                </div><!--form-group-->
                <div class="form-group">
                	<label class="control-label">ตั้งแต่เวลา:</label>
                    <div class="row">
                        <div class="col-sm-6">
                            <?php echo select_time('dev_timebegin', date('H:00'), 'inverse', 'sm');?>
                        </div>
                        <div class="col-sm-6">
                            <?php echo select_time('dev_timeend', date('H:00'), 'inverse', 'sm');?>
                        </div>
                    </div><!--row-->
                </div><!--form-group-->
                <div class="form-group">
                	<label class="control-label">หมายเหตุ</label>
                    <p class="form-control-static bg-danger"><strong>&nbsp;อบรม 1 วัน เท่ากับ 6 ชั่วโมง</strong></p>
                </div><!--form-group-->
                
                <div class="form-group">
                  <label class="control-label">ลักษณะงาน:</label>
                  <div class="row">
                  	<div class="col-sm-6">
                  <select name="typ_id" class="form-control select select-inverse select-sm" data-toggle="select" required>
                            <option value="">&raquo; เลือกรายการ</option>
                            <?php
                            $typ=mysql_query("select * from $db_eform.develop_main_type
                                        inner join $db_eform.develop_type on (develop_main_type.dm_id = develop_type.dm_id)
                                        where develop_type.dvt_status = '1'
                                        and develop_main_type.dm_id = '2'
                                        order by dvt_id asc");
                            while($ob=mysql_fetch_array($typ)){
                                print "<option value=".$ob[dvt_id].">".$ob['dvt_id'].' - '.$ob['dvt_name']."</option>";
                            }
                            ?>                 
                        </select>
                        	</div><!--col-->
                            <div class="col-sm-6">
                        	<div id="devTypeother">
                        		<input type="text" name="dev_typeother" class="form-control input-sm" disabled placeholder="อื่นๆ ระบุ">
                            </div>
                        </div><!--col-->
                        </div><!--row-->
                  </div><!--form-group-->
                                    
                  <div class="form-group">
                    <label class="control-label">สถานที่จัด:</label>
                    <textarea class="form-control" rows="2" name="dev_place" required></textarea>
                </div>               
                  <div class="form-group">
                  <label class="control-label formcolhd">หน่วยงานผู้จัด:</label>
                  <input type="text" class="form-control input-sm" name="dev_org" required id="dev_org">
                </div><!--form-group-->
                <div class="form-group">
                    <label class="control-label">ประเภทสถานที่:</label>
                   <select name="lt_id" class="form-control select select-inverse select-sm" data-toggle="select" required>
                            <?php
                            $sec=mysql_query("select * from $db_eform.develop_location_type
                                        where lt_use = 'yes'
                                        order by lt_order asc");
                            while($ob=mysql_fetch_array($sec)){
                                print "<option value=".$ob[lt_id].">- ".$ob['lt_title']." -</option>";
                            }
                            ?>                 
                        </select>
                  </div><!--form-group-->
                
                <div class="form-group">
            	<label class="control-label">ระดับกิจกรรม:</label>
                <select name="le_id" class="form-control select select-primary select-sm" data-toggle="select" required>
                        <?php
                        $sec=mysql_query("select * from $db_eform.develop_level
									where le_use = 'yes'
									order by le_id asc");
                        while($ob=mysql_fetch_array($sec)){
                            print "<option value=".$ob[le_id].">- ".$ob['le_title']." -</option>";
                        }
                        ?>                 
                    </select>
                    </div><!--form-group-->
                    
                    <div class="form-group">
                    <label class="control-label">ยุทธศาสตร์มหาวิทยาลัยฯ:</label>
                        <select name="ss_id" class="form-control select select-primary select-sm" data-toggle="select" required>
                            <?php
                            $sec=mysql_query("select * from $db_eform.sub_strategic
                                        where ss_use = 'yes'
                                        order by id asc");
                            while($ob=mysql_fetch_array($sec)){
                                print "<option value=".$ob[id].">- ".$ob['nameth']." -</option>";
                            }
                            ?>                 
                        </select>
                </div><!--form-group-->
                
                <div class="form-group">
            	<label class="control-label">ยุทธศาสตร์คณะฯ:</label>
                    	<select name="sf_id" class="form-control select select-primary select-sm" data-toggle="select" required>
                            <?php
                            $sec=mysql_query("select * from $db_eform.strategic_faculty
                                        where sf_use = 'yes'
                                        order by sf_id asc");
                            while($ob=mysql_fetch_array($sec)){
                                print "<option value=".$ob[sf_id].">- ".$ob['sf_name']." -</option>";
                            }
                            ?>                 
                    	</select>
                </div><!--form-group-->         
            </div><!--col-->
            
            <div class="col-lg-6">
            
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
												if($ob02['per_id'] == $_SESSION['ses_per_id']){
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
                                    
        <hr>         
        <input name="dev_maintype" type="hidden" value="<?php print $_GET['dm_id'];?>" />
        <input name="action" type="hidden" value="save" />
        <input class="btn btn-primary btn-block" type="submit" value="บันทึกแบบฟอร์ม">
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
			  	dev_country:{
				  validators: {
                    notEmpty: {
                    }
                }
			  },
			  'per_id[]':{
				  validators: {
                    notEmpty: {
                       //message: 'โปรดระบุผู้เข้าร่วม'
                    },
					choice: {
                        min: 1,
						//message: 'โปรดเลือกอย่างน้อย 1 รายการ'
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
			  dp_id:{
				  validators:{
					  notEmpty:{
					  },
				  }
			  },
			  sec_id:{
				  validators:{
					  notEmpty:{
					  },
				  }
			  },
			   lt_id:{
				  validators:{
					  notEmpty:{
					  },
				  }
			  },
			  le_id:{
				  validators:{
					  notEmpty:{
					  },
				  }
			  },
			   dev_payfrom:{
				  validators:{
					  notEmpty:{
					  },
				  }
			  },
			   ss_id:{
				  validators:{
					  notEmpty:{
					  },
				  }
			  },
			   sf_id:{
				  validators:{
					  notEmpty:{
					  },
				  }
			  },
			   dev_timebegin:{
				  validators:{
					  notEmpty:{
					  },
				  }
			  },
			   dev_timeend:{
				  validators:{
					  notEmpty:{
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