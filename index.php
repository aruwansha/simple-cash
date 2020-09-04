<?php
require_once('includes/Database.php');
require_once('includes/koneksi.php');
require_once('includes/kas.php');
$connection = new Database($host, $username, $password, $database);
$kas = new Kas($connection);
$simpananSekarang = $kas->tampilkanSimpanan()->fetch_object()->nominal;
$saldoSekarang = $kas->tampilkanSaldo()->fetch_object()->total_saldo;
include "navbar.php";
?>

<section>
    <div class="container">
        <h1>Saldo sekarang: Rp <?= number_format($saldoSekarang) ?></h1>
        <h4>Simpanan: Rp <?= number_format($simpananSekarang) ?></h4>
        <div class="form">
            <form action="includes/kas-aksi.php" method="POST">
                <label for="pemasukkan">Pemasukkan: </label><br>
                <input type="number" name="masuk"><br>
                <label for="pemasukkan">Pengeluaran/Simpanan: </label><br>
                <input type="number" name="keluar"><br>
                <button type="submit" name="submit">Submit</button>
            </form>
        </div>
    </div>
</section>

<section>
    <div class="container">
        <h1>Cara Penggunaan:</h1>
        <ol class="list">
            <li><b><u>Catat Pendapatan</u></b></li>
            <p>Isi nominal pada kedua field <strong>Pemasukkan</strong> dan <strong>Pengeluaran/Simpanan</strong> lalu tekan tombol submit</p>
            <li><b><u>Catat Pengeluaran</u></b></li>
            <p>Isi nominal pada field <strong>Pengeluaran/Simpanan</strong> lalu tekan tombol submit</p>
        </ol>
    </div>
</section>

<section>
    <div class="container" id="table">
        <?php
        if (isset($_GET['halaman'])) {
            if ($_GET['halaman'] == 'pengeluaran') {
                include "pengeluaran.php";
            } else if ($_GET['halaman'] == 'pendapatan') {
                include "pendapatan.php";
            }
        } else {
            include "pendapatan.php";
        }
        ?>
    </div>
</section>
<?php
include "footer.php"
?>