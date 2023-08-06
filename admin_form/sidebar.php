<!-- Sidebar Başlangıç -->
<div class="container-fluid sidebar-container">
            <div class="row">
                <div class="baslik text-center mt-2">
                    <a href="anasayfa.php" class="link-offset-2 link-underline link-underline-opacity-0 text-light"><h3>grimDev</h3></a>
                    <h6>Yönetici Paneli</h6>
                    <hr>
                </div>
                <!-- Öğrenci İşlemleri -->
                <div class="accordion-item mt-5">
                    <h6 class="main-list text-light" style="font-size:1.15rem;" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">Öğrenci İşlemleri</h6>
                    <hr class="main-list-hr">
                    <div id="collapseTwo" class="accordion-collapse collapse show" aria-labelledby="headingTwo" data-bs-parent="#accordion">
                        <ul class="alt-liste">
                            <li><a href="ogrenci_genel.php" class="link-offset-2 link-underline link-underline-opacity-0">- Genel Profil</a></li>
                            <li><a href="ogrenci_islemler.php" class="link-offset-2 link-underline link-underline-opacity-0">- İşlemler</a></li>
                        </ul>
                    </div>
                </div>

                <!-- Ödeme İşlemleri -->
                <div class="accordion-item">
                    <h6 class="main-list text-light" style="font-size:1.15rem;" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">Ödeme İşlemleri</h6>
                    <hr class="main-list-hr">
                    <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordion">
                        <ul class="alt-liste">
                            <li><a href="odeme_genel.php" class="link-offset-2 link-underline link-underline-opacity-0">- Genel İşlemler</a></li>
                            <li><a href="odeme_yerleri.php" class="link-offset-2 link-underline link-underline-opacity-0">- Ödeme Yerleri</a></li>
                            <li><a href="odeme_durumlari.php" class="link-offset-2 link-underline link-underline-opacity-0">- Ödeme Durumları</a></li>
                        </ul>
                    </div>
                </div>

                <!-- Kasa Raporları -->
                <div class="accordion-item">
                    <h6 class="main-list text-light" style="font-size:1.15rem;" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">Kasa Raporları</h6>
                    <hr class="main-list-hr">
                    <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour" data-bs-parent="#accordion">
                        <ul class="alt-liste">
                            <li><a href="kasa_rapor.php" class="link-offset-2 link-underline link-underline-opacity-0">- Rapor Al</a></li>
                            <li><a href="kasa_odemeler.php" class="link-offset-2 link-underline link-underline-opacity-0">- Ödeme Listesi</a></li>
                            <li><a href="kasa_giris_cikis.php" class="link-offset-2 link-underline link-underline-opacity-0">- Giriş-Çıkış</a></li>
                        </ul>
                    </div>
                </div>

                <!-- Banka Raporları -->
                <div class="accordion-item">
                    <h6 class="main-list text-light" style="font-size:1.15rem;" data-bs-toggle="collapse" data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">Banka Raporları</h6>
                    <hr class="main-list-hr">
                    <div id="collapseFive" class="accordion-collapse collapse" aria-labelledby="headingFive" data-bs-parent="#accordion">
                        <ul class="alt-liste">
                            <li><a href="banka_rapor.php" class="link-offset-2 link-underline link-underline-opacity-0">- Rapor Al</a></li>
                            <li><a href="banka_odemeler.php" class="link-offset-2 link-underline link-underline-opacity-0">- Ödeme Listesi</a></li>
                            <li><a href="banka_giris_cikis.php" class="link-offset-2 link-underline link-underline-opacity-0">- Giriş-Çıkış</a></li>
                        </ul>
                    </div>
                </div>

                <!-- Ayarlar -->
                <div class="accordion-item">
                    <h6 class="main-list text-light" style="font-size:1.15rem;" data-bs-toggle="collapse" data-bs-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix">Ayarlar</h6>
                    <hr class="main-list-hr">
                    <div id="collapseSix" class="accordion-collapse collapse" aria-labelledby="headingSix" data-bs-parent="#accordion">
                        <ul class="alt-liste">
                            <li><a href="#" class="link-offset-2 link-underline link-underline-opacity-0">- Genel Ayarlar</a></li>
                            <li><a href="#" class="link-offset-2 link-underline link-underline-opacity-0">- Kullanıcı İşlemleri</a></li>
                            <li><a href="#" class="link-offset-2 link-underline link-underline-opacity-0">- Destek Al</a></li>
                        </ul>
                    </div>
                </div>
                <div class="log-out-div">
                    <form action="../login_form/login_islem.php" method="post">
                        <button name="cikis_yap" type="submit" class="btn text-light log-out">
                            Çıkış Yap
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Sidebar Bitiş -->