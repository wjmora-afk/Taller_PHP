<?php
class Statistics
{
    private $numbers;

    public function __construct($numbers)
    {
        $this->numbers = $numbers;
    }

    public function promedio()
    {
        return array_sum($this->numbers) / count($this->numbers);
    }

    public function media()
    {
        sort($this->numbers);
        $count = count($this->numbers);
        $middle = floor($count / 2);

        if ($count % 2) {
            return $this->numbers[$middle];
        } else {
            return ($this->numbers[$middle - 1] + $this->numbers[$middle]) / 2;
        }
    }

    public function moda()
    {
        // Convertir a string para que array_count_values no falle
        $stringNumbers = array_map("strval", $this->numbers);
        $counts = array_count_values($stringNumbers);

        if (empty($counts)) {
            return "No hay datos";
        }

        $max = max($counts);
        $moda = array_keys($counts, $max);
        return implode(", ", $moda);
    }

}
?>