<div class="col-sm-2">
	<div class="panel-group" id="mainmenu" role="tablist" aria-multiselectable="true">
            <!--All users-->
            <div class="panel panel-default">
            	<div class="panel-heading">
                    <h4 class="panel-title"><a role="button" data-toggle="collapse" href="#form" data-parent="#mainmenu"><strong><i class="fa fa-plus fa-fw"></i> กรอกแบบฟอร์ม</strong></a></h4>
            	</div>
            <div class="panel-collapse collapse in" id="form">
                <div class="list-group regBlack_13">
                    <?php
                    /*$sql_01 = mysql_query("select * from $db_eform.develop_main_type where dm_use = 'yes' order by dm_id asc");
                    while($ob_01 = mysql_fetch_assoc($sql_01)){
                        if($_SESSION['ses_du_status']=='1' or $_SESSION['ses_du_status']=='2'){
                            print '<a href="'.$livesite.'form/form_2.php?dm_id='.$ob_01['dm_id'].'&dm_title='.$ob_01['dm_title'].'" class="list-group-item"><i class="fa fa-angle-double-right fa-fw"></i> ขออนุมัติปฏิบัติงาน'.$ob_01['dm_title'].'</a>';
                        }else{
                            print '<a href="'.$livesite.'form/form_1.php?dm_id='.$ob_01['dm_id'].'&dm_title='.$ob_01['dm_title'].'" class="list-group-item"><i class="fa fa-angle-double-right fa-fw"></i> ขออนุมัติปฏิบัติงาน'.$ob_01['dm_title'].'</a>';
                        }
                    }*/
                    ?>
                    <a href="<?php echo $livesite;?>form/form_1.php" class="list-group-item"><i class="fa fa-angle-double-right fa-fw"></i> อนุมัติปฏิบัติงานพัฒนาบุคลากร / บริการวิชาการ</a>
                    <a href="<?php echo $livesite;?>academicservice/form_1.php" class="list-group-item"><i class="fa fa-angle-double-right fa-fw"></i> อนุมัติปฏิบัติงานบริการวิชาการ</a>
                    <a href="<?php print $livesite;?>leave/" class="list-group-item"><i class="fa fa-angle-double-right fa-fw"></i> อนุมัติลาเดินทางต่างประเทศ</a>
                	</div>
            	</div>
            </div>
            <!--All users-->
            
             <!--งานแผนฯ, ผู้บริหาร, Super Administrator, งานบุคลากร-->
            
            <!--งานแผนฯ, ผู้บริหาร-->
            
            <!--การเงิน-->
            <?php
			if($_SESSION['ses_du_status'] == '5' or $_SESSION['ses_du_status'] == '1'){
			?>
            <div class="panel panel-default">
            	<div class="panel-heading">
                	<h4 class="panel-title"><a data-toggle="collapse" href="#finance" data-parent="#mainmenu"><strong><i class="fa fa-money fa-fw"></i> งานการเงินฯ</strong></a></h4>
                </div>
                <div class="panel-collapse collapse in" id="finance">
                    <div class="list-group regBlack_13">
                      <a href="<?php print $livesite;?>finance/show-editbudget-form01.php" class="list-group-item"><i class="fa-fw fa fa-angle-double-right"></i> บันทึกค่าใช้จ่าย</a>           
                      <a href="<?php echo $livesite;?>finance/summaryWithdivision.php?dev_year=<?php echo budgetyear_02(date('Y-m-d'));?>"class="list-group-item"><i class="fa-fw fa fa-angle-double-right"></i> สรุปค่าใช้จ่ายตามส่วนงาน</a>
                      <a href="<?php echo $livesite;?>finance/summaryBudget.php?dev_year=<?php echo budgetyear_02(date('Y-m-d'));?>" class="list-group-item"><i class="fa-fw fa fa-angle-double-right"></i> สรุปค่าใช้จ่ายภาพรวม</a>
                    </div>
                </div>
            </div>
            <?php
			}
			?>
            <!--การเงิน-->
            
            <!--Super Administrator, งานบุคลากร-->
            <?php
			if($_SESSION['ses_du_status'] == '2' or $_SESSION['ses_du_status'] == '1'){
			?>
            <div class="panel panel-info">
            	<div class="panel-heading">
                	<h4 class="panel-title"><a data-toggle="collapse" href="#hr" data-parent="#mainmenu"><strong><i class="fa fa-user fa-fw"></i> งานบริหารทรัพยากรบุคคล</strong></a></h4>
                </div>
            	<div class="panel-collapse collapse in" id="hr">
                	<div class="list-group regBlack_13">
                    	 <a href="<?php print $livesite;?>finance/" class="list-group-item"><i class="fa-fw fa fa-angle-double-right"></i> บันทึกงบประมาณที่ได้รับ</a>
                        <a href="<?php echo $livesite;?>admin/2_allform.php" class="list-group-item"><i class="fa-fw fa fa-angle-double-right"></i> จัดการแบบฟอร์มพัฒนาบุคลากร</a>
                        <a href="<?php echo $livesite;?>academicservice/admin/2_allform.php" class="list-group-item"><i class="fa-fw fa fa-angle-double-right"></i> จัดการแบบฟอร์มบริการวิชาการ</a>
                        <a href="<?php echo $livesite;?>leave/admin-allform.php" class="list-group-item"><i class="fa-fw fa fa-angle-double-right"></i> จัดการแบบฟอร์มใบลาไปเพิ่มพูนความรู้และประสบการณ์ (ต่างประเทศ)</a>
                      <a href="<?php print $livesite;?>personel/show_allpersonel.php" class="list-group-item"><i class="fa-fw fa fa-angle-double-right"></i> ข้อมูลบุคลากร</a>
                      <a href="<?php echo $livesite;?>report/" class="list-group-item"><i class="fa-fw fa fa-flag"></i> รายงาน</a>
              		</div>
             	</div>
            </div>
            
            <div class="panel panel-danger">
            	<div class="panel-heading">
            		<h4 class="panel-title"><a data-toggle="collapse" href="#system" data-parent="#mainmenu"><strong><i class="fa fa-cogs fa-fw"></i> จัดการข้อมูลระบบ</strong></a></h4>
                </div>
            <div class="panel-collapse collapse in" id="system">
            	<div class="list-group regBlack_13">
            	<a href="<?php print $livesite;?>admin/compcode/_show_dep.php" class="list-group-item"><i class="fa-fw fa fa-angle-double-right"></i> ส่วนงาน</a>
                <a href="<?php print $livesite;?>admin/compcode/_show_type.php" class="list-group-item"><i class="fa-fw fa fa-angle-double-right"></i> ประเภทบุคลากร</a>
            	<a href="<?php print $livesite;?>admin/compcode/_show_group.php" class="list-group-item"><i class="fa-fw fa fa-angle-double-right"></i> กลุ่มบุคลากร</a>            
                <a href="<?php print $livesite;?>admin/compcode/_show_personel_status.php" class="list-group-item"><i class="fa-fw fa fa-angle-double-right"></i> สถานะบุคลากร</a>
                <a href="<?php print $livesite;?>admin/compcode/_show_job.php" class="list-group-item"><i class="fa-fw fa fa-angle-double-right"></i> ตำแหน่งงาน</a>
                <a href="<?php print $livesite;?>admin/compcode/_show_jobspecial.php" class="list-group-item"><i class="fa-fw fa fa-angle-double-right"></i> ตำแหน่งด้านบริหารงาน</a>
                <a href="<?php print $livesite;?>admin/compcode/_show_degree.php" class="list-group-item"><i class="fa-fw fa fa-angle-double-right"></i> ประเภทระดับการศึกษา</a>
                <a href="<?php print $livesite;?>admin/compcode/country.php" class="list-group-item"><i class="fa-fw fa fa-angle-double-right"></i> ข้อมูลประเทศ</a>       
            	<a href="<?php print $livesite;?>admin/compcode/_show_loctype.php" class="list-group-item"><i class="fa-fw fa fa-angle-double-right"></i> ประเภทสถานที่จัดงาน</a>
                <a href="<?php print $livesite;?>admin/compcode/_show_devtype.php" class="list-group-item"><i class="fa-fw fa fa-angle-double-right"></i> ประเภทวัตถุประสงค์</a>
                <a href="<?php print $livesite;?>admin/compcode/_show_act.php" class="list-group-item"><i class="fa-fw fa fa-angle-double-right"></i> ประเภทกิจกรรม</a>
                <a href="<?php print $livesite;?>admin/compcode/_show_level.php" class="list-group-item"><i class="fa-fw fa fa-angle-double-right"></i> ประเภทระดับกิจกรรม</a>
                <a href="<?php print $livesite;?>admin/compcode/_show_substr.php" class="list-group-item"><i class="fa-fw fa fa-angle-double-right"></i> ยุทธศาสตร์มหาวิทยาลัยฯ</a>
                <a href="<?php print $livesite;?>admin/compcode/_show_strfac.php" class="list-group-item"><i class="fa-fw fa fa-angle-double-right"></i> ยุทธศาสตร์คณะฯ</a>
                <a href="<?php print $livesite;?>admin/compcode/_show_payfrom.php" class="list-group-item"><i class="fa-fw fa fa-angle-double-right"></i> ประเภทแหล่งทุน</a>
                <a href="<?php print $livesite;?>admin/compcode/_show_budget.php" class="list-group-item"><i class="fa-fw fa fa-angle-double-right"></i> ประเภทเงิน</a>
                <a href="<?php print $livesite;?>admin/compcode/_show_costtype.php" class="list-group-item"><i class="fa-fw fa fa-angle-double-right"></i> ประเภทค่าใช้จ่าย</a>
              <?php 
			  if($_SESSION['ses_du_status'] == '1'){ 
			  	print '<a href="'.$livesite.'admin/compcode/_show_alluser.php" class="list-group-item"><i class="fa-fw fa fa-angle-double-right"></i> ผู้จัดการข้อมูล</a>';
				print '<a href="'.$livesite.'inc/log.php" class="list-group-item"><i class="fa-fw fa fa-angle-double-right"></i> Logfile</a>'; 
			  }
			  ?> <!--Super Administrator only-->
              		</div>
                </div>
            </div>
            <?php
			}
			?>
            <!--Super Administrator, งานบุคลากร-->
	
    </div><!--panel-group-->                    
</div><!--col-->