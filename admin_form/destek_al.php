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
<div class="col-lg-4 mt-5 col-md-7 col-sm-10 mx-auto">
    <!--Firma Ödeme Bilgisi Listesi-->
    <div class="row mx-auto">
        <div class="mt-5">
            <div class="card" style="background-color:#0A2647; color: #fff;">
                <div class="form-container p-4">
                    <h2 class="text-center mb-4">İletişim Formu</h2>
                    <form action="mail/mail.php" method="POST">
                        <div class="form-group">
                            <label for="isim">Adınız:</label>
                            <input type="text" class="form-control" style="background-color:#2C74B3; color: #fff;" id="isim" name="isim" required="">
                        </div>
                        <div class="form-group">
                            <label for="mail">E-posta Adresiniz:</label>
                            <input type="email" class="form-control" style="background-color:#2C74B3; color: #fff;" id="mail" name="mail" required="">
                        </div>
                        <div class="form-group">
                            <label for="baslik">Başlık:</label>
                            <input type="text" class="form-control" style="background-color:#2C74B3; color: #fff;" id="baslik" name="baslik" required="">
                        </div>
                        <div class="form-group">
                            <label for="icerik">İleti İçeriği:</label>
                            <textarea class="form-control" style="background-color:#2C74B3; color: #fff;" id="icerik" name="icerik" rows="4" required=""></textarea>
                        </div>
                        <button type="submit" style="background-color:#0A2647; color: #fff; border-color: #fff;" class="btn mt-2">Gönder</button>
                    </form>
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