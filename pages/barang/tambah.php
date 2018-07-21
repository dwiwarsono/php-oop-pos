<script>
    function sum(){
        var harga_beli = document.getElementById('harga_beli').value;
        var harga_jual = document.getElementById('harga_jual').value;
        var hasil = parseInt(harga_jual) - parseInt(harga_beli);
        if (!isNaN(hasil)) {
            document.getElementById('profit').value = hasil;
        }

    }

</script>





<div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                TAMBAH BARANG
                                <small>Form tambah barang</small>
                            </h2>
                    
                        </div>
                        <div class="body">
                            <form method="POST">
                                    <label for="">Kode Barcode</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" name="kode" class="form-control" placeholder="Kode Barcode..." />
                                        </div>
                                    </div>
                                    <label for="">Nama Barang</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" name="nama" class="form-control" placeholder="Nama Barang..." />
                                        </div>
                                    </div>
                                    <label for="">Satuan</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                    <select name="satuan" class="form-control show-tick">
                                        <option value="">Pilih Satuan</option>
                                        <option value="PCS">PCS</option>
                                        <option value="PACK">PACK</option>
                                        <option value="LUSIN">LUSIN</option>
                                    </select>
                                        </div>
                                     </div>

                                    <label for="">Stok</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="number" name="stok" class="form-control" placeholder="Stok Barang..." />
                                        </div>
                                    </div>

                                    <label for="">Harga Beli</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="number" name="beli" id="harga_beli"  onkeyup="sum()" class="form-control" placeholder="Harga Beli.." />
                                        </div>
                                    </div>

                                     <label for="">Harga Jual</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="number" name="jual" id="harga_jual" onkeyup="sum()" class="form-control" placeholder="Harga Jual..." />
                                        </div>
                                    </div>
                                    <label for="">Profit</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="number" name="profit" id="profit" readonly="" style="background-color: #e7e3e9;" value="0" class="form-control" />
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


    $sql = $koneksi->query("INSERT INTO tb_barang VALUES('$kode', '$nama', '$satuan', '$stok', '$beli', '$jual', '$profit')");
 
if ($sql) {
    ?>

    <script>
        alert("Data berhasil ditambahkan");
        window.location.href="?pages=barang";
    </script>

    <?php
}

}

?>
