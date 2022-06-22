<nav class="navbar navbar-inverse navbar-static-top">
	<div class="container-fluid">
    
    	<!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <!--<a class="navbar-brand" href="#"><?php //print $titlebar['icon'].' '.$titlebar['title'];?></a>-->
          <a class="navbar-brand" href="#"><i class="fa fa-arrow-left" aria-hidden="true"></i></a>
        </div>
        
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        	<ul class="nav navbar-nav">
                <!--<li><a href="">สำหรับงานทรัพยาการบุคคล</a></li>-->
               <!-- <li><a href="">สำหรับส่วนงาน</a></li>-->
                <!--<li><a href="">สำหรับงานการเงินฯ</a></li>-->
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">กรอกแบบฟอร์ม <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="">แบบฟอร์มขออนุมัติปฏิบัติงานพัฒนาบุคลากร</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="">แบบฟอร์มขออนุมัติปฏิบัติงานบริการวิชาการ</a></li>
                    </ul>
                </li>
                
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">รายงาน <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href=""><i class="fa fa-group"></i> ข้อมูลตามส่วนงาน</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href=""><i class="fa fa-user"></i> ข้อมูลรายบุคคล</a></li>
                    </ul>
                </li>
                
            	<li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><!--<i class="fa fa-bars"></i>-->จัดการข้อมูลระบบ <span class="caret"></span></a>
                  <ul class="dropdown-menu">
                  	<!--<li class="dropdown-header regWhite_14">ข้อมูลบุคลากร</li>-->
                    <li><a href=""><strong><i class="fa fa-users"></i> ข้อมูลบุคลากร</strong></a></li>
                    <li><a href="<?php print $livesite;?>admin/compcode/_show_alluser.php"><i class="fa fa-cogs"></i> ผู้จัดการข้อมูล</a></li>

                    <li role="separator" class="divider"></li>
                    <li class="dropdown-header regWhite_14">ข้อมูลพื้นฐานระบบ</li>
                    <li><a href="<?php print $livesite;?>admin/compcode/_show_group.php"><i class="fa fa-angle-double-right"></i> กลุ่มบุคลากร</a></li>
                    <li><a href="<?php print $livesite;?>admin/compcode/_show_type.php"><i class="fa fa-angle-double-right"></i> ประเภทบุคลากร</a></li>
                    <li><a href="<?php print $livesite;?>admin/compcode/_show_personel_status.php"><i class="fa fa-angle-double-right"></i> สถานะบุคลากร</a></li>
                    <li><a href="<?php print $livesite;?>admin/compcode/_show_job.php"><i class="fa fa-angle-double-right"></i> ตำแหน่งงาน</a></li>
                    <li><a href="<?php print $livesite;?>admin/compcode/_show_jobacademic.php"><i class="fa fa-angle-double-right"></i> ตำแหน่งวิชาการ</a></li>
                    <li><a href="<?php print $livesite;?>admin/compcode/_show_jobspecial.php"><i class="fa fa-angle-double-right"></i> ตำแหน่งด้านบริหารงาน</a></li>
                    <li><a href="<?php print $livesite;?>admin/compcode/_show_dep.php"><i class="fa fa-angle-double-right"></i> ส่วนงาน</a></li>
                    
                    <li role="separator" class="divider"></li>                  
                    <li><a href="<?php print $livesite;?>admin/compcode/_show_loctype.php"><i class="fa fa-angle-double-right"></i> ประเภทสถานที่จัดงาน</a></li>
                     <!--<li><a href="<?php //print $livesite;?>admin/compcode/_show_dev_maintype.php"><i class="fa fa-angle-double-right"></i> ประเภทวัตถุประสงค์หลัก</a></li>-->
                    <li><a href="<?php print $livesite;?>admin/compcode/_show_devtype.php"><i class="fa fa-angle-double-right"></i> ประเภทวัตถุประสงค์</a></li>
                    <li><a href="<?php print $livesite;?>admin/compcode/_show_act.php"><i class="fa fa-angle-double-right"></i> ประเภทกิจกรรม</a></li>
                    <li><a href="<?php print $livesite;?>admin/compcode/_show_level.php"><i class="fa fa-angle-double-right"></i> ประเภทระดับกิจกรรม</a></li>
                    <li><a href="<?php print $livesite;?>admin/compcode/_show_substr.php"><i class="fa fa-angle-double-right"></i> ยุทธศาสตร์มหาวิทยาลัยฯ</a></li>
                    <li><a href="<?php print $livesite;?>admin/compcode/_show_strfac.php"><i class="fa fa-angle-double-right"></i> ยุทธศาสตร์คณะฯ</a></li>
                    <li><a href="<?php print $livesite;?>admin/compcode/_show_payfrom.php"><i class="fa fa-angle-double-right"></i> ประเภทแหล่งทุน</a></li>
                    <li><a href="<?php print $livesite;?>admin/compcode/_show_budget.php"><i class="fa fa-angle-double-right"></i> ประเภทเงิน</a></li>
                    <li><a href="<?php print $livesite;?>admin/compcode/_show_costtype.php"><i class="fa fa-angle-double-right"></i> ประเภทค่าใช้จ่าย</a></li>
                  </ul>
                </li>
            </ul>
            
            <ul class="nav navbar-nav navbar-right">
            	<li>
                	<a href="<?php print $livesite;?>admin/compcode/form_changepw.php"><i class="fa fa-user"></i> User</a>
                </li>
                <li><a href=""><i class="fa fa-sign-out"></i>  Sign Out</a></li>
            </ul>
        </div>
    
    </div>
</nav>