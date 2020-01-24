/*HAROLD GUTIERREZ 24/01/2020*/

/*Funciones para los eventos de los formularios*/



function logeo(){	
	var usuario = document.getElementById('usuario').value;	
	var password = document.getElementById('password').value;	

	$.ajax({
			type:"post",
			url:"model/funcionsql.php",
			data:"operacion=logeo&usuario="+usuario+"&password="+password,


			success:function(data){
					var str_data_form = data;
					str_data_form = str_data_form.trim()	
					if (str_data_form.trim() =='NEXISTE'){
						alert('Usuario o contraseña incorrectos');
						
					}else{
						window.open('view/listausuarios.php','_self');
					}				
					
			}	


		})



}	



function salir(){	

	$.ajax({
			type:"post",
			url:"../model/funcionsql.php",
			data:"operacion=salir",


			success:function(data){
						window.open('../index.html','_self');
				
			}	


		})



}



function bloquear(perfil){
	alert(perfil);
	if (perfil!='Administrador'){

		document.getElementById('guardar').style.display = 'block';
	}
}


function Guardar(){
	var nombres = document.getElementById('nombres').value;	
	var apellidos = document.getElementById('apellidos').value;	
	var email = document.getElementById('email').value;	
	var password = document.getElementById('contrasena').value;	
	var pais = document.getElementById('pais').value;	
	var perfil ;

	if (nombres!='' && apellidos!='' && email!='' && password!='' && pais!='CERO'){
			if(document.getElementById('defaultUnchecked').checked){
				perfil = 'Administrador';
			}else{
				perfil = 'Usuario';
			}


			$.ajax({
					type:"post",
					url:"../model/funcionsql.php",
					data:"operacion=guardar&nombres="+nombres+"&apellidos="+apellidos+"&email="+email+"&password="+password+"&pais="+pais+"&perfil="+perfil,


					success:function(data){
						var str_data_form = data;

						var arr_str = str_data_form.split(",");
						var resp_srv = parseInt(arr_str['0']);
	
							if (resp_srv==1){
								alert(arr_str['1']);
								location.reload();
								
							}else{
								alert(arr_str['1']);
							}				
							
					}	


				})


	}else{

		alert('Debe llenar todos los campos de los formularios');

	}



}


function Buscar(){
	var consulta = document.getElementById('textobuscar').value;	
	if (consulta!=''){

			$.ajax({
					type:"post",
					url:"../model/funcionsql.php",
					data:"operacion=buscar&consulta="+consulta,


					success:function(data){
						var str_data_form = data;
						var arr_str = str_data_form.split("|");
						var resp_srv = parseInt(arr_str['0']);
							if (resp_srv==1){
								document.getElementById("datostabla").innerHTML=arr_str['1'];;
								
							}else{
								alert('No se encontro consulta');
							}				
							
					}	


				})


	}else{

		alert('Debe llenar todos los campos de los formularios');

	}



}



function modificar(idusuario){

			$.ajax({
					type:"post",
					url:"../model/funcionsql.php",
					data:"operacion=modificar&idusuario="+idusuario,


					success:function(data){
						var str_data_form = data;

						var arr_str = str_data_form.split("|");

						document.getElementById('nombres').value=arr_str['0'];	
						document.getElementById('apellidos').value=arr_str['1'];	
						document.getElementById('email').value=arr_str['2'];	
						document.getElementById('contrasena').value=arr_str['3'];	
						document.getElementById('pais').value=arr_str['4'];

							if(arr_str['5']=='Administrador'){
								document.getElementById('defaultUnchecked').checked=true;
							}else{
								document.getElementById('defaultChecked').checked=true;
							}

							
					}	


				})




}


function Eliminar(idusuario){
	var eliminar=confirm("¿Deseas eliminar este registro?");

	if (eliminar){
		$.ajax({
				type:"post",
				url:"../model/funcionsql.php",
				data:"operacion=eliminar&idusuario="+idusuario,


				success:function(data){
					var str_data_form = data;

					var arr_str = str_data_form.split(",");
					var resp_srv = parseInt(arr_str['0']);

						if (resp_srv==1){
							alert(arr_str['1']);
							location.reload();
							
						}else{
							alert(arr_str['1']);
						}				
						
				}	


			})

	}	


}