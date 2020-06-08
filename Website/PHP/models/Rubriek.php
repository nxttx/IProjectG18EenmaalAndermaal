<?php

class Rubriek
{
    public $rubrieknummer;
    public $rubrieknaam;
    public $sub_rubrieken;

    function set_rubrieknaam($rubrieknaam)
    {
        $this->rubrieknaam = $rubrieknaam;
    }

    function set_sub_rubrieken($array)
    {
        $this->sub_rubrieken = $array;
    }

    function set_rubrieknummer($rubrieknummer)
    {
        $this->rubrieknummer = $rubrieknummer;
    }
}
