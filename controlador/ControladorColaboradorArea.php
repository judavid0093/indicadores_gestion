<?php

include_once './dao/Conexion.php';
include_once './controlador/ControladorOid.php';

/**
 * ControladorArea: Gestiona Base de Datos y ColaboradorArea
 * 
 */
class ControladorColaboradorArea
{
    private $conexion;
    private $nuevoOid;

    public function __construct()
    {
        $this->conexion = new Conexion();
        $this->nuevoOid = new ControladorOid();
    }

    /**
     * Inserta un Objeto ColaboradorArea
     *
     * @param ColaboradorArea $colaboradoArea Objeto ColaboradorArea ha insertar
     * @return true si el ColaboradorArea se inserto con éxito
     * @return false si el ColaboradorArea no se inserto con éxito
     */
    public function insertarColaboradorArea(ColaboradorArea $colaboradorArea)
    {
        try {
            $sql = "INSERT INTO `colaborador_area`(`oid`, `area_id`, `colaborador_id`) VALUES (?,?,?);";
            $colaboradorArea->setOid($this->nuevoOid->obtenerNuevoOid());
            $array = array($colaboradorArea->getOid(), $colaboradorArea->getAreaId(), $colaboradorArea->getColaboradorId());
            if ($this->conexion->execute($sql, $array)) {
                return true;
            } else {
                return false;
            }
        } catch (Exception $e) {
            echo "\nControladorColaboradorArea (insertarColaboradorArea) ERROR: " . $e->getMessage() . "\n";
            return true;
        }
    }

    /**
     * Buscar un Objeto ColaboradorArea
     *
     * @param ColaboradorArea $colaboradorArea Objeto ColaboradorArea ha buscar
     * @return ColaboradorArea $colaboradorArea Objeto ColaboradorArea encontrado
     * @return null si el Objeto ColaboradorArea no se encontro
     */
    public function buscarColaboradorArea(ColaboradorArea $colaboradorArea)
    {
        try {
            $sql = "SELECT `oid`, `area_id`, `colaborador_id` FROM `colaborador_area` WHERE `area_id`=? OR `colaborador_id`=? AND 
            ;";
            $array = array($colaboradorArea->getOid(), $colaboradorArea->getAreaId(), $colaboradorArea->getColaboradorId());
            $result = $this->conexion->preperCondicionado($sql, $array);
            if ($result !== null) {
                $colaboradorArea->setOid($result->oid);
                $colaboradorArea->setAreaId($result->area_id);
                $colaboradorArea->setColaboradorId($result->colaborador_id);
                return $colaboradorArea;
            } else {
                return null;
            }
        } catch (Exception $e) {
            echo "\nControladorColaboradorArea (buscarColaboradorArea) ERROR: " . $e->getMessage() . "\n";
            return null;
        }
    }

    /**
     * Modificar un Objeto ColaboradorArea
     *
     * @param ColaboradorArea $colaboradoArea Objeto ColaboradorArea ha modificar
     * @return true si el ColaboradorArea se modifico con éxito
     * @return false si el ColaboradorArea no se modifico con éxito
     */
    public function modificarColaboradorArea(ColaboradorArea $colaboradorArea)
    {
        try {
            $sql = "UPDATE `colaborador_area` SET `area_id`=?,`colaborador_id`=? WHERE `oid`=?;";
            $array = array($colaboradorArea->getAreaId(), $colaboradorArea->getColaboradorId(), $colaboradorArea->getOid());
            if ($this->conexion->execute($sql, $array)) {
                return true;
            } else {
                return false;
            }
        } catch (Exception $e) {
            echo "\nControladorColaboradorArea (modificarColaboradorArea) ERROR: " . $e->getMessage() . "\n";
            return true;
        }
    }
}
