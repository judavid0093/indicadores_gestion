<?php

include_once './dao/Conexion.php';
include_once './controlador/ControladorOid.php';

/**
 * ControladorArea: Gestiona Base de Datos y Kpi
 */
class ControladorKpi
{

    private $conexion;
    private $nuevoOid;

    public function __construct()
    {
        $this->conexion = new Conexion();
        $this->nuevoOid = new ControladorOid();
    }

    /**
     * Inserta un Objeto Kpi
     *
     * @param Kpi $kpi Objeto Kpi ha insertar
     * @return true si el Kpi se inserto con éxito
     * @return false si el Kpi no se inserto con éxito
     */
    public function insertarKpi(Kpi $kpi)
    {
        try {
            $sql = "INSERT INTO `kpi`(`oid`, `nombre`, `descripcion`, `okr_oid`, `estado`) VALUES (?,?,?,?,?)";
            $kpi->setOid($this->nuevoOid->obtenerNuevoOid());
            $kpi->setEstado('a');
            $array = array($kpi->getOid(), $kpi->getNombre(), $kpi->getDescripcion(), $kpi->getOkrOid(), $kpi->getEstado());
            if ($this->conexion->execute($sql, $array)) {
                return true;
            } else {
                return false;
            }
        } catch (Exception $e) {
            echo "\nControladorKpi (insertarKpi) ERROR: " . $e->getMessage() . "\n";
            return false;
        }
    }

    /**
     * Buscar un Objeto Kpi
     *
     * @param Kpi $kpi Objeto Kpi ha buscar
     * @return Kpi $kpi Objeto Kpi encontrado 
     * @return null si el Kpi no se encontro
     */
    public function buscarKpi(Kpi $kpi)
    {
        try {
            $sql = "SELECT `oid`, `kpi_id`, `nombre`, `descripcion`, `okr_oid`, `estado` FROM `kpi` WHERE `oid`=? OR `kpi_id`=? OR `nombre`=?";
            $array = array($kpi->getOid(), $kpi->getKpiId(), $kpi->getNombre());
            $result = $this->conexion->preperCondicionado($sql, $array);
            if ($result != null) {
                $kpi->setOid($result->oid);
                $kpi->setKpiId($result->kpi_id);
                $kpi->setNombre($result->nombre);
                $kpi->setDescripcion($result->descripcion);
                $kpi->setOkrOid($result->okr_oid);
                $kpi->setEstado($result->estado);
                return $kpi;
            } else {
                return null;
            }
        } catch (Exception $e) {
            echo "\nControladorKpi (buscarKpi) ERROR: " . $e->getMessage() . "\n";
            return null;
        }
    }

    /**
     * Modificar un Objeto Kpi
     *
     * @param Kpi $kpi Objeto Kpi ha modificar
     * @return true si el Kpi se modifico con éxito
     * @return false si el Kpi no se modifico con éxito
     */
    public function modificarKpi(Kpi $kpi)
    {
        try {
            $sql = "UPDATE `kpi` SET `nombre`=?,`descripcion`=?,`okr_oid`=? WHERE `oid`=? OR `kpi_id`=? AND `estado`='a';";
            $array = array($kpi->getNombre(), $kpi->getDescripcion(), $kpi->getOkrOid(), $kpi->getOid(), $kpi->getKpiId());
            if ($this->conexion->execute($sql, $array)) {
                return true;
            } else {
                return false;
            }
        } catch (Exception $e) {
            echo "\nControladorLogin (insertarLogin) ERROR: " . $e->getMessage() . "\n";
            return false;
        }
    }

    /**
     * Deshabilitar un Objeto Kpi 
     *
     * @param Kpi $kpi Objeto Kpi ha deshibilitar 
     * @return true si el Kpi se deshabilito con éxito
     * @return false si el Kpi no se deshabilito con éxito
     */
    public function deshabilitarKpi(Kpi $kpi)
    {
        try {
            $sql = "UPDATE `kpi` SET `estado`=? WHERE `oid`=? OR `kpi_id`=? AND `estado`='a';";
            $kpi->setEstado('d');
            $array = array($kpi->getEstado(), $kpi->getOid(), $kpi->getKpiId());
            if ($this->conexion->execute($sql, $array)) {
                return true;
            } else {
                return false;
            }
        } catch (Exception $e) {
            echo "\nControladorLogin (insertarLogin) ERROR: " . $e->getMessage() . "\n";
            return false;
        }
    }

    /**
     * Habilitar un Objeto Kpi 
     *
     * @param Kpi $kpi Objeto Kpi ha habilitar 
     * @return true si el Kpi se habilito con éxito
     * @return false si el Kpi no se habilito con éxito
     */
    public function habiltarKpi(Kpi $kpi)
    {
        try {
            $sql = "UPDATE `kpi` SET `estado`=? WHERE `oid`=? OR `kpi_id`=? AND `estado`='d';";
            $kpi->setEstado('a');
            $array = array($kpi->getEstado(), $kpi->getOid(), $kpi->getKpiId());
            if ($this->conexion->execute($sql, $array)) {
                return true;
            } else {
                return false;
            }
        } catch (Exception $e) {
            echo "\nControladorLogin (insertarLogin) ERROR: " . $e->getMessage() . "\n";
            return false;
        }
    }
}
