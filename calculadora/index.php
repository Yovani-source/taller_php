<!DOCTYPE html>
<html lang="es">
<head>
<title>Fibonacci o Factorial</title>
<link rel="stylesheet" href="diseño.css">
</head>
<body>
    <h1>Calculadora de Fibonacci / Factorial</h1>

<!-- ===== Formulario (estructura pedida) ===== -->
<form method="post">
  <fieldset>
    <legend>Operación</legend>

    <input type="radio" id="fibo" name="operacion" value="fibonacci" required>
    <label for="fibo">Sucesión de Fibonacci</label><br>

    <input type="radio" id="fact" name="operacion" value="factorial" required>
    <label for="fact">Factorial</label><br><br>

    <label for="numero">Número:</label>
    <input type="number" id="numero" name="numero" min="0" required><br><br>

    <button type="submit">Calcular</button>
  </fieldset>
</form>


</body>
</html>

