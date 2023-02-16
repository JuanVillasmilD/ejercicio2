<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Estudiantes</title>
    <link rel="stylesheet" href="css/style.css?v=<?php echo time(); ?>">
</head>

<body>

</body>

</html>

<?php
// Arrays para guardar mensajes y errores:
$aErrores = array();
$aMensajes = array();
// Patrón para usar en expresiones regulares (admite letras acentuadas y espacios):
$patron_texto = "/^[a-zA-ZáéíóúÁÉÍÓÚäëïöüÄËÏÖÜàèìòùÀÈÌÒÙ\s]+$/";
if (isset($_POST['regis'])) {

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
    echo "Nota promedio de cada materia <br>";
    echo "Nota promedio de matematicas: " . $npromnm . "<br>";
    echo "Nota promedio de fisica: " . $npromnf . "<br>";
    echo "Nota promedio de programacion: " . $npromnp . "<br><br>";

    echo "Numero de alumnos aprobados en cada materia <br>";
    echo "Numero de alumnos aprobados en matematicas: " . $aprobm . "<br>";
    echo "Numero de alumnos aprobados en fisica: " . $aprobf . "<br>";
    echo "Numero de alumnos aprobados en programacion: " . $aprobp . "<br><br>";

    echo "Numero de alumnos aplazados en cada materia <br>";
    echo "Numero de alumnos aplazados en matematicas: " . $desapm . "<br>";
    echo "Numero de alumnos aplazados en fisica: " . $desapf . "<br>";
    echo "Numero de alumnos aplazados en programacion: " . $desapp . "<br><br>";

    echo "Numero de alumnos que aprobaron todas las materias: " . $aprobados . "<br>";
    echo "Numero de alumnos que aprobaron una sola materia: " . $oneaprob . "<br>";
    echo "Numero de alumnos que aprobaron dos materias: " . $twoaprob . "<br><br>";

    echo "Nota maxima en cada materia <br>";
    echo "Nota maxima en matematicas: " . $maxm . "<br>";
    echo "Nota maxima en fisica: " . $maxf . "<br>";
    echo "Nota maxima en programacion: " . $maxp . "<br>";
}


?>