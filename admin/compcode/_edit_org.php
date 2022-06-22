<?php
session_start();

include('include/config.php');
include('check_login.php');
include('include/connect_db.php');
include('include/function.php');
?>
<!doctype html>
<meta charset="utf-8">
<?php include('../../lib/css-inc.php');?> 
<body bgcolor="#5c7094" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">
<?php include('../../inc/navbar02-inc.php');?>

<div class="container">
	<div class="row">
    
    	<div class="col-sm-12">
        
        	<form  name="insert_type" action="_action_org.php" method="post" id="defaultForm" class="form-horizontal">
        	<div class="panel panel-default">
            	<div class="panel-heading">
                	<h3 class="panel-title"><a href="_show_dep.php"><i class="fa fa-arrow-left"></i> แก้ไขส่วนงาน</a></h3>
                </div>
            	<div class="panel-body">
                     	<?php
						$rs2=mysql_query("select *, tb_orgnew.dp_id as dp_id
					 	from $db_eform.tb_orgnew
						where dp_id = '$_GET[dp_id]'");
						$ob2=mysql_fetch_assoc($rs2);
						
						$qBoss=mysql_query("select * from $db_eform.per_boss where dp_id='$ob2[dp_id]'");
						$rBoss=mysql_fetch_assoc($qBoss);
						
						$qDean=mysql_query("select * from $db_eform.per_dean where dp_id='$ob2[dp_id]'");
						$rDean=mysql_fetch_assoc($qDean);
						?>
                        <div class="form-group">
                            <label class="control-label col-sm-2"><strong>รหัสส่วนงาน:</strong></label>
                            <div class="col-sm-10">
                                <input type="text" name="dp_code" class="form-control text-uppercase" required value="<?php echo $ob2['dp_code'];?>">
                            </div>
                        </div>
                     	<!--<div class="row">
                        	<div class="col-sm-6">-->                              
                                <div class="form-group">
                                    <label class="control-label col-sm-2"><strong>ส่วนงาน:</strong></label>
                                    <div class="col-sm-10">
                                    <input type="text" size="60"  name="dp_name" class="form-control" value="<?php print $ob2['dp_name'];?>">
                                    </div>
                                </div>                             
                             <!--</div>-->
                             
                            <!-- <div class="col-sm-6">-->
                                <div class="form-group">
                                    <label class="control-label col-sm-2">กลุ่ม:</label>
                                    <div class="col-sm-10">
                                    <!--<select class="form-control select select-inverse mrs mbm" data-toggle="select" name="typ_id">
                                    	<option value="">&raquo; เลือกรายการ</option>-->
                                    	<?php
										echo '<div class="row">';
										$rs=mysql_query("select * from $db_eform.department_type
										where typ_id = 'PH00001'
										or typ_id = 'PH00002'
										order by typ_id asc");
										while($ob=mysql_fetch_assoc($rs)){
											if($ob2['typ_id'] == $ob['typ_id']){
                                    			//print '<option value="'.$ob['typ_id'].'" selected>&raquo; '.$ob['typ_name'].'</option>';
												echo '<div class="col-sm-2"><label class="radio"><input name="typ_id" type="radio" value="'.$ob['typ_id'].'" data-toggle="radio" checked> '.$ob['typ_name'].'</label></div>';
											}else{
												//print '<option value="'.$ob['typ_id'].'">&raquo; '.$ob['typ_name'].'</option>';
												echo '<div class="col-sm-2"><label class="radio"><input name="typ_id" type="radio" value="'.$ob['typ_id'].'" data-toggle="radio"> '.$ob['typ_name'].'</label></div>';
											}
										}
										echo '</div>';
										?>
                                    <!--</select>-->
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                	<label class="control-label col-sm-2">หัวหน้าส่วนงาน:</label>
                                    <div class="col-sm-10">
                                        <select class="form-control select select-inverse mrs mbm" data-toggle="select" name="per_id">
                                            <option value="">&raquo; เลือกรายการ</option>
                                            <?php
                                            $sql_01 = mysql_query("select * from $db_eform.personel_muerp as t1
                                                           inner join $db_eform.personel_status as t2 on (t1.per_status=t2.ps_id)
														   where t2.ps_flag='1'
														   and t1.per_trash='0'
                                                            order by CONVERT(t1.per_fnamet using tis620) asc,
                                                            convert(t1.per_lnamet using tis620) asc");
                                            while($ob_01 = mysql_fetch_assoc($sql_01)){
                                                if($rBoss['per_id'] == $ob_01['per_id']){
                                                    print '<option value="'.$ob_01['per_id'].'" selected>'.$ob_01['per_fnamet'].' '.$ob_01['per_lnamet'].'</option>';
                                                }else{
                                                    print '<option value="'.$ob_01['per_id'].'">'.$ob_01['per_fnamet'].' '.$ob_01['per_lnamet'].'</option>';
                                                }
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                	<label class="control-label col-sm-2">บริหารงานโดย:</label>
                                    <div class="col-sm-10">
                                        <select class="form-control select select-inverse mrs mbm" data-toggle="select" name="dean">
                                            <option value="">&raquo; เลือกรายการ</option>
                                            <?php
                                            $sql_01 = mysql_query("select * from $db_eform.personel_muerp as t1
                                                           inner join $db_eform.personel_status as t2 on (t1.per_status=t2.ps_id)
														   where t2.ps_flag='1'
														   and t1.per_trash='0'
                                                            order by CONVERT(t1.per_fnamet using tis620) asc,
                                                            convert(t1.per_lnamet using tis620) asc");
                                            while($ob_01 = mysql_fetch_assoc($sql_01)){
                                                if($rDean['per_id'] == $ob_01['per_id']){
                                                    print '<option value="'.$ob_01['per_id'].'" selected>'.$ob_01['per_fnamet'].' '.$ob_01['per_lnamet'].'</option>';
                                                }else{
                                                    print '<option value="'.$ob_01['per_id'].'">'.$ob_01['per_fnamet'].' '.$ob_01['per_lnamet'].'</option>';
                                                }
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>                            
                           <!-- </div>
                        </div>-->
                        <!--<div class="row">
                        	<div class="col-sm-6">
                            	
                            </div>
                        </div>-->                      
                </div><!--body-->
                <div class="panel-footer">
                    <input name="action" type="hidden" value="update">
                        <input name="dp_id" type="hidden" value="<?php print $ob2['dp_id'];?>">
                        <input class="button btn btn-block text-uppercase" type="submit" value="Update">
                </div>
            </div><!--panel-->
             </form>
        
        </div><!--col-->


	</div><!--row-->
</div><!--container-->

<?php 
include('../../lib/js-inc.php');
?>
<script type="text/javascript">
$(document).ready(function() {
	
	$('select[name="per_id"]').select2({dropdownCssClass: 'select-inverse-dropdown show-select-search'});
	$('select[name="dean"]').select2({dropdownCssClass: 'select-inverse-dropdown show-select-search'});
	
	$('#defaultForm').bootstrapValidator({
		fields: {
            dp_name: {
                validators: {
                    notEmpty: {
                        //message: 'The first name is required and cannot be empty'
                    }
                }
            },
			typ_id: {
                validators: {
                    notEmpty: {
                        //message: 'The first name is required and cannot be empty'
                    }
                }
            },
			/*per_id: {
                validators: {
                    notEmpty: {
                        //message: 'The first name is required and cannot be empty'
                    }
                }
            }*/
		}
	});
});
</script>