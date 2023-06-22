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
    //This just handles parameters if one is handed to this php file
    switch($_GET['action']){
        case "insertNewSnippet":
            insertNewSnippet($_POST);
        case "deleteSnippet":
            deleteSnippet($_GET['id']);
        default:
            echo "No function called.";
    }


    function connectToDB(){
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


    //We will grab every snippet from the database, and create an <a> tag 
    //where the src is obviously the picture of it, and the href links to a different php page
    //with the HTML/CSS/JS that is needed to make it 
    function getAllSnippets(){
        $connection = connectToDB();
        $query = "SELECT * FROM snippets;";
        if($results = $connection->query($query)){
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
        $snippetDestination = 'snippetImages/' . $snippetImageName;
        //Save our image contents to a local file, then store path into sql server to save space
        file_put_contents($snippetDestination, file_get_contents($snippetImage)); 



        $connection = connectToDB();
        $JSsnippet = $connection->real_escape_string($JSsnippet);
        $HTMLsnippet = $connection->real_escape_string($HTMLsnippet);
        $SCSSsnippet = $connection->real_escape_string($SCSSsnippet);
        $query = "INSERT INTO snippets (snippetType, snippetHTML, snippetCSS, snippetJS, imagePath)
        VALUES ('$snippetType', '$HTMLsnippet', '$SCSSsnippet', '$JSsnippet', '$snippetDestination')";
  
        if($connection->query($query) != false){
            header("Location: index.php");
            exit;
        }
        else{
            echo "Error: " . mysqli_errno($connection) . " - " . mysqli_error($connection);
        }
    }



    function deleteSnippet($id){
       $connection = connectToDB();
       $query = "DELETE FROM snippets WHERE snippetID = $id;";

       if($connection->query($query) != false){
            header("Location: index.php");
            exit;
        }
        else{
            echo "Error: " . mysqli_errno($connection) . " - " . mysqli_error($connection);
        }
    }








?>
