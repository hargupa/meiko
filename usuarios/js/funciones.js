function logeo(){	
	var usuario = document.getElementById('usuario').value;	
	var password = document.getElementById('password').value;	

	$.ajax({
			type:"post",
			url:"funcionsql.php",
			data:"operacion=logeo&usuario="+usuario+"&password="+password,


			success:function(data){
					var str_data_form = data;
					str_data_form = str_data_form.trim()	
					if (str_data_form.trim() =='NEXISTE'){
						/*var str1 = arr_str['1'].substring(0,  3);
						if (str1.toLowerCase()!='www'){
							var ctrl_select=document.getElementById('pages');
							ctrl_select.value=arr_str['1'];
						}else{
							document.getElementById("texturl").value=arr_str['1'];	
						}
						document.getElementById("textmsg").value=arr_str['2'];
						alert('Se Actualizo redireccionamiento de formulario');*/
						alert('Usuario o contraseña incorrectos');
						
					}else{
						window.open('view/listausuarios.php','_self');
					}				
					
			}	


		})



}	


