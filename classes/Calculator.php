<?php
class Calculator {
    public function suma($a, $b) { return $a + $b; }
    public function resta($a, $b) { return $a - $b; }
    public function multiplicacion($a, $b) { return $a * $b; }
    public function division($a, $b) { return $b != 0 ? $a / $b : "Error: división por cero"; }
    public function porcentaje($a, $b) { return ($a * $b) / 100; }
}
?>