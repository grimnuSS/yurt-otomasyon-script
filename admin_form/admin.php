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
    <!-- Sidebar Başlangıç -->
        <div class="container-fluid sidebar-container">
            <div class="row">
                <div class="baslik text-center mt-2">
                    <h3>grimDev</h3>
                    <h6>Yönetici Paneli</h6>
                </div>
                <div class="liste mt-3">
                    <hr>
                    <ul>
                        <li class="mt-1"><a href="#" class="main-list text-light link-offset-2 link-underline link-underline-opacity-0">Öğrenci İşlemleri</a></li><hr class="main-list-hr">
                        <ul class="alt-liste">
                            <li><a href="#" class="link-offset-2 link-underline link-underline-opacity-0">- Genel Profil</li></a>
                            <li><a href="#" class="link-offset-2 link-underline link-underline-opacity-0">- İşlemler</li></a>
                        </ul>
                        <li class="mt-4"><a href="#" class="main-list text-light link-offset-2 link-underline link-underline-opacity-0">Ödeme İşlemleri</a></li><hr class="main-list-hr">
                        <ul class="alt-liste">
                            <li><a href="#" class="link-offset-2 link-underline link-underline-opacity-0">- Genel İşlemler</a></li>
                            <li><a href="#" class="link-offset-2 link-underline link-underline-opacity-0">- Ödeme Yerleri</a></li>
                            <li><a href="#" class="link-offset-2 link-underline link-underline-opacity-0">- Ödeme Durumları</a></li>
                        </ul>
                        <li class="mt-4"><a href="#" class="main-list text-light link-offset-2 link-underline link-underline-opacity-0">Kasa Raporları</a></li><hr class="main-list-hr">
                        <ul class="alt-liste">
                            <li><a href="#" class="link-offset-2 link-underline link-underline-opacity-0">- Rapor Al</a></li>
                            <li><a href="#" class="link-offset-2 link-underline link-underline-opacity-0">- Ödeme Listesi</a></li>
                            <li><a href="#" class="link-offset-2 link-underline link-underline-opacity-0">- Giriş-Çıkış</a></li>
                        </ul>
                        <li class="mt-4"><a href="#" class="main-list text-light link-offset-2 link-underline link-underline-opacity-0">Banka Raporları</a></li><hr class="main-list-hr">
                        <ul class="alt-liste">
                            <li><a href="#" class="link-offset-2 link-underline link-underline-opacity-0">- Rapor Al</a></li>
                            <li><a href="#" class="link-offset-2 link-underline link-underline-opacity-0">- Ödeme Listesi</a></li>
                            <li><a href="#" class="link-offset-2 link-underline link-underline-opacity-0">- Giriş-Çıkış</a></li>
                        </ul>
                        <li class="mt-4"><a href="#" class="main-list text-light link-offset-2 link-underline link-underline-opacity-0">Ayarlar</a></li><hr class="main-list-hr">
                        <ul class="alt-liste">
                            <li><a href="#" class="link-offset-2 link-underline link-underline-opacity-0">- Genel Ayarlar</a></li>
                            <li><a href="#" class="link-offset-2 link-underline link-underline-opacity-0">- Kullanıcı İşlemleri</a></li>
                            <li><a href="#" class="link-offset-2 link-underline link-underline-opacity-0">- Destek Al</a></li>
                        </ul>
                    </ul>
                </div>
                <div class="log-out-div">
                    <button class="btn text-light log-out">
                        Çıkış Yap
                    </button>
                </div>
            </div>
        </div>
    </div>
    <!-- Sidebar Bitiş -->

    <!-- Ana İçerik -->
    <div class="col-md-9">
        <div class="main-content">
            <h2 class="mt-3 text-left">Öğrenci İşlemleri</h2>
            <hr class="shadow-hr">
        </div>
    </div>
    <!--Ana İçerik Bitiş-->
</div

<?php
include 'footer.php';

?>