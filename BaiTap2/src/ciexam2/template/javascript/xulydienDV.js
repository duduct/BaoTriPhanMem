// JavaScript Document
$("document").ready(function(){
		$("#ketqua tr:not(#ketqua tr:eq(0))").click(function (evt){
			Dien($(this).html());
		});
	});
	function Dien(str){
		var bo=chuoigt(str);
		var result=['','','','',''];
		for (var i=0;i<5;i++){
			if (bo=="") {
				bo='<td></td>';
			}
			str=str.substring(str.indexOf(bo)+bo.length, str.length);
			bo=chuoigt(str);
			result[i]=bo;
		}
		document.getElementById("txtM_DV").value=result[0];
		document.getElementById("txtT_DV").value=result[1];
		document.getElementById("txtTK").value=result[2];
		document.getElementById("txtMK").value=result[3];
		document.getElementById("txtQ").value=result[4];
	}
	function chuoigt(str){
		var t1=str.indexOf("<td>");
		var t2=str.indexOf("<",t1+4);
		return str.substring(t1+4,t2);
	}