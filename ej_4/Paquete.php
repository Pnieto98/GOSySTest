<?php

class Paquete
{
    /**
     * Peso del paquete
     * @var float
     */
    private float $peso;

    /**
     * alto del paquete
     * @var float
     */
    private float $alto;

    /**
     * largo del paquete    
     * @var float
     */
    private float $largo;

    /**
     * ancho del paquete
     * @var float
     */
    private float $ancho;

    /**
     * class construct
     */
    public function __construct(float $peso, float $alto, float $largo, float $ancho)
    {
        $this->peso  = $peso;
        $this->alto  = $alto;
        $this->largo = $largo;
        $this->ancho = $ancho;
    }

    /**
     * Obtener volumen del paquete
     * 
     * @return float
     */
    public function getVolumen()
    {
        return $this->alto * $this->ancho * $this->largo;
    }
    /******************* *
     * ***************** *
     * GETTERS Y SETTERS *
     * ***************** *
     ******************* */

    /**
     * Setter peso
     *
     *@param float $peso
     *@return Paquete
     */
    public function setPeso(float $peso): Paquete
    {
        $this->peso = $peso;
        return $this;
    }

    /**
     * Setter alto
     *
     *@param float $alto
     *@return Paquete
     */
    public function setAlto(float $alto): Paquete
    {
        $this->alto = $alto;
        return $this;
    }

    /**
     * Setter ancho
     *
     *@param float $ancho
     *@return Paquete
     */
    public function setAncho(float $ancho): Paquete
    {
        $this->ancho = $ancho;
        return $this;
    }

    /**
     * Setter largo
     *
     *@param float $largo
     *@return Paquete
     */
    public function setLargo(float $largo): Paquete
    {
        $this->largo = $largo;
        return $this;
    }

    /**
     * Getter peso
     *
     *@return float
     */
    public function getPeso(): float
    {
        return $this->peso;
    }

    /**
     * Getter largo
     *
     *@return float
     */
    public function getLargo(): float
    {
        return $this->largo;
    }

    /**
     * Getter ancho
     *
     *@return float
     */
    public function getAncho(): float
    {
        return $this->ancho;
    }

    /**
     * Getter alto
     *
     *@return float
     */
    public function getAlto(): float
    {
        return $this->alto;
    }
}
