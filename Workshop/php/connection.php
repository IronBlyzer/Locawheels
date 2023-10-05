<?php


    try{
        $user = "root";
        $pass = "root";
        $db = new PDO('mysql:host=localhost:3306;
                        dbname=locawheels;
                        charset=utf8;
                        port=3306;',
                        $user,
                        $pass);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }catch(Exception $e){
        die("Erreur : ".$e->getMessage());
    } 

    
?>