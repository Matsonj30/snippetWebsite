<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/styles/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> 
    <title>Snippet Grabber</title>
    <?php include 'sqlQueries.php';?>

</head>


<?php
    if(!empty($_POST)){ //If a snippet was submitted
        
        //Can probably past the $_POST variable in itself, but want to keep it simple for now
        $HTMLsnippet = $_POST['snippetHTML'];
        $SCSSsnippet = $_POST['snippetSCSS'];
        $JSsnippet = $_POST['snippetJS'];
        $snippetImage = $_FILES['snippetImage']['tmp_name'];
        $snippetImageName = $_FILES['snippetImage']['name'];
        
        $snippetDestination = 'images/' . $snippetImageName;

        // echo '1 ' . $HTMLsnippet . ' ';
  
        // echo '2 ' .$SCSSsnippet;
        // echo '3 ' . $JSsnippet;
        // echo '4 ' .$snippetDestination;
        file_put_contents($snippetDestination, file_get_contents($snippetImage)); 
        insertNewSnippet($HTMLsnippet, $SCSSsnippet, $JSsnippet, $snippetDestination);
        
    }

?>
<body>
    <div class="bigHeader">Click on an element to view its HTML / SCSS / JS</div>

    <div class="wrapper">
        <div class="inputForm">
          
            <form action ="index.php" method="POST" enctype="multipart/form-data">
                <h2>Add New Snippet</h2>
                <textarea id="HTMLText" name="snippetHTML" placeholder="Enter HTML text here..."></textarea>
                <textarea id="SCSSText" name="snippetSCSS" placeholder="Enter SCSS text here..."></textarea>
                <textarea  id="JSText" name="snippetJS" placeholder="Enter JavaScript text here..."></textarea>
                <label for="snippetImage">
                  <input type="file" id="snippetImage" name="snippetImage" >
                </label>
                <button type="submit">Submit</button>
            </form>
        </div>
    </div>

<?php 
    getAllSnippets(); //Retrieve every row in the snippet scheme, then display the image to be clicked
?>



</body>

<script src="/scripts/script.js"></script>
</html>