<?php 

abstract class Driver{

    private static $db;

    private static function getDb()
    {
        if(self::$db === null){

            try{
            self::$db  = new PDO('mysql:host=localhost; dbname=examphp','root','root');
            
            }catch(PDOException $e){
                die('Connexion failed: '.$e->getMessage());
            }
        }
        return self::$db;
    }

    protected function getRequest($sql,$params = null){
        $result = self::getDb()->prepare($sql);
        $result->execute($params);

        return $result;
    }
}
