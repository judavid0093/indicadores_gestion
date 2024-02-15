<?php

/**
 * Objeto: TarjetaPutuancion
 */

class TarjetaPuntuacion
{

    private $oid;
    private $nombre;
    private $contenido;
    private $mision;
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

    public function getNombre()
    {
        return $this->nombre;
    }

    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }

    public function getContenido()
    {
        return $this->contenido;
    }

    public function setContenido($contenido)
    {
        $this->contenido = $contenido;
    }

    public function getMision()
    {
        return $this->mision;
    }

    public function setMision($mision)
    {
        $this->mision = $mision;
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
