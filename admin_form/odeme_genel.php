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
<div class="col-lg-9 mx-md-5 mt-5 col-md-12 col-sm-10 mx-sm-auto">
    <div class="row mx-auto">
        <!-- İlk Tablo -->
    <div class="container-fluid mt-5 mb-5 col-lg-6 col-sm-12 col-md-10 mx-lg-auto mx-md-5">
            <div class="card islemler">
                <div class="card-header kayit-kart">
                    <h3 class="mt-3">Gelir Raporları</h3>
                </div>
                <div class="card-body tablo-head table-responsive">
                    <table class="table table-hover">
                    <thead>
                            <tr>
                                <th scope="col"></th>
                                <th scope="col">Firma Adı</th>
                                <th scope="col">Ödeme Miktarı</th>
                                <th scope="col">Ödeme Başlangıç</th>
                                <th scope="col">Ödeme Bitiş</th>
                                <th scope="col">Ödenen Para</th>
                                <th scope="col">Kalan Borç</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $sayi=0;
                                $odemesor=$db->prepare("SELECT * FROM odeme_kategori WHERE odeme_durumu = 'Alınacak'");
                                $odemesor->execute();
                                while($odemecek=$odemesor->fetch(PDO::FETCH_ASSOC)){
                                    $sayi++;?>  
                                <tr>
                                    <td><?php echo $sayi ?></td>
                                    <td><?php echo $odemecek['odeme_firma_adi']?></td>
                                    <td><?php echo $odemecek['odeme_miktar']?></td>
                                    <td><?php echo $odemecek['odeme_baslangic']?></td>
                                    <td><?php echo $odemecek['odeme_bitis']?></td>
                                    <td><?php echo $odemecek['odeme_odenen']?></td>
                                    <td><?php echo $odemecek['odeme_kalan']?></td>
                                </tr>
                                
                                <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- İkinci Tablo -->
    <div class="container-fluid mt-5 mb-5 col-lg-6 col-sm-12 col-md-10 mx-lg-auto mx-md-5">
            <div class="card islemler">
                <div class="card-header kayit-kart">
                    <h3 class="mt-3">Gider Raporları</h3>
                </div>
                <div class="card-body tablo-head table-responsive">
                    <table class="table table-hover w-auto" style="font-size: 1rem;">
                    <thead>
                            <tr>
                                <th scope="col"></th>
                                <th scope="col">Firma Adı</th>
                                <th scope="col">Ödeme Miktarı</th>
                                <th scope="col">Ödeme Başlangıç</th>
                                <th scope="col">Ödeme Bitiş</th>
                                <th scope="col">Ödenen Para</th>
                                <th scope="col">Kalan Borç</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $sayi=0;
                                $odemesor=$db->prepare("SELECT * FROM odeme_kategori WHERE odeme_durumu = 'Verilecek'");
                                $odemesor->execute();
                                while($odemecek=$odemesor->fetch(PDO::FETCH_ASSOC)){
                                    $sayi++;?>  
                                <tr>
                                    <td><?php echo $sayi ?></td>
                                    <td><?php echo $odemecek['odeme_firma_adi']?></td>
                                    <td><?php echo $odemecek['odeme_miktar']?></td>
                                    <td><?php echo $odemecek['odeme_baslangic']?></td>
                                    <td><?php echo $odemecek['odeme_bitis']?></td>
                                    <td><?php echo $odemecek['odeme_odenen']?></td>
                                    <td><?php echo $odemecek['odeme_kalan']?></td>
                                </tr>
                                
                                <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>


    <!--Ödeme Liste Başlangıç-->
    <div class="container-fluid mt-5 mb-5 col-lg-6 col-sm-12 col-md-10 mx-lg-auto mx-md-5">
        <div class="card islemler">
        <div class="card-header kayit-kart">
                        <h3 class="mt-3">Ödeme Yerleri</h3>
                    </div>
                    <div class="card-body tablo-head table-responsive">
                        <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col"></th>
                                <th scope="col">Firma Adı</th>
                                <th scope="col">Alınan Ürün</th>
                                <th scope="col">İban</th>
                                <th scope="col">Ödeme Türü</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $sayi=0;
                                $odemesor=$db->prepare("SELECT * FROM odeme_yerler");
                                $odemesor->execute();
                                while($odemecek=$odemesor->fetch(PDO::FETCH_ASSOC)){
                                    $sayi++;?>  
                                <tr>
                                    <td><?php echo $sayi ?></td>
                                    <td><?php echo $odemecek['yerler_firma_isim']?></td>
                                    <td><?php echo $odemecek['yerler_firma_urun']?></td>
                                    <td><?php echo $odemecek['yerler_firma_iban']?></td>
                                    <td><?php echo $odemecek['yerler_odeme_turu']?></td>
                                </tr>
                                
                                <?php } ?>
                        </tbody>
                        </table>
                    </div>
        </div>
    </div>
    <!--Ödeme Liste Bitiş-->
    <!--Ana İçerik Bitiş-->
</div

<!--Footer Başlangıç-->
<?php
include 'footer.php';
?>
<!--Footer Bitiş-->