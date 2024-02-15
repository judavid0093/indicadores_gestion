<?php

include_once './dao/Conexion.php';
include_once './controlador/ControladorOid.php';

/**
 * ControladorArea: Gestiona Base de Datos y Perspectiva
 */
class ControladorPerspectiva
{

    private $conexion;
    private $nuevoOid;

    public function __construct()
    {
        $this->conexion = new Conexion();
        $this->nuevoOid = new ControladorOid();
    }

    /**
     * Insertar un Objeto Perspectiva
     *
     * @param Perspectiva $perspectiva Objeto Perspectiva ha insertar 
     * @return true si la Perspectiva se inserto con éxito
     * @return false si la Perspectiva no se inserto con éxito
     */
    public function insertarPerspectiva(Perspectiva $perspectiva)
    {
        try {
            $sql = "INSERT INTO `perspectiva`(`tp_oid`, `nombre`, `peso`, `tab_num`) VALUES (?,?,?,?)";
            $perspectiva->setOid($this->nuevoOid->obtenerNuevoOid());
            $array = array($perspectiva->getTpOid(),$perspectiva->getNombre(),$perspectiva->getPeso(),$perspectiva->getTabNum());
            if ($this->conexion->execute($sql, $array)) {
                return true;
            } else {
                return false;
            }
        } catch (Exception $e) {
            echo "ControladorPerspectiva (insertarPerspectiva) ERROR: " . $e->getMessage();
            return false;
        }
    }

    /**
     * Buscar un Objeto Perspectiva
     *
     * @param Perspectiva $Perspectiva Objeto Perspectiva ha buscar 
     * @return Perspectiva $Perspectiva Objeto Perspectiva encontrado
     * @return null si el Objeto Perspectiva no ce encontro                                                                             
     */
    public function buscarPerspectiva(Perspectiva $perspectiva)
    {
        try {
            $sql = "SELECT `oid`, `tp_oid`, `nombre`, `peso`, `tab_num` FROM `perspectiva` WHERE `oid`=? OR `tp_oid`=?";
            $array = array($perspectiva->getOid(),$perspectiva->getTpOid());
            $result = $this->conexion->preperCondicionado($sql, $array);
            if ($result != null) {
                $perspectiva->setOid($result->oid);
                $perspectiva->setTpOid($result->tp_oid);
                $perspectiva->setNombre($result->nombre);
                $perspectiva->setPeso($result->peso);
                $perspectiva->setTabNum($result->tab_num);
                return $perspectiva;
            } else {
                return null;
            }
        } catch (Exception $e) {
            echo "ControladorPerspectiva (buscarPerspectiva) ERROR: " . $e->getMessage();
            return null;
        }
    }

    /**
     * Modificar un Objeto Perspectiva
     *
     * @param Perspectiva $Perspectiva Objeto Perspectiva ha modificar 
     * @return true si el Perspectiva se modifico con éxito
     * @return false si el Perspectiva no se modifico con éxito
     */
    public function modificarPerspectiva(KpiArea $kpiArea)
    {
        try {
            $sql = "UPDATE `perspectiva` SET `nombre`=?, `peso`=?, `tab_num`=? WHERE `oid`=? AND `tp_oid`=?";
            $array = array();
            if ($this->conexion->execute($sql, $array)) {
                return true;
            } else {
                return false;
            }
        } catch (Exception $e) {
            echo "ControladorPerspectiva (modificarPerspectiva) ERROR: " . $e->getMessage();
        }
    }
}
