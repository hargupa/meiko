<?php
	session_start();
	require_once('core/conexion.php');
	require_once('controller/usuarios.php');

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
						        }

					        echo $perfil;

							break;


		}







?>