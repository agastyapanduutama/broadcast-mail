 <div class="card">
     <div class="card-header">
         <h4>Silakan Pilih Email diikirim untuk siapa</h4>
     </div>
     <div class="card-body">
         <p class="mb-2">You can change the modal position to center.</p>
         <form action="<?= base_url('admin/mail') ?>" method="GET">
             <select name="berdasarkan" class="form-control" id="">
                 <option value="perorangan" selected>Berdasarkan Perorangan</option>
                 <!-- <option value="semuapasis">Semua Pasis</option> -->
                 <option value="pangkat">Berdasarkan Pangkat</option>
                 <option value="kategori">Berdasarkan Kategori</option>
             </select>
             <button class="btn btn-success">Pilih</button>
         </form>
         <br>
         <p class="mb-2">
             Keterangan : <br>
         <ul>
             <li>Berdasarkan Perorangan : Email akan dikirimkan ke beberapa Pasis saja</li>
             <li>Semua Pasis : Email akan dikirimkan semua Pasis</li>
             <li>Berdasarkan Pangkat : Email akan dikirimkan Berdasarkan pangkat saja, contoh Email akan dikirimkan kepada Pasis yang memiliki Pangkat Kolonel Inf</li>
             <li>Berdasarkan Kategori : Email akan dikirimkan Berdasarkan kategori saja, contoh Email akan dikirimkan kepada Pasis yang memiliki Kategori TNI AD</li>
         </ul>

         </p>
     </div>
 </div>