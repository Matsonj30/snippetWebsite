<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
 
</body>
</html>

<?php
    switch($_GET['action']){
        case "insertNewSnippet":
            insertNewSnippet($_POST);
        case "deleteSnippet":
            deleteSnippet($_GET['id']);
        default:
            echo "No function called.";
    }


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
        $query = "SELECT snippetName, snippetType, snippetHTML, snippetCSS, snippetJS FROM snippets WHERE snippetid=$snippetID;";
        if($results = $connection->query($query)){

            $row = mysqli_fetch_array($results);
        }
        return $row;
    }

    function insertNewSnippet($post_data){
        //GET DATA
        $snippetType = $_POST['typeOfSnippet'];
        $HTMLsnippet = $_POST['snippetHTML'];
        $SCSSsnippet = $_POST['snippetSCSS'];
        $JSsnippet = $_POST['snippetJS'];

        //Actual image contents
        $snippetImage = $_FILES['snippetImage']['tmp_name'];
        //Name of the image submitted
        $snippetImageName = $_FILES['snippetImage']['name'];
        //Where we want image to be stored
        $snippetDestination = 'images/' . $snippetImageName;
        //Save our image contents to a local file, then store path into sql server to save space
        file_put_contents($snippetDestination, file_get_contents($snippetImage)); 



        $connection = connectToDB();
        $JSsnippet = $connection->real_escape_string($JSsnippet);
        $HTMLsnippet = $connection->real_escape_string($HTMLsnippet);
        $SCSSsnippet = $connection->real_escape_string($SCSSsnippet);
        $query = "INSERT INTO snippets (snippetType, snippetHTML, snippetCSS, snippetJS, imagePath)
        VALUES ('$snippetType', '$HTMLsnippet', '$SCSSsnippet', '$JSsnippet', '$snippetDestination')";
  
        if($queryConfirm = $connection->query($query)){
            header("Location: index.php");
            exit;
        }
        else{
            echo "SOMETHING WENT WRONG";
        }
    }



    function deleteSnippet($id){
        echo "<H1>I</H1>";
       $connection = connectToDB();
       $query = "DELETE FROM snippets WHERE snippetID = $id;";

       if($queryConfirm = $connection->query($query)){
            header("Location: index.php");
            exit;
        }
        else{
            echo "SOMETHING WENT WRONG";
        }
    }








?>
