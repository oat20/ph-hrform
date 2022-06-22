<? #session_start();
#include"compcode/load_inserttype.php"; 
/*include "include/config.php";
$conn = connect_db("db_news");
if(!$conn)
echo "เกิดความผิดพลาดไม่สามารถติดต่อกับฐานข้อมูลได้";*/
?>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8">

<script type="text/javascript" src="admin/compcode/editor/jscripts/tiny_mce/tiny_mce.js"></script>
<script type="text/javascript">
	// Default skin
	tinyMCE.init({
		// General options
		mode : "exact",
		elements : "elm1",
		theme : "advanced",
		plugins : "safari,pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template,inlinepopups",

		// Theme options
		theme_advanced_buttons1 : "save,newdocument,|,bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,styleselect,formatselect,fontselect,fontsizeselect",
		theme_advanced_buttons2 : "cut,copy,paste,pastetext,pasteword,|,search,replace,|,bullist,numlist,|,outdent,indent,blockquote,|,undo,redo,|,link,unlink,anchor,image,cleanup,help,code,|,insertdate,inserttime,preview,|,forecolor,backcolor",
		theme_advanced_buttons3 : "tablecontrols,|,hr,removeformat,visualaid,|,sub,sup,|,charmap,emotions,iespell,media,advhr,|,print,|,ltr,rtl,|,fullscreen",
		theme_advanced_buttons4 : "insertlayer,moveforward,movebackward,absolute,|,styleprops,|,cite,abbr,acronym,del,ins,attribs,|,visualchars,nonbreaking,template,pagebreak",
		theme_advanced_toolbar_location : "top",
		theme_advanced_toolbar_align : "left",
		theme_advanced_statusbar_location : "bottom",
		theme_advanced_resizing : true,

		// Example content CSS (should be your site CSS)
		content_css : "admin/compcode/editor/css/content.css",

		// Drop lists for link/image/media/template dialogs
		template_external_list_url : "admin/compcode/editor/lists/template_list.js",
		external_link_list_url : "admin/compcode/editor/lists/link_list.js",
		external_image_list_url : "admin/compcode/editor/lists/image_list.js",
		media_external_list_url : "admin/compcode/editor/lists/media_list.js",

		// Replace values for the template plugin
		template_replace_values : {
			username : "Some User",
			staffid : "991234"
		}
	});

	// O2k7 skin
	tinyMCE.init({
		// General options
		mode : "exact",
		elements : "elm2",
		theme : "advanced",
		skin : "o2k7",
		plugins : "safari,pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template,inlinepopups",

		// Theme options
		theme_advanced_buttons1 : "save,newdocument,|,bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,styleselect,formatselect,fontselect,fontsizeselect",
		theme_advanced_buttons2 : "cut,copy,paste,pastetext,pasteword,|,search,replace,|,bullist,numlist,|,outdent,indent,blockquote,|,undo,redo,|,link,unlink,anchor,image,cleanup,help,code,|,insertdate,inserttime,preview,|,forecolor,backcolor",
		theme_advanced_buttons3 : "tablecontrols,|,hr,removeformat,visualaid,|,sub,sup,|,charmap,emotions,iespell,media,advhr,|,print,|,ltr,rtl,|,fullscreen",
		theme_advanced_buttons4 : "insertlayer,moveforward,movebackward,absolute,|,styleprops,|,cite,abbr,acronym,del,ins,attribs,|,visualchars,nonbreaking,template,pagebreak",
		theme_advanced_toolbar_location : "top",
		theme_advanced_toolbar_align : "left",
		theme_advanced_statusbar_location : "bottom",
		theme_advanced_resizing : true,

		// Example content CSS (should be your site CSS)
		content_css : "css/content.css",

		// Drop lists for link/image/media/template dialogs
		template_external_list_url : "lists/template_list.js",
		external_link_list_url : "lists/link_list.js",
		external_image_list_url : "lists/image_list.js",
		media_external_list_url : "lists/media_list.js",

		// Replace values for the template plugin
		template_replace_values : {
			username : "Some User",
			staffid : "991234"
		}
	});

	// O2k7 skin (silver)
	tinyMCE.init({
		// General options
		mode : "exact",
		elements : "elm3",
		theme : "advanced",
		skin : "o2k7",
		skin_variant : "silver",
		plugins : "safari,pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template,inlinepopups",

		// Theme options
		theme_advanced_buttons1 : "save,newdocument,|,bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,styleselect,formatselect,fontselect,fontsizeselect",
		theme_advanced_buttons2 : "cut,copy,paste,pastetext,pasteword,|,search,replace,|,bullist,numlist,|,outdent,indent,blockquote,|,undo,redo,|,link,unlink,anchor,image,cleanup,help,code,|,insertdate,inserttime,preview,|,forecolor,backcolor",
		theme_advanced_buttons3 : "tablecontrols,|,hr,removeformat,visualaid,|,sub,sup,|,charmap,emotions,iespell,media,advhr,|,print,|,ltr,rtl,|,fullscreen",
		theme_advanced_buttons4 : "insertlayer,moveforward,movebackward,absolute,|,styleprops,|,cite,abbr,acronym,del,ins,attribs,|,visualchars,nonbreaking,template,pagebreak",
		theme_advanced_toolbar_location : "top",
		theme_advanced_toolbar_align : "left",
		theme_advanced_statusbar_location : "bottom",
		theme_advanced_resizing : true,

		// Example content CSS (should be your site CSS)
		content_css : "css/content.css",

		// Drop lists for link/image/media/template dialogs
		template_external_list_url : "lists/template_list.js",
		external_link_list_url : "lists/link_list.js",
		external_image_list_url : "lists/image_list.js",
		media_external_list_url : "lists/media_list.js",

		// Replace values for the template plugin
		template_replace_values : {
			username : "Some User",
			staffid : "991234"
		}
	});

	// O2k7 skin (silver)
	tinyMCE.init({
		// General options
		mode : "exact",
		elements : "elm4",
		theme : "advanced",
		skin : "o2k7",
		skin_variant : "black",
		plugins : "safari,pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template,inlinepopups",

		// Theme options
		theme_advanced_buttons1 : "save,newdocument,|,bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,styleselect,formatselect,fontselect,fontsizeselect",
		theme_advanced_buttons2 : "cut,copy,paste,pastetext,pasteword,|,search,replace,|,bullist,numlist,|,outdent,indent,blockquote,|,undo,redo,|,link,unlink,anchor,image,cleanup,help,code,|,insertdate,inserttime,preview,|,forecolor,backcolor",
		theme_advanced_buttons3 : "tablecontrols,|,hr,removeformat,visualaid,|,sub,sup,|,charmap,emotions,iespell,media,advhr,|,print,|,ltr,rtl,|,fullscreen",
		theme_advanced_buttons4 : "insertlayer,moveforward,movebackward,absolute,|,styleprops,|,cite,abbr,acronym,del,ins,attribs,|,visualchars,nonbreaking,template,pagebreak",
		theme_advanced_toolbar_location : "top",
		theme_advanced_toolbar_align : "left",
		theme_advanced_statusbar_location : "bottom",
		theme_advanced_resizing : true,

		// Example content CSS (should be your site CSS)
		content_css : "css/content.css",

		// Drop lists for link/image/media/template dialogs
		template_external_list_url : "lists/template_list.js",
		external_link_list_url : "lists/link_list.js",
		external_image_list_url : "lists/image_list.js",
		media_external_list_url : "lists/media_list.js",

		// Replace values for the template plugin
		template_replace_values : {
			username : "Some User",
			staffid : "991234"
		}
	});
</script>

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
  <form  name="insert_type "action="newscategory.php?mode=add" method="post" onsubmit="return checkval(this)">
  <fieldset>
  	<legend>เพิ่ม / แก้ไข</legend>
  <table border=0 cellpadding=0  cellspacing=0>
     
  <!--<tr >

       <td colspan="2"><div align="center" class="boldWhite_16"><img src="compcode/picture/bar_groupnews.jpg" width="280" height="18"></div></td>
    </tr> -->
     <!-- <tr  >
        <td width="120" background="compcode/picture/bar07.jpg">&nbsp;</td>
        <td width="160" background="compcode/picture/bar07.jpg">&nbsp;</td>
      </tr> -->
      <tr>
      	<td><?php echo $msg; ?></td>
      </tr>
      <tr  >
       <td class="formcolhd" background="compcode/picture/bar07.jpg">เป้าประสงค์:</td>
       </tr>
       <tr>
       <td background="compcode/picture/bar07.jpg" class="formcol2"><textarea id="elm1" name="elm1" rows="20" cols="80" style="width: 100%"></textarea></td>
      </tr>
         <tr>
            <td background="compcode/picture/bar07.jpg" class="tdpadding"><div align="center"> 
                <input class=button type="submit" name="Submit" value="เพิ่มรายการ">
                <input class=button type="reset" name="submit2" value="เคลียร์" onClick="location.href='newscategory.php'">
              </div></td>
          </tr>
		  
		    <!--<tr> 
            <td colspan="2"><img src="compcode/picture/bar08.jpg" width="280"  height="6"></td>
          </tr> -->
</table> 
</fieldset>   
</form><? //echo"$pagebaseline";



?>
</body>
</html>
