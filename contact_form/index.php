<?php 
// Message vars
$msg = '';
$msgClass='';
// check for submit
if (filter_has_var(INPUT_POST, "submit")) {
    // Get Form Data
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $message = htmlspecialchars($_POST['message']);

    // Check Required Fields
    if(!empty($email) && !empty($email) && !empty($message)){
    // Passed
     // Check Email
     if(filter_var($email, FILTER_VALIDATE_EMAIL) === false){
     // Failed
     $msg = 'Please use a valid email';
     $msgClass = 'alert-danger';
     }else{
     // Passed
     $toEmail = 'youremail@gamil.com';
     $subject = 'Contact Request From '.$name;
     $body = '<h2>Contact Request</h2>
             <h4>Name</h4><p>' .$name. '</p>
             <h4>Email</h4><p>' .$email. '</p>
             <h4>Message</h4><p>' .$message. '</p>'; 
    // Email Headers
    $headers = 'MIME-Version: 1.0' . "\r\n";
    $headers .="Content-Type:text/html;charset=UTF-8" ."\r\n";
    // Additional Headers
    $headers .= "From: " .$name. "<".$email.">"."\r\n";

    if(mail($toEmail, $subject, $body, $headers)){
    // Email Sent
    $msg = 'Your email has been sent';
    $msgClass = 'alert-success';
    }else{
        // Failed
        $msg = 'Your email was not sent';
        $msgClass = 'alert-danger';
    }
     }
    }else{
    // Failed
    $msg = 'Please fill in all fields';
    $msgClass = 'alert-danger';
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootswatch/4.5.2/cosmo/bootstrap.min.css">
</head>

<body>
    <nav class="navbar navbar-default">
        <div class="container">
            <div class="navbar-header">
                <a class="navbar-brand" href="index.php">My Website</a>
            </div>
        </div>
    </nav>
    <div class="container">
    <?php if($msg != ''):
?>
<div class="alert <?php echo $msgClass; ?>"><?php echo $msg; ?></div>
<?php endif; ?>
        <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post">
            <div class="form-group">
                <label>Name</label>
                <input type="text" name="name" value="<?php echo isset($name)? $name : ''?>" class="form-control">
            </div>
            <div class="form-group">
                <label>Email</label>
                <input type="text" name="email" value="<?php echo isset($email)? $email : ''?>" class="form-control">
            </div>
            <div class="form-group">
                <label>Message</label>
                <textarea type="text" name="message" class="form-control"><?php echo isset($message)? $message : ''?></textarea>
            </div>
            <br>
            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</body>

</html>