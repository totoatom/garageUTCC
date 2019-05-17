<?php
ob_start();
session_start();
if (!isset($_SESSION['id']) != "") {
    header("Location: work.php");
}
include_once 'dbcon.php';

$name = $_SESSION['name'];
$email = $_SESSION['email'];
$surname = $_SESSION['surname'];
$id = $_SESSION['id'];

$q = "SELECT * FROM db_user WHERE Email = '$email'";
$result = mysqli_query($conn, $q);
$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>ติดต่อผู้ดูแล</title>
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css"/>
    <link rel="stylesheet" href="css/style.css" type="text/css"/>
    <link href="css/mdb.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body class="bg-dark">

<div class="container">
<div class="row justify-content-center" style="margin-top:20px;">
    <div class="col-md-6 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <!-- Form contact -->
                            <form method="post" autocomplete="off">
                                <h2 class="text-center py-4 font-bold font-up danger-text">ติดต่อผู้ดูแล</h2>
                                <?php
                                    if (isset($errMSG)) {
                                        ?>
                                        <div class="form-group">
                                            <div class="alert alert-<?php echo ($errTyp == "success") ? "success" : $errTyp; ?>">
                                                <span class="glyphicon glyphicon-info-sign"></span> <?php echo $errMSG; ?>
                                            </div>
                                        </div>
                                        <?php
                                    }
                                    ?>
                              
                                <div class="md-form">
                                    <i class="fa fa-user prefix grey-text"></i>
                                    <input type="text" name="email" id="form41" class="form-control" value="<?php echo $row['Email']?>" disabled>
                                    <label for="form41">Email</label>
                                </div>
                                <div class="md-form">
                                    <i class="fa fa-tag prefix grey-text"></i>
                                    <input type="text" name="header" id="form51" class="form-control">
                                    <label for="form51">Header</label>
                                </div>
                                <div class="md-form">
                                <i class="fa fa-home prefix grey-text" ></i>                                 
                                 <textarea id="body" name="body" id="form121" class="form-control" ></textarea>
                                 <label for="form121">Body</label>
                                </div>
                                <div class="md-form">
                                    <i class="fa fa-phone-square prefix grey-text"></i>
                                    <input type="text" id="form81" name="phone" class="form-control" value="<?php echo $row['phone']?>">
                                    <label for="form81">เบอร์โทรศัพท์</label>
                                </div>                               
                                <div class="text-center">
                                    <button type="submit" class="btn btn-success btn-lg" name="massage" id="massage">ส่งข้อความ</button>
                                    <a href="javascript:history.back" class="btn btn-outline-danger btn-lg" >ย้อนกลับ</a>
                                </div>                               
                            </form>
                            <!-- Form contact -->
                        </div>
                    </div>
                </div>   
    </div>
</div>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/tos.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.4.1/js/mdb.min.js"></script>

</body>
</html>
<?php

 require 'dbcon.php';
if (isset($_POST['massage'])) {
    $email = $_POST['email'];
    $header = $_POST['header'];
    $body = $_POST['body'];
    $phone = $_POST['phone'];


$sql1 = "INSERT INTO `massage` (Email_massage,Head,Body,Phone)VALUES('$email','$header','$body','$phone')";



$result1 = mysqli_query($conn, $sql1) ;
if($result1){
    echo "<script>";
    echo "alert('บันทึกสำเร็จ');";
     echo "window.back";
    echo "</script>";
}
}
?>