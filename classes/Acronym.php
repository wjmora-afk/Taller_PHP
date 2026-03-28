<?php
class Acronym
{
    private $phrase;

    public function __construct($phrase)
    {
        $this->phrase = $phrase;
    }

    public function generate()
    {
        $clean = preg_replace("/[^a-zA-Z\s-]/", "", $this->phrase);
        $words = preg_split("/[\s-]+/", $clean);
        $acronym = "";
        foreach ($words as $w) {
            $acronym .= strtoupper($w[0]);
        }
        return $acronym;
    }
}
?>
