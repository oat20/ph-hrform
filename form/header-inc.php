<?php
include('../admin/compcode/include/config.php');
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<?php include('../lib/css-inc.php');?>

</head>

<body>
<div class="container">

	<div class="space10"></div>
	<div class="row">
    	<div class="col-sm-6">
        	<img src="<?php echo $livesite;?>img/PH_logo_web.png" class="img-responsive">
        </div>
        <div class="col-sm-6 text-right">
        	<div class="font-30"><strong><?php echo $titlebar['icon'].' '.$titlebar['title'];?></strong></div>
            <div class="font-20"><strong><?php echo $titlebar['label'];?></strong></div>
        </div>
    </div>
    
    <div class="space5"></div>
    <nav class="navbar navbar-inverse">
    	<div class="container-fluid">
        
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
              <a class="navbar-brand" href="#"><i class="fa fa-home fa-fw"></i></a>
            </div>
            
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li><a href="<?php print $livesite;?>profile/profile.php"><i class="fa fa-angle-double-left fa-fw"></i> หน้าหลัก</a></li>
                </ul>
                
                <ul class="nav navbar-nav navbar-right">
                    <li class="active">
                        <a href="<?php print $livesite;?>profile/profile.php"><i class="fa fa-cog fa-fw"></i> สำหรับผู้จัดการข้อมูล</a>
                    </li>
                </ul>
            </div>
        
        </div>
    </nav>
    
    <div class="well well-lg">
    	fsdjfkljasdklfjaskldf
    </div>

</div>

<?php include('../lib/js-inc.php');?>
</body>
</html>