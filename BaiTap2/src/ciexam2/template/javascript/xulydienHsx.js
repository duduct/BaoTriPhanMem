// JavaScript Document
$("document").ready(function(){
		$("#ketquahsx tr:not(#ketquahsx tr:eq(0))").click(function (evt){
			Dien($(this).html());
		});
	});
	function Dien(str){
		var bo=chuoigt(str);
		var result=['',''];
		for (var i=0;i<2;i++){
			if (bo=="") {
				bo='<td></td>';
			}
			str=str.substring(str.indexOf(bo)+bo.length, str.length);
			bo=chuoigt(str);
			result[i]=bo;
		}
		document.getElementById("txtM_Hsx").value=result[0];
		document.getElementById("txtT_Hsx").value=result[1];
	}
	function chuoigt(str){
		var t1=str.indexOf("<td>");
		var t2=str.indexOf("<",t1+4);
		return str.substring(t1+4,t2);
	}