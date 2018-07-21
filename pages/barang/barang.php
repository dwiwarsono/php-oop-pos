<div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                DATA BARANG
                            </h2>
                            
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Kode Barcode</th>
                                            <th>Nama Barang</th>
                                            <th>Satuan</th>
                                            <th>Stok</th>
                                            <th>Harga Beli</th>
                                            <th>Harga Jual</th>
                                            <th>Profit</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>

                                
                                    <tbody>

                                    <?php

                                        $no = 1;
                                        $sql = $koneksi->query('SELECT * FROM tb_barang');
                                        while ($data = $sql->fetch_assoc()) : ?>
                                            
                                        
                                    
                                        <tr>
                                            <td><?= $no++; ?></td>
                                            <td><?= $data ['kode_barcode']; ?></td>
                                            <td><?= $data ['nama_barang']; ?></td>
                                            <td><?= $data ['satuan']; ?></td>
                                            <td><?= $data ['stok']; ?></td>
                                            <td><?= $data ['harga_beli']; ?></td>
                                            <td><?= $data ['harga_jual']; ?></td>
                                            <td><?= $data ['profit']; ?></td>
                                            <td>
                                                <a href="?pages=barang&aksi=ubah&id=<?= $data['kode_barcode']; ?>" class="btn btn-success">Ubah</a>
                                                <a onclick="return confirm('Apakah Anda Yakin Akan Menghapus?')" href="?pages=barang&aksi=hapus&id=<?= $data['kode_barcode']; ?>"  class="btn btn-warning">Hapus</a>
                                            </td>
                                        </tr>
                                        <?php endwhile; ?>
                                    
                                    </tbody>
                                     
                                </table>
                                <a href="?pages=barang&aksi=tambah" class="btn btn-primary">Tambah</a> <!-- aksi=tambah get yang dari index.php -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>