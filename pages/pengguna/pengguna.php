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
                                            <th>Nama Pengguna</th>
                                            <th>Username</th>
                                            <th>Password</th>
                                            <th>Level</th>
                                            <th>Foto</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>

                                
                                    <tbody>

                                    <?php

                                        $no = 1;
                                        $sql = $koneksi->query('SELECT * FROM tb_pengguna');
                                        while ($data = $sql->fetch_assoc()) : ?>
                                            
                                        
                                    
                                        <tr>
                                            <td><?= $no++; ?></td>
                                            
                                            <td><?= $data ['nama']; ?></td>
                                            <td><?= $data ['username']; ?></td>
                                            <td><?= $data ['pass']; ?></td>
                                            <td><?= $data ['hak_akses']; ?></td>
                                            <td><img src="images/<?= $data ['foto']; ?>" width="50" height="50" alt=""></td>
                                            <td>
                                                <a href="?pages=pengguna&aksi=ubah&id=<?= $data['id_pengguna']; ?>" class="btn btn-success">Ubah</a>
                                                <a onclick="return confirm('Apakah Anda Yakin Akan Menghapus?')" href="?pages=pengguna&aksi=hapus&id=<?= $data['id_pengguna']; ?>"  class="btn btn-warning">Hapus</a>
                                            </td>
                                        </tr>
                                        <?php endwhile; ?>
                                    
                                    </tbody>
                                     
                                </table>
                                <a href="?pages=pengguna&aksi=tambah" class="btn btn-primary">Tambah</a> <!-- aksi=tambah get yang dari index.php -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>