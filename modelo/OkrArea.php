<?php

/**
 * Objeto: OkrArea
 */

class OkrArea
{

    private $oid;
    private $idarea;
    private $oidokr;

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

    public function getIdArea()
    {
        return $this->idarea;
    }

    public function setIdArea($idarea)
    {
        $this->idarea = $idarea;
    }

    public function getOidOkr()
    {
        return $this->oidokr;
    }

    public function setOidOkr($oidokr)
    {
        $this->oidokr = $oidokr;
    }
}
