<?php

$kode_barang = $_GET['id'];

$sql = $koneksi->query("DELETE FROM tb_barang WHERE kode_barcode = '$kode_barang'");


if ($sql) : ?>

<script>
        alert("Data berhasil dihapus");
        window.location.href="?pages=barang";
    </script>

<?php endif; ?>