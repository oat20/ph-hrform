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
<fieldset>
	<legend>ตัวชี้วัดผลผลิตโครงการ</legend>
<table border="0" cellpadding="0" cellspacing="0" width="100%">
<tr>
    	<td rowspan="2" class="formcolhd">ชื่อตัวชี้วัด</td>
        <td rowspan="2" class="formcolhd">ตัวชี้วัด</td>
        <td colspan="4" class="formcolhd">ประเภทตัวชี้วัด</td>
        <td colspan="2" class="formcolhd"><center>ค่าเป้าหมาย</center></td>
        <td rowspan="2" class="formcolhd"></td>
        <td rowspan="2" class="formcolhd"></td>
    </tr>
    <tr>
      <td class="formcolhd">ปริมาณ</td>
      <td class="formcolhd">คุณภาพ</td>
      <td class="formcolhd">เวลา</td>
      <td class="formcolhd">คุ้มค่า</td>
    	<td class="formcolhd"><center>แผน</center></td>
        <td class="formcolhd"><center>หน่วยนับ</center></td>
    </tr>
    
    <?php
	$sql5="select * from project_ind
	inner join indicator on (project_ind.ind_id=indicator.ind_id)
	where project_ind.pro_id='$ob[pro_id]'
	order by project_ind.id asc";
	$rs5=mysql_query($sql5);
	while($ob5=mysql_fetch_array($rs5)){
    print "<tr>";
      print "<td class='formcol2'>".$ob5[ind_name]."</td>";
      print "<td class='formcol2'>".$ob5[indicator]."</td>";
	  # print "<td class='formcol2'>".$ob5[ind_type]."</td>";
	   print "<td class='formcol2'>";
	   	if($ob5[a] == 1){
			print '<input name="a" type="checkbox" value="1" checked="checked" />';
	  	}else{
		 print '<input name="a" type="checkbox" value="1" />';
	  }
	  print "</td>";
	   print "<td class='formcol2'>";
	   	if($ob5[q] == 1){
			print '<input name="q" type="checkbox" value="1" checked="checked" />';
	  	}else{
		 print '<input name="q" type="checkbox" value="1" />';
	  }
	  print "</td>";
	   print "<td class='formcol2'>";
	   	if($ob5[t] == 1){
			print '<input name="t" type="checkbox" value="1" checked="checked" />';
	  	}else{
		 print '<input name="t" type="checkbox" value="1" />';
	  }
	  print "</td>";
	    print "<td class='formcol2'>";
	   	if($ob5[w] == 1){
			print '<input name="w" type="checkbox" value="1" checked="checked" />';
	  	}else{
		 print '<input name="w" type="checkbox" value="1" />';
	  }
	  print "</td>";
	    print "<td class='formcol2'>".$ob5[plan]."</td>";
	        print "<td class='formcol2'>".$ob5['counts']."</td>";
			 print "<td class='formcol2'><a href=\"javascript:NewWindow('admin/compcode/editProjectIndicator.php?id=".$ob5[id]."','acepopup','600','450','fullscreen','front');\" title=\"แก้ไข\"><img src=\"admin/compcode/img/editpic.gif\" border=\"0\"/></a></td>";
	  print "<td class='formcol2'><a href=\"admin/compcode/delProjectIndicator?id=".$ob5[id]."&pro_id=".$ob[pro_id]."\" onClick=\"return confirm('! ยืนยันการลบข้อมูล');\"><img src=\"admin/compcode/img/botton_delete.gif\" border=\"0\"/></a></td>";
    print "</tr>";
	}
	?>
    	<tr>
        	<td colspan="9">
            	<input type="button" value="เพื่มตัวชี้วัด" class="buttonn" onClick="javascript:NewWindow('admin/compcode/addProjectIndicator.php?pro_id=<?=$ob[pro_id];?>','acepopup','600','450','fullscreen','front');" />
            </td>
        </tr>
    </table>
</fieldset>
