<?php

/**
 * Objeto: PerspectivaKpi
 */

class PerspeKpi {

    private $oid;
    private $pe_oid;
    private $kpi_oid;

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

    public function getPeOid()
    {
        return $this->pe_oid;
    }

    public function setPeOid($pe_oid)
    {
        $this->pe_oid = $pe_oid;
    }

    public function getKpiOid()
    {
        return $this->kpi_oid;
    }

    public function setKpiOid($kpi_oid)
    {
        $this->kpi_oid = $kpi_oid;
    }
}