<?php
session_start();
include "include/db.php";
$db= new PDO("mysql:host=" . HOST .";dbname" . DB_NAME,USER,PASS);
?>
<!DOCTYPE html>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="css/style.css">
   <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/css/intlTelInput.css"/>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/intlTelInput.min.js"></script> -->

   <script defer src="js/index.js"></script>
    <title>Internship assignment</title>
</head>
<body>
    <div class="center">
        <h1>Form</h1>
        <form method="POST" id="form" name="form" >
            <div class="txt_field">
                <input id="usrname" type="text" name="username"required>
                <span></span>
                <label for="">Name</label>
                <div class="error"></div>
            </div>
             <div class="txt_field change">
                <input id="number" type="tel" name="number" required>
                <span></span>
                <label for="">Phone Number</label>
                <div class="error"></div>
            </div>
             <div class="txt_field">
                <input id="city" type="text" name="city" required>
                <span></span>
                <label for="">City</label>
                <div class="error"></div>
            </div>
            <input type="submit" name="send" value="submit">
        </form>
    </div>

</body>
<?php
function guidv4($data = null) {
    // Generate 16 bytes (128 bits) of random data or use the data passed into the function.
    $data = $data ?? random_bytes(16);
    assert(strlen($data) == 16);

    // Set version to 0100
    $data[6] = chr(ord($data[6]) & 0x0f | 0x40);
    // Set bits 6-7 to 10
    $data[8] = chr(ord($data[8]) & 0x3f | 0x80);

    // Output the 36 character UUID.
    return vsprintf('%s%s-%s-%s-%s-%s%s%s', str_split(bin2hex($data), 4));
}

if (isset($_POST['send'])){
    $name=$_POST['username'];
    $num=$_POST['number'];
    $city=$_POST['city'];
    $uuid=guidv4();
    $_SESSION['id']=$uuid;
    $sql = $db->prepare("INSERT INTO test.user(`uuid`, `username`, `number`, `city`) VALUES(:uuid, :nom, :num, :city)");
    $ql=$sql->execute(array('uuid'=>$uuid, 'nom'=>$name, 'num'=>$num, 'city'=>$city));
    if($ql){
        echo "<script language='Javascript'>
        document.location.replace('second.php');
    </script>";
    }
}
?>
</html>