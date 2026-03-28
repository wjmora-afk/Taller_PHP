<?php
class SetOperations
{
    public function union($a, $b)
    {
        return array_unique(array_merge($a, $b));
    }

    public function interseccion($a, $b)
    {
        return array_values(array_intersect($a, $b));
    }

    public function diferencia($a, $b)
    {
        return array_values(array_diff($a, $b));
    }
}
?>