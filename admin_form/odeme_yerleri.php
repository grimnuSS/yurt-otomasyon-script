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
    <div class="row mx-auto">
        <!-- İlk Tablo -->
        <div class="col-lg-8 col-sm-8">
            <div class="card islemler">
                <div class="card-header kayit-kart">
                    <h3 class="mt-3">Firma Ekle</h3>
                </div>
                <div class="card-body tablo-head">
                    <div class="row">
                        <form action="admin_islem.php" method="POST">
                            <div class="form-row">
                                <div class="row">
                                    <div class="col-xl-6 col-lg-8 col-md-10 mx-auto col-">
                                        <label class="">Firma Adı</label>
                                        <input type="text" class="input-border form-control" name="odeme_firma_adi" placeholder="Firma Adı Girin">
                                    </div>
                                    <div class="col-xl-6 col-lg-8 col-md-10 mx-auto">
                                        <label class="">Ürün</label>
                                        <input type="text" class="input-border form-control" name="odeme_urun" placeholder="Alınacak Ürünü Girin">
                                    </div>
                                </div>                            
                                <div class="row mt-2">
                                    <div class="col-xl-6 col-lg-8 col-md-10 mx-auto">
                                        <label class="">Yetkili Adı</label>
                                        <input type="text" class="input-border form-control" name="odeme_firma_yetkili" placeholder="Ödemeyi Alan Kişi">
                                    </div>
                                    <div class="col-xl-6 col-lg-8 col-md-10 mx-auto">
                                        <label class="">İban</label>
                                        <input type="text" class="input-border form-control" name="odeme_iban" placeholder="Ödeme Yapılan İban">
                                    </div>
                                </div>
                                <div class="row mt-2">
                                    <div class="col-xl-6 col-lg-8 col-md-10 mx-auto">
                                        <label class="">Ödeme Türü</label>
                                        <select class="input-border form-select form-control" name="odeme_turu">
                                            <option value="Nakit" selected>Nakit</option>
                                            <option value="Kredi/Banka">Kredi/Banka</option>
                                        </select>
                                    </div>
                                    <div class="col-xl-6 col-lg-8 col-md-10 mx-auto">
                                        <label class="">Alacak/Verecek</label>
                                        <select class="input-border form-select form-control" name="odeme_alacak_verecek">
                                            <option value="Alacak" selected class="text-success">Alacak</option>
                                            <option value="Verecek" class="text-danger">Verecek</option>
                                        </select>
                                    </div>
                                    <div class="col-xl-6 mt-auto col-lg-8 col-md-10">
                                        <button name="firma_ekle" type="submit" class="mt-3 btn kayit-in">Ekle</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>  
                </div>
            </div>
        </div>

        <!-- İkinci Tablo -->
        <div class="col-lg-4 col-sm-8 mt-sm-5 mt-lg-2">
            <div class="card islemler">
                <div class="card-header kayit-kart">
                    <h3 class="mt-3">Firma Sil</h3>
                </div>
                <div class="card-body tablo-head">
                    <div class="row">
                        <form action="admin_islem.php" method="POST">
                            <div class="form-row"> 
                                <div class="row">
                                    <div class="mx-auto">
                                        <label class="">Firma Adı</label>
                                        <select class="input-border form-select form-control" name="odeme_firma_adi" required>
                                        <?php
                                            $odemesor=$db->prepare("SELECT odeme_firma_adi FROM odeme_kategori");
                                            $odemesor->execute();
                                            while($odemecek=$odemesor->fetch(PDO::FETCH_ASSOC)){?>  
                                                <option value="<?php echo $odemecek['odeme_firma_adi']?>"><?php echo $odemecek['odeme_firma_adi']?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <button name="firma_sil" type="submit" class="mt-3 btn kayit-in">Sil</button>
                        </form>
                    </div>  
                </div>
            </div>
        </div>

        <!--Odeme Listesi-->
        <div class="odeme-yerleri mt-5 col-sm-8 col-lg-12">
            <div class="card islemler">
                    <div class="card-header kayit-kart">
                        <h3 class="mt-3">Firmalar</h3>
                    </div>
                    <div class="card-body tablo-head table-responsive">
                        <table class="table table-hover col-sm-4 col-lg-12" id="example" class="display" style="font-size: 1rem;">
                            <thead>
                                <tr>
                                    <th scope="col"></th>
                                    <th scope="col">Firma Adı</th>
                                    <th scope="col">Firma Yetkilisi</th>
                                    <th scope="col">Alınan Ürün</th>
                                    <th scope="col">İban</th>
                                    <th scope="col">Ödeme Türü</th>
                                    <th scope="col">Alacak/Verecek</th>
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
                                        <td><?php echo $odemecek['odeme_firma_yetkili']?></td>
                                        <td><?php echo $odemecek['odeme_urun']?></td>
                                        <td><?php echo $odemecek['odeme_iban']?></td>
                                        <td><?php echo $odemecek['odeme_turu']?></td>
                                        <td class="<?php if($odemecek['odeme_alacak_verecek']=="Alacak"){echo "text-success";}elseif($odemecek['odeme_alacak_verecek']=="Verecek"){echo "text-danger";}?>"><?php echo $odemecek['odeme_alacak_verecek']?></td>
                                    </tr>
                                    
                                    <?php } ?>
                            </tbody>
                        </table>
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