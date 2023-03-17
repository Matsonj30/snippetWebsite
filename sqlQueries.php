<?php

    

    function connectToDB(){
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
        return $connect;
    }


    function getAllSnippets(){
        $connection = connectToDB();
        $query = "SELECT * FROM snippets;";
        if($results = $connection->query($query)){
               //       echo print_r($results);
            while($row = mysqli_fetch_array($results)){
                    echo '<a href="productDetails.php?id=',$row[0],'"><img src="',$row[6],'"></a>'; //Row is just the image path relative to the img tag
                }   
        }
    }

    function getSnippetInfo($snippetID){
        echo("HI");
        $connection = connectToDB();
        $query = "SELECT snippetName, snippetDescription, snippetHTML, snippetCSS, snippetJS FROM snippets WHERE snippetid=$snippetID;";
        if($results = $connection->query($query)){

            $row = mysqli_fetch_array($results);
            //RESULTS [0] = NAME
            //RESULTS [1] = DESCRIPTION
            //RESULTS [2] = HTML
            //RESULTS [3] = CSS 
            //RESULTS [4] = JS
        }
        echo "<h2></h2>"
    }
?>
