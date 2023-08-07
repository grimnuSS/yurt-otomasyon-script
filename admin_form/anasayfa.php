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
    <div class="col-lg-9 mx-md-5 mt-4 col-md-7 col-sm-10 mx-sm-auto">
        <div class="row mx-auto">
            <div class="col-3 container-fluid kart_main mt-xl-1 mt-lg-5 mt-md-5">
                <h4 class="mt-4">&nbsp;1 Aylık Gelir/Gider</h4><br>
                <p style="font-size:1.25rem">&nbsp;&nbsp;<i class="bi bi-cash-stack text-left"></i>&nbsp;&nbsp;&nbsp;&nbsp;1000 TL</p>
            </div>
            <div class="col-3 container-fluid kart_main mt-xl-1 mt-lg-5 mt-md-5">
                <h4 class="mt-4">&nbsp;Kayıtlı Öğrenci</h4><br>
                <p style="font-size:1.25rem">&nbsp;&nbsp;<i class="bi bi-person-circle text-left"></i>&nbsp;&nbsp;&nbsp;&nbsp;1000 TL</p>
            </div>
            <div class="col-3 container-fluid kart_main mt-xl-1 mt-lg-5 mt-md-5">
                <h4 class="mt-4">&nbsp;Toplam Gider</h4><br>
                <p style="font-size:1.25rem">&nbsp;<i class="bi bi-cash-stack text-left"></i>&nbsp;&nbsp;&nbsp;&nbsp;1000 TL</p>
            </div>
            <div class="col-3 container-fluid kart_main mt-xl-1 mt-lg-5 mt-md-5">
                <h4 class="mt-4">&nbsp;Dolar/Euro</h4>
                <p style="font-size:1.25rem">&nbsp;&nbsp;<i class="bi bi-currency-dollar text-left"></i>&nbsp;&nbsp;&nbsp;&nbsp;1000 TL</p>
                <p style="font-size:1.25rem">&nbsp;&nbsp;<i class="bi bi-currency-euro text-left"></i>&nbsp;&nbsp;&nbsp;&nbsp;1000 TL</p>
            </div>
        </div>
        <div class="row mx-auto">
            <div class="col-lg-4 container-fluid mt-0 mt-lg-5 col-md-10 kart_main_2">
                <h4>Hava Durumu</h4>
            </div>
            <div class="col-lg-8 container-fluid mt-0 mt-lg-5 col-md-10 kart_main_3 mt-lg-0 mt-sm-5">
                <h4>Son İşlemler</h4>
            </div>
        </div>
        <div class="row mx-auto">
            <div class="col-lg-8 container-fluid mt-0 mt-lg-5 col-md-10 kart_main_3">
                <h4>Öğrenci Listesi</h4>
            </div>
            <div class="col-lg-4 container-fluid mt-0 mt-lg-5 col-md-10 kart_main_2 mt-lg-0 mt-sm-5">
                <h4>Aylık Ödeme İşlemleri</h4>
            </div>
        </div>
    </div>

<!--Footer Başlangıç-->
<?php
include 'footer.php';
?>
<!--Footer Bitiş-->