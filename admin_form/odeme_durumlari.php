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
<div class="col-lg-9 mx-md-5 mt-5 col-md-7 col-sm-10 mx-sm-auto">
    <!--Firma Ödeme Bilgisi Listesi-->
    <div class="row mx-auto">
        <div class="mt-5">
            <div class="card islemler">
                <div class="card-header kayit-kart">
                    <h3 class="mt-3">Ödeme Defteri</h3>
                </div>
                <div class="card-body tablo-head table-responsive">
                    <table class="table table-hover" id="example" class="display" style="font-size: 1rem;">
                    <thead>
                            <tr>
                                <th scope="col"></th>
                                <th scope="col">Firma Adı</th>
                                <th scope="col">Ödeme Başlangıç</th>
                                <th scope="col">Ödeme Bitiş</th>
                                <th scope="col">Ödeme Miktarı</th>
                                <th scope="col">Ödenen Para</th>
                                <th scope="col">Kalan Borç</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $sayi=0;
                                $odemesor=$db->prepare("SELECT * FROM odeme_kategori");
                                $odemesor->execute();
                                while($odemecek=$odemesor->fetch(PDO::FETCH_ASSOC)){
                                    $sayi++;?>  
                                <tr>
                                    <td><?php echo $sayi ?></td>
                                    <td><?php echo $odemecek['odeme_firma_adi']?></td>
                                    <td><?php echo $odemecek['odeme_baslangic']?></td>
                                    <td><?php echo $odemecek['odeme_bitis']?></td>
                                    <td><?php echo $odemecek['odeme_miktar']?></td>
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
</div>
    <!--Ana İçerik Bitiş-->
</div

<!--Footer Başlangıç-->
<?php
include 'footer.php';
?>
<!--Footer Bitiş-->