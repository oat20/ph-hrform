<?php
ob_start();
session_start();

include("../admin/compcode/include/config.php");
 include "../admin/compcode/include/connect_db.php";
 include("../admin/compcode/include/function.php");
 
 if($_POST[action] == "edit")
 {
	 $sql="update project_detail_spend set 
	 spe_id = '$_POST[spe_id]', 
	 detail = '$_POST[detail]'
	 where id='$_POST[id]'";
	 mysql_query($sql);
	 
	 echo"<script language='JavaScript'>";
	 	print"window.opener.location.reload();";
								echo"self.close();";
								echo"</script>";
 }
 
 $sql="select * from project_detail_spend
 where id='$_GET[id]'";
 $rs=mysql_query($sql);
 $ob=mysql_fetch_array($rs);
 ?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>แผนการใช้จ่ายงบประมาณของโครงการ</title>
<link href="../admin/compcode/tool/css_text.css" rel="stylesheet" type="text/css">
</head>

<body>
<form action="<?=$PHP_SELF;?>" method="post">
<fieldset>
	<legend>รายละเอียดค่าใช้จ่าย</legend>
	<table class="table1">
  <tr>
    <th>หมวดค่าใช้จ่าย</th>
    <td><label for="spe_id"></label>
      <select name="spe_id" id="spe_id">
      	<option value="0">- -</option>
        <?php
		$spe_cate="select * from spending_cate order by id asc";
		$rs_spe_cate=mysql_query($spe_cate);
		while($ob_spe_cate=mysql_fetch_array($rs_spe_cate))
		{
			if($ob["spe_id"] == $ob_spe_cate["id"]){
				print "<option value='".$ob_spe_cate["id"]."' selected>- ".$ob_spe_cate["spend"]." -</option>";
			}else{
				print "<option value='".$ob_spe_cate["id"]."'>- ".$ob_spe_cate["spend"]." -</option>";
			}
		}
		?>
      </select></td>
    </tr>
  <tr>
    <th><label for="list">รายละเอียด</label></th>
    <td><textarea name="detail" cols="60" rows="5" id="detail"><?=$ob["detail"];?></textarea></td>
    </tr>
  <tr>
    <th>&nbsp;</th>
    <td><span class="boldRed_10">หมายเหตุ จำนวนเงินไม่ต้องใส่เครื่องหมาย "," ขั้นหลัก เช่น 100000</span></td>
  </tr>
  <tr>
    <th>&nbsp;</th>
    <td><input name="id" type="hidden" value="<?=$_GET[id];?>" /> 
            <input name="action" type="hidden" value="edit" />
            <input class="button" type="submit" name="submit" value="Save"></td>
  </tr>
  </table>
	</fieldset>
</form>
</body>
</html>
<?php
ob_end_flush();
?>