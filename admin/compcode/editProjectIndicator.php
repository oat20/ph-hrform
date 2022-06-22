<?php
ob_start();
session_start();

include("include/config.php");
 include "include/connect_db.php";
 include("include/function.php");
 include("check_login.php");
 
 if($_POST[action] == "edit")
 {
	 $sql="update project_ind set 
	 ind_name='$_POST[ind_name]', 
	 ind_id='$_POST[ind_id]', 
	 a='$_POST[a]', 
	 q='$_POST[q]', 
	 t='$_POST[t]', 
	 w='$_POST[w]', 
	 plan='$_POST[plan]', 
	 results='$_POST[results]', 
	 counts='$_POST[counts]', 
	 m6='$_POST[m6]', 
	 m9='$_POST[m9]',
	 m12='$_POST[m12]'
	 where id='$_POST[id]'";
	 mysql_query($sql);
	 
	 echo"<script language='JavaScript'>";
	 	print"window.opener.location.reload();";
								echo"self.close();";
								echo"</script>";
 }
 
 $sql="select * from project_ind
 where id='$_GET[id]'";
 $rs=mysql_query($sql);
 $ob=mysql_fetch_array($rs);
?>
<title><?=$livesite." ".$titlebar;?></title>
<link href="tool/css_text.css" rel="stylesheet" type="text/css">
<form action="<?=$PHP_SELF;?>" method="post">
<fieldset>
  <legend>ตัวชี้วัดผลผลิตโครงการ</legend>
<table width="100%" border="0" cellpadding="0" cellspacing="0" class="table1">
<tr>
    	<th>ชื่อตัวชี้วัด</th>
        <td><input name="ind_name" type="text" size="50" maxlength="100" value="<?=$ob[ind_name];?>" /></td>
    </tr>
    <tr>
    	<th>ตัวชี้วัด</th>
        <td><select name="ind_id">
1          <?php
		$rs2=show_data("indicator","ind_id");
		while($ob2=mysql_fetch_array($rs2)){
			if($ob2[ind_id] == $ob2[ind_id])
			{
			print "<option value=".$ob2[ind_id]." selected='selected'>- ".$ob2[indicator]." -</option>";
			}
			else
			{
				print "<option value=".$ob2[ind_id].">- ".$ob2[indicator]." -</option>";
			}
		}
		?>
        </select></td>
    </tr>
    <tr>
      <th>ประเภทตัวชี้วัด</th>
      <td>
      <?php
	  if($ob[a] == 1){
       print '<input name="a" type="checkbox" value="1" checked="checked" />';
	  }else{
		  print '<input name="a" type="checkbox" value="1" />';
	  }
	  ?>
        ปริมาณ
        <?php
	  if($ob[q] == 1){
       print '<input name="q" type="checkbox" value="1" checked="checked" />';
	  }else{
		  print '<input name="q" type="checkbox" value="1" />';
	  }
	  ?>
        คุณภาพ
        <?php
	  if($ob[t] == 1){
       print '<input name="t" type="checkbox" value="1" checked="checked" />';
	  }else{
		  print '<input name="t" type="checkbox" value="1" />';
	  }
	  ?>
        เวลา
        <?php
	  if($ob[w] == 1){
       print '<input name="w" type="checkbox" value="1" checked="checked" />';
	  }else{
		  print '<input name="w" type="checkbox" value="1" />';
	  }
	  ?>
      คุ้มค่า</td>
    </tr>
    <tr>
      <th>แผนการดำเนินงาน</th>
      <td><input type="text" size="50" maxlength="100" name="plan" value="<?=$ob[plan];?>" /></td>
    </tr>
     <tr>
      <th>ผลการดำเนินงาน</th>
      <td><input type="text" size="50" maxlength="100" name="results" value="<?=$ob[results];?>" /></td>
    </tr>
    <tr>
      <th>หน่วยนับ</th>
      <td><input type="text" size="50" maxlength="100" name="counts" value="<?=$ob[counts];?>" /></td>
    </tr>
    <tr>
      <th><span>ผล 6 เดือน<br/>
(1 ต.ค.-31 มี.ค.)</span></th>
      <td><input type="text" size="50" maxlength="50" name="m6" value="<?=$ob[m6];?>" /></td>
    </tr>
    <tr>
      <th>9 เดือน<br/>(1 ต.ค.-30 มิ.ย.)</th>
      <td><input type="text" size="50" maxlength="50" name="m9" value="<?=$ob["m9"];?>"/></td>
    </tr>
    <tr>
      <th><span>ผล 12 เดือน<br/>
      (1 ต.ค.-31 ก.ย.)</span></th>
      <td><input type="text" size="50" maxlength="50" name="m12" value="<?=$ob[m12];?>" /></td>
    </tr>
    <tr>
      <th>&nbsp;</th>
      <td>
      	<input name="id" type="hidden" value="<?=$_GET[id];?>" />
        <input name="action" type="hidden" value="edit" />
      <input type="submit" name="button" id="button" value="Save" class="button" /></td>
    </tr>
</table>
</fieldset>
</form>