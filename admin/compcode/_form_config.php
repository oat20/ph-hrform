<? #session_start();
#include"compcode/load_inserttype.php"; 
/*include "include/config.php";
$conn = connect_db("db_news");
if(!$conn)
echo "เกิดความผิดพลาดไม่สามารถติดต่อกับฐานข้อมูลได้";*/
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
  <form  name="insert_type "action="newscategory.php?mode=add" method="post" onsubmit="return checkval(this)">
  <fieldset>
  	<legend>เพิ่ม / แก้ไข</legend>
  <table border=0 cellpadding=3  cellspacing=0>
     
  <!--<tr >

       <td colspan="2"><div align="center" class="boldWhite_16"><img src="compcode/picture/bar_groupnews.jpg" width="280" height="18"></div></td>
    </tr> -->
     <!-- <tr  >
        <td width="120" background="compcode/picture/bar07.jpg">&nbsp;</td>
        <td width="160" background="compcode/picture/bar07.jpg">&nbsp;</td>
      </tr> -->
      <tr>
      	<td colspan="2"><?php echo $msg; ?></td>
      </tr>
      <tr  >
        <td class="formcoltitle" background="compcode/picture/bar07.jpg" align="right">ปีงบประมาณ:</td>
        <td background="compcode/picture/bar07.jpg" class="formcol2"><input name="" type="text" size="15" maxlength="4" /></td>
      </tr>
      <tr  >
       <td class="formcoltitle" background="compcode/picture/bar07.jpg" align="right">วันเริ่ม:</td>
       <td background="compcode/picture/bar07.jpg" class="formcol2"><input name="name_type" type="text "id="name_type" size="15" maxlength="50"> <input name="" type="button" value="เลือกวัน"></td>
       </tr>
       <tr>
       <td background="compcode/picture/bar07.jpg" class="formcoltitle"><div align="right">วันสิ้นสุด:</div></td>
       <td background="compcode/picture/bar07.jpg" class="formcol2"><input name="name_type" type="text "id="name_type" size="15" maxlength="50"> <input name="" type="button" value="เลือกวัน"></td>
      </tr>
         <tr>
            <td colspan="2"  background="compcode/picture/bar07.jpg" class="tdpadding"><div align="center"> 
                <input class=button type="submit" name="Submit" value="ตกลง">
                <input class=button type="reset" name="submit2" value="เคลียร์" onClick="location.href='newscategory.php'">
              </div></td>
          </tr>
		  
		    <!--<tr> 
            <td colspan="2"><img src="compcode/picture/bar08.jpg" width="280"  height="6"></td>
          </tr> -->
</table> 
<!--</fieldset> -->   
</form><? //echo"$pagebaseline";



?>
</body>
</html>
