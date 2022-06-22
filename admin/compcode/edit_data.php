<? session_start(); 
include "include/connect.php";
require_once("include/function.php");
$conn = connect_db("db_news");
if(!$conn)
echo "เกิดความผิดพลาดไม่สามารถติดต่อกับฐานข้อมูลได้"
?><meta http-equiv="Content-Type" content="text/html; charset=windows-874" />
<link href="tool/css_text.css" rel="stylesheet" type="text/css">

<title>Untitled Document</title>
</head>

<body bgcolor="#5c7094" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">
 <?

 //echo"$pagetop"; 
/*	if(check_admin($authuser))
	{
	
  header_admin();  
  }

else
{
echo"    ";
header_adminsystem();
}*/

// *********************************************************************-->

if ($news==1)
{

		$photoDir = 'files/' ;
		$thumbDir = "files/";
		$dir = opendir($photoDir);

	$sql_exe1 = "SELECT * FROM detail_news  where  id_detail='$id_detail'";
		$exec_exe1= mysql_query($sql_exe1,$link);
		$rs_exe=mysql_fetch_array($exec_exe1,$link);
		$id_file=$rs_exe[id_detail];
		$key1 =$rs_exe[id_type];
		$doc_upload=$rs_exe[file_name];
		$name_Imgtop =$rs_exe[file_detail];

?>

<br>
<form action="load_editdata.php" method="post"
 enctype="multipart/form-data">
<table width="200" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td colspan="3">    <input type="hidden" name="MAX_FILE_SIZE" value="500000000">
<img src="picture/bar_editfile.jpg" width="400" height="18" /></td>
    </tr>
	 <tr >
          <td background="picture/bar07.jpg">&nbsp;</td>
          <td background="picture/bar07.jpg">&nbsp;</td>
    </tr>

  <tr>
    <td width="200" align="right" valign="top" background="picture/bar07.jpg" class="boldWhite_12" > 
      <? 		
	  //echo"$photoDir$name_Imgtop";
	  echo "<a href='$photoDir$name_Imgtop' target=_blank></a>$doc_upload<br>";
?></td>
    <td width="251" colspan="2" background="picture/bar07.jpg"> &nbsp;<input name="id_file" type="hidden" value="<? echo "$id_file"?>" /><input name="news" type="hidden" value="1" /><input type="file" name="file" id="file" /> </td>
    </tr>
 <tr >
          <td background="picture/bar07.jpg">&nbsp;</td>
          <td background="picture/bar07.jpg">&nbsp;</td>
    </tr>
            <tr>
            <td colspan="3"  background="picture/bar07.jpg"><div align="center"> 
                <input class=button type="submit" name="submit" value="ตกลง">
                <input class=button type="button" name="submit2" value="เคลียร์" onClick="location.href='edit_dataImg.php'">
              </div></td>
          </tr>
		    <tr> 
            <td colspan="3"><img src="picture/bar08.jpg" width="400"  height="6" /></td>
          </tr>
</table>
</form>

<?
}
?>
<? 
if ($news==2)
{

		$photoDir = 'photo/' ;
		$thumbDir = "thumb/";
		$dir = opendir($photoDir);

		$sql1 = "SELECT  * From  image  Where id_Img='$id_Img' ";
		$exec1 = mysql_query($sql1,$link);
		$ic = 1;
	 		While($result1 = mysql_fetch_array($exec1))
			 {
    				$name_Imgtop =$result1[name_Imgtop ];

			}

?>

<br>
<form action="load_editdata.php" method="post"
 enctype="multipart/form-data">
<table width="200" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td colspan="3">    <input type="hidden" name="MAX_FILE_SIZE" value="500000000">
<img src="picture/bar_editImg.jpg" width="400" height="18" /></td>
    </tr>
  <tr>
    <td width="149" background="picture/bar07.jpg">  &nbsp;  <div align="center">
      <? 		echo "<a href='$photoDir$name_Imgtop' target=_blank><img src='$thumbDir$name_Imgtop' border=0></a><br>";
?></div></td>
    <td width="251" colspan="2" background="picture/bar07.jpg"> <input name="id_Img" type="hidden" value="<? echo "$id_Img "?>" /><input name="news" type="hidden" value="2" /><input type="file" name="file" id="file" /> </td>
    </tr>
 <tr >
          <td background="picture/bar07.jpg">&nbsp;</td>
          <td background="picture/bar07.jpg">&nbsp;</td>
        </tr>
            <tr>
            <td colspan="3"  background="picture/bar07.jpg"><div align="center"> 
                <input class=button type="submit" name="submit" value="ตกลง">
                <input class=button type="reset" name="submit2" value="เคลียร์">
              </div></td>
          </tr>
		    <tr> 
            <td colspan="3"><img src="picture/bar08.jpg" width="400"  height="6" /></td>
          </tr>
</table>
</form>

<?
}
?>

</body>


</html>
