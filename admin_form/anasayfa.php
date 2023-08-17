<?php
include '../connect.php';
include 'header.php';

ob_start();
session_start();

if(empty($_SESSION['kul_eposta'])){
    header("location:../login_form/login.php");
    exit;
}

$JSON = json_decode(file_get_contents('https://api.genelpara.com/embed/doviz.json'), true);

?>
<?php
//Doviz Api
$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => "https://api.collectapi.com/weather/getWeather?data.lang=tr&data.city=denizli",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "GET",
  CURLOPT_HTTPHEADER => array(
    "authorization: apikey 36IWT2KWXftUOomfVQMjBN:40eSxSHIJKsRYmjthyVhHK",
    "content-type: application/json"
  ),
));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

//Hava Durumu Api
if ($err) {
  echo "cURL Error #:" . $err;
} else {
  $data = json_decode($response, true);

  $item = $data['result'][0];
  $degree = (int) $item['degree'];
  $day = $item['day'];
  $durum = $item['status'];
}

if ($durum == "Clear" || $durum == "Clouds"){
    $description = "Açık";
    $weather = "sunny";
}elseif($durum == "Rainy"){
    $description = "Yağmurlu";
    $weather = "rainy";
}elseif($durum == "Snowy"){
    $description = "Karlı";
    $weather = "snowy";
}else{
    $description = "Güneşli";
    $weather = "snowy";
}

//Anasayfa Aylık Kazanç

$oneMonthAgo = date("Y-m-d", strtotime("-1 month"));

$query = "SELECT SUM(ogrenci_son_odenen_miktar) as ogr_toplam FROM ogrenci_kategori WHERE ogrenci_son_yapilan_odeme >= :oneMonthAgo";
$statement = $db->prepare($query);
$statement->bindParam(':oneMonthAgo', $oneMonthAgo, PDO::PARAM_STR);
$statement->execute();

$result = $statement->fetch(PDO::FETCH_ASSOC);

$aylik_ogrenci = $result['ogr_toplam'];


//Anasayfa Kayıtlı Öğrenci
$kaynak = "SELECT COUNT(*) as ogr_sayi FROM ogrenci_kategori"; 
$durum = $db->prepare($kaynak);
$durum->execute();

$sonuc = $durum->fetch(PDO::FETCH_ASSOC);

$ogrenci_sayisi = $sonuc['ogr_sayi']; 

//Anasayfa Aylık Gider

$sunucu = "SELECT SUM(odeme_kalan) as odeme_toplam FROM odeme_kategori";
$durum_2 = $db->prepare($sunucu);
$durum_2->execute();

$sonuc_2 = $durum_2->fetch(PDO::FETCH_ASSOC);

$aylik_odeme = $sonuc_2['odeme_toplam'];

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
                <h4 class="mt-4">&nbsp;Kayıtlı Öğrenci</h4><br>
                <p style="font-size:1.25rem">&nbsp;&nbsp;<i class="bi bi-person-circle text-left"></i>&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $ogrenci_sayisi, " Kişi"; ?></p>
            </div>
            <div class="col-3 container-fluid kart_2 mt-xl-1 mt-lg-5 mt-md-5">
                <h4 class="mt-4">&nbsp;Aylık Gelir</h4><br>
                <p style="font-size:1.25rem">&nbsp;&nbsp;<i class="bi bi-cash-stack text-left"></i>&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $aylik_ogrenci, " ₺"; ?></p>
            </div>
            <div class="col-3 container-fluid kart_main mt-xl-1 mt-lg-5 mt-md-5">
                <h4 class="mt-4">&nbsp;Toplam Borç</h4><br>
                <p style="font-size:1.25rem">&nbsp;<i class="bi bi-cash-stack text-left"></i>&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $aylik_odeme, " ₺"; ?></p>
            </div>
            <div class="col-3 container-fluid kart_2 mt-xl-1 mt-lg-5 mt-md-5">
                <h4 class="mt-4">&nbsp;Dolar/Euro</h4>
                <p style="font-size:1.25rem">&nbsp;&nbsp;<i class="bi bi-currency-dollar text-left"></i>&nbsp;&nbsp;&nbsp;&nbsp; <?php echo $JSON['USD']['satis']; ?></p>
                <p style="font-size:1.25rem">&nbsp;&nbsp;<i class="bi bi-currency-euro text-left"></i>&nbsp;&nbsp;&nbsp;&nbsp; <?php echo $JSON['EUR']['satis']; ?></p>
            </div>
        </div>
        <div class="row mx-auto">
            <div class="col-lg-4 container-fluid mt-0 mt-lg-5 col-md-10 weather-<?php echo $weather; ?>">
                <h4>&nbsp;&nbsp;&nbsp;Hava Durumu</h4><br>
                <?php
                    echo "<h5>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$day</h5>";
                    echo "<h5>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Hava Durumu: $description</h5>";
                    echo "<h5>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Derece: $degree</h5>";
                ?>
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