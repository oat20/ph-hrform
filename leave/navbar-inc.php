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
          <a class="navbar-brand" href="#"><?php echo $titlebar['icon'].' '.$titlebar['shorttitle'];?></a>
        </div>

		<!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
			<ul class="nav navbar-nav">
				<!--
                    <li><a href="<?php //echo $livesite;?>profile/profile.php"><i class="fa fa-home fa-fw" aria-hidden="true"></i> หน้าหลัก</a></li>
-->
				<li><a href="<?php echo $livesite;?>leave/form.php">กรอกแบบฟอร์ม</a></li>
				<li><a href="<?php echo $livesite;?>leave/_showmyproject.php">ประวัติ</a></li>
			</ul>

            <ul class="nav navbar-nav navbar-right">
                <li>
                    <a href="#" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-user fa-fw"></i> <?php print $_SESSION['ses_createname'];?></a>
                </li>
                <li><a href="<?php print $livesite;?>admin/compcode/logout_admin.php"><i class="fa fa-sign-out"></i></a></li>
            </ul>
		</div>
	</div>
</nav>