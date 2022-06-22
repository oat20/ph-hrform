<?php
include("../../../config.php");
include("../../../compcode/conn.php");
include("../../include/function.php");

$present_month=$_GET["year"]."-".$_GET["month"];

require_once "class.writeexcel_workbook.inc.php";
            require_once "class.writeexcel_worksheet.inc.php";
            $token = md5(uniqid(rand(), true)); 
            $fname= "tmp/$token.xls";
			#$fname = tempnam("/tmp", "simple.xls");
            $workbook =& new writeexcel_workbook($fname);

            $worksheet =& $workbook->addworksheet(iconv("utf-8","tis-620","แบบบันทึกติดตามงาน"));
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
			
			$xlscelldesc_header2 =& $workbook->addformat();
            $xlscelldesc_header2->set_font('TH SarabunPSK');
            $xlscelldesc_header2->set_size(16);
            $xlscelldesc_header2->set_color('black');
            $xlscelldesc_header2->set_bold(1);
            $xlscelldesc_header2->set_text_v_align(1);
            $xlscelldesc_header2->set_merge(1);
			
            $xlsCellDesc =& $workbook->addformat();
            $xlsCellDesc->set_font('TH SarabunPSK');
            $xlsCellDesc->set_size(16);
            $xlsCellDesc->set_color('black');
            $xlsCellDesc->set_bold(0);
            $xlsCellDesc->set_align('left');
            $xlsCellDesc->set_text_v_align(1);
			$xlsCellDesc->set_text_wrap();
			//$xlsCellDesc->set_merge(1);
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
            $worksheet->write(A1,iconv("utf-8","tis-620","รายงานการดำเนินงาน ตามงานบริการ"), $xlscelldesc_header);
            $worksheet->write_blank(B1,$xlscelldesc_header);
            $worksheet->write_blank(C1,$xlscelldesc_header);
            $worksheet->write_blank(D1,$xlscelldesc_header);
			$worksheet->write_blank(E1,$xlscelldesc_header);
            $worksheet->write_blank(F1,$xlscelldesc_header);
            $worksheet->write_blank(G1,$xlscelldesc_header);
			$worksheet->write_blank(H1,$xlscelldesc_header);
			$worksheet->write_blank(I1,$xlscelldesc_header);
			$worksheet->write_blank(J1,$xlscelldesc_header);
			
			# กำหนดความสูงของ Cell
            $worksheet->set_row(1, $celldesc_h); 
            $worksheet->set_row(2, $celldesc_h);
            $worksheet->set_row(3, $celldesc_h);
            $worksheet->set_row(4, $celldesc_h);
            $worksheet->set_row(5, $celldesc_h);
			
			$worksheet->write(A2,iconv("utf-8","tis-620","ระหว่างวันที่")." ".dateThai($_POST['date_regis1'], "0")." - ".dateThai($_POST['date_regis2'], "0"), $xlscelldesc_header2);
            $worksheet->write_blank(B2,$xlscelldesc_header2);
            $worksheet->write_blank(C2,$xlscelldesc_header2);
            $worksheet->write_blank(D2,$xlscelldesc_header2);
			$worksheet->write_blank(E2,$xlscelldesc_header2);
            $worksheet->write_blank(F2,$xlscelldesc_header2);
            $worksheet->write_blank(G2,$xlscelldesc_header2);
			$worksheet->write_blank(H2,$xlscelldesc_header2);
			$worksheet->write_blank(I2,$xlscelldesc_header2);
			$worksheet->write_blank(J2,$xlscelldesc_header2);
			            
			$worksheet->write(A3,iconv("utf-8","tis-620","งาน"), $xlscelldesc_header1);
            $worksheet->write(B3,iconv("utf-8","tis-620","เลขที่รายการ"), $xlscelldesc_header1);//row&column, text, style
			 $worksheet->write(C3,iconv("utf-8","tis-620","วันที่แจ้ง"), $xlscelldesc_header1); 
			  $worksheet->write(D3,iconv("utf-8","tis-620","ส่วนงาน"), $xlscelldesc_header1);  
            $worksheet->write(E3,iconv("utf-8","tis-620","รายการที่แจ้งซ่อม"), $xlscelldesc_header1);
            $worksheet->write(F3,iconv("utf-8","tis-620","ความคืบหน้า"), $xlscelldesc_header1);
            $worksheet->write(G3,iconv("utf-8","tis-620","วันที่แล้วเสร็จ"), $xlscelldesc_header1);
			$worksheet->write(H3,iconv("utf-8","tis-620","ผู้รับผิดชอบ"), $xlscelldesc_header1);
			$worksheet->write(I3,iconv("utf-8","tis-620","หมายเหตุ"), $xlscelldesc_header1);
			$worksheet->write(J3,iconv("utf-8","tis-620","สถานะงาน"), $xlscelldesc_header1);
            $xlsRow = 4;
			
			if(empty($_POST['date_regis1']) and empty($_POST['date_regis2']) and empty($_POST['service_id'])){			
				$sql_1= "select * from tb_register
				inner join tb_division on tb_register.re_dep=tb_division.div_id
				inner join tb_regstatus on tb_register.status=tb_regstatus.rs_id
				inner join tb_com on tb_register.register_id=tb_com.register_id
				inner join tb_service on (tb_register.service_id = tb_service.service_id)
				order by tb_register.date_regis desc,
				tb_register.time_regis desc";
			}else{
				$sql_1= "select * from tb_register
				inner join tb_division on tb_register.re_dep=tb_division.div_id
				inner join tb_regstatus on tb_register.status=tb_regstatus.rs_id
				inner join tb_com on tb_register.register_id=tb_com.register_id
				inner join tb_service on (tb_register.service_id = tb_service.service_id)
				 where tb_register.date_regis between '$_POST[date_regis1]' and '$_POST[date_regis2]'
                and tb_register.service_id = '$_POST[service_id]'
				order by tb_register.date_regis desc,
				tb_register.time_regis desc";
			}
			
			$rs = mysql_query($sql_1);
			$row=mysql_num_rows($rs);
            # ตรงนี้คือดึงข้อมูลจาก mysql มาใส่ใน Cell
                #while(list($per_pname, $per_fnamet, $per_lnamet, $per_email)=mysql_fetch_row($rs)) {
				while($ob = mysql_fetch_array($rs)){
                    ++$i;
					
					$date_regis=date_sub($ob["date_regis"],"y");
					
					//check technic name
					if($ob["technic_name"]==""){
						$rs2=mysql_query("select * from tb_user where user_id='$ob[technic_id]'");
						$ob2=mysql_fetch_assoc($rs2);
						$technicName=$ob2["name"]." ".$ob2["surname"];
					}else{
						$technicName=$ob["technic_name"];
					}
					//check technic name
									
					if($ob["date_repair"] != ""){ 
						$date_repair=date_sub($ob["date_repair"],"y");
					}else{ 
						$date_repair="";
					}
						
                        $worksheet->set_row($xlsRow, 22);
						$worksheet->write("A$xlsRow", iconv('utf-8', 'tis-620', $ob['servicename']), $xlsCellDesc);
                        $worksheet->write("B$xlsRow", $ob['register_id'], $xlsCellDesc);
						 $worksheet->write("C$xlsRow", $date_regis, $xlsCellDesc);
						  $worksheet->write("D$xlsRow", iconv("utf-8","tis-620",$ob[division]), $xlsCellDesc);
                        $worksheet->write("E$xlsRow", iconv("utf-8","tis-620",$ob[comname]), $xlsCellDesc); 
                        $worksheet->write("F$xlsRow", iconv("utf-8","tis-620",$ob[report_tech]), $xlsCellDesc);
                        $worksheet->write("G$xlsRow", $date_repair, $xlsCellDesc);
						$worksheet->write("H$xlsRow", iconv("utf-8","tis-620",$technicName),  $xlsCellDesc);
						$worksheet->write("I$xlsRow", iconv("utf-8","tis-620",$ob[solve]),  $xlsCellDesc);
						$worksheet->write("J$xlsRow", iconv("utf-8","tis-620",$ob['rs_title']),  $xlsCellDesc);
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
                header("Content-Disposition: attachment; filename=".basename(date('dmYHis').".xls").";");
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