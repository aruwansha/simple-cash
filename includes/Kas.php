<?php
class Kas
{
    private $mysqli;

    function __construct($connection)
    {
        $this->mysqli = $connection;
    }

    public function tampilkanPendapatan()
    {
        $database = $this->mysqli->connection;
        $sql_query = "SELECT * FROM pendapatan";
        $query = $database->query($sql_query) or die($database->error);
        return $query;
    }

    public function tambahPendapatan($pemasukkan, $simpanan, $total)
    {
        $database = $this->mysqli->connection;
        $sql_query = "INSERT INTO pendapatan (pemasukkan, simpanan, total)
                        VALUES ('$pemasukkan', '$simpanan', '$total')";
        $query = $database->query($sql_query) or die($database->error);
        return $query;
    }

    public function tampilkanSimpanan()
    {
        $database = $this->mysqli->connection;
        $sql_query = "SELECT * FROM simpanan WHERE id=1";
        $query = $database->query($sql_query) or die($database->error);
        return $query;
    }

    public function hitungSimpanan($nominal)
    {
        $database = $this->mysqli->connection;
        $sql_query = "UPDATE simpanan SET nominal='$nominal' WHERE id=1";
        $query = $database->query($sql_query) or die($database->error);
        return $query;
    }

    public function tampilkanSaldo()
    {
        $database = $this->mysqli->connection;
        $sql_query = "SELECT * FROM saldo WHERE id=1";
        $query = $database->query($sql_query) or die ($database->error);
        return $query;
    }

    public function hitungSaldo($saldo)
    {
        $database = $this->mysqli->connection;
        $sql_query = "UPDATE saldo SET total_saldo='$saldo' WHERE id=1";
        $query = $database->query($sql_query) or die ($database->error);
        return $query;
    }

    public function tampilkanPengeluaran()
    {
        $database = $this->mysqli->connection;
        $sql_query = "SELECT * FROM pengeluaran";
        $query = $database->query($sql_query) or die($database->error);
        return $query;
    }

    public function tambahPengeluaran($nominal)
    {
        $database = $this->mysqli->connection;
        $sql_query = "INSERT INTO pengeluaran (nominal) VALUES ('$nominal')";
        $query = $database->query($sql_query) or die($database->error);
        return $query;
    }
}

?>