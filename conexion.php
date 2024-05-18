<?php 
class Cconexion{
    public static function ConexionDB(){
        $host = 'MARIOCASE84\\SQLEXPRESS';
        $dbname = 'KillerMusicDB';
        $username = 'KillerMusic';
        $password = 'Popo1234';
        $puerto=1433;
        $conn = null;
        try {
            $conn = new PDO("sqlsrv:Server=$host;Database=$dbname",$username,$password);
            //echo "Se conectó correctamente a la base de datos";
        }
        catch(PDOException $exp){
            echo("No se logró conectar correctamente con la base de datos: $dbname, error: $exp");
        }
        return $conn;                 
    }
}
?> 