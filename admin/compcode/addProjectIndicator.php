<?php
ob_start();
session_start();

include("include/config.php");
 include "include/connect_db.php";
 include("include/function.php");
 include("check_login.php");
 
 if($_POST[action] == "add")
 {
	 $sql="insert into project_ind (pro_id, ind_name, ind_id, a, q, t, w, plan, results, counts, m6, m9, m12) 
	 values ('$_POST[pro_id]', '$_POST[ind_name]', '$_POST[ind_id]', '$_POST[a]', '$_POST[q]', '$_POST[t]', '$_POST[w]', '$_POST[plan]', '$_POST[results]', '$_POST[counts]', '$_POST[m6]', '$_POST[m9]', '$_POST[m12]')";
	 mysql_query($sql);
	 
	 echo"<script language='JavaScript'>";
	 	print"window.opener.location.reload();";
								echo"self.close();";
								echo"</script>";
 }
?>
<title><?=$livesite." ".$titlebar;?></title>
<link href="tool/css_text.css" rel="stylesheet" type="text/css">
<form action="<?=$PHP_SELF;?>" method="post">
<fieldset>
  <legend>ตัวชี้วัดผลผลิตโครงการ</legend>
<table width="100%" border="0" cellpadding="0" cellspacing="0" class="table1">
<tr>
    	<th>ชื่อตัวชี้วัด</th>
        <td><input name="ind_name" type="text" size="50" maxlength="100" /></td>
    </tr>
    <tr>
    	<th>ตัวชี้วัด</th>
        <td><select name="ind_id">
          <option value="0">- -</option>
          <?php
		$rs=show_data("indicator","ind_id");
		while($ob=mysql_fetch_array($rs)){
			print "<option value=".$ob[ind_id].">- ".$ob[indicator]." -</option>";
		}
		?>
        </select></td>
    </tr>
    <tr>
      <th>ประเภทตัวชี้วัด</th>
      <td><input name="a" type="checkbox" value="1" />
        ปริมาณ
        <input name="q" type="checkbox" value="1" />
        คุณภาพ
        <input name="t" type="checkbox" value="1" />
        เวลา
        <input name="w" type="checkbox" value="1" />
      คุ้มค่า</td>
    </tr>
    <tr>
      <th>แผนการดำเนินงาน</th>
      <td><input type="text" size="50" maxlength="100" name="plan" /></td>
    </tr>
    <tr>
      <th>ผลการดำเนินงาน</th>
      <td><input type="text" size="50" maxlength="100" name="results" /></td>
    </tr>
    <tr>
      <th>หน่วยนับ</th>
      <td><input type="text" size="50" maxlength="100" name="counts" /></td>
    </tr>
    <tr>
      <th><span>ผล 6 เดือน<br/>
(1 ต.ค.-31 มี.ค.)</span></th>
      <td><input type="text" size="50" maxlength="50" name="m6" /></td>
    </tr>
    <tr>
      <th>9 เดือน<br/>(1 ต.ค.-30 มิ.ย.)</th>
      <td><input type="text" size="50" maxlength="50" name="m9" /></td>
    </tr>
    <tr>
      <th><span>ผล 12 เดือน<br/>
      (1 ต.ค.-30 ก.ย.)</span></th>
      <td><input type="text" size="50" maxlength="50" name="m12" /></td>
    </tr>
    <tr>
      <th>&nbsp;</th>
      <td>
      	<input name="pro_id" type="hidden" value="<?=$_GET[pro_id];?>" />
        <input name="action" type="hidden" value="add" />
      <input type="submit" name="button" id="button" value="Save" class="button" /></td>
    </tr>
</table>
</fieldset>
</form>