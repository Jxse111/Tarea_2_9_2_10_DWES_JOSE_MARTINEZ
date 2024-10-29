<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Project/PHP/PHPProject.php to edit this template
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        require_once './funciones.php';
        require_once './funcionesValidacion.php';
        $numero1SinFiltrar = filter_input(INPUT_GET, "numero1");
        $numero2SinFiltrar = filter_input(INPUT_GET, "numero2");
        $resultado = "";
        $sumar = filter_input(INPUT_GET, "sumar");

        $conjuntoCampos = filter_has_var(INPUT_GET, "numero1") && filter_has_var(INPUT_GET, "numero2") && filter_has_var(INPUT_GET, "sumar");

        if ($conjuntoCampos) {
            $numero1 = validarNumero($numero1SinFiltrar);
            $numero2 = validarNumero($numero2SinFiltrar);

            $camposValidos = $numero1 && $numero2;

            if ($camposValidos) {
                $resultado = suma($numero1, $numero2);
            } else {
                $resultado = "ERROR: los números no son correctos";
            }
        }
        ?>
        <form action="<?php $_SERVER["PHP_SELF"] ?>" method="get">
            <label>Introduce un número: <input type="text" name="numero1" value="<?php if (filter_has_var(INPUT_GET, "numero1")) echo $numero1SinFiltrar ?>"><br><br>
                <label>Introduce un segundo número: <input type="text" name="numero2" value="<?php if (filter_has_var(INPUT_GET, "numero2")) echo $numero2SinFiltrar ?>"><br><br>
                    <label>Sumar: </label><br><br>
                    <button type="submit" name="sumar">Sumar</button>
                    <br><br>
                    <label>Resultado:
                        <input type="text" name="resultado" value="<?php echo ($resultado); ?>">
                        </form>
                        </body>
                        </html>
