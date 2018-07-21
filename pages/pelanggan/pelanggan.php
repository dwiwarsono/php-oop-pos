<div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                DATA PELANGGAN
                            </h2>
                            
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Pelanggan</th>
                                            <th>ALamat</th>
                                            <th>No Tlp</th>
                                            <th>Email</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>

                                
                                    <tbody>

                                    <?php

                                        $no = 1;
                                        $sql = $koneksi->query('SELECT * FROM tb_pelanggan');
                                        while ($data = $sql->fetch_assoc()) : ?>
                                            
                                        
                                    
                                        <tr>
                                            <td><?= $no++; ?></td>
                                            
                                            <td><?= $data ['nama_pelanggan']; ?></td>
                                            <td><?= $data ['alamat_pelanggan']; ?></td>
                                            <td><?= $data ['no_tlp']; ?></td>
                                            <td><?= $data ['email_pelanggan']; ?></td>
                                            <td>
                                                <a href="?pages=pelanggan&aksi=ubah&id=<?= $data['kode_pelanggan']; ?>" class="btn btn-success">Ubah</a>
                                                <a onclick="return confirm('Apakah Anda Yakin Akan Menghapus?')" href="?pages=pelanggan&aksi=hapus&id=<?= $data['kode_pelanggan']; ?>"  class="btn btn-warning">Hapus</a>
                                            </td>
                                        </tr>
                                        <?php endwhile; ?>
                                    
                                    </tbody>
                                     
                                </table>
                                <a href="?pages=pelanggan&aksi=tambah" class="btn btn-primary">Tambah</a> <!-- aksi=tambah get yang dari index.php -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>