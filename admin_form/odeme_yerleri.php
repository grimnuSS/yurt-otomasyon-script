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
    <div class="col-lg-9 mx-5 mt-5 col-md-11 mx-md-auto">
    <div class="row mx-auto">
        <!-- İlk Tablo -->
        <div class="col-8">
            <div class="card islemler">
                <div class="card-header kayit-kart">
                    <h3 class="mt-3">Ödeme Yeri Ekle</h3>
                </div>
                <div class="card-body tablo-head">
                    <div class="row">
                        <form action="admin_islem.php">
                            <div class="form-row">
                                <div class="row">
                                    <div class="col-xl-6 col-lg-8 col-md-10 mx-auto col-">
                                        <label class="">Firma Adı</label>
                                        <input type="text" class="input-border form-control" name="firma_ad" placeholder="Firma Adı Girin">
                                    </div>
                                    <div class="col-xl-6 col-lg-8 col-md-10 mx-auto">
                                        <label class="">Ürün</label>
                                        <input type="text" class="input-border form-control" name="firma_urun" placeholder="Alınacak Ürünü Girin">
                                    </div>
                                </div>                            
                                <div class="row mt-2">
                                    <div class="col-xl-6 col-lg-8 col-md-10 mx-auto">
                                        <label class="">Yetkili Adı</label>
                                        <input type="text" class="input-border form-control" name="firma_yetkili_isim" placeholder="Ödemeyi Alan Kişi">
                                    </div>
                                    <div class="col-xl-6 col-lg-8 col-md-10 mx-auto">
                                        <label class="">İban</label>
                                        <input type="text" class="input-border form-control" name="firma_iban" placeholder="Ödeme Yapılan İban">
                                    </div>
                                </div>
                            </div>
                            <button name="firma_ekle" type="submit" class="mt-3 btn kayit-in">Ekle</button>
                        </form>
                    </div>  
                </div>
            </div>
        </div>

        <!-- İkinci Tablo -->
        <div class="col-4">
            <div class="card islemler">
                <div class="card-header kayit-kart">
                    <h3 class="mt-3">Ödeme Yeri Sil</h3>
                </div>
                <div class="card-body tablo-head">
                    <div class="row">
                        <form action="admin_islem.php">
                            <div class="form-row"> 
                                <div class="row">
                                    <div class="mx-auto">
                                        <label class="">Firma Adı</label>
                                        <input type="text" class="input-border form-control" name="firma_yetkili_isim" placeholder="Ödemeyi Alan Kişi">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="mx-auto">
                                        <label class="">İban</label>
                                        <input type="text" class="input-border form-control" name="firma_iban" placeholder="Ödeme Yapılan İban">
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
        <div class="odeme-yerleri mt-5">
            <div class="card islemler">
                    <div class="card-header kayit-kart">
                        <h3 class="mt-3">Ödeme Yerleri</h3>
                    </div>
                    <div class="card-body tablo-head">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th scope="col"></th>
                                    <th scope="col">Firma İsmi</th>
                                    <th scope="col">Ürün</th>
                                    <th scope="col">Yetkili Adı</th>
                                    <th scope="col">İban</th>
                                    <th scope="col">Ödeme</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row">1</th>
                                    <td>Ali Manav</td>
                                    <td>Manav</td>
                                    <td>Mustafa Yılmaz</td>
                                    <td>-</td>
                                    <td>Nakit</td>
                                </tr>
                                <tr>
                                    <th scope="row">2</th>
                                    <td>Murat Tabak</td>
                                    <td>Tabakçı</td>
                                    <td>Arda Kural</td>
                                    <td>TC0100000000000000000</td>
                                    <td>Kart</td>
                                </tr>
                                <tr>
                                    <th scope="row">3</th>
                                    <td>Veysel Elektrik</td>
                                    <td>Elektrik</td>
                                    <td>Ajda Kutay</td>
                                    <td>TC0100000000000000000</td>
                                    <td>Kart</td>
                                </tr>
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