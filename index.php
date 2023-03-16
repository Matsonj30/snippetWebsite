<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/styles/style.css">
    <title>Snippet Grabber</title>
    <?php include 'connectToDB.php';?>

</head>
<body>
    <div class="bigHeader">Click on an element to view its HTML / SCSS / JS</div>



<?php 
    testcrap();
    createTable();
 
?>



</body>

<script src="/scripts/script.js"></script>
</html>