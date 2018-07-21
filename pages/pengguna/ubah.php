

<?php
    // GET DATA UNTUK DI EDIT
    $id = $_GET['id'];

    $sql2 = $koneksi->query("SELECT * FROM tb_pengguna WHERE id_pengguna = '$id'");
    $tampil = $sql2->fetch_assoc();

    $level = $tampil['hak_akses'];

?>



<div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                UBAH PENGGUNA
                                <small>Form tambah barang</small>
                            </h2>
                    
                            </div>
                        <div class="body">

                            <form method="POST" enctype="multipart/form-data">

                                    <label for="">Nama</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" name="nama" value="<?= $tampil['nama']; ?>" class="form-control"  />
                                        </div>
                                    </div>

                                    <label for="">Username</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" name="username" value="<?= $tampil['username']; ?>" class="form-control"  />
                                        </div>
                                    </div>

                                    
                                    
                                    <label for="">Level</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                    <select name="hak_akses" class="form-control show-tick">
                                    <option value="admin" <?php if ($level=='admin') { echo "selected"; } ?> >admin</option>
                                        <option value="kasir" <?php if ($level=='kasir') { echo "selected"; } ?> >kasir</option>
                                   
                                    </select>
                                        </div>
                                     </div>

                                     <label for="">Foto</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <img src="images/<?= $tampil['foto']; ?>" width="100" height="100" alt="">
                                        </div>
                                    </div>

                                    <label for="">Ganti Foto</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="file" name="foto" class="form-control">
                                        </div>
                                    </div>


                                <input type="submit" name="simpan" value="simpan" class="btn btn-primary">

                                    </form>
                              
<?php

if (isset($_POST['simpan'])) {

    $nama = $_POST['nama'];
    $username = $_POST['username'];
    $hak_akses = $_POST['hak_akses'];
    $foto = $_FILES['foto']['name'];
    $lokasi = $_FILES['foto']['tmp_name'];
    

    if (!empty($lokasi)) { // JIKA FOTO FILE FOTO TIDAK KOSONG(PILIH FILE) DIGANTI FOTO, MAKA JALANKAN PERINTAH DIBAWAH DAN FOTO TERGANTI

        $upload = move_uploaded_file($lokasi, "images/".$foto);
        
        $sql = $koneksi->query("UPDATE tb_pengguna set nama='$nama', username='$username', hak_akses='$hak_akses', foto='$foto' WHERE id_pengguna='$id'");


 
if ($sql) {
    ?>

    <script>
        alert("Data berhasil diubah");
        window.location.href="?pages=pengguna";
    </script>

    <?php
}

} else { // JIKA TIDAK DI GANTI ATAU FILE FOTO TIDAK DI ISI, MAKA JALANKAN QUERY DIBAWAH, ENGAN DEMIKIAN FOTO LAMA AKAN TETAP SAMA
    
        
        $sql = $koneksi->query("UPDATE tb_pengguna set nama='$nama', username='$username', hak_akses='$hak_akses' WHERE id_pengguna='$id'");

        if ($sql) {
            ?>
        
            <script>
                alert("Data berhasil diubah");
                window.location.href="?pages=pengguna";
            </script>
        
            <?php
        }
}
}

?>
