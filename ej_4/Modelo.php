<?php

/**
 * @final
 */
final class Modelo
{

    /**
     * El volumen del camion M3
     * 
     * @var float $volumen
     * 
     */
    private float $volumen;

    /**
     * El peso del tipo del Camion en KG
     * 
     * @var float $peso
     *
     */
    private float $peso;

    /**
     * Class construct
     * 
     * @param float $volumen 
     * @param float $peso 
     */
    public function __construct(float $volumen, float $peso)
    {
        $this->volumen = $volumen;
        $this->peso    = $peso;
    }


    /******************* *
     * ***************** *
     * GETTERS Y SETTERS *
     * ***************** *
     ******************* */

    /**
     * Setter de volumen 
     *
     * @param float $volumen
     * 
     * @return Modelo
     */
    public function setVolumen(float $volumen)
    {

        $this->volumen = $volumen;
        return $this;
    }
    /**
     * Getter de volumen 
     * 
     * @return float
     */
    public function getVolumen()
    {

        return $this->volumen;
    }

    /**
     * Setter de peso 
     *
     * @param float $peso
     * 
     * @return Modelo
     */
    public function setPeso(float $peso)
    {

        $this->peso = $peso;
        return $this;
    }

    /**
     * Getter de peso 
     * 
     * @return float
     */
    public function getPeso()
    {

        return $this->peso;
    }
}
