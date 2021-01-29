<div class="card">
    <div class="card-header">
        <h4><?= $title ?></h4>
        <div class="card-header-form">

        </div>
    </div>
</div>

<input type="hidden" value="<?= $this->uri->segment(5) ?>" id="tipena">


<div class="card">
    <div class="card-body">
        <div class="form-group row">
            <label for="subject" class="col-form-label col-md-2">Subject :</label>
            <div class="col-md-10">
                <?= $surat->subjek ?>
            </div>
        </div>
        <div class="form-group row">
            <label for="" class="col-form-label col-md-2">Keterangan/Isi Surat :</label>
            <div class="col-md-10">
                <?= $surat->isi ?>
            </div>
        </div>

        <div class="form-group row">
            <label for="" class="col-form-label col-md-2">Lampiran :</label>
            <div class="col-md-10">
                <?php
                    $ori = explode(',', $surat->lampiran);
                    $enc = explode(',', $surat->file);
                
                    // $this->req->print($enc);
                ?>
                

                <?php foreach ($enc as $key):?>
                        <a target="_blank" href="<?= base_url()?>uploads/files/<?=$key?>"><?= $key?></a><br>
                <?php endforeach?>
            </div>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-body">
        <div class="table-responsive">
            <table id="list_detailriwayat" class="table table-striped table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <!-- <th><input id="checkAll" type="checkbox"></th> -->
                        <th>No</th>
                        <th>Nama Anggota</th>
                        <th>Email</th>
                        <th>Waktu Pengiriman</th>
                    </tr>
                </thead>

                <tbody>
                </tbody>

            </table>
        </div>
    </div>
</div>
</div>