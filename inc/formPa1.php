<table width="100%" class="table1">
                <?php
				$sql7="select * from personel,organization
				where personel.per_dept=organization.DeID
				and personel.per_id='$per_id'";
				$rs7=mysql_query($sql7);
				$ob7=mysql_fetch_array($rs7);
				?>
                	<tr>
                	  <th>รายงานรอบ</th>
                	  <td>
                      	<select name="m">
                        	<option value="0">- -</option>
                            <?php
                            foreach($round_pa as $k => $v)
                            {
                            	print "<option value='".$k."'>- ".$v." -</option>";
                            }
                            ?>
                        </select>
                      </td>
  </tr>
                	<tr>
                	  <th>ชื่อโครงการ</th>
                	  <td><input name="names" type="text" size="60" maxlength="200" id="names"></td>
  </tr>
                	<tr>
                	  <th>ส่วนงาน</th>
                	  <td><label for="deid"></label>
                	    <select name="deid" id="deid">
                        	<option value="0">- -</option>
                            <?php
                            $dep=show_data("organization","DeID");
							while($ob_dep=mysql_fetch_array($dep))
							{
								print "<option value='".$ob_dep['DeID']."'>- ".$ob_dep['Fname']."</option>";
							}
							?>
              	      </select></td>
  </tr>
                	<tr>
                    	<th>ชื่อ - นามสกุล</th>
                      <td><input name="per_name" type="text" size="60" maxlength="200" value="<?=$ob7["per_pname"].$ob7["per_fnamet"]." ".$ob7["per_lnamet"];?>"></td>
  </tr>
                    <tr>
                    	<th>&nbsp;</th>
                        <td>
                        	<select name="rep_id">
                            	<option value="0">- -</option>
                            <?php
							$rep=show_data("pa_reporter_pa","rep_id");
							while($ob_rep=mysql_fetch_array($rep))
							{
								print "<option value='".$ob_rep['rep_id']."'>- ".$ob_rep['rep']."</option>";
							}
							?>
                          </select>
                      </td>
  </tr>
                    <tr>
                    	<th>สถานะโครงการ</th>
                      <td>
                      	<select name="pa_status">
                        	<option value="0">- -</option>
                        	<?php
                            foreach($pro_status_pa as $k=>$v)
                            {
                            	print "<option value='".$k."'>- ".$v." -</option>";
                            }
                            ?>
                        </select>
                      </td>
  </tr>
                    <tr>
                      <th>&nbsp;</th>
                      <td><input name="per_tel" type="text" size="60" maxlength="200"></td>
                    </tr>
                    <tr>
                    	<th>วันที่สามารถเริ่มโครงการ</th>
                      <td><input type="text" name="startdate" id="startdate" size="10" readonly="true" value="<?=$ob['days'];?>"> 
        <input type="reset" value="เลือกวัน" id='butstart' onclick="alert('click');" class="buttonn"> 
        <script type="text/javascript">
		var cal = new Zapatec.Calendar.setup({
		
		inputField     :    "startdate",     // id of the input field
		ifFormat       :    "%Y-%m-%d",     // format of the input field
		showsTime      :     false,
		button         :    "butstart",  // trigger button (well, IMG in our case)
		align          :    "Tl"           // alignment (defaults to "Bl")
		
		});
		
	</script></td>
  </tr>
                    <tr>
                      <th>โครงการของท่าน<br/>ดำเนินการตามข้อต่อไปนี้แล้ว</th>
                      <td>
                            <?php
                            $pa_step=show_data("pa_step","ste_id");
							while($ob_pa_step=mysql_fetch_array($pa_step))
							{
                                print "<input name='ste_id[]' type='checkbox' value='".$ob_pa_step['ste_id']."' /> ".$ob_pa_step['step']."<br/>";
							}
                            ?>
                      </td>
                    </tr>
                    <tr>
                      <th>&nbsp;</th>
                      <td><input name="per_tel2" type="text" size="60" maxlength="200" /></td>
                    </tr>
                    <tr>
                      <th>&nbsp;</th>
                      <td>&nbsp;</td>
                    </tr>
                </table>
