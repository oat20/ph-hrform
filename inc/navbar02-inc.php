<nav class="navbar navbar-inverse navbar-static-top navbar-lg navbar-embossed">
	<div class="container-fluid">
    
    	<!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <!--<a class="navbar-brand" href="<?php //echo $livesite;?>profile/profile.php"><?php //print $titlebar['icon'].' '.$titlebar['title'];?></a>-->
          <a class="navbar-brand" href="<?php print $livesite;?>profile/profile.php"><?php echo $titlebar['shorttitle'];?></a>
          <!--<img src="<?php //echo $livesite;?>img/PH_logo_web.png" class="img-responsive">-->
        </div>
        
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        	<ul class="nav navbar-nav">
				<li><a href="<?php echo $livesite;?>profile/profile.php"><i class="fa fa-home fa-fw"></i> หน้าหลัก</a></li>
            	<li class="dropdown">
                	<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button">กรอกแบบฟอร์ม <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="<?php echo $livesite;?>form/form_1.php?dm_id=1&dm_title=พัฒนาบุคลากร">ขออนุมัติปฏิบัติงานพัฒนาบุคลากร ฝึกอบรม / ประชุม</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="<?php echo $livesite;?>academicservice/form_1.php">ขออนุมัติปฏิบัติงานบริการวิชาการ</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="<?php echo $livesite;?>leave/">ขออนุมัติเดินทางต่างประเทศ</a></li>
                      </ul>
                </li>
                <?php
				if($_SESSION['ses_du_status']=='1' or $_SESSION['ses_du_status']=='2'){
					print '<li class="dropdown">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button">จัดการแบบฟอร์มทั้งหมด <span class="caret"></span></a>
								<ul class="dropdown-menu">
									<li><a href="'.$livesite.'admin/2_allform.php">แบบฟอร์มพัฒนาบุคลากร</a></li>
                        			<li><a href="'.$livesite.'academicservice/admin/2_allform.php">แบบฟอร์มบริการวิชาการ</a></li>
                        			<li><a href="'.$livesite.'leave/admin-allform.php">แบบบันทึกเดินทางต่างประเทศ</a></li>
								</ul>
							</li>';
					print '<li class="dropdown">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button">ข้อมูลพื้นฐาน <span class="caret"></span></a>
								<ul class="dropdown-menu">
									<li><a href="'.$livesite.'finance/">บันทึกงบประมาณที่ได้รับ</a></li>
									<li role="separator" class="divider"></li>
									
									<li class="dropdown-header regWhite_12">ข้อมูลบุคลากร</li>
									<li><a href="'.$livesite.'personel/show_allpersonel.php">ข้อมูลบุคลากร</a></li>
									<li><a href="'.$livesite.'admin/administrative.php">ทีมบริหาร</a></li>
									<li><a href="'.$livesite.'admin/compcode/_show_dep.php">ส่วนงาน</a></li>
                					<li><a href="'.$livesite.'admin/compcode/_show_type.php">ประเภทบุคลากร</a></li>
            						<li><a href="'.$livesite.'admin/compcode/_show_group.php">กลุ่มบุคลากร</a></li>            
                					<li><a href="'.$livesite.'admin/compcode/_show_personel_status.php">สถานะบุคลากร</a></li>
                					<li><a href="'.$livesite.'admin/compcode/_show_job.php">ตำแหน่งงาน</a></li>
                					<li><a href="'.$livesite.'admin/compcode/_show_jobspecial.php">ตำแหน่งด้านบริหารงาน</a></li>
                					<li><a href="'.$livesite.'admin/compcode/_show_degree.php">ประเภทระดับการศึกษา</a></li>
									<li role="separator" class="divider"></li>
																										
                					<li><a href="'.$livesite.'admin/compcode/country.php">ข้อมูลประเทศ</a></li>       
            						<li><a href="'.$livesite.'admin/compcode/_show_loctype.php">ประเภทสถานที่จัดงาน</a></li>
                					<li><a href="'.$livesite.'admin/compcode/_show_devtype.php">ประเภทวัตถุประสงค์</a></li>
                					<li><a href="'.$livesite.'admin/compcode/_show_act.php">ประเภทกิจกรรม</a></li>
                					<li><a href="'.$livesite.'admin/compcode/_show_level.php">ประเภทระดับกิจกรรม</a></li>
                					<li><a href="'.$livesite.'admin/compcode/_show_substr.php">ยุทธศาสตร์มหาวิทยาลัยฯ</a></li>
                					<li><a href="'.$livesite.'admin/compcode/_show_strfac.php">ยุทธศาสตร์คณะฯ</a></li>
                					<li><a href="'.$livesite.'admin/compcode/_show_payfrom.php">ประเภทแหล่งทุน</a></li>
                					<li><a href="'.$livesite.'admin/compcode/_show_budget.php">ประเภทเงิน</a></li>
                					<li><a href="'.$livesite.'admin/compcode/_show_costtype.php">ประเภทค่าใช้จ่าย</a></li>';
																	
									if($_SESSION['ses_du_status'] == '1'){ 
										print '<li role="separator" class="divider"></li>
												<li class="dropdown-header regWhite_12">Super Administrator</li>';
			  							print '<li><a href="'.$livesite.'admin/compcode/_show_alluser.php">ผู้จัดการข้อมูล</a></li>';
										print '<li><a href="'.$livesite.'inc/log.php">Logfile</a></li>'; 
									}
									
								print '</ul>
							</li>';
				}
				
				if($_SESSION['ses_du_status']=='6' or $_SESSION['ses_du_status']=='1' or $_SESSION['ses_du_status']=='2'){				
					echo '<li>
								<a href="'.$livesite.'report/"><i class="fa fa-flag fa-fw"></i> รายงาน</a></li>';
					/*print '<li class="dropdown">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">รายงาน <span class="caret"></span></a>
						<ul class="dropdown-menu">
							<li><a href="'.$livesite.'report/">ปฎิบัติงานพัฒนาบุคลากร</a></li>
							<li><a href="'.$livesite.'academicservice/report/">ปฎิบัติงานบริการวิชาการ</a></li>
							<li class="divider"></li>
							<li class="dropdown-header regWhite_12">รายงานด้านการเงิน</li>
							<li><a href="'.$livesite.'finance/summaryWithdivision.php?dev_year='.budgetyear_02(date('Y-m-d')).'">สรุปค่าใช้จ่ายตามส่วนงาน</a></li>
                      		<li><a href="'.$livesite.'finance/summaryBudget.php?dev_year='.budgetyear_02(date('Y-m-d')).'">สรุปค่าใช้จ่ายภาพรวม</a></li>
						</ul>
					</li>';*/
				}
				?>
            </ul>
            
            <ul class="nav navbar-nav navbar-right">
            	<li class="dropdown">
                	<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-user fa-fw"></i> <?php print $_SESSION['ses_createname'];?> <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                    	<li class="dropdown-header regWhite_12">ประวัติการขออนุมัติ</li>
                        <li><a href="<?php echo $livesite;?>profile/_showmyproject.php">ปฏิบัติงานพัฒนาบุคลากร</a></li>
                        <li><a href="<?php echo $livesite;?>academicservice/_showmyacademicservice.php">ปฏิบัติงานบริการวิชาการ</a></li>
                        <li><a href="<?php echo $livesite;?>leave/_showmyproject.php">อนุมัติเดินทางต่างประเทศ</a></li>
                        <li role="separator" class="divider"></li>
                        
                        <li class="dropdown-header regWhite_12">ประวัติการเข้าร่วม</li>
                        <li><a href="<?php echo $livesite;?>3_historyjoin1.php">ปฏิบัติงานพัฒนาบุคลากร</a></li>
                        <li><a href="<?php echo $livesite;?>3_historyjoin2.php">ปฏิบัติงานบริการวิชาการ</a></li>
                        <li role="separator" class="divider"></li>
                        
                    	<li><a href="<?php print $livesite;?>profile/form_changepw.php"><i class="fa fa-info fa-fw"></i> ข้อมูลส่วนบุคคล</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="<?php print $livesite;?>admin/compcode/logout_admin.php"><i class="fa fa-power-off"></i>  ออกจากระบบ</a></li>
                    </ul>
                </li>
                <!--<li><a href="<?php //print $livesite;?>admin/compcode/logout_admin.php"><i class="fa fa-power-off fa-fw"></i>  ออกจากระบบ</a></li>-->
            </ul>
        </div>
    
    </div>
</nav>