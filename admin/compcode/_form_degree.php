<form action="_action_degree.php" method="post" id="defaultForm">
	<?php
	if(empty($_GET['dg_id'])){
	?>
	<legend>เพิ่มรายการ</legend>
     <div class="form-group">
     	<label class="control-label">รายการ:</label>
        <input type="text" name="dg_name" class="form-control">
     </div>
     <input name="action" type="hidden" value="insert">
     <button type="submit" class="btn btn-inverse btn-wide text-uppercase">Insert</button>
     <?php
	}else{
	 ?>
     <legend>แก้ไขรายการ</legend>
     <?php
	 $rs=mysql_query("select * from $db_eform.degree where dg_id='$_GET[dg_id]'");
	 $ob=mysql_fetch_assoc($rs);
	 ?>
     <div class="form-group">
     	<label class="control-label">รายการ:</label>
        <input type="text" name="dg_name" class="form-control" value="<?php print $ob['dg_name'];?>">
     </div>
     <input name="action" type="hidden" value="update">
     <input name="dg_id" type="hidden" value="<?php print $ob['dg_id'];?>">
     <button type="submit" class="btn btn-inverse btn-wide text-uppercase">Update</button>
     <?php
	}
	 ?>
</form>