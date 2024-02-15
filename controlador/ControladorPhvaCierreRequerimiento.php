<?php

include_once './dao/Conexion.php';
include_once './controlador/ControladorOid.php';

/**
 * ControladorArea: Gestiona Base de Datos y PhvaCierreRequerimiento
 */
class ControladorPhvaCierreRequerimiento
{
    private $conexion;
    private $nuevoOid;

    public function __construct()
    {
        $this->conexion = new Conexion();
        $this->nuevoOid = new ControladorOid();
    }

    /**
     * Inserta un Objeto PhvaCierreRequerimiento
     *
     * @param  $phvaCierreRequerimiento Objeto PhvaCierreRequerimiento ha insertar
     * @return true si el PhvaCierreRequerimiento se inserto con éxito
     * @return false si el PhvaCierreRequerimiento no se inserto con éxito
     */
    public function insertarPhvaCierreRequerimiento(PhvaCierreRequerimiento $phvaCierreRequerimiento)
    {
        try {
            $sql = "INSERT INTO `phva_cierre_requerimiento`(`oid`, `phva_oid`, `descripcion`, `colaborador_id_aprobacion`, `fecha_aprobacion`, `tipo_declaracion`, `texto_declaracion`, `estado`) VALUES (?,?,?,?,?,?,?,?)";
            $phvaCierreRequerimiento->setOid($this->nuevoOid->obtenerNuevoOid());
            $phvaCierreRequerimiento->setEstado('a');
            $array = array($phvaCierreRequerimiento->getOid(),$phvaCierreRequerimiento->getPhvaOid(),$phvaCierreRequerimiento->getDescripcion(),$phvaCierreRequerimiento->getColaboradorIdAprobacion(),$phvaCierreRequerimiento->getFechaAprobacion());
            if ($this->conexion->execute($sql, $array)) {
                return true;
            } else {
                return false;
            }
        } catch (Exception $e) {
            echo "\nControladorPhavaCierreRequerimiento (insertarPhavaCierreRequerimiento) ERROR: " . $e->getMessage() . "\n";
            return false;
        }
    }

    /**
     * Buscar un Objeto PhvaCierreRequerimiento
     *
     * @param PhvaCierreRequerimiento $phvaCierreRequerimiento Objeto PhvaCierreRequerimiento ha buscar
     * @return PhvaCierreRequerimiento $phvaCierreRequerimiento Objeto PhvaCierreRequerimiento encontrado
     * @return null si el Objeto PhvaCierreRequerimiento no se encontró
     */
    public function buscarPhvaCierreRequerimiento(PhvaCierreRequerimiento $phvaCierreRequerimiento)
    {
        try {
            $sql = "SELECT `oid`, `phva_oid`, `descripcion`, `colaborador_id_aprobacion`, `fecha_aprobacion`, 
            `tipo_declaracion`, `texto_declaracion`, `estado` FROM `phva_cierre_requerimiento` WHERE `oid`=? AND `estado`=?";
            $array = array($phvaCierreRequerimiento->getOid(), $phvaCierreRequerimiento->getEstado());
            $result = $this->conexion->preperCondicionado($sql, $array);
            if ($result != null) {
                $phvaCierreRequerimiento->setOid($result->oid);
                $phvaCierreRequerimiento->setPhvaOid($result->phva_oid);
                $phvaCierreRequerimiento->setDescripcion($result->descripcion);
                $phvaCierreRequerimiento->setColaboradorIdAprobacion($result->colaborador_id_aprobacion);
                $phvaCierreRequerimiento->setFechaAprobacion($result->fecha_aprobacion);
                $phvaCierreRequerimiento->setTipoDeclaracion($result->tipo_desclaracion);
                $phvaCierreRequerimiento->setTextoDeclaracion($result->texto_desclaracion);
                $phvaCierreRequerimiento->setEstado($result->estado);
                return $phvaCierreRequerimiento;
            } else {
                return null;
            }
        } catch (Exception $e) {
            echo "\nControladorPhvaCierreRequerimiento (buscarPhvaCierreRequerimiento) ERROR: " . $e->getMessage() . "\n";
            return null;
        }
    }

    /**
     * Modificar un Objeto PhvaCierreRequerimiento
     *
     * @param PhvaCierreRequerimiento $phvaCierreRequerimiento Objeto PhvaCierreRequerimiento ha modificar
     * @return true si el PhvaCierreRequerimiento se modificó con éxito
     * @return false si el PhvaCierreRequerimiento no se modificó con éxito
     */
    public function modificarPhvaCierreRequerimiento(PhvaCierreRequerimiento $phvaCierreRequerimiento)
    {
        try {
        $sql = "UPDATE `phva_cierre_requerimiento` SET `phva_oid`=?,`descripcion`=?,`colaborador_id_aprobacion`=?,`fecha_aprobacion`=?,`tipo_declaracion`=?,`texto_declaracion`=? WHERE `oid`=? AND `estado`=?";
            $phvaCierreRequerimiento->setEstado('a');
            $array = array($phvaCierreRequerimiento->getPhvaOid(),$phvaCierreRequerimiento->getDescripcion(),$phvaCierreRequerimiento->getColaboradorIdAprobacion(),$phvaCierreRequerimiento->getFechaAprobacion(),$phvaCierreRequerimiento->getTipoDeclaracion(),$phvaCierreRequerimiento->getTextoDeclaracion(),$phvaCierreRequerimiento->getOid(),$phvaCierreRequerimiento->getEstado());
            if ($this->conexion->execute($sql, $array)) {
                return true;
            } else {
                return false;
            }
        } catch (Exception $e) {
            echo "\nControladorPhvaCierreRequerimiento (modificarPhvaCierreRequerimiento) ERROR: " . $e->getMessage() . "\n";
            return false;
        }
    }

    /**
     * Deshabilitar PhvaCierreRequerimiento
     * 
     * El objeto PhvaCierreRequerimiento cuenta con un atributo : estado, el cual toma dos valores:
     * 
     * a: habilitado
     * 
     * d: deshabilitado
     *
     * @param PhvaCierreRequerimiento $phvaCierreRequerimiento Objeto PhvaCierreRequerimiento ha deshabilitar
     * @return true si el PhvaCierreRequerimiento se deshabilitó con éxito
     * @return false si el PhvaCierreRequerimiento no se deshabilitó con éxito
     */
    public function deshabilitarPhvaCierreRequerimiento(PhvaCierreRequerimiento $phvaCierreRequerimiento)
    {
        try {
            $sql = "UPDATE `phva_cierre_requerimiento` SET `estado`=? WHERE `oid`=? AND `estado`='a'";
            $phvaCierreRequerimiento->setEstado('d');
            $array = array($phvaCierreRequerimiento->getEstado(),$phvaCierreRequerimiento->getOid());
            if ($this->conexion->execute($sql, $array)) {
                return true;
            } else {
                return false;
            }
        } catch (Exception $e) {
            echo "\nControladorPhvaCierreRequerimiento (deshabilitarPhvaCierreRequerimiento) ERROR: " . $e->getMessage() . "\n";
            return false;
        }
    }

    /**
     * Habilitar PhvaCierreRequerimiento
     *
     * @param PhvaCierreRequerimiento $phvaCierreRequerimiento Objeto PhvaCierreRequerimiento ha habilitar
     * @return true si el PhvaCierreRequerimiento se habilitó con éxito
     * @return false si el PhvaCierreRequerimiento no se habilitó con éxito
     */
    public function habilitarPhvaCierreRequerimiento(PhvaCierreRequerimiento $phvaCierreRequerimiento)
    {
        try {
            $sql = "UPDATE `phva_cierre_requerimiento` SET `estado`=? WHERE `oid`=? AND `estado`='d'";
            $phvaCierreRequerimiento->setEstado('a');
            $array = array($phvaCierreRequerimiento->getEstado(),$phvaCierreRequerimiento->getOid());
            if ($this->conexion->execute($sql, $array)) {
                return true;
            } else {
                return false;
            }
        } catch (Exception $e) {
            echo "\nControladorPhvaCierreRequerimiento (deshabilitarPhvaCierreRequerimiento) ERROR: " . $e->getMessage() . "\n";
            return false;
        }
    }
}