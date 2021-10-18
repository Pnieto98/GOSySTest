<?php

require_once("Origen.php");
require_once("Destino.php");
require_once("Paquete.php");
abstract class Viaje
{
    /**
     * Los paquetes del viaje
     * 
     * @var array
     */
    private array $paquetes = [];

    /**
     * Origen del viaje
     * 
     * @var Origen
     */
    private Origen $origen;

    /**
     * Destino dei viaje
     * 
     * @var Destino
     */
    private Destino $destino;

    /**
     * @abstract
     * 
     * Método abstracto para calcular costos del viaje
     */
    abstract public function  calcularCostos(): float;

    /**
     * Class costruct
     * 
     * @param array $paquetes paquetes del viaje
     * @param Origen $origen Origen del viaje
     * @param Destino $destino Destino del viaje
     */
    public function __construct(array $paquetes, Origen $origen, Destino $destino)
    {
        $this->setPaquetes($paquetes);
        $this->origen   = $origen;
        $this->destino  = $destino;
    }
    /**
     * Método para calcular en KM la distancia entre dos ejes
     * 
     * @return float
     */
    protected function calcularDistancia(): float
    {
        $theta = $this->origen->getLongitud() - $this->destino->getLongitud();
        $distance = (sin(deg2rad($this->origen->getLongitud())) * sin(deg2rad($this->destino->getLongitud()))) + (cos(deg2rad($this->origen->getLongitud())) * cos(deg2rad($this->destino->getLongitud())) * cos(deg2rad($theta)));
        $distance = acos($distance);
        $distance = rad2deg($distance);
        $distance = $distance * 60 * 1.1515;
        $distance = $distance * 1.609344;
        return (round($distance, 2));
    }
    /**
     * Método para calcular el peso total entre todos los paquetes
     * 
     * @return float
     */
    public function calcularPesoTotalPaquetes(): float
    {
        $total_peso_paquetes = 0;
        $calcular_paquetes = function ($paquete) use (&$total_peso_paquetes) {
            $total_peso_paquetes += $paquete->getPeso();
        };
        @array_walk($this->getPaquetes(), $calcular_paquetes, $total_peso_paquetes);

        return $total_peso_paquetes;
    }

    /**
     * Método para calcular el volumen en m3 que ocupan todos los paquetes en el camion
     * 
     * @return float
     */
    public function calcularVolumenTotalPaquetes(): float
    {
        $total_volumen_paquetes = 0;
        $calcular_paquetes = function ($paquete) use (&$total_volumen_paquetes) {
            $total_volumen_paquetes += $paquete->getVolumen();
        };
        @array_walk($this->getPaquetes(), $calcular_paquetes, $total_volumen_paquetes);

        return $total_volumen_paquetes;
    }


    /******************* *
     * ***************** *
     * GETTERS Y SETTERS *
     * ***************** *
     ******************* */

    /**
     * Agregar paquetes. Valida que sean de este tipo
     *
     * @param array $paquetes
     * @return Viaje
     */
    public function setPaquetes(array $paquetes): Viaje
    {
        $validador = true;
        # Valido que todos los elementos del viaje sea del tipo Paquete
        $validar_paquete = function ($paquete) use (&$validador) {
            if (!$paquete instanceof Paquete) {
                $validador = false;
            }
        };
        array_walk($paquetes, $validar_paquete, $validador);
        # Si no es un viaje lanzo una excepción
        if (!$validador) {
            throw new Exception("El valor ingresado no es del tipo Paquete");
        }
        $this->paquetes = array_merge($this->paquetes, $paquetes);

        return $this;
    }

    /**
     * Getter paquetes
     * 
     * @return array
     */
    public function getPaquetes(): array
    {
        return $this->paquetes;
    }

    /**
     * Set destino
     * 
     * @param Destino $destino destinos
     * @return Viaje
     */
    public function setDestino(Destino $destino): Viaje
    {
        $this->destino = $destino;
        return $this;
    }

    /**
     * Getter destino
     * 
     * @return Destino 
     */
    public function getDestino(): Destino
    {
        return $this->destino;
    }

    /**
     * Set origen
     * 
     * @param Origen $origen origen
     * @return Viaje
     */
    public function setOrigen(Origen $origen): Viaje
    {
        $this->origen = $origen;
        return $this;
    }

    /**
     * Getter origen
     * 
     * @return Origen 
     */
    public function getOrigen(): Origen
    {
        return $this->origen;
    }
}
