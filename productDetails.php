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
    $id = $_GET["id"];
    $snippetData = getSnippetInfo($id)         
    //[0] = NAME
    //[1] = DESCRIPTION
    //[2] = HTML
    //[3] = CSS 
    //[4] = JS
    ?>

    
    <form class=deleteButton action="sqlQueries.php?action=deleteSnippet&id=<?php echo $id ?>" method="post" >
        <button class=buttonRed type=submit >Delete</button>
    </form>
    <br>
    <br>
    <div class="bigHeader">Copy the HTML, SCSS, and JS below to make the snippet</div>



    <div class=codeSection>
        <div class=section>
            <h3>HTML</h3>
            <textarea><?php echo htmlentities($snippetData[2])  ?></textarea>
        </div>
        <div class="section small">
            <h3>SCSS</h3>
            <textarea><?php echo htmlentities($snippetData[3])  ?></textarea>
        </div>
        <div class="section small">
            <h3>JavaScript</h3>
            <textarea><?php echo htmlentities($snippetData[4])  ?></textarea>
        </div>
    </div>

    <div class=wrapper>
    <a href=index.php><button class=mainButton>Home</button></a>
    </div>


</body>

<script src="/scripts/script.js"></script>
</html>