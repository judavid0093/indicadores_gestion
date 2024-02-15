<?php

/**
 * Objeto: PhvaCargarArchivo
 */

 class PhvaCargarArchivo
 {

    public $oid;
    public $phva_oid;
    public $carga_oid;

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

    public function getCargaOid(){
        return $this->carga_oid;
    }

    public function setCargaOid($carga_oid){
        $this->carga_oid = $carga_oid;
    }
        
 }