<?php
class MathTools
{
    public function fibonacci($n)
    {
        $serie = [0, 1];
        for ($i = 2; $i < $n; $i++) {
            $serie[] = $serie[$i - 1] + $serie[$i - 2];
        }
        return array_slice($serie, 0, $n);
    }

    public function factorial($n)
    {
        return ($n <= 1) ? 1 : $n * $this->factorial($n - 1);
    }
}
?>
