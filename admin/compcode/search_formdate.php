<? // include $serverpath.("script_head.php"); ?>
<link rel="stylesheet" type="text/css" media="all" href="themes/aqua.css" title="Calendar Theme - aqua.css" >

	<script type="text/javascript" src="src/utils.js"></script>
		<script type="text/javascript" src="src/calendar1.js"></script>

		<!-- import the language module -->
		<script type="text/javascript" src="lang/calendar-en.js"></script>

		<!-- other languages might be available in the lang directory; please check
		your distribution archive. -->

		<!-- import the calendar setup script -->
<script type="text/javascript" src="src/calendar-setup.js"></script>
		<body bgcolor="#5c7094" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">

<TABLE WIDTH=778 BORDER=0 align="left" CELLPADDING=0 CELLSPACING=0>
	

	<TR  valign="top" bgcolor=""  WIDTH=500 HEIGHT=600  >
		<TD   ><br>
		  <table width="600" height="100" border="0" align="center" cellpadding="0" cellspacing="0" bordercolor="#FFFFFF" background="compcode/picture/bar07.jpg">

  <tr>
    <td> <form name="form1" method="post" action="compcode/load_searchformdate.php"  ENCTYPE="multipart/form-data" onsubmit="return checkval(this)">
                  <table width="100%"  height="100%" border="0" align="center" cellpadding="0" cellspacing="0" background="compcode/picture/bar07.jpg">
                   <tr><td  colspan="4" background="compcode/picture/bar_null.jpg"><div align="center" class="boldWhite_13">เลือกวันที่ข่าวขึ้นโชว์ของข่าวสุดสัปดาห์</div></td>
</tr>
                   
                   
                   
                    <tr  bgcolor="">
                      <td colspan="4" bgcolor="">&nbsp;</td>
                    </tr>
                    <tr bgcolor="">
                      <td colspan="1" bgcolor=""><div align="center" class="boldWhite_12">
                        <div align="right"><font size="2">วันที่เริ่มต้น:</font> </div>
                      </div>                      </td>
                      <td>
                        <input type="text" name="date1" id="sel1" size="20" >
                        <input name="reset" type="image" src="themes/icons/calendar1.gif" width="19" height="20" border="0" id='button1'>                      </td>
                      <td><div align="right" class="boldWhite_12">
                  <font size="2">วันที่สิ้นสุด:</font> </div></td>
                      <td>
                        <input type="text" name="date2" id="sel2" size="20" >
                        <input name="reset2" type="image" src="themes/icons/calendar1.gif" width="19" height="20" border="0" id='button2'>                      </td>
                    </tr>
                    <script type="text/javascript">
		var cal = new Zapatec.Calendar.setup({
		
		inputField:"sel1",
		ifFormat:"%Y-%m-%d ",
		button:"button1",
		showsTime:false
		
		});
		
	      </script>
                    <script type="text/javascript">
		var cal = new Zapatec.Calendar.setup({
		
		inputField:"sel2",
		ifFormat:"%Y-%m-%d ",
		button:"button2",
		showsTime:false
		
		});
		
		
	      </script>
                   <!--  <script type="text/javascript">
		var cal = new Zapatec.Calendar.setup({
		
		inputField:"sel3",
		ifFormat:"%Y-%m-%d ",
		button:"button3",
		showsTime:false
		
		});
		
	      </script> -->
                    <tr bgcolor="">
                      <td>&nbsp;</td>
                      <td>&nbsp;</td>
                      <td>&nbsp;</td>
                    </tr>
                  
         <tr>
            <td colspan="4"  background="compcode/picture/bar07.jpg"><div align="center"> 
                <input class=button type="submit" name="Submit" value="ตกลง">
                <input class=button type="reset" name="submit2" value="เคลียร์">
              </div></td>
          </tr>
					<tr> 
            <td colspan="4"><img src="compcode/picture/bar12.jpg" width="600" height="6" /></td>
          </tr>
            </table>
                </form></td>
  </tr>
</table>
		  <p>&nbsp;</p>
	  <p>&nbsp;</p>
	  <p>&nbsp;</p>
	  <p>&nbsp;</p>
	  <p>&nbsp;</p>
	  <p>&nbsp;</p>
	  <p>&nbsp;</p>
      </TD>
	</TR>
	<TR>
		<TD COLSPAN=3><? include ("end.php"); ?>
		</TD>
	</TR>
	
</TABLE>
<!-- End ImageReady Slices -->
</BODY>
</HTML>