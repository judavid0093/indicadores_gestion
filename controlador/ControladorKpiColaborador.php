<?php

include_once './dao/Conexion.php';
include_once './controlador/ControladorOid.php';

/**
 * ControladorArea: Gestiona Base de Datos y KpiColaborador
 */
class ControladorKpiColaborador
{

    private $conexion;
    private $nuevoOid;

    public function __construct()
    {
        $this->conexion = new Conexion();
        $this->nuevoOid = new ControladorOid();
    }

    /**
     * Inserta un Objeto KpiColaborador
     *
     * @param KpiColaborador $kpiColaborador Objeto KpiColaborador ha insertar
     * @return true si el Area se inserto con éxito
     * @return false si el Arrea no se inserto con éxito
     */
    public function insertarKpiColaborador(KpiColaborador $kpiColaborador)
    {
        try {
            $sql = "INSERT INTO `kpi_colaborador`(`oid`, `kpi_oid`, `colaborador_id`) VALUES (?,?,?);";
            $kpiColaborador->setOid($this->nuevoOid->obtenerNuevoOid());
            $array = array($kpiColaborador->getOid(), $kpiColaborador->getKpiOid(), $kpiColaborador->getColaboradorId());
            if ($this->conexion->execute($sql, $array)) {
                return true;
            } else {
                return false;
            }
        } catch (Exception $e) {
            echo "ControladorKpiColaborador (insertarKpiColaborador) ERROR: " . $e->getMessage();
            return false;
        }
    }

    public function buscarKpiColaborador(KpiColaborador $kpiColaborador)
    {
        try {
            $sql = "SELECT `oid`, `kpi_oid`, `colaborador_id` FROM `kpi_colaborador` WHERE `oid`=? OR `kpi_oid`=? OR `colaborador_id`=?";
            $array = array($kpiColaborador->getOid(), $kpiColaborador->getKpiOid(), $kpiColaborador->getColaboradorId());
            $result = $this->conexion->preperCondicionado($sql, $array);
            if ($result != null) {
                $kpiColaborador->setOid($result->oid);
                $kpiColaborador->setKpiOid($result->kpi_oid);
                $kpiColaborador->setColaboradorId($result->colaborador_id);
                return $kpiColaborador;
            } else {
                return null;
            }
        } catch (Exception $e) {
            echo "ControladorKpiColaborador (buscarKpiColaborador) ERROR: " . $e->getMessage();
            return null;
        }
    }

    /**
     * un Objeto
     *
     * @param  $ Objeto  ha 
     * @return true si el  se  con éxito
     * @return false si el  no se  con éxito
     */
    public function modificarKpiColaborador(KpiColaborador $kpiColaborador)
    {
        try {
            $sql = "UPDATE `kpi_colaborador` SET `kpi_oid`=?,`colaborador_id`=? WHERE `oid`=?";
            $array = array($kpiColaborador->getKpiOid(), $kpiColaborador->getColaboradorId(), $kpiColaborador->getOid());
            if ($this->conexion->execute($sql, $array)) {
                return true;
            } else {
                return false;
            }
        } catch (Exception $e) {
            echo "ControladorKpiColaborador (modificarKpiColaborador) ERROR: " . $e->getMessage();
            return false;
        }
    }
}
