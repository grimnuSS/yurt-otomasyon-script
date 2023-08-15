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
    <!--Öğrenci Kayıt Başlangıç-->
    <div class="container-fluid">
        <div class="card islemler">
            <div class="card-header kayit-kart">
                <h3 class="mt-3">Öğrenci Kayıt</h3>
                <hr>
                <div class="card-body">
                    <form action="admin_islem.php" method="POST">
                        <div class="form-row">
                            <div class="row">
                                <div class="col-xl-6 col-lg-8 col-md-10 mx-auto col-">
                                    <label class="">Öğrenci Adı Soyadı</label>
                                    <input type="text" class="input-border form-control" name="ogrenci_ad" placeholder="Öğrenci Adı Soyadı Girin" required>
                                </div>
                                <div class="col-xl-6 col-lg-8 col-md-10 mx-auto">
                                    <label class="">T.C Numarası</label>
                                    <input type="text" class="input-border form-control" name="ogrenci_tc" placeholder="Öğrenci TC No'sunu Girin" minlength="11" required>
                                </div>
                            </div>                     
                            <div class="row mt-2">
                                <div class="col-xl-6 col-lg-8 col-md-10 mx-auto">
                                    <label class="">Eğitim Türü</label>
                                    <select class="input-border form-select form-control" name="ogrenci_egitim">
                                        <option class="" value="Lise">Lise</option>
                                        <option class="" value="Önlisans">Önlisans</option>
                                        <option class="" value="Lisans">Lisans</option>
                                        <option class="" value="Yüksek Lisans">Yüksek Lisans</option>
                                        <option class="" value="Staj">Staj</option>
                                    </select>
                                </div>
                                <div class="col-xl-6 col-lg-8 col-md-10 mx-auto">
                                    <label class="">Öğrenci Bölüm</label>
                                    <select class="input-border form-select form-control" name="ogrenci_bolum">
                                        <option class="" value="Mühendislik">Mühendislik</option>
                                        <option class="" value="Tıp">Tıp</option>
                                        <option class="" value="Hukuk">Hukuk</option>
                                        <option class="" value="Sinema Televizyon">Sinema Televizyon</option>
                                        <option class="" value="Bilgisayar Programcılığı">Bilgisayar Programcılığı</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row mt-1">
                                <div class="col-xl-4 col-lg-8 col-md-10 mx-auto col-">
                                    <label class="">Ücret</label>
                                    <input type="text" class="input-border form-control" name="ogrenci_ucret" placeholder="Anlaşılan Ücreti Girin" required>
                                </div>
                                <div class="col-xl-4 col-lg-8 col-md-10 mx-auto">
                                    <label class="">Taksit Sayısı</label>
                                    <input type="text" class="input-border form-control" name="ogrenci_taksit_sayisi" placeholder="Tercih Edilen Taksit Sayısı" required>
                                </div>
                                <div class="col-xl-4 col-lg-8 col-md-10 mx-auto">
                                    <label class="">Aylık Taksit Tutarı</label>
                                    <input type="text" class="input-border form-control" name="ogrenci_taksit_miktari" placeholder="Aylık Ödenecek Miktar" required>
                                </div>
                            </div>        
                            <div class="form-row col-xl-12 col-lg-8 col-md-8 mx-auto mt-2">
                                <label class="">Öğrenci Adres</label>
                                <textarea name="ogrenci_adres" class="input-border form-control mx-md-auto" placeholder="Öğrenci Adresi Giriniz" minlength="10" required></textarea>
                            </div>
                        </div>
                        <button name="ogrenci_ekle" type="submit" class="mt-3 btn kayit-in">Kayıt Et</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!--Öğrenci Kayıt Bitiş-->

    <!--Öğrenci Sil Başlangıç-->
    <div class="container-fluid mt-5">
        <div class="card islemler">
            <div class="card-header kayit-kart">
                <h3 class=" mt-3">Öğrenci Kayıt Sil</h3>
                <hr>
                <div class="card-body">
                <form action="admin_islem.php" method="POST">
                    <div class="form-row">
                        <div class="row">
                            <div class="col-xl-10 col-lg-8 col-md-10 mx-auto">
                                <label class="">Öğrenci Ad/TC</label>
                                <select class="input-border form-select form-control" name="ogrenci_ad_tc" required>
                                    <?php
                                    $odemesor = $db->prepare("SELECT ogrenci_ad, ogrenci_tc FROM ogrenci_kategori");
                                    $odemesor->execute();
                                    while ($odemecek = $odemesor->fetch(PDO::FETCH_ASSOC)) { ?>
                                        <option value="<?php echo $odemecek['ogrenci_ad'] . ' - ' . $odemecek['ogrenci_tc']; ?>">
                                            <?php echo $odemecek['ogrenci_ad'] . " - " . $odemecek['ogrenci_tc']; ?>
                                        </option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <button name="ogrenci_sil" type="submit" class="mt-3 btn kayit-in">Kayıt Sil</button>
                </form>

                </div>
            </div>
        </div>
    </div>
    <!--Öğrenci Sil Bitiş-->
</div>
    <!--Ana İçerik Bitiş-->
</div

<!--Footer Başlangıç-->
<?php
include 'footer.php';
?>
<!--Footer Bitiş-->