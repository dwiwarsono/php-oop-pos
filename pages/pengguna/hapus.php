<?php

$id = $_GET['id'];

$sql = $koneksi->query("DELETE FROM tb_pengguna WHERE id_pengguna='$id'");


if ($sql) {
    
    ?>

    <script>
        alert("Data berhasil dihapus");
        window.location.href="?pages=pengguna";
    </script>

<?php } ?>