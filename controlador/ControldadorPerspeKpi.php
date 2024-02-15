<?php

include_once './dao/Conexion.php';
include_once './controlador/ControladorOid.php';

/**
 * ControladorArea: Gestiona Base de Datos y PerspeKpi
 */

class ControladorPerspeKpi
{
    private $conexion;
    private $nuevoOid;

    public function __construct()
    {
        $this->conexion = new Conexion();
        $this->nuevoOid = new ControladorOid();
    }

    /**
     * Inserta un Objeto PerspeKpi
     *
     * @param PerspeKpi $perpeKpi Objeto PerspeKpi ha insertar
     * @return true si el PerspeKpi se inserto con éxito
     * @return false si el PerspeKpi no se inserto con éxito
     */
    public function insertarPerspePerspeKpi(PerspeKpi $perpeKpi)
    {
        try {
            $sql = "INSERT INTO `perspe_kpi`(`oid`, `pe_oid`, `kpi_oid`) VALUES (?,?,?)";
            $perpeKpi->setOid($this->nuevoOid->obtenerNuevoOid());
            $array = array($perpeKpi->getOid(), $perpeKpi->getPeOid(), $perpeKpi->getKpiOid());
            if ($this->conexion->execute($sql, $array)) {
                return true;
            } else {
                return false;
            }
        } catch (Exception $e) {
            echo "\nControladorPerspeKpi (insertarPerspeKpi) ERROR: " . $e->getMessage() . "\n";
            return false;
        }
    }

    /**
     * Busca un Objeto PerspeKpi
     *
     * @param PerspeKpi $perpeKpi
     * @return PerspeKpi $perpeKpi Objeto PerspeKpi encontrado  
     * @return null si el objeto PerspeKpi no se encontro
     */
    public function buscarPerspeKpi(PerspeKpi $perpeKpi){
        try {
            $sql = "SELECT `oid`, `pe_oid`, `kpi_oid` FROM `perspe_kpi` WHERE `pe_oid`=? OR `kpi_oid`=? AND `oid`=?";
            $array = array($perpeKpi->getPeOid(),$perpeKpi->getKpiOid(),$perpeKpi->getOid());
            $result = $this->conexion->preperCondicionado($sql,$array);
            if ($result !== null) {
                $perpeKpi->setOid($result->oid);
                $perpeKpi->setKpiOid($result->pe_oid);
                $perpeKpi->setPeOid($result->kpi_oid);
            } else {
                return null;
            }
        } catch (\Throwable $e) {
            echo "\nControladorPerspeKpi (buscarPerspeKpi) ERROR: " . $e->getMessage() . "\n";
            return false;
        }
    }

    /**
     * Modificar un Objeto PerspeKpi
     * @param PerspeKpi $perpeKpi Ojeto PerspeKpi ha modificar
     * @return true true si el PerspeKpi se modifico con éxito
     * @return false si el PerspeKpi no se modifico con éxito
     */
    public function modificarPerspeKpi(PerspeKpi $perpeKpi)
    {
        try {
            $sql = "UPDATE `perspe_kpi` SET `pe_oid`=?,`kpi_oid`=? WHERE `oid`=?";
            $array = array($perpeKpi->getPeOid(), $perpeKpi->getKpiOid(), $perpeKpi->getOid());
            if ($this->conexion->execute($sql, $array)) {
                return true;
            } else {
                return false;
            }
        } catch (Exception $e) {
            echo "\nControladorPerspeKpi (modificarPerspeKpi) ERROR: " . $e->getMessage() . "\n";
            return true;
        }
    }
}
