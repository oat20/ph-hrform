<?php
ob_start();
session_start();

include("include/config.php");
 include "include/connect_db.php";
 include("include/function.php");
 include("check_login.php");
 
 if($_POST[action] == "add"){
	 $sql="insert into project_budtype (pro_id, bt_id, budget, quarter1, q11, quarter2, q22, quarter3, q33, quarter4, q44)
	 values ('$_POST[pro_id]', '$_POST[bt_id]', '$_POST[budget]', '$_POST[q1]', '$_POST[q11]', '$_POST[q2]', '$_POST[q22]', '$_POST[q3]', '$_POST[q33]', '$_POST[q4]', '$_POST[q44]')";
	 mysql_query($sql);
	 
	 echo"<script language='JavaScript'>";
	 	print"window.opener.location.reload();";
		echo"self.close();";
	echo"</script>";
 }
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
					print "<option value=0>- เลือกรายการ -</option>";
				$sql="select * from budtype";
				$rs=mysql_query($sql);
				while($ob=mysql_fetch_array($rs)){
					print "<option value=".$ob['bt_id'].">- ".$ob['bt_name']."</option>";
				}
				print "</select>";
				?>
                </td>
             </tr>
    	<tr>
             	<td class="tdpadding">งบประมาณ:</td>
                <td class="tdpadding"><input name="budget" type="text" size="50" maxlength="20"> บาท</td>
             </tr>
            
             <tr>
        	<td colspan="2" class="tdpadding"><span class="boldRed_10">หมายเหตุ จำนวนเงินไม่ต้องใส่เครื่องหมาย "," ขั้นหลัก เช่น 100000</span></td>
        </tr>
    </table>
    <!--<table>
    	<?php
		$sql2="select * from budtype
		order by bt_id asc";
		$rs2=mysql_query($sql2);
		while($ob2=mysql_fetch_array($rs2)){
    		print "<tr>";
        		print "<td><input name='bt_id[]' type='checkbox' value='".$ob2[bt_id]."' /> ".$ob2[bt_name]."</td>";
            	print "<td><input name='budget[]' type='text' size='30' maxlength='11' /> บาท</td>";
        	print "</tr>";
		}
		?>
        <tr>
        	<td colspan="2" class="tdpadding"><span class="boldRed_10">หมายเหตุ จำนวนเงินไม่ต้องใส่เครื่องหมาย "," ขั้นหลัก เช่น 100000</span></td>
        </tr>
    </table> -->
    <br/>
    <table cellspacing="0">
<tr >
        	<td class="formcolhd">ไตรมาส</td>
            <td class="formcolhd">แผนการใช้จ่าย (บาท)</td>
            <td class="formcolhd">ผลการใช้จ่าย (บาท)</td>
        </tr>
        <tr class="tdpadding">
        	<td class="formcol2">ไตรมาสที่ 1 (ตุลาคม - ธันวาคม)</td>
            <td class="formcol2"><input name="q1" type="text" size="30" maxlength="9"></td>
            <td class="formcol2"><input name="q11" type="text" size="30" maxlength="9"></td>
        </tr>
        <tr class="tdpadding">
        	<td class="formcol2">ไตรมาสที่ 2 (มกราคม - มีนาคม)</td>
            <td class="formcol2"><input name="q2" type="text" size="30" maxlength="9"></td>
            <td class="formcol2"><input name="q22" type="text" size="30" maxlength="9"></td>
        </tr>
        <tr class="tdpadding">
        	<td class="formcol2">ไตรมาสที่ 3 (เมษายน - มิถุนายน)</td>
            <td class="formcol2"><input name="q3" type="text" size="30" maxlength="9"></td>
           <td class="formcol2"><input name="q33" type="text" size="30" maxlength="9"></td>
        </tr>
        <tr class="tdpadding">
        	<td class="formcol2">ไตรมาสที่ 4 (กรกฎาคม - กันยายน)</td>
            <td class="formcol2"><input name="q4" type="text" size="30" maxlength="9"></td>
            <td class="formcol2"><input name="q44" type="text" size="30" maxlength="9"></td>
        </tr>
        <tr>
        	<td colspan="3" class="tdpadding">
           	 <input name="pro_id" type="hidden" value="<?=$_GET[pro_id];?>" /> 
            <input name="action" type="hidden" value="add" />
            <input class="button" type="submit" name="submit" value="Save"></td>
        </tr>
    </table>
  </fieldset>
