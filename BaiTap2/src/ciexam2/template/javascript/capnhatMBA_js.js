// JavaScript Document
function xoa_mba(){
							var t=confirm("Bạn có chắc chắn xóa? ")
							if (t==true)
								document.getElementById('bXoa').submit();
							else return false;
						}
function change_Dau(){
	if(document.getElementById('sl_dau').value != '----')
	{
		document.getElementById('loaidau').value=document.getElementById('sl_dau').value;
		} 
	}
function change_QG(){
	if(document.getElementById('sl_qg').value != '----')
	{
		document.getElementById('quocgiasx').value=document.getElementById('sl_qg').value;
		} 
	}
function khoitao()
{
	document.getElementById('matram').disabled=true;
	document.getElementById('ngaybd').disabled=true;
	document.getElementById('ngaykt').disabled=true;
	document.getElementById('ma_dt').disabled=true;
	document.getElementById('ngay_dt').disabled=true;
	document.getElementById('nd_daitu').disabled=true;
}
function check()
{	
	if(document.getElementById('c1').checked==true) {
		document.getElementById('matram').disabled=false;
		document.getElementById('ngaybd').disabled=false;
		document.getElementById('ngaykt').disabled=false;
		}
	else {
		document.getElementById('matram').disabled=true;
	document.getElementById('ngaybd').disabled=true;
	document.getElementById('ngaykt').disabled=true;
		}
}
function kiemtra()
{ 	
	sx=parseInt(document.getElementById('namsx').value);
	nv=parseInt(document.getElementById('namnv').value);
	if( sx > nv) 
	{	
		alert("Vui lòng nhập lại năm");
		document.getElementById('namnv').focus();
		return false;
	
	}
	else if(isNaN(document.getElementById('namsx').value))
	{
		alert("năm sản xuất phải nhập số");
		document.getElementById('namsx').focus();
		return false;
	}
	else if(isNaN(document.getElementById('namnv').value))
	{
		alert("năm nhập về phải nhập số");
		document.getElementById('namnv').focus();
		return false;
	}
	else if(isNaN(document.getElementById('congsuat').value))
	{
		alert("Công suất phải nhập số");
		document.getElementById('congsuat').focus();
		return false;
	}
	else if(isNaN(document.getElementById('dienap').value))
	{
		alert("Điện áp phải nhập số");
		document.getElementById('dienap').focus();
		return false;
	}
	else if(isNaN(document.getElementById('chieudai').value))
	{
		alert("Chiều dài phải nhập số");
		document.getElementById('chieudai').focus();
		return false;
	}
	else if(isNaN(document.getElementById('chieurong').value))
	{
		alert("Chiều rộng phải nhập số");
		document.getElementById('chieurong').focus();
		return false;
	}
	else if(isNaN(document.getElementById('chieucao').value))
	{
		alert("Chiều cao phải nhập số");
		document.getElementById('chieucao').focus();
		return false;
	}
	else if(isNaN(document.getElementById('tlruotmay').value))
	{
		alert("Trọng lượng ruột máy phải nhập số");
		document.getElementById('tlruotmay').focus();
		return false;
	}
	else if(isNaN(document.getElementById('tldau').value))
	{
		alert("Trọng lượng dầu phải nhập số");
		document.getElementById('tldau').focus();
		return false;
	}
	else if(isNaN(document.getElementById('tongtl').value))
	{
		alert("Tổng trọng lượng phải nhập số");
		document.getElementById('tongtl').focus();
		return false;
	}
}
function check1()
{	
	if(document.getElementById('c2').checked==true) {
		document.getElementById('ma_dt').disabled=false;
		document.getElementById('ngay_dt').disabled=false;
		document.getElementById('nd_daitu').disabled=false;
		}
	else {
		document.getElementById('ma_dt').disabled=true;
	document.getElementById('ngay_dt').disabled=true;
	document.getElementById('nd_daitu').disabled=true;
		}
}
