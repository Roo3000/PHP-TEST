<?php
session_start();
error_reporting(0);
$session=$_SESSION['id'];

?>
<!DOCTYPE html>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="css/style.css">
   <link rel="stylesheet" href="css/bootstrap.min.css">

    <title>Internship assignment</title>
</head>
<body>
    <?php
    if(!empty($session)){
        echo'
    <div class="top" id="message">
        <h1><span>Your informations have been successfully submitted</span></h1>
    </div>';
}?>
    <div class='centered' id='box'>
        <h2>Thank you for using our platform. Click the button below to get the pdf file generated after the submission</h2>
        <button class='btn btn-primary' onclick='window.open("./submission.php")'>View my submission</button>
    </div>
   
</body>
<script>
    window.setTimeout("closeDiv();",3000);
    window.setTimeout("openDiv();",3000);
    function closeDiv(){
        document.getElementById("message").style.display="none";
    }
    function openDiv(){
        document.getElementById("box").style.display="block";
    }

</script>
</html>