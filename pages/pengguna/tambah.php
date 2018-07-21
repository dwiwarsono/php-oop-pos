
<div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                TAMBAH PENGGUNA
                                <small>Form tambah Pengguna</small>
                            </h2>
                    
                        </div>
                        <div class="body">
                            <form method="POST" enctype="multipart/form-data"> <!--enctype="multipart/form-data" jika kita mengupload file ini wajib di gunakan -->
                                    <label for="">Nama Pengguna</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" name="nama" class="form-control" placeholder="Nama Pengguna" />
                                        </div>
                                    </div>

                                    <label for="">Username</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" name="username" class="form-control" placeholder="..............." />
                                        </div>
                                    </div>

                                    <label for="">Password</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="password" name="pass" class="form-control" placeholder="..............." />
                                        </div>
                                    </div>

                                      <label for="">Level</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                    <select name="level" class="form-control show-tick">
                                        <option value="">Pilih Level</option>
                                        <option value="admin">Admin</option>
                                        <option value="kasir">Kasir</option>
                                    </select>
                                        </div>
                                     </div>
                                    
                                     <label for="">Foto</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="file" name="foto" class="form-control" placeholder="..............." />
                                        </div>
                                    </div>

                                <input type="submit" name="simpan" value="simpan" class="btn btn-primary">

                                    </form>
                              
<?php

if (isset($_POST['simpan'])) {

    $nama = $_POST['nama'];
    $user = $_POST['username'];
    $pass = $_POST['pass'];
    $level = $_POST['level'];

    $foto = $_FILES['foto']['name'];
    $lokasi = $_FILES['foto']['tmp_name'];
    $upload = move_uploaded_file($lokasi, "images/".$foto);


    if ($upload) {
       
    


    $sql = $koneksi->query("INSERT INTO tb_pengguna (nama, username, pass, hak_akses, foto) VALUES ('$nama', '$user', '$pass', '$level', '$foto')");
 
if ($sql) {
    ?>

    <script>
        alert("Data berhasil ditambahkan");
        window.location.href="?pages=pengguna";
    </script>

    <?php
}
}
}

?>
