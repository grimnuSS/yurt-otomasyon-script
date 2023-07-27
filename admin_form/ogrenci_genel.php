<?php
include '../connect.php';
include 'header.php';

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

<div class="col-lg-9 mx-md-5 mt-5 col-md-7 col-sm-6 mx-sm-auto">
    <!--Öğrenci Kayıt Başlangıç-->
    <div class="container-fluid">
        <div class="card islemler">
            <div class="card-header kayit-kart">
                <h3 class="mt-3">Öğrenci Listesi</h3>
                <hr>
                <div class="card-body tablo-head">
                    <table class="table table-hover table-responsive" id="example" class="display" style="width:100%">
                        <thead>
                            <tr>
                                <th scope="col">İd</th>
                                <th scope="col">Adı Soyadı</th>
                                <th scope="col">T.C Numarası</th>
                                <th scope="col">Eğitim Türü</th>
                                <th scope="col">Bölümü</th>
                                <th scope="col">Adres</th>
                                <th scope="col">Ücret</th>
                                <th scope="col">Taksit Sayısı</th>
                                <th scope="col">Aylık Taksit Tutarı</th>
                                <th scope="col">Ödenen Borç Tutarı</th>
                                <th scope="col">Kayıt Tarihi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $sayi=0;
                                $ogrencisor=$db->prepare("SELECT * FROM ogrenci_kategori");
                                $ogrencisor->execute();
                                while($ogrencicek=$ogrencisor->fetch(PDO::FETCH_ASSOC)){
                                    $sayi++;?>  
                                <tr>
                                    <td><?php echo $sayi ?></td>
                                    <td><?php echo $ogrencicek['ogrenci_ad']?></td>
                                    <td><?php echo $ogrencicek['ogrenci_tc']?></td>
                                    <td><?php echo $ogrencicek['ogrenci_egitim']?></td>
                                    <td><?php echo $ogrencicek['ogrenci_bolum']?></td>
                                    <td><?php echo $ogrencicek['ogrenci_adres']?></td>
                                    <td><?php echo $ogrencicek['ogrenci_ucret']?></td>
                                    <td><?php echo $ogrencicek['ogrenci_taksit_sayisi']?></td>
                                    <td><?php echo $ogrencicek['ogrenci_taksit_miktari']?></td>
                                    <td><?php echo $ogrencicek['ogrenci_odenen_miktar']?></td>
                                    <td><?php echo $ogrencicek['ogrenci_kayit_tarihi']?></td>
                                </tr>
                                
                                <?php } ?>
                            
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!--Öğrenci Kayıt Bitiş-->
    <!--Ana İçerik Bitiş-->
</div

<!--Footer Başlangıç-->
<?php
include 'footer.php';
?>
<!--Footer Bitiş-->