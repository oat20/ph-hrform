<?php 
session_start();

set_time_limit(0);
//ini_set('extension','');

include("../admin/compcode/include/config.php");
require_once '../lib/mysqli.php'; 
include "../admin/compcode/include/connect_db.php";
require_once("../admin/compcode/include/function.php");

$dev_id=maxid($condb, $db_eform.'.develop', 'dev_id');
//$dev_trackid=date('YmdHis').random_ID("6","0");
$dev_trackid=substr($cf_thaiyear,'2','2').addzero($dev_id,'4');
$dev_setid = date('Y').'-'.random_ID("6","0");
$dvt_name = mysqli_real_escape_string($condb, $_POST['typ_id']);

if(isset($_POST['action']) and $_POST["action"] == 'save')
{
	mysqli_autocommit($condb, false);

		//insert table develop
		$dev_bookfrom=$_POST['dev_bookfrom_01'].'+'.$_POST['dev_bookfrom_02'].'+'.$_POST['dev_bookfrom_03'].'+'.$_POST['dev_bookfrom_04'];
		
		if($_POST['dev_country'] == '223' or $_POST['dev_country']=='TH'){ $dev_local='1'; }else{ $dev_local='2'; }
		$dev_training_hour=GettrainingHour($_POST['dev_stdate'], $_POST['dev_enddate'], $_POST['dev_timebegin'], $_POST['dev_timeend']);//จำนวนชั่วโมง

		//tb develop_type
	$sql_devtype = mysqli_query($condb, "select dvt_id from $db_eform.develop_type 
		where dvt_name like '%$dvt_name%'
		order by rand()
		limit 1
	");
	$rs_devtype = mysqli_fetch_array($sql_devtype);
	if($rs_devtype['dvt_id'] == ''){
		$_POST['typ_id'] = random_ID('2', '2');
		mysqli_query($condb, "insert into $db_eform.develop_type (dvt_id, dvt_name) values ('$dvt_id', '$dvt_name')");
	}else{
		$_POST['typ_id'] = $rs_devtype['dvt_id'];
	}
		
		//insert tb develop
				$sql1="insert into $db_eform.develop (dev_id, 
					dp_id,
					dev_orddate, 
					dev_bookfrom, 
					dev_onus, 
					dev_stdate, 
					dev_enddate, 
					dev_timebegin,
					dev_timeend,
					act_id, 
					dev_place, 
					lt_id, 
					dev_org,
					dev_training_hour,
					le_id,
					dev_payfrom,
					dev_fundname,
					ss_id,
					sf_id,
					dev_remark,
					dev_formstatus,
					dev_formstatus_comment,
					dev_perid,
					dev_maintype,
					dev_modify,
					dev_trackid,
					dev_year,
					dev_country,
					dev_local,
					dev_create,
					dev_setid,
					dev_type,
					dev_typeother,
					dev_createby,
					dev_nopay) 
					values ('$dev_id',
					'$_POST[dp_id]',
					'".date('Y-m-d')."',
					'$dev_bookfrom',
					'$_POST[title_pic]', 
					'$_POST[dev_stdate]',
					'$_POST[dev_enddate]',
					'$_POST[dev_timebegin]',
					'$_POST[dev_timeend]', 
					'$_POST[sec_id]', 
					'$_POST[dev_place]', 
					'$_POST[lt_id]', 
					'$_POST[dev_org]',
					'$dev_training_hour',
					'$_POST[le_id]',
					'$_POST[dev_payfrom]',
					'$_POST[dev_fundname]',
					'$_POST[ss_id]',
					'$_POST[sf_id]',
					'$_POST[dev_remark]',
					'$_POST[dev_formstatus]',
					'$_POST[dev_formstatus_comment]',
					'$_SESSION[ses_per_id]',
					'1',
					'$date_create',
					'$dev_trackid',
					'".budgetyear_02($_POST['dev_stdate'])."',
					'$_POST[dev_country]',
					'$dev_local',
					'$date_create',
					'$dev_setid',
					'$_POST[typ_id]',
					'$_POST[dev_typeother]',
					'$_SESSION[ses_per_id]',
					'$_POST[dev_nopay]')";
		$exec1=mysqli_query($condb, $sql1);
				
		//insert table develop_form_objective
		if(isset($_POST['typ_id'])){
			//foreach($_POST['typ_id'] as $value){
				$sql02=mysqli_query($condb, "insert into $db_eform.develop_form_objective values ('$dev_id','$_POST[typ_id]')");
			//}
		}
		
		//insert table develop_form_budget
		if(isset($_POST['bt_id'])){
			foreach($_POST['bt_id'] as $value){
				$sql02=mysqli_query($condb, "insert into $db_eform.develop_form_budget (dev_id, bt_id, dev_pay01) values ('$dev_id', '$value', '".$_POST["bt_dev_pay01".$value]."')");
				$budget_pay01+=$_POST['bt_dev_pay01'.$value];
			}
		}
		
		//insert table develop_form_cost
		if(isset($_POST['ct_id'])){
			foreach($_POST['ct_id'] as $value){
				$sql03=mysqli_query($condb, "insert into $db_eform.develop_form_cost (dev_id, ct_id, dev_pay01) values ('$dev_id', '$value', '".$_POST["ct_dev_pay01".$value]."')");
				$cost_pay01+=$_POST['ct_dev_pay01'.$value];
			}
		}
		
		//insert table develop, develop_course_personel
		if(isset($_POST['per_id'])){		
			foreach($_POST['per_id'] as $v_perid){												
				$sql04=mysqli_query($condb, "insert into $db_eform.develop_course_personel (
							dev_id,
							per_id,
							budget_pay01,
							cost_pay01)
							values (
							'$dev_id', 
							'$v_perid', 
							'$budget_pay01', 
							'$cost_pay01')");
			}
		}else{
			$sql04=mysqli_query($condb, "insert into $db_eform.develop_course_personel (
							dev_id,
							per_id,
							budget_pay01,
							cost_pay01)
							values (
							'$dev_id', 
							'".$_SESSION['ses_per_id']."', 
							'$budget_pay01', 
							'$cost_pay01')
						");
		}
		//insert table develop, develop_course_personel

		if(!empty($_FILES['file']['name'])){
			$dev_filename = $dev_id.'-'.date('YmdHis').random_password(2).attachDocType($_FILES['file']['type']);
			mysqli_query($condb, "insert into $db_eform.develop_attachment 
				values ('$dev_id', '$dev_filename', '$_FILES[file][type]', '$_FILES[file][size]', 'ATTACHMENT')
			");
			move_uploaded_file($_FILES['file']['temp_name'], "../phpm/attachment/".$dev_filename);
		}
		
		//insert table develop_log
		$sql2="insert into $db_eform.develop_log (dl_id, 
					dev_id, 
					per_id, 
					dl_status, 
					dl_ipstamp) 
					values ('".strtoupper(random_password('6'))."', 
					'$dev_id', 
					'$_SESSION[ses_per_id]', 
					'Create', 
					'".$_SERVER['REMOTE_ADDR']."')";
		mysqli_query($condb, $sql2);

		mysqli_commit($condb);
		
		mysqli_rollback($condb);
		mysqli_close($condb);

		header("location: confirm-form-1.php?getDevid=".$dev_id);
}
 ?>

