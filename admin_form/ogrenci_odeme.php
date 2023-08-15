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
    <!-- Öğrenci Ödeme Başlangıç-->
    <div class="container-fluid">
        <div class="card islemler">
            <div class="card-header kayit-kart">
                <h3 class="mt-3">Öğrenci Ödeme Ekle</h3>
                <hr>
                <div class="card-body">
                    <form action="admin_islem.php" method="POST">
                        <div class="form-row">
                            <div class="row">
                                <div class="col-xl-6 col-lg-8 col-md-10 mx-auto">
                                    <label class="">Öğrenci Adı</label>
                                    <select class="input-border form-select form-control" name="ogrenci_ad" required>
                                    <?php
                                        $odemesor=$db->prepare("SELECT ogrenci_ad FROM ogrenci_kategori");
                                        $odemesor->execute();
                                        while($odemecek=$odemesor->fetch(PDO::FETCH_ASSOC)){?>  
                                            <option value="<?php echo $odemecek['ogrenci_ad']?>"><?php echo $odemecek['ogrenci_ad']?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="col-xl-6 col-lg-8 col-md-10 mx-auto">
                                    <label class="">Ödeme Miktarı</label>
                                    <input type="text" class="input-border form-control" name="ogrenci_odenen_miktar" placeholder="Miktar Girin" required>
                                </div>
                            </div>          
                        <button name="ogrenci_odeme_ekle" type="submit" class="mt-3 btn kayit-in">Ödeme Ekle</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Öğrenci Ödeme Bitiş-->
</div>
    <!--Ana İçerik Bitiş-->
</div

<!--Footer Başlangıç-->
<?php
include 'footer.php';
?>
<!--Footer Bitiş-->