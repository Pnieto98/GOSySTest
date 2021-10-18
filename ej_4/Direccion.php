<?php

abstract class Direccion
{

    /**
     * Latitud de dirección
     * @var float $latitud 
     */
    private float $latitud;

    /**
     * Longitud de direccion
     * @var float longitud
     */
    private float $longitud;

    /**
     * Class construc
     * 
     * @param float $longitud
     * @param float $latitud
     * 
     */
    public function __construct(float $longitud, float $latitud)
    {
        $this->latitud  = $latitud;
        $this->longitud = $longitud;
    }

    /******************* *
     * ***************** *
     * GETTERS Y SETTERS *
     * ***************** *
     ******************* */

    /**
     * Setter latitud
     * @param float $latitud 
     *
     *@return Direccion
     */
    public function setLatitud(float $latitud): Direccion
    {
        $this->latitud = $latitud;
        return $this;
    }

    /**
     * Getter latitud
     * 
     * @return float
     */
    public function getLatitud(): float
    {
        return $this->latitud;
    }

    /**
     * Setter longitud
     * @param float $longitud
     * 
     * @return Direccion
     */
    public function setLongitud(float $longitud): Direccion
    {
        $this->longitud = $longitud;
        return $this;
    }

    /**
     * Getter longitud
     * 
     * @return float
     */
    public function getLongitud(): float
    {
        return $this->longitud;
    }
}
