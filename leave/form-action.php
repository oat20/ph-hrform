<?php 
session_start();

include("../admin/compcode/include/config.php"); 
include "../admin/compcode/include/connect_db.php";
require_once("../admin/compcode/include/function.php");

$ordering=maxid($db_eform.'.develop_leave', 'ordering');
$dev_id=addzero($ordering,'5');

if(isset($_POST['action']) and $_POST["action"] == 'save')
{
		//insert table develop		
		if($_POST['dev_country'] == '223' or $_POST['dev_country']=='TH' or $_POST['dev_country']=='ไทย' or $_POST['dev_country']=='ประเทศไทย' or $_POST['dev_country']=='thai' or $_POST['dev_country']=='thailand' or $_POST['dev_country']=='Thai' or $_POST['dev_country']=='Thailand'){ $dev_local='1'; }else{ $dev_local='2'; }
		
		//insert tb develop_leave_personel
		$sql05=mysql_query("insert into $db_eform.develop_leave_personel values ('".date('YmdHis').random_ID('3', '2')."',
			'$dev_id',
			'$_POST[per_name]',
			'',
			'$_POST[per_type]',
			'$_POST[per_job]',
			'$_POST[per_number]',
			'$_POST[per_dept]',
			'$_POST[per_adddate]',
			'$_POST[per_contract1]',
			'$_POST[per_contract2]',
			'$_POST[per_tel]',
			'$_POST[per_fax]')");
		
		//insert tb develop
		$dev_training_hour=ceil((strtotime($_POST['dev_enddate']) - strtotime($_POST['dev_stdate']))/86400)+1;
				$sql1="insert into $db_eform.develop_leave (dev_id,
					ordering, 
					dev_type,
					dev_onus,
					dev_place,
					dev_country,
					dev_local,
					dev_stdate, 
					dev_enddate,
					dev_training_hour, 
					dev_fundname,
					dev_edu,
					dev_docother,
					dev_orddate,
					dev_year,
					dev_modify,
					dev_perid,
					dev_bossname,
					dev_bosspos) 
					values ('$dev_id',
					'$ordering',
					'$_POST[dev_type]',
					'$_POST[dev_onus]',
					'$_POST[dev_place]', 
					'$_POST[dev_country]',
					'$dev_local',
					'$_POST[dev_stdate]',
					'$_POST[dev_enddate]', 
					'$dev_training_hour', 
					'$_POST[dev_fundname]', 
					'$_POST[dev_edu]',
					'$_POST[dev_docother]', 
					'$date_create',
					'".budgetyear_02($_POST['dev_stdate'])."',
					'$date_create',
					'$_SESSION[ses_per_id]',
					'$_POST[dev_bossname]',
					'$_POST[dev_bosspos]')";
		$exec1=mysql_query($sql1);
		
		//insert table develop_leave_doc2
		if(isset($_POST['ld_id'])){
			
			foreach($_POST['ld_id'] as $value){
												
				//insert tb develop_course_personel
				$sql04=mysql_query("insert into $db_eform.develop_leave_doc2 (dev_id,
							ld_id)
							values ('$dev_id',
							'$value')");
			}
		
		}
		
		//insert table develop_log
		$sql2="insert into $db_eform.develop_leave_log (dl_id, 
					dev_id, 
					per_id, 
					dl_status, 
					dl_ipstamp) 
					values ('".date('YmdHis').random_password('2')."', 
					'$dev_id', 
					'$_SESSION[ses_per_id]', 
					'Create', 
					'".$_SERVER['REMOTE_ADDR']."')";
		mysql_query($sql2);
		
		header('location: message-alert.php?dev_id='.$dev_id);
				
		//insert table develop_form_objective
		/*if(isset($_POST['typ_id'])){
			foreach($_POST['typ_id'] as $value){
				$sql02=mysql_query("insert into $db_eform.develop_form_objective values ('$dev_id','$value')");
			}
		}*/
		
		//insert table develop_form_budget
		/*if(isset($_POST['bt_id'])){
			foreach($_POST['bt_id'] as $value){
				$sql02=mysql_query("insert into $db_eform.develop_form_budget (dev_id, bt_id, dev_pay01) values ('$dev_id', '$value', '".$_POST["bt_dev_pay01".$value]."')");
				$budget_pay01+=$_POST['bt_dev_pay01'.$value];
			}
		}*/
		
		//insert table develop_form_cost
		/*if(isset($_POST['ct_id'])){
			foreach($_POST['ct_id'] as $value){
				$sql03=mysql_query("insert into $db_eform.develop_form_cost (dev_id, ct_id, dev_pay01) values ('$dev_id', '$value', '".$_POST["ct_dev_pay01".$value]."')");
				$cost_pay01+=$_POST['ct_dev_pay01'.$value];
			}
		}*/
		
}
 ?>

