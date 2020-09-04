<?php
require_once('Database.php');
require_once('koneksi.php');
require_once('kas.php');
$connection = new Database($host, $username, $password, $database);
$kas = new Kas($connection);
$simpananSekarang = $kas->tampilkanSimpanan()->fetch_object()->nominal;
$saldoSekarang = $kas->tampilkanSaldo()->fetch_object()->total_saldo;
if (isset($_POST['submit'])) {
    if (!empty($_POST['masuk']) && !empty($_POST['keluar'])) {
        $pemasukkan = $connection->connection->real_escape_string($_POST['masuk']);
        $simpanan = $connection->connection->real_escape_string($_POST['keluar']);
        $total = $pemasukkan - $simpanan;
        $tambahPendapatan = $kas->tambahPendapatan($pemasukkan, $simpanan, $total);
        $totalSaldo = $saldoSekarang + $total;
        $hitungSaldo = $kas->hitungSaldo($totalSaldo);
        $totalSimpanan = $simpananSekarang + $simpanan;
        $hitungSimpanan = $kas->hitungSimpanan($totalSimpanan);
    } else if (empty($_POST['masuk']) && !empty($_POST['keluar'])) {
        $pengeluaran = $connection->connection->real_escape_string($_POST['keluar']);
        $tambahPengeluaran = $kas->tambahPengeluaran($pengeluaran);
        $saldoAkhir = $saldo - $pengeluaran;
        $hitungSaldo = $kas->hitungSaldo($saldoAkhir);
    } else {
        echo "<script>alert('Isi data dahulu!');window.location.href='../index.php';</script>";
    }
}
echo "<script>alert('Data berhasil diproses');window.location.href='../index.php';</script>";
