<form action="_action_costtype.php" method="post" id="defaultForm">
	<?php
	if(empty($_GET['ct_id'])){
	?>
	<legend>เพิ่มรายการ</legend>
     <div class="form-group">
     	<label class="control-label">รายการ:</label>
        <input type="text" name="ct_title" class="form-control">
     </div>
     <div class="form-group">
     	<label class="control-label">ใช้งาน:</label>
        <select name="ct_use" class="form-control select select-primary" data-toggle="select">
        	<?php
			foreach($cf_yn_msg as $k=>$v){
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
     <legend>แก้ไขรายการ</legend>
     <?php
	 $rs=mysql_query("select * from $db_eform.develop_cost_type where ct_id = '$_GET[ct_id]'");
	 $ob=mysql_fetch_assoc($rs);
	 ?>
     <div class="form-group">
     	<label class="control-label">รายการ:</label>
        <input type="text" name="ct_title" class="form-control" value="<?php print $ob['ct_title'];?>">
     </div>
     <div class="form-group">
     	<label class="control-label">ใช้งาน:</label>
        <select name="ct_use" class="form-control select select-primary" data-toggle="select">
        	<?php
			foreach($cf_yn_msg as $k=>$v){
				if($ob['ct_use'] == $k){
					print '<option value="'.$k.'" selected>&raquo; '.$v['label'].'</option>';
				}else{
					print '<option value="'.$k.'">&raquo; '.$v['label'].'</option>';
				}
			}
			?>
        </select>
     </div>
     <input name="action" type="hidden" value="update">
     <input name="ct_id" type="hidden" value="<?php print $ob['ct_id'];?>">
     <button type="submit" class="btn btn-inverse btn-wide text-uppercase">Update</button>
     <?php
	}
	 ?>
</form>