<?php 
   function bdd(){
    $dbname = "fokontany";
    $host = "localhost";
    $user = "root";
    $pwd = "";

    try {
        $bdd = new PDO("mysql:dbname=".$dbname.";host=".$host,$user,$pwd);
        $bdd->exec("SET NAMES UTF8");
    } catch (PDOException $th) {
        echo "Tsy mandeha ny connexion : ".$th->getMessage();
    }
    return $bdd;
   }