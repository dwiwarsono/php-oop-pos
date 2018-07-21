<?php

$host ="localhost";
$user = "root";
$pass = "";
$db = "db_pos";

$koneksi = new mysqli ($host, $user, $pass, $db);

            $kasir = $_GET['kasir'];

            $kode_pj = $_GET['kode_pjl'];


?>


<h4>Struk Belanja</h4>

<table>
    <tr>
        <td>Toko Serba Ada</td>
    </tr>

    <tr>
        <td>Jl. Cigagak No. 56 Cipadung, Cibiru Kota Bandung</td>
    </tr>
</table>

<table>

    <?php

    $sql = $koneksi->query("SELECT * FROM tb_penjualan, tb_pelanggan WHERE tb_penjualan.kode_pelanggan=tb_pelanggan.kode_pelanggan AND kode_penjualan='$kode_pj'");

    $tampil = $sql->fetch_assoc();

    ?>
    <tr>
        <td>Kode Penjualan &nbsp&nbsp</td>
        <td>: &nbsp&nbsp <?= $tampil['kode_penjualan']; ?></td>
    </tr>

      <tr>
        <td>Tanggal &nbsp&nbsp</td>
        <td>: &nbsp&nbsp <?= $tampil['tgl_penjualan']; ?></td>
    </tr>

    <tr>
        <td>Pelanggan &nbsp&nbsp</td>
        <td>: &nbsp&nbsp <?= $tampil['nama_pelanggan']; ?></td>
    </tr>

      <tr>
        <td>Nama Kasir &nbsp&nbsp</td>
        <td>: &nbsp&nbsp <?= $kasir; ?></td>
    </tr>
</table>