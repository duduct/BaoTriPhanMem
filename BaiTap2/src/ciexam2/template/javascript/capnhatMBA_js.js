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
function change_DienAp(){
	if(document.getElementById('sl_dienap').value != '----')
	{
		document.getElementById('dienap').value=document.getElementById('sl_dienap').value;
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
function check2()
{	
	if(document.getElementById('c3').checked==true) {
		document.getElementById('matt').disabled=false;
		document.getElementById('chitiet_tt').disabled=false;
		document.getElementById('ghichu').disabled=false;
		}
	else {
		document.getElementById('matt').disabled=true;
		document.getElementById('chitiet_tt').disabled=true;
		document.getElementById('ghichu').disabled=true;
		}
		
}

// function kiemtra()
// { 	
// 	var pattern1 = /^[A-Z]*[a-z]*$/; 
// 	 if(isNaN(document.getElementById('namnv').value) || document.getElementById('namnv').value < 0)
// 	{
// 		alert("Năm nhập về phải nhập số lớn hơn 0");
// 		document.getElementById('namnv').focus();
// 		return false;
// 	}
// 	else if(isNaN(document.getElementById('congsuat').value) || document.getElementById('congsuat').value < 0)
// 	{
// 		alert("Công suất phải nhập số lớn hơn 0");
// 		document.getElementById('congsuat').focus();
// 		return false;
// 	}
// 	else if(document.getElementById('dienap').value != ""){ 
// 		if(pattern1.test(document.getElementById('dienap').value) || document.getElementById('dienap').value < 0)
// 		{
// 			alert("Điện áp phải nhập số lớn hơn 0");
// 			document.getElementById('dienap').focus();
// 			return false;
// 		}
// 	}
// 	else if(isNaN(document.getElementById('chieudai').value))
// 	{
// 		alert("Chiều dài phải nhập số");
// 		document.getElementById('chieudai').focus();
// 		return false;
// 	}
// 	else if(isNaN(document.getElementById('chieurong').value))
// 	{
// 		alert("Chiều rộng phải nhập số");
// 		document.getElementById('chieurong').focus();
// 		return false;
// 	}
// 	else if(isNaN(document.getElementById('chieucao').value))
// 	{
// 		alert("Chiều cao phải nhập số");
// 		document.getElementById('chieucao').focus();
// 		return false;
// 	}
// 	else if(isNaN(document.getElementById('tlruotmay').value))
// 	{
// 		alert("Trọng lượng ruột máy phải nhập số");
// 		document.getElementById('tlruotmay').focus();
// 		return false;
// 	}
// 	else if(isNaN(document.getElementById('tldau').value))
// 	{
// 		alert("Trọng lượng dầu phải nhập số");
// 		document.getElementById('tldau').focus();
// 		return false;
// 	}
// 	else if(isNaN(document.getElementById('tongtl').value))
// 	{
// 		alert("Tổng trọng lượng phải nhập số");
// 		document.getElementById('tongtl').focus();
// 		return false;
// 	}
// }

