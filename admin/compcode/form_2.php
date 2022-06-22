<?php
$bud_year=$_REQUEST['bud_year'];
$title_pic=$_REQUEST['title_pic'];
session_register("bud_year");
session_register("title_pic");

print $_SESSION['bud_year'];
print $_SESSION['title_pic'];
?>
<!--<script language="JavaScript" type="text/javascript">
function checkval() 
{
  		if (document.form_2.per_dept_main.value == "0") 
		{
       			alert("เลือกส่วนงานรับผิดชอบหลัก");
          		document.form_2.per_dept_name.focus();
          		return false;
        }
		
		if (document.form_2.per_dept_join.value == "0") 
		{
       			alert("เลือกส่วนงานร่วม");
          		document.form_2.per_dept_join.focus();
          		return false;
        }
}
</script> -->

<fieldset>
	<legend>2. หน่วยงานที่รับผิดชอบ</legend>
<table cellspacing="0">
<tr>
          <td class="formcolhd">ส่วนงานรับผิดชอบ:</td>
          <td  align="left" class="tdpadding">
            <!--<select name='per_dept_main'>
				<option value="0">- เลือกรายการ -</option>
				<?php
				/*$sql="select * from organization order by DeID asc";
				$rs=mysql_query($sql);
				while($ob=mysql_fetch_array($rs)){
					if($ob["DeID"] == $per_dept){
          				print "<option value=".$ob['DeID']." selected='selected'>- ".$ob['Fname']."</option>";
					}else{
						print "<option value=".$ob['DeID'].">- ".$ob['Fname']."</option>";
					}
				}*/
				?>
          	</select> -->
            <?php
			$sql="select DeID,Fname from organization
			where DeID='$per_dept'";
			$rs=mysql_query($sql);
			$ob=mysql_fetch_array($rs);
			print "<input type='hidden' name='per_dept_main' value='".$ob['DeID']."'>";
			#print "<input name='' type='text' readonly='true' value='".$ob['Fname']."' size='50'>";
			print $ob['Fname'];
		?>          </td>
        </tr>
        <!--<tr >
          <td class="formcolhd">ส่วนงานร่วม:</td>
          <td class="tdpadding">
          	<select name="per_dept_join">
				<option value="0">- เลือกรายการ -</option>
				<?php
				$sql="select * from organization order by DeID asc";
				$rs=mysql_query($sql);
				while($ob=mysql_fetch_array($rs)){
          			print "<option value=".$ob['DeID'].">- ".$ob['Fname']."</option>";
				}
				?>
          	</select>
		</td>
        </tr> -->
        <!--<tr>
        	<td></td>
            <td><input class="buttonn" type="button" name="submit" value="< ย้อนกลับ" onClick="javascript:history.go(-1)"> <input class="buttonn" type="submit" name="submit" value="ถัดไป >"></td>
        </tr> -->
        </table>
        <!--<table>
        	<?php
			/*$sql="select * from organization order by DeID asc";
			$rs=mysql_query($sql);
			while($ob2=mysql_fetch_array($rs)){
        	print "<tr>";
            	print "<td><input name='' type='checkbox' value=''></td>";
                print "<td>".$ob2[Fname]."</td>";
            print "</tr>";
			}*/
			?>
        </table> -->
        </fieldset>
<!--</form> -->
