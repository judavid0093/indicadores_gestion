<?php

include_once './dao/Conexion.php';
include_once './controlador/ControladorOid.php';

/**
 * ControladorPhvaArea: Gestiona Base de Datos y PhvaArea
 */
class ControladorPhvaArea
{
    private $conexion;
    private $nuevoOid;

    public function __construct()
    {
        $this->conexion = new Conexion();
        $this->nuevoOid = new ControladorOid();
    }

    /**
     * Inserta un Objeto PhvaArea
     *
     * @param PhvaArea $phvaArea Objeto Phva ha insertar
     * @return true si el PhvaArea se inserto con éxito
     * @return false si el PhvaArea no se inserto con éxito
     */
    public function insertarPhvaArea(PhvaArea $phvaArea)
    {
        try {
            $sql = "INSERT INTO `phva_area`(`oid`, `phva_oid`, `area_id`) VALUES (?,?,?)";
            $phvaArea->setOid($this->nuevoOid->obtenerNuevoOid());
            $array = array($phvaArea->getOid(), $phvaArea->getPhvaOid(), $phvaArea->getAreaId());
            if ($this->conexion->execute($sql, $array)) {
                return true;
            } else {
                return false;
            }
        } catch (Exception $e) {
            echo "\nControladorPhvaArea (insertarPhvaArea) ERROR: " . $e->getMessage() . "\n";
            return false;
        }
    }

    /**
     * Buscar un Objeto PhvaArea
     *
     * @param PhvaArea $phvaArea Objeto PhvaArea ha buscar
     * @return PhvaArea $phvaArea Objeto PhvaArea encontrado
     * @return null si el Objeto PhvaArea no se encontró
     */
    public function buscarPhvaArea(PhvaArea $phvaArea)
    {
        try {
            $sql = "SELECT `oid`, `phva_oid`, `area_id` FROM `phva_area` WHERE `phva_oid`=? OR `area_id`=? AND `oid`=?";
            $array = array($phvaArea->getPhvaOid(), $phvaArea->getAreaId(), $phvaArea->getOid());
            $result = $this->conexion->preperCondicionado($sql, $array);
            if ($result != null) {
                $phvaArea->setOid($result->oid);
                $phvaArea->setPhvaOid($result->phva_oid);
                $phvaArea->setAreaId($result->area_id);
                return $phvaArea;
            } else {
                return null;
            }
        } catch (Exception $e) {
            echo "\nControladorPhvaArea (buscarPhvaArea) ERROR: " . $e->getMessage() . "\n";
            return null;
        }
    }

    /**
     * Modificar un Objeto PhvaArea
     *
     * @param PhvaArea $phvaArea Objeto PhvaArea ha modificar
     * @return true si el PhvaArea se modificó con éxito
     * @return false si el PhvaArea no se modificó con éxito
     */
    public function modificarPhvaArea(PhvaArea $phvaArea)
    {
        try {
            $sql = "UPDATE `phva_area` SET `phva_oid`='?,`area_id`=? WHERE `oid`=?";
            $array = array($phvaArea->getPhvaOid(), $phvaArea->getAreaId(), $phvaArea->getOid());
            if ($this->conexion->execute($sql, $array)) {
                return true;
            } else {
                return false;
            }
        } catch (Exception $e) {
            echo "\nControladorPhvaArea (modificarPhvaArea) ERROR: " . $e->getMessage() . "\n";
            return false;
        }
    }
}