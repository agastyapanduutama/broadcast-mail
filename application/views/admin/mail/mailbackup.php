<div class="card">
    <div class="card-body">
        <?php
        if ($this->session->flashdata('success')) {
            echo '<div class="alert alert-sm alert-success">';
            echo $this->session->flashdata('success');
            echo '</div>';
        }
        ?>

        <div class="form-group">
            <label for="">Tujuan Kirim</label>
            <select name="tujuan" class="form-control" id="tujuan_user" require>
                <option value=""> -- Silakan Pilih -- </option>
                <option value="0">Kirim Ke Per Orang</option>
                <option value="1">Kirim Ke Per Pangkat</option>
            </select>
        </div>

        <form method="POST" enctype="multipart/form-data" action="<?= base_url('admin/mail/kirim') ?>">
            <div class="form-group row">
                <label for="to" class="col-form-label col-md-1">To :</label>
                <div class="col-md-11">
                    <input type="text" class="form-control" id="to" name="kepada">
                </div>
            </div>
            <div class="form-group row">
                <label for="subject" class="col-form-label col-md-1">Subject :</label>
                <div class="col-md-11">
                    <input type="text" class="form-control" id="subject" name="subjek">
                </div>
            </div>
            <div class="form-group row">
                <label for="" class="col-form-label col-md-1">Keterangan :</label>
                <div class="col-md-11">
                    <textarea cols="30" name="isi" id="summernote" class="" placeholder="Pesan Email" rows="10"></textarea>
                </div>
            </div>
            <div class="form-group row">
                <label for="" class="col-form-label col-md-1">Lampiran :</label>
                <div class="col-md-11">
                    <input type="file" multiple class="form-control" name="lampiran">
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Kirim</button>

        </form>
    </div>

</div>


