<? session_start(); 
/*include "include/config.php";
$conn = connect_db("db_news");
if(!$conn)
echo "เกิดความผิดพลาดไม่สามารถติดต่อกับฐานข้อมูลได้";*/
?>

<meta http-equiv="Content-Type" content="text/html; charset=tis-620">

<!-- <link href="tool/css_text.css" rel="stylesheet" type="text/css">
 --></head>
<body bgcolor="#5c7094" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">

<?  

?>


<body>


<? //echo"$pagetop"; 
	/*if(check_admin($authuser))
	{
	
	if(empty($id_type))
	{
  header_admin("เพิ่มประเภทข่าว");
  */


		$con=connect_db("db_news");
		if(!$con)
					return "ไม่สามารถติดต่อกับฐานข้อมูลได้ กรุณาพยายามอีกครั้ง";
		$sql="select  *  from position_news  where  id_position='$id_position'";			
		$exec=mysql_query($sql);
		//echo"	$exec1=mysql_query($sql);";
		$rs1= mysql_fetch_array($exec);
 		 $id_position=$rs1[id_position];
		 $name_position_t=$rs1[name_position_t];
 		$name_position_e=$rs1[name_position_e];
	
	//	$name_type=mysql_result($exec,name_type);
		
//header_admin("เพิ่มประเภทข่าว");?>
<br>
  <form  name="insert_type "action="<? echo $levelpath; ?>compcode/load_insertposition.php" method="post">
  <table width="400" border=0 align="center" cellpadding=0 cellspacing=0>
     <input type='hidden' name='id_position' value='<? echo"$id_position"; ?>'>

     <tr>
       <td colspan="4"background="compcode/picture/bar_menu.jpg"  width="400"><div align="center"><span class="boldWhite_13">แก้ไขตำแหน่ง&nbsp;</span></div></td>
</tr>
     <tr >

       <td colspan="2" background="compcode/picture/bar07.jpg">&nbsp;</td>
    </tr>
      <tr  >
       <td width="200" background="compcode/picture/bar07.jpg"><div align="right"><span class="regWhite_13">ใส่ชื่อตำแหน่งที่แก้ไขภาษาไทย: </span></div></td>
       <td width="" background="compcode/picture/bar07.jpg"><input type='hidden' name='id_type' value='<? echo $id_type;   ?>'>
        <input type="text" size=40 maxlength="100"name="name_position_t"  value="<? echo $name_position_t;   ?>"></td>
      </tr>
	  <tr  >
       <td width="200" background="compcode/picture/bar07.jpg"><div align="right"><span class="regWhite_13">ใส่ชื่อตำแหน่งแก้ไขภาษาอังกฤษ: </span></div></td>
       <td width="" background="compcode/picture/bar07.jpg"><input type='hidden' name='id_type' value='<? echo $id_type;   ?>'>
        <input type="text" size=40  maxlength="100"name="name_position_e"  value="<? echo $name_position_e;   ?>"></td>
      </tr>
      <tr  >
        <td colspan="2" background="compcode/picture/bar07.jpg">&nbsp;</td>
      </tr>
       <tr>
            <td colspan="2"  background="compcode/picture/bar07.jpg"><div align="center"> 
                <input class=button type="submit" name="submit" value="ตกลง">
                <input class=button type="reset" name="submit2" value="เคลียร์">
              </div></td>
          </tr>
		  
		    <tr> 
            <td colspan="2"><img src="compcode/picture/bar08.jpg" width="400"  height="6"></td>
          </tr>
    
      </tr>
</table>    
  </form><? //echo"$pagebaseline";

/*}


}

else
{
echo"    ";

}*/



?>
