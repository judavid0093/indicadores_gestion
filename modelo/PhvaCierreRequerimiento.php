<?php

/**
 * Objeto: PhvaCierreRequerimiento
 */

 class PhvaCierreRequerimiento
 {

    public $oid;
    public $phva_oid;
    public $descripcion;
    public $colaborador_id_aprobacion;
    public $fecha_aprobacion;
    public $tipo_declaracion;
    public $texto_declaracion;
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

    public function getPhvaOid(){
        return $this->phva_oid;
    }

    public function setPhvaOid($phva_oid){
        $this->phva_oid = $phva_oid;
    }

    public function getDescripcion(){
        return $this->descripcion;
    }

    public function setDescripcion($descripcion){
        $this->descripcion = $descripcion;
    }

    public function getColaboradorIdAprobacion(){
        return $this->colaborador_id_aprobacion;
    }

    public function setColaboradorIdAprobacion($colaborador_id_aprobacion){
        $this->colaborador_id_aprobacion = $colaborador_id_aprobacion;
    }

    public function getFechaAprobacion(){
        return $this->fecha_aprobacion;
    }

    public function setFechaAprobacion($fecha_aprobacion){
        $this->fecha_aprobacion = $fecha_aprobacion;
    }

    public function getTipoDeclaracion(){
        return $this->tipo_declaracion;
    }

    public function setTipoDeclaracion($tipo_declaracion){
        $this->tipo_declaracion = $tipo_declaracion;
    }

    public function getTextoDeclaracion(){
        return $this->texto_declaracion;
    }

    public function setTextoDeclaracion($texto_declaracion){
        $this->texto_declaracion = $texto_declaracion;
    }

    public function getEstado(){
        return $this->estado;
    }

    public function setEstado($estado){
        $this->estado = $estado;
    }

}