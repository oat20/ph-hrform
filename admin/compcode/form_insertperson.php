<? session_start(); 
/*include "include/config.php";
$conn = connect_db("db_news");
if(!$conn)
echo "�Դ�����Դ��Ҵ�������ö�Դ��͡Ѻ�ҹ��������";*/
?>

<meta http-equiv="Content-Type" content="text/html; charset=tis-620">

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
       			alert("�����͡��������������");
          		form.name_type.focus();
          		return false;
        }
		if (form.name_type_e.value == "") 
		{
       			alert("�����͡�������������ѧ���");
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
  header_admin("��������������");
  */
  ?>
  <br>
  <form  name="insert_type "action="<? echo $levelpath; ?>compcode/load_insertperson.php" method="post" onSubmit="return checkval(this)">
  <table width="280" border=0 align="center" cellpadding=0  cellspacing=0>
     
     <tr><td colspan="4"background="compcode/picture/bar_menu.jpg"  width="400"><div align="center" class="boldBlack_13">&nbsp;<span class="boldWhite_13">�ؤ��ҡ�&nbsp;</span></div></td>
</tr>
      <tr  >
        <td width="120" background="compcode/picture/bar07.jpg">&nbsp;</td>
        <td width="160" background="compcode/picture/bar07.jpg">&nbsp;</td>
      </tr>
	     <tr  >
       <td class="regWhite_13" background="compcode/picture/bar07.jpg"><div align="right">���͡�ӹ�˹��:</div></td>
       <td background="compcode/picture/bar07.jpg"><select name="title" id="title"  >
                  <option value="0">- - - ��س����͡ - - -</option>
                  <option value="�ҧ">&nbsp;�ҧ</option>
		  <option value="�ҧ���">&nbsp;�ҧ���</option>
		  <option value="���">&nbsp;���</option>
			</select></td>
      </tr>
      <tr  >
       <td class="regWhite_13" background="compcode/picture/bar07.jpg"><div align="right">������:</div></td>
       <td background="compcode/picture/bar07.jpg"><input name="name_person" type="text "id="name_type" style='width:250' size="150" maxlength="150"></td>
      </tr>
	  <tr  >
       <td class="regWhite_13" background="compcode/picture/bar07.jpg"><div align="right">���͡���˹�:</div></td>
       <td background="compcode/picture/bar07.jpg"><select name="id_position" id="id_position"  style='width:250' >
                  <option value="0">- - - ���͡��¡��- - -</option>
                  <?  $sql="SELECT * FROM   position_news";
					$exec=mysql_query($sql);
	        			 while($rs=mysql_fetch_array($exec)){	
						     $id_position=$rs[id_position ];
					    	$name_position_t=$rs[name_position_t ]; ?>
							<option value="<? echo $id_position; ?>">&nbsp;<? echo $name_position_t; ?></option>
					   <? } 
				?>
            </select></td>
	  </tr>
      <tr  >
        <td background="compcode/picture/bar07.jpg"></td>
        <td style='text-align:left' background="compcode/picture/bar07.jpg">&nbsp;</td>
      </tr>
  

         <tr>
            <td colspan="2"  background="compcode/picture/bar07.jpg"><div align="center"> 
                <input class=button type="submit" name="Submit" value="��ŧ">
                <input class=button type="reset" name="submit2" value="������">
              </div></td>
          </tr>
		  
		    <tr> 
            <td colspan="2"><img src="compcode/picture/bar12.jpg" width="400" height="6"></td>
          </tr>
</table>    
  </form><? //echo"$pagebaseline";



?>
</body>
</html>
