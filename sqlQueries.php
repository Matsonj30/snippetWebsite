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
            // echo "Connected successfully";
            
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
        $connection = connectToDB();
        $query = "SELECT snippetName, snippetDescription, snippetHTML, snippetCSS, snippetJS FROM snippets WHERE snippetid=$snippetID;";
        if($results = $connection->query($query)){

            $row = mysqli_fetch_array($results);
        }
        return $row;
    }


    function insertNewSnippet($HTMLsnippet, $SCSSsnippet, $JSsnippet, $snippetImage){
        $connection = connectToDB();
        $query = "INSERT INTO snippets (snippetDescription, snippetHTML, snippetCSS, snippetJS, imagePath)
        VALUES ('hi', '$HTMLsnippet', '$SCSSsnippet', '$JSsnippet', '$snippetImage')";

        // echo $query;
        // echo '<br>';
        // echo $HTMLsnippet;
        // echo '<br>';
        // echo '$SCSSsnippet';
        // echo '<br>';
        // echo '$JSsnippet';
        // echo '<br>';
        // echo '$snippetImage';
  
       
        if($queryConfirm = $connection->query($query)){

        }
        else{
            echo "SOMETHING WENT WRONG";
        }
    }











?>
