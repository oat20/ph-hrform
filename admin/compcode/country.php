<?php
session_start();

include('include/config.php');
include('check_login.php');
include('include/connect_db.php');
include('include/function.php');
?>
<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title><?php echo $titlebar['title'];?></title>
<?php include('../../lib/css-inc.php');?>
</head>

<body>
<?php include('../../inc/navbar02-inc.php');?>

<div class="container-fluid">
	<div class="row">
    
    	<div class="col-sm-6">
        	<div class="panel panel-default">
            	<div class="panel-heading">
                	<a href="../../profile/profile.php"><i class="fa fa-arrow-left"></i> ข้อมูลประเทศ</a>
                </div>
            	<div class="panel-body">
                	<form>
                    	<div class="form-group">
                        	<div class="input-group">
                              <span class="input-group-addon" id="basic-addon3"><i class="fa fa-search"></i> ค้นหา</span>
                              <input type="search" class="form-control" id="basic-url" aria-describedby="basic-addon3">
                            </div>
                        </div>
                    </form>
                	<div class="table-responsive">
                        <table border="0" align="center" cellpadding="0" cellspacing="0" bordercolorlight="#9999cc" bordercolordark="White" class="table table-striped">
                            <thead>
                        		<tr>
                                	<th>#</th>
                        			<th class="boldBlack_12"></th>
                            		<th class="boldBlack_12">Tools</th>
                            	</tr>
                            </thead>
                             <tfoot>
                                <tr>
                                	<th>#</th>
                                    <th class="boldBlack_12"></th>
                                    <th class="boldBlack_12">Tools</th>
                                </tr>
                            </tfoot>
                            <tbody id="jetsContent">
                        <?php
                        $sql="select * from $db_eform.country
								order by datestamp desc";
                        #$exec = show_data(person_most,id_person);
                        $exec=mysql_query($sql);
                        $swap=1;
                        while($rs=mysql_fetch_array($exec))
                                    {
                        ?>
                          <tr>
                          	<td><?php echo ++$r;?></td>
                            <td><?php print $rs['ct_name'];?></td>
                          <td>
                            <a href="<?php print $_SERVER['PHP_SELF'].'?ct_id='.$rs['ct_id'];?>" data-toggle="tooltip" data-placement="left" title="แก้ไข"><i class="fa fa-pencil"></i></a>
                            &nbsp;
                             <a href="_action_country.php?ct_id=<?php print $rs['ct_id'];?>&action=remove" class="text-danger" data-toggle="tooltip" data-placement="right" title="ลบ"><i class="fa fa-trash"></i></a>
                          </td> 
                          </tr>  
                          <?
                        }
                        //?>
                            </tbody>
                        </table>
					</div><!--table-->
				</div><!--body-->
			</div><!--panel-->
		</div><!--col-->
        
        <div class="col-sm-6">
        	<div class="well">
            	<?php include('create_country.php');?>
            </div><!--well-->
        </div><!--col-->
        
	</div><!--row-->
</div><!--/*container*/-->

<?php include('../../lib/js-inc.php');?>
<script>
var jets = new Jets({
  searchTag: '#basic-url',
  contentTag: '#jetsContent',
  columns: [1]
});

$(document).ready(function(e) {
    $('#defaultForm').bootstrapValidator({
		 fields: {
			 ct_name: {
                validators: {
                    notEmpty: {
                        //message: 'The first name is required and cannot be empty'
                    }
                }
            },
		 }
	});
	
	 $('[data-toggle="tooltip"]').tooltip('hide');
});
</script>
</body>
</html>