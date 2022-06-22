<body bgcolor="#5c7094" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
 <?php
$sql="select * from personel where per_id='$_GET[per_id]'";
$rs=mysql_query($sql);
$ob=mysql_fetch_array($rs);
?>
<SCRIPT LANGUAGE="JavaScript">
<!-- Begin
function allowSend() 
{
	titlePic=document.form.title_pic.value;
	detailePic1=document.form.detaile_pic1.value;
	detailePic=document.form.detaile_pic.value;
	if(titlePic==""||detailePic1==""||detailePic=="")
	{
		alert("กรุณาป้อนข้อมูลให้ครบค่ะ");
	
return false;
}
else
return true;

}
// End -->
</script> 
<FORM   name="form" action="inc/load_insertpersonel.php?action=edit" enctype="multipart/form-data"  method="post"  onSubmit="return allowSend(this)"> 
<table class="table1" width="100%">
    <input type="hidden" name="MAX_FILE_SIZE" value="500000000">
    <input type="hidden" name="cate" value="2">
        <!--<tr align="center" bgcolor="#006699">
          <td colspan="3" class="boldWhite_16"><div align="left"><img src="compcode/picture/bar_insertnews.jpg" width="650" height="18" /></div></td>
        </tr> -->
        <tr>
          <th class="td1" background="compcode/picture/bar07.jpg">คำนำหน้าชื่อภาษาไทย</th>
          <td class="td2"><input name="per_pname" type="text" id="per_pname" value="<?php echo $ob['per_pname']; ?>" size="10" maxlength="50" />
          </td>
        </tr>
        <tr>
          <th class="td1" background="compcode/picture/bar07.jpg">ชื่อภาษาไทย</th>
          <td class="td2"><input name="per_fnamet" type="text" class="inputform" id="title_news" size="50" maxlength="100" value="<?php print $ob['per_fnamet'];?>">          </td>
        </tr>
        <tr>
          <th valign="top" class="td1" background="compcode/picture/bar07.jpg">นามสกุลภาษาไทย</th>
          <td valign="top" class="td1" background="compcode/picture/bar07.jpg">
            <input name="per_lnamet" type="text" class="inputform" id="title_news2" size="50" maxlength="100" value="<?php print $ob['per_lnamet'];?>">
          </td>
          </tr>
        <!--<tr >
          <td class="regWhite_13" background="compcode/picture/bar07.jpg" ><div align="right">ข่าวเกี่ยวกับบุคคลสำคัญ:</div></td>
          <td background="compcode/picture/bar07.jpg" ></td>
          <td background="compcode/picture/bar07.jpg" ><select name="id_person" id="id_person"  style='width:250' >
               <option value="0">--กรุณาเลือก-</option>
                  <?  #$sql_person="SELECT * FROM   person_most  ";
						 #$exec_person=mysql_query($sql_person);
	        			 #while($rs_person=mysql_fetch_array($exec_person)){	
						     #$id_person=$rs_person[id_person];
					    	 #$title=$rs_person[title]; 
					    	 #$name_person=$rs_person[name_person]; 
							?>
							<option value="<? #echo $id_person; ?>"><? #echo $title ; ?><? #echo $name_person ; ?></option>
					   <? #} 
				?>
            </select></td>
        </tr> -->
        <tr>
          <th class="td1" background="compcode/picture/bar07.jpg" >คำนำหน้าชื่อภาษาอังกฤษ</th>
          <td  align="left" class="td2" ><!--<input type='hidden' name='key1' value='<? #echo $key1; ?>'> -->
              <!--<input type="text" size=30  maxlength="30"  disabled name="name_type"  value="<? #echo  $name_type  ?> "> -->
          <input name="per_pname2" type="text" class="inputform" id="title_news3" value="<?php print $ob['per_pname2'];?>" size="10" maxlength="20"></td>
        </tr>
        <tr>
          <th class="td1" background="compcode/picture/bar07.jpg" >ชื่อภาษาอังกฤษ</th>
          <td  align="left" class="td2" ><input name="per_fnamee" type="text" value="<?php print $ob['per_fnamee'];?>" size="50" id="per_fnamee"></td>
        </tr>
        
        <!--<tr background="compcode/picture/bar07.jpg">
          <td class="regWhite_13"background="compcode/picture/bar07.jpg">วันที่ลงข่าว:</td>
          <td background="compcode/picture/bar07.jpg" >&nbsp;</td>
          <td background="compcode/picture/bar07.jpg" > <span class="regWhite_13">วันที่ :&nbsp;</span>&nbsp;
              <select name="day" size=1 disabled>
                <?php
							#for($i=1; $i<=31; $i++) 
							#{
									#$a = sprintf("%02d",$i);
									#if($a == date("d"))
											#echo("<OPTION VALUE=\"$a\" SELECTED>$a");
									#else 
											#echo("<OPTION VALUE=\"$a\">$a");
							#}
				?>
              </select>
              <span class="regWhite_13">&nbsp; เดือน :&nbsp;&nbsp;</span><span class="smalltext">
              <select name="month" disabled>
                <?php
								#$m_array = array("ม.ค.","ก.พ.","มี.ค.","เม.ย.","พ.ค.","มิ.ย.","ก.ค.","ส.ค.","ก.ย.","ต.ค.","พ.ย.","ธ.ค.");
								#for($i=0; $i<12; $i++) 
								#{
								   #$j=$i+1;
									#$j = sprintf("%02d",$j);
								   #if($j == date("m")) 
									  #echo("<OPTION VALUE=\"$j\" SELECTED>$m_array[$i]");
								   #else
									  #echo("<OPTION VALUE=\"$j\">$m_array[$i]");
								#} 
						?>
              </select>
&nbsp; </span><span class="regWhite_13">ปี(พ.ศ.): </span><span class="smalltext">
            <input type="text" size=4 maxlength=4 name="year" value="<? #echo date("Y")+543 ?>" disabled>
&nbsp;<span class="boldFF6600_13">*</span></span></td>
        </tr> -->
		
        <tr >
          <th class="td1" background="compcode/picture/bar07.jpg" >นามสกุลภาษาอังกฤษ</th>
          <td class="td2">
          	<input name="per_lnamee" type="text" id="per_lnamee" value="<?php print $ob['per_lnamee'];?>" size="50">
          </td>
        </tr>
        <tr >
          <th class="td1" background="compcode/picture/bar07.jpg" >ส่วนงาน</th>
          <td class="td2">
          	<select name="per_dept">
          	<?php
			$sql_org="select * from tb_orgnew
			order by dp_id asc";
			$rs_org=mysql_query($sql_org);
			while($ob_org=mysql_fetch_array($rs_org))
			{
				if($ob['per_dept'] == $ob_org['dp_id'])
				{
					print "<option value='".$ob_org["dp_id"]."' selected>- ".$ob_org["dp_name"]." -</option>";
				}
				else
				{
					print "<option value='".$ob_org["dp_id"]."'>- ".$ob_org["dp_name"]." -</option>";
				}
			}
			?>
            </select>
          </td>
        </tr>
						<tr  >    <th class="td1" background=compcode/picture/bar07.jpg>ตำแหน่งงาน</th>
						<td class="td2">
						  <!--<select name="job_id">
						    <?php
								/*print "<option value='".$ob['job_id']."'>- ".$ob['job_id']." -</option>";
							$sql_job="select * from job where job_status='1'
							order by job_id asc";
							$rs_job=mysql_query($sql_job);
							while($ob_job=mysql_fetch_array($rs_job))
							{
								if($ob['job_id'] == $ob_job['job_id'])
								{
									print "<option value='".$ob_job["job_id"]."' selected>- ".$ob_job["job_name"]." -</option>";
								}
								else
								{
									print "<option value='".$ob_job["job_id"]."'>- ".$ob_job["job_name"]." -</option>";
								}
							}*/
			?>
					      </select>  -->
                          <input name="job_id" type="text" size="50" maxlength="100" value="<?php echo $ob['job_id'];?>" />
                          </td></tr>
        <tr>
                          <th class="td1">ตำแหน่งทางวิชาการ</th>
                          <td class="td2">
                          	<select name="ja_id">
						    <?php
							$sql_ja="select ja_id,ja_name 
							from job_academic
							order by ja_id asc";
							$rs_ja=mysql_query($sql_ja);
							while($ob_ja=mysql_fetch_array($rs_ja))
							{
								if($ob['ja_id'] == $ob_ja['ja_id'])
								{
									print "<option value='".$ob_ja["ja_id"]."' selected>- ".$ob_ja["ja_name"]." -</option>";
								}
								else
								{
									print "<option value='".$ob_ja["ja_id"]."'>- ".$ob_ja["ja_name"]." -</option>";
								}
							}
			?>
					      </select>
                          </td>
    </tr>
        <!--<tr>
        	<th class="td1">ตำแหน่งทางบริหาร</th>
           <td class="td2"><select name="jobs_id">
           	<option value="0">- -</option>
			   <?php
							/*$sql="select * from job_special
							order by jobs_name asc";
							$rs=mysql_query($sql);
							while($ob=mysql_fetch_array($rs)){
								print "<option value='".$ob["jobs_id"]."'>- ".$ob["jobs_name"]." -</option>";
							}*/
			?>
          </select></td>
            </tr> -->
            <!--<tr>
          <td class="td1" background="compcode/picture/bar07.jpg">เผยแพร่</td>
          <td class="td2">
          	<input name="publish" type="radio" value="0" checked> ใช่
            <input name="publish" type="radio" value="1"> ไม่
          </td>
        </tr> -->
        <tr>
              <th background="compcode/picture/bar07.jpg" class="td1">กลุ่ม</th>
              <td background="compcode/picture/bar07.jpg" class="td1">
              	<select name="per_group">
                	<?php
					foreach($per_group as $per_group_k=>$per_group_v)
					{
						if($ob['per_group'] == $per_group_k)
						{
							print "<option value='".$per_group_k."' selected>- ".$per_group_v." -</option>";
						}
						else
						{
							print "<option value='".$per_group_k."'>- ".$per_group_v." -</option>";
						}
					}
					?>
                </select>
              </td>
    </tr>
        <tr>
          <th background="compcode/picture/bar07.jpg" class="td1">เพศ</th>
          <td background="compcode/picture/bar07.jpg" class="td1">
          	<select name="per_sex">
                	<?php
					foreach($per_sex as $per_sex_k=>$per_sex_v)
					{
						if($ob['per_sex'] == $per_sex_k)
						{
							print "<option value='".$per_sex_k."' selected>- ".$per_sex_v." -</option>";
						}
						else
						{
							print "<option value='".$per_sex_k."'>- ".$per_sex_v." -</option>";
						}
					}
					?>
            </select>
          </td>
        </tr>
        <tr>
        	<th class="td1">กำหนดเป็นหัวหน้าภาควิชา / ส่วนงาน</th>
            <td>
                	<select name="per_isboss">
                	<?php
					foreach($cf_perisboss as $cf_perisboss_k=>$cf_perisboss_v)
					{
						if($ob['per_isboss']==$cf_perisboss_k)
						{
							print "<option value='".$cf_perisboss_k."' selected>- ".$cf_perisboss_v." -</option>";
						}
						else
						{
							print "<option value='".$cf_perisboss_k."'>- ".$cf_perisboss_v." -</option>";
						}
					}
					?>
            </select>
            </td>
        </tr>
        <tr>
              <th colspan="2"background="compcode/picture/bar07.jpg" class="td1"><span class="boldwhite_14">ข้อมูลการติดต่อ</span></th>
    </tr>
        <tr>
          <th class="td1"background="compcode/picture/bar07.jpg">เบอร์ตรง</th>
          <td class="td2"><!--<select name="d_1" size=1 >
                <?php
							for($i=1; $i<=31; $i++) 
							{
									$a = sprintf("%02d",$i);
									if($a == date("d"))
											echo("<OPTION VALUE=\"$a\" SELECTED>$a");
									else 
											echo("<OPTION VALUE=\"$a\">$a");
							}
				?>
          </select>
          
              <select name="m_1" >
                <?php
								$m_array = array("ม.ค.","ก.พ.","มี.ค.","เม.ย.","พ.ค.","มิ.ย.","ก.ค.","ส.ค.","ก.ย.","ต.ค.","พ.ย.","ธ.ค.");
								for($i=0; $i<12; $i++) 
								{
								   $j=$i+1;
									$j = sprintf("%02d",$j);
								   if($j == date("m")) 
									  echo("<OPTION VALUE=\"$j\" SELECTED>$m_array[$i]");
								   else
									  echo("<OPTION VALUE=\"$j\">$m_array[$i]");
								} 
						?>
              </select>
           
                            <select name="y_1" >
                <?php
				$y=date("Y");
				#$yc=$y+543;
				$yn=$y+4;
				for($yy=$y;$yy<=$yn;$yy++){
					$yy2=$yy+543;
					#if($yy == $y){
            			#print "<option value='".$yy."' selected='selected'>".$yy2."</option>";
					#}else{
						print "<option value='".$yy."'>".$yy2."</option>";
					#}
				} 
						?>
              </select> -->
                            <!--<span class="boldWhite_13">ถึง</span>
              <select name="d_2" size=1 >
                <?php
							for($i=1; $i<=31; $i++) 
							{
									$a = sprintf("%02d",$i);
									if($a == date("d"))
											echo("<OPTION VALUE=\"$a\" SELECTED>$a");
									else 
											echo("<OPTION VALUE=\"$a\">$a");
							}
				?>
              </select>
              <select name="m_2" >
                <?php
								$m_array = array("ม.ค.","ก.พ.","มี.ค.","เม.ย.","พ.ค.","มิ.ย.","ก.ค.","ส.ค.","ก.ย.","ต.ค.","พ.ย.","ธ.ค.");
								for($i=0; $i<12; $i++) 
								{
								   $j=$i+1;
									$j = sprintf("%02d",$j);
								   if($j == date("m")) 
									  echo("<OPTION VALUE=\"$j\" SELECTED>$m_array[$i]");
								   else
									  echo("<OPTION VALUE=\"$j\">$m_array[$i]");
								} 
						?>
              </select>
                          <select name="y_2" >
                <?php
								$y_array = array("2549","2550","2551","2552","2553","2554","2555","2558","2559");
								for($i=0; $i<5; $i++) 
								{
								   $j=$i+2006;
									$j = sprintf("%02d",$j);
								   if($j == date("Y")) 
								   {
								   
									  echo("<OPTION VALUE=\"$j\" SELECTED>$y_array[$i]");
									  }
								   else
									  echo("<OPTION VALUE=\"$j\">$y_array[$i]");
								} 
						?>
              </select> -->
            <!--<span class="boldFF6600_13">* </span> -->
            <input name="per_tel" type="text" id="sel4" value="<?php echo $ob['per_tel']; ?>" size="50" maxlength="50" />
          <!--<input type="reset" value="เลือกวัน" id='button4' onclick="alert('click');" style="font-family:tahoma; font-size:8pt; font-weight:bold; padding-bottom:2px; padding-top:2px"> --><script type="text/javascript">
		var cal = new Zapatec.Calendar.setup({
		
		inputField     :    "sel4",     // id of the input field
		ifFormat       :    "%Y-%m-%d",     // format of the input field
		showsTime      :     false,
		button         :    "button4",// trigger button (well, IMG in our case)
		align          :    "Tl"           // alignment (defaults to "Bl")
		
		});
		
	</script></td>
        </tr>
             <tr>
               <th class="td1">เบอร์ภายใน</th>
               <td class="td2"><input name="per_telin" type="text" class="inputform" id="title_news4" value="<?php print $ob['per_telin'];?>" size="50" maxlength="100"></td>
             </tr>
             <tr>
               <th class="td1">Intra-Phone</th>
               <td class="td2"><input name="per_intra" type="text" class="inputform" id="title_news5" value="<?php print $ob['per_intra'];?>" size="50" maxlength="100"></td>
             </tr>
             <tr>
               <th class="td1">เบอร์บ้าน</th>
               <td class="td2"><input name="per_telhome" type="text" class="inputform" id="title_news6" value="<?php print $ob['per_telhome'];?>" size="50" maxlength="100"></td>
             </tr>
             <tr>
               <th class="td1">เบอร์มือถือ</th>
               <td class="td2"><input name="per_mobile" type="text" class="inputform" id="title_news7" value="<?php print $ob['per_mobile'];?>" size="50" maxlength="100"></td>
             </tr>
             <tr>
               <th class="td1">อีเมล</th>
               <td class="td2"><input name="per_email" type="text" class="inputform" id="title_news8" value="<?php print $ob['per_email'];?>" size="50" maxlength="100"></td>
             </tr>
             <tr>
               <th colspan="2" class="th1"><span class="boldwhite_14">ข้อมูลการศึกษาสูงสุด</span></th>
             </tr>
             <?php
			 $sql_edu="select * from education where ed_perid='$_GET[per_id]' order by ed_id desc";
			 $rs_edu=mysql_query($sql_edu);
			 $ob_edu=mysql_fetch_array($rs_edu);
			 ?>
             <tr>
               <th class="td1">ระดับการศึกษา</th>
               <td class="td2"><select name="dg_id">
               	<option value="0">- -</option>
                 <?php
							$sql_dg="select * from degree
							order by dg_name asc";
							$rs_dg=mysql_query($sql_dg);
							while($ob_dg=mysql_fetch_array($rs_dg))
							{
								if($ob_edu['ed_dgid'] == $ob_dg['dg_id'])
								{
									print "<option value='".$ob_dg["dg_id"]."' selected>- ".$ob_dg["dg_name"]." -</option>";
								}
								else
								{
									print "<option value='".$ob_dg["dg_id"]."'>- ".$ob_dg["dg_name"]." -</option>";
								}
							}
			?>
               </select></td>
             </tr>
             <tr>
               <th class="td1">วุฒิการศึกษา(ไทย)</th>
               <td class="td2"><input name="ed_edu" type="text" class="inputform" id="title_news9" value="<?php print $ob_edu['ed_edu'];?>" size="50" maxlength="100"></td>
             </tr>
             <tr>
               <th class="td1">วุฒิการศึกษา(อังกฤษ)</th>
               <td class="td2"><input name="ed_edu_en" type="text" class="inputform" id="title_news10" value="<?php print $ob_edu['ed_edu_en'];?>" size="50" maxlength="100"></td>
             </tr>
             <tr>
               <th class="td1">สาขาวิชา</th>
               <td class="td2"><input name="ed_major" type="text" class="inputform" id="title_news11" value="<?php print $ob_edu['ed_major'];?>" size="50" maxlength="100"></td>
             </tr>
             <tr>
               <th class="td1">สถาบัน</th>
               <td class="td2"><input name="ed_institute" type="text" class="inputform" id="title_news12" value="<?php print $ob_edu['ed_institute'];?>" size="50" maxlength="100"></td>
             </tr>
             <tr>
               <th colspan="2" class="td1"><span class="boldwhite_14">Upload รูปภาพ</span></th>
             </tr>
             <tr>
               <td colspan="2" class="td1"><img src="<?php print $livesite."img/personel/thumbnail/".$ob['per_img'];?>" class="img_thumbnail120x140" /> <input name="per_img" type="file" size="50" id="per_img"></td>
             </tr>
             <tr>
             	<td class="td1"></td>
            <td class="td2">
            	<input name="per_id" type="hidden" value="<?php print $ob['per_id'];?>">
                <input name="per_img2" type="hidden" value="<?php print $ob['per_img'];?>">
			<input type="submit" name="submit" value="บันทึก" style="font-family:verdana,tahoma; font-size:8pt; font-weight:bold; padding-bottom:5; padding-top:5; padding-left:20; padding-right:20">
                <input type="button" name="submit2" value="ย้อนกลับ" style="font-family:verdana,tahoma; font-size:8pt; font-weight:bold; padding-bottom:5; padding-top:5; padding-left:20; padding-right:20" onClick="location.href='<?php print $_SERVER['PHP_SELF'];?>'">
              </td>
          </tr>
		    <!--<tr> 
            <td colspan="3"><img src="compcode/picture/bar08.jpg" width="650"  height="6" /></td>
          </tr> -->
  </table>
    

</form>


</body>
</html>
