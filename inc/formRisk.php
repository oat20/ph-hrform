<?php
ob_start();
session_start();

include("../admin/compcode/include/config.php");
 include "../admin/compcode/include/connect_db.php";
 include("../admin/compcode/include/function.php");
 
 if($_POST[action] == "add")
 {
	 $sql="insert into project_risk (pro_id, ris_id, issue, risk, comment, level, protect, respone, cost) 
	 values ('$_POST[pro_id]', '$_POST[ris_id]', '$_POST[issue]', '$_POST[risk]', '$_POST[comment]', '$_POST[level]', '$_POST[protect]', '$_POST[respone]', '$_POST[cost]')";
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
<title>Untitled Document</title>
<link href="../admin/compcode/tool/css_text.css" rel="stylesheet" type="text/css">
</head>

<body>
<form name="form1" method="post" action="<?=$PHP_SELF;?>">
  <fieldset>
    <legend>ความเสี่ยงที่สำคัญที่อาจจะเกิดขึ้นจากกระบวนการ ผลผลิต ผลลัพธ์ ของโครงการ</legend>
    <table class="table1">
  <tr>
    <th>ด้านความเสี่ยง</th>
    <td>
    	<select name="ris_id">
        	<option value="0">- -</option>
            <?php
			$sql="select * from risk_cate order by ris_id asc";
			$rs=mysql_query($sql);
			while($ob=mysql_fetch_array($rs))
			{
				print "<option value='".$ob["ris_id"]."'>- ".$ob["risk"]." -</option>";
			}
			?>
        </select>
    </td>
  </tr>
  <tr>
    <th>ประเด็นที่ต้องพิจารณา</th>
    <td><label for="issue"></label>
      <input name="issue" type="text" id="issue" size="60"></td>
  </tr>
  <tr>
    <th>ความเสี่ยงที่อาจจะเกิดขึ้น</th>
    <td><input name="risk" type="text" id="risk" size="60"></td>
  </tr>
  <tr>
    <th>คำอธิบาย</th>
    <td><input name="comment" type="text" id="comment" size="60"></td>
  </tr>
  <tr>
    <th>ระดับความเสี่ยง</th>
    <td><label for="level"></label>
      <select name="level" id="level">
        <option value="0">- -</option>
        <?php
		foreach($risk_level as $k=>$v)
		{
			print "<option value='".$k."'>- ".$v." -</option>";
		}
		?>
      </select></td>
  </tr>
  <tr>
    <th>แนวทางการป้องกัน</th>
    <td><input name="protect" type="text" id="protect" size="60"></td>
  </tr>
  <tr>
    <th>ผู้รับผิดชอบ</th>
    <td><input name="respone" type="text" id="respone" size="60"></td>
  </tr>
  <tr>
    <th>ต้นทุที่เกิดขึ้น</th>
    <td><input name="cost" type="text" id="cost" size="60"></td>
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