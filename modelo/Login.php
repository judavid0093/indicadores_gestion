<?php

/**
 * Objeto: Login
 */

class Login
{
    private $oid;
    private $cuenta;
    private $clave;
    private $tipo_cuenta_oid;
    private $colaborador_id;
    private $estado;

    public function getOid()
    {
        return $this->oid;
    }

    public function setOid($oid)
    {
        $this->oid = $oid;
    }
    public function getCuenta()
    {
        return $this->cuenta;
    }

    public function setCuenta($cuenta)
    {
        $this->cuenta = $cuenta;
    }

    public function getClave()
    {
        return $this->clave;
    }

    public function setClave($clave)
    {
        $this->clave = $clave;
    }

    public function getTipoCuentaOid()
    {
        return $this->tipo_cuenta_oid;
    }

    public function setTipoCuentaOid($tipo_cuenta_oid)
    {
        $this->tipo_cuenta_oid = $tipo_cuenta_oid;
    }

    public function getColaboradorId()
    {
        return $this->colaborador_id;
    }

    public function setColaboradorId($colaborador_id)
    {
        $this->colaborador_id = $colaborador_id;
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
