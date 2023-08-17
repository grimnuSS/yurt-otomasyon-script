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
$sql = "SELECT DATE_FORMAT(odeme_baslangic, '%Y') as yil, SUM(odeme_odenen) as yillik_gider FROM odeme_kategori GROUP BY yil ORDER BY yil";

$result = $db->query($sql);

$yillik_giderler = array();
$yillar = array();

if ($result->rowCount() > 0) {
    while($row = $result->fetch(PDO::FETCH_ASSOC)) {
        $yillik_giderler[] = $row['yillik_gider'];
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
                <h4>Yıllık Gider Grafiği</h4>
                <canvas id="gelirChart"></canvas>
            </div>
            <div class="col-lg-8 container-fluid mt-0 mt-lg-5 col-md-10 kart_main_rapor_2 mt-lg-0 mt-sm-5">
                <h4>Kalan Borçlar</h4>
                <div class="card-body tablo-head table-responsive">
                    <table class="table table-hover table-responsive" id="kalan_borc" class="display" style="font-size: 1rem;">
                    <thead>
                            <tr>
                                <th scope="col"></th>
                                <th scope="col">Firma Adı</th>
                                <th scope="col">Ödenen Para</th>
                                <th scope="col">Kalan Borç</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $sayi=0;
                                $odemesor = $db->prepare("SELECT * FROM odeme_kategori WHERE odeme_kalan > 0 OR odeme_kalan IS NULL");
                                $odemesor->execute();
                                while($odemecek=$odemesor->fetch(PDO::FETCH_ASSOC)){
                                    $sayi++;?>  
                                <tr>
                                    <td><?php echo $sayi ?></td>
                                    <td><?php echo $odemecek['odeme_firma_adi']?></td>
                                    <td><?php echo $odemecek['odeme_odenen']?></td>
                                    <td><?php echo $odemecek['odeme_kalan']?></td>
                                </tr>
                                
                                <?php } ?>
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
                    label: 'Yıllık Giderler',
                    data: <?php echo json_encode($yillik_giderler); ?>,
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