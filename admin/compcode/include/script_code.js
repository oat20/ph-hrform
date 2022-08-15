function checkval(form) 
{
  		if (form.title_pic.value == "") 
		{
       			alert("กรุณาใส่ข้อมูล ชื่อเรื่อง");
          		form.title_pic.focus();
          		return false;
        }
  
  		if (form.detaile_pic1.value == "") 
		{
       			alert("กรุณาใส่รายละเอียดคำขึ้นต้น");
          		form.detaile_pic1.focus();
          		return false;
        }
		
				if (form.detaile_pic.value == "") 
		{
       			alert("กรุณาใส่รายละเอียดกรุณาใส่รายละเอียด");
          		form.detaile_pic.focus();
          		return false;
        }
		//form.day.disabled = false;
		//form.month.disabled = false;
		//form.year.disabled = false;
}