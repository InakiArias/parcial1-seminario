<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Document</title>
</head>
<body>
    <table>
        <?php     
            function formatearFecha($fecha) {
                $arr = explode("-", $fecha);
                return $arr[2]."/".$arr[1]."/".$arr[0];
            }
        
            echo "<tr><td>Fecha: </td><td>".formatearFecha($_POST["fecha"])."</td></tr>";
            echo "<tr><td>Nombre: </td><td>".$_POST["nombre"]."</td></tr>";
            echo "<tr><td>Impuesto: </td><td>".$_POST["impuesto"]."%</td></tr>";
            echo "<tr><td colspan=5>Detalle</td></tr>";
            echo "<tr>
                <td>Código</td>
                <td>Descripción</td>
                <td>Cantidad</td>
                <td>Precio</td>
                <td>Total</td>
            </tr>";

            $cant = $_POST["cantidadElementos"];
            $total = 0;

            for ($i = 1; $i <= $cant; $i++) {
                echo "<tr>
                    <td>".$_POST["cod".$i]."</td>
                    <td>".$_POST["desc".$i]."</td>
                    <td>".$_POST["cant".$i]."</td>
                    <td>$".$_POST["precio".$i]."</td>
                    <td>$".$_POST["cant".$i] * $_POST["precio".$i]."</td>
                </tr>";

                $total += $_POST["cant".$i] * $_POST["precio".$i];
            }

            echo "<tr>
                <td></td>
                <td></td>
                <td></td>
                <td>Neto</td>
                <td>$".$total."</td>
            </tr>";

            echo "<tr>
                <td></td>
                <td></td>
                <td></td>
                <td>Impuesto</td>
                <td>$".$total * $_POST["impuesto"] / 100.0."</td>
            </tr>";

            echo "<tr>
                <td></td>
                <td></td>
                <td></td>
                <td>Total</td>
                <td>$".$total * (100 + $_POST["impuesto"]) / 100.0."</td>
            </tr>";

            echo "<tr>
                <td colspan=5><a href='index.html'>Volver</a></td>
            </tr>";
        ?>
    </table>
</body>
</html>

