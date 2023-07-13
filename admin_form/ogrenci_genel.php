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
    <!--Öğrenci Kayıt Başlangıç-->
    <div class="container-fluid">
        <div class="card islemler">
            <div class="card-header kayit-kart">
                <h3 class="mt-3">Öğrenci Listesi</h3>
                <hr>
                <div class="card-bodytablo-head">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                            <th scope="col"></th>
                            <th scope="col">Adı Soyadı</th>
                            <th scope="col">T.C Numarası</th>
                            <th scope="col">Eğitim Türü</th>
                            <th scope="col">Bölümü</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">1</th>
                                <td>Ali Yılmaz</td>
                                <td>11111111111</td>
                                <td>Ön Lisans</td>
                                <td>Bilgisayar Programcılığı</td>
                            </tr>
                            <tr>
                                <th scope="row">2</th>
                                <td>Berkin Kurt</td>
                                <td>11111111111</td>
                                <td>Yüksek Lisans</td>
                                <td>Yazılım Mühendisi</td>
                            </tr>
                            <tr>
                                <th scope="row">3</th>
                                <td>Ahmet Yıldırım</td>
                                <td>11111111111</td>
                                <td>Lise</td>
                                <td>-</td>
                            </tr>
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