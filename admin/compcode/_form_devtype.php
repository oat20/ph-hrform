<form action="_action_devtype.php" method="post" id="defaultForm">
	<?php
	if(empty($_GET['dvt_id'])){
	?>
	<legend>เพิ่มรายการ</legend>
     <div class="form-group">
     	<label class="control-label">วัตถุประสงค์:</label>
        <input type="text" name="dvt_name" class="form-control">
     </div>
     <div class="form-group">
     	<label class="control-label">อยู่ภายใต้:</label>
        <select name="dm_id" class="form-control select select-primary" data-toggle="select">
        	<?php
			$rs = mysql_query("select * from $db_eform.develop_main_type
			where dm_use = 'yes'
			order by dm_id asc");
			while($ob = mysql_fetch_assoc($rs)){
				print '<option value="'.$ob['dm_id'].'">&raquo; '.$ob['dm_title'].'</option>';
			}
			?>
        </select>
     </div>
     <div class="form-group">
     	<label class="control-label">ใช้งาน:</label>
        <select name="dvt_status" class="form-control select select-primary" data-toggle="select">
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
     <legend>แก้ไขรายการ</legend>
     <?php
	 $rs=mysql_query("select * from $db_eform.develop_type
	 where dvt_id = '$_GET[dvt_id]'");
	 $ob=mysql_fetch_assoc($rs);
	 ?>
     <div class="form-group">
     	<label class="control-label">วัตถุประสงค์:</label>
        <input type="text" name="dvt_name" class="form-control" value="<?php print $ob['dvt_name'];?>">
     </div>
      <div class="form-group">
     	<label class="control-label">อยู่ภายใต้:</label>
        <select name="dm_id" class="form-control select select-primary" data-toggle="select">
        	<?php
			$rs2 = mysql_query("select * from $db_eform.develop_main_type
			where dm_use = 'yes'
			order by dm_id asc");
			while($ob2 = mysql_fetch_assoc($rs2)){
				if($ob['dm_id'] == $ob2['dm_id']){
					print '<option value="'.$ob2['dm_id'].'" selected>&raquo; '.$ob2['dm_title'].'</option>';
				}else{
					print '<option value="'.$ob2['dm_id'].'">&raquo; '.$ob2['dm_title'].'</option>';
				}
			}
			?>
        </select>
     </div>
     <div class="form-group">
     	<label class="control-label">ใช้งาน:</label>
        <select name="dvt_status" class="form-control select select-primary" data-toggle="select">
        	<?php
			foreach($cf_yn_msg02 as $k=>$v){
				if($ob['dvt_status'] == $k){
					print '<option value="'.$k.'" selected>&raquo; '.$v['label'].'</option>';
				}else{
					print '<option value="'.$k.'">&raquo; '.$v['label'].'</option>';
				}
			}
			?>
        </select>
     </div>
     <input name="action" type="hidden" value="update">
     <input name="dvt_id" type="hidden" value="<?php print $ob['dvt_id'];?>">
     <button type="submit" class="btn btn-inverse btn-wide text-uppercase">Update</button>
     <?php
	}
	 ?>
</form>