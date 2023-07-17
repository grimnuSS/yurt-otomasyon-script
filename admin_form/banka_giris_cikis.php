<?php
include '../connect.php';
include 'header.php';
include 'admin_islem.php';

ob_start();
session_start();

if(empty($_SESSION['kul_eposta'])){
    header("location:../login_form/login.php");
    exit;
}
?>
<div class="row">
    <div class="col-md-2">

<!--Sidebar Başlangıç-->   
<?php
    include 'sidebar.php';
?>
<!--Sidebar Bitiş-->  

<!-- Ana İçerik -->

<div class="col-lg-9 mx-md-5 mt-5 col-md-7 col-sm-10 mx-sm-auto">
    <!--Banka Kayıt Başlangıç-->
    <div class="container-fluid">
        <div class="card islemler">
            <div class="card-header kayit-kart">
                <h3 class="mt-3">Banka Giriş Ekle</h3>
                <hr>
                <div class="card-body">
                    <form action="admin_islem.php" method="POST">
                        <div class="form-row">
                            <div class="row">
                                <div class="col-xl-6 col-lg-8 col-md-10 mx-auto">
                                    <label class="">Firma/ Öğrenci Adı</label>
                                    <input type="text" class="input-border form-control" name="ogrenci_ad" placeholder="Firma/ Öğrenci Adı Girin" required>
                                </div>
                                <div class="col-xl-6 col-lg-8 col-md-10 mx-auto">
                                    <label class="">Giriş Miktarı</label>
                                    <input type="text" class="input-border form-control" name="ogrenci_tc" placeholder="Miktar Girin" required>
                                </div>
                            </div>          
                            <div class="row mt-1">
                                <div class="col-xl-4 col-lg-8 col-md-10 mx-auto col-">
                                    <label class="">Borç Başlangıç/Bitiş Tarihi</label>
                                    <input type="text" class="input-border form-control" name="ogrenci_ucret" placeholder="Borç Başlangıç/Bitiş Tarihi" required>
                                </div>
                                <div class="col-xl-4 col-lg-8 col-md-10 mx-auto">
                                    <label class="">Ödenen Miktar</label>
                                    <input type="text" class="input-border form-control" name="ogrenci_taksit_sayisi" placeholder="Ödenen Miktar" required>
                                </div>
                                <div class="col-xl-4 col-lg-8 col-md-10 mx-auto">
                                    <label class="">Kalan Miktar</label>
                                    <input type="text" class="input-border form-control" name="ogrenci_taksit_miktari" placeholder="Kalan Miktar" required>
                                </div>
                            </div>
                        </div>
                        <button name="banka_giris_ekle" type="submit" class="mt-3 btn kayit-in">Giriş Ekle</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!--Banka Kayıt Bitiş-->

    <!--Banka Çıkış Başlangıç-->
    <div class="container-fluid">
        <div class="card islemler mt-5">
            <div class="card-header kayit-kart">
                <h3 class="mt-3">Banka Çıkış Ekle</h3>
                <hr>
                <div class="card-body">
                    <form action="admin_islem.php" method="POST">
                        <div class="form-row">
                            <div class="row">
                                <div class="col-xl-6 col-lg-8 col-md-10 mx-auto col-">
                                    <label class="">Firma/ Öğrenci Adı</label>
                                    <input type="text" class="input-border form-control" name="firma_ad" placeholder="Firma/ Öğrenci Adı Girin" required>
                                </div>
                                <div class="col-xl-6 col-lg-8 col-md-10 mx-auto">
                                    <label class="">Çıkış Miktarı</label>
                                    <input type="text" class="input-border form-control" name="firma_tc" placeholder="Miktar Girin" required>
                                </div>
                            </div>          
                            <div class="row mt-1">
                                <div class="col-xl-4 col-lg-8 col-md-10 mx-auto col-">
                                    <label class="">Borç Başlangıç/Bitiş Tarihi</label>
                                    <input type="text" class="input-border form-control" name="firma_ucret" placeholder="Borç Başlangıç/Bitiş Tarihi" required>
                                </div>
                                <div class="col-xl-4 col-lg-8 col-md-10 mx-auto">
                                    <label class="">Ödenen Miktar</label>
                                    <input type="text" class="input-border form-control" name="firma_taksit_sayisi" placeholder="Ödenen Miktar" required>
                                </div>
                                <div class="col-xl-4 col-lg-8 col-md-10 mx-auto">
                                    <label class="">Kalan Miktar</label>
                                    <input type="text" class="input-border form-control" name="firma_taksit_miktari" placeholder="Kalan Miktar" required>
                                </div>
                            </div>
                        </div>
                        <button name="Banka_cikis_ekle" type="submit" class="mt-3 btn kayit-in">Çıkış Ekle</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!--Banka Çıkış Bitiş-->
</div>
    <!--Ana İçerik Bitiş-->
</div

<!--Footer Başlangıç-->
<?php
include 'footer.php';
?>
<!--Footer Bitiş-->