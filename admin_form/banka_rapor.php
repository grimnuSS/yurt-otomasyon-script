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
<div class="col-lg-7 mx-md-auto mt-5 col-md-7 col-sm-10 mx-sm-auto">
    <div class="row mx-auto">
        <!-- İlk Tablo -->
        <div class="col-lg-6 col-md-10 col-sm-8">
            <div class="card islemler">
                <div class="card-header kayit-kart">
                    <h3 class="mt-3">Aylık Gider <i class="bi bi-arrow-bar-up text-danger"></i></h3>
                </div>
                <div class="card-body tablo-head">
                    <div class="row">
                        <p class="h4 text-danger">11000 ₺</p>
                    </div>  
                </div>
            </div>
        </div>

        <!-- İkinci Tablo -->
        <div class="col-lg-6 col-md-10 col-sm-8 mt-sm-5 mt-lg-0">
            <div class="card islemler">
                <div class="card-header kayit-kart">
                    <h3 class="mt-3">Aylık Gelir <i class="bi bi-arrow-bar-down text-success"></i></h3>
                </div>
                <div class="card-body tablo-head">
                    <div class="row">
                        <p class="h4 text-success">1000 ₺</p>
                    </div>  
                </div>
            </div>
        </div>

        <!--Rapor Listesi-->
        <div class="odeme-yerleri mt-5 col-md-10 col-sm-8 col-lg-12">
            <div class="card islemler">
                    <div class="card-header kayit-kart">
                        <h3 class="mt-3">Raporlar</h3>
                    </div>
                    <div class="card-body tablo-head table-responsive">
                        <table id="example" class="display" style="font-size: 1rem;">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Position</th>
                                    <th>Office</th>
                                    <th>Age</th>
                                    <th>Start date</th>
                                    <th>Salary</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Tiger Nixon</td>
                                    <td>System Architect</td>
                                    <td>Edinburgh</td>
                                    <td>61</td>
                                    <td>2011-04-25</td>
                                    <td>$320,800</td>
                                </tr>
                                <tr>
                                    <td>Garrett Winters</td>
                                    <td>Accountant</td>
                                    <td>Tokyo</td>
                                    <td>63</td>
                                    <td>2011-07-25</td>
                                    <td>$170,750</td>
                                </tr>
                                <tr>
                                    <td>Ashton Cox</td>
                                    <td>Junior Technical Author</td>
                                    <td>San Francisco</td>
                                    <td>66</td>
                                    <td>2009-01-12</td>
                                    <td>$86,000</td>
                                </tr>
                                <tr>
                                    <td>Cedric Kelly</td>
                                    <td>Senior Javascript Developer</td>
                                    <td>Edinburgh</td>
                                    <td>22</td>
                                    <td>2012-03-29</td>
                                    <td>$433,060</td>
                                </tr>
                                <tr>
                                    <td>Michael Bruce</td>
                                    <td>Javascript Developer</td>
                                    <td>Singapore</td>
                                    <td>29</td>
                                    <td>2011-06-27</td>
                                    <td>$183,000</td>
                                </tr>
                                <tr>
                                    <td>Donna Snider</td>
                                    <td>Customer Support</td>
                                    <td>New York</td>
                                    <td>27</td>
                                    <td>2011-01-25</td>
                                    <td>$112,000</td>
                                </tr>
                            </tbody>
                        </table>
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