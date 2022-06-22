        <legend>แก้ไขรายการ</legend>
            <form action="_action_level.php" method="post" id="defaultForm">
            	<?php
				$rs=mysql_query("select * from $db_eform.develop_level
				where le_id = '$_GET[le_id]'");
				$ob=mysql_fetch_assoc($rs);
				?>
            	<div class="row">
                	<div class="col-sm-6">
                    	<div class="form-group">
                        	<label class="control-label">รายการ:</label>
                        	<input name="le_title" type="text "id="name_type" size="80" maxlength="200" class="form-control" value="<?php print $ob['le_title'];?>">
                        </div>
                    </div>
                    
                    <div class="col-sm-6">
                    	<div class="form-group">
                        	<label class="control-label">ใช้งาน:</label>
                            <select class="form-control select select-default" data-toggle="select" name="le_use">
                        	<?php
							foreach($cf_yn_msg as $k=>$v){
								if($ob['le_use'] == $k){
									print '<option value="'.$k.'" selected>&raquo; '.$v['label'].'</option>';
								}else{
									print '<option value="'.$k.'">&raquo; '.$v['label'].'</option>';
								}
							}
							?>
                            </select>
                        </div>
                    </div>
                </div>
                <input name="action" type="hidden" value="update">
                <input name="le_id" type="hidden" value="<?php print $ob['le_id'];?>">
                <input class="button btn btn-block text-uppercase" type="submit" value="Update">
            </form>