<?php
//for making database connection to artemeuble mysql database
    function OpenConnxn(){
        $dbhost="localhost";
        $dbuser="root";
        $dbpass="";
        $db="artemeuble";

        $connxn= new mysqli($dbhost,$dbuser,$dbpass,$db);
        

        //if connection error
        if($connxn->connect_error){
            die("connection failed: ".$connxn->connect_error);
        }
         //   echo "connection successfull";
        return $connxn;
    }

    function close_connection($connxn){
        $connxn->close();
    }

 
?>