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
<?php 
// Yıl bazında aylık gelir verilerini çekme
$sql = "SELECT DATE_FORMAT(ogrenci_kayit_tarihi, '%Y') as yil, SUM(ogrenci_odenen_miktar) as yillik_gelir FROM ogrenci_kategori GROUP BY yil ORDER BY yil";

$result = $db->query($sql);

$yillik_gelirler = array();
$yillar = array();

if ($result->rowCount() > 0) {
    while($row = $result->fetch(PDO::FETCH_ASSOC)) {
        $yillik_gelirler[] = $row['yillik_gelir'];
        $yillar[] = $row['yil'];
    }
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
            <div class="col-lg-4 container-fluid mt-0 mt-lg-5 col-md-10 kart_main_ogr_2">
                <h4>Yıllık Gelir Grafiği</h4>
                <canvas id="gelirChart"></canvas>
            </div>
            <div class="col-lg-8 container-fluid mt-0 mt-lg-5 col-md-10 kart_main_rapor_2 mt-lg-0 mt-sm-5">
                <h4>Öğrenciler</h4>
                <div class="card-body tablo-head table-responsive">
                    <table class="table table-hover table-responsive" id="ogrenci_rapor" class="display" style="font-size: 1rem;">
                        <thead>
                            <tr>
                                <th scope="col">Id</th>
                                <th scope="col">Adı Soyadı</th>
                                <th scope="col">Bölümü</th>
                                <th scope="col">Adres</th>
                                <th scope="col">Ücret</th>
                                <th scope="col">Ödenen Borç Tutarı</th>
                                <th scope="col">Kayıt Tarihi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $sayi=0;
                                $ogrencisor=$db->prepare("SELECT * FROM ogrenci_kategori");
                                $ogrencisor->execute();
                                while($ogrencicek=$ogrencisor->fetch(PDO::FETCH_ASSOC)){
                                    $sayi++;?>  
                                <tr>
                                    <td><?php echo $sayi ?></td>
                                    <td><?php echo $ogrencicek['ogrenci_ad']?></td>
                                    <td><?php echo $ogrencicek['ogrenci_bolum']?></td>
                                    <td><?php echo $ogrencicek['ogrenci_adres']?></td>
                                    <td><?php echo $ogrencicek['ogrenci_ucret']?></td>
                                    <td><?php echo $ogrencicek['ogrenci_odenen_miktar']?></td>
                                    <td><?php echo $ogrencicek['ogrenci_kayit_tarihi']?></td>
                                </tr>
                                
                                <?php } ?>
                            
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="row mx-auto">
            <div class="col-lg-6 container-fluid mt-0 mt-lg-5 col-md-10 kart_main_rapor mt-lg-0 mt-sm-5">
                <h4>Yeni Ayda Taksit Ödeyenler</h4>
                <div class="card-body tablo-head table-responsive">
                    <table class="table table-hover table-responsive" id="son_ay" class="display" style="font-size: 1rem;">
                        <thead>
                            <tr>
                                <th scope="col">Id</th>
                                <th scope="col">Adı Soyadı</th>
                                <th scope="col">Bölümü</th>
                                <th scope="col">Ücret</th>
                                <th scope="col">Ödenen Taksit Tutarı</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $sayi = 0;
                                $currentMonth = date('Y-m'); // Bulunduğunuz ayı al
                                $firstDayOfMonth = $currentMonth . '-01'; // Ayın 1. günü

                                $ogrencisor = $db->prepare("SELECT * FROM ogrenci_kategori WHERE ogrenci_son_yapilan_odeme >= :ilk_gun AND ogrenci_son_yapilan_odeme IS NOT NULL");
                                $ogrencisor->bindValue(':ilk_gun', $firstDayOfMonth, PDO::PARAM_STR);
                                $ogrencisor->execute();

                                while ($ogrencicek = $ogrencisor->fetch(PDO::FETCH_ASSOC)) {
                                    $sayi++; ?>
                                    <tr>
                                        <td><?php echo $sayi ?></td>
                                        <td><?php echo $ogrencicek['ogrenci_ad'] ?></td>
                                        <td><?php echo $ogrencicek['ogrenci_bolum'] ?></td>
                                        <td><?php echo $ogrencicek['ogrenci_ucret'] ?></td>
                                        <td><?php echo $ogrencicek['ogrenci_son_odenen_miktar'] ?></td>
                                    </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col-lg-6 container-fluid mt-0 mt-lg-5 col-md-10 kart_main_rapor mt-lg-0 mt-sm-5">
                <h4>Yeni Ayda Taksit Ödemeyenler</h4>
                    <table class="table table-hover table-responsive" id="son_ay_2" class="display" style="font-size: 1rem;">
                        <thead>
                            <tr>
                                <th scope="col">Id</th>
                                <th scope="col">Adı Soyadı</th>
                                <th scope="col">Bölümü</th>
                                <th scope="col">Ücret</th>
                                <th scope="col">Ödenen Taksit Tutarı</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $sayi = 0;

                                $ogrencisor = $db->prepare("SELECT * FROM ogrenci_kategori WHERE ogrenci_son_yapilan_odeme IS NULL");

                                $ogrencisor->execute();

                                while ($ogrencicek = $ogrencisor->fetch(PDO::FETCH_ASSOC)) {
                                    $sayi++; ?>
                                    <tr>
                                        <td><?php echo $sayi ?></td>
                                        <td><?php echo $ogrencicek['ogrenci_ad'] ?></td>
                                        <td><?php echo $ogrencicek['ogrenci_bolum'] ?></td>
                                        <td><?php echo $ogrencicek['ogrenci_ucret'] ?></td>
                                        <td><?php echo $ogrencicek['ogrenci_son_odenen_miktar'] ?></td>
                                    </tr>
                            <?php } $db = null; ?>
                        </tbody>
                    </table>
            </div>
        </div>
    </div>

    <script>
        window.onload = function () {
            var data = {
                labels: <?php echo json_encode($yillar); ?>,
                datasets: [{
                    label: 'Yıllık Gelirler',
                    data: <?php echo json_encode($yillik_gelirler); ?>,
                    backgroundColor: '#2C74B3',
                    borderColor: '#f8f8f8',
                    borderWidth: 1
                }]
            };

            var ctx = document.getElementById('gelirChart').getContext('2d');
            var myChart = new Chart(ctx, {
                type: 'bar',
                data: data,
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
        }
    </script>
<!--Footer Başlangıç-->
<?php
include 'footer.php';
?>
<!--Footer Bitiş-->