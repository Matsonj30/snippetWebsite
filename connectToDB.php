<?php

    

    function testcrap(){
        echo "<h1>TESTYU123</h1>";
    }


    function createTable(){
        $username = $_POST["username"];
        $password = $_POST["password"];
        echo $_POST["username"];
        echo "<br>";
        echo $_POST["password"];
        echo "<br>";
        $servername = "127.0.0.1"; //Hostname
        $username = "root"; //Username
        $password = "sqornmanPatty221qaz!"; //Password
        $dbname = "snippets"; //Schema
        $connect = new mysqli($servername, $username, $password, $dbname);
    
        if($connect->connect_error){
            die("Connection failed: " . $connect->connect_error);
        }
        else{
            echo "Connected successfully";
            
        }
        echo"<br>";
        
        $query = "CREATE TABLE snippetssss(
            snippetID varchar(4), 
            snippetName varchar(255), 
            snippetDescription varchar(255),
            snippetHTML varchar(1000),
            snippetCSS varchar(1000),
            snippetJS varchar(1000),
            imagePath varchar(100)
            );";
    
        if($connect->query($query) == TRUE){  
            echo "Table created successfully";
        } 
        else {
        echo "Error creating table: " . $connect->error;
        }
        
    }
?>
