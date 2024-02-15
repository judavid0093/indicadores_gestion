<?php

/**
 * Controlador: 
 */

 class ControladorPhvaItemPropietario 
 {
    private $conexion;
    private $nuevoOid;

    public function __construct()
    {
        $this->conexion = new Conexion();
        $this->nuevoOid = new ControladorOid();
    }

    /**
     * Inserta un Objeto PhvaItemPropietario
     *
     * @param PhvaItemPropietario $phvaItemPropietario Objeto PhvaItemPropietario ha insertar
     * @return true si el PhvaItemPropietario se inserto con éxito
     * @return false si el PhvaItemPropietario no se inserto con éxito
     */
    public function insertarPhvaItemPropietario(PhvaItemPropietario $phvaItemPropietario)
    {
        try {
            $sql = "";
            $phvaItemPropietario->setOid($this->nuevoOid->obtenerNuevoOid());
            $array = array();
            if ($this->conexion->execute($sql, $array)) {
                return true;
            } else {
                return false;
            }
        } catch (Exception $e) {
            echo "\nControladorPhvaItemPropietario (insertarPhvaItemPropietario) ERROR: " . $e->getMessage() . "\n";
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
 }