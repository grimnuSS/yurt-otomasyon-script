<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $isim = $_POST['isim'];
    $mailAdresi = $_POST['mail'];
    $baslik = $_POST['baslik'];
    $icerik = $_POST['icerik'];
	
	$mail = new PHPMailer(true);
	try {
		//Server settings
		$mail->SMTPDebug = 2;                                      
		$mail->isSMTP();                                            
		$mail->Host       = 'smtp.gmail.com';                    
		$mail->SMTPAuth   = true;                                
		$mail->Username   = 'omerkaymak230@gmail.com';           
		$mail->Password   = '*******';                    
		$mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;        
		$mail->Port       = 465;                
		$mail->setLanguage('tr', '/optional/path/to/language/directory/'); 
    	$mail->CharSet = 'UTF-8';

		//Recipients
		$mail->setFrom('omerkaymak230@gmail.com', 'Omer Kaymak');             //Gönderen E-Posta, Görünecek Kullanıcı Adı
		$mail->addAddress('omerahmetkaymak@hotmail.com', 'Omer Kaymak');      //Gönderilen E-Posta, Gönderilenin Kullanıcı Adı

        //Content
        $mail->isHTML(true);                                  
        $mail->Subject = $baslik; // Kullanıcının girdiği başlık
        $mail->Body = "Ad: $isim<br>E-posta: $mailAdresi<br>İleti:<br> $icerik";
    	$mail->send();  
		echo 'Mesaj Gonderildi';
        header('Location: ../anasayfa.php');
	} catch (Exception $e) {
		echo "Mesaj gonderilemedi. Hata Kodu: {$mail->ErrorInfo}";
	}
} else {
	echo "Bir Hata oluştu.";
}
?>
