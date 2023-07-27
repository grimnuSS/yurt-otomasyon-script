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
                    <h3 class="mt-3">Firma Ödeme Bilgileri</h3>
                </div>
                <div class="card-body tablo-head">
                    <table class="table table-hover" id="example" class="display" style="width:100%">
                        <thead>
                            <tr>
                                <th scope="col"></th>
                                <th scope="col">Firma İsmi</th>
                                <th scope="col">Ürün</th>
                                <th scope="col">Ödenen</th>
                                <th scope="col">Kalan</th>
                                <th scope="col">Toplam Borç</th>
                                <th scope="col">Başlanan/Hedeflenen Ödeme Tarihi</th>
                                <th scope="col">Ödeme Durumu</th>
                                <th scope="col">Alacak/Verecek</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">1</th>
                                <td>Ali Manav</td>
                                <td>Manav</td>
                                <td>-</td>
                                <td>-</td>
                                <td>-</td>
                                <td>10.01.2023/21.07.2023</td>
                                <td class="text-danger">Yapılmadı</td>
                                <td class="text-danger">Borç</td>
                            </tr>
                            <tr>
                                <th scope="row">2</th>
                                <td>Murat Tabak</td>
                                <td>Kırtasiye</td>
                                <td>5000TL</td>
                                <td>5000TL</td>
                                <td>10000TL</td>
                                <td>10.01.2023/21.07.2023</td>
                                <td class="text-danger">Yapılmadı</td>
                                <td class="text-success">Alacak</td>
                            </tr>
                            <tr>
                                <th scope="row">3</th>
                                <td>Veysel Elektrik</td>
                                <td>Elektrik</td>
                                <td>25300TL</td>
                                <td>25300TL</td>
                                <td>50600TL</td>
                                <td>10.01.2023/21.07.2023</td>
                                <td class="text-success">Yapıldı</td>
                                <td class="text-danger">Borç</td>
                            </tr>
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