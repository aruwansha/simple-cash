<h1>Tabel Pendapatan</h1>
<a href="index.php?halaman=pengeluaran">
    <h5>Tabel Pengeluaran</h5>
</a>
<div class="wrapper">
    <table class="table">
        <thead>
            <tr>
                <th>No.</th>
                <th>Tanggal</th>
                <th>Pemasukkan</th>
                <th>Simpanan</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $no = 1;
            $pendapatan = $kas->tampilkanPendapatan();
            $cek = $pendapatan->num_rows;
            if ($cek < 1) {
                echo "<td colspan='7' align='center' style='padding:10px;'>Data masih kosong</td>";
            }
            while ($data = $pendapatan->fetch_array()) {
                ?>
                <tr>
                    <td><?= $no ?></td>
                    <td><?= date('d F y', strtotime($data['tanggal'])) ?></td>
                    <td>Rp <?= number_format($data['pemasukkan']) ?></td>
                    <td>Rp <?= number_format($data['simpanan']) ?></td>
                    <td>Rp <?= number_format($data['total']) ?></td>
                </tr>
            <?php $no = $no + 1;
            } ?>
        </tbody>
    </table>
</div>