<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Untitled Document</title>
<script src="inc/tab2/SpryAssets/SpryTabbedPanels.js" type="text/javascript"></script>
<link href="inc/tab2/SpryAssets/SpryTabbedPanels.css" rel="stylesheet" type="text/css">
</head>

<body>
<!--<form action="inc/add_project.php" method="post" name="frmMain" id="frmMain"> -->
<fieldset>
        	<legend>แบบฟอร์ม 1 เสนอโครงการ</legend>
            <?php
			$sql="select * from project
			where pro_id='$_GET[pro_id]'";
			$rs=mysql_query($sql);
			$ob=mysql_fetch_array($rs);
			print "<h1 class='title'>ชื่อโครงการ: ".$ob["names"]."</h1>";
			
			switch($_GET["number"])
			{
				case "1" : include("admin/compcode/form_1_1.php"); break;
				case "2" : include("admin/compcode/form_3.php"); break;
				case "3" : include("admin/compcode/form_6.php"); break;
				case "4" : include("admin/compcode/form_7.php"); break;
				case "5" : include("admin/compcode/form_8.html"); break;
				case "6" : include("admin/compcode/form_9.html"); break;
				case "7" : include("admin/compcode/form_10.html"); break;
				case "8" : include("admin/compcode/form_12_16.php"); break;
				case "9" : include("admin/compcode/form_13.php"); break;
				case "10" : include("admin/compcode/form_14.php"); break;
				case "11" : include("admin/compcode/form_15.php"); break;
				case "12" : include("inc/no17.php"); break;
				case "13" : include("admin/compcode/form_19.php"); break;
				case "14" : include("admin/compcode/form_20.php"); break;
				case "15" : include("inc/spendPlan.php"); break;
				case "16" : include("inc/detailSpend.php");  break;
				case "17" : include("inc/stakeholder.php"); break;
				case "18" : include("inc/benefit.php"); break;
				case "19" : include("inc/risk.php"); break;
			}
            ?>
    
  </div>
  
 <!-- <p></p>
	<input name="" type="submit" value="บันทึกโครงการ" class="button" onClick="return confirm('ยืนยันการเสนอโครงการ');">
    <input name="" type="button" value="ยกเลิก" class="button" onClick="location.href='phpm/index.php'"> -->
    
	
</fieldset>
<!--</form> -->

</body>
</html>
