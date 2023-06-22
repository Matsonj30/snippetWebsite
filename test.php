<?php
   function connectToDB1(){
        $servername = "kansasridgewebdesign.ca"; //Hostname
        $username = "uyr3shging0om"; //Username
        $password = "Patty221qaz!"; //Password
        $dbname = "dbaqyte9qh5g6u"; //Schema
        $connect = new mysqli($servername, $username, $password, $dbname);

        if($connect->connect_error){
            die("Connection failed: " . $connect->connect_error);
        }
        else{
            echo "Connected successfully";
            
    }
        echo"<br>";
        return $connect;
    }
 
    connectToDB1();

?>