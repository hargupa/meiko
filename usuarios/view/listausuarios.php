<?php 
  session_start();
  require_once('../core/conexion.php');
  if ($_SESSION["perfil"]==''){
      header('Location: index.html');
  }
  

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="robots" content="noindex, nofollow">

 <link rel="shortcut icon" href="https://grupomeiko.com/wp-content/uploads/2018/03/favicon-16x16.png" />
  <title>Grupo Meiko</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <script src="../js/jquery-3.3.1.min.js"></script>
    <script src="../js/funciones.js"></script>
    <link rel="stylesheet" href="css/animate.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
    <!-- Google Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap">
    <!-- Bootstrap core CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">
    <!-- Material Design Bootstrap -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.12.0/css/mdb.min.css" rel="stylesheet">
    <script src="//cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.bundle.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.bundle.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.min.js"></script>

</head>
<body onload="bloquear(<?php echo $_SESSION["perfil"];?>);">


<div class="wrapper fadeInDown">
  <br><br>
  <div style="margin:10px;left:10px;" class="form-inline md-form form-sm mt-0">
  <button type="button" class="btn btn-primary" onclick="salir();">Salir</button>
  &nbsp&nbsp&nbsp&nbsp&nbsp
  <form class="form-inline md-form form-sm mt-0">
  <a href="#" onclick="Buscar();"><i class="fas fa-search" aria-hidden="true"></i></a>
  <input class="form-control form-control-sm ml-3 w-80" type="text" id="textobuscar" placeholder="Buscar"
    aria-label="Search">
  </form></div>
  <div class="form-inline md-form form-sm mt-0">
    &nbsp&nbsp
    <input class="form-control form-control-sm" type="text" id="nombres" placeholder="Nombres">   
    &nbsp&nbsp
    <input class="form-control form-control-sm" type="text" id="apellidos" placeholder="Apellidos">   

    &nbsp&nbsp
    <input class="form-control form-control-sm" type="text" id="email" placeholder="Email">   
    &nbsp&nbsp
    <input class="form-control form-control-sm" type="password" id="contrasena" placeholder="Contraseña">   
    &nbsp&nbsp

   <select class="form-control-sm" id="pais">
   <option value="CERO" selected>Selecciones Pais</option>
        <?php
        $data = file_get_contents("https://pkgstore.datahub.io/core/country-list/data_json/data/8c458f2d15d9f2119654b29ede6e45b8/data_json.json");
        $products = json_decode($data, true);

        foreach ($products as $product) {
            echo '<option value="'.$product['Name'].'">';
            echo $product['Name'];
            echo '</option>';
        }
        ?>
    </select>    
    &nbsp&nbsp
<div class="custom-control custom-radio">
  <input type="radio" class="custom-control-input" id="defaultUnchecked" name="defaultExampleRadios">
  <label class="custom-control-label" for="defaultUnchecked">Administrador</label>
</div>
 &nbsp&nbsp
<!-- Default checked -->
<div class="custom-control custom-radio">
  <input type="radio" class="custom-control-input" id="defaultChecked" name="defaultExampleRadios" checked>
  <label class="custom-control-label" for="defaultChecked">Usuario</label>
</div>
 &nbsp&nbsp


    <button type="button" class="btn btn-primary px-3" title="Guardar" onclick="Guardar();" id="guardar"><i class="far fa-save"></i></button>&nbsp&nbsp

  </div>
  <br>
  <div id="formContent">




        <div id="datostabla">
        <?php
               echo '<table class="table">
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

                  $sql = "SELECT nombre,apellidos,email,pais,perfil,id_usuario FROM tusuarios order by nombre";
                  $result = $mysqli->query($sql);

                    while($row= $result->fetch_array(MYSQLI_BOTH)){
                        echo '<tr>';
                        echo '<td>'.$row[0].'</td>';
                        echo '<td>'.$row[1].'</td>';
                        echo '<td>'.$row[2].'</td>';
                        echo '<td>'.$row[3].'</td>';
                        echo '<td>'.$row[4].'</td>';
                        echo '<td><div class="input-group-append">';
                        echo '<button type="button" class="btn btn-primary px-3" title="Modificar" onclick="modificar('.$row[5].')"><i class="far fa-edit"></i></button>&nbsp&nbsp';
                        echo '<button type="button" class="btn btn-primary px-3" title="Eliminar" onclick="Eliminar('.$row[5].')"><i class="far fa-trash-alt"></i></button></td></tr>';

                        
                    }
                    echo'    </tr>

                     </tbody>
                </table>';


        ?>
      </div>





  </div>
</div>

</body>
</html>