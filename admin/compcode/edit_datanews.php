<? session_start(); 
/* include "include/connect.php";
require_once("include/function.php");*/
$conn = connect_db("ph_web");
if(!$conn)
echo "เกิดความผิดพลาดไม่สามารถติดต่อกับฐานข้อมูลได้";

?>

<link href="tool/css_text.css" rel="stylesheet" type="text/css">
<meta http-equiv="Content-Type" content="text/html; charset=windows-874">

<script language="JavaScript" type="text/javascript" src="wysiwyg.js">
</script>
<body bgcolor="#5c7094" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">





<? 
// *********************************************************************-->
$fileDir='compcode/files/';
$sql_exe = "SELECT Max(id_detail) AS M FROM news where cate_detail='2' ";
		$exec_exe = mysql_query( $sql_exe );
		$Max = mysql_result($exec_exe,"M");
		$id_news=$Max;
$sql_exe1="SELECT * FROM news  where  status_news='$authuser' and id_detail='$Max'";
		$exec_exe1= mysql_query( $sql_exe1);
		//echo"$exec_exe1= mysql_query( $sql_exe1);";
		$rs_exe=mysql_fetch_array($exec_exe1);
		$key1 =$rs_exe[id_type  ];
		$doc_upload=$rs_exe[file_name  ];
		$file_detail =$rs_exe[file_detail];
		$title_detail=$rs_exe[title_detail];
		$id_person=$rs_exe[id_person];
		
		  $sql="select  *  from person_most  where  id_person='$id_person'";			
		  $exec=mysql_query($sql);
//	echo"	$exec1=mysql_query($sql);";
		  $rs1= mysql_fetch_array($exec);
		  $id_person=$rs1[id_person];
 		 $title=$rs1[title];
 		$name_person=$rs1[name_person];
//echo"$exec_exe1= mysql_query( $sql_exe1,$link );";


$sql="select  *  from  type_news  where  id_type='$key1'";  
	   $exec=mysql_query($sql);
	   	while($rs1= mysql_fetch_array($exec))
					{
		 $key1=$rs1[id_type];		
	     $name_type=$rs1[name_type];
		 }
 ?>
<? // echo"$table"; ?>
<FORM enctype="multipart/form-data" action="compcode/load_edit_news_form.php" method=post  onsubmit="return checkval(this)">

      <table border="0" cellpadding="3" cellspacing="0">
        <tr align="center" > <input type="hidden" name="MAX_FILE_SIZE" value="500000000">
    <input type="hidden" name="cate" value="1">
	<input type="hidden" name="id_detail" value="<?=$Max ?> ">
          <td colspan="3" class="boldWhite_16"><img src="compcode/picture/bar_insertnews.jpg" width="650" height="18" /></td>
        </tr>
        <tr align="center" >
          <td colspan="3" background="compcode/picture/bar07.jpg">&nbsp;</td>
        </tr>
        <tr  >
          <td width="" class="boldWhite_14" background="compcode/picture/bar07.jpg">หัวข้อข่าว:</td>
          <td background="compcode/picture/bar07.jpg">&nbsp;</td>
          <td background="compcode/picture/bar07.jpg"><input name="title_pic" type="text" class="inputform" id="title_pic" size="50" maxlength="100"  value="<?=$title_detail; ?>">          </td>
        </tr>
        <tr  >
          <td class="boldWhite_13" background="compcode/picture/bar07.jpg">ประเภทข่าว:</td>
          <td background="compcode/picture/bar07.jpg">&nbsp;</td>
          <td background="compcode/picture/bar07.jpg" align="left"><input type='hidden' name='key1' value='<? echo $key1;   ?>'>
              <input type="text" size=30  maxlength="30"disabled  name="name_type"  value="<? echo $name_type;   ?> ">
            <span class="boldFF6600_13">            * </span></td>
        </tr>
        
        <tr  >
          <td class="boldWhite_13" background="compcode/picture/bar07.jpg">ระยะเวลา:</td>
          <td background="compcode/picture/bar07.jpg">&nbsp;</td>
          <td background="compcode/picture/bar07.jpg"><select name="d_1" size=1 >
                <?php
							for($i=1; $i<=31; $i++) 
							{
									$a = sprintf("%02d",$i);
									$date_1=$rs_exe[date_1];
									date_sub($date_1);
									if($a == ("$d"))
											echo("<OPTION VALUE=\"$a\" SELECTED>$a");
									else 
											echo("<OPTION VALUE=\"$a\">$a");
							}
				?>
          </select>
          
              <select name="m_1" >
                <?php
								$m_array = array("ม.ค.","ก.พ.","มี.ค.","เม.ย.","พ.ค.","มิ.ย.","ก.ค.","ส.ค.","ก.ย.","ต.ค.","พ.ย.","ธ.ค.");
								for($i=0; $i<12; $i++) 
								{
								   $j=$i+1;
									$j = sprintf("%02d",$j);
								   date_sub($date_1);
								   if($j == ("$m")) 
									  echo("<OPTION VALUE=\"$j\" SELECTED>$m_array[$i]");
								   else
									  echo("<OPTION VALUE=\"$j\">$m_array[$i]");
								} 
						?>
              </select>
           
                            <select name="y_1" >
                <?php
									$y_array = array("2549","2550","2551","2552","2553");
								for($i=0; $i<5; $i++) 
								{
								
								   $j=$i+2006;
									$j = sprintf("%02d",$j);
									date_sub($date_1);
								   if($j == ("$y")) 
								   {
								   
									  echo("<OPTION VALUE=\"$j\" SELECTED>$y_array[$i]");
									  }
								   else
									  echo("<OPTION VALUE=\"$j\">$y_array[$i]");
								} 
						?>
              </select>
                            <span class="boldWhite_13">ถึง                            </span>
              <select name="d_2" size=1 >
                <?php
						for($i=1; $i<=31; $i++) 
							{
									$a = sprintf("%02d",$i);
									$date_1=$rs_exe[date_2];
									date_sub($date_1);
									if($a == ("$d"))
											echo("<OPTION VALUE=\"$a\" SELECTED>$a");
									else 
											echo("<OPTION VALUE=\"$a\">$a");
							}
				?>
              </select>
              <select name="m_2" >
                <?php
								$m_array = array("ม.ค.","ก.พ.","มี.ค.","เม.ย.","พ.ค.","มิ.ย.","ก.ค.","ส.ค.","ก.ย.","ต.ค.","พ.ย.","ธ.ค.");
								for($i=0; $i<12; $i++) 
								{
								   $j=$i+1;
									$j = sprintf("%02d",$j);
								   date_sub($date_1);
								   if($j == ("$m")) 
									  echo("<OPTION VALUE=\"$j\" SELECTED>$m_array[$i]");
								   else
									  echo("<OPTION VALUE=\"$j\">$m_array[$i]");
								} 
						?>
              </select>
                          <select name="y_2" >
                <?php
								$y_array = array("2549","2550","2551","2552","2553");
								for($i=0; $i<5; $i++) 
								{
								
								   $j=$i+2006;
									$j = sprintf("%02d",$j);
									date_sub($date_1);
								   if($j == ("$y")) 
								   {
								   
									  echo("<OPTION VALUE=\"$j\" SELECTED>$y_array[$i]");
									  }
								   else
									  echo("<OPTION VALUE=\"$j\">$y_array[$i]");
								} 
						?>
              </select>
            <span class="boldFF6600_13">* </span></td>
        </tr>
		 
        <tr  >
          <td valign="top" class="boldWhite_13" background="compcode/picture/bar07.jpg">รายละเอียดของข่าว:</td>
          <td background="compcode/picture/bar07.jpg">&nbsp;</td>
          <td background="compcode/picture/bar07.jpg"><textarea   name="detaile_pic" style="width:300; height:200" id="detaile_pic"  >
		  <? echo $rs_exe[description_detail]; ?>
		  
		  
		  
		  </textarea><script language="javascript1.2">
  generate_wysiwyg('detaile_pic');
</script>          </td>
        </tr>
				
		<tr  >
		  <td valign="top" class="boldWhite_13" background="compcode/picture/bar07.jpg">ไฟล์ download:</td>
		  <td background="compcode/picture/bar07.jpg">&nbsp;</td>
		  <td background="compcode/picture/bar07.jpg" class="regWhite_13">  <?
		  if(!empty($doc_upload))
		  {
		  ?>
		   &nbsp;&nbsp;<span class=regWhite_13><?php print $doc_upload; ?></span>&nbsp;&nbsp;<br></span>
           <?php
		   }
		   else
		   {
		   echo"ไม่มีไฟล์  upload";
		   }
		   ?>
		    <br/><input name="file" type="file" id="file" size="50" /><br/><span class="regWhite_12">(.doc, .docx, .xls, .xlsx, .ppt, .pptx, .pps, .ppsx, .pdf, .zip, .rar ขนาดไม่เกิน 2 MB)</span></td>
	    <tr  >
          <td valign="top" class="boldWhite_13" background="compcode/picture/bar07.jpg">ภาพที่ upload</td>
          <td background="compcode/picture/bar07.jpg">&nbsp;</td><td background="compcode/picture/bar07.jpg"><table>
      	<? 
	$photoDir = 'compcode/photo/' ;
$thumbDir = 'compcode/thumb/';

	$dir = opendir($photoDir);
	$column =2;
	$sql1 = "SELECT  * From  image  Where id_detail='$id_news' ";
	$exec1= mysql_query($sql1);
	$exec2= mysql_query($sql1);
	$ic = 1;
	$result2 = mysql_fetch_array($exec1);
	$id_Img1 =$result2[id_Img];
	if(!empty($id_Img1))
	{

	 				While($rs3=mysql_fetch_array($exec2))
					 {			
								$id_Img =$rs3[id_Img];
								$name_Imgtop=$rs3[name_Imgtop];
		
			if ($ic  == 1) 
			   		?>
			<tr align=center   bgcolor=#5681ac>
	<td  background=compcode/picture/bar07.jpg>&nbsp;&nbsp;<a href='<?php print $photoDir.$name_Imgtop; ?>'><img src='<?php print $thumbDir.$name_Imgtop; ?>' border=0 width=60 height=60></a><br></span></td>
        <?php
$ic++; 

			if ($ic  > $column )
			{  
			?>
            </tr>
            <?php
            $ic = 1;  }
		} 
}	
	else
	{
	?>
	<td background=compcode/picture/bar07.jpg  class=regWhite_13> ไม่มีรูป  </td>
	<?php
	}		
			?>
			</table> 
            <input name="photo" type="file" id="photo" size="50"><br><span class="regWhite_12">(.jpg, .gif, .png ขนาดไม่เกิน 5 MB)</span></td>
        <tr  >
          <td background="compcode/picture/bar07.jpg" class="boldWhite_14">เขียนเมื่อ</td>
          <td background="compcode/picture/bar07.jpg">&nbsp;</td>
          <td background="compcode/picture/bar07.jpg" class="regWhite_14"><?php echo $rs_exe["date_detail"]; ?> <?php echo $rs_exe["time_detail"]; ?> โดย <?php echo $rs_exe["user_login"]; ?></td>
        </tr>
        <tr>
          <td  background="compcode/picture/bar07.jpg" class="boldWhite_14">แก้ไขเมื่อ</td>
          <td  background="compcode/picture/bar07.jpg">&nbsp;</td>
          <td  background="compcode/picture/bar07.jpg" class="regWhite_14"><?php echo $rs_exe["modifield"]; ?> โดย <?php echo $rs_exe["modifield_by"]; ?></td>
        </tr>
        <tr>
            <td colspan="3"  background="compcode/picture/bar07.jpg"> 
                <input class=buttonn type="submit" name="submit" value="แก้ไข">
                <input class=buttonn type="button" name="submit" value="ยกเลิก" onClick="location.href='news.php'">            </td>
        </tr>
  </table>
</form>
</body>
</html>
