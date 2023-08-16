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
            <div class="col-lg-4 container-fluid mt-0 mt-lg-5 col-md-10 kart_main_2">
                <h4>Yıllık Gelir Grafiği</h4>
            </div>
            <div class="col-lg-8 container-fluid mt-0 mt-lg-5 col-md-10 kart_main_3 mt-lg-0 mt-sm-5">
                <h4>Öğrenciler</h4>
            </div>
        </div>
        <div class="row mx-auto">
            <div class="col-lg-3 container-fluid mt-0 mt-lg-5 col-md-10 kart_main_rapor mt-lg-0 mt-sm-5">
                <h4>Yeni Ayda Taksit Ödeyenler</h4>
            </div>
            <div class="col-lg-3 container-fluid mt-0 mt-lg-5 col-md-10 kart_main_rapor mt-lg-0 mt-sm-5">
                <h4>Toplam Potansiyel Kalan Gelir</h4>
            </div>
            <div class="col-lg-3 container-fluid mt-0 mt-lg-5 col-md-10 kart_main_rapor mt-lg-0 mt-sm-5">
                <h4>Yeni Ayda Taksit Ödemeyenler</h4>
            </div>
        </div>
    </div>

<!--Footer Başlangıç-->
<?php
include 'footer.php';
?>
<!--Footer Bitiş-->