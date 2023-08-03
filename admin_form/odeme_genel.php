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
                                <th scope="col">Miktar</th>
                                <th scope="col">Başlangıç/Bitiş</th>
                                <th scope="col">Ödenen</th>
                                <th scope="col">Kalan</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">1</th>
                                <td>Murat Bilgisayar</td>
                                <td>10000 TL</td>
                                <td>12.02.2022/12.02.2023</td>
                                <td>5000 TL</td>
                                <td>5000 TL</td>
                            </tr>
                            <tr>
                                <th scope="row">2</th>
                                <td>Ali Manav</td>
                                <td>20000 TL</td>
                                <td>15.04.2021/11.02.2025</td>
                                <td>5000 TL</td>
                                <td>15000 TL</td>
                            </tr>
                            <tr>
                                <th scope="row">3</th>
                                <td>Zeynep Ticaret</td>
                                <td>50000 TL</td>
                                <td>24.02.2021/24.04.2024</td>
                                <td>5000 TL</td>
                                <td>45000 TL</td>
                            </tr>
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
                    <table class="table table-hover w-auto">
                        <thead>
                            <tr>
                                <th scope="col"></th>
                                <th scope="col">Firma Adı</th>
                                <th scope="col">Miktar</th>
                                <th scope="col">Başlangıç/Bitiş</th>
                                <th scope="col">Ödenen</th>
                                <th scope="col">Kalan</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">1</th>
                                <td>Murat Bilgisayar</td>
                                <td>10000 TL</td>
                                <td>12.02.2022/12.02.2023</td>
                                <td>5000 TL</td>
                                <td>5000 TL</td>
                            </tr>
                            <tr>
                                <th scope="row">2</th>
                                <td>Ali Manav</td>
                                <td>20000 TL</td>
                                <td>15.04.2021/11.02.2025</td>
                                <td>5000 TL</td>
                                <td>15000 TL</td>
                            </tr>
                            <tr>
                                <th scope="row">3</th>
                                <td>Zeynep Ticaret</td>
                                <td>50000 TL</td>
                                <td>24.02.2021/24.04.2024</td>
                                <td>5000 TL</td>
                                <td>45000 TL</td>
                            </tr>
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
    <!--Ödeme Liste Bitiş-->
    <!--Ana İçerik Bitiş-->
</div

<!--Footer Başlangıç-->
<?php
include 'footer.php';
?>
<!--Footer Bitiş-->