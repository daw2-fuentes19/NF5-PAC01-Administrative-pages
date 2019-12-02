 <?php


$link = mysqli_connect("localhost", "root") or //me conecto a la base de datos
    die ('Unable to connect. Check your connection parameters.');
    
    
mysqli_select_db($link,'EquiposFutbol') or die(mysqli_error($link));//selecciono la bd
?>
<html>
<head>
<title>Equipos database</title>
<style type="text/css">
   th { background-color: #999;}
   .odd_row { background-color: #EEE; }
   .even_row { background-color: #FFF; }
  </style>
</head>
<body>

<table style="width:100%;">
  <tr>
  <th colspan="2">Equipos <a href="team.php?action=add">[ADD]</a></th>
  </tr>
<?php
$query = 'SELECT * FROM Equipos';
$result = mysqli_query($link, $query) or die (mysqli_error($link));
$odd = true;
while ($row = mysqli_fetch_assoc($result)) {
    echo ($odd == true) ? '<tr class="odd_row">' : '<tr class="even_row">';
    $odd = !$odd; 
    echo '<td style="width:75%;">'; 
    echo $row['nombresEquipos'];
    echo '</td><td>';
    echo ' <a href="team.php?action=edit&id=' . $row['idEquipos'] . '"> [EDIT]</a>'; 
    echo ' <a href="delete.php?type=team&id=' . $row['idEquipos'] . '"> [DELETE]</a>';
    echo '</td></tr>';
}
?>
  <tr>
    <th colspan="2">People <a href="people.php?action=add"> [ADD]</a></th>
  </tr>
<?php
$query = 'SELECT * FROM Personas';
$result = mysqli_query($link, $query) or die (mysqli_error($link));
$odd = true;
while ($row = mysqli_fetch_assoc($result)) {
    echo ($odd == true) ? '<tr class="odd_row">' : '<tr class="even_row">';
    $odd = !$odd; 
    echo '<td style="width: 25%;">'; 
    echo $row['nombrePersona'];
    echo '</td><td>';
    echo ' <a href="people.php?action=edit&id=' . $row['idPersona'] .
        '"> [EDIT]</a>'; 
    echo ' <a href="delete.php?type=people&id=' . $row['idPersona'] .
        '"> [DELETE]</a>';
    echo '</td></tr>';
}
?>
  </table>
</body>
</html>




























