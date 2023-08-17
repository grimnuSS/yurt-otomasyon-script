
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.1/js/dataTables.buttons.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.print.min.js"></script>
    <script>new 
    DataTable('#example', {responsive: true, select: true, language: {url: '//cdn.datatables.net/plug-ins/1.13.5/i18n/tr.json',},dom: 'Bfrtip',buttons: ['copy', 'excel', 'pdf', 'print'],});</script>
    <script>
    $(document).ready(function() {
        $('#ogrenci_rapor').DataTable({
            responsive: true,       // Responsive tasarım aktif
            select: true,           // Satır seçme özelliği aktif
            language: {
                url: '//cdn.datatables.net/plug-ins/1.13.5/i18n/tr.json' // Türkçe dil dosyası
            },
            dom: 'Bfrtip',          // Tablo araç çubuğu düzeni
            buttons: ['copy', 'excel', 'pdf', 'print'], // Tablo araç çubuğu düğmeleri
            paging: true,           // Sayfalama aktif
            pageLength: 3          // Sayfa boyutu 4 olarak ayarlandı
        });
    });
    </script>
    <script>
    $(document).ready(function() {
        $('#son_ay').DataTable({
            responsive: true,       // Responsive tasarım aktif
            select: true,           // Satır seçme özelliği aktif
            language: {
                url: '//cdn.datatables.net/plug-ins/1.13.5/i18n/tr.json' // Türkçe dil dosyası
            },
            dom: 'Bfrtip',          // Tablo araç çubuğu düzeni
            buttons: ['copy', 'excel', 'pdf', 'print'], // Tablo araç çubuğu düğmeleri
            paging: true,           // Sayfalama aktif
            pageLength: 3        // Sayfa boyutu 4 olarak ayarlandı
        });
    });
    </script>
    <script>
    $(document).ready(function() {
        $('#son_ay_2').DataTable({
            responsive: true,       // Responsive tasarım aktif
            select: true,           // Satır seçme özelliği aktif
            language: {
                url: '//cdn.datatables.net/plug-ins/1.13.5/i18n/tr.json' // Türkçe dil dosyası
            },
            dom: 'Bfrtip',          // Tablo araç çubuğu düzeni
            buttons: ['copy', 'excel', 'pdf', 'print'], // Tablo araç çubuğu düğmeleri
            paging: true,           // Sayfalama aktif
            pageLength: 4         // Sayfa boyutu 4 olarak ayarlandı
        });
    });
    </script>
    <script>
    $(document).ready(function() {
        $('#kalan_borc').DataTable({
            responsive: true,       // Responsive tasarım aktif
            select: true,           // Satır seçme özelliği aktif
            language: {
                url: '//cdn.datatables.net/plug-ins/1.13.5/i18n/tr.json' // Türkçe dil dosyası
            },
            dom: 'Bfrtip',          // Tablo araç çubuğu düzeni
            buttons: ['copy', 'excel', 'pdf', 'print'], // Tablo araç çubuğu düğmeleri
            paging: true,           // Sayfalama aktif
            pageLength: 4         // Sayfa boyutu 4 olarak ayarlandı
        });
    });
    </script>
    <script src="script.js"></script>
</body>
</html>