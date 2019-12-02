<?php

$link = mysqli_connect("localhost", "root") or //me conecto a la base de datos
    die ('Unable to connect. Check your connection parameters.');

mysqli_select_db($link, 'EquiposFutbol') or die(mysqli_error($link));

if ($_GET['action'] == 'edit') {
//retrieve the record's information
$query = 'SELECT
* FROM
Equipos
WHERE
idEquipos = ' . $_GET['id'];
$result = mysqli_query($link, $query) or die(mysqli_error($link));

$equipo = mysqli_fetch_assoc($result);
} else {
//set values to blank
$equipo["nombresEquipos"] = "";
$equipo["ciudadEquipos"] = "";
$equipo["anyoCreacion"] = 1800;
$equipo["categoriaEquipo"] = 1;
$equipo["duenyoEquipo"] = 1;
$equipo["equipo_running_time"] = 0;
$equipo["equipo_cost"] = 0;
$equipo["equipo_takings"] = 0;
}
?>


<html>
 <head>
  <title><?php echo ucfirst($_GET['action']); ?> Equipos</title>
 </head>
<body>
  <form action="commit.php?action=<?php echo $_GET['action']; ?>&type=team&id=<?php echo $_GET['id'];?> " method="post">
   <table>
    <tr>
     <td>Nombre Equipo</td>
     <td><input type="text" name="nombresEquipos"
      value="<?php echo $equipo["nombresEquipos"]; ?>"/></td>
    </tr>
    <tr>
     <td>team ciudad</td>
     <td><input type="text" name="ciudadEquipos" value="<?php echo $equipo["ciudadEquipos"]; ?>"></td>
    </tr>
    <tr>
     <td>team Year</td>
     <td><input type="number" name="anyoCreacion" value="<?php echo $equipo["anyoCreacion"]; ?>"></td>
    </tr>
    <tr>
     <td>categoria</td>
     <td><input type="number" name="categoriaEquipo" value="<?php echo $equipo["categoriaEquipo"]; ?>"></td>
    </tr>
    <tr>
     <td>dueño</td>
     <td><input type="number" name="duenyoEquipo" value="<?php echo $equipo["duenyoEquipo"]; ?>"></td>
    </tr>
    
    <tr>
     <td>running time</td>
     <td><input type="number" name="time" value="<?php echo $equipo["equipo_running_time"]; ?>"></td>
    </tr>
    <tr>
     <td>cost</td>
     <td><input type="number" step="0.1" name="cost" value="<?php echo $equipo["equipo_cost"]; ?>"></td>
    </tr>
    <tr>
     <td>taking</td>
     <td><input type="number" step="0.1" name="taking" value="<?php echo $equipo["equipo_takings"]; ?>"></td>
    </tr>
    <tr>
    
    <td><input type="submit" value="Guardar"></td>
    </tr>
   </table>
  </form>
</body> 
</html>

 