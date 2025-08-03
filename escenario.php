<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Agrega Bootstrap si aún no lo has hecho -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

    <div class="mt-5 text-center">
        <h3>Escenario</h3>
    </div>

<?php
function Escenario($lista)
{
    echo "<div class='container text-center mt-4'>";
    echo "<h4 class='mb-3'>Escenario Actual</h4>";
    echo "<table class='table table-bordered table-sm mx-auto' style='width: auto;'>";

    for ($i = 0; $i < count($lista); $i++) {
        echo "<tr>";
        for ($j = 0; $j < count($lista[$i]); $j++) {
            $valor = $lista[$i][$j];

            // Definir color según estado
            switch ($valor) {
                case "L":
                    $color = "bg-success text-white";
                    $texto = "Libre";
                    break;
                case "R":
                    $color = "bg-warning text-dark";
                    $texto = "Reservado";
                    break;
                case "V":
                    $color = "bg-danger text-white";
                    $texto = "Vendido";
                    break;
                default:
                    $color = "bg-light";
                    $texto = "?";
            }

            echo "<td class='$color text-center' style='padding: 15px; min-width: 80px;'>
                    <strong>$texto</strong><br><small>[$i,$j]</small>
                  </td>";
        }
        echo "</tr>";
    }

    echo "</table>";
    echo "</div>";
}
?>

</body>
</html>
