<?php

/**
 * Interprete entre JavaScript y PHP
 */

$method = $_SERVER['REQUEST_METHOD'];
if (strtoupper($method) == 'POST') {
    try {
        $_post = json_decode(file_get_contents('php://input'),true);
        if (isset($_post['controller'])){
            $controller = $_post['controller'];
            $metodo = $_post['metodo'];
        } else {
            throw new Exception("El parametro controller no tiene valor");
        }

        if (isset($_post['metodo'])){
            $metodo = $_post['metodo'];
        } else {
            throw new Exception("El parametro controller no tiene valor");
        }
        
        $archController = '/'.$controller.'.php';

        if (file_exists($archController)) {
            require_once $archController;
            $CTR = new $controller;

            if (isset($metodo) and method_exists($CTR,$metodo)) {

                isset($_post['data']) ? $result = $CTR->{$metodo}($_post['data']) :  $result = $CTR->{$metodo}();

                $json = array(
                    'status' => "200",
                    'result' => $result,
                    'message' => "success"
                );
                echo json_encode($json,http_response_code($json['status']));
            } else {
                $json = array(
                    'status' => "404",
                    'message' => "success"
                );
            }
        }else {
            throw new Exception("Controller ".$controller." doesnt exist");
        }
    } catch(Exception $e) {
        $json = array(
            'status' => "400",
            'message' => $e->getMessage()
        );
        echo json_encode($json,http_response_code($json['status']));
    }
}

?>