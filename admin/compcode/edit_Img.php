<? session_start(); 
include "include/config.php";
$conn = connect_db("db_news");
if(!$conn)
echo "�Դ�����Դ��Ҵ�������ö�Դ��͡Ѻ�ҹ��������"
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





if ($Img==1)
{

		$photoDir = 'photo/' ;
		$thumbDir = "thumb/";
		$dir = opendir($photoDir);

	$sql_exe1 = "SELECT * FROM detail_news  where  id_detail='$id_detail'";
		$exec_exe1= mysql_query($sql_exe1);
		$rs_exe=mysql_fetch_array($exec_exe1);
		$id_detail=$rs_exe[id_detail];
		$key1=$rs_exe[id_type  ];
		$doc_upload=$rs_exe[file_name];
		$name_Imgtop=$rs_exe[file_detail];
		//echo"$id_detail";

?>

<br>
<form action="load_editImg.php" method="post"
 enctype="multipart/form-data">
<table width="200" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td colspan="3">    <input type="hidden" name="MAX_FILE_SIZE" value="500000000">
<img src="picture/bar_editImg.jpg" width="400" height="18" /></td>
    </tr>
	 <tr >
          <td background="picture/bar07.jpg">&nbsp;</td>
          <td background="picture/bar07.jpg">&nbsp;</td>
    </tr>

  <tr>
    <td width="149" background="picture/bar07.jpg">  <div align="right">
          <? 		
	  //echo"$photoDir$name_Imgtop";
	if($name_Imgtop!='����բ�����ŧ')
	{
	  echo "<a href='$photoDir$name_Imgtop'> <img src='$thumbDir$name_Imgtop' border=0></a><br>";
	}
	else
	{
	  echo "<p class=boldWhite_13>�����ٻ�Ҿ</p>";
	}
?>
    </div></td>
    <td width="251" colspan="2" valign="bottom" background="picture/bar07.jpg"> <input name="id_detail" type="hidden" value="<? echo "$id_detail"?>" /><input name="Img" type="hidden" value="1" /><input type="file" name="file" id="file" /> </td>
    </tr>
 <tr >
          <td background="picture/bar07.jpg">&nbsp;</td>
          <td background="picture/bar07.jpg">&nbsp;</td>
    </tr>
            <tr>
            <td colspan="3"  background="picture/bar07.jpg"><div align="center"> 
                <input class=button type="submit" name="submit" value="��ŧ">
                <input class=button type="button" name="submit2" value="������" onClick="location.href='edit_dataImg.php'">
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

if ($Img==2)
{

		$photoDir = 'photo/' ;
		$thumbDir = "thumb/";
		$dir = opendir($photoDir);

		$sql1 = "SELECT  * From  image  Where id_Img='$id_Img' ";
		$exec1 = mysql_query($sql1);
		$ic = 1;
	 		While($result1 = mysql_fetch_array($exec1))
			 {
    				$name_Imgtop =$result1[name_Imgtop ];

			}

?>

<br>
<form action="load_editImg.php" method="post"
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
    <td width="251" colspan="2" background="picture/bar07.jpg"> <input name="id_Img" type="hidden" value="<? echo "$id_Img "?>" /><input name="Img" type="hidden" value="5" /><input type="file" name="file" id="file" /> </td>
    </tr>
 <tr >
          <td background="picture/bar07.jpg">&nbsp;</td>
          <td background="picture/bar07.jpg">&nbsp;</td>
        </tr>
            <tr>
            <td colspan="3"  background="picture/bar07.jpg"><div align="center"> 
                <input class=button type="submit" name="submit" value="��ŧ">
                <input class=button type="reset" name="submit2" value="������">
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

if ($Img==4)
{

		

?>

<br>
<form action="load_editImg.php" method="post"
 enctype="multipart/form-data">
<table width="400" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td colspan="3">    <input type="hidden" name="MAX_FILE_SIZE" value="500000000">
<img src="picture/bar_editImg.jpg" width="400" height="18" /></td>
    </tr>
   <?
	 $id_num=$id_detail;
 echo" $id_num=$id_detail;";
 $nfile =10;		
			for ($i = 1 ; $i <= $nfile ; $i++) {
						echo"  <tr  bgcolor=#5681ac>   <td class=regWhite_13   background=picture/bar07.jpg width=200 >" ;
						echo "<div align=right>�ٻ�Ҿ��ͧ��� upload :</div>\n</td>";
						//echo"<td  background=picture/bar07.jpg>&nbsp;</td>";
						echo "      <td   background=picture/bar07.jpg >			<input name=member  type=hidden value=$id_detail><input name='userfile[]' type=file><br> \n </td></tr>";
			}?>
 <tr >
          <td background="picture/bar07.jpg">&nbsp;</td>
          <td background="picture/bar07.jpg">&nbsp;</td>
        </tr>
            <tr>
            <td colspan="3"  background="picture/bar07.jpg"><div align="center"> 
			<input name="Img" type="hidden" value="4" />
                <input class=button type="submit" name="submit" value="��ŧ">
                <input class=button type="reset" name="submit2" value="������">
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
