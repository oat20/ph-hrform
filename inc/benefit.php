<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Untitled Document</title>
<link href="../admin/compcode/tool/css_text.css" rel="stylesheet" type="text/css">
</head>

<body>
<form action="inc/add_project" method="post">
<fieldset>
  <legend>ประโยชน์ที่ได้รับ</legend>
    <table class="table2" width="100%">
  <tr>
    <td><textarea name="pro_benefit" style="width: 100%" rows="20" id="pro_benefit"><?=$ob["pro_benefit"];?></textarea></td>
  </tr>
  <tr>
  	<td><input name="number" type="hidden" value="18" />
            <input name="pro_id" type="hidden" value="<?=$_GET["pro_id"];?>" />
            <input class="button" type="submit" name="submit" value="บันทึกข้อมูล"></td>
  </tr>
</table>

  </fieldset>
  </form>
</body>
</html>