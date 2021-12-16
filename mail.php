<?php
  require 'PHPMailerAutoload.php';
  function sendEmailContact($userName, $userMail, $userSub, $userBody){
    $messageControl = false;
    $mail = new PHPMailer;
    $mail->isSMTP();
    $mail->SMTPAuth = true;
    /*$mail->SMTPDebug = 4;
    $mail->Debugoutput = 'html';*/
    $mail->Host = 'mail.thesanguinecouncil.com';
    $mail->Port = 25;
    $mail->Username = 'administrator@thesanguinecouncil.com';
    $mail->Password = 'tscAdmin-124578';
    $mail->setFrom($mail->Username, 'The Sanguine Council');
    $mail->addAddress("kubilaykocdemir@gmail.com","Kubilay Koçdemir");
    $mail->addAddress("eceyilmazh@gmail.com","Ece Yılmaz");
    $mail->addAddress("mmertkarakoc@gmail.com","Mustafa Mert Karakoç");
    $mail->isHTML(true);
    $mail->CharSet = 'UTF-8';
    $mail->Subject = $userSub;
    $mail->Body = $userBody;
    if($mail->Send()) {
      $messageControl = true;
    } else {
      $messageControl = false;
    }
    return $messageControl;
  }

  function sendEmailRegister($userName, $userMail, $userPhone,$userOtherContact,$userOption1,$userOption2,$userOption3,$userOption4,$userOption5,$userSex){
    $messageControl = false;
    $mail = new PHPMailer;
    $mail->isSMTP();
    $mail->SMTPAuth = true;
    /*$mail->SMTPDebug = 4;
    $mail->Debugoutput = 'html';*/
    $mail->Host = 'mail.thesanguinecouncil.com';
    $mail->Port = 25;
    $mail->Username = 'administrator@thesanguinecouncil.com';
    $mail->Password = 'tscAdmin-124578';
    $mail->setFrom($mail->Username, 'The Sanguine Council');
    $mail->addAddress("eceyilmazh@gmail.com","Ece Yılmaz");
    $mail->addAddress("mmertkarakoc@gmail.com","Mustafa Mert Karakoç");
    $mail->isHTML(true);
    $mail->CharSet = 'UTF-8';
    $mail->Subject = 'Kayıt Formu Bilgisi';
    $mail->Body = "Kayıt yaptıran kişi bilgileri:<br><b>$userName</b><br>$userSex<br>$userMail<br>$userPhone<br>$userOtherContact<br>Seçenekler:<br>1-) $userOption1<br>2-) $userOption2<br>3-) $userOption3<br>4-) $userOption4<br>5-) $userOption5<br>";
    if($mail->Send()) {
      $messageControl = true;
    } else {
      $messageControl = false;
    }
    return $messageControl;
  }
?>
