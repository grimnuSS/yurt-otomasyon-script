<?php
    include '../connect.php';

    if(isset($_POST['ogrenci_ekle'])){
        $ogrenciekle=$db->prepare("INSERT INTO ogrenci_kategori SET 
        ogrenci_ad=:ad,
        ogrenci_tc=:tc,
        ogrenci_egitim=:egitim,
        ogrenci_bolum=:bolum,
        ogrenci_adres=:adres,
        ogrenci_ucret=:ucret,
        ogrenci_taksit_sayisi=:taksit_sayisi,
        ogrenci_taksit_miktari=:taksit_miktari,
        ogrenci_kayit_tarihi=:kayit_tarihi
        ");

        $ogrenciekle->execute(array(
            'ad' => $_POST['ogrenci_ad'],
            'tc' => $_POST['ogrenci_tc'],
            'egitim' => $_POST['ogrenci_egitim'],
            'bolum' => $_POST['ogrenci_bolum'],
            'adres' => $_POST['ogrenci_adres'],
            'ucret' => $_POST['ogrenci_ucret'],
            'taksit_sayisi' => $_POST['ogrenci_taksit_sayisi'],
            'taksit_miktari' => $_POST['ogrenci_taksit_miktari'],
            'kayit_tarihi' => date("Y/m/d")
        ));
        
        if($ogrenciekle){
            header("location: ogrenci_genel.php");
        }else{
            echo 'Başarısız';
            exit;
        }
    }

    
    if(isset($_POST['ogrenci_sil'])){
        $ogrencisil=$db->prepare("DELETE FROM ogrenci_kategori WHERE 
        ogrenci_ad=:ad OR
        ogrenci_tc=:tc
        ");
        $ogrencisil->execute(array(
            'ad' => $_POST['ogrenci_ad'],
            'tc' => $_POST['ogrenci_tc']
        ));
        
        if($ogrencisil){
            header("location: ogrenci_genel.php");
        }else{
            echo 'Başarısız';
            exit;
        }
    }
?>