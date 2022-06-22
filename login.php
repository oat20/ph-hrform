<?php include("admin/compcode/include/config.php"); ?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title><?php print $titlebar; ?></title>
<link href="room_it/style.css" rel="stylesheet" type="text/css">
<!--<link href="admin/compcode/tool/css_text.css" rel="stylesheet" type="text/css"> -->
<script language="JavaScript" type="text/javascript">
function checkval(form) 
{
  		if (form.user.value == "") 
		{
       			alert("กรอก Username");
          		form.user.focus();
          		return false;
        }
		if (form.pass.value == "") 
		{
       			alert("กรอก Password");
          		form.pass.focus();
          		return false;
        }
}
</script>
</head>

<body>
<!--start top -->
<div id="top">
	<div class="logo"><img src="img/logo.png"></div>
    <div class="post">
			
            <form action="admin/compcode/admin.php" method="post" onSubmit="return checkval(this)">
                	<table border="0" cellspacing="0">
               	  <tr><td class="tdcol2">Username<br/><input name="user" type="text" size="20" maxlength="20"></td>
                  <td class="tdcol2">Password<br/><input name="pass" type="password" size="20" maxlength="20"></td></tr>
                  <tr>
                  	<td><input name="" type="submit" value="Sing In" class="button"></td>
                  </tr>
                  </table>
                </form>
		</div>
        <div style="clear:both"></div>
 </div>
<!-- end top -->
</body>
</html>
