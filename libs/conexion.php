<?php
    class Conexion
    {
        private $host;
        private $db;
        private $user;
        private $password;
        private $charset;
        private $connection;
        private $conexion;
        private static $instancia;

        /*
         * El constructor es privado para el patrón SINGLETON*/
        private function __construct()
        {
            $this->host = 'localhost';//constant('HOST');
            $this->db = constant('DB');
            $this->user = constant('USER');
            $this->password = constant('PASSWORD');
            $this->charset = constant('CHARSET');
            try{
                $this->conectar();
            } catch(PDOException $e){
                throw new PDOException("Error al conectar a la base de datos " . $e);
            }
        }

        /*Función para sólo regresar un objeto Patrón SINGLETON*/
        public static function getInstance() {
            if(!isset(self::$instacia)) {
                self::$instancia = new Conexion();
            }
            return self::$instancia;
        }
        /*Método para hacer la conexión a la base de datos*/
        function conectar() {
            try {
                $this->connection = "mysql:host=" . $this->host . ";dbname=".$this->db. ";charset=" . $this->charset;
                $options = [
                    PDO::ATTR_ERRMODE          => PDO::ERRMODE_EXCEPTION,
                    PDO::ATTR_EMULATE_PREPARES => false
                ];
                $this->conexion = new PDO($this->connection, $this->user, $this->password, $options);
                return $this->conexion;
            } catch (PDOException $e) {
                print_r("Error de conexión: " . $e->getMessage());
            }
        }


        //Método que ejecuta un insert, update y delete, según lo requiera.
        public function ejecutarAccion($accion, $valores = array()) {
            $resultado = false;
            if($statement = $this->conexion->prepare($accion)) {  //prepara la consultafactura
                if(preg_match_all("/(:\w+)/", $accion, $campo, PREG_PATTERN_ORDER)){ //tomo los nombres de los campos iniciados con :xxxxx
                    $campo = array_pop($campo); //inserto en un arreglo
                    foreach($campo as $parametro){
                        $statement->bindValue($parametro, $valores[$parametro]);
                    }
                }
                try {
                    if (!$statement->execute()) {
                        $resultado = false; //si no se ejecuta la consultafactura...
                        print_r($statement->errorInfo()); //imprimir errores
                    } else {
                        $resultado = true;
                    }
                    //$resultado = $statement->fetchAll(PDO::FETCH_ASSOC); //si es una consultafactura que devuelve valores los guarda en un arreglo.
                    $statement->closeCursor();
                }
                catch(PDOException $e){
                    echo "Error de ejecución: \n";
                    print_r($e->getMessage());
                }
            }
            return $resultado;
        }
        /**
         * Metodo para hacer una consultafactura a la base de datos y regresa un arreglo con los datos
         */
        public function consultar($consulta) {
            $consul = $this->conexion->prepare($consulta);
            $consul->execute();
            if ($consul->rowCount() != 0) {
                while ($reg = $consul->fetch()) {
                    $arrayConsulta[] = $reg;
                }
            } else {
                $arrayConsulta = null;
            }
            return $arrayConsulta;
        }
    }

?>