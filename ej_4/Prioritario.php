<?php

require_once("Viaje.php");

final class Prioritario extends Viaje
{

    /**
     * Costo fijo por KG
     * @var int 
     */
    const  COSTO_FIJO_KG = 4;

    /**
     * Costo fijo por M3
     * @var int 
     */
    const  COSTO_FIJO_M3 = 10;
    /**
     * class construct
     */
    public function __construct(array $paquetes, Origen $origen, Destino $destino)
    {
        parent::__construct($paquetes, $origen, $destino);
    }
    /**
     * Método para calcular el costo del viaje del tipo Prioritario.
     * Se calcula el total en peso = COSTO_FIJO_KG * Kg x KM recorrido
     * Se calcula el total en volumen = COSTO_FIJO_M3 * M3(volumen) * KM recorrido
     * El mayor de estos dos se retorna
     * 
     * @return float
     */
    public function calcularCostos(): float
    {
        $total_kg = self::COSTO_FIJO_KG * $this->calcularPesoTotalPaquetes() * $this->calcularDistancia();
        $total_m3 = self::COSTO_FIJO_M3 * $this->calcularVolumenTotalPaquetes() * $this->calcularDistancia();
        return $total_kg > $total_m3 ? $total_kg : $total_m3;
    }
}
