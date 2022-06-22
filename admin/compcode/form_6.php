<?php
#("include/config.php");
#include("include/connect_db.php");
#include("include/function.php");
#connect_db("utf8");
?>
<!--<script language="JavaScript" type="text/javascript">
function checkval() 
{
  		if (document.form_6.str_id.value == "0") 
		{
       			alert("เลือกประเด็นยุทธศาสตร์");
          		document.form_6.str_id.focus();
          		return false;
        }
		
		if (document.form_6.obj_id.value == "0") 
		{
       			alert("เลือกเป้าประสงค์หลัก");
          		document.form_6.obj_id.focus();
          		return false;
        }
}
</script> -->
<!--<form action="#" method="post" name="form_6" onSubmit="JavaScript:return checkval();"> -->
<script language = "JavaScript" type="text/javascript">
		function Listmodel(SelectValue)
		{
			frmMain.str_goal.length = 0

			//*** Insert null Default Value ***//
			var myOption = new Option('','')  
			frmMain.str_goal.options[frmMain.str_goal.length]= myOption
				<?
							$intRows = 0;
			$strSQL = "SELECT * FROM str_goal order by id asc";
				#$cs1 = "SET character_set_results=tis620";
				$objQuery=mysql_query($strSQL) or die('Error query: ' . mysql_error()); 
				#$objQuery =mysql_db_query($dbname,$strSQL);
				$intRows = 0;

			while($objResult = mysql_fetch_array($objQuery))
			{
			$intRows++;
			?>			
				x = <?=$intRows;?>;
				mySubList = new Array();
				
				strGroup = <?=$objResult["sub_str_id"];?>;
				strValue = "<?=$objResult["id"];?>";
				strItem = "<?=$objResult["name"];?>";
				mySubList[x,0] = strItem;
				mySubList[x,1] = strGroup;
				mySubList[x,2] = strValue;
				if (mySubList[x,1] == SelectValue){
					var myOption = new Option(mySubList[x,0], mySubList[x,2])  
					frmMain.str_goal.options[frmMain.str_goal.length]= myOption					
				}
			<?

			}
			?>			
		}
		</script>
        
		<?php
		/*$sql="select * from project
		where pro_id='$_GET[pro_id]'";
		$rs=mysql_query($sql);
		$ob=mysql_fetch_array($rs);*/
		?>
		
        <form action="inc/add_project.php" method="post">
  <fieldset>
    	<legend>6. ประเด็นยุทธศาสตร์</legend>  
<table cellspacing="0">
<tr >
          <td class="formcolhd">ยุทธศาสตร์มหาวิทยาลัย:<!--<br/><span class="regRed_12">(จำเป็นต้องกรอก)</span> --></td>
          <td class="tdpadding">
          	<select name="str_id" onChange="Listmodel(this.value)">
            	<option value="0">- -</option>
    	<?php
				#$result=show_data("strategic","str_id");
				#while($ob=mysql_fetch_array($result)){
					#$str_id=$ob[str_id];
					#print "<optgroup label=".$ob["strategic_th"].">";
						$sub_str="select * from sub_strategic order by id asc";
						$rs_sub_str=mysql_query($sub_str);
						$num=1;
						while($ob_sub_str=mysql_fetch_array($rs_sub_str)){
							if($ob_sub_str["id"] == $ob["str_id"])
							{
								print "<option value=".$ob_sub_str[id]." selected='selected'>- ".$ob_sub_str[nameth]." (".$ob_sub_str[nameen].")</option>";
							}
							else
							{
								print "<option value=".$ob_sub_str[id].">- ".$ob_sub_str[nameth]." (".$ob_sub_str[nameen].")</option>";
							}
							$num++;
						}
					#print "</optgroup>";
				#}
				?>
      </select>          
      </td>
        </tr>
        <tr>
        	<td class="formcolhd">ตัวชี้วัด:</td>
            <td class="tdpadding">
            	<select name="str_goal" style="width:500px">
                	<option value="0">- -</option>
            <?php
			$str_goal="select * from str_goal order by id asc";
			$rs_goal=mysql_query($str_goal);
			while($ob_goal=mysql_fetch_array($rs_goal)){
				if($ob_goal["id"] == $ob["str_goal_id"])
				{
					print "<option value='".$ob_goal[id]."' selected='selected'>".$ob_goal[name]."</option>";
				}
				else
				{
					print "<option value='".$ob_goal[id]."'>".$ob_goal[name]."</option>";
				}
			}
			?>
        </select>
            </td>
        </tr>
             <tr >
               <td class="formcolhd">เป้าประสงค์:</td>
               <td  class="tdpadding">
                    <?php
					$obj=show_data("objective","obj_id");
					while($ob_obj=mysql_fetch_array($obj)){
						if($ob_obj["obj_id"] == $ob["obj_id"]){
							print "<input name='obj_id' type='radio' value='".$ob_obj[obj_id]."' checked='checked' /> ".$ob_obj[objective]."<br/>";
						}else{
							print "<input name='obj_id' type='radio' value='".$ob_obj[obj_id]."' /> ".$ob_obj[objective]."<br/>";
						}
					}
					?>                 
                </td>
             </tr>
             <tr >
               <td class="formcolhd"></td>
               <td  class="tdpadding">
               	<input name="number" type="hidden" value="3" />
            <input name="pro_id" type="hidden" value="<?=$_GET["pro_id"];?>" />
                    <input name="" type="submit" value="บันทึกข้อมูล" class="button" />   
                </td>
             </tr>
             <!--<tr >
               <td>ยุทธศาสตร์คณะ:</td>
               <td  class="formcol2">
               	<select>
                	<option value="">- เลือกรายการ -</option>
                </select>               </td>
             </tr> -->
             <tr>
        <!--<tr>
        	<td></td>
            <td><input class="button2" type="submit" name="submit" value="ถัดไป >"></td>
        </tr> -->
             <tr>             
</table>
      </fieldset>
</form>
