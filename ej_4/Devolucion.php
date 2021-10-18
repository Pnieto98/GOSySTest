<?php

require_once("Viaje.php");

final class Devolucion extends Viaje
{

    /**
     * Costo fijo 
     * @var int 
     */
    const  COSTO_FIJO = 1000;

    /**
     * class construct
     */
    public function __construct(array $paquetes, Origen $origen, Destino $destino)
    {
        parent::__construct($paquetes, $origen, $destino);
    }

    /**
     * Método para calcular el costo del viaje del tipo Devolución 
     * se cobra una tarifa fija 
     * 
     * @return float
     */
    public function calcularCostos(): float
    {
        return self::COSTO_FIJO;
    }
}
