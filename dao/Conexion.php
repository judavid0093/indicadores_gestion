<?php


/**
 * DAO (Data Access Object)
 * 
 * Acceso a la base de datos
 */
class Conexion
{
    private $host = "127.0.0.1";
    private $user;
    private $password;
    private $db = "indicador_gestion";
    private $opciones = [PDO::ATTR_CASE => PDO::CASE_LOWER, PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::ATTR_ORACLE_NULLS => PDO::NULL_EMPTY_STRING, PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ];
    private $connect;

    public function __construct()
    {
        $this->user = 'root';
        $this->password = '';
        $connectionString = "mysql:host=" . $this->host . "; dbname=" . $this->db . "; charset=utf8";
        try {
            $this->connect = new PDO($connectionString, $this->user, $this->password,$this->opciones);
            $this->connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (Exception $e) {
            echo "\nConexion (__constructor) ERROR: " . $e->getMessage() . "\n";
        }
    }
    /**
     * Solicitud Objetos a la base de datos Multiples
     *
     * @param String $sql sentencia SQL a ejecutar
     * @param array $objeto Arreglo de Datos ingresados a la Sentencia SQL
     * @return Fichero con el objeto solicitado medinate la sntencia SQL
     * @return null si se lanza alguna Execepcion
     */
    public function preperTodo($sql,array $objeto)
    {
        try {
            $execute = $this->connect->prepare($sql);
            $execute->execute($objeto);
            return $execute->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            echo "\nConexion (preperTodo) ERROR: " . $e->getMessage() . "\n";
            return null;
        }
    }

    /**
     * Solicitud Objetos a la base de datos Simples
     *
     * @param String $sql sentencia SQL a ejecutar
     * @param array $objeto Arreglo de Datos ingresados a la Sentencia SQL
     * @return Fichero con el objeto solicitado medinate la sntencia SQL
     * @return null si se lanza alguna Execepcion
     */
    public function preperCondicionado($sql,array $objeto)
    {
        try {
            $execute = $this->connect->prepare($sql);
            $execute->execute($objeto);
            return $execute->fetch(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            echo "\nConexion (preperCondicionaodo) ERROR: " . $e->getMessage() . "\n";
            return null;
        }
    }

    /**
     * Ejecutar Sentencias SQL simples
     *
     * @param String $sql sentencia SQL a ejecutar
     * @param array $objeto Arreglo de Datos ingresados a la Sentencia SQL
     * @return true respuesta a ejecucuin de sentencia SQL
     * @return false si se lanza alguna Execepcion SQL 
     */
    public function execute($sql, array $objeto)
    {
        try {
            $execute = $this->connect->prepare($sql);
            $execute->execute($objeto);
            return true;
        } catch (Exception $e) {
            echo "\nConexion (execute) ERROR: " . $e->getMessage() . "\n";
            return false;
        }
    }
}
