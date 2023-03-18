<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/styles/style.css">
    <title>Snippet Grabber</title>
    <?php include 'sqlQueries.php';?>

</head>
<body>
    <?php 
    $snippetData = getSnippetInfo($_GET["id"])         
    //[0] = NAME
    //[1] = DESCRIPTION
    //[2] = HTML
    //[3] = CSS 
    //[4] = JS
    ?>

    <div class=productHeader>
        <h2><?php echo $snippetData[2]?></h2>   
        <h2><?php echo str_replace(array("\r\n", "\n", "\r"), "<br>", $snippetData[2])?></h2>
        
    </div>







</body>

<script src="/scripts/script.js"></script>
</html>