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
    <form method="post" action="">
        <label>Cantidad de alumnos a registrar</label><br>
        <input type="number" name="cant" placeholder="Cantidad">
        <input type="submit" name="inputs" value="Ingresar"><br>
    </form>


    <?php

    if (isset($_POST['inputs']) && !empty($_POST['inputs']) && isset($_POST['cant']) && !empty($_POST['cant'])) {

        $cant = $_POST['cant'];

        for ($a = 0; $a < $cant; $a++) {
    ?>
            <form action="resultados.php" method="post">
                <h1>Estudiante #<?php echo $a + 1 ?></h1>
                <input type="text" name="cedula[]" placeholder="Cedula de identidad"><br>
                <input type="text" name="name[]" placeholder="Nombre"><br>
                <input type="number" name="nm[]" placeholder="Nota de matemáticas"><br>
                <input type="number" name="nf[]" placeholder="Nota de física"><br>
                <input type="number" name="np[]" placeholder="Nota de programación"><br><br>

        <?php

        }
        if (empty($_POST['inputs'])) {
        } else {

            echo "<input type='submit' name='regis' value='Registrar'><br><br></form>";
        }
    }
        ?>

</body>

</html>