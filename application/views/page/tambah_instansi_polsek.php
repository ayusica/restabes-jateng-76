<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-dark">TABEL INSTANSI</h6>
        </div>
        <div class="card-body">
            <div class="row-sm-3">
                <button class="badge btn-primary" style="height: 2.5rem;" id="tambah_instansi_button"><i class="fas fa-plus"></i> Tambah Instansi</button>
            </div>
            <div class="mt-3">
                <?php echo $this->session->flashdata('msg'); ?>
            </div>
            <div class="table-responsive mt-3">
                <table class="table table-bordered" id="example1" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Instansi</th>
                            <th>Alamat</th>
                            <th>Foto</th>
                            <th width="20px">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;
                        foreach ($instansi as $inst) : ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= $inst['nama_instansi']; ?></td>
                                <td><?= $inst['alamat']; ?></td>
                                <td><img src="<?= base_url('assets/img/g_instansi/') . $inst['foto'] ?>" style="width:145px;" alt="foto"></td>
                                <td align="center" width="100px">
                                    <button type="button" class="badge badge-success" style="height: 2.5rem; width: 5rem;" id="edit_instansi" onclick="get_editInstansi(<?= $inst['id_instansi'] ?>)"><i class="fas fa-fw fa-edit"></i> Edit</button>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- Modal Detail -->
    <div class="modal fade" id="Edit_Instansi_Modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalDP">Edit Data Instansi</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="ed-instansi" method="POST" action="<?= base_url('kabag/update_instansi') ?>" enctype="multipart/form-data">
                        <div class="form-group">
                            <p style="color: red">*Maksimal Ukuran Foto 2Mb</p>
                            <img class="image" style="width: 50%" alt="foto" id="foto">
                            <br><br>
                            <input type="file" id="image" name="image" class="inputFile">
                        </div>
                        <div class="form-group">
                            <label>ID</label>
                            <input type="text" class="form-control" id="id_instansi" name="id_instansi" disabled />
                            <input type="hidden" class="form-control" id="instansi_hid" name="instansi_hid">
                        </div>
                        <div class="form-group">
                            <label>Nama Instansi</label>
                            <input type="text" class="form-control" id="nama_instansi" name="nama_instansi" required>
                        </div>
                        <div class="form-group">
                            <label>Alamat</label>
                            <input type="text" class="form-control" id="alamat" name="alamat" required>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-success" id="ed-instansi">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal Hapus -->
    <div id="hapus-instansi-modal" class="modal fade" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Hapus Instansi</h5>
                </div>
                <div class="modal-body">
                    <h5>Apakah Anda Yakin Ingin Menghapus?</h5>
                    <hr>
                    <h6>Menghapusnya Mungkin Akan Memunculkan Masalah Baru Saat Menambah Instansi & Informasi Data Personel Terkait!</h6>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</button>
                    <button id="konf_hapus_modal" type="button" class="btn btn-danger" data-dismiss="modal">Hapus</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal Tambah -->
    <div class="modal fade" id="tambah_instansi_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">TAMBAH INSTANSI</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="tambah-poltabes" method="POST" action="<?= base_url('kabag/tambah_kesatuan') ?>" enctype="multipart/form-data">
                        <div class="form-group">
                            <p style="color: red">*Maksimal Ukuran Foto 2Mb</p>
                            <label for="Foto">Foto Instansi</label>
                            <input type="file" id="image" name="image" class="inputFile">
                        </div>
                        <!-- <div class="form-group">
                            <label>ID</label>
                            <input type="text" class="form-control" id="instansi_id" name="instansi_id" placeholder="ID instansi (kesatuan)">
                        </div> -->
                        <div class="form-group">
                            <label>Nama Instansi</label>
                            <input type="text" class="form-control" id="instansi_nama" name="instansi_nama" placeholder="Nama Instansi" required minlength="3">
                        </div>
                        <div class="form-group">
                            <label>Alamat</label>
                            <input type="text" class="form-control" id="instansi_alamat" name="instansi_alamat" placeholder="Alamat" required minlength="3">
                        </div>
                        <div class="modal-footer">
                            <div class="col-auto mt-10">
                                <button type="submit" class="btn btn-success" id="tamb_instansi">Simpan</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>