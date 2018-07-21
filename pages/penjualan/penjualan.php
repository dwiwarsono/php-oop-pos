<?php

        $kode = $_GET['kodepenjualan'];


        $kasir = $data['nama'];

?>


<div class="row clearfix">
    <div class="body">
        <form method="POST">
        <!-- <label for="">Kode Barcode</label> -->
            <div class="col-md-2">
                <input type="text" name="kode_penjualan" value="<?= $kode; ?>" class="form-control" readonly="" />
            </div>

            <div class="col-md-2">
                <input type="text" name="barcode"  class="form-control" autofocus />
            </div>

            <div class="col-md-2">
            <input type="submit" name="simpan" value="Tambahkan" class="btn btn-primary">
            </div>
        </form>
    </div>
</div>


<?php

    if (isset($_POST['simpan'])) {
        
        $date = date("Y-m-d");
        $kode_jual = $_POST['kode_penjualan'];
        $barcode = $_POST['barcode'];

        $barang = $koneksi->query("SELECT * FROM tb_barang WHERE kode_barcode='$barcode'");

        $data_barang = $barang->fetch_assoc();

        $harga_jual = $data_barang['harga_jual'];

        $jumlah = 1;

        $total = $jumlah * $harga_jual;

        $barang2 = $koneksi->query("SELECT * FROM tb_barang WHERE kode_barcode='$barcode'");

        while ($data_barang2 = $barang2->fetch_assoc()) {
            $sisa = $data_barang2['stok'];

            if ($sisa == 0) {
                ?>

                <script>
                alert("Stok barang habis, tidak dapat melakukan penjualan");
                window.location.href="?pages=penjualan&kodepenjualan=<?= $kode;?>"
                </script>
                
                
                <?php
            }
            else {
                $koneksi->query("INSERT INTO tb_penjualan (kode_penjualan, kode_barcode, jumlah, total, tgl_penjualan) VALUES ('$kode_jual', '$barcode', '$jumlah', '$total', '$date')");
            }
        }
    }

?>



<br><br><br><br>
<form method="POST">

<div class="col-md-2">
    <label for="">Pelanggan</label>
    <select name="pelanggan" id="" class="form-control show-tick">
        <?php 
            $pelanggan = $koneksi->query("SELECT * FROM tb_pelanggan ORDER BY kode_pelanggan");
            while ($d_pelanggan=$pelanggan->fetch_assoc()) {
                echo "
                <option value='$d_pelanggan[kode_pelanggan]'>$d_pelanggan[nama_pelanggan]</option>
                
                ";
            }

        ?>
    </select>
</div>

<br><br><br><br><br>
<div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                DAFTAR BELANJAAN
                            </h2>
                            
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Kode Barcode</th>
                                            <th>Nama Barang</th>
                                            <th>Harga</th>
                                            <th>Jumlah</th>
                                            <th>Total</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>

                                
                                    <tbody>

                                    <?php

                                        $no = 1;
                                        $sql = $koneksi->query("SELECT * FROM tb_penjualan, tb_barang WHERE
                                                                tb_penjualan.kode_barcode=tb_barang.kode_barcode AND kode_penjualan='$kode'");
                                        while ($data = $sql->fetch_assoc()) : ?>
                                            
                                        
                                    
                                        <tr>
                                            <td><?= $no++; ?></td>
                                            
                                            <td><?= $data ['kode_barcode']; ?></td>
                                            <td><?= $data ['nama_barang']; ?></td>
                                            <td><?= $data ['harga_jual']; ?></td>
                                            <td><?= $data ['jumlah']; ?></td>
                                            <td><?= $data ['total']; ?></td>
                                            <td>
                                                <a href="?pages=pelanggan&aksi=ubah&id=<?= $data['kode_pelanggan']; ?>" class="btn btn-success">Tambah</a>
                                                <a href="?pages=pelanggan&aksi=ubah&id=<?= $data['kode_pelanggan']; ?>" class="btn btn-success">Kurang</a>
                                                <a onclick="return confirm('Apakah Anda Yakin Akan Menghapus?')" href="?pages=pelanggan&aksi=hapus&id=<?= $data['kode_pelanggan']; ?>"  class="btn btn-warning">Hapus</a>
                                            </td>
                                        </tr>

                                        <?php 
                                        
                                            $total_bayar = $total_bayar+$data['total'];
                                    
                                            endwhile;
                                        
                                        
                                        
                                        ?>
                                    
                                    </tbody>

                                    <tr>
                                        <th colspan="5" style="text-align: right;">Total</th>
                                        <td><input type="number" style="text-align: right;" name="total_bayar" id="total_bayar" onkeyup="hitung();" readonly="" value="<?= $total_bayar; ?>"></td>
                                    
                                    </tr>


                                    <tr>
                                        <th colspan="5" style="text-align: right;">Diskon</th>
                                        <td><input type="number" style="text-align: right;" onkeyup="hitung();" name="diskon" id="diskon" ></td>
                                    
                                    </tr>

                                    <tr>
                                        <th colspan="5" style="text-align: right;">Potongan Diskon</th>
                                        <td><input type="number" style="text-align: right;" name="potongan" id="potongan" ></td>
                                    
                                    </tr>
                                    <tr>
                                        <th colspan="5" style="text-align: right;">Sub Total</th>
                                        <td><input type="number" style="text-align: right;" name="s_total" id="s_total" ></td>
                                    
                                    </tr>
                                    <tr>
                                        <th colspan="5" style="text-align: right;">Bayar</th>
                                        <td><input type="number" style="text-align: right;" onkeyup="hitung();"name="bayar" id="bayar" ></td>
                                    
                                    </tr>
                                    <tr>
                                        <th colspan="5" style="text-align: right;">Kembali</th>
                                        <td><input type="number" style="text-align: right;" name="kembali" id="kembali" >
                                        
                                        <input type="submit" name="simpan_pj" value="Cetak Struk" class="btn btn-info" onclick="window.open('pages/penjualan/struk.php?kode_pjl=<?= $kode; ?>&kasir=<?= $kasir; ?>','mywindow', 'width=600px, height=600px, left=300px;')">
                                        
                                        </td>
                                    
                                    </tr>
                                </table>
                                </div>


                    </form>



<?php


    if (isset($_POST['simpan_pj'])) {
        $pelanggan=$_POST['pelanggan'];
        $total_bayar = $_POST['total_bayar'];
        $diskon = $_POST['diskon'];
        $potongan = $_POST['potongan'];
        $s_total= $_POST['s_total'];
        $bayar = $_POST['bayar'];
        $kembali = $_POST['kembali'];


        $koneksi->query("INSERT INTO tb_detail_penjualan(kode_penjualan, bayar, kembali, diskon, potongan, total) VALUES('$kode','$bayar', '$kembali', '$diskon', '$potongan', '$s_total')");

        $koneksi->query("UPDATE tb_penjualan SET kode_pelanggan='$pelanggan' WHERE kode_penjualan='$kode'");
    }


?>




<script type="text/javascript">
    
    function hitung(){

    var total_bayar = document.getElementById('total_bayar').value;

    var diskon = document.getElementById('diskon').value;

    var diskon_pot = parseInt(total_bayar) * parseInt(diskon) / parseInt(100);
    if ( !isNaN(diskon_pot)) {

        var potongan = document.getElementById('potongan').value = diskon_pot;
    }

    var sub_total = parseInt(total_bayar) - parseInt(potongan);
    if ( !isNaN(sub_total)) {

        var s_total = document.getElementById('s_total').value = sub_total;
    }

    var bayar = document.getElementById('bayar').value;
    var bayar_belanja = parseInt(bayar) - parseInt(s_total);
    if ( !isNaN(bayar_belanja)) {

        document.getElementById('kembali').value = bayar_belanja;
    }
    }
</script> 