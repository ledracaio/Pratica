<?php 
include_once "conf.inc.php";

class Conexao {  

    private static $pdo;

    private function __construct() {  
    } 

    public static function getInstance() {  
        if (!isset(self::$pdo)) {  
            try {  
                $opcoes = array(
                    PDO::ATTR_PERSISTENT => TRUE,
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
                );

                self::$pdo = new PDO(
                    DRIVER . ":host=" . HOST . ";dbname=" . DBNAME . ";options='--client_encoding=UTF8'", 
                    USER, 
                    PASSWORD, 
                    $opcoes
                );  

            } catch (PDOException $e) {  
                print "Erro: " . $e->getMessage();  
            }  
        }  
        return self::$pdo;  
    }  
}
?>
