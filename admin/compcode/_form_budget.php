<form action="_action_budget.php" method="post" id="defaultForm">
	<?php
	if(empty($_GET['bt_id'])){
	?>
	<legend>เพิ่มประเภทเงิน</legend>
     <div class="form-group">
     	<label class="control-label">ประเภทเงิน:</label>
        <input type="text" name="bt_name" class="form-control">
     </div>
     <div class="form-group">
     	<label class="control-label">ใช้งาน:</label>
        <select name="bt_flag" class="form-control select select-primary" data-toggle="select">
        	<?php
			foreach($cf_yn_msg02 as $k=>$v){
				print '<option value="'.$k.'">&raquo; '.$v['label'].'</option>';
			}
			?>
        </select>
     </div>
     <input name="action" type="hidden" value="insert">
     <button type="submit" class="btn btn-inverse btn-wide text-uppercase">Insert</button>
     <?php
	}else{
	 ?>
     <legend>แก้ไขประเภทเงิน</legend>
     <?php
	 $rs=mysql_query("select * from $db_eform.budtype
	 where bt_id = '$_GET[bt_id]'");
	 $ob=mysql_fetch_assoc($rs);
	 ?>
     <div class="form-group">
     	<label class="control-label">ประเภทเงิน:</label>
        <input type="text" name="bt_name" class="form-control" value="<?php print $ob['bt_name'];?>">
     </div>
     <div class="form-group">
     	<label class="control-label">ใช้งาน:</label>
        <select name="bt_flag" class="form-control select select-primary" data-toggle="select">
        	<?php
			foreach($cf_yn_msg02 as $k=>$v){
				if($ob['bt_flag'] == $k){
					print '<option value="'.$k.'" selected>&raquo; '.$v['label'].'</option>';
				}else{
					print '<option value="'.$k.'">&raquo; '.$v['label'].'</option>';
				}
			}
			?>
        </select>
     </div>
     <input name="action" type="hidden" value="update">
     <input name="bt_id" type="hidden" value="<?php print $ob['bt_id'];?>">
     <button type="submit" class="btn btn-inverse btn-wide text-uppercase">Update</button>
     <?php
	}
	 ?>
</form>