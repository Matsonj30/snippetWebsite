<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/styles/snippetStyle.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> 
    <title>Snippet Grabber</title>
    <?php include 'sqlQueries.php';?>

</head>

<body>

    <div class="bigHeader">Click on an element to view its HTML / SCSS / JS</div>
    <div class=wrapper>
        <button class=mainButton onclick="showForm()">Submit Snippet</button>
    </div>

    <div class="wrapper">
        <div id="inputForm">
          
            <form action ="sqlQueries.php?action=insertNewSnippet" method="POST" enctype="multipart/form-data" >
                <h2>Add New Snippet</h2>
                <textarea id="HTMLText" name="snippetHTML" placeholder="Enter HTML text here..."></textarea>
                <textarea id="SCSSText" name="snippetSCSS" placeholder="Enter SCSS text here..."></textarea>
                <textarea  id="JSText" name="snippetJS" placeholder="Enter JavaScript text here..."></textarea>
                <label for="type">What category is this snippet</label>
                <select id="type" name="typeOfSnippet">
                    <option value = "Hero">Hero</option>
                    <option value = "NavigationBar">Navigation Bar</option>
                    <option value = "Button">Button</option>
                    <option value = "Footer">Footer</option>
                    <option value = "Informational">Informational</option>
                    <option value = "Services">Services</option>
                    <option value = "Gallery">Gallery</option>
                    <option value = "Contact">Contact</option>
                    <option value = "Testimonial">Testimonial</option>
                    <option value = "Other">Other</option>
                </select>
                <label for="snippetImage">
                  <input type="file" id="snippetImage" name="snippetImage" >
                </label>
                <button class=mainButton type="submit">Submit</button>
            </form>
        </div>
    </div>

<div class=snippetsGrid>


<?php 
    getAllSnippets(); //Retrieve every row in the snippet scheme, then display the image to be clicked
?>

</div>


</body>

<script src="/scripts/snippetJS.js"></script>
</html>