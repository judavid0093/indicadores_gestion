<?php

/**
 * Objeto: Phva
 */

class Phva{

    public $oid;
    public $nombre;
    public $fecha_kpi_medida1;
    public $fecha_kpi_medida2;
    public $frecuencia_kpi;
    public $fecha_inicio;
    public $fecha_fin;
    public $descripcion;
    public $colaborador_aprobacion;
    public $fecha_aprobacion;
    public $estado;

    public function __construct()
    {
        
    }

    public function getOid(){
        return $this->oid;
    }

    public function setOid($oid){
        $this->oid = $oid;
    }

    public function getNombre(){
        return $this->nombre;
    }

    public function setNombre($nombre){
        $this->nombre = $nombre;
    }

    public function getFechaKpiMedida1(){
        return $this->fecha_kpi_medida1;
    }

    public function setFechaKpiMedida1($fecha_kpi_medida1){
        $this->fecha_kpi_medida1 = $fecha_kpi_medida1;
    }

    public function getFechaKpiMedida2(){
        return $this->fecha_kpi_medida2;
    }

    public function setFechaKpiMedida2($fecha_kpi_medida2){
        $this->fecha_kpi_medida2 = $fecha_kpi_medida2;
    }

    public function getFrecuenciaKpi(){
        return $this->frecuencia_kpi;
    }

    public function setFrecuenciaKpi($frecuencia_kpi){
        $this->frecuencia_kpi = $frecuencia_kpi;
    }

    public function getFechaInicio(){
        return $this->fecha_inicio;
    }

    public function setFechaInicio($fecha_inicio){
        $this->fecha_inicio = $fecha_inicio;
    }

    public function getFechaFin(){
        return $this->fecha_fin;
    }

    public function setFechaFin($fecha_fin){
        $this->fecha_fin = $fecha_fin;
    }

    public function getDescripcion(){
        return $this->descripcion;
    }

    public function setDescripcion($descripcion){
        $this->descripcion = $descripcion;
    }

    public function getColaboradorAprovacion(){
        return $this->colaborador_aprobacion;
    }

    public function setColaboradorAprobacion($colaborador_aprobacion){
        $this->colaborador_aprobacion = $colaborador_aprobacion;
    }

    public function getFechaAprobacion(){
        return $this->fecha_aprobacion;
    }

    public function setFechaAprobacion($fecha_aprobacion){
        $this->fecha_aprobacion = $fecha_aprobacion;
    }

    public function getEstado(){
        return $this->estado;
    }

    public function setEstado($estado){
        $this->estado = $estado;
    }

}