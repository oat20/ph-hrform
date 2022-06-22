<? #session_start(); 
/*include "include/config.php";
$conn = connect_db("db_news");
if(!$conn)
echo "เกิดความผิดพลาดไม่สามารถติดต่อกับฐานข้อมูลได้";*/
$typ_id=$_GET["typ_id"];
?>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8">

<link href="tool/css_text.css" rel="stylesheet" type="text/css">
</head>
<body bgcolor="#5c7094" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">

<?  

?>


<body>

    <script language="JavaScript" type="text/javascript">
function checkval(form) 
{
  		if (form.name_type.value == "") 
		{
       			alert("ใส่ชื่อกลุ่มข่าวภาษาไทย");
          		form.name_type.focus();
          		return false;
        }
		if (form.name_type_e.value == "") 
		{
       			alert("ใส่ชื่อกลุ่มข่าวภาษาอังกฤษ");
          		form.name_type_e.focus();
          		return false;
        }




  	
		//form.day.disabled = false;
		//form.month.disabled = false;
		//form.year.disabled = false;
}


</script>


<? //echo"$pagetop"; 
/*	if(check_admin($authuser))
	{
	
	if(empty($id_type))
	{
  header_admin("เพิ่มประเภทข่าว");
  */
  ?>
  <fieldset>
  	<legend>เพิ่ม / แก้ไข</legend>
    
	<?php if($typ_id == ""){ ?>
  
  <form  name="insert_type "action="<? echo $levelpath; ?>compcode/load_insertposition.php" method="post" onSubmit="return checkval(this)">
  <table border=0 cellpadding=0  cellspacing=0>
      <tr  >
        <td background="compcode/picture/bar07.jpg">&nbsp;</td>
        <td background="compcode/picture/bar07.jpg">&nbsp;</td>
      </tr>
      <tr  >
       <td class="formcoltitle" background="compcode/picture/bar07.jpg"><div align="right">ลักษณะโครงการ:<br/><span class="regRed_12">(จำเป็นต้องกรอก)</span></div></td>
       <td background="compcode/picture/bar07.jpg" class="formcol2"><input name="name_position_t" type="text "id="name_type" size="80" maxlength="100"></td>
      </tr>
      <tr  >
        <td background="compcode/picture/bar07.jpg" class="formcoltitle">รายละเอียดเพิ่มเติม:</td>
        <td style='text-align:left' background="compcode/picture/bar07.jpg" class="formcol2"><input name="name_position_t" type="text "id="name_type" size="80" maxlength="300"></td>
      </tr>
  

         <tr>
            <td colspan="2"  background="compcode/picture/bar07.jpg" class="tdpadding"><div align="center"> 
                <input class=button type="submit" name="Submit" value="บันทึก">
                <input class=button type="reset" name="submit2" value="เคลียร์">
              </div></td>
          </tr>
</table>
</form>

<?php 
	}else{ 
	$sqlTypesec="select * from type_section where typ_id='$typ_id'";
	$rsTypesec=mysql_query($sqlTypesec);
	$obTypesec=mysql_fetch_array($rsTypesec);
?>

<form  name="insert_type "action="<? echo $levelpath; ?>compcode/load_insertposition.php" method="post" onSubmit="return checkval(this)">
  <table border=0 cellpadding=0  cellspacing=0>
      <tr  >
        <td background="compcode/picture/bar07.jpg">&nbsp;</td>
        <td background="compcode/picture/bar07.jpg">&nbsp;</td>
      </tr>
      <tr  >
       <td class="formcoltitle" background="compcode/picture/bar07.jpg"><div align="right">ลักษณะโครงการ:<br/><span class="regRed_12">(จำเป็นต้องกรอก)</span></div></td>
       <td background="compcode/picture/bar07.jpg" class="formcol2"><input name="name_position_t" type="text "id="name_type" size="80" maxlength="100" value="<?php print $obTypesec["type_s"]; ?>"></td>
      </tr>
      <tr  >
        <td background="compcode/picture/bar07.jpg" class="formcoltitle">รายละเอียดเพิ่มเติม:</td>
        <td style='text-align:left' background="compcode/picture/bar07.jpg" class="formcol2"><input name="name_position_t" type="text "id="name_type" size="80" maxlength="200" value="<?php print $obTypesec["comment"]; ?>"></td>
      </tr>
  

         <tr>
            <td colspan="2"  background="compcode/picture/bar07.jpg" class="tdpadding"><div align="center"> 
                <input class=button type="submit" name="Submit" value="บันทึก">
                <input class=button type="reset" name="submit2" value="เคลียร์">
              </div></td>
          </tr>
</table>
</form>

<?php } ?>
</fieldset>    
</body>
</html>
