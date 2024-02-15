<?php

/**
 * Objeto: KpiColaborador
 */

class KpiColaborador{
    private $oid;
    private $kpi_oid;
    private $colaborador_id;

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

    public function getColaboradorId()
    {
        return $this->colaborador_id;
    }

    public function setColaboradorId($colaborador_id)
    {
        $this->colaborador_id = $colaborador_id;
    }
}