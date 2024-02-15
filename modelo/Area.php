<?php

/**
 * Objeto: Area
 */

class Area 
{
    private $oid;
    private $area_id;
    private $nombre;
    private $descripcion;
    private $estado;

    function __construct()
    {

    }

    public function getOid(){
        return $this->oid;
    }

    public function setOid($oid){
        $this->oid = $oid; 
    }


    public function getAreaId(){
        return $this->area_id;
    }

    public function setAreaId($area_id){
        $this->area_id = $area_id; 
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


    public function getEstado(){
        return $this->estado;
    }

    public function setEstado($estado){
        $this->estado = $estado;
    }
}
