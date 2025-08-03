<?php
echo '<body style="background-color:#C8EDE1">';
?>
<!DOCTYPE html>
<html>

<head>
    <title>Taller "Uso de formularios para transferencia"</title>
    <meta charset="utf-8" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<?php
require("escenario.php");
require("accion.php");

if (isset($_REQUEST["Enviar"])) {
    $fila = $_POST['fila'];
    $puesto = $_POST['puesto'];
    $accion = $_POST['accion'];
    $StringEscenario = $_POST['lista'];

    if (!is_numeric($fila) || !is_numeric($puesto) || $fila < 0 || $fila > 6 || $puesto < 0 || $puesto > 6) {
        echo "<div class='alert alert-danger text-center mt-3' role='alert'>
                Error: Los valores de <strong>fila</strong> y <strong>puesto</strong> deben estar entre 0 y 5.
              </div>";
        $count = 0;
        for ($i = 0; $i < 5; $i++) {
            for ($j = 0; $j < 5; $j++) {
                $count = 5 * $i + $j;
                $lista[$i][$j] = substr($StringEscenario, $count, 1);
            }
        }
        Escenario($lista);
    } else {
        $count = 0;
        for ($i = 0; $i < 5; $i++) {
            for ($j = 0; $j < 5; $j++) {
                $count = 5 * $i + $j;
                $lista[$i][$j] = substr($StringEscenario, $count, 1);
            }
        }
        $lista = Accion($fila, $puesto, $accion, $lista);
        Escenario($lista);
    }
} else if (isset($_REQUEST["Reset"]) || !isset($_REQUEST["Enviar"])) {
    $lista = array_fill(0, 5, array_fill(0, 5, "L"));
    Escenario($lista);
}
?>

<body>
   <div class="container mt-4 mb-5"> <!-- <-- mb-5 añade espacio debajo -->
    <div class="row justify-content-center">
        <div class="col-12 col-sm-8 col-md-5 col-lg-4">

            <div class="card shadow-sm p-3" style="border-radius: 12px;">
                <h5 class="text-center mb-3">Reserva de Escenario</h5>

                <form method="POST">
                    <input type="hidden" name="lista"
                        value="<?php foreach ($lista as $fila) { foreach ($fila as $puesto) { echo $puesto; } } ?>" />

                    <div class="mb-2">
                        <label class="form-label">Fila:</label>
                        <input type="number" name="fila" min="0" max="5" class="form-control form-control-sm" />
                    </div>
                    <div class="mb-2">
                        <label class="form-label">Puesto:</label>
                        <input type="number" name="puesto" min="0" max="5" class="form-control form-control-sm" />
                    </div>

                    <div class="mb-2">
                        <label class="form-label">Acción:</label>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="accion" value="R" id="reservar">
                            <label class="form-check-label" for="reservar">Reservar</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="accion" value="V" id="comprar">
                            <label class="form-check-label" for="comprar">Comprar</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="accion" value="L" id="liberar" checked>
                            <label class="form-check-label" for="liberar">Liberar</label>
                        </div>
                    </div>

                    <div class="d-flex justify-content-between mt-3">
                        <input type="submit" value="Enviar" name="Enviar" class="btn btn-sm btn-primary w-50 me-1" />
                        <input type="submit" value="Borrar" name="Reset" class="btn btn-sm btn-secondary w-50 ms-1" />
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>
</body>

</html>
