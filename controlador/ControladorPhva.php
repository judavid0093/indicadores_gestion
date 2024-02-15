<?php

include_once './dao/Conexion.php';
include_once './controlador/ControladorOid.php';

/**
 * ControladorPhva: Gestiona Base de Datos y Phva
 */
class ControladorPhva
{
    private $conexion;
    private $nuevoOid;

    public function __construct()
    {
        $this->conexion = new Conexion();
        $this->nuevoOid = new ControladorOid();
    }

    /**
     * Inserta un Objeto Phva
     *
     * @param Phva $phva Objeto Phva ha insertar
     * @return true si el Phva se inserto con éxito
     * @return false si el Phva no se inserto con éxito
     */
    public function insertarPhva(Phva $phva)
    {
        try {
            $sql = "INSERT INTO `phva`(`oid`, `nombre`, `fecha_kpi_medida1`, `fecha_kpi_medida2`, `frecuencia_kpi`, `fecha_inicio`, `fecha_fin`, `descripcion`, `colaborador_aprobacion`, `fecha_aprobacion`, `estado`) VALUES (?,?,?,?,?,?,?,?,?,?,?)";
            $phva->setOid($this->nuevoOid->obtenerNuevoOid());
            $phva->setEstado('a');
            $array = array($phva->getOid(), $phva->getNombre(), $phva->getFechaKpiMedida1(), $phva->getFechaKpiMedida2(),$phva->getFrecuenciaKpi(),$phva->getFechaInicio(),$phva->getFechaFin(),$phva->getDescripcion(),$phva->getColaboradorAprovacion(),$phva->getFechaAprobacion(),$phva->getEstado());
            if ($this->conexion->execute($sql, $array)) {
                return true;
            } else {
                return false;
            }
        } catch (Exception $e) {
            echo "\nControladorPhva (insertarPhva) ERROR: " . $e->getMessage() . "\n";
            return false;
        }
    }

    /**
     * Buscar un Objeto Phva
     *
     * @param Phva $phva Objeto Phva ha buscar
     * @return Phva $phva Objeto Phva encontrado
     * @return null si el Objeto Area no se encontró
     */
    public function buscarPhva(Phva $phva)
    {
        try {
            $sql = "SELECT `oid`, `nombre`, `fecha_kpi_medida1`, `fecha_kpi_medida2`, `frecuencia_kpi`, `fecha_inicio`, `fecha_fin`, `descripcion`, `colaborador_aprobacion`, `fecha_aprobacion`, `estado` FROM `phva` WHERE `oid`=? OR `nombre`=? AND `estado`=?";
            $array = array($phva->getOid(), $phva->getNombre(), $phva->getEstado());
            $result = $this->conexion->preperCondicionado($sql, $array);
            if ($result != null) {
                $phva->setOid($result->oid);
                $phva->setNombre($result->nombre);
                $phva->setFechaKpiMedida1($result->fecha_kpi_medida1);
                $phva->setFechaKpiMedida2($result->fecha_kpi_medida2);
                $phva->setFrecuenciaKpi($result->frecuencia_kpi);
                $phva->setFechaInicio($result->fecha_inicio);
                $phva->setFechaFin($result->fecha_fin);
                $phva->setDescripcion($result->descripcion);
                $phva->setColaboradorAprobacion($result->colaborador_aprobacion);
                $phva->setFechaAprobacion($result->fecha_aprobacion);
                $phva->setEstado($result->estado);
                return $phva;
            } else {
                return null;
            }
        } catch (Exception $e) {
            echo "\nControladorPhva (buscarPhva) ERROR: " . $e->getMessage() . "\n";
            return null;
        }
    }

    /**
     * Modificar un Objeto Phva
     *
     * @param Phva $phva Objeto Phva ha modificar
     * @return true si el Phva se modificó con éxito
     * @return false si el Phva no se modificó con éxito
     */
    public function modificarPhva(Phva $phva)
    {
        try {
            $sql = "UPDATE `phva` SET `nombre`=?,`fecha_kpi_medida1`=?,`fecha_kpi_medida2`=?,`frecuencia_kpi`=?,`fecha_inicio`=?,`fecha_fin`=?,`descripcion`=?,`colaborador_aprobacion`='?,`fecha_aprobacion`=? WHERE `oid`=? AND `estado`=?";
            $phva->setEstado('a');
            $array = array($phva->getNombre(),$phva->getFechaKpiMedida1(),$phva->getFechaKpiMedida2(),$phva->getFrecuenciaKpi(),$phva->getFechaInicio(),$phva->getFechaFin(),$phva->getDescripcion(),$phva->getColaboradorAprovacion(),$phva->getFechaAprobacion(),$phva->getOid(),$phva->getEstado());
            if ($this->conexion->execute($sql, $array)) {
                return true;
            } else {
                return false;
            }
        } catch (Exception $e) {
            echo "\nControladorPhva (modificarPhva) ERROR: " . $e->getMessage() . "\n";
            return false;
        }
    }

    /**
     * Deshabilitar Phva
     * 
     * El objeto Phva cuenta con un atributo : estado, el cual toma dos valores:
     * 
     * a: habilitado
     * 
     * d: deshabilitado
     *
     * @param Phva $phva Objeto Phva ha deshabilitar
     * @return true si el Phva se deshabilitó con éxito
     * @return false si el Phva no se deshabilitó con éxito
     */
    public function deshabilitarPhva(Phva $phva)
    {
        try {
            $sql = "UPDATE `estado`=? WHERE `oid`=? AND `estado`='a'";
            $phva->setEstado('d');
            $array = array($phva->getEstado(), $phva->getOid());
            if ($this->conexion->execute($sql, $array)) {
                return true;
            } else {
                return false;
            }
        } catch (Exception $e) {
            echo "\nControladorPhva (deshabilitarPhva) ERROR: " . $e->getMessage() . "\n";
            return false;
        }
    }

    /**
     * Habilitar Phva
     *
     * @param Phva $phva Objeto Phva ha habilitar
     * @return true si el Phva se habilitó con éxito
     * @return false si el Phva no se habilitó con éxito
     */
    public function habilitarPhva(Phva $phva)
    {
        try {
            $sql = "UPDATE `estado`=? WHERE `oid`=? AND `estado`='d';";
            $phva->setEstado('a');
            $array = array($phva->getEstado(), $phva->getOid());
            if ($this->conexion->execute($sql, $array)) {
                return true;
            } else {
                return false;
            }
        } catch (Exception $e) {
            echo "\nControladorPhva (habilitarPhva) ERROR: " . $e->getMessage() . "\n";
            return false;
        }
    }
}