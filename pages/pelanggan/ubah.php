

<?php
    // GET DATA UNTUK DI EDIT
    $kode_pelanggan = $_GET['id'];

    $sql = $koneksi->query("SELECT * FROM tb_pelanggan WHERE kode_pelanggan = '$kode_pelanggan'");
    $hasil = $sql->fetch_assoc();


?>



<div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                UBAH BARANG
                                <small>Form tambah barang</small>
                            </h2>
                    
                            </div>
                        <div class="body">
                            <form method="POST">
                                    <label for="">Nama Pelanggan</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" name="nama_pelanggan" value="<?= $hasil['nama_pelanggan']; ?>" class="form-control" placeholder="Nama Pelanggan" />
                                        </div>
                                    </div>

                                    <label for="">Alamat Pelanggan</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" name="alamat_pelanggan" value="<?= $hasil['alamat_pelanggan']; ?>" class="form-control" placeholder="Alamat Pelanggan" />
                                        </div>
                                    </div>

                                    <label for="">No Tlp</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="number" name="no_tlp" value="<?= $hasil['no_tlp']; ?>" class="form-control" placeholder="No Tlp" />
                                        </div>
                                    </div>

                                     <label for="">Email Pelanggan</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="email" name="email_pelanggan" value="<?= $hasil['email_pelanggan']; ?>" class="form-control" placeholder="Email Pelanggan" />
                                        </div>
                                    </div>


                                <input type="submit" name="simpan" value="simpan" class="btn btn-primary">

                                    </form>
                              
<?php

if (isset($_POST['simpan'])) {

    $nama_pelanggan = $_POST['nama_pelanggan'];
    $alamat_pelanggan = $_POST['alamat_pelanggan'];
    $no_tlp = $_POST['no_tlp'];
    $email = $_POST['email_pelanggan'];



    $sql = $koneksi->query("UPDATE tb_pelanggan SET nama_pelanggan='$nama_pelanggan', alamat_pelanggan='$alamat_pelanggan', no_tlp='$no_tlp', email_pelanggan='$email' WHERE kode_pelanggan='$kode_pelanggan'");
 
if ($sql) {
    ?>

    <script>
        alert("Data berhasil diubah");
        window.location.href="?pages=pelanggan";
    </script>

    <?php
}

}

?>
