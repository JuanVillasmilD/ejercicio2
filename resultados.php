<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Estudiantes</title>
    <link rel="stylesheet" href="css/style.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="index.php?v=<?php echo time(); ?>">
</head>

<body>
    
</body>

</html>

<?php
if (isset($_POST['regis']) && !empty($_POST['regis'])) {

    $cedula = $_POST['cedula'];
    $name = $_POST['name'];
    $nm = $_POST['nm'];
    $nf = $_POST['nf'];
    $np = $_POST['np'];

    // Calcular promedio de notas en la materia matematicas
    $sumnm = array_sum((array)$nm);
    $cantnnm = count((array)$nm);
    $npromnm = $sumnm / $cantnnm;

    // Calcular promedio de notas en la materia fisica
    $sumnf = array_sum((array)$nf);
    $cantnnf = count((array)$nf);
    $npromnf = $sumnf / $cantnnf;

    // Calcular promedio de notas en la materia programacion
    $sumnp = array_sum((array)$np);
    $cantnnp = count((array)$np);
    $npromnp = $sumnp / $cantnnp;

    // Variables para los aprobados y aplazados
    $aprobados = 0;
    $oneaprob = 0;
    $twoaprob = 0;
    $aplazados = 0;
    $aprobm = 0;
    $aprobf = 0;
    $aprobp = 0;
    $desapm = 0;
    $desapf = 0;
    $desapp = 0;
    $maxm = max((array)$nm);
    $maxf = max((array)$nf);
    $maxp = max((array)$np);

    for ($b = 0; $b < count((array)$name); $b++) {
        // ifs para saber si las notas son mayores a 10
        if ($nm[$b] >= 10) {
            $aprobm = $aprobm + 1;
        } else {
            $desapm = $desapm + 1;
        }

        if ($nf[$b] >= 10) {
            $aprobf = $aprobf + 1;
        } else {
            $desapf = $desapf + 1;
        }

        if ($np[$b] >= 10) {
            $aprobp = $aprobp + 1;
        } else {
            $desapp = $desapp + 1;
        }

        // if para saber cuantos alumnos aprobaron todas las materias
        if ($nm[$b] >= 10 && $nf[$b] >= 10 && $np[$b] >= 10) {
            $aprobados = $aprobados + 1;
        }


        // if para saber cuantos alumnos aprobaron una sola materia
        if ($nm[$b] >= 10) {
            if ($nf[$b] >= 10) {
            } else {
                if ($np[$b] >= 10) {
                } else {
                    $oneaprob = $oneaprob + 1;
                }
            }
        } else {
            if ($nf[$b] >= 10) {
                if ($np[$b] >= 10) {
                } else {
                    $oneaprob = $oneaprob + 1;
                }
            } else {
                if ($np[$b] >= 10) {
                    $oneaprob = $oneaprob + 1;
                } else {
                }
            }
        }

        if ($nm[$b] >= 10 && $nf[$b] >= 10 && $np[$b] < 10) {
            $twoaprob = $twoaprob + 1;
        } else {
            if ($nm[$b] >= 10 && $nf[$b] < 10 && $np[$b] >= 10) {
                $twoaprob = $twoaprob + 1;
            } else {
                if ($nm[$b] < 10 && $nf[$b] >= 10 && $np[$b] >= 10) {
                    $twoaprob = $twoaprob + 1;
                }
            }
        }
    }

    // Salidas
    echo "<form action=''><h2>Nota promedio de cada materia</h2> <br>";
    echo "<p>Nota promedio de matemáticas: " . $npromnm . "</p><br>";
    echo "<p>Nota promedio de física: " . $npromnf . "</p><br>";
    echo "<p>Nota promedio de programación: " . $npromnp . "<br><br>";

    echo "<h2>Número de alumnos aprobados en cada materia</h2> <br>";
    echo "<p>Número de alumnos aprobados en matemáticas: " . $aprobm . "</p><br>";
    echo "<p>Número de alumnos aprobados en física: " . $aprobf . "</p><br>";
    echo "<p>Número de alumnos aprobados en programación: " . $aprobp . "</p><br><br>";

    echo "<h2>Número de alumnos aplazados en cada materia</h2> <br>";
    echo "<p>Número de alumnos aplazados en matemáticas: " . $desapm . "</p><br>";
    echo "<p>Número de alumnos aplazados en física: " . $desapf . "</p><br>";
    echo "<p>Número de alumnos aplazados en programación: " . $desapp . "</p><br><br>";

    echo "<h2>Número de alumnos aprobados</h2> <br>";
    echo "<p>Número de alumnos que aprobaron todas las materias: " . $aprobados . "</p><br>";
    echo "<p>Número de alumnos que aprobaron una sola materia: " . $oneaprob . "</p><br>";
    echo "<p>Número de alumnos que aprobaron dos materias: " . $twoaprob . "</p><br><br>";

    echo "<h2>Nota maxima en cada materia</h2> <br>";
    echo "<p>Nota maxima en matemáticas: " . $maxm . "</p><br>";
    echo "<p>Nota maxima en física: " . $maxf . "</p><br>";
    echo "<p>Nota maxima en programación: " . $maxp . "</p><br></form>";
}


?>