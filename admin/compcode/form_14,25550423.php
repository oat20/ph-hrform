<script language="JavaScript" type="text/javascript">
function checkval(form) 
{
  		if (form.ind_name.value == "") 
		{
       			alert("ใส่ชื่อตัวชี้วัด");
          		form.ind_name.focus();
          		return false;
        }
		if (form.ind_id.value == "0") 
		{
       			alert("เลือกตัวชี้วัด");
          		form.ind_id.focus();
          		return false;
        }
		if (form.ind_type_id.value == "0") 
		{
       			alert("เลือกแรพเภทตัวชี้วัด");
          		form.ind_type_id.focus();
          		return false;
        }
		if (form.plan.value == "0") 
		{
       			alert("ใส่แผน");
          		form.plan.focus();
          		return false;
        }
		if (form.count.value == "0") 
		{
       			alert("ใส่หน่วยนับ");
          		form.count.focus();
          		return false;
        }
}
</script>
<form action="../present_project/insert_no14.php" method="post" onSubmit="return checkval(this)">
<fieldset>
	<legend>ตัวชี้วัดผลผลิตโครงการ</legend>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
<tr>
    	<td rowspan="2" class="formcolhd">ชื่อตัวชี้วัด</td>
        <td rowspan="2" class="formcolhd">ตัวชี้วัด</td>
        <td rowspan="2" class="formcolhd">ประเภทตัวชี้วัด</td>
        <td colspan="2" class="formcolhd"><center>เป้าหมาย</center></td>
    </tr>
    <tr>
    	<td class="formcolhd">แผน</td>
        <td class="formcolhd">หน่วยนับ</td>
    </tr>
    
    <?php
	$sql3="select * from project_ind
	inner join indicator on (project_ind.ind_id=indicator.ind_id)
	inner join indicator_type on (project_ind.ind_type_id=indicator_type.ind_type_id)
	where project_ind.pro_id='$_SESSION[Max]'
	order by project_ind.id asc";
	$rs3=mysql_query($sql3);
	while($ob3=mysql_fetch_array($rs3)){
    print "<tr>";
      print "<td class='formcol2'>".$ob3[ind_name]."</td>";
      print "<td class='formcol2'>".$ob3[indicator]."</td>";
      print "<td class='formcol2'>".$ob3[ind_type]."</td>";
      print "<td class='formcol2'>".$ob3[plan]."</td>";
      print "<td class='formcol2'>".$ob3['count']."</td>";
    print "</tr>";
	}
	?>
    
    <tr>
    	<td class='formcol2'><input name="ind_name" type="text" size="40" maxlength="100"></td>
        <td class='formcol2'>
        <select name="ind_id">
        	<option value="0">เลือกรายการ</option>
        <?php
		$rs=show_data("indicator","ind_id");
		while($ob=mysql_fetch_array($rs)){
			print "<option value=".$ob[ind_id].">".$ob[indicator]."</option>";
		}
		?>
        </select>        
        </td>
        <td class='formcol2'>
        <select name="ind_type_id">
        	<option value="0">เลือกรายการ</option>
        <?php
		$rs2=show_data("indicator_type","ind_type_id");
		while($ob2=mysql_fetch_array($rs2)){
			print "<option value=".$ob2[ind_type_id].">".$ob2[ind_type]."</option>";
		}
		?>
        </select>        
        </td>
        <td class='formcol2'><input type="text" size="10" maxlength="100" name="plan"></td>
        <td class='formcol2'><input type="text" size="10" maxlength="100" name="count"></td>
    </tr>
    <tr>
    	<td colspan="5" class="tdpadding"><input name="" type="submit" value="เพิ่มตัวชี้วัด" class="buttonn"> <input name="" type="button" value="ถัดไป >" class="buttonn" onClick="location.href='no15.php'"></td>
    </tr>
</table>
</fieldset>
</form>