<?php
#session_start();
?>
<!--<script language="JavaScript" type="text/javascript">
function checkval(form_1) 
{
  		if (form_1.bud_year.value == "") 
		{
       			alert("ใส่ปีงบประมาณ");
          		form_1.bud_year.focus();
          		return false;
        }
		
		if (form_1.title_pic.value == "") 
		{
       			alert("ใส่ชื่อโครงการ");
          		form_1.title_pic.focus();
          		return false;
        }
		
}
</script> -->
<link href="../../room_it/style2.css" rel="stylesheet" type="text/css">
<link href="tool/css_text.css" rel="stylesheet" type="text/css" />
<!--<h2 class="boldBlack_10">1. ชื่อโครงการ</h2>
<div class="space5"></div> -->
<form action="inc/add_project.php" method="post">
<fieldset>
	<legend>1. ชื่อโครงการ</legend>
<!--<form action="?f=f2" method="post" onsubmit="return checkval(this)" name="form_1"> -->
<table border="0" cellpadding="0" cellspacing="0">
	<tr>
    	<td class="formcolhd">ปีงบประมาณ:</td>
        <td class="tdpadding">
        	<?=dropdown_budgetyear($ob["budget_year"])?>
        <!--<input type="text" size="5" maxlength="4" name="bud_year" /> --></td>
    </tr>
     <tr>
          <td class="formcolhd">ชื่อโครงการ:</td>
          <td class="tdpadding"><input name="title_pic" type="text" class="inputform" id="title_news" value="<?=$ob["names"];?>" size="60" /></td>
    </tr>
    <tr>
          <td class="formcolhd">ส่วนงานรับผิดชอบ:</td>
          <td  align="left" class="tdpadding">
            <select name='per_dept_main'>
				<option value="0">- เลือกรายการ -</option>
				<?php
				$org="select * from organization order by DeID asc";
				$rs_org=mysql_query($org);
				while($ob_org=mysql_fetch_array($rs_org)){
					if($ob_org["DeID"] == $ob["DeID_main"]){
          				print "<option value=".$ob_org['DeID']." selected='selected'>- ".$ob_org['Fname']." -</option>";
					}else{
						print "<option value=".$ob_org['DeID'].">- ".$ob_org['Fname']." -</option>";
					}
				}
				?>
          	</select>
            <?php
			/*$sql_dep="select DeID,Fname from organization
			where DeID='$per_dept'";
			$rs_dep=mysql_query($sql_dep);
			$ob_dep=mysql_fetch_array($rs_dep);
			print "<input type='hidden' name='per_dept_main' value='".$ob_dep['DeID']."'>";
			#print "<input name='' type='text' readonly='true' value='".$ob['Fname']."' size='50'>";
			print $ob_dep['Fname'];*/
		?>          </td>
        </tr>
        <tr >
          <td class="formcolhd">ประเภทโครงการ:</td>
          <td class="tdpadding">
          	<select name="sec_id">
                    <?php
					$sec=show_data("section","sec_id");
					while($ob_sec=mysql_fetch_array($sec)){
						if($ob_sec["sec_id"]==$ob["sec_id"])
						{
							print "<option value=".$ob_sec[sec_id]." selected='selected'>- ".$ob_sec[section]." -</option>";
						}
						else
						{
							print "<option value=".$ob_sec[sec_id].">- ".$ob_sec[section]." -</option>";
						}
					}
					?>                 
                </select>                           </td>
        </tr>
        <tr >
          <td class="formcolhd">ลักษณะโครงการ :</td>
          <td background="compcode/picture/back_1.jpg" class="tdpadding">
          	<select name="typ_id">
                    <?php
					$typ=show_data("type_section","typ_id");
					while($ob_typ=mysql_fetch_array($typ)){
						if($ob_typ["typ_id"]==$ob["typ_id"])
						{
							print "<option value=".$ob_typ[typ_id]." selected='selected'>- ".$ob_typ[type_s]." -</option>";
						}
						else
						{
							print "<option value=".$ob_typ[typ_id].">- ".$ob_typ[type_s]." -</option>";
						}
					}
					?>                 
                </select>         </td>
        </tr>
        <tr>
             	<td class="formcolhd">ระยะเวลาการดำเนินงาน</td>
                <td class="tdpadding"><input type="text" name="startdate" id="startdate" size="10" readonly="true" value="<?=$ob["pro_start"];?>"> 
        <input type="reset" value="เลือกวัน" id='butstart' onclick="alert('click');" class="buttonn"> 
        <script type="text/javascript">
		var cal = new Zapatec.Calendar.setup({
		
		inputField     :    "startdate",     // id of the input field
		ifFormat       :    "%Y-%m-%d",     // format of the input field
		showsTime      :     false,
		button         :    "butstart",  // trigger button (well, IMG in our case)
		align          :    "Tl"           // alignment (defaults to "Bl")
		
		});
		
	</script>
                ถึง
                <input type="text" name="enddate" id="enddate" size="10" readonly="true" value="<?=$ob["pro_end"];?>"> 
        <input type="reset" value="เลือกวัน" id='butend' onclick="alert('click');" class="buttonn"> 
        <script type="text/javascript">
		var cal = new Zapatec.Calendar.setup({
		
		inputField     :    "enddate",     // id of the input field
		ifFormat       :    "%Y-%m-%d",     // format of the input field
		showsTime      :     false,
		button         :    "butend",  // trigger button (well, IMG in our case)
		align          :    "Tl"           // alignment (defaults to "Bl")
		
		});
		
	</script></td>
	</tr>
        <tr>
        	<td></td>
            <td class="tdpadding">
            <input name="number" type="hidden" value="1.1" />
            <input name="pro_id" type="hidden" value="<?=$_GET["pro_id"];?>" />
            <input class="button" type="submit" name="submit" value="บันทึกข้อมูล"></td>
        </tr>
  </table>
<!--</form> -->
</fieldset>
</form>