<script> // INI FUNGSI UNTUK OPERATOR MATEMATIKA MENGHITUNG PROFIT DARI HARGA BELI DAN HARGA JUAL
    function sum(){
        var harga_beli = document.getElementById('harga_beli').value;
        var harga_jual = document.getElementById('harga_jual').value;
        var hasil = parseInt(harga_jual) - parseInt(harga_beli);
        if (!isNaN(hasil)) {
            document.getElementById('profit').value = hasil;
        }

    }

</script>

<?php
    // GET DATA UNTUK DI EDIT
    $kode_barang = $_GET['id'];

    $sql = $koneksi->query("SELECT * FROM tb_barang WHERE kode_barcode = '$kode_barang'");
    $hasil = $sql->fetch_assoc();


    $satuan = $hasil['satuan'];

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
                                    <label for="">Kode Barcode</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" name="kode" value="<?= $hasil['kode_barcode']; ?>" class="form-control" placeholder="Kode Barcode..." />
                                        </div>
                                    </div>
                                    <label for="">Nama Barang</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" name="nama" value="<?= $hasil['nama_barang']; ?>" class="form-control" placeholder="Nama Barang..." />
                                        </div>
                                    </div>
                                    <label for="">Satuan</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                    <select name="satuan" class="form-control show-tick">
                                        
                                        <option value="PCS" <?php if ($satuan=='PCS') { echo "selected"; } ?> >PCS</option>
                                        <option value="PACK" <?php if ($satuan=='PACK') { echo "selected"; } ?> >PACK</option>
                                        <option value="LUSIN" <?php if ($satuan=='LUSIN') { echo "selected"; } ?> >LUSIN</option>
                                    </select>
                                </div>
                                </div>

                                    <label for="">Stok</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="number" name="stok" value="<?= $hasil['stok']; ?>" class="form-control" placeholder="Stok Barang..." />
                                        </div>
                                    </div>

                                    <label for="">Harga Beli</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="number" name="beli" id="harga_beli"  onkeyup="sum()" value="<?= $hasil['harga_beli']; ?>" class="form-control" placeholder="Harga Beli.." />
                                        </div>
                                    </div>

                                     <label for="">Harga Jual</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="number" name="jual" id="harga_jual" value="<?= $hasil['harga_jual']; ?>" onkeyup="sum()" class="form-control" placeholder="Harga Jual..." />
                                        </div>
                                    </div>
                                    <label for="">Profit</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="number" name="profit" id="profit" value="<?= $hasil['profit']; ?>" readonly="" style="background-color: #e7e3e9;" value="0" class="form-control" />
                                        </div>
                                    </div>


                                <input type="submit" name="simpan" value="simpan" class="btn btn-primary">

                                    </form>
                              
<?php

if (isset($_POST['simpan'])) {
    $kode = $_POST['kode'];
    $nama = $_POST['nama'];
    $satuan = $_POST['satuan'];
    $stok = $_POST['stok'];
    $beli = $_POST['beli'];
    $jual = $_POST['jual'];
    $profit = $_POST['profit'];


    $sql = $koneksi->query("UPDATE tb_barang SET kode_barcode='$kode', nama_barang='$nama', satuan='$satuan', stok='$stok', harga_beli='$beli', harga_jual='$jual', profit='$profit' WHERE kode_barcode='$kode_barang'");
 
if ($sql) {
    ?>

    <script>
        alert("Data berhasil diubah");
        window.location.href="?pages=barang";
    </script>

    <?php
}

}

?>
