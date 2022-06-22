<body bgcolor="#5c7094" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
 <?php 
/*$sql_personel="select *  
from personel
left join job on (personel.job_id=job.job_id)
left join job_academic on (personel.ja_id = job_academic.ja_id)
left join tb_orgnew on (personel.per_dept = tb_orgnew.dp_id)
where personel.per_id = '$_GET[per_id]'";*/
$sql_personel="select *  
from personel
left join job_academic on (personel.ja_id = job_academic.ja_id)
left join tb_orgnew on (personel.per_dept = tb_orgnew.dp_id)
where personel.per_id = '$_GET[per_id]'";
$rs_personel=mysql_query($sql_personel);
$ob_personel=mysql_fetch_array($rs_personel);

/*if($ob_personel['job_name'] != "" and $ob_personel['job_name'] != 'ไม่ระบุ'){
	$job2=$ob_personel['job_name'];
}else{
	$job2=$ob_personel['job'];
}*/
?>
<table class="table1" width="100%">
	<tbody>
	<tr>
    	<td colspan="2"><center><img src="<?php print $livesite."../admin/img/personel/thumbnail".$ob_personel['per_img'];?>" class="img_thumbnail120x140" /></center></td>
    </tr>
        <tr>
          <th class="td1" background="../admin/compcode/picture/bar07.jpg">คำนำหน้าชื่อภาษาไทย</th>
          <td class="td2"><?php print $ob_personel['per_pname'];?></td>
        </tr>
        <tr>
          <th class="td1" background="../admin/compcode/picture/bar07.jpg">ชื่อภาษาไทย</th>
          <td class="td2"><?php print $ob_personel['per_fnamet'];?></td>
        </tr>
        <tr>
          <th valign="top" class="td1" background="../admin/compcode/picture/bar07.jpg">นามสกุลภาษาไทย</th>
          <td valign="top" class="td1" background="../admin/compcode/picture/bar07.jpg"><?php print $ob_personel['per_lnamet'];?></td>
  </tr>
        <tr>
          <th class="td1" background="../admin/compcode/picture/bar07.jpg" >คำนำหน้าชื่อภาษาอังกฤษ</th>
          <td  align="left" class="td2" ><?php print $ob_personel['per_pname2'];?></td>
        </tr>
        <tr>
          <th class="td1" background="../admin/compcode/picture/bar07.jpg" >ชื่อภาษาอังกฤษ</th>
          <td  align="left" class="td2" ><?php print $ob_personel['per_fnamee'];?></td>
        </tr>
        <tr >
          <th class="td1" background="../admin/compcode/picture/bar07.jpg" >นามสกุลภาษาอังกฤษ</th>
          <td class="td2"><?php print $ob_personel['per_lnamee'];?></td>
        </tr>
        <tr >
          <th class="td1" background="../admin/compcode/picture/bar07.jpg" >ส่วนงาน</th>
          <td class="td2"><?php print $ob_personel['dp_name'];?></td>
        </tr>
						<tr  >    <th class="td1" background=../admin/compcode/picture/bar07.jpg>ตำแหน่งงาน</th>
						<td class="td2"><?php print $ob_personel['job_id'];?>
                          </td></tr>
        <tr>
                          <th class="td1">ตำแหน่งทางวิชาการ</th>
                          <td class="td2"><?php print $ob_personel['ja_name'];?></td>
    </tr>
        <tr>
              <th background="../admin/compcode/picture/bar07.jpg" class="td1">กลุ่ม</th>
              <td background="../admin/compcode/picture/bar07.jpg" class="td1"><?php print $per_group[$ob_personel['per_group']];?></td>
    </tr>
        <tr>
          <th background="../admin/compcode/picture/bar07.jpg" class="td1">เพศ</th>
          <td background="../admin/compcode/picture/bar07.jpg" class="td1"><?php print $per_sex[$ob_personel['per_sex']];?></td>
        </tr>
        <tr>
          <th background="../admin/compcode/picture/bar07.jpg" class="td1">กำหนดเป็นหัวหน้าภาควิชา / ส่วนงาน</th>
          <td background="../admin/compcode/picture/bar07.jpg" class="td1"><?php print $cf_perisboss[$ob_personel['per_isboss']];?></td>
        </tr>
        <tr>
              <th colspan="2"background="../admin/compcode/picture/bar07.jpg" class="td1"><span class="boldwhite_14">ข้อมูลการติดต่อ</span></th>
    </tr>
        <tr>
          <th class="td1"background="../admin/compcode/picture/bar07.jpg">เบอร์ตรง</th>
          <td class="td2"><?php print $ob_personel['per_tel'];?></td>
        </tr>
             <tr>
               <th class="td1">เบอร์ภายใน</th>
               <td class="td2"><?php print $ob_personel['per_telin'];?></td>
             </tr>
             <tr>
               <th class="td1">Intra-Phone</th>
               <td class="td2"><?php print $ob_personel['per_intra'];?></td>
             </tr>
             <tr>
               <th class="td1">เบอร์บ้าน</th>
               <td class="td2"><?php print $ob_personel['per_telhome'];?></td>
             </tr>
             <tr>
               <th class="td1">เบอร์มือถือ</th>
               <td class="td2"><?php print $ob_personel['per_mobile'];?></td>
             </tr>
             <tr>
               <th class="td1">อีเมล</th>
               <td class="td2"><?php print $ob_personel['per_email'];?></td>
             </tr>
             <tr>
               <th colspan="2" class="th1"><span class="boldwhite_14">ข้อมูลการศึกษาสูงสุด</span></th>
             </tr>
             <?php
  $sql="SELECT * 
  from education
  left join degree on (education.ed_dgid=degree.dg_id)
  where education.ed_perid='$_GET[per_id]'
  order by education.ed_id desc";
  $rs=mysql_query($sql);
  $rows=mysql_num_rows($rs);
  $ob=mysql_fetch_array($rs);
  ?>
             <tr>
               <th class="td1">ระดับการศึกษา</th>
               <td class="td2"><?=$ob["dg_name"];?></td>
             </tr>
             <tr>
               <th class="td1">วุฒิการศึกษา(ไทย)</th>
               <td class="td2"><?php print $ob["ed_edu"]; ?></td>
             </tr>
             <tr>
               <th class="td1">วุฒิการศึกษา(อังกฤษ)</th>
               <td class="td2"><?php print $ob["ed_edu_en"]; ?></td>
             </tr>
             <tr>
               <th class="td1">สาขาวิชา</th>
               <td class="td2"><?php print $ob["ed_major"]; ?></td>
             </tr>
             <tr>
               <th class="td1">สถาบัน</th>
               <td class="td2"><?=$ob["ed_institute"];?></td>
             </tr>
             <tr>
             	<td class="td1"></td>
            <td class="td2">
			<input type="button" name="submit" value="ยืนยันข้อมูล" style="font-family:verdana,tahoma; font-size:8pt; font-weight:bold; padding-bottom:5; padding-top:5; padding-left:20; padding-right:20" onClick="location.href='<?php print $_SERVER['PHP_SELF'];?>'">
                <input type="button" name="submit2" value="แก้ไขข้อมูล" style="font-family:verdana,tahoma; font-size:8pt; font-weight:bold; padding-bottom:5; padding-top:5; padding-left:20; padding-right:20" onClick="location.href='<?php print $_SERVER['PHP_SELF'];?>?mode=edit&per_id=<?php print $ob_personel['per_id'];?>'">
              </td>
          </tr>
          </tbody>
  </table>
</body>
</html>
