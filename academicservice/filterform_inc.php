<strong><i class="fa fa-filter"></i> Filter</strong><hr>
<form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>" id="filterForm">
	<div class="form-group">
        <label class="control-label">วันที่เริ่มต้น</label>
        <input type="text" class="form-control input-sm" name="keyDevstdate" id="keyDevstdate">
    </div>
    <div class="form-group">
        <label class="control-label">ถึงวันที่</label>
        <input type="text" class="form-control input-sm" name="keyDevenddate" id="keyDevenddate">
    </div>
    <div class="form-group">
        <label class="control-label">ชื่อหลักสูตร/โครงการ, เลขที่รายการ</label>
        <input type="text" class="form-control input-sm" placeholder="จากชื่อหลักสูตร/โครงการ, เลขที่รายการ" name="keyDevonus">
    </div>
    <!--<div class="form-group">
        <label class="control-label">หรือเลขที่รายการ</label>
        <input type="text" class="form-control input-sm" placeholder="จากเลขที่รายการ" name="keyDevid">
    </div>-->
    <!--<div class="form-group">
        <label class="control-label">จากแบบฟอร์ม</label>
        <select name="" class="form-control select select-primary select-sm" data-toggle="select">
            <?php
            /*$sql=mysql_query("select * from phper2.develop_main_type
                    where dm_use='yes'
                    order by dm_id asc");
            while($ob=mysql_fetch_assoc($sql)){
                echo '<option value="'.$ob['dm_id'].'">&raquo; '.$ob['dm_title'].'</option>';
            }
            echo '<option value="3">&raquo; อนุมัติลา (ต่างประเทศ)</option>';*/
            ?>
        </select>
    </div>-->
    <input type="hidden" name="action" value="filter">
    <button type="submit" class="btn btn-primary btn-block btn-sm"><i class="fa fa-search"></i> Search</button>
</form>