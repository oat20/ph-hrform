<?php
ob_start();
session_start();

include("include/config.php");
 include "include/connect_db.php";
 include("include/function.php");
 include("check_login.php");
 
 if($_POST[action] == "edit"){
	 $sql="update project_budtype set 
	 bt_id = '$_POST[bt_id]', 
	 budget = '$_POST[budget]', 
	 quarter1 = '$_POST[q1]', 
	 q11 = '$_POST[q11]', 
	 quarter2 = '$_POST[q2]', 
	 q22 = '$_POST[q22]', 
	 quarter3 = '$_POST[q3]', 
	 q33 = '$_POST[q33]', 
	 quarter4 = '$_POST[q4]', 
	 q44 = '$_POST[q44]'
	 where id = '$_POST[id]'";
	 mysql_query($sql);
	 
	 echo"<script language='JavaScript'>";
	 	print"window.opener.location.reload();";
		echo"self.close();";
	echo"</script>";
 }
 
 $sql="select * from project_budtype
 where id='$_GET[id]'";
 $rs=mysql_query($sql);
 $ob=mysql_fetch_array($rs);
 ?>
<link href="tool/css_text.css" rel="stylesheet" type="text/css">
<form action="<?=$PHP_SELF;?>" method="post">
<fieldset>
	<legend>งบประมาณและการวางแผนการใช้จ่ายงบประมาณโครงการ</legend>
	<table>
     <tr>
             	<td class="tdpadding">แหล่งเงิน:</td>
                <td class="tdpadding">
                <?php
				print "<select name=bt_id>";
				$sql2="select * from budtype";
				$rs2=mysql_query($sql2);
				while($ob2=mysql_fetch_array($rs2)){
					if($ob2[bt_id] == $ob[bt_id])
					{
						print "<option value=".$ob2['bt_id']." selected='selected'>- ".$ob2['bt_name']."</option>";
					}
					else
					{
						print "<option value=".$ob2['bt_id'].">- ".$ob2['bt_name']."</option>";
					}
				}
				print "</select>";
				?>
                </td>
             </tr>
    	<tr>
             	<td class="tdpadding">งบประมาณ:</td>
                <td class="tdpadding"><input name="budget" type="text" size="50" maxlength="20" value="<?=$ob[budget];?>"> บาท</td>
             </tr>
            
             <tr>
        	<td colspan="2" class="tdpadding"><span class="boldRed_10">หมายเหตุ จำนวนเงินไม่ต้องใส่เครื่องหมาย "," ขั้นหลัก เช่น 100000</span></td>
        </tr>
    </table>
    <br/>
    <table cellspacing="0">
<tr >
        	<td class="formcolhd">ไตรมาส</td>
            <td class="formcolhd">แผนการใช้จ่าย (บาท)</td>
            <td class="formcolhd">ผลการใช้จ่าย (บาท)</td>
        </tr>
        <tr class="tdpadding">
        	<td class="formcol2">ไตรมาสที่ 1 (ตุลาคม - ธันวาคม)</td>
            <td class="formcol2"><input name="q1" type="text" size="30" maxlength="9" value="<?=$ob[quarter1];?>"></td>
            <td class="formcol2"><input name="q11" type="text" size="30" maxlength="9" value="<?=$ob[q11];?>"></td>
        </tr>
        <tr class="tdpadding">
        	<td class="formcol2">ไตรมาสที่ 2 (มกราคม - มีนาคม)</td>
            <td class="formcol2"><input name="q2" type="text" size="30" maxlength="9" value="<?=$ob[quarter2];?>"></td>
            <td class="formcol2"><input name="q22" type="text" size="30" maxlength="9" value="<?=$ob[q22];?>"></td>
        </tr>
        <tr class="tdpadding">
        	<td class="formcol2">ไตรมาสที่ 3 (เมษายน - มิถุนายน)</td>
            <td class="formcol2"><input name="q3" type="text" size="30" maxlength="9" value="<?=$ob[quarter3];?>"></td>
           <td class="formcol2"><input name="q33" type="text" size="30" maxlength="9" value="<?=$ob[q33];?>"></td>
        </tr>
        <tr class="tdpadding">
        	<td class="formcol2">ไตรมาสที่ 4 (กรกฎาคม - กันยายน)</td>
            <td class="formcol2"><input name="q4" type="text" size="30" maxlength="9" value="<?=$ob[quarter4];?>"></td>
            <td class="formcol2"><input name="q44" type="text" size="30" maxlength="9" value="<?=$ob[q44];?>"></td>
        </tr>
        <tr>
        	<td colspan="3" class="tdpadding">
           	 <input name="id" type="hidden" value="<?=$_GET[id];?>" /> 
            <input name="action" type="hidden" value="edit" />
            <input class="button" type="submit" name="submit" value="Save"></td>
        </tr>
    </table>
  </fieldset>
