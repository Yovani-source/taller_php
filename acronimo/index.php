<?php   

    class AcronimoG{
        private $digitos;
 
        public function __construct($digitos=true){
            $this->digitos = $digitos;
        }
        
        private function normal($frase){
            if($frase=== null)return "";
            
            $frase = str_replace("-"," ",$frase);
            if ($this->digitos){
                $frase = preg_replace("/[^a-zA-Z0-9\s]/","",$frase);
            }else{
                $frase = preg_replace("/[^\\p{L}\\s]/u", "", $frase);
            }

            $frase = preg_replace("/\s+/"," ",$frase);
            return trim($frase);
        }
    
        private function palabras($frase){
            $normal = $this->normal($frase);
            if($normal === "")
                 return [];
            return explode(" ", $normal);
        }

        public function genera($frase){
            $palabras = $this->palabras($frase);
            $acronimo = "";
            foreach($palabras as $p){
                if (strlen($p) > 0) {
                    $jj = mb_substr($p, 0, 1, 'UTF-8');
                    $acronimo .= mb_strtoupper($jj, 'UTF-8');
                }
            }
            return $acronimo;
        }

    }

    $salida = "";
    if($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST["frase"])){
        $frase = $_POST["frase"];
        $genera = new AcronimoG();
        $salida = $genera->genera($frase);
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Acrónimo</title>
</head>
<body>
    <h1>Acronio</h1>
    <form method="post">
        <input type="text" name="frase" placeholder="Escribe el acronimo">
        <button type="submit">Generar</button>
    </form>

    <?php if ($salida !== ""): ?>
    <div id="salida">Acrónimo: <?= htmlspecialchars($salida, ENT_QUOTES) ?></div>
    <?php endif; ?>

    <script>
        document.querySelector('form').addEventListener('submit', function(e) {
           const frase = document.querySelector('input[name="frase"]').value.trim();
           if (frase.length === 0) {
               e.preventDefault();
               alert('Por favor, escribe una frase.');
           }
        });

    </script>
</body>
</html>