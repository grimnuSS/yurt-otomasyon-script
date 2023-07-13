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
        <div class="col-6">
            <div class="card islemler">
                <div class="card-header kayit-kart">
                    <h3 class="mt-3">Gelir Raporlar</h3>
                </div>
                <div class="card-body tablo-head">
                    <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th scope="col"></th>
                                    <th scope="col">Giriş-Çıkış Türü</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row">1</th>
                                    <td>Giriş</td>
                                    <td>Kasa</td>
                                </tr>
                                <tr>
                                    <th scope="row">2</th>
                                    <td>Çıkış</td>
                                    <td>Banka</td>
                                </tr>
                                <tr>
                                    <th scope="row">3</th>
                                    <td>Giriş</td>
                                    <td>Banka</td>
                                </tr>
                            </tbody>
                        </table>
                </div>
            </div>
        </div>
        <!-- İkinci Tablo -->
        <div class="col-6 ">
            <div class="card islemler">
                <div class="card-header kayit-kart">
                    <h3 class="mt-3">Gelir Raporlar</h3>
                </div>
                <div class="card-body tablo-head">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col"></th>
                                <th scope="col">Giriş-Çıkış Türü</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">1</th>
                                <td>Giriş</td>
                                <td>Kasa</td>
                            </tr>
                            <tr>
                                <th scope="row">2</th>
                                <td>Çıkış</td>
                                <td>Banka</td>
                            </tr>
                            <tr>
                                <th scope="row">3</th>
                                <td>Giriş</td>
                                <td>Banka</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>


    <!--Ödeme Liste Başlangıç-->
    <div class="container-fluid mt-5 mb-5">
        <div class="card islemler">
            <div class="card-header kayit-kart">
                <h3 class="mt-3">Ödeme Bilgileri Listesi</h3>
                <hr>
                <div class="card-bodytablo-head">
                <table id="" class="display" style="width:100%">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Position</th>
                            <th>Office</th>
                            <th>Age</th>
                            <th>Salary</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Tiger Nixon</td>
                            <td>System Architect</td>
                            <td>Edinburgh</td>
                            <td>61</td>
                            <td>$320,800</td>
                        </tr>
                        <tr>
                            <td>Cedric Kelly</td>
                            <td>Senior Javascript Developer</td>
                            <td>Edinburgh</td>
                            <td>22</td>
                            <td>$433,060</td>
                        </tr>
                        <tr>
                            <td>Sonya Frost</td>
                            <td>Software Engineer</td>
                            <td>Edinburgh</td>
                            <td>23</td>
                            <td>$103,600</td>
                        </tr>
                        <tr>
                            <td>Quinn Flynn</td>
                            <td>Support Lead</td>
                            <td>Edinburgh</td>
                            <td>22</td>
                            <td>$342,000</td>
                        </tr>
                        <tr>
                            <td>Dai Rios</td>
                            <td>Personnel Lead</td>
                            <td>Edinburgh</td>
                            <td>35</td>
                            <td>$217,500</td>
                        </tr>
                        <tr>
                            <td>Gavin Joyce</td>
                            <td>Developer</td>
                            <td>Edinburgh</td>
                            <td>42</td>
                            <td>$92,575</td>
                        </tr>
                        <tr>
                            <td>Martena Mccray</td>
                            <td>Post-Sales support</td>
                            <td>Edinburgh</td>
                            <td>46</td>
                            <td>$324,050</td>
                        </tr>
                        <tr>
                            <td>Jennifer Acosta</td>
                            <td>Junior Javascript Developer</td>
                            <td>Edinburgh</td>
                            <td>43</td>
                            <td>$75,650</td>
                        </tr>
                        <tr>
                            <td>Shad Decker</td>
                            <td>Regional Director</td>
                            <td>Edinburgh</td>
                            <td>51</td>
                            <td>$183,000</td>
                        </tr>
                    </tbody>
                </table>
                </div>
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