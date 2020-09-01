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
            $sql = mysqli_query($connection, 'SELECT * FROM pengeluaran');
            $cek = $sql->num_rows;
            if ($cek < 1) {
                echo "<td colspan='7' align='center' style='padding:10px;'>Data masih kosong</td>";
            }
            while ($pengeluaran = $sql->fetch_array()) {
                ?>
                <tr>
                    <td><?= $no ?></td>
                    <td><?= date('d F y', strtotime($pengeluaran['tanggal'])) ?></td>
                    <td>Rp <?= number_format($pengeluaran['nominal']) ?></td>
                </tr>
            <?php $no = $no + 1;
            } ?>
        </tbody>
    </table>
</div>