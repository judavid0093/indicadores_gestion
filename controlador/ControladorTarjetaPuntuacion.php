<?php

include_once './dao/Conexion.php';
include_once './controlador/ControladorOid.php';

/**
 * ControladorArea: Gestiona Base de Datos y Perspectiva
 * 
 */
class ControladorTarjetaPuntuacion
{

    private $conexion;
    private $nuevoOid;

    public function __construct()
    {
        $this->conexion = new Conexion();
        $this->nuevoOid = new ControladorOid();
    }

    /**
     * Insertar un Objeto TarjetaPuntuacion
     *
     * @param TarjetaPuntuacion $TarjetaPuntuacion Objeto TarjetaPuntuacion ha insertar 
     * @return true si la TarjetaPuntuacionse inserto con éxito
     * @return false si la PTarjetaPuntuacion no se inserto con éxito
     */
    public function insertarTarjetaPuntuacion(TarjetaPuntuacion $tarjetaPuntuacion)
    {
        try {
            $sql = "INSERT INTO `targeta_puntuacion`(`oid`,`nombre`, `contendo`, `mision`, `estado`) VALUES (?,?,?,?,?)";
            $tarjetaPuntuacion->setOid($this->nuevoOid->obtenerNuevoOid());
            $tarjetaPuntuacion->setEstado('a');
            $array = array($tarjetaPuntuacion->getNombre(), $tarjetaPuntuacion->getContenido(), $tarjetaPuntuacion->getMision());
            if ($this->conexion->execute($sql, $array)) {
                return true;
            } else {
                return false;
            }
        } catch (Exception $e) {
            echo "ControladorTarjetaPuntuacion (insertarTarjetaPuntuacion) ERROR: " . $e->getMessage();
            return false;
        }
    }

    /**
     * Buscar un Objeto TarjetaPuntuacionTarjetaPuntuacion  
     * @param TarjetaPuntuacion $TarjetaPuntuacion ha buscar 
     * @return TarjetaPuntuacion $TarjetaPuntuacion Objeto TarjetaPuntuacion encontrado
     * @return null si el Objeto TarjetaPuntuacion no se encontro                                                                             
     */
    public function buscarTarjetaPuntuacion(TarjetaPuntuacion $tarjetaPuntuacion)
    {
        try {
            $sql = "SELECT `oid`, `nombre`, `contendo`, `mision`, `estado` FROM `targeta_puntuacion` WHERE `oid`=? or `nombre`=? and `estado`='a'";
            $array = array($tarjetaPuntuacion->getOid(), $tarjetaPuntuacion->getNombre());
            $result = $this->conexion->preperCondicionado($sql, $array);
            if ($result != null) {
                $tarjetaPuntuacion->setOid($result->oid);
                $tarjetaPuntuacion->setNombre($result->nombre);
                $tarjetaPuntuacion->setContenido($result->conttenido);
                $tarjetaPuntuacion->setMision($result->mision);
                $tarjetaPuntuacion->setEstado($result->estado);
                return $tarjetaPuntuacion;
            } else {
                return null;
            }
        } catch (Exception $e) {
            echo "ControladorTarjetaPuntuacion (buscarTarjetaPuntuacion) ERROR: " . $e->getMessage();
            return null;
        }
    }

    /**
     * Modificar un Objeto TarjetaPuntuacion
     *
     * @param TarjetaPuntuacion $TarjetaPuntuacion Objeto TarjetaPuntuacion ha modificar 
     * @return true si el Objeto TarjetaPuntuacion se modifico con éxito
     * @return false si el Objeto TarjetaPuntuacion no se modifico con éxito
     */
    public function modificarTarjetaPuntuacion(TarjetaPuntuacion $tarjetaPuntuacion)
    {
        try {
            $sql = "UPDATE `targeta_puntuacion` SET `nombre`=?,`contendo`=?,`mision`=? WHERE `oid`=? AND `estado`='a' ";
            $array = array($tarjetaPuntuacion->getOid());
            if ($this->conexion->execute($sql, $array)) {
                return true;
            } else {
                return false;
            }
        } catch (Exception $e) {
            echo "ControladorTarjetaPuntuacion (modificarTarjetaPuntuacion) ERROR: " . $e->getMessage();
        }
    }

    /**
     * Habilita un Objeto TarjetaPuntuacion
     *
     * @param TarjetaPuntuacion $tarjetaPuntuacion Objeto TarjetaPuntiacion ha Habilitar
     * @return true si el Objeto TarjetaPuntuacion se habilito con éxito
     * @return false si el Objeto TarjetaPuntuacion no se habilito
     */
    public function habilitarTarjetaPuntuacion(TarjetaPuntuacion $tarjetaPuntuacion)
    {
        try {
            $sql = "UPDATE `targeta_puntuacion` SET `estado`=? WHERE oid`=? AND `estado`='d'";
            $tarjetaPuntuacion->setEstado('a');
            $array = array($tarjetaPuntuacion->getEstado(), $tarjetaPuntuacion->getOid());
            if ($this->conexion->execute($sql, $array)) {
                return true;
            } else {
                return false;
            }
        } catch (Exception $e) {
            echo "ControladorTarjetaPuntuacion (habilitarjetaPuntuacion) ERROR: " . $e->getMessage();
            return false;
        }
    }

    /**
     * Deshabilita un Objeto TarjetaPuntuacion
     *
     * @param TarjetaPuntuacion $tarjetaPuntuacion Objeto TarjetaPuntiacion ha Deshabilitar
     * @return true si el Objeto TarjetaPuntuacion se deshabilito con éxito
     * @return false si el Objeto TarjetaPuntuacion no se deshabilito
     */
    public function deshabilitarTarjetaPuntuacion(TarjetaPuntuacion $tarjetaPuntuacion)
    {
        try {
            $sql = "UPDATE `targeta_puntuacion` SET `estado`=? WHERE oid`=? AND `estado`='a'";
            $tarjetaPuntuacion->setEstado('d');
            $array = array($tarjetaPuntuacion->getEstado(), $tarjetaPuntuacion->getOid());
            if ($this->conexion->execute($sql, $array)) {
                return true;
            } else {
                return false;
            }
        } catch (Exception $e) {
            echo "ControladorTarjetaPuntuacion (deshabilitarjetaPuntuacion) ERROR: " . $e->getMessage();
            return false;
        }
    }
}
