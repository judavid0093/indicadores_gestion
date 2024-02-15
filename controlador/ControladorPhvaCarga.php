<?php

include_once './dao/Conexion.php';
include_once './controlador/ControladorOid.php';

/**
 * ControladorPhvaArea: Gestiona Base de Datos y PhvaCargar
 */
class ControladorPhvaCarga
{
    private $conexion;
    private $nuevoOid;

    public function __construct()
    {
        $this->conexion = new Conexion();
        $this->nuevoOid = new ControladorOid();
    }

    /**
     * Inserta un Objeto PhvaCargarArchivo
     *
     * @param PhvaCargarArchivo $phvaCargarArchivo Objeto PhvaCargarArchivo ha insertar
     * @return true si el PhvaCargarArchivo se inserto con éxito
     * @return false si el PhvaCargarArchivo no se inserto con éxito
     */
    public function insertarPhvaArea(PhvaCargarArchivo $phvaCargarArchivo)
    {
        try {
            $sql = "INSERT INTO `phva_carga_archivo`(`oid`, `phva_oid`, `carga_oid`) VALUES (?,?,?)";
            $phvaCargarArchivo->setOid($this->nuevoOid->obtenerNuevoOid());
            $array = array($phvaCargarArchivo->getOid(), $phvaCargarArchivo->getPhvaOid(), $phvaCargarArchivo->getCargaOid() );
            if ($this->conexion->execute($sql, $array)) {
                return true;
            } else {
                return false;
            }
        } catch (Exception $e) {
            echo "\nControladorPhvaCargarArchivo (insertarPhvaCargarArchivo) ERROR: " . $e->getMessage() . "\n";
            return false;
        }
    }

    /**
     * Buscar un Objeto PhvaCargarArchivo
     *
     * @param PhvaCargarArchivo $phvaArea Objeto PhvaCargarArchivo ha buscar
     * @return PhvaCargarArchivo $phvaArea Objeto PhvaCargarArchivo encontrado
     * @return null si el Objeto PhvaArea no se encontró
     */
    public function buscarPhvaCargarArchivo(PhvaCargarArchivo $phvaCargarArchivo)
    {
        try {
            $sql = "SELECT `oid`, `phva_oid`, `carga_oid` FROM `phva_carga_archivo` WHERE `phva_oid`=? OR `carga_oid`=? AND `oid`=?";
            $array = array();
            $result = $this->conexion->preperCondicionado($sql, $array);
            if ($result != null) {
                $phvaCargarArchivo->setOid($result->oid);
                $phvaCargarArchivo->setPhvaOid($result->phva_oid);
                $phvaCargarArchivo->setCargaOid($result->cargar_oid);
                return $phvaCargarArchivo;
            } else {
                return null;
            }
        } catch (Exception $e) {
            echo "\nControladorPhvaCargarArchivo (buscarPhvaCargarArchivo) ERROR: " . $e->getMessage() . "\n";
            return null;
        }
    }

    /**
     * Modificar un Objeto PhvaCargarArchivo
     *
     * @param PhvaCargarArchivo $phvaCargarArchivo Objeto PhvaCargarArchivo ha modificar
     * @return true si el PhvaCargarArchivo se modificó con éxito
     * @return false si el PhvaCargarArchivo no se modificó con éxito
     */
    public function modificarPhvaCargarArchivo(PhvaCargarArchivo $phvaCargarArchivo)
    {
        try {
            $sql = "UPDATE `phva_carga_archivo` SET `phva_oid`=?,`carga_oid`=? WHERE `oid`=?";
            $array = array($phvaCargarArchivo->getPhvaOid(),$phvaCargarArchivo->getCargaOid(),$phvaCargarArchivo->getOid());
            if ($this->conexion->execute($sql, $array)) {
                return true;
            } else {
                return false;
            }
        } catch (Exception $e) {
            echo "\nControladorPhvaCargarArchivo (modificarPhvaCargarArchivo) ERROR: " . $e->getMessage() . "\n";
            return false;
        }
    }
}
