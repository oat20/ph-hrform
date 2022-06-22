<legend>เพิ่มรายการ</legend>
            <form action="_action_level.php" method="post" id="defaultForm">
            	<div class="row">
                	<div class="col-sm-6">
                    	<div class="form-group">
                        	<label class="control-label">รายการ:</label>
                        	<input name="le_title" type="text "id="name_type" size="80" maxlength="200" class="form-control">
                        </div>
                    </div>
                    
                    <div class="col-sm-6">
                    	<div class="form-group">
                        	<label class="control-label">ใช้งาน:</label>
                            <select class="form-control select select-default" data-toggle="select" name="le_use">
                        	<?php
							foreach($cf_yn_msg as $k=>$v){
								print '<option value="'.$k.'">&raquo; '.$v['label'].'</option>';
							}
							?>
                            </select>
                        </div>
                    </div>
                </div>
                <input name="action" type="hidden" value="insert">
                <input class="button btn btn-block text-uppercase" type="submit" value="Insert">
            </form>