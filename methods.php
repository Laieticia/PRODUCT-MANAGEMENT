<?php
print_r($_GET);
print_r($_POST);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>METHODS</h1>
    <form action="<?php echo $_SERVER["PHP_SELF"] ?>"  method="get">
        <label for="first">First Name: </label>
        <input type="text" id="first" name="first" autocomplete="off"><br><br>
        <label for="last"> Last Name: </label>
        <input type="text" id="last" name="last" autocomplete="off"><br><br>
        <div class="buttons">
            <button type="submit">Submit</button>
            <button type="submit" formmethod="post">Submit Using Post</button>
            <button type="reset">Reset</button>   
        </div> 
    
    
    </form>
</body>
</html>