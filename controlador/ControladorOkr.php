<?php

include_once './dao/Conexion.php';
include_once './controlador/ControladorOid.php';

/**
 * ControladorArea: Gestiona Base de Datos y Okr
 */
class ControladorOkr
{
    private $conexion;
    private $nuevoOid;

    public function __construct()
    {
        $this->conexion = new Conexion();
        $this->nuevoOid = new ControladorOid();
    }

    /**
     * Insertar un Objeto Okr
     *
     * @param Okr $okr Objeto Okr ha insertar
     * @return true si el Okr se inserto con éxito
     * @return false si el Okr no se inserto con éxito
     */
    public function insertarOkr(Okr $okr)
    {
        try {
            $sql = "INSERT INTO `okr`(`oid`, `nombre`, `fecha_inicio`, `fecha_fin`, `descripcion`, `estado`) VALUES (?,?,?,?,?,?);";
            $okr->setOid($this->nuevoOid->obtenerNuevoOid());
            $okr->setEstado('a');
            $array = array($okr->getOid(), $okr->getNombre(), $okr->getFechaInicio(), $okr->getFechaFin(), $okr->getDescripcion(), $okr->getEstado());
            if ($this->conexion->execute($sql, $array)) {
                return true;
            } else {
                return false;
            }
        } catch (Exception $e) {
            echo "\nControladorOkr (insentarOkr) ERROR: " . $e->getMessage() . "\n";
            return false;
        }
    }

    /**
     * Buscar un Objeto Okr
     *
     * @param Okr $okr Objeto Okr ha buscar 
     * @return Okr $okr Objeto Okr encontrado
     * @return null si el Okr no se encontro
     */
    public function buscarOkr(Okr $okr)
    {
        try {
            $sql = "SELECT `oid`, `nombre`, `fecha_inicio`, `fecha_fin`, `descripcion`, `estado` FROM `okr` WHERE `oid`= ? OR `nombre`= ?;";
            $array = array($okr->getOid(), $okr->getNombre());
            $result = $this->conexion->preperCondicionado($sql, $array);
            if ($result != null) {
                $okr->setOid($result->oid);
                $okr->setNombre($result->nombre);
                $okr->setFechaInicio($result->fecha_inicio);
                $okr->setFechaFin($result->fecha_fin);
                $okr->setDescripcion($result->descripcion);
                $okr->setEstado($result->estado);
                return $okr;
            } else {
                return null;
            }
        } catch (Exception $e) {
            echo "\nControladorOkr (buscarOkr) ERROR: " . $e->getMessage() . "\n";
            return null;
        }
    }

    /**
     * Modificar un Objeto Okr
     *
     * @param Okr $okr Objeto Okr ha modificar 
     * @return true si el Okr se modifico con éxito
     * @return false si el Okr no se modifico con éxito
     */
    public function modificarOkr(Okr $okr)
    {
        try {
            $sql = "UPDATE `okr` SET `nombre`=?,`fecha_inicio`=?,`fecha_fin`=?,`descripcion`=?,`estado`=? WHERE `oid`=? OR `nombre`=? AND `estado`='a';";
            $okr->setEstado('a');
            $array = array($okr->getNombre(), $okr->getFechaInicio(), $okr->getFechaFin(), $okr->getDescripcion(), $okr->getEstado(), $okr->getOid(), $okr->getNombre());
            if ($this->conexion->execute($sql, $array)) {
                return true;
            } else {
                return false;
            }
        } catch (Exception $e) {
            echo "\nControladorOkr (modificarOkr) ERROR: " . $e->getMessage() . "\n";
            return false;
        }
    }

    /**
     * Deshabilitar un Objeto Okr
     *
     * @param Okr $okr Objeto Okr ha deshabilitar 
     * @return true si el Okr se deshabilito con éxito
     * @return false si el Okr no se deshabilito con éxito
     */
    public function deshabilitarOkr(Okr $okr)
    {
        try {
            $sql = "UPDATE `okr` SET `estado`=? WHERE `oid`=? AND `estado`='a';";
            $okr->setEstado('d');
            $array = array($okr->getEstado(), $okr->getOid());
            if ($this->conexion->execute($sql, $array)) {
                return true;
            } else {
                return false;
            }
        } catch (Exception $e) {
            echo "\nControladorOkr (deshabilitarOkr) ERROR: " . $e->getMessage() . "\n";
            return false;
        }
    }

    /**
     * Habilitar un Objeto Okr
     *
     * @param Okr $okr Objeto Okr ha habilitar 
     * @return true si el Okr se habilito con éxito
     * @return false si el Okr no se habilito con éxito
     */
    public function habilitarOkr(Okr $okr)
    {
        try {
            $sql = "UPDATE `okr` SET `estado`=? WHERE `oid`=? AND `estado`='d';";
            $okr->setEstado('a');
            $array = array($okr->getEstado(), $okr->getOid());
            if ($this->conexion->execute($sql, $array)) {
                return true;
            } else {
                return false;
            }
        } catch (Exception $e) {
            echo "\nControladorOkr (habilitarOkr) ERROR: " . $e->getMessage() . "\n";
            return false;
        }
    }
}
