<? session_start(); 
/* include "include/connect.php";
require_once("include/function.php");*/
$conn = connect_db("db_news");
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
$sql_exe = "SELECT Max(id_detail) AS M FROM detail_news where cate_detail='2' ";
		$exec_exe = mysql_query( $sql_exe );
		$Max = mysql_result($exec_exe,"M");
		$id_news=$Max;
$sql_exe1="SELECT * FROM detail_news  where  id_detail='$id_detail'";
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

      <table width="650" border="0" align="center" cellpadding="0" cellspacing="0">
        <tr align="center" > <input type="hidden" name="MAX_FILE_SIZE" value="500000000">
    <input type="hidden" name="cate" value="1">
	<input type="hidden" name="id_detail" value="<?=$Max ?> ">
          <td colspan="3" class="boldWhite_16"><img src="compcode/picture/bar_insertnews.jpg" width="650" height="18" /></td>
        </tr>
        <tr align="center" >
          <td colspan="3" background="compcode/picture/bar07.jpg">&nbsp;</td>
        </tr>
        <tr  >
          <td width="" class="regWhite_13" background="compcode/picture/bar07.jpg"><div align="right">ชื่อหัวข้อข่าว:</div></td>
          <td background="compcode/picture/bar07.jpg">&nbsp;</td>
          <td background="compcode/picture/bar07.jpg"><input name="title_pic" type="text" class="inputform" id="title_pic" size="50" maxlength="100"  value="<?=$title_detail; ?>">          </td>
        </tr>
        <tr  >
          <td class="regWhite_13" background="compcode/picture/bar07.jpg"><div align="right">ชนิดของข่าว:</div></td>
          <td background="compcode/picture/bar07.jpg">&nbsp;</td>
          <td background="compcode/picture/bar07.jpg" align="left"><input type='hidden' name='key1' value='<? echo $key1;   ?>'>
              <input type="text" size=30  maxlength="30"disabled  name="name_type"  value="<? echo $name_type;   ?> ">
            <span class="boldFF6600_13">            * </span></td>
        </tr>
        <tr  >
          <td class="regWhite_13" background="compcode/picture/bar07.jpg"><div align="right">วันที่ลงข่าว::</div></td>
          <td background="compcode/picture/bar07.jpg">&nbsp;</td>
          <td background="compcode/picture/bar07.jpg"> <span class="regWhite_13">วันที่ :&nbsp;</span>&nbsp;
              <select name="select" size=1 disabled>
                <?php
						for($i=1; $i<=31; $i++) 
							{
									$a = sprintf("%02d",$i);
									$date_1=$rs_exe[date_detail];
									date_sub($date_1);
									if($a == ("$d"))
											echo("<OPTION VALUE=\"$a\" SELECTED>$a");
									else 
											echo("<OPTION VALUE=\"$a\">$a");
							}
				?>
              </select>
              <span class="smalltext">&nbsp;</span><span class="regWhite_13"> เดือน
              :&nbsp;</span><span class="smalltext">&nbsp;
              <select name="select" disabled>
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
&nbsp; </span><span class="regWhite_13">ปี(พ.ศ.): </span><span class="smalltext">
            <input type="text" size=4 maxlength=4 name="year2" value="<? echo date("Y")+543 ?>" disabled>
            <font color=red>&nbsp;</font></span><span class="boldFF6600_13">*</span></td>
        </tr>
        <tr  >
          <td class="regWhite_13" background="compcode/picture/bar07.jpg"><div align="right">ระยะเวลา:</div></td>
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
		 <tr >
          <td valign="top" class="regWhite_13" background="compcode/picture/bar07.jpg"><div align="right">รายละเอียดคำขึ้นต้นข่าว:</div></td>
          <td background="compcode/picture/bar07.jpg">&nbsp;</td>
          <td background="compcode/picture/bar07.jpg"><textarea name="detaile_pic1" rows="3"  id="detaile_pic1"    class="inputBoxlift "   style="width:300; height:50 cursor: default; text-align: left;"sonKeyUp="javascript:checklength(this,255);"><?=$rs_exe[descriptiondetail]; ?></textarea>      </td>
        </tr>
        <tr  >
          <td valign="top" class="regWhite_13" background="compcode/picture/bar07.jpg"><div align="right">รายละเอียดของข่าว:</div></td>
          <td background="compcode/picture/bar07.jpg">&nbsp;</td>
          <td background="compcode/picture/bar07.jpg"><textarea   name="detaile_pic" style="width:300; height:200" id="detaile_pic"  >
		  <? echo $rs_exe[description_detail]; ?>
		  
		  
		  
		  </textarea><script language="javascript1.2">
  generate_wysiwyg('detaile_pic');
</script>          </td>
        </tr>
				<tr >
          <td class="regWhite_13" background="compcode/picture/bar07.jpg" ><div align="right">ข่าวเกี่ยวกับบุคคลสำคัญ:</div></td>
          <td background="compcode/picture/bar07.jpg" ></td>
          <td background="compcode/picture/bar07.jpg" ><select name="id_person" id="id_person"  style='width:250' >
                 <option value="<? echo $id_person; ?>"><? echo $title ; ?><? echo $name_person ; ?></option>
                  <?  $sql_person="SELECT * FROM   person_most  ORDER BY id_person DESC  ";
						 $exec_person=mysql_query($sql_person);
	        			 while($rs_person=mysql_fetch_array($exec_person)){	
						     $id_person=$rs_person[id_person];
					    	 $title=$rs_person[title]; 
					    	 $name_person=$rs_person[name_person]; 
							?>
							<option value="<? echo $id_person; ?>"><? echo $title ; ?><? echo $name_person ; ?></option>
					   <? } 
				?>
            </select></td>
        </tr>
		<tr  >
		  <td valign="top" class="regWhite_13" background="compcode/picture/bar07.jpg"><div align="right">ไฟล์dowmload:</div></td>
		  <td background="compcode/picture/bar07.jpg">&nbsp;</td>
		  <td background="compcode/picture/bar07.jpg" class="regWhite_13">  <?
		  if(!empty($doc_upload))
		  {
		   echo "&nbsp;&nbsp;<span class=regWhite_13>$doc_upload</span>&nbsp;&nbsp;<br></span>";
		   }
		   else
		   {
		   echo"ไม่มีไฟล์  upload";
		   }
		   ?></td>
	    <tr  >
          <td valign="top" class="regWhite_13" background="compcode/picture/bar07.jpg"><div align="right">ภาพที่ upload</div></td>
          <td background="compcode/picture/bar07.jpg">&nbsp;</td><td background="compcode/picture/bar07.jpg"><table>
      	<? 
	$photoDir = 'compcode/photo/' ;
$thumbDir = 'compcode/thumb/';

	$dir = opendir($photoDir);
	$column =2;
	$sql1 = "SELECT  * From  image  Where id_detail='$id_detail' ";
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
			   		
			echo "<tr align=center   bgcolor=#5681ac  >";  
	
		echo "<td  background=compcode/picture/bar07.jpg>&nbsp;&nbsp;<a href='$photoDir$name_Imgtop' ><img src='$thumbDir$name_Imgtop' border=0 width=60 height=60></a><br></span></td>";
$ic++; 

			if ($ic  > $column )
			{  echo "</tr> \n";   $ic = 1;  }
		} 
}	
	else
	{
	echo"<td background=compcode/picture/bar07.jpg  class=regWhite_13> ไม่มีรูป  </td>";
	
	}		
			?>
			</table> </td>
        <tr  >
          <td background="compcode/picture/bar07.jpg">&nbsp;</td>
          <td background="compcode/picture/bar07.jpg">&nbsp;</td>
          <td background="compcode/picture/bar07.jpg">&nbsp;</td>
        </tr>
        <tr >
          <td background="compcode/picture/bar07.jpg">&nbsp;</td>
          <td background="compcode/picture/bar07.jpg">&nbsp;</td>
          <td background="compcode/picture/bar07.jpg">&nbsp;</td>
        </tr>
       <tr>
            <td colspan="3"  background="compcode/picture/bar07.jpg"><div align="center"> 
                <input class=button type="submit" name="submit" value="ตกลง">
            </div></td>
        </tr>
		    <tr> 
            <td colspan="3"><img src="compcode/picture/bar08.jpg" width="650"  height="6"></td>
          </tr>
  </table>
</form>
</body>
</html>
