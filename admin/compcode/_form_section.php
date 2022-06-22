<? #session_start();
#include"compcode/load_inserttype.php"; 
/*include "include/config.php";
$conn = connect_db("db_news");
if(!$conn)
echo "เกิดความผิดพลาดไม่สามารถติดต่อกับฐานข้อมูลได้";*/
$id_type=$_GET["id_type"];
?>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8">

<link href="tool/css_text.css" rel="stylesheet" type="text/css">
<script src="inc/ajax_framework.js"></script>
<script>
function add1() {
	var URL = "admin/compcode/load_inserttype.php";
	var data = getFormData("formadd");
	ajaxLoad("post", URL, data, "display");
}
</script>
</head>
<body bgcolor="#5c7094" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">

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
    <?php
	if($id_type == ""){
	?>
  <form  name="insert_type" method="post" onsubmit="return checkval(this)" id="formadd">
  <table border=0 cellpadding=3  cellspacing=0>
     
  <!--<tr >

       <td colspan="2"><div align="center" class="boldWhite_16"><img src="compcode/picture/bar_groupnews.jpg" width="280" height="18"></div></td>
    </tr> -->
     <!-- <tr  >
        <td width="120" background="compcode/picture/bar07.jpg">&nbsp;</td>
        <td width="160" background="compcode/picture/bar07.jpg">&nbsp;</td>
      </tr> -->
      <tr>
      	<td colspan="4"><div id="diaplay"><?php echo $msg; ?></div></td>
      </tr>
      <tr  >
       <td class="formcoltitle" background="compcode/picture/bar07.jpg" align="right">ประเภทโครงการ:<br/><span class="regRed_12">(จำเป็นต้องกรอก)</span></td>
       <td background="compcode/picture/bar07.jpg" class="formcol2"><input name="name_type" type="text "id="name_type" size="80" maxlength="100"></td>
      </tr>
      <tr  >
       <td class="formcoltitle" background="compcode/picture/bar07.jpg" align="right">รายละเอียดเพิ่มเติม:</td>
       <td background="compcode/picture/bar07.jpg" class="formcol2"><input name="name_type_e" type="text "id="name_type_e" size="80" maxlength="200"></td>
      </tr>
         <tr>
            <td colspan="2"  background="compcode/picture/bar07.jpg" class="tdpadding"><div align="center"> 
                <input class=button type="button" name="Submit" value="บันทึก" onClick="add1()">
                <input class=button type="reset" name="submit2" value="เคลียร์" onClick="location.href='section.php'">
              </div></td>
          </tr>
		  
		    <!--<tr> 
            <td colspan="2"><img src="compcode/picture/bar08.jpg" width="280"  height="6"></td>
          </tr> -->
</table> 
   </form>
   
   <?php
   }else{
   		$selectSection="select *from section where sec_id='$id_type'";
		$rsSection=mysql_query($selectSection);
		$obSection=mysql_fetch_array($rsSection);
   ?>
   
   <form  name="insert_type "action="#" method="post" onsubmit="return checkval(this)">
  <table border=0 cellpadding=3  cellspacing=0>
     
  <!--<tr >

       <td colspan="2"><div align="center" class="boldWhite_16"><img src="compcode/picture/bar_groupnews.jpg" width="280" height="18"></div></td>
    </tr> -->
     <!-- <tr  >
        <td width="120" background="compcode/picture/bar07.jpg">&nbsp;</td>
        <td width="160" background="compcode/picture/bar07.jpg">&nbsp;</td>
      </tr> -->
      <tr>
      	<td colspan="4"><?php echo $msg; ?></td>
      </tr>
      <tr  >
       <td class="formcoltitle" background="compcode/picture/bar07.jpg" align="right">ประเภทโครงการ:<br/><span class="regRed_12">(จำเป็นต้องกรอก)</span></td>
       <td background="compcode/picture/bar07.jpg" class="formcol2"><input name="name_type" type="text "id="name_type" size="80" maxlength="100" value="<?php print $obSection["section"]; ?>"></td>
      </tr>
      <tr  >
       <td class="formcoltitle" background="compcode/picture/bar07.jpg" align="right">รายละเอียดเพิ่มเติม:</td>
       <td background="compcode/picture/bar07.jpg" class="formcol2"><input name="name_type_e" type="text "id="name_type" size="80" maxlength="200" value="<?php print $obSection["comment"]; ?>"></td>
      </tr>
         <tr>
            <td colspan="2"  background="compcode/picture/bar07.jpg" class="tdpadding"><div align="center"> 
                <input class=button type="submit" name="Submit" value="แก้ไขรายการ">
                <input class=button type="reset" name="submit2" value="เคลียร์" onClick="location.href='section.php'">
              </div></td>
          </tr>
		  
		    <!--<tr> 
            <td colspan="2"><img src="compcode/picture/bar08.jpg" width="280"  height="6"></td>
          </tr> -->
</table> 
   </form>
   <?php
   }
   ?>
</fieldset>
</body>
</html>
