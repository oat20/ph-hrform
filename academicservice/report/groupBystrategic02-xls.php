<?php
include('../../admin/compcode/include/config.php');
require_once '../../lib/mysqli.php';
include('../../admin/compcode/include/connect_db.php');
include('../../admin/compcode/include/function.php');

$present_month=$_GET["year"]."-".$_GET["month"];

require_once "../../lib/writeexcel/class.writeexcel_workbook.inc.php";
            require_once "../../lib/writeexcel/class.writeexcel_worksheet.inc.php";
            $token = md5(uniqid(rand(), true)); 
            $fname= "../../lib/writeexcel/tmp/$token.xls";
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
            $worksheet->write(A1,iconv("utf-8","tis-620","รายงานจำแนกตามยุทธศาสตร์คณะฯ"), $xlscelldesc_header);
            $worksheet->write_blank(B1,$xlscelldesc_header);
            $worksheet->write_blank(C1,$xlscelldesc_header);
            $worksheet->write_blank(D1,$xlscelldesc_header);
			$worksheet->write_blank(E1,$xlscelldesc_header);
            $worksheet->write_blank(F1,$xlscelldesc_header);
            $worksheet->write_blank(G1,$xlscelldesc_header);
			$worksheet->write_blank(H1,$xlscelldesc_header);
			 $worksheet->write_blank(I1,$xlscelldesc_header);
            $worksheet->write_blank(J1,$xlscelldesc_header);
            $worksheet->write_blank(K1,$xlscelldesc_header);
			$worksheet->write_blank(L1,$xlscelldesc_header);
            $worksheet->write_blank(M1,$xlscelldesc_header);
            $worksheet->write_blank(N1,$xlscelldesc_header);
			$worksheet->write_blank(O1,$xlscelldesc_header);
			$worksheet->write_blank(P1,$xlscelldesc_header);
			$worksheet->write_blank(Q1,$xlscelldesc_header);
			$worksheet->write_blank(R1,$xlscelldesc_header);
			$worksheet->write_blank(S1,$xlscelldesc_header);
			$worksheet->write_blank(T1,$xlscelldesc_header);
			$worksheet->write_blank(U1,$xlscelldesc_header);
			
            # กำหนดความสูงของ Cell
            $worksheet->set_row(1, $celldesc_h); 
            $worksheet->set_row(2, $celldesc_h);
            $worksheet->set_row(3, $celldesc_h);
            $worksheet->set_row(4, $celldesc_h);
            $worksheet->set_row(5, $celldesc_h);
            
            $worksheet->write(A2,iconv("utf-8","tis-620","ลำดับ"), $xlscelldesc_header1);//row&column, text, style
			 $worksheet->write(B2, 'Ref No.', $xlscelldesc_header1); 
			  $worksheet->write(C2,iconv("utf-8","tis-620","ชื่อ"), $xlscelldesc_header1);  
            $worksheet->write(D2,iconv("utf-8","tis-620","กลุ่ม"), $xlscelldesc_header1);
            $worksheet->write(E2,iconv("utf-8","tis-620","ประเภท"), $xlscelldesc_header1);
            $worksheet->write(F2,iconv("utf-8","tis-620","ตำแหน่ง"), $xlscelldesc_header1);
			$worksheet->write(G2,iconv("utf-8","tis-620","ตวช."), $xlscelldesc_header1);
			$worksheet->write(H2,iconv("utf-8","tis-620","ส่วนงาน"), $xlscelldesc_header1);
			$worksheet->write(I2,iconv("utf-8","tis-620","หลักสูตร"), $xlscelldesc_header1);
			$worksheet->write(J2,iconv("utf-8","tis-620","สถานที่"), $xlscelldesc_header1);
			$worksheet->write(K2,iconv("utf-8","tis-620","เริ่ม"), $xlscelldesc_header1);
			$worksheet->write(L2,iconv("utf-8","tis-620","ถึง"), $xlscelldesc_header1);
			$worksheet->write(M2,iconv("utf-8","tis-620","พัฒนาบุคลากร"), $xlscelldesc_header1);
			$worksheet->write(N2,iconv("utf-8","tis-620","บริการวิชาการ"), $xlscelldesc_header1);
			$worksheet->write(O2,iconv("utf-8","tis-620","วัตถุประสงค์"), $xlscelldesc_header1);
			$worksheet->write(P2,iconv("utf-8","tis-620","ชม."), $xlscelldesc_header1);
			$worksheet->write(Q2,iconv("utf-8","tis-620","กิจกรรม"), $xlscelldesc_header1);
			$worksheet->write(R2,iconv("utf-8","tis-620","ยุทธศาสตร์ ม."), $xlscelldesc_header1);
			$worksheet->write(S2,iconv("utf-8","tis-620","ยุทธสาสตร์ คณะฯ"), $xlscelldesc_header1);
			$worksheet->write(T2,iconv("utf-8","tis-620","งบประมาณ"), $xlscelldesc_header1);
			$worksheet->write(U2,iconv("utf-8","tis-620","หน่วยงานผู้จัด"), $xlscelldesc_header1);
            $xlsRow = 3;
						
			$sql_1= "select * from $db_eform.develop
						inner join $db_eform.develop_course_personel on (develop.dev_id = develop_course_personel.dev_id)
						inner join $db_eform.personel_muerp on (develop_course_personel.per_id = personel_muerp.per_id)
						inner join $db_eform.personel_group on (personel_muerp.per_group = personel_group.gr_id)
						inner join $db_eform.personel_type on (personel_muerp.per_type = personel_type.pert_id)
						inner join $db_eform.job on (personel_muerp.job_id = job.job_id)
						inner join $db_eform.tb_orgnew on (personel_muerp.per_dept = tb_orgnew.dp_id)
						inner join $db_eform.sub_strategic on (develop.ss_id = sub_strategic.id)
						inner join $db_eform.strategic_faculty on (develop.sf_id = strategic_faculty.sf_id)
						inner join $db_eform.develop_location_type on (develop.lt_id = develop_location_type.lt_id)
						where (develop.dev_stdate between '$_GET[dev_stdate]' and '$_GET[dev_enddate]'
						or develop.dev_enddate between '$_GET[dev_stdate]' and '$_GET[dev_enddate]')
						and develop.dev_maintype = '2'
						and develop.sf_id = '$_GET[sf_id]'
						order by develop.dev_stdate desc,
						develop.dev_enddate desc";
			$rs = mysqli_query($condb,$sql_1);
			$row=mysqli_num_rows($rs);
            # ตรงนี้คือดึงข้อมูลจาก mysql มาใส่ใน Cell
                #while(list($per_pname, $per_fnamet, $per_lnamet, $per_email)=mysql_fetch_row($rs)) {
				while($ob = mysqli_fetch_array($rs)){
                    ++$i;
										
					if($ob['dev_maintype']=='1'){ 
						$devMaintype01='/';
						$devMaintype02='-';
					}else if($ob['dev_maintype']=='2'){
						$devMaintype01='-'; 
						$devMaintype02='/';
					}
				
				//วัตถุประสงค์
				$dvt_name='';	
				$sql02=mysqli_query($condb,"select * from $db_eform.develop_form_objective
													inner join $db_eform.develop_type on (develop_form_objective.dvt_id = develop_type.dvt_id)
													where develop_form_objective.dev_id='$ob[dev_id]'
													order by develop_type.dvt_id asc");
					while($ob02=mysqli_fetch_assoc($sql02)){
						$dvt_name.=$ob02['dvt_name'].', ';
				}
				//วัตถุประสงค์
						
                        $worksheet->set_row($xlsRow, 22);
                        $worksheet->write("A$xlsRow", "$i", $xlsCellDesc);
						 $worksheet->write("B$xlsRow", $ob['dev_id'], $xlsCellDesc);
						  $worksheet->write("C$xlsRow", iconv("utf-8","tis-620",$ob['per_pname'].' '.$ob['per_fnamet'].' '.$ob['per_lnamet']), $xlsCellDesc);
                        $worksheet->write("D$xlsRow", iconv("utf-8","tis-620",$ob['gr_title']), $xlsCellDesc); 
                        $worksheet->write("E$xlsRow", iconv("utf-8","tis-620",$ob['pert_name']), $xlsCellDesc);
                        $worksheet->write("F$xlsRow", iconv('utf-8','tis-620',$ob['job_id']), $xlsCellDesc);
						$worksheet->write("G$xlsRow", iconv("utf-8","tis-620",$ob['ja_name']),  $xlsCellDesc);
						$worksheet->write("H$xlsRow", iconv("utf-8","tis-620",$ob['dp_name']),  $xlsCellDesc);
						$worksheet->write("I$xlsRow", iconv("utf-8","tis-620",$ob['dev_onus']),  $xlsCellDesc);
						$worksheet->write("J$xlsRow", iconv("utf-8","tis-620",$ob['dev_place'].' ('.$ob['lt_title'].', '.$cf_local[$ob['dev_local']]['name'].')'),  $xlsCellDesc);
						$worksheet->write("K$xlsRow", iconv("utf-8","tis-620",dateFormat($ob['dev_stdate'])),  $xlsCellDesc);
						$worksheet->write("L$xlsRow", iconv("utf-8","tis-620",dateFormat($ob['dev_enddate'])),  $xlsCellDesc);
						$worksheet->write("M$xlsRow", iconv("utf-8","tis-620",$devMaintype01),  $xlsCellDesc_02);
						$worksheet->write("N$xlsRow", iconv("utf-8","tis-620",$devMaintype02),  $xlsCellDesc_02);
						$worksheet->write("O$xlsRow", iconv('utf-8','tis-620',substr($dvt_name,'0','-2')),  $xlsCellDesc);
						$worksheet->write("P$xlsRow", iconv("utf-8","tis-620",$ob['dev_training_hour']),  $xlsCellDesc);
						$worksheet->write("Q$xlsRow", iconv("utf-8","tis-620",$ob['activity']),  $xlsCellDesc);
						$worksheet->write("R$xlsRow", iconv("utf-8","tis-620",$ob['nameth']),  $xlsCellDesc);
						$worksheet->write("S$xlsRow", iconv("utf-8","tis-620",$ob['sf_name']),  $xlsCellDesc);
						$worksheet->write("T$xlsRow", '',  $xlsCellDesc);
						$worksheet->write("U$xlsRow", iconv("utf-8","tis-620",$ob['dev_org']),  $xlsCellDesc);
                $xlsRow++;
                }				
				//จำนวนรวม
				/*$worksheet->set_row($xlsRow, 22);
                        $worksheet->write_blank("A$xlsRow", $xlsCellDesc);
						 $worksheet->write_blank("B$xlsRow", $xlsCellDesc);
						  $worksheet->write_blank("C$xlsRow", $xlsCellDesc);
                        $worksheet->write_blank("D$xlsRow", $xlsCellDesc); 
                        $worksheet->write("E$xlsRow", iconv("utf-8","tis-620","สรุป จำนวนรายการ ="), $xlscelldesc_header1);
                        $worksheet->write("F$xlsRow", number_format($row), $xlscelldesc_header1);
						$worksheet->write("G$xlsRow", iconv("utf-8","tis-620","รายการ"),  $xlscelldesc_header1);
						$worksheet->write_blank("H$xlsRow",  $xlsCellDesc);*/
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