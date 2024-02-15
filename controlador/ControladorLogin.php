<?php

include_once './dao/Conexion.php';
include_once './controlador/ControladorOid.php';

/**
 * ControladorArea: Gestiona Base de Datos y Login
 */
class ControladorLogin
{
    private $conexion;
    private $nuevoOid;

    public function __construct()
    {
        $this->conexion = new Conexion();
        $this->nuevoOid = new ControladorOid();
    }

    /**
     * Insertar un Objeto Login
     *
     * @param Login $login Objeto Login ha Insertar 
     * @return true si el Login se inserto con éxito
     * @return false si el Login no se inserto con éxito
     */
    public function insertarLogin(Login $login)
    {
        try {
            $sql = "INSERT INTO `login`(`oid`, `cuenta`, `clave`, `tipo_cuenta_oid`, `colaborador_id`, `estado`) VALUES (?,?,?,?,?,?);";
            $login->setOid($this->nuevoOid->obtenerNuevoOid());
            $login->setEstado('a');
            $array = array($login->getOid(), $login->getCuenta(), $login->getClave(), $login->getTipoCuentaOid(), $login->getColaboradorId(), $login->getEstado());
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
     * Validar Existencia de un Objeto Login
     *
     * @param Login $login Objeto Login ha Validar ph
     * @return true si el Login existe
     * @return false si el Login no existe
     */
    public function validarLogin(Login $login)
    {
        try {
            $sql = "SELECT cuenta FROM `login` WHERE `cuenta`=? AND `clave`=? AND `estado`='a';";
            $array = array($login->getCuenta(), $login->getClave());
            if ($this->conexion->preperCondicionado($sql, $array)) {
                $sql = "INSERT INTO `auditoria_login`(`cuenta`, `accion`) VALUES (?,?);";
                $array = array($login->getCuenta() . "@localhost", "Acceso Exitoso");
                $this->conexion->execute($sql, $array);
                return true;
            } else {
                $sql = "INSERT INTO `auditoria_login`(`cuenta`, `accion`) VALUES (?,?);";
                $array = array($login->getCuenta() . "@localhost", "Acceso Fallido");
                $this->conexion->execute
                ($sql, $array);
                return false;
            }
        } catch (Exception $e) {
            echo "\nControladorLogin (validarLogin) ERROR: " . $e->getMessage() . "\n";
            return false;
        }
    }

    /**
     * Buscar un Objeto Login
     *
     * @param Login $login Objeto Login ha Buscar 
     * @return Login $login Objeto Loin encontrado
     * @return null si el Login no se encontro
     */
    public function buscarLogin(Login $login)
    {
        try {
            $sql = "SELECT `oid`, `cuenta`, `clave`, `tipo_cuenta_oid`, `colaborador_id`, `estado` FROM `login` WHERE `cuenta` = ?;";
            $array = array($login->getCuenta());
            $result = $this->conexion->preperCondicionado($sql, $array);
            if ($result != null) {
                $login->setOid($result->oid);
                $login->setCuenta($result->cuenta);
                $login->setClave($result->clave);
                $login->setTipoCuentaOid($result->tipo_cuenta_oid);
                $login->setColaboradorId($result->colaborador_id);
                $login->setEstado($result->estado);
                return $login;
            } else {
                return null;
            }
        } catch (Exception $e) {
            echo "\nControladorLogin (buscarLogin) ERROR: " . $e->getMessage() . "\n";
            return null;
        }
    }

    /**
     * Modificar un Objeto Login
     *
     * @param Login $login Objeto Login ha modificar 
     * @return true si el Login se modifico con éxito
     * @return false si el Login no se modifico con éxito
     */
    public function modificarLogin(Login $login)
    {
        try {
            $sql = "UPDATE `login` SET `clave`=?,`tipo_cuenta_oid`=?,`colaborador_id`=?, `estado`=? WHERE `cuenta`=? AND `oid`=? AND `estado`='a';";
            $login->setEstado('a');
            $array = array($login->getClave(), $login->getTipoCuentaOid(), $login->getColaboradorId(), $login->getEstado(), $login->getCuenta(), $login->getOid());
            if ($this->conexion->execute($sql, $array)) {
                return true;
            } else {
                return false;
            }
        } catch (Exception $e) {
            echo "\nControladorLogin (modificarLogin) ERROR: " . $e->getMessage() . "\n";
            return false;
        }
    }

    /**
     * Deshabilitar un Objeto Login
     *
     * @param Login $login Objeto Login ha modificar 
     * @return true si el Login se modifico con éxito
     * @return false si el Login no se modifico con éxito
     */
    public function deshabilitarLogin(Login $login)
    {
        try {
            $sql = "UPDATE `login` SET `estado`=? WHERE `cuenta`=? AND `oid`=? AND `estado`='a';";
            $login->setEstado('d');
            $array = array($login->getEstado(), $login->getCuenta(), $login->getOid());
            if ($this->conexion->execute($sql, $array)) {
                return true;
            } else {
                return false;
            }
        } catch (Exception $e) {
            echo "\nControladorLogin (deshabilitarLogin) ERROR: " . $e->getMessage() . "\n";
            return false;
        }
    }

    /**
     * Habilitar un Objeto Login
     *
     * @param Login $login Objeto Login ha habilitar 
     * @return true si el Login se habilito con éxito
     * @return false si el Login no se habilito con éxito
     */
    public function habilitarLogin(Login $login)
    {
        try {
            $sql = "UPDATE `login` SET `estado`=? WHERE `cuenta`=? AND `oid`=? AND `estado`='d';";
            $login->setEstado('a');
            $array = array($login->getEstado(), $login->getCuenta(), $login->getOid());
            if ($this->conexion->execute($sql, $array)) {
                return true;
            } else {
                return false;
            }
        } catch (Exception $e) {
            echo "\nControladorLogin (habilitarLogin) ERROR: " . $e->getMessage() . "\n";
            return false;
        }
    }
}
