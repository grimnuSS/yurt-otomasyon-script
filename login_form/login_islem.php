<?php
include '../connect.php';

ob_start();
session_start();

if (isset($_POST['oturum_ac'])) {
    $kullanici_sor=$db->prepare("SELECT * FROM login_panel WHERE 
        kul_eposta=:mail 
        AND 
        kul_sifre=:sifre");
    $kullanici_sor->execute(array(
        'mail' => $_POST['kul_eposta'],
        'sifre' => $_POST['kul_sifre']
    ));
    $sonuc = $kullanici_sor->rowCount();

    if ($sonuc == 0){
        $_SESSION['mvs_yanlis'] = "E-Posta ya da Şifreniz yanlış";
        header("location: login.php");
        exit;
    }else{
        $_SESSION['kul_eposta'] = $_POST['kul_eposta'];
        header("location:../admin_form/admin.php");
    }
}
?>