<?php

include_once './dao/Conexion.php';
include_once './controlador/ControladorOid.php';

/**
 * ControladorArea: Gestiona Base de Datos y Area
 * 
 */
class ControladorArea
{
    private $conexion;
    private $nuevoOid;

    public function __construct()
    {
        $this->conexion = new Conexion();
        $this->nuevoOid = new ControladorOid();
    }

    /**
     * Inserta un Objeto Area
     *
     * @param Area $area Objeto Area ha insertar
     * @return true si el Area se inserto con éxito
     * @return false si el Arrea no se inserto con éxito
     */
    public function insertarArea(Area $area)
    {
        try {
            $sql = "INSERT INTO `area`(`oid`, `area_id`, `nombre`, `descripcion`, `estado`) VALUES (?,?,?,?,?);";
            $area->setOid($this->nuevoOid->obtenerNuevoOid());
            $area->setEstado('a');
            $array = array($area->getOid(), $area->getAreaId(), $area->getNombre(), $area->getDescripcion(), $area->getEstado());
            if ($this->conexion->execute($sql, $array)) {
                return true;
            } else {
                return false;
            }
        } catch (Exception $e) {
            echo "\nControladorArea (insertarArea) ERROR: " . $e->getMessage() . "\n";
            return false;
        }
    }

    /**
     * Buscar un Objeto Area
     *
     * @param Area $area Objeto Area ha buscar
     * @return Area $area Objeto Area encontrado
     * @return null si el Objeto Area no se encontró
     */
    public function buscarArea(Area $area)
    {
        try {
            $sql = "SELECT `oid`, `area_id`, `nombre`, `descripcion`, `estado` FROM `area` WHERE `area_id` = ? OR `nombre` = ?;";
            $array = array($area->getAreaId(), $area->getNombre());
            $result = $this->conexion->preperCondicionado($sql, $array);
            if ($result != null) {
                $area->setOid($result->oid);
                $area->setAreaId($result->area_id);
                $area->setNombre($result->nombre);
                $area->setDescripcion($result->descripcion);
                $area->setEstado($result->estado);
                return $area;
            } else {
                return null;
            }
        } catch (Exception $e) {
            echo "\nControladorArea (buscarArea) ERROR: " . $e->getMessage() . "\n";
            return null;
        }
    }

    /**
     * Modificar un Objeto Area
     *
     * @param Area $area Objeto Area ha modificar
     * @return true si el Area se modificó con éxito
     * @return false si el Area no se modificó con éxito
     */
    public function modificarArea(Area $area)
    {
        try {
            $sql = "UPDATE `area` SET `nombre`=?,`descripcion`=? WHERE `oid`=? AND `area_id` = ? and `estado`='a';";
            $area->setEstado('a');
            $array = array($area->getNombre(), $area->getDescripcion(), $area->getOid(), $area->getAreaId());
            if ($this->conexion->execute($sql, $array)) {
                return true;
            } else {
                return false;
            }
        } catch (Exception $e) {
            echo "\nControladorArea (modificarArea) ERROR: " . $e->getMessage() . "\n";
            return false;
        }
    }

    /**
     * Deshabilitar Area
     * 
     * El objeto Area cuenta con un atributo : estado, el cual toma dos valores:
     * 
     * a: habilitado
     * 
     * d: deshabilitado
     *
     * @param Area $area Objeto Area ha deshabilitar
     * @return true si el Area se deshabilitó con éxito
     * @return false si el Area no se deshabilitó con éxito
     */
    public function deshabilitarArea(Area $area)
    {
        try {
            $sql = "UPDATE `area` SET `estado`=? WHERE `area_id` = ? AND `estado`='a';";
            $area->setEstado('d');
            $array = array($area->getEstado(), $area->getAreaId());
            if ($this->conexion->execute($sql, $array)) {
                return true;
            } else {
                return false;
            }
        } catch (Exception $e) {
            echo "\nControladorArea (deshabilitarArea) ERROR: " . $e->getMessage() . "\n";
            return false;
        }
    }

    /**
     * Habilitar Area
     *
     * @param Area $area Objeto Area ha habilitar
     * @return true si el Area se habilitó con éxito
     * @return false si el Area no se habilitó con éxito
     */
    public function habilitarArea(Area $area)
    {
        try {
            $sql = "UPDATE `area` SET `estado`=? WHERE `area_id` = ? AND `estado`='d';";
            $area->setEstado('a');
            $array = array($area->getEstado(), $area->getAreaId());
            if ($this->conexion->execute($sql, $array)) {
                return true;
            } else {
                return false;
            }
        } catch (Exception $e) {
            echo "\nControladorArea (habilitarArea) ERROR: " . $e->getMessage() . "\n";
            return false;
        }
    }
}
