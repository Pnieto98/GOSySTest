<?php

/**
 * @final 
 */
require_once("Normal.php");
require_once("Prioritario.php");
require_once("Devolucion.php");

final class HojaRuta
{

    /**
     * Array de viajes 
     * 
     * @var array $viajes
     */
    private array $viajes = [];

    /**
     * Array de Hojas de rutas 
     * 
     * @var array $hojas_rutas
     */
    private array $hojas_rutas = [];

    /**
     * Class construct
     * @param mixed $viaje
     * @param mixed $hojas_ruta
     */
    public function __construct($viajes = [], $hojas_rutas = [])
    {
        $this->setViajes($viajes);
        $this->setHojasRutas($hojas_rutas);
    }
    /**
     * Metodo para calcular el peso total de la Hoja de ruta
     * 
     * @return float
     */
    public function calcularPesoTotal()
    {
        $total_peso = $this->calcularPesoTotalViajes();
        if (count($this->getHojasRutas()) > 0) {
            foreach ($this->getHojasRutas() as $ruta) {
                $total_peso += $ruta->calcularPesoTotal();
            }
        }
        return $total_peso;
    }

    /**
     * Metodo para calcular el volumen total de la Hoja de ruta
     * 
     * @return float
     */
    public function calcularVolumenTotal()
    {
        $total_peso = $this->calcularVolumenTotalViajes();
        if (count($this->getHojasRutas()) > 0) {
            foreach ($this->getHojasRutas() as $ruta) {
                $total_peso += $ruta->calcularVolumenTotal();
            }
        }
        return $total_peso;
    }

    /**
     * Método para calcular el costo total de la Hoja de ruta
     * 
     * 
     * @return float
     */
    public function calcularCostoTotal() {
        $total_costo = $this->calcularCostoTotalViajes();
        if (count($this->getHojasRutas()) > 0) {
            foreach ($this->getHojasRutas() as $ruta) {
                $total_costo += $ruta->calcularCostoTotal();
            }
        }
        return $total_costo;
    }



    /******************* *
     * ***************** *
     * GETTERS Y SETTERS *
     * ***************** *
     ******************* */

    /**
     * Agrega viajes en la hoja de ruta. Valida que sea del tipo Viaje
     * @param mixed $viaje
     * 
     * @return HojaRuta
     * @throws Exceptions 
     */
    public function setViajes(array $viajes)
    {
        # Verifico que venga al menos un valor
        if (count($viajes) > 0) {
            $validador = true;
            # Valido que todos los elementos del viaje sea del tipo Viaje
            $validar_viaje = function ($viaje) use (&$validador) {
                if (!$viaje instanceof Viaje) {
                    $validador = false;
                }
            };
            array_walk($viajes, $validar_viaje, $validador);
            # Si no es un viaje lanzo una excepción
            if (!$validador) {
                throw new Exception("El valor ingresado no es del tipo Viaje");
            }
            $this->viajes = array_merge($this->viajes, $viajes);
            #Si no es un array valido que el objeto sea un viaje
        }
        return $this;
    }

    /**
     * Agrega hojas de rutas en la propia hoja de ruta. Valida que sea del tipo Hoja de ruta
     * @param mixed $hoja_ruta
     * 
     * @return HojaRuta
     * @throws Exceptions 
     */
    public function setHojasRutas(array $hojas_rutas)
    {
        # Verifico que venga al menos un valor
        if (count($hojas_rutas) > 0) {
            $validador = true;
            # Valido que todos los elementos del array sea del tipo HojaRuta
            $validar_hojas_rutas = function ($hoja_ruta) use (&$validador) {
                if (!$hoja_ruta instanceof HojaRuta) {
                    $validador = false;
                }
            };
            array_walk($hojas_rutas, $validar_hojas_rutas, $validador);
            # Si no es un viaje lanzo una excepción
            if (!$validador) {
                throw new Exception("El valor ingresado no es del tipo HojaRuta");
            }
            $this->hojas_rutas = array_merge($this->hojas_rutas, $hojas_rutas);
            #Si no es un array valido que el objeto sea una HojaRuta
        }
        return $this;
    }
    /**
     * Getter las hojas de ruta
     * 
     * @return array
     */
    public function getHojasRutas()
    {
        return $this->hojas_rutas;
    }

    /**
     * Getter viajes
     * 
     * @return array
     */
    public function getViajes()
    {
        return $this->viajes;
    }

    /*******************
     * Private Methods**
     * *****************
     * *****************
     *******************/

     /**
      * Método privado para calcular el peso total de todos los viaje que se va a realizar en el Camion
      *
      * @return float
      */
    private function calcularPesoTotalViajes()
    {
        $total_peso_viaje = 0;
        $calcular_total_viaje = function ($viaje) use (&$total_peso_viaje) {
            $total_peso_viaje += $viaje->calcularPesoTotalPaquetes();
        };
        @array_walk($this->getViajes(), $calcular_total_viaje, $total_peso_viaje);
        return $total_peso_viaje;
    }

      /**
      * Método privado para calcular el volumen total de todos los viajes que se va a realizar en el Camion
      *
      * @return float
      */

    private function calcularVolumenTotalViajes()
    {
        $total_volumen_viaje = 0;
        $calcular_total_viaje = function ($viaje) use (&$total_volumen_viaje) {
            $total_volumen_viaje += $viaje->calcularVolumenTotalPaquetes();
        };
        @array_walk($this->getViajes(), $calcular_total_viaje, $total_volumen_viaje);
        return $total_volumen_viaje;
    }
      /**
      * Método privado para calcular el costo total de todos los viajes que se va a realizar en el Camion
      *
      * @return float
      */
    private function calcularCostoTotalViajes() {
        $total_costo_viajes = 0;
        $calcular_costo_viaje = function ($viaje) use (&$total_costo_viajes) {
            $total_costo_viajes += $viaje->calcularCostos();
        };
        @array_walk($this->getViajes(), $calcular_costo_viaje, $total_costo_viajes);
        return $total_costo_viajes;
    }
}
