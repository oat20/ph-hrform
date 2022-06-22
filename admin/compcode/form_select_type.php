<? session_start(); 
?>
<meta http-equiv="Content-Type" content="text/html; charset=tis-620">
<!-- <link href="tool/css_text.css" rel="stylesheet" type="text/css">
 -->
<script language="JavaScript" type="text/javascript">
function checkval(form) 
{
  		
  
  		if (form.key1.value == "") 
		{
       			alert("กรุณาเลือกรายการ");
          		form.key1.focus();
          		return false;
        }
		
		
		
}


</script><? 

 ?> 
	<br>
    <FORM method="post" action="default,page_ch.php" ENCTYPE="multipart/form-data" onSubmit="return checkval(this)"  >
          <table width="346" border="0" align="center" cellpadding="0" cellspacing="0" >
           
            <tr >
              <td colspan="2"><img src="compcode/picture/bar_news.jpg" width="346" height="18"></td>
            </tr>
            <tr background="compcode/picture/bar07.jpg">
              <td width="106" height="28" background="compcode/picture/bar07.jpg" ><div align="right" ><span class="boldWhite_13"><font size="2" face="MS Sans Serif">เลือกประเภทข่าว</font></span><font size="2" face="MS Sans Serif"><span class="regWhite_13">:</span></font></div>              </td>
              <td width="232"  background="compcode/picture/bar07.jpg">
                <select name="key1" id="select3">
                  <option value="">- - - เลือกรายการ- - -
                  <?  
				$conn = connect_db("db_news");
				if(!$conn)
				echo "เกิดความผิดพลาดไม่สามารถติดต่อกับฐานข้อมูลได้";

					$sql_user= "SELECT * FROM   user where  username='$authuser'";
					$result_user= mysql_query($sql_user);
					$rs_user=mysql_fetch_array($result_user);
					$id_user=$rs_user[id_user];	 		
					
					$sql_fixuser= "SELECT * FROM   fixtypenews_admin where  id_user='$id_user'  and  fix_status='1'";
					$result_fixuser= mysql_query($sql_fixuser);
					While ($rs_fixuser=mysql_fetch_array($result_fixuser) )
				      	{	
									$id_type=$rs_fixuser[id_type];
									
									$sql_type= "SELECT * FROM   type_news where  id_type='$id_type' ";
									$exec_type= mysql_query($sql_type);
									$rs_type=mysql_fetch_array($exec_type) ;
								    $key1=$rs_type[id_type];
								    $name_type=$rs_type[name_type];
										
									echo "<option value=\"$key1\">$name_type</option>\n";
								   
					   } 
				?>
              </select>              </td>
            </tr>
            <tr >
              <td colspan="2" background="compcode/picture/bar07.jpg" >&nbsp;&nbsp; </td>
            </tr>
             <tr>
            <td colspan="2"  background="compcode/picture/bar07.jpg"><div align="center"> 
                <input class=button type="submit" name="submit" value="ตกลง">
                <input class=button type="reset" name="submit2" value="เคลียร์">
              </div></td>
          </tr>
		    <tr> 
            <td colspan="2"><img src="compcode/picture/bar08.jpg" width="346"  height="6"></td>
          </tr>
      </table>
</form>
    
