<?php

/**
 * Objeto: PhvaItem
 */

 class PhvaItem{
    public $oid;
    public $phva_oid;
    public $tipo_item;
    public $nombre;
    public $descripcion;
    public $fecha_inicio;
    public $fecha_fin;
    public $kpi_id;

    public function __construct()
    {
        
    }

    public function getOid(){
        return $this->oid;
    }

    public function setOid($oid){
        $this->oid = $oid;
    }

    public function getPhvaOid(){
        return $this->phva_oid;
    }

    public function setPhvaOid($phva_oid){
        $this->phva_oid = $phva_oid;
    }

    public function getTipoItem(){
        return $this->tipo_item;
    }

    public function setTipoItem($tipo_item){
        $this->tipo_item = $tipo_item;
    }

    public function getNombre(){
        return $this->nombre;
    }

    public function setNombre($nombre){
        $this->nombre = $nombre;
    }

    public function getDescripcion(){
        return $this->descripcion;
    }

    public function setDescripcion($descripcion){
        $this->descripcion = $descripcion;
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

    public function getKpiId(){
        return $this->kpi_id;
    }

    public function setKpiId($kpi_id){
        $this->kpi_id = $kpi_id;
    }

 }