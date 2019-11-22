<?php
session_start();
?>

<!doctype html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Ege Sedef Avize Destek Paneli"/>
    <meta name="keywords" content="Destek Paneli"/>
    <meta name="author" content="egesedefavize"/>
    <!--Scritler-->
    <script src="assets/js/jquery-3.4.1.min.js"></script>
    <script src="assets/js/custom.js"></script>
    <!--#Scritler-->

    <!--###################################################################################-->

    <!--Css-->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/custom.css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!--#Css-->
    <title>Destek Paneli AJAX</title>
</head>
<body>
    <div class="container">
        <h3 class="header text-center mt-5 mb-5">PHP MAİL GÖNDERME SCRİPT</h3>
        <div class="row">
            <div class="col-md-6 sendEmail">

                <?php

                if (isset($_SESSION["alert"])){ ?>
                    <div class="alert alert-<?php echo $_SESSION["alert"]["type"];?>">
                        <?php echo $_SESSION["alert"]["message"];?>
                    </div>
                    <?php unset($_SESSION["alert"]);?>
                <?php } ?>




               <form id="uploadForm" action="sendEmail.php" method="post" enctype="multipart/form-data">
                   <div id="mail-status"></div>
                   <div class="form-group">
                       <label>Email address</label>
                       <input type="email" name="to_email" class="form-control" placeholder="Enter email">
                   </div>
                   <div class="form-group">
                       <label>Ad SoyAd</label>
                       <input type="text" name="to_name" class="form-control" placeholder="Enter name ">
                   </div>
                   <div class="form-group">
                       <label>Mesaj</label>
                       <textarea name="message" cols="30" rows="10" class="form-control"></textarea>
                   </div>
                   <div class="form-group">
                       <label>Dosya Yükle</label>
                       <input type="file" name="file[]" class="form-control-file"multiple="multiple">
                   </div>
                   <div class="form-group" align="center">
                       <button type="submit" name="submit" id="gönderdi" value="Gönder" class="btn btn-outline-primary">Gönder</button>
                   </div>
                   <div id="loader-icon" style="display:none;"><img src="LoaderIcon.gif" /></div>
               </form>
            </div>
        </div>
    </div>
</body>
</html>