<?php 
session_start();

include("../admin/compcode/include/config.php"); 
include "../admin/compcode/include/connect_db.php";
require_once("../admin/compcode/include/function.php");

if(isset($_POST['action']) and $_POST['action'] == 'save'){
		
	//update tb develop_leave_personel
	$sql03=mysql_query("update $db_eform.develop_leave_personel set per_id='$_POST[per_name]',
		per_type='$_POST[per_type]',
		per_job='$_POST[per_job]',
		per_number='$_POST[per_number]',
		per_dept='$_POST[per_dept]',
		per_adddate='$_POST[per_adddate]',
		per_contract1='$_POST[per_contract1]',
		per_contract2='$_POST[per_contract2]',
		per_tel='$_POST[per_tel]',
		per_fax='$_POST[per_fax]'
		where dev_id='$_POST[dev_id]'");
	
	//update tb develop	_leave
	if($_POST['dev_country'] == '223' or $_POST['dev_country']=='TH' or $_POST['dev_country']=='ไทย' or $_POST['dev_country']=='ประเทศไทย' or $_POST['dev_country']=='thai' or $_POST['dev_country']=='thailand' or $_POST['dev_country']=='Thai' or $_POST['dev_country']=='Thailand'){ $dev_local='1'; }else{ $dev_local='2'; }
	
	$dev_training_hour=ceil((strtotime($_POST['dev_enddate']) - strtotime($_POST['dev_stdate']))/86400)+1;
	
	$qDevelop=mysql_query("update $db_eform.develop_leave set
		dev_type='$_POST[dev_type]', 
					dev_onus='$_POST[dev_onus]',
					dev_place='$_POST[dev_place]',
					dev_country = '$_POST[dev_country]',
					dev_local = '$dev_local',
					dev_stdate='$_POST[dev_stdate]',
					dev_enddate='$_POST[dev_enddate]',
					dev_training_hour='$dev_training_hour',
					dev_fundname='$_POST[dev_fundname]',
					dev_edu='$_POST[dev_edu]',
					dev_docother='$_POST[dev_docother]',
					dev_modify='$date_create',
					dev_year='".budgetyear_02($_POST['dev_stdate'])."',
					dev_cancel='$_POST[dev_cancel]',
					dev_cancelcomment='$_POST[dev_cancelcomment]',
					dev_bossname = '$_POST[dev_bossname]',
					dev_bosspos = '$_POST[dev_bosspos]'
					where dev_id='$_POST[dev_id]'");
	
	//insert table develop_form_objective
	mysql_query("delete from $db_eform.develop_leave_doc2 where dev_id='$_POST[dev_id]'");
		if(isset($_POST['ld_id'])){			
			foreach($_POST['ld_id'] as $value){
				$sql02=mysql_query("insert into $db_eform.develop_leave_doc2 (dev_id, ld_id) values ('$_POST[dev_id]','$value')");
			}
		}
		
		//insert table develop_form_budget
		/*mysql_query("delete from phper2.develop_form_budget where dev_id='$_POST[dev_id]'");
		if(isset($_POST['bt_id'])){
			foreach($_POST['bt_id'] as $value){
				$sql02=mysql_query("insert into phper2.develop_form_budget (dev_id, bt_id, dev_pay01) values ('$_POST[dev_id]', '$value', '".$_POST["bt_dev_pay01".$value]."')");
				$budget_pay01+=$_POST['bt_dev_pay01'.$value];
			}
		}*/
		
		//insert table develop_form_cost
		/*mysql_query("delete from phper2.develop_form_cost where dev_id='$_POST[dev_id]'");
		if(isset($_POST['ct_id'])){
			foreach($_POST['ct_id'] as $value){
				$sql03=mysql_query("insert into phper2.develop_form_cost (dev_id, ct_id, dev_pay01) values ('$_POST[dev_id]', '$value', '".$_POST["ct_dev_pay01".$value]."')");
				$cost_pay01+=$_POST['ct_dev_pay01'.$value];
			}
		}*/
		
		//insert table develop_course_personel
		/*mysql_query("delete from phper2.develop_course_personel where dev_id='$_POST[dev_id]'");
		if(isset($_POST['per_id'])){
			foreach($_POST['per_id'] as $value){
				$sql04=mysql_query("insert into phper2.develop_course_personel (cp_id,
							dev_id,
							per_id,
							budget_pay01,
							cost_pay01) 
							values ('".strtoupper(random_password('6'))."', 
							'$_POST[dev_id]', 
							'$value',
							'$budget_pay01',
							'$cost_pay01')");
			}
		}*/
		
		//insert table develop_log
		$sql2="insert into $db_eform.develop_leave_log (dl_id, 
					dev_id, 
					per_id, 
					dl_status, 
					dl_ipstamp) 
					values ('".date('YmdHis').random_password('2')."', 
					'$_POST[dev_id]', 
					'$_SESSION[ses_per_id]', 
					'Edit', 
					'".$_SERVER['REMOTE_ADDR']."')";
		mysql_query($sql2);
	
	header("location: message-alert.php?dev_id=".$_POST['dev_id']);
}
?>