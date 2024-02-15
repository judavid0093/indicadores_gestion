<?php

/**
 * Controlador: Gestiona Base de Datos y PhvaItem
 */

class ControladorPhvaItem
{
    private $conexion;
    private $nuevoOid;

    public function __construct()
    {
        $this->conexion = new Conexion();
        $this->nuevoOid = new ControladorOid();
    }

    /**
     * Inserta un Objeto PhvaItem
     *
     * @param PhvaItem $phvaItem Objeto PhvaItem ha insertar
     * @return true si el PhvaItem se inserto con éxito
     * @return false si el PhvaItem no se inserto con éxito
     */
    public function insertarPhvaItem(PhvaItem $phvaItem)
    {
        try {
            $sql = "INSERT INTO `phva_item`(`oid`, `phva_oid`, `tipo_item`, `nombre`, `descripcion`, `fecha_inicio`, `fecha_fin`, `kpi_id`) VALUES (?,?,?,?,?,?,?,?)";
            $phvaItem->setOid($this->nuevoOid->obtenerNuevoOid());
            $array = array($phvaItem->getOid(), $phvaItem->getPhvaOid(), $phvaItem->getTipoItem(), $phvaItem->getNombre(), $phvaItem->getDescripcion(), $phvaItem->getFechaInicio(), $phvaItem->getFechaFin(), $phvaItem->getKpiId());
            if ($this->conexion->execute($sql, $array)) {
                return true;
            } else {
                return false;
            }
        } catch (Exception $e) {
            echo "\nControladorPhvaItem (insertarPhvaItem) ERROR: " . $e->getMessage() . "\n";
            return false;
        }
    }

    /**
     * Buscar un Objeto PhvaItem
     *
     * @param PhvaItem $phvaItem Objeto PhvaItem ha buscar
     * @return PhvaItem $area Objeto PhvaItem encontrado
     * @return null si el Objeto PhvaItem no se encontró
     */
    public function buscarPhvaItem(PhvaItem $phvaItem)
    {
        try {
            $sql = "SELECT `oid`, `phva_oid`, `tipo_item`, `nombre`, `descripcion`, `fecha_inicio`, `fecha_fin`, `kpi_id` FROM `oid`=? OR `nombre`=?";
            $array = array($phvaItem->getOid(), $phvaItem->getNombre());
            $result = $this->conexion->preperCondicionado($sql, $array);
            if ($result != null) {
                $phvaItem->setOid($result->oid);
                $phvaItem->setPhvaOid($result->phva_oid);
                $phvaItem->setTipoItem($result->tipo_item);
                $phvaItem->setNombre($result->nombre);
                $phvaItem->setDescripcion($result->descripcion);
                $phvaItem->setFechaInicio($result->fecha_inicio);
                $phvaItem->setFechaFin($result->fecha_fin);
                $phvaItem->setKpiId($result->kpi_id);
                return $phvaItem;
            } else {
                return null;
            }
        } catch (Exception $e) {
            echo "\nControladorPhvaItem (buscarPhvaItem) ERROR: " . $e->getMessage() . "\n";
            return null;
        }
    }

    /**
     * Modificar un Objeto PhvaItem
     *
     * @param PhvaItem $phvaItem Objeto PhvaItem ha modificar
     * @return true si el PhvaItem se modificó con éxito
     * @return false si el PhvaItem no se modificó con éxito
     */
    public function modificarPhvaItem(PhvaItem $phvaItem)
    {
        try {
            $sql = "UPDATE `phva_item` SET `phva_oid`=?,`tipo_item`=?,`nombre`=?,`descripcion`=?,`fecha_inicio`=?,`fecha_fin`=?,`kpi_id`=? WHERE `oid`=?";
            $array = array($phvaItem->getPhvaOid(), $phvaItem->getTipoItem(), $phvaItem->getNombre(), $phvaItem->getNombre(), $phvaItem->getFechaInicio(), $phvaItem->getFechaFin(), $phvaItem->getKpiId(), $phvaItem->getOid());
            if ($this->conexion->execute($sql, $array)) {
                return true;
            } else {
                return false;
            }
        } catch (Exception $e) {
            echo "\nControladorPhvaItem (modificarPhvaItem) ERROR: " . $e->getMessage() . "\n";
            return false;
        }
    }
}