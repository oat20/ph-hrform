<?php
ob_start();
session_start();

include("../admin/compcode/include/config.php");
 include "../admin/compcode/include/connect_db.php";
 include("../admin/compcode/include/function.php");
 
  if($_POST[action] == "add")
 {
	 $sql="insert into project_spending_plan (pro_id, list, budget, m10, m11, m12, m1, m2, m3, m4, m5, m6, m7, m8, m9) 
	 values ('$_POST[pro_id]', '$_POST[list]', '$_POST[budget]', '$_POST[m10]', '$_POST[m11]', '$_POST[m12]', '$_POST[m1]', '$_POST[m2]', '$_POST[m3]', '$_POST[m4]', '$_POST[m5]', '$_POST[m6]', '$_POST[m7]', '$_POST[m8]', '$_POST[m9]')";
	 mysql_query($sql);
	 
	 echo"<script language='JavaScript'>";
	 	print"window.opener.location.reload();";
								echo"self.close();";
								echo"</script>";
 }
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
	<legend>แผนการใช้จ่ายงบประมาณของโครงการ</legend>
	<table class="table1">
    <!--<tr>
    <th>ปีงบประมาณ</th>
    <td><?php #dropdown_budgetyear("0");?></td>
    </tr> -->
  <tr>
    <th>รายการใช้จ่าย</th>
    <td><input name="list" type="text" id="list" size="60" maxlength="100"></td>
  </tr>
  <tr>
    <th><label for="list">งบประมาณ (บาท)</label></th>
    <td><input type="text" name="budget" id="budget"></td>
    </tr>
  <tr>
    <th>ต.ค. (บาท)</th>
    <td><input type="text" name="m10" id="m10"></td>
    </tr>
  <tr>
    <th>พ.ย. (บาท)</th>
    <td><input type="text" name="m11" id="m11"></td>
    </tr>
  <tr>
    <th>ธ.ค. (บาท)</th>
    <td><input type="text" name="m12" id="m12"></td>
    </tr>
  <tr>
    <th>ม.ค. (บาท)</th>
    <td><input type="text" name="m1" id="m1"></td>
    </tr>
  <tr>
    <th>ก.พ. (บาท)</th>
    <td><input type="text" name="m2" id="m2"></td>
    </tr>
  <tr>
    <th>มี.ค. (บาท)</th>
    <td><input type="text" name="m3" id="m3"></td>
    </tr>
  <tr>
    <th>เม.ย. (บาท)</th>
    <td><input type="text" name="m4" id="m4"></td>
    </tr>
  <tr>
    <th>พ.ค. (บาท)</th>
    <td><input type="text" name="m5" id="m5"></td>
    </tr>
  <tr>
    <th>มิ.ย. (บาท)</th>
    <td><input type="text" name="m6" id="m6"></td>
    </tr>
  <tr>
    <th>ก.ค. (บาท)</th>
    <td><input type="text" name="m7" id="m7"></td>
    </tr>
  <tr>
    <th>ส.ค. (บาท)</th>
    <td><input type="text" name="m8" id="m8"></td>
    </tr>
  <tr>
    <th>ก.ย. (บาท)</th>
    <td><input type="text" name="m9" id="m9"></td>
    </tr>
  <tr>
    <th>&nbsp;</th>
    <td><span class="boldRed_10">หมายเหตุ จำนวนเงินไม่ต้องใส่เครื่องหมาย "," ขั้นหลัก เช่น 100000</span></td>
  </tr>
  <tr>
    <th>&nbsp;</th>
    <td><input name="pro_id" type="hidden" value="<?=$_GET[pro_id];?>" /> 
            <input name="action" type="hidden" value="add" />
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