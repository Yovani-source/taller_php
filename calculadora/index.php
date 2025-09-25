<!DOCTYPE html>
<html lang="es">
<head>
<title>factorial, fibonacci</title>
<link rel="stylesheet" href="diseño.css">
</head>
<body>
    <h1>Calculadora</h1>
<!--Formulario de php -->
<form method="post">
  <fieldset>
    <legend><strong>operacion</strong></legend>

    <input type="radio" id="fibo" name="operacion" value="fibonacci" required>
    <label for="fibo">fibonacci</label><br>

    <input type="radio" id="fact" name="operacion" value="factorial" required>
    <label for="fact">factorial</label><br><br>

    <label for="numero">numero:</label>
    <input type="number" id="numero" name="numero" min="0" max="15" required><br><br>


    <button type="submit">Calcular</button>
  </fieldset>
</form>

<?php
/* ===== proceso */
if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $numero    = (int)$_POST["numero"];
    $operacion = $_POST["operacion"];

    echo '<div class="resultado">';

    /* ---------- Fibonacci ---------- */
    if ($operacion === "fibonacci") {

        if ($numero === 0) {
            echo "<h2>fibonacci </h2>";
            echo "<div>0</div>";
        } else {
            $f1 = 0; $f2 = 1;
            $serie   = [$f1];
            $proceso = ["F(0) = 0"];

            if ($numero > 1) {
                $serie[] = $f2;
                $proceso[] = "F(1) = 1";
                for ($i = 2; $i < $numero; $i++) {
                    $next = $f1 + $f2;
                    $serie[] = $next;
                    $proceso[] = "F($i) = F(".($i-1).") + F(".($i-2).") = $f2 + $f1 = $next";
                    $f1 = $f2;
                    $f2 = $next;
                }
            }

            echo "<h2>fibonacci de $numero </h2>";
            echo implode(", ", $serie);

            echo "<div class='proceso'><u>Proceso:</u><br>"
                 .implode("<br>", $proceso).
                 "</div>";
        }

    /* ---------- Factorial ---------- */
    } elseif ($operacion === "factorial") {

        $factorial = 1;
        $pasos = [];
        for ($i = $numero; $i >= 1; $i--) {
            $factorial *= $i;
            $pasos[] = $i;
        }

        // mostra proceso
        $expresion = $numero."! = ".implode(" × ", $pasos)." = ".$factorial;

        echo "<h2>Factorial de $numero</h2>";
        echo "<div class='proceso'>$expresion</div>";
    }

    echo '</div>';
}
?>

</body>
</html>

