<?php
session_start();
include("include/config.php");
?>
<!DOCTYPE HTML>
<?php  
include("include/connect_db.php");
include("include/function.php");

include('../../lib/css-inc.php');

$username=$_GET['muacc'];
$password=$_GET['token'];
?>
<body>
<div class="container">
	<div class="space1"></div>
<?php
if($_GET['muacc']!='' and $_GET['token']!=''){
											#if(login($username,$password,'tmps','personel'))
												#{
													//get profile
													$sql="select * 
													from $db_eform.personel_muerp
													inner join $db_eform.tb_orgnew on ($db_eform.personel_muerp.per_dept = $db_eform.tb_orgnew.dp_id)
													where $db_eform.personel_muerp.per_email='$username'
													and $db_eform.personel_muerp.per_password='$password'";
													$rs=mysql_query($sql);
													$row_personel=mysql_num_rows($rs);
													$ob=mysql_fetch_array($rs);
													$per_id=$ob["per_id"];
													$per_dept=$ob["per_dept"];
													//$per_type=$ob["per_type"];
													//get profile
													
													//get user status
													$sql_02 = mysql_query("SELECT * FROM $db_eform.personel_muerp as t1
																	inner join $db_eform.develop_user as t2 on (t1.per_id = t2.per_id)
																	where t1.per_id = '$ob[per_id]'");
													$ob_02 = mysql_fetch_assoc($sql_02);
													if(isset($ob_02['du_status'])){
														$_SESSION['ses_du_status'] = $ob_02['du_status'];
													}
													//get user status
													
													$_SESSION["ses_per_id"] = $per_id;
													$_SESSION["ses_per_dept"] = $per_dept;
													$_SESSION['ses_peremail'] = $ob['per_email'];
													$_SESSION['ses_createname']=$ob['per_pname'].$ob['per_fnamet'].' '.$ob['per_lnamet'];
													//$_SESSION["per_type"]=$per_type;
													
													if($row_personel != 0)
													{
														$dates=date("Y-m-d H:i:s");
														$ip=getenv("REMOTE_ADDR");
														//$sql="insert into user_log(per_id,dates,ip,event) values('$per_id','$dates','$ip','$_SERVER[REQUEST_URI]')";
														$sql = "insert into $db_eform.personel_muerp_log (per_id, log_status, log_ipstamp) values ('$ob[per_id]', 'signin', '$remoteip')";
														mysql_query($sql); 
							
													print warning("success","<span class='font-16'><i class='fa fa-check'></i> Success</span>","<span class='font-16'>เข้าสู่ระบบเรียบร้อย</span>");
													print '<p class="text-right"><a href="../../profile/profile.php" class="btn btn-link">Continue <i class="fa fa-angle-double-right"></i></a></p>';
													print '<meta http-equiv="refresh" content="2; URL=../../profile/profile.php">';
													//header("location: ".$livesite."phpm/index.php");
												}
												else
												{
														print warning("danger","<span class='font-16'><i class='fa fa-exclamation'></i></span>","<span class='font-16'>Error: Username หรือ Password ไม่ถูกต้อง</span>");
														print '<p><a href="../../phpm/login.php" class="btn btn-link"><i class="fa fa-angle-double-left"></i> Go Back</a></p>';
														print '<meta http-equiv="refresh" content="2; URL=../../phpm/login.php">';
														exit;

												 }
							}
							else if(empty($username) or empty($password))
							{	
								print warning("danger","<i class='fa fa-exclamation'></i>","<span class='font-16'>Error: Username หรือ Password ไม่ถูกต้อง</span>");
								print '<p><a href="../../phpm/login.php" class="btn btn-link"><i class="fa fa-angle-double-left"></i> Go Back</a></p>';
								print '<meta http-equiv="refresh" content="2; URL=../../phpm/login.php">';
								exit;
							}
?>

</div><!--container-->

<?php include('../../lib/js-inc.php');?>
</body>
