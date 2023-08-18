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
                    <h2 class="text-center mb-4">Profil Düzenleme</h2>
                    <hr>
                    <form action="admin_islem.php" method="POST">
                        <div class="form-group">
                            <label for="email">E-Postanız</label>
                            <input type="email" class="form-control" style="background-color:#2C74B3;; color: #fff;" id="email" name="email" required>
                        </div>
                        <div class="form-group">
                            <label for="password">Şifreniz</label>
                            <input type="password" class="form-control" style="background-color:#2C74B3;; color: #fff;" id="password" name="password" required>
                        </div>
                        <div class="form-group">
                            <label for="new_password">Yeni Şifreniz</label>
                            <input type="password" class="form-control" style="background-color:#2C74B3;; color: #fff;" id="new_password" name="new_password" required minlength=8>
                        </div>
                        <div class="form-group">
                            <label for="new_password_r">Yeni Şifreniz Tekrar</label>
                            <input type="password" class="form-control" style="background-color:#2C74B3;; color: #fff;" id="new_password_r" name="new_password_r" required minlength=8>
                        </div>
                        <button type="submit" style="background-color:#0A2647; color: #fff; border-color: #fff;" class="btn mt-2" name="sifre_degis">Kaydet</button>
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