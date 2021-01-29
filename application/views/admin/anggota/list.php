<div class="card">
    <div class="card-header">
        <h4><?= $title ?></h4>
        <div class="card-header-form">

            <button class="btn btn-primary float-right" data-toggle="modal" data-target="#modalTambah">Tambah
                Data</button>
        </div>
    </div>
</div>

<div class="card">


    <div class="card-body">
        <div class="table-responsive">
            <table id="list_anggota" class="table table-striped table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <!-- <th><input id="checkAll" type="checkbox"></th> -->
                        <th>No</th>
                        <th>NRP</th>
                        <th>Nama anggota</th>
                        <th>Pangkat</th>
                        <th>Jabatan</th>
                        <th>Kategori</th>
                        <th>Email</th>
                        <th>Keterangan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>

                <tbody>
                </tbody>

            </table>
        </div>
    </div>
</div>
</div>

<div class="modal fade" tabindex="-1" role="dialog" id="modalTambah">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah anggota</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="formAddanggota">
                <div class="modal-body">
                    <div class="form-group">
                        <label>NRP</label>
                        <input type="text" name="nrp" id="nrp" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Nama anggota</label>
                        <input type="text" name="nama" id="anggota" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Email anggota</label>
                        <input type="email" name="email" id="email" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label>Pangkat</label>
                        <select name="id_pangkat" class="form-control" id="id_pangkat"></select>
                    </div>

                    <div class="form-group">
                        <label>jabatan</label>
                        <select name="id_jabatan" class="form-control" id="id_jabatan"></select>
                    </div>

                    <div class="form-group">
                        <label>kategori</label>
                        <select name="id_kategori" class="form-control" id="id_kategori"></select>
                    </div>

                    <div class="form-group">
                        <label>Keterangan</label>
                        <input type="text" name="keterangan" id="keterangan" class="form-control">
                    </div>
                </div>
                <div class="modal-footer bg-whitesmoke br">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" tabindex="-1" role="dialog" id="modalEdit">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah anggota</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="formEditanggota">
                <div class="modal-body">
                    <input type="hidden" name="id" id   "idData">
                    <div class="form-group">
                        <label>NRP</label>
                        <input type="text" name="nrp" id="nrp1" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Nama anggota</label>
                        <input type="text" name="nama" id="anggota1" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Email anggota</label>
                        <input type="email" name="email" id="email1" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label>Pangkat</label>
                        <select name="id_pangkat" class="form-control" id="id_pangkat1"></select>
                    </div>

                    <div class="form-group">
                        <label>jabatan</label>
                        <select name="id_jabatan" class="form-control" id="id_jabatan1"></select>
                    </div>

                    <div class="form-group">
                        <label>kategori</label>
                        <select name="id_kategori" class="form-control" id="id_kategori1"></select>
                    </div>

                    <div class="form-group">
                        <label>Keterangan</label>
                        <input type="text" name="keterangan" id="keterangan1" class="form-control">
                    </div>

                </div>
                <div class="modal-footer bg-whitesmoke br">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>