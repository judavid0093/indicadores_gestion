<?php

/**
 * Objeto: PhvaArea
 */

class PhvaArea
{

    public $oid;
    public $phva_oid;
    public $area_id;

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

    public function getAreaId(){
        return $this->area_id;
    }

    public function setAreaId($area_id){
        $this->area_id = $area_id;
    }
}