<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Calculadora PHP</title>
    </head>
    <body>
        <?php
        require_once './funciones.php';
        require_once './funcionesValidacion.php';

        $numero1SinFiltrar = filter_input(INPUT_GET, "numero1");
        $numero2SinFiltrar = filter_input(INPUT_GET, "numero2");
        $resultado = "";
        $operacion = filter_input(INPUT_GET, "operacion");
        $conjuntoCampos = filter_has_var(INPUT_GET, "numero1") && filter_has_var(INPUT_GET, "numero2");

        if ($conjuntoCampos) {
            $numero1 = validarNumero($numero1SinFiltrar);
            $numero2 = validarNumero($numero2SinFiltrar);

            $camposValidos = $numero1 && $numero2;

            if ($camposValidos) {
                switch ($operacion) {
                    case "sumar":
                        $resultado = suma($numero1, $numero2);
                        break;
                    case "restar":
                        $resultado = resta($numero1, $numero2);
                        break;
                    case "multiplicacion":
                        $resultado = multiplicacion($numero1, $numero2);
                        break;
                    case "division":
                        $resultado = division($numero1, $numero2);
                        break;
                    default:
                        $resultado = "ERROR: Operación no válida";
                }
            } else {
                $resultado = "ERROR: Los datos introducidos no son válidos";
            }
        }
        ?>
        <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="get">
            <label>Introduce un número:</label>
            <input type="text" name="numero1" value="<?php echo ($numero1SinFiltrar); ?>"><br><br>

            <label>Introduce un segundo número:</label>
            <input type="text" name="numero2" value="<?php echo ($numero2SinFiltrar); ?>"><br><br>

            <button type="submit" name="operacion" value="sumar">Sumar</button>
            <button type="submit" name="operacion" value="restar">Restar</button>
            <button type="submit" name="operacion" value="multiplicacion">Multiplicar</button>
            <button type="submit" name="operacion" value="division">Dividir</button>
            <br><br>

            <label>Resultado:</label>
            <input type="text" name="resultado" value="<?php echo ($resultado); ?>" readonly>
        </form>
    </body>
</html>
