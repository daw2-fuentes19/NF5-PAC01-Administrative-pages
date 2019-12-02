<?php 
$link = mysqli_connect("localhost", "root") or //me conecto a la base de datos
die ('Unable to connect. Check your connection parameters.');

mysqli_select_db($link, 'EquiposFutbol') or die(mysqli_error($link));
echo "pagina personas";

if ($_GET['action'] == 'edit') {
    echo "Entra en edit";
    //retrieve the record's information
    $query = 'SELECT
    * FROM
    Personas
    WHERE
    idPersona = ' . $_GET['id'];
    $result = mysqli_query($link, $query) or die(mysqli_error($link));
    
    $personas = mysqli_fetch_assoc($result);
    } else {
    //set values to blank
    $personas["nombrePersona"] = "";
    $personas["esDirector"] = 1;
    $personas["esJugador"] = 1;
   
    }
    ?>


<html>
 <head>
  <title><?php echo ucfirst($_GET['action']); ?> Equipos</title>
 </head>
<body>
  <form action="commit.php?action=<?php echo $_GET['action']; ?>&type=people&id=<?php echo $_GET['id'];?>" method="post">
   <table>
    <tr>
     <td>Nombre Persona</td>
     <td><input type="text" name="nombrePersona"
      value="<?php echo $personas["nombrePersona"]; ?>"/></td>
    </tr>
    <tr>
     <td>Es director</td>
     <td><input type="number" name="esDirector" value="<?php echo $personas["esDirector"]; ?>"></td>
    </tr>
    <tr>
     <td>Es Jugador</td>
     <td><input type="number" name="esJugador" value="<?php echo $personas["esJugador"]; ?>"></td>
    </tr>
    <tr>
    <td><input type="submit" value="Guardar"></td>
    </tr>
   </table>
  </form>
</body> 
</html>