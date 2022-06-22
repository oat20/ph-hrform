  <form action="_action_strfac.php" method="post" id="defaultForm">
  	<?php
	if(empty($_GET['sf_id'])){
	?>
  	<legend>เพิ่มยุทธศาสตร์</legend>
    	<div class="form-group">
        	<label class="control-label">ยุทธศาสตร์:</label>
            <input name="sf_name" type="text "id="name_type" size="50" maxlength="100" class="form-control">
        </div>
        <div class="form-group">
        	<label class="control-label">ใช้งาน:</label>
            <select class="form-control select select-primary" data-toggle="select" name="sf_use">
            <?php
			foreach($cf_yn_msg as $k=>$v){
				print '<option value="'.$k.'">&raquo; '.$v['label'].'</option>';
			}
			?>
            </select>
        </div>
        <input name="action" type="hidden" value="insert">
        <input class="button btn btn-wide text-uppercase" type="submit" value="Insert">
	<?php
	}else{
		$rs=mysql_query("select * from $db_eform.strategic_faculty
		where sf_id = '$_GET[sf_id]'");
		$ob=mysql_fetch_assoc($rs);
	?>
         <legend>แก้ไขยุทธศาสตร์</legend>
    	<div class="form-group">
        	<label class="control-label">ยุทธศาสตร์:</label>
            <input name="sf_name" type="text "id="name_type" size="50" maxlength="100" class="form-control" value="<?php print $ob['sf_name'];?>">
        </div>
        <div class="form-group">
        	<label class="control-label">ใช้งาน:</label>
            <select class="form-control select select-primary" data-toggle="select" name="sf_use">
            <?php
			foreach($cf_yn_msg as $k=>$v){
				if($ob['sf_use'] == $k){
					print '<option value="'.$k.'" selected>&raquo; '.$v['label'].'</option>';
				}else{
					print '<option value="'.$k.'">&raquo; '.$v['label'].'</option>';
				}
			}
			?>
            </select>
        </div>
        <input name="action" type="hidden" value="update">
        <input name="sf_id" type="hidden" value="<?php print $ob['sf_id'];?>">
        <input class="button btn btn-wide text-uppercase" type="submit" value="Update">
    <?php
	}
	?>
</form>