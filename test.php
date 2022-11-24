<?php
session_start();

include('admin/compcode/include/config.php');
require_once './lib/mysqli.php';
include('admin/compcode/include/connect_db.php');
include("admin/compcode/include/function.php");
?>
<!doctype html>
<html lang="en">
    <head>
<title><?php print $titlebar['title'];?></title>
<?php
include('lib/css-inc.php');
//print risk_score("16");
//include('inc/navbar02-inc.php');
	?>    
    </head>
    <body>
<div class="container-fluid">
    <?php
    $per_id = array(
        "1234"
    );
    echo $per_id[0];
    ?>
    <p id="demo"></p>
	<form id="defaultUploadexcel" action="test-upload.php" method="post" enctype="multipart/form-data">
    	<div class="form-group">
            <label class="control-label">Upload Excel Template:</label>
            <!--<input id="personel-excel" type="file" class="file" name="personelExcel" required data-show-upload="false" data-show-caption="true">-->
            <input type="file" name="personelExcel">
            <div id="help-block"></div>
        </div>
        <button type="submit" class="btn btn-default btn-wide">Upload</button>
    </form>
    <div class="table-responesive">
    	<table class="table table-bordered regBlack_14">
        	<thead>
            	<tr>
                	<th>#</th>
                    <th>ชื่อ - สกุล</th>
                    <th>ส่วนงาน</th>
                    <th>ลบ</th>
                </tr>
            </thead>
            <tbody>
            	<?php
				$sql=mysqli_query($condb, "select * from $db_eform.develop_course_personel_temp where cp_session='".session_id()."'
					order by convert(cp_dpname using tis620) asc,
					convert(cp_pername using tis620) asc,
					convert(cp_persurname using tis620) asc");
				while($ob=mysqli_fetch_assoc($sql)){
					echo '<tr>
								<td>'.++$r.'</td>
								<td>'.$ob['cp_pername'].' '.$ob['cp_persurname'].'</td>
								<td>'.$ob['cp_dpname'].'</td>
								<td></td>
							</tr>';
				}
				?>
            </tbody>
        </table>
    </div>
    
	<div class="row">
    
    	<?php include('admin/menu_user.php'); //sidebar?>
        
        
        <div class="col-sm-10">
        	    <!-- Button trigger modal -->
<button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal" data-remote="test2.php?word=1234">
  Launch demo modal
</button>
	<a data-toggle="modal" href="" data-target="#myModal" class="btn btn-primary" data-remote="test2.php">Click me</a>

        	<?php
			//echo date('Y-m-d').' - '.date('Y-m-'.'01',strtotime(date('Y-m-d').' -90 days')); 
			echo date('Y').random_ID('2','2').'<br>';
			//echo maxid('ph_hr_eform.develop', 'dev_id');
			//echo addzero(maxid('ph_hr_eform.develop_leave', 'ordering'),'5');
			//echo maxid('ph_hr_eform.develop_leave', 'ordering').'<br>';
			//echo get_refno(date('Y-m-d'),maxid('ph_hr_eform.develop', 'dev_id')).'<br>';
			//echo date('YmdHis').strtoupper(random_password('2')).'<br>';
			//echo '0'.strtoupper(random_ID('2', '0'));
			//echo maxid_02($db_eform.'develop_leave','ordering',"year(dev_create)='2017'");
						?>
            
            <div class="blog-gray">
            	<div class="blog-body">
                	<strong>Title</strong>
                    <br>Content
                </div>
            </div>
            
            <div class="project_menu">
            	<div class="title">Title</div>
                <ul>
                	<li>
                    	<a href="">
                            <div class="clearfix">
                                <div class="pull-left">Menu</div>
                                <div class="pull-right"><i class="fa fa-ellipsis-v"></i></div>
                            </div>
                        </a>
                    </li>
                    <li><a href="">Menu</a></li>
                    <li><a href="">Menu</a></li>
                    <li><a href="">Menu</a></li>
                    <li><a href="">Menu</a></li>
                </ul>
            </div>
        	
            <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
    		<div class="panel panel-default">
            	<div class="panel-heading clearfix">
                	<h3 class="panel-title pull-left">Title</h3>
                </div>
            	<div class="panel-body">
                	<div class="form-group">
                    	<?php echo select_time('', date('H:').'00');?>
                    </div>
                	<?php
					if(isset($_POST['per_id'])){
						//$b=0;
						foreach($_POST['per_id'] as $v){
							echo $v.', '.$_POST['a'.$v].'<br>';
							$b+=$_POST['a'.$v];
						}
					}
					echo $b;
					?>
                	
				   <ul class="list-unstyled regBlack_12">
                   		<?php
						$sql=mysqli_query($condb, "select * from $db_eform.tb_orgnew
							where typ_id='PH00001'
							or typ_id='PH00002'
							order by dp_id asc");
						while($ob=mysqli_fetch_assoc($sql)){
							  print '<li><label class="checkbox"><input type="checkbox" data-toggle="checkbox" id="check_all_item"> <strong>'.$ob['dp_name'].'</strong></label>';							  		
										print '<ul>';
										$sql2 = mysqli_query($condb, "select * from $db_eform.personel_muerp
											inner join $db_eform.personel_status as t2 on(personel_muerp.per_status=t2.ps_id)
											inner join $db_eform.job as t3 on(personel_muerp.job_id=t3.job_id)
											where personel_muerp.per_dept='$ob[dp_id]'
											and t2.ps_flag='1'
											order by convert (personel_muerp.per_fnamet using tis620) asc,
											convert (personel_muerp.per_lnamet using tis620) asc");
									while($ob2 = mysqli_fetch_assoc($sql2)){
										?>
											<li><label class="checkbox">
											<input type="checkbox" data-toggle="checkbox" value="<?php print $ob2['per_id'];?>" name="per_id[]" class="css_my_checkbox" id="IDrow<?php print $ob2['per_id'];?>" onclick="toggle_class('<?php print $ob2['per_id'];?>');"> <?php print $ob2['per_pname'].$ob2['per_fnamet'].' '.$ob2['per_lnamet'].' ('.$ob2['job_name'].')';?>
                                            <input type="text" name="a<?php echo $ob2['per_id'];?>">
										</label></li>
                                        <?php
									}
										print '</ul>';
									print '</li>';
						}
						?>
							</ul>
    			</div>
                <div class="panel-footer">
                	<button type="submit" class="btn btn-default btn-block">Submit</button>
                </div>
           </div>
           </form>
           
           <div class="blog-gray">
           		<div class="blog-title">Title</div>
                <div class="blog-body">
                	fjsadklfjaskldfj
                </div>
           </div>
    
    	</div><!--col-->
	
    </div><!--row-->
    
    <!--modal-->
<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Modal title</h4>
      </div>
      <div class="modal-body">
         ...
      </div>
      <!--<div class="modal-footer">
        <button type="button" class="btn btn-link" data-dismiss="modal"><i class="glyphicon glyphicon-remove"></i></button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>-->
    </div>
  </div>
</div>
    <!--modal-->
    
</div><!--container-->
	
<?php include('lib/js-inc.php');?>
<script src="https://cdn.jsdelivr.net/npm/moment@2.29.4/moment.min.js"></script>
<script>
$(document).ready(function() {
	
	 $('.addButton').on('click', function() {
            var index = $(this).data('index');
            if (!index) {
                index = 1;
                $(this).data('index', 1);
            }
            index++;
            $(this).data('index', index);

            var template     = $(this).attr('data-template'),
                $templateEle = $('#' + template + 'Template'),
                $row         = $templateEle.clone().removeAttr('id').insertBefore($templateEle).removeClass('hide'),
                $el          = $row.find('input').eq(0).attr('name', template + '[]');
            $('#formDefault').bootstrapValidator('addField', $el);

            // Set random value for checkbox and textbox
            if ('checkbox' == $el.attr('type') || 'radio' == $el.attr('type')) {
                $el.val('Choice #' + index)
                   .parent().find('span.lbl').html('Choice #' + index);
            } else {
                $el.attr('placeholder', 'Textbox #' + index);
				//$el.attr('placeholder', 'จำนวนเงิน' + index);
            }

            $row.on('click', '.removeButton', function(e) {
                $('#formDefault').bootstrapValidator('removeField', $el);
                $row.remove();
            });
        });
		
	$('#formDefault').bootstrapValidator({
		 fields: {
			 'bt_id[]': {
				 validators: {
                    notEmpty: {
                        //message: 'The country is required and cannot be empty'
                    }
                }
			 },
			/*'bt_dev_pay01[]': {
					validators: {
						notEmpty: {
							message: 'โปรดระบุจำนวนเงิน'
						}
					}
			 },*/
			  'textbox[]': {
				 validators: {
                    notEmpty: {
                        //message: 'The country is required and cannot be empty'
                    }
                }
			 }
		 }
	})
	.on('error.field.bv', function(e, data) {
                //console.log('error.field.bv -->', data.element);
            })
            .on('success.field.bv', function(e, data) {
                //console.log('success.field.bv -->', data.element);
            })
            .on('added.field.bv', function(e, data) {
                //console.log('Added element -->', data.field, data.element);
            })
            .on('removed.field.bv', function(e, data) {
                //console.log('Removed element -->', data.field, data.element);
            });
	
	//checkall	
	$(".css_my_checkbox").click(function(e){  
        // ตรวจสอบถ้าปุ่ม shift ถูกกดอยู่  
        if(e.shiftKey){  
            // เก็บค่า ลำดับของ checkbox ที่ถูกติ๊กเลือก  
            var nowID_chk=$(".css_my_checkbox").index(this);  
            // กำหนดตัวแปร เก็บค่าลำดับ checkbox ก่อนหน้าที่ถูกติ๊กเลือก  
            var first_index_check=null;  
            // วนลูปหา ค่า ลำดับ chexbox ก่อนหน้าที่ถูกติ๊กเลือก  
            $(".css_my_checkbox:lt("+nowID_chk+")").each(function(i,k){  
                // เริ่มเก็บค่า ลำดับ checkbox ก่อนหน้าที่ถูกติ๊กเลือก เฉพาะรายการที่ถูกติ้กเท่านั้น  
                if($(".css_my_checkbox:eq("+i+")").prop("checked")==true){  
                    // เก็บค่าไว้ในตัวแปร  
                    first_index_check=i;  
                }     
            });   
            // ถ้ามีค่า ลำดับ checkbox ก่อนหน้าที่ถูกเลือก และไม่อยู่ติดกัน  
            if(first_index_check!=null && nowID_chk-first_index_check>1){  
                // กำหนดตัวแปร เก็บค่า ลำดับต่อจาก ลำดับ checkbox ก่อนหน้าที่ถูกติ๊กเลือก  
                var nextToCheck=first_index_check+1;  
                // วนลูปทำงานเลือกเฉพาะ checkbox ที่ยังไม่ถูกเลือก  
                for(i=nextToCheck;i<nowID_chk;i++){  
                    // เก็บค่าสำหรับ อ้างอิงลำดับแถวของตาราง  
                    var rowID=$(".css_my_checkbox:eq("+i+")").val();  
                    // เปลี่ยนสีพื้นหลัง เป็นรายการที่ถูกเลือก  
                    toggle_class(rowID);  
                    // กำหนด checkbox ตามเงื่อนไข ให้ถูกติ้กเลือกทั้งหมด  
                    $(".css_my_checkbox:eq("+i+")").prop("checked",true);  
                }  
            }  
        }  
    });  
      
    $("#check_all_item").click(function(){  
        var i_check=$(this).prop("checked");  
        if(i_check==true){  
            $(".row_css1,.row_css2").addClass("hiligh_select_row");  
            $(".css_my_checkbox").prop("checked",true);  
        }else{  
            $(".row_css1,.row_css2").removeClass("hiligh_select_row");  
            $(".css_my_checkbox").prop("checked",false);  
        }  
    });
	
	function toggle_class(rowID){  
		var placeRow="IDrow"+rowID;   
		$("#"+placeRow).toggleClass("hiligh_select_row");  
	}
		
	$('#myModal').find('.modal-body').load($(this).attr('href'));
	//$('#myModal').modal();
	
	/*$('#defaultUploadexcel').bootstrapValidator({
	});*/

    $("#personel-excel").fileinput({
		language: 'th',
		//maxFileSize: 1024,
		//showPreview: false,
		//uploadUrl: "test-upload.php", // server upload action
		//uploadAsync: false,
		allowedFileExtensions: ["xls", "xlsx", "csv"],
		//elErrorContainer: "#help-block",
	});
	
});
</script>
<script>
    const d = moment().format('YYYY');
    console.log(d);

    const dd = new Date();
let year = dd.getFullYear();
console.log(year);
</script>
</body>
</html>