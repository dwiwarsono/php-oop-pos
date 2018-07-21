<?php

$kode_pelanggan = $_GET['id'];

$sql = $koneksi->query("DELETE FROM tb_pelanggan WHERE kode_pelanggan = '$kode_pelanggan'");


if ($sql) : ?>

<script>
        alert("Data berhasil dihapus");
        window.location.href="?pages=pelanggan";
    </script>

<?php endif; ?>