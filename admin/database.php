<?php

class Database{

    private static $dbHost = "localhost"; // Rend les variables privée pour seulement la class Database
    private static $dbName = "moto_univers";
    private static $dbUser = "root";
    private static $dbUserPassword = "";

    private static $connection = null; // Me permet d'initialiser la variable pour la rendre accessible dans tout le fichier.

    
    public static function connect(){ // Me permet de stocker et retourner ma variable connection pour m'en servir plus tard avec par exemple prepare et execute.

        try {
        self::$connection = new PDO("mysql:host=" . self::$dbHost . ";dbname=" . self::$dbName, self::$dbUser, self::$dbUserPassword);
        // self:: me permet d'accedder à mes variables privées plus haut.    
        }
        catch (PDOException $e) {
        die($e->getMessage());
        }
        return self::$connection;
    }

    public static function disconnect(){
        self::$connection = null;
    }
}

function getAllUsers($pFilter)
{
    // Rempli un tableau avec les résultats positifs, et retourne ce tableau 
    $lTrombi = [];
    try 
    {
        $db = Database::connect();
        // requête à la BDD avec le filtre sur le nom et prénom
        foreach($db->query("SELECT * from items WHERE name LIKE '%$pFilter%' OR  Prenom LIKE '%$pFilter%' ") as $row) 
        {
            // on rempli le tableau
            array_push($lTrombi, $row);
        }
        // déconnexion
        $lBdd = null;
    } 
    catch (PDOException $e) 
    {
        print "Erreur !: " . $e->getMessage() . "<br/>";
    }

    // le tableau (complet, semi-rempli ou vide)
    return  $lTrombi;
}



Database::connect();



