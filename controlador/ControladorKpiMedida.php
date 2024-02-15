<?php

include_once './dao/Conexion.php';
include_once './controlador/ControladorOid.php';

/**
 * ControladorArea: Gestiona Base de Datos y KpiMedida
 */
class ControladorKpiMedida
{

    private $conexion;
    private $nuevoOid;

    public function __construct()
    {
        $this->conexion = new Conexion();
        $this->nuevoOid = new ControladorOid();
    }

    /**
     * Inserta un Objeto KpiMedida
     *
     * @param KpiColaborador $kpiColaborador Objeto KpiColaborador ha insertar
     * @return true si el Area se inserto con éxito
     * @return false si el Arrea no se inserto con éxito
     */
    public function insertarKpiMedida(KpiMedida $kpimedida)
    {
        try {
            $sql = "INSERT INTO `kpi_medida`(`oid`, `kpi_oid`, `fecha`, `objetivo`, `actual`, `frecuencia`) VALUES (?,?,?,?,?,?);";
            $kpimedida->setOid($this->nuevoOid->obtenerNuevoOid());
            $array = array(
                $kpimedida->getOid(),
                $kpimedida->getKpiOid(),
                $kpimedida->getFecha(),
                $kpimedida->getObjetivo(),
                $kpimedida->getActual(),
                $kpimedida->getFrecuencia()
            );
            if ($this->conexion->execute($sql, $array)) {
                return true;
            } else {
                return false;
            }
        } catch (Exception $e) {
            echo "\nControladorKpiMedida (insertarKpiMedida) ERROR: " . $e->getMessage() . "\n";
            return false;
        }
    }

    /**
     * Buscar un Objeto KpiMedida
     *
     * @param KpiColaborador $kpiColaborador Objeto KpiColaborador ha buscar
     * @return KpiColaborador $kpiColaborador Objeto KpiColaborador encontrado
     * @return null si el KpiColaborador no se encontro
     */
    public function buscarKpiMedida(KpiMedida $kpimedida)
    {
        try {
            $sql = "SELECT `oid`, `kpi_oid`, `fecha`, `objetivo`, `actual`, `frecuencia` FROM `kpi_medida` WHERE `oid`=? AND `kpi_oid`=?";
            $array = array($kpimedida->getOid(), $kpimedida->getKpiOid());
            $result = $this->conexion->preperCondicionado($sql, $array);
            if ($result != null) {
                $kpimedida->setOid($result->oid);
                $kpimedida->setKpiOid($result->kpi_oid);
                $kpimedida->setFecha($result->fecha);
                $kpimedida->setObjetivo($result->objetivo);
                $kpimedida->setActual($result->actual);
                $kpimedida->setFrecuencia($result->frecuencia);
                return $kpimedida;
            } else {
                return null;
            }
        } catch (Exception $e) {
            echo "\nControladorKpiMedida (buscarKpiMedida) ERROR: " . $e->getMessage() . "\n";
            return null;
        }
    }

    /**
     * Modificar un Objeto KpiMedida
     *
     * @param KpiColaborador $kpiColaborador Objeto KpiColaborador ha modificar
     * @return true si el KpiColaborador se modifico con éxito
     * @return false si el KpiColaborador no se modifico con éxito
     */
    public function modificarKpiMedida(KpiMedida $kpimedida)
    {
        try {
            $sql = "UPDATE `kpi_medida` SET `kpi_oid`=?,`fecha`=?,`objetivo`=?,`actual`=?,`frecuencia`=? WHERE `oid`=?";
            $array = array(
                $kpimedida->getKpiOid(),
                $kpimedida->getFecha(),
                $kpimedida->getObjetivo(),
                $kpimedida->getActual(),
                $kpimedida->getFrecuencia(),
                $kpimedida->getOid()
            );
            if ($this->conexion->execute($sql, $array)) {
                return true;
            } else {
                return false;
            }
        } catch (Exception $e) {
            echo "\nControladorKpiMedida (modificarKpiMedida) ERROR: " . $e->getMessage() . "\n";
            return false;
        }
    }
}
