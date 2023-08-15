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
        if ($ogrenciekle) {
            header("location: ogrenci_genel.php");
        } else {
            echo 'Başarısız';
            exit;
        }

    }

    
    if (isset($_POST['ogrenci_sil'])) {
        // Ayrıştırılmış ad ve tc değerleri
        $adTcArr = explode(" - ", $_POST['ogrenci_ad_tc']);
        $ad = $adTcArr[0];
        $tc = $adTcArr[1];

        $ogrencisil = $db->prepare("DELETE FROM ogrenci_kategori WHERE 
            ogrenci_ad = :ad AND
            ogrenci_tc = :tc
        ");
        $ogrencisil->execute(array(
            'ad' => $ad,
            'tc' => $tc
        ));

        if ($ogrencisil) {
            header("location: ogrenci_genel.php");
        } else {
            echo 'Başarısız';
            exit;
        }
    }


    if(isset($_POST['firma_ekle'])){
        try {
            $firmaekle = $db->prepare("INSERT INTO odeme_kategori (odeme_firma_adi, odeme_firma_yetkili, odeme_urun, odeme_iban, odeme_turu, odeme_alacak_verecek) VALUES (:odeme_firma_adi, :odeme_firma_yetkili, :odeme_urun, :odeme_iban, :odeme_turu, :odeme_alacak_verecek)");
    
            $firmaekle->execute(array(
                'odeme_firma_adi' => $_POST['odeme_firma_adi'],
                'odeme_firma_yetkili' => $_POST['odeme_firma_yetkili'],
                'odeme_urun' => $_POST['odeme_urun'],
                'odeme_iban' => $_POST['odeme_iban'],
                'odeme_turu' => $_POST['odeme_turu'],
                'odeme_alacak_verecek' => $_POST['odeme_alacak_verecek']
            ));
    
            if ($firmaekle) {
                header("location: odeme_yerleri.php");
            } else {
                echo 'Başarısız';
                exit;
            }
        } catch (PDOException $e) {
            echo "Hata: " . $e->getMessage();
        }
    }
    
    if(isset($_POST['firma_sil'])){
        $firmasil=$db->prepare("DELETE FROM odeme_kategori WHERE 
        odeme_firma_adi=:isim
        ");
        $firmasil->execute(array(
            'isim' => $_POST['odeme_firma_adi']
        ));
        
        if($firmasil){
            header("location: odeme_yerleri.php");
        }else{
            echo 'Başarısız';
            exit;
        }
    }
    
    if(isset($_POST['ogrenci_odeme_ekle'])){
        try {
            $ogrenci_ad = $_POST['ogrenci_ad'];
            
            // Mevcut ödenen miktarı veritabanından çekme
            $get_odenen_miktar = $db->prepare("SELECT ogrenci_odenen_miktar FROM ogrenci_kategori WHERE ogrenci_ad = :ogrenci_ad");
            $get_odenen_miktar->bindParam(':ogrenci_ad', $ogrenci_ad, PDO::PARAM_STR);
            $get_odenen_miktar->execute();
            
            $previous_odenen_miktar = $get_odenen_miktar->fetchColumn();
            
            // Yeni ödenen miktarı ekleyerek güncelleme
            $new_odenen_miktar = $previous_odenen_miktar + $_POST['ogrenci_odenen_miktar'];
    
            $firmaekle = $db->prepare("UPDATE ogrenci_kategori SET ogrenci_odenen_miktar = :new_odenen_miktar WHERE ogrenci_ad = :ogrenci_ad");
    
            $firmaekle->bindParam(':new_odenen_miktar', $new_odenen_miktar, PDO::PARAM_INT);
            $firmaekle->bindParam(':ogrenci_ad', $ogrenci_ad, PDO::PARAM_STR);
    
            $firmaekle->execute();
    
            if ($firmaekle) {
                header("location: ogrenci_genel.php");
                exit;
            } else {
                echo 'Başarısız';
                exit;
            }
        } catch (PDOException $e) {
            echo "Hata: " . $e->getMessage();
        }
    }

    if(isset($_POST['odeme_ekle'])){
        try {
            $odeme_firma_adi = $_POST['odeme_firma_adi'];
            $odeme_odenen = $_POST['odeme_odenen'];
    
            // Mevcut ödenen miktarı veritabanından çekme
            $get_odeme_info = $db->prepare("SELECT odeme_miktar, odeme_odenen, odeme_baslangic, odeme_bitis FROM odeme_kategori WHERE odeme_firma_adi = :odeme_firma_adi");
            $get_odeme_info->bindParam(':odeme_firma_adi', $odeme_firma_adi, PDO::PARAM_STR);
            $get_odeme_info->execute();
    
            $odeme_info = $get_odeme_info->fetch(PDO::FETCH_ASSOC);
            $odeme_miktar = $odeme_info['odeme_miktar'];
            $previous_odenen = $odeme_info['odeme_odenen'];
            $odeme_baslangic = $odeme_info['odeme_baslangic'];
            $odeme_bitis = $odeme_info['odeme_bitis'];
    
            // Hesaplamalar
            $new_odenen = $previous_odenen + $odeme_odenen;
            $odeme_kalan = max($odeme_miktar - $new_odenen, 0); // Borç bittiğinde negatif değeri engellemek için
            $new_bitis = ($odeme_kalan === 0) ? date("Y-m-d") : $odeme_bitis;
    
            // Veritabanını güncelleme
            $update_odeme = $db->prepare("UPDATE odeme_kategori SET odeme_odenen = :new_odenen, odeme_kalan = :odeme_kalan, odeme_bitis = :new_bitis WHERE odeme_firma_adi = :odeme_firma_adi");
    
            $update_odeme->bindParam(':new_odenen', $new_odenen, PDO::PARAM_INT);
            $update_odeme->bindParam(':odeme_kalan', $odeme_kalan, PDO::PARAM_INT);
            $update_odeme->bindParam(':new_bitis', $new_bitis, PDO::PARAM_STR);
            $update_odeme->bindParam(':odeme_firma_adi', $odeme_firma_adi, PDO::PARAM_STR);
    
            $update_odeme->execute();
    
            if ($update_odeme) {
                header("location: odeme_durumlari.php");
                exit;
            } else {
                echo 'Başarısız';
                exit;
            }
        } catch (PDOException $e) {
            echo "Hata: " . $e->getMessage();
        }
    }
    
    
    
    
?>