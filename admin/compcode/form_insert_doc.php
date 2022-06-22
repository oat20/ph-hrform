<?php #session_start();
include "include/config.php";
include("include/connect_db.php");
#include "compcode/include/function.php";
#$conn = connect_db("db_news");
connect_db("utf8");
#if(!$conn)
#echo "เกิดความผิดพลาดไม่สามารถติดต่อกับฐานข้อมูลได้";?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<link href="tool/css_text.css" rel="stylesheet" type="text/css">
<body leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">

<!-- <link href="tool/css_text.css" rel="stylesheet" type="text/css">
 -->

<script language="JavaScript" type="text/javascript" src="wysiwyg.js">
</script>
<FORM enctype="multipart/form-data" action="load_insert_doc_form.php" method="post">
      <table border="0" align="center" cellpadding="0" cellspacing="1" background="compcode/picture/back_1.jpg" width="100%">
        <input type="hidden" name="MAX_FILE_SIZE" value="500000000">
    <input type="hidden" name="cate" value="2">
    
        <tr  >
          <td height="29"   colspan="2" background="compcode/picture/back_1.jpg" class="smalltext"><div align="center"></div></td>
        </tr>
        <tr  >
          <td class="formcoltitle"><div align="right">ชื่อโครงการ:<br/><span class="regRed_12">(จำเป็นต้องกรอก)</span></div></td>
          <td><input name="title_pic" type="text" class="inputform" id="title_news" size="100%" maxlength="100"></td>
        </tr>
        <tr  >
          <td class="formcoltitle" ><div align="right">ส่วนงานรับผิดชอบ:<br/><span class="regRed_12">(จำเป็นต้องกรอก)</span></div>          </td>
          <td  align="left" ><select name="key1" id="select3">
                  <option value="">- - - เลือกรายการ- - -
                  <?  
				#$conn = connect_db("system_org");
				#if(!$conn)
				#echo "เกิดความผิดพลาดไม่สามารถติดต่อกับฐานข้อมูลได้";

				
 		
				  	$sql= "SELECT DeID,Fname FROM organization
					order by DeID asc";
					$exec= mysql_query($sql);
	  
	        			 While ($rs=mysql_fetch_array($exec) )
				      	{	
						     $key1=$rs["DeID"];
					    	$title_first=$rs["Fname"];
							
					   	echo "<option value=\"$key1\">- $title_first</option>\n";
					   } 
					 
				?>
              </select>            </td>
        </tr>
        <tr >
          <td class="formcoltitle" valign="top">ชื่อผู้รับผิดชอบ:</td>
          <td><textarea cols="100%" rows="4" wrap="virtual"></textarea></td>
        </tr>
        <tr >
          <td class="formcoltitle"><div align="right"  >ประเภทโครงการ:</div>          </td>
          <td>
              <select name="day">
              </select>              </td>
        </tr>
		
        
        <tr >
          <td valign="top" class="formcoltitle"  ><div align="right">ลักษณะโครงการ:</div>          </td>
          <td background="compcode/picture/back_1.jpg" >
          	<select>
            </select>          </td>
        </tr>
        <tr >
          <td colspan="2" class="formcolhd">ประเด็นยุทธศาสตร์</td>
        </tr>
        <tr >
          <td class="formcoltitle"  ><div align="right" >ยุทธศาสตร์:</div>          </td>
          <td>
          	<select>
            </select>          </td>
        </tr>
             <tr >
               <td class="formcoltitle">ยุทธศาสตร์ย่อย:</td>
               <td  >
               	<select>
                </select>               </td>
             </tr>
             <tr >
               <td class="formcoltitle">เป้าประสงค์:</td>
               <td  >
               	<select>
                </select>               </td>
             </tr>
             <tr >
               <td colspan="2" class="formcolhd">ความสอดคล้องกับนโยบายรัฐบาล</td>
             </tr>
             <tr >
               <td class="formcoltitle">นโยบาลรัฐบาล:</td>
               <td><select>
                </select></td>
             </tr>
             <tr >
               <td class="formcoltitle">ประเด็นนโยบาล:</td>
               <td><select>
                </select></td>
             </tr>
             <tr >
               <td class="formcoltitle">ข้อย่อย:</td>
               <td><select>
                </select></td>
             </tr>
             <tr >
               <td colspan="2" class="formcolhd">ความสำคัญ หลักการและเหตุผลของโครงการ</td>
             </tr>
             <tr >
               <td colspan="2"><textarea cols="100%" rows="6" wrap="virtual"></textarea></td>
             </tr>
             <tr >
               <td colspan="2" class="formcolhd">วัตถุประสงค์</td>
             </tr>
             <tr >
               <td colspan="2"><textarea cols="100%" rows="6" wrap="virtual"></textarea></td>
             </tr>
             <tr>
               <td colspan="2" class="formcolhd">กลุ่มเป้าหมายและขอบเขตการดำเนินการ</td>
             </tr>
             <tr>
               <td class="formcoltitle">กลุ่มผู้รับบริการเป้าหมาย:</td>
               <td><label>
                 <input name="textfield" type="text" id="textfield" size="100%">
               </label></td>
             </tr>
             <tr>
               <td class="formcoltitle">พื้นที่/สถานที่เป้าหมาย:</td>
               <td><input name="textfield2" type="text" id="textfield2" size="100%"></td>
             </tr>
             <tr>
             	<td colspan="2" class="formcolhd">ระยะเวลาการดำเนินงาน</td>
             </tr>
             <tr>
             	<td class="formcoltitle">วันที่เริ่มต้น:</td>
                <td><input name="" type="text" size="15" readonly><input name="" type="button" value="&#3648;&#3621;&#3639;&#3629;&#3585;&#3623;&#3633;&#3609;&#3607;&#3637;&#3656;"></td>
             </tr>
             <tr>
             	<td class="formcoltitle">วันที่สิ้นสุดโครงการ:</td>
                <td><input name="" type="text" size="15" readonly><input name="" type="button" value="&#3648;&#3621;&#3639;&#3629;&#3585;&#3623;&#3633;&#3609;&#3607;&#3637;&#3656;"></td>
             </tr>
             <tr >
               <td colspan="2" class="formcolhd">ขั้นตอนการและกระบวนการการดำเนินโครงการ</td>
             </tr>
             <tr>
               <td colspan="2"><textarea cols="100%" rows="6" wrap="virtual"></textarea></td>
             </tr>
              <tr >
               <td colspan="2" class="formcolhd">ผลการดำเนินงานที่ผ่านมา</td>
             </tr>
             <tr>
               <td colspan="2"><textarea cols="100%" rows="6" wrap="virtual"></textarea></td>
             </tr>
             <tr>
             	<td class="formcoltitle">ประเภทกิจกรรม</td>
                <td><select></select></td>
             </tr>
             <tr >
            <td colspan="2" align="center"> 
                <input class="button" type="submit" name="submit" value="ตกลง">
                <input class="button" type="reset" name="submit2" value="เคลียร์">              </td>
          </tr>		    <tr   height="5"> 
            <td colspan="3" ></td>
          </tr>
  </table>
</form>

<? //echo"$table_down"; ?>
<? 





?>

</body>
</html>
