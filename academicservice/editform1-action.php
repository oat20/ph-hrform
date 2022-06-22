<?php 
session_start();

include("../admin/compcode/include/config.php"); 
include "../admin/compcode/include/connect_db.php";
require_once("../admin/compcode/include/function.php");

if(isset($_POST['action']) and $_POST['action'] == 'save'){
	
	//update tb develop
	$dev_bookfrom=$_POST['dev_bookfrom_01'].'+'.$_POST['dev_bookfrom_02'].'+'.$_POST['dev_bookfrom_03'].'+'.$_POST['dev_bookfrom_04'];
	
	if($_POST['dev_country'] == '223'){ $dev_local='1'; }else{ $dev_local='2'; }
	$dev_training_hour=GettrainingHour($_POST['dev_stdate'], $_POST['dev_enddate'], $_POST['dev_timebegin'], $_POST['dev_timeend']);
	
	$qDevelop=mysql_query("update $db_eform.develop set
					dp_id='$_POST[dp_id]',
					dev_orddate='$date_create',
					dev_bookfrom='$dev_bookfrom',
					dev_onus='$_POST[dev_onus]',
					dev_stdate='$_POST[dev_stdate]',
					dev_enddate='$_POST[dev_enddate]',
					act_id='$_POST[act_id]',
					dev_place='$_POST[dev_place]',
					lt_id='$_POST[lt_id]',
					dev_org='$_POST[dev_org]',
					dev_training_hour='$dev_training_hour',
					le_id='$_POST[le_id]',
					dev_payfrom='$_POST[dev_payfrom]',
					dev_fundname='$_POST[dev_fundname]',
					ss_id='$_POST[ss_id]',
					sf_id='$_POST[sf_id]',
					dev_remark='$_POST[dev_remark]',
					dev_modify='$date_create',
					dev_year='".budgetyear_02($_POST['dev_stdate'])."',
					dev_country = '$_POST[dev_country]',
					dev_local = '$dev_local',
					dev_type='$_POST[dvt_id]',
					dev_typeother='$_POST[dev_typeother]',
					dev_timebegin='$_POST[dev_timebegin]',
					dev_timeend='$_POST[dev_timeend]',
					dev_nopay='$_POST[dev_nopay]',
					dev_createby='$_SESSION[ses_per_id]'
					where dev_id='$_POST[dev_id]'");
			
		//insert table develop_form_budget
		mysql_query("delete from $db_eform.develop_form_budget where dev_id='$_POST[dev_id]'");
		if(isset($_POST['bt_id'])){
			foreach($_POST['bt_id'] as $value){
				$sql02=mysql_query("insert into $db_eform.develop_form_budget (dev_id, 
					bt_id, 
					dev_pay01,
					dev_pay02,
					dev_pay03) 
					values ('$_POST[dev_id]', 
					'$value', 
					'".$_POST["bt_dev_pay01".$value]."',
					'".$_POST["bt_dev_pay02".$value]."',
					'".$_POST["bt_dev_pay03".$value]."')");
				$budget_pay01+=$_POST['bt_dev_pay01'.$value];
				$budget_pay02+=$_POST['bt_dev_pay02'.$value];
				$budget_pay03+=$_POST['bt_dev_pay03'.$value];
			}
		}
		
		//insert table develop_form_cost
		mysql_query("delete from $db_eform.develop_form_cost where dev_id='$_POST[dev_id]'");
		if(isset($_POST['ct_id'])){
			foreach($_POST['ct_id'] as $value){
				$sql03=mysql_query("insert into $db_eform.develop_form_cost (dev_id, 
				ct_id, 
				dev_pay01,
				dev_pay02,
				dev_pay03) 
				values ('$_POST[dev_id]', 
				'$value', 
				'".$_POST["ct_dev_pay01".$value]."',
				'".$_POST["ct_dev_pay02".$value]."',
				'".$_POST["ct_dev_pay03".$value]."')");
				$cost_pay01+=$_POST['ct_dev_pay01'.$value];
				$cost_pay02+=$_POST['ct_dev_pay02'.$value];
				$cost_pay03+=$_POST['ct_dev_pay03'.$value];
			}
		}
		
		//insert table develop_course_personel
		mysql_query("delete from $db_eform.develop_course_personel
			where dev_id='$_POST[dev_id]'");
		if(isset($_POST['per_id'])){
			foreach($_POST['per_id'] as $value){				
				$cp_id=maxid($db_eform.'.develop_course_personel','cp_id');
				$sql04=mysql_query("insert into $db_eform.develop_course_personel (cp_id,
							dev_id,
							per_id,
							budget_pay01,
							budget_pay02,
							budget_pay03,
							cost_pay01,
							cost_pay02,
							cost_pay03) 
							values ('$cp_id', 
							'$_POST[dev_id]', 
							'$value',
							'$budget_pay01',
							'$budget_pay02',
							'$budget_pay03',
							'$cost_pay01',
							'$cost_pay02',
							'$cost_pay03')");
			}
		}
		//insert table develop, develop_course_personel
					
	header("location: confirm-form-1.php?getDevid=".$_POST['dev_id']);
}
?>