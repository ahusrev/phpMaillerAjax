<?php

session_start();

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require "vendor/autoload.php";

if (isset($_POST)){

    //mail req kontrölü yanii eğer form doldurulmamışşsa hata bas

    if ($_POST["to_email"] && $_POST["to_name"] && $_POST["message"]){
        $mail = new PHPMailer(true);
        try{

            //Server Ayarları
            $mail->SMTPDebug = 0;
            $mail->isSMTP();
            $mail->Host       ="ssl://smtp.gmail.com";
            $mail->SMTPAuth   = true;
            $mail->Username   = "****@gmail.com";
            $mail->Password   = "******";
            $mail->SMTPSecure = "tls";
            $mail->CharSet  ="utf-8";
            $mail->Port       = 465;
            //Alıcı Ayarları
            $mail->setFrom( "************@gmail.com",$_POST["to_name"]);
            $mail->addAddress($_POST["to_email"],"");
            foreach ($_FILES["file"]["name"] as $k => $v) {
                $mail->AddAttachment( $_FILES["file"]["tmp_name"][$k], $_FILES["file"]["name"][$k] );
            }
            //Gönderi Ayarları
            $mail->isHTML();
            $mail->Subject = 'Destek Ve Şikayet Paneli';
            $mail->Body    = '

		<h3 align="center">Destek ve Şikayet Detayları</h3>
		<table border="1" width="100%" cellpadding="5" cellspacing="5">
			<tr>
				<td width="30%">Adı-SoyAdı</td>
				<td width="70%">'.$_POST["to_email"].'</td>
			</tr>
			<tr>
				<td width="30%">İl</td>
				<td width="70%">'.$_POST["to_name"].'</td>
			</tr>
			<tr>
				<td width="30%">İlçe</td>
				<td width="70%">'.$_POST["message"].'</td>
			</tr>
			
		</table>
	';

            if ($mail->send()){
                $alert=array(
                    "message" => "Destek Talebiniz Tarafımıza Ulaşmıştır  !",
                    "type"    => "success"
                );

            } else {

                $alert=array(
                    "message" => "Lütfen Tüm Alanları Doldurunuz !",
                    "type"    => "warning"
                );

            }


        } catch (Exception $e){
            $alert=array(
                "message" => $e->getMessage(),
                "type"    => "danger"
            );
        }

    }else{

        $alert=array(
            "message" => "Lütfen Tüm Alanları Doldurunuz !",
            "type"    => "warning"
        );

    }


    $_SESSION["alert"] = $alert;

    header("location:index.php");



}




