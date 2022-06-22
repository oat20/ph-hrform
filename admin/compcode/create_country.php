<form action="_action_country.php" method="post" id="defaultForm">
	<?php
	if(empty($_GET['ct_id'])){
	?>
	<legend>เพิ่มรายการ</legend>
     <div class="form-group">
     	<label class="control-label">ชื่อประเทศ:</label>
        <input type="text" name="ct_name" class="form-control">
     </div>
     <input name="action" type="hidden" value="insert">
     <button type="submit" class="btn btn-inverse btn-wide text-uppercase">Insert</button>
     <?php
	}else{
	 ?>
     <legend>แก้ไขรายการ</legend>
     <?php
	 $rs=mysql_query("select * from $db_eform.country where ct_id='$_GET[ct_id]'");
	 $ob=mysql_fetch_assoc($rs);
	 ?>
     <div class="form-group">
     	<label class="control-label">ชื่อประเทศ:</label>
        <input type="text" name="ct_name" class="form-control" value="<?php print $ob['ct_name'];?>">
     </div>
     <input name="action" type="hidden" value="update">
     <input name="ct_id" type="hidden" value="<?php print $ob['ct_id'];?>">
     <button type="submit" class="btn btn-inverse btn-wide text-uppercase">Update</button>
     <?php
	}
	 ?>
</form>