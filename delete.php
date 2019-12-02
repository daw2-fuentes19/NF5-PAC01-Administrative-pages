<?php
$db = mysqli_connect('localhost', 'root', '') or 
    die ('Unable to connect. Check your connection parameters.');
mysqli_select_db($db, "EquiposFutbol") or die(mysqli_error($db));

if (!isset($_GET['do']) || $_GET['do'] != 1) {
    switch ($_GET['type']) {
    case 'movie':
        echo 'Are you sure you want to delete this movie?<br/>';
        break;
    case 'people':
        echo 'Are you sure you want to delete this person?<br/>';
        break;
    } 
    echo '<a href="' . $_SERVER['REQUEST_URI'] . '&do=1">yes</a> '; 
    echo 'or <a href="admin.php">no</a>';
} else {
    switch ($_GET['type']) {
    case 'people':
        $query = 'UPDATE Personas SET
                esDirector = 0 
            WHERE
            esDirector = ' . $_GET['id'];
        $result = mysqli_query($db, $query) or die(mysqli_error($db));

        $query = 'DELETE FROM Personas 
            WHERE
                idPersona = ' . $_GET['id'];
        $result = mysqli_query($db, $query) or die(mysqli_error($db));
?>
<p style="text-align: center;">Your person has been deleted.
<a href="admin.php">Return to Index</a></p>
<?php
        break;
    case 'team':
        $query = 'DELETE FROM equipos 
            WHERE
                idEquipos = ' . $_GET['id'];
        $result = mysqli_query($db, $query) or die(mysqli_error($db));
?>
<p style="text-align: center;">Your movie has been deleted.
<a href="admin.php">Return to Index</a></p>
<?php
        break;
    }
}
?>