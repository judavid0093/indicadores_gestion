<?php

/**
 * Objeto: Colaborador
 */

class Colaborador
{

    private $oid;
    private $colaborador_id;
    private $nombre;
    private $apellido;
    private $descripcion;
    private $nombre_empleo;
    private $estado;

    public function __construct()
    {
        
    }

    public function getOid(){
        return $this->oid;
    }

    public function setOid($oid){
        $this->oid = $oid; 
    }


    public function getColaboradorId(){
        return $this->colaborador_id;
    }

    public function setColaboradorId($colaborador_id){
        $this->colaborador_id = $colaborador_id;
    }


    public function getNombre(){
        return $this->nombre;
    }

    public function setNombre($nombre){
        $this->nombre = $nombre; 
    }


    public function getApellido(){
        return $this->apellido;
    }

    public function setApellido($apellido){
        $this->apellido = $apellido;
    }


    public function getDescripcion(){
        return $this->descripcion;
    }

    public function setDescripcion($descripcion){
        $this->descripcion = $descripcion;
    }


    public function getNombreEmpleo(){
        return $this->nombre_empleo;
    }

    public function setNombreEmpleo($nombre_empleo){
        $this->nombre_empleo = $nombre_empleo;
    }


    public function getEstado(){
        return $this->estado;
    }

    public function setEstado($estado){
        $this->estado = $estado;
    }

}