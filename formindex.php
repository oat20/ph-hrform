<?php
session_start();

include("admin/compcode/include/config.php");
include("admin/compcode/include/connect_db.php");
//include("admin/compcode/check_login.php");
include("admin/compcode/include/function.php");
?>
<!doctype html>
<html>
<head>
<title><?php print $titlebar['title'];?></title>
<meta charset="utf-8">
<?php include('lib/css-inc.php');?>
<style>body{ padding-bottom:70px; }</style>
</head>
<body>
<!--<nav class="navbar navbar-default navbar-static-top">
	<div class="container-fluid">
    
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <img src="<?php //echo $livesite;?>img/PH_logo_web.png" class="img-responsive">          
        </div>
        
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">      
            <ul class="nav navbar-nav navbar-right">
            	<?php
				/*if($_SESSION['ses_per_id']==''){
                	echo '<li><a href="profile/profile.php" ><i class="fa fa-sign-in"></i>  เข้าสู่ระบบ</a></li>';
				}else{
					echo '<li class="dropdown">
						<a href="#" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" class="dropdown-toggle">'.$_SESSION['ses_createname'].' <span class="caret"></span></a>
						<ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
							<li><a href="'.$livesite.'profile/form_changepw.php">แก้ไขข้อมูลส่วนตัว</a></li>';
							
							if($_SESSION['ses_du_status']=='1' or $_SESSION['ses_du_status']=='2' or $_SESSION['ses_du_status']=='5' or $_SESSION['ses_du_status']=='6'){
								echo '<li role="separator" class="divider"></li>
									<li><a href="'.$livesite.'profile/profile.php"><i class="fui-gear"></i> Manage Data</a></li>';
							}
						
						echo '</ul>
                </li>';
                	echo '<li><a href="'.$livesite.'admin/compcode/logout_admin.php"><i class="fa fa-power-off fa-fw"></i>  ออกจากระบบ</a></li>';
				}*/
				?>
            </ul>
        </div>
    
    </div>
</nav>--><!--nav-->

<div class="container">
	<div class="space10"></div>
    
    <div class="clearfix">
    	<div class="pull-left">
        	<img src="<?php echo $livesite;?>img/PH_logo_web.png" class="img-responsive">
        </div>
        <div class="pull-right font-30">
        	<strong><?php print $titlebar['label_02'];?></strong>
        </div>
    </div><hr>

	<div class="row">  
    	
        <!--<div class="col-sm-6">
        	<?php //include('header-inc.php');?>
        </div>--><!--col-->
		
        <div class="col-lg-6">
        
           <!-- <img src="<?php //echo $livesite;?>img/PH_logo_web.png" class="img-responsive center-block">-->
            <!--<h3 class="hidden-lg-block text-center"><?php //print $titlebar['label_02'];?></h3>-->
        
        	<div class="panel panel-primary">
            	<div class="panel-heading">
                	<h3 class="panel-title font-18"><i class="fa fa-bars fa-fw"></i> <?php print $titlebar['label_02'];?></h3>
                </div>
                <div class="panel-body">
                	                    
                    	<!--แบบฟอร์ม-->
                        <div class="row">
                        <?php
                        $sql_01 = mysql_query("select * from $db_eform.develop_main_type where dm_use = 'yes' order by dm_id asc");
                        while($ob_01 = mysql_fetch_assoc($sql_01)){
                            print '<div class="col-sm-12">
                                <div class="well well-sm">
									<div class="clearfix">
										<div class="pull-left">
											<a href="'.$livesite.$ob_01['dm_url'].'?dm_id='.$ob_01['dm_id'].'&dm_title='.$ob_01['dm_title'].'">
												<i class="fa fa-file-text"></i> แบบฟอร์มขออนุมัติปฏิบัติงาน'.$ob_01['dm_title'].'
											</a>
										</div><!--left-->
										<div class="pull-right">
											<div class="dropdown">
											  <a href="#" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" class="dropdown-toggle"><i class="fa fa-ellipsis-v"></i></a>
											  <ul class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenu1">
												<li><a href="profile/_showmyproject.php"><i class="glyphicon glyphicon-link"></i> ประวัติการขออนุมัติ</a></li>
												<!--<li role="separator" class="divider"></li>
												<li><a href="profile/_showmyproject_join.php?dev_maintype='.$ob_01['dm_id'].'"><i class="glyphicon glyphicon-link"></i> ประวัติการปฎิบัติงาน</a></li>-->
											  </ul>
											</div>
										</div><!--right-->
									</div><!--clearfix-->
                                </div><!--blog-content-->
                            </div><!--col-->';
                        }
                        ?>
                        
                        <div class="col-sm-12">
                            <div class="well well-sm">
                            	<div class="clearfix">
                                	<div class="pull-left">
                                    	<a href="leave/form.php"><i class="fa fa-file-text"></i> แบบฟอร์มอนุมัติลาประชุม ดูงาน ฝึกอบรม (ต่างประเทศ)</a>
                                    </div>
                                    <div class="pull-right">
                                    	<div class="dropdown">
                                          <a href="#" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" class="dropdown-toggle"><i class="fa fa-ellipsis-v"></i></a>
                                          <ul class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenu1">
                                            <li><a href="leave/_showmyproject.php">ประวัติการขออนุมัติ</a></li>
                                          </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div><!--col-->
                        
                    </div><!--row-->
                    <!--แบบฟอร์ม-->
                
                </div><!--body-->
            </div><!--panel-->
            		
        </div><!--col-->

	</div><!--row-->

</div><!--container-->

<?php 
include('footer-inc.php');
include('lib/js-inc.php');
?>
</body>
</html>