<?php
include "includes/koneksi.php";
include "navbar.php";
$ambilSaldo = mysqli_query($connection, "SELECT * FROM saldo WHERE id=1") or die(mysqli_error($connection));
$saldo = $ambilSaldo->fetch_array()['total_saldo'];
$ambilSimpanan = mysqli_query($connection, "SELECT * FROM simpanan WHERE id=1") or die(mysqli_error($connection));
$simpanan = $ambilSimpanan->fetch_array()['nominal'];
?>

<section>
    <div class="container">
        <h1>Saldo sekarang: Rp <?= number_format($saldo) ?></h1>
        <h4>Simpanan: Rp <?= number_format($simpanan) ?></h4>
        <div class="form">
            <form action="includes/aksi-pendapatan.php" method="POST">
                <label for="pemasukkan">Pemasukkan: </label><br>
                <input type="number" name="masuk"><br>
                <label for="pemasukkan">Pengeluaran/Simpanan: </label><br>
                <input type="number" name="keluar"><br>
                <button type="submit">Submit</button>
            </form>
        </div>
    </div>
</section>

<section>
    <div class="container">
        <h1>Nb:</h1>
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