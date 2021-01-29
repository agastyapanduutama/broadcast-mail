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
            <table id="list_konfigurasi" class="table table-striped table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <!-- <th><input id="checkAll" type="checkbox"></th> -->
                        <th>No</th>
                        <th>Nama Konfigurasi</th>
                        <th>Host</th>
                        <th>Smtp Secure</th>
                        <th>Port</th>
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
                <h5 class="modal-title">Tambah konfigurasi</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="formAddkonfigurasi">
                <div class="modal-body">

                    <div class="form-group">
                        <label>Nama konfigurasi</label>
                        <input type="text" name="nama_konfigurasi" id="nama_konfigurasi" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label>HOST</label>
                        <input type="text" name="host" id="host" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label>SMTP SECURE</label>
                        <input type="text" name="smtp_secure" id="smtp_secure" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label>PORT</label>
                        <input type="number" name="port" id="port" class="form-control" required>
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
                <h5 class="modal-title">Tambah konfigurasi</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="formEditkonfigurasi">
                <div class="modal-body">
                    <input type="hidden" name="id" id="idData">
                    <div class="form-group">
                        <label>Nama konfigurasi</label>
                        <input type="text" name="nama_konfigurasi" id="nama_konfigurasi1" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label>HOST</label>
                        <input type="text" name="host" id="host1" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label>SMTP SECURE</label>
                        <input type="text" name="smtp_secure" id="smtp_secure1" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label>PORT</label>
                        <input type="number" name="port" id="port1" class="form-control" required>
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