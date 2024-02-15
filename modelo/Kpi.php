<?php

/**
 * Objeto: Kpi
 */

class Kpi{

    private $oid;
    private $kpi_id;
    private $nombre;
    private $descripcion;
    private $okr_oid;
    private $estado;

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

    public function getKpiId()
    {
        return $this->kpi_id;
    }

    public function setKpiId($kpi_id)
    {
        $this->kpi_id = $kpi_id;
    }

    public function getNombre()
    {
        return $this->nombre;
    }

    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }

    public function getDescripcion()
    {
        return $this->descripcion;
    }

    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;
    }

    public function getOkrOid()
    {
        return $this->okr_oid;
    }

    public function setOkrOid($okr_oid)
    {
        $this->okr_oid = $okr_oid;
    }

    public function getEstado()
    {
        return $this->estado;
    }

    public function setEstado($estado)
    {
        $this->estado = $estado;
    }
        
}