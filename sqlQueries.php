<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>HU</h1>
</body>
</html>

<?php
    $var = $_GET['action'];

    if(!empty($_POST)){ //if there is something posted
        if($_GET['action'] == "insertNewSnippet"){

            insertNewSnippet($_POST);
        }
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
        //
        file_put_contents($snippetDestination, file_get_contents($snippetImage)); 

        $connection = connectToDB();
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



    function deleteSnippet(){
        $id = $_GET["id"];
        echo $id;
    }








?>
