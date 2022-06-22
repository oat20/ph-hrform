<div id="navi4">
	<form action="<?=$_SERVER['PHP_SELF'];?>" method="get">
	<table>
    	<tr>
        	<td>ปีงบประมาณ</td>
            <td><?=select_budget_year();?></td>
        </tr>
        <tr>
        	<td>ชื่อโครงการ</td>
            <td><input name="keyword" type="text" size="100" maxlength="200"></td>
        </tr>
        <tr>
        	<td>ส่วนงานรับผิดชอบ</td>
            <td><select name='per_dept_main'>
				<option value="0">- เลือกรายการ -</option>
				<?php
				$sql="select * from organization order by DeID asc";
				$rs=mysql_query($sql);
				while($ob=mysql_fetch_array($rs)){
          			print "<option value=".$ob['DeID'].">- ".$ob['Fname']."</option>";
				}
				?>
          	</select></td>
        </tr>
        <tr>
        	<td><input name="filter" type="hidden" value="1"></td>
            <td><input type="submit" value="ค้นหา" class="buttonn" /></td>
        </tr>
    </table>
    </form>
</div>