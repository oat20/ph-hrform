<?php 
session_start();

set_time_limit(0);

include("../admin/compcode/include/config.php");
require_once '../lib/mysqli.php'; 
include "../admin/compcode/include/connect_db.php";
require_once("../admin/compcode/include/function.php");

if(isset($_POST['action']) and $_POST['action'] == 'save'){
	
	//update tb develop
	$dev_bookfrom=$_POST['dev_bookfrom_01'].'+'.$_POST['dev_bookfrom_02'].'+'.$_POST['dev_bookfrom_03'].'+'.$_POST['dev_bookfrom_04'];
	
	if($_POST['dev_country'] == '223'){ $dev_local='1'; }else{ $dev_local='2'; }
	$dev_training_hour=GettrainingHour($_POST['dev_stdate'], $_POST['dev_enddate'], $_POST['dev_timebegin'], $_POST['dev_timeend']);//จำนวนชั่วโมง

	//tb_develop_type
	$sql=mysqli_query($condb, "select dvt_id from develop_type where dvt_name like '%$_POST[typ_id]%' order by rand() limit 1");
	$rs=mysqli_fetch_assoc($sql);
	if($rs['dvt_id'] != ''){
		$dev_type=$rs['dvt_id'];
	}else{
		$dvt_id=random_ID(2, 2);
		mysqli_query($condb, "insert into develop_type (dvt_id, dvt_name) values ('$dvt_id', '$_POST[typ_id]')");
		$dev_type=$dvt_id;
	}
	
	$qDevelop=mysqli_query($condb, "update $db_eform.develop set
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
					dev_type='$dev_type',
					dev_timebegin='$_POST[dev_timebegin]',
					dev_timeend='$_POST[dev_timeend]',
					dev_nopay='$_POST[dev_nopay]',
					dev_createby='$_SESSION[ses_per_id]',
					dev_maintype='$_POST[dev_maintype]'
					where dev_id='$_POST[dev_id]'
				");
	
	//insert table develop_form_objective
	mysqli_query($condb, "delete from $db_eform.develop_form_objective where dev_id='$_POST[dev_id]'");
		if(isset($_POST['typ_id'])){			
			//foreach($_POST['dvt_id'] as $value){
				$sql02=mysqli_query($condb, "insert into $db_eform.develop_form_objective values ('$_POST[dev_id]','$_POST[typ_id]')");
			//}
		}
		
		//insert table develop_form_budget
		mysqli_query($condb, "delete from $db_eform.develop_form_budget where dev_id='$_POST[dev_id]'");
		if(isset($_POST['bt_id'])){
			foreach($_POST['bt_id'] as $value){
				$sql02=mysqli_query($condb, "insert into $db_eform.develop_form_budget (dev_id, 
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
		mysqli_query($condb, "delete from $db_eform.develop_form_cost where dev_id='$_POST[dev_id]'");
		if(isset($_POST['ct_id'])){
			foreach($_POST['ct_id'] as $value){
				$sql03=mysqli_query($condb, "insert into $db_eform.develop_form_cost (dev_id, 
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
		/*
		mysqli_query($condb, "delete from $db_eform.develop_course_personel 
			where dev_id='$_POST[dev_id]'");
		if(isset($_POST['per_id'])){
			foreach($_POST['per_id'] as $v_perid){
				$cp_id=maxid($condb, $db_eform.'.develop_course_personel', 'cp_id');
				$sql04=mysqli_query($condb, "insert into $db_eform.develop_course_personel (cp_id,
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
							'$v_perid',
							'$budget_pay01',
							'$budget_pay02',
							'$budget_pay03',
							'$cost_pay01',
							'$cost_pay02',
							'$cost_pay03')");
			}
		}
		*/
		mysqli_query($condb, "update develop_course_personel set
			budget_pay01='$budget_pay01',
							budget_pay02='$budget_pay02',
							budget_pay03='$budget_pay03',
							cost_pay01='$cost_pay01',
							cost_pay02='$cost_pay02',
							cost_pay03='$cost_pay02'
							where dev_id='$_POST[dev_id]'
		");
		//insert table develop, develop_course_personel

		//upload attachment
		if(!empty($_FILES['file']['name'])){
			$dev_filename = $_POST['dev_id'].'-'.date('YmdHis').random_password(2).attachDocType($_FILES['file']['type']);
			$sql_devattach=mysqli_query($condb,"select * from develop_attachment where dev_id='".$_POST['dev_id']."' and dev_filecategory='Attachment'");
			if(mysqli_num_rows($sql_devattach) >= 1){
				mysqli_query($condb, "update develop_attachment set
					dev_filename='$dev_filename',
					dev_filetype='$_FILES[file][type]',
					dev_filesize='$_FILES[file][size]'
					where dev_id='$_POST[dev_id]'
					and dev_filecategory='Attachment'
				");
			}else{
				mysqli_query($condb,"insert into develop_attachment (dev_id, dev_filename, dev_filetype, dev_filesize, dev_filecategory)
					values ('".$_POST['dev_id']."'', '".$dev_filename."', '".$_FILES['file']['type']."', '".$_FILES['file']['size']."', 'Attachment')
				");
			}
			move_uploaded_file($_FILES['file']['tmp_name'], "../phpm/attachment/".$dev_filename);
		}
		
		//insert tb develop_cancel
		mysqli_query($condb, "delete from $db_eform.develop_cancel where dev_id='$_POST[dev_id]'");
		$cc_id=random_ID('4', '0');
		mysqli_query($condb, "insert into $db_eform.develop_cancel (cc_id,
			dev_id,
			cc_comment,
			cc_ipstamp) 
			values ('$cc_id',
			'$_POST[dev_id]',
			'$_POST[cc_comment]',
			'$remoteip')");
		
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
		mysqli_query($condb, $sql2);
	
	header("location: confirm-form-1.php?getDevid=".$_POST['dev_id']);
}
?>