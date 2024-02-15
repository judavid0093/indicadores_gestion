<?php

include_once './dao/Conexion.php';
include_once './controlador/ControladorOid.php';

/**
 * ControladorArea: Gestiona Base de Datos y KpiArea
 * 
 */
class ControladorKpiArea
{

    private $conexion;
    private $nuevoOid;

    public function __construct()
    {
        $this->conexion = new Conexion();
        $this->nuevoOid = new ControladorOid();
    }

    /**
     * Insertar un Objeto KpiArea
     *
     * @param KpiArea $kpiArea Objeto KpiArea ha insertar 
     * @return true si el KpiArea se inserto con éxito
     * @return false si el KpiArea no se insertp con éxito
     */
    public function insertarKpiArea(KpiArea $kpiArea)
    {
        try {
            $sql = "INSERT INTO `kpi_area`(`oid`, `kpi_oid`, `area_id`) VALUES (?,?,?);";
            $kpiArea->setOid($this->nuevoOid->obtenerNuevoOid());
            $array = array($kpiArea->getOid(), $kpiArea->getKpiOid(), $kpiArea->getAreaOid());
            if ($this->conexion->execute($sql, $array)) {
                return true;
            } else {
                return false;
            }
        } catch (Exception $e) {
            echo "ControladorKpiArea (insertarKpiArea) ERROR: " . $e->getMessage();
            return false;
        }
    }

    /**
     * Buscar un Objeto KpiArea
     *
     * @param KpiArea $kpiArea Objeto KpiArea ha buscar 
     * @return KpiArea $kpiArea Objeto encontrado
     * @return null si el                                                                               
     */
    public function buscarKpiArea(KpiArea $kpiArea)
    {
        try {
            $sql = "SELECT `oid`, `kpi_oid`, `area_id` FROM `kpi_area` WHERE `oid`=? OR `kpi_oid`=? OR `area_id`=?";
            $array = array($kpiArea->getOid(), $kpiArea->getKpiOid(), $kpiArea->getAreaOid());
            $result = $this->conexion->preperCondicionado($sql, $array);
            if ($result != null) {
                $kpiArea->setOid($result->oid);
                $kpiArea->setKpiOid($result->kpi_id);
                $kpiArea->setAreaOid($result->area_id);
                return $kpiArea;
            } else {
                return null;
            }
        } catch (Exception $e) {
            echo "ControladorKpiArea (buscarKpiArea) ERROR: " . $e->getMessage();
            return null;
        }
    }

    /**
     * Modificar un Objeto KpiArea
     *
     * @param KpiArea $kpiArea Objeto KpiArea ha modificar 
     * @return true si el KpiArea se modifico con éxito
     * @return false si el KpiArea no se modifico con éxito
     */
    public function modificarKpiArea(KpiArea $kpiArea)
    {
        try {
            $sql = "UPDATE `kpi_area` SET `kpi_oid`=?,`area_id`=? WHERE `oid`=?";
            $array = array($kpiArea->getKpiOid(), $kpiArea->getAreaOid(), $kpiArea->getOid());
            if ($this->conexion->execute($sql, $array)) {
                return true;
            } else {
                return false;
            }
        } catch (Exception $e) {
            echo "ControladorKpiArea (modificarKpiArea) ERROR: " . $e->getMessage();
        }
    }
}
