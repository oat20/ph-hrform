<?php
include('admin/compcode/include/config.php');
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<?php include('lib/css-inc.php');?>
</head>

<body>
<div class="container">
	
    <div class="row">
    
    	<div class="col-sm-6 col-sm-offset-3">
        	
            <div class="space20"></div>
            <img src="<?php echo $livesite;?>img/PH_logo_web.png" class="img-responsive">
            
            <p></p>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title"><?php print $titlebar['icon'].' '.$titlebar['title'];?></h3>
                </div>
                <div class="panel-body">
                	<div class="well clearfix">
                    	<div class="pull-left"><i class="fa fa-sign-in fa-3x"></i></div>
                        <div class="pull-right font-20"><strong>กรอกแบบฟอร์ม</strong></div>
                    </div><!--well-->
                    
                    <div class="alert alert-info clearfix">
                        <div class="pull-left"><i class="fa fa-file-text fa-3x"></i></div>
                        <div class="pull-right font-20"><strong>รายงาน</strong></div>
                    </div>
                </div><!--body-->
            </div><!--panel-->
        
        </div>
                
    </div><!--row-->
    
</div><!--container-->


<?php include('lib/js-inc.php');?>
</body>
</html>