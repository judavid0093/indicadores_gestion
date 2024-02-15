<?php

include_once './dao/Conexion.php';
include_once './controlador/ControladorOid.php';

/**
 * ControladorArea: Gestiona Base de Datos y Colaborador
 * 
 */
class ControladorColaborador
{
    private $conexion;
    private $nuevoOid;

    public function __construct()
    {
        $this->conexion = new Conexion();
        $this->nuevoOid = new ControladorOid();
    }

    /**
     * Insertar Colaborador
     *
     * @param Colaborador $colaborador Objeto colaborador ha insertar
     * @return true si el Colaborador se inserto con éxito
     * @return false si el Colaborador no se inserto con éxito
     */
    public function insertarColaborador(Colaborador $colaborador)
    {
        try {
            $sql = "INSERT INTO `colaborador`(`oid`, `colaborador_id`, `nombre`, `apellido`, `descripcion`, `nombre_empleo`, `estado`) VALUES (?,?,?,?,?,?,?)";
            $colaborador->setOid($this->nuevoOid->obtenerNuevoOid());
            $colaborador->setEstado('a');
            $array = array($colaborador->getOid(), $colaborador->getColaboradorId(), $colaborador->getNombre(), $colaborador->getApellido(), $colaborador->getDescripcion(), $colaborador->getNombreEmpleo(), $colaborador->getEstado());
            if ($this->conexion->execute($sql, $array)) {
                return true;
            } else {
                return false;
            }
        } catch (Exception $e) {
            echo "\nControladorColaborador (insertarColaborador) ERROR: " . $e->getMessage() . "\n";
            return false;
        }
    }

    /**
     * Buscar un Objeto Colaborador
     *
     * @param Colaborador $colaborador Objeto Colaborador ha buscar
     * @return Colaborador $colaborador Objeto Colaborador encontrado
     * @return null si el Objeto Colaborador no se encontró
     */
    public function buscarColaborado(Colaborador $colaborador)
    {
        try {
            $sql = "SELECT `oid`, `nombre`, `apellido`, `descripcion`, `nombre_empleo`, `estado` FROM `colaborador` WHERE  `colaborador_id` = ?;";
            $array = array($colaborador->getColaboradorId());
            $result = $this->conexion->preperCondicionado($sql, $array);
            if ($result != null) {
                $colaborador->setOid($result->oid);
                $colaborador->setNombre($result->nombre);
                $colaborador->setApellido($result->apellido);
                $colaborador->setDescripcion($result->descripcion);
                $colaborador->setNombreEmpleo($result->nombre_empleo);
                $colaborador->setEstado($result->estado);
                return $colaborador;
            } else {
                return null;
            }
        } catch (Exception $e) {
            echo "\nControladorColaborador (buscarColaborador) ERROR: " . $e->getMessage() . "\n";
            return null;
        }
    }

    /**
     * Modificar Colaborador
     *
     * @param Colaborador $colaborador Objeto colaborador ha modificar
     * @return true si el Colaborador se modifico con éxito
     * @return false si el Colaborador no se inserto con éxito
     */
    public function modificarColaborador(Colaborador $colaborador)
    {
        try {
            $sql = "UPDATE `colaborador` SET `oid`=?,`nombre`=?,`apellido`=?,`descripcion`=?,`nombre_empleo`=? WHERE `colaborador_id`=? AND `estado`='a';";
            $colaborador->setEstado('a');
            $array = array($colaborador->getOid(), $colaborador->getNombre(), $colaborador->getApellido(), $colaborador->getDescripcion(), $colaborador->getNombreEmpleo(), $colaborador->getColaboradorId());
            if ($this->conexion->execute($sql, $array)) {
                return true;
            } else {
                return false;
            }
        } catch (Exception $e) {
            echo "\nControladorColaborador (modificarColaborador) ERROR: " . $e->getMessage() . "\n";
            return false;
        }
    }

    /**
     * Deshabilitar Colaborador
     *
     * @param Colaborador $colaborador Objeto colaborador ha deshabilitar
     * @return true si el Colaborador se deshabilito con éxito
     * @return false si el Colaborador no se deshabilito con éxito
     */
    public function deshabilitarColaborador(Colaborador $colaborador)
    {
        try {
            $sql = "UPDATE `colaborador` SET `estado`=? WHERE `colaborador_id`=? AND `estado`='a';";
            $colaborador->setEstado('d');
            $array = array($colaborador->getEstado(), $colaborador->getColaboradorId());
            if ($this->conexion->execute($sql, $array)) {
                return true;
            } else {
                return false;
            }
        } catch (Exception $e) {
            echo "\nControladorColaborador (deshabilitarColaborador) ERROR: " . $e->getMessage() . "\n";
            return false;
        }
    }

    /**
     * Habilitar Colaborador
     *
     * @param Colaborador $colaborador Objeto colaborador ha Habilitar
     * @return true si el Colaborador se habilito con éxito
     * @return false si el Colaborador no se habilito con éxito
     */
    public function habilitarColaborador(Colaborador $colaborador)
    {
        try {
            $sql = "UPDATE `colaborador` SET `estado`=? WHERE `colaborador_id`=? AND `estado`='d';";
            $colaborador->setEstado('a');
            $array = array($colaborador->getEstado(), $colaborador->getColaboradorId());
            if ($this->conexion->execute($sql, $array)) {
                return true;
            } else {
                return false;
            }
        } catch (Exception $e) {
            echo "\nControladorColaborador (habilitarColaborador) ERROR: " . $e->getMessage() . "\n";
            return false;
        }
    }
}
