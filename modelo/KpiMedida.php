<?php

/**
 * Objeto: KpiMedida
 */

class KpiMedida{
    public $oid;
    public $kpi_oid;
    public $fecha;
    public $objetivo;
    public $actual;
    public $frecuencia;

    function __construct(){

    }
    
    public function getOid(){
        return $this->oid;
    }

    public function setOid($oid){
        $this->oid = $oid;
    }

    public function getKpiOid(){
        return $this->kpi_oid;
    }

    public function setKpiOid($kpi_oid){
        $this->kpi_oid = $kpi_oid;
    }

    public function getFecha(){
        return $this->fecha;
    }

    public function setFecha($fecha){
        $this->fecha = $fecha;
    }

    public function getObjetivo(){
        return $this->objetivo;
    }

    public function setObjetivo($objetivo){
        $this->objetivo = $objetivo;
    }

    public function getActual(){
        return $this->actual;
    }

    public function setActual($actual){
        $this->actual = $actual;
    }

    public function getFrecuencia(){
        return $this->frecuencia;
    }

    public function setFrecuencia($frecuencia){
        $this->frecuencia = $frecuencia;
    }
}