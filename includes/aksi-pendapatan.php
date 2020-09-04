<?php
include "koneksi.php";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!empty($_POST['masuk']) && !empty($_POST['keluar'])) {
        $pemasukkan = $_POST['masuk'];
        $simpanan = $_POST['keluar'];
        $total = $pemasukkan - $simpanan;
        $storePendapatan = mysqli_query($connection, "INSERT INTO pendapatan (pemasukkan, simpanan, total) 
                                        VALUES ('$pemasukkan', '$simpanan', '$total')") or die(mysqli_error($connection));
        $ambilSimpanan = mysqli_query($connection, "SELECT * FROM simpanan WHERE id=1") or die(mysqli_error($connection));
        $simpananSekarang = $ambilSimpanan->fetch_array();
        $simpananAkhir = $simpananSekarang['nominal'] + $simpanan;
        $storeSimpanan = mysqli_query($connection, "UPDATE simpanan SET nominal='$simpananAkhir' WHERE id=1");
        $ambilSaldo = mysqli_query($connection, "SELECT * FROM saldo WHERE id=1") or die(mysqli_error($connection));
        $saldoSekarang = $ambilSaldo->fetch_array();
        $saldoAkhir = $saldoSekarang['total_saldo'] + $total;
        $storeSaldo = mysqli_query($connection, "UPDATE saldo SET total_saldo='$saldoAkhir' WHERE id='1'");
    } else if (empty($_POST['masuk']) && !empty($_POST['keluar'])) {
        $pengeluaran = $_POST['keluar'];
        $storePengeluaran = mysqli_query($connection, "INSERT INTO pengeluaran (nominal) 
                                            VALUES ('$pengeluaran')") or die(mysqli_error($connection));
        $ambilSaldo = mysqli_query($connection, "SELECT * FROM saldo WHERE id=1") or die(mysqli_error($connection));
        $saldoSekarang = $ambilSaldo->fetch_array();
        $saldoAkhir = $saldoSekarang['total_saldo'] - $pengeluaran;
        $storeSaldo = mysqli_query($connection, "UPDATE saldo SET total_saldo='$saldoAkhir' WHERE id='1'");
    }
} else { }

if (@$storeSaldo) {
    echo
        "<script>
            alert('Data berhasil diproses');    
            window.location.href='../index.php';
        </script>";
} else {
    echo
        "<script>
            alert('Isi field dahulu');    
            window.location.href='../index.php';
        </script>";
}
