<?php

/**
 * Objeto: ColaboradorArea
 */

class ColaboradorArea
{
    private $oid;
    private $area_id;
    private $colaborador_id;

    public function __construct()
    {
    }

    public function getOid()
    {
        return $this->oid;
    }

    public function setOid($oid)
    {
        $this->oid = $oid;
    }

    public function getAreaId()
    {
        return $this->area_id;
    }

    public function setAreaId($area_id)
    {
        $this->area_id = $area_id;
    }

    public function getColaboradorId()
    {
        return $this->colaborador_id;
    }

    public function setColaboradorId($colaborador_id)
    {
        $this->colaborador_id = $colaborador_id;
    }
}
