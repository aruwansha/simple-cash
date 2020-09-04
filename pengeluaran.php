<h1>Tabel Pengeluaran</h1>
<a href="index.php?halaman=pendapatan">
    <h5>Tabel Pendapatan</h5>
</a>
<div class="wrapper">
    <table class="table">
        <thead>
            <tr>
                <th>No.</th>
                <th>Tanggal</th>
                <th>Pengeluaran</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $no = 1;
            $pengeluaran = $kas->tampilkanPengeluaran();
            $cek = $pengeluaran->num_rows;
            if ($cek < 1) {
                echo "<td colspan='7' align='center' style='padding:10px;'>Data masih kosong</td>";
            }
            while ($data = $pengeluaran->fetch_array()) {
                ?>
                <tr>
                    <td><?= $no ?></td>
                    <td><?= date('d F y', strtotime($data['tanggal'])) ?></td>
                    <td>Rp <?= number_format($data['nominal']) ?></td>
                </tr>
            <?php $no = $no + 1;
            } ?>
        </tbody>
    </table>
</div>