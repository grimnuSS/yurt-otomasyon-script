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
    </div>
    <div class="col-lg-9 mx-md-5 mt-5 col-md-7 col-sm-10 mx-sm-auto">
        <div class="row mx-auto mt-5">
            <div class="col-6 container-fluid mt-0 mt-lg-5">

            </div>
        </div>
    </div>

<!--Footer Başlangıç-->
<?php
include 'footer.php';
?>
<!--Footer Bitiş-->