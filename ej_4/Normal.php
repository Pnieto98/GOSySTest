<?php

require_once("Viaje.php");

final class Normal extends Viaje {

    /**
     * Costo fijo por KG
     * @var int 
     */
    const  COSTO_FIJO_KG = 2;

    /**
     * class construct
     */
    public function __construct(array $paquetes, Origen $origen, Destino $destino)
    {
        parent::__construct($paquetes, $origen, $destino);
    }
    /**
     * Método para calcular el costo en Normal
     * 
     * @return float
     */
    public function calcularCostos(): float
    {
        return self::COSTO_FIJO_KG * $this->calcularPesoTotalPaquetes() * $this->calcularDistancia();
    }
}
