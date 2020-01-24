<?php
	/*harold gutierez 23/01/2020*/	
	/*Funciones de eventos botones con el crud de bd*/	

	session_start();
	require_once('../core/conexion.php');
	require_once('../controller/usuarios.php');


	$usuario = new usuario;

	$operacion=$_POST["operacion"];


		switch ($operacion) {

			case "logeo":	
							$usuario=$_POST["usuario"];	
							$password=$_POST["password"];	
							$sql = "SELECT perfil FROM tusuarios where email ='".$usuario."' and password='".$password."'";
					        $perfil ='NEXISTE';
					        $result = $mysqli->query($sql);

						        while($row= $result->fetch_array(MYSQLI_BOTH)){
						             $perfil =$row[0];
						             $_SESSION["perfil"]=$row[0];
						        }

					        echo $perfil;

							break;



			case "guardar":
							if ($_SESSION["idusuario"] !=''){
								$sql = "delete from tusuarios where id_usuario=".$_SESSION["idusuario"];
							    $result= $mysqli->query($sql);
							 }   
							$usuario->setNombres($_POST["nombres"]);
							$usuario->setApellidos($_POST["apellidos"]);
							$usuario->setEmail($_POST["email"]);
							$usuario->setPassword($_POST["password"]);
							$usuario->setPais($_POST["pais"]);
							$usuario->setPerfil($_POST["perfil"]);

							$sql = "INSERT INTO tusuarios (nombre,apellidos,password,email,pais,perfil) values ('";
							$sql.= $usuario->getNombres()."','";
							$sql.= $usuario->getApellidos()."','";
							$sql.= $usuario->getPassword()."','";
							$sql.= $usuario->getEmail()."','";
							$sql.= $usuario->getPais()."','";
							$sql.= $usuario->getPerfil()."')";
							

							if (!$result= $mysqli->query($sql)) {
								echo "0,Se presento un error no se pudo grabar";

							}else{
								echo "1,Se Grabo la informacion correctamente";	
							}
							$_SESSION["idusuario"] ='';
							break;

							

			case "buscar":
						  $consulta=$_POST["consulta"];	
		                  $sql = "SELECT nombre,apellidos,email,pais,perfil,id_usuario FROM tusuarios WHERE CONCAT(nombre, ' ', apellidos, ' ', email,' ', pais,' ' ,perfil) LIKE '%".$consulta."%'";
		                  $result = $mysqli->query($sql);
		                  	$control ='';
               $control = '<table class="table">
                  <thead>
                    <tr>
                      <th scope="col">NOMBRE</th>
                      <th scope="col">APELLIDOS</th>
                      <th scope="col">EMAIL</th>
                      <th scope="col">PAIS</th>
                      <th scope="col">PERFIL</th>
                      <th scope="col"></th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>';

		                    while($row= $result->fetch_array(MYSQLI_BOTH)){
		                        $control.= '<tr>';
		                        $control.= '<td>'.$row[0].'</td>';
		                        $control.= '<td>'.$row[1].'</td>';
		                        $control.= '<td>'.$row[2].'</td>';
		                        $control.= '<td>'.$row[3].'</td>';
		                        $control.= '<td>'.$row[4].'</td>';
		                        $control.= '<td><div class="input-group-append">';
		                        $control.= '<button type="button" class="btn btn-primary px-3" title="Modificar" onclick="modificar('.$row[5].')"><i class="far fa-edit"></i></button>&nbsp&nbsp';
		                        $control.= '<button type="button" class="btn btn-primary px-3" title="Eliminar" onclick="Eliminar('.$row[5].')"><i class="far fa-trash-alt"></i></button></td></tr>';
		

								}
                    $control.='    </tr>

                     				</tbody>
                				</table>';
							if ($control!=''){
								echo '1|'.$control;
							}else{
								echo '0|'.$control;
							}	

							break;

			case 'eliminar':
							$idusuario=$_POST["idusuario"];	
							$sql = "delete from tusuarios where id_usuario=".$idusuario;

							if (!$result= $mysqli->query($sql)) {
								echo "0,Se presento un error no se pudo eliminar";

							}else{
								echo "1,Se Elimino la informacion correctamente";	
							}
							break;

			case 'modificar':
						  $_SESSION["idusuario"] ='';		
						  $idusuario=$_POST["idusuario"];	
		                  $sql = "SELECT nombre,apellidos,email,password,pais,perfil FROM tusuarios WHERE id_usuario=".$idusuario;
		                  $result = $mysqli->query($sql);
						        while($row= $result->fetch_array(MYSQLI_BOTH)){
						             $usuario->setNombres($row[0]);
									 $usuario->setApellidos($row[1]);
									 $usuario->setEmail($row[2]);
									 $usuario->setPassword($row[3]);
									 $usuario->setPais($row[4]);
									 $usuario->setPerfil($row[5]);	
									 $usuario->setCodigo($idusuario);	
									 $_SESSION["idusuario"] = $idusuario;    

						        }
						    $scrusuario ='';    
							$scrusuario.= $usuario->getNombres()."|";
							$scrusuario.= $usuario->getApellidos()."|";
							$scrusuario.= $usuario->getEmail()."|";
							$scrusuario.= $usuario->getPassword()."|";
							$scrusuario.= $usuario->getPais()."|";
							$scrusuario.= $usuario->getPerfil();						        
							echo $scrusuario;

							break;
				case 'salir':
								$_SESSION["perfil"]='';			
			


		}					


?>