<?php

include_once './dao/Conexion.php';

/**
 * ControladorArea: Gestiona Base de Datos y Oid
 */
class ControladorOid
{
    private $conexion;

    public function __construct()
    {
        $this->conexion = new Conexion();
    }

    /**
     * Obter OID (object Idenrtificator)
     *  
     * @return String $oid Nuevo Oid creado 
     */
    public function obtenerNuevoOid()
    {
        try {
            $oid = uniqid();
            $sql = "INSERT INTO `oid`(`oid`) VALUES (?)";
            $array = array($oid);
            while ($this->conexion->execute($sql, $array) === null) {
                $oid = uniqid();
                $sql = "INSERT INTO `oid`(`oid`) VALUES (?)";
                $array = array($oid);
            }
            return $oid;
        } catch (Exception $e) {
            echo "\nControladorOid (obtenerNuevoOid) ERROR: " . $e->getMessage() . "\n";
        }
    }
}
