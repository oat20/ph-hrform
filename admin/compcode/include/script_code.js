function checkval(form) 
{
  		if (form.title_pic.value == "") 
		{
       			alert("��س��������� ��������ͧ");
          		form.title_pic.focus();
          		return false;
        }
  
  		if (form.detaile_pic1.value == "") 
		{
       			alert("��س������������´�Ӣ�鹵�");
          		form.detaile_pic1.focus();
          		return false;
        }
		
				if (form.detaile_pic.value == "") 
		{
       			alert("��س������������´��س������������´");
          		form.detaile_pic.focus();
          		return false;
        }
		//form.day.disabled = false;
		//form.month.disabled = false;
		//form.year.disabled = false;
}