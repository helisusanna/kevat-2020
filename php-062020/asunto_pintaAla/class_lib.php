
<?php
    class Asunto {
        private $hinta;
        private $pintaAla;

        function asetaHinta($h) {
            $this->hinta = $h;
        }
        function asetaPinta_ala($pA) {
            $this->pintaAla = $pA; //asetetut arvot oliolle asunto dokumentilla ot4d.php
        }
        function laskeNelioHinta() {
            $this->nelioHinta = $this->hinta / $this->pintaAla; //neliöhinta saadaan jakamalla annettu hinta annetulla pinta-alalla
            return $this->nelioHinta;
        }
    }
?>



