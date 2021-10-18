<?php
require_once("Direccion.php");
class Origen extends Direccion
{

    /**
     * Class construct
     */
    public function __construct(float $longitud, float $latitud)
    {
        parent::__construct($longitud, $latitud);
    }
}
