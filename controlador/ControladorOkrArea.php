<?php

include_once './dao/Conexion.php';
include_once './controlador/ControladorOid.php';

/**
 * ControladorArea: Gestiona Base de Datos y OkrArea
 */
class ControladorOkrArea
{
    private $conexion;
    private $nuevoOid;

    public function __construct()
    {
        $this->conexion = new Conexion();
        $this->nuevoOid = new ControladorOid();
    }

    /**
     * Insertar un Objeto OkrArea
     *
     * @param Okr $okr Objeto Okr ha insertar
     * @return true si el Okr se inserto con éxito
     * @return false si el Okr no se inserto con éxito
     */
    public function insertarOkrArea(OkrArea $okrArea)
    {
        try {
            $sql = "INSERT INTO `okr_area`(`oid`, `id_area`, `oidokr`) VALUES (?,?,?);";
            $okrArea->setOid($this->nuevoOid->obtenerNuevoOid());
            $array = array($okrArea->getOid(), $okrArea->getIdArea(), $okrArea->getOidOkr());
            if ($this->conexion->execute($sql, $array)) {
                return true;
            } else {
                return false;
            }
        } catch (Exception $e) {
            echo "\nControlOkrArea (insertarOkrArea) ERROR: " . $e->getMessage() . "\n";
            return false;
        }
    }

    /**
     * Buscar un Objeto OkrArea
     *
     * @param OkrArea $okrArea Objeto Okr ha buscar
     * @return OkrArea $okrArea Objeto Okr encontrado
     * @return null si el Okr no se encontro
     */
    public function buscarOkrArea(OkrArea $okrArea)
    {
        try {
            $sql = "SELECT `oid`, `id_area`, `oidokr` FROM `okr_area` WHERE `id_area`=? OR `oidokr`=? OR `oid`=?;";
            $array = array($okrArea->getIdArea(), $okrArea->getOidOkr(), $okrArea->getOid());
            $result = $this->conexion->preperCondicionado($sql, $array);
            if ($result != null) {
                $okrArea->setOid($result->oid);
                $okrArea->setIdArea($result->id_area);
                $okrArea->setOidOkr($result->oidokr);
                return $okrArea;
            } else {
                return null;
            }
        } catch (Exception $e) {
            echo "\nControlOkrArea (buscarOkrArea) ERROR: " . $e->getMessage() . "\n";
            return null;
        }
    }

    /**
     * Modificar un Objeto OkrArea
     *
     * @param OkrArea $okrArea Objeto OkrArea ha modificado
     * @return true si el OkrArea se modifico con éxito
     * @return false si el OkrArea no se modifico con éxito
     */
    public function modificarOkrArea(OkrArea $okrArea)
    {
        try {
            $sql = "UPDATE `okr_area` SET `id_area`=?,`oidokr`=? WHERE `oid`=?;";
            $array = array($okrArea->getIdArea(), $okrArea->getOidOkr(), $okrArea->getOid());
            if ($this->conexion->execute($sql, $array)) {
                return true;
            } else {
                return false;
            }
        } catch (Exception $e) {
            echo "\nControlOkrArea (modificarOkrArea) ERROR: " . $e->getMessage() . "\n";
            return false;
        }
    }
}
