<?php

/**
 * Objeto: Perspectiva
 */

class Perspectiva
{

    private $oid;
    private $tp_oid;
    private $nombre;
    private $peso;
    private $tab_num;
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

    public function getTpOid()
    {
        return $this->tp_oid;
    }

    public function setTpOid($tp_oid)
    {
        $this->tp_oid = $tp_oid;
    }

    public function getNombre()
    {
        return $this->nombre;
    }

    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }

    public function getPeso()
    {
        return $this->peso;
    }

    public function setPeso($peso)
    {
        $this->peso = $peso;
    }

    public function getTabNum()
    {
        return $this->tab_num;
    }

    public function setTabNum($tab_num)
    {
        $this->tab_num = $tab_num;
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
