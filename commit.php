<?php

var_dump($_POST);
?>
<?php
$db = mysqli_connect('localhost', 'root') or 
    die ('Unable to connect. Check your connection parameters.');
mysqli_select_db($db,'EquiposFutbol') or die(mysqli_error($db));
?>
<html>
 <head>
  <title>Commit</title>
 </head>
 <body>
<?php
switch ($_GET['action']) {
case 'add':
    switch ($_GET['type']) {
    case 'team':
        echo "entra en movie";
        $query = 'INSERT INTO
            Equipos
                (nombresEquipos, ciudadEquipos, anyoCreacion, categoriaEquipo,
                duenyoEquipo)
            VALUES
                ("' . $_POST['nombresEquipos'] . '",
                 "' . $_POST['ciudadEquipos'] . '",
                 ' . $_POST['anyoCreacion'] . ',
                 ' . $_POST['categoriaEquipo'] . ',
                 ' . $_POST['duenyoEquipo'] . ')';
        break;
        case 'people':
            echo "entra en people";
            $query = 'INSERT INTO
                Personas
                    (nombrePersona, esDirector, esJugador)
                VALUES
                    ("' . $_POST['nombrePersona'] . '",
                     ' . $_POST['esDirector'] . ',
                     ' . $_POST['esJugador'] . ')';
            break;

    }
    
    echo "Esta es la query";
    echo $query;
    if (mysqli_query($db,$query)) {
        echo "La query se creó correctamente\n";
    } else {
        echo 'Error al crear la query: ' . mysqli_error($db) . "\n";
    }
    
    break;
case 'edit':
    switch ($_GET['type']) {
    case 'team':
        $query = 'UPDATE Equipos SET
                nombresEquipos = "' . $_POST['nombresEquipos'] . '",
                ciudadEquipos = "' . $_POST['ciudadEquipos'] . '",
                anyoCreacion = ' . $_POST['anyoCreacion'] . ',
                categoriaEquipo = ' . $_POST['categoriaEquipo'] . ',
                duenyoEquipo = ' . $_POST['duenyoEquipo'] . '
            WHERE
            idEquipos = ' . $_GET['id'];
        break;

        case 'people':
            echo "Se han editado los datos!!!";
            $query = 'UPDATE Personas SET
                    nombrePersona = "' . $_POST['nombrePersona'] . '",
                    esDirector = "' . $_POST['esDirector'] . '",
                    esJugador = ' . $_POST['esJugador'] . '
                WHERE
                idPersona = ' . $_GET['id'];
            break;

    }
  
    if (mysqli_query($db,$query)) {
        echo "La query se creó correctamente\n";
    } else {
        echo 'Error al crear la query: ' . mysqli_error($db) . "\n";
    }
    break;
}

if (isset($query)) {
    $result = mysqli_query($db, $query) or die(mysqli_error($db));
}
?>
  <p>Done!</p>
 </body>
</html>