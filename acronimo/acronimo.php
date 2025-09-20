<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Acronimo</title>
</head>
<body>
    <h1>Acronio</h1>
    <input type="text" id="acronimo" placeholder="Escribe el acronimo">
    <button onclick="generarAgronimo()">Generar</button>
    <div id="resultado"></div>

</body>
</html>

<?php

    class AcronimoG{
        private $digitos;
 
        public function __construct($digitos=true){
            $this->digitos = $digitos;
        }
        
        private function normal($frase){
            if($frase=== null){
                return "";
            }
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
            if($normal === ""){
                return [];
            }
            return explode(" ", $normal);
        }

        public function genera($frase){
            $palabras = $this->palabras($frase);
            $acronimo = "";
            foreach($palabras as $p){
                $acronimo .= strtoupper($p[0]);
            }
            return $acronimo;
        }

    }

    $salida = "";
    if(isset($_GET["frase"])){
        $frase = $_GET["frase"];
        $ag = new AcronimoG();
        $salida = $ag->genera($frase);
    }

?>