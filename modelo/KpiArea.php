<?php

/**
 * Objeto: KpiArea
 */

class KpiArea{  

    private $oid;
    private $kpi_oid;
    private $area_oid;

    public function getOid()
    {
        return $this->oid;
    }

    public function setOid($oid)
    {
        $this->oid = $oid;
    }

    public function getKpiOid()
    {
        return $this->kpi_oid;
    }

    public function setKpiOid($kpi_oid)
    {
        $this->kpi_oid = $kpi_oid;
    }

    public function getAreaOid()
    {
        return $this->area_oid;
    }

    public function setAreaOid($area_oid)
    {
        $this->area_oid = $area_oid;
    }

}