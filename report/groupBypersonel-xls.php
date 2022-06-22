<?php
include('../admin/compcode/include/config.php');
include('../admin/compcode/include/connect_db.php');
include('../admin/compcode/include/function.php');

$present_month=$_GET["year"]."-".$_GET["month"];

require_once "../lib/writeexcel/class.writeexcel_workbook.inc.php";
            require_once "../lib/writeexcel/class.writeexcel_worksheet.inc.php";
            $token = md5(uniqid(rand(), true)); 
            $fname= "../lib/writeexcel/tmp/$token.xls";
			#$fname = tempnam("/tmp", "simple.xls");
            $workbook =& new writeexcel_workbook($fname);

            $worksheet =& $workbook->addworksheet(iconv("utf-8","tis-620","จำแนกรายบุคคล"));
            $worksheet->set_margin_right(0.50);
            $worksheet->set_margin_bottom(1.10);

            ## Set Format  ##
            $xlscelldesc_header =& $workbook->addformat();
            $xlscelldesc_header->set_font('TH SarabunPSK');
            $xlscelldesc_header->set_size(18);
            $xlscelldesc_header->set_color('black');
            $xlscelldesc_header->set_bold(1);
            $xlscelldesc_header->set_text_v_align(1);
            $xlscelldesc_header->set_merge(1);
			
			 $xlscelldesc_header1 =& $workbook->addformat();
            $xlscelldesc_header1->set_font('TH SarabunPSK');
            $xlscelldesc_header1->set_size(16);
            $xlscelldesc_header1->set_color('black');
            $xlscelldesc_header1->set_bold(1);
            $xlscelldesc_header1->set_text_v_align(1);
            //$xlscelldesc_header1->set_merge(1);
			
            $xlsCellDesc =& $workbook->addformat();
            $xlsCellDesc->set_font('TH SarabunPSK');
            $xlsCellDesc->set_size(16);
            $xlsCellDesc->set_color('black');
            $xlsCellDesc->set_bold(0);
            $xlsCellDesc->set_align('left');
            $xlsCellDesc->set_text_v_align(1);
			//$xlsCellDesc->set_text_wrap();
			//$xlsCellDesc->set_merge(1);
			
			$xlsCellDesc_02 =& $workbook->addformat(array(
                                            bold    => 1,
											align=>'center',
											text_v_align=>1,
                                        ));
            ## End of Set Format ##

            ## Set Column Width & Height  กำหนดความกว้างของ Cell
            $worksheet->set_column('A:B', 10);
            $worksheet->set_column('B:C', 32);
            $worksheet->set_column('C:D', 30);
            $worksheet->set_column('D:E', 21);
            $worksheet->set_column('E:F', 15);
            $worksheet->set_column('F:G', 20);
            $celldesc_h = 18;

            ## Writing Data  เพิ่มข้อมูลลงใน Cellง
            $worksheet->write(A1,iconv("utf-8","tis-620","รายงานจำแนกรายบุคคล"), $xlscelldesc_header);
            $worksheet->write_blank(B1,$xlscelldesc_header);
            $worksheet->write_blank(C1,$xlscelldesc_header);
            $worksheet->write_blank(D1,$xlscelldesc_header);
			$worksheet->write_blank(E1,$xlscelldesc_header);
            $worksheet->write_blank(F1,$xlscelldesc_header);
			$worksheet->write_blank(G1,$xlscelldesc_header);
			$worksheet->write_blank(H1,$xlscelldesc_header);
						
            # กำหนดความสูงของ Cell
            $worksheet->set_row(1, $celldesc_h); 
            $worksheet->set_row(2, $celldesc_h);
            $worksheet->set_row(3, $celldesc_h);
            $worksheet->set_row(4, $celldesc_h);
            $worksheet->set_row(5, $celldesc_h);
			
			//query
			if($_GET['dm_id']=='all'){
				$sql_1= "select t1.per_id, t6.dm_id, t6.dm_title, t1.per_fnamet, t1.per_lnamet, t4.job_name, t5.dp_name, t7.gr_title, t8.pert_name, count(t3.dev_id) as countDevid 
										from $db_eform.personel_muerp as t1
										inner join $db_eform.develop_course_personel as t2 on(t1.per_id=t2.per_id)
										inner join $db_eform.develop as t3 on(t2.dev_id=t3.dev_id)
										inner join $db_eform.job as t4 on(t1.job_id=t4.job_id)
										inner join $db_eform.tb_orgnew as t5 on(t1.per_dept=t5.dp_id)
										inner join $db_eform.develop_main_type as t6 on(t3.dev_maintype=t6.dm_id)
										inner join $db_eform.personel_group as t7 on(t1.per_group=t7.gr_id)
										inner join $db_eform.personel_type as t8 on(t1.per_type=t8.pert_id)
										where (t3.dev_stdate between '$_GET[dev_stdate]' and '$_GET[dev_enddate]'
										or t3.dev_enddate between '$_GET[dev_stdate]' and '$_GET[dev_enddate]')
										and t3.dev_cancel='no'
										GROUP by t1.per_id, t6.dm_id, t6.dm_title, t1.per_fnamet, t1.per_lnamet, t4.job_name, t5.dp_name, t7.gr_title, t8.pert_name
										order by convert(t5.dp_name using tis620) asc, convert(t1.per_fnamet using tis620) asc, convert(t1.per_lnamet using tis620) asc";
			}else{
				$sql_1= "select t1.per_id, t6.dm_id, t6.dm_title, t1.per_fnamet, t1.per_lnamet, t4.job_name, t5.dp_name, t7.gr_title, t8.pert_name, count(t3.dev_id) as countDevid 
										from $db_eform.personel_muerp as t1
										inner join $db_eform.develop_course_personel as t2 on(t1.per_id=t2.per_id)
										inner join $db_eform.develop as t3 on(t2.dev_id=t3.dev_id)
										inner join $db_eform.job as t4 on(t1.job_id=t4.job_id)
										inner join $db_eform.tb_orgnew as t5 on(t1.per_dept=t5.dp_id)
										inner join $db_eform.develop_main_type as t6 on(t3.dev_maintype=t6.dm_id)
										inner join $db_eform.personel_group as t7 on(t1.per_group=t7.gr_id)
										inner join $db_eform.personel_type as t8 on(t1.per_type=t8.pert_id)
										where (t3.dev_stdate between '$_GET[dev_stdate]' and '$_GET[dev_enddate]'
										or t3.dev_enddate between '$_GET[dev_stdate]' and '$_GET[dev_enddate]')
										and t3.dev_cancel='no'
										and t3.dev_remove = 'no'
										and t3.dev_maintype='1'
										GROUP by t1.per_id, t6.dm_id, t6.dm_title, t1.per_fnamet, t1.per_lnamet, t4.job_name, t5.dp_name, t7.gr_title, t8.pert_name
										order by convert(t5.dp_name using tis620) asc, convert(t1.per_fnamet using tis620) asc, convert(t1.per_lnamet using tis620) asc";
			}
			$rs = mysql_query($sql_1);
			$row=mysql_num_rows($rs);
			//query
			
			//หังรอง
			$worksheet->write(A2,iconv("utf-8","tis-620","ข้อมูลช่วงวันที่ ".dateThai($_GET['dev_stdate'])." ถึง ".dateThai($_GET['dev_enddate'])." จำนวน ".number_format($row)." รายการ"), $xlscelldesc_header);
            $worksheet->write_blank(B2,$xlscelldesc_header);
            $worksheet->write_blank(C2,$xlscelldesc_header);
            $worksheet->write_blank(D2,$xlscelldesc_header);
			$worksheet->write_blank(E2,$xlscelldesc_header);
            $worksheet->write_blank(F2,$xlscelldesc_header);
			$worksheet->write_blank(G2,$xlscelldesc_header);
			$worksheet->write_blank(H2,$xlscelldesc_header);
            
			//หัวคอลัมล์
            $worksheet->write(A3,iconv("utf-8","tis-620","ลำดับ"), $xlscelldesc_header1);//row&column, text, style
			 $worksheet->write(B3, iconv('utf-8','tis-620','วัตถุประสงค์'), $xlscelldesc_header1); 
			  $worksheet->write(C3,iconv("utf-8","tis-620","บุคลากร"), $xlscelldesc_header1);  
            $worksheet->write(D3,iconv("utf-8","tis-620","ตำแหน่งงาน"), $xlscelldesc_header1);
			$worksheet->write(E3,iconv("utf-8","tis-620","กลุ่ม"), $xlscelldesc_header1);
			$worksheet->write(F3,iconv("utf-8","tis-620","ประเภท"), $xlscelldesc_header1);
            $worksheet->write(G3,iconv("utf-8","tis-620","ส่วนงาน"), $xlscelldesc_header1);
            $worksheet->write(H3,iconv("utf-8","tis-620","จำนวนครั้ง"), $xlscelldesc_header1);
            $xlsRow = 4;
			
            # ตรงนี้คือดึงข้อมูลจาก mysql มาใส่ใน Cell
                #while(list($per_pname, $per_fnamet, $per_lnamet, $per_email)=mysql_fetch_row($rs)) {
				$sumCountdevid=0;
				while($ob = mysql_fetch_array($rs)){
                    ++$i;																
                        $worksheet->set_row($xlsRow, 22);
                        $worksheet->write("A$xlsRow", "$i", $xlsCellDesc);
						 $worksheet->write("B$xlsRow", iconv('utf-8','tis-620',$ob['dm_title']), $xlsCellDesc);
						  $worksheet->write("C$xlsRow", iconv("utf-8","tis-620",$ob['per_pname'].' '.$ob['per_fnamet'].' '.$ob['per_lnamet']), $xlsCellDesc);
                        $worksheet->write("D$xlsRow", iconv("utf-8","tis-620",$ob['job_name']), $xlsCellDesc);
						$worksheet->write("E$xlsRow", iconv("utf-8","tis-620",$ob['gr_title']), $xlsCellDesc);
                        $worksheet->write("F$xlsRow", iconv('utf-8','tis-620',$ob['pert_name']), $xlsCellDesc); 
                        $worksheet->write("G$xlsRow", iconv("utf-8","tis-620",$ob['dp_name']), $xlsCellDesc);
                        $worksheet->write("H$xlsRow", number_format($ob['countDevid']), $xlsCellDesc);
                $xlsRow++;
					$sumCountdevid+=$ob['countDevid']; //รวมจำนวนครั้ง
                }				
				//จำนวนรวม
				$worksheet->set_row($xlsRow, 22);
                        $worksheet->write_blank("A$xlsRow", $xlsCellDesc);
						 $worksheet->write_blank("B$xlsRow", $xlsCellDesc);
						  $worksheet->write_blank("C$xlsRow", $xlsCellDesc);
                        $worksheet->write_blank("D$xlsRow", $xlsCellDesc);
						$worksheet->write_blank("E$xlsRow", $xlsCellDesc);
                        $worksheet->write_blank("F$xlsRow", $xlsCellDesc); 
                        $worksheet->write("G$xlsRow", iconv("utf-8","tis-620","รวม"), $xlscelldesc_header1);
                        $worksheet->write("H$xlsRow", number_format($sumCountdevid), $xlscelldesc_header1);
            # เสร็จแล้วก็ส่งไฟล์ไปยัง Browser ครับแค่นี้ก็เสร็จแล้ว
            $workbook->close();
                header("Pragma: public");
                header("Expires: 0");
                header("Cache-Control: must-revalidate, post-check=0, pre-check=0"); 
                header("Content-Type: application/force-download");
                header("Content-Type: application/octet-stream");
                header("Content-Type: application/download");
                header("Content-Disposition: attachment; filename=".basename(date('YmdHis').".xls").";");
                header("Content-Transfer-Encoding: binary ");
                header("Content-Length: ".filesize($fname));
                readfile($fname);
				header("Content-Type: application/x-msexcel; name=\"example-simple.xls\"");
				header("Content-Disposition: inline; filename=\"example-simple.xls\"");
				$fh=fopen($fname, "rb");
				fpassthru($fh); 
                unlink($fname);
                exit();
				?>