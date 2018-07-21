
<div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                TAMBAH Pelanggan
                                <small>Form tambah pelanggan</small>
                            </h2>
                    
                        </div>
                        <div class="body">
                            <form method="POST">
                                    <label for="">Nama Pelanggan</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" name="nama_pelanggan" class="form-control" placeholder="Nama Pelanggan" />
                                        </div>
                                    </div>

                                    <label for="">Alamat Pelanggan</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" name="alamat_pelanggan" class="form-control" placeholder="Alamat Pelanggan" />
                                        </div>
                                    </div>

                                    <label for="">No Tlp</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="number" name="no_tlp" class="form-control" placeholder="No Tlp" />
                                        </div>
                                    </div>

                                     <label for="">Email Pelanggan</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="email" name="email_pelanggan" class="form-control" placeholder="Email Pelanggan" />
                                        </div>
                                    </div>
                                    


                                <input type="submit" name="simpan" value="simpan" class="btn btn-primary">

                                    </form>
                              
<?php

if (isset($_POST['simpan'])) {

    $nama_pelanggan = $_POST['nama_pelanggan'];
    $alamat = $_POST['alamat_pelanggan'];
    $no_tlp = $_POST['no_tlp'];
    $email = $_POST['email_pelanggan'];


    $sql = $koneksi->query("INSERT INTO tb_pelanggan (nama_pelanggan, alamat_pelanggan, no_tlp, email_pelanggan) VALUES ('$nama_pelanggan', '$alamat', '$no_tlp', '$email')");
 
if ($sql) {
    ?>

    <script>
        alert("Data berhasil ditambahkan");
        window.location.href="?pages=pelanggan";
    </script>

    <?php
}

}

?>
