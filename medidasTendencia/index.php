<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Medidas de Tendencia Central</title>
    <link rel="stylesheet" href="medidas.css">
</head>
<body>
    <div class="contenedor">
        <h1>Calculadora de medidas de tendencia central</h1>
        <form method="post">
            <label>Ingrese el numero</label>
            <br>
            <input type="text" name="numero" placeholder="Ejemplo: 1,2,3,4" required>

            <label>Selecciona una opción: </label>
            <br>
            <select name="medida" required>
                <option value="promedio">Promedio</option>
                <option value="mediana">Mediana</option>
                <option value="moda">Moda</option>
            </select>
            <br>
            <button type="submit">Calcular </button>
        </form>

        <?php

            // Función para normalizar la representación string de un float (evita diferencias por precisión)
        function float_to_string($n) {
            // 10 decimales suficientes para la mayoría de casos; luego quitamos ceros
            $s = sprintf('%.10f', $n);
            $s = rtrim($s, '0');
            $s = rtrim($s, '.');
            return $s;
        }

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $entar = $_POST["numero"] ?? '';
            $medida = $_POST["medida"] ?? '';

            $op = ['promedio', 'mediana', 'moda'];
            if (!in_array($medida, $op, true)) {
                echo "Error: Medida no válida.</p>"; 
            }else{
                $raw = array_map('trim', explode(',', $entar));
                $num = [];
                foreach ($raw as $val) {
                    if ($val == '') continue;
                    if (is_numeric($val)) {
                       $num[] = (float)$val;
                    }
                }
                if (count($num) === 0) {
                    echo "<p>Error: No se ingresaron números válidos.</p>";
                } else {

                    sort($num, SORT_NUMERIC);
                    $cant= count($num);
                    switch ($medida) {
                        case 'promedio':
                            $promedio = array_sum($num) / $cant;
                            echo "<h3> Promedio: " . round($promedio, 6) . "</h3>";
                            break;

                        case 'mediana':
                            if ($cant % 2 === 0) {
                                $m = $cant / 2;
                                $mediana = ($num[$m - 1] + $num[$m]) / 2;
                            } else {
                                $mediana = $num[floor($cant / 2)];
                            }
                            echo "<h3> Mediana: " . round($mediana, 6) . "</h3>";
                            break;

                        case 'moda':
                            $numeros_string = array_map('float_to_string', $num);
                            $frecuencias = array_count_values($numeros_string);

                            if (!empty($frecuencias)) {
                                $maxFrec = max($frecuencias);

                                if ($maxFrec <= 1) {
                                    echo "<h3> Moda: No hay moda (todos los valores son únicos).</h3>";
                                } else {
                                    $moda_keys = array_keys($frecuencias, $maxFrec, true);
                                    
                                    $moda_vals = array_map('floatval', $moda_keys);
                                    echo "<h3> Moda: " . implode(", ", $moda_vals) . " (frecuencia: $maxFrec)</h3>";
                                }
                            } else {
                                echo "<p>No se pudo calcular la moda.</p>";
                            }

                            break;
                    }
                }
            }        
        }
        ?>
    </div>
</body>
</html>