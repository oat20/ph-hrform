<?php 
session_start();

include("compcode/include/config.php"); 
include "compcode/include/connect_db.php";
require_once("compcode/include/function.php");

if(isset($_POST['action']) and $_POST['action'] == 'save'){
	
	//update tb develop
	$dev_bookfrom=$_POST['dev_bookfrom_01'].'+'.$_POST['dev_bookfrom_02'].'+'.$_POST['dev_bookfrom_03'].'+'.$_POST['dev_bookfrom_04'];
	
	if($_POST['dev_country'] == '223' or $_POST['dev_country']=='TH'){ $dev_local='1'; }else{ $dev_local='2'; }
	$dev_training_hour=GettrainingHour($_POST['dev_stdate'], $_POST['dev_enddate'], $_POST['dev_timebegin'], $_POST['dev_timeend']);//จำนวนชั่วโมง
		if($_POST['dev_approve']=='cancel'){$dev_cancel='yes';}else{$dev_cancel='no';}
	
	$qDevelop=mysql_query("update $db_eform.develop set 
					dp_id='$_POST[dp_id]',
					dev_bookfrom='$dev_bookfrom',
					dev_onus='$_POST[dev_onus]',
					dev_stdate='$_POST[dev_stdate]',
					dev_enddate='$_POST[dev_enddate]',
					dev_timebegin='$_POST[dev_timebegin]',
					dev_timeend='$_POST[dev_timeend]',
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
					dev_nopay='$_POST[dev_nopay]',
					dev_approve='$_POST[dev_approve]',
					dev_cancel='$dev_cancel',
					dev_createby='$_SESSION[ses_per_id]'
					where dev_id='$_POST[dev_id]'");
	
	//insert table develop_form_objective
	mysql_query("delete from $db_eform.develop_form_objective where dev_id='$_POST[dev_id]'");
		if(isset($_POST['dvt_id'])){			
			foreach($_POST['dvt_id'] as $value){
				$sql02=mysql_query("insert into $db_eform.develop_form_objective values ('$_POST[dev_id]','$value')");
			}
		}
		
		//insert table develop_form_budget
		mysql_query("delete from $db_eform.develop_form_budget where dev_id='$_POST[dev_id]'");
		if(isset($_POST['bt_id'])){
			foreach($_POST['bt_id'] as $value){
				$sql02=mysql_query("insert into $db_eform.develop_form_budget (dev_id, bt_id, dev_pay01, dev_pay02, dev_pay03) 
					values ('$_POST[dev_id]', '$value', '".$_POST["bt_dev_pay01".$value]."', '".$_POST["bt_dev_pay02".$value]."', '".$_POST["bt_dev_pay03".$value]."')");
				$budget_pay01+=$_POST['bt_dev_pay01'.$value];
				$budget_pay02+=$_POST['bt_dev_pay02'.$value];
				$budget_pay03+=$_POST['bt_dev_pay03'.$value];
			}
		}
		
		//insert table develop_form_cost
		mysql_query("delete from $db_eform.develop_form_cost where dev_id='$_POST[dev_id]'");
		if(isset($_POST['ct_id'])){
			foreach($_POST['ct_id'] as $value){
				$sql03=mysql_query("insert into $db_eform.develop_form_cost (dev_id, ct_id, dev_pay01, dev_pay02, dev_pay03) 
					values ('$_POST[dev_id]', '$value', '".$_POST["ct_dev_pay01".$value]."', '".$_POST["ct_dev_pay02".$value]."', '".$_POST["ct_dev_pay03".$value]."')");
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
				$sql00=mysql_query("insert into $db_eform.develop_course_personel (cp_id,
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
		
		//insert table develop_log
		$sql2="insert into $db_eform.develop_log (dl_id, 
					dev_id, 
					per_id, 
					dl_status, 
					dl_ipstamp) 
					values ('".strtoupper(random_password('6'))."', 
					'$_POST[dev_id]', 
					'$_SESSION[ses_per_id]', 
					'Edit', 
					'".$_SERVER['REMOTE_ADDR']."')";
		mysql_query($sql2);
	
	//header("location: 2_confirm_form2.php?getDevid=".$_POST['dev_id']);
	print '<meta http-equiv="refresh" content="0;URL=2_confirm_form2.php?getDevid='.$_POST['dev_id'].'">';
}
?>