<?php

require_once("HojaRuta.php");
require_once("Modelo.php");
class Camion
{
    /**
     * Patente del camion
     * 
     * @var string $patente
     */
    private string $patente;

    /**
     * El tipo del modelo 
     * 
     * @var Modelo $modelo
     */
    private Modelo $modelo;

    /**
     * La hoja de ruta 
     * 
     * @var HojaRuta $hoja_ruta
     */
    private HojaRuta $hoja_ruta;

    /**
     * Class construct
     * 
     * @param string $patente Patente del camion
     * @param Modelo $modelo Modelo del camion
     * @param HojaRuta $hojaRuta La hoja de ruta del camion
     */
    public function __construct(string $patente, Modelo $modelo, HojaRuta $hoja_ruta)
    {
        $this->setPatente($patente);
        $this->setModelo($modelo);
        $this->setHojaRuta($hoja_ruta);
    }

    /******************* *
     * ***************** *
     * GETTERS Y SETTERS *
     * ***************** *
     ******************* */

    /**
     * Setter de patente
     * @param string $patente
     * 
     * @return Camion
     */
    public function setPatente(string $patente): Camion
    {

        $this->patente = $patente;

        return $this;
    }

    /**
     * Getter de patente
     * 
     * @return string
     */
    public function getPatente(): string
    {

        return $this->patente;
    }

    /**
     * Setter de modelo
     * @param Modelo $modelo
     * 
     * @return Camion
     */
    public function setModelo(Modelo $modelo): Camion
    {

        $this->modelo = $modelo;

        return $this;
    }

    /**
     * Getter de modelo
     * 
     * @return Modelo
     */
    public function getModelo(): Modelo
    {

        return $this->modelo;
    }

    /**
     * Setter de hoja de ruta
     * @param HojaRuta $hoja_ruta
     * 
     * @return Camion
     */
    public function setHojaRuta(HojaRuta $hoja_ruta): Camion
    {
        
        if ($hoja_ruta->calcularPesoTotal() > $this->getModelo()->getPeso()) throw  new Exception("El peso indicado en la Hoja de ruta supera el maximo permitido del Camion");
        if ($hoja_ruta->calcularVolumenTotal() > $this->getModelo()->getVolumen()) throw  new Exception("El volumen indicado en la Hoja de ruta supera el maximo permitido del Camion");

        $this->hoja_ruta = $hoja_ruta;

        return $this;
    }

    /**
     * Getter de hoja de ruta
     * 
     * @return HojaRuta
     */
    public function getHojaRuta(): HojaRuta
    {

        return $this->hoja_ruta;
    }
}

