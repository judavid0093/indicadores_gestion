<?php

/**
 * Objeto: PhvaItemPropietario
 */

 class PhvaItemPropietario{

    public $oid;
    public $item_oid;
    public $colaborador_id;

    public function __construct()
    {
    }

    public function getOid(){
        return $this->oid;
    }

    public function setOid($oid){
        $this->oid = $oid;
    }

    public function getItemOid(){
        return $this->item_oid;
    }

    public function setItemId($item_oid){
        $this->item_oid = $item_oid;
    }

    public function getColaboradorId(){
        return $this->colaborador_id;
    }

    public function setColaboradorId($colaborador_id){
        $this->colaborador_id = $colaborador_id;
    }

 }