<?php

/**
 * Index: Inicio ejecutable .php
 */

try {


    include_once './modelo/Colaborador.php';
    include_once './controlador/ControladorColaborador.php';
    include_once './modelo/Login.php';
    include_once './controlador/ControladorLogin.php';

    $colaborador = new Colaborador();
    $login = new Login();

    $colaboradorControlador = new ControladorColaborador();
    $loginControlador = new ControladorLogin();


    $login->setCuenta('juandavid009');
    $login->setClave('123450');



    if ($loginControlador->validarLogin($login)) {
        echo "\nlogin Encontrado:\n";
        echo "\n" . $login->getCuenta() . "\n";
    } else {
        echo "\nlogin No Encontrado \n";
    }

    /**INSERTAR

    $colaborador->setColaboradorId('1234567');
    $colaborador->setNombre('Juand David');
    $colaborador->setApellido('cabiativa');
    $colaborador->setDescripcion('mantenimiento y soporte de computo');
    $colaborador->setNombreEmpleo('tecnico en sistema');

    $login->setCuenta('juandavid009');
    $login->setClave('123450');
    $login->setTipoCuentaOid('aaaa-aaab');
    $login->setColaboradorId('1234567');

    if ($loginControlador->insertarLogin($login)) {
        echo "\nlogin Guardado\n";
    } else {
        echo "\nlogin No Guardado\n";
    }

    if ($colaboradorControlador->insertarColaborador($colaborador)) {
        echo "\nColaborador Guardado\n";
    } else {
        echo "\nColaborador No Guardado\n";
    }

    //BUSCAR

    $colaborador->setColaboradorId('1234567');

    $login->setCuenta('juandavid009');

    $login = $loginControlador->buscarLogin($login);

    if ($login != null) {
        echo "\nlogin Encontrado:\n";
        echo "\n" . $login->getCuenta() . "\n";
    } else {
        echo "\nlogin No Encontrado \n";
    }

    $colaborador = $colaboradorControlador->buscarColaborado($colaborador);

    if ($colaborador != null) {
        echo "\nColaborador Encontrado:\n";
        echo "\n" . $colaborador->getNombre() . "\n";
    } else {
        echo "\nColaborador No Encontrado \n";
    }

    /**MODIFICAR

    $colaborador->setNombre('laura alexandra');
    $colaborador->setApellido('saens rojas');
    $colaborador->setDescripcion('mantenimiento y soporte de software');
    $colaborador->setNombreEmpleo('tecnico en software');

    $login->setClave('1234567');    
    $login->setTipoCuentaOid('aaaa-aaad');

    if($loginControlador->modificarLogin($login)){
        echo "\nLogin Modificado \n";
    } else {
        echo "\nLogin No Modificado \n";
    }

    if($colaboradorControlador->modificarColaborador($colaborador)){
        echo "\nColaborador Modificado \n";
    } else {
        echo "\nColaborador No Modificado \n";
    }

/**DESHABLILITAR

    if($loginControlador->deshabilitarLogin($login)){
        echo "\nlogin Deshabilitado \n";
    } else {
        echo "\nlogin No Deshabilitado \n";
    }

    if($colaboradorControlador->deshabilitarColaborador($colaborador)){
        echo "\nColaborador Deshabilitado \n";
    } else {
        echo "\nColaborador No Deshabilitado \n";
    }

/**HABILITAR

    if($loginControlador->habilitarLogin($login)){
        echo "\nLogin Habilitado \n";
    } else {
        echo "\nLogin No Habilitado \n";
    }

    if($colaboradorControlador->habilitarColaborador($colaborador)){
        echo "\nColaborador Habilitado \n";
    } else {
        echo "\nColaborador No Habilitado \n";
    }

    include_once './modelo/Area.php';
    include_once './controlador/ControladorArea.php';
    include_once './modelo/ColaboradorArea.php';
    include_once './controlador/ControladorColaboradorArea.php';

    $area = new Area();
    $colaboradorArea = new ColaboradorArea();

    $controladorArea = new ControladorArea();
    $controladorColaboradorArea = new ControladorColaboradorArea();

    /**INSERTAR

    $area->setNombre('registro y control');
    $area->setDescripcion('registro');

    if ($controladorArea->insertarArea($area)) {
        echo "\nArea Insertada\n";
        $area = $controladorArea->buscarArea($area);

        if ($area != null) {

            $colaboradorArea->setAreaId($area->getAreaId());
            $colaboradorArea->setColaboradorId('123456');

            if ($controladorColaboradorArea->insertarColaboradorArea($colaboradorArea)) {
                echo "\nColaborador Area Insertado\n";
            } else {
                echo "\nColaborador Area No Insertado\n";
            }
        } else {
            echo "\nArea No Encontrada en Insertar\n";
        }
    } else {
        echo "\nArea No Insertada\n";
    }

    //BUSCAR

    $area->setNombre('registro y control');
    $area = $controladorArea->buscarArea($area);

    if ($area != null) {
        echo "\nEncontro el Area: " . $area->getNombre() . "\n";
        $colaboradorArea->setAreaId($area->getAreaId());
        $colaboradorArea = $controladorColaboradorArea->buscarColaboradorArea($colaboradorArea);
        if ($colaboradorArea != null) {
            echo "\nEncontro el ColaboradorArea: " . $colaboradorArea->getColaboradorId() . "\n";
        } else {
            echo "\nColaborador Area No Encontrada\n";
        }
    } else {
        echo "\nArea No Encontrada\n";
    }

    /**MODIFICAR

    $area->setNombre('Sistemas Informaticos');
    $area->setDescripcion('encargado de Sistemas');

    if ($controladorArea->modificarArea($area)) {
        echo "\nArea Modificadada\n";
    } else {
        echo "\nArea No Modificadada\n";
    }

    $area = $controladorArea->buscarArea($area);

    $colaboradorArea->setAreaId($area->getAreaId());
    $colaboradorAreaID = '1234567';
    $colaboradorArea = $controladorColaboradorArea->buscarColaboradorArea($colaboradorArea);

    if ($area != null && $colaboradorArea->getColaboradorId() != $colaboradorAreaID) {
        $colaboradorArea->setColaboradorId($colaboradorAreaID);
        if ($controladorColaboradorArea->modificarColaboradorArea($colaboradorArea)) {
            echo "\nColaborador Area Modificado\n";
        } else {
            echo "\nColaborador Area No Modificado\n";
        }
    } else {
        echo "\nArea No Encontrada en Modificar\n";
    }

    /**DESHABILITAR

    if ($controladorArea->deshabilitarArea($area)) {
        echo "\nArea Deshabilitada\n";
    } else {
        echo "\nArea No Deshabilitada\n";
    }

    //HABILTAR

    if ($controladorArea->habilitarArea($area)) {
        echo "\nArea Habilitada\n";
    } else {
        echo "\nArea No Habilitada\n";
    }

    include_once './modelo/Okr.php';
    include_once './modelo/OkrArea.php';
    include_once './controlador/ControladorOkr.php';
    include_once './controlador/ControladorOkrArea.php';

    $okr = new Okr();
    $okrArea = new OkrArea();

    $controladorOkr = new ControladorOkr();
    $controladorOkrArea = new ControladorOkrArea();

    /**INSERTAR

    $okr->setNombre('eliminar basura');
    $okr->setFechaInicio('2023-08-04');
    $okr->setFechaFin('2023-08-10');
    $okr->setDescripcion('desarollo');

    if ($controladorOkr->insertarOkr($okr)) {
        echo "\nOkr Insertado\n";
        $okr = $controladorOkr->buscarOkr($okr);

        if ($okr != null) {
            $okrArea->setOidOkr($okr->getOid());
            $okrArea->setIdArea('9');

            if ($controladorOkrArea->insertarOkrArea($okrArea)) {
                echo "\nOkr Area Insertado\n";
            } else {
                echo "\nOkr Area No Insertado\n";
            }
        } else {
            echo "\nOkr No Encontrado Insertar\n";
        }
    } else {
        echo "\nOkr No Insertado\n";
    }

    //BUSCAR

    $okr->setNombre('vuscar');
    $okr = $controladorOkr->buscarOkr($okr);

    if ($okr != null) {
        echo "\nOkr Encontrado: " . $okr->getNombre() . "\n";
        $okrArea->setOidOkr($okr->getOid());
        $okrArea = $controladorOkrArea->buscarOkrArea($okrArea);
        echo "\nOkr Are Encontrado: " . $okrArea->getOid() . "\n";
    } else {
        echo "\nOkr No Encontrado\n";
    }

    /**MODIFICAR

    $okr->setNombre('vuscar');
    $okr->setFechaInicio('2023-08-02');
    $okr->setFechaFin('2023-08-28');
    $okr->setDescripcion('Buscar el Software');

    if ($controladorOkr->modificarOkr($okr)) {
        echo "\nOkr Modificado\n";
    } else {
        echo "\nOkr No Modificado\n";
    }

    $okr = $controladorOkr->buscarOkr($okr);

    $okrArea->setOidOkr($okr->getOid());
    $okrAreaId = '9';
    $okrArea = $controladorOkrArea->buscarOkrArea($okrArea);

    if ($okr != null && $okrArea->getIdArea() != $okrAreaId) {
        $okrArea->setIdArea($okrAreaId);
        if ($controladorOkrArea->modificarOkrArea($okrArea)) {
            echo "\nOkr Area Modificado\n";
        } else {
            echo "\nOkr Area No Modificado\n";
        }
    } else {
        echo "\nOkr No Encontrado Modificar\n";
    }

    /**DESHABILITAR

    if ($controladorOkr->deshabilitarOkr($okr)) {
        echo "\nOkr Deshabilitado\n";
    } else {

        echo "\nOkr No Deshabilitado\n";
    }

    //HABILITA

    if ($controladorOkr->habilitarOkr($okr)) {
        echo "\nOkr Habilitado\n";
    } else {
        echo "\nOkr No Habilitado\n";
    }

    include_once './modelo/Kpi.php';
    include_once './controlador/ControladorKpi.php';

    include_once './modelo/KpiArea.php';
    include_once './controlador/ControladorKpiArea.php';


    $kpi = new Kpi();
    $controladorKpi = new ControladorKpi();

    $controladorKpiArea = new ControladorKpiArea();
    $kpiArea = new KpiArea();

    /**Insertar

    $kpi->setNombre('Reasignar IPs');
    $kpi->setDescripcion('Reasignar IPs a todas las areas');
    $kpi->setOkrOid('64df843830990');

    if ($controladorKpi->insertarKpi($kpi)) {
        echo "\nKPI Insertado\n";
        $kpi = $controladorKpi->buscarKpi($kpi);

        if ($kpi != null) {
            $kpiArea->setKpiOid($kpi->getOid());
            $kpiArea->setAreaOid('8');

            if ($controladorKpiArea->insertarKpiArea($kpiArea)) {
                echo "\nKPI Area Insertado\n";
            } else {
                echo "\nKPI Area No Insertado\n";
            }
        } else {
            echo "\nKPI No Encontrado\n";
        }
    } else {
        echo "\nKPI No Insertado\n";
    }

    /**Buscar

    $kpi->setNombre('encontrar usuario');

    $kpi = $controladorKpi->buscarKpi($kpi);

    if ($kpi != null) {
        echo "\nOid: " . $kpi->getOid() . "\n";
        echo "\nKPI Id: " . $kpi->getKpiId() . "\n";
        echo "\nNombre: " . $kpi->getNombre() . "\n";
    } else {
        echo "\nKPI No Encontrado\n";
    }

    //Modificar
    /*
    $kpi->setNombre('Encontrar Usuario');
    $kpi->setDescripcion('Encontrar el Usuario');
    $kpi->setOkrOid('64dcc15575eb6');

    if ($controladorKpi->modificarKpi($kpi)) {
        echo "\nKPI Modificado\n";
    } else {
        echo "\nKPI No Modificado\n";
    }

    //Deshabilitar
    
    if ($controladorKpi->deshabilitarKpi($kpi)) {
        echo "\nKPI Deshabilitado\n";
    } else {
        echo "\nKPI No Deshabilitado\n";
    }

    //Habilitar
    
    if ($controladorKpi->habiltarKpi($kpi)) {
        echo "\nKPI Habilitado\n";
    } else {
        echo "\nKPI No Habilitado\n";
    }

    include_once './modelo/KpiColaborador.php';
    include_once './controlador/ControladorKpiColaborador.php';

    $controladorKpiColaborador = new ControladorKpiColaborador();
    $kpiColaborador = new KpiColaborador();

    /*
    $kpiColaborador->setColaboradorId('123456');
    $kpiColaborador->setKpiOid('6513043364dba');

    if ($controladorKpiColaborador->insertarKpiColaborador($kpiColaborador)) {
        echo "\nKPI Colaborador Insertado\n";
    } else {
        echo "\nKPI Colaborador No Insertado\n";
    }

    //$kpiColaborador->setColaboradorId('123456');
    $kpiColaborador->setKpiOid('6513043364dba');

    $result = $controladorKpiColaborador->buscarKpiColaborador($kpiColaborador);

    if ($result != null) {
        echo "\n OID: " . $kpiColaborador->getOid() . "\n";
        echo "\n COLABORADOR ID: " . $kpiColaborador->getColaboradorId() . "\n";
        echo "\n KPI OID: " . $kpiColaborador->getKpiOid() . "\n";
    } else {
        echo "\nKPI Colaborador No Encontrado\n";
    }


    $kpiColaborador->setColaboradorId('123456');
    $kpiColaborador->setKpiOid('6512fe9d90715');

    if ($controladorKpiColaborador->modificarKpiColaborador($kpiColaborador)) {
        echo "\nKPI Colaborador Modificado\n";
    } else {
        echo "\nKPI Colaborador No Modificado\n";
    }

    /*
    $kpiColaborador->setColaboradorId('1234567');
    $kpiColaborador->setKpiOid('6513043364dba');

    if ($controladorKpiColaborador->insertarKpiColaborador($kpiColaborador)) {
        echo "\nKPI Colaborador Modificado\n";
    } else {
        echo "\nKPI Colaborador No Modificado\n";
    }

    include_once './modelo/KpiMedida.php';
    include_once './controlador/ControladorKpiMedida.php';

    $kipMedida = new KpiMedida();
    $controladorKpiMedida =  new ControladorKpiMedida('root','');

    $kipMedida->setKpiOid('64ecafc049777');
    $kipMedida->setFecha('2023/10/02');
    $kipMedida->setObjetivo('23,0');
    $kipMedida->setActual('10,9');
    $kipMedida->setFrecuencia('10,9');
    
    if ($controladorKpiMedida->insertarKpiMedida($kipMedida)) {
        echo "\nKPI Medida Insertada\n";
    } else {
        echo "\nKPI Medida No Insertada\n";
    }
     */
} catch (Exception $e) {
    echo "\nERROR EN INDEX: " . $e->getMessage() . "\n";
}
