<?php 
session_start();

include("../admin/compcode/include/config.php"); 
include "../admin/compcode/include/connect_db.php";
require_once("../admin/compcode/include/function.php");

if(isset($_POST['action']) and $_POST['action'] == 'save'){
	
	//update tb develop
	$qDevelop=mysql_query("update $db_eform.develop set 
					dev_bill='$_POST[dev_bill]',
					dev_modify='$date_create'
					where dev_id='$_POST[dev_id]'");
	
		//insert table develop_form_budget
		mysql_query("delete from $db_eform.develop_form_budget where dev_id='$_POST[dev_id]'");
		if(isset($_POST['bt_id'])){
			foreach($_POST['bt_id'] as $value){
				
				/*if($_POST['bt_dev_pay01'.$value]==''){$bt_dev_pay01=0;}
				if($_POST['bt_dev_pay02'.$value]==''){$bt_dev_pay02=0;}
				if($_POST['bt_dev_pay03'.$value]==''){$bt_dev_pay03=0;}*/
				
				$sql02="insert into $db_eform.develop_form_budget (
							dev_id, 
							bt_id, 
							dev_pay01, 
							dev_pay02, 
							dev_pay03) 
							values 
							('$_POST[dev_id]', 
							'$value', 
							'".$_POST["bt_dev_pay01".$value]."', 
							'".$_POST["bt_dev_pay02".$value]."', 
							'".$_POST["bt_dev_pay03".$value]."')";
				mysql_query($sql02);
				
				$budget_pay01+=$_POST['bt_dev_pay01'.$value]; //หลักการ
				$budget_pay02+=$_POST['bt_dev_pay02'.$value]; //อนุมัติ
				$budget_pay03+=$_POST['bt_dev_pay03'.$value]; //จ่ายจริง
				//echo $sql02.'<br>';
				/*$sql02=mysql_query("insert into phper2.develop_form_budget (dev_id, bt_id, dev_pay01, dev_pay02, dev_pay03) 
						values ('$_POST[dev_id]', '$value', '$bt_dev_pay01', '$bt_dev_pay02', '$bt_dev_pay03')");*/
			}
		}
		
		//insert table develop_form_cost
		mysql_query("delete from $db_eform.develop_form_cost where dev_id='$_POST[dev_id]'");
		if(isset($_POST['ct_id'])){
			foreach($_POST['ct_id'] as $value){
				$sql03=mysql_query("insert into $db_eform.develop_form_cost (dev_id, ct_id, dev_pay01, dev_pay02, dev_pay03) 
							values ('$_POST[dev_id]', '$value', '".$_POST["ct_dev_pay01".$value]."', '".$_POST["ct_dev_pay02".$value]."', '".$_POST["ct_dev_pay03".$value]."')");
				
				$cost_pay01+=$_POST['ct_dev_pay01'.$value]; //หลักการ
				$cost_pay02+=$_POST['ct_dev_pay02'.$value]; //อนุมัติ
				$cost_pay03+=$_POST['ct_dev_pay03'.$value]; //จ่ายจริง
			}
		}
		
		//update table develop_course_personel
		mysql_query("update $db_eform.develop_course_personel set budget_pay01='$budget_pay01',
							budget_pay02='$budget_pay02',
							budget_pay03='$budget_pay03',
							cost_pay01='$cost_pay01',
							cost_pay02='$cost_pay02',
							cost_pay03='$cost_pay03'
							where dev_id = '$_POST[dev_id]'");
		
		//update tb department_budget
		$sql04=mysql_query("SELECT sum(budget_pay01) as b1,
			sum(cost_pay01) as c1,
			sum(budget_pay02) as b2,
			sum(cost_pay02) as c2,
			sum(budget_pay03) as b3, 
			sum(cost_pay03) as c3 
			FROM $db_eform.develop_course_personel 
			WHERE dev_id='$_POST[dev_id]'");
		$rs04=mysql_fetch_assoc($sql04);
		$db_budget2_1=$rs04['b1']+$rs04['c1']; $db_budget2_2=$rs04['b2']+$rs04['c2']; $db_budget2=$rs04['b3']+$rs04['c3'];
		
		$sql01=mysql_query("select dp_id, dev_year from $db_eform.develop where dev_id='$_POST[dev_id]'");
		$rs01=mysql_fetch_assoc($sql01);
		
		/*$sql02=mysql_query("SELECT (sum(budget_pay03)+sum(cost_pay03)) as c1
			FROM $db_eform.develop_course_personel
			WHERE dev_id='$_POST[dev_id]'");
		$rs02=mysql_fetch_assoc($sql02);*/
		/*$db_budget2_1=$budget_pay01+$cost_pay01; //หลักการ
		$db_budget2_2=$budget_pay02+$cost_pay02; //อนุมัติ
		$db_budget2=$budget_pay03+$cost_pay03;*/ //จ่ายจริง
		
		mysql_query("update $db_eform.department_budget set 
			db_budget2_1='$db_budget2_1',
			db_budget2_2='$db_budget2_2',
			db_budget2='$db_budget2' 
			where dp_id='$rs01[dp_id]' 
			and db_year='$rs01[dev_year]'");
		//update tb department_budget
		
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
	
	header("location: show-editbudget-form.php?keyDpid=".$_POST['dp_id']."&keyDpname=".$_POST['dp_name']);
}
?>