<?php
if(isset($_GET["name"])){
    echo $_GET["name"];
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Website</title>
</head>
<body>
    <form method="GET" action="get_post.php">
    <div>
    <label>Name</label><br/>
    <input type="text" name="name" id="">
    </div>
    <div>
    <label>Email</label><br/>
    <input type="text" name="email">
    </div>
    <input type="submit" value="Submit">
    </form>
</body>
</html>