<?php
include 'include/config.php';
include 'head.php';
?>
<style type="text/css">
    .termFont {
        font-size: 14px;
        color: black;
    }

    .termRemark {
        font-size:11px;
    }
</style>
<body>
<link href="css/homepage.css?v=<?php echo filemtime('css/homepage.css'); ?>" rel="stylesheet" type="text/css" />
<?php include 'homepageHeader.php';?>

<!-- Banner -->
<!-- <div>
    <div class="banner productListingPortfolioBanner">
        <img class="bannerImg compProf m-0 p-0" src="images/project/products2.jpg" alt="companyProfileBanner">
        <div class="bannerText">
            <label class="bannerTitle mb-2" data-lang="M03052"><?php echo $translations['M03052'][$language]; /* Terms and Conditions */?></label>
            <div class="bannerSubtitle">
                <span class="bannerSubtitle01" data-lang="M03103"><?php echo $translations['M03103'][$language]; /* Discover Metafiz */?></span>
                <span class="bannerSubtitle02">/</span>
                <span class="bannerSubtitle02" data-lang=:M03116><?php echo $translations['M03116'][$language]; /* Who We Are */?></span>
            </div>
        </div>
    </div>
    
</div> -->

<div class="homepagePadding text-justify termFont mt-0">
    <h1 class="text-center p-4"><?php echo $translations['M03052'][$language]; /* Terms and Conditions */?></h1>
    <h3 class="text-center">
        Kode Etik
    </h3>
    <br>
    <p>
        Semua Entrepreneur kami dapat memesan produk-produk kami melalui Online / WebsitePT Meta Fiz Internasional berkewajiban untuk menyediakan Service Center yang berfungsi melayani perbaikan-perbaikan produk yang berjenis peralatan jika masih dalam masa garansi dan melewati prosedur claim yang berlaku.
    </p>
    <p>
        PT Meta Fiz Internasional akan menyediakan sarana agar produk dapat sampai ke alamat tujuan dengan tanpa mengurangi kualitas produk tersebut.
    </p>
    <p>
        Produk yang telah dipesan dan dibayar lunas oleh Fiz Entrepreneur dapat diambil melalui beberapa beberapa cara, sbb:
    </p>
    <ul>
        <li>
            Delivery; layanan antar langsung ke rumah.
        </li>
        <li>
            Pick Up; produk diambil melalui konter pengambilan pesanan produk di kantor cabang, yang kami sebut Service Center.
            <p class="termRemark">Catatan: cara pengambilan/pendistribusian barang tersebut di atas berlaku, baik untuk pemesanan online maupun offline</p>
        </li>
    </ul>
    <br>
    <p>
        PT Meta Fiz Internasional wajib menyediakan sistim pembayaran yang dapat membantu member dalam melakukan proses jual beli
    </p>
    <p>
        Pesanan produk dari seorang Entrepreneur dapat dibayarkan melalui beberapa cara, sbb:
    </p>
    <ul>
        <li>
            Transfer secara Virtual Account.
        </li>
        <li>
            Transfer melalui Bank, Mobile Banking, internet Banking & ATM atau Credit Card.
        </li>
    </ul>
    <br>
    <p>
        Aturan Pengembalian Barang
    </p>
    <p>
        PT Meta Fiz Internasional wajib menyediakan prosedur tentang produk yang telah dibeli, namun mengalami cacat atau kesalahan produksi dapat dikembalikan kepada perusahaan dengan mekanisme, sbb:
    </p>
    <p>
        Melaporkan secara tertulis tentang kondisi cacat atau kesalahan produksi tersebut dalam waktu 2x24 jam setelah produk diterima. 
    </p>
    <p>
        Melampirkan foto dan video dari produk tersebut bersamaan dengan pengajuan laporan.
    </p>
    <p>
        Mendapatkan penggantian produk yang sama atau produk lain senilai produk tersebut tanpa dikenakan biaya pengiriman.
    </p>
    <br>
    <p>
        Seorang Entrepreneur dianjurkan untuk memasarkan Produk dan Jasa kami secara langsung kepada calon pelanggan, baik melalui tatap muka secara offline ataupun online melalui sosial media, seperti Facebook, Instagram, dll. 
    </p>
    <p>
        Jaminan Kualitas Produk, kami memberikan tenggang waktu kepada Konsumen untuk mengembalikan produk yang sudah dibeli dengan jangka waktu 7 (tujuh) hari kerja terhitung sejak barang diterima, apabila ternyata produk tersebut tidak sesuai dengan kualitas yang janjikan baik dari segi fungsi maupun manfaatnya. Jaminan ini tidak berlaku untuk produk yang dirusak dengan sengaja, disalahgunakan atau disimpan di tempat yang salah (tidak sesuai dengan ketentuan yang berlaku seperti menyimpan produk di tempat yang terkena sinar matahari secara langsung). 
    </p>
    <p>
        Untuk barang Elektronik, kami memberikan garansi 12 bulan untuk kerusakan yang sifatnya bukan disebabkan penggunaan diluar spesifikasi produk, kesalahan penggunaan atau tidak sesuai dengan petunjuk penggunaan, terjatuh, tegangan arus listrik, pecah/retak akibat tekanan, kesalahan penyimpanan, tergores, berkarat, terkena noda, berjamur, cairan kimia, binatang, huru-hara, bencana alam (gempa bumi, kilat, banjir, kebakaran, dll), dengan mengikuti prosedur claim graransi yang berlaku.
    </p>
    <p>
        Jaminan Pembelian kembali, seorang Entrepreneur yang mengundurkan diri atau diberhentikan oleh Perusahaan, dapat mengembalikan sisa produk yang belum terjual kepada Perusahaan dalam kondisi baik dan layak jual termasuk bahan-bahan promosi, alat bantu penjualan. Perusahaan akan membeli kembali produk, bahan promosi (brosur, katalog, atau leaflet) dan alat bantu penjualan (starter kit) yang dalam kondisi layak jual dengan harga senilai harga pembelian awal dengan dikurangi biaya administrasi maksimal 10% (sepuluh persen) dan dipotong juga setiap manfaat/bonus yang telah diterima oleh Entrepreneur berkaitan dengan pembelian produk yang akan dikembalikan dengan syarat dan ketentuan dari perusahaan seperti bukti invoice pembelian.
    </p>
</div>

<!-- Footer -->
<?php include 'homepageFooter.php' ?>
<script>
    
</script>
</body>

<?php include 'backToTop.php' ?>

<?php
include 'sharejs.php';
$_SESSION["stopRecord"] = 1;
?>

</html>

<!-- <div class="modal fade successModal" id="successFundIn" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" style="display: none;" aria-modal="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <span class="modal-title"><?php echo $translations['M00451'][$language]; //Congratulations ?></span>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <div class="modalLine"></div>
            <div class="modal-body modalBodyFont">
                <div id="canvasAlertMessage"><?php echo $translations['M00033'][$language]; //You has successful fund in ?></div>
            </div>
            <div class="modal-footer">
                <button id="closeBtn" type="button" class="btn btnDefaultModal" data-dismiss="modal"><?php echo $translations['M00112'][$language]; //Close ?></button>
            </div>
        </div>
    </div>
</div> -->



<script>

</script>